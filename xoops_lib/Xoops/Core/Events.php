<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core;

/**
 * Xoops Event processing, including preload mechanism.
 *
 * @category  Xoops\Core\Events
 * @author    trabis <lusopoemas@gmail.com>
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2013 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 1.0
 * @see      http://xoops.org
 * @since     1.0
 */
class Events
{
    /**
     * @var array array containing information about the event observers
     */
    protected $preloadList = [];

    /**
     * @var array -['eventName'][]=Closure
     * key is event name, value is array of callables
     */
    protected $eventListeners = [];

    /**
     * @var bool
     */
    protected $eventsEnabled = true;

    /**
     * Constructor.
     */
    protected function __construct()
    {
    }

    /**
     * Allow one instance only!
     *
     * @return Events instance
     */
    public static function getInstance(): Events
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
            $instance->initializeListeners();
        }

        return $instance;
    }

    /**
     * Trigger a specific event.
     *
     * @param string $eventName Name of the event to trigger
     * @param mixed  $args      Method arguments
     */
    public function triggerEvent(string $eventName, $args = []): void
    {
        if ($this->eventsEnabled) {
            $eventName = $this->toInternalEventName($eventName);
            if (isset($this->eventListeners[$eventName])) {
                foreach ($this->eventListeners[$eventName] as $event) {
                    if (is_callable($event)) {
                        call_user_func($event, $args);
                    }
                }
            }
        }
    }

    /**
     * addListener - add a listener, providing a callback for a specific event.
     *
     * @param string   $eventName the event name
     * @param callable $callback  any callable acceptable for call_user_func
     */
    public function addListener(string $eventName, callable $callback): void
    {
        $eventName = $this->toInternalEventName($eventName);
        $this->eventListeners[$eventName][] = $callback;
    }

    /**
     * getEvents - for debugging only, return list of event listeners.
     *
     * @return array of events and listeners
     */
    public function getEvents(): array
    {
        return $this->eventListeners;
    }

    /**
     * hasListeners - for debugging only, return list of event listeners.
     *
     * @param string $eventName event name
     *
     * @return bool true if one or more listeners are registered for the event
     */
    public function hasListeners(string $eventName): bool
    {
        $eventName = $this->toInternalEventName($eventName);

        return array_key_exists($eventName, $this->eventListeners);
    }

    /**
     * initializePreloads - Initialize listeners with preload mapped events.
     *
     * We suppress event processing during establishing listener map. A a cache miss (on
     * system_modules_active, for example) triggers regeneration, which may trigger events
     * that listeners are not prepared to handle. In such circumstances, module level class
     * mapping will not have been done.
     */
    protected function initializeListeners(): void
    {
        $this->eventsEnabled = false;
        // clear state in case this is invoked more than once
        $this->preloadList = [];
        $this->eventListeners = [];
        $this->setPreloads();
        $this->setEvents();
        $this->eventsEnabled = true;
    }

    /**
     * Get list of all available preload files.
     */
    protected function setPreloads(): void
    {
        $cache = \Xoops::getInstance()->cache();
        $key = 'system/modules/preloads';
        if (!$this->preloadList = $cache->read($key)) {
            // get active modules from the xoops instance
            $modules_list = \Xoops::getInstance()->getActiveModules();
            if (empty($modules_list)) {
                // this should only happen if an exception was thrown in setActiveModules()
                $modules_list = ['system'];
            }
            $this->preloadList = [];
            $i = 0;
            foreach ($modules_list as $module) {
                if (is_dir($dir = \XoopsBaseConfig::get('root-path')."/modules/{$module}/preloads/")) {
                    $file_list = Lists\File::getList($dir);
                    foreach ($file_list as $file) {
                        if (preg_match('/(\.php)$/i', $file)) {
                            $file = substr($file, 0, -4);
                            $this->preloadList[$i]['module'] = $module;
                            $this->preloadList[$i]['file'] = $file;
                            ++$i;
                        }
                    }
                }
            }
            $cache->write($key, $this->preloadList);
        }
    }

    /**
     * Load all preload files and add all listener methods to eventListeners.
     *
     * Preload classes contain methods based on event names. We extract those method
     * names and store to compare against when an event is triggered.
     *
     * Example:
     * An event is triggered as 'core.include.common.end'
     * A PreloadItem class can listen for this event by declaring a static method
     * 'eventCoreIncludeCommonEnd()'
     *
     * PreloadItem class files can be named for the specific source of the
     * events, such as core.php, system.php, etc. In such case the class name is
     * built from the concatenation of the module name, the source and the literal
     * 'Preload'. This mechanism is now considered deprecated. As an example,
     * a module named 'Example' can listen for 'core' events with a file named
     * preloads/core.php, containing a class ExampleCorePreload
     *
     * The prefered preload definition is the unified preloads/preload.php file
     * containing a single PreloadItem class name concatenating the module name and
     * the literal 'Preload'. This class can listen for events from any source.
     */
    protected function setEvents(): void
    {
        $xoops = \Xoops::getInstance();
        foreach ($this->preloadList as $preload) {
            $path = $xoops->path('modules/'.$preload['module'].'/preloads/'.$preload['file'].'.php');
            include_once $path;
            $class_name = ucfirst($preload['module'])
                .('preload' === $preload['file'] ? '' : ucfirst($preload['file']))
                .'Preload';
            if (!class_exists($class_name)) {
                continue;
            }
            $class_methods = get_class_methods($class_name);
            foreach ($class_methods as $method) {
                if (0 === strpos($method, 'event')) {
                    $eventName = strtolower(str_replace('event', '', $method));
                    $event = [$class_name, $method];
                    $this->eventListeners[$eventName][] = $event;
                }
            }
        }
    }

    /**
     * toInternalEventName - convert event name to internal form
     * i.e. core.include.common.end becomes coreincludecommonend.
     *
     * @param string $eventName the event name
     *
     * @return string converted name
     */
    protected function toInternalEventName(string $eventName): string
    {
        return strtolower(str_replace('.', '', $eventName));
    }
}
