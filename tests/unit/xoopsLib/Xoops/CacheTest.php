<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class Xoops_CacheTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = '\Xoops\Cache';

    protected function setUp(): void
    {
    }

    public function test_config(): void
    {
        $class = new \Xoops\Cache();
        $this->assertInstanceOf('\Xoops\Core\Cache\Legacy', $class);
    }
}
