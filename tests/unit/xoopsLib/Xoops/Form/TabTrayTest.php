<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

class TabTrayTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var TabTray
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TabTray('Caption', 'name');
        \Xoops::getInstance()->setTheme(new \Xoops\Core\Theme\NullTheme());
        //$this->markTestSkipped('side effects');
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
        $text = new Text('Caption', 'name', 10, 20, 'value', 'placeholder');
        $this->object->addElement($text);
        $value = $this->object->render();
        $this->assertTrue(is_string($value));
        $this->assertTrue(strpos($value, 'id="tabs_name"') !== false);
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
