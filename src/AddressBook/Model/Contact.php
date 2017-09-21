<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;

use mrcnpdlk\Grandstream\XMLApp\ElementAbstract;

/**
 * Class Contact
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Contact extends ElementAbstract
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
    private $address = null;
    /**
     * @var Phone
     */
    private $phone;
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
        $this->phone    = $oPhone;
    }

    public function setAddress(Address $oAddress)
    {
        $this->address = $oAddress;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXmlObject()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Contact></Contact>');
        $oXml->addChild('LastName', $this->lastName);
        $oXml->addChild('FirstName', $this->firstName);
        $oXml->addChild('Email', $this->email);
        $oXml->addChild('Department', $this->department);
        $oXml->addChild('Company', $this->company);
        $oXml->addChild('Icon', $this->icon);

        static::xml_adopt($oXml, $this->phone->getXmlObject());

        if ($this->address) {
            static::xml_adopt($oXml, $this->address->getXmlObject());
        } else {
            $oXml->addChild('Address');
        }


        return $oXml;
    }


}
