<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

namespace Cli\Extractor;

class Factory {
    /**
     * Creates a list of extractor classes based on $providerName.
     *
     * @param string $providerName
     *
     * @return array
     */
    public static function create(string $providerName) : array {
        $providerName = ucfirst($providerName);
        $path         = sprintf(
            '%s/%s',
            __DIR__,
            $providerName
        );
        if (! is_dir($path)) {
            return [];
        }

        $pattern   = sprintf('%s/*.php', $path);
        $classList = [];
        foreach (glob($pattern) as $file) {
            if (preg_match('/(Abstract|Interface)/', $file)) {
                continue;
            }

            $className = sprintf(
                '\\Cli\\Extractor\\%s\\%s',
                $providerName,
                str_replace('.php', '', basename($file))
            );

            if (! class_exists($className)) {
                throw new \RuntimeException(
                    sprintf(
                        'Invalid class name "%s" (%s)',
                        $className,
                        $file
                    )
                );
            }

            $classList[] = $className;
        }

        return $classList;
    }
}
