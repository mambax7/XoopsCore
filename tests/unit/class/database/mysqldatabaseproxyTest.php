<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsMySQLDatabaseProxyTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsMySQLDatabaseProxy';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\XoopsMySQLDatabaseProxy', $instance);
        $this->assertInstanceOf('\XoopsMySQLDatabase', $instance);
        $this->assertInstanceOf('\XoopsDatabase', $instance);
    }
}
