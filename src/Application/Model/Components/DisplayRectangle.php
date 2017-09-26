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
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

class DisplayRectangle extends DisplayAbstract implements ModelInterface, ComponentInterface
{
    /**
     * DisplayRectangle constructor.
     *
     * @param int $iWidth
     * @param int $iHeight
     */
    public function __construct(int $iWidth, int $iHeight)
    {
        parent::__construct(new Point(0, 0), new Rectangle($iWidth, $iHeight));
        $this->setColorBorder(new Color(100));
    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('DisplayRectangle');

        $oXml->asObject()->addAttribute('x', $this->getPoint()->getX());
        $oXml->asObject()->addAttribute('y', $this->getPoint()->getY());
        $oXml->asObject()->addAttribute('width', $this->getRectangle()->getWidth());
        $oXml->asObject()->addAttribute('height', $this->getRectangle()->getHeight());
        $oXml->asObject()->addAttribute('bgcolor', $this->getColorBg()->get());
        $oXml->asObject()->addAttribute('border-color', $this->getColorBorder()->get());

        return $oXml;
    }
}
