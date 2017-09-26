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

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;


/**
 * Class Address
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Address implements ModelInterface
{
    /**
     * @var string
     */
    private $address_1;
    /**
     * @var string|null
     */
    private $address_2;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $state;
    /**
     * @var string
     */
    private $zipCode;
    /**
     * @var string
     */
    private $country;

    /**
     * Address constructor.
     *
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->address_1 = $address;
        $this->address_2 = null;
        $this->setCity('a');
        $this->setState('a');
        $this->setZipCode('a');
        $this->setCountry('a');
    }

    /**
     * @param string $city
     *
     * @return Address
     */
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string $state
     *
     * @return Address
     */
    public function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param string $zipCode
     *
     * @return Address
     */
    public function setZipCode(string $zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @param string $country
     *
     * @return Address
     */
    public function setCountry(string $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param string      $address_2
     * @param string|null $address_1
     *
     * @return Address
     */
    public function setAddress(string $address_2, string $address_1 = null)
    {
        $this->address_1 = $address_1;
        $this->address_2 = $address_2;

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml() : MyXML
    {
        $oXml = new MyXML('Address');
        $oXml->asObject()->addChild('address1', $this->address_1);
        $oXml->asObject()->addChild('address2', $this->address_2);
        $oXml->asObject()->addChild('city', $this->city);
        $oXml->asObject()->addChild('state', $this->state);
        $oXml->asObject()->addChild('zipcode', $this->zipCode);
        $oXml->asObject()->addChild('country', $this->country);

        return $oXml;

    }
}
