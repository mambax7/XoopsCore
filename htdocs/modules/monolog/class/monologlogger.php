<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
//use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MLogger;
use Monolog\Processor\WebProcessor;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Xoops\Core\Logger;

/**
 * Collects log information and present to PHPDebugBar for display.
 * Records information about database queries, blocks, and execution time
 * and various logs.
 *
 * @category  DebugbarLogger
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2013 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 1.0
 * @see      http://xoops.org
 * @since     1.0
 */
class monologlogger implements LoggerInterface
{
    /**
     * @var object
     */
    private $monolog = false;

    /**
     * @var object
     */
    private $activated = false;

    /**
     * @var array named start times
     */
    private $starttimes = [];

    /**
     * @var array named start times
     */
    private $configs = false;

    /**
     * constructor.
     */
    public function __construct()
    {
        Logger::getInstance()->addLogger($this);
    }

    /**
     * Get a reference to the only instance of this class.
     *
     * @return object LoggerAbstract  reference to the only instance
     */
    public static function getInstance()
    {
        static $instance;
        if (!isset($instance)) {
            $class = __CLASS__;
            $instance = new $class();
        }

        return $instance;
    }

    /**
     * disable logging.
     */
    public function disable()
    {
        //error_reporting(0);
        $this->activated = false;
    }

    /**
     * Enable logger output.
     */
    public function enable()
    {
        error_reporting(E_ALL | E_STRICT);

        $this->activated = true;

        if (!$this->monolog) {
            // Create the logger
            $this->monolog = new \Monolog\Logger('app');
            $proc = new WebProcessor();
            $this->monolog->pushProcessor($proc);
            $this->monolog->pushProcessor([$this, 'xoopsDataProcessor']);

            $formatter = new LineFormatter();
            //$formatter = new LogstashFormatter;
            switch ($this->configs['logging_threshold']) {
                case 'error':
                    $threshold = MLogger::ERROR;

                    break;
                case 'warning':
                    $threshold = MLogger::WARNING;

                    break;
                case 'info':
                    $threshold = MLogger::INFO;

                    break;
                case 'debug':
                default:
                    $threshold = MLogger::DEBUG;

                    break;
            }
            if (0 === (int) ($this->configs['max_versions'])) {
                $stream = new StreamHandler($this->configs['log_file_path'], $threshold);
            } else {
                $stream = new RotatingFileHandler(
                    $this->configs['log_file_path'],
                    $this->configs['max_versions'],
                    $threshold
                );
            }
            $stream->setFormatter($formatter);
            $this->monolog->pushHandler($stream);
        }
        //if ($this->monolog && $this->configs['phpfire_enable']) {
        //    $firephp = new FirePHPHandler();
        //    $this->monolog->pushHandler($firephp);
        //}
    }

    /**
     * adds Xoops specific information to the log record.
     *
     * @param array $record log record contents
     */
    public function xoopsDataProcessor($record)
    {
        $xoops = \Xoops::getInstance();
        $record['extra']['user'] = '?';
        @$record['extra']['user'] = $xoops->isUser() ? $xoops->user->getVar('uname') : 'n/a';

        return $record;
    }

    /**
     * set configuration items.
     *
     * @param array $configs module/user configuration items
     */
    public function setConfigs($configs)
    {
        $this->configs = $configs;
    }

    /**
     * report enabled status.
     *
     * @return bool
     */
    public function isEnable()
    {
        return $this->activated;
    }

    /**
     * disable output for the benefit of ajax scripts.
     */
    public function quiet()
    {
        //$this->activated = false;
    }

    /**
     * Start a timer.
     *
     * @param string $name name of the timer
     */
    public function startTime($name = 'XOOPS')
    {
        $this->starttimes[$name] = microtime(true);
    }

    /**
     * Stop a timer.
     *
     * @param string $name name of the timer
     */
    public function stopTime($name = 'XOOPS')
    {
        if ($this->activated) {
            if (array_key_exists($name, $this->starttimes)) {
                $elapsed = microtime(true) - $this->starttimes[$name];
                $msg = sprintf(_MD_MONOLOG_TIMETOLOAD, htmlspecialchars($name), $elapsed);
                $context = [
                    'channel' => 'Timers',
                ];
                $this->log(LogLevel::INFO, $msg, $context);
            }
        }
    }

