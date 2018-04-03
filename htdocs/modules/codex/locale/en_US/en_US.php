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
 * codex module.
 *
 * @copyright       XOOPS Project (http://xoops.org)
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @since           2.6.0
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */
class CodexLocaleEn_US
{
    // Module
    public const MODULE_NAME = 'Codex';

    public const MODULE_DESC = 'Code examples for developers';

    // Configs
    public const UCONF_ITEM1 = 'Item 1';

    public const UCONF_ITEM1_DESC = 'Item 1 desc';

    public const UCONF_ITEM2 = 'Item 2';

    public const UCONF_ITEM2_DESC = 'Item 2 desc';

    public const UCONF_CAT1 = 'Cat 1';

    public const UCONF_CAT1_DESC = 'Cat 1 desc';

    public const UCONF_CAT2 = 'Cat 2';

    public const UCONF_CAT2_DESC = 'Cat 2 desc';

    public const MY_DOG_NAME_AND_AGE = 'My dog name is {name}. It is {years,plural,=0{not born yet} =1{only one year old} other{# years old}}';

    public const YOU_LIKED_THIS = '
        You {likeCount,plural,
        offset: 1
        =0{did not like this}
        =1{liked this}
        one{and one other person liked this}
        other{and # others liked this}
    }';

    public const GENDER = '{name} is a {gender} and {gender,select,woman{she} man{he} other{it}} loves XOOPS!';
}
