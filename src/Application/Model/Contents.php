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

use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemInterface;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

class Contents implements ModelInterface
{

    /**
     * @var ModelInterface[]
     */
    private $tElements = [];

    /**
     * Contents constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemInterface $oElement
     *
     * @return Contents
     */
    public function addElement(ElemInterface $oElement)
    {
        $this->tElements[] = $oElement;

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Contents');
        foreach ($this->tElements as $oElement) {
            $oXml->insertChild($oElement->getXml()->asObject());
        }

        return $oXml;
    }
}
