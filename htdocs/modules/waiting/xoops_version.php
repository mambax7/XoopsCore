<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * waiting module
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         waiting
 * @since           2.6.0
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */

use WaitingLocale as t;

$modversion = [];
$modversion['name'] = t::MODULE_NAME;
$modversion['description'] = t::MODULE_DESC;
$modversion['version'] = '0.1.0';
$modversion['author'] = 'Ricardo Costa';
$modversion['nickname'] = 'trabis';
$modversion['credits'] = 'The XOOPS Project';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'http://www.gnu.org/licenses/gpl-2.0.html';
$modversion['official'] = 1;
$modversion['help'] = 'page=help';
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = basename(__DIR__);

//about
$modversion['release_date'] = '2017/03/11';
$modversion['module_website_url'] = 'http://www.xoops.org/';
$modversion['module_website_name'] = 'XOOPS';
$modversion['module_status'] = 'ALPHA';
$modversion['min_php'] = '5.3.7';
$modversion['min_xoops'] = '2.6.0';

// paypal
$modversion['paypal'] = [
    'business' => 'xoopsfoundation@gmail.com',
    'item_name' => t::DONATION_DESC,
    'amount' => 0,
    'currency_code' => 'USD',
];

// Admin menu
// Set to 1 if you want to display menu generated by system module
$modversion['system_menu'] = 1;

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Blocks
$modversion['blocks'][] = [
    'file' => 'waiting_waiting.php',
    'name' => t::BLOCK_NAME,
    'description' => t::BLOCK_DESC,
    'show_func' => 'b_waiting_waiting_show',
    'template' => 'waiting_block_waiting.tpl',
];
