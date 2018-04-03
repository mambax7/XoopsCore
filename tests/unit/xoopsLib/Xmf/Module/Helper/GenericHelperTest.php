<?php declare(strict_types=1);

namespace Xmf\Module\Helper;

require_once __DIR__.'/../../../../init_new.php';

class GenericHelperTestHelper extends GenericHelper
{
    public static function getHelper($dirname = 'system')
    {
        $instance = new static($dirname);

        return $instance;
    }
}

if (!function_exists('xoops_getHandler')) {
    function xoops_getHandler($name, $optional = false)
    {
        $handler = \Xoops\Core\Handler\Factory::newSpec()->scheme('kernel')->name($name)->optional((bool) $optional)->build();

        return $handler;
    }
}

class GenericHelperTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var GenericHelper
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = GenericHelperTestHelper::getHelper();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetModule(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testGetConfig(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testGetHandler(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testLoadLanguage(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testSetDebug(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testAddLog(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testIsCurrentModule(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testIsUserAdmin(): void
    {
        include_once XOOPS_ROOT_PATH.'/kernel/user.php';
        $GLOBALS['xoopsUser'] = '';
        $this->assertFalse($this->object->isUserAdmin());

        $GLOBALS['xoopsUser'] = new \XoopsUser();
        $this->assertFalse($this->object->isUserAdmin());
    }

    public function testUrl(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testPath(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testRedirect(): void
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
