<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class XoopsUserUtilityTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsUserUtility';

    public function test___construct(): void
    {
        $x = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $x);
    }

    public function test_100(): void
    {
        $this->markTestIncomplete();
    }
}
