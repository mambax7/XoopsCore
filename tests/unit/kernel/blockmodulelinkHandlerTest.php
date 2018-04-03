<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

require_once XOOPS_TU_ROOT_PATH.'/kernel/blockmodulelink.php';

class legacy_blockmodulelinkHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $conn = null;

    protected function setUp(): void
    {
        $this->conn = Xoops::getInstance()->db();
    }

    public function test___construct(): void
    {
        $instance = new \XoopsBlockmodulelinkHandler($this->conn);
        $this->assertInstanceOf('\Xoops\Core\Kernel\Handlers\XoopsBlockModuleLinkHandler', $instance);
    }
}
