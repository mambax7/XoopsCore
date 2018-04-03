<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

use Xoops\Module\Helper\HelperAbstract;

/**
 * Module helper for thumbs modue.
 *
 * @category  Xoops\Module\Helper
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2014 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class Thumbs extends HelperAbstract
{
    /**
     * init.
     */
    public function init(): void
    {
        $this->dirname = 'thumbs';
    }

    /**
     * buildThumbPath.
     *
     * @param string $imgPath xoops virtual path to image to be thumbed
     * @param int    $width   maximum width of thumbnail in pixels, 0 to use default
     * @param int    $height  maximum height of thumbnail in pixels, 0 to use default
     *
     * @return string xoops virtual path for the thumbnail
     */
    public function buildThumbPath(string $imgPath, int $width, int $height): string
    {
        //$xoops = \Xoops::getInstance();
        if (0 === $width && 0 === $height) {
            $width = $this->getConfig('thumbs_width');
            $height = $this->getConfig('thumbs_height');
        }
        $sizeDir = sprintf('/%01dx%01d/', $width, $height);
        $pathParts = pathinfo($imgPath);
        if ('.' === $pathParts['dirname']) {
            $pathParts['dirname'] = '';
        }
        $thumbPath = 'assets/thumbs/'.$pathParts['dirname'].$sizeDir.$pathParts['basename'];

        return $thumbPath;
    }
}
