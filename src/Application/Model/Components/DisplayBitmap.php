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

namespace mrcnpdlk\Grandstream\XMLApp\Application\Model\Components;


use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Bitmap;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class DisplayBitmap
 *
 * This element is to display a bitmap picture on the screen. Inside the <Bitmap> tag of the XML document,
 * the picture must be encoded in base64 format already. There are plenty of base64 encoder online
 * provided for encoding the .bmp picture. Please make sure the original .bmp picture is in monochrome grey
 * level 8 before encoding
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model\Components
 */
class DisplayBitmap extends DisplayAbstract implements ModelInterface
{
    /**
     * @var boolean
     */
    private $isFile;
    /**
     * @var boolean
     */
    private $isFlash;
    /**
     * @var Bitmap
     */
    private $oBitmap;

    /**
     * DisplayBitmap constructor.
     *
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Point|null $oPoint
     * @param Bitmap                                         $oBitmap
     */
    public function __construct(Point $oPoint = null, Bitmap $oBitmap)
    {
        parent::__construct($oPoint);
        $this->oBitmap = $oBitmap;
        $this->isFile  = "false";
        $this->isFlash = "false";

    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('DisplayBitmap');

        $oXml->asObject()->addAttribute('isfile', $this->isFile);
        $oXml->asObject()->addAttribute('isflash', $this->isFlash);
        $oXml->asObject()->addChild('X', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Y', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Bitmap', $this->oBitmap->get());

        return $oXml;
    }
}
