<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class ThemeSetFileTypeHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'ThemeSetFileTypeHandler';

    protected $object = null;

    protected function setUp(): void
    {
        $input = 'input';
        $this->object = new $this->myclass($input);
    }

    public function test___construct(): void
    {
        $instance = $this->object;
        $this->assertInstanceOf('XmlTagHandler', $instance);
    }

    public function test_getName(): void
    {
        $instance = $this->object;

        $name = $instance->getName();
        $this->assertSame('fileType', $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['template', 'template'];
        $data = 'something';
        $instance->handleCharacterData($parser, $data);
        $this->assertSame($data, $parser->getTempArr('type'));

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['dummy', 'dummy'];
        $data = 'something';
        $instance->handleCharacterData($parser, $data);
        $this->assertFalse($parser->getTempArr('type'));
    }
}
