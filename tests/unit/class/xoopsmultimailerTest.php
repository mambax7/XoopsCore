<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class xoopsmultimailerTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsMultiMailer';

    public function test___construct(): void
    {
        $x = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $x);
        $this->assertInstanceOf('\PHPMailer\PHPMailer\PHPMailer', $x);
    }
}
