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
 * @author Marcin Pudełek <marcin@pudelek.org.pl>
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\Display;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Point;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\DisplayAbstract;

/**
 * Class DisplayString
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class DisplayString extends DisplayAbstract
{

    /**
     * @var string
     */
    private $sString;
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

    /**
     * DisplayString constructor.
     *
     * @param Rectangle $oRectangle
     * @param Point     $oPoint
     * @param string    $sString
     */
    public function __construct(Rectangle $oRectangle, Point $oPoint, string $sString)
    {
        parent::__construct($oPoint, $oRectangle);
        $this->sString = $sString;
        $this->setFont();

    }

    /**
     * @param string $type
     * @param string $align
     * @param int    $color
     * @param int    $bgColor
     */
    public function setFont(string $type = DisplayString::FONT_UNIFONT, string $align = DisplayString::HOR_ALIGN_LEFT, int $color = 100, int $bgColor = 0)
    {
        $this->sFontType = $type;
        $this->sHorAlign = $align;
        $this->setColorFont($color);
        $this->setColorBg($bgColor);
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayString></DisplayString>');

        $oXml->addAttribute('font', $this->sFontType);
        $oXml->addAttribute('width', $this->getRectangle()->getWidth());
        $oXml->addAttribute('height', $this->getRectangle()->getHeight());
        $oXml->addAttribute('halign', $this->sHorAlign);
        $oXml->addAttribute('color', $this->getColorFont());
        $oXml->addAttribute('bgcolor', $this->getColorBg());
        $oXml->addAttribute('renew-rate', 'second');
        $oXml->addAttribute('isrenew', 'true');
        $oXml->addChild('X', $this->getPoint()->getX());
        $oXml->addChild('Y', $this->getPoint()->getX());
        $oXml->addChild('DisplayStr', $this->sString);
        $oXml->addChild('displayCondition')->addChild('conditionType', DisplayString::COND_TYPE_ALWAYS);

        return $oXml;
    }
}
