<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class XoopsXmlRpcParserTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcParser';

    protected $object = null;

    protected function setUp(): void
    {
        $input = 'input';
        $this->object = new $this->myclass($input);
    }

    public function test___construct(): void
    {
        $instance = $this->object;
        $this->assertInstanceof('SaxParser', $instance);

        $handlers = $instance->tagHandlers;
        $this->assertTrue(!empty($handlers));
        $validHandlers = ['RpcMethodNameHandler', 'RpcIntHandler', 'RpcDoubleHandler', 'RpcBooleanHandler',
            'RpcStringHandler', 'RpcDateTimeHandler', 'RpcBase64Handler', 'RpcNameHandler', 'RpcValueHandler',
            'RpcMemberHandler', 'RpcStructHandler', 'RpcArrayHandler', ];
        foreach ($handlers as $h) {
            $x = get_class($h);
            $this->assertTrue(in_array($x, $validHandlers, true));
        }
    }

    public function test_setTempName(): void
    {
        $instance = $this->object;

        $data = 'something';
        $instance->setTempName($data);
        $this->assertSame($data, $instance->getTempName());
    }

    public function test_setTempValue(): void
    {
        $instance = $this->object;

        $data = 'something';
        $instance->setTempValue($data);
        $this->assertSame($data, $instance->getTempValue());

        $instance->resetTempValue();
        $this->assertNull($instance->getTempValue());
    }

    public function test_setTempMember(): void
    {
        $instance = $this->object;

        $name = 'name';
        $value = 'something';
        $instance->setTempMember($name, $value);
        $x = $instance->getTempMember();
        $this->assertSame($value, $x['name']);

        $instance->resetTempMember();
        $this->assertSame([], $instance->getTempMember());
    }

    public function test_setWorkingLevel(): void
    {
        $instance = $this->object;

        $instance->setWorkingLevel();
        $this->assertSame(0, $instance->getWorkingLevel());

        $instance->releaseWorkingLevel();
        $this->assertNull($instance->getWorkingLevel());
    }

    public function test_setTempStruct(): void
    {
        $instance = $this->object;

        $member = ['name' => 'john Doe'];
        $instance->setTempStruct($member);
        $x = $instance->getTempStruct();
        $this->assertSame($member['name'], $x['name']);

        $instance->resetTempStruct();
        $this->assertSame([], $instance->getTempStruct());
    }

    public function test_setTempArray(): void
    {
        $instance = $this->object;

        $value = 'something';
        $instance->setTempArray($value);
        $x = $instance->getTempArray();
        $this->assertSame($value, $x[0]);

        $instance->resetTempArray();
        $this->assertSame([], $instance->getTempArray());
    }

    public function test_setMethodName(): void
    {
        $instance = $this->object;

        $value = 'something';
        $instance->setMethodName($value);
        $this->assertSame($value, $instance->getMethodName());
    }

    public function test_setParam(): void
    {
        $instance = $this->object;

        $value = 'something';
        $instance->setParam($value);
        $x = $instance->getParam();
        $this->assertSame($value, $x[0]);
    }
}
