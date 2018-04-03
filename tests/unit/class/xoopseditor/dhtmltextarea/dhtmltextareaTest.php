<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class FormDhtmlTextAreaTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'FormDhtmlTextArea';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
        $this->assertInstanceOf('XoopsEditor', $instance);

        $items = ['_hiddenText'];
        foreach ($items as $item) {
            $reflection = new ReflectionProperty($this->myclass, $item);
            $this->assertTrue($reflection->isPrivate());
        }
    }

    public function test_render(): void
    {
        $this->markTestIncomplete();
    }
}
