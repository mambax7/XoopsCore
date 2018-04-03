<?php declare(strict_types=1);

/**
 * Location: xml/SaxParser.class.
 *
 * Provides basic functionality to read and parse XML documents.  Subclasses
 * must implement all the their custom handlers by using add* function methods.
 * They may also use the handle*() methods to parse a specific XML begin and end
 * tags, but this is not recommended as it is more difficult.
 *
 * Copyright &copy; 2001 eXtremePHP.  All rights reserved.
 *
 * @author Ken Egervari
 */
class saxparser
{
    public $level;

    public $parser;

    public $isCaseFolding;

    public $targetEncoding;

    /* Custom Handler Variables */
    public $tagHandlers = [];

    /* Tag stack */
    public $tags = [];

    /* Xml Source Input */
    public $xmlInput;

    public $errors = [];

    /**
     * Creates a SaxParser object using a FileInput to represent the stream
     * of XML data to parse.  Use the static methods createFileInput or
     * createStringInput to construct xml input source objects to supply
     * to the constructor, or the implementor can construct them individually.
     */
    public function __construct(&$input)
    {
        $this->level = 0;
        $this->parser = xml_parser_create('UTF-8');
        xml_set_object($this->parser, $this);
        $this->input = $input;
        $this->setCaseFolding(false);
        $this->useUtfEncoding();
        xml_set_element_handler($this->parser, 'handleBeginElement', 'handleEndElement');
        xml_set_character_data_handler($this->parser, 'handleCharacterData');
        xml_set_processing_instruction_handler($this->parser, 'handleProcessingInstruction');
        xml_set_default_handler($this->parser, 'handleDefault');
        xml_set_unparsed_entity_decl_handler($this->parser, 'handleUnparsedEntityDecl');
        xml_set_notation_decl_handler($this->parser, 'handleNotationDecl');
        xml_set_external_entity_ref_handler($this->parser, 'handleExternalEntityRef');
    }

    /*---------------------------------------------------------------------------
        Property Methods
    ---------------------------------------------------------------------------*/

    /**
     * @return int
     */
    public function getCurrentLevel(): int
    {
        return $this->level;
    }

