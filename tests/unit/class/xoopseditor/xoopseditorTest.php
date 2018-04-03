<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class xoopseditorTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsEditor';

    public function test___construct(): void
    {
        $class = $this->myclass;
        $instance = new $class();
        $this->assertInstanceOf($class, $instance);
        $this->assertInstanceOf('\\Xoops\\Form\\TextArea', $instance);

        $items = ['isEnabled', 'configs', 'rootPath'];
        foreach ($items as $item) {
            $reflection = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($reflection->isPublic());
        }
    }

    public function test_isActive(): void
    {
        $this->markTestIncomplete();
    }

    public function test_setConfig(): void
    {
        $this->markTestIncomplete();
    }
}
