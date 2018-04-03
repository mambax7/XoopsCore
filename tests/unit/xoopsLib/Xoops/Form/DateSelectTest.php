<?php declare(strict_types=1);

namespace Xoops\Form;

require_once __DIR__.'/../../../init_new.php';

class DateSelectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DateSelect
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new DateSelect('Caption', 'name');
        \Xoops::getInstance()->setTheme(new \Xoops\Core\Theme\NullTheme());
        //$this->markTestSkipped('side effects');
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
    }

    public function test__construct(): void
    {
        $oldWay = new DateSelect('mycaption', 'myname');
        $newWay = new DateSelect(['caption' => 'mycaption', 'type' => 'text', 'name' => 'myname']);
        $this->assertSame($oldWay->render(), $newWay->render());
    }
}
