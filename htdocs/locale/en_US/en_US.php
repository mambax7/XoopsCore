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
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */

/**
 * Naming conventions
 * - All translations must be enclosed with ""
 * - All translations must be Uppercase first, do not use CamelCase
 *   Good ex: "User groups"
 *   Bad ex: "user groups" or "User Groups"
 * - All keys must be as descriptive as possible.
 * - All keys must use complete words between each '_',
 * - Keys should be prepended with identifiers in following cases:
 *   F_ Formatted, use this when strings are parsed with sprintf()
 *   A_ Action, use this when using a single word which is a verb
 *   S_ Success, use this for success messages and exclamations
 *   E_ Error, use this for error messages
 *   C_ Colon, use this when string ends with a colon ":"
 *   Q_ Question, use this when string is a question
 *   L_ List, use this for lists of strings, ex: months, countries, languages, etc
 *      Use L_NAME_ to group list items by name, ex: L_COUNTRY_
 * - Chain keys alphabetically with the exception of F, F always comes in last
 *   ex: SF_ (formatted success message), EF_ (formatted error message)
 * - Special cases:
 *   CONF_ Configs, prepend this for your module configs.
 *      Config keys are stored in database, try to make them as short as possible!
 *   _DESC Description, append this for configs description
 */
class XoopsLocaleEn_US extends Xoops\Locale\AbstractLocale
{
    const ABOUT = 'About';

    const ACTION = 'Action';

    const ACTIONS = 'Actions';

    const ACTIVE = 'Active';

    const ADD_SELECTED_USERS = 'Add selected users';

    const ADMIN = 'Admin';

    const ADMINISTRATION = 'Administration';

    const ADVANCED = 'Advanced';

    const ADVANCED_MODE = 'Advanced mode';

    const ADVANCED_SEARCH = 'Advanced search';

    const AFTER = 'After';

    const AIM = 'AIM';

    const ALIGNMENT = 'Alignment';

    const ALL = 'All';

    const ALLOWED_MAX_CHARS_LENGTH = 'Allowed max chars length';

    const ALLOW_OTHER_USERS_TO_VIEW_EMAIL = 'Allow other users to view my email address';

    const ALL_AND = 'All (AND)';

    const ALL_GROUPS = 'All groups';

    const ALL_MODULES = 'All modules';

    const ALL_PAGES = 'All pages';

    const ALL_TYPES = 'All types';

    const ALL_USERS = 'All users';

    const ALWAYS_ATTACH_MY_SIGNATURE = 'Always attach my signature';

    const ANONYMOUS = 'Anonymous';

    const ANY_OR = 'Any (OR)';

    const ANY_STATUS = 'Any status';

    const APPROVED = 'Approved';

    const ARCHIVE = 'Archive';

    const ASCENDING = 'Ascending';

    const ASCENDING_ORDER = 'Ascending order';

    const AUTHOR = 'Author';

    const AVATAR = 'Avatar';

    const A_ADD = 'Add';

    const A_ALIGN = 'Align';

    const A_ANALYZE = 'Analyze';

    const A_APPEND = 'Append';

    const A_BACK = 'Back';

    const A_CANCEL = 'Cancel';

    const A_CHANGE = 'Change';

    const A_CHECK = 'Check';

    const A_CLEAR = 'Clear';

    const A_CLONE = 'Clone';

    const A_CLOSE = 'Close';

    const A_COLLAPSE = 'Collapse';

    const A_DELETE = 'Delete';

    const A_DETAIL = 'Detail';

    const A_DISABLE = 'Disable';

    const A_DISPLAY = 'Display';

    const A_EDIT = 'Edit';

    const A_ENABLE = 'Enable';

    const A_EXPAND = 'Expand';

    const A_EXPORT = 'Export';

    const A_FINISH = 'Finish';

    const A_GO = 'Go';

    const A_HIDE = 'Hide';

    const A_IMPORT = 'Import';

    const A_INSTALL = 'Install';

    const A_LOGIN = 'Login';

    const A_LOGOUT = 'Logout';

    const A_MANAGE = 'Manage';

    const A_MODIFY = 'Modify';

    const A_OPTIMIZE = 'Optimize';

    const A_POST = 'Post';

    const A_PREPEND = 'Prepend';

    const A_PREVIEW = 'Preview';

    const A_PRINT = 'Print';

    const A_PRUNE = 'Prune';

    const A_PUBLISH = 'Publish';

    const A_PURGE = 'Purge';

    const A_QUOTE = 'Quote';

    const A_REFRESH = 'Refresh';

    const A_REGISTER = 'Register';

    const A_REMOVE = 'Remove';

    const A_REPAIR = 'Repair';

    const A_REPLY = 'Reply';

    const A_REPORT = 'Report';

    const A_RESET = 'Reset';

    const A_RESTORE = 'Restore';

    const A_SAVE = 'Save';

    const A_SEARCH = 'Search';

    const A_SELECT = 'Select';

    const A_SEND = 'Send';

    const A_SHOW = 'Show';

    const A_SUBMIT = 'Submit';

    const A_SYNCHRONIZE = 'Synchronize';

    const A_TAG = 'Tag';

    const A_UNINSTALL = 'Uninstall';

    const A_UPDATE = 'Update';

    const A_UPLOAD = 'Upload';

    const BACK_TO_TOP = 'Back to top';

    const BASIC = 'Basic';

    const BASIC_INFORMATION = 'Basic information';

    const BEFORE = 'Before';

    const BLOCKS = 'Blocks';

    const BODY = 'Body';

    const BOLD = 'Bold';

    const BOOKMARK = 'Bookmark';

    const BOTH = 'Both';

    const BOTTOM = 'Bottom';

    const BREADCRUMB = 'Breadcrumb';

    const CACHED = 'Cached';

    const CANCEL_SEND = 'Cancel send';

    const CAPTION = 'Caption';

    const CATEGORIES = 'Categories';

    const CATEGORY = 'Category';

    const CENTER = 'Center';

    const CF_FOLLOWING_WORDS_SHORTER_THAN_NOT_INCLUDED = 'The following words are shorter than allowed minimum length (%u chars) and were not included in your search:';

    const CF_WROTE = '%s wrote:';

    const CHANGE_LOG = 'Change log';

    const CHANGE_STATUS = 'Change status';

    const CHARSET = 'Charset';

    const CHARSETS = 'Charsets';

    const CHECK_ALL = 'Check all';

    const CHECK_TEXT_LENGTH = 'Check text length';

    const CLICK_A_SMILIE_TO_INSERT_INTO_MESSAGE = 'Click a smilie to insert it into your message.';

    const CLICK_HERE_TO_REGISTER = "Click <a href='register.php'>here</a>.";

    const CLICK_HERE_TO_VIEW_YOU_PRIVATE_MESSAGES = 'You can click here to view your private messages';

    const CLICK_PREVIEW_TO_SEE_CONTENT = 'Click the <strong>Preview</strong> to see the content in action.';

    const CLICK_TO_REFRESH_IMAGE_IF_NOT_CLEAR = 'Click to refresh the image if it is not clear enough.';

    const CLICK_TO_SEE_ORIGINAL_IMAGE_IN_NEW_WINDOW = 'Click to see original image in a new window';

    const CLOSE_WINDOW = 'Close window';

    const CODE = 'Code';

    const CODE_IS_CASE_INSENSITIVE = 'The code is case-insensitive';

    const CODE_IS_CASE_SENSITIVE = 'The code is case-sensitive';

    const COLOR = 'Color';

    const COMMENTS = 'Comments';

    const COMMENTS_COUNT = 'Comments count';

    const COMMENTS_POSTS = 'Comments/Posts';

    const CONFIGURATION_CHECK = 'Configuration check';

    const CONFIRMATION_CODE = 'Confirmation code';

    const CONTAINS = 'Contains';

    const CONTENT = 'Content';

    const CREDITS = 'Credits';

    const C_AUTHOR = 'Author:';

    const C_DESCRIPTION = 'Description:';

    const C_ERRORS = 'Error(s):';

    const C_FRIEND_EMAIL = 'Friend email:';

    const C_FRIEND_NAME = 'Friend name:';

    const C_FROM = 'From:';

    const C_LAST_UPDATE = 'Last update:';

    const C_LICENSE = 'License:';

    const C_MODULES = 'Modules:';

    const C_NAME = 'Name:';

    const C_PASSWORD = 'Password:';

    const C_QUOTE = 'Quote:';

    const C_RE = 'Re:';

    const C_SENT = 'Sent:';

    const C_TO = 'To:';

