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
 * Userconfigs.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */
use Xoops\Core\Database\Connection;
use Xoops\Core\Kernel\XoopsObject;
use Xoops\Core\Kernel\XoopsPersistableObjectHandler;

/**
 * @author        Kazumi Ono    <onokazu@xoops.org>
 * @copyright    copyright (c) 2000-2003 XOOPS.org
 */
class UserconfigsItem extends XoopsObject
{
    /**
     * Config options.
     *
     * @var array
     */
    private $_confOptions = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initVar('conf_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('conf_modid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('conf_uid', XOBJ_DTYPE_INT, null, false);
        $this->initVar('conf_name', XOBJ_DTYPE_OTHER);
        $this->initVar('conf_title', XOBJ_DTYPE_TXTBOX);
        $this->initVar('conf_value', XOBJ_DTYPE_TXTAREA);
        $this->initVar('conf_desc', XOBJ_DTYPE_OTHER);
        $this->initVar('conf_formtype', XOBJ_DTYPE_OTHER);
        $this->initVar('conf_valuetype', XOBJ_DTYPE_OTHER);
        $this->initVar('conf_order', XOBJ_DTYPE_INT);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function id(string $format = 'n')
    {
        return $this->getVar('conf_id', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_id(string $format = '')
    {
        return $this->getVar('conf_id', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_modid(string $format = '')
    {
        return $this->getVar('conf_modid', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_uid(string $format = '')
    {
        return $this->getVar('conf_uid', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_name(string $format = '')
    {
        return $this->getVar('conf_name', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_title(string $format = '')
    {
        return $this->getVar('conf_title', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_value(string $format = '')
    {
        return $this->getVar('conf_value', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_desc(string $format = '')
    {
        return $this->getVar('conf_desc', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_formtype(string $format = '')
    {
        return $this->getVar('conf_formtype', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_valuetype(string $format = '')
    {
        return $this->getVar('conf_valuetype', $format);
    }

    /**
     * @param  string $format
     * @return mixed
     */
    public function conf_order(string $format = '')
    {
        return $this->getVar('conf_order', $format);
    }

    /**
     * Get a config value in a format ready for output.
     *
     * @return string
     */
    public function getConfValueForOutput(): string
    {
        switch ($this->getVar('conf_valuetype')) {
        case 'int':
            return (int) ($this->getVar('conf_value', 'n'));

            break;
        case 'array':
            $value = @unserialize($this->getVar('conf_value', 'n'));

            return $value ? $value : [];
        case 'float':
            $value = $this->getVar('conf_value', 'n');

            return (float) $value;

            break;
        case 'textarea':
            return $this->getVar('conf_value');
        default:
            return $this->getVar('conf_value', 'n');

            break;
        }
    }

    /**
     * Set a config value.
     *
     * @param mixed &$value Value
     */
    public function setConfValueForInput(&$value): void
    {
        switch ($this->getVar('conf_valuetype')) {
        case 'array':
            if (!is_array($value)) {
                $value = explode('|', trim($value));
            }
            $this->setVar('conf_value', serialize($value));

            break;
        case 'text':
            $this->setVar('conf_value', trim($value));

            break;
        default:
            $this->setVar('conf_value', $value);

            break;
        }
    }

    /**
     * Assign one or more {@link XoopsConfigItemOption}s.
     *
     * @param mixed $option either a {@link XoopsConfigItemOption} object or an array of them
     */
    public function setConfOptions($option): void
    {
        if (is_array($option)) {
            $count = count($option);
            for ($i = 0; $i < $count; ++$i) {
                $this->setConfOptions($option[$i]);
            }
        } else {
            if (is_object($option)) {
                $this->_confOptions[] = $option;
            }
        }
    }

    /**
     * Get the {@link XoopsConfigItemOption}s of this Config.
     *
     * @return array array of {@link XoopsConfigItemOption}
     */
    public function getConfOptions(): array
    {
        return $this->_confOptions;
    }

    /**
     * Clear options from this item.
     *
     **/
    public function clearConfOptions(): void
    {
        $this->_confOptions = [];
    }
}

class UserconfigsItemHandler extends XoopsPersistableObjectHandler
{
    /**
     * Constructor.
     *
     * @param Connection|null $db {@link Connection}
     */
    public function __construct(?Connection $db = null)
    {
        parent::__construct($db, 'userconfigs_item', 'UserconfigsItem', 'conf_id', 'conf_name');
    }
}
