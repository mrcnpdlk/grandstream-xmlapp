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


use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\Helper\Vector;

/**
 * Class ElemAbstract
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model\Display
 */
class ElemAbstract
{
    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\Helper\Point
     */
    protected $oPoint;
    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle
     */
    protected $oRectangle;
    /**
     * @var Color
     */
    protected $oColorBg;
    /**
     * @var Color
     */
    protected $oColorBorder;


    /**
     * ElemAbstract constructor.
     *
     * @param Point|null     $oPoint
     * @param Rectangle|null $oRectangle
     */
    public function __construct(Point $oPoint = null, Rectangle $oRectangle = null)
    {
        $this->oPoint     = $oPoint ?? new Point(0, 0);
        $this->oRectangle = $oRectangle ?? new Rectangle(0, 0);
    }

    /**
     * @return Rectangle
     */
    public function getRectangle()
    {
        return $this->oRectangle;
    }

    /**
     * @param Color $oColor
     *
     * @return $this
     */
    public function setColorBg(Color $oColor)
    {
        $this->oColorBg = $oColor;

        return $this;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    public function getColorBg()
    {
        return $this->oColorBg ?? new Color();
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
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    public function getColorBorder()
    {
        return $this->oColorBorder ?? new Color(100);
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

    /**
     * @return Point
     */
    public function getPoint()
    {
        return $this->oPoint;
    }
}
