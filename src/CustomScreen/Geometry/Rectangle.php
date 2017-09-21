<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry;

/**
 * Class Rectangle
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry
 */
class Rectangle
{
    /**
     * @var int
     */
    private $iWidth;
    /**
     * @var int
     */
    private $iHeight;

    /**
     * Rectangle constructor.
     *
     * @param int $w
     * @param int $h
     */
    public function __construct(int $w, int $h)
    {
        $this->iWidth  = $w;
        $this->iHeight = $h;
    }

    /**
     * @return int
     */
    public function getArea()
    {
        return $this->getHeight() * $this->getWidth();
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->iHeight;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->iWidth;
    }
}
