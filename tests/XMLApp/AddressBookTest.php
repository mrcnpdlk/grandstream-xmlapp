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

use mrcnpdlk\Grandstream\XMLApp\AddressBook\AddressBook;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Address;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Contact;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Phone;
use mrcnpdlk\Grandstream\XMLApp\AddressBook\View;

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

        $this->assertEquals(true, is_string($oAddressBook->getXml()->asText()));
    }

    public function testView(){
        $oView = new View();

        $oView->addContact('Doe', '123123123', 'John');
        $oView->addContact('Nowak', '456456456');

        $this->assertEquals(true, is_string($oView->asTxt()));

    }

}
