    <h4 class="odd">Description</h4>

    <p class="even">Menus is menu manager module from Trabis that allows you to display dynamic or static menus in your website.</p>

    <h4 class="odd">Install/uninstall</h4>

    <p class="even">No special measures necessary, follow the standard installation process –
    extract the module folder into the ../modules directory. Install the
    module through Admin -> System Module -> Modules.<br /> <br />
    Detailed instructions on installing modules are available in the
    <a href="http://goo.gl/adT2i">XOOPS Operations Manual</a> </p>


    <h4 class="odd">Operating instructions</h4>

    <pre>
Important to know:

Links and images are relative to the root of your site:
modules/profile
search.php
uploads/blank.gif

For linking to external sites you need to use complete url:
http://www.xuups.com


You can use DECORATORS for links, images, title, and alt_title.
The decorators follow this syntax:
{decorator|value}

There are 6 decorators available:
USER -> gets info for the user that is seing the page
OWNER -> gets info for the user that match uid on the url(if given)
URI -> gets info about the url arguments
MODULE -> gets dynamic menu from a module (Used in title field only)
SMARTY -> gets smarty variables
CONSTANT -> gets defined constants

Some syntax examples
{USER|UNAME} gets the username of this user, returns anonymous if not a user
{USER|UID} gets the uid of this user, returns 0 if not a user
{USER|REGDATE} gets the regdate of this user, returns empty if not a user
{USER|any other field of the user table} yes! You can get what you need!

Some special fields you may use
{USER|PM_NEW} Show number of private messages not readed
{USER|PM_READED}
{USER|PM_TOTAL}

The same is valid for OWNER:
{OWNER|UNAME}
{OWNER|UID}
etc..

And you can get any paramater on the uri with:
{URI|UID}
{URI|ID}
{URI|SEARCH}
{URI|ITEMID}
{URI|CATID}
etc...

Example of links using decorators:
modules/profile/userinfo.php?uid={USER|UID}
modules/yogurt/pictures.php?uid={OWNER|UID}

Example on titles using decorators:
{USER|UNAME}
{OWNER|UNAME} profile
You have searched for {URI|SEARCH}

Populating menus with modules information:
{MODULE|NEWS}
{MODULE|XHELP}
{MODULE|MYLINKS}
{MODULE|TDMDOWNLOADS}

Using smarty information:
{SMARTY|xoops_uname}
{SMARTY|xoops_avatar}

Using constants information:
{CONSTANT|XOOPS_URL}/myimages/image.gif
{CONSTANT|XOOPS_ROOT_PATH}

    </pre>
