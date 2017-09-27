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
use mrcnpdlk\Grandstream\XMLApp\Exception;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\MyXML;

/**
 * Class ElemBitmap
 *
 * This element is to display a bitmap picture on the screen. Inside the <Bitmap> tag of the XML document,
 * the picture must be encoded in base64 format already. There are plenty of base64 encoder online
 * provided for encoding the .bmp picture. Please make sure the original .bmp picture is in monochrome grey
 * level 8 before encoding
 *
 * <ElemBitmap isfile="true/false" isflash=”true/false”>
 * <Bitmap> Bitmap file encoded in base64 format </Bitmap>
 * <X> X location </X>
 * <Y> Y location </Y>
 * </ElemBitmap
 *
 * @package mrcnpdlk\Grandstream\XMLApp\Application\Model\Components
 */
class ElemBitmap extends ElemAbstract implements ModelInterface, ElemInterface
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
    private $sImgPath;

    /**
     * @var Rectangle
     */
    private $oCanvas;

    /**
     * ElemBitmap constructor.
     *
     * @param string                                        $sImgPath
     * @param \mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle $oRectangle
     *
     */
    public function __construct(string $sImgPath, Rectangle $oRectangle)
    {
        parent::__construct();
        $this->sImgPath = $sImgPath;
        $this->oCanvas  = $oRectangle;
        $this->isFile   = "false";
        $this->isFlash  = "false";

    }

    /**
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    function getXml(): MyXML
    {
        $oXml = new MyXML('DisplayBitmap');

        $oXml->asObject()->addAttribute('isfile', $this->isFile);
        $oXml->asObject()->addAttribute('isflash', $this->isFlash);
        $oXml->asObject()->addChild('X', $this->getPoint()->getX());
        $oXml->asObject()->addChild('Y', $this->getPoint()->getY());
        $oXml->asObject()->addChild('Bitmap', $this->getBase64());

        return $oXml;
    }

    /**
     * @return string
     */
    private function getBase64()
    {
        try {
            if (!extension_loaded('imagick')) {
                throw new \Exception('No imagick loaded');
            }

            return base64_encode($this->resizeImage($this->oCanvas->getWidth(), $this->oCanvas->getHeight())->getImageBlob());
        } catch (\Exception $e) {
            return '';
        }
    }

    /**
     * @param int      $width
     * @param int|null $height
     *
     * @return \Imagick
     * @throws \mrcnpdlk\Grandstream\XMLApp\Exception
     */
    private function resizeImage(int $width = 100, int $height = null)
    {
        if (!file_exists($this->sImgPath) || !is_readable($this->sImgPath)) {
            throw new Exception('Image not exists');
        }

        if (is_null($height)) {
            $height = $width;
        }
        $imagick = new \Imagick(realpath($this->sImgPath));

        $canvasFactor = $width / $height;

        $origWidth  = $imagick->getImageWidth();
        $origHeight = $imagick->getImageHeight();
        $origFactor = $origWidth / $origHeight;
        if ($origFactor > $canvasFactor) {//za rozciągniety
            $imgWidth  = $width;
            $imgHeight = intval($width / $origFactor);

        } else {//za wysoki
            $imgHeight = $height;
            $imgWidth  = intval($height * $origFactor);
        }


        $imagick = $imagick->flattenImages();
        $imagick->setImageBackgroundColor(new \ImagickPixel('white'));
        $imagick->setImageAlphaChannel(\Imagick::ALPHACHANNEL_DEACTIVATE);
        $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);

        $colors = min(255, $imagick->getImageColors());
        $imagick->quantizeImage($colors, \Imagick::COLORSPACE_GRAY, 0, false, false);
        $imagick->setImageDepth(8 /* bits */);
        $imagick->resizeImage($imgWidth, $imgHeight, \Imagick::FILTER_LANCZOS, 1, false);
        $imagick->stripImage();

        $canvas = new \Imagick();
        $canvas->newImage($width, $height, new \ImagickPixel('white'));
        $canvas->compositeImage($imagick, \Imagick::COMPOSITE_DEFAULT, intval(($width - $imgWidth) / 2), intval(($height - $imgHeight) / 2));
        $canvas->setImageFormat('BMP');

        return $canvas;
    }

}
