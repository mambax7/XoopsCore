<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class GroupPermissionFormTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var GroupPermissionForm
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new GroupPermissionForm('Caption', 'name', 2, 'description');
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
        $this->object->addItem(1, 'item_name1');
        $this->object->addItem(10, 'item_name10', 1);
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<h4>Caption</h4>description') !== false);
        $this->assertTrue(strpos($value, '<form') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, '<input') !== false);
        $this->assertTrue(strpos($value, 'type="checkbox"') !== false);
        $this->assertTrue(strpos($value, '</form') !== false);
    }
}
