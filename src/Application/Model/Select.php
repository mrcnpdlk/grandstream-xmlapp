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

use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

class Select implements ModelInterface
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

    public function __construct(string $sName)
    {
        $this->sName = $sName;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('select');
        $oXml->setName($this->sName);
        if ($this->oStyles) {
            $oXml->insertChild($this->oStyles->getXml()->asObject());
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
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles $oStyles
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Select
     */
    public function setStyles(Styles $oStyles)
    {
        $this->oStyles = $oStyles;

        return $this;
    }

    /**
     * @param string $sName
     * @param string $sValue
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Select
     */
    public function addItem(string $sName, string $sValue)
    {
        $this->tItems[] = [
            'name'  => $sName,
            'value' => $sValue,
        ];

        return $this;
    }
}
