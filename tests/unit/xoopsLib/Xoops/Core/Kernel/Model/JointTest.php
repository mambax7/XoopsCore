<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsConfigItemHandler;
use Xoops\Core\Kernel\Handlers\XoopsGroupHandler;

class JointTest extends \PHPUnit\Framework\TestCase
{
    protected $conn = null;

    protected $myClass = 'Xoops\Core\Kernel\Model\Joint';

    protected $myAbstractClass = 'Xoops\Core\Kernel\XoopsModelAbstract';

    protected function setUp(): void
    {
        $this->conn = \Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
        $this->assertInstanceOf($this->myAbstractClass, $instance);
    }

    public function test_setHandler(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
        $handler = new XoopsConfigItemHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);
    }

    public function test_getByLink(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $handler->table_link = $this->conn->prefix('system_usergroup');
        $handler->field_link = 'groupid';
        $handler->field_object = $handler->field_link;

        $result = $instance->getByLink(null, null, true, null, null);
        $this->assertInternalType('array', $result);
        $this->assertTrue(count($result) > 0);
    }

    public function test_getCountByLink(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $handler->table_link = $this->conn->prefix('system_usergroup');
        $handler->field_link = 'groupid';
        $handler->field_object = $handler->field_link;

        $result = $instance->getCountByLink();
        $this->assertInternalType('string', $result);
        $this->assertTrue((int) $result >= 0);
    }

    public function test_getCountsByLink(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $handler->table_link = $this->conn->prefix('system_usergroup');
        $handler->field_link = 'groupid';
        $handler->field_object = $handler->field_link;

        $result = $instance->getCountsByLink();
        $this->assertInternalType('array', $result);
        $this->assertTrue(count($result) >= 0);
    }

    public function test_updateByLink(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $handler->table_link = $this->conn->prefix('system_usergroup');
        $handler->field_link = 'groupid';
        $handler->field_object = $handler->field_link;

        $criteria = new Xoops\Core\Kernel\Criteria('l.uid', 0);
        $arrData = ['name' => 'name'];
        $result = $instance->updateByLink($arrData, $criteria);
        $this->assertInternalType('int', $result);
        $this->assertTrue($result >= 0);
    }

    public function test_deleteByLink(): void
    {
        $instance = new $this->myClass();
        $this->assertinstanceOf($this->myClass, $instance);

        $handler = new XoopsGroupHandler($this->conn);
        $result = $instance->setHandler($handler);
        $this->assertTrue($result);

        $handler->table_link = $this->conn->prefix('system_usergroup');
        $handler->field_link = 'groupid';
        $handler->field_object = $handler->field_link;

        $criteria = new Xoops\Core\Kernel\Criteria('l.uid', 0);

        $result = $instance->deleteByLink($criteria);
        $this->assertInternalType('int', $result);
        $this->assertTrue($result >= 0);
    }
}
