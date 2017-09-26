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
use mrcnpdlk\Grandstream\XMLApp\Helper\Vector;
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
     * @var Color
     */
    private $oColor;

    /**
     * Styles constructor.
     *
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Point $oPoint
     * @param int                                       $iWidth
     */
    public function __construct(int $iWidth = null, Point $oPoint = null)
    {
        $this->oPoint = $oPoint ?? new Point(0, 0);
        $this->iWidth = $iWidth ?? 123;
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

    /**
     * Font color
     *
     * @param Color $oColor
     *
     * @return $this
     */
    public function setColor(Color $oColor)
    {
        $this->oColor = $oColor;

        return $this;
    }

    public function getXml(): MyXML
    {
        $oXml = new MyXML('styles');
        $oXml->asObject()->addAttribute('pos_x', $this->getPoint()->getX());
        $oXml->asObject()->addAttribute('pos_y', $this->getPoint()->getY());
        $oXml->setWidth($this->iWidth);
        $oXml->setColor($this->getColor()->get());
        $oXml->setColorBg($this->getColorBg()->get());
        $oXml->setColorBorder($this->getColorBorder()->get());

        return $oXml;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Point
     */
    public function getPoint()
    {
        return $this->oPoint;
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

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    public function getColor()
    {
        return $this->oColor ?? new Color(100);
    }

    /**
     * @param int $iX
     * @param int $iY
     *
     * @return $this
     */
    public function move(int $iX, int $iY)
    {
        $this->getPoint()->move(new Vector($iX, $iY));

        return $this;
    }
}
