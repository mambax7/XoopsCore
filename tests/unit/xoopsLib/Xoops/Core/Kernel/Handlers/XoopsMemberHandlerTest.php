<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class MemberHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsMemberHandler';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test_createGroup(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->createGroup();
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\Handlers\\XoopsGroup', $value);
    }

    public function test_createUser(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->createUser();
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\Handlers\\XoopsUser', $value);
    }

    public function test_getGroup(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->getGroup(1);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\Handlers\\XoopsGroup', $value);
    }

    public function test_getUser(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->getUser(1);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\Handlers\\XoopsUser', $value);
    }

    public function test_deleteGroup(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->createGroup();
        $ret = $instance->deleteGroup($value);
        $this->assertFalse($ret);
    }

    public function test_deleteUser(): void
    {
        $instance = new $this->myclass($this->conn);
        $value = $instance->createUser();
        $ret = $instance->deleteUser($value);
        $this->assertFalse($ret);
    }
}
