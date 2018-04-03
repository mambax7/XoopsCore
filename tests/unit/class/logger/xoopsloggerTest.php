<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

require_once XOOPS_TU_ROOT_PATH.'/class/logger/xoopslogger.php';

class xoopsloggerTest extends \PHPUnit\Framework\TestCase
{
    // "XoopsLogger is deprecated since 2.6.0, use the module 'logger' instead"

    protected $myclass = 'XoopsLogger';

    public function test_getInstance(): void
    {
        $instance = XoopsLogger::getInstance();
        $this->assertInstanceOf($this->myclass, $instance);

        $instance1 = XoopsLogger::getInstance();
        $this->assertInstanceOf($this->myclass, $instance1);
        $this->assertSame($instance, $instance1);
    }

    public function test___get(): void
    {
        $instance = XoopsLogger::getInstance();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->toto;
        $this->assertNull($value);
    }

    public function test___class(): void
    {
        $instance = XoopsLogger::getInstance();
        $this->assertInstanceOf($this->myclass, $instance);
        $value = $instance->tutu('tutu');
        $this->assertNull($value);
    }
}
