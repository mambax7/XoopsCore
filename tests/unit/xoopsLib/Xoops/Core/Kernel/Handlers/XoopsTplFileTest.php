<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class XoopsTplFileTest extends \PHPUnit\Framework\TestCase
{
    public $myclass = 'Xoops\Core\Kernel\Handlers\XoopsTplFile';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->getVars();
        $this->assertTrue(isset($value['tpl_id']));
        $this->assertTrue(isset($value['tpl_refid']));
        $this->assertTrue(isset($value['tpl_tplset']));
        $this->assertTrue(isset($value['tpl_file']));
        $this->assertTrue(isset($value['tpl_desc']));
        $this->assertTrue(isset($value['tpl_lastmodified']));
        $this->assertTrue(isset($value['tpl_lastimported']));
        $this->assertTrue(isset($value['tpl_module']));
        $this->assertTrue(isset($value['tpl_type']));
        $this->assertTrue(isset($value['tpl_source']));
    }

    public function test_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->id();
        $this->assertNull($value);
    }

    public function test_tpl_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_id();
        $this->assertNull($value);
    }

    public function test_tpl_refid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_refid();
        $this->assertSame(0, $value);
    }

    public function test_tpl_tplset(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_tplset();
        $this->assertNull($value);
    }

    public function test_tpl_file(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_file();
        $this->assertNull($value);
    }

    public function test_tpl_desc(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_desc();
        $this->assertNull($value);
    }

    public function test_tpl_lastmodified(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_lastmodified();
        $this->assertSame(0, $value);
    }

    public function test_tpl_lastimported(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_lastimported();
        $this->assertSame(0, $value);
    }

    public function tpl_module(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_module();
        $this->assertNull($value);
    }

    public function test_tpl_type(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_type();
        $this->assertNull($value);
    }

    public function test_tpl_source(): void
    {
        $instance = new $this->myclass();
        $value = $instance->tpl_source();
        $this->assertNull($value);
    }

    public function test_getSource(): void
    {
        $instance = new $this->myclass();
        $value = $instance->getSource();
        $this->assertNull($value);
    }

    public function test_getLastModified(): void
    {
        $instance = new $this->myclass();
        $value = $instance->getLastModified();
        $this->assertSame('0', $value);
    }
}
