<?php
/**
 * Created by Marcin.
 * Date: 21.09.2017
 * Time: 15:40
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\Display;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Point;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\DisplayAbstract;

class DisplayBitmap extends DisplayAbstract
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
     * @var string
     */
    private $sBitmap;


    public function __construct(Point $oPoint = null, string $sBitmap, bool $isFile)
    {
        parent::__construct($oPoint);
        $this->sBitmap = $sBitmap;
        $this->isFile  = $isFile ? "true" : "false";
        $this->isFlash = "false";

    }

    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayBitmap></DisplayBitmap>');

        $oXml->addAttribute('isfile', $this->isFile);
        $oXml->addAttribute('isflash', $this->isFlash);
        $oXml->addChild('X', $this->getPoint()->getX());
        $oXml->addChild('Y', $this->getPoint()->getX());
        $oXml->addChild('Bitmap', $this->sBitmap);

        return $oXml;
    }
}
