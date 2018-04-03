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
 * @version         $Id$
 */

namespace Xoops\Core\Kernel\Handlers;

use Xoops\Core\Kernel\Dtype;
use Xoops\Core\Kernel\XoopsObject;

/**
 * A Module.
 *
 * @category  Xoops\Core\Kernel\XoopsModule
 * @author    Kazumi Ono <onokazu@xoops.org>
 * @author    Taiwen Jiang <phppp@users.sourceforge.net>
 * @copyright 2000-2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class XoopsModule extends XoopsObject
{
    /**
     * @var string
     */
    public $modinfo;

    /**
     * @var array
     */
    public $adminmenu;

    protected $xoops_url;

    protected $xoops_root_path;

    /**
     * @var array
     */
    private $internalMessages = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initVar('mid', Dtype::TYPE_INTEGER, null, false);
        $this->initVar('name', Dtype::TYPE_TEXT_BOX, null, true, 150);
        $this->initVar('version', Dtype::TYPE_INTEGER, 100, false);
        $this->initVar('last_update', Dtype::TYPE_INTEGER, null, false);
        $this->initVar('weight', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('isactive', Dtype::TYPE_INTEGER, 1, false);
        $this->initVar('dirname', Dtype::TYPE_OTHER, null, true);
        $this->initVar('hasmain', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('hasadmin', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('hassearch', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('hasconfig', Dtype::TYPE_INTEGER, 0, false);
        $this->initVar('hascomments', Dtype::TYPE_INTEGER, 0, false);
        // RMV-NOTIFY
        $this->initVar('hasnotification', Dtype::TYPE_INTEGER, 0, false);

        $this->xoops_url = \XoopsBaseConfig::get('url');
        $this->xoops_root_path = \XoopsBaseConfig::get('root-path');
    }

    /**
     * Load module info.
     *
     * @param string $dirname module directory
     * @param bool   $verbose true for more information
     *
     * @todo module 'version' should be semver based -- 1.0.0 should be OK, not an error
     */
    public function loadInfoAsVar(string $dirname, bool $verbose = true): void
    {
        $dirname = basename($dirname);
        if (!isset($this->modinfo)) {
            $this->loadInfo($dirname, $verbose);
        }
        $this->setVar('name', $this->modinfo['name']);
        // see @todo
        $versionPieces = explode('.', $this->modinfo['version']);
        if (count($versionPieces) > 2) {
            $this->modinfo['version'] = $versionPieces[0].'.'.$versionPieces[1];
        }
        $this->setVar('version', (int) (100 * ($this->modinfo['version'] + 0.001)));
        $this->setVar('dirname', $this->modinfo['dirname']);
        $hasmain = (isset($this->modinfo['hasMain']) && 1 === $this->modinfo['hasMain']) ? 1 : 0;
        $hasadmin = (isset($this->modinfo['hasAdmin']) && 1 === $this->modinfo['hasAdmin']) ? 1 : 0;
        $hassearch = (isset($this->modinfo['hasSearch']) && 1 === $this->modinfo['hasSearch']) ? 1 : 0;
        $hasconfig = ((isset($this->modinfo['config']) && is_array($this->modinfo['config']))
            || !empty($this->modinfo['hasComments'])) ? 1 : 0;
        $hascomments = (isset($this->modinfo['hasComments']) && 1 === $this->modinfo['hasComments']) ? 1 : 0;
        // RMV-NOTIFY
        $hasnotification = (isset($this->modinfo['hasNotification']) && 1 === $this->modinfo['hasNotification']) ? 1 : 0;
        $this->setVar('hasmain', $hasmain);
        $this->setVar('hasadmin', $hasadmin);
        $this->setVar('hassearch', $hassearch);
        $this->setVar('hasconfig', $hasconfig);
        $this->setVar('hascomments', $hascomments);
        // RMV-NOTIFY
        $this->setVar('hasnotification', $hasnotification);
    }

    /**
     * add a message.
     *
     * @param string $str message to add
     */
    public function setMessage(string $str): void
    {
        $this->internalMessages[] = trim($str);
    }

    /**
     * return the messages for this object as an array.
     *
     * @return array an array of messages
     */
    public function getMessages(): array
    {
        return $this->internalMessages;
    }

    /**
     * Set module info.
     *
     * @param string $name  name
     * @param mixed  $value value
     *
     * @return bool
     **/
    public function setInfo(string $name, $value): bool
    {
        if (empty($name)) {
            $this->modinfo = $value;
        } else {
            $this->modinfo[$name] = $value;
        }

        return true;
    }

    /**
     * Get module info.
     *
     * @param string $name If $name is set, returns a single module information item as string.
     *
     * @return string[]|string Array of module information, or just the single name requested
     */
    public function getInfo(string $name = null)
    {
        if (!isset($this->modinfo)) {
            $this->loadInfo($this->getVar('dirname'));
        }
        if (isset($name)) {
            if (isset($this->modinfo[$name])) {
                return $this->modinfo[$name];
            }
            $return = false;

            return $return;
        }

        return $this->modinfo;
    }

    /**
     * Get a link to the modules main page.
     *
     * @return string|false FALSE on fail
     */
    public function mainLink()
    {
        if (1 === $this->getVar('hasmain')) {
            $ret = '<a href="'.$this->xoops_url.'/modules/'.$this->getVar('dirname').'/">'
                .$this->getVar('name').'</a>';

            return $ret;
        }

        return false;
    }

    /**
     * Get links to the subpages.
     *
     * @return string
     */
    public function subLink(): string
    {
        $ret = [];
        if ($this->getInfo('sub') && is_array($this->getInfo('sub'))) {
            foreach ($this->getInfo('sub') as $submenu) {
                $ret[] = [
                    'name' => $submenu['name'],
                    'url' => $submenu['url'], ];
            }
        }

        return $ret;
    }

    /**
     * Load the admin menu for the module.
     */
    public function loadAdminMenu(): void
    {
        $file = $this->xoops_root_path.'/modules/'.$this->getInfo('dirname').'/'.$this->getInfo('adminmenu');
        if ($this->getInfo('adminmenu') && '' !== $this->getInfo('adminmenu') && \XoopsLoad::fileExists($file)) {
            $adminmenu = [];
            include $file;
            $this->adminmenu = $adminmenu;
        }
    }

    /**
     * Get the admin menu for the module.
     *
     * @return string
     */
    public function getAdminMenu(): string
    {
        if (!isset($this->adminmenu)) {
            $this->loadAdminMenu();
        }

        return $this->adminmenu;
    }

    /**
     * Load the module info for this module.
     *
     * @param string $dirname Module directory
     * @param bool   $verbose Give an error on fail?
     *
     * @return bool
     *
     * @todo the $modVersions array should be built once when modules are installed/updated and then cached
     */
    public function loadInfo(string $dirname, bool $verbose = true): bool
    {
        static $modVersions;
        if (empty($dirname)) {
            return false;
        }
        $dirname = basename($dirname);
        if (isset($modVersions[$dirname])) {
            $this->modinfo = $modVersions[$dirname];

            return true;
        }
        $xoops = \Xoops::getInstance();
        $dirname = basename($dirname);
        $xoops->loadLanguage('modinfo', $dirname);
        $xoops->loadLocale($dirname);

        if (!\XoopsLoad::fileExists($file = $xoops->path('modules/'.$dirname.'/xoops_version.php'))) {
            if (false !== $verbose) {
                echo "Module File for ${dirname} Not Found!";
            }

            return false;
        }
        $modversion = [];
        include $file;
        $modVersions[$dirname] = $modversion;
        $this->modinfo = $modVersions[$dirname];

        return true;
    }

    /**
     * getter for mid.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function id(string $format = 'n')
    {
        return $this->getVar('mid', $format);
    }

    /**
     * another getter for mid.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function mid(string $format = '')
    {
        return $this->getVar('mid', $format);
    }

    /**
     * getter for module name.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function name(string $format = '')
    {
        return $this->getVar('name', $format);
    }

    /**
     * getter for module version.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function version(string $format = '')
    {
        return $this->getVar('version', $format);
    }

    /**
     * getter for module last update.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function last_update(string $format = '')
    {
        return $this->getVar('last_update', $format);
    }

    /**
     * getter for weight.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function weight(string $format = '')
    {
        return $this->getVar('weight', $format);
    }

    /**
     * getter for isactive.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function isactive(string $format = '')
    {
        return $this->getVar('isactive', $format);
    }

    /**
     * getter for dirname.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function dirname(string $format = '')
    {
        return $this->getVar('dirname', $format);
    }

    /**
     * getter for hasmain.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function hasmain(string $format = '')
    {
        return $this->getVar('hasmain', $format);
    }

    /**
     * getter for hasadmin.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function hasadmin(string $format = '')
    {
        return $this->getVar('hasadmin', $format);
    }

    /**
     * getter for hassearch.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function hassearch(string $format = '')
    {
        return $this->getVar('hassearch', $format);
    }

    /**
     * getter for hasconfig.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function hasconfig(string $format = '')
    {
        return $this->getVar('hasconfig', $format);
    }

    /**
     * getter for hascomments.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function hascomments(string $format = '')
    {
        return $this->getVar('hascomments', $format);
    }

    /**
     * getter for hasnotifications.
     *
     * @param string $format Dtype::FORMAT_xxxx constant
     *
     * @return mixed
     */
    public function hasnotification(string $format = '')
    {
        return $this->getVar('hasnotification', $format);
    }

    /**
     * get module by dirname.
     *
     * @param string $dirname directory name
     *
     * @return XoopsModule
     */
    public function getByDirname(string $dirname): XoopsModule
    {
        return \Xoops::getInstance()->getModuleByDirname($dirname);
    }
}
