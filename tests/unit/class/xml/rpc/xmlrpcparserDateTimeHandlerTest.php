<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class RpcDateTimeHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'RpcDateTimeHandler';

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
        $this->assertSame('dateTime.iso8601', $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsXmlRpcParser($input);
        $data = 'not time';
        $instance->handleCharacterData($parser, $data);
        $this->assertInternalType('int', $parser->getTempValue());

        $input = 'input';
        $parser = new XoopsXmlRpcParser($input);
        $data = '1900 01 30T01:30:01';
        $instance->handleCharacterData($parser, $data);
        $this->assertInternalType('int', $parser->getTempValue());
    }
}
