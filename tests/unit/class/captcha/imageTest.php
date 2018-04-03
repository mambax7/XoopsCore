<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class imageTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCaptchaImage';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('XoopsCaptchaMethod', $instance);
    }

    public function test_isActive(): void
    {
        $instance = new $this->myclass();

        $value = $instance->isActive();
        $this->assertTrue($value);
    }

    public function test_render(): void
    {
        $instance = new $this->myclass();

        $value = $instance->render();
        $this->assertInternalType('string', $value);
    }

    public function test_loadImage(): void
    {
        $instance = new $this->myclass();

        $value = $instance->loadImage();
        $this->assertInternalType('string', $value);
    }
}
