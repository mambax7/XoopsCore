<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormTextAreaTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormTextArea';

    public function test___construct(): void
    {
        $instance = new $this->myClass('');
        $this->assertInstanceOf('Xoops\\Form\\TextArea', $instance);
    }
}
