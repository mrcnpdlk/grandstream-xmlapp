<?php

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen\Model;


class ModelAbstract
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
     * @param int|null $tone Grey tone, 0 - white, 100 - black, null - NONE
     *
     * @return string
     */
    public function getMonoColor(int $tone = null)
    {
        if (is_null($tone)) {
            return 'None';
        }
        $tTones = [
            'White',
            'Light6',
            'Light5',
            'Light4',
            'Light3',
            'Light2',
            'Light1',
            'LightGray',
            'Gray',
            'Dark1',
            'Dark2',
            'Dark3',
            'Dark4',
            'Dark5',
            'Dark6',
            'Black',
        ];
        $levels = count($tTones);
        $index  = (int)ceil($levels * $tone / 100) - 1;
        if ($index < 0) {
            $index = 0;
        } elseif ($index >= $levels) {
            $index = $levels - 1;
        }

        return $tTones[$index];
    }

    /**
     * @return string
     */
    public function getXmlPretty()
    {
        $dom                     = new \DOMDocument("1.0", 'URF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($this->getXml()->asXML());

        return $dom->saveXML();
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        $oXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><DisplayBitmap></DisplayBitmap>');

        return $oXml;
    }
}
