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

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;


/**
 * Class Contact
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Contact implements ModelInterface
{
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string|null
     */
    private $firstName = null;
    /**
     * @var Address|null
     */
    private $oAddress = null;
    /**
     * @var Phone
     */
    private $oPhone;
    /**
     * @var string|null
     */
    private $email = null;
    /**
     * @var string|null
     */
    private $department = null;
    /**
     * @var string|null
     */
    private $company = null;
    /**
     * Base64 string
     *
     * @var string|null
     */
    private $icon = null;

    public function __construct(string $lastName, Phone $oPhone)
    {
        $this->lastName = $lastName;
        $this->oPhone   = $oPhone;
    }

    public function setOAddress(Address $oAddress)
    {
        $this->oAddress = $oAddress;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Contact');
        $oXml->asObject()->addChild('LastName', $this->lastName);
        $oXml->asObject()->addChild('FirstName', $this->firstName);
        $oXml->asObject()->addChild('Email', $this->email);
        $oXml->asObject()->addChild('Department', $this->department);
        $oXml->asObject()->addChild('Company', $this->company);
        $oXml->asObject()->addChild('Icon', $this->icon);


        $oXml->insertChild($this->oPhone->getXml()->asObject());

        if ($this->oAddress) {
            $oXml->insertChild($this->oAddress->getXml()->asObject());
        }


        return $oXml;
    }


}
