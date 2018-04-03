<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           1.0.0
 * @author          Kazumi Ono (AKA onokazu)
 * @version         $Id $
 */

/**
 * Class RSS Parser.
 *
 * This class offers methods to parse RSS Files
 *
 * @see      http://www.xoops.org/ Latest release of this class
 * @copyright Copyright (c) 2001 xoops.org. All rights reserved.
 * @author    Kazumi Ono <onokazu@xoops.org>
 * @version   $Id$
 */
class XoopsXmlRpcParser extends SaxParser
{
    /**
     * @var array
     */
    protected $_param;

    /**
     * @var string
     */
    protected $_methodName;

    /**
     * @var array
     */
    protected $_tempName;

    /**
     * @var array
     */
    protected $_tempValue;

    /**
     * @var array
     */
    protected $_tempMember;

    /**
     * @var array
     */
    protected $_tempStruct;

    /**
     * @var array
     */
    protected $_tempArray;

    /**
     * @var array
     */
    protected $_workingLevel = [];

    /**
     * Constructor of the class.
     */
    public function __construct(&$input)
    {
        parent::__construct($input);
        $this->addTagHandler(new RpcMethodNameHandler());
        $this->addTagHandler(new RpcIntHandler());
        $this->addTagHandler(new RpcDoubleHandler());
        $this->addTagHandler(new RpcBooleanHandler());
        $this->addTagHandler(new RpcStringHandler());
        $this->addTagHandler(new RpcDateTimeHandler());
        $this->addTagHandler(new RpcBase64Handler());
        $this->addTagHandler(new RpcNameHandler());
        $this->addTagHandler(new RpcValueHandler());
        $this->addTagHandler(new RpcMemberHandler());
        $this->addTagHandler(new RpcStructHandler());
        $this->addTagHandler(new RpcArrayHandler());
    }

    /**
     * This Method starts the parsing of the specified RDF File. The File can be a local or a remote File.
     */
    public function setTempName($name): void
    {
        $this->_tempName[$this->getWorkingLevel()] = $name;
    }

    /**
     * @return string
     */
    public function getTempName(): string
    {
        return $this->_tempName[$this->getWorkingLevel()];
    }

    /**
     * @param mixed $value
     */
    public function setTempValue($value): void
    {
        if (is_array($value)) {
            settype($this->_tempValue, 'array');
            foreach ($value as $k => $v) {
                $this->_tempValue[$k] = $v;
            }
        } elseif (is_string($value)) {
            if (isset($this->_tempValue)) {
                if (is_string($this->_tempValue)) {
                    $this->_tempValue .= $value;
                }
            } else {
                $this->_tempValue = $value;
            }
        } else {
            $this->_tempValue = $value;
        }
    }

    /**
     * @return array
     */
    public function getTempValue(): array
    {
        return $this->_tempValue;
    }

    public function resetTempValue(): void
    {
        $this->_tempValue = null;
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function setTempMember(string $name, $value): void
    {
        $this->_tempMember[$this->getWorkingLevel()][$name] = $value;
    }

    /**
     * @return mixed
     */
    public function getTempMember()
    {
        return $this->_tempMember[$this->getWorkingLevel()];
    }

    public function resetTempMember(): void
    {
        $this->_tempMember[$this->getWorkingLevel()] = [];
    }

    public function setWorkingLevel(): void
    {
        array_push($this->_workingLevel, $this->getCurrentLevel());
    }

    /**
     * @return mixed
     */
    public function getWorkingLevel()
    {
        return (count($this->_workingLevel) > 0)
            ? $this->_workingLevel[count($this->_workingLevel) - 1]
            : null;
    }

    public function releaseWorkingLevel(): void
    {
        array_pop($this->_workingLevel);
    }

    /**
     * @param array $member
     */
    public function setTempStruct(array $member): void
    {
        $key = key($member);
        $this->_tempStruct[$this->getWorkingLevel()][$key] = $member[$key];
    }

    public function getTempStruct()
    {
        return $this->_tempStruct[$this->getWorkingLevel()];
    }

    public function resetTempStruct(): void
    {
        $this->_tempStruct[$this->getWorkingLevel()] = [];
    }

    /**
     * @param mixed $value
     */
    public function setTempArray($value): void
    {
        $this->_tempArray[$this->getWorkingLevel()][] = $value;
    }

    /**
     * @return mixed
     */
    public function getTempArray()
    {
        return $this->_tempArray[$this->getWorkingLevel()];
    }

    public function resetTempArray(): void
    {
        $this->_tempArray[$this->getWorkingLevel()] = [];
    }

    /**
     * @param string $methodName
     */
    public function setMethodName(string $methodName): void
    {
        $this->_methodName = $methodName;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->_methodName;
    }

    /**
     * @param mixed $value
     */
    public function setParam($value): void
    {
        $this->_param[] = $value;
    }

    /**
     * @return array
     */
    public function getParam(): array
    {
        return $this->_param;
    }
}

/**
 * Class RpcMethodNameHandler.
 */
class RpcMethodNameHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'methodName';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setMethodName($data);
    }
}

