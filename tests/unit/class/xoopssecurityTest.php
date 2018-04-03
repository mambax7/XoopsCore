<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class xoopssecurityTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsSecurity';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('\\Xoops\\Core\\Security', $instance);
    }
}
