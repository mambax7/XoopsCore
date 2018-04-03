<?php declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

namespace Xoops\Core\Database\Logging;

use Doctrine\DBAL\Logging\DebugStack;

/**
 * Extend Doctrine DebugStack to trigger XOOPS event.
 *
 * @category  Xoops\Core\Database\Logging
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2013 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 1.0
 * @see      http://xoops.org
 * @see       www.doctrine-project.org
 */
class XoopsDebugStack extends DebugStack
{
    /**
     * Logs a SQL statement somewhere.
     *
     * @param string $sql    The SQL to be executed.
     * @param array  $params The SQL parameters.
     * @param array  $types  The SQL parameter types.
     */
    public function startQuery(string $sql, ?array $params = null, ?array $types = null): void
    {
        \Xoops::getInstance()->events()->triggerEvent(
            'core.database.query.begin',
            [$sql, $params, $types]
        );
        parent::startQuery($sql, $params, $types);
    }

    /**
     * stopQuery.
     *
     * Perform usual Doctrine DebugStack stopQuery() and trigger event for loggers
     *
     * Event argument is array:
     *   - 'sql'         => string SQL statement
     *   - 'params'      => array of bound parameters
     *   - 'types'       => array of parameter types
     *   - 'executionMS' => float of execution time in microseconds
     */
    public function stopQuery(): void
    {
        parent::stopQuery();
        \Xoops::getInstance()->events()->triggerEvent(
            'core.database.query.complete',
            $this->queries[$this->currentQuery]
        );
    }
}
