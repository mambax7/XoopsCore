<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormButtonTrayTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormButtonTray';

    public function test___construct(): void
    {
        $instance = new $this->myClass('');
        $this->assertInstanceOf('Xoops\\Form\\ButtonTray', $instance);
    }
}
