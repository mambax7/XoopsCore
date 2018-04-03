<?php declare(strict_types=1);

/** *  TinyMCE adapter for XOOPS.
 * * @copyright       XOOPS Project (http://xoops.org) * @license             GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html) * @since           2.3.0 * @author          Taiwen Jiang <phppp@users.sourceforge.net> * @version         $Id: editor_registry.php 8066 2011-11-06 05:09:33Z beckmi $ */return $config = [    'name' => 'tinymce4',    'class' => 'XoopsFormTinymce4',    'file' => \XoopsBaseConfig::get('root-path').'/class/xoopseditor/tinymce4/formtinymce.php',    'title' => _XOOPS_EDITOR_TINYMCE4,    'order' => 5,    'nohtml' => 0];
