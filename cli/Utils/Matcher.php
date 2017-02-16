<?php

declare(strict_types = 1);

namespace Cli\Utils;

final class Matcher {
    private static function interval_fix(&$item, $key) {
        if ($item > 1.0) {
            $item = 1.0;
        } elseif ($item < 0.0) {
            $item = 0.0;
        } else {
            $item = round($item, 2);
        }
    }

    public static function cleanup($string) {
        $string = self::normalize_string($string);
        $string = self::remove_stopwords($string);

        return trim(
            preg_replace(
                [
                '/\./',
                '/,/',
                '/ - /',
                '/ +/'
                ],
                [
                '',
                '',
                ' ',
                ' '
                ],
                $string
            )
        );
    }

    public static function normalize_string($string) {
        $string = trim($string);
        if (function_exists('iconv')) {
            if (function_exists('mb_detect_encoding')) {
                $encoding = mb_detect_encoding($string);
            } else {
                $encoding = 'UTF-8';
            }

            $string = iconv($encoding, 'US-ASCII//TRANSLIT', $string);
        }

        return strtolower($string);
    }

    public static function remove_stopwords($string) {
        return preg_replace(
            "/\b(a\'s|able|about|above|according|accordingly|across|actually|after|afterwards|again|against|ain\'t|all|allow|allows|almost|alone|along|already|also|although|always|am|among|amongst|an|and|another|any|anybody|anyhow|anyone|anything|anyway|anyways|anywhere|apart|appear|appreciate|appropriate|are|aren\'t|around|as|aside|ask|asking|associated|at|available|away|awfully|be|became|because|become|becomes|becoming|been|before|beforehand|behind|being|believe|below|beside|besides|best|better|between|beyond|both|brief|but|by|c\'mon|c\'s|came|can|can\'t|cannot|cant|cause|causes|certain|certainly|changes|clearly|co|com|come|comes|concerning|consequently|consider|considering|contain|containing|contains|corresponding|could|couldn\'t|course|currently|definitely|described|despite|did|didn\'t|different|do|does|doesn\'t|doing|don\'t|done|down|downwards|during|each|edu|eg|eight|either|else|elsewhere|enough|entirely|especially|et|etc|even|ever|every|everybody|everyone|everything|everywhere|ex|exactly|example|except|far|few|fifth|first|five|followed|following|follows|for|former|formerly|forth|four|from|further|furthermore|get|gets|getting|given|gives|go|goes|going|gone|got|gotten|greetings|had|hadn\'t|happens|hardly|has|hasn\'t|have|haven\'t|having|he|he\'s|hello|help|hence|her|here|here\'s|hereafter|hereby|herein|hereupon|hers|herself|hi|him|himself|his|hither|hopefully|how|howbeit|however|i\'d|i\'ll|i\'m|i\'ve|ie|if|ignored|immediate|in|inasmuch|inc|indeed|indicate|indicated|indicates|inner|insofar|instead|into|inward|is|isn\'t|it|it\'d|it\'ll|it\'s|its|itself|just|keep|keeps|kept|know|known|knows|last|lately|later|latter|latterly|least|less|lest|let|let\'s|like|liked|likely|little|look|looking|looks|ltd|mainly|many|may|maybe|me|mean|meanwhile|merely|might|more|moreover|most|mostly|much|must|my|myself|name|namely|nd|near|nearly|necessary|need|needs|neither|never|nevertheless|new|next|nine|no|nobody|non|none|noone|nor|normally|not|nothing|novel|now|nowhere|obviously|of|off|often|oh|ok|okay|old|on|once|one|ones|only|onto|or|other|others|otherwise|ought|our|ours|ourselves|out|outside|over|overall|own|particular|particularly|per|perhaps|placed|please|plus|possible|presumably|probably|provides|que|quite|qv|rather|rd|re|really|reasonably|regarding|regardless|regards|relatively|respectively|right|said|same|saw|say|saying|says|second|secondly|see|seeing|seem|seemed|seeming|seems|seen|self|selves|sensible|sent|serious|seriously|seven|several|shall|she|should|shouldn\'t|since|six|so|some|somebody|somehow|someone|something|sometime|sometimes|somewhat|somewhere|soon|sorry|specified|specify|specifying|still|sub|such|sup|sure|t\'s|take|taken|tell|tends|th|than|thank|thanks|thanx|that|that\'s|thats|the|their|theirs|them|themselves|then|thence|there|there\'s|thereafter|thereby|therefore|therein|theres|thereupon|these|they|they\'d|they\'ll|they\'re|they\'ve|think|third|this|thorough|thoroughly|those|though|three|through|throughout|thru|thus|to|together|too|took|toward|towards|tried|tries|truly|try|trying|twice|two|un|under|unfortunately|unless|unlikely|until|unto|up|upon|us|use|used|useful|uses|using|usually|value|various|very|via|viz|vs|want|wants|was|wasn\'t|way|we|we\'d|we\'ll|we\'re|we\'ve|welcome|well|went|were|weren\'t|what|what\'s|whatever|when|whence|whenever|where|where\'s|whereafter|whereas|whereby|wherein|whereupon|wherever|whether|which|while|whither|who|who\'s|whoever|whole|whom|whose|why|will|willing|wish|with|within|without|won\'t|wonder|would|wouldn\'t|yes|yet|you|you\'d|you\'ll|you\'re|you\'ve|your|yours|yourself|yourselves|zero)\b/i",
            '',
            $string
        );
    }

    /**
     * Compares two dates.
     *
     * @param mixed $a The first date
     * @param mixed $b The second date
     *
     * @return mixed
     */
    public static function compare_date($a, $b) {
        if ((empty($a)) || (empty($b))) {
            return 0.0;
        }

        if ($a === $b) {
            return 1.0;
        }

        $da = [];
        if (strpos($a, '/') === false) {
            $da['year'] = $a;
        } else {
            $pieces      = explode('/', $a);
            $da['day']   = $pieces[0];
            $da['month'] = $pieces[1];
            if (isset($pieces[2])) {
                $da['year'] = $pieces[2];
            }
        }

        $db = [];
        if (strpos($b, '/') === false) {
            $db['year'] = $b;
        } else {
            $pieces      = explode('/', $b);
            $db['day']   = $pieces[0];
            $db['month'] = $pieces[1];
            if (isset($pieces[2])) {
                $db['year'] = $pieces[2];
            }
        }

        $score = 0;
        foreach (['day', 'month', 'year'] as $part) {
            if (isset($da[$part], $db[$part])) {
                if ($da[$part] === $db[$part])
                    $score++;
            }
        }

        return round($score / max(count($da), count($db)), 2);
    }

    /**
     * Compares two strings.
     *
     * @param mixed $a The first string
     * @param mixed $b The second string
     *
     * @return mixed
     */
    public static function compare_string($a, $b, $strict = false) {
        if ((is_numeric($a)) || (is_numeric($b))) {
            return self::compare_number($a, $b);
        }

        if ((! is_string($a)) || (! is_string($b))) {
            return 0.0;
        }

        $a = self::normalize_string($a);
        if (strlen($a) == 0) {
            return 0.0;
        }

        $b = self::normalize_string($b);
        if (strlen($b) == 0) {
            return 0.0;
        }

        if ($a === $b) {
            return 1.0;
        }

        if ((function_exists('stem')) && (stem($a) === stem($b))) {
            return 1.0;
        }

        if ($strict) {
            return 0.0;
        }

        /*$soundex = [
            'a' => soundex($a),
            'b' => soundex($b)
        ];
        $metaphone = [
            'a' => metaphone($a),
            'b' => metaphone($b)
        ];
        $dmetaphone = [
            'a' => double_metaphone($a),
            'b' => double_metaphone($b)
        ];*/
        $levenshtein = [
            'plain'      => (1.0 - (levenshtein($a, $b) / max(1, strlen(max($a, $b))))),
            //'soundex'    => (1.0 - (levenshtein($soundex['a'], $soundex['b']) / max(1, strlen(max($soundex['a'], $soundex['b']))))),
            //'metaphone'  => (1.0 - (levenshtein($metaphone['a'], $metaphone['b']) / max(1, strlen(max($metaphone['a'], $metaphone['b']))))),
            /*'dmetaphone' => max(
                (1.0 - (levenshtein($dmetaphone['a'][0], $dmetaphone['b'][0]) / max(1, strlen(max($dmetaphone['a'][0], $dmetaphone['b'][0]))))),
                (1.0 - (levenshtein($dmetaphone['a'][1], $dmetaphone['b'][1]) / max(1, strlen(max($dmetaphone['a'][1], $dmetaphone['b'][1])))))
            )*/
        ];
        array_walk($levenshtein, 'self::interval_fix');
        similar_text($a, $b, $sp1);
        similar_text($b, $a, $sp2);
        /*similar_text($soundex['a'], $soundex['b'], $ss1);
        similar_text($soundex['b'], $soundex['a'], $ss2);
        similar_text($metaphone['a'], $metaphone['b'], $sm1);
        similar_text($metaphone['b'], $metaphone['a'], $sm2);
        similar_text($dmetaphone['a'][0], $dmetaphone['b'][0], $sd01);
        similar_text($dmetaphone['b'][0], $dmetaphone['a'][0], $sd02);
        similar_text($dmetaphone['a'][1], $dmetaphone['b'][1], $sd11);
        similar_text($dmetaphone['b'][1], $dmetaphone['a'][1], $sd12);*/
        $similar = [
            'plain'      => (($sp1 + $sp2) / 2),
            /*'soundex'    => (($ss1 + $ss2) / 2),
            'metaphone'  => (($sm1 + $sm2) / 2),
            'dmetaphone' => max(
                (($sd01 + $sd02) / 2),
                (($sd11 + $sd12) / 2)
            )*/
        ];
        array_walk($similar, 'self::interval_fix');
        $result = min($levenshtein['plain'], $similar['plain']);
        //$result += min($levenshtein['soundex'], $similar['soundex']);
        //$result += min($levenshtein['metaphone'], $similar['metaphone']);
        //$result += min($levenshtein['dmetaphone'], $similar['dmetaphone']);

        return round(($result / 4), 2);
    }

