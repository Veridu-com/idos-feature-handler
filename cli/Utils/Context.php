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
     * Class constructor.
     *
     * @param Cli\Utils\Buffer $rawBuffer
     * @param Cli\Utils\Buffer $parsedBuffer
     *
     * @return void
     */
    public function __construct(
        Buffer $rawBuffer,
        Buffer $parsedBuffer
    ) {
        $this->rawBuffer    = $rawBuffer;
        $this->parsedBuffer = $parsedBuffer;
    }
}
