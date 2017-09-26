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

use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayRectangle;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayString;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\Select;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\SoftKey;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\View;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;

require __DIR__ . '/../vendor/autoload.php';

$oView = new View();

$oView->addString(new DisplayString(new Rectangle(50, 0), null, 'Ala ma kota a kot ma ale'));
$oView->addString(
    (new DisplayString(new Rectangle(50, 0), new Point(0, 0), 'Druga linia'))->setFont(ModelConstant::FONT_BOLD,
        ModelConstant::HORIZONTAL_ALIGN_RIGHT)
);

$oSelect = new Select('selektor');
$oSelect->setStyles(new  \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles(
    new Point(0, 40),
    150
));
$oSelect->addItem('jeden', 1);
$oSelect->addItem('dwa', 2);
$oSelect->addItem('trzy', 3);
$oView->addSelect($oSelect);


$oSelect = new Select('selektor2');
$oSelect->setStyles(new  \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles(
    new Point(0, 60),
    150
));
$oSelect->addItem('jeden', 1);
$oSelect->addItem('dwa', 2);
$oSelect->addItem('trzy', 3);
$oView->addSelect($oSelect);


$oView->addRectangle(
    (new DisplayRectangle(
        new Rectangle(20, 20),
        new Point(0, 80)
    ))->setColorBg(new Color(50))
);

$oView->addSoftkey(new SoftKey(ModelConstant::ACTION_QUIT_APP, 'Wyjscie'));

error_log(print_r($oView->asTxt(), true));

header('Content-type: application/xml; charset="utf-8"');

echo $oView->asTxt();

