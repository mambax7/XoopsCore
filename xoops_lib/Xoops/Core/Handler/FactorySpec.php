<?php declare(strict_types=1);

/**
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace Xoops\Core\Handler;

use Xoops\Core\Kernel\XoopsObjectHandler;

/**
 * HandlerFactory.
 *
 * @category  Xoops\Core\Handler\FactorySpec
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @see      http://xoops.org
 */
class FactorySpec
{
    protected $factory;

    protected $specScheme;

    protected $specName;

    protected $specDirname;

    protected $specOptional = false;

    protected $specFQN;

    /**
     * @param Factory $factory factory that created the spec
     */
    protected function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * get a new specification instance.
     *
     * Usually called by the Handler Factory newSpec() operation instead of direct
     * @param Factory $factory factory that created the spec
     *
     * @return FactorySpec
     */
    public static function getInstance(Factory $factory): FactorySpec
    {
        $specClass = get_called_class();
        $instance = new $specClass($factory);

        return $instance;
    }

    /**
     * Set Scheme.
     *
     * @param string $value
     *
     * @return FactorySpec $this for fluent use
     */
    public function scheme(string $value): FactorySpec
    {
        $this->specScheme = $value;

        return $this;
    }

    /**
     * Set Name.
     *
     * @param string $value
     *
     * @return FactorySpec $this for fluent use
     */
    public function name(string $value): FactorySpec
    {
        $this->specName = $value;

        return $this;
    }

    /**
     * Set Dirname.
     *
     * @param string $value
     *
     * @return FactorySpec $this for fluent use
     */
    public function dirname(string $value): FactorySpec
    {
        $this->specDirname = $value;

        return $this;
    }

    /**
     * Set Optional.
     *
     * @param bool $value
     *
     * @return FactorySpec $this for fluent use
     */
    public function optional(bool $value): FactorySpec
    {
        $this->specOptional = (bool) $value;

        return $this;
    }

    /**
     * Set FQN.
     *
     * @param string $value
     *
     * @return FactorySpec $this for fluent use
     */
    public function fqn(string $value): FactorySpec
    {
        $this->specFQN = $value;

        return $this;
    }

    /**
     * request build from factory.
     *
     * @return XoopsObjectHandler|null
     */
    public function build(): ?XoopsObjectHandler
    {
        return $this->factory->build($this);
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->specScheme;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->specName;
    }

    /**
     * @return string
     */
    public function getDirname(): string
    {
        return $this->specDirname;
    }

    /**
     * @return bool
     */
    public function getOptional(): bool
    {
        return $this->specOptional;
    }

    /**
     * @return string
     */
    public function getFQN(): string
    {
        return $this->specFQN;
    }

    /**
     * @return Factory
     */
    public function getFactory(): Factory
    {
        return $this->factory;
    }
}
