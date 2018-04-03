<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class TableFormTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TableForm
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TableForm('Caption', 'name', 'action');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testInsertBreak()
    {
        $this->object->insertBreak();
        $value = $this->object->render();
        $this->assertTrue(strpos($value, '<tr valign="top" align="left"><td></td></tr>') !== false);
    }

    public function testRender()
    {
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, '<form') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
        $this->assertTrue(strpos($value, 'action="action"') !== false);
        $this->assertTrue(strpos($value, 'method="post"') !== false);
        $this->assertTrue(strpos($value, '</form>') !== false);
    }
}
