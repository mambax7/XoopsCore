<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class Psr0ClassLoaderTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Psr0ClassLoader';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
    }

    public function test_addLoader(): void
    {
        $this->markTestIncomplete();
    }

    public function test_setNamespaceSeparator(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getNamespaceSeparator(): void
    {
        $this->markTestIncomplete();
    }

    public function test_setIncludePath(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getIncludePath(): void
    {
        $this->markTestIncomplete();
    }

    public function test_setFileExtension(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getFileExtension(): void
    {
        $this->markTestIncomplete();
    }

    public function test_register(): void
    {
        $this->markTestIncomplete();
    }

    public function test_unregister(): void
    {
        $this->markTestIncomplete();
    }

    public function test_loadClass(): void
    {
        $this->markTestIncomplete();
    }
}
