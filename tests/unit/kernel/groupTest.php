<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

require_once XOOPS_TU_ROOT_PATH.'/kernel/group.php';

class legacy_groupTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new \XoopsGroup();
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsGroup', $instance);
    }
}
