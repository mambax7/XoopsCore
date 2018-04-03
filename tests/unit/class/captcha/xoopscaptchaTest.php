<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class xoopscaptchaTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCaptcha';

    /**
     * @var XoopsCaptcha
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $class = $this->myclass;
        $this->object = $class::getInstance();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function test___publicProperties(): void
    {
        $items = ['handler', 'active', 'path_basic', 'path_plugin', 'configPath', 'name', 'config', 'message'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function testGetInstance(): void
    {
        $this->assertInstanceOf('XoopsCaptcha', $this->object);

        $instance = $this->object;
        $this->assertInternalType('string', $instance->path_basic);
        $this->assertInternalType('string', $instance->path_plugin);
        $this->assertInternalType('string', $instance->configPath);
        $this->assertInternalType('array', $instance->config);
        $this->assertInternalType('string', $instance->name);

        $class = $this->myclass;
        $instance2 = $class::getInstance();
        $this->assertSame($this->object, $instance2);
    }

    public function testLoadConfig(): void
    {
        $x = $this->object->loadConfig();
        $this->assertInternalType('array', $x);
        $this->assertTrue(isset($x['disabled']));
        $this->assertTrue(isset($x['mode']));
        $this->assertTrue(isset($x['name']));
        $this->assertTrue(isset($x['skipmember']));
        $this->assertTrue(isset($x['maxattempts']));

        $x = $this->object->loadConfig('text');
        $this->assertInternalType('array', $x);
        $this->assertTrue(isset($x['num_chars']));
    }

    public function testLoadBasicConfig(): void
    {
        $x = $this->object->loadBasicConfig();
        $this->assertInternalType('array', $x);
        $this->assertTrue(isset($x['disabled']));
        $this->assertTrue(isset($x['mode']));
        $this->assertTrue(isset($x['name']));
        $this->assertTrue(isset($x['skipmember']));
        $this->assertTrue(isset($x['maxattempts']));
    }

    public function testReadConfig(): void
    {
        $x = $this->object->readConfig('captcha.config');
        $this->assertInternalType('array', $x);
        $this->assertTrue(isset($x['disabled']));
        $this->assertTrue(isset($x['mode']));
        $this->assertTrue(isset($x['name']));
        $this->assertTrue(isset($x['skipmember']));
        $this->assertTrue(isset($x['maxattempts']));
    }

    public function testWriteConfig(): void
    {
        $instance = $this->object;
        $filename = 'test.config';
        $x = $instance->writeConfig($filename, $instance->config);
        $this->assertTrue($x);
        $file = $instance->configPath.$filename.'.php';
        $this->assertFileExists($file);
        @unlink($file);
    }

    public function testIsActive(): void
    {
        $instance = $this->object;
        $instance->active = true;
        $x = $instance->isActive();
        $this->assertTrue($x);
        $instance->active = null;

        $save = $instance->config['disabled'];
        $instance->config['disabled'] = true;
        $x = $instance->isActive();
        $this->assertFalse($x);
        $instance->config['disabled'] = $save;
    }

    public function testLoadHandler(): void
    {
        $instance = $this->object;
        $handler = 'text';
        $x = $instance->loadHandler($handler);
        $this->assertinstanceOf('XoopsCaptchaText', $x);
    }

    public function testSetConfigs(): void
    {
        $instance = $this->object;
        $config = ['dummy1' => 1, 'dummy2' => 2, 'message' => 'message'];
        $x = $instance->setConfigs($config);
        $this->assertTrue($x);
        $this->assertSame(1, $instance->config['dummy1']);
        $this->assertSame(2, $instance->config['dummy2']);
        $this->assertSame('message', $instance->message);
    }

    public function testVerify(): void
    {
        $instance = $this->object;
        $instance->active = false;
        $sessionName = $instance->name;
        $_SESSION = [];
        $_SESSION["{$sessionName}_skipmember"] = 'user1';
        $_SESSION["{$sessionName}_maxattempts"] = 11;
        $_SESSION["{$sessionName}_attempt"] = 1;
        $x = $instance->verify();
        $this->assertTrue($x);
    }

    public function testGetCaption(): void
    {
        $instance = $this->object;
        $x = $instance->getCaption();
        $this->assertSame(XoopsLocale::CONFIRMATION_CODE, $x);
    }

    public function testGetMessage(): void
    {
        $instance = $this->object;
        $instance->message = ['message1', 'message2'];
        $x = $instance->getMessage();
        $this->assertSame(implode('<br />', $instance->message), $x);
    }

    public function testDestroyGarbage(): void
    {
        $instance = $this->object;
        $x = $instance->destroyGarbage();
        $this->assertTrue($x);
    }

    public function testRender(): void
    {
        $instance = $this->object;
        $x = $instance->render();
        $this->assertInternalType('string', $x);
    }

    public function testRenderValidationJS(): void
    {
        $instance = $this->object;
        $x = $instance->renderValidationJS();
        $this->assertSame('', $x);
    }

    public function testSetCode(): void
    {
        $instance = $this->object;
        $x = $instance->setCode();
        $this->assertFalse($x);
        $x = $instance->setCode('code');
        $this->assertTrue($x);
    }

    public function testLoadForm(): void
    {
        $instance = $this->object;
        $x = $instance->loadForm();
        $this->assertInternalType('string', $x);
    }
}
