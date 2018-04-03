<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class UserHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsUserHandler';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertRegExp('/^.*system_user$/', $instance->table);
        $this->assertSame('\Xoops\Core\Kernel\Handlers\XoopsUser', $instance->className);
        $this->assertSame('uid', $instance->keyName);
        $this->assertSame('uname', $instance->identifierName);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsUserHandler', $instance);
        $this->assertInstanceOf('\Xoops\Core\Kernel\XoopsPersistableObjectHandler', $instance);
    }
}
