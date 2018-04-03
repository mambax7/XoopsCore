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
 * Publisher install.
 *
 * @copyright       2014 XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Richard Griffith <richard@geekwright.com>
 */
use Xmf\Database\TableLoad;

/**
 * @param  XoopsModule $module
 * @return boolean
 */
function xoops_module_install_publisher(XoopsModule $module): bool
{
    $xoops = Xoops::getInstance();

    $count = TableLoad::countRows('publisher_mimetypes');
    if (0 === $count) {
        $filename = $xoops->path('modules/publisher/sql/publisher_mimetypes.yml');
        TableLoad::loadTableFromYamlFile('publisher_mimetypes', $filename);
    }

    return true;
}
