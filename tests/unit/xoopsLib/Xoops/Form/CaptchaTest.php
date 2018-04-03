<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class CaptchaTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Captcha
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Captcha('Caption', 'name');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testSetConfig(): void
    {
        $value = $this->object->setConfig('dummy_name', 'dummy_value');
        $this->assertTrue($value);

        $handler = \XoopsCaptcha::getInstance();
        $configs = $handler->config;
        $this->assertInternalType('array', $configs);
        $this->assertSame('dummy_value', $configs['dummy_name']);
    }

    public function testRender(): void
    {
        $value = $this->object->render();
        $this->assertInternalType('string', $value);
    }

    public function testRenderValidationJS(): void
    {
        $value = $this->object->renderValidationJS();
        $this->assertInternalType('string', $value);
    }
}
