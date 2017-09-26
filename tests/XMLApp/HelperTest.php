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

namespace mrcnpdlk\Grandstream\XMLApp;


use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;
use mrcnpdlk\Grandstream\XMLApp\Helper\Font;
use mrcnpdlk\Grandstream\XMLApp\Helper\Point;
use mrcnpdlk\Grandstream\XMLApp\Helper\Rectangle;
use mrcnpdlk\Grandstream\XMLApp\Helper\Vector;

class HelperTest extends TestCase
{
    public function testColor()
    {
        $oColor = new Color();
        $this->assertEquals('None', $oColor->get());
        $oColor = new Color(0);
        $this->assertEquals('White', $oColor->get());
        $oColor = new Color(100);
        $this->assertEquals('Black', $oColor->get());
    }

    public function testColorOutOfRange()
    {
        $oColor = new Color(-1);
        $this->assertEquals('White', $oColor->get());
        $oColor = new Color(101);
        $this->assertEquals('Black', $oColor->get());
    }

    public function testFont()
    {
        $oFont = new Font();
        $this->assertEquals('Black', $oFont->getColor()->get());
        $this->assertEquals(ModelConstant::FONT_UNIFONT, $oFont->getType());
        $this->assertEquals(ModelConstant::HORIZONTAL_ALIGN_LEFT, $oFont->getHorizontalAlign());

        $this->assertEquals(ModelConstant::HORIZONTAL_ALIGN_CENTER,
            $oFont->setHorizontalAlign(ModelConstant::HORIZONTAL_ALIGN_CENTER)->getHorizontalAlign());
        $this->assertInstanceOf(Color::class,
            $oFont->setColor(new Color(100))->getColor());
        $this->assertEquals(ModelConstant::FONT_BOLD,
            $oFont->setType(ModelConstant::FONT_BOLD)->getType());
    }

    public function testPoint()
    {
        $oPoint = new Point(3, 4);
        $this->assertEquals(3, $oPoint->getX());
        $this->assertEquals(4, $oPoint->getY());

        $movedPoint = $oPoint->move(new Vector(-4, -5));
        $this->assertEquals(-1, $movedPoint->getX());
        $this->assertEquals(-1, $movedPoint->getY());
    }

    public function testVector()
    {
        $oVector = new Vector(3, 4);
        $this->assertEquals(5, $oVector->getLength());
        $this->assertEquals(3, $oVector->getDeltaX());
        $this->assertEquals(4, $oVector->getDeltaY());

        $newVector = $oVector->add(new Vector(-7, -7));
        $this->assertEquals(5, $newVector->getLength());
        $this->assertEquals(-4, $newVector->getDeltaX());
        $this->assertEquals(-3, $newVector->getDeltaY());
    }

    public function testRectangle()
    {
        $oRectangle = new Rectangle(5,2);
        $this->assertEquals(10,$oRectangle->getArea());
        $this->assertEquals(5,$oRectangle->getWidth());
        $this->assertEquals(2,$oRectangle->getHeight());
    }
}
