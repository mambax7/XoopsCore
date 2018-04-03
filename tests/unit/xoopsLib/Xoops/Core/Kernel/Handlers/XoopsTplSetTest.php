<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class XoopsTplSetTest extends \PHPUnit\Framework\TestCase
{
    public $myclass = 'Xoops\Core\Kernel\Handlers\XoopsTplSet';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->getVars();
        $this->assertTrue(isset($value['tplset_id']));
        $this->assertTrue(isset($value['tplset_name']));
        $this->assertTrue(isset($value['tplset_desc']));
        $this->assertTrue(isset($value['tplset_credits']));
        $this->assertTrue(isset($value['tplset_created']));
    }

    public function test_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->id();
        $this->assertNull($value);
    }

    public function test_tplset_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tplset_id();
        $this->assertNull($value);
    }

    public function test_tplset_name(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tplset_name();
        $this->assertNull($value);
    }

    public function test_tplset_desc(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tplset_desc();
        $this->assertNull($value);
    }

    public function test_tplset_credits(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tplset_credits();
        $this->assertNull($value);
    }

    public function test_tplset_created(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tplset_created();
        $this->assertSame(0, $value);
    }
}
