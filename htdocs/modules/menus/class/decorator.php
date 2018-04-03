<?php declare(strict_types=1);

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
 * @since           1.0
 * @author          trabis <lusopoemas@gmail.com>
 * @version         $Id$
 */
class MenusDecorator
{
    /**
     * @param string $dirname
     *
     * @return bool
     */
    public static function getDecorators(string $dirname): bool
    {
        $available = self::getAvailableDecorators();
        if (!in_array($dirname, array_keys($available), true)) {
            return false;
        }

        return $available[$dirname];
    }

    /**
     * @return array
     */
    public static function getAvailableDecorators(): array
    {
        static $decorators = false;
        if (!is_array($decorators)) {
            $decorators = [];
            $helper = Menus::getInstance();

            $dirnames = XoopsLists::getDirListAsArray($helper->path('decorators/'), '');
            foreach ($dirnames as $dirname) {
                if (XoopsLoad::loadFile($helper->path("decorators/{$dirname}/decorator.php"))) {
                    $className = 'Menus'.ucfirst($dirname).'Decorator';
                    $class = new $className($dirname);
                    if ($class instanceof MenusDecoratorAbstract && $class instanceof MenusDecoratorInterface) {
                        $decorators[$dirname] = $class;
                    }
                }
            }
        }

        return $decorators;
    }
}

class MenusDecoratorAbstract
{
    /**
     * @param string $dirname
     */
    public function __construct(string $dirname)
    {
        $this->loadLanguage($dirname);
    }

    /**
     * @param string $name
     */
    public function loadLanguage(string $name)
    {
        $helper = Menus::getInstance();

        $language = XoopsLocale::getLegacyLanguage();
        $path = $helper->path("decorators/{$name}/language");
        if (!$ret = XoopsLoad::loadFile("{$path}/{$language}/decorator.php")) {
            $ret = XoopsLoad::loadFile("{$path}/english/decorator.php");
        }

        return $ret;
    }
}

interface MenusDecoratorInterface
{
    public function start(): void;

    public function end(&$menus): void;

    public function decorateMenu(&$menu): void;

    public function hasAccess($menu, &$hasAccess): void;

    public function accessFilter(&$accessFilter): void;
}
