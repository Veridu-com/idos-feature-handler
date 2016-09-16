<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Command;

use Cli\Extractor\Handler;
use Cli\Utils\Buffer;
use Cli\Utils\Logger;
use idOS\SDK;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command definition for Feature Extractor Daemon.
 */
class Daemon extends Command {
    /**
     * Command configuration.
     *
     * @return void
     */
    protected function configure() {
        $this
            ->setName('feature:daemon')
            ->setDescription('idOS Feature - Daemon')
            ->addArgument(
                'serverList',
                InputArgument::REQUIRED | InputArgument::IS_ARRAY,
                'Gearman server host list (separate values by space)'
            );
    }

    /**
     * Command execution.
     *
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $outpput
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $logger = new Logger();

        $logger->debug('Initializing idOS Feature Handler Daemon');

        // Server List setup
        $servers = $input->getArgument('serverList');

        $gearman = new \GearmanWorker();
        foreach ($servers as $server) {
            if (strpos($server, ':') === false) {
                $logger->debug(sprintf('Adding Gearman Server: %s', $server));
                $gearman->addServer($server);
            } else {
                $server    = explode(':', $server);
                $server[1] = intval($server[1]);
                $logger->debug(sprintf('Adding Gearman Server: %s:%d', $server[0], $server[1]));
                $gearman->addServer($server[0], $server[1]);
            }
        }

        // Run the worker in non-blocking mode
        $gearman->addOptions(\GEARMAN_WORKER_NON_BLOCKING);

        // 1 second I/O timeout
        $gearman->setTimeout(1000);

        $logger->debug('Registering Worker Function "feature"');

        $gearman->addFunction(
            'feature',
            function (\GearmanJob $job) use ($logger) {
                $logger->debug('Got a new job!');
                $jobData = json_decode($job->workload(), true);
                if ($jobData === null) {
                    $logger->debug('Invalid Job Workload!');
                    $job->sendComplete('invalid');

                    return;
                }

                $handler = Handler::create($jobData['providerName']);

                // idOS SDK
                $auth = new \idOS\Auth\CredentialToken(
                    $jobData['publicKey'],
                    __HNDKEY__,
                    __HNDSEC__
                );
                $sdk = \idOS\SDK::create($auth);

                // $sdk
                //     ->Profile($jobData['userName'])
                //     ->processes
                //     ->updateOne(
                //         $jobData['userName'],
                //         $jobData['taskId'],
                //         [
                //             'status' => 'Extracting features'
                //         ]
                //     );

                $response = $sdk
                    ->Profile($jobData['userName'])
                    ->Raw->listAll(['source:id' => $jobData['sourceId']]);

                $rawBuffer = new Buffer();
                foreach ($response['data'] as $item) {
                    $rawBuffer->setData($item['collection'], $item['data']);
                }

                $parsedBuffer = new Buffer();

                $handler->extract(
                    $rawBuffer,
                    $parsedBuffer
                );

                $featuresEndpoint = $sdk
                    ->Profile($jobData['userName'])
                    ->Features;
                try {
                    foreach ($parsedBuffer->asArray() as $field => $value) {
                        $featuresEndpoint->createNew((int) $jobData['sourceId'], $field, $value);
                    }
                } catch (\Exception $exception) {
                    echo $exception->getMessage(), PHP_EOL;
                }

                // $sdk
                //     ->profiles
                //     ->processes
                //     ->updateOne(
                //         $jobData['userName'],
                //         $jobData['taskId'],
                //         [
                //             'status' => 'Done',
                //             'running' => false
                //         ]
                //     );

                $logger->debug('Job done!');
                $job->sendComplete('ok');
            }
        );

        $logger->debug('Registering Ping Function "ping"');

        // Register Thread's Ping Function
        $gearman->addFunction(
            'ping',
            function (\GearmanJob $job) use ($logger) {
                $logger->debug('Ping!');

                return 'pong';
            }
        );

        $logger->debug('Entering Gearman Worker Loop');

        // Gearman's Loop
        while ($gearman->work()
                || ($gearman->returnCode() == \GEARMAN_IO_WAIT)
                || ($gearman->returnCode() == \GEARMAN_NO_JOBS)
                || ($gearman->returnCode() == \GEARMAN_TIMEOUT)
        ) {
            if ($gearman->returnCode() == \GEARMAN_SUCCESS) {
                continue;
            }

            if (! @$gearman->wait()) {
                if ($gearman->returnCode() == \GEARMAN_NO_ACTIVE_FDS) {
                    // No server connection, sleep before reconnect
                    $logger->debug('No active server, sleep before retry');
                    sleep(5);
                    continue;
                }

                if ($gearman->returnCode() == \GEARMAN_TIMEOUT) {
                    // Job wait timeout, sleep before retry
                    sleep(1);
                    continue;
                }
            }
        }

        $logger->debug('Leaving Gearman Worker Loop');
    }
}