    /**
     * Compares two numbers.
     *
     * @param mixed $a The first number
     * @param mixed $b The second number
     *
     * @return mixed
     */
    public static function compare_number($a, $b) {
        if ((! is_numeric($a)) || (! is_numeric($b))) {
            return 0.0;
        }

        if ((is_float($a)) || (is_float($b))) {
            return max(0.0, (1.0 - abs(floatval($a) - floatval($b))));
        }

        return max(0.0, (1.0 - (abs(intval($a) - intval($b)) / 10)));
    }

    /**
     * Compares two country codes.
     *
     * @param mixed $a The first country code
     * @param mixed $b The second country code
     *
     * @return mixed
     */
    public static function compare_country_code($a, $b) {
        //removes + or 00 from country code begin
        if (substr_compare($a, '+', 0, 1) == 0) {
            $a = substr($a, 1);
        } elseif (substr_compare($a, '00', 0, 2) == 0) {
            $a = substr($a, 2);
        }

        if (substr_compare($b, '+', 0, 1) == 0) {
            $b = substr($b, 1);
        } elseif (substr_compare($b, '00', 0, 2) == 0) {
            $b = substr($b, 2);
        }

        return self::compare_string($a, $b, true);
    }

    /**
     * Compares two phone numbers.
     *
     * @param mixed $a The first phone number
     * @param mixed $b The second phone number
     *
     * @return mixed
     */
    public static function compare_phone_number($a, $b) {
        $parsedA = Utils::getInstance()->phoneNumber($a) ?: $a;
        $parsedB = Utils::getInstance()->phoneNumber($b) ?: $b;

        $cmp = strcmp($parsedA, $parsedB);
        if ($cmp == 0) {
            return 1.0;
        }

        if ($cmp < 0) {
            $pos = strrpos($parsedA, $parsedB);
        } else {
            $pos = strrpos($parsedB, $parsedA);
        }

        if ($pos === false) {
            return 0.0;
        }

        return max(0.0, (1.0 - ($pos / 10)));
    }

