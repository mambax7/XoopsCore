<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

use Psr\Log\LogLevel;
use Xoops\Core\PreloadItem;

/**
 * Debugbar module preloads.
 *
 * @category  DebugbarLogger
 * @author    Richard Griffith <richard@geekwright.com>
 * @author    trabis <lusopoemas@gmail.com>
 * @copyright 2013 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 1.0
 * @see      http://xoops.org
 * @since     1.0
 */
class DebugbarPreload extends PreloadItem
{
    private static $registry = [];

    /**
     * eventCoreException.
     *
     * @param Exception $e an exception
     */
    public static function eventCoreException(Exception $e): void
    {
        DebugbarLogger::getInstance()->addException($e);
    }

    /**
     * add any module specific class map entries.
     *
     * @param mixed $args not used
     */
    public static function eventCoreIncludeCommonClassmaps($args): void
    {
        $path = dirname(__DIR__);
        XoopsLoad::addMap([
            'debugbarlogger' => $path.'/class/debugbarlogger.php',
        ]);
    }

    /**
     * eventCoreIncludeCommonStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreIncludeCommonStart($args): void
    {
        $logger = DebugbarLogger::getInstance();

        $logger->enable(); //until we get a db connection debug is enabled
        //if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
        //    $logger->getDebugbar()['time']->addMeasure('Loading', $_SERVER['REQUEST_TIME_FLOAT'], microtime(true));
        //}
        $logger->startTime();
        $logger->startTime('XOOPS Boot');
    }

    /**
     * core.database.noconn.
     *
     * @param array $args arguments
     */
    public static function eventCoreDatabaseNoconn(array $args): void
    {
        if (class_exists('DebugbarLogger')) {
            /* @var $db Xoops\Core\Database\Connection */
            $db = $args[0];
            DebugbarLogger::getInstance()->log(LogLevel::ALERT, $db->error(), ['errno' => $db->errno()]);
        }
    }

    /**
     * eventCoreDatabaseNodb.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreDatabaseNodb($args): void
    {
        if (class_exists('DebugbarLogger')) {
            /* @var $db Xoops\Core\Database\Connection */
            $db = $args[0];
            DebugbarLogger::getInstance()->log(LogLevel::ALERT, $db->error(), ['errno' => $db->errno()]);
        }
    }

    /**
     * eventCoreIncludeCommonAuthSuccess.
     */
    public static function eventCoreIncludeCommonAuthSuccess(): void
    {
        $xoops = Xoops::getInstance();
        $logger = DebugbarLogger::getInstance();
        $configs = self::getConfigs();
        if ($configs['debugbar_enable']) {
            $xoops->loadLocale();
            $xoops->loadLanguage('main', 'debugbar');
            $logger->enable();
        } else {
            $logger->disable();
        }
    }

    /**
     * eventCoreIncludeCommonEnd.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreIncludeCommonEnd($args): void
    {
        $logger = DebugbarLogger::getInstance();
        $logger->stopTime('XOOPS Boot');
        $logger->startTime('Module init');
    }

    /**
     * eventCoreTemplateConstructStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreTemplateConstructStart($args): void
    {
        $tpl = $args[0];
        $configs = self::getConfigs();
        if ($configs['debugbar_enable']) {
            $tpl->debugging_ctrl = 'URL';
        }
        if ($configs['debug_smarty_enable']) {
            $tpl->debugging = Smarty::DEBUG_ON;
        }
    }

    /**
     * eventCoreThemeRenderStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreThemeRenderStart($args): void
    {
        DebugbarLogger::getInstance()->startTime('Page rendering');
    }

    /**
     * eventCoreThemeRenderEnd.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreThemeRenderEnd($args): void
    {
        DebugbarLogger::getInstance()->stopTime('Page rendering');
        DebugbarLogger::getInstance()->addSmarty();
    }

    /**
     * eventCoreThemeCheckcacheSuccess.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreThemeCheckcacheSuccess($args): void
    {
        $template = $args[0];
        $theme = $args[1];
        DebugbarLogger::getInstance()->addExtra(
            $template,
            sprintf('Cached (regenerates every %d seconds)', $theme->contentCacheLifetime)
        );
    }

    /**
     * eventCoreThemeblocksBuildblockStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreThemeblocksBuildblockStart($args): void
    {
        /* @var $block XoopsBlock */
        $block = $args[0];
        $isCached = $args[1];
        //Logger::getInstance()->addBlock($block->getVar('name'), $isCached, $block->getVar('bcachetime'));
        $context = ['channel' => 'Blocks', 'cached' => $isCached, 'cachetime' => $block->getVar('bcachetime')];
        DebugbarLogger::getInstance()->log(LogLevel::INFO, $block->getVar('name'), $context);
    }

    /**
     * eventCoreDeprecated.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreDeprecated($args): void
    {
        $message = $args[0];
        DebugbarLogger::getInstance()->log(LogLevel::WARNING, $message, ['channel' => 'Deprecated']);
    }

    /**
     * eventCoreDisableerrorreporting.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreDisableerrorreporting($args): void
    {
        DebugbarLogger::getInstance()->disable();
    }

    /**
     * eventCoreHeaderStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreHeaderStart($args): void
    {
        $logger = DebugbarLogger::getInstance();
        $logger->stopTime('Module init');
        $logger->startTime('XOOPS output init');
    }

    /**
     * eventCoreHeaderEnd.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreHeaderEnd($args): void
    {
        $logger = DebugbarLogger::getInstance();
        $logger->stopTime('XOOPS output init');
        $logger->startTime('Module display');
    }

    /**
     * eventCoreFooterStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreFooterStart($args): void
    {
        $logger = DebugbarLogger::getInstance();
        $logger->stopTime('Module display');
    }

    /**
     * eventCoreFooterEnd.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreFooterEnd($args): void
    {
        $logger = DebugbarLogger::getInstance();
        $logger->stopTime();
    }

    /**
     * eventCoreRedirectStart.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreRedirectStart($args): void
    {
        DebugbarLogger::getInstance()->stackData();
    }

    /**
     * eventCoreSecurityValidatetokenEnd.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreSecurityValidatetokenEnd($args): void
    {
        $logger = DebugbarLogger::getInstance();
        $logs = $args[0];
        foreach ($logs as $log) {
            $context = ['channel' => 'Extra', 'name' => $log[0]];
            $logger->log(LogLevel::INFO, $log[1], $context);
        }
    }

    /**
     * eventCoreModuleAddlog.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreModuleAddlog($args): void
    {
        $context = ['channel' => 'Extra', 'name' => $args[0]];
        DebugbarLogger::getInstance()->log(LogLevel::DEBUG, $args[1], $context);
    }

    /**
     * eventDebugLog - dump to DebugLog.
     *
     * @param mixed $args argument supplied to triggerEvent
     */
    public static function eventDebugLog($args): void
    {
        DebugbarLogger::getInstance()->dump($args);
    }

    /**
     * eventDebugTimerStart - start a timer.
     *
     * @param array $args array of name and label for timer
     */
    public static function eventDebugTimerStart(array $args): void
    {
        $args = (array) $args;
        DebugbarLogger::getInstance()->startTime($args[0], $args[1] ?? null);
    }

    /**
     * eventDebugTimerStop - start a timer.
     *
     * @param string $args name of timer
     */
    public static function eventDebugTimerStop(string $args): void
    {
        DebugbarLogger::getInstance()->stopTime($args);
    }

    /**
     * eventCoreSessionShutdown.
     *
     * @param mixed $args arguments supplied to triggerEvent
     */
    public static function eventCoreSessionShutdown($args): void
    {
        DebugbarLogger::getInstance()->renderDebugBar();
    }

    /**
     * getConfigs.
     *
     * @return array of config options
     */
    private static function getConfigs(): array
    {
        static $configs = null;

        if (null === $configs) {
            $xoops = Xoops::getInstance();
            $user_groups = $xoops->getUserGroups();
            $moduleperm_handler = $xoops->getHandlerGroupPermission();
            $helper = $xoops->getModuleHelper('debugbar');
            $mid = $helper->getModule()->getVar('mid');
            if ($moduleperm_handler->checkRight('use_debugbar', 0, $user_groups, $mid)) {
                // get default settings
                $configs['debugbar_enable'] = $helper->getConfig('debugbar_enable');
                $configs['debug_smarty_enable'] = $helper->getConfig('debug_smarty_enable');
                // override with settings
                $uchelper = $xoops->getModuleHelper('userconfigs');
                if ($xoops->isUser() && $uchelper) {
                    $config_handler = $uchelper->getHandlerConfig();
                    $user_configs =
                        $config_handler->getConfigsByUser($xoops->user->getVar('uid'), $mid);
                    if (array_key_exists('debugbar_enable', $user_configs)) {
                        $configs['debugbar_enable'] = $user_configs['debugbar_enable'];
                    }
                    if (array_key_exists('debug_smarty_enable', $user_configs)) {
                        $configs['debug_smarty_enable'] = $user_configs['debug_smarty_enable'];
                    }
                }
            } else {
                // user has no permissions, turn everything off
                $configs['debugbar_enable'] = 0;
                $configs['debug_smarty_enable'] = 0;
            }
        }

        return $configs;
    }
}
