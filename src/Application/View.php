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


use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayBitmap;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayRectangle;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\DisplayString;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\Input;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\Select;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Contents;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Page;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Screen;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Softkey;

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
     * @param DisplayString $oString
     *
     * @return View
     */
    public function addString(DisplayString $oString)
    {
        $this->oScreen->getPage()->getContents()->addElement($oString);

        return $this;
    }

    /**
     * @param DisplayBitmap $oBitmap
     *
     * @return View
     */
    public function addBitmap(DisplayBitmap $oBitmap)
    {
        $this->oScreen->getPage()->getContents()->addElement($oBitmap);

        return $this;
    }

    /**
     * @param DisplayRectangle $oRectangle
     *
     * @return View
     */
    public function addRectangle(DisplayRectangle $oRectangle)
    {
        $this->oScreen->getPage()->getContents()->addElement($oRectangle);

        return $this;
    }

    /**
     * @param Select $oSelect
     *
     * @return View
     */
    public function addSelect(Select $oSelect)
    {
        $this->oScreen->getPage()->getContents()->addElement($oSelect);

        return $this;
    }

    /**
     * @param Input $oInput
     *
     * @return View
     */
    public function addInput(Input $oInput)
    {
        $this->oScreen->getPage()->getContents()->addElement($oInput);

        return $this;
    }

    /**
     * @param Softkey $oSoftkey
     *
     * @return View
     */
    public function addSoftkey(Softkey $oSoftkey)
    {
        $this->oScreen->getPage()->addSoftkey($oSoftkey);

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
