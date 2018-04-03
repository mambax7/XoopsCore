<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class XoopsXmlRpcStructTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcStruct';

    public function test___construct(): void
    {
        $x = new $this->myclass();
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcTag', $x);
    }

    public function test_render(): void
    {
        $instance = new $this->myclass();

        $value = $instance->render();
        $this->assertSame('<value><struct></struct></value>', $value);

        $instance->add('instance', clone $instance);
        $value = $instance->render();
        $expected = '<value><struct>'
            .'<member><name>instance</name>'
            .'<value><struct></struct></value>'
            .'</member></struct></value>';
        $this->assertSame($expected, $value);
    }
}
