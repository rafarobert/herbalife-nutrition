<?php

namespace Base;

use \EsLogs as ChildEsLogs;
use \EsLogsQuery as ChildEsLogsQuery;
use \Exception;
use \PDO;
use Map\EsLogsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_logs' table.
 *
 *
 *
 * @method     ChildEsLogsQuery orderByIdLog($order = Criteria::ASC) Order by the id_log column
 * @method     ChildEsLogsQuery orderByHeading($order = Criteria::ASC) Order by the heading column
 * @method     ChildEsLogsQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildEsLogsQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ChildEsLogsQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildEsLogsQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method     ChildEsLogsQuery orderByFile($order = Criteria::ASC) Order by the file column
 * @method     ChildEsLogsQuery orderByLine($order = Criteria::ASC) Order by the line column
 * @method     ChildEsLogsQuery orderByTrace($order = Criteria::ASC) Order by the trace column
 * @method     ChildEsLogsQuery orderByPrevious($order = Criteria::ASC) Order by the previous column
 * @method     ChildEsLogsQuery orderByXdebugMessage($order = Criteria::ASC) Order by the xdebug_message column
 * @method     ChildEsLogsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildEsLogsQuery orderByPost($order = Criteria::ASC) Order by the post column
 * @method     ChildEsLogsQuery orderBySeverity($order = Criteria::ASC) Order by the severity column
 * @method     ChildEsLogsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsLogsQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsLogsQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsLogsQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsLogsQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsLogsQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsLogsQuery groupByIdLog() Group by the id_log column
 * @method     ChildEsLogsQuery groupByHeading() Group by the heading column
 * @method     ChildEsLogsQuery groupByMessage() Group by the message column
 * @method     ChildEsLogsQuery groupByAction() Group by the action column
 * @method     ChildEsLogsQuery groupByCode() Group by the code column
 * @method     ChildEsLogsQuery groupByLevel() Group by the level column
 * @method     ChildEsLogsQuery groupByFile() Group by the file column
 * @method     ChildEsLogsQuery groupByLine() Group by the line column
 * @method     ChildEsLogsQuery groupByTrace() Group by the trace column
 * @method     ChildEsLogsQuery groupByPrevious() Group by the previous column
 * @method     ChildEsLogsQuery groupByXdebugMessage() Group by the xdebug_message column
 * @method     ChildEsLogsQuery groupByType() Group by the type column
 * @method     ChildEsLogsQuery groupByPost() Group by the post column
 * @method     ChildEsLogsQuery groupBySeverity() Group by the severity column
 * @method     ChildEsLogsQuery groupByStatus() Group by the status column
 * @method     ChildEsLogsQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsLogsQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsLogsQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsLogsQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsLogsQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsLogsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsLogsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsLogsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsLogsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsLogsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsLogsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsLogs findOne(ConnectionInterface $con = null) Return the first ChildEsLogs matching the query
 * @method     ChildEsLogs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsLogs matching the query, or a new ChildEsLogs object populated from the query conditions when no match is found
 *
 * @method     ChildEsLogs findOneByIdLog(int $id_log) Return the first ChildEsLogs filtered by the id_log column
 * @method     ChildEsLogs findOneByHeading(string $heading) Return the first ChildEsLogs filtered by the heading column
 * @method     ChildEsLogs findOneByMessage(string $message) Return the first ChildEsLogs filtered by the message column
 * @method     ChildEsLogs findOneByAction(string $action) Return the first ChildEsLogs filtered by the action column
 * @method     ChildEsLogs findOneByCode(string $code) Return the first ChildEsLogs filtered by the code column
 * @method     ChildEsLogs findOneByLevel(int $level) Return the first ChildEsLogs filtered by the level column
 * @method     ChildEsLogs findOneByFile(string $file) Return the first ChildEsLogs filtered by the file column
 * @method     ChildEsLogs findOneByLine(int $line) Return the first ChildEsLogs filtered by the line column
 * @method     ChildEsLogs findOneByTrace(string $trace) Return the first ChildEsLogs filtered by the trace column
 * @method     ChildEsLogs findOneByPrevious(string $previous) Return the first ChildEsLogs filtered by the previous column
 * @method     ChildEsLogs findOneByXdebugMessage(string $xdebug_message) Return the first ChildEsLogs filtered by the xdebug_message column
 * @method     ChildEsLogs findOneByType(int $type) Return the first ChildEsLogs filtered by the type column
 * @method     ChildEsLogs findOneByPost(string $post) Return the first ChildEsLogs filtered by the post column
 * @method     ChildEsLogs findOneBySeverity(string $severity) Return the first ChildEsLogs filtered by the severity column
 * @method     ChildEsLogs findOneByStatus(string $status) Return the first ChildEsLogs filtered by the status column
 * @method     ChildEsLogs findOneByChangeCount(int $change_count) Return the first ChildEsLogs filtered by the change_count column
 * @method     ChildEsLogs findOneByIdUserModified(int $id_user_modified) Return the first ChildEsLogs filtered by the id_user_modified column
 * @method     ChildEsLogs findOneByIdUserCreated(int $id_user_created) Return the first ChildEsLogs filtered by the id_user_created column
 * @method     ChildEsLogs findOneByDateModified(string $date_modified) Return the first ChildEsLogs filtered by the date_modified column
 * @method     ChildEsLogs findOneByDateCreated(string $date_created) Return the first ChildEsLogs filtered by the date_created column *

 * @method     ChildEsLogs requirePk($key, ConnectionInterface $con = null) Return the ChildEsLogs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOne(ConnectionInterface $con = null) Return the first ChildEsLogs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsLogs requireOneByIdLog(int $id_log) Return the first ChildEsLogs filtered by the id_log column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByHeading(string $heading) Return the first ChildEsLogs filtered by the heading column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByMessage(string $message) Return the first ChildEsLogs filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByAction(string $action) Return the first ChildEsLogs filtered by the action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByCode(string $code) Return the first ChildEsLogs filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByLevel(int $level) Return the first ChildEsLogs filtered by the level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByFile(string $file) Return the first ChildEsLogs filtered by the file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByLine(int $line) Return the first ChildEsLogs filtered by the line column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByTrace(string $trace) Return the first ChildEsLogs filtered by the trace column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByPrevious(string $previous) Return the first ChildEsLogs filtered by the previous column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByXdebugMessage(string $xdebug_message) Return the first ChildEsLogs filtered by the xdebug_message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByType(int $type) Return the first ChildEsLogs filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByPost(string $post) Return the first ChildEsLogs filtered by the post column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneBySeverity(string $severity) Return the first ChildEsLogs filtered by the severity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByStatus(string $status) Return the first ChildEsLogs filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByChangeCount(int $change_count) Return the first ChildEsLogs filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsLogs filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsLogs filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByDateModified(string $date_modified) Return the first ChildEsLogs filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsLogs requireOneByDateCreated(string $date_created) Return the first ChildEsLogs filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsLogs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsLogs objects based on current ModelCriteria
 * @method     ChildEsLogs[]|ObjectCollection findByIdLog(int $id_log) Return ChildEsLogs objects filtered by the id_log column
 * @method     ChildEsLogs[]|ObjectCollection findByHeading(string $heading) Return ChildEsLogs objects filtered by the heading column
 * @method     ChildEsLogs[]|ObjectCollection findByMessage(string $message) Return ChildEsLogs objects filtered by the message column
 * @method     ChildEsLogs[]|ObjectCollection findByAction(string $action) Return ChildEsLogs objects filtered by the action column
 * @method     ChildEsLogs[]|ObjectCollection findByCode(string $code) Return ChildEsLogs objects filtered by the code column
 * @method     ChildEsLogs[]|ObjectCollection findByLevel(int $level) Return ChildEsLogs objects filtered by the level column
 * @method     ChildEsLogs[]|ObjectCollection findByFile(string $file) Return ChildEsLogs objects filtered by the file column
 * @method     ChildEsLogs[]|ObjectCollection findByLine(int $line) Return ChildEsLogs objects filtered by the line column
 * @method     ChildEsLogs[]|ObjectCollection findByTrace(string $trace) Return ChildEsLogs objects filtered by the trace column
 * @method     ChildEsLogs[]|ObjectCollection findByPrevious(string $previous) Return ChildEsLogs objects filtered by the previous column
 * @method     ChildEsLogs[]|ObjectCollection findByXdebugMessage(string $xdebug_message) Return ChildEsLogs objects filtered by the xdebug_message column
 * @method     ChildEsLogs[]|ObjectCollection findByType(int $type) Return ChildEsLogs objects filtered by the type column
 * @method     ChildEsLogs[]|ObjectCollection findByPost(string $post) Return ChildEsLogs objects filtered by the post column
 * @method     ChildEsLogs[]|ObjectCollection findBySeverity(string $severity) Return ChildEsLogs objects filtered by the severity column
 * @method     ChildEsLogs[]|ObjectCollection findByStatus(string $status) Return ChildEsLogs objects filtered by the status column
 * @method     ChildEsLogs[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsLogs objects filtered by the change_count column
 * @method     ChildEsLogs[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsLogs objects filtered by the id_user_modified column
 * @method     ChildEsLogs[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsLogs objects filtered by the id_user_created column
 * @method     ChildEsLogs[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsLogs objects filtered by the date_modified column
 * @method     ChildEsLogs[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsLogs objects filtered by the date_created column
 * @method     ChildEsLogs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsLogsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsLogsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsLogs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsLogsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsLogsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsLogsQuery) {
            return $criteria;
        }
        $query = new ChildEsLogsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEsLogs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsLogsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsLogsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsLogs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_log, heading, message, action, code, level, file, line, trace, previous, xdebug_message, type, post, severity, status, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_logs WHERE id_log = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEsLogs $obj */
            $obj = new ChildEsLogs();
            $obj->hydrate($row);
            EsLogsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildEsLogs|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsLogsTableMap::COL_ID_LOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsLogsTableMap::COL_ID_LOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_log column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLog(1234); // WHERE id_log = 1234
     * $query->filterByIdLog(array(12, 34)); // WHERE id_log IN (12, 34)
     * $query->filterByIdLog(array('min' => 12)); // WHERE id_log > 12
     * </code>
     *
     * @param     mixed $idLog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByIdLog($idLog = null, $comparison = null)
    {
        if (is_array($idLog)) {
            $useMinMax = false;
            if (isset($idLog['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_ID_LOG, $idLog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLog['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_ID_LOG, $idLog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_ID_LOG, $idLog, $comparison);
    }

    /**
     * Filter the query on the heading column
     *
     * Example usage:
     * <code>
     * $query->filterByHeading('fooValue');   // WHERE heading = 'fooValue'
     * $query->filterByHeading('%fooValue%', Criteria::LIKE); // WHERE heading LIKE '%fooValue%'
     * </code>
     *
     * @param     string $heading The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByHeading($heading = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($heading)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_HEADING, $heading, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%', Criteria::LIKE); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level > 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the file column
     *
     * Example usage:
     * <code>
     * $query->filterByFile('fooValue');   // WHERE file = 'fooValue'
     * $query->filterByFile('%fooValue%', Criteria::LIKE); // WHERE file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $file The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByFile($file = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($file)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_FILE, $file, $comparison);
    }

    /**
     * Filter the query on the line column
     *
     * Example usage:
     * <code>
     * $query->filterByLine(1234); // WHERE line = 1234
     * $query->filterByLine(array(12, 34)); // WHERE line IN (12, 34)
     * $query->filterByLine(array('min' => 12)); // WHERE line > 12
     * </code>
     *
     * @param     mixed $line The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByLine($line = null, $comparison = null)
    {
        if (is_array($line)) {
            $useMinMax = false;
            if (isset($line['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_LINE, $line['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($line['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_LINE, $line['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_LINE, $line, $comparison);
    }

    /**
     * Filter the query on the trace column
     *
     * Example usage:
     * <code>
     * $query->filterByTrace('fooValue');   // WHERE trace = 'fooValue'
     * $query->filterByTrace('%fooValue%', Criteria::LIKE); // WHERE trace LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trace The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByTrace($trace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trace)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_TRACE, $trace, $comparison);
    }

    /**
     * Filter the query on the previous column
     *
     * Example usage:
     * <code>
     * $query->filterByPrevious('fooValue');   // WHERE previous = 'fooValue'
     * $query->filterByPrevious('%fooValue%', Criteria::LIKE); // WHERE previous LIKE '%fooValue%'
     * </code>
     *
     * @param     string $previous The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByPrevious($previous = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($previous)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_PREVIOUS, $previous, $comparison);
    }

    /**
     * Filter the query on the xdebug_message column
     *
     * Example usage:
     * <code>
     * $query->filterByXdebugMessage('fooValue');   // WHERE xdebug_message = 'fooValue'
     * $query->filterByXdebugMessage('%fooValue%', Criteria::LIKE); // WHERE xdebug_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xdebugMessage The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByXdebugMessage($xdebugMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xdebugMessage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_XDEBUG_MESSAGE, $xdebugMessage, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type > 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the post column
     *
     * Example usage:
     * <code>
     * $query->filterByPost('fooValue');   // WHERE post = 'fooValue'
     * $query->filterByPost('%fooValue%', Criteria::LIKE); // WHERE post LIKE '%fooValue%'
     * </code>
     *
     * @param     string $post The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByPost($post = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($post)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_POST, $post, $comparison);
    }

    /**
     * Filter the query on the severity column
     *
     * Example usage:
     * <code>
     * $query->filterBySeverity('fooValue');   // WHERE severity = 'fooValue'
     * $query->filterBySeverity('%fooValue%', Criteria::LIKE); // WHERE severity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $severity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterBySeverity($severity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($severity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_SEVERITY, $severity, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the change_count column
     *
     * Example usage:
     * <code>
     * $query->filterByChangeCount(1234); // WHERE change_count = 1234
     * $query->filterByChangeCount(array(12, 34)); // WHERE change_count IN (12, 34)
     * $query->filterByChangeCount(array('min' => 12)); // WHERE change_count > 12
     * </code>
     *
     * @param     mixed $changeCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
    }

    /**
     * Filter the query on the id_user_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUserModified(1234); // WHERE id_user_modified = 1234
     * $query->filterByIdUserModified(array(12, 34)); // WHERE id_user_modified IN (12, 34)
     * $query->filterByIdUserModified(array('min' => 12)); // WHERE id_user_modified > 12
     * </code>
     *
     * @param     mixed $idUserModified The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
    }

    /**
     * Filter the query on the id_user_created column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUserCreated(1234); // WHERE id_user_created = 1234
     * $query->filterByIdUserCreated(array(12, 34)); // WHERE id_user_created IN (12, 34)
     * $query->filterByIdUserCreated(array('min' => 12)); // WHERE id_user_created > 12
     * </code>
     *
     * @param     mixed $idUserCreated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Filter the query on the date_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCreated('2011-03-14'); // WHERE date_created = '2011-03-14'
     * $query->filterByDateCreated('now'); // WHERE date_created = '2011-03-14'
     * $query->filterByDateCreated(array('max' => 'yesterday')); // WHERE date_created > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateCreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsLogsTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsLogsTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsLogs $esLogs Object to remove from the list of results
     *
     * @return $this|ChildEsLogsQuery The current query, for fluid interface
     */
    public function prune($esLogs = null)
    {
        if ($esLogs) {
            $this->addUsingAlias(EsLogsTableMap::COL_ID_LOG, $esLogs->getIdLog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsLogsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsLogsTableMap::clearInstancePool();
            EsLogsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsLogsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsLogsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsLogsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsLogsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsLogsQuery
