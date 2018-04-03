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
 * @copyright       2012-2014 XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */
$modversion = [];
$modversion['name'] = _MI_PDF_NAME;
$modversion['description'] = _MI_PDF_DSC;
$modversion['version'] = 1.0;
$modversion['author'] = 'Richard Griffith';
$modversion['nickname'] = 'geekwright';
$modversion['credits'] = 'Trabis, The XOOPS Project';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'http://www.gnu.org/licenses/gpl-2.0.html';
$modversion['official'] = 1;
$modversion['help'] = 'page=help';
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = 'pdf';

//about
$modversion['release_date'] = '2014/07/17';
$modversion['module_website_url'] = 'http://www.xoops.org/';
$modversion['module_website_name'] = 'XOOPS';
$modversion['module_status'] = 'ALPHA 1';
$modversion['min_php'] = '5.3.7';
$modversion['min_xoops'] = '2.6.0';

// paypal
$modversion['paypal'] = [
    'business' => 'xoopsfoundation@gmail.com',
    'item_name' => '',
    'amount' => 0,
    'currency_code' => 'USD',
];

// Admin menu
// Set to 1 if you want to display menu generated by system module
//$modversion['system_menu'] = 1;

// Manage extension
$modversion['extension'] = 1;

// Admin menu
// Set to 1 if you want to display menu generated by system module
$modversion['system_menu'] = 1;

// Admin things
$modversion['hasAdmin'] = true;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Menu
$modversion['hasMain'] = 0;

/*
 Blocks
*/
$modversion['blocks'] = [];

// Config categories
$modversion['configcat'] = [];

$modversion['configcat']['basic'] = [
    'name' => 'Basic',
    'description' => 'Basic options',
];

$modversion['configcat']['advanced'] = [
    'name' => 'Advanced',
    'description' => 'Advanced options',
];

// Preferences
$modversion['config'] = [];

$modversion['config'][] = [
    'name' => 'page_orientation',
    'title' => 'Orientation',
    'description' => 'Page orientation',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'P',
    'options' => [
        'Portrait' => 'P',
        'Landscape' => 'L',
    ],
    'category' => 'basic',
];

$modversion['config'][] = [
    'name' => 'page_size',
    'title' => 'Size',
    'description' => 'Page size',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'A4',
    'options' => [
        'A3' => 'A3',
        'A4' => 'A4',
        'A5' => 'A5',
        'B3' => 'B3',
        'B4' => 'B4',
        'B5' => 'B5',
        'USLETTER' => 'USLETTER',
        'USLEGAL' => 'USLEGAL',
        'JIS_B3' => 'JIS_B3',
        'JIS_B4' => 'JIS_B4',
        'JIS_B5' => 'JIS_B5',
    ],
    'category' => 'basic',
];

$modversion['config'][] = [
    'name' => 'pdf_creator',
    'title' => 'Creator',
    'description' => 'PDF Creator tag',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'XOOPS',
    'category' => 'basic',
];

$modversion['config'][] = [
    'name' => 'font_family',
    'title' => 'Font',
    'description' => 'Base font familiy',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'dejavusans', // 'helvetica'
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'font_style',
    'title' => 'Style',
    'description' => 'Base font style - (blank)=regular, B=bold,  I=italic, BI=bold italic',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '',
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'font_size',
    'title' => 'Size',
    'description' => 'Base font size in points',
    'formtype' => 'textbox',
    'valuetype' => 'float',
    'default' => '12',
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'monofont_family',
    'title' => 'Monospaced Font',
    'description' => 'Base monospaced font familiy',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'dejavusansmono', // 'courier'
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'size_unit',
    'title' => 'Unit',
    'description' => 'Unit used for measurments (i.e. margins)',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'mm',
    'options' => [
        'centimeters' => 'cm',
        'millimeters' => 'mm',
        'inches' => 'in',
        'points' => 'pt',
    ],
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'margin_left',
    'title' => 'Left margin',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'float',
    'default' => '',
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'margin_top',
    'title' => 'Top margin',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'float',
    'default' => '',
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'margin_right',
    'title' => 'Right margin',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'float',
    'default' => '',
    'category' => 'advanced',
];

$modversion['config'][] = [
    'name' => 'margin_bottom',
    'title' => 'Bottom margin',
    'description' => '',
    'formtype' => 'textbox',
    'valuetype' => 'float',
    'default' => '',
    'category' => 'advanced',
];
