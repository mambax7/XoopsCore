<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core\Kernel\Handlers;

use Xoops\Core\Kernel\Dtype;
use Xoops\Core\Kernel\XoopsObject;
use Xoops\Core\Text\Sanitizer;

/**
 * XoopsBlock
 *
 * @category  Xoops\Core\Kernel\Handlers\XoopsBlock
 * @package   Xoops\Core\Kernel
 * @author    Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @author    Gregory Mage (AKA Mage)
 * @author    trabis <lusopoemas@gmail.com>
 * @copyright 2000-2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @link      http://xoops.org
 */
class XoopsBlock extends XoopsObject
{
    const CUSTOM_HTML = 'H'; // custom HTML block
    const CUSTOM_PHP = 'P'; // custom PHP block
    const CUSTOM_SMILIE = 'S'; // use text sanitizer (smilies enabled)
    const CUSTOM_TEXT = 'T'; // use text sanitizer (smilies disabled)

    const BLOCK_TYPE_SYSTEM = 'S'; // S - generated by system module
    const BLOCK_TYPE_MODULE = 'M'; // M - generated by a non-system module
    const BLOCK_TYPE_CUSTOM = 'C'; // C - Custom block
    const BLOCK_TYPE_CLONED = 'D'; // D - cloned system/module block
    // E - cloned custom block, DON'T use it

