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

use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\Container;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayRectangle;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayString;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\Select;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Event;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\SoftKey;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\View;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;

require __DIR__ . '/../vendor/autoload.php';

$oView = new View();

$oContainer = new Container();

$oString_1 = new DisplayString('First line');
$oString_2 = new DisplayString('Second line');
$oString_2->move(0, 10);

$oContainer->addElement($oString_1)
           ->addElement($oString_2)
           ->move(0, 60)
;

$oView->addContainer($oContainer);

$oSelect = new Select('select_1');
$oSelect->setStyles((new  Styles(100))
    ->setColorBg(new Color(100))
    ->setColor(new Color(0))
    ->setColorBorder(new Color(30))
)
        ->addItem('one', 1)
        ->addItem('two', 2)
        ->addItem('three', 3)
        ->move(0, 20)
;
$oView->addSelect($oSelect);


$oSelect = new Select('select_2');
$oSelect->setStyles(new  Styles(100))
        ->addItem('apple', 1)
        ->addItem('orange', 2)
        ->addItem('lemon', 3)
        ->move(0, 40)
;
$oView->addSelect($oSelect);


$oView->addRectangle(new DisplayRectangle(10, 10));
$oView->addSoftkey(new SoftKey(ModelConstant::ACTION_QUIT_APP, 'Wyjscie'));

$oEvent = new Event(ModelConstant::STATE_OFFHOOK, ModelConstant::ACTION_DIAL, '299');
$oView->addEvent($oEvent);
header('Content-type: application/xml; charset="utf-8"');

echo $oView->asTxt();

