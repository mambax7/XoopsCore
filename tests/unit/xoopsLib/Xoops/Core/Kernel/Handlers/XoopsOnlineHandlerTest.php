<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class OnlineHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsOnlineHandler';

    protected $myId = null;

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertRegExp('/^.*system_online$/', $instance->table);
        $this->assertSame('\Xoops\Core\Kernel\Handlers\XoopsOnline', $instance->className);
        $this->assertSame('online_uid', $instance->keyName);
        $this->assertSame('online_uname', $instance->identifierName);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsOnlineHandler', $instance);
        $this->assertInstanceOf('\Xoops\Core\Kernel\XoopsPersistableObjectHandler', $instance);
    }

    public function test_write(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf($this->myclass, $instance);

        $this->myId = (int) (microtime(true) % 10000000);
        $value = $instance->write($this->myId, 'name', time(), 0, '127.0.0.1');
        $this->assertTrue($value);
    }

    public function test_destroy(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf($this->myclass, $instance);

        $value = $instance->destroy($this->myId);
        $this->assertTrue($value);
    }

    public function test_gc(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf($this->myclass, $instance);

        $value = $instance->gc(time() + 10);
        $this->assertTrue($value);
    }
}
