<?php
/**
 * Location: xml/XmlTagHandler
 *
 * XmlTagHandler
 *
 * Copyright &copy; 2001 eXtremePHP.  All rights reserved.
 *
 * @author Ken Egervari, Remi Michalski
 */
class xmltaghandler
{
    /**
     * @abstract
     *
     * @return array|string
     */
    public function getName()
    {
    }

    /**
     * @abstract
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, &$attributes)
    {
    }

    /**
     * @abstract
     */
    public function handleEndElement(SaxParser $parser)
    {
    }

    /**
     * @abstract
     * @param string $data
     */
    public function handleCharacterData(SaxParser $parser, &$data)
    {
    }
}
