<?php


namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen;

use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\BitmapType;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\IdleScreenConditionType;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\Screen;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\SoftKeyType;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\StringType;

/**
 * Class CustomScreen
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen
 */
class CustomScreen extends ModelAbstract
{
    /**
     * @var Screen
     */
    private $oScreen;
    /**
     * @var BitmapType
     */
    private $oBitmapType;
    /**
     * @var StringType
     */
    private $oStringType;
    /**
     * @var IdleScreenConditionType
     */
    private $oIdleScreenConditionType;
    /**
     * @var SoftKeyType
     */
    private $oSoftKeyType;

    public function get()
    {
        $root = new \DOMDocument("1.0", "UTF-8");

        if ($this->oScreen) {
            $nodeAddress = $root->importNode($this->oScreen->get()->documentElement, true);
            $root->documentElement->appendChild($nodeAddress);
        } else {
            $nodeElem = $root->createElement('Screen');
            $root->appendChild($nodeElem);
        }


        return $root;
    }
}