    const C_UPDATE_DATE = 'Update date:';

    const C_USERNAME = 'Username:';

    const C_VALUE = 'Value:';

    const C_VERSION = 'Version:';

    const C_WEBSITE = 'Website:';

    const C_YOUR_EMAIL = 'Your email:';

    const C_YOUR_NAME = 'Your name:';

    const DATE = 'Date';

    const DATE_FORMAT = 'Date format';

    const DEBUG = 'Debug';

    const DELETE_ACCOUNT = 'Delete account';

    const DELETE_ALL = 'Delete all';

    const DESCENDING = 'Descending';

    const DESCENDING_ORDER = 'Descending order';

    const DESCRIPTION = 'Description';

    const DETAILS = 'Details';

    const DISABLED = 'Disabled';

    const DISABLE_HTML = 'Disable html';

    const DISABLE_SMILIE = 'Disable smilie';

    const DISCLAIMER = 'Disclaimer';

    const DISPLAY_ALL_ITEMS = 'Display all items';

    const DISPLAY_IN_FORM = 'Display in form';

    const DISPLAY_MONDAY_FIRST = 'Display monday first';

    const DISPLAY_OPTIONS = 'Display options';

    const DISPLAY_ORDER = 'Display order';

    const DISPLAY_RANDOM_ITEMS = 'Display random items';

    const DISPLAY_RECENT_ITEMS = 'Display recent items';

    const DISPLAY_SUNDAY_FIRST = 'Display sunday first';

    const DISPLAY_THIS_ITEM = 'Display this item';

    const DISPLAY_TOP_ITEMS = 'Display top items';

    const DISPLAY_TOP_RATED_ITEMS = 'Display top rated items';

    const DO_NOT_DISPLAY_IN_FORM = "Don't display in form";

    const DRAG_TO_MOVE = 'Drag to move';

    const EDITOR = 'Editor';

    const EDIT_ACCOUNT = 'Edit account';

    const EDIT_PROFILE = 'Edit profile';

    const EF_CLASS_NOT_FOUND = "Class '%s' was not found!";

    const EF_CORRESPONDING_USER_NOT_FOUND_IN_DATABASE = 'No corresponding user information has been found in the XOOPS database for connection: %s!';

    const EF_DATABASE_ERROR = 'Database error: %s';

    const EF_DATABASE_NOT_SUPPORTED = 'This module does not support the current database platform (%s)';

    const EF_DIRECTORY_EXISTS = "Directory '%s' exists on your server!";

    const EF_DIRECTORY_NOT_OPENED = "Directory '%s' was not opened!";

    const EF_DIRECTORY_WITH_WRITE_PERMISSION_NOT_OPENED = "Directory with write permission '%s' was not opened!";

    const EF_EMAIL_ALREADY_EXISTS = "User email '%s' already exists!";

    const EF_EMAIL_NOT_SENT_TO = "Email was not sent to '%s'!";

    const EF_ENTRIES_NOT_INSERTED_TO_TABLE = "Failed inserting %d entries to table '%s'!"; // L120

    const EF_ENTRY_NOT_READ = "Entry '%s' was not read!";

    const EF_ERRORS_RETURNED_WHILE_UPLOADING_FILE = 'Errors returned while uploading file: %s';

    const EF_EXTENSION_IS_NOT_INSTALLED = "The extension '%s' isn't installed!";

    const EF_FILE_HEIGHT_TO_LARGE = 'File height too large (Maximum %u px): %u px!';

    const EF_FILE_IS_WRITABLE = "File '%s' is writable by the server!";

    const EF_FILE_MIME_TYPE_NOT_ALLOWED = "File of mime type '%s' is not allowed!";

    const EF_FILE_MUST_BE_WRITABLE = "File '%s' must be writable by the server!";

    const EF_FILE_NOT_FOUND = "File '%s' was not found!";

    const EF_FILE_NOT_SAVED_TO = "File not saved to '%s'!";

    const EF_FILE_NOT_UPLOADED = "File '%s' was not uploaded!";

    const EF_FILE_SIZE_TO_LARGE = 'File size too large (Maximum %u bytes): %u bytes!';

    const EF_FILE_WIDTH_TO_LARGE = 'File width too large (Maximum %u px): %u px!';

    const EF_FOLDER_DOES_NOT_EXIST = "Folder '%s' does not exist!";

    const EF_FOLDER_IS_INSIDE_DOCUMENT_ROOT = "Folder '%s' is inside DocumentRoot!";

    const EF_FOLDER_MUST_BE_WITH_CHMOD = "Folder '%s' must be with a chmod '%s' (it's now set on %s)!";

    const EF_FOLDER_NOT_WRITABLE = "Folder '%s' is not writable by the server!";

    const EF_IMAGE_SIZE_NOT_FETCHED = "'%s' image size was not fetched, skipping max dimension check...";

    const EF_INVALID_SQL = "SQL '%s' is invalid!";

    const EF_KEYWORDS_MUST_BE_GREATER_THAN = 'Keywords must be at least <strong>%s</strong> characters long!';

    const EF_LOGGER_FILELINE = '%s in file %s line %s';

    const EF_MODULE_NOTFOUND = 'Please install or reactivate %1$s module. Minimum version required: %2$s';

    const EF_MODULE_VERSION = 'Minimum %1$s module version required: %2$s (your version is %3$s)';

    const EF_NOTIFICATION_EMAIL_NOT_SENT_TO = "Notification email was not sent to '%s'!";

    const EF_NOT_CREATED = "'%s' was not created!";

    const EF_NOT_DELETED = "'%s' was not deleted!";

    const EF_NOT_EXECUTED = "'%s' was not executed!";

    const EF_NOT_INSERTED_TO_DATABASE = "'%s' was not inserted to database!";

    const EF_NOT_INSTALLED = "'%s' was not installed!";

    const EF_NOT_UNINSTALLED = "'%s' was not uninstalled!";

    const EF_NOT_UPDATED = "'%s' was not updated!";

    const EF_PASSWORD_MUST_BE_GREATER_THAN = "Your password must be at least '%s' characters long!";

    const EF_PRIVATE_MESSAGE_NOT_SENT_TO = "Private message was not sent to '%s'!";

    const EF_SERVICE_IS_NOT_INSTALLED = "No '%s' service provider is installed!";

    const EF_TABLE_DROP_NOT_ALLOWED = "Table '%s' is not allowed to be dropped!";

    const EF_TABLE_NOT_CREATED = "Table '%s' was not created!"; // L118

    const EF_TABLE_NOT_DELETED = "Table '%s' was not deleted!"; // L164

    const EF_TABLE_NOT_DROPPED = "Table '%s' was not dropped!";

    const EF_TABLE_NOT_UPDATED = "Table '%s' was not updated!"; // L134

    const EF_UNEXPECTED_ERROR = 'Unexpected error: %s';

    const EF_USERNAME_MUST_BE_LESS_THAN = "Username is too long, it must be less than '%s' characters!";

    const EF_USERNAME_MUST_BE_MORE_THAN = "Username is too short, it must be more than '%s' characters!";

    const EF_USER_NAME_ALREADY_EXISTS = "User name '%s' already exists!";

    const EF_USER_NOT_FOUND_IN_DIRECTORY_SERVER = "User '%s' not found in the directory server (%s) in %s!";

    const EMAIL = 'Email';

    const EMAIL_HAS_BEEN_SENT_WITH_ACTIVATION_KEY = 'An email containing an user activation key has been sent to the email account you provided. Please follow the instructions in the email to activate your account. ';

    const EMAIL_HAS_NOT_BEEN_SENT_WITH_ACTIVATION_KEY = 'However, we were unable to send the activation email to your email account due to an internal error that had occurred on our server. We are sorry for the inconvenience, please send the webmaster an email notifying him/her of the situation.';

    const EMAIL_PROVIDED_IS_INVALID = 'The email address you provided is not a valid address.';

    const EMOTION = 'Emotion';

    const ENABLE_DISABLE = 'Enable/Disable';

    const ENABLE_HTML_TAGS = 'Enable HTML tags';

    const ENABLE_SMILIES_ICONS = 'Enable smilies icons';

    const ENABLE_XOOPS_CODES = 'Enable XOOPS codes';

    const ENDS_WITH = 'Ends with';

    const ENTER_CODE = 'Enter the codes that you want to add.';

    const ENTER_EMAIL = 'Enter the email address you want to add.';

    const ENTER_IMAGE_POSITION = 'Now, enter the position of the image.';

    const ENTER_IMAGE_URL = 'Enter the URL of the image you want to add';

