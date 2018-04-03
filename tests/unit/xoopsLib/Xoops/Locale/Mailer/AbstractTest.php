<?php declare(strict_types=1);

require_once __DIR__.'/../../../../init_new.php';

class Xoops_Locale_Mailer_AbstractTestInstance extends Xoops_Locale_Mailer_Abstract
{
}

class Xoops_Locale_Mailer_AbstractTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'Xoops_Locale_Mailer_AbstractTestInstance';

    public function test___construct(): void
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $instance);
    }

    public function test_encodeFromName(): void
    {
        $instance = new $this->myclass();
        $text = 'foo';
        $value = $instance->encodeFromName($text);
        $this->assertSame($text, $value);
    }

    public function test_encodeSubject(): void
    {
        $instance = new $this->myclass();
        $text = 'foo';
        $value = $instance->encodeSubject($text);
        $this->assertSame($text, $value);
    }
}
