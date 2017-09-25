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

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;

use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelConstant;
use mrcnpdlk\Grandstream\XMLApp\CustomScreen\ModelInterface;
use mrcnpdlk\Grandstream\XMLApp\MyXML;


/**
 * Class SoftKey
 *
 * @package mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model
 */
class SoftKey implements ModelInterface
{
    /**
     * @var string
     */
    private $sAction;
    /**
     * @var string
     */
    private $sCondition;
    /**
     * @var string
     */
    private $sLabel;

    /**
     * SoftKey constructor.
     *
     * @param string $action
     * @param string $condition
     */
    public function __construct(string $action, string $condition = ModelConstant::COND_TYPE_ALWAYS)
    {
        $this->sAction    = $action;
        $this->sCondition = $condition;

    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->sLabel = $label;

        return $this;
    }


    /**
     * @return MyXML
     */
    public function getXml(): MyXML
    {
        $oXml = new MyXML('SoftKey');

        if ($this->sLabel) {
            $oXml->asObject()->addAttribute('label', $this->sLabel);
        }
        $oXml->asObject()->addChild('Action')->addChild($this->sAction);
        $oXml->asObject()->addChild('displayCondition')->addChild('conditionType', $this->sCondition);

        return $oXml;
    }
}
