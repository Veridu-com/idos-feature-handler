<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Command;

use Cli\Extractor\Handler;
use Cli\Utils\Logger;
use GuzzleHttp\Client;
use idOS\Auth\CredentialToken;
use idOS\SDK;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as Monolog;
use Monolog\Processor\ProcessIdProcessor;
use Monolog\Processor\UidProcessor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
            ->addOption(
                'devMode',
                'd',
                InputOption::VALUE_NONE,
                'Development mode'
            )
            ->addOption(
                'healthCheck',
                'h',
                InputOption::VALUE_NONE,
                'Enable queue health check'
            )
            ->addOption(
                'logFile',
                'l',
                InputOption::VALUE_REQUIRED,
                'Path to log file'
            )
            ->addArgument(
                'handlerPublicKey',
                InputArgument::REQUIRED,
                'Handler public key'
            )
            ->addArgument(
                'handlerPrivateKey',
                InputArgument::REQUIRED,
                'Handler private key'
            )
            ->addArgument(
                'functionName',
                InputArgument::REQUIRED,
                'Gearman Worker Function name'
            )
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
        $logFile = $input->getOption('logFile') ?? 'php://stdout';
        $monolog = new Monolog('Feature');
        $monolog
            ->pushProcessor(new UidProcessor())
            ->pushProcessor(new ProcessIdProcessor())
            ->pushHandler(new StreamHandler($logFile, Monolog::DEBUG));
        $logger = new Logger($monolog);

        $logger->debug('Initializing idOS Feature Handler Daemon');

        $bootTime = time();

        // Development mode
        $devMode = ! empty($input->getOption('devMode'));
        if ($devMode) {
            $logger->debug(
                'Running in developer mode',
                [
                    'api_url' => getenv('IDOS_API_URL') ?: 'https://api.idos.io/1.0/'
                ]
            );
            ini_set('display_errors', 'On');
            error_reporting(-1);
        }

        // Health check
        $healthCheck = ! empty($input->getOption('healthCheck'));
        if ($healthCheck) {
            $logger->debug('Enabling health check');
        }

        // Gearman Worker function name setup
        $functionName = $input->getArgument('functionName');
        if ((empty($functionName)) || (! preg_match('/^[a-zA-Z0-9\._-]+$/', $functionName))) {
            $functionName = 'idos-feature';
        }

        $handlerPublicKey  = $input->getArgument('handlerPublicKey');
        $handlerPrivateKey = $input->getArgument('handlerPrivateKey');

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

        $logger->debug('Registering Worker Function', ['function' => $functionName]);

        $jobCount = 0;
        $lastJob  = 0;

        /*
         * Payload content:
         *  - userName
         *  - sourceId
         *  - taskId (=> processId)
         *  - providerName
         *  - publicKey
         */
        $gearman->addFunction(
            $functionName,
            function (\GearmanJob $job) use ($logger, $handlerPublicKey, $handlerPrivateKey, $devMode, &$jobCount, &$lastJob) {
                $logger->info('Feature job added');
                $jobData = json_decode($job->workload(), true);
                if ($jobData === null) {
                    $logger->warning('Invalid Job Workload!');
                    $job->sendComplete('invalid');

                    return;
                }

                $jobCount++;
                $init = microtime(true);

                $extractorClass = 'Cli\Extractor\\' . ucfirst($jobData['providerName']);

                if (! class_exists($extractorClass)) {
                    $logger->debug('Invalid Job Provider Name!');
                    $job->sendComplete('invalid');

                    return;
                }

                $extractor = new $extractorClass();

                // idOS SDK
                $auth = new CredentialToken(
                    $jobData['publicKey'],
                    $handlerPublicKey,
                    $handlerPrivateKey
                );
                $sdk = SDK::create($auth);

                // development mode: disable ssl check
                if ($devMode) {
                    $sdk
                        ->setBaseUrl(getenv('IDOS_API_URL') ?: 'https://api.idos.io/1.0/')
                        ->setClient(
                            new Client(
                                [
                                    'verify'   => false
                                ]
                            )
                        );
                }

                // $sdk
                //     ->Profile($jobData['userName'])
                //     ->processes
                //     ->updateOne(
                //         $jobData['userName'],
                //         $jobData['taskId'],
                //         [
                //             'status' => 'Extracting features' Add a comment to this line
                //         ]
                //     );

                $response = $sdk
                    ->Profile($jobData['userName'])
                    ->Raw->listAll(['source:id' => $jobData['sourceId']]);

                $rawBuffer = [];
                foreach ($response['data'] as $item) {
                    if (! isset($item['collection'], $item['data'])) {
                        $logger->error(sprintf('Malformed API response: %s', json_encode($item)));
                        continue;
                    }

                    $rawBuffer[$item['collection']] = $item['data'];
                }

                $parsedBuffer = $extractor->analyze($rawBuffer);

                $featuresEndpoint = $sdk
                    ->Profile($jobData['userName'])
                    ->Features;

                $featuresEndpoint->deleteAll(
                    [
                        'source' => $jobData['providerName']
                    ]
                );

                $features = [];
                foreach ($parsedBuffer as $name => $value) {
                    $features[] = [
                        'source_id' => $jobData['sourceId'],
                        'name'      => $name,
                        'value'     => $value
                    ];
                }

                $featuresEndpoint->upsertBulk($features);

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

                $logger->info('Job completed', ['time' => microtime(true) - $init]);
                $job->sendComplete('ok');
                $lastJob = time();
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
                    if (! @$gearman->echo('ping')) {
                        $logger->debug('Invalid server state, restarting');
                        exit;
                    }

                    if (($healthCheck) && ((time() - $bootTime) > 10) && ((time() - $lastJob) > 10)) {
                        $logger->info(
                            'Inactivity detected, restarting',
                            [
                                'runtime' => time() - $bootTime,
                                'jobs'    => $jobCount
                            ]
                        );
                        exit;
                    }

                    continue;
                }
            }
        }

        $logger->debug('Leaving Gearman Worker Loop', ['runtime' => time() - $bootTime, 'jobs' => $jobCount]);
    }
}
