<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsMySQLDatabaseSafeTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsMySQLDatabaseSafe';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\XoopsMySQLDatabaseSafe', $instance);
        $this->assertInstanceOf('\XoopsMySQLDatabase', $instance);
        $this->assertInstanceOf('\XoopsDatabase', $instance);
    }
}
