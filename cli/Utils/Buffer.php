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
     * Internal data buffer.
     *
     * @var array
     */
    private $data;

    /**
     * Class constructor.
     *
     * @param array $data
     *
     * @return void
     */
    public function __construct(array $data = []) {
        $this->data = $data;
    }

    /**
     * Synchronized data read.
     *
     * This function will wait until $topic is set on the data buffer.
     * Warning: do *NOT* call this function on a $topic that might not get set
     * or thread execution will hang forever.
     *
     * @param string $topic
     *
     * @return mixed
     */
    final public function waitData(string $topic) {
        return $this->synchronized(
            function () use ($topic) {
                // pthreads will replace $this->data for an Object(Volatile), thus the
                // use of property_exists instead of array_key_exists
                while (! property_exists($this->data, $topic)) {
                    $this->wait();
                }

                return $this->data[$topic];
            }
        );
    }

    /**
     * Unsynchronized data read.
     *
     * This function will try to read $topic. If $topic isn't set, it returns null.
     *
     * @param string $topic
     *
     * @return mixed|null
     */
    final public function getData(string $topic) {
        if (isset($this->data[$topic])) {
            return $this->data[$topic];
        }
    }

    /**
     * Synchronized data write.
     *
     * This function writes $topic data and notifies any waiting thread.
     *
     * @param string $topic
     * @param mixed  $value
     *
     * @return void
     */
    final public function setData(string $topic, $value) {
        $this->synchronized(
            function () use ($topic, $value) {
                $this->data[$topic] = $value;
                $this->notify();
            }
        );
    }

    /**
     * Returns the internal data buffer.
     *
     * @return \Volatile
     */
    final public function asArray() : \Volatile {
        return $this->data;
    }
}
