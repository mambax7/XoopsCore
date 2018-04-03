<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class EventsTest extends \PHPUnit\Framework\TestCase
{
    public $dummy_result = null;

    protected $myclass = '\Xoops\Core\Events';

    /**
     * @var Class
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $class = $this->myclass;
        $this->object = $class::getInstance();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function test_getInstance(): void
    {
        $class = $this->myclass;
        $instance = $class::getInstance();
        $this->assertInstanceOf($class, $instance);

        $instance1 = $class::getInstance();
        $this->assertSame($instance1, $instance);
    }

    public function test_initializeListeners(): void
    {
        $instance = $this->object;

        $result = $instance->getEvents();
        $this->assertInternalType('array', $result);
    }

    public function dummy_callback($arg): void
    {
        $this->dummy_result = $arg;
    }

    public function test_triggerEvent(): void
    {
        $instance = $this->object;

        $callback = [$this, 'dummy_callback'];
        $name = 'dummy.listener';
        $instance->addListener($name, $callback);

        $instance->triggerEvent('dummy.listener', [1, 2]);
        $this->assertSame([1, 2], $this->dummy_result);
    }

    public function test_hasListeners(): void
    {
        $instance = $this->object;

        $result = $instance->hasListeners('listener_doesnt_exist');
        $this->assertFalse($result);

        $result = $instance->hasListeners('core.header.checkcache');
        $this->assertTrue($result);
    }
}
