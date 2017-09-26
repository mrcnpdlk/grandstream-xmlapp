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


class Font
{
    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    private $oColor;
    /**
     * @var string
     */
    private $sHorizontalAlign;
    /**
     * @var string
     */
    private $sType;

    /**
     * Font constructor.
     */
    public function __construct()
    {
        $this->oColor           = new Color(100);
        $this->sHorizontalAlign = 'left';
        $this->sType            = 'unifont';
    }

    public function setType(string $sType)
    {
        $this->sType = $sType;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->sType;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Color
     */
    public function getColor()
    {
        return $this->oColor;
    }

    /**
     * @return string
     */
    public function getHorizontalAlign()
    {
        return $this->sHorizontalAlign;
    }
}