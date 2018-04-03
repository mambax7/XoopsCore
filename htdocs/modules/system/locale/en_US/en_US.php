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
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */
class SystemLocaleEn_US /*extends XoopsLocaleEn_US*/
{
    public const CONF_DISCLAIMER_DEFAULT = 'While the administrators and moderators of this site will attempt to remove or edit any generally objectionable material as quickly as possible, it is impossible to review every message. Therefore you acknowledge that all posts made to this site express the views and opinions of the author and not the administrators, moderators or webmaster (except for posts by these people) and hence will not be held liable.

You agree not to post any abusive, obscene, vulgar, slanderous, hateful, threatening, sexually-orientated or any other material that may violate any applicable laws. Doing so may lead to you being immediately and permanently banned (and your service provider being informed). The IP address of all posts is recorded to aid in enforcing these conditions. Creating multiple accounts for a single user is not allowed. You agree that the webmaster, administrator and moderators of this site have the right to remove, edit, move or close any topic at any time should they see fit. As a user you agree to any information you have entered above being stored in a database. While this information will not be disclosed to any third party without your consent the webmaster, administrator and moderators cannot be held responsible for any hacking attempt that may lead to the data being compromised.

This site system uses cookies to store information on your local computer. These cookies do not contain any of the information you have entered above, they serve only to improve your viewing pleasure. The email address is used only for confirming your registration details and password (and for sending new passwords should you forget your current one).

By clicking Register below you agree to be bound by these conditions.';

    public const ADD_BLOCK = 'Add block';

    public const ADD_GROUP = 'Add group';

    public const ADD_NEW_GROUP = 'Add a new group';

    public const ADD_USER = 'Add user';

    public const ADMINISTRATION_MENU = 'Administration menu';

    public const ALLOW_OTHER_USERS_TO_VIEW_THIS_EMAIL_ADDRESS = 'Allow other users to view this email address';

    public const ANONYMOUS_USERS = 'Anonymous users';

    public const ANONYMOUS_USERS_GROUP = 'Anonymous users group';

    public const AUTHENTICATION = 'Authentication';

    public const AUTO_FORMAT_SMILIES_DISABLED = 'Auto format (smilies disabled)';

    public const AUTO_FORMAT_SMILIES_ENABLED = 'Auto format (smilies enabled)';

    public const AVAILABLE_MODULES = 'Available modules';

    public const BLOCKS_ADMINISTRATION = 'Blocks administration';

    public const BLOCKS_DESC = 'With blocks you can <br /> add many thing for <br /> your users';

    public const BLOCKS_TIPS = "<ul><li>You can easily change side or order position with the drag'n drop, click on <img class='xo-tooltip' src='%1\$s' alt='%4\$s' title='%4\$s' /> this image and set your site just the way you want it</li><li>Add a new custom block</li><li>Set block online or offline by clicking on <img class='xo-tooltip' width='16' src='%2\$s' alt='%5\$s' title='%5\$s'/> or <img class='xo-tooltip' width='16' src='%3\$s' alt= '%6\$s' title='%6\$s' /></li></ul>";

    public const BLOCK_ACCESS_RIGHTS = 'Block access rights';

    public const BLOCK_LOGIN = 'Login';

    public const BLOCK_LOGIN_DESC = 'Shows login form';

    public const BLOCK_MAIN_MENU = 'Main menu';

    public const BLOCK_MAIN_MENU_DESC = 'Shows the main navigation menu of the site';

    public const BLOCK_NEW_MEMBERS = 'New members';

    public const BLOCK_NEW_MEMBERS_DESC = 'Shows most recent users';

    public const BLOCK_SITE_INFORMATION = 'Site information';

    public const BLOCK_SITE_INFORMATION_DESC = "Shows basic information about the site and a link to 'Recommend Us' pop up window";

    public const BLOCK_THEMES = 'Themes';

    public const BLOCK_THEMES_DESC = 'Shows theme selection box';

    public const BLOCK_TOP_POSTERS = 'Top posters';

    public const BLOCK_TOP_POSTERS_DESC = 'Displays your site top posters';

    public const BLOCK_TYPE = 'Block type';

    public const BLOCK_USER_MENU = 'User menu';

    public const BLOCK_USER_MENU_DESC = 'Shows user block';

    public const BLOCK_WAITING_CONTENTS = 'Waiting contents';

    public const BLOCK_WAITING_CONTENTS_DESC = 'Shows contents waiting for approval';

    public const BLOCK_WHO_IS_ONLINE = 'Who is online';

    public const BLOCK_WHO_IS_ONLINE_DESC = 'Displays users/guests currently online';

    public const BOTTOM_CENTER = 'Bottom center';

    public const BOTTOM_LEFT = 'Bottom left';

    public const BOTTOM_RIGHT = 'Bottom right';

    public const CACHE_LIFETIME = 'Cache lifetime';

    public const CHOOSE_TEMPLATE = 'Choose template';

    public const CLICK_TO_EDIT_MODULE_NAME = 'Click to edit module name...';

    public const CLONE_BLOCK = 'Clone block';

    public const CONF_ACTIVATION_GROUP = 'Select group to which activation email will be sent';

    public const CONF_ACTIVATION_GROUP_DESC = "Valid only when 'Activation by administrators' is selected";

    public const CONF_ACTIVATION_TYPE = 'Select activation type of newly registered users';

    public const CONF_ADMIN_ACTIVATION = 'Activation by administrators';

    public const CONF_ADMIN_EMAIL = 'Admin email address';

    public const CONF_ALLOW_CHANGE_EMAIL = 'Allow users to change email address?';

    public const CONF_ALLOW_REGISTRATION = 'Allow new user registration?';

    public const CONF_ALLOW_REGISTRATION_DESC = 'Select yes to accept new user registration';

    public const CONF_ANONYMOUS = 'Username for anonymous users';

    public const CONF_AUTHMETHOD = 'Authentication Method';

    public const CONF_AUTHMETHOD_DESC = 'Which authentication method would you like to use for signing on users.';

    public const CONF_AUTH_CONFOPTION_AD = 'Microsoft Active Directory &copy';

    public const CONF_AUTH_CONFOPTION_LDAP = 'Standard LDAP Directory';

    public const CONF_AUTH_CONFOPTION_XOOPS = 'XOOPS Database';

    public const CONF_AUTO_ACTIVATION = 'Activate automatically';

    public const CONF_BAD_EMAILS = 'Enter emails that should not be used in user profile';

    public const CONF_BAD_EMAILS_DESC = 'Separate each with a <strong>|</strong>, case insensitive, regex enabled.';

    public const CONF_BAD_IPS = "Enter IP addresses that should be banned from the site.<br />Separate each with a <strong>|</strong>, case insensitive, regex enabled (so dot - '.' means 'any char' and '\.' means '.').";

    public const CONF_BAD_IPS_DESC = "^aaa\.bbb\.ccc will disallow visitors with an IP that starts with aaa.bbb.ccc<br />aaa\.bbb\.ccc$ will disallow visitors with an IP that ends with aaa.bbb.ccc<br />aaa\.bbb\.ccc will disallow visitors with an IP that contains aaa.bbb.ccc";

    public const CONF_BAD_USERNAMES = 'Enter names that should not be selected as username';

    public const CONF_BLOCKS_EDITOR = 'Editor for blocks:';

    public const CONF_BREADCRUMB = 'Breadcrumb';

    public const CONF_CENSORRPLC = 'Censored words will be replaced with:';

    public const CONF_CENSORRPLC_DESC = 'Censored words will be replaced with the characters entered in this textbox';

    public const CONF_CENSORWRD = 'Words to censor';

    public const CONF_CENSORWRD_DESC = 'Enter words that should be censored in user posts.<br />Separate each with a <strong>|</strong>, case insensitive.';

    public const CONF_CLOSE_SITE = 'Turn your site off?';

    public const CONF_CLOSE_SITE_DEFAULT = 'The site is currently closed for maintenance. Please come back later.';

    public const CONF_CLOSE_SITE_DESC = 'Select yes to turn your site off so that only users in selected groups have access to the site. ';

    public const CONF_CLOSE_SITE_GROUP = 'Select groups that are allowed to access while the site is turned off.';

    public const CONF_CLOSE_SITE_GROUP_DESC = 'Users in the default webmasters group are always granted access.';

    public const CONF_CLOSE_SITE_TEXT = 'Reason for turning off the site';

    public const CONF_CLOSE_SITE_TEXT_DESC = 'The text that is presented when the site is closed.';

    public const CONF_CONTROL_PANEL = 'Control panel GUI';

    public const CONF_CONTROL_PANEL_DESC = 'For backend';

    public const CONF_DEFAULT_TIMEZONE = 'Default timezone';

    public const CONF_DOCENSOR = 'Enable censoring of unwanted words?';

    public const CONF_DOCENSOR_DESC = 'Words will be censored if this option is enabled. This option may be turned off for enhanced site speed.';

    public const CONF_DSPDSCLMR = 'Display disclaimer?';

    public const CONF_DSPDSCLMR_DESC = 'Select yes to display disclaimer in registration page';

    public const CONF_ENABLE_BAD_IPS = 'Enable IP bans?';

    public const CONF_ENABLE_BAD_IPS_DESC = 'Users from specified IP addresses will not be able to view your site';

