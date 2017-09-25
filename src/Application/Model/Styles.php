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

namespace mrcnpdlk\Grandstream\XMLApp\Application\Model;


use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

class Styles implements ModelInterface
{
    /**
     * @var Point
     */
    private $oPoint;
    /**
     * @var integer
     */
    private $iWidth;
    /**
     * @var Color
     */
    private $oColorBg;
    /**
     * @var Color
     */
    private $oColorBorder;

    /**
     * Styles constructor.
     *
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Point $oPoint
     * @param int                                       $iWidth
     */
    public function __construct(Point $oPoint, int $iWidth)
    {
        $this->oPoint = $oPoint;
        $this->iWidth = $iWidth;
    }

    /**
     * @param Color $oColor
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles
     */
    public function setColorBg(Color $oColor)
    {
        $this->oColorBg = $oColor;

        return $this;
    }

    /**
     * @param Color $oColor
     *
     * @return $this
     */
    public function setColorBorder(Color $oColor)
    {
        $this->oColorBorder = $oColor;

        return $this;
    }

    public function getXml(): MyXML
    {
        $oXml = new MyXML('styles');
        $oXml->asObject()->addAttribute('pos_x', $this->oPoint->getX());
        $oXml->asObject()->addAttribute('pos_y', $this->oPoint->getY());
        $oXml->setWidth($this->iWidth);
        $oXml->setColorBg($this->getColorBg()->get());
        $oXml->setColorBorder($this->getColorBorder()->get());

        return $oXml;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    public function getColorBg()
    {
        return $this->oColorBg ?? new Color(20);
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    public function getColorBorder()
    {
        return $this->oColorBorder ?? new Color(100);
    }
}
