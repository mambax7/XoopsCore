<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class RpcMethodNameHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'RpcMethodNameHandler';

    protected $object = null;

    protected function setUp(): void
    {
        $this->object = new $this->myclass();
    }

    public function test___construct(): void
    {
        $instance = $this->object;
        $this->assertInstanceof('XmlTagHandler', $instance);
    }

    public function test_getName(): void
    {
        $instance = $this->object;

        $name = $instance->getName();
        $this->assertSame('methodName', $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsXmlRpcParser($input);
        $data = 'something';
        $instance->handleCharacterData($parser, $data);
        $this->assertSame($data, $parser->getMethodName());
    }
}
