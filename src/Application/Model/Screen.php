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


use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class Screen
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model
 */
class Screen implements ModelInterface
{

    /**
     * Main customization area for XML application content and softkeys
     *
     * @var Page
     */
    private $oPage;

    public function __construct(Page $oPage)
    {
        $this->setPage($oPage);
    }

    /**
     * @param Page $oPage
     *
     * @return Screen
     */
    public function setPage(Page $oPage)
    {
        $this->oPage = $oPage;

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Page');
        $oXml->insertChild($this->getPage()->getXml()->asObject());

        return $oXml;
    }

    /**
     * @return Page
     */
    public function getPage()
    {
        return $this->oPage;
    }
}
