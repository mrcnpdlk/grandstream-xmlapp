<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;


use mrcnpdlk\Grandstream\XMLApp\AddressBook\ModelAbstract;

class Contact extends ModelAbstract
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
     * @return \DOMDocument
     */
    public function get()
    {
        $root = new \DOMDocument();
        // we create a XML Node and store it in a variable called nodeElem;
        $nodeElem = $root->createElement('Contact');
        $nodeElem->appendChild($root->createElement('LastName', $this->lastName));
        $nodeElem->appendChild($root->createElement('FirstName', $this->firstName));
        $nodeElem->appendChild($root->createElement('Email', $this->email));
        $nodeElem->appendChild($root->createElement('Department', $this->department));
        $nodeElem->appendChild($root->createElement('Company', $this->company));
        $root->appendChild($nodeElem);


        $nodePhone = $root->importNode($this->phone->get()->documentElement, true);
        $root->documentElement->appendChild($nodePhone);

        if ($this->address) {
            $nodeAddress = $root->importNode($this->address->get()->documentElement, true);
            $root->documentElement->appendChild($nodeAddress);
        } else {
            $nodeElem->appendChild($root->createElement('Address'));
            $root->appendChild($nodeElem);
        }


        return $root;
    }


}
