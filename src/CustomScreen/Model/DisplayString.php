<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Point;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Rectangle;

/**
 * Class DisplayString
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class DisplayString extends ModelAbstract
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
     * @var string
     */
    private $sString;
    /**
     * Color of the string
     *
     * @var string
     */
    private $sColor;
    /**
     * Color of the background
     *
     * @var string
     */
    private $sBgColor;
    /**
     * @var string
     * @todo nie ma w dokumentacji
     */
    private $sShadowColor;
    /**
     * Font type
     *
     * @var string
     */
    private $sFontType;

    /**
     * @var string
     */
    private $sHorAlign;

    public function __construct(
        Rectangle $oRectangle,
        Point $oPoint,
        string $sString,
        string $sFontType = DisplayString::FONT_UNIFONT,
        string $sHorAlign = DisplayString::HOR_ALIGN_LEFT,
        int $iColorTone = 100,
        int $iBgColorTone = 0
    ) {
        $this->oPoint     = $oPoint;
        $this->oRectangle = $oRectangle;
        $this->sString    = $sString;
        $this->sFontType  = $sFontType;
        $this->sColor     = $this->getMonoColor($iColorTone);
        $this->sBgColor   = $this->getMonoColor($iBgColorTone);
        $this->sHorAlign  = $sHorAlign;

    }

    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayString></DisplayString>');

        $oXml->addAttribute('font', $this->sFontType);
        $oXml->addAttribute('width', $this->oRectangle->getWidth());
        $oXml->addAttribute('height', $this->oRectangle->getHeight());
        $oXml->addAttribute('halign', $this->sHorAlign);
        $oXml->addAttribute('color', $this->sColor);
        $oXml->addAttribute('bgcolor', $this->sBgColor);
        $oXml->addAttribute('renew-rate', 'second');
        $oXml->addAttribute('isrenew', 'true');
        $oXml->addChild('X', $this->oPoint->getX());
        $oXml->addChild('Y', $this->oPoint->getX());
        $oXml->addChild('DisplayStr', $this->sString);
        $oXml->addChild('displayCondition')->addChild('conditionType', DisplayString::COND_TYPE_ALWAYS);

        return $oXml;
    }
}
