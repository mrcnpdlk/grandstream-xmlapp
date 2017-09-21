<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


/**
 * Class DisplayString
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class IdleScreen extends ModelAbstract
{
    const SCR_TYPE_DEFAULT  = null;
    const SCR_TYPE_WEATHER  = 'weatherShow';
    const SCR_TYPE_STOCK    = 'stockShow';
    const SCR_TYPE_CURRENCY = 'currencyShow';

    /**
     * @var string|null
     */
    private $sScrType;
    /**
     * @var bool
     */
    private $isStatusLine;

    /**
     * @var DisplayAbstract[]
     */
    private $tDisplays = [];
    /**
     * @var SoftKey[]
     */
    private $tSoftKeys = [];

    /**
     * IdleScreen constructor.
     *
     * @param string $sScrType
     * @param bool   $isStatusLine
     */
    public function __construct(string $sScrType = IdleScreen::SCR_TYPE_DEFAULT, bool $isStatusLine = true)
    {
        $this->sScrType     = $sScrType;
        $this->isStatusLine = $isStatusLine;

    }

    /**
     * @param mixed $oDisplay
     *
     * @return $this
     */
    public function addDisplay(DisplayAbstract $oDisplay)
    {
        $this->tDisplays[] = $oDisplay;

        return $this;
    }

    /**
     * @param SoftKey $oSoftKey
     *
     * @return $this
     */
    public function addSoftKey(SoftKey $oSoftKey)
    {
        $this->tSoftKeys[] = $oSoftKey;

        return $this;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><IdleScreen></IdleScreen>');
        if ($this->sScrType) {
            $oXml->addChild('ScreenShow', $this->sScrType);
        }
        $oXml->addChild('ShowStatusLine', $this->isStatusLine ? 'true' : 'false');
        foreach ($this->tDisplays as $oDisplay) {
            static::xml_adopt($oXml, $oDisplay->getXml());
        }
        $softKeys = $oXml->addChild('SoftKeys');
        foreach ($this->tSoftKeys as $oSoftKey) {
            static::xml_adopt($softKeys, $oSoftKey->getXml());
        }

        return $oXml;
    }
}
