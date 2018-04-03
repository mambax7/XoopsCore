<?php declare(strict_types=1);

/* this script is include before blocks and modules loading
 * so you can add all script and css needed
 */
$xoops = Xoops::getInstance();
// replace the jquery ui theme config option with theme based asset definition
$xoops->theme()->setNamedAsset('jqueryuicss', 'media/jquery/ui/themes/smoothness/jquery-ui.css');
$xoops->theme()->setNamedAsset('bootstrap', 'media/bootstrap/js/bootstrap.min.js');
$xoops->theme()->addBaseScriptAssets(['@jquery', '@bootstrap']);

$xoops->theme()->addBaseStylesheetAssets([
    'xoops.css',
    'media/bootstrap/css/bootstrap.css',
    'themes/default/media/bootstrap/css/xoops.bootstrap.css',
    'themes/default/css/style.css',
]);
