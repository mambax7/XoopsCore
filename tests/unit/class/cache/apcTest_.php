<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsCacheApcTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCacheApc';

    public function test__construct(): void
    {
        $instance = new $this->myclass(null);
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('Xoops_Cache_Apc', $instance);
    }
}
