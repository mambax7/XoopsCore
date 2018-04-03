<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

use Xoops\Core\Kernel\Criteria;
use Xoops\Core\Kernel\Handlers\XoopsGroup;

class XoopsPersistableObjectHandlerTestInstance extends Xoops\Core\Kernel\XoopsPersistableObjectHandler
{
    public function __construct(
        \Xoops\Core\Database\Connection $db,
        $table = '',
        $className = '',
        $keyName = '',
        $identifierName = ''
    ) {
        parent::__construct($db, $table, $className, $keyName, $identifierName);
    }
}

class XoopsPersistableObjectHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsPersistableObjectHandlerTestInstance';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = \Xoops\Core\Database\Factory::getConnection();
    }

    public function test___publicProperties(): void
    {
        $items = ['table', 'keyName', 'className', 'table_link', 'identifierName', 'field_link',
            'field_object', ];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myClass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function test___construct(): void
    {
        $table = 'table';
        $className = 'className';
        $keyName = 'keyName';
        $identifierName = 'identifierName';
        $instance = new $this->myClass($this->conn, $table, $className, $keyName, $identifierName);
        $this->assertInstanceOf($this->myClass, $instance);
        $this->assertSame($this->conn, $instance->db2);
    }

    public function test_setHandler(): void
    {
        $instance = new $this->myClass($this->conn);
        $value = $instance->setHandler();
        $this->assertNull($value);
    }

    public function test_loadHandler(): void
    {
        $instance = new $this->myClass($this->conn);
        $value = $instance->loadHandler('read');
        $this->assertInternalType('object', $value);
    }

    public function test_create(): void
    {
        $instance = new $this->myClass($this->conn);
        $value = $instance->create();
        $this->assertFalse($value);
    }

    public function test_get(): void
    {
        $instance = new $this->myClass($this->conn);
        $value = $instance->get();
        $this->assertFalse($value);
    }

    public function test_insert(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $obj = new XoopsGroup();
        $obj->setDirty();
        $value = $instance->insert($obj);
        $this->assertSame('', $value);
    }

    public function test_delete(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $obj = new XoopsGroup();
        $value = $instance->delete($obj);
        $this->assertFalse($value);
    }

    public function test_deleteAll(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $criteria = new Criteria('dummy_field');
        $value = $instance->deleteAll($criteria);
        $this->assertSame(0, $value);
    }

    public function test_updateAll(): void
    {
        $instance = new $this->myClass($this->conn);
        $criteria = new Criteria('dummy_field');
        $value = $instance->updateAll('name', 'value', $criteria);
        $this->assertSame(0, $value);
    }

    public function test_getObjects(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->getObjects();
        $this->assertInternalType('array', $value);
        $this->assertTrue($value > 0);
    }

    public function test_getAll(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->getAll();
        $this->assertInternalType('array', $value);
        $this->assertTrue(count($value) > 0);
    }

    public function test_getList(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->getList();
        $this->assertInternalType('array', $value);
        $this->assertTrue(count($value) > 0);
    }

    public function test_getIds(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->getIds();
        $this->assertInternalType('array', $value);
        $this->assertTrue(count($value) > 0);
    }

    public function test_getCount(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->getCount();
        $this->assertTrue((int) $value > 0);
    }

    public function test_getCounts(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->getCounts();
        $this->assertInternalType('array', $value);
    }

    public function test_getByLink(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $instance->field_object = 'groupid';
        $instance->table_link = $this->conn->prefix('system_permission');
        $instance->field_link = 'gperm_groupid';
        $value = $instance->getByLink();
        $this->assertInternalType('array', $value);
        $this->assertTrue(count($value) > 0);
    }

    public function test_getCountByLink(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $instance->field_object = 'groupid';
        $instance->table_link = $this->conn->prefix('system_permission');
        $instance->field_link = 'gperm_groupid';
        $value = $instance->getCountByLink();
        $this->assertTrue((int) $value > 0);
    }

    public function test_getCountsByLink(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $instance->field_object = 'groupid';
        $instance->table_link = $this->conn->prefix('system_permission');
        $instance->field_link = 'gperm_groupid';
        $value = $instance->getCountsByLink();
        $this->assertInternalType('array', $value);
    }

    public function test_updateByLink(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $instance->field_object = 'groupid';
        $instance->table_link = $this->conn->prefix('system_permission');
        $instance->field_link = 'gperm_groupid';
        $value = $instance->updateByLink(['key' => 'value']);
        $this->assertFalse($value);
    }

    public function test_deleteByLink(): void
    {
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $instance->field_object = 'groupid';
        $instance->table_link = $this->conn->prefix('system_permission');
        $instance->field_link = 'gperm_groupid';
        $value = $instance->deleteByLink();
        $this->assertFalse($value);
    }

    public function test_cleanOrphan(): void
    {
        $this->markTestSkipped('side effects');
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->cleanOrphan($this->conn->prefix('system_permission'), 'gperm_groupid', 'groupid');
        $this->assertSame(0, $value);
    }

    public function test_synchronization(): void
    {
        $this->markTestSkipped('side effects');
        $instance = new $this->myClass($this->conn, 'system_group', 'Xoops\Core\Kernel\Handlers\XoopsGroup', 'groupid', 'name');
        $value = $instance->synchronization($this->conn->prefix('system_permission'), 'gperm_groupid', 'groupid');
        $this->assertSame(0, $value);
    }
}