    /**
     * Compares two phones.
     *
     * @param mixed $a The first phone
     * @param mixed $b The second phone
     *
     * @return mixed
     */
    public static function compare_phone($a, $b) {
        if ((substr_compare($a, '+', 0, 1) == 0) || (substr_compare($a, '00', 0, 2) == 0)) {
            //$a begins with country code
            $hasCountryCode = true;
        } else {
            //$a doesn't begin with country code
            $hasCountryCode = false;
        }

        if ((substr_compare($b, '+', 0, 1) == 0) || (substr_compare($b, '00', 0, 2) == 0)) {
            //$b begins with country code
            if (! $hasCountryCode) {
                //strips $b country code as $a doesn't have it
                $b = substr($b, -strlen($a));
            }
        } else {
            //$b doesn't begin with country code
            if ($hasCountryCode) {
                //strips $a country code as $b doesn't have it
                $a = substr($a, -strlen($b));
            }
        }

        return self::compare_string($a, $b, true);
    }

    public static function best($a, $b) {
        $replace = [
            'from' => [
                '/\./',
                '/, +/',
                '/,$/',
                '/,,+/',
                '/ +/'
            ],
            'to' => [
                '',
                ',',
                '',
                ',',
                ' '
            ]
        ];
        $a = trim(preg_replace($replace['from'], $replace['to'], self::cleanup($a)));
        $b = trim(preg_replace($replace['from'], $replace['to'], self::cleanup($b)));

        if ($a === $b) {
            return 1.0;
        }

        if (strpos($a, ',') !== false) {
            $a = explode(',', $a);
        } elseif (strpos($a, ' ') !== false) {
            $a = explode(' ', $a);
        }

        if (strpos($b, ',') !== false) {
            $b = explode(',', $b);
        } elseif (strpos($b, ' ') !== false) {
            $b = explode(' ', $b);
        }

        if ((is_array($a)) && (is_array($b))) {
            $score = 0.0;

            if (function_exists('stem')) {
                foreach ($a as &$word) {
                    $word = stem($word);
                }

                foreach ($b as &$word) {
                    $word = stem($word);
                }
            }

            if (count($a) > count($b)) {
                return count(array_intersect($b, $a)) / count($b);
            }

            return count(array_intersect($a, $b)) / count($a);
        }

        if (is_array($a)) {
            $score = 0.0;

            if (function_exists('stem')) {
                foreach ($a as &$word) {
                    $word = stem($word);
                }
            }

            foreach ($a as $word) {
                $score = max($score, self::compare_string($b, $word));
            }

            return $score;
        }

        if (is_array($b)) {
            $score = 0.0;

            if (function_exists('stem')) {
                foreach ($b as &$word) {
                    $word = stem($word);
                }
            }

            foreach ($b as $word) {
                $score = max($score, self::compare_string($a, $word));
            }

            return $score;
        }

        return self::compare_string($a, $b);
    }

    /**
     * Calculates the average.
     *
     * @param mixed $a
     * @param mixed $b
     *
     * @return mixed
     */
    public static function average($a, $b) {
        $matchScore = self::compare_string($a, $b) + self::best($a, $b);

        return round(($matchScore / 2), 2);
    }
}
