<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class ColorPickerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ColorPicker
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new ColorPicker('Caption', 'name');
        \Xoops::getInstance()->setTheme(new \Xoops\Core\Theme\NullTheme());
        //$this->markTestSkipped('side effects');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testRender(): void
    {
        $level = ob_get_level();
        $value = $this->object->render();
        while (ob_get_level() > $level) {
            ob_end_flush();
        }
        $this->assertInternalType('string', $value);
    }

    public function testRenderValidationJS(): void
    {
        $value = $this->object->renderValidationJS();
        $this->assertInternalType('string', $value);
    }

    public function test__construct(): void
    {
        $oldWay = new ColorPicker('mycaption', 'myname');
        $newWay = new ColorPicker(['caption' => 'mycaption', 'type' => 'text', 'name' => 'myname']);

        $this->assertSame(substr($oldWay->render(), 0, 18), substr($newWay->render(), 0, 18));
        $this->assertSame(substr($oldWay->render(), -40), substr($newWay->render(), -40));
        $this->assertSame(strlen($oldWay->render()), strlen($newWay->render()));
    }
}