    public const CONF_FOOTER = 'Footer';

    public const CONF_FOOTER_DEFAULT = "Powered by XOOPS @ 2001-%s <a href='https://github.com/XOOPS' rel='external' title='XOOPS Project'>XOOPS Project</a>";

    public const CONF_FOOTER_DESC = 'Be sure to type links in full path starting from http://, otherwise the links will not work correctly in modules pages.';

    public const CONF_GENERAL_EDITOR = 'Editor for modules:';

    public const CONF_GROUPS_PER_PAGE = 'Number of groups to display per page';

    public const CONF_GZIP_COMPRESSION = 'Use gzip compression?';

    public const CONF_HELP_ONLINE = 'Help online?';

    public const CONF_HELP_ONLINE_DESC = 'This gives you tips and online help';

    public const CONF_ICONS = 'Icons';

    public const CONF_INDEXFOLLOW = 'Index, follow';

    public const CONF_INDEXNOFOLLOW = 'Index, no follow';

    public const CONF_JQUERY_THEME = 'jQuery theme';

    public const CONF_LOCALE = 'Default locale';

    public const CONF_LDAP_BASE_DN = 'LDAP - Base DN';

    public const CONF_LDAP_BASE_DN_DESC = 'The base DN (Distinguished Name) of your LDAP directory tree.';

    public const CONF_LDAP_DOMAIN_NAME = 'The domain name';

    public const CONF_LDAP_DOMAIN_NAME_DESC = 'Windows domain name. for ADS and NT Server only';

    public const CONF_LDAP_FIELD_MAPPING_ATTR = 'Xoops-Auth server fields mapping';

    public const CONF_LDAP_FIELD_MAPPING_DESC = 'Describe here the mapping between the XOOPS database field and the LDAP Authentication system field.<br /><br />Format [Xoops Database field]=[Auth system LDAP attribute]<br />for example : email=mail<br />Separate each with a |<br /><br />!! For advanced users !!';

    public const CONF_LDAP_FILTER_PERSON = 'The search filter LDAP query to find user';

    public const CONF_LDAP_FILTER_PERSON_DESC = "Special LDAP Filter to find user. @@loginname@@ is replace by the users's login name<br> MUST BE BLANK IF YOU DON'T KNOW WHAT YOU DO' !<br />Ex : (&(objectclass=person)(samaccountname=@@loginname@@)) for AD <br />Ex : (&(objectclass=inetOrgPerson)(uid=@@loginname@@)) for LDAP";

    public const CONF_LDAP_GIVENNAME_ATTR = 'LDAP - Given Name Field Name';

    public const CONF_LDAP_GIVENNAME_ATTR_DESC = 'The name of the Given Name attribute in your LDAP directory.';

    public const CONF_LDAP_LOGINLDAP_ATTR = 'LDAP Attribute use to search the user';

    public const CONF_LDAP_LOGINLDAP_ATTR_DESC = 'When Login name use in the DN option is set to yes, must correspond to the login name XOOPS';

    public const CONF_LDAP_LOGINNAME_ASDN = 'Login name use in the DN';

    public const CONF_LDAP_LOGINNAME_ASDN_DESC = 'The XOOPS login name is used in the LDAP DN (eg : uid=<loginname>,dc=xoops,dc=org)<br>The entry is directly read in the LDAP Server without search';

    public const CONF_LDAP_MAIL_ATTR = 'LDAP - Email Field Name';

    public const CONF_LDAP_MAIL_ATTR_DESC = 'The name of the E-Mail attribute in your LDAP directory tree.';

    public const CONF_LDAP_MANAGER_DN = 'DN of the LDAP manager';

    public const CONF_LDAP_MANAGER_DN_DESC = 'The DN of the user allow to make search (eg manager)';

    public const CONF_LDAP_MANAGER_PASS = 'Password of the LDAP manager';

    public const CONF_LDAP_MANAGER_PASS_DESC = 'The password of the user allow to make search';

    public const CONF_LDAP_PORT = 'LDAP - Port Number';

    public const CONF_LDAP_PROVIS = 'Automatic XOOPS account provisioning';

    public const CONF_LDAP_PROVIS_DESC = "Create XOOPS user database if it doesn't exists";

    public const CONF_LDAP_PROVIS_GROUP = 'Default affect group';

    public const CONF_LDAP_PROVIS_GROUP_DESC = 'The new user is assign to these groups';

    public const CONF_LDAP_PROVIS_UPD = 'Maintain XOOPS account provisioning';

    public const CONF_LDAP_PROVIS_UPD_DESC = 'The XOOPS User account is always synchronized with the Authentication Server';

    public const CONF_LDAP_SERVER = 'LDAP - Server Name';