    /**
     * Log a database query.
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
            if (!empty($error)) {
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
     * Log display of a block.
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
     * Log extra information.
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
     * Log messages for deprecated functions.
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
     * Log exceptions.
     *
     * @param Exception $e name for the entry
     */
    public function addException($e)
    {
        if ($this->activated) {
            $this->error(
                sprintf(
                    $this->messageTag('_MD_MONOLOG_EXCEPTION', 'Exception* : %s : file %s line %s'),
                    $e->getMessage(),
                    $this->sanitizePath($e->getFile()),
                    $e->getLine()
                ),
                ['exception' => $e]
            );
        }
    }

    /**
     * sanitizePath.
     *
     * @param string $path path name to sanitize
     *
     * @return string path with top levels removed
     */
    public function sanitizePath($path)
    {
        $path = str_replace(
            ['\\', \XoopsBaseConfig::get('root-path'), str_replace('\\', '/', realpath(\XoopsBaseConfig::get('root-path')))],
            ['/', '', ''],
            $path
        );

        return $path;
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
        if (!$this->activated) {
            return;
        }

        $channel = 'messages';
        $msg = $message;

        /*
         * If we have embedded channel in the context array, format the message
         * approriatly using context values.
         */
        if (isset($context['channel'])) {
            $chan = strtolower($context['channel']);
            switch ($chan) {
                case 'blocks':
                    if (!$this->configs['include_blocks']) {
                        return;
                    }
                    //$channel = 'Blocks';
                    $msg = _MD_MONOLOG_BLOCKS.' : '.$message.': ';
                    if ($context['cached']) {
                        $msg .= sprintf(_MD_MONOLOG_CACHED, (int) ($context['cachetime']));
                    } else {
                        $msg .= _MD_MONOLOG_NOT_CACHED;
                    }

                    break;
                case 'deprecated':
                    if (!$this->configs['include_deprecated']) {
                        return;
                    }
                    //$channel = 'Deprecated';
                    $msg = $this->messageTag('_MD_MONOLOG_DEPRECATED', 'Deprecated*').' : '.$message;
                    //$msg = _MD_MONOLOG_DEPRECATED . ' : ' . $message;
                    break;
                case 'extra':
                    if (!$this->configs['include_extra']) {
                        return;
                    }
                    //$channel = 'Extra';
                    $msg = _MD_MONOLOG_EXTRA.' : '.$context['name'].': '.$message;

                    break;
                case 'queries':
                    if (!$this->configs['include_queries']) {
                        return;
                    }
                    //$channel = 'Queries';
                    $msg = $message;
                    $qt = empty($context['query_time']) ?
                        '' : sprintf('%0.6f - ', $context['query_time']);
                    if (LogLevel::ERROR === $level) {
                        //if (!is_scalar($context['errno']) ||  !is_scalar($context['errno'])) {
                        //    \Xmf\Debug::dump($context);
                        //}
                        $msg .= ' -- Error number: '
                            .(is_scalar($context['errno']) ? $context['errno'] : '?')
                            .' Error message: '
                            .(is_scalar($context['error']) ? $context['error'] : '?');
                    }
                    $msg = $this->messageTag('_MD_MONOLOG_QUERIES', 'Queries*').' : '.$qt.$msg;

                    break;
                case 'timers':
                    if (!$this->configs['include_timers']) {
                        return;
                    }
                    $msg = $this->messageTag('_MD_MONOLOG_TIMERS', 'Timers*').' : '.$message;

                    break;
                default:
                    $msg = $this->messageTag('_MD_MONOLOG_ERRORS', 'Errors*').' : '.$message;

                    break;
            }
        } else {
            $msg = $this->messageTag('_MD_MONOLOG_MESSAGES', 'Message*').' : '.$message;
        }
        switch ($level) {
            case LogLevel::EMERGENCY:
                $this->monolog->emergency($msg, $context);

                break;
            case LogLevel::ALERT:
                $this->monolog->alert($msg, $context);

                break;
            case LogLevel::CRITICAL:
                $this->monolog->critical($msg, $context);

                break;
            case LogLevel::ERROR:
                $this->monolog->error($msg, $context);

                break;
            case LogLevel::WARNING:
                $this->monolog->warning($msg, $context);

                break;
            case LogLevel::NOTICE:
                $this->monolog->notice($msg, $context);

                break;
            case LogLevel::INFO:
                $this->monolog->info($msg, $context);

                break;
            case LogLevel::DEBUG:
            default:
                $this->monolog->debug($msg, $context);

                break;
        }
    }

    /**
     * messageTag returns the value of a language constant if it is defined,
     * or the supplied default if the constant is not defined. This is needed
     * because logging code can run before locale is established.
     *
     * @param string $tag     the constant name
     * @param string $default a default value
     *
     * @return string constant or default value
     */
    private function messageTag($tag, $default)
    {
        return defined($tag) ? constant($tag) : $default;
    }
}
