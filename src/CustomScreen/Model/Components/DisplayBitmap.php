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
 * Date: 21.09.2017
 * Time: 15:40
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model\Components;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

class DisplayBitmap extends DisplayAbstract implements ModelInterface
{
    /**
     * @var boolean
     */
    private $isFile;
    /**
     * @var boolean
     */
    private $isFlash;
    /**
     * @var string
     */
    private $sBitmap;


    public function __construct(Point $oPoint = null, string $sBitmap, bool $isFile)
    {
        parent::__construct($oPoint);
        $this->sBitmap = $sBitmap;
        $this->isFile  = $isFile ? "true" : "false";
        $this->isFlash = "false";

    }

    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('ElemBitmap');

        $oXml->asObject()->addAttribute('isfile', $this->isFile);
        $oXml->asObject()->addAttribute('isflash', $this->isFlash);
        $oXml->asObject()->addChild('X', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Y', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Bitmap', $this->sBitmap);

        return $oXml;
    }
}
