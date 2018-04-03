<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormSelectThemeTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormSelectTheme';

    public function test___construct(): void
    {
        $instance = new $this->myClass('', '');
        $this->assertInstanceOf('Xoops\\Form\\SelectTheme', $instance);
    }
}
