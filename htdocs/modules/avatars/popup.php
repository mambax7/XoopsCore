<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

use Xoops\Core\XoopsTpl;

/**
 * avatars extension.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           2.6.0
 * @author          Mage Grégory (AKA Mage)
 */
include dirname(dirname(__DIR__)).'/mainfile.php';

$xoops = Xoops::getInstance();
$xoops->disableErrorReporting();

$xoops->simpleHeader(false);

$criteria = new Criteria('avatar_type', 'S');
$tpl = new XoopsTpl();
$tpl->assign('avatars', Avatars::getInstance()->getHandlerAvatar()->getObjects($criteria, false, false));
$tpl->assign('closebutton', 1);
$tpl->display('module:avatars/avatars_popup.tpl');

$xoops->simpleFooter();
