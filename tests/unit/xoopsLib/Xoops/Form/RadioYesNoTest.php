<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class RadioYesNoTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var RadioYesNo
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new RadioYesNo('Caption', 'name');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testRender()
    {
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<label class="radio') !== false);
        $this->assertTrue(strpos($value, '<input') !== false);
        $this->assertTrue(strpos($value, 'type="radio"') !== false);
        $this->assertTrue(strpos($value, 'value="1"') !== false);
        $this->assertTrue(strpos($value, 'value="0"') !== false);
    }
}
