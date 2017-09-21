<?php
/**
 * Created by Marcin.
 * Date: 21.09.2017
 * Time: 15:40
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Point;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Rectangle;

class DisplayRectangle extends ModelAbstract
{
    /**
     * @var Point
     */
    private $oPoint;
    /**
     * @var Rectangle
     */
    private $oRectangle;
    /**
     * Border color
     *
     * @var string
     */
    private $borderColor;
    /**
     * Background color
     *
     * @var string
     */
    private $bgColor;
    /**
     * @var string
     */
    private $color;
    /**
     * @var string
     * @todo nie ma w dokumentacji
     */
    private $sShadowColor;

    public function __construct(
        Rectangle $oRectangle,
        Point $oPoint = null,
        int $iBorderColorTone = 100,
        int $iBgColorTone = null,
        int $iColorTone = null
    ) {
        $this->oPoint      = $oPoint ?? new Point(0, 0);
        $this->oRectangle  = $oRectangle;
        $this->borderColor = $this->getMonoColor($iBorderColorTone);
        $this->bgColor     = $this->getMonoColor($iBgColorTone);
        $this->color       = $this->getMonoColor($iColorTone);
    }

    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayRectangle></DisplayRectangle>');

        $oXml->addAttribute('x', $this->oPoint->getX());
        $oXml->addAttribute('y', $this->oPoint->getY());
        $oXml->addAttribute('width', $this->oRectangle->getWidth());
        $oXml->addAttribute('height', $this->oRectangle->getHeight());
        $oXml->addAttribute('bgcolor', $this->bgColor);
        $oXml->addAttribute('border-color', $this->borderColor);
        $oXml->addAttribute('color', $this->color);

        return $oXml;
    }
}
