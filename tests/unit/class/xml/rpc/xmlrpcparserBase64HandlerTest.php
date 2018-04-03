<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class RpcBase64HandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'RpcBase64Handler';

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
        $this->assertSame('base64', $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsXmlRpcParser($input);
        $value = '71';
        $data = base64_encode($value);
        $instance->handleCharacterData($parser, $data);
        $this->assertSame($value, $parser->getTempValue());
    }
}