    public const CONF_LDAP_SERVER_DESC = 'The name of your LDAP directory server.';

    public const CONF_LDAP_SURNAME_ATTR = 'LDAP - Surname Field Name';

    public const CONF_LDAP_SURNAME_ATTR_DESC = 'The name of the Surname attribute in your LDAP directory.';

    public const CONF_LDAP_USERS_BYPASS = 'Users allowed to bypass LDAP authentication';

    public const CONF_LDAP_USERS_BYPASS_DESC = 'Users to be authenticated with native XOOPS method';

    public const CONF_LDAP_USETLS = ' Use TLS connection';

    public const CONF_LDAP_USETLS_DESC = 'Use a TLS (Transport Layer Security) connection. TLS use standard 389 port number<BR> and the LDAP version must be set to 3.';

    public const CONF_LDAP_VERSION = 'LDAP Version protocol';

    public const CONF_LDAP_VERSION_DESC = 'The LDAP Version protocol : 2 or 3';

    //const CONF_LEVEL_LIGHT = "Light (recommended for multi-byte chars)";
    //const CONF_LEVEL_MEDIUM = "Medium";
    //const CONF_LEVEL_STRICT = "Strict (only alphabets and numbers)";
    public const CONF_MAILER = 'Email Setup';

    public const CONF_MAILERMETHOD = 'Email delivery method';

    public const CONF_MAILERMETHOD_DESC = 'Method used to deliver email. Default is "mail", use others only if that makes trouble.';

    public const CONF_MAILFROM = 'FROM address';

    public const CONF_MAILFROMNAME = 'FROM name';

    public const CONF_MAILFROMUID = 'FROM user';

    public const CONF_MAILFROMUID_DESC = 'When the system sends a private message, which user should appear to have sent it?';

    public const CONF_MAX_USERNAME = 'Maximum length of username';

    public const CONF_METAAUTHOR = 'Meta Author';

    public const CONF_METAAUTHOR_DESC = 'The author meta tag defines the name of the author of the document being read. Supported data formats include the name, email address of the webmaster, company name or URL.';

    public const CONF_METACOPYR = 'Meta Copyright';

    public const CONF_METACOPYR_DEFAULT = 'Copyright @ 2001-%s';

    public const CONF_METACOPYR_DESC = 'The copyright meta tag defines any copyright statements you wish to disclose about your web page documents.';

    public const CONF_METADESC = 'Meta Description';

    public const CONF_METADESC_DEFAULT = 'XOOPS is a dynamic Object Oriented based open source portal script written in PHP.';

    public const CONF_METADESC_DESC = 'The description meta tag is a general description of what is contained in your web page';

    public const CONF_METAKEY = 'Meta Keywords';

    public const CONF_METAKEY_DEFAULT = 'xoops, web applications, web 2.0, sns, news, technology, headlines, linux, software, download, downloads, free, community, forum, bulletin board, bbs, php, survey, polls, kernel, comment, comments, portal, odp, open source, opensource, FreeSoftware, gnu, gpl, license, Unix, *nix, mysql, sql, database, databases, web site, blog, wiki, module, modules, theme, themes, cms, content management';

    public const CONF_METAKEY_DESC = 'The keywords meta tag is a series of keywords that represents the content of your site. Type in keywords with each separated by a comma or a space in between. (Ex. XOOPS, PHP, mySQL, portal system)';

    public const CONF_METAO14YRS = '14 years';

    public const CONF_METAOGEN = 'General';

    public const CONF_METAOMAT = 'Mature';

    public const CONF_METAOREST = 'Restricted';

    public const CONF_METARATING = 'Meta Rating';

    public const CONF_METARATING_DESC = 'The rating meta tag defines your site age and content rating';

    public const CONF_METAROBOTS = 'Meta Robots';

    public const CONF_METAROBOTS_DESC = 'The Robots Tag declares to search engines what content to index and spider';

    public const CONF_MIN_PASS = 'Minimum required length of the password';

    public const CONF_MIN_USERNAME = 'Minimum length of username required';

    public const CONF_MODULE_CACHE = 'Module-wide Cache';

    public const CONF_MODULE_CACHE_DESC = 'Caches module contents for a specified amount of time to enhance performance. Setting module-wide cache will override module item level cache if any.';

    public const CONF_NEW_USER_NOTIFY = 'Notify by email when a new user is registered?';

    public const CONF_NOINDEXFOLLOW = 'No Index, Follow';

    public const CONF_NOINDEXNOFOLLOW = 'No Index, No Follow';

    public const CONF_NOTIFY_TO = 'Select group to which new user notification email will be sent';

    public const CONF_REDIRECT = 'Use jGrowl redirect';

    public const CONF_REDIRECT_DESC = 'replace old redirection by a jGrowl redirection';

