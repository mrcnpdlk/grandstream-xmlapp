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

class DisplayRectangle extends DisplayAbstract
{

    public function __construct(
        Rectangle $oRectangle,
        Point $oPoint = null,
        int $iBorderColorTone = 100,
        int $iBgColorTone = null,
        int $iColorTone = null
    ) {
        parent::__construct($oPoint, $oRectangle);
        $this->setColorBg($iBgColorTone);
        $this->setColorBorder($iBorderColorTone);
        $this->setColorFont($iColorTone);
    }

    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayRectangle></DisplayRectangle>');

        $oXml->addAttribute('x', $this->getPoint()->getX());
        $oXml->addAttribute('y', $this->getPoint()->getY());
        $oXml->addAttribute('width', $this->getRectangle()->getWidth());
        $oXml->addAttribute('height', $this->getRectangle()->getHeight());
        $oXml->addAttribute('bgcolor', $this->getColorBg());
        $oXml->addAttribute('border-color', $this->getColorBorder());
        $oXml->addAttribute('color', $this->getColorFont());

        return $oXml;
    }
}
