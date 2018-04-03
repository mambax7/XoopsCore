<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class GroupPermTest extends \PHPUnit\Framework\TestCase
{
    public $myclass = 'Xoops\Core\Kernel\Handlers\XoopsGroupPerm';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->getVars();
        $this->assertTrue(isset($value['gperm_id']));
        $this->assertTrue(isset($value['gperm_groupid']));
        $this->assertTrue(isset($value['gperm_itemid']));
        $this->assertTrue(isset($value['gperm_modid']));
        $this->assertTrue(isset($value['gperm_name']));
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\XoopsObject', $instance);
    }

    public function test_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->id();
        $this->assertNull($value);
    }

    public function test_gperm_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->gperm_id();
        $this->assertNull($value);
    }

    public function test_gperm_groupid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->gperm_groupid('');
        $this->assertNull($value);
    }

    public function test_gperm_itemid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->gperm_itemid();
        $this->assertNull($value);
    }

    public function test_gperm_modid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->gperm_modid();
        $this->assertSame(0, $value);
    }

    public function test_gperm_name(): void
    {
        $instance = new $this->myclass();
        $value = $instance->gperm_name();
        $this->assertNull($value);
    }
}
