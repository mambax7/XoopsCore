<?php
/** *  TinyMCE adapter for XOOPS.
 * * @copyright       XOOPS Project (http://xoops.org) * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html) * @since           2.3.0 * @author          Laurent JEN <dugris@frxoops.org> * @version         $Id: xoopsmlcontent.php 8066 2011-11-06 05:09:33Z beckmi $ */// Xlanguageif ($GLOBALS['module_handler']->getByDirname('xlanguage') && defined('XLANGUAGE_LANG_TAG')) {
    return true;

}// Easiest Multi-Language Hack (EMLH)if (defined('EASIESTML_LANGS') && defined('EASIESTML_LANGNAMES')) {
    return true;

}

return false;
