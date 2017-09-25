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

class Contents implements ModelInterface
{

    public function getXml(): MyXML
    {
        $oXml = new MyXML('Contents');

        return $oXml;
    }
}