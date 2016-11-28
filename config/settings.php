<?php
/*
 * Copyright (c) 2012-2016 Veridu Ltd <https://veridu.com>
 * All rights reserved.
 */

declare(strict_types = 1);

use Cli\Utils\Env;

if (! defined('__VERSION__')) {
    define('__VERSION__', Env::asString('IDOS_VERSION', '1.0'));
}

$appSettings = [
    'debug'                             => Env::asBool('IDOS_DEBUG', false),
    'displayErrorDetails'               => Env::asBool('IDOS_DEBUG', false),
    'determineRouteBeforeAppMiddleware' => true,
    'log'                               => [
        'path' => Env::asString(
            'IDOS_LOG_FILE',
            sprintf(
                '%s/../log/feature.log',
                __DIR__
            )
        ),
        'level' => Monolog\Logger::DEBUG
    ],
    'gearman' => [
        'timeout' => 1000,
        'servers' => Env::fromJson('IDOS_GEARMAN_SERVERS', [['localhost', 4730]])
    ],
    'db' => [
        'sql' => [
            'driver'    => Env::asString('IDOS_SQL_DRIVER', 'pgsql'),
            'host'      => Env::asString('IDOS_SQL_HOST', 'localhost'),
            'port'      => Env::asInteger('IDOS_SQL_PORT', 5432),
            'database'  => Env::asString('IDOS_SQL_NAME', 'idos-feature'),
            'username'  => Env::asString('IDOS_SQL_USER', 'idos-feature'),
            'password'  => Env::asString('IDOS_SQL_PASS', 'idos-feature'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'options'   => [
                \PDO::ATTR_TIMEOUT    => 5,
                \PDO::ATTR_PERSISTENT => true
            ]
        ]
    ]
];
