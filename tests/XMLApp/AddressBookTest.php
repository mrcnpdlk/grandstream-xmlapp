<?php

namespace mrcnpdlk\Grandstream\XMLApp;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\AddressBook;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Address;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Contact;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Phone;

class AddressBookTest extends TestCase
{

    public function testAddressBook()
    {
        $oPhone   = new Phone('123', 1);
        $oContact = new Contact('sss', $oPhone);
        $oAddress = new Address('ul. Krucza');
        $oContact->setAddress($oAddress);
        $oAddressBook = new AddressBook();
        $oAddressBook->addContact($oContact)->addContact($oContact);

        $this->assertEquals(true, is_string($oAddressBook->getTxt()));
    }

}
