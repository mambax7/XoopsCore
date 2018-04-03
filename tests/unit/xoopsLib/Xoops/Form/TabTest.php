<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class TabTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Tab
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Tab('Caption', 'name');
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
        $button = new Button('Caption', 'name');
        $this->object->addElement($button);
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<div class="form-group">') !== false);
        $this->assertTrue(strpos($value, '<label>Caption</label>') !== false);
        $this->assertTrue(strpos($value, 'class="btn btn-default"') !== false);
        $this->assertTrue(strpos($value, '<input') !== false);
        $this->assertTrue(strpos($value, 'type="button"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
    }
}
