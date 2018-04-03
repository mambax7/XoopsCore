<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class recaptchaTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCaptchaRecaptcha';

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

        $instance->config['public_key'] = 'public_key';
        $value = $instance->render();
        $this->assertInternalType('string', $value);
    }

    public function test_verify(): void
    {
        $instance = new $this->myclass();

        $instance->config['public_key'] = 'public_key';
        $value = $instance->verify('session');
        $this->assertFalse($value);
    }

    public function test_verify100(): void
    {
        if (false === ($fs = @fsockopen('www.google.com', 80, $errno, $errstr, 10))) {
            $this->markTestSkipped('');
        }
        $instance = new $this->myclass();

        $instance->config['private_key'] = 'private_key';
        $_POST['recaptcha_challenge_field'] = 'toto';
        $_POST['recaptcha_response_field'] = 'toto';
        $value = $instance->verify('session');
        $this->assertFalse($value);
    }
}
