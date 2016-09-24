<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Utils;

/**
 * Handles Thread's context.
 */
class Context extends \Worker {
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
     * Class constructor.
     *
     * @param Cli\Utils\Buffer      $rawBuffer
     * @param Cli\Utils\Buffer      $parsedBuffer
     * @param Cli\Utils\NameParser  $nameParser
     * @param Cli\Utils\PhoneParser $phoneParser
     *
     * @return void
     */
    public function __construct(
        Buffer $rawBuffer,
        Buffer $parsedBuffer,
        NameParser $nameParser,
        PhoneParser $phoneParser
    ) {
        $this->rawBuffer    = $rawBuffer;
        $this->parsedBuffer = $parsedBuffer;
        $this->nameParser   = $nameParser;
        $this->phoneParser  = $phoneParser;
    }

    /**
     * Worker's start function.
     *
     * Required for autoloading to work.
     *
     * @param int $options
     *
     * @return bool
     */
    public function start(int $options = null) : bool {
        return parent::start(\PTHREADS_INHERIT_NONE);
    }

    /**
     * Worker's run function.
     *
     * Ensures autoloading works on thread's context.
     *
     * @return void
     */
    public function run() {
        require_once __DIR__ . '/../../vendor/autoload.php';
    }
}
