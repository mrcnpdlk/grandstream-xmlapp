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
 * Time: 22:27
 */

namespace mrcnpdlk\Grandstream\XMLApp\Application;


use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemInterface;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Container;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Contents;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Event;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Page;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Screen;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\SoftKey;

class View
{
    /**
     * @var Screen $oScreen
     */
    private $oScreen;

    public function __construct()
    {
        $this->oScreen = new Screen(new Page(new Contents()));
    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemInterface $oElement
     *
     * @return $this
     */
    public function addElem(ElemInterface $oElement)
    {
        $this->oScreen->getPage()->getContents()->addElement($oElement);

        return $this;
    }

    /**
     * @param SoftKey $oSoftkey
     *
     * @return View
     */
    public function addSoftkey(SoftKey $oSoftkey)
    {
        $this->oScreen->getPage()->addSoftkey($oSoftkey);

        return $this;
    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Event $oEvent
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\View
     */
    public function addEvent(Event $oEvent)
    {
        $this->oScreen->addEvent($oEvent);

        return $this;
    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Application\Model\Container $oContainer
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\View
     */
    public function addContainer(Container $oContainer)
    {
        foreach ($oContainer->getElements() as $oElement) {
            $this->oScreen->getPage()->getContents()->addElement($oElement);
        }

        return $this;
    }

    /**
     * @param bool $isVisible
     *
     * @return View
     */
    public function setVisibleStatusLine(bool $isVisible = true)
    {
        $this->oScreen->getPage()->setVisibleStatusLine($isVisible);

        return $this;
    }

    /**
     * @return string
     */
    public function asTxt()
    {
        return $this->oScreen->getXml()->asText();
    }

}
