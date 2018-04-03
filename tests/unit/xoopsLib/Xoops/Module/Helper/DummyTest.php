<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

class Xoops_Module_Helper_DummyTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = '\Xoops\Module\Helper\Dummy';

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
        $this->assertInstanceOf('\Xoops\Module\Helper\Dummy', $instance);
    }

    public function test_init(): void
    {
        $instance = new $this->myClass();

        $x = $instance->init();
        $this->assertNull($x);
    }

    public function test_getInstance(): void
    {
        $instance = new $this->myClass();

        $x = $instance->getInstance();
        $this->assertInstanceOf('\Xoops\Module\Helper\Dummy', $x);
    }

    public function test_setDirname(): void
    {
        $instance = new $this->myClass();

        $x = $instance->setDirname('myDir');
        $this->assertNull($x);
    }

    public function test_setDebug(): void
    {
        $instance = new $this->myClass();

        $x = $instance->setDebug(true);
        $this->assertNull($x);
    }

    public function test_addLog(): void
    {
        $instance = new $this->myClass();

        $log = 'log log log log';
        $x = $instance->addLog($log);
        $this->assertNull($x);
    }
}
