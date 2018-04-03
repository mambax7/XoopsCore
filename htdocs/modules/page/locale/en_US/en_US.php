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
 * page module
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         page
 * @since           2.6.0
 * @author          DuGris (aka Laurent JEN)
 * @version         $Id$
 */

class PageLocaleEn_US /*extends XoopsLocaleEn_US*/
{
    // Module
    public const MODULE_NAME = 'Page';

    public const MODULE_DESC = 'Module for creating pages';

    // Admin menu
    public const SYSTEM_CONTENT = 'Content';

    public const SYSTEM_RELATED = 'Related content';

    public const SYSTEM_PERMISSIONS = 'Permissions';

    public const SYSTEM_ABOUT = 'About';

    // Configurations
    public const CONF_EDITOR = 'Editor';

    public const CONF_ADMINPAGER = 'Number contents to display per page in admin page';

    public const CONF_USERPAGER = 'Number contents to display per page in user page';

    public const CONF_DATEFORMAT = 'Date format';

    public const CONF_TIMEFORMAT = 'time format';

    // Blocks
    public const BLOCKS_CONTENTS = 'Contents';

    public const BLOCKS_CONTENTS_DSC = 'Display contents';

    public const BLOCKS_ID = 'ID contents';

    public const BLOCKS_ID_DSC = 'Display contents by ID';

    // Notifications
    public const NOTIFICATION_GLOBAL = 'Global Contents';

    public const NOTIFICATION_GLOBAL_DSC = 'Notification options that apply to all contents.';

    public const NOTIFICATION_ITEM = 'Content';

    public const NOTIFICATION_ITEM_DSC = 'Notification options that apply to the current article.';

    public const NOTIFICATION_GLOBAL_NEWCONTENT = 'New content published';

    public const NOTIFICATION_GLOBAL_NEWCONTENT_CAP = 'Notify me when any new content is published.';

    public const NOTIFICATION_GLOBAL_NEWCONTENT_DSC = 'Receive notification when any new content is published.';

    public const NOTIFICATION_GLOBAL_NEWCONTENT_SBJ = '[{X_SITENAME}] {X_MODULE} auto-notify : New content published';

    // Admin index.php
    public const TOTALCONTENT = 'There are <span class="red bold">%s</span> contents in our database';

    public const TOTALDISPLAY = 'There are <span class="green bold">%s</span> visible contents';

    public const TOTALNOTDISPLAY = 'There are <span class="red bold">%s</span> contents not visible';

    // Admin content
    public const A_ADD_CONTENT = 'Add a new content';

    public const A_EDIT_CONTENT = 'Edit a content';

    public const A_LIST_CONTENT = 'List of contents';

    public const E_NO_CONTENT = 'There are no contents';

    public const CONTENT_TIPS = '<ul><li>Add, update, copy or delete content</li></ul>';

    public const CONTENT_TEXT_DESC = 'Main content of the page';

    public const CONTENT_META_KEYWORDS = 'Metas keyword';

    public const CONTENT_META_KEYWORDS_DSC = 'Metas keyword separated by a comma';

    public const CONTENT_META_DESCRIPTION = 'Metas description';

    public const CONTENT_OPTIONS_DSC = 'Choose which information will be displayed';

    public const CONTENT_SELECT_GROUPS = 'Select groups that can view this content';

    public const CONTENT_COPY = '[copy]';

    public const E_WEIGHT = 'You need a positive integer';

    public const Q_ON_MAIN_PAGE = 'Content displayed on the home page';

    public const L_CONTENT_DOPDF = 'PDF icon';

    public const L_CONTENT_DOPRINT = 'Print icon';

    public const L_CONTENT_DOSOCIAL = 'Social networks';

    public const L_CONTENT_DOAUTHOR = 'Author';

    public const L_CONTENT_DOMAIL = 'Mail icon';

    public const L_CONTENT_DODATE = 'Date';

    public const L_CONTENT_DOHITS = 'Hits';

    public const L_CONTENT_DORATING = 'Rating and vote count';

    public const L_CONTENT_DOCOMS = 'Comments';

    public const L_CONTENT_DONCOMS = 'Comments count';

    public const L_CONTENT_DOTITLE = 'Title';

    public const L_CONTENT_DONOTIFICATIONS = 'Notifications';

    // Admin related
    public const A_ADD_RELATED = 'Add a new related content';

    public const A_EDIT_RELATED = 'Edit a related content';

    public const RELATED_TIPS = '<ul><li>This section allows you to create links between pages together</li></ul>';

    public const RELATED_NAME = 'Group name';

    public const RELATED_NAVIGATION = 'Navigation type';

    public const L_RELATED_NAVIGATION_OPTION1 = 'Arrow';

    public const L_RELATED_NAVIGATION_OPTION2 = 'Arrow with menu';

    public const L_RELATED_NAVIGATION_OPTION3 = 'Arrow with title content';

    public const L_RELATED_NAVIGATION_OPTION4 = 'Menu';

    public const L_RELATED_NAVIGATION_OPTION5 = 'Title content';

    public const RELATED_MENU = 'Menu';

    public const RELATED_MENU_DSC = 'The menu is a list with the names of related content';

    public const E_NO_RELATED = 'There are no related content';

    public const E_NO_FREE_CONTENT = 'There are no free content';

    public const RELATED_MAIN = 'Main content';

    // Admin permissions
    public const PERMISSIONS_RATE = 'Rate permissions';

    public const PERMISSIONS_VIEW = 'View permissions';

    // Admin Tabs form
    public const TAB_MAIN = 'Main';

    public const TAB_METAS = 'Metas';

    public const TAB_OPTIONS = 'Options';

    public const TAB_PERMISSIONS = 'Permissions';

    // main
    public const YOUR_VOTE = 'Your vote';

    // viewpage
    public const E_NOT_EXIST = 'This page does not exist in our database';

    // Print
    public const PRINT_COMES = 'This article comes from';

    public const PRINT_URL = 'The URL for this page is: ';

    // Block configuration
    public const CONF_BLOCK_MODE = 'Mode';

    public const CONF_BLOCK_L_CONTENT = 'Content';

    public const CONF_BLOCK_L_LIST = 'List';

    public const CONF_BLOCK_ORDER = 'Order by';

    public const CONF_BLOCK_L_RECENT = 'Recent';

    public const CONF_BLOCK_L_HITS = 'Hits';

    public const CONF_BLOCK_L_RATING = 'Rating';

    public const CONF_BLOCK_L_RANDOM = 'Random';

    public const CONF_BLOCK_SORT = 'Sort';

    public const CONF_BLOCK_L_ASC = 'Ascending';

    public const CONF_BLOCK_L_DESC = 'Descending';

    public const CONF_BLOCK_CONTENTDISPLAY = 'Content to display';

    public const CONF_BLOCK_DISPLAY_NUMBER = 'Number to display';

    public const CONF_BLOCK_ALL_CONTENT = 'Display all the content';
}
