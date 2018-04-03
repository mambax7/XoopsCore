<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class XoopsXmlRpcStringTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcString';

    public function test___construct(): void
    {
        $value = 'string';
        $x = new $this->myclass($value);
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcTag', $x);
    }

    public function test_render(): void
    {
        $value = 'string';
        $instance = new $this->myclass($value);

        $result = $instance->render();
        $this->assertSame('<value><string>'.$instance->encode($value).'</string></value>', $result);
    }
}
