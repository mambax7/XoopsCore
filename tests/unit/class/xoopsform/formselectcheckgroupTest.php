<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormSelectCheckGroupTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormSelectCheckGroup';

    public function test___construct(): void
    {
        $instance = new $this->myClass('');
        $this->assertInstanceOf('Xoops\\Form\\GroupCheckbox', $instance);
    }
}