    const ENTER_LINK_URL = 'Enter the URL of the link you want to add';

    const ENTER_QUOTE = 'Enter the text that you want to be quoted.';

    const ENTER_TEXT_BOX = 'Please input text into the text box.';

    const ENTER_VALID_EMAIL = 'Enter a valid email address';

    const ENTER_WEBSITE_TITLE = 'Enter the web site title';

    const ENTER_YOUR_FRIEND_EMAIL = "Please enter your friend's email address";

    const ENTER_YOUR_FRIEND_NAME = "Please enter your friend's name";

    const ENTER_YOUR_NAME = 'Please enter your name';

    const ERROR = 'Error';

    const ERRORS = 'Errors';

    const EVENT = 'Event';

    const EVENTS = 'Events';

    const EXACT_MATCH = 'Exact Match';

    const EXAMPLE = 'Example';

    const EXTENSIONS = 'Extensions';

    const EXTRA = 'Extra';

    const EXTRA_INFO = 'Extra info';

    const E_ACTIVATION_FAILED = 'Activation failed!';

    const E_ACTIVATION_KEY_INCORRECT = 'Activation key not correct!';

    const E_ALL_PARENT_ITEMS_MUST_BE_SELECTED = 'All parent items must be selected.';

    const E_CANNOT_CONNECT_TO_SERVER = "Can't connect to the server!";

    const E_CHANGE_FILE_PERMISSIONS = 'Please change the permission of this file for security reasons. In Unix (444), in Win32 (read-only)';

    const E_CHANGE_FOLDER_PERMISSIONS = 'Please change the permission of this folder. In Unix (777), in Win32 (writable)';

    const E_CHECK_EMAIL_AND_TRY_AGAIN = 'Please check the email address and try again!';

    const E_CHECK_NAME_AND_TRY_AGAIN = 'Please check the name and try again!';

    const E_COMPLETE_SUBJECT_AND_MESSAGE = 'Please complete the subject and message fields!';

    const E_CONTACT_THE_ADMINISTRATORS_FOR_DETAILS = 'Please contact the administrator for details!';

    const E_DATABASE_NOT_UPDATED = 'Database was not updated!';

    const E_EMAIL_SHOULD_NOT_CONTAIN_SPACES = 'Email address should not contain spaces!';

    const E_EMAIL_TAKEN = 'Email address is already registered!';

    const E_ENTER_ALL_REQUIRED_DATA = 'Please enter all required data!';

    const E_ENTER_IMAGE_POSITION = 'Enter the position of the image!';

    const E_EXTENSION_PHP_LDAP_NOT_LOADED = 'PHP LDAP extension not loaded (verify your PHP configuration file php.ini)';

    const E_FILE_NAME_MISSING = 'Filename is missing!';

    const E_FILE_NOT_FOUND = 'File not found!';

    const E_FILE_TYPE_REJECTED = "The file you're trying to upload is not supported by this site/server!";

    const E_FROM_EMAIL_NOT_SET = 'From email is not set!';

    const E_FROM_NAME_NOT_SET = 'From name is not set!';

    const E_GO_BACK_AND_TRY_AGAIN = 'Please go back and try again!';

    const E_INCORRECT_LOGIN = 'Incorrect login!';

    const E_INVALID_CONFIRMATION_CODE = 'Invalid confirmation code!';

    const E_INVALID_EMAIL = 'Invalid email!';

    const E_INVALID_FILE_NAME = 'Invalid file name!';

    const E_INVALID_FILE_SIZE = 'Invalid file size!';

    const E_INVALID_IMAGE_FILE = 'Invalid image file!';

    const E_INVALID_USERNAME = 'Invalid username!';

    const E_LOADING_MIME_TYPES_DEFINITION = 'Error loading mime types definition!';

    const E_LOGGER_ERROR = 'Error';

    const E_LOGGER_NOTICE = 'Notice';

    const E_LOGGER_STRICT = 'Strict';

    const E_LOGGER_UNKNOWN = 'Unknown';

    const E_LOGGER_WARNING = 'Warning';

    const E_MESSAGE_BODY_NOT_SET = 'Message body is not set!';

    const E_MESSAGE_TO_LONG = 'Your message is too long!';

    const E_MOVE_OUT_OF_DOCUMENT_ROOT = 'For security considerations it is highly suggested to move it out of DocumentRoot!';

    const E_MUST_PROVIDE_PASSWORD = 'You must provide a password!';

    const E_NAME_IS_RESERVED = 'Name is reserved!';

    const E_NOT_DONE = 'Not done!';

    const E_NO_ACCESS_PERMISSION = "Sorry, you don't have the permission to access this area!";

    const E_NO_ACTION_PERMISSION = 'Sorry, you do not have the permission to perform this action!';

    const E_NO_MODULE = 'Selected module does not exist!';

    const E_NO_PAGE = 'This page does not exist in our database';

    const E_NO_RESULT_FOUND = 'No result found!';

    const E_NO_USER_FOUND = 'Sorry, the user was not found!';

    const E_NO_USER_SELECTED = 'No user selected!';

    const E_NO_VALID_ID_DETECTED = 'No valid ID detected';

    const E_PASSWORDS_MUST_MATCH = 'Both passwords are different. They must be identical.';

    const E_REGISTER_FIRST_TO_SEND_PRIVATE_MESSAGES = 'Please register first to send private messages!';

    const E_REMOVE_DIRECTORY = 'Please remove this directory for security reasons';

    const E_SECTION_NOT_ACTIVE = 'This section is not active!';

    const E_SELECTED_ACCOUNT_IS_ALREADY_ACTIVATED = 'Selected account is already activated!';

    const E_SELECTED_USER_DEACTIVATED_OR_NOT_ACTIVE = 'The selected user has been deactivated or has not been activated yet.';

    const E_SELECTED_USER_DOES_NOT_EXIST = "The selected user doesn't exist in the database.";

    const E_SOME_ERROR_OCCURRED = 'Some error occurred!';

    const E_SUSPICIOUS_IMAGE_UPLOAD_REFUSED = 'Suspicious image upload refused!';

    const E_TAKING_YOU_BACK = 'Taking you back to where you were...';

    const E_TEMPLATE_FILE_NOT_OPENED = 'Template file was not opened!';

    const E_TLS_CONNECTION_NOT_OPENED = 'TLS connection was not opened!';

    const E_TO_MANY_ATTEMPTS = 'Too many attempts!';

    const E_UPLOAD_DIRECTORY_NOT_SET = 'Upload directory not set!';

    const E_USERNAME_TAKEN = 'Username already taken!';

    const E_USERS_NOT_FOUND = 'No users found!';

    const E_USER_ID_NOT_FETCHED = 'User ID was not fetched!';

    const E_USER_IN_WEBMASTER_GROUP_CANNOT_BE_REMOVED = 'User in the webmasters group cannot be removed';

    const E_USER_NOT_REGISTERED = 'User was not registered!';

    const E_USER_NOT_UPDATED = 'User was not updated!';

    const E_VERIFY_USER_DATA_OR_SET_AUTOMATIC_PROVISIONING = 'Please verify your user data or set on the automatic provisioning';

    const E_WE_ARE_CLOSED_FOR_REGISTRATION = 'Sorry, we are currently closed for new user registrations!';

    const E_YOU_ARE_NOT_REGISTERED = 'Sorry, you are not a registered user!';

    const E_YOU_DO_NOT_HAVE_ANY_PRIVATE_MESSAGE = 'You do not have any private messages!';

    const E_YOU_HAVE_TO_AGREE_TO_DISCLAIMER = 'Sorry, you have to agree to our disclaimer to get registered!';

    const E_YOU_MUST_COMPLETE_ALL_REQUIRED_FIELDS = 'You must complete all required fields';

    const E_YOU_NEED_A_POSITIVE_INTEGER = 'You need a positive integer!';

    const E_YOU_NEED_TO_ENTER_REQUIRED_INFO = 'You need to enter required info!';

    const FIELD = 'Field';

    const FIELDS = 'Fields';

    const FILE = 'File';

    const FILES = 'Files';

    const FIND_USERS = 'Find users';

    const FLASH = 'Flash';

    const FLASH_URL = 'Flash URL';

    const FLAT = 'Flat';

    const FOLDER = 'Folder';

    const FOLDERS = 'Folders';

    const FONT = 'Font';

    const FROM = 'From';

    const F_ACTIVE_USERS = 'Active users: %s';

    const F_ALL_ABOUT = 'All about %s';

    const F_AUTHORIZED_MIME_TYPES = 'Authorized mime types: %s';

