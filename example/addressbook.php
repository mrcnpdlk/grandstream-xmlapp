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


use mrcnpdlk\Grandstream\XMLApp\AddressBook\View;

require __DIR__ . '/../vendor/autoload.php';

$oView = new View();

$oView->addContact('Doe', '123123123', 'John');
$oView->addContact('Nowak', '456456456');

header('Content-type: application/xml; charset="utf-8"');

echo $oView->asTxt();

