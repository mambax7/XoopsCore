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
abstract class XoopsXmlRpcDocument
{
    /**
     * @var array of XoopsXmlRpcTag
     */
    protected $_tags = [];

    public function add(XoopsXmlRpcTag $tagobj): void
    {
        $this->_tags[] = $tagobj;
    }

    abstract public function render(): void;
}

/**
 * Class XoopsXmlRpcResponse.
 */
class XoopsXmlRpcResponse extends XoopsXmlRpcDocument
{
    /**
     * @return string
     */
    public function render(): string
    {
        $payload = '';
        foreach ($this->_tags as $tag) {
            /* @var $tag XoopsXmlRpcTag */
            if (!$tag->isFault()) {
                $payload .= $tag->render();
            } else {
                return '<?xml version="1.0"?><methodResponse>'.$tag->render().'</methodResponse>';
            }
        }

        return '<?xml version="1.0"?><methodResponse><params><param>'.$payload.'</param></params></methodResponse>';
    }
}

/**
 * Class XoopsXmlRpcRequest.
 */
class XoopsXmlRpcRequest extends XoopsXmlRpcDocument
{
    /**
     * @var string
     */
    public $methodName;

    /**
     * @param string $methodName
     */
    public function __construct(string $methodName)
    {
        $this->methodName = trim($methodName);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $payload = '';
        foreach ($this->_tags as $tag) {
            /* @var $tag XoopsXmlRpcTag */
            $payload .= '<param>'.$tag->render().'</param>';
        }

        return '<?xml version="1.0"?><methodCall><methodName>'.$this->methodName.'</methodName><params>'.$payload.'</params></methodCall>';
    }
}

/**
 * Class XoopsXmlRpcTag.
 */
abstract class XoopsXmlRpcTag
{
    /**
     * @var bool
     */
    protected $_fault = false;

    /**
     * encode - make string HTML safe.
     *
     * @param string $text string to encode
     *
     * @return string
     */
    public function encode(string $text): string
    {
        return htmlspecialchars($text, ENT_XML1, 'UTF-8');
    }

    /**
     * @param bool $fault
     */
    public function setFault(bool $fault = true): void
    {
        $this->_fault = (bool) $fault;
    }

    /**
     * @return bool
     */
    public function isFault(): bool
    {
        return $this->_fault;
    }

    /**
     * @abstract
     */
    abstract public function render(): void;
}

/**
 * Class XoopsXmlRpcFault.
 */
class XoopsXmlRpcFault extends XoopsXmlRpcTag
{
    /**
     * @var int
     */
    protected $_code;

    /**
     * @var string
     */
    protected $_extra;

    /**
     * @param int    $code
     * @param string $extra
     */
    public function __construct(int $code, ?string $extra = null)
    {
        $this->setFault(true);
        $this->_code = (int) ($code);
        $this->_extra = isset($extra) ? trim($extra) : '';
    }

    /**
     * @return string
     */
    public function render(): string
    {
        switch ($this->_code) {
            case 101:
                $string = 'Invalid server URI';

                break;
            case 102:
                $string = 'Parser parse error';

                break;
            case 103:
                $string = 'Module not found';

                break;
            case 104:
                $string = 'User authentication failed';

                break;
            case 105:
                $string = 'Module API not found';

                break;
            case 106:
                $string = 'Method response error';

                break;
            case 107:
                $string = 'Method not supported';

                break;
            case 108:
                $string = 'Invalid parameter';

                break;
            case 109:
                $string = 'Missing parameters';

                break;
            case 110:
                $string = 'Selected blog application does not exist';

                break;
            case 111:
                $string = 'Method permission denied';

                break;
            default:
                $string = 'Method response error';

                break;
        }
        $string .= "\n".$this->_extra;

        return '<fault><value><struct><member><name>faultCode</name><value>'.$this->_code.'</value></member><member><name>faultString</name><value>'.$this->encode($string).'</value></member></struct></value></fault>';
    }
}

/**
 * Class XoopsXmlRpcInt.
 */
class XoopsXmlRpcInt extends XoopsXmlRpcTag
{
    /**
     * @var int
     */
    protected $_value;

    public function __construct($value)
    {
        $this->_value = (int) ($value);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return '<value><int>'.$this->_value.'</int></value>';
    }
}

/**
 * Class XoopsXmlRpcDouble.
 */
class XoopsXmlRpcDouble extends XoopsXmlRpcTag
{
    /**
     * @var float
     */
    protected $_value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->_value = (float) $value;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return '<value><double>'.$this->_value.'</double></value>';
    }
}

/**
 * Class XoopsXmlRpcBoolean.
 */
class XoopsXmlRpcBoolean extends XoopsXmlRpcTag
{
    /**
     * @var int
     */
    protected $_value;

    /**
     * @param bool $value
     */
    public function __construct(bool $value)
    {
        $this->_value = (!empty($value) && false !== $value) ? 1 : 0;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return '<value><boolean>'.$this->_value.'</boolean></value>';
    }
}

/**
 * Class XoopsXmlRpcString.
 */
class XoopsXmlRpcString extends XoopsXmlRpcTag
{
    /**
     * @var string
     */
    protected $_value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->_value = (string) ($value);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return '<value><string>'.$this->encode($this->_value).'</string></value>';
    }
}

/**
 * Class XoopsXmlRpcDatetime.
 */
class XoopsXmlRpcDatetime extends XoopsXmlRpcTag
{
    /**
     * @var int
     */
    protected $_value;

    /**
     * @param int|string $value
     */
    public function __construct($value)
    {
        if (!is_numeric($value)) {
            $this->_value = strtotime($value);
        } else {
            $this->_value = (int) ($value);
        }
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return '<value><dateTime.iso8601>'.gmstrftime('%Y%m%dT%H:%M:%S', $this->_value).'</dateTime.iso8601></value>';
    }
}

/**
 * Class XoopsXmlRpcBase64.
 */
class XoopsXmlRpcBase64 extends XoopsXmlRpcTag
{
    /**
     * @var string
     */
    protected $_value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->_value = base64_encode($value);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return '<value><base64>'.$this->_value.'</base64></value>';
    }
}

/**
 * Class XoopsXmlRpcArray.
 */
class XoopsXmlRpcArray extends XoopsXmlRpcTag
{
    /**
     * @var array of XoopsXmlRpcTag
     */
    protected $_tags = [];

    public function add(XoopsXmlRpcTag $tagobj): void
    {
        $this->_tags[] = $tagobj;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $ret = '<value><array><data>';
        foreach ($this->_tags as $tag) {
            /* @var $tag XoopsXmlRpcTag */
            $ret .= $tag->render();
        }
        $ret .= '</data></array></value>';

        return $ret;
    }
}

/**
 * Class XoopsXmlRpcStruct.
 */
class XoopsXmlRpcStruct extends XoopsXmlRpcTag
{
    /**
     * @var array of array containing XoopsXmlRpcTag
     */
    protected $_tags = [];

    public function add($name, XoopsXmlRpcTag $tagobj): void
    {
        $this->_tags[] = ['name' => $name, 'value' => $tagobj];
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $ret = '<value><struct>';
        foreach ($this->_tags as $tag) {
            /* @var $tag['value'] XoopsXmlRplTag */
            $ret .= '<member><name>'.$this->encode($tag['name']).'</name>'.$tag['value']->render().'</member>';
        }
        $ret .= '</struct></value>';

        return $ret;
    }
}
