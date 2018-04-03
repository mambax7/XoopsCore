<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class RpcMemberHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'RpcMemberHandler';

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
        $this->assertSame('member', $name);
    }

    public function test_handleEndElement(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsXmlRpcParser($input);
        $workingLevelBefore = $parser->getWorkingLevel();
        $data = 'not time';
        $instance->handleBeginElement($parser, $data);
        $workingLevel = $parser->getWorkingLevel();
        $tempMember = $parser->getTempMember();
        $this->assertSame([], $tempMember);
        $this->assertNotSame($workingLevelBefore, $workingLevel);

        $instance->handleEndElement($parser, $data);
        $workingLevel = $parser->getWorkingLevel();
        $tempMember = $parser->getTempMember();
        $this->assertNull($tempMember);
        $this->assertSame($workingLevelBefore, $workingLevel);
    }
}