/**
 * Class RpcIntHandler.
 */
class RpcIntHandler extends XmlTagHandler
{
    /**
     * @return string[]
     */
    public function getName()
    {
        return ['int', 'i4'];
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setTempValue((int) ($data));
    }
}

/**
 * Class RpcDoubleHandler.
 */
class RpcDoubleHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'double';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $data = (float) $data;
        $parser->setTempValue($data);
    }
}

/**
 * Class RpcBooleanHandler.
 */
class RpcBooleanHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boolean';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $data = (bool) $data;
        $parser->setTempValue($data);
    }
}

/**
 * Class RpcStringHandler.
 */
class RpcStringHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'string';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setTempValue((string) ($data));
    }
}

/**
 * Class RpcDateTimeHandler.
 */
class RpcDateTimeHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'dateTime.iso8601';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $matches = [];
        if (!preg_match('/^([0-9]{4})([0-9]{2})([0-9]{2})T([0-9]{2}):([0-9]{2}):([0-9]{2})$/', $data, $matches)) {
            $parser->setTempValue(time());
        } else {
            $parser->setTempValue(gmmktime($matches[4], $matches[5], $matches[6], $matches[2], $matches[3], $matches[1]));
        }
    }
}

/**
 * Class RpcBase64Handler.
 */
class RpcBase64Handler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'base64';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setTempValue(base64_decode($data, true));
    }
}

/**
 * Class RpcNameHandler.
 */
class RpcNameHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'name';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'member':
                $parser->setTempName($data);

                break;
            default:
                break;
        }
    }
}

/**
 * Class RpcValueHandler.
 */
class RpcValueHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'value';
    }

    public function handleCharacterData(SaxParser $parser, &$data): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        switch ($parser->getParentTag()) {
            case 'member':
                $parser->setTempValue($data);

                break;
            case 'data':
            case 'array':
                $parser->setTempValue($data);

                break;
            default:
                break;
        }
    }

    public function handleBeginElement(SaxParser $parser, &$attributes): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        //$parser->resetTempValue();
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        switch ($parser->getCurrentTag()) {
            case 'member':
                $parser->setTempMember($parser->getTempName(), $parser->getTempValue());

                break;
            case 'array':
            case 'data':
                $parser->setTempArray($parser->getTempValue());

                break;
            default:
                $parser->setParam($parser->getTempValue());

                break;
        }
        $parser->resetTempValue();
    }
}

/**
 * Class RpcMemberHandler.
 */
class RpcMemberHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'member';
    }

    /**
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setWorkingLevel();
        $parser->resetTempMember();
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $member = $parser->getTempMember();
        $parser->releaseWorkingLevel();
        $parser->setTempStruct($member);
    }
}

/**
 * Class RpcArrayHandler.
 */
class RpcArrayHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'array';
    }

    /**
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setWorkingLevel();
        $parser->resetTempArray();
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setTempValue($parser->getTempArray());
        $parser->releaseWorkingLevel();
    }
}

/**
 * Class RpcStructHandler.
 */
class RpcStructHandler extends XmlTagHandler
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'struct';
    }

    /**
     * @param array $attributes
     */
    public function handleBeginElement(SaxParser $parser, array &$attributes): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setWorkingLevel();
        $parser->resetTempStruct();
    }

    public function handleEndElement(SaxParser $parser): void
    {
        if (!is_a($parser, 'XoopsXmlRpcParser')) {
            return;
        }
        $parser->setTempValue($parser->getTempStruct());
        $parser->releaseWorkingLevel();
    }
}
