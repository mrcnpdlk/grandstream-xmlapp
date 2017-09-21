<?php

namespace mrcnpdlk\Grandstream\XMLApp;

/**
 * Class ElementAbstract
 *
 * @package mrcnpdlk\Grandstream\XMLApp
 */
class ElementAbstract
{

    /**
     * @param \SimpleXMLElement $root
     * @param \SimpleXMLElement $new
     * @param string|null       $namespace
     */
    public static function xml_adopt(\SimpleXMLElement $root, \SimpleXMLElement $new, string $namespace = null)
    {
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
                static::xml_adopt($node, $child, $space);
            }
        }
    }

    /**
     * @return string
     */
    public function getTxt()
    {
        $dom                     = new \DOMDocument("1.0", 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($this->getXmlObject()->asXML());

        return $dom->saveXML();
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXmlObject()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>');

        return $oXml;
    }
}
