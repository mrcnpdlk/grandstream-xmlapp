<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


/**
 * Class SoftKey
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class SoftKey extends ModelAbstract
{

    const SOFTKEY_SWITCHSCR       = 'SwitchSCR';
    const SOFTKEY_XMLSERVICE      = 'XmlService';
    const SOFTKEY_SIGNIN          = 'SignIn';
    const SOFTKEY_SIGNOUT         = 'SignOut';
    const SOFTKEY_BACKSPACE       = 'BackSpace';
    const SOFTKEY_CANCEL          = 'CANCEL';
    const SOFTKEY_MISSEDCALLS     = 'MissedCalls';
    const SOFTKEY_FWDALL          = 'FwdedCalls';
    const SOFTKEY_CNCLFW          = 'CancelFwd';
    const SOFTKEY_REDIAL          = 'Redial';
    const SOFTKEY_REFRESHSTOCK    = 'RefreshStock';
    const SOFTKEY_REFRESHCURRENCY = 'RefreshCurrency';
    const SOFTKEY_REVERSECURRENCY = 'ReverseCurrency';
    const SOFTKEY_VM              = 'VoiceMail';
    const SOFTKEY_HEADSET         = 'Headset';
    const SOFTKEY_PHONEBOOK       = 'PhoneBook';

    /**
     * @var string
     */
    private $sAction;
    /**
     * @var string
     */
    private $sCondition;
    /**
     * @var string
     */
    private $sLabel;

    /**
     * SoftKey constructor.
     *
     * @param string $action
     * @param string $condition
     */
    public function __construct(string $action, string $condition = SoftKey::COND_TYPE_ALWAYS)
    {
        $this->sAction    = $action;
        $this->sCondition = $condition;

    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->sLabel = $label;

        return $this;
    }


    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><SoftKey></SoftKey>');
        //$oXml->addAttribute('action', $this->sAction);

        if ($this->sLabel) {
            $oXml->addAttribute('label', $this->sLabel);
        }
        $oXml->addChild('Action')->addChild($this->sAction);
        $oXml->addChild('displayCondition')->addChild('conditionType', $this->sCondition);

        return $oXml;
    }
}
