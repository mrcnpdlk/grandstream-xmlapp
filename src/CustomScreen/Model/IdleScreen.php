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
     * @var \SimpleXMLElement[]
     */
    private $tDisplays = [];

    public function __construct(string $sScrType = IdleScreen::SCR_TYPE_DEFAULT, bool $isStatusLine = true)
    {
        $this->sScrType     = $sScrType;
        $this->isStatusLine = $isStatusLine;

    }

    /**
     * @param \SimpleXMLElement $oDisplay
     *
     * @return $this
     */
    public function addDisplay(\SimpleXMLElement $oDisplay)
    {
        $this->tDisplays[] = $oDisplay;

        return $this;
    }

    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><IdleScreen></IdleScreen>');
        if ($this->sScrType) {
            $oXml->addChild('ScreenShow', $this->sScrType);
        }
        $oXml->addChild('ShowStatusLine', $this->isStatusLine ? 'true' : 'false');
        foreach ($this->tDisplays as $oDisplay) {
            static::xml_adopt($oXml, $oDisplay);
        }
        $oXml->addChild('Softkeys');

        return $oXml;
    }
}
