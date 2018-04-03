<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class TextAreaTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TextArea
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TextArea('Caption', 'name', 'value', 5, 10, 'placeholder');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testGetRows()
    {
        $value = $this->object->getRows();
        $this->assertSame(5, $value);
    }

    public function testGetCols()
    {
        $value = $this->object->getCols();
        $this->assertSame(10, $value);
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
        $this->assertTrue(strpos($value, '<textarea') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'rows="5"') !== false);
        $this->assertTrue(strpos($value, 'cols="10"') !== false);
        $this->assertTrue(strpos($value, 'placeholder="placeholder"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
        $this->assertTrue(strpos($value, '>value<') !== false);
    }

    public function test__construct()
    {
        $oldWay = new TextArea('mycaption', 'myname', 'myvalue');
        $newWay = new TextArea(['caption' => 'mycaption', 'name' => 'myname', 'value' => 'myvalue', ]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
