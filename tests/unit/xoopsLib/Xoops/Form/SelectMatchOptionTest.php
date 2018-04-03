<?php

namespace Xoops\Form;

require_once(__DIR__ . '/../../../init_new.php');

require_once(XOOPS_TU_ROOT_PATH . '/include/defines.php');

class SelectMatchOptionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SelectMatchOption
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SelectMatchOption('Caption', 'name');
        //$this->markTestSkipped('side effects defines.php not included');
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
        $this->assertTrue(strpos($value, 'name="name"') !== false);
        $this->assertTrue(strpos($value, 'size="1"') !== false);
        $this->assertTrue(strpos($value, 'title="Caption"') !== false);
        $this->assertTrue(strpos($value, 'id="name"') !== false);

        $this->assertTrue(strpos($value, '<option') !== false);
        $this->assertTrue(strpos($value, 'value="0"') !== false);
        $this->assertTrue(strpos($value, '</option>') !== false);
    }

    public function test__construct()
    {
        $oldWay = new SelectMatchOption('mycaption', 'myname', XOOPS_MATCH_START);
        $newWay = new SelectMatchOption([
            'caption' => 'mycaption',
            'name' => 'myname',
            'value' => XOOPS_MATCH_START,
        ]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
