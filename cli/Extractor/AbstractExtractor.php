<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor;

/**
 * Abstract Feature Extractor Thread implementation.
 */
abstract class AbstractExtractor extends \Thread {
    /**
     * Controls if the feature extracted is used as support data by other threads.
     *
     * @var bool
     */
    const SUPPORT_DATA = false;

    /**
     * Execution time.
     *
     * @var float
     */
    protected $execTime = 0.0;

    /**
     * Returns Thread's execution time.
     *
     * @return float
     */
    public function getExecTime() : float {
        return $this->execTime;
    }

    /**
     * Thread run method.
     *
     * @return void
     */
    public function run() {
        $startTime      = microtime(true);
        $value          = $this->execute();
        $this->execTime = microtime(true) - $startTime;

        $topic = get_class($this);
        $topic = substr($topic, (strrpos($topic, '\\') + 1));
        $topic = lcfirst($topic);
        if (static::SUPPORT_DATA) {
            $this->worker->rawBuffer['_' . $topic] = $value;

            return;
        }

        $this->worker->parsedBuffer[$topic] = $value;
    }

    /**
     * Main execution function.
     *
     * @return mixed
     */
    abstract public function execute();
}
