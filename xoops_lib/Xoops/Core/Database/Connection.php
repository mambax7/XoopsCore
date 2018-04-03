<?php declare(strict_types=1);

/**
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace Xoops\Core\Database;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Cache\QueryCacheProfile;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Driver;

/**
 * Connection wrapper for Doctrine DBAL Connection.
 *
 * @category  Xoops\Core\Database\Connection
 * @author    readheadedrod <redheadedrod@hotmail.com>
 * @author    Richard Griffith <richard@geekwright.com>
 * @copyright 2013-2015 XOOPS Project (http://xoops.org)
 * @license   GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @version   Release: 2.6
 * @see      http://xoops.org
 * @since     2.6.0
 */
class Connection extends \Doctrine\DBAL\Connection
{
    /**
     * @var bool true means it is safe to write to database
     * removed allowedWebChanges as unnecessary. Using this instead.
     */
    protected $safe;

    /**
     * @var bool true means force writing to database even if safe is not true.
     */
    protected $force;

    /**
     * @var bool true means a transaction is in process.
     */
    protected $transactionActive;

    /**
     * Initializes a new instance of the Connection class.
     *
     * This sets up necessary variables before calling parent constructor
     *
     * @param array         $params       Parameters for the driver
     * @param Driver        $driver       The driver to use
     * @param Configuration $config       The connection configuration
     * @param EventManager  $eventManager Event manager to use
     */
    public function __construct(
        array $params,
        Driver $driver,
        ?Configuration $config = null,
        ?EventManager $eventManager = null
    ) {
        $this->safe = false;
        $this->force = false;
        $this->transactionActive = false;

        try {
            parent::__construct($params, $driver, $config, $eventManager);
        } catch (\Throwable $e) {
            // We are dead in the water. This exception may contain very sensitive
            // information and cannot be allowed to be displayed as is.
            //\Xoops::getInstance()->events()->triggerEvent('core.exception', $e);
            trigger_error('Cannot get database connection', E_USER_ERROR);
        }
    }

    /**
     * this is a public setter for the safe variable.
     *
     * @param bool $safe set safe to true if safe to write data to database
     */
    public function setSafe(bool $safe = true): void
    {
        $this->safe = (bool) $safe;
    }

    /**
     * this is a public getter for the safe variable.
     *
     * @return boolean
     */
    public function getSafe(): bool
    {
        return $this->safe;
    }

    /**
     * this is a public setter for the $force variable.
     *
     * @param bool $force when true will force a write to database when safe is false.
     */
    public function setForce(bool $force = false): void
    {
        $this->force = (bool) $force;
    }

    /**
     * this is a public getter for the $force variable.
     *
     * @return boolean
     */
    public function getForce(): bool
    {
        return $this->force;
    }

    /**
     * Prepend the prefix.'_' to the given tablename
     * If tablename is empty, just return the prefix.
     *
     * @param string $tablename tablename
     *
     * @return string prefixed tablename, or prefix if tablename is empty
     */
    public function prefix(string $tablename = ''): string
    {
        $prefix = \XoopsBaseConfig::get('db-prefix');
        if ('' !== $tablename) {
            return $prefix.'_'.$tablename;
        }

        return $prefix;
    }

    /**
     * Inserts a table row with specified data.
     *
     * Adds prefix to the name of the table then passes to normal function.
     *
     * @param string $tableName The name of the table to insert data into.
     * @param array  $data      An associative array containing column-value pairs.
     * @param array  $types     Types of the inserted data.
     *
     * @return int The number of affected rows.
     */
    public function insertPrefix(string $tableName, array $data, array $types = []): int
    {
        $tableName = $this->prefix($tableName);

        return $this->insert($tableName, $data, $types);
    }

    /**
     * Executes an SQL UPDATE statement on a table.
     *
     * Adds prefix to the name of the table then passes to normal function.
     *
     * @param string $tableName  The name of the table to update.
     * @param array  $data       The data to update
     * @param array  $identifier The update criteria.
     * An associative array containing column-value pairs.
     * @param array $types Types of the merged $data and
     * $identifier arrays in that order.
     *
     * @return int The number of affected rows.
     */
    public function updatePrefix(string $tableName, array $data, array $identifier, array $types = []): int
    {
        $tableName = $this->prefix($tableName);

        return $this->update($tableName, $data, $identifier, $types);
    }

    /**
     * Executes an SQL DELETE statement on a table.
     *
     * Adds prefix to the name of the table then passes to delete function.
     *
     * @param string $tableName  The name of the table on which to delete.
     * @param array  $identifier The deletion criteria.
     * An associative array containing column-value pairs.
     *
     * @return int The number of affected rows.
     */
    public function deletePrefix(string $tableName, array $identifier): int
    {
        $tableName = $this->prefix($tableName);

        return $this->delete($tableName, $identifier);
    }