    const F_CLICK_HERE = "Click <a href='%s'>here</a>.";

    const F_CONFIRMATION_EMAIL_SENT = 'Confirmation email for %s mailed.';

    const F_CURRENT_TEXT_LENGTH = 'Current text length: %s';

    const F_DAYS = '%s days';

    const F_DELETED = '%s deleted';

    const F_DISABLE = 'Disable %s';

    const F_ENTER = 'Please enter %s';

    const F_ERROR = 'Error:<br /><br /> %s';

    const F_FILES = '%s files';

    const F_FILE_EXISTS_IN = 'File exists in: %s';

    const F_HAS_JUST_REGISTERED = '%s has just registered!';

    const F_HOURS = '%s hours';

    const F_IF_PAGE_NOT_RELOAD_CLICK_HERE = "If the page does not automatically reload, please click <a href='%s'>here</a>";

    const F_INACTIVE_USERS = 'Inactive users: %s';

    const F_INTERESTING_SITE = 'Interesting site: %s';

    const F_IN_FILE_LINE = '%s in file %s line %s';

    const F_IS_REQUIRED = '%s is required';

    const F_KEYWORDS_SHORTER_THAN_WILL_BE_IGNORED = 'Keywords shorter than <strong>%s</strong> characters will be ignored';

    const F_MAXIMUM_ATTEMPTS = 'Maximum attempts you can try: %d';

    const F_MAX_PIXELS_WIDTH_HEIGHT = 'Max Pixels: %s x %s (width x height)';

    const F_MAX_UPLOAD_FILES_SIZE_ALLOWED_KB = 'Max uploaded files size: %s [KB]';

    const F_MINIMUM_DATABASE_VERSION_REQUIRED = 'Minimum version required: %s (your version is %s)';

    const F_MINIMUM_PHP_VERSION_REQUIRED = 'Minimum PHP required: %s (your version is %s)';

    const F_MINIMUM_XOOPS_VERSION_REQUIRED = 'Minimum XOOPS required: %s (your version is %s)';

    const F_MINUTES = '%s minutes';

    const F_MODULE_IS_INSTALLED = "The module '%s' is installed";

    const F_MODULE_IS_NOT_INSTALLED = "The module '%s' isn't installed";

    const F_MUST_BE_SHORTER_THAN = '%s must be shorter than %d characters.';

    const F_NEW_PASSWORD_REQUEST_AT = 'New password request at %s';

    const F_NEW_USER_REGISTRATION_AT = 'New user registration at %s';

    const F_NO_DELETE_ONLY_THIS = 'No, delete only this %s';

    const F_OPTIONS = '%s options';

    const F_POSTED_BY = 'Posted by %s';

    const F_READS = '(%s reads)';

    const F_RULES = '%s rules';

    const F_SECONDS = '%s seconds';

    const F_SEND_EMAIL_TO = 'Send email to %s';

    const F_SEND_PRIVATE_MESSAGE_TO = 'Send private message to %s';

    const F_SHOWING_RESULTS = '(Showing %d - %d)';

    //const F_TIME_FORMAT_DESCRIPTION = "Valid formats: 's' - %s; 'm' - %s; 'l' - %s;<br />'c' or 'custom' - format determined according to interval to present; 'e' - Elapsed; 'mysql' - Y-m-d H:i:s;<br />specified object - Refer to <a href='http://php.net/manual/en/function.date.php' rel='external'>PHP manual</a>.";
    const F_TOOK_SECONDS_TO_LOAD = '%s took %s seconds to load.';

    const F_USERS_BROWSING = '<strong>%s</strong> user(s) are browsing <strong>%s</strong>';

    const F_USERS_FOUND = '%s user(s) found';

    const F_USERS_ONLINE = '<strong>%s</strong> user(s) are online';

    const F_USER_ACTIVATION_KEY_FOR = 'User activation key for %s';

    const F_USING_AUTHENTICATION_METHOD = 'Using %s authentication method';

    const F_WELCOME_TO = 'Welcome to %s';

    const F_YES_DELETE_ALL = 'Yes, delete all %s';

    const F_YOUR_ACCOUNT_AT = 'Your account at %s';

    const F_EXTENSION_PHP_NOT_LOADED = 'PHP %s extension not loaded (verify your PHP configuration file php.ini)';

    const GO_BACK = 'Go back';

    const GO_TO = 'Go to';

    const GO_TODAY = 'Go today';

    const GROUP = 'Group';

    const GROUPS = 'Groups';

    const GUESTS = 'Guests';

    const HAS_AVATAR = 'Has avatar';

    const HEIGHT = 'Height';

    const HELP = 'Help';

    const HIDDEN = 'Hidden';

    const HITS = 'Hits';

    const HOME = 'Home';

    const HOME_PAGE = 'Home page';

    const HORIZONTAL = 'Horizontal';

    const HTML = 'HTML';

    const ICONS = 'Icons';

    const ICQ = 'ICQ';

    const ID = 'ID';

    const IMAGE = 'Image';

    const IMAGES = 'Images';

    const IMAGE_FILE = 'Image file';

    const IMAGE_POSITION_DESCRIPTION = " 'R' or 'r' for right, 'L' or 'l' for left, or leave it blank.";

    const IMAGE_URL = 'Image url';

    const INACTIVE = 'Inactive';

    const INBOX = 'Inbox';

    const INDEX = 'Index';

    const INFO = 'Info';

    const INFORMATION = 'Information';

    const INFORMATION_FOR_UPLOADS = 'Information for uploads';

    const INPUT_LETTERS_IN_THE_IMAGE = 'Input letters in the image';

    const INPUT_RESULT_FROM_EXPRESSION = 'Input the result from the expression';

    const INSIDE_IMAGE = 'Inside images';

    const INTEREST = 'Interest';

    const INTEREST_CONTAINS = 'Interest contains';

    const IP = 'IP';

    const ITALIC = 'Italic';

    const ITEMS = 'Items';

    const ITEMS_TO_DISPLAY = 'Items to display';

    const ITEM_ID = 'Item ID';

    const ITEM_NAME = 'Item name';

    const I_AGREE_TO_THE_ABOVE = 'I agree to the above';

    const KEYWORD = 'Keyword';

    const KEYWORDS = 'Keywords';

    const LANGUAGE = 'Language';

    const LANGUAGES = 'Languages';

    const LAST_LOGIN = 'Last login';

    const LEFT = 'Left';

    const LEVEL = 'Level';

    //const LF_AGO_DAYS = "%s days ago";
    //const LF_AGO_HOURS = "%s hours ago";
    //const LF_AGO_MINUTES = "%s minutes ago";
    //const LF_AGO_ONE_DAY = "1 day ago";
    //const LF_AGO_ONE_HOUR = "1 hour ago";
    //const LF_AGO_ONE_MINUTE = "1 minute ago";
    //const LF_AGO_ONE_MONTH = "1 month ago";
    //const LF_AGO_ONE_SECOND = "1 second ago";
    //const LF_AGO_ONE_WEEK = "1 week ago";
    //const LF_AGO_SECONDS = "%s seconds ago";
    const LICENCE = 'Licence';

    const LINE_THROUGH = 'Line through';

    const LINKS = 'Links';

    const LIST_ = 'List';

    const LOADING = 'Loading...';

    const LOCATION = 'Location';

    const LOCATION_CONTAINS = 'Location contains';

    const LOGGED_IN_PAST_X_DAYS = "Logged in past <span style='color:#ff0000;'>X</span>days";

    const LOGIN_WITH_REGISTERED_PASSWORD = 'Please login with the registered password.';

