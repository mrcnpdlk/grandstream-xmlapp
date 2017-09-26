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

/**
 * Class Container
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model\Components
 */
class Container
{

    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ComponentInterface[]
     */
    private $tElements = [];

    public function __construct()
    {
    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ComponentInterface $oElement
     *
     * @return $this
     */
    public function addElement(ComponentInterface $oElement)
    {
        $this->tElements[] = $oElement;

        return $this;
    }

    /**
     * @param int $iX
     * @param int $iY
     *
     * @return $this
     */
    public function move(int $iX, int $iY)
    {
        foreach ($this->tElements as $element) {
            $element->move($iX, $iY);
        }

        return $this;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ComponentInterface[]
     */
    public function getElements()
    {
        return $this->tElements;
    }
}