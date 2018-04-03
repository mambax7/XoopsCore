<?php

require_once __DIR__.'/../init_new.php';

class themeTest extends \PHPUnit\Framework\TestCase
{
    protected $myclass = 'XoopsTheme';

    protected function setUp()
    {
    }

    public function testContracts()
    {
        $instance = new $this->myclass();
        $this->assertInstanceOf('\Xoops\Core\Theme\XoopsTheme', $instance);
    }

    public function test___construct()
    {
        $theme = new $this->myclass();
        $this->assertInstanceOf($this->myclass, $theme);
        $this->assertSame(true, $theme->renderBanner);
        $this->assertSame('', $theme->folderName);
        $this->assertSame('', $theme->path);
        $this->assertSame('', $theme->url);
        $this->assertSame(true, $theme->bufferOutput);
        $this->assertSame('theme.tpl', $theme->canvasTemplate);
        $this->assertSame('themes', $theme->themesPath);
        $this->assertSame('', $theme->contentTemplate);
        $this->assertSame(0, $theme->contentCacheLifetime);
        $this->assertSame(null, $theme->contentCacheId);
        $this->assertSame('', $theme->content);
        // may change $this->assertSame(array('XoopsThemeBlocksPlugin'), $theme->plugins);
        $this->assertSame(0, $theme->renderCount);
        $this->assertSame(false, $theme->template);
        $this->assertSame([], $theme->metas['meta']);
        $this->assertSame([], $theme->metas['link']);
        $this->assertSame([], $theme->metas['script']);
        $this->assertSame([], $theme->htmlHeadStrings);
        $this->assertSame([], $theme->templateVars);
        $this->assertSame(true, $theme->use_extra_cache_id);
        $this->assertSame('default', $theme->headersCacheEngine);
    }
}
