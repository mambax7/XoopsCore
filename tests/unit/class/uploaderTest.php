<?php declare(strict_types=1);

require_once __DIR__.'/../init_new.php';

class uploaderTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsMediaUploader';

    protected function setUp(): void
    {
    }

    public function test___construct(): void
    {
        $upload_dir = 'upload_dir';
        $allowed_mime_types = ['toto'];
        $x = new $this->myClass($upload_dir, $allowed_mime_types);
        $this->assertInstanceOf($this->myClass, $x);
        $this->assertInstanceOf('\\Xoops\\Core\\MediaUploader', $x);
    }
}
