<?php

declare(strict_types = 1);

namespace Cli\Extractor;

use Cli\Utils\Profile;
use Cli\Utils\Utils;

abstract class AbstractExtractor {

	abstract public function analyze(array $data) : array;

}