<?php declare(strict_types=1);

namespace Xoops\Test\Core\Locale;

use Xoops\Core\Locale\LegacyCodes;

class LegacyCodesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var LegacyCodes
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new LegacyCodes();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    public function testGetLegacyNameSingle(): void
    {
        $languageArray = LegacyCodes::getLegacyName('fr_FR');
        $this->assertInternalType('array', $languageArray);
        $this->assertSame(1, count($languageArray));
        $this->assertTrue(in_array('french', $languageArray, true));
    }

    public function testGetLegacyNameNone(): void
    {
        $languageArray = LegacyCodes::getLegacyName('xx_XX');
        $this->assertInternalType('array', $languageArray);
        $this->assertSame(0, count($languageArray));
    }

    public function testGetLegacyNameMultiple(): void
    {
        $languageArray = LegacyCodes::getLegacyName('pt_BR');
        $this->assertInternalType('array', $languageArray);
        $this->assertSame(2, count($languageArray));
        $this->assertTrue(in_array('portuguesebr', $languageArray, true));
        $this->assertTrue(in_array('brazilian', $languageArray, true));
    }

    public function testGetLegacyNameByShort(): void
    {
        $languageArray = LegacyCodes::getLegacyName('zh_Hans');
        $this->assertTrue(in_array('schinese', $languageArray, true));
    }

    public function testGetLegacyNameByFull(): void
    {
        $languageArray = LegacyCodes::getLegacyName('zh-Hans-CN');
        $this->assertTrue(in_array('schinese', $languageArray, true));
    }

    public function testGetLocaleCode(): void
    {
        $this->assertSame('en-Latn-US', LegacyCodes::getLocaleCode('english'));
        $this->assertSame('zh-Hant-TW', LegacyCodes::getLocaleCode('chinese_zh'));
        $this->assertNull(LegacyCodes::getLocaleCode('piglatin'));
    }
}
