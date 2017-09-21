<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Contact;
use mrcnpdlk\Grandstream\XMLApp\ElementAbstract;

/**
 * Class AddressBook
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook
 */
class AddressBook extends ElementAbstract
{

    /**
     * @var Contact[]
     */
    private $tContacts = [];


    /**
     * @param Contact $oContact
     *
     * @return AddressBook
     */
    public function addContact(Contact $oContact)
    {
        $this->tContacts[] = $oContact;

        return $this;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXmlObject()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><AddressBook></AddressBook>');
        foreach ($this->tContacts as $contact) {
            static::xml_adopt($oXml, $contact->getXmlObject());
        }

        return $oXml;
    }
}