    public const CONF_REGDSCLMR = 'Registration disclaimer';

    public const CONF_REGDSCLMR_DESC = 'Enter text to be displayed as registration disclaimer';

    public const CONF_SELF_DELETE = 'Allow users to delete own account?';

    public const CONF_SENDMAILPATH = 'Path to sendmail';

    public const CONF_SENDMAILPATH_DESC = 'Path to the sendmail program (or substitute) on the webserver.';

    public const CONF_SERVER_TIMEZONE = 'Server timezone';

    public const CONF_SESSION_EXPIRE = 'Session expiration';

    public const CONF_SESSION_EXPIRE_DESC = "Maximum duration of session idle time in minutes (Valid only when 'use custom session' is enabled.)";

    public const CONF_SESSION_NAME = 'Session name';

    public const CONF_SESSION_NAME_DESC = "The name of session (Valid only when 'use custom session' is enabled)";

    public const CONF_SITE_NAME = 'Site name';

    public const CONF_SITE_NAME_DEFAULT = 'XOOPS Site';

    public const CONF_SLOGAN = 'Slogan for your site';

    public const CONF_SLOGAN_DEFAULT = 'Just use it!';

    public const CONF_SMTPHOST = 'SMTP host(s)';

    public const CONF_SMTPHOST_DESC = 'List of SMTP servers to try to connect to.';

    public const CONF_SMTPPASS = 'SMTPAuth password';

    public const CONF_SMTPPASS_DESC = 'Password to connect to an SMTP host with SMTPAuth.';

    public const CONF_SMTPUSER = 'SMTPAuth username';

    public const CONF_SMTPUSER_DESC = 'Username to connect to an SMTP host with SMTPAuth.';

    public const CONF_SSL_LINK = 'URL where SSL login page is located';

    public const CONF_SSL_POST_NAME = 'SSL Post variable name';

    public const CONF_SSL_POST_NAME_DESC = 'The name of variable used to transfer session value via POST. If you are unsure, set any name that is hard to guess.';

    public const CONF_START_PAGE = 'Module for your start page';

    public const CONF_TEMPLATE_SET = 'Default template set';

    public const CONF_THEME_FILE = 'Check templates for modifications ?';

    public const CONF_THEME_FILE_DESC = 'If this option is enabled, modified templates will be automatically recompiled when they are displayed. You must turn this option off on a production site.';

    public const CONF_THEME_SET = 'Default theme';

    public const CONF_THEME_SET_ALLOWED = 'Selectable themes';

    public const CONF_THEME_SET_ALLOWED_DESC = 'Choose themes that users can select as the default theme';

    //const CONF_USERNAME_LEVEL = "Select the level of strictness for username filtering";
    public const CONF_USERS_PER_PAGE = 'Number of users to display per page';

    public const CONF_USER_ACTIVATION = 'Requires activation by user (recommended)';

    public const CONF_USER_COOKIE = 'Name for user cookies.';

    public const CONF_USER_COOKIE_DESC = "If the cookie name is set, 'Remember me' will be enabled for user login. If a user has chosen 'Remember me', he will be logged in automatically.";

    public const CONF_USE_SSL = 'Use SSL for login?';

    public const CONF_USE_SSL_DESC = 'SSL is used for secure login and requires a certificate. Contact your Host about how to obtain certificate for your site.';

    public const CONF_WELCOME_TYPE = 'Sending welcoming message';

    public const CONF_WELCOME_TYPE_BOTH = 'Email and message';

    public const CONF_WELCOME_TYPE_DESC = 'The way of sending out a welcoming message to a user upon his successful registration.';

    public const CONF_WELCOME_TYPE_EMAIL = 'Email';

    public const CONF_WELCOME_TYPE_NONE = 'None';

    public const CONF_WELCOME_TYPE_PM = 'Message';

    public const CONTENT_TYPE = 'Content type';

    public const CONTROL_PANEL = 'Control panel';

    public const CUSTOM_BLOCK = 'Custom block';

    public const CUSTOM_BLOCK_AUTO_FORMAT = 'Custom Block (Auto Format)';

    public const CUSTOM_BLOCK_AUTO_FORMAT_SMILIES = 'Custom Block (Auto Format + smilies)';

    public const CUSTOM_BLOCK_HTML = 'Custom Block (HTML)';

    public const CUSTOM_BLOCK_PHP = 'Custom Block (PHP)';

    public const C_DO_NOT_DISPLAY_USERS_WHOSE_RANK_IS = 'Do not display users whose rank is:';

    public const C_SEARCH_USER = 'Search user:';

    public const C_SEE_SEARCH_REQUEST = 'See search request:';

    public const C_YOUR_THEMES = 'Your themes:';

