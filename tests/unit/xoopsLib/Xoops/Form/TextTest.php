<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class TextTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Text
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Text('Caption', 'name', 10, 20, 'value', 'placeholder');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetSize(): void
    {
        $value = $this->object->getSize();
        $this->assertSame(10, $value);
    }

    public function testGetMaxlength(): void
    {
        $value = $this->object->getMaxlength();
        $this->assertSame(20, $value);
    }

    public function testGetPlaceholder(): void
    {
        $value = $this->object->getPlaceholder();
        $this->assertSame('placeholder', $value);
    }

    public function testRender(): void
    {
        $value = $this->object->render();
        $this->assertInternalType('string', $value);
        $this->assertTrue(false !== strpos($value, '<input'));
        $this->assertTrue(false !== strpos($value, 'type="text"'));
        $this->assertTrue(false !== strpos($value, 'name="name"'));
        $this->assertTrue(false !== strpos($value, 'size="10"'));
        $this->assertTrue(false !== strpos($value, 'maxlength="20"'));
        $this->assertTrue(false !== strpos($value, 'placeholder="placeholder"'));
        $this->assertTrue(false !== strpos($value, 'title="Caption"'));
        $this->assertTrue(false !== strpos($value, 'id="name"'));
        $this->assertTrue(false !== strpos($value, 'value="value"'));
    }
}
