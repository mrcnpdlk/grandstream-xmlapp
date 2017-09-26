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

namespace mrcnpdlk\Grandstream\XMLApp\Application\Model\Components;

use mrcnpdlk\Grandstream\XMLApp\Application\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Font;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class ElemString
 *
 * This element is used for displaying string information on the screen
 *
 * <ElemString font="unifont" width="width of the string" height="height of the string" halign="center/left/right" color="color of the string" bgcolor="color of the background" >
 * <X>X location</X>
 * <Y>Y location </Y>
 * <DisplayStr>Display String</DisplayStr>
 * </ElemString>
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class ElemString extends ElemAbstract implements ModelInterface, ElemInterface
{

    /**
     * @var string
     */
    private $sString;
    /**
     * Font type
     *
     * @var Font
     */
    private $oFont;

    /**
     * ElemString constructor.
     *
     * @param string    $sString
     * @param Rectangle $oRectangle
     */
    public function __construct(string $sString, Rectangle $oRectangle = null)
    {
        parent::__construct(new Point(0, 0), $oRectangle);
        $this->sString = $sString;
        $this->setFont();

    }

    /**
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Font|null $oFont
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemString
     */
    public function setFont(Font $oFont = null)
    {
        $this->oFont = $oFont ?? new Font();

        return $this;
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('DisplayString');

        $oXml->asObject()->addAttribute('font', $this->getFont()->getType());
        if ($this->getRectangle()->getWidth()) {
            $oXml->asObject()->addAttribute('width', $this->getRectangle()->getWidth());
        }
        if ($this->getRectangle()->getHeight()) {
            $oXml->asObject()->addAttribute('height', $this->getRectangle()->getHeight());
        }

        $oXml->asObject()->addAttribute('halign', $this->getFont()->getHorizontalAlign());
        $oXml->asObject()->addAttribute('color', $this->getFont()->getColor()->get());
        $oXml->asObject()->addAttribute('bgcolor', $this->getColorBg()->get());
        //$oXml->asObject()->addAttribute('renew-rate', 'second');
        //$oXml->asObject()->addAttribute('isrenew', 'true');
        $oXml->asObject()->addChild('X', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Y', $this->getPoint()->getY());
        $oXml->asObject()->addChild('DisplayStr', $this->sString);

        return $oXml;
    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\Helper\Font
     */
    public function getFont()
    {
        return $this->oFont;
    }
}
