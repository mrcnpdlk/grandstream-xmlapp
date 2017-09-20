<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook;


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
        $oDom = new \DOMDocument("1.0");

        return $oDom;

    }
}
