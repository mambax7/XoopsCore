<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class XoopsXmlRpcResponseTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcResponse';

    protected $object = null;

    protected function setUp(): void
    {
        $input = 'input';
        $this->object = new $this->myclass($input);
    }

    public function test___construct(): void
    {
        $instance = $this->object;
        $this->assertInstanceof('XoopsXmlRpcDocument', $instance);
    }

    public function test_render(): void
    {
        $instance = $this->object;

        $x = $instance->render();
        $this->assertInternalType('string', $x);
        $this->assertTrue(!empty($x));
    }
}
