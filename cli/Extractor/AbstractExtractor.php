<?php

declare(strict_types = 1);

namespace Cli\Extractor;

abstract class AbstractExtractor {
    abstract public function analyze(array $data) : array;

}
