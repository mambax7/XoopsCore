<?php

namespace Xoops\Core;

/**
 * Project:     Smarty: the PHP compiling template engine
 * File:        SmartyBC.class.php
 * SVN:         $Id: $
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * For questions, help, comments, discussion, etc., please join the
 * Smarty mailing list. Send a blank e-mail to
 * smarty-discussion-subscribe@googlegroups.com
 *
 * @link      http://www.smarty.net/
 * @copyright 2008 New Digital Group, Inc.
 * @author    Monte Ohrt <monte at ohrt dot com>
 * @author    Uwe Tews
 * @author    Rodney Rehm
 * @package   Smarty
 */


/**
 * Smarty Backward Compatibility Wrapper Class as a trait, adapted from SmartyBC.class.php
 *
 * Older XOOPS modules make direct calls to Smarty, and the renamed classes in Smarty V3 cause issues.
 *
 * By adding this trait, we make an easy to remove BC layer, to which we can add diagnostics
 * to make the process of modernizing a little smoother.
 */
trait SmartyBCTrait
{
    /**
     * Smarty 2 BC
     *
     * @var string
     */
    public $_version = self::SMARTY_VERSION;

    /**
     * This is an array of directories where trusted php scripts reside.
     *
     * @var array
     */
    public $trusted_dir = [];

