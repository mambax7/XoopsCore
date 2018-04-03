<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

use DebugBar\DataCollector\MessagesCollector;
use DebugBar\StandardDebugBar;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Xoops\Core\Logger;

/**
 * Collects log information and present to PHPDebugBar for display.
 * Records information about database queries, blocks, and execution time
 * and various logs.
 *
 * @category  DebugbarLogger
 * @package   DebugbarLogger
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2013 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 1.0
 * @link      http://xoops.org
 * @since     1.0
 */
class debugbarlogger implements LoggerInterface
{
    /**
     * @var object
     */
    private $debugbar = false;

    /**
     * @var object
     */
    private $renderer = false;

    /**
     * @var object
     */
    private $activated = false;

    /**
     * @var object
     */
    private $quietmode = false;

    /**
     * constructor
     */
    public function __construct()
    {
        Logger::getInstance()->addLogger($this);
    }

    /**
     * Get a reference to the only instance of this class
     *
     * @return  object LoggerAbstract  reference to the only instance
     */
    public static function getInstance()
    {
        static $instance;
        if (! isset($instance)) {
            $class = __CLASS__;
            $instance = new $class();
        }

        return $instance;
    }

    /**
     * Get our debugbar object
     *
     * @return \DebugBar\DebugBar
     */
    public function getDebugbar()
    {
        return $this->debugbar;
    }

    /**
     * disable logging
     */
    public function disable()
    {
        //error_reporting(0);
        $this->activated = false;
    }

    /**
     * Enable logger output rendering
     * When output rendering is enabled, the logger will insert its output within the page content.
     * If the string <!--<xo-logger-output>--> is found in the page content, the logger output will
     * replace it, otherwise it will be inserted after all the page output.
     */
    public function enable()
    {
        error_reporting(-1);

        $this->activated = true;

        $this->enableRendering();

        if (! $this->debugbar) {
                $this->debugbar = new StandardDebugBar();
                $this->renderer = $this->debugbar->getJavascriptRenderer();

                //$this->debugbar->addCollector(new MessagesCollector('Errors'));
                $this->debugbar->addCollector(new MessagesCollector('Deprecated'));
                $this->debugbar->addCollector(new MessagesCollector('Blocks'));
                $this->debugbar->addCollector(new MessagesCollector('Extra'));
                //$this->debugbar->addCollector(new MessagesCollector('Queries'));

                $xoops = Xoops::getInstance();
                $debugStack = $xoops->db()->getConfiguration()->getSQLLogger();
                $this->debugbar->addCollector(new DebugBar\Bridge\DoctrineCollector($debugStack));
                //$this->debugbar->setStorage(new DebugBar\Storage\FileStorage(\XoopsBaseConfig::get('var-path').'/debugbar'));
        }
        $this->addToTheme();
    }

    /**
     * report enabled status
     *
     * @return bool
     */
    public function isEnable()
    {
        return $this->activated;
    }

    /**
     * disable output for the benefit of ajax scripts
     */
    public function quiet()
    {
        //$this->debugbar->sendDataInHeaders();
        $this->quietmode = true;
    }

    /**
     * Start a timer
     *
     * @param string      $name  name of the timer
     * @param string|null $label optional label for this timer
     */
    public function startTime($name = 'XOOPS', $label = null)
    {
        if ($this->activated) {
            try {
                $this->debugbar['time']->startMeasure($name, $label);
            } catch (Throwable $e) {
                $this->addException($e);
            }
        }
    }

    /**
     * Stop a timer
     *
     * @param string $name name of the timer
     */
    public function stopTime($name = 'XOOPS')
    {
        $this->addToTheme();

        if ($this->activated) {
            try {
                $this->debugbar['time']->stopMeasure($name);
            } catch (Throwable $e) {
                $this->addException($e);
            }
        }
    }

    /**
     * Log a database query
     *
     * @param string $sql        sql that was processed
     * @param string $error      error message
     * @param int    $errno      error number
     * @param float  $query_time execution time
     */
    public function addQuery($sql, $error = null, $errno = null, $query_time = null)
    {
        if ($this->activated) {
            $level = LogLevel::INFO;
            if (! empty($error)) {
                $level = LogLevel::ERROR;
            }
            $context = [
                'channel' => 'Queries',
                'error' => $error,
                'errno' => $errno,
                'query_time' => $query_time,
            ];
            $this->log($level, $sql, $context);
        }
    }

    /**
     * Log display of a block
     *
     * @param string $name      name of the block
     * @param bool   $cached    was the block cached?
     * @param int    $cachetime cachetime of the block
     */
    public function addBlock($name, $cached = false, $cachetime = 0)
    {
        if ($this->activated) {
            $context = ['channel' => 'Blocks', 'cached' => $cached, 'cachetime' => $cachetime];
            $this->log(LogLevel::INFO, $name, $context);
        }
    }

    /**
     * Log extra information
     *
     * @param string $name name for the entry
     * @param string $msg  text message for the entry
     */
    public function addExtra($name, $msg)
    {
        if ($this->activated) {
            $context = ['channel' => 'Extra', 'name' => $name];
            $this->log(LogLevel::INFO, $msg, $context);
        }
    }

    /**
     * Log messages for deprecated functions
     *
     * @param string $msg name for the entry
     */
    public function addDeprecated($msg)
    {
        if ($this->activated) {
            $this->log(LogLevel::WARNING, $msg, ['channel' => 'Deprecated']);
        }
    }

    /**
     * Log exceptions
     *
     * @param Exception $e name for the entry
     */
    public function addException($e)
    {
        if ($this->activated) {
            $this->debugbar['exceptions']->addThrowable($e);
        }
    }

    /**
     * Dump Smarty variables
     */
    public function addSmarty()
    {
        if ($this->activated) {
            $data = Xoops::getInstance()->tpl()->getTemplateVars();
            // fix values that don't display properly
            foreach ($data as $k => $v) {
                if ($v === '') {
                    $data[$k] = '(empty string)';
                } elseif ($v === null) {
                    $data[$k] = 'NULL';
                } elseif ($v === true) { // just to be consistent with false
                    $data[$k] = 'bool TRUE';
                } elseif ($v === false) {
                    $data[$k] = 'bool FALSE';
                }
            }
            ksort($data, SORT_NATURAL | SORT_FLAG_CASE);
            $this->debugbar->addCollector(
                new DebugBar\DataCollector\ConfigCollector($data, 'Smarty')
            );
        }
    }

    /**
     * Dump a variable to the messages pane
     *
     * @param mixed $var variable to dump
     */
    public function dump($var)
    {
        $this->log(LogLevel::DEBUG, $var);
    }

    /**
     * stackData - stash log data before a redirect
     */
    public function stackData()
    {
        if ($this->activated) {
            $this->debugbar->stackData();
            $this->activated = false;
            $this->renderingEnabled = false;
        }
    }

    /**
     * Enable logger output rendering
     * When output rendering is enabled, the logger will insert its output within the page content.
     * If the string <!--<xo-logger-output>--> is found in the page content, the logger output will
     * replace it, otherwise it will be inserted after all the page output.
     */
    public function enableRendering()
    {
        $this->renderingEnabled = true;
    }

    /**
     * Output buffering callback inserting logger dump in page output
     *
     * @param string $output output buffer to add logger rendering to
     *
     * @return string output
     */
    public function render($output)
    {
        if (! $this->activated) {
            return $output;
        }

        $xoops = Xoops::getInstance();
        $head = '</script>' . $this->renderer->renderHead() . '<script>';
        $xoops->theme()->addScript(null, null, $head);

        $log = $this->renderer->render();
        $this->renderingEnabled = $this->activated = false;

        $pattern = '<!--<xo-logger-output>-->';
        $pos = strpos($output, $pattern);
        if ($pos !== false) {
            return substr($output, 0, $pos) . $log . substr($output, $pos + strlen($pattern));
        }
            return $output . $log;

    }

