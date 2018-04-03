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
    public const ABOUT = 'About';

    public const ACTION = 'Action';

    public const ACTIONS = 'Actions';

    public const ACTIVE = 'Active';

    public const ADD_SELECTED_USERS = 'Add selected users';

    public const ADMIN = 'Admin';

    public const ADMINISTRATION = 'Administration';

    public const ADVANCED = 'Advanced';

    public const ADVANCED_MODE = 'Advanced mode';

    public const ADVANCED_SEARCH = 'Advanced search';

    public const AFTER = 'After';

    public const AIM = 'AIM';

    public const ALIGNMENT = 'Alignment';

    public const ALL = 'All';

    public const ALLOWED_MAX_CHARS_LENGTH = 'Allowed max chars length';

    public const ALLOW_OTHER_USERS_TO_VIEW_EMAIL = 'Allow other users to view my email address';

    public const ALL_AND = 'All (AND)';

    public const ALL_GROUPS = 'All groups';

    public const ALL_MODULES = 'All modules';

    public const ALL_PAGES = 'All pages';

    public const ALL_TYPES = 'All types';

    public const ALL_USERS = 'All users';

    public const ALWAYS_ATTACH_MY_SIGNATURE = 'Always attach my signature';

    public const ANONYMOUS = 'Anonymous';

    public const ANY_OR = 'Any (OR)';

    public const ANY_STATUS = 'Any status';

    public const APPROVED = 'Approved';

    public const ARCHIVE = 'Archive';

    public const ASCENDING = 'Ascending';

    public const ASCENDING_ORDER = 'Ascending order';

    public const AUTHOR = 'Author';

    public const AVATAR = 'Avatar';

    public const A_ADD = 'Add';

    public const A_ALIGN = 'Align';

    public const A_ANALYZE = 'Analyze';

    public const A_APPEND = 'Append';

    public const A_BACK = 'Back';

    public const A_CANCEL = 'Cancel';

    public const A_CHANGE = 'Change';

    public const A_CHECK = 'Check';

    public const A_CLEAR = 'Clear';

    public const A_CLONE = 'Clone';

    public const A_CLOSE = 'Close';

    public const A_COLLAPSE = 'Collapse';

    public const A_DELETE = 'Delete';

    public const A_DETAIL = 'Detail';

    public const A_DISABLE = 'Disable';

    public const A_DISPLAY = 'Display';

    public const A_EDIT = 'Edit';

    public const A_ENABLE = 'Enable';

    public const A_EXPAND = 'Expand';

    public const A_EXPORT = 'Export';

    public const A_FINISH = 'Finish';

    public const A_GO = 'Go';

    public const A_HIDE = 'Hide';

    public const A_IMPORT = 'Import';

    public const A_INSTALL = 'Install';

    public const A_LOGIN = 'Login';

    public const A_LOGOUT = 'Logout';

    public const A_MANAGE = 'Manage';

    public const A_MODIFY = 'Modify';

    public const A_OPTIMIZE = 'Optimize';

    public const A_POST = 'Post';

    public const A_PREPEND = 'Prepend';

    public const A_PREVIEW = 'Preview';

    public const A_PRINT = 'Print';

    public const A_PRUNE = 'Prune';

    public const A_PUBLISH = 'Publish';

    public const A_PURGE = 'Purge';

    public const A_QUOTE = 'Quote';

    public const A_REFRESH = 'Refresh';

    public const A_REGISTER = 'Register';

    public const A_REMOVE = 'Remove';

    public const A_REPAIR = 'Repair';

    public const A_REPLY = 'Reply';

    public const A_REPORT = 'Report';

    public const A_RESET = 'Reset';

    public const A_RESTORE = 'Restore';

    public const A_SAVE = 'Save';

    public const A_SEARCH = 'Search';

    public const A_SELECT = 'Select';

    public const A_SEND = 'Send';

    public const A_SHOW = 'Show';

    public const A_SUBMIT = 'Submit';

    public const A_SYNCHRONIZE = 'Synchronize';

    public const A_TAG = 'Tag';

    public const A_UNINSTALL = 'Uninstall';

    public const A_UPDATE = 'Update';

    public const A_UPLOAD = 'Upload';

    public const BACK_TO_TOP = 'Back to top';

    public const BASIC = 'Basic';

    public const BASIC_INFORMATION = 'Basic information';

    public const BEFORE = 'Before';

    public const BLOCKS = 'Blocks';

    public const BODY = 'Body';

    public const BOLD = 'Bold';

    public const BOOKMARK = 'Bookmark';

    public const BOTH = 'Both';

    public const BOTTOM = 'Bottom';

    public const BREADCRUMB = 'Breadcrumb';

    public const CACHED = 'Cached';

    public const CANCEL_SEND = 'Cancel send';

    public const CAPTION = 'Caption';

    public const CATEGORIES = 'Categories';

    public const CATEGORY = 'Category';

    public const CENTER = 'Center';

    public const CF_FOLLOWING_WORDS_SHORTER_THAN_NOT_INCLUDED = 'The following words are shorter than allowed minimum length (%u chars) and were not included in your search:';

    public const CF_WROTE = '%s wrote:';

    public const CHANGE_LOG = 'Change log';

    public const CHANGE_STATUS = 'Change status';

    public const CHARSET = 'Charset';

    public const CHARSETS = 'Charsets';

    public const CHECK_ALL = 'Check all';

    public const CHECK_TEXT_LENGTH = 'Check text length';

    public const CLICK_A_SMILIE_TO_INSERT_INTO_MESSAGE = 'Click a smilie to insert it into your message.';

    public const CLICK_HERE_TO_REGISTER = "Click <a href='register.php'>here</a>.";

    public const CLICK_HERE_TO_VIEW_YOU_PRIVATE_MESSAGES = 'You can click here to view your private messages';

    public const CLICK_PREVIEW_TO_SEE_CONTENT = 'Click the <strong>Preview</strong> to see the content in action.';

    public const CLICK_TO_REFRESH_IMAGE_IF_NOT_CLEAR = 'Click to refresh the image if it is not clear enough.';

    public const CLICK_TO_SEE_ORIGINAL_IMAGE_IN_NEW_WINDOW = 'Click to see original image in a new window';

    public const CLOSE_WINDOW = 'Close window';

    public const CODE = 'Code';

    public const CODE_IS_CASE_INSENSITIVE = 'The code is case-insensitive';

    public const CODE_IS_CASE_SENSITIVE = 'The code is case-sensitive';

    public const COLOR = 'Color';

    public const COMMENTS = 'Comments';

    public const COMMENTS_COUNT = 'Comments count';

    public const COMMENTS_POSTS = 'Comments/Posts';

    public const CONFIGURATION_CHECK = 'Configuration check';

    public const CONFIRMATION_CODE = 'Confirmation code';

    public const CONTAINS = 'Contains';

    public const CONTENT = 'Content';

    public const CREDITS = 'Credits';

    public const C_AUTHOR = 'Author:';

    public const C_DESCRIPTION = 'Description:';

    public const C_ERRORS = 'Error(s):';

    public const C_FRIEND_EMAIL = 'Friend email:';

    public const C_FRIEND_NAME = 'Friend name:';

    public const C_FROM = 'From:';

    public const C_LAST_UPDATE = 'Last update:';

    public const C_LICENSE = 'License:';

    public const C_MODULES = 'Modules:';

    public const C_NAME = 'Name:';

    public const C_PASSWORD = 'Password:';

    public const C_QUOTE = 'Quote:';

    public const C_RE = 'Re:';

    public const C_SENT = 'Sent:';

    public const C_TO = 'To:';

    public const C_UPDATE_DATE = 'Update date:';

    public const C_USERNAME = 'Username:';

    public const C_VALUE = 'Value:';

    public const C_VERSION = 'Version:';

    public const C_WEBSITE = 'Website:';

    public const C_YOUR_EMAIL = 'Your email:';

    public const C_YOUR_NAME = 'Your name:';

    public const DATE = 'Date';

    public const DATE_FORMAT = 'Date format';

    public const DEBUG = 'Debug';

    public const DELETE_ACCOUNT = 'Delete account';

    public const DELETE_ALL = 'Delete all';

    public const DESCENDING = 'Descending';

    public const DESCENDING_ORDER = 'Descending order';

    public const DESCRIPTION = 'Description';

    public const DETAILS = 'Details';

    public const DISABLED = 'Disabled';

    public const DISABLE_HTML = 'Disable html';

    public const DISABLE_SMILIE = 'Disable smilie';

    public const DISCLAIMER = 'Disclaimer';

    public const DISPLAY_ALL_ITEMS = 'Display all items';

    public const DISPLAY_IN_FORM = 'Display in form';

    public const DISPLAY_MONDAY_FIRST = 'Display monday first';

    public const DISPLAY_OPTIONS = 'Display options';

    public const DISPLAY_ORDER = 'Display order';

    public const DISPLAY_RANDOM_ITEMS = 'Display random items';

    public const DISPLAY_RECENT_ITEMS = 'Display recent items';

    public const DISPLAY_SUNDAY_FIRST = 'Display sunday first';

    public const DISPLAY_THIS_ITEM = 'Display this item';

    public const DISPLAY_TOP_ITEMS = 'Display top items';

    public const DISPLAY_TOP_RATED_ITEMS = 'Display top rated items';

    public const DO_NOT_DISPLAY_IN_FORM = "Don't display in form";

    public const DRAG_TO_MOVE = 'Drag to move';

    public const EDITOR = 'Editor';

    public const EDIT_ACCOUNT = 'Edit account';

    public const EDIT_PROFILE = 'Edit profile';

    public const EF_CLASS_NOT_FOUND = "Class '%s' was not found!";

    public const EF_CORRESPONDING_USER_NOT_FOUND_IN_DATABASE = 'No corresponding user information has been found in the XOOPS database for connection: %s!';

    public const EF_DATABASE_ERROR = 'Database error: %s';

    public const EF_DATABASE_NOT_SUPPORTED = 'This module does not support the current database platform (%s)';

    public const EF_DIRECTORY_EXISTS = "Directory '%s' exists on your server!";

    public const EF_DIRECTORY_NOT_OPENED = "Directory '%s' was not opened!";

    public const EF_DIRECTORY_WITH_WRITE_PERMISSION_NOT_OPENED = "Directory with write permission '%s' was not opened!";

    public const EF_EMAIL_ALREADY_EXISTS = "User email '%s' already exists!";

    public const EF_EMAIL_NOT_SENT_TO = "Email was not sent to '%s'!";

    public const EF_ENTRIES_NOT_INSERTED_TO_TABLE = "Failed inserting %d entries to table '%s'!"; // L120

    public const EF_ENTRY_NOT_READ = "Entry '%s' was not read!";

    public const EF_ERRORS_RETURNED_WHILE_UPLOADING_FILE = 'Errors returned while uploading file: %s';

    public const EF_EXTENSION_IS_NOT_INSTALLED = "The extension '%s' isn't installed!";

    public const EF_FILE_HEIGHT_TO_LARGE = 'File height too large (Maximum %u px): %u px!';

    public const EF_FILE_IS_WRITABLE = "File '%s' is writable by the server!";

    public const EF_FILE_MIME_TYPE_NOT_ALLOWED = "File of mime type '%s' is not allowed!";

    public const EF_FILE_MUST_BE_WRITABLE = "File '%s' must be writable by the server!";

    public const EF_FILE_NOT_FOUND = "File '%s' was not found!";

    public const EF_FILE_NOT_SAVED_TO = "File not saved to '%s'!";

    public const EF_FILE_NOT_UPLOADED = "File '%s' was not uploaded!";

    public const EF_FILE_SIZE_TO_LARGE = 'File size too large (Maximum %u bytes): %u bytes!';

    public const EF_FILE_WIDTH_TO_LARGE = 'File width too large (Maximum %u px): %u px!';

    public const EF_FOLDER_DOES_NOT_EXIST = "Folder '%s' does not exist!";

    public const EF_FOLDER_IS_INSIDE_DOCUMENT_ROOT = "Folder '%s' is inside DocumentRoot!";

    public const EF_FOLDER_MUST_BE_WITH_CHMOD = "Folder '%s' must be with a chmod '%s' (it's now set on %s)!";

    public const EF_FOLDER_NOT_WRITABLE = "Folder '%s' is not writable by the server!";

    public const EF_IMAGE_SIZE_NOT_FETCHED = "'%s' image size was not fetched, skipping max dimension check...";

    public const EF_INVALID_SQL = "SQL '%s' is invalid!";

    public const EF_KEYWORDS_MUST_BE_GREATER_THAN = 'Keywords must be at least <strong>%s</strong> characters long!';

    public const EF_LOGGER_FILELINE = '%s in file %s line %s';

    public const EF_MODULE_NOTFOUND = 'Please install or reactivate %1$s module. Minimum version required: %2$s';

    public const EF_MODULE_VERSION = 'Minimum %1$s module version required: %2$s (your version is %3$s)';

    public const EF_NOTIFICATION_EMAIL_NOT_SENT_TO = "Notification email was not sent to '%s'!";

    public const EF_NOT_CREATED = "'%s' was not created!";

    public const EF_NOT_DELETED = "'%s' was not deleted!";

    public const EF_NOT_EXECUTED = "'%s' was not executed!";

    public const EF_NOT_INSERTED_TO_DATABASE = "'%s' was not inserted to database!";

    public const EF_NOT_INSTALLED = "'%s' was not installed!";

    public const EF_NOT_UNINSTALLED = "'%s' was not uninstalled!";

    public const EF_NOT_UPDATED = "'%s' was not updated!";

    public const EF_PASSWORD_MUST_BE_GREATER_THAN = "Your password must be at least '%s' characters long!";

    public const EF_PRIVATE_MESSAGE_NOT_SENT_TO = "Private message was not sent to '%s'!";

    public const EF_SERVICE_IS_NOT_INSTALLED = "No '%s' service provider is installed!";

    public const EF_TABLE_DROP_NOT_ALLOWED = "Table '%s' is not allowed to be dropped!";

    public const EF_TABLE_NOT_CREATED = "Table '%s' was not created!"; // L118

    public const EF_TABLE_NOT_DELETED = "Table '%s' was not deleted!"; // L164

    public const EF_TABLE_NOT_DROPPED = "Table '%s' was not dropped!";

    public const EF_TABLE_NOT_UPDATED = "Table '%s' was not updated!"; // L134

    public const EF_UNEXPECTED_ERROR = 'Unexpected error: %s';

    public const EF_USERNAME_MUST_BE_LESS_THAN = "Username is too long, it must be less than '%s' characters!";

    public const EF_USERNAME_MUST_BE_MORE_THAN = "Username is too short, it must be more than '%s' characters!";

    public const EF_USER_NAME_ALREADY_EXISTS = "User name '%s' already exists!";

    public const EF_USER_NOT_FOUND_IN_DIRECTORY_SERVER = "User '%s' not found in the directory server (%s) in %s!";

    public const EMAIL = 'Email';

    public const EMAIL_HAS_BEEN_SENT_WITH_ACTIVATION_KEY = 'An email containing an user activation key has been sent to the email account you provided. Please follow the instructions in the email to activate your account. ';

    public const EMAIL_HAS_NOT_BEEN_SENT_WITH_ACTIVATION_KEY = 'However, we were unable to send the activation email to your email account due to an internal error that had occurred on our server. We are sorry for the inconvenience, please send the webmaster an email notifying him/her of the situation.';

    public const EMAIL_PROVIDED_IS_INVALID = 'The email address you provided is not a valid address.';

    public const EMOTION = 'Emotion';

    public const ENABLE_DISABLE = 'Enable/Disable';

    public const ENABLE_HTML_TAGS = 'Enable HTML tags';

    public const ENABLE_SMILIES_ICONS = 'Enable smilies icons';

    public const ENABLE_XOOPS_CODES = 'Enable XOOPS codes';

    public const ENDS_WITH = 'Ends with';

    public const ENTER_CODE = 'Enter the codes that you want to add.';

    public const ENTER_EMAIL = 'Enter the email address you want to add.';

    public const ENTER_IMAGE_POSITION = 'Now, enter the position of the image.';

    public const ENTER_IMAGE_URL = 'Enter the URL of the image you want to add';

    public const ENTER_LINK_URL = 'Enter the URL of the link you want to add';

    public const ENTER_QUOTE = 'Enter the text that you want to be quoted.';

    public const ENTER_TEXT_BOX = 'Please input text into the text box.';

    public const ENTER_VALID_EMAIL = 'Enter a valid email address';

    public const ENTER_WEBSITE_TITLE = 'Enter the web site title';

    public const ENTER_YOUR_FRIEND_EMAIL = "Please enter your friend's email address";

    public const ENTER_YOUR_FRIEND_NAME = "Please enter your friend's name";

    public const ENTER_YOUR_NAME = 'Please enter your name';

    public const ERROR = 'Error';

    public const ERRORS = 'Errors';

    public const EVENT = 'Event';

    public const EVENTS = 'Events';

    public const EXACT_MATCH = 'Exact Match';

    public const EXAMPLE = 'Example';

    public const EXTENSIONS = 'Extensions';

    public const EXTRA = 'Extra';

    public const EXTRA_INFO = 'Extra info';

    public const E_ACTIVATION_FAILED = 'Activation failed!';

    public const E_ACTIVATION_KEY_INCORRECT = 'Activation key not correct!';

    public const E_ALL_PARENT_ITEMS_MUST_BE_SELECTED = 'All parent items must be selected.';

    public const E_CANNOT_CONNECT_TO_SERVER = "Can't connect to the server!";

    public const E_CHANGE_FILE_PERMISSIONS = 'Please change the permission of this file for security reasons. In Unix (444), in Win32 (read-only)';

    public const E_CHANGE_FOLDER_PERMISSIONS = 'Please change the permission of this folder. In Unix (777), in Win32 (writable)';

    public const E_CHECK_EMAIL_AND_TRY_AGAIN = 'Please check the email address and try again!';

    public const E_CHECK_NAME_AND_TRY_AGAIN = 'Please check the name and try again!';

    public const E_COMPLETE_SUBJECT_AND_MESSAGE = 'Please complete the subject and message fields!';

    public const E_CONTACT_THE_ADMINISTRATORS_FOR_DETAILS = 'Please contact the administrator for details!';

    public const E_DATABASE_NOT_UPDATED = 'Database was not updated!';

    public const E_EMAIL_SHOULD_NOT_CONTAIN_SPACES = 'Email address should not contain spaces!';

    public const E_EMAIL_TAKEN = 'Email address is already registered!';

    public const E_ENTER_ALL_REQUIRED_DATA = 'Please enter all required data!';

    public const E_ENTER_IMAGE_POSITION = 'Enter the position of the image!';

    public const E_EXTENSION_PHP_LDAP_NOT_LOADED = 'PHP LDAP extension not loaded (verify your PHP configuration file php.ini)';

    public const E_FILE_NAME_MISSING = 'Filename is missing!';

    public const E_FILE_NOT_FOUND = 'File not found!';

    public const E_FILE_TYPE_REJECTED = "The file you're trying to upload is not supported by this site/server!";

    public const E_FROM_EMAIL_NOT_SET = 'From email is not set!';

    public const E_FROM_NAME_NOT_SET = 'From name is not set!';

    public const E_GO_BACK_AND_TRY_AGAIN = 'Please go back and try again!';

    public const E_INCORRECT_LOGIN = 'Incorrect login!';

    public const E_INVALID_CONFIRMATION_CODE = 'Invalid confirmation code!';

    public const E_INVALID_EMAIL = 'Invalid email!';

    public const E_INVALID_FILE_NAME = 'Invalid file name!';

    public const E_INVALID_FILE_SIZE = 'Invalid file size!';

    public const E_INVALID_IMAGE_FILE = 'Invalid image file!';

    public const E_INVALID_USERNAME = 'Invalid username!';

    public const E_LOADING_MIME_TYPES_DEFINITION = 'Error loading mime types definition!';

    public const E_LOGGER_ERROR = 'Error';

    public const E_LOGGER_NOTICE = 'Notice';

    public const E_LOGGER_STRICT = 'Strict';

    public const E_LOGGER_UNKNOWN = 'Unknown';

    public const E_LOGGER_WARNING = 'Warning';

    public const E_MESSAGE_BODY_NOT_SET = 'Message body is not set!';

    public const E_MESSAGE_TO_LONG = 'Your message is too long!';

    public const E_MOVE_OUT_OF_DOCUMENT_ROOT = 'For security considerations it is highly suggested to move it out of DocumentRoot!';

    public const E_MUST_PROVIDE_PASSWORD = 'You must provide a password!';

    public const E_NAME_IS_RESERVED = 'Name is reserved!';

    public const E_NOT_DONE = 'Not done!';

    public const E_NO_ACCESS_PERMISSION = "Sorry, you don't have the permission to access this area!";

    public const E_NO_ACTION_PERMISSION = 'Sorry, you do not have the permission to perform this action!';

    public const E_NO_MODULE = 'Selected module does not exist!';

    public const E_NO_PAGE = 'This page does not exist in our database';

    public const E_NO_RESULT_FOUND = 'No result found!';

    public const E_NO_USER_FOUND = 'Sorry, the user was not found!';

    public const E_NO_USER_SELECTED = 'No user selected!';

    public const E_NO_VALID_ID_DETECTED = 'No valid ID detected';

    public const E_PASSWORDS_MUST_MATCH = 'Both passwords are different. They must be identical.';

    public const E_REGISTER_FIRST_TO_SEND_PRIVATE_MESSAGES = 'Please register first to send private messages!';

    public const E_REMOVE_DIRECTORY = 'Please remove this directory for security reasons';

    public const E_SECTION_NOT_ACTIVE = 'This section is not active!';

    public const E_SELECTED_ACCOUNT_IS_ALREADY_ACTIVATED = 'Selected account is already activated!';

    public const E_SELECTED_USER_DEACTIVATED_OR_NOT_ACTIVE = 'The selected user has been deactivated or has not been activated yet.';

    public const E_SELECTED_USER_DOES_NOT_EXIST = "The selected user doesn't exist in the database.";

    public const E_SOME_ERROR_OCCURRED = 'Some error occurred!';

    public const E_SUSPICIOUS_IMAGE_UPLOAD_REFUSED = 'Suspicious image upload refused!';

    public const E_TAKING_YOU_BACK = 'Taking you back to where you were...';

    public const E_TEMPLATE_FILE_NOT_OPENED = 'Template file was not opened!';

    public const E_TLS_CONNECTION_NOT_OPENED = 'TLS connection was not opened!';

    public const E_TO_MANY_ATTEMPTS = 'Too many attempts!';

    public const E_UPLOAD_DIRECTORY_NOT_SET = 'Upload directory not set!';

    public const E_USERNAME_TAKEN = 'Username already taken!';

    public const E_USERS_NOT_FOUND = 'No users found!';

    public const E_USER_ID_NOT_FETCHED = 'User ID was not fetched!';

    public const E_USER_IN_WEBMASTER_GROUP_CANNOT_BE_REMOVED = 'User in the webmasters group cannot be removed';

    public const E_USER_NOT_REGISTERED = 'User was not registered!';

    public const E_USER_NOT_UPDATED = 'User was not updated!';

    public const E_VERIFY_USER_DATA_OR_SET_AUTOMATIC_PROVISIONING = 'Please verify your user data or set on the automatic provisioning';

    public const E_WE_ARE_CLOSED_FOR_REGISTRATION = 'Sorry, we are currently closed for new user registrations!';

    public const E_YOU_ARE_NOT_REGISTERED = 'Sorry, you are not a registered user!';

    public const E_YOU_DO_NOT_HAVE_ANY_PRIVATE_MESSAGE = 'You do not have any private messages!';

    public const E_YOU_HAVE_TO_AGREE_TO_DISCLAIMER = 'Sorry, you have to agree to our disclaimer to get registered!';

    public const E_YOU_MUST_COMPLETE_ALL_REQUIRED_FIELDS = 'You must complete all required fields';

    public const E_YOU_NEED_A_POSITIVE_INTEGER = 'You need a positive integer!';

    public const E_YOU_NEED_TO_ENTER_REQUIRED_INFO = 'You need to enter required info!';

    public const FIELD = 'Field';

    public const FIELDS = 'Fields';

    public const FILE = 'File';

    public const FILES = 'Files';

    public const FIND_USERS = 'Find users';

    public const FLASH = 'Flash';

    public const FLASH_URL = 'Flash URL';

    public const FLAT = 'Flat';

    public const FOLDER = 'Folder';

    public const FOLDERS = 'Folders';

    public const FONT = 'Font';

    public const FROM = 'From';

    public const F_ACTIVE_USERS = 'Active users: %s';

    public const F_ALL_ABOUT = 'All about %s';

    public const F_AUTHORIZED_MIME_TYPES = 'Authorized mime types: %s';

    public const F_CLICK_HERE = "Click <a href='%s'>here</a>.";

    public const F_CONFIRMATION_EMAIL_SENT = 'Confirmation email for %s mailed.';

    public const F_CURRENT_TEXT_LENGTH = 'Current text length: %s';

    public const F_DAYS = '%s days';

    public const F_DELETED = '%s deleted';

    public const F_DISABLE = 'Disable %s';

    public const F_ENTER = 'Please enter %s';

    public const F_ERROR = 'Error:<br /><br /> %s';

    public const F_FILES = '%s files';

    public const F_FILE_EXISTS_IN = 'File exists in: %s';

    public const F_HAS_JUST_REGISTERED = '%s has just registered!';

    public const F_HOURS = '%s hours';

    public const F_IF_PAGE_NOT_RELOAD_CLICK_HERE = "If the page does not automatically reload, please click <a href='%s'>here</a>";

    public const F_INACTIVE_USERS = 'Inactive users: %s';

    public const F_INTERESTING_SITE = 'Interesting site: %s';

    public const F_IN_FILE_LINE = '%s in file %s line %s';

    public const F_IS_REQUIRED = '%s is required';

    public const F_KEYWORDS_SHORTER_THAN_WILL_BE_IGNORED = 'Keywords shorter than <strong>%s</strong> characters will be ignored';

    public const F_MAXIMUM_ATTEMPTS = 'Maximum attempts you can try: %d';

    public const F_MAX_PIXELS_WIDTH_HEIGHT = 'Max Pixels: %s x %s (width x height)';

    public const F_MAX_UPLOAD_FILES_SIZE_ALLOWED_KB = 'Max uploaded files size: %s [KB]';

    public const F_MINIMUM_DATABASE_VERSION_REQUIRED = 'Minimum version required: %s (your version is %s)';

    public const F_MINIMUM_PHP_VERSION_REQUIRED = 'Minimum PHP required: %s (your version is %s)';

    public const F_MINIMUM_XOOPS_VERSION_REQUIRED = 'Minimum XOOPS required: %s (your version is %s)';

    public const F_MINUTES = '%s minutes';

    public const F_MODULE_IS_INSTALLED = "The module '%s' is installed";

    public const F_MODULE_IS_NOT_INSTALLED = "The module '%s' isn't installed";

    public const F_MUST_BE_SHORTER_THAN = '%s must be shorter than %d characters.';

    public const F_NEW_PASSWORD_REQUEST_AT = 'New password request at %s';

    public const F_NEW_USER_REGISTRATION_AT = 'New user registration at %s';

    public const F_NO_DELETE_ONLY_THIS = 'No, delete only this %s';

    public const F_OPTIONS = '%s options';

    public const F_POSTED_BY = 'Posted by %s';

    public const F_READS = '(%s reads)';

    public const F_RULES = '%s rules';

    public const F_SECONDS = '%s seconds';

    public const F_SEND_EMAIL_TO = 'Send email to %s';

    public const F_SEND_PRIVATE_MESSAGE_TO = 'Send private message to %s';

    public const F_SHOWING_RESULTS = '(Showing %d - %d)';

    //const F_TIME_FORMAT_DESCRIPTION = "Valid formats: 's' - %s; 'm' - %s; 'l' - %s;<br />'c' or 'custom' - format determined according to interval to present; 'e' - Elapsed; 'mysql' - Y-m-d H:i:s;<br />specified object - Refer to <a href='http://php.net/manual/en/function.date.php' rel='external'>PHP manual</a>.";
    public const F_TOOK_SECONDS_TO_LOAD = '%s took %s seconds to load.';

    public const F_USERS_BROWSING = '<strong>%s</strong> user(s) are browsing <strong>%s</strong>';

    public const F_USERS_FOUND = '%s user(s) found';

    public const F_USERS_ONLINE = '<strong>%s</strong> user(s) are online';

    public const F_USER_ACTIVATION_KEY_FOR = 'User activation key for %s';

    public const F_USING_AUTHENTICATION_METHOD = 'Using %s authentication method';

    public const F_WELCOME_TO = 'Welcome to %s';

    public const F_YES_DELETE_ALL = 'Yes, delete all %s';

    public const F_YOUR_ACCOUNT_AT = 'Your account at %s';

    public const F_EXTENSION_PHP_NOT_LOADED = 'PHP %s extension not loaded (verify your PHP configuration file php.ini)';

    public const GO_BACK = 'Go back';

    public const GO_TO = 'Go to';

    public const GO_TODAY = 'Go today';

    public const GROUP = 'Group';

    public const GROUPS = 'Groups';

    public const GUESTS = 'Guests';

    public const HAS_AVATAR = 'Has avatar';

    public const HEIGHT = 'Height';

    public const HELP = 'Help';

    public const HIDDEN = 'Hidden';

    public const HITS = 'Hits';

    public const HOME = 'Home';

    public const HOME_PAGE = 'Home page';

    public const HORIZONTAL = 'Horizontal';

    public const HTML = 'HTML';

    public const ICONS = 'Icons';

    public const ICQ = 'ICQ';

    public const ID = 'ID';

    public const IMAGE = 'Image';

    public const IMAGES = 'Images';

    public const IMAGE_FILE = 'Image file';

    public const IMAGE_POSITION_DESCRIPTION = " 'R' or 'r' for right, 'L' or 'l' for left, or leave it blank.";

    public const IMAGE_URL = 'Image url';

    public const INACTIVE = 'Inactive';

    public const INBOX = 'Inbox';

    public const INDEX = 'Index';

    public const INFO = 'Info';

    public const INFORMATION = 'Information';

    public const INFORMATION_FOR_UPLOADS = 'Information for uploads';

    public const INPUT_LETTERS_IN_THE_IMAGE = 'Input letters in the image';

    public const INPUT_RESULT_FROM_EXPRESSION = 'Input the result from the expression';

    public const INSIDE_IMAGE = 'Inside images';

    public const INTEREST = 'Interest';

    public const INTEREST_CONTAINS = 'Interest contains';

    public const IP = 'IP';

    public const ITALIC = 'Italic';

    public const ITEMS = 'Items';

    public const ITEMS_TO_DISPLAY = 'Items to display';

    public const ITEM_ID = 'Item ID';

    public const ITEM_NAME = 'Item name';

    public const I_AGREE_TO_THE_ABOVE = 'I agree to the above';

    public const KEYWORD = 'Keyword';

    public const KEYWORDS = 'Keywords';

    public const LANGUAGE = 'Language';

    public const LANGUAGES = 'Languages';

    public const LAST_LOGIN = 'Last login';

    public const LEFT = 'Left';

    public const LEVEL = 'Level';

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
    public const LICENCE = 'Licence';

    public const LINE_THROUGH = 'Line through';

    public const LINKS = 'Links';

    public const LIST_ = 'List';

    public const LOADING = 'Loading...';

    public const LOCATION = 'Location';

    public const LOCATION_CONTAINS = 'Location contains';

    public const LOGGED_IN_PAST_X_DAYS = "Logged in past <span style='color:#ff0000;'>X</span>days";

    public const LOGIN_WITH_REGISTERED_PASSWORD = 'Please login with the registered password.';

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
    public const MAIN = 'Main';

    public const MAKE_PDF_FROM_THIS_PAGE = 'Make a PDF from this page';

    public const MANAGE_EXTENSIONS = 'Manage extensions';

    public const MANAGE_MODULES = 'Manage modules';

    public const MANUAL = 'Manual';

    public const MATCHES = 'Matches';

    public const MAXIMUM_LENGTH = 'Maximum length';

    public const MAX_HEIGHT = 'Max height';

    public const MAX_IMAGE_SIZE_BYTES = 'Max Image Size (Bytes)';

    public const MAX_PIXELS = 'Max Pixels';

    public const MAX_SIZE = 'Max size';

    public const MAX_WIDTH = 'Max width';

    public const MEMBERS = 'Members';

    public const MEMBER_SINCE = 'Member since';

    public const MESSAGE = 'Message';

    public const MESSAGE_ICON = 'Message icon';

    public const METHOD = 'Method';

    public const MMS = 'MMS';

    public const MMS_URL = 'MMS URL';

    public const MODULE = 'Module';

    public const MODULES = 'Modules';

    public const MODULE_INFORMATION = 'Module information';

    public const MORE = 'More...';

    public const MORE_ABOUT_ME = 'More about me';

    public const MORE_DETAILS = 'More details';

    public const MP3 = 'MP3';

    public const MP3_URL = 'MP3 URL';

    public const MSNM = 'MSNM';

    public const MY_INFORMATION = 'My information';

    public const NAME = 'Name';

    public const NAME_NOT_AVAILABLE = 'Name not available';

    public const NESTED = 'Nested';

    public const NEWEST_FIRST = 'Newest first';

    public const NEXT = 'Next';

    public const NEXT_MESSAGE = 'Next message';

    public const NEXT_MONTH = 'Next month';

    public const NEXT_YEAR = 'Next year';

    public const NO = 'No';

    public const NONE = 'None';

    public const NOTIFICATIONS = 'Notifications';

    public const NOT_CACHED = 'Not cached';

    public const NOT_READ = 'Not read';

    public const NO_CACHE = 'No cache';

    public const NO_COMMENTS = 'No comments';

    public const NO_FILE_UPLOADED = 'No file uploaded';

    public const NO_MATCH_FOUND_FOR_QUERY = 'No match found for your query';

    public const NO_PROBLEM_ENTER_EMAIL_WE_HAVE_ON_FILE = 'No problem. Simply enter the e-mail address we have on file for your account.';

    public const NO_TITLE = 'No title';

    public const NUMBER_OF_ITEMS_PER_PAGE_IN_ADMIN_SIDE = 'Number of items to display per page in admin side';

    public const NUMBER_OF_ITEMS_PER_PAGE_IN_USER_SIDE = 'Number of items to display per page in user side';

    public const NUMBER_OF_POSTS = 'Number of posts';

    public const NUMBER_OF_RESULTS_PER_PAGE = 'Number of results per page';

    public const OCCUPATION = 'Occupation';

    public const OCCUPATION_CONTAINS = 'Occupation contains';

    public const OFF = 'Off';

    public const OFFLINE = 'Offline';

    public const OLDEST_FIRST = 'Oldest first';

    public const ON = 'On';

    public const ONE_DAY = '1 day';

    public const ONE_HOUR = '1 hour';

    public const ONE_MINUTE = '1 minute';

    public const ONE_MONTH = '1 month';

    public const ONE_SECOND = '1 second';

    public const ONE_WEEK = '1 week';

    public const ONLINE = 'Online';

    public const ONLY_USERS_THAT_ACCEPT_EMAIL = 'Only users that accept email';

    public const ONLY_USERS_THAT_DO_NOT_ACCEPT_EMAIL = "Only users that don't accept email";

    public const OPTIONAL = 'Optional';

    public const OPTIONS = 'Options';

    public const ORDER = 'Order';

    public const ORDER_BY = 'Order by';

    public const ORIGINAL_IMAGE = 'Original image';

    public const OR_CLICK_HERE_TO_CLOSE_WINDOW = 'Or click here to close this window.';

    public const PAGE = 'Page';

    public const PARENT = 'Parent';

    public const PASSWORD = 'Password';

    public const PASSWORD_STRENGTH = 'Password strength';

    public const PASTE_THE_CODE_YOU_WANT_TO_INSERT = 'Paste the CODE you want to insert';

    public const PASTE_THE_QUOTE_YOU_WANT_TO_INSERT = 'Paste the QUOTE you want to insert';

    public const PENDING = 'Pending';

    public const PERMISSIONS = 'Permissions';

    public const PLEASE_WAIT_FOR_ACCOUNT_ACTIVATION = 'Please wait for your account to be activated by the administrators. You will receive an email once you are activated. This could take a while so please be patient.';

    public const PM = 'PM';

    public const POSITION = 'Position';

    public const POSITION_CONTAINS = 'Position contains';

    public const POST = 'Post';

    public const POSTED_BY = 'Posted by';

    public const POSTS = 'Posts';

    public const POST_ANONYMOUSLY = 'Post anonymously';

    public const PREFERENCES = 'Preferences';

    public const PRESS_BUTTON_BELLOW_TO_LOGIN = 'Press the button below to login';

    public const PREVIEW = 'Preview';

    public const PREVIOUS = 'Previous';

    public const PREVIOUS_MESSAGE = 'Previous message';

    public const PREVIOUS_MONTH = 'Previous month';

    public const PREVIOUS_YEAR = 'Previous year';

    public const PRINT_ICON = 'Print icon';

    public const PRINT_THIS_PAGE = 'Print this page';

    public const PRIVATE_MESSAGE = 'Private message';

    public const PRIVATE_MESSAGES = 'Private messages';

    public const PROFILE = 'Profile';

    public const PUBLISHED = 'Published'; // Posted date

    public const QUERIES = 'Queries';

    public const QUERY = 'Query';

    public const QUERY_MODE = 'Query mode';

    public const QUICK_ACCESS = 'Quick access';

    public const QUOTE = 'Quote';

    public const Q_ARE_YOU_SURE = 'Are you sure?';

    public const Q_ARE_YOU_SURE_TO_DELETE_ACCOUNT = 'Are you sure to delete your account?';

    public const Q_ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_ITEM = 'Are you sure you want to delete this item?';

    public const Q_ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_MESSAGES = 'Are you sure you want to delete these message(s)?';

    public const Q_DELETE_RELATED_ITEMS = 'Delete all related items?';

    public const Q_LOST_YOUR_PASSWORD = 'Lost your Password?';

    public const Q_NOT_REGISTERED = 'Not registered?';

    public const Q_RECEIVE_OCCASIONAL_EMAIL_NOTICES_FROM_ADMINISTRATORS = 'Receive occasional email notices <br />from administrators and moderators?';

    public const Q_USE_HTML = 'Use HTML?';

    public const RANDOM = 'Random';

    public const RANDOM_ITEMS = 'Random items';

    public const RANK = 'Rank';

    public const RATING = 'Rating';

    public const RATING_AND_VOTE_COUNT = 'Rating and vote count';

    public const READS = 'Reads';

    public const REAL_NAME = 'Real name';

    public const REAL_PLAYER = 'Real Player';

    public const RECENT_ITEMS = 'Recent items';

    public const RECOMMEND_SITE_TO_FRIEND = 'Recommend this site to a friend';

    public const REGISTERED = 'Registered';

    public const REGISTERED_IN_PAST_X_DAYS = "Registered in past <span style='color:#ff0000;'>X</span>days";

    public const REGISTER_NOW = 'Register now';

    public const REGISTRATION_DATE = 'Registration date';

    public const REJECTED = 'Rejected';

    public const RELATED_ITEMS = 'Related items';

    public const REMEMBER_ME = 'Remember me';

    public const REMOVE_UNSELECTED_USERS = 'Remove unselected users';

    public const REPLIES = 'Replies';

    public const REPLY = 'Reply';

    public const REQUIRED = 'Required';

    public const RESIZED_IMAGE = 'Resized image';

    public const RESULT = 'Result';

    public const RETYPE_PASSWORD = 'Retype password';

    public const RIGHT = 'Right';

    public const RTSP_URL = 'RTSP URL';

    public const SAVE_CHANGES = 'Save changes';

    public const SEARCH = 'Search';

    public const SEARCH_AGAIN = 'Search again';

    public const SEARCH_IN = 'Search in';

    public const SEARCH_RESULTS = 'Search results';

    public const SEARCH_RULE = 'Search rule';

    public const SEARCH_USERS = 'Search users';

    public const SECTION = 'Section';

    public const SELECT = 'Select';

    public const SELECT_CATEGORY = 'Select category';

    public const SELECT_DATE = 'Select date';

    public const SELECT_FILE = 'Select file';

    public const SELECT_MODULE = 'Select module';

    public const SELECT_TEMPLATES = 'Select templates';

    public const SELECT_THEME = 'Select theme';

    public const SEND_EMAIL = 'Send email';

    public const SEND_PASSWORD = 'Send password';

    public const SENT = 'Sent';

    public const SERVICES = 'Services';

    public const SETTINGS = 'Settings';

    public const SF_DATA_INSERTED_TO_TABLE = "Data inserted to table '%s'!";

    public const SF_EMAIL_SENT_TO = 'Email sent to %s!';

    public const SF_ENTRIES_INSERTED_TO_TABLE = "%d entries inserted to table '%s'!"; // L119

    public const SF_EXECUTED = '%s executed successfully.';

    public const SF_EXTENSION_IS_INSTALLED = "The extension '%s' is installed";

    public const SF_FOLDER_EXISTS = "The folder '%s' exists!";

    public const SF_FOUND_MATCHES = 'Found <strong>%s</strong> match(es)';

    public const SF_INSTALLED = "'%s' was installed successfully.";

    public const SF_NOTIFICATION_EMAIL_SENT_TO = 'Notification email sent to %s!';

    public const SF_PASSWORD_SENT_TO = 'Password sent to %s!';

    public const SF_PRIVATE_MESSAGE_SENT_TO = 'Private message sent to %s!';

    public const SF_SAVED = '%s saved';

    public const SF_SERVICE_IS_INSTALLED = "A '%s' service provider is available.";

    public const SF_TABLE_CREATED = "Table '%s' created!"; // L45

    public const SF_TABLE_DROPPED = "Table '%s' dropped!"; // L163

    public const SF_TABLE_UPDATED = "Table '%s' updated!"; // L133

    public const SF_THANK_YOU_FOR_LOGGING_IN = 'Thank you for logging in, %s!';

    public const SF_UNINSTALLED = "'%s' was uninstalled successfully.";

    public const SF_UPDATED = "'%s' was updated successfully.";

    public const SHORT_TEXT = 'Short text';

    public const SHOW_ALL = 'Show all';

    public const SHOW_ALL_RESULTS = 'Show all results';

    public const SIDE = 'Side';

    public const SIGNATURE = 'Signature';

    public const SIMPLE_MODE = 'Simple mode';

    public const SIZE = 'Size';

    public const SMILIES = 'Smilies';

    public const SMILIE_CODE = 'Smilie code';

    public const SMILIE_DESCRIPTION = 'Smilie description';

    public const SOUNDCLOUD = 'SoundCloud';

    public const SOUNDCLOUD_URL = 'Enter SoundCloud Profile URL';

    public const SORT_BY = 'Sort by';

    public const SOURCE_CODE = 'Source code';

    public const STARTING_WITH_HTTP_OR_HTTPS = 'Starting with http or https';

    public const STARTS_WITH = 'Starts with';

    public const STATISTICS = 'Statistics';

    public const STATUS = 'Status';

    public const SUBJECT = 'Subject';

    public const SUBMITTED = 'Submitted';

    public const SUCCESS = 'Success';

    public const SUMMARY = 'Summary';

    public const S_ACTION_EXECUTED = 'Action executed successfully!';

    public const S_DATABASE_UPDATED = 'Database updated successfully!';

    public const S_DATA_INSERTED = 'Data inserted successfully!';

    public const S_DATA_UPDATED = 'Data updated!';

    public const S_DONE = 'Done!';

    public const S_ITEM_SAVED = 'Item saved successfully!';

    public const S_MESSAGED_HAS_BEEN_POSTED = 'Your message has been posted!';

    public const S_REFERENCE_TO_SITE_SENT = 'The reference to our site has been sent to your friend. Thanks!';

    public const S_THANK_YOU_FOR_POSTING = 'Thanks for your posting!';

    public const S_THANK_YOU_FOR_VISITING_OUR_SITE = 'Thank you for visiting our site!';

    public const S_USERS_ADDED = 'Users have been added!';

    public const S_YOUR_ACCOUNT_ACTIVATED = 'Your account has been activated!';

    public const S_YOUR_ACCOUNT_DELETED = 'Your account has been deleted!';

    public const S_YOUR_MESSAGES_DELETED = 'Your message(s) has been deleted!';

    public const S_YOUR_PROFILE_UPDATED = 'Your profile has been updated!';

    public const S_YOU_ARE_NOW_LOGGED_OUT = 'You are now logged out';

    public const S_YOU_ARE_NOW_REGISTERED = 'You are now registered.';

    public const TABLE = 'Table';

    public const TABLES = 'Tables';

    public const TAG = 'Tag';

    public const TAGS = 'Tags';

    public const TEMPLATES = 'Templates';

    public const TEXT = 'Text';

    public const THEMES = 'Themes';

    public const THIS_WILL_REMOVE_ALL_YOUR_INFO = 'This will remove all your info from our database!';

    public const THREAD = 'Thread';

    public const THREADED = 'Threaded';

    public const TIMERS = 'Timers';

    public const TIME_FORMAT = 'Time format';

    public const TIME_ZONE = 'Time zone';

    public const TIPS = 'Tips';

    public const TITLE = 'Title';

    public const TITLE_LENGTH = 'Title length';

    public const TO = 'To';

    public const TODAY = 'Today';

    public const TOGGLE_FIRST_DAY_OF_WEEK = 'Toggle first day of week';

    public const TOP = 'Top';

    public const TOP_ITEMS = 'Top items';

    public const TOP_PAGE = 'Top page';

    public const TOP_RATED_ITEMS = 'Top rated items';

    public const TOTAL = 'Total';

    public const TOTALS = 'Totals';

    public const TYPE = 'Type';

    public const TYPES = 'Types';

    public const TYPE_NEW_PASSWORD_TWICE_TO_CHANGE_IT = '(type a new password twice to change it)';

    public const TYPE_OF_USERS_TO_SHOW = 'Type of users to show';

    public const UNASSIGNED = 'Unassigned';

    public const UNDERLINE = 'Underline';

    public const UNKNOWN = 'Unknown';

    public const UPDATED = 'Updated';

    public const UPDATE_DATE = 'Update the date';

    public const UPDATE_NOW = 'Update now';

    public const UPDATE_OPTIONS = 'Update options';

    public const URL = 'URL';

    public const URL_CONTAINS = 'URL contains';

    public const USER = 'User';

    public const USERNAME = 'Username';

    public const USERS = 'Users';

    public const USER_GROUPS = "User's groups";

    public const USER_LOGIN = 'User login';

    public const USER_NAME = 'User name';

    public const USER_REGISTRATION = 'User registration';

    public const VERIFY_PASSWORD = 'Verify password';

    public const VERSION = 'Version';

    public const VERTICAL = 'Vertical';

    public const VIEW_ACCOUNT = 'View account';

    public const VISIBLE = 'Visible';

    public const VISIBLE_IN = 'Visible in';

    public const VISIT_WEBSITE = 'Visit website';

    public const VOTE = 'Vote';

    public const VOTES = 'Votes';

    public const WARNING = 'Warning';

    //const WEBMASTERS = "Webmasters";
    public const WEBSITE = 'Website';

    public const WEB_URL = 'Web URL';

    public const WEIGHT = 'Weight';

    public const WELCOME = 'Welcome';

    public const WHO_IS_ONLINE = "Who's online";

    public const WIDTH = 'Width';

    public const WIKI = 'WIKI link';

    public const WIKI_WORD_TO_LINK = 'The word to be linked to Wiki';

    public const WMP = 'WMP';

    public const WMP_URL = 'WMP URL';

    public const YES = 'Yes';

    public const YIM = 'YIM';

    public const YOUTUBE = 'Youtube';

    public const YOUTUBE_URL = 'Youtube URL';
}
