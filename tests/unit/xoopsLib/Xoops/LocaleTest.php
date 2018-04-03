<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class Xoops_LocaleTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = '\Xoops\Locale';

    public function test_loadLanguage(): void
    {
        $class = $this->myClass;
        $x = $class::loadLanguage(null);
        $this->assertFalse($x);

        $path = '';
        $name = '_user';
        $language = 'english';
        $x = $class::loadLanguage($name, null, $language);
        $this->assertTrue($x);

        $x = $class::loadLanguage($name, null, 'dummy');
        $this->assertTrue($x);
    }

    public function test_loadLocale(): void
    {
        $this->markTestIncomplete('to do');
    }

    public function test_loadThemeLocale(): void
    {
        $this->markTestIncomplete('to do');
    }

    public function test_loadMailerLocale(): void
    {
        $class = $this->myClass;
        $x = $class::loadMailerLocale();
        $this->assertTrue($x);

        $map = XoopsLoad::getMap();
        $this->assertTrue(isset($map['xoopsmailerlocale']));
    }

    public function test_translate(): void
    {
        $class = $this->myClass;

        $key = 'key';
        $x = $class::translate($key);
        $this->assertSame($key, $x);
    }

    public function test_translateTheme(): void
    {
        $path = \XoopsBaseConfig::get('root-path');
        if (!class_exists('Comments', false)) {
            \XoopsLoad::addMap([
                'comments' => $path.'/modules/comments/class/helper.php',
            ]);
        }
        if (!class_exists('MenusDecorator', false)) {
            \XoopsLoad::addMap([
                'menusdecorator' => $path.'/modules/menus/class/decorator.php',
            ]);
        }

        $class = $this->myClass;

        $key = 'key';
        $x = $class::translateTheme($key);
        $this->assertSame($key, $x);
    }

    public function test_getClassFromDirname(): void
    {
        $this->markTestSkipped('now protected');
        $class = $this->myClass;

        $dirname = 'xoops';
        $x = $class::getClassFromDirname($dirname);
        $this->assertSame(ucfirst($dirname).'Locale', $x);
    }

    public function test_getThemeClassFromDirname(): void
    {
        $this->markTestSkipped('now protected');
        $class = $this->myClass;

        $dirname = 'xoops';
        $x = $class::getThemeClassFromDirname($dirname);
        $this->assertSame(ucfirst($dirname).'ThemeLocale', $x);
    }

    public function test_getUserLocales(): void
    {
        $class = $this->myClass;

        $locales = $class::getUserLocales();
        $this->assertInternalType('array', $locales);
        $this->assertTrue(in_array('en_US', $locales, true));
    }

    public function test_normalizeLocale(): void
    {
        $class = $this->myClass;

        $locale = 'en-latn-us';
        $actual = $class::normalizeLocale($locale, '_', false);
        $this->assertSame('en_US', $actual);
        $actual = $class::normalizeLocale($locale, '-', false);
        $this->assertSame('en-US', $actual);
        $actual = \Xoops\Locale::normalizeLocale($locale, '_');
        $this->assertSame('en_Latn_US', $actual);
    }

    public function test_normalizeDomain(): void
    {
        $class = $this->myClass;

        $domain = 'Xoops';
        $actual = $class::normalizeDomain($domain);
        $this->assertSame('xoops', $actual);

        $domain = 'xoops';
        $actual = $class::normalizeDomain($domain);
        $this->assertSame('xoops', $actual);
    }
}
