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
use mrcnpdlk\Grandstream\XMLApp\AddressBook\Model\Phone;

class View
{
    /**
     * @var AddressBook
     */
    private $oAddressBook;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->oAddressBook = new AddressBook();
    }

    /**
     * @param string      $lastName
     * @param string      $number
     * @param string|null $firstName
     * @param int         $iAccountId
     *
     * @return $this
     */
    public function addContact(string $lastName, string $number, string $firstName = null, int $iAccountId = 1)
    {
        $this->oAddressBook->addContact(new Contact($lastName, new Phone($number, $iAccountId)));

        return $this;
    }

    /**
     * @return string
     */
    public function asTxt()
    {
        return $this->oAddressBook->getXml()->asText();
    }
}
