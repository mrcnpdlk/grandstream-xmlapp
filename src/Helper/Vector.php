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
 * Class Vector
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Helper
 */
class Vector
{
    /**
     * @var integer
     */
    private $iX;
    /**
     * @var integer
     */
    private $iY;

    /**
     * Vector constructor.
     *
     * @param int $iX
     * @param int $iY
     */
    public function __construct(int $iX, int $iY)
    {
        $this->iX = $iX;
        $this->iY = $iY;
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return sqrt(pow($this->getDeltaX(), 2) + pow($this->getDeltaY(), 2));
    }

    /**
     * @return int
     */
    public function getDeltaX()
    {
        return $this->iX;
    }

    /**
     * @return int
     */
    public function getDeltaY()
    {
        return $this->iY;
    }
}