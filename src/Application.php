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


namespace mrcnpdlk\Grandstream\XMLApp;


class Application
{

    /**
     * @var \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    private $oMyXml;

    public function __construct()
    {
        $this->oMyXml = new MyXML('Screen');
    }

    public function setLeftStatusBar()
    {
    }

    public function setSoftkeyBar()
    {
    }

    public function setPage()
    {
    }

    public function setEvents()
    {
    }
}