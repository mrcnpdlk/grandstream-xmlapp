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

use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemRectangle;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemSelect;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemString;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Container;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Event;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\SoftKey;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\View;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;

require __DIR__ . '/../vendor/autoload.php';

$oView = new View();

// first container

$oContainer_1 = new Container();

$oString_1 = new ElemString('First line');
$oString_2 = new ElemString('Second line');
$oString_2->move(0, 10);

$oContainer_1->addElement($oString_1)
             ->addElement($oString_2)
             ->move(0, 60)
;

$oView->addContainer($oContainer_1);

// second Container

$oContainer_2 = new Container();

$oSelect_1 = new ElemSelect('select_1');
$oSelect_1->setStyles((new  Styles(100))
    ->setColorBg(new Color(100))
    ->setColor(new Color(0))
    ->setColorBorder(new Color(30))
)
          ->addItem('one', 1)
          ->addItem('two', 2)
          ->addItem('three', 3)
;


$oSelect_2 = new ElemSelect('select_2');
$oSelect_2->setStyles(new  Styles(100))
          ->addItem('apple', 1)
          ->addItem('orange', 2)
          ->addItem('lemon', 3)
          ->move(0, 20)
;

$oContainer_2
    ->addElement($oSelect_1)
    ->addElement($oSelect_2)
    ->move(0, 20)
;
$oView->addContainer($oContainer_2);



$oView->addElem(new ElemRectangle(10, 10));
$oView->addSoftkey(new SoftKey(ModelConstant::ACTION_QUIT_APP, 'Wyjscie'));

$oEvent = new Event(ModelConstant::STATE_OFFHOOK, ModelConstant::ACTION_DIAL, '299');
$oView->addEvent($oEvent);

$oView->setVisibleStatusLine(false);

header('Content-type: application/xml; charset="utf-8"');

echo $oView->asTxt();

