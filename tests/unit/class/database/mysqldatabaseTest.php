<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsMySQLDatabaseTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsMySQLDatabase';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\XoopsMySQLDatabase', $instance);
        $this->assertInstanceOf('\XoopsDatabase', $instance);
    }

    public function test___publicProperties(): void
    {
        $items = ['conn'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function test_genId(): void
    {
        $instance = new $this->myclass();
        $sequence = 0;
        $x = $instance->genId($sequence);
        $this->assertSame(0, $x);
    }
}
