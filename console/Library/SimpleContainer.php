<?php

namespace XoopsConsole\Library;

use ArrayObject;

/**
 * A really simple container.
 *
 * @category  XoopsConsole\Library
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class SimpleContainer extends ArrayObject
{
    /**
     * Retrieve an attribute value.
     *
     * @param string $name Name of an attribute
     *
     * @return mixed The value of the attribute, or null if not set
     */
    public function get($name)
    {
        return $this->offsetGet($name);
    }

    /**
     * Determine if an attribute exists.
     *
     * @param string $name An attribute name.
     *
     * @return bool TRUE if the given attribute exists, otherwise FALSE.
     */
    public function has($name)
    {
        return $this->offsetExists($name);
    }
}
