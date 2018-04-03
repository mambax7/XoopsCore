<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class textTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCaptchaText';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('XoopsCaptchaMethod', $instance);
    }

    public function test_render(): void
    {
        $instance = new $this->myclass();

        $value = $instance->render();
        $this->assertInternalType('string', $value);
    }

    public function test_loadText(): void
    {
        $instance = new $this->myclass();

        $value = $instance->loadText();
        $this->assertInternalType('string', $value);
    }
}
