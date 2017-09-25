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
 * @author Marcin Pudełek <marcin@pudelek.org.pl>
 */

/**
 * Created by Marcin.
 * Date: 21.09.2017
 * Time: 11:42
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen;


use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;

class LCDDisplay
{
    /**
     * @var Rectangle
     */
    private $oScreenBox;
    /**
     * @var Rectangle
     */
    private $oSoftKeyBox;
    /**
     * @var Rectangle
     */
    private $oLineKeyBox;
    /**
     * @var Rectangle
     */
    private $oUserBox;
    /**
     * @var int
     */
    private $iSoftKeyCount;

    public function __construct(Rectangle $oBox, int $iSoftKeyAreaHeight = 0, int $iLineKeyAreaWidth = 0, int $iSoftKeyCount = 0)
    {
        $this->oScreenBox    = $oBox;
        $this->oLineKeyBox   = new Rectangle($iLineKeyAreaWidth, $this->oScreenBox->getHeight());
        $this->oSoftKeyBox   = new Rectangle($this->oScreenBox->getWidth(), $iSoftKeyAreaHeight);
        $this->oUserBox      = new Rectangle(
            $this->oScreenBox->getWidth() - $this->oLineKeyBox->getWidth(),
            $this->oScreenBox->getHeight() - $this->oSoftKeyBox->getHeight()
        );
        $this->iSoftKeyCount = $iSoftKeyCount;
    }

    public function getScreenBox()
    {
        return $this->oScreenBox;
    }

    public function getSoftKeyBox()
    {
        return $this->oSoftKeyBox;
    }

    public function getLineKeyBox()
    {
        return $this->oLineKeyBox;
    }

    public function getUserBox()
    {
        return $this->oUserBox;
    }
}
