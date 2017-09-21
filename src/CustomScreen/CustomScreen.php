<?php


namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen;

use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\Exception;
use mrcnpdlk\Grandstream\XMLApp\ModelAbstract;


/**
 * Class CustomScreen
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen
 */
class CustomScreen extends ModelAbstract
{
    /**
     * @var int
     */
    private $iMaxScreens = 0;
    /**
     * @var LCDDisplay
     */
    private $oDisplay;
    /**
     * @var \SimpleXMLElement
     */
    public $oDefXml;

    public function __construct(string $model)
    {
        switch (strtoupper($model)) {
            case 'GXP2120':
                $this->iMaxScreens = 4;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(320, 160),
                    22,
                    90,
                    4);
                break;
            case 'GXP2110':
                $this->iMaxScreens = 4;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(240, 120),
                    22,
                    57,
                    3);
                break;
            case 'GXP2100':
                $this->iMaxScreens = 4;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(180, 90),
                    16,
                    57,
                    3);
                break;
            case 'GXP2124':
                $this->iMaxScreens = 4;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(240, 120),
                    22,
                    57,
                    4);
                $file = __DIR__ . '/Adapter/GXP21xx_16xx_14xx_116x/DefXML/2124idle_screen.xml';
                $this->oDefXml = new \SimpleXMLElement(file_get_contents($file));
                break;
            case 'GXP1450':
                $this->iMaxScreens = 2;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(180, 60),
                    15,
                    57,
                    3);
                break;
            case 'GXP140x':
                $this->iMaxScreens = 4;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(180, 60),
                    13,
                    0,
                    3);
                break;
            case 'GXP116x':
                $this->iMaxScreens = 4;
                $this->oDisplay    = new LCDDisplay(
                    new Rectangle(180, 60),
                    13,
                    0,
                    3);
                break;
            case 'GXP2130':
            case 'GXP2140':
            case 'GXP2160':
            case 'GXP2135':
            case 'GXP2170':
                break;
            default:
                throw new Exception(sprintf('Model %s not defined', $model));
                break;
        }
    }

}
