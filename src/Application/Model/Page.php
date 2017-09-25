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
 * Class Page
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model
 */
class Page implements ModelInterface
{

    /**
     * @var Contents
     */
    private $oContents;

    /**
     * @var Softkey[]
     */
    private $tSoftkeys = [];

    /**
     * @var boolean
     */
    private $isVisibleStatusLine;

    /**
     * @var boolean
     */
    private $ignoreCallUpdate;

    /**
     * Page constructor.
     *
     * @param Contents $oContents
     */
    public function __construct(Contents $oContents)
    {
        $this->setContents($oContents);
        $this->setVisibleStatusLine(true);
        $this->ignoreCallUpdate(false);
    }

    /**
     * @param Contents $oContents
     *
     * @return Page
     */
    public function setContents(Contents $oContents)
    {
        $this->oContents = $oContents;

        return $this;
    }

    /**
     * It could use "true" or "false" as its     text.
     * "true": the line label on the left side will be always displayed during XML application.
     * "false": the line label on the left side will not be displayed during XML application.
     * So the XML application information could be shown in a full screen manner.
     * Default is "true".
     *
     * @param bool $isVisible
     *
     * @return Page
     */
    public function setVisibleStatusLine(bool $isVisible = true)
    {
        $this->isVisibleStatusLine = $isVisible;

        return $this;
    }

    /**
     * When it’s set to true, phone will not  refresh the XML application screen to
     * call screen for call status update (except the one triggered by pressing
     * LINE key). Default value is false.
     *
     * @param bool $ignoreCallUpdate
     *
     * @return $this
     */
    public function ignoreCallUpdate(bool $ignoreCallUpdate = false)
    {
        $this->ignoreCallUpdate = $ignoreCallUpdate;

        return $this;
    }

    /**
     * Defines softkey display and action
     *
     * @param Softkey $oSoftkey
     *
     * @return Page
     *
     */
    public function addSoftkey(Softkey $oSoftkey)
    {
        $this->tSoftkeys[] = $oSoftkey;

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('Page');
        $oXml->asObject()->addAttribute('ignoreCallUpdate', $this->ignoreCallUpdate ? 'true' : 'false');
        $oXml->asObject()->addChild('ShowStatusLine', $this->isVisibleStatusLine ? 'true' : 'false');

        $oXml->insertChild($this->getContents()->getXml()->asObject());

        //Softkeys
        $oSoftkeys = new MyXML('Softkeys');
        foreach ($this->tSoftkeys as $oSoftkey) {
            $oSoftkeys->insertChild($oSoftkey->getXml()->asObject());
        }
        $oXml->insertChild($oSoftkeys->asObject());


        return $oXml;
    }

    /**
     * @return Contents
     */
    public function getContents()
    {
        return $this->oContents;
    }
}
