<?php

namespace mrcnpdlk\GSUtils;

/**
 * Class XmlValidator
 *
 * @package     mrcnpdlk\GSUtils
 * @see         https://www.codementor.io/surajudeenakande/validating-xml-against-xsd-in-php-6f56rwcds
 */
class XmlValidator
{
    /**
     * @var int
     */
    public $feedErrors = 0;
    /**
     * Formatted libxml Error details 
     *
     * @var string[]
     */
    public $errorDetails;
    /**
     * @var string
     */
    protected $feedSchema = __DIR__ . '/sample.xsd';

    /**
     * Validation Class constructor Instantiating DOMDocument
     *
     * @param \DOMDocument $handler [description]
     */
    public function __construct()
    {
        $this->handler = new \XMLReader();
    }

    /**
     * Validate Incoming Feeds against Listing Schema
     *
     * @param resource $feeds
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function validateFeeds($feeds)
    {
        if (!class_exists('XMLReader')) {
            throw new \DOMException("'XMLReader' class not found!");
        }

        if (!file_exists($this->feedSchema)) {
            throw new \Exception('Schema is Missing, Please add schema to feedSchema property');
        }

        $this->handler->open($feeds);
        $this->handler->setSchema($this->feedSchema);
        libxml_use_internal_errors(true);
        while ($this->handler->read()) {
            if (!$this->handler->isValid()) {
                $this->errorDetails = $this->libxmlDisplayErrors();
                $this->feedErrors   = 1;
            } else {
                return true;
            }
        };

        return false;
    }

    /**
     * @return string[]
     */
    private function libxmlDisplayErrors()
    {
        $errors = libxml_get_errors();
        $result = [];
        foreach ($errors as $error) {
            $result[] = $this->libxmlDisplayError($error);
        }
        libxml_clear_errors();

        return $result;
    }

    /**
     * @param \libXMLError object $error
     *
     * @return string
     */
    private function libxmlDisplayError($error)
    {
        $errorString = "Error $error->code in $error->file (Line:{$error->line}):";
        $errorString .= trim($error->message);

        return $errorString;
    }

    /**
     * Display Error if Resource is not validated
     *
     * @return array
     */
    public function displayErrors()
    {
        return $this->errorDetails;
    }
}
