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
     * [create description].
     *
     * @param string $providerName

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
     * [extract description].
     *
     * @param Buffer $rawBuffer
     * @param Buffer $parsedBuffer
     *
     * @return void
     */
    public function extract(Buffer $rawBuffer, Buffer $parsedBuffer) {
        $poolSize = min(150, count($this->threadList));
        echo 'poolSize = ', $poolSize, PHP_EOL;
        $threadPool = new \Pool(
            $poolSize,
            Context::class,
            [
                $rawBuffer,
                $parsedBuffer,
                new NameParser(),
                new PhoneParser()
            ]
        );

        foreach ($this->threadList as $className) {
            $threadPool->submit(new $className());
        }

        $threadPool->shutdown();
    }
}