    //const L_COUNTRY_AD = "Andorra";
    //const L_COUNTRY_AE = "United Arab Emirates";
    //const L_COUNTRY_AF = "Afghanistan";
    //const L_COUNTRY_AG = "Antigua and Barbuda";
    //const L_COUNTRY_AI = "Anguilla";
    //const L_COUNTRY_AL = "Albania";
    //const L_COUNTRY_AM = "Armenia";
    //const L_COUNTRY_AN = "Netherlands Antilles";
    //const L_COUNTRY_AO = "Angola";
    //const L_COUNTRY_AQ = "Antarctica";
    //const L_COUNTRY_AR = "Argentina";
    //const L_COUNTRY_AS = "American Samoa";
    //const L_COUNTRY_AT = "Austria";
    //const L_COUNTRY_AU = "Australia";
    //const L_COUNTRY_AW = "Aruba";
    //const L_COUNTRY_AX = "Åland Islands";
    //const L_COUNTRY_AZ = "Azerbaijan";
    //const L_COUNTRY_BA = "Bosnia and Herzegovina";
    //const L_COUNTRY_BB = "Barbados";
    //const L_COUNTRY_BD = "Bangladesh";
    //const L_COUNTRY_BE = "Belgium";
    //const L_COUNTRY_BF = "Burkina Faso";
    //const L_COUNTRY_BG = "Bulgaria";
    //const L_COUNTRY_BH = "Bahrain";
    //const L_COUNTRY_BI = "Burundi";
    //const L_COUNTRY_BJ = "Benin";
    //const L_COUNTRY_BL = "Saint Barthélemy";
    //const L_COUNTRY_BM = "Bermuda";
    //const L_COUNTRY_BN = "Brunei Darussalam";
    //const L_COUNTRY_BO = "Bolivia";
    //const L_COUNTRY_BR = "Brazil";
    //const L_COUNTRY_BS = "Bahamas";
    //const L_COUNTRY_BT = "Bhutan";
    //const L_COUNTRY_BV = "Bouvet Island";
    //const L_COUNTRY_BW = "Botswana";
    //const L_COUNTRY_BY = "Belarus";
    //const L_COUNTRY_BZ = "Belize";
    //const L_COUNTRY_CA = "Canada";
    //const L_COUNTRY_CC = "Cocos (Keeling) Islands";
    //const L_COUNTRY_CD = "Congo (Dem. Rep.)";
    //const L_COUNTRY_CF = "Central African Republic";
    //const L_COUNTRY_CG = "Congo";
    //const L_COUNTRY_CH = "Switzerland";
    //const L_COUNTRY_CI = "Côte d'Ivoire";
    //const L_COUNTRY_CK = "Cook Islands";
    //const L_COUNTRY_CL = "Chile";
    //const L_COUNTRY_CM = "Cameroon";
    //const L_COUNTRY_CN = "China";
    //const L_COUNTRY_CO = "Colombia";
    //const L_COUNTRY_CR = "Costa Rica";
    //const L_COUNTRY_CS = "Serbia & Montenegro (former)"; //  Not listed in ISO 3166
    //const L_COUNTRY_CU = "Cuba";
    //const L_COUNTRY_CV = "Cape Verde";
    //const L_COUNTRY_CX = "Christmas Island";
    //const L_COUNTRY_CY = "Cyprus";
    //const L_COUNTRY_CZ = "Czech Republic";
    //const L_COUNTRY_DE = "Germany";
    //const L_COUNTRY_DJ = "Djibouti";
    //const L_COUNTRY_DK = "Denmark";
    //const L_COUNTRY_DM = "Dominica";
    //const L_COUNTRY_DO = "Dominican Republic";
    //const L_COUNTRY_DZ = "Algeria";
    //const L_COUNTRY_EC = "Ecuador";
    //const L_COUNTRY_EE = "Estonia";
    //const L_COUNTRY_EG = "Egypt";
    //const L_COUNTRY_EH = "Western Sahara";
    //const L_COUNTRY_ER = "Eritrea";
    //const L_COUNTRY_ES = "Spain";
    //const L_COUNTRY_ET = "Ethiopia";
    //const L_COUNTRY_FI = "Finland";
    //const L_COUNTRY_FJ = "Fiji";
    //const L_COUNTRY_FK = "Falkland Islands (Malvinas)";
    //const L_COUNTRY_FM = "Micronesia";
    //const L_COUNTRY_FO = "Faroe Islands";
    //const L_COUNTRY_FR = "France";
    //const L_COUNTRY_FX = "France, Metropolitan"; //  Not listed in ISO 3166
    //const L_COUNTRY_GA = "Gabon";
    //const L_COUNTRY_GB = "Great Britain (UK)";
    //const L_COUNTRY_GD = "Grenada";
    //const L_COUNTRY_GE = "Georgia";
    //const L_COUNTRY_GF = "French Guiana";
    //const L_COUNTRY_GG = "Guernsey";
    //const L_COUNTRY_GH = "Ghana";
    //const L_COUNTRY_GI = "Gibraltar";
    //const L_COUNTRY_GL = "Greenland";
    //const L_COUNTRY_GM = "Gambia";
    //const L_COUNTRY_GN = "Guinea";
    //const L_COUNTRY_GP = "Guadeloupe";
    //const L_COUNTRY_GQ = "Equatorial Guinea";
    //const L_COUNTRY_GR = "Greece";
    //const L_COUNTRY_GS = "S. Georgia and S. Sandwich Isls.";
    //const L_COUNTRY_GT = "Guatemala";
    //const L_COUNTRY_GU = "Guam";
    //const L_COUNTRY_GW = "Guinea-Bissau";
    //const L_COUNTRY_GY = "Guyana";
    //const L_COUNTRY_HK = "Hong Kong";
    //const L_COUNTRY_HM = "Heard and McDonald Islands";
    //const L_COUNTRY_HN = "Honduras";
    //const L_COUNTRY_HR = "Croatia";
    //const L_COUNTRY_HT = "Haiti";
    //const L_COUNTRY_HU = "Hungary";
    //const L_COUNTRY_ID = "Indonesia";
    //const L_COUNTRY_IE = "Ireland";
    //const L_COUNTRY_IL = "Israel";
    //const L_COUNTRY_IM = "Isle of Man";
    //const L_COUNTRY_IN = "India";
    //const L_COUNTRY_IO = "British Indian Ocean Territory";
    //const L_COUNTRY_IQ = "Iraq";
    //const L_COUNTRY_IR = "Iran";
    //const L_COUNTRY_IS = "Iceland";
    //const L_COUNTRY_IT = "Italy";
    //const L_COUNTRY_JM = "Jamaica";
    //const L_COUNTRY_JO = "Jordan";
    //const L_COUNTRY_JP = "Japan";
    //const L_COUNTRY_KE = "Kenya";
    //const L_COUNTRY_KG = "Kyrgyzstan";
    //const L_COUNTRY_KH = "Cambodia";
    //const L_COUNTRY_KI = "Kiribati";
    //const L_COUNTRY_KM = "Comoros";
    //const L_COUNTRY_KN = "Saint Kitts and Nevis";
    //const L_COUNTRY_KP = "Korea (North)";
    //const L_COUNTRY_KR = "Korea (South)";
    //const L_COUNTRY_KW = "Kuwait";
    //const L_COUNTRY_KY = "Cayman Islands";
    //const L_COUNTRY_KZ = "Kazakhstan";
    //const L_COUNTRY_LA = "Laos";
    //const L_COUNTRY_LB = "Lebanon";
    //const L_COUNTRY_LC = "Saint Lucia";
    //const L_COUNTRY_LI = "Liechtenstein";
    //const L_COUNTRY_LK = "Sri Lanka";
    //const L_COUNTRY_LR = "Liberia";
    //const L_COUNTRY_LS = "Lesotho";
    //const L_COUNTRY_LT = "Lithuania";
    //const L_COUNTRY_LU = "Luxembourg";
    //const L_COUNTRY_LV = "Latvia";
    //const L_COUNTRY_LY = "Libya";
    //const L_COUNTRY_MA = "Morocco";
    //const L_COUNTRY_MC = "Monaco";
    //const L_COUNTRY_MD = "Moldova";
    //const L_COUNTRY_ME = "Montenegro";
    //const L_COUNTRY_MF = "Saint Martin";
    //const L_COUNTRY_MG = "Madagascar";
    //const L_COUNTRY_MH = "Marshall Islands";
    //const L_COUNTRY_MK = "Macedonia"; //FYROM
    //const L_COUNTRY_ML = "Mali";
    //const L_COUNTRY_MM = "Myanmar";
    //const L_COUNTRY_MN = "Mongolia";
    //const L_COUNTRY_MO = "Macao";
    //const L_COUNTRY_MP = "Northern Mariana Islands";
    //const L_COUNTRY_MQ = "Martinique";
    //const L_COUNTRY_MR = "Mauritania";
    //const L_COUNTRY_MS = "Montserrat";
    //const L_COUNTRY_MT = "Malta";
    //const L_COUNTRY_MU = "Mauritius";
    //const L_COUNTRY_MV = "Maldives";
    //const L_COUNTRY_MW = "Malawi";
    //const L_COUNTRY_MX = "Mexico";
    //const L_COUNTRY_MY = "Malaysia";
    //const L_COUNTRY_MZ = "Mozambique";
    //const L_COUNTRY_NA = "Namibia";
    //const L_COUNTRY_NC = "New Caledonia";
    //const L_COUNTRY_NE = "Niger";
    //const L_COUNTRY_NF = "Norfolk Island";
    //const L_COUNTRY_NG = "Nigeria";
    //const L_COUNTRY_NI = "Nicaragua";
    //const L_COUNTRY_NL = "Netherlands";
    //const L_COUNTRY_NO = "Norway";
    //const L_COUNTRY_NP = "Nepal";
    //const L_COUNTRY_NR = "Nauru";
    //const L_COUNTRY_NT = "Neutral Zone";
    //const L_COUNTRY_NU = "Niue";
    //const L_COUNTRY_NZ = "New Zealand";
    //const L_COUNTRY_OM = "Oman";
    //const L_COUNTRY_PA = "Panama";
    //const L_COUNTRY_PE = "Peru";
    //const L_COUNTRY_PF = "French Polynesia";
    //const L_COUNTRY_PG = "Papua New Guinea";
    //const L_COUNTRY_PH = "Philippines";
    //const L_COUNTRY_PK = "Pakistan";
    //const L_COUNTRY_PL = "Poland";
    //const L_COUNTRY_PM = "St. Pierre and Miquelon";
    //const L_COUNTRY_PN = "Pitcairn";
    //const L_COUNTRY_PR = "Puerto Rico";
    //const L_COUNTRY_PS = "Palestine Territory (Occupied)";
    //const L_COUNTRY_PT = "Portugal";
    //const L_COUNTRY_PW = "Palau";
    //const L_COUNTRY_PY = "Paraguay";
    //const L_COUNTRY_QA = "Qatar";
    //const L_COUNTRY_RE = "Reunion";
    //const L_COUNTRY_RO = "Romania";
    //const L_COUNTRY_RS = "Serbia";
    //const L_COUNTRY_RU = "Russian Federation";
    //const L_COUNTRY_RW = "Rwanda";
    //const L_COUNTRY_SA = "Saudi Arabia";
    //const L_COUNTRY_SB = "Solomon Islands";
    //const L_COUNTRY_SC = "Seychelles";
    //const L_COUNTRY_SD = "Sudan";
    //const L_COUNTRY_SE = "Sweden";
    //const L_COUNTRY_SG = "Singapore";
    //const L_COUNTRY_SH = "St. Helena";
    //const L_COUNTRY_SI = "Slovenia";
    //const L_COUNTRY_SJ = "Svalbard and Jan Mayen Islands";
    //const L_COUNTRY_SK = "Slovakia";
    //const L_COUNTRY_SL = "Sierra Leone";
    //const L_COUNTRY_SM = "San Marino";
    //const L_COUNTRY_SN = "Senegal";
    //const L_COUNTRY_SO = "Somalia";
    //const L_COUNTRY_SR = "Suriname";
    //const L_COUNTRY_ST = "Sao Tome and Principe";
    //const L_COUNTRY_SU = "USSR (former)"; //  Not listed in ISO 3166
    //const L_COUNTRY_SV = "El Salvador";
    //const L_COUNTRY_SY = "Syria";
    //const L_COUNTRY_SZ = "Swaziland";
    //const L_COUNTRY_TC = "Turks and Caicos Islands";
    //const L_COUNTRY_TD = "Chad";
    //const L_COUNTRY_TF = "French Southern Territories";
    //const L_COUNTRY_TG = "Togo";
    //const L_COUNTRY_TH = "Thailand";
    //const L_COUNTRY_TJ = "Tajikistan";
    //const L_COUNTRY_TK = "Tokelau";
    //const L_COUNTRY_TL = "Timor-Leste";
    //const L_COUNTRY_TM = "Turkmenistan";
    //const L_COUNTRY_TN = "Tunisia";
    //const L_COUNTRY_TO = "Tonga";
    //const L_COUNTRY_TP = "East Timor"; //  Not listed in ISO 3166, changed to TL
    //const L_COUNTRY_TR = "Turkey";
    //const L_COUNTRY_TT = "Trinidad and Tobago";
    //const L_COUNTRY_TV = "Tuvalu";
    //const L_COUNTRY_TW = "Taiwan";
    //const L_COUNTRY_TZ = "Tanzania";
    //const L_COUNTRY_UA = "Ukraine";
    //const L_COUNTRY_UG = "Uganda";
    //const L_COUNTRY_UK = "United Kingdom"; //  Not listed in ISO 3166
    //const L_COUNTRY_UM = "US Minor Outlying Islands";
    //const L_COUNTRY_US = "United States";
    //const L_COUNTRY_UY = "Uruguay";
    //const L_COUNTRY_UZ = "Uzbekistan";
    //const L_COUNTRY_VA = "Vatican City State (Holy See)";
    //const L_COUNTRY_VC = "Saint Vincent and the Grenadines";
    //const L_COUNTRY_VE = "Venezuela";
    //const L_COUNTRY_VG = "Virgin Islands (British)";
    //const L_COUNTRY_VI = "Virgin Islands (US)";
    //const L_COUNTRY_VN = "Viet Nam";
    //const L_COUNTRY_VU = "Vanuatu";
    //const L_COUNTRY_WF = "Wallis and Futuna Islands";
    //const L_COUNTRY_WS = "Samoa";
    //const L_COUNTRY_YE = "Yemen";
    //const L_COUNTRY_YT = "Mayotte";
    //const L_COUNTRY_YU = "Yugoslavia (former)"; //  Not listed in ISO 3166
    //const L_COUNTRY_ZA = "South Africa";
    //const L_COUNTRY_ZM = "Zambia";
    //const L_COUNTRY_ZR = "Zaire"; //  Not listed in ISO 3166
    //const L_COUNTRY_ZW = "Zimbabwe";
    //const L_DAY_FRIDAY = "Friday";
    //const L_DAY_MONDAY = "Monday";
    //const L_DAY_SATURDAY = "Saturday";
    //const L_DAY_SUNDAY = "Sunday";
    //const L_DAY_THURSDAY = "Thursday";
    //const L_DAY_TUESDAY = "Tuesday";
    //const L_DAY_WEDNESDAY = "Wednesday";
    //const L_MONTH_APRIL = "April";
    //const L_MONTH_AUGUST = "August";
    //const L_MONTH_DECEMBER = "December";
    //const L_MONTH_FEBRUARY = "February";
    //const L_MONTH_JANUARY = "January";
    //const L_MONTH_JULY = "July";
    //const L_MONTH_JUNE = "June";
    //const L_MONTH_MARCH = "March";
    //const L_MONTH_MAY = "May";
    //const L_MONTH_NOVEMBER = "November";
    //const L_MONTH_OCTOBER = "October";
    //const L_MONTH_SEPTEMBER = "September";
    //const L_TZ_GMT0 = "(GMT) Greenwich Mean Time, London, Dublin, Lisbon, Casablanca, Monrovia";
    //const L_TZ_GMTM1 = "(GMT-1:00) Azores, Cape Verde Islands";
    //const L_TZ_GMTM10 = "(GMT-10:00) Hawaii";
    //const L_TZ_GMTM11 = "(GMT-11:00) Midway Island, Samoa";
    //const L_TZ_GMTM12 = "(GMT-12:00) Eniwetok, Kwajalein";
    //const L_TZ_GMTM2 = "(GMT-2:00) Mid-Atlantic";
    //const L_TZ_GMTM3 = "(GMT-3:00) Brasilia, Buenos Aires, Georgetown";
    //const L_TZ_GMTM35 = "(GMT-3:30) Newfoundland";
    //const L_TZ_GMTM4 = "(GMT-4:00) Atlantic Time (Canada), Caracas, La Paz";
    //const L_TZ_GMTM5 = "(GMT-5:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito";
    //const L_TZ_GMTM6 = "(GMT-6:00) Central Time (US &amp; Canada), Mexico City";
    //const L_TZ_GMTM7 = "(GMT-7:00) Mountain Time (US &amp; Canada)";
    //const L_TZ_GMTM8 = "(GMT-8:00) Pacific Time (US &amp; Canada)";
    //const L_TZ_GMTM9 = "(GMT-9:00) Alaska";
    //const L_TZ_GMTP1 = "(GMT+1:00) Amsterdam, Berlin, Rome, Copenhagen, Brussels, Madrid, Paris";
    //const L_TZ_GMTP10 = "(GMT+10:00) Brisbane, Canberra, Melbourne, Sydney, Guam,Vlasdiostok";
    //const L_TZ_GMTP11 = "(GMT+11:00) Magadan, Solomon Islands, New Caledonia";
    //const L_TZ_GMTP12 = "(GMT+12:00) Auckland, Wellington, Fiji, Kamchatka, Marshall Island";
    //const L_TZ_GMTP2 = "(GMT+2:00) Athens, Istanbul, Minsk, Helsinki, Jerusalem, South Africa";
    //const L_TZ_GMTP3 = "(GMT+3:00) Baghdad, Kuwait, Riyadh, Moscow, St. Petersburg";
    //const L_TZ_GMTP35 = "(GMT+3:30) Tehran";
    //const L_TZ_GMTP4 = "(GMT+4:00) Abu Dhabi, Muscat, Baku, Tbilisi";
    //const L_TZ_GMTP45 = "(GMT+4:30) Kabul";
    //const L_TZ_GMTP5 = "(GMT+5:00) Ekaterinburg, Islamabad, Karachi, Tashkent";
    //const L_TZ_GMTP55 = "(GMT+5:30) Mumbai, Kolkata, Chennai, New Delhi";
    //const L_TZ_GMTP6 = "(GMT+6:00) Almaty, Dhaka, Colombo";
    //const L_TZ_GMTP7 = "(GMT+7:00) Bangkok, Hanoi, Jakarta";
    //const L_TZ_GMTP8 = "(GMT+8:00) Beijing, Perth, Singapore, Hong Kong, Urumqi, Taipei";
    //const L_TZ_GMTP9 = "(GMT+9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk";
    //const L_TZ_GMTP95 = "(GMT+9:30) Adelaide, Darwin";
    const MAIN = 'Main';

