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

namespace mrcnpdlk\Grandstream\XMLApp\Helper;

/**
 * Class Point
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Helper
 */
class Point
{
    /**
     * @var int
     */
    private $iX;
    /**
     * @var int
     */
    private $iY;

    /**
     * Point constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->iX = $x;
        $this->iY = $y;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->iX;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->iY;
    }

    public function move(Vector $oVector)
    {
        $this->iX += $oVector->getDeltaX();
        $this->iY += $oVector->getDeltaY();

        return $this;
    }
}
