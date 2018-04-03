<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class ConfigOptionHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsConfigOptionHandler';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertRegExp('/^.*system_configoption$/', $instance->table);
        $this->assertSame('\Xoops\Core\Kernel\Handlers\XoopsConfigOption', $instance->className);
        $this->assertSame('confop_id', $instance->keyName);
        $this->assertSame('confop_name', $instance->identifierName);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsConfigOptionHandler', $instance);
        $this->assertInstanceOf('\Xoops\Core\Kernel\XoopsPersistableObjectHandler', $instance);
    }
}