    const MAKE_PDF_FROM_THIS_PAGE = 'Make a PDF from this page';

    const MANAGE_EXTENSIONS = 'Manage extensions';

    const MANAGE_MODULES = 'Manage modules';

    const MANUAL = 'Manual';

    const MATCHES = 'Matches';

    const MAXIMUM_LENGTH = 'Maximum length';

    const MAX_HEIGHT = 'Max height';

    const MAX_IMAGE_SIZE_BYTES = 'Max Image Size (Bytes)';

    const MAX_PIXELS = 'Max Pixels';

    const MAX_SIZE = 'Max size';

    const MAX_WIDTH = 'Max width';

    const MEMBERS = 'Members';

    const MEMBER_SINCE = 'Member since';

    const MESSAGE = 'Message';

    const MESSAGE_ICON = 'Message icon';

    const METHOD = 'Method';

    const MMS = 'MMS';

    const MMS_URL = 'MMS URL';

    const MODULE = 'Module';

    const MODULES = 'Modules';

    const MODULE_INFORMATION = 'Module information';

    const MORE = 'More...';

    const MORE_ABOUT_ME = 'More about me';

    const MORE_DETAILS = 'More details';

    const MP3 = 'MP3';

    const MP3_URL = 'MP3 URL';

    const MSNM = 'MSNM';

