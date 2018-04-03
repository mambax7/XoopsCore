<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

class ConfigItemHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops\Core\Kernel\Handlers\XoopsConfigItemHandler';

    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertRegExp('/^.*system_config$/', $instance->table);
        $this->assertSame('\Xoops\Core\Kernel\Handlers\XoopsConfigItem', $instance->className);
        $this->assertSame('conf_id', $instance->keyName);
        $this->assertSame('conf_name', $instance->identifierName);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass($this->conn);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\Handlers\\XoopsConfigItemHandler', $instance);
        $this->assertInstanceOf('\\Xoops\\Core\\Kernel\\XoopsPersistableObjectHandler', $instance);
    }
}
