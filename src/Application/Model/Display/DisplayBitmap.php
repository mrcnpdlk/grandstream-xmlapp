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

namespace mrcnpdlk\Grandstream\XMLApp\Application\Model\Display;


use mrcnpdlk\Grandstream\XMLApp\Application\Model\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Bitmap;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

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
    public function getXml() : MyXML
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