    public const DELETE_BLOCK = 'Delete a block';

    public const DELETE_GROUP = 'Delete group';

    public const DELETE_USER = 'Delete user';

    public const DISPLAY_BLOCK = 'Display block';

    public const DISPLAY_SCREENSHOT_IMAGE = 'Display screenshot image';

    public const DISPLAY_USERS_AVATARS = 'Display users avatars';

    public const DRAG_OR_SORT_BLOCK = 'Drag or sort the block';

    public const EDIT_BLOCK = 'Edit block';

    public const EDIT_GROUP = 'Edit group';

    public const EDIT_GROUPS = 'Edit groups';

    public const EDIT_TEMPLATE = 'Edit template';

    public const EDIT_USER = 'Edit user';

    public const EF_BLOCK_NOT_DELETED = "Block '%s' was not deleted!";

    public const EF_BLOCK_TEMPLATE_NOT_DELETED = "Block template '%s' was not deleted!";

    public const EF_CAN_NOT_DELETE_ADMIN_USER = 'Admin user cannot be deleted: %s!';

    public const EF_CONFIG_NOT_ADDED = "Config '%s' was not added!";

    public const EF_COULD_NOT_ADD_PERMISSION_FOR_GROUP = 'Could not add %s permission to %s for group %s!';

    public const EF_COULD_NOT_ADD_USER_TO_GROUPS = 'The new user could not be added to groups: %s!';

    public const EF_COULD_NOT_DELETE_USER = 'User cannot be deleted: %s!';

    public const EF_COULD_NOT_RESET_GROUP_PERMISSION_FOR_MODULE = 'Could not reset group permission for module %s!';

    public const EF_GROUP_ID_ADMIN_ACCESS_RIGHT_NOT_ADDED = 'Could not add admin access right for Group ID %s!';

    public const EF_GROUP_ID_USER_ACCESS_RIGHT_NOT_ADDED = 'Could not add user access right for Group ID: %s!';

    public const EF_SQL_FILE_NOT_FOUND = 'SQL file not found at %s!';

    public const EF_TABLE_IS_RESERVED = '%s is a reserved table!';

    public const EF_TEMPLATE_NOT_ADDED_TO_DATABASE = 'Template %s was not added to the database!';

    public const EF_TEMPLATE_NOT_DELETED = "Old template '%s' was not deleted! Aborting update of this file. ";

    public const EF_TEMPLATE_NOT_RECOMPILED = 'ERROR: Template %s recompile failed';

    public const EF_TEMPLATE_NOT_UPDATED = 'ERROR: Could not update %s template.';

    public const EMPTY_FILE = 'Empty file';

    public const EXTENSIONS_ADMINISTRATION = 'Extensions administration';

    public const EXTENSIONS_DESC = 'Here you can install <br /> and uninstall your XOOPS <br /> extensions.';

    public const EXTENSION_TIPS = '<ul><li>If you install a new extension, remember to setup module preferences and users permissions!</li><li>Delete unused extension files from your server to avoid security issues and keep your website safe.</li></ul>';

    public const E_BLOCK_ACCESS_NOT_ADDED = 'Block access right was not added!';

    public const E_BLOCK_TEMPLATE_DEPRECATED_NOT_REMOVED = 'Deprecated block template was not removed!';

    public const E_CONFIG_DATA_NOT_DELETED = 'Config data was not deleted!';

    public const E_GROUP_PERMISSIONS_NOT_DELETED = 'Group permissions were not deleted!';

    public const E_NEW_PASSWORDS_NOT_MATCH_TRY_AGAIN = 'Sorry, the new passwords do not match! Click back and try again.';

    public const E_NOT_RESTORED = 'Not restored!';

    public const E_SYSTEM_BLOCKS_CANNOT_BE_DELETED = 'System blocks cannot be deleted!';

    public const E_SYSTEM_MODULE_CANNOT_BE_DEACTIVATED = 'System module cannot be deactivated!';

    public const E_THIS_BLOCK_CANNOT_BE_DELETED = 'This block cannot be deleted directly! If you wish to disable this block, deactivate the module.';

    public const E_THIS_MODULE_IS_SET_AS_DEFAULT_START_PAGE = 'This module is set as your default start page. Please change the start module to whatever suits your preferences.';

    public const E_YOU_CANNOT_REMOVE_THIS_GROUP = 'You can not remove this group!';

    public const FILES_GENERATED = 'Files generated';

    public const FORCED_FILE_GENERATION = 'Forced file generation';

    public const F_BLOCK_ID = ' Block ID: %s';

    public const F_CONFIG_ID = 'Config ID: %s';

    public const F_DELETE_USER = 'Delete user: %s';

