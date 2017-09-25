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
}
