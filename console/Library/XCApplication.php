<?php declare(strict_types=1);

namespace XoopsConsole\Library;

use Symfony\Component\Console\Application;

/**
 * A really simple container.
 *
 * @category  XoopsConsole\Library
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class XCApplication extends Application
{
    /**
     * @var SimpleContainer
     */
    public $simpleContainer = null;
}
