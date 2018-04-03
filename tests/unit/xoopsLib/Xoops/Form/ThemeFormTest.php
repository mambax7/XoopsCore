<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class ThemeFormTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ThemeForm
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ThemeForm('Caption', 'name', 'action');
        $this->markTestSkipped('Needs XoopsTpl::assign() in Xoops::tpl()');
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
        $this->assertTrue(strpos($value, 'class="break"') !== false);
        $this->assertTrue(strpos($value, '>&nbsp;<') !== false);

        $this->object->insertBreak('extra', 'class');
        $value = $this->object->render();
        $this->assertTrue(strpos($value, 'class="class"') !== false);
        $this->assertTrue(strpos($value, '>extra<') !== false);
    }

    public function testRender()
    {
        $value = $this->object->render();
        $this->assertTrue(strpos($value, '<form') !== false);
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);
        $this->assertTrue(strpos($value, 'action="action"') !== false);
        $this->assertTrue(strpos($value, '<legend>Caption</legend>') !== false);
    }
}
