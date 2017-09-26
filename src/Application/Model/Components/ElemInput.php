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


use mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class ElemInput
 *
 * This element is to render input fields on screen so that users could enter necessary information to submit
 * or proceed
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model
 */
class ElemInput implements ModelInterface, ElemInterface
{
    /**
     * @var string
     */
    private $sName;
    /**
     * @var string
     */
    private $sValue;
    /**
     * @var string
     */
    private $sType;
    /**
     * @var string
     */
    private $sDataType;
    /**
     * @var integer
     */
    private $iMaxLength;
    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles
     */
    private $oStyles;
    /**
     * Only for Radio
     *
     * @var string
     */
    private $sGroupName;
    /**
     * Only for Radio
     *
     * @var boolean
     */
    private $isSelected;
    /**
     * Only for Radio & CheckBox
     *
     * @var string
     */
    private $sLabel;

    /**
     * ElemInput constructor.
     *
     * @param string      $sName
     * @param string|null $sValue
     * @param string      $sType
     */
    public function __construct(string $sName, string $sValue = null, string $sType = ModelConstant::TYPE_TEXT)
    {
        $this->sName  = $sName;
        $this->sValue = $sValue;
        $this->sType  = $sType;
        $this->setDataType();
        $this->setStyles();
    }

    /**
     * @param string $sDataType
     *
     * @return ElemInput
     */
    public function setDataType(string $sDataType = ModelConstant::DATATYPE_STRING)
    {
        $this->sDataType = $sDataType;

        return $this;
    }

    /**
     * @param Styles $oStyles
     *
     * @return ElemInput
     */
    public function setStyles(Styles $oStyles = null)
    {
        if (is_null($oStyles)) {
            $oStyles = new Styles();
        }
        $this->oStyles = $oStyles;

        return $this;
    }

    /**
     * @param int $iMaxLength
     *
     * @return ElemInput
     */
    public function setMaxLength(int $iMaxLength)
    {
        $this->iMaxLength = $iMaxLength;

        return $this;
    }

    /**
     * @param string $sGroupName
     *
     * @return ElemInput
     */
    public function setGroupName(string $sGroupName)
    {
        $this->sGroupName = $sGroupName;

        return $this;
    }

    /**
     * @param string $sLabel
     *
     * @return ElemInput
     */
    public function setLabel(string $sLabel)
    {
        $this->sLabel = $sLabel;

        return $this;

    }

    /**
     * @param bool $isSelected
     *
     * @return ElemInput
     */
    public function setSelected(bool $isSelected = true)
    {
        $this->isSelected = $isSelected;

        return $this;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('input');
        $oXml->asObject()->addAttribute('name', $this->sName);
        $oXml->asObject()->addAttribute('value', $this->sValue);
        $oXml->asObject()->addAttribute('type', $this->sType);
        if ($this->oStyles) {
            $oXml->insertChild($this->getStyles()->getXml()->asObject());
        }


        return $oXml;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles
     */
    public function getStyles()
    {
        return $this->oStyles;
    }

    /**
     * @param int $iX
     * @param int $iY
     *
     * @return $this
     */
    public function move(int $iX, int $iY)
    {
        $this->getStyles()->move($iX, $iY);

        return $this;
    }
}
