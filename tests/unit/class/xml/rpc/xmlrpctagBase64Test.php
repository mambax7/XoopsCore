<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

require_once XOOPS_ROOT_PATH.'/class/xml/rpc/xmlrpcparser.php';

class XoopsXmlRpcBase64Test extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcBase64';

    public function test___construct(): void
    {
        $value = 'value';
        $x = new $this->myclass($value);
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcTag', $x);
    }

    public function test_render(): void
    {
        $value = 'value';
        $instance = new $this->myclass($value);

        $result = $instance->render();
        $this->assertSame('<value><base64>'.base64_encode($value).'</base64></value>', $result);
    }
}
