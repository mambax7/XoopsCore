<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsModule;

class movabletypeapiTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'MovableTypeApi';

    public function test___construct(): void
    {
        $params = ['p1' => 'one'];
        $response = new XoopsXmlRpcResponse();
        $module = new XoopsModule();
        $x = new $this->myclass($params, $response, $module);
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcApi', $x);
    }

    public function test_MovableTypeApi(): void
    {
        $this->markTestSkipped();
    }

    public function test_getCategoryList(): void
    {
        $this->markTestSkipped();
    }

    public function test_getPostCategories(): void
    {
        $this->markTestSkipped();
    }

    public function test_setPostCategories(): void
    {
        $this->markTestSkipped();
    }

    public function test_supportedMethods(): void
    {
        $this->markTestSkipped();
    }
}
