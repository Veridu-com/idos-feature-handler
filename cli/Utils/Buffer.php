<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Utils;

/**
 * Thread-safe Data Buffer.
 */
class Buffer extends \Threaded {
    /**
     * Synchronized data write.
     *
     * This function sets $key to $value and notifies any waiting thread.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     */
    final public function __set($key, $value) {
        return $this->synchronized(
            function () use ($key, $value) {
                $this[$key] = $value;

                return $this->notify();
            }
        );
    }

    /**
     * Synchronized data read.
     *
     * This function will wait until $key is set on the buffer.
     * Warning: check for $key presence with isset() before reading
     * or thread execution will hang forever.
     *
     * @param string $key
     *
     * @return mixed
     */
    final public function __get($key) {
        return $this->synchronized(
            function () use ($key) {
                while (! isset($this[$key])) {
                    $this->wait();
                }

                return $this[$key];
            }
        );
    }
}
