<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

require_once XOOPS_TU_ROOT_PATH.'/kernel/module.php';

class legacy_moduleHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new \XoopsModuleHandler($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsModuleHandler', $instance);
    }
}