    const MY_INFORMATION = 'My information';

    const NAME = 'Name';

    const NAME_NOT_AVAILABLE = 'Name not available';

    const NESTED = 'Nested';

    const NEWEST_FIRST = 'Newest first';

    const NEXT = 'Next';

    const NEXT_MESSAGE = 'Next message';

    const NEXT_MONTH = 'Next month';

    const NEXT_YEAR = 'Next year';

    const NO = 'No';

    const NONE = 'None';

    const NOTIFICATIONS = 'Notifications';

    const NOT_CACHED = 'Not cached';

    const NOT_READ = 'Not read';

    const NO_CACHE = 'No cache';

    const NO_COMMENTS = 'No comments';

    const NO_FILE_UPLOADED = 'No file uploaded';

    const NO_MATCH_FOUND_FOR_QUERY = 'No match found for your query';

    const NO_PROBLEM_ENTER_EMAIL_WE_HAVE_ON_FILE = 'No problem. Simply enter the e-mail address we have on file for your account.';

    const NO_TITLE = 'No title';

    const NUMBER_OF_ITEMS_PER_PAGE_IN_ADMIN_SIDE = 'Number of items to display per page in admin side';

    const NUMBER_OF_ITEMS_PER_PAGE_IN_USER_SIDE = 'Number of items to display per page in user side';

    const NUMBER_OF_POSTS = 'Number of posts';

    const NUMBER_OF_RESULTS_PER_PAGE = 'Number of results per page';

    const OCCUPATION = 'Occupation';

    const OCCUPATION_CONTAINS = 'Occupation contains';

    const OFF = 'Off';

    const OFFLINE = 'Offline';

    const OLDEST_FIRST = 'Oldest first';

    const ON = 'On';

    const ONE_DAY = '1 day';

    const ONE_HOUR = '1 hour';

    const ONE_MINUTE = '1 minute';

    const ONE_MONTH = '1 month';

    const ONE_SECOND = '1 second';

    const ONE_WEEK = '1 week';

    const ONLINE = 'Online';

    const ONLY_USERS_THAT_ACCEPT_EMAIL = 'Only users that accept email';

    const ONLY_USERS_THAT_DO_NOT_ACCEPT_EMAIL = "Only users that don't accept email";

    const OPTIONAL = 'Optional';

    const OPTIONS = 'Options';

    const ORDER = 'Order';

    const ORDER_BY = 'Order by';

    const ORIGINAL_IMAGE = 'Original image';

    const OR_CLICK_HERE_TO_CLOSE_WINDOW = 'Or click here to close this window.';

    const PAGE = 'Page';

    const PARENT = 'Parent';

    const PASSWORD = 'Password';

    const PASSWORD_STRENGTH = 'Password strength';

    const PASTE_THE_CODE_YOU_WANT_TO_INSERT = 'Paste the CODE you want to insert';

    const PASTE_THE_QUOTE_YOU_WANT_TO_INSERT = 'Paste the QUOTE you want to insert';

    const PENDING = 'Pending';

    const PERMISSIONS = 'Permissions';

    const PLEASE_WAIT_FOR_ACCOUNT_ACTIVATION = 'Please wait for your account to be activated by the administrators. You will receive an email once you are activated. This could take a while so please be patient.';

    const PM = 'PM';

    const POSITION = 'Position';

    const POSITION_CONTAINS = 'Position contains';

    const POST = 'Post';

    const POSTED_BY = 'Posted by';

    const POSTS = 'Posts';

    const POST_ANONYMOUSLY = 'Post anonymously';

    const PREFERENCES = 'Preferences';

    const PRESS_BUTTON_BELLOW_TO_LOGIN = 'Press the button below to login';

    const PREVIEW = 'Preview';

    const PREVIOUS = 'Previous';

    const PREVIOUS_MESSAGE = 'Previous message';

    const PREVIOUS_MONTH = 'Previous month';

    const PREVIOUS_YEAR = 'Previous year';

    const PRINT_ICON = 'Print icon';

    const PRINT_THIS_PAGE = 'Print this page';

    const PRIVATE_MESSAGE = 'Private message';

    const PRIVATE_MESSAGES = 'Private messages';

    const PROFILE = 'Profile';

    const PUBLISHED = 'Published'; // Posted date

    const QUERIES = 'Queries';

    const QUERY = 'Query';

    const QUERY_MODE = 'Query mode';

    const QUICK_ACCESS = 'Quick access';

    const QUOTE = 'Quote';

    const Q_ARE_YOU_SURE = 'Are you sure?';

    const Q_ARE_YOU_SURE_TO_DELETE_ACCOUNT = 'Are you sure to delete your account?';

    const Q_ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_ITEM = 'Are you sure you want to delete this item?';

    const Q_ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_MESSAGES = 'Are you sure you want to delete these message(s)?';

    const Q_DELETE_RELATED_ITEMS = 'Delete all related items?';

    const Q_LOST_YOUR_PASSWORD = 'Lost your Password?';

    const Q_NOT_REGISTERED = 'Not registered?';

    const Q_RECEIVE_OCCASIONAL_EMAIL_NOTICES_FROM_ADMINISTRATORS = 'Receive occasional email notices <br />from administrators and moderators?';

    const Q_USE_HTML = 'Use HTML?';

    const RANDOM = 'Random';

    const RANDOM_ITEMS = 'Random items';

    const RANK = 'Rank';

    const RATING = 'Rating';

    const RATING_AND_VOTE_COUNT = 'Rating and vote count';

    const READS = 'Reads';

    const REAL_NAME = 'Real name';

    const REAL_PLAYER = 'Real Player';

    const RECENT_ITEMS = 'Recent items';

    const RECOMMEND_SITE_TO_FRIEND = 'Recommend this site to a friend';

    const REGISTERED = 'Registered';

    const REGISTERED_IN_PAST_X_DAYS = "Registered in past <span style='color:#ff0000;'>X</span>days";

    const REGISTER_NOW = 'Register now';

