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

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\Components;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class DisplayString
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class DisplayString extends DisplayAbstract implements ModelInterface
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
     * @param string     $type
     * @param string     $align
     * @param Color|null $oFontColor
     * @param Color|null $oBgColor
     */
    public function setFont(
        string $type = ModelConstant::FONT_UNIFONT,
        string $align = ModelConstant::HORIZONTAL_ALIGN_LEFT,
        Color $oFontColor = null,
        Color $oBgColor = null
    ) {
        $this->sFontType = $type;
        $this->sHorAlign = $align;
        $this->setColorFont($oFontColor ?? new Color(100));
        $this->setColorBg($oBgColor ?? new Color(0));
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('DisplayString');

        $oXml->asObject()->addAttribute('font', $this->sFontType);
        $oXml->asObject()->addAttribute('width', $this->getRectangle()->getWidth());
        $oXml->asObject()->addAttribute('height', $this->getRectangle()->getHeight());
        $oXml->asObject()->addAttribute('halign', $this->sHorAlign);
        $oXml->asObject()->addAttribute('color', $this->getColorFont()->get());
        $oXml->asObject()->addAttribute('bgcolor', $this->getColorBg()->get());
        $oXml->asObject()->addAttribute('renew-rate', 'second');
        $oXml->asObject()->addAttribute('isrenew', 'true');
        $oXml->asObject()->addChild('X', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Y', $this->getPoint()->getX());
        $oXml->asObject()->addChild('DisplayStr', $this->sString);
        $oXml->asObject()->addChild('displayCondition')->addChild('conditionType', ModelConstant::COND_TYPE_ALWAYS);

        return $oXml;
    }
}
