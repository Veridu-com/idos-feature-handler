<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Utils;

use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;

/**
 * Thread-safe Phone Parser.
 */
class PhoneParser extends \Threaded {
    /**
     * Phone Parser instance.
     *
     * @var \libphonenumber\PhoneNumberUtil
     */
    private $parser;

    /**
     * Returns a parsed phone.
     *
     * @param string $phone
     * @param [type] $countryCode
     *
     * @return \libphonenumber\PhoneNumber
     */
    private function phoneParse(string $phone, $countryCode = null) : PhoneNumber {
        try {
            $phone = preg_replace('/[^0-9+]/', '', $phone);
            if (empty($phone)) {
                return new PhoneNumber();
            }

            return $this->parser->parse($phone, $countryCode);
        } catch (\Exception $exception) {
            return new PhoneNumber();
        }
    }

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct() {
        $this->parser = PhoneNumberUtil::getInstance();
    }

    public function phoneCountryCode(string $phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);

        return $phone->getCountryCode() ?: '';
    }

    public function phoneNumber(string $phone, $countryCode = null) {
        $phone = $this->phoneParse($phone, $countryCode);

        return $phone->getNationalNumber() ?: '';
    }
}
