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


namespace mrcnpdlk\Grandstream\XMLApp\Application\Model;


use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class Softkey
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model
 */
class Softkey implements ModelInterface
{
    const ACTION_DIAL             = 'Dial';
    const ACTION_USE_URL          = 'UseURL';
    const ACTION_APPEND_INPUT_URL = 'AppendInputURL';
    const ACTION_QUIT_APP         = 'QuitApp';

    /**
     * @var string
     */
    private $sAction;
    /**
     * Displays the softkey name
     *
     * @var string
     */
    private $sLabel;
    /**
     *
     * URL information, or number
     *
     * @var string
     */
    private $sCommandArgs;

    /**
     * Only for action=Dial.
     * This specifies the account index to dial out the call from, starting from 0 for account 1
     *
     * @var integer
     */
    private $iCommandId;

    /**
     * Softkey constructor.
     *
     * @param string $sAction
     * @param string $sLabel
     */
    public function __construct(string $sAction, string $sLabel)
    {
        $this->sAction = $sAction;
        $this->sLabel  = $sLabel;
        $this->setCommandId();
    }

    /**
     * @param integer $iCommandId
     *
     * @return SoftKey
     */
    public function setCommandId(int $iCommandId = 0)
    {
        if ($this->sAction === Softkey::ACTION_DIAL) {
            $this->iCommandId = $iCommandId;
        }

        return $this;
    }

    /**
     * @param string $sCommandArgs
     *
     * @return SoftKey
     */
    public function setCommandArgs(string $sCommandArgs)
    {
        $this->sCommandArgs = $sCommandArgs;

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Softkey');
        $oXml->asObject()->addAttribute('action', $this->sAction);
        $oXml->asObject()->addAttribute('label', $this->sLabel);
        $oXml->asObject()->addAttribute('commandArgs', $this->getCommandArgs());
        if (!is_null($this->getCommandId())) {
            $oXml->asObject()->addAttribute('commandId', $this->getCommandId());
        }


        return $oXml;
    }

    /**
     * @return string
     */
    public function getCommandArgs()
    {
        return $this->sCommandArgs;
    }

    /**
     * @return integer
     */
    public function getCommandId()
    {
        return $this->iCommandId;
    }
}
