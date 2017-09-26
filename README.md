
[![Latest Stable Version](https://img.shields.io/github/release/mrcnpdlk/grandstream-xmlapp.svg)](https://packagist.org/packages/mrcnpdlk/grandstream-xmlapp)
[![Latest Unstable Version](https://poser.pugx.org/mrcnpdlk/grandstream-xmlapp/v/unstable.png)](https://packagist.org/packages/mrcnpdlk/grandstream-xmlapp)
[![Total Downloads](https://img.shields.io/packagist/dt/mrcnpdlk/grandstream-xmlapp.svg)](https://packagist.org/packages/mrcnpdlk/grandstream-xmlapp)
[![Monthly Downloads](https://img.shields.io/packagist/dm/mrcnpdlk/grandstream-xmlapp.svg)](https://packagist.org/packages/mrcnpdlk/grandstream-xmlapp)
[![License](https://img.shields.io/packagist/l/mrcnpdlk/grandstream-xmlapp.svg)](https://packagist.org/packages/mrcnpdlk/grandstream-xmlapp)    

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mrcnpdlk/grandstream-xmlapp/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mrcnpdlk/grandstream-xmlapp/?branch=master) 
[![Build Status](https://scrutinizer-ci.com/g/mrcnpdlk/grandstream-xmlapp/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mrcnpdlk/grandstream-xmlapp/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/mrcnpdlk/grandstream-xmlapp/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mrcnpdlk/grandstream-xmlapp/?branch=master)

[![Code Climate](https://codeclimate.com/github/mrcnpdlk/grandstream-xmlapp/badges/gpa.svg)](https://codeclimate.com/github/mrcnpdlk/grandstream-xmlapp) 


# GRANDSTREAM XMLAPP

This library supports to create AddressBook and XML Application for Grandstream Phones:
 - GXP 2100
 - GXP 2110
 - GXP 2120
 - GXP 2124

## Installation

Install the latest version with [composer](https://packagist.org/packages/mrcnpdlk/grandstream-xmlapp)
```bash
composer require mrcnpdlk/grandstream-xmlapp
```

## Basic usage
### AddressBook
```php
use mrcnpdlk\Grandstream\XMLApp\AddressBook\View;

require __DIR__ . '/../vendor/autoload.php';

$oView = new View();

$oView->addContact('Doe', '123123123', 'John');
$oView->addContact('Nowak', '456456456');

header('Content-type: application/xml; charset="utf-8"');

echo $oView->asTxt();
```
Result:
```xml
<AddressBook>
    <Contact>
        <LastName>Doe</LastName>
        <FirstName/>
        <Email/>
        <Department/>
        <Company/>
        <Icon/>
        <Phone>
            <phonenumber>123123123</phonenumber>
            <accountindex>1</accountindex>
        </Phone>
    </Contact>
    <Contact>
        <LastName>Nowak</LastName>
        <FirstName/>
        <Email/>
        <Department/>
        <Company/>
        <Icon/>
        <Phone>
            <phonenumber>456456456</phonenumber>
            <accountindex>1</accountindex>
        </Phone>
    </Contact>
</AddressBook>
```
### XML App

```php
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemRectangle;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemSelect;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Components\ElemString;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Container;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Event;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\SoftKey;
use mrcnpdlk\Grandstream\XMLApp\Application\Model\Styles;
use mrcnpdlk\Grandstream\XMLApp\Application\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\Application\View;
use mrcnpdlk\Grandstream\XMLApp\Helper\Color;

require __DIR__ . '/../vendor/autoload.php';

$oView = new View();

/**
 * create 1st Container
 */
$oContainer_1 = new Container();
/**
 * create required elements
 */
$oString_1 = new ElemString('First line');
$oString_2 = new ElemString('Second line');
$oString_2->move(0, 10);
/**
 * Add some elements to Container and easy move all container on LCD Display
 * Pay attention to the size of the screen
 */
$oContainer_1->addElement($oString_1)
             ->addElement($oString_2)
             ->move(0, 60)
;
/**
 * Put Container on LCD Display
 */
$oView->addContainer($oContainer_1);

/**
 * create 2nd Container
 */
$oContainer_2 = new Container();

$oSelect_1 = new ElemSelect('select_1');
$oSelect_1->setStyles((new  Styles(100))
    ->setColorBg(new Color(100))
    ->setColor(new Color(0))
    ->setColorBorder(new Color(30))
)
          ->addItem('one', 1)
          ->addItem('two', 2)
          ->addItem('three', 3)
;


$oSelect_2 = new ElemSelect('select_2');
$oSelect_2->setStyles(new  Styles(100))
          ->addItem('apple', 1)
          ->addItem('orange', 2)
          ->addItem('lemon', 3)
          ->move(0, 20)
;

$oContainer_2
    ->addElement($oSelect_1)
    ->addElement($oSelect_2)
    ->move(0, 20)
;
$oView->addContainer($oContainer_2);

/**
 * Elements can be added directly on the View without using Container
 */
$oView->addElem(new ElemRectangle(10, 10));

/**
 * You can also define SoftKey
 */
$oView->addSoftkey(new SoftKey(ModelConstant::ACTION_QUIT_APP, 'Exit'));

/**
 * And define Events
 */
$oEvent = new Event(ModelConstant::STATE_OFFHOOK, ModelConstant::ACTION_DIAL, '299');
$oView->addEvent($oEvent);

/**
 * Last thing. Left status bar can be disabled (more space on screen)
 */
$oView->setVisibleStatusLine(false);

/**
 * Echo text for phone
 */
header('Content-type: application/xml; charset="utf-8"');
echo $oView->asTxt();
```

Result:
```xml
<Screen>
    <Page ignoreCallUpdate="false">
        <ShowStatusLine>false</ShowStatusLine>
        <Contents>
            <DisplayString font="unifont" halign="left" color="Black" bgcolor="None">
                <X>0</X>
                <Y>60</Y>
                <DisplayStr>First line</DisplayStr>
            </DisplayString>
            <DisplayString font="unifont" halign="left" color="Black" bgcolor="None">
                <X>0</X>
                <Y>70</Y>
                <DisplayStr>Second line</DisplayStr>
            </DisplayString>
            <select name="select_1">
                <styles pos_x="0" pos_y="20" width="100" color="White" bgcolor="Black" border-color="Light3"/>
                <items>
                    <item value="1">one</item>
                    <item value="2">two</item>
                    <item value="3">three</item>
                </items>
            </select>
            <select name="select_2">
                <styles pos_x="0" pos_y="40" width="100" color="Black" bgcolor="Light4" border-color="Black"/>
                <items>
                    <item value="1">apple</item>
                    <item value="2">orange</item>
                    <item value="3">lemon</item>
                </items>
            </select>
            <DisplayRectangle x="0" y="0" width="10" height="10" bgcolor="None" border-color="Black"/>
        </Contents>
        <SoftKeys>
            <SoftKey action="QuitApp" label="Exit"/>
        </SoftKeys>
    </Page>
    <Events>
        <Event state="offhook">
            <Action action="Dial" commandArgs="299"/>
        </Event>
    </Events>
</Screen>
```
