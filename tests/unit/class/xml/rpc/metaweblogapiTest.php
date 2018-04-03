<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsModule;

class metaweblogapiTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'MetaWeblogApi';

    public function test___construct(): void
    {
        $params = ['p1' => 'one'];
        $response = new XoopsXmlRpcResponse();
        $module = new XoopsModule();
        $x = new $this->myclass($params, $response, $module);
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcApi', $x);
    }

    public function test_MetaWeblogApi(): void
    {
        $this->markTestSkipped();
    }

    public function test_newPost(): void
    {
        $this->markTestSkipped();
    }

    public function test_editPost(): void
    {
        $this->markTestSkipped();
    }

    public function test_getPost(): void
    {
        $this->markTestSkipped();
    }

    public function test_getRecentPosts(): void
    {
        $this->markTestSkipped();
    }

    public function test_getCategories(): void
    {
        $this->markTestSkipped();
    }
}
