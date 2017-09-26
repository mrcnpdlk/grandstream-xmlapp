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

use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
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
        $oXml = new MyXML('Event');
        $oXml->asObject()->addAttribute('state', $this->sState);
        $oAction = new MyXML('Action');
        $oAction->asObject()->addAttribute('action', $this->sAction);
        $oAction->asObject()->addAttribute('commandArgs', $this->sCommandArgs);
        $oXml->insertChild($oAction->asObject());

        return $oXml;
    }
}
