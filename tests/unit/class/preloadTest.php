<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class XoopsPreloadTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsPreload';

    public function test___construct(): void
    {
        $class = $this->myclass;
        $x = $class::getInstance();
        $this->assertInstanceOf('\\Xoops\\Core\\Events', $x);
    }
}