    /**
     * @param bool $isCaseFolding
     */
    public function setCaseFolding(bool $isCaseFolding): void
    {
        assert(is_bool($isCaseFolding));

        $this->isCaseFolding = $isCaseFolding;
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, $this->isCaseFolding);
    }

    public function useIsoEncoding(): void
    {
        $this->targetEncoding = 'ISO-8859-1';
        xml_parser_set_option($this->parser, XML_OPTION_TARGET_ENCODING, $this->targetEncoding);
    }

    public function useAsciiEncoding(): void
    {
        $this->targetEncoding = 'US-ASCII';
        xml_parser_set_option($this->parser, XML_OPTION_TARGET_ENCODING, $this->targetEncoding);
    }

    public function useUtfEncoding(): void
    {
        $this->targetEncoding = 'UTF-8';
        xml_parser_set_option($this->parser, XML_OPTION_TARGET_ENCODING, $this->targetEncoding);
    }

    /**
     * Returns the name of the xml tag being parsed.
     * @return string
     */
    public function getCurrentTag(): string
    {
        return $this->tags[count($this->tags) - 1];
    }

    public function getParentTag()
    {
        if (isset($this->tags[count($this->tags) - 2])) {
            return $this->tags[count($this->tags) - 2];
        }

        return false;
    }

    /*---------------------------------------------------------------------------
        Parser methods
    ---------------------------------------------------------------------------*/

    /**
     * @return bool
     */
    public function parse(): bool
    {
        if (!is_resource($this->input)) {
            if (!xml_parse($this->parser, $this->input)) {
                $this->setErrors($this->getXmlError());

                return false;
            }
            //if (!$fp = fopen($this->input, 'r')) {
            //    $this->setErrors('Could not open file: '.$this->input);
            //    return false;
            //}
        } else {
            while ($data = fread($this->input, 4096)) {
                if (!xml_parse($this->parser, str_replace("'", '&apos;', $data), feof($this->input))) {
                    $this->setErrors($this->getXmlError());
                    fclose($this->input);

                    return false;
                }
            }
            fclose($this->input);
        }

        return true;
    }

    public function free(): void
    {
        xml_parser_free($this->parser);
    }

    /**
     * @private
     * @return string
     */
    public function getXmlError(): string
    {
        return sprintf('XmlParse error: %s at line %d', xml_error_string(xml_get_error_code($this->parser)), xml_get_current_line_number($this->parser));
    }

    /*---------------------------------------------------------------------------
        Custom Handler Methods
    ---------------------------------------------------------------------------*/

    /**
     * Adds a callback function to be called when a tag is encountered.<br>.
     */
    public function addTagHandler(XmlTagHandler $tagHandler): void
    {
        $name = $tagHandler->getName();
        if (is_array($name)) {
            foreach ($name as $n) {
                $this->tagHandlers[$n] = $tagHandler;
            }
        } else {
            $this->tagHandlers[$name] = $tagHandler;
        }
    }

    /*---------------------------------------------------------------------------
        Private Handler Methods
    ---------------------------------------------------------------------------*/

    /**
     * Callback function that executes whenever a the start of a tag
     * occurs when being parsed.
     * @param int    $parser          The handle to the parser.
     * @param string $tagName         The name of the tag currently being parsed.
     * @param array  $attributesArray The list of attributes associated with the tag.
     * @private
     */
    public function handleBeginElement(int $parser, string $tagName, array $attributesArray): void
    {
        array_push($this->tags, $tagName);
        $this->level++;
        if (isset($this->tagHandlers[$tagName]) && is_subclass_of($this->tagHandlers[$tagName], 'xmltaghandler')) {
            $this->tagHandlers[$tagName]->handleBeginElement($this, $attributesArray);
        } else {
            $this->handleBeginElementDefault($parser, $tagName, $attributesArray);
        }
    }

    /**
     * Callback function that executes whenever the end of a tag
     * occurs when being parsed.
     * @param int    $parser  The handle to the parser.
     * @param string $tagName The name of the tag currently being parsed.
     * @private
     */
    public function handleEndElement(int $parser, string $tagName): void
    {
        array_pop($this->tags);
        if (isset($this->tagHandlers[$tagName]) && is_subclass_of($this->tagHandlers[$tagName], 'xmltaghandler')) {
            $this->tagHandlers[$tagName]->handleEndElement($this);
        } else {
            $this->handleEndElementDefault($parser, $tagName);
        }
        $this->level--;
    }

    /**
     * Callback function that executes whenever character data is encountered
     * while being parsed.
     * @param int    $parser The handle to the parser.
     * @param string $data   Character data inside the tag
     */
    public function handleCharacterData(int $parser, string $data): void
    {
        $tagHandler = isset($this->tagHandlers[$this->getCurrentTag()]) ? $this->tagHandlers[$this->getCurrentTag()] : null;
        if (null !== $tagHandler && is_subclass_of($tagHandler, 'xmltaghandler')) {
            $tagHandler->handleCharacterData($this, $data);
        } else {
            $this->handleCharacterDataDefault($parser, $data);
        }
    }

    /**
     * @param int $parser The handle to the parser.
     */
    public function handleProcessingInstruction(int $parser, &$target, &$data): void
    {
        //        if($target == 'php') {
        //            eval($data);
        //        }
    }

    public function handleDefault($parser, $data): void
    {
    }

    public function handleUnparsedEntityDecl($parser, $entityName, $base, $systemId, $publicId, $notationName): void
    {
    }

    public function handleNotationDecl($parser, $notationName, $base, $systemId, $publicId): void
    {
    }

    public function handleExternalEntityRef($parser, $openEntityNames, $base, $systemId, $publicId): void
    {
    }

    /**
     * The default tag handler method for a tag with no handler.
     */
    public function handleBeginElementDefault($parser, $tagName, $attributesArray): void
    {
    }

    /**
     * The default tag handler method for a tag with no handler.
     */
    public function handleEndElementDefault($parser, $tagName): void
    {
    }

    /**
     * The default tag handler method for a tag with no handler.
     *
     *
     * @abstract
     */
    public function handleCharacterDataDefault($parser, $data): void
    {
    }

    /**
     * Sets error messages.
     *
     * @param string $error string    an error message
     */
    public function setErrors(string $error): void
    {
        $this->errors[] = trim($error);
    }

    /**
     * Gets all the error messages.
     *
     * @param  bool  $ashtml return as html?
     * @return mixed
     */
    public function getErrors(bool $ashtml = true)
    {
        if (!$ashtml) {
            return $this->errors;
        }
        $ret = '';
        if (count($this->errors) > 0) {
            foreach ($this->errors as $error) {
                $ret .= $error.'<br />';
            }
        }

        return $ret;
    }
}
