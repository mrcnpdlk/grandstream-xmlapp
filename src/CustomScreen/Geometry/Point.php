<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry;

/**
 * Class Point
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry
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
