<?php declare(strict_types=1);

/**
 * XOOPS Kernel Class.
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           2.0.0
 * @author          Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @version         $Id$
 */

namespace Xoops\Core\Kernel\Handlers;

use Xoops\Core\Kernel\Dtype;
use Xoops\Core\Kernel\XoopsObject;

/**
 * A Config-Option.
 *
 * @category  Xoops\Core\Kernel\Handlers\XoopsConfigOption
 * @author    Kazumi Ono <onokazu@xoops.org>
 * @copyright 2000-2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class XoopsConfigOption extends XoopsObject
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initVar('confop_id', Dtype::TYPE_INTEGER, null);
        $this->initVar('confop_name', Dtype::TYPE_TEXT_BOX, null, true, 255);
        $this->initVar('confop_value', Dtype::TYPE_TEXT_BOX, null, true, 255);
        $this->initVar('conf_id', Dtype::TYPE_INTEGER, 0);
    }

    /**
     * getter.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function id(string $format = Dtype::FORMAT_NONE)
    {
        return $this->getVar('confop_id', $format);
    }

    /**
     * getter.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function confop_id(string $format = '')
    {
        return $this->getVar('confop_id', $format);
    }

    /**
     * getter.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function confop_name(string $format = '')
    {
        return $this->getVar('confop_name', $format);
    }

    /**
     * getter.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function confop_value(string $format = '')
    {
        return $this->getVar('confop_value', $format);
    }

    /**
     * getter.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function conf_id(string $format = '')
    {
        return $this->getVar('conf_id', $format);
    }
}
