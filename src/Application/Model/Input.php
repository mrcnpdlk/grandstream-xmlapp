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


use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class Input
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model
 */
class Input implements ModelInterface
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
     * Input constructor.
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
    }

    /**
     * @param string $sDataType
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Input
     */
    public function setDataType(string $sDataType = ModelConstant::DATATYPE_STRING)
    {
        $this->sDataType = $sDataType;

        return $this;
    }

    /**
     * @param int $iMaxLength
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Input
     */
    public function setMaxLength(int $iMaxLength)
    {
        $this->iMaxLength = $iMaxLength;

        return $this;
    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles $oStyles
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Input
     */
    public function setStyles(Styles $oStyles)
    {
        $this->oStyles = $oStyles;

        return $this;
    }

    /**
     * @param string $sGroupName
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Input
     */
    public function setGroupName(string $sGroupName)
    {
        $this->sGroupName = $sGroupName;

        return $this;
    }

    /**
     * @param string $sLabel
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Input
     */
    public function setLabel(string $sLabel)
    {
        $this->sLabel = $sLabel;

        return $this;

    }

    /**
     * @param bool $isSelected
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Input
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
            $oXml->insertChild($this->oStyles->getXml()->asObject());
        }


        return $oXml;
    }
}
