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

/**
 * Created by Marcin.
 * Date: 25.09.2017
 * Time: 22:31
 */

namespace mrcnpdlk\Grandstream\XMLApp\Application;


class ModelConstant
{
    const ACTION_DIAL             = 'Dial';
    const ACTION_USE_URL          = 'UseURL';
    const ACTION_APPEND_INPUT_URL = 'AppendInputURL';
    const ACTION_QUIT_APP         = 'QuitApp';

    const TYPE_TEXT     = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_HIDDEN   = 'hidden';
    const TYPE_RADIO    = 'radio';
    const TYPE_CHECKBOX = 'checkbox';

    const DATATYPE_INT    = 'int';
    const DATATYPE_STRING = 'string';

    const FONT_BOLD    = 'bold';
    const FONT_UNIFONT = 'unifont';

    const HORIZONTAL_ALIGN_CENTER = 'center';
    const HORIZONTAL_ALIGN_LEFT   = 'left';
    const HORIZONTAL_ALIGN_RIGHT  = 'right';

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
}
