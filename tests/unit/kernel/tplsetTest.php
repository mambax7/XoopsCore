<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

require_once XOOPS_TU_ROOT_PATH.'/kernel/tplset.php';

class legacy_tplsetTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new \XoopsTplset();
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsTplSet', $instance);
    }
}