    /**
     * dump everything we have  // was __destruct()
     */
    public function renderDebugBar()
    {
        if ($this->activated) {
            // include any queued time data from Xmf\Debug
            $queue = \Xmf\Debug::dumpQueuedTimers(true);
            if (! empty($queue)) {
                foreach ($queue as $q) {
                    $this->debugbar['time']->addMeasure($q['label'], $q['start'], $q['start'] + $q['elapsed']);
                }
            }
            $this->addToTheme();
            $this->addExtra(_MD_DEBUGBAR_PHP_VERSION, PHP_VERSION);
            $this->addExtra(_MD_DEBUGBAR_INCLUDED_FILES, (string) count(get_included_files()));
            $conn = \Xoops::getInstance()->db()->getWrappedConnection();
            if ($conn instanceof \PDO) {
                $this->addExtra(
                    $conn->getAttribute(\PDO::ATTR_DRIVER_NAME) . ' version',
                    $conn->getAttribute(\PDO::ATTR_SERVER_VERSION)
                );
                $this->addExtra(
                    $conn->getAttribute(\PDO::ATTR_DRIVER_NAME) . ' stats',
                    $conn->getAttribute(\PDO::ATTR_SERVER_INFO)
                );
            }

            if ($this->quietmode === false) {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                    && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                    // default for ajax, do not initialize a new toolbar, just add dataset
                    $log = $this->renderer->render(false);
                } else {
                    $log = $this->renderer->render();
                }
                echo $log;
            } else {
                $this->debugbar->sendDataInHeaders();
            }
        }
    }

    /**
     * PSR-3 System is unusable.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function emergency($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::EMERGENCY, $message, $context);
        }
    }

    /**
     * PSR-3 Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function alert($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::ALERT, $message, $context);
        }
    }

    /**
     * PSR-3 Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function critical($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::CRITICAL, $message, $context);
        }
    }

    /**
     * PSR-3 Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function error($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::ERROR, $message, $context);
        }
    }

    /**
     * PSR-3 Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function warning($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::WARNING, $message, $context);
        }
    }

    /**
     * PSR-3 Normal but significant events.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function notice($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::NOTICE, $message, $context);
        }
    }

    /**
     * PSR-3 Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function info($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::INFO, $message, $context);
        }
    }

    /**
     * PSR-3 Detailed debug information.
     *
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function debug($message, array $context = [])
    {
        if ($this->activated) {
            $this->log(LogLevel::DEBUG, $message, $context);
        }
    }

    /**
     * PSR-3 Logs with an arbitrary level.
     *
     * @param mixed  $level   logging level
     * @param string $message message
     * @param array  $context array of additional context
     */
    public function log($level, $message, array $context = [])
    {
        if (! $this->activated) {
            return;
        }

        $channel = 'messages';
        $msg = $message;

        /**
         * If we have embedded channel in the context array, format the message
         * approriatly using context values.
         */
        if (isset($context['channel'])) {
            $chan = strtolower($context['channel']);
            switch ($chan) {
                case 'blocks':
                    $channel = 'Blocks';
                    $msg = $message . ': ';
                    if ($context['cached']) {
                        $msg .= sprintf(_MD_DEBUGBAR_CACHED, (int) ($context['cachetime']));
                    } else {
                        $msg .= _MD_DEBUGBAR_NOT_CACHED;
                    }
                    break;
                case 'deprecated':
                    $channel = 'Deprecated';
                    $msg = $message;
                    break;
                case 'extra':
                    $channel = 'Extra';
                    $msg = $context['name'] . ': ' . $message;
                    break;
                case 'queries':
                    $channel = 'Queries';
                    $msg = $message;
                    $qt = empty($context['query_time']) ?
                        '' : sprintf('%0.6f - ', $context['query_time']);
                    if ($level === LogLevel::ERROR) {
                        //if (!is_scalar($context['errno']) ||  !is_scalar($context['errno'])) {
                        //    \Xmf\Debug::dump($context);
                        //}
                        $msg .= ' -- Error number: '
                            . (is_scalar($context['errno']) ? $context['errno'] : '?')
                            . ' Error message: '
                            . (is_scalar($context['error']) ? $context['error'] : '?');
                    }
                    $msg = $qt . $msg;
                    break;
            }
        }
        switch ($level) {
            case LogLevel::EMERGENCY:
                $this->debugbar[$channel]->emergency($msg);
                break;
            case LogLevel::ALERT:
                $this->debugbar[$channel]->alert($msg);
                break;
            case LogLevel::CRITICAL:
                $this->debugbar[$channel]->critical($msg);
                break;
            case LogLevel::ERROR:
                $this->debugbar[$channel]->error($msg);
                break;
            case LogLevel::WARNING:
                $this->debugbar[$channel]->warning($msg);
                break;
            case LogLevel::NOTICE:
                $this->debugbar[$channel]->notice($msg);
                break;
            case LogLevel::INFO:
                $this->debugbar[$channel]->info($msg);
                break;
            case LogLevel::DEBUG:
            default:
                $this->debugbar[$channel]->debug($msg);
                break;
        }
    }

    /**
     * Add our resources to the theme as soon as it is available, otherwise return
     */
    private function addToTheme()
    {
        static $addedResource = false;

        if ($this->activated && ! $addedResource) {
            if (isset($GLOBALS['xoTheme'])) {
                // get asset information provided by debugbar
                // don't include vendors - jquery already available, need workaround for font-awesome
                $this->renderer->setIncludeVendors(true);
                $this->renderer->setEnableJqueryNoConflict(false);
                list($cssAssets, $jsAssets) = $this->renderer->getAssets();

                // font-awesome requires some special handling with cssmin
                // see: https://code.google.com/p/cssmin/issues/detail?id=52&q=font
                // using our own copy of full css instead of minified version packaged
                // with debugbar avoids the issue.

                // Supress unwanted assets - exclude anything containing these strings
                $excludes = [
                    //'/vendor/font-awesome/', // font-awesome needs special process
                    //'/vendor/highlightjs/',  // highlightjs has some negative side effects
                    '/vendor/jquery/',       // jquery is already available
                ];

                $cssAssets = array_filter(
                    $cssAssets,
                    function ($filename) use ($excludes) {
                        foreach ($excludes as $exclude) {
                            if (strpos($filename, $exclude) !== false) {
                                return false;
                            }
                        }
                        return true;
                    }
                );

                $jsAssets = array_filter(
                    $jsAssets,
                    function ($filename) use ($excludes) {
                        foreach ($excludes as $exclude) {
                            if (strpos($filename, $exclude) !== false) {
                                return false;
                            }
                        }
                        return true;
                    }
                );
                //$cssAssets[] = 'modules/debugbar/assets/css/font-awesome.css';

                $xoops = Xoops::getInstance();
                $xoops->theme()->addStylesheetAssets($cssAssets, 'cssembed,?cssmin');
                $xoops->theme()->addScriptAssets($jsAssets, '?jsmin');

                $addedResource = true;
            }
        }
    }
}
