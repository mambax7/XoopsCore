<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Form;

/**
 * Mail - a email address element.
 *
 * @category  Xoops\Form\Mail
 * @author    Kazumi Ono <onokazu@xoops.org>
 * @copyright 2001-2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class Mail extends Text
{
    /**
     * Constructor.
     *
     * @param string $caption     Caption
     * @param string $name        name attribute
     * @param int    $size        Size
     * @param int    $maxlength   Maximum length of text
     * @param string $value       Initial text
     * @param string $placeholder placeholder for this element.
     */
    public function __construct(string $caption, string $name, int $size, int $maxlength, string $value = '', string $placeholder = '')
    {
        parent::__construct($caption, $name, $size, $maxlength, $value, $placeholder);
        $this->set('type', 'email');
        $this->setPattern('[^@]+@[^@]+\.[a-zA-Z]{2,6}', \XoopsLocale::ENTER_VALID_EMAIL);
    }
}
