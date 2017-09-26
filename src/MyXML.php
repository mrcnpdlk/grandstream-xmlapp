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


class MyXML
{
    /**
     * @var \SimpleXMLElement
     */
    private $oXml;

    /**
     * ExtendXML constructor.
     *
     * @param string $nodeRootName
     */
    public function __construct(string $nodeRootName)
    {
        $this->oXml = new \SimpleXMLElement(sprintf('<?xml version="1.0" encoding="UTF-8"?><%s></%s>', $nodeRootName, $nodeRootName));
    }

    /**
     * @param \SimpleXMLElement $new
     * @param string|null       $namespace
     * @param \SimpleXMLElement $root
     */
    public function insertChild(\SimpleXMLElement $new, string $namespace = null, \SimpleXMLElement $root = null)
    {
        if (is_null($root)) {
            $root = $this->asObject();
        }
        // first add the new node
        // NOTE: addChild does NOT escape "&" ampersands in (string)$new !!!
        //  replace them or use htmlspecialchars(). see addchild docs comments.
        $node = $root->addChild($new->getName(), (string)$new, $namespace);
        // add any attributes for the new node
        foreach ($new->attributes() as $attr => $value) {
            $node->addAttribute($attr, $value);
        }
        // get all namespaces, include a blank one
        $namespaces = array_merge([null], $new->getNameSpaces(true));
        // add any child nodes, including optional namespace
        foreach ($namespaces as $space) {
            foreach ($new->children($space) as $child) {
                $this->insertChild($child, $space, $node);
            }
        }
    }

    /**
     * @return \SimpleXMLElement
     */
    public function asObject()
    {
        return $this->oXml;
    }

    /**
     * @return string
     */
    public function asText()
    {
        $dom                     = new \DOMDocument("1.0", 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($this->asObject()->asXML());

        return $dom->saveXML();
    }

    /**
     * @param int $iWidth
     * @param int $iHeight
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setSize(int $iWidth, int $iHeight)
    {
        $this->setWidth($iWidth);
        $this->setHeight($iHeight);

        return $this;
    }

    /**
     * @param int $iWidth
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setWidth(int $iWidth)
    {
        $this->oXml->addAttribute('width', $iWidth);

        return $this;
    }

    /**
     * @param int $iHeight
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setHeight(int $iHeight)
    {
        $this->oXml->addAttribute('height', $iHeight);

        return $this;
    }

    /**
     * @param string $sColor
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setColorBg(string $sColor)
    {
        $this->oXml->addAttribute('bgcolor', $sColor);

        return $this;
    }

    /**
     * @param string $sColor
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setColorBorder(string $sColor)
    {
        $this->oXml->addAttribute('border-color', $sColor);

        return $this;
    }

    /**
     * @param string $sColor
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setColor(string $sColor)
    {
        $this->oXml->addAttribute('color', $sColor);

        return $this;
    }

    /**
     * @param string $sName
     *
     * @return \mrcnpdlk\Grandstream\XMLApp\MyXML
     */
    public function setName(string $sName)
    {
        $this->oXml->addAttribute('name', $sName);

        return $this;
    }
}
