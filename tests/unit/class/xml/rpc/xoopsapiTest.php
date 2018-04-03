<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

use Xoops\Core\Kernel\Handlers\XoopsModule;

class xoopsapiTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsApi';

    public function test___construct(): void
    {
        $params = ['p1' => 'one'];
        $response = new XoopsXmlRpcResponse();
        $module = new XoopsModule();
        $x = new $this->myclass($params, $response, $module);
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcApi', $x);
    }

    public function test_newPost(): void
    {
        $this->markTestIncomplete();
    }

    public function test_editPost(): void
    {
        $this->markTestIncomplete();
    }

    public function test_deletePost(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getPost(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getRecentPosts(): void
    {
        $this->markTestIncomplete();
    }

    public function test_getCategories(): void
    {
        $this->markTestIncomplete();
    }
}
