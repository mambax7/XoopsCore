<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class XoopsXmlRpcDocumentTestInstance extends XoopsXmlRpcDocument
{
    public function render(): void
    {
    }

    public function getTag()
    {
        return $this->_tags;
    }
}

class XoopsXmlRpcDocumentTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsXmlRpcDocumentTestInstance';

    protected $object = null;

    protected function setUp(): void
    {
        $input = 'input';
        $this->object = new $this->myclass($input);
    }

    public function test___construct(): void
    {
        $instance = $this->object;
        $this->assertInstanceof($this->myclass, $instance);
    }

    public function test_add(): void
    {
        $instance = $this->object;

        $input = 'input';
        $object = new XoopsXmlRpcFault($input);
        $instance->add($object);
        $x = $instance->getTag();
        $this->assertSame($object, $x[0]);
    }
}
