<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

use Xoops\Core\Database\Connection;

class XoopsObjectHandlerTestInstance extends Xoops\Core\Kernel\XoopsObjectHandler
{
    public function __construct(Connection $db)
    {
        parent::__construct($db);
    }
}

class XoopsObjectHandlerTest_XoopsObjectInstance extends Xoops\Core\Kernel\XoopsObject
{
}

class XoopsObjectHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsObjectHandlerTestInstance';

    protected $classObject = 'XoopsObjectHandlerTest_XoopsObjectInstance';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops\Core\Database\Factory::getConnection();
    }

    public function test___publicProperties(): void
    {
        $items = ['db2'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myClass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function test___construct(): void
    {
        $instance = new $this->myClass($this->conn);
        $this->assertInstanceOf($this->myClass, $instance);
    }

    public function test_create(): void
    {
        $instance = new $this->myClass($this->conn);
        $x = $instance->create();
        $this->assertNull($x);
    }

    public function test_get(): void
    {
        $instance = new $this->myClass($this->conn);
        $x = $instance->get(1);
        $this->assertNull($x);
    }

    public function test_insert(): void
    {
        $instance = new $this->myClass($this->conn);
        $object = new $this->classObject();
        $x = $instance->insert($object);
        $this->assertNull($x);
    }

    public function test_delete(): void
    {
        $instance = new $this->myClass($this->conn);
        $object = new $this->classObject();
        $x = $instance->delete($object);
        $this->assertNull($x);
    }
}
