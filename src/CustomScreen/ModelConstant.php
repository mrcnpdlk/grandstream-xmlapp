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
 * Date: 26.09.2017
 * Time: 00:22
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen;


class ModelConstant
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

    const FONT_BOLD    = 'bold';
    const FONT_UNIFONT = 'unifont';

    const HORIZONTAL_ALIGN_CENTER = 'center';
    const HORIZONTAL_ALIGN_LEFT   = 'left';
    const HORIZONTAL_ALIGN_RIGHT  = 'right';

    const SCREEN_TYPE_DEFAULT  = null;
    const SCREEN_TYPE_WEATHER  = 'weatherShow';
    const SCREEN_TYPE_STOCK    = 'stockShow';
    const SCREEN_TYPE_CURRENCY = 'currencyShow';


    /**
     * Displayed on idle screen, weather, stock, currency screen, IP address screen (for GXP140x)
     */
    const COND_TYPE_SUBSCREEN = 'SubScreen';
    /**
     * When XML Application is launched
     */
    const COND_TYPE_XMLAPP = 'XmlApp';
    /**
     * Displayed when call queue feature is used with signOut GXE5028
     */
    const COND_TYPE_SIGNIN  = 'signIn';
    const COND_TYPE_SIGNOUT = 'signOut';
    /**
     * Displayed in onhook dialing state when number is entered
     */
    const COND_TYPE_BACKSPACE = 'backSpace';
    /**
     * Displayed when there is new missed call
     */
    const COND_TYPE_MISSCALL = 'missCall';
    /**
     * Displayed when account1 is registered and "Enable Call Feature" is set to "Yes
     */
    const COND_TYPE_HASFCL = 'hasFowardedCallLog';
    /**
     * Displayed when account1 has Call Forward All activated
     */
    const COND_TYPE_CF = 'callFwded';
    /**
     * Displayed when there is dialed call
     */
    const COND_TYPE_HASDCL = 'hasDialedCalllog';
    /**
     * Displayed when there is new voicemail. Usually only used on GXP140x for Voicemail softkey display
     */
    const COND_TYPE_HASVM = 'hasVoiceMail';
    /**
     * Default display if not specified
     */
    const COND_TYPE_ALWAYS = 'alwaysDisplay';
}
