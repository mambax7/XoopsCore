<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class ThemeSetModuleHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'ThemeSetModuleHandler';

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
        $this->assertSame('module', $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['template', 'template'];
        $data = 'data';
        $x = $instance->handleCharacterData($parser, $data);
        $this->assertNull($x);
        $this->assertSame($data, $parser->getTempArr('module'));

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['image', 'image'];
        $data = 'data';
        $instance->handleCharacterData($parser, $data);
        $this->assertSame($data, $parser->getTempArr('module'));

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['dummy', 'dummy'];
        $data = 'data';
        $instance->handleCharacterData($parser, $data);
        $this->assertFalse($parser->getTempArr('module'));
    }
}
