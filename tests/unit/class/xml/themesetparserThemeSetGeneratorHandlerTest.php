<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class ThemeSetGeneratorHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'ThemeSetGeneratorHandler';

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
        $this->assertSame('generator', $name);
    }

    public function test_handleCharacterData(): void
    {
        $instance = $this->object;

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['themeset', 'themeset'];
        $data = 'data';
        $x = $instance->handleCharacterData($parser, $data);
        $this->assertNull($x);
        $this->assertSame($data, $parser->getThemeSetData('generator'));

        $input = 'input';
        $parser = new XoopsThemeSetParser($input);
        $parser->tags = ['dummy', 'dummy'];
        $data = 'data';
        $x = $instance->handleCharacterData($parser, $data);
        $this->assertNull($x);
        $this->assertFalse($parser->getThemeSetData('generator'));
    }
}