    /**
     * wrapper for assign_by_ref
     *
     * @param string $tpl_var the template variable name
     * @param mixed  &$value  the referenced value to assign
     */
    public function assign_by_ref($tpl_var, &$value)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->assignByRef($tpl_var, $value);
    }

    /**
     * wrapper for append_by_ref
     *
     * @param string  $tpl_var the template variable name
     * @param mixed   &$value  the referenced value to append
     * @param boolean $merge   flag if array elements shall be merged
     */
    public function append_by_ref($tpl_var, &$value, $merge = false)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->appendByRef($tpl_var, $value, $merge);
    }

    /**
     * clear the given assigned template variable.
     *
     * @param string $tpl_var the template variable to clear
     */
    public function clear_assign($tpl_var)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->clearAssign($tpl_var);
    }

    /**
     * Registers custom function to be used in templates
     *
     * @param string $function      the name of the template function
     * @param string $function_impl the name of the PHP function to register
     * @param bool   $cacheable
     * @param mixed  $cache_attrs
     */
    public function register_function($function, $function_impl, $cacheable = true, $cache_attrs = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerPlugin('function', $function, $function_impl, $cacheable, $cache_attrs);
    }

    /**
     * Unregisters custom function
     *
     * @param string $function name of template function
     */
    public function unregister_function($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterPlugin('function', $function);
    }

    /**
     * Registers object to be used in templates
     *
     * @param string  $object        name of template object
     * @param object  $object_impl   the referenced PHP object to register
     * @param array   $allowed       list of allowed methods (empty = all)
     * @param boolean $smarty_args   smarty argument format, else traditional
     * @param array   $block_methods list of methods that are block format
     *
     * @throws \SmartyException
     * @internal param array $block_functs list of methods that are block format
     */
    public function register_object($object, $object_impl, $allowed = [], $smarty_args = true, $block_methods = [])
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        settype($allowed, 'array');
        settype($smarty_args, 'boolean');
        $this->registerObject($object, $object_impl, $allowed, $smarty_args, $block_methods);
    }

    /**
     * Unregisters object
     *
     * @param string $object name of template object
     */
    public function unregister_object($object)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterObject($object);
    }

    /**
     * Registers block function to be used in templates
     *
     * @param string $block      name of template block
     * @param string $block_impl PHP function to register
     * @param bool   $cacheable
     * @param mixed  $cache_attrs
     */
    public function register_block($block, $block_impl, $cacheable = true, $cache_attrs = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerPlugin('block', $block, $block_impl, $cacheable, $cache_attrs);
    }

    /**
     * Unregisters block function
     *
     * @param string $block name of template function
     */
    public function unregister_block($block)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterPlugin('block', $block);
    }

    /**
     * Registers compiler function
     *
     * @param string $function      name of template function
     * @param string $function_impl name of PHP function to register
     * @param bool   $cacheable
     */
    public function register_compiler_function($function, $function_impl, $cacheable = true)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerPlugin('compiler', $function, $function_impl, $cacheable);
    }

    /**
     * Unregisters compiler function
     *
     * @param string $function name of template function
     */
    public function unregister_compiler_function($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterPlugin('compiler', $function);
    }

    /**
     * Registers modifier to be used in templates
     *
     * @param string $modifier      name of template modifier
     * @param string $modifier_impl name of PHP function to register
     */
    public function register_modifier($modifier, $modifier_impl)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerPlugin('modifier', $modifier, $modifier_impl);
    }

    /**
     * Unregisters modifier
     *
     * @param string $modifier name of template modifier
     */
    public function unregister_modifier($modifier)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterPlugin('modifier', $modifier);
    }

    /**
     * Registers a resource to fetch a template
     *
     * @param string $type      name of resource
     * @param array  $functions array of functions to handle resource
     */
    public function register_resource($type, $functions)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerResource($type, $functions);
    }

    /**
     * Unregisters a resource
     *
     * @param string $type name of resource
     */
    public function unregister_resource($type)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterResource($type);
    }

    /**
     * Registers a prefilter function to apply
     * to a template before compiling
     *
     * @param callable $function
     */
    public function register_prefilter($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerFilter('pre', $function);
    }

    /**
     * Unregisters a prefilter function
     *
     * @param callable $function
     */
    public function unregister_prefilter($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterFilter('pre', $function);
    }

    /**
     * Registers a postfilter function to apply
     * to a compiled template after compilation
     *
     * @param callable $function
     */
    public function register_postfilter($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerFilter('post', $function);
    }

    /**
     * Unregisters a postfilter function
     *
     * @param callable $function
     */
    public function unregister_postfilter($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterFilter('post', $function);
    }

    /**
     * Registers an output filter function to apply
     * to a template output
     *
     * @param callable $function
     */
    public function register_outputfilter($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->registerFilter('output', $function);
    }

    /**
     * Unregisters an outputfilter function
     *
     * @param callable $function
     */
    public function unregister_outputfilter($function)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->unregisterFilter('output', $function);
    }

    /**
     * load a filter of specified type and name
     *
     * @param string $type filter type
     * @param string $name filter name
     */
    public function load_filter($type, $name)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->loadFilter($type, $name);
    }

    /**
     * clear cached content for the given template and cache id
     *
     * @param  string $tpl_file   name of template file
     * @param  string $cache_id   name of cache_id
     * @param  string $compile_id name of compile_id
     * @param  string $exp_time   expiration time
     *
     * @return boolean
     */
    public function clear_cache($tpl_file = null, $cache_id = null, $compile_id = null, $exp_time = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->clearCache($tpl_file, $cache_id, $compile_id, $exp_time);
    }

    /**
     * clear the entire contents of cache (all templates)
     *
     * @param  string $exp_time expire time
     *
     * @return boolean
     */
    public function clear_all_cache($exp_time = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->clearCache(null, null, null, $exp_time);
    }

    /**
     * test to see if valid cache exists for this template
     *
     * @param  string $tpl_file name of template file
     * @param  string $cache_id
     * @param  string $compile_id
     *
     * @return boolean
     */
    public function is_cached($tpl_file, $cache_id = null, $compile_id = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->isCached($tpl_file, $cache_id, $compile_id);
    }

    /**
     * clear all the assigned template variables.
     */
    public function clear_all_assign()
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->clearAllAssign();
    }

    /**
     * clears compiled version of specified template resource,
     * or all compiled template files if one is not specified.
     * This function is for advanced use only, not normally needed.
     *
     * @param  string $tpl_file
     * @param  string $compile_id
     * @param  string $exp_time
     *
     * @return boolean results of {@link smarty_core_rm_auto()}
     */
    public function clear_compiled_tpl($tpl_file = null, $compile_id = null, $exp_time = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->clearCompiledTemplate($tpl_file, $compile_id, $exp_time);
    }

    /**
     * Checks whether requested template exists.
     *
     * @param  string $tpl_file
     *
     * @return boolean
     */
    public function template_exists($tpl_file)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->templateExists($tpl_file);
    }

    /**
     * Returns an array containing template variables
     *
     * @param  string $name
     *
     * @return array
     */
    public function get_template_vars($name = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->getTemplateVars($name);
    }

    /**
     * Returns an array containing config variables
     *
     * @param  string $name
     *
     * @return array
     */
    public function get_config_vars($name = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->getConfigVars($name);
    }

    /**
     * load configuration values
     *
     * @param string $file
     * @param string $section
     * @param string $scope
     */
    public function config_load($file, $section = null, $scope = 'global')
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->configLoad($file, $section, $scope);
    }

    /**
     * return a reference to a registered object
     *
     * @param  string $name
     *
     * @return object
     */
    public function get_registered_object($name)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        return $this->getRegisteredObject($name);
    }

    /**
     * clear configuration values
     *
     * @param string $var
     */
    public function clear_config($var = null)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        $this->clearConfig($var);
    }

    /**
     * trigger Smarty error
     *
     * @param string  $error_msg
     * @param integer $error_type
     */
    public function trigger_error($error_msg, $error_type = E_USER_WARNING)
    {
        $this->deprecated(__METHOD__, __FILE__, (__LINE__ + 1));
        trigger_error("Smarty error: ${error_msg}", $error_type);
    }

    protected function deprecated($function, $file, $line)
    {
        $xoops = \Xoops::getInstance();
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $xoops->deprecated(
            "{$function} is deprecated. Called from {$trace[1]['file']} line {$trace[1]['line']}."
            . " See how to replace it in file {$file} line {$line}"
        );
        return $xoops;
    }
}