    const REGISTRATION_DATE = 'Registration date';

    const REJECTED = 'Rejected';

    const RELATED_ITEMS = 'Related items';

    const REMEMBER_ME = 'Remember me';

    const REMOVE_UNSELECTED_USERS = 'Remove unselected users';

    const REPLIES = 'Replies';

    const REPLY = 'Reply';

    const REQUIRED = 'Required';

    const RESIZED_IMAGE = 'Resized image';

    const RESULT = 'Result';

    const RETYPE_PASSWORD = 'Retype password';

    const RIGHT = 'Right';

    const RTSP_URL = 'RTSP URL';

    const SAVE_CHANGES = 'Save changes';

    const SEARCH = 'Search';

    const SEARCH_AGAIN = 'Search again';

    const SEARCH_IN = 'Search in';

    const SEARCH_RESULTS = 'Search results';

    const SEARCH_RULE = 'Search rule';

    const SEARCH_USERS = 'Search users';

    const SECTION = 'Section';

    const SELECT = 'Select';

    const SELECT_CATEGORY = 'Select category';

    const SELECT_DATE = 'Select date';

    const SELECT_FILE = 'Select file';

    const SELECT_MODULE = 'Select module';

    const SELECT_TEMPLATES = 'Select templates';

    const SELECT_THEME = 'Select theme';

    const SEND_EMAIL = 'Send email';

    const SEND_PASSWORD = 'Send password';

    const SENT = 'Sent';

    const SERVICES = 'Services';

    const SETTINGS = 'Settings';

    const SF_DATA_INSERTED_TO_TABLE = "Data inserted to table '%s'!";

    const SF_EMAIL_SENT_TO = 'Email sent to %s!';

    const SF_ENTRIES_INSERTED_TO_TABLE = "%d entries inserted to table '%s'!"; // L119

    const SF_EXECUTED = '%s executed successfully.';

    const SF_EXTENSION_IS_INSTALLED = "The extension '%s' is installed";

    const SF_FOLDER_EXISTS = "The folder '%s' exists!";

    const SF_FOUND_MATCHES = 'Found <strong>%s</strong> match(es)';

    const SF_INSTALLED = "'%s' was installed successfully.";

    const SF_NOTIFICATION_EMAIL_SENT_TO = 'Notification email sent to %s!';

    const SF_PASSWORD_SENT_TO = 'Password sent to %s!';

    const SF_PRIVATE_MESSAGE_SENT_TO = 'Private message sent to %s!';

    const SF_SAVED = '%s saved';

    const SF_SERVICE_IS_INSTALLED = "A '%s' service provider is available.";

    const SF_TABLE_CREATED = "Table '%s' created!"; // L45

    const SF_TABLE_DROPPED = "Table '%s' dropped!"; // L163

    const SF_TABLE_UPDATED = "Table '%s' updated!"; // L133

    const SF_THANK_YOU_FOR_LOGGING_IN = 'Thank you for logging in, %s!';

    const SF_UNINSTALLED = "'%s' was uninstalled successfully.";

    const SF_UPDATED = "'%s' was updated successfully.";

    const SHORT_TEXT = 'Short text';

    const SHOW_ALL = 'Show all';

    const SHOW_ALL_RESULTS = 'Show all results';

    const SIDE = 'Side';

    const SIGNATURE = 'Signature';

    const SIMPLE_MODE = 'Simple mode';

    const SIZE = 'Size';

    const SMILIES = 'Smilies';

    const SMILIE_CODE = 'Smilie code';

    const SMILIE_DESCRIPTION = 'Smilie description';

    const SOUNDCLOUD = 'SoundCloud';

    const SOUNDCLOUD_URL = 'Enter SoundCloud Profile URL';

    const SORT_BY = 'Sort by';

    const SOURCE_CODE = 'Source code';

    const STARTING_WITH_HTTP_OR_HTTPS = 'Starting with http or https';

    const STARTS_WITH = 'Starts with';

    const STATISTICS = 'Statistics';

    const STATUS = 'Status';

    const SUBJECT = 'Subject';

    const SUBMITTED = 'Submitted';

    const SUCCESS = 'Success';

    const SUMMARY = 'Summary';

    const S_ACTION_EXECUTED = 'Action executed successfully!';

    const S_DATABASE_UPDATED = 'Database updated successfully!';

    const S_DATA_INSERTED = 'Data inserted successfully!';

    const S_DATA_UPDATED = 'Data updated!';

    const S_DONE = 'Done!';

    const S_ITEM_SAVED = 'Item saved successfully!';

    const S_MESSAGED_HAS_BEEN_POSTED = 'Your message has been posted!';

    const S_REFERENCE_TO_SITE_SENT = 'The reference to our site has been sent to your friend. Thanks!';

    const S_THANK_YOU_FOR_POSTING = 'Thanks for your posting!';

    const S_THANK_YOU_FOR_VISITING_OUR_SITE = 'Thank you for visiting our site!';

    const S_USERS_ADDED = 'Users have been added!';

    const S_YOUR_ACCOUNT_ACTIVATED = 'Your account has been activated!';

    const S_YOUR_ACCOUNT_DELETED = 'Your account has been deleted!';

    const S_YOUR_MESSAGES_DELETED = 'Your message(s) has been deleted!';

    const S_YOUR_PROFILE_UPDATED = 'Your profile has been updated!';

    const S_YOU_ARE_NOW_LOGGED_OUT = 'You are now logged out';

    const S_YOU_ARE_NOW_REGISTERED = 'You are now registered.';

    const TABLE = 'Table';

    const TABLES = 'Tables';

    const TAG = 'Tag';

    const TAGS = 'Tags';

    const TEMPLATES = 'Templates';

    const TEXT = 'Text';

    const THEMES = 'Themes';

    const THIS_WILL_REMOVE_ALL_YOUR_INFO = 'This will remove all your info from our database!';

    const THREAD = 'Thread';

    const THREADED = 'Threaded';

    const TIMERS = 'Timers';

    const TIME_FORMAT = 'Time format';

    const TIME_ZONE = 'Time zone';

    const TIPS = 'Tips';

    const TITLE = 'Title';

    const TITLE_LENGTH = 'Title length';

    const TO = 'To';

    const TODAY = 'Today';

    const TOGGLE_FIRST_DAY_OF_WEEK = 'Toggle first day of week';

    const TOP = 'Top';

    const TOP_ITEMS = 'Top items';

    const TOP_PAGE = 'Top page';

    const TOP_RATED_ITEMS = 'Top rated items';

    const TOTAL = 'Total';

    const TOTALS = 'Totals';

    const TYPE = 'Type';

    const TYPES = 'Types';

    const TYPE_NEW_PASSWORD_TWICE_TO_CHANGE_IT = '(type a new password twice to change it)';

    const TYPE_OF_USERS_TO_SHOW = 'Type of users to show';

    const UNASSIGNED = 'Unassigned';

    const UNDERLINE = 'Underline';

    const UNKNOWN = 'Unknown';

    const UPDATED = 'Updated';

    const UPDATE_DATE = 'Update the date';

    const UPDATE_NOW = 'Update now';

    const UPDATE_OPTIONS = 'Update options';

    const URL = 'URL';

    const URL_CONTAINS = 'URL contains';

    const USER = 'User';

    const USERNAME = 'Username';

    const USERS = 'Users';

    const USER_GROUPS = "User's groups";

    const USER_LOGIN = 'User login';

    const USER_NAME = 'User name';

    const USER_REGISTRATION = 'User registration';

    const VERIFY_PASSWORD = 'Verify password';

    const VERSION = 'Version';

    const VERTICAL = 'Vertical';

    const VIEW_ACCOUNT = 'View account';

    const VISIBLE = 'Visible';

    const VISIBLE_IN = 'Visible in';

    const VISIT_WEBSITE = 'Visit website';

    const VOTE = 'Vote';

    const VOTES = 'Votes';

    const WARNING = 'Warning';

    //const WEBMASTERS = "Webmasters";
    const WEBSITE = 'Website';

    const WEB_URL = 'Web URL';

    const WEIGHT = 'Weight';

    const WELCOME = 'Welcome';

    const WHO_IS_ONLINE = "Who's online";

    const WIDTH = 'Width';

    const WIKI = 'WIKI link';

    const WIKI_WORD_TO_LINK = 'The word to be linked to Wiki';

    const WMP = 'WMP';

    const WMP_URL = 'WMP URL';

    const YES = 'Yes';

    const YIM = 'YIM';

    const YOUTUBE = 'Youtube';

    const YOUTUBE_URL = 'Youtube URL';
}
