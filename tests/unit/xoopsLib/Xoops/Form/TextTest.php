<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

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
    protected function setUp()
    {
        $this->object = new Text('Caption', 'name', 10, 20, 'value', 'placeholder');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testGetSize()
    {
        $value = $this->object->getSize();
        $this->assertSame(10, $value);
    }

    public function testGetMaxlength()
    {
        $value = $this->object->getMaxlength();
        $this->assertSame(20, $value);
    }

    public function testGetPlaceholder()
    {
        $value = $this->object->getPlaceholder();
        $this->assertSame('placeholder', $value);
    }

    public function testRender()
    {
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<input') !== false);
        $this->assertTrue(strpos($value, 'type="text"') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'size="10"') !== false);
        $this->assertTrue(strpos($value, 'maxlength="20"') !== false);
        $this->assertTrue(strpos($value, 'placeholder="placeholder"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
        $this->assertTrue(strpos($value, 'value="value"') !== false);
    }
}
