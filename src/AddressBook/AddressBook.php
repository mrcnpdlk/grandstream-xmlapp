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
