<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class xoopseditorHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsEditorHandler';

    public function test_getInstance(): void
    {
        $class = $this->myclass;
        $instance = $class::getInstance();
        $this->assertInstanceOf($this->myclass, $instance);

        $x = $class::getInstance();
        $this->assertSame($x, $instance);

        $items = ['root_path', 'nohtml', 'allowed_editors'];
        foreach ($items as $item) {
            $reflection = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($reflection->isPublic());
        }
    }

    public function test_get(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getList(): void
    {
        $this->markTestIncomplete();
    }

    public function test_setConfig(): void
    {
        $this->markTestIncomplete();
    }
}
