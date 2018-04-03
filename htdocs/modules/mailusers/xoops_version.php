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
 * Mailusers Plugin
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         mailusers
 * @since           2.6.0
 * @author          Mage Grégory (AKA Mage)
 * @version         $Id$
 */

$modversion = [];
$modversion['name'] = _MI_MAILUSERS_NAME;
$modversion['description'] = _MI_MAILUSERS_DESC;
$modversion['version'] = 0.1;
$modversion['author'] = 'JJD,Mage Gregory';
$modversion['nickname'] = 'JJDai,Mage';
$modversion['credits'] = 'The XOOPS Project';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'http://www.gnu.org/licenses/gpl-2.0.html';
$modversion['official'] = 1;
$modversion['help'] = 'page=help';
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = 'mailusers';
//about
$modversion['release_date'] = '2012/01/20';
$modversion['module_website_url'] = 'http://www.xoops.org/';
$modversion['module_website_name'] = 'XOOPS';
$modversion['module_status'] = 'ALPHA';
$modversion['min_php'] = '5.3.7';
$modversion['min_xoops'] = '2.6.0';

// paypal
$modversion['paypal'] = [];
$modversion['paypal']['business'] = 'xoopsfoundation@gmail.com';
$modversion['paypal']['item_name'] = 'Donation : ' . _MI_MAILUSERS_DESC;
$modversion['paypal']['amount'] = 0;
$modversion['paypal']['currency_code'] = 'USD';

// Admin menu
// Set to 1 if you want to display menu generated by system module
$modversion['system_menu'] = 1;

/*
 Manage extension
 */
$modversion['extension'] = 1;
$modversion['extension_module'][] = 'system';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// JQuery
$modversion['jquery'] = 1;

// Preferences
$modversion['config'][] = [
    'name' => 'mailusers_editor',
    'title' => '_AM_MAILUSERS_EDITOR',
    'description' => '',
    'formtype' => 'select_editor',
    'valuetype' => 'text',
    'default' => 'dhtmltextarea',
];
