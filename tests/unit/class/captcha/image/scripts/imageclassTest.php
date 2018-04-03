<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

class scripts_imageclassTest extends \PHPUnit\Framework\TestCase
{
    public function test___construct(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();
        $this->assertInstanceOf('XoopsCaptchaImageHandler', $image_handler);
        $this->assertInstanceOf('XoopsCaptcha', $image_handler->captcha_handler);
        $this->assertInternalType('array', $image_handler->config);
    }

    public function test_loadImage(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        @$image_handler->loadImage();
        $tmp = ob_end_clean();
        $this->assertTrue(true); // loadImage returns void
    }

    public function test_generateCode(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $image_handler->invalid = true;
        $x = $image_handler->generateCode();
        $tmp = ob_end_clean();
        $this->assertFalse($x);
    }

    public function test_createImage(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->createImage();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_getList(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();
        $fonts = $image_handler->getList('fonts', 'ttf');
        $this->assertInternalType('array', $fonts);
    }

    public function test_loadFont(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();
        $image_handler->loadFont();
        $this->assertInternalType('string', $image_handler->font);
        $this->assertTrue(false !== strpos($image_handler->font, '.ttf'));
    }

    public function test_setImageSize(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();
        $image_handler->setImageSize();
        $this->assertInternalType('int', $image_handler->width);
        $this->assertInternalType('int', $image_handler->spacing);
        $this->assertInternalType('int', $image_handler->height);
    }

    public function test_loadBackground(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();
        $value = $image_handler->loadBackground();
        $this->assertInternalType('string', $value);
        $this->assertTrue(false !== strpos($value, 'image/backgrounds/'));
    }

    public function test_createFromFile(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->createFromFile();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawCode(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawCode();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawBorder(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawBorder();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawCircles(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawCircles();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawLines(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawLines();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawRectangles(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawRectangles();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawBars(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawBars();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawEllipses(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawEllipses();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_drawPolygons(): void
    {
        $image_handler = new XoopsCaptchaImageHandler();

        ob_start();
        $value = @$image_handler->drawPolygons();
        ob_end_clean();
        $this->assertNull($value);
    }

    public function test_createImageBmp(): void
    {
        Xoops::getInstance()->disableErrorReporting();
        $image_handler = new XoopsCaptchaImageHandler();
        $image_handler->mode = 'bmp';
        ob_start();
        $value = @$image_handler->createImageBmp('not_empty_string');
        ob_end_clean();
        $this->assertSame('', $value);
    }
}
