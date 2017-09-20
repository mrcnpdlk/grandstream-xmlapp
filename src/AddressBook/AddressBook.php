<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Contact;

/**
 * Class AddressBook
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook
 */
class AddressBook extends ModelAbstract
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
     * @return \DOMDocument
     */
    public function get()
    {
        $root     = new \DOMDocument();
        $nodeElem = $root->createElement('AddressBook');
        $root->appendChild($nodeElem);

        foreach ($this->tContacts as $contact) {
            $nodeContact = $root->importNode($contact->get()->documentElement, true);
            $root->documentElement->appendChild($nodeContact);
        }

        return $root;
    }
}
