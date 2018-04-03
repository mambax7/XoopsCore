<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class Xoops_Module_PluginTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = '\Xoops\Module\Plugin';

    public function test_getPlugin(): void
    {
        $instance = $this->myClass;
        $x = $instance::getPlugin('dummy');
        $this->assertFalse($x);

        $x = $instance::getPlugin('page');
        $this->assertInstanceOf('\Xoops\Module\Plugin\PluginAbstract', $x);
    }

    public function test_getPlugins(): void
    {
        $instance = $this->myClass;

        $x = $instance::getPlugins();
        $this->assertInternalType('array', $x);
    }
}
