<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class XoopsXmlRpcDoubleTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcDouble';

    public function test___construct(): void
    {
        $value = 1.0;
        $x = new $this->myclass($value);
        $this->assertInstanceof($this->myclass, $x);
        $this->assertInstanceof('XoopsXmlRpcTag', $x);
    }

    public function test_render(): void
    {
        $value = 71.71;
        $instance = new $this->myclass($value);

        $result = $instance->render();
        $this->assertSame('<value><double>'.$value.'</double></value>', $result);
    }
}
