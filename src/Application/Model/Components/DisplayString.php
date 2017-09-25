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

use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class DisplayString
 *
 * This element is used for displaying string information on the screen
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
    public function __construct(Rectangle $oRectangle, Point $oPoint = null, string $sString)
    {
        parent::__construct($oPoint, $oRectangle);
        $this->sString = $sString;
        $this->setFont();

    }

    /**
     * @param string|null                                    $type
     * @param string|null                                    $align
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Color|null $oColor
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Color|null $oColorBg
     */
    public function setFont(
        string $type = null,
        string $align = null,
        Color $oColor = null,
        Color $oColorBg = null
    ) {
        $this->sFontType = $type ?? ModelConstant::FONT_UNIFONT;
        $this->sHorAlign = $align ?? ModelConstant::HORIZONTAL_ALIGN_LEFT;
        $this->setColorFont($oColor ?? new Color(100));
        $this->setColorBg($oColorBg ?? new Color(0));
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

        return $oXml;
    }
}
