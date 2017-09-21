<?php
/**
 * Created by Marcin.
 * Date: 21.09.2017
 * Time: 15:40
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Point;

class DisplayBitmap extends ModelAbstract
{
    /**
     * @var Point
     */
    private $oPoint;
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
        $this->oPoint  = $oPoint ?? new Point(0, 0);
        $this->sBitmap = $sBitmap;
        $this->isFile  = $isFile ? "true" : "false";
        $this->isFlash = "false";

    }

    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayBitmap></DisplayBitmap>');

        $oXml->addAttribute('isfile', $this->isFile);
        $oXml->addAttribute('isflash', $this->isFlash);
        $oXml->addChild('X', $this->oPoint->getX());
        $oXml->addChild('Y', $this->oPoint->getX());
        $oXml->addChild('Bitmap', $this->sBitmap);

        return $oXml;
    }
}