    public const F_GROUPS_SPAN = "<ul><li><span class='bold red'>%s</span> groups.</li></ul>";

    public const F_GROUP_ID = ' Group ID: %s';

    public const F_LOGO_IMAGE_FILE_IS_LOCATED_UNDER = 'Logo image file is located under %s directory'; // %s is your root image directory name

    public const F_MODULE_ID = ' Module ID: %s';

    public const F_TEMPLATE_ID = 'Template ID: %s';

    public const F_THEMES = '%s themes';

    public const F_UPDATE_USER = 'Update user: %s';

    public const F_USERS = '%s user(s)';

    public const F_USERS_SPAN = "<ul><li><span class='bold red'>%s</span> users.</li></ul>";

    public const GENERAL_SETTINGS = 'General settings';

    public const TEMPLATE_OVERLOADED = 'Template overloaded';

    public const GO_TO_MODULE = 'Go to module';

    public const GROUPS_DESC = 'You can add some groups <br /> and manage permission for <br /> each group';

    public const GROUPS_MANAGER = 'Groups manager';

    public const GROUPS_TIPS_1 = '<ul><li>Create a new group with their own permissions.</li><li>Edit group for change permissions.</li></ul>';

    public const GROUPS_TIPS_2 = '<ul><li>Change or create permission for this group, all modification will affect users of this group.</li></ul>';

    public const GROUP_DESCRIPTION = 'Group description';

    public const GROUP_NAME = 'Group name';

    public const HIDE_BLOCK = 'Hide block';

    public const INSTALLED_MODULES = 'Installed modules';

    public const LARGE_VIEW = 'Large view';

    public const LAST_LOGIN_GREATER_THAN_X = "Last login is more than <span style='color:#ff0000;'>X</span> days ago";

    public const LAST_LOGIN_LESS_THAN_X = "Last login is less than <span style='color:#ff0000;'>X</span> days ago";

    public const LINE_VIEW = 'Line view';

    public const MANAGE_BLOCKS = 'Manage blocks';

    public const MANAGE_MENU = 'Manage menu';

    public const MANAGE_MODULE = 'Manage module';

    public const MANAGE_PREFERENCES = 'Manage preferences';

    public const MANAGING_BLOCKS = 'Managing blocks...';

    public const MANAGING_PERMISSIONS = 'Managing permissions...';

    public const MANAGING_PREFERENCES = 'Managing preferences...';

    public const MANAGING_TABLES = 'Managing tables...';

    public const MANAGING_TEMPLATES = 'Managing templates...';

    public const MENU_BLOCK = 'Menu block';

    public const MENU_TIPS = '<ul><li>To change order of modules (which will be reflected in the Menu), you just need to drag and drop the modules to the desired placement.</li></ul>';

    public const META_TAGS_AND_FOOTER = 'Meta tags and footer';

    public const MODULES_ADMINISTRATION = 'Modules administration';

    public const MODULES_DESC = 'Here you can install <br /> and unistall your XOOPS <br /> modules. Do you know <br /> which module?';

    public const MODULES_TIPS = '<ul><li>If you install a new module, remember to setup module preferences, blocks and users permissions!</li><li>For hide module into Main Menu block, set order to 0</li><li>Delete unused module files from your server to avoid security issues and keep your website safe.</li></ul>';

    public const MODULE_ACCESS_RIGHTS = 'Module access rights';

    public const MODULE_ADMIN_RIGHTS = 'Module admin rights';

    public const MODULE_DESCRIPTION = 'For administration of core settings of the site.';

    public const MODULE_NAME = 'System';

    public const NEVER_CONNECTED = 'Never connected';

    public const NO_FILES_CREATED = 'No files created';

    public const NO_MODULE_TO_CACHE = 'There is no module that can be cached.';

    public const NUMBER_OF_USERS_BY_GROUP = 'Number of users by group';

    public const NUMBER_OF_USERS_TO_DISPLAY = 'Number of users to display';

    public const ONLY_ACTIVE_USERS = 'Only active users';

    public const ONLY_INACTIVE_USERS = 'Only inactive users';

    public const ONLY_USERS_ACCEPT_EMAIL = 'Only users that accept email';

    public const ONLY_USERS_DO_NOT_ACCEPT_EMAIL = "Only users that don't accept email";

    public const OTHER_SETTINGS = 'Other settings';

    public const PHP_SCRIPT = 'PHP Script';

    public const POPUP_WINDOW_HEIGHT = 'Pop-up window height';

    public const POPUP_WINDOW_WIDTH = 'Pop-up window width';

    public const POSTS_NUMBER_GREATER_THAN_X = "Number of posts is greater than <span style='color:#ff0000;'>X</span>";

