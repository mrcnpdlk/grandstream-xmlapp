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
use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class ElemSelect
 *
 * This element is to render selection list fields on screen so that users could choose the answer to submit or
 * proceed. "name=value" will be passed to the query. The text for <item> element is the displayed option for
 * the list
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model\Components
 */
class ElemSelect implements ModelInterface, ElemInterface
{
    /**
     * A unique id for the select field
     *
     * @var string
     */
    private $sName;
    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles
     */
    private $oStyles;

    /**
     * @var array
     */
    private $tItems;

    /**
     * ElemSelect constructor.
     *
     * @param string $sName
     */
    public function __construct(string $sName)
    {
        $this->sName = $sName;
        $this->setStyles();
    }

    /**
     * @param Styles $oStyles
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemSelect
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
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('select');
        $oXml->setName($this->sName);
        if ($this->oStyles) {
            $oXml->insertChild($this->getStyles()->getXml()->asObject());
        }
        $oItems = new MyXML('items');
        foreach ($this->tItems as $item) {
            $oItem = new MyXML('item');
            $oItem->asObject()->addAttribute('value', $item['value']);
            $oItem->asObject()[0] = $item['name'];
            $oItems->insertChild($oItem->asObject());
        }
        $oXml->insertChild($oItems->asObject());

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
     * @param string $sName
     * @param string $sValue
     *
     * @return ElemSelect
     */
    public function addItem(string $sName, string $sValue)
    {
        $this->tItems[] = [
            'name'  => $sName,
            'value' => $sValue,
        ];

        return $this;
    }

    /**
     * @param int $iX
     * @param int $iY
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemSelect
     */
    public function move(int $iX, int $iY)
    {
        $this->getStyles()->move($iX, $iY);

        return $this;
    }
}
