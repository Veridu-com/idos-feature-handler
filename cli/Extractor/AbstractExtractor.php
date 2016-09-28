<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Buffer;

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
     * Thread-safe Buffer instance with Raw Data.
     *
     * @var Cli\Utils\Buffer
     */
    public $rawBuffer;
    /**
     * Thread-safe Buffer instance with Parsed Data.
     *
     * @var Cli\Utils\Buffer
     */
    public $parsedBuffer;

    /**
     * Thread-safe NameParser instance.
     *
     * @var Cli\Utils\NameParser
     */
    public $nameParser;
    /**
     * Thread-safe PhoneParser instance.
     *
     * @var Cli\Utils\PhoneParser
     */
    public $phoneParser;

    /**
     * Execution time.
     *
     * @var float
     */
    protected $execTime = 0.0;

    public function __construct(Buffer $rawBuffer, Buffer $parsedBuffer, $nameParser, $phoneParser) {
        $this->rawBuffer = $rawBuffer;
        $this->parsedBuffer = $parsedBuffer;
        $this->nameParser = $nameParser;
        $this->phoneParser = $phoneParser;
    }

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
            $this->rawBuffer['_' . $topic] = $value;
        
            return;
        }

        $this->parsedBuffer[$topic] = $value;
    }

    /**
     * Main execution function.
     *
     * @return mixed
     */
    abstract public function execute();
}
