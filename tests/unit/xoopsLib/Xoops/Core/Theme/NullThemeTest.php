<?php declare(strict_types=1);

namespace Xoops\Core\Theme;

require_once __DIR__.'/../../../../init_new.php';

class NullThemeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var NullTheme
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new NullTheme();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testContracts(): void
    {
        $this->assertInstanceOf('\Xoops\Core\Theme\XoopsTheme', $this->object);
    }

    public function testXoInit(): void
    {
        $this->assertTrue($this->object->xoInit());
    }

    public function testRender(): void
    {
        $this->assertTrue($this->object->render());
    }

    public function testAddStylesheet(): void
    {
        $this->assertNull($this->object->addStylesheet());
    }

    public function testAddScriptAssets(): void
    {
        $this->assertNull($this->object->addScriptAssets(''));
    }

    public function testAddStylesheetAssets(): void
    {
        $this->assertNull($this->object->addStylesheetAssets(''));
    }

    public function testAddBaseAssets(): void
    {
        $this->assertNull($this->object->addBaseAssets('', ''));
    }

    public function testAddBaseScriptAssets(): void
    {
        $this->assertNull($this->object->addBaseScriptAssets(''));
    }

    public function testAddBaseStylesheetAssets(): void
    {
        $this->assertNull($this->object->addBaseStylesheetAssets(''));
    }

    public function testSetNamedAsset(): void
    {
        $this->assertNull($this->object->setNamedAsset('', ''));
    }
}
