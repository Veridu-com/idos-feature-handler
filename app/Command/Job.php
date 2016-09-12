<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace App\Command;

/**
 * Job Command.
 */
class Job extends AbstractCommand {
    /**
     * Username.
     *
     * @var string
     */
    public $userName;
    /**
     * Source Id.
     *
     * @var int
     */
    public $sourceId;
    /**
     * Task Id.
     *
     * @var int
     */
    public $taskId;
    /**
     * Credential's Public Key.
     *
     * @var string
     */
    public $pubKey;
    /**
     * Provider name.
     *
     * @var string
     */
    public $providerName;

    /**
     * {@inheritdoc}
     */
    public function setParameters(array $parameters) : self {
        if (isset($parameters['userName'])) {
            $this->userName = $parameters['userName'];
        }

        if (isset($parameters['sourceId'])) {
            $this->sourceId = $parameters['sourceId'];
        }

        if (isset($parameters['taskId'])) {
            $this->taskId = $parameters['taskId'];
        }

        if (isset($parameters['pubKey'])) {
            $this->pubKey = $parameters['pubKey'];
        }

        if (isset($parameters['providerName'])) {
            $this->providerName = $parameters['providerName'];
        }

        return $this;
    }
}
