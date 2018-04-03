<?php declare(strict_types=1);

require_once __DIR__.'/../../../../../init_new.php';

use Xoops\Core\Kernel\Criteria;
use Xoops\Core\Kernel\Handlers\XoopsConfigItem;

class ConfigHandlerTest extends \PHPUnit\Framework\TestCase
{
    public $myclass = 'Xoops\Core\Kernel\Handlers\XoopsConfigHandler';

    public $configItemClass = '\Xoops\Core\Kernel\Handlers\XoopsConfigItem';

    public $configOptionClass = '\Xoops\Core\Kernel\Handlers\XoopsConfigOption';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
    }

    public function testContracts(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsConfigHandler', $instance);
    }

    public function test_createConfig(): void
    {
        $instance = new $this->myclass();
        $value = $instance->createConfig();
        $this->assertInstanceOf($this->configItemClass, $value);
    }

    public function test_getConfig(): void
    {
        $instance = new $this->myclass();
        $value = $instance->getConfig(1);
        $this->assertInstanceOf($this->configItemClass, $value);
    }

    public function test_getConfig100(): void
    {
        $instance = new $this->myclass();
        $value = $instance->getConfig(1, true);
        $this->assertInstanceOf($this->configItemClass, $value);
    }

    public function test_insertConfig(): void
    {
        $instance = new $this->myclass();
        $item = new XoopsConfigItem();
        $item->setDirty();
        $item->setNew();
        $item->setVar('conf_title', 'CONFTITLE_DUMMY_FOR_TESTS');
        $value = $instance->insertConfig($item);
        $this->assertTrue((int) $value > 0);
    }

    public function test_deleteConfig(): void
    {
        $instance = new $this->myclass();
        $item = new XoopsConfigItem();
        $item->setDirty();
        $item->setNew();
        $item->setVar('conf_title', 'CONFTITLE_DUMMY_FOR_TESTS');
        $value = $instance->insertConfig($item);
        $this->assertTrue((int) $value > 0);

        $ret = $instance->deleteConfig($item);
        $this->assertTrue($ret);
    }

    public function test_getConfigs(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigs();
        $this->assertInternalType('array', $ret);
    }

    public function test_getConfigCount(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigCount();
        $this->assertInternalType('numeric', $ret);
    }

    public function test_getConfigsByCat(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigsByCat(1);
        $this->assertInternalType('array', $ret);
    }

    public function test_createConfigOption(): void
    {
        $instance = new $this->myclass();
        $value = $instance->createConfigOption();
        $this->assertInstanceOf($this->configOptionClass, $value);
    }

    public function test_getConfigOption(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigOption(1);
        $this->assertInternalType('object', $ret);
    }

    public function test_getConfigOptions(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigOptions();
        $this->assertInternalType('array', $ret);
    }

    public function test_getConfigOptionsCount(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigOptionsCount();
        $this->assertInternalType('numeric', $ret);
    }

    public function test_getConfigList(): void
    {
        $instance = new $this->myclass();
        $ret = $instance->getConfigList(1);
        $this->assertInternalType('array', $ret);
    }

    public function test_deleteAll(): void
    {
        $instance = new $this->myclass();
        $criteria = new Criteria('conf_title', 'CONFTITLE_DUMMY_FOR_TESTS');
        $configs = $instance->getConfigs($criteria);
        if (is_array($configs)) {
            foreach ($configs as $config) {
                $value = $instance->deleteConfig($config);
                $this->assertTrue($value >= 1);
            }
        }
    }
}
