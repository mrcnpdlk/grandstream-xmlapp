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

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;

use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;


/**
 * Class DisplayString
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class IdleScreen implements ModelInterface
{
    /**
     * @var string|null
     */
    private $sScrType;
    /**
     * @var bool
     */
    private $isStatusLine;

    /**
     * @var ModelInterface[]
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
    public function __construct(string $sScrType = ModelConstant::SCREEN_TYPE_DEFAULT, bool $isStatusLine = true)
    {
        $this->sScrType     = $sScrType;
        $this->isStatusLine = $isStatusLine;

    }

    /**
     * @param mixed $oDisplay
     *
     * @return $this
     */
    public function addDisplay(ModelInterface $oDisplay)
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
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('IdleScreen');
        if ($this->sScrType) {
            $oXml->asObject()->addChild('ScreenShow', $this->sScrType);
        }
        $oXml->asObject()->addChild('ShowStatusLine', $this->isStatusLine ? 'true' : 'false');
        foreach ($this->tDisplays as $oDisplay) {
            $oXml->insertChild($oDisplay->getXml()->asObject());
        }
        $oSoftKeys = new MyXML('SoftKeys');
        foreach ($this->tSoftKeys as $oSoftKey) {
            $oSoftKeys->insertChild($oSoftKey->getXml()->asObject());
        }
        $oXml->insertChild($oSoftKeys->asObject());

        return $oXml;
    }
}
