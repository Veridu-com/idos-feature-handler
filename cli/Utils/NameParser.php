<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Utils;

use HumanNameParser\Name;
use HumanNameParser\Parser;

/**
 * Thread-safe Name Parser.
 */
class NameParser extends \Threaded {
    /**
     * Name Parser instance.
     *
     * @var \HumanNameParser\Parser
     */
    private $parser;

    /**
     * Returns a parsed name.
     *
     * @param string $name
     *
     * @return \HumanNameParser\Name
     */
    private function parseName(string $name) : Name {
        $name = trim($name);
        if (empty($name)) {
            return new Name();
        }

        try {
            $name = $this->parser->parse($name);

            return $name;
        } catch (\Exception $e) {
            return new Name();
        }
    }

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct() {
        $this->parser = new Parser();
    }

    public function academicTitle(string $name) {
        $name = $this->parseName($name);

        return $name->getAcademicTitle() ?: '';
    }

    public function firstName($name) {
        $name = $this->parseName($name);

        return $name->getFirstName() ?: '';
    }

    public function firstNameInitial($name) {
        $firstName = $this->firstName($name);
        if (empty($firstName)) {
            return '';
        }

        return $firstName[0];
    }

    public function middleName($name) {
        $name = $this->parseName($name);

        return $name->getMiddleName() ?: '';
    }

    public function middleNameInitial($name) {
        $middleName = $this->middleName($name);
        if (empty($middleName)) {
            return '';
        }

        if (strpos($middleName, ' ') === false) {
            return $middleName[0];
        }

        $names  = explode(' ', $middleName);
        $return = '';
        foreach ($names as $name) {
            $return .= $name[0];
        }

        return $return;
    }

    public function lastName($name) {
        $name = $this->parseName($name);

        return $name->getLastName() ?: '';
    }

    public function lastNameInitial($name) {
        $lastName = $this->lastName($name);
        if (empty($lastName)) {
            return '';
        }

        return $lastName[0];
    }
}
