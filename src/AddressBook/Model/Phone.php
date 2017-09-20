<?php

namespace mrcnpdlk\Grandstream\XMLApp\AddressBook\Model;



use mrcnpdlk\Grandstream\XMLApp\AddressBook\ModelAbstract;

class Phone extends ModelAbstract
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
     * @return \DOMDocument
     */
    public function get()
    {
        $root = new \DOMDocument();
        // we create a XML Node and store it in a variable called noteElem;
        $noteElem = $root->createElement('Phone');
        // createElement takes 2 param also, with 1st param takes the node Name, and 2nd param is node Value
        $toElem = $root->createElement('phonenumber', $this->phoneNumber);
        $noteElem->appendChild($toElem);
        $toElem = $root->createElement('accountindex', $this->accountIndex);
        $noteElem->appendChild($toElem);
        $root->appendChild($noteElem);

        return $root;
    }

}
