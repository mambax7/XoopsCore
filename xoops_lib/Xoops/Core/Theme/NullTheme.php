<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core\Theme;

/**
 * A null theme, mainly for testing.
 *
 * @category  Xoops\Core\Theme
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class NullTheme extends XoopsTheme
{
    /**
     * Initializes this theme.
     *
     * @return bool
     */
    public function xoInit(): bool
    {
        return true;
    }

    /**
     * Render the page.
     *
     * @return bool
     */
    public function render($canvasTpl = null, $pageTpl = null, $contentTpl = null, $vars = []): bool
    {
        return true;
    }

    /**
     * Add StyleSheet or CSS code to the document head.
     */
    public function addStylesheet($src = '', $attributes = [], $content = ''): void
    {
    }

    /**
     * addScriptAssets - add a list of scripts to the page.
     */
    public function addScriptAssets($assets, $filters = 'default', $target = null): void
    {
    }

    /**
     * addStylesheetAssets - add a list of stylesheets to the page.
     */
    public function addStylesheetAssets($assets, $filters = 'default', $target = null): void
    {
    }

    /**
     * addBaseAssets - add a list of assets to the page, these will all
     * be combined into a single asset file at render time.
     */
    public function addBaseAssets($type, $assets): void
    {
    }

    /**
     * addBaseScriptAssets - add a list of scripts to the page.
     */
    public function addBaseScriptAssets($assets): void
    {
    }

    /**
     * addBaseStylesheetAssets - add a list of stylesheets to the page.
     */
    public function addBaseStylesheetAssets($assets): void
    {
    }

    /**
     * setNamedAsset - Add an asset reference to the asset manager.
     *
     * @return bool true if asset registers, false on error
     */
    public function setNamedAsset($name, $assets, $filters = null)
    {
    }
}
