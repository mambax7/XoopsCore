<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFormSelectEditorTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFormSelectEditor';

    public function test___construct(): void
    {
        $form = new \Xoops\Form\SimpleForm('title', 'name', 'action');
        $instance = new $this->myClass($form);
        $this->assertInstanceOf('Xoops\\Form\\SelectEditor', $instance);
    }
}
