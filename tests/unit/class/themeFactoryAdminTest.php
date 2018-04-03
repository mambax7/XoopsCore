<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class themeFactoryAdminTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsAdminThemeFactory';

    protected function setUp(): void
    {
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\Xoops\Core\Theme\AdminFactory', $instance);
    }

    public function test___construct(): void
    {
        $themefactory = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $themefactory);
        $this->assertSame('XoopsThemeFactory', $themefactory->xoBundleIdentifier);
        $this->assertSame([], $themefactory->allowedThemes);
        $this->assertSame('default', $themefactory->defaultTheme);
        $this->assertTrue($themefactory->allowUserSelection);
    }

    public function createInstance_check_level($themefactory, $params = null)
    {
        $level = ob_get_level();
        $value = $themefactory->createInstance($params);
        while (ob_get_level() > $level) {
            @ob_end_flush();
        }

        return $value;
    }

    public function test_createInstance(): void
    {
        $themefactory = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $themefactory);
        $value = $this->createInstance_check_level($themefactory);
        $this->assertInstanceOf('\Xoops\Core\Theme\XoopsTheme', $value);
    }

    public function test_createInstance100(): void
    {
        $themefactory = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $themefactory);
        $value = $this->createInstance_check_level($themefactory, ['titi' => 'toto']);
        $this->assertInstanceOf('\Xoops\Core\Theme\XoopsTheme', $value);
        $this->assertSame('toto', $value->titi);
        $this->assertTrue(!empty($value->path));
        $this->assertTrue(!empty($value->folderName));
        $this->assertTrue(!empty($value->url));
        $this->assertSame([], $value->plugins);
        $this->assertFalse($value->renderBanner);
    }
}