    public const POSTS_NUMBER_LESS_THAN_X = "Number of posts is less than <span style='color:#ff0000;'>X</span>";

    public const PREFERENCES_DESC = 'XOOPS and all of your <br /> modules have a preferences <br /> for manage module options';

    public const QF_ARE_YOU_SURE_TO_DELETE_THIS_BLOCK = "Are you sure to delete this block ? <div class='bold'>%s</div>";

    public const Q_ARE_YOU_SURE_DELETE_THIS_GROUP = 'Are you sure you want to delete this group?';

    public const RECOMMEND_US = 'Recommend us';

    public const REGISTERED_USERS = 'Registered users';

    public const REGISTERED_USERS_GROUP = 'Registered users group';

    public const REGISTRATION_DATE_GREATER_THAN_X = "Joined date is more than <span style='color:#ff0000;'>X</span> days ago";

    public const REGISTRATION_DATE_LESS_THAN_X = "Joined date is less than <span style='color:#ff0000;'>X</span> days ago";

    public const REMOVED_USERS = 'Removed users';

    public const REMOVED_USERS_GROUP = 'Removed/Banned users group';

    public const SCREENSHOT_IMAGE_WIDTH = 'Screenshot image width';

    public const SECURE_LOGIN = 'Secure login';

    public const SERVICES_DESC = 'From here you can manage service<br />providers and priorities.';

    public const SERVICES_MANAGER = 'Service Management';

    public const SERVICES_TIPS = '<ul><li>Services allow you to customize your system</li><li>Set service provider preferences by selecting the service, and then putting the providers in the desired order.</li></ul>';

    public const SF_ADDED_PERMISSION_FOR_GROUP = 'Added %s permission to %s for group %s!';

    public const SF_BLOCK_DELETED = 'Block %s deleted!';

    public const SF_BLOCK_TEMPLATE_DELETED = 'Block template %s deleted!';

    public const SF_BLOCK_TEMPLATE_DEPRECATED = 'Block template %s deprecated!';

    public const SF_BLOCK_UPDATED = 'Block %s updated!';

    public const SF_CONFIG_ADDED = 'Config %s added!';

    public const SF_GROUP_ID_ADMIN_ACCESS_RIGHT_ADDED = 'Added admin access right for Group ID %s!';

    public const SF_GROUP_ID_USER_ACCESS_RIGHT_ADDED = 'Added user access right for Group ID: %s!';

    public const SF_SQL_FILE_FOUND = 'SQL file found at %s!';

    public const SF_TEMPLATE_ADDED = 'Template %s added!';

    public const SF_TEMPLATE_RECOMPILED = 'Template %s recompiled!';

    public const SF_TEMPLATE_UPDATED = 'Template %s updated!';

    public const SHOW_ADMIN_GROUPS = 'Show admin groups';

    public const SITE_PREFERENCES = 'Site preferences';

    public const SYSTEM_ADMIN_RIGHTS = 'System admin rights';

    public const SYSTEM_CONFIGURATION = 'System configuration';

    public const SYSTEM_PREFERENCES = 'System module settings';

    public const S_BLOCK_ACCESS_ADDED = 'Block access right added!';

    public const S_CONFIG_DATA_DELETED = 'Config data deleted!';

    public const S_CONFIG_OPTION_ADDED = 'Config option added!';

    public const S_GROUP_PERMISSIONS_DELETED = 'Group permissions deleted!';

    public const S_RESTORED = 'Successfully restored!';

    public const TEMPLATES_DESC = 'If you need add some changes <br /> in core or modules template use <br /> this options for create theme override';

    public const TEMPLATES_MANAGER = 'Templates Manager';

    public const TEMPLATES_TIPS = '<ul><li>Edit theme and modules templates, stylsheet online.</li><li>Generate all overide modules templates.</li><li>If you force generate, this will erase all previous modification.</li></ul>';

    public const TIPS_MAIN = '<ul><li>Enable or disable sections of system module or just access to it.</li></ul>';

    public const TOP_CENTER = 'Top center';

    public const TOP_LEFT = 'Top left';

    public const TOP_RIGHT = 'Top right';

    public const USERS_DESC = 'With this options you <br /> can add new user or <br /> edit old user and userinfo, <br /> change groups and many <br /> other things';

    public const USERS_MANAGEMENT = 'Users management';

    public const USERS_TIPS = '<ul><li>Manage Xoops users</li></ul>';

    public const VIEW_USER_INFO = 'View user info';

    public const WEBMASTERS = 'Webmasters';

    public const WEBMASTERS_OF_THIS_SITE = 'Webmasters of this site';

    public const WELCOME_TO_XOOPS_HELP_CENTER = 'Welcome to XOOPS Help Center';

    public const WORD_CENSORING = 'Word censoring';
}
