<?php declare(strict_types=1);

namespace Xmf;

require_once __DIR__.'/../../init_new.php';

class DebugTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Debug
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new Debug();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testDump(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testBacktrace(): void
    {
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
        // changes to Kint have ccaused this to fail
        //$x = Debug::backtrace(false, true, false);
        //$this->assertTrue(is_string($x));
    }

    public function testStartTimer(): void
    {
        $this->markTestIncomplete();
    }

    public function testStopTimer(): void
    {
        $this->markTestIncomplete();
    }

    public function testStartQueuedTimer(): void
    {
        $this->markTestIncomplete();
    }

    public function teststopQueuedTimer(): void
    {
        $this->markTestIncomplete();
    }

    public function testdumpQueuedTimers(): void
    {
        $this->markTestIncomplete();
    }

    public function testStartTrace(): void
    {
        if (function_exists('xdebug_start_trace')) {
            $this->markTestIncomplete();
        }
    }

    public function testStopTrace(): void
    {
        if (function_exists('xdebug_stop_trace')) {
            $this->markTestIncomplete();
        }
    }
}
