<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;

use mrcnpdlk\Grandstream\XMLApp\ElementAbstract;

/**
 * Class Phone
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Phone extends ElementAbstract
{
    /**
     * @var string
     */
    private $phoneNumber;
    /**
     * @var integer
     */
    private $accountIndex;

    public function __construct(string $phoneNumber, int $accountIndex = 1)
    {
        $this->phoneNumber  = $phoneNumber;
        $this->accountIndex = $accountIndex;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function get()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Phone></Phone>');
        $oXml->addChild('phonenumber', $this->phoneNumber);
        $oXml->addChild('accountindex', $this->accountIndex);

        return $oXml;

    }

}
