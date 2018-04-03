<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsCaptchaMethodTestInstance extends XoopsCaptchaMethod
{
}

class XoopsCaptchaMethodTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCaptchaMethodTestInstance';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('XoopsCaptchaMethod', $instance);
    }

    public function test___construct100(): void
    {
        $handler = 'toto';
        $instance = new $this->myclass($handler);
        $this->assertSame($handler, $instance->handler);
    }

    public function test___publicProperties(): void
    {
        $items = ['handler', 'config', 'code'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function test_isActive(): void
    {
        $instance = new $this->myclass();

        $value = $instance->isActive();
        $this->assertTrue($value);
    }

    public function test_loadConfig(): void
    {
        $instance = new $this->myclass();

        $instance->loadConfig();
        $this->assertInternalType('array', $instance->config);
    }

    public function test_getCode(): void
    {
        $instance = new $this->myclass();

        $instance->code = 100;
        $value = $instance->getCode();
        $this->assertSame('100', $value);
    }

    public function test_render(): void
    {
        $instance = new $this->myclass();

        $value = $instance->render();
        $this->assertSame('', $value);
    }

    public function test_renderValidationJS(): void
    {
        $instance = new $this->myclass();

        $value = $instance->renderValidationJS();
        $this->assertSame('', $value);
    }

    public function test_verify(): void
    {
        $instance = new $this->myclass();

        $value = $instance->verify();
        $this->assertFalse($value);
    }

    public function test_verify100(): void
    {
        $instance = new $this->myclass();

        $sessionName = 'SESSION_NAME_';
        $_SESSION["{$sessionName}_code"] = 'toto';
        $_POST[$sessionName] = ' ToTo ';
        $value = $instance->verify($sessionName);
        $this->assertTrue($value);
        unset($_SESSION["{$sessionName}_code"], $_POST[$sessionName]);
    }

    public function test_verify200(): void
    {
        $instance = new $this->myclass();

        $sessionName = 'SESSION_NAME_';
        $_SESSION["{$sessionName}_code"] = 'toto';
        $_POST[$sessionName] = ' ToTo ';
        $instance->config['casesensitive'] = true;
        $value = $instance->verify($sessionName);
        $this->assertFalse($value);
        $_POST[$sessionName] = ' toto ';
        $value = $instance->verify($sessionName);
        $this->assertTrue($value);
        unset($_SESSION["{$sessionName}_code"], $_POST[$sessionName],$instance->config['casesensitive']);
    }

    public function test_destroyGarbage(): void
    {
        $instance = new $this->myclass();

        $value = $instance->destroyGarbage();
        $this->assertTrue($value);
    }
}
