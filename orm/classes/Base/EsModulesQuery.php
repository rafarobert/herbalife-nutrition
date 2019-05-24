<?php

namespace Base;

use \EsModules as ChildEsModules;
use \EsModulesQuery as ChildEsModulesQuery;
use \Exception;
use \PDO;
use Map\EsModulesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_modules' table.
 *
 *
 *
 * @method     ChildEsModulesQuery orderByIdModule($order = Criteria::ASC) Order by the id_module column
 * @method     ChildEsModulesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEsModulesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildEsModulesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsModulesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsModulesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsModulesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsModulesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsModulesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsModulesQuery groupByIdModule() Group by the id_module column
 * @method     ChildEsModulesQuery groupByName() Group by the name column
 * @method     ChildEsModulesQuery groupByDescription() Group by the description column
 * @method     ChildEsModulesQuery groupByStatus() Group by the status column
 * @method     ChildEsModulesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsModulesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsModulesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsModulesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsModulesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsModulesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsModulesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsModulesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsModulesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsModulesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsModulesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsModulesQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsModulesQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsModulesQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsModulesQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsModulesQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsModulesQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsModulesQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsModulesQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsModulesQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsModulesQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsModulesQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsModulesQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsModulesQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsModulesQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsModulesQuery leftJoinEsTables($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTables relation
 * @method     ChildEsModulesQuery rightJoinEsTables($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTables relation
 * @method     ChildEsModulesQuery innerJoinEsTables($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTables relation
 *
 * @method     ChildEsModulesQuery joinWithEsTables($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTables relation
 *
 * @method     ChildEsModulesQuery leftJoinWithEsTables() Adds a LEFT JOIN clause and with to the query using the EsTables relation
 * @method     ChildEsModulesQuery rightJoinWithEsTables() Adds a RIGHT JOIN clause and with to the query using the EsTables relation
 * @method     ChildEsModulesQuery innerJoinWithEsTables() Adds a INNER JOIN clause and with to the query using the EsTables relation
 *
 * @method     \EsUsersQuery|\EsTablesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsModules findOne(ConnectionInterface $con = null) Return the first ChildEsModules matching the query
 * @method     ChildEsModules findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsModules matching the query, or a new ChildEsModules object populated from the query conditions when no match is found
 *
 * @method     ChildEsModules findOneByIdModule(int $id_module) Return the first ChildEsModules filtered by the id_module column
 * @method     ChildEsModules findOneByName(string $name) Return the first ChildEsModules filtered by the name column
 * @method     ChildEsModules findOneByDescription(string $description) Return the first ChildEsModules filtered by the description column
 * @method     ChildEsModules findOneByStatus(string $status) Return the first ChildEsModules filtered by the status column
 * @method     ChildEsModules findOneByChangeCount(int $change_count) Return the first ChildEsModules filtered by the change_count column
 * @method     ChildEsModules findOneByIdUserModified(int $id_user_modified) Return the first ChildEsModules filtered by the id_user_modified column
 * @method     ChildEsModules findOneByIdUserCreated(int $id_user_created) Return the first ChildEsModules filtered by the id_user_created column
 * @method     ChildEsModules findOneByDateModified(string $date_modified) Return the first ChildEsModules filtered by the date_modified column
 * @method     ChildEsModules findOneByDateCreated(string $date_created) Return the first ChildEsModules filtered by the date_created column *

 * @method     ChildEsModules requirePk($key, ConnectionInterface $con = null) Return the ChildEsModules by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOne(ConnectionInterface $con = null) Return the first ChildEsModules matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsModules requireOneByIdModule(int $id_module) Return the first ChildEsModules filtered by the id_module column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByName(string $name) Return the first ChildEsModules filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByDescription(string $description) Return the first ChildEsModules filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByStatus(string $status) Return the first ChildEsModules filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByChangeCount(int $change_count) Return the first ChildEsModules filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsModules filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsModules filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByDateModified(string $date_modified) Return the first ChildEsModules filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsModules requireOneByDateCreated(string $date_created) Return the first ChildEsModules filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsModules[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsModules objects based on current ModelCriteria
 * @method     ChildEsModules[]|ObjectCollection findByIdModule(int $id_module) Return ChildEsModules objects filtered by the id_module column
 * @method     ChildEsModules[]|ObjectCollection findByName(string $name) Return ChildEsModules objects filtered by the name column
 * @method     ChildEsModules[]|ObjectCollection findByDescription(string $description) Return ChildEsModules objects filtered by the description column
 * @method     ChildEsModules[]|ObjectCollection findByStatus(string $status) Return ChildEsModules objects filtered by the status column
 * @method     ChildEsModules[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsModules objects filtered by the change_count column
 * @method     ChildEsModules[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsModules objects filtered by the id_user_modified column
 * @method     ChildEsModules[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsModules objects filtered by the id_user_created column
 * @method     ChildEsModules[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsModules objects filtered by the date_modified column
 * @method     ChildEsModules[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsModules objects filtered by the date_created column
 * @method     ChildEsModules[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsModulesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsModulesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsModules', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsModulesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsModulesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsModulesQuery) {
            return $criteria;
        }
        $query = new ChildEsModulesQuery();
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
     * @return ChildEsModules|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsModulesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsModulesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsModules A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_module, name, description, status, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_modules WHERE id_module = :p0';
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
            /** @var ChildEsModules $obj */
            $obj = new ChildEsModules();
            $obj->hydrate($row);
            EsModulesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsModules|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_module column
     *
     * Example usage:
     * <code>
     * $query->filterByIdModule(1234); // WHERE id_module = 1234
     * $query->filterByIdModule(array(12, 34)); // WHERE id_module IN (12, 34)
     * $query->filterByIdModule(array('min' => 12)); // WHERE id_module > 12
     * </code>
     *
     * @param     mixed $idModule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByIdModule($idModule = null, $comparison = null)
    {
        if (is_array($idModule)) {
            $useMinMax = false;
            if (isset($idModule['min'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $idModule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idModule['max'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $idModule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $idModule, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @see       filterByEsUsersRelatedByIdUserModified()
     *
     * @param     mixed $idUserModified The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @see       filterByEsUsersRelatedByIdUserCreated()
     *
     * @param     mixed $idUserCreated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsModulesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsModulesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsModulesTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsModulesTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByEsUsersRelatedByIdUserModified() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function joinEsUsersRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRelatedByIdUserModified');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EsUsersRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsUsersRelatedByIdUserModified relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsUsersRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRelatedByIdUserModified', '\EsUsersQuery');
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsModulesTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsModulesTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByEsUsersRelatedByIdUserCreated() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function joinEsUsersRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRelatedByIdUserCreated');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EsUsersRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsUsersRelatedByIdUserCreated relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsUsersRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRelatedByIdUserCreated', '\EsUsersQuery');
    }

    /**
     * Filter the query by a related \EsTables object
     *
     * @param \EsTables|ObjectCollection $esTables the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsModulesQuery The current query, for fluid interface
     */
    public function filterByEsTables($esTables, $comparison = null)
    {
        if ($esTables instanceof \EsTables) {
            return $this
                ->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $esTables->getIdModule(), $comparison);
        } elseif ($esTables instanceof ObjectCollection) {
            return $this
                ->useEsTablesQuery()
                ->filterByPrimaryKeys($esTables->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsTables() only accepts arguments of type \EsTables or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsTables relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function joinEsTables($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsTables');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'EsTables');
        }

        return $this;
    }

    /**
     * Use the EsTables relation EsTables object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsTablesQuery A secondary query class using the current class as primary query
     */
    public function useEsTablesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsTables($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsTables', '\EsTablesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsModules $esModules Object to remove from the list of results
     *
     * @return $this|ChildEsModulesQuery The current query, for fluid interface
     */
    public function prune($esModules = null)
    {
        if ($esModules) {
            $this->addUsingAlias(EsModulesTableMap::COL_ID_MODULE, $esModules->getIdModule(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_modules table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsModulesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsModulesTableMap::clearInstancePool();
            EsModulesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsModulesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsModulesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsModulesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsModulesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsModulesQuery
