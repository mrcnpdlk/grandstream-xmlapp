<?php
/**
 * Created by Marcin.
 * Date: 21.09.2017
 * Time: 19:28
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Point;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\Geometry\Rectangle;

class DisplayAbstract extends ModelAbstract
{
    const FONT_BOLD    = 'bold';
    const FONT_UNIFONT = 'unifont';

    const HOR_ALIGN_CENTER = 'center';
    const HOR_ALIGN_LEFT   = 'left';
    const HOR_ALIGN_RIGHT  = 'right';


    /**
     * @var Point
     */
    protected $oPoint;
    /**
     * @var Rectangle
     */
    protected $oRectangle;
    /**
     * @var string
     */
    protected $sColorBg;
    /**
     * @var string
     */
    protected $sColorBorder;
    /**
     * @var string
     */
    protected $sColorFont;
    /**
     * @var string
     */
    protected $sColorShape;

    public function __construct(Point $oPoint = null, Rectangle $oRectangle = null)
    {
        $this->oPoint     = $oPoint ?? new Point(0, 0);
        $this->oRectangle = $oRectangle ?? new Rectangle(0, 0);
    }

    public function getPoint()
    {
        return $this->oPoint;
    }

    public function getRectangle()
    {
        return $this->oRectangle;
    }

    public function setColorBg(int $iColorTone)
    {
        $this->sColorBg = $this->getMonoColor($iColorTone);

        return $this;
    }

    public function getColorBg()
    {
        return $this->sColorBg ?? $this->getMonoColor();
    }

    public function setColorBorder(int $iColorTone)
    {
        $this->sColorBorder = $this->getMonoColor($iColorTone);

        return $this;
    }

    public function getColorBorder()
    {
        return $this->sColorBorder ?? $this->getMonoColor(100);
    }

    public function setColorFont(int $iColorTone)
    {
        $this->sColorFont = $this->getMonoColor($iColorTone);

        return $this;
    }

    public function getColorFont()
    {
        return $this->sColorFont ?? $this->getMonoColor(100);
    }
}
