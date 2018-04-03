<?php declare(strict_types=1);

/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace Xmf;

/**
 * XOOPS Random generator.
 *
 * @category  Xmf\Random
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2015-2018 XOOPS Project (https://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      https://xoops.org
 */
class Random
{
    /**
     * Create a one time token.
     *
     * Generates a low strength random number of size $bytes and hash with the
     * algorithm specified in $hash.
     *
     * @param string $hash  hash function to use
     * @param int    $bytes the number of random bit to generate
     *
     * @return string     hashed token
     * @throws \Exception on insufficient entropy
     */
    public static function generateOneTimeToken(string $hash = 'sha512', int $bytes = 64): string
    {
        $token = hash($hash, random_bytes($bytes));

        return $token;
    }

    /**
     * Create a medium strength key.
     *
     * Generates a medium strength random number of size $bytes and hash with the
     * algorithm specified in $hash.
     *
     * @param string $hash  hash function to use
     * @param int    $bytes the number of random bytes to generate
     *
     * @return string     hashed token
     * @throws \Exception on insufficient entropy
     */
    public static function generateKey(string $hash = 'sha512', int $bytes = 128): string
    {
        $token = hash($hash, random_bytes($bytes));

        return $token;
    }
}
