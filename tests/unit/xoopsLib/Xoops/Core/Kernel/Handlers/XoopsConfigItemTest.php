<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class ConfigItemTest extends \PHPUnit\Framework\TestCase
{
    public $myclass = 'Xoops\Core\Kernel\Handlers\XoopsConfigItem';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->getVars();
        $this->assertTrue(isset($value['conf_id']));
        $this->assertTrue(isset($value['conf_modid']));
        $this->assertTrue(isset($value['conf_catid']));
        $this->assertTrue(isset($value['conf_name']));
        $this->assertTrue(isset($value['conf_title']));
        $this->assertTrue(isset($value['conf_value']));
        $this->assertTrue(isset($value['conf_desc']));
        $this->assertTrue(isset($value['conf_formtype']));
        $this->assertTrue(isset($value['conf_valuetype']));
        $this->assertTrue(isset($value['conf_order']));
    }

    public function test_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->id();
        $this->assertNull($value);
    }

    public function test_conf_id(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_id();
        $this->assertNull($value);
    }

    public function test_conf_modid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_modid();
        $this->assertNull($value);
    }

    public function test_conf_catid(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_catid();
        $this->assertNull($value);
    }

    public function test_conf_name(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_name();
        $this->assertNull($value);
    }

    public function test_conf_title(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_title();
        $this->assertNull($value);
    }

    public function test_conf_value(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_value();
        $this->assertNull($value);
    }

    public function test_conf_desc(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_desc();
        $this->assertNull($value);
    }

    public function test_conf_formtype(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_formtype();
        $this->assertNull($value);
    }

    public function test_conf_valuetype(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_valuetype();
        $this->assertNull($value);
    }

    public function test_conf_order(): void
    {
        $instance = new $this->myclass();
        $value = $instance->conf_order();
        $this->assertNull($value);
    }
}
