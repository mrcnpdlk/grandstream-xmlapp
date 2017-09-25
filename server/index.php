<?php
/**
 * Grandstream-XMLApp
 *
 * Copyright (c) 2017 pudelek.org.pl
 *
 * @license MIT License (MIT)
 *
 * For the full copyright and license information, please view source file
 * that is bundled with this package in the file LICENSE
 *
 * @author  Marcin Pudełek <marcin@pudelek.org.pl>
 */

require __DIR__ . '/../vendor/autoload.php';

$oApp = new \mrcnpdlk\Grandstream\XMLApp\App();

$oInstanceCacheRedis = new \phpFastCache\Helper\Psr16Adapter(
    'redis',
    [
        "host"                => null, // default localhost
        "port"                => null, // default 6379
        'defaultTtl'          => 3600 * 24, // 24h
        'ignoreSymfonyNotice' => true,
    ]);


$oInstanceLogger = new \Monolog\Logger('XMLAPP');
$oInstanceLogger->pushHandler(new \Monolog\Handler\ErrorLogHandler(
        \Monolog\Handler\ErrorLogHandler::SAPI,
        \Psr\Log\LogLevel::DEBUG
    )
);

$oApp->setCacheInstance($oInstanceCacheRedis)
     ->setLoggerInstance($oInstanceLogger)
;

$oApp->getLogger()->debug('request',$_SERVER);
$oApp->getLogger()->debug('request',$_REQUEST);

echo file_get_contents(__DIR__ . '/index.xml');