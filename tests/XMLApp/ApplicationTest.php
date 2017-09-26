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


use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemInput;

class ApplicationTest extends TestCase
{
    public function testComponentElemInput()
    {
        $oInput = new ElemInput('elem_input');
        $this->assertEquals(true, is_string($oInput->getXml()->asText()));
    }
}
