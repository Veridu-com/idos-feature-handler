<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor\Facebook;

use Cli\Extractor\AbstractExtractor;

class FirstMostRecentEmployer extends AbstractExtractor {
    public function execute() {
    	$work = $this->worker->rawBuffer->waitData('_work');

		if (empty($work)) {
			return null;
		}

		if (empty($work[0]['employer'])) {
			return null;
		}
		
		return $work[0]['employer'];
	}
}