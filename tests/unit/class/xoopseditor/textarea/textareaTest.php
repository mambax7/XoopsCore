<?php declare(strict_types=1);

require_once __DIR__.'/../../../init_new.php';

class FormTextAreaTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'FormTextArea';

    public function test___construct(): void
    {
        $class = $this->myclass;
        $instance = new $class();
        $this->assertInstanceOf($class, $instance);
        $this->assertInstanceOf('XoopsEditor', $instance);
    }
}
