<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class GroupHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsGroupHandler';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertRegExp('/^.*system_group$/', $instance->table);
        $this->assertSame('\Xoops\Core\Kernel\Handlers\XoopsGroup', $instance->className);
        $this->assertSame('groupid', $instance->keyName);
        $this->assertSame('name', $instance->identifierName);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsGroupHandler', $instance);
        $this->assertInstanceOf('\Xoops\Core\Kernel\XoopsPersistableObjectHandler', $instance);
    }
}