    /**
     * Executes an, optionally parametrized, SQL query.
     *
     * If the query is parametrized, a prepared statement is used.
     * If an SQLLogger is configured, the execution is logged.
     *
     *
     * @param string $query  The SQL query to execute.
     * @param array  $params The parameters to bind to the query, if any.
     * @param array  $types  The types the previous parameters are in.
     *
     * @return \Doctrine\DBAL\Driver\Statement The executed statement.
     *
     * @internal PERF: Directly prepares a driver statement, not a wrapper.
     */
    public function executeQuery(
        string $query,
        array $params = [],
        array $types = [],
        ?QueryCacheProfile $qcp = null
    ): \Doctrine\DBAL\Driver\Statement {
        return parent::executeQuery($query, $params, $types, $qcp);
    }

    /**
     * Executes an SQL INSERT/UPDATE/DELETE query with the given parameters
     * and returns the number of affected rows.
     *
     * This method supports PDO binding types as well as DBAL mapping types.
     *
     * This over ridding process checks to make sure it is safe to do these.
     * If force is active then it will over ride the safe setting.
     *
     * @param string $query  The SQL query.
     * @param array  $params The query parameters.
     * @param array  $types  The parameter types.
     *
     * @return int The number of affected rows.
     *
     * @internal PERF: Directly prepares a driver statement, not a wrapper.
     *
     * @todo build a better exception catching system.
     */
    public function executeUpdate(string $query, array $params = [], array $types = []): int
    {
        $events = \Xoops::getInstance()->events();
        if ($this->safe || $this->force) {
            if (!$this->transactionActive) {
                $this->force = false;
            }
            $events->triggerEvent('core.database.query.start');

            try {
                $result = parent::executeUpdate($query, $params, $types);
            } catch (\Throwable $e) {
                $events->triggerEvent('core.exception', $e);
                $result = 0;
            }
            $events->triggerEvent('core.database.query.end');
        } else {
            //$events->triggerEvent('core.database.query.failure', (array('Not safe:')));
            return (int) 0;
        }
        if (0 !== $result) {
            //$events->triggerEvent('core.database.query.success', (array($query)));
            return (int) $result;
        }
        //$events->triggerEvent('core.database.query.failure', (array($query)));
        return (int) 0;
    }

    /**
     * Starts a transaction by suspending auto-commit mode.
     */
    public function beginTransaction(): void
    {
        $this->transactionActive = true;
        parent::beginTransaction();
    }

    /**
     * Commits the current transaction.
     */
    public function commit(): void
    {
        $this->transactionActive = false;
        $this->force = false;
        parent::commit();
    }

    /**
     * rolls back the current transaction.
     */
    public function rollBack(): void
    {
        $this->transactionActive = false;
        $this->force = false;
        parent::rollBack();
    }

    /**
     * perform a safe query if allowed
     * can receive variable number of arguments.
     *
     * @return mixed returns the value received or null if nothing received.
     *
     * @todo add error report for using non select while not safe.
     * @todo need to check if doctrine allows more than one query to be sent.
     * This code assumes only one query is sent and anything else sent is not
     * a query. This will have to be readdressed if this is wrong.
     */
    public function query()
    {
        $events = \Xoops::getInstance()->events();
        if (!$this->safe && !$this->force) {
            $sql = ltrim(func_get_arg(0));
            if (!$this->safe && 'select' !== strtolower(substr($sql, 0, 6))) {
                // $events->triggerEvent('core.database.query.failure', (array('Not safe:')));
                return null;
            }
        }
        $this->force = false; // resets $force back to false
        $events->triggerEvent('core.database.query.start');

        try {
            $result = call_user_func_array(['parent', 'query'], func_get_args());
        } catch (\Throwable $e) {
            $events->triggerEvent('core.exception', $e);
            $result = null;
        }
        $events->triggerEvent('core.database.query.end');
        if ($result) {
            //$events->triggerEvent('core.database.query.success', (array('')));
            return $result;
        }
        //$events->triggerEvent('core.database.query.failure', (array('')));
        return null;
    }

    /**
     * perform queries from SQL dump file in a batch.
     *
     * @param string $file file path to an SQL dump file
     *
     * @return bool FALSE if failed reading SQL file or
     * TRUE if the file has been read and queries executed
     */
    public function queryFromFile(string $file): bool
    {
        if (false !== ($fp = fopen($file, 'r'))) {
            $sql_queries = trim(fread($fp, filesize($file)));
            \SqlUtility::splitMySqlFile($pieces, $sql_queries);
            foreach ($pieces as $query) {
                $prefixed_query = \SqlUtility::prefixQuery(trim($query), $this->prefix());
                if (false !== $prefixed_query) {
                    $this->query($prefixed_query[0]);
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Create a new instance of a SQL query builder.
     *
     * @return QueryBuilder
     */
    public function createXoopsQueryBuilder(): QueryBuilder
    {
        return new QueryBuilder($this);
    }
}
