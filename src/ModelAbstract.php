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

namespace mrcnpdlk\Grandstream\XMLApp;


class ModelAbstract
{
    /**
     * @return string
     */
    public function asText()
    {
            $dom                     = $this->get();
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput       = true;

            return $dom->saveXML();
    }

    /**
     * @return \DOMDocument
     */
    public function get()
    {
        $oDom = new \DOMDocument("1.0","UTF-8");

        return $oDom;

    }
}
