<?php

use Xoops\Core\FixedGroups;

/**
 *  TinyMCE adapter for XOOPS
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         class
 * @subpackage      editor
 * @since           2.3.0
 * @author          Laurent JEN <dugris@frxoops.org>
 * @version         $Id: xoopsimagemanager.php 8066 2011-11-06 05:09:33Z beckmi $
 */

// check categories readability by group
$groups = is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getGroups() : [FixedGroups::ANONYMOUS];
$imgcat_handler = & xoops_getHandler('imagecategory');
if (count($imgcat_handler->getList($groups, 'imgcat_read', 1)) === 0) {
    return false;
}
return true;
