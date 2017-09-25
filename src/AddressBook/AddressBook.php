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

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Contact;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class AddressBook
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook
 */
class AddressBook implements ModelInterface
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
    public function getXml(): MyXML
    {
        $oXml = new MyXML('AddressBook');
        foreach ($this->tContacts as $oContact) {
            $oXml->insertChild($oContact->getXml()->asObject());
        }

        return $oXml;
    }
}