    /**
     * Constructor
     *
     * @param int|array $id object id
     */
    public function __construct($id = null)
    {
        $this->initVar('bid', Dtype::TYPE_INTEGER, null, false);
        $this->initVar('mid', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('func_num', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('options', Dtype::TYPE_TEXT_BOX, null, false, 255);
        $this->initVar('name', Dtype::TYPE_TEXT_BOX, null, true, 150);
        //$this->initVar('position', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('title', Dtype::TYPE_TEXT_BOX, null, false, 150);
        $this->initVar('content', Dtype::TYPE_TEXT_AREA, null, false);
        $this->initVar('side', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('weight', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('visible', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('block_type', Dtype::TYPE_OTHER, null, false);
        $this->initVar('c_type', Dtype::TYPE_OTHER, null, false);
        $this->initVar('isactive', Dtype::TYPE_INTEGER, null, false);
        $this->initVar('dirname', Dtype::TYPE_TEXT_BOX, null, false, 50);
        $this->initVar('func_file', Dtype::TYPE_TEXT_BOX, null, false, 50);
        $this->initVar('show_func', Dtype::TYPE_TEXT_BOX, null, false, 50);
        $this->initVar('edit_func', Dtype::TYPE_TEXT_BOX, null, false, 50);
        $this->initVar('template', Dtype::TYPE_OTHER, null, false);
        $this->initVar('bcachetime', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('last_modified', Dtype::TYPE_INTEGER, 0, false);

        $xoops = \Xoops::getInstance();

        // for backward compatibility
        if (isset($id)) {
            if (is_array($id)) {
                $this->assignVars($id);
            } else {
                $blockHandler = $xoops->getHandlerBlock();
                $obj = $blockHandler->get($id);
                foreach (array_keys($obj->getVars()) as $i) {
                    $this->assignVar($i, $obj->getVar($i, 'n'));
                }
            }
        }
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function id($format = 'n')
    {
        return $this->getVar('bid', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function bid($format = '')
    {
        return $this->getVar('bid', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function mid($format = '')
    {
        return $this->getVar('mid', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function func_num($format = '')
    {
        return $this->getVar('func_num', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function options($format = '')
    {
        return $this->getVar('options', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function name($format = '')
    {
        return $this->getVar('name', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function title($format = '')
    {
        return $this->getVar('title', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function content($format = '')
    {
        return $this->getVar('content', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function side($format = '')
    {
        return $this->getVar('side', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function weight($format = '')
    {
        return $this->getVar('weight', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function visible($format = '')
    {
        return $this->getVar('visible', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function block_type($format = '')
    {
        return $this->getVar('block_type', $format);
    }

    /**
     * getter custom block type XoopsBlock::CUSTOM_xxxx constant
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function c_type($format = '')
    {
        return $this->getVar('c_type', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function isactive($format = '')
    {
        return $this->getVar('isactive', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function dirname($format = '')
    {
        return $this->getVar('dirname', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function func_file($format = '')
    {
        return $this->getVar('func_file', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function show_func($format = '')
    {
        return $this->getVar('show_func', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function edit_func($format = '')
    {
        return $this->getVar('edit_func', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function template($format = '')
    {
        return $this->getVar('template', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function bcachetime($format = '')
    {
        return $this->getVar('bcachetime', $format);
    }

    /**
     * getter
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function last_modified($format = '')
    {
        return $this->getVar('last_modified', $format);
    }

    /**
     * return the content of the block for output
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     * @param string $c_type type of custom content, a XoopsBlock::CUSTOM_xxxx constant
     *                            H : custom HTML block
     *                            P : custom PHP block
     *                            S : use text sanitizer (smilies enabled)
     *                            T : use text sanitizer (smilies disabled)
     *
     * @return string content for output
     */
    public function getContent($format = 's', $c_type = 'T')
    {
        $format = mb_strtolower($format);
        $c_type = mb_strtoupper($c_type);
        switch ($format) {
            case Dtype::FORMAT_SHOW:
            case 's':
                // apply c_type rules for content display
                $content = $this->getVar('content', Dtype::FORMAT_NONE);
                switch ($c_type) {
                    case self::CUSTOM_HTML:
                        return $this->convertSiteURL($content);
                    case self::CUSTOM_PHP:
                        ob_start();
                        echo eval($content);
                        $content = ob_get_contents();
                        ob_end_clean();

                        return $this->convertSiteURL($content);
                    case self::CUSTOM_SMILIE:
                        $myts = Sanitizer::getInstance();

                        return $myts->filterForDisplay($this->convertSiteURL($content), 1, 1);
                    case self::CUSTOM_TEXT:
                    default:
                        $myts = Sanitizer::getInstance();

                        return $myts->filterForDisplay($this->convertSiteURL($content), 1, 0);
                }
                break;
            case Dtype::FORMAT_EDIT:
            case 'e':
                return $this->getVar('content', Dtype::FORMAT_EDIT);
                break;
            default:
                return $this->getVar('content', Dtype::FORMAT_NONE);
                break;
        }
    }

    /**
     * Convert {X_SITEURL} to actual site URL in content
     *
     * @param string $content content to convert
     *
     * @return string
     */
    protected function convertSiteURL($content)
    {
        $content = str_replace('{X_SITEURL}', \Xoops::getInstance()->url('/'), $content);

        return $content;
    }

    /**
     * (HTML-) form for setting the options of the block
     *
     * @return string|false HTML for the form, FALSE if not defined for this block
     */
    public function getOptions()
    {
        $xoops = \Xoops::getInstance();
        if (!$this->isCustom()) {
            $edit_func = (string)$this->getVar('edit_func');
            if (!$edit_func) {
                return false;
            }
            $funcFile = $xoops->path(
                'modules/' . $this->getVar('dirname') . '/blocks/' . $this->getVar('func_file')
            );
            if (\XoopsLoad::fileExists($funcFile)) {
                $xoops->loadLanguage('blocks', $this->getVar('dirname'));
                include_once $funcFile;
                if (function_exists($edit_func)) {
                    // execute the function
                    $options = explode('|', $this->getVar('options'));
                    $edit_form = $edit_func($options);
                    if (!$edit_form) {
                        return false;
                    }
                } else {
                    return false;
                }

                return $edit_form;
            }

            return false;
        }

        return false;
    }

    /**
     * Determine if this is a custom block
     *
     * @return bool true if this is a custom block
     */
    public function isCustom()
    {
        return self::BLOCK_TYPE_CUSTOM === $this->getVar('block_type');
    }

    /************ADDED**************/

    /**
     * Build Block
     *
     * @return array|bool
     */
    public function buildBlock()
    {
        $xoops = \Xoops::getInstance();
        $block = [];
        if (!$this->isCustom()) {
            // get block display function
            $show_func = (string)$this->getVar('show_func');
            if (!$show_func) {
                return false;
            }
            if (!\XoopsLoad::fileExists(
                $func_file = $xoops->path(
                    'modules/' . $this->getVar('dirname') . '/blocks/' . $this->getVar('func_file')
                )
            )) {
                return false;
            }
            // must get lang files b4 including the file
            // some modules require it for code that is outside the function
            $xoops->loadLanguage('blocks', $this->getVar('dirname'));
            $xoops->loadLocale($this->getVar('dirname'));
            include_once $func_file;

            if (function_exists($show_func)) {
                // execute the function
                $options = explode('|', $this->getVar('options'));
                $block = $show_func($options);
                if (!$block) {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            // it is a custom block, so just return the contents
            $block['content'] = $this->getContent('s', $this->getVar('c_type'));
            if (empty($block['content'])) {
                return false;
            }
        }

        return $block;
    }
}
