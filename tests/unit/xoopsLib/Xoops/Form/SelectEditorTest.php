<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class SelectEditorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SelectEditor
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SelectEditor(new BlockForm());
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
        $this->assertTrue(strpos($value, '<select') !== false);
        $this->assertTrue(strpos($value, 'name="editor"') !== false);
        $this->assertTrue(strpos($value, 'size="1"') !== false);
        $this->assertTrue(strpos($value, 'id="editor"') !== false);

        $this->assertTrue(strpos($value, '<option') !== false);
        $this->assertTrue(strpos($value, 'value="textarea"') !== false);
        $this->assertTrue(strpos($value, 'value="dhtmltextarea"') !== false);
//      $this->assertTrue(false !== strpos($value, 'value="tinymce"'));
        $this->assertTrue(strpos($value, 'value="tinymce4"') !== false);
        $this->assertTrue(strpos($value, '</option>') !== false);

        $this->assertTrue(strpos($value, '</select>') !== false);
    }
}
