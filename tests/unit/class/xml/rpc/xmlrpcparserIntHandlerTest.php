<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class RpcIntHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'RpcIntHandler';

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
        $this->assertSame(['int', 'i4'], $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsXmlRpcParser($input);
        $data = 71;
        $instance->handleCharacterData($parser, $data);
        $this->assertSame($data, $parser->getTempValue());
    }
}
