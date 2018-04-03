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
 * Protector.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */
$adminmenu = [
    [
        'title' => _MI_PROTECTOR_ADMINHOME,
        'link' => 'admin/index.php',
        'icon' => 'home.png',
    ], [
        'title' => _MI_PROTECTOR_ADMININDEX,
        'link' => 'admin/center.php',
        'icon' => 'firewall.png',
    ], [
        'title' => _MI_PROTECTOR_ADVISORY,
        'link' => 'admin/advisory.php',
        'icon' => 'security.png',
        //    ), array(
        //        'title' => _MI_PROTECTOR_PREFIXMANAGER,
        //        'link'  => 'admin/prefix_manager.php',
        //        'icon'  => 'manage.png',
    ], [
        'title' => _MI_PROTECTOR_ADMINABOUT,
        'link' => 'admin/about.php',
        'icon' => 'about.png',
    ],
];
