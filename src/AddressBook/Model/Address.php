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
 * Class Address
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Address implements ModelInterface
{
    /**
     * @var string
     */
    private $addressFirst;
    /**
     * @var string|null
     */
    private $addressSecond;
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
        $this->addressFirst  = $address;
        $this->addressSecond = null;
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
     * @param string      $addressFirst  First part of address
     * @param string|null $addressSecond Second part of address
     *
     * @return Address
     */
    public function setAddress(string $addressFirst, string $addressSecond = null)
    {
        $this->addressFirst  = $addressFirst;
        $this->addressSecond = $addressSecond;

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Address');
        $oXml->asObject()->addChild('address1', $this->addressFirst);
        $oXml->asObject()->addChild('address2', $this->addressSecond);
        $oXml->asObject()->addChild('city', $this->city);
        $oXml->asObject()->addChild('state', $this->state);
        $oXml->asObject()->addChild('zipcode', $this->zipCode);
        $oXml->asObject()->addChild('country', $this->country);

        return $oXml;

    }
}
