<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsCacheModelTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsCacheModel';

    public function test__construct(): void
    {
        $instance = new $this->myclass(null);
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('Xoops_Cache_Model', $instance);
    }
}
