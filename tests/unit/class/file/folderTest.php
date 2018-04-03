<?php declare(strict_types=1);

require_once __DIR__.'/../../init_new.php';

class XoopsFolderHandlerTest extends \PHPUnit\Framework\TestCase
{
    protected $myClass = 'XoopsFolderHandler';

    /**
     * @var XoopsFolderHandler
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new XoopsFolderHandler();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function test___construct(): void
    {
        $instance = new $this->myClass();
        $this->assertInstanceOf($this->myClass, $instance);
    }

    public function test___construct100(): void
    {
        $this->expectException('\InvalidArgumentException');
        $instance = new $this->myClass('dir_not_exists', false);
    }

    public function test___publicProperties(): void
    {
        $items = ['path', 'sort', 'mode'];
        foreach ($items as $item) {
            $prop = new ReflectionProperty($this->myClass, $item);
            $this->assertTrue($prop->isPublic());
        }
    }

    public function testPwd(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);
        $pwd = $instance->pwd();
        $this->assertSame($dir, $pwd);

        $dir = \XoopsBaseConfig::get('var-path').'/caches/xoops_cache';
        $dir = str_replace('/', DIRECTORY_SEPARATOR, str_replace('\\', '/', $dir));
        $instance = new $this->myClass('', false, false);
        $pwd = $instance->pwd();
        $this->assertSame($dir, $pwd);
    }

    public function testCd(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);
        $cd = $instance->cd($dir);
        $this->assertSame($dir, $cd);

        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        try {
            $cd = $instance->cd($dir);
            $this->assertFalse($cd);
        } catch (\Throwable $ex) {
            $this->assertTrue(true);
        }
    }

    public function testRead(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);
        $value = $instance->read();
        $this->assertInternalType('array', $value[0]);
        $this->assertInternalType('array', $value[1]);
        $this->assertTrue(in_array(basename(__FILE__), $value[1], true));

        $value = $instance->read(false);
        $this->assertInternalType('array', $value[0]);
        $this->assertInternalType('array', $value[1]);
        $this->assertTrue(in_array(basename(__FILE__), $value[1], true));

        $file = __DIR__.'/.dummy';
        @unlink($file);
        $str = 'a string for test';
        $result = file_put_contents($file, $str);
        $value = $instance->read(false, true);
        $this->assertInternalType('array', $value[0]);
        $this->assertInternalType('array', $value[1]);
        $this->assertTrue(in_array(basename(__FILE__), $value[1], true));
        $this->assertFalse(in_array('.dummy', $value[1], true));

        $value = $instance->read(false, false);
        $this->assertTrue(in_array('.dummy', $value[1], true));
        @unlink($file);
    }

    public function testFind(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);
        $value = $instance->find('.*Test.php');
        $this->assertInternalType('array', $value);

        $value = $instance->find('.*Test.php', true);
        $this->assertInternalType('array', $value);

        $value = $instance->find('.*TestDoesntExists.php');
        $this->assertSame([], $value);
    }

    public function testFindRecursive(): void
    {
        $dir = __DIR__.'/../';
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);
        $value = $instance->findRecursive('.*Test.php', true);
        $this->assertInternalType('array', $value);
    }

    public function testIsWindowsPath(): void
    {
        $class = $this->myClass;
        $result = $class::isWindowsPath('C:\\Windows\\Temp');
        $this->assertTrue($result);
        $result = $class::isWindowsPath('unixRelativePath/test/test');
        $this->assertFalse($result);
        $result = $class::isWindowsPath('/unixAbsolutePath/test/test');
        $this->assertFalse($result);
    }

    public function testIsAbsolute(): void
    {
        $class = $this->myClass;
        $dir = __DIR__;
        $result = $class::isAbsolute($dir);
        $this->assertTrue($result);
        $result = $class::isAbsolute('/unixAbsolutePath/test/test');
        $this->assertTrue($result);
        $result = $class::isAbsolute('relativePath/test/test');
        $this->assertFalse($result);
        $result = $class::isAbsolute('relativePath\test\test');
        $this->assertFalse($result);
    }

    public function testNormalizePath(): void
    {
        $class = $this->myClass;
        $dir = 'C:\\Windows\\Temp';
        $result = $class::isWindowsPath($dir);
        $this->assertTrue($result);
        $result = $class::normalizePath($dir);
        $this->assertSame('\\', $result);

        $dir = 'unixRelativePath/test/test';
        $result = $class::isWindowsPath($dir);
        $this->assertFalse($result);
        $result = $class::normalizePath($dir);
        $this->assertSame('/', $result);
    }

    public function testCorrectSlashFor(): void
    {
        $class = $this->myClass;
        $dir = 'C:\\Windows\\Temp';
        $result = $class::isWindowsPath($dir);
        $this->assertTrue($result);
        $result = $class::correctSlashFor($dir);
        $this->assertSame('\\', $result);

        $dir = 'unixRelativePath/test/test';
        $result = $class::isWindowsPath($dir);
        $this->assertFalse($result);
        $result = $class::correctSlashFor($dir);
        $this->assertSame('/', $result);
    }

    public function testSlashTerm(): void
    {
        $class = $this->myClass;
        $dir = __DIR__;
        $result = $class::slashTerm($dir);
        $this->assertSame($dir.DIRECTORY_SEPARATOR, $result);

        $dir = __DIR__.'\\';
        $result = $class::slashTerm($dir);
        $this->assertSame($dir, $result);

        $dir = 'unixRelativePath/test/test';
        $result = $class::slashTerm($dir);
        $this->assertSame($dir.'/', $result);

        $dir = 'unixRelativePath/test/test/';
        $result = $class::slashTerm($dir);
        $this->assertSame($dir, $result);
    }

    public function testAddPathElement(): void
    {
        $class = $this->myClass;
        $element = 'element';
        $dir = __DIR__;
        $result = $class::addPathElement($dir, $element);
        $this->assertSame($dir.DIRECTORY_SEPARATOR.$element, $result);

        $dir = __DIR__.'\\';
        $result = $class::addPathElement($dir, $element);
        $this->assertSame($dir.$element, $result);

        $dir = 'unixRelativePath/test/test';
        $result = $class::addPathElement($dir, $element);
        $this->assertSame($dir.'/'.$element, $result);

        $dir = 'unixRelativePath/test/test/';
        $result = $class::addPathElement($dir, $element);
        $this->assertSame($dir.$element, $result);
    }

    public function testInXoopsPath(): void
    {
        $xoops_root_path = \XoopsBaseConfig::get('root-path');
        $dir = rtrim($xoops_root_path, '/\\').'/class';
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $value = $instance->inXoopsPath('class');
        $this->assertTrue($value);
    }

    public function testInPath(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $name = basename($dir);
        $value = $instance->inPath($name);
        $this->assertTrue($value);

        $value = $instance->inPath(__FILE__, true);
        $this->assertTrue($value);
    }

    public function testChmod(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testTree(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $value = $instance->tree($instance->path);
        $this->assertInternalType('array', $value);
        $this->assertInternalType('array', $value[0]);
        $this->assertTrue(count($value[0]) > 0);
        $this->assertInternalType('array', $value[1]);
        $this->assertTrue(count($value[1]) > 0);
    }

    public function testCreate(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $path = 'dummy_dir';
        $value = $instance->create($path);
        $this->assertTrue($value);
        $this->assertInternalType('array', $instance->messages());
        $this->assertFalse($instance->errors());

        touch($dir.'/'.$path.'/dummy1.tmp');
        touch($dir.'/'.$path.'/dummy2.tmp');

        $value = $instance->delete($path);
        $this->assertTrue($value);
        $this->assertInternalType('array', $instance->messages());
        $this->assertFalse($instance->errors());
    }

    public function testDirsize(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $value = $instance->dirsize();
        $this->assertInternalType('numeric', $value);
        $this->assertTrue($value > 0);
    }

    public function testCopy(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testMove(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testMessages(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $result = $instance->messages();
        $this->assertInternalType('array', $result);
    }

    public function testErrors(): void
    {
        $dir = __DIR__;
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $result = $instance->errors();
        $this->assertFalse($result);
    }

    public function testRealpath(): void
    {
        $dir = __DIR__;
        $base = basename(dirname($dir));
        $instance = new $this->myClass($dir, false, false);
        $this->assertFileExists($dir);

        $result = $instance->realpath($dir.'/../cache');
        $this->assertSame($base, basename(dirname($result)));
    }

    public function testIsSlashTerm(): void
    {
        $class = $this->myClass;
        $dir = 'dir\\';
        $result = $class::isSlashTerm($dir);
        $this->assertTrue($result);

        $dir = 'dir/';
        $result = $class::isSlashTerm($dir);
        $this->assertTrue($result);

        $dir = 'dir';
        $result = $class::isSlashTerm($dir);
        $this->assertFalse($result);
    }
}
