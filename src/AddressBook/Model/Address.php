<?php
namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;

use mrcnpdlk\Grandstream\XMLApp\AddressBook\ModelAbstract;

/**
 * Class Address
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Address extends ModelAbstract
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
     * @param string      $addres_2
     * @param string|null $addres_1
     *
     * @return Address
     */
    public function setAddress(string $addres_2, string $addres_1 = null)
    {
        $this->address_1 = $addres_1;
        $this->address_2 = $addres_2;

        return $this;
    }

    /**
     * @return \DOMDocument
     */
    public function get()
    {
        $root = new \DOMDocument();
        // we create a XML Node and store it in a variable called noteElem;
        $noteElem = $root->createElement('Address');
        $noteElem->appendChild($root->createElement('address1', $this->address_1));
        $noteElem->appendChild($root->createElement('address2', $this->address_2));
        $noteElem->appendChild($root->createElement('city', $this->city));
        $noteElem->appendChild($root->createElement('state', $this->state));
        $noteElem->appendChild($root->createElement('zipcode', $this->zipCode));
        $noteElem->appendChild($root->createElement('country', $this->country));

        $root->appendChild($noteElem);

        return $root;

    }
}
