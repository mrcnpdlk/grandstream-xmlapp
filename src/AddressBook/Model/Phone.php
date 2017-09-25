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
 * Class Phone
 *
 * @package mrcnpdlk\Grandstream\XMLApp\AddressBook\Model
 */
class Phone implements ModelInterface
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
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Phone');
        $oXml->asObject()->addChild('phonenumber', $this->phoneNumber);
        $oXml->asObject()->addChild('accountindex', $this->accountIndex);

        return $oXml;

    }

}
