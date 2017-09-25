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
 * Class Event
 *
 * In one XML document, multiple <Event> elements could be used. However, the state for each event must
 * be different so that the action is unique for that state.
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model
 */
class Event implements ModelInterface
{
    /**
     * When phone is switching to call state (e.g., offhook to dialing state, or an incoming phone call) from idle
     */
    const STATE_CALL_STATE_STARTED = 'callStateStarted';
    /**
     * When phone is switching to idle from call state
     */
    const STATE_CALL_STATE_ENDED = 'callStateEnded';
    /**
     * Resume XML application from Call Ended state
     */
    const STATE_RESUME_FROM_CALL_ENDED = 'resumeFromCallEnded';
    /**
     * Resume XML application from Call Connected state
     */
    const STATE_RESUME_FROM_CALL_CONECTED = 'resumeFromCallConnected';
    /**
     * Resume XML application from Call Failed state
     */
    const STATE_RESUME_FROM_CALL_FAILED = 'resumeFromCallFailed';
    /**
     * Resume XML application from Call On Hold state
     */
    const STATE_RESUME_FROM_CALL_ONHOLD = 'resumeFromCallOnhold';
    /**
     * Resume XML application from Call Ringing state
     */
    const STATE_RESUME_FROM_CALL_RINGING = 'resumeFromCallRinging';
    /**
     * When phone is onhook
     */
    const STATE_ONHOOK = 'onhook';
    /**
     * When phone is offhook
     */
    const STATE_OFFHOOK = 'offhook';

    const ACTION_DIAL             = 'Dial';
    const ACTION_USE_URL          = 'UseURL';
    const ACTION_APPEND_INPUT_URL = 'AppendInputURL';
    const ACTION_QUIT_APP         = 'QuitApp';

    /**
     * @var string
     */
    private $sState;
    /**
     * @var string
     */
    private $sAction;
    /**
     * @var string|null
     */
    private $sCommandArgs;

    public function __construct(string $sState, string $sAction, string $sCommandArgs = null)
    {
        $this->sState       = $sState;
        $this->sAction      = $sAction;
        $this->sCommandArgs = $sCommandArgs;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml    = new MyXML('Event');
        $oAction = new MyXML('Action');
        $oAction->asObject()->addAttribute('action', $this->sAction);
        $oAction->asObject()->addAttribute('commandArgs', $this->sCommandArgs);
        $oXml->insertChild($oAction->asObject());

        return $oXml;
    }
}
