<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


class ModelAbstract
{
    const FONT_BOLD    = 'bold';
    const FONT_UNIFONT = 'unifont';

    const HOR_ALIGN_CENTER = 'center';
    const HOR_ALIGN_LEFT   = 'left';
    const HOR_ALIGN_RIGHT  = 'right';

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

    /**
     * @param int|null $tone Grey tone, 0 - white, 100 - black, null - NONE
     *
     * @return string
     */
    public function getMonoColor(int $tone = null)
    {
        if (is_null($tone)) {
            return 'None';
        }
        $tTones = [
            'White',
            'Light6',
            'Light5',
            'Light4',
            'Light3',
            'Light2',
            'Light1',
            'LightGray',
            'Gray',
            'Dark1',
            'Dark2',
            'Dark3',
            'Dark4',
            'Dark5',
            'Dark6',
            'Black',
        ];
        $levels = count($tTones);
        $index  = (int)ceil($levels * $tone / 100) - 1;
        if ($index < 0) {
            $index = 0;
        } elseif ($index >= $levels) {
            $index = $levels - 1;
        }

        return $tTones[$index];
    }

    /**
     * @return string
     */
    public function getXmlPretty()
    {
        $dom                     = new \DOMDocument("1.0", 'URF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($this->getXml()->asXML());

        return $dom->saveXML();
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayBitmap></DisplayBitmap>');

        return $oXml;
    }
}
