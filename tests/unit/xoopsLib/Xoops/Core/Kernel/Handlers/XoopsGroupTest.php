<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class GroupTest extends \PHPUnit\Framework\TestCase
{
    public $myclass = 'Xoops\Core\Kernel\Handlers\XoopsGroup';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->getVars();
        $this->assertTrue(isset($value['groupid']));
        $this->assertTrue(isset($value['name']));
        $this->assertTrue(isset($value['description']));
        $this->assertTrue(isset($value['group_type']));
    }

    public function test_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->id();
        $this->assertNull($value);
    }

    public function test_groupid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->groupid();
        $this->assertNull($value);
    }

    public function test_name(): void
    {
        $instance = new $this->myclass();
        $value = $instance->name('');
        $this->assertNull($value);
    }

    public function test_description(): void
    {
        $instance = new $this->myclass();
        $value = $instance->description();
        $this->assertNull($value);
    }

    public function test_group_type(): void
    {
        $instance = new $this->myclass();
        $value = $instance->group_type();
        $this->assertNull($value);
    }
}
