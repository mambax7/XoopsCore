<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class SelectGroupTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var SelectGroup
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new SelectGroup('Caption', 'name');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testRender(): void
    {
        $value = $this->object->render();
        $this->assertInternalType('string', $value);
        $this->assertTrue(false !== strpos($value, '<select'));
        $this->assertTrue(false !== strpos($value, 'name="name"'));
        $this->assertTrue(false !== strpos($value, 'size="1"'));
        $this->assertTrue(false !== strpos($value, 'title="Caption"'));
        $this->assertTrue(false !== strpos($value, 'id="name"'));

        $this->assertTrue(false !== strpos($value, '<option'));
        $this->assertTrue(false !== strpos($value, 'value="1"'));
        $this->assertTrue(false !== strpos($value, '</option>'));
    }

    public function test__construct(): void
    {
        $oldWay = new SelectGroup('mycaption', 'myname', true, 2);
        $newWay = new SelectGroup([
            'caption' => 'mycaption',
            'name' => 'myname',
            ':include_anon' => true,
            'value' => 2,
        ]);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
