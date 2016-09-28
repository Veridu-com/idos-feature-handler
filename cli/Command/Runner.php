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
 * Command definition for Feature Extractor Runner.
 */
class Runner extends Command {
    /**
     * Command configuration.
     *
     * @return void
     */
    protected function configure() {
        $this
            ->setName('feature:runner')
            ->setDescription('idOS Feature - Runner')
            ->addArgument(
                'providerName',
                InputArgument::REQUIRED,
                'Provider name'
            )
            ->addArgument(
                'userName',
                InputArgument::REQUIRED,
                'User name'
            )
            ->addArgument(
                'sourceId',
                InputArgument::REQUIRED,
                'Source Id'
            )
            ->addArgument(
                'processId',
                InputArgument::REQUIRED,
                'Process Id'
            )
            ->addArgument(
                'publicKey',
                InputArgument::REQUIRED,
                'Public Key'
            )
            ->addArgument(
                'dryRun',
                InputArgument::OPTIONAL,
                'On dry run mode, no data is sent to idOS API'
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

        $logger->debug('Initializing idOS Feature Handler Runner');

        $handler = Handler::create($input->getArgument('providerName'));

        // idOS SDK
        $auth = new \idOS\Auth\CredentialToken(
            $input->getArgument('publicKey'),
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
            ->Profile($input->getArgument('userName'))
            ->Raw->listAll(['source:id' => $input->getArgument('sourceId')]);

        $rawBuffer = new Buffer();
        foreach ($response['data'] as $item) {
            $rawBuffer[$item['collection']] = $item['data'];
        }

        $parsedBuffer = new Buffer();

        $handler->extract(
            $rawBuffer,
            $parsedBuffer
        );

        $dryRun = $input->getArgument('dryRun');
        if (empty($dryRun)) {
            $dryRun = false;
        }

        if ($dryRun) {
            foreach ($parsedBuffer as $field => $value) {
                $logger->debug(sprintf('%s = %s', $field, $value));
            }

            return;
        }

        $featuresEndpoint = $sdk
            ->Profile($input->getArgument('userName'))
            ->Features;
        try {
            foreach ($parsedBuffer as $field => $value) {
                $featuresEndpoint->createOrUpdate(
                    (int) $input->getArgument('sourceId'),
                    $field,
                    $value
                );
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

        $logger->debug('Runner completed');
    }
}
