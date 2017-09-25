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
 * @author Marcin Pudełek <marcin@pudelek.org.pl>
 */

/**
 * Created by Marcin Pudełek <marcin@pudelek.org.pl>
 * Date: 25.09.2017
 * Time: 16:16
 */

namespace mrcnpdlk\Grandstream\XMLApp\Application;


use mrcnpdlk\Grandstream\XMLApp\MyXML;

interface ModelInterface
{

    public function getXml(): MyXML;
}
