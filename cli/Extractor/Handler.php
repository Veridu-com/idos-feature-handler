<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Buffer;
use Cli\Utils\Context;
use Cli\Utils\NameParser;
use Cli\Utils\PhoneParser;

class Handler {
    /**
     * Provider name.
     *
     * @var string
     */
    private $providerName;
    /**
     * Extractor's Thread class list.
     *
     * @var array
     */
    private $threadList;

    /**
     * Creates a new Handler instance.
     *
     * @param string $providerName
     *
     * @return self
     */
    public static function create(string $providerName) : self {
        $threadList = Factory::create($providerName);
        if (empty($threadList)) {
            throw new \RuntimeException(
                sprintf(
                    'Invalid provider "%s".',
                    $providerName
                )
            );
        }

        return new static($providerName, $threadList);
    }

    /**
     * Class constructor.
     *
     * @param string $providerName
     * @param array  $threadList
     *
     * @return void
     */
    public function __construct(string $providerName, array $threadList) {
        $this->providerName = $providerName;
        $this->threadList   = $threadList;
    }

    /**
     * Runs the feature extraction threads.
     *
     * @param Buffer $rawBuffer
     * @param Buffer $parsedBuffer
     *
     * @return void
     */
    public function extract(Buffer $rawBuffer, Buffer $parsedBuffer) {
        $nameParser = new NameParser();
        $phoneParser = new PhoneParser();
        
        $threadPool = new \Pool($this->poolSize());
        foreach ($this->threadList as $className) {
            $threadPool->submit(new $className($rawBuffer, $parsedBuffer, $nameParser, $phoneParser));
        }

        $threadPool->shutdown();
    }

    /**
     * Returns the number of threads.
     *
     * @return int
     */
    public function poolSize() : int {
        return count($this->threadList);
    }
}
