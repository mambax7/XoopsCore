<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class MembershipHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsMembershipHandler';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertRegExp('/^.*system_usergroup$/', $instance->table);
        $this->assertSame('\Xoops\Core\Kernel\Handlers\XoopsMembership', $instance->className);
        $this->assertSame('linkid', $instance->keyName);
        $this->assertSame('groupid', $instance->identifierName);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsMembershipHandler', $instance);
        $this->assertInstanceOf('\Xoops\Core\Kernel\XoopsPersistableObjectHandler', $instance);
    }

    public function test_getGroupsByUser(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->getGroupsByUser(1);
        $this->assertInternalType('array', $value);
    }

    public function test_getGroupsByGroup(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->getGroupsByGroup(1);
        $this->assertNull($value);
    }
}
