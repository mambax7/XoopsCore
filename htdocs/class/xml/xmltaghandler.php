<?php declare(strict_types=1);

/**
 * Location: xml/XmlTagHandler.
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
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
    }

    /**
     * @abstract
     */
    public function handleEndElement(SaxParser $parser): void
    {
    }

    /**
     * @abstract
     * @param string $data
     */
    public function handleCharacterData(SaxParser $parser, string &$data): void
    {
    }
}
