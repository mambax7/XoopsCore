<?php
/**
 * Xlanguage module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       2010-2014 XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         Xlanguage
 * @since           2.6.0
 * @author          Laurent JEN (Aka DuGris)
 * @version         $Id$
 */

use Xoops\Core\Kernel\Handlers\XoopsModule;

/**
 * @return bool
 */
function xoops_module_install_xlanguage(XoopsModule $module)
{
    $xoops = Xoops::getInstance();
    xlanguage_mkdirs($xoops->path(\XoopsBaseConfig::get('var-path')) . '/configs/xlanguage');

    return true;
}

/**
 * @return bool
 */
function xoops_module_update_xlanguage(XoopsModule $module, $version)
{
    return xoops_module_install_xlanguage($module);
}

/**
 * @param mixed|string $pathout
 *
 * @return bool
 */
function xlanguage_mkdirs($pathname, $pathout = null)
{
    $xoops = Xoops::getInstance();
    $pathname = substr($pathname, strlen(\XoopsBaseConfig::get('root-path')));
    $pathname = str_replace(DIRECTORY_SEPARATOR, '/', $pathname);

    $dest = ($pathout === null) ? \XoopsBaseConfig::get('root-path') : $pathout;
    $paths = explode('/', $pathname);

    foreach ($paths as $path) {
        if (! empty($path)) {
            $dest = $dest . '/' . $path;
            if (! is_dir($dest)) {
                if (! mkdir($dest, 0755)) {
                    return false;
                }
                    xlanguage_copyfile($xoops->path('uploads'), 'index.html', $dest);

            }
        }
    }

    return true;
}

/**
 * @return bool
 */
function xlanguage_copyfile($folder_in, $source_file, $folder_out)
{
    if (! is_dir($folder_out)) {
        if (! xlanguage_mkdirs($folder_out)) {
            return false;
        }
    }

    // Simple copy for a file
    if (is_file($folder_in . '/' . $source_file)) {
        return copy($folder_in . '/' . $source_file, $folder_out . '/' . basename($source_file));
    }

    return false;
}
