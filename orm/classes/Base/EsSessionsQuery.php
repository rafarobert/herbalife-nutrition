<?php

namespace Base;

use \EsSessions as ChildEsSessions;
use \EsSessionsQuery as ChildEsSessionsQuery;
use \Exception;
use \PDO;
use Map\EsSessionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_sessions' table.
 *
 *
 *
 * @method     ChildEsSessionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEsSessionsQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method     ChildEsSessionsQuery orderByTimestamp($order = Criteria::ASC) Order by the timestamp column
 * @method     ChildEsSessionsQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildEsSessionsQuery orderByLastActivity($order = Criteria::ASC) Order by the last_activity column
 * @method     ChildEsSessionsQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method     ChildEsSessionsQuery orderByLng($order = Criteria::ASC) Order by the lng column
 * @method     ChildEsSessionsQuery orderByLat($order = Criteria::ASC) Order by the lat column
 *
 * @method     ChildEsSessionsQuery groupById() Group by the id column
 * @method     ChildEsSessionsQuery groupByIpAddress() Group by the ip_address column
 * @method     ChildEsSessionsQuery groupByTimestamp() Group by the timestamp column
 * @method     ChildEsSessionsQuery groupByData() Group by the data column
 * @method     ChildEsSessionsQuery groupByLastActivity() Group by the last_activity column
 * @method     ChildEsSessionsQuery groupByIdUser() Group by the id_user column
 * @method     ChildEsSessionsQuery groupByLng() Group by the lng column
 * @method     ChildEsSessionsQuery groupByLat() Group by the lat column
 *
 * @method     ChildEsSessionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsSessionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsSessionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsSessionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsSessionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsSessionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsSessionsQuery leftJoinEsUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsers relation
 * @method     ChildEsSessionsQuery rightJoinEsUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsers relation
 * @method     ChildEsSessionsQuery innerJoinEsUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsers relation
 *
 * @method     ChildEsSessionsQuery joinWithEsUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsers relation
 *
 * @method     ChildEsSessionsQuery leftJoinWithEsUsers() Adds a LEFT JOIN clause and with to the query using the EsUsers relation
 * @method     ChildEsSessionsQuery rightJoinWithEsUsers() Adds a RIGHT JOIN clause and with to the query using the EsUsers relation
 * @method     ChildEsSessionsQuery innerJoinWithEsUsers() Adds a INNER JOIN clause and with to the query using the EsUsers relation
 *
 * @method     \EsUsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsSessions findOne(ConnectionInterface $con = null) Return the first ChildEsSessions matching the query
 * @method     ChildEsSessions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsSessions matching the query, or a new ChildEsSessions object populated from the query conditions when no match is found
 *
 * @method     ChildEsSessions findOneById(string $id) Return the first ChildEsSessions filtered by the id column
 * @method     ChildEsSessions findOneByIpAddress(string $ip_address) Return the first ChildEsSessions filtered by the ip_address column
 * @method     ChildEsSessions findOneByTimestamp(int $timestamp) Return the first ChildEsSessions filtered by the timestamp column
 * @method     ChildEsSessions findOneByData(resource $data) Return the first ChildEsSessions filtered by the data column
 * @method     ChildEsSessions findOneByLastActivity(string $last_activity) Return the first ChildEsSessions filtered by the last_activity column
 * @method     ChildEsSessions findOneByIdUser(int $id_user) Return the first ChildEsSessions filtered by the id_user column
 * @method     ChildEsSessions findOneByLng(int $lng) Return the first ChildEsSessions filtered by the lng column
 * @method     ChildEsSessions findOneByLat(int $lat) Return the first ChildEsSessions filtered by the lat column *

 * @method     ChildEsSessions requirePk($key, ConnectionInterface $con = null) Return the ChildEsSessions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOne(ConnectionInterface $con = null) Return the first ChildEsSessions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsSessions requireOneById(string $id) Return the first ChildEsSessions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByIpAddress(string $ip_address) Return the first ChildEsSessions filtered by the ip_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByTimestamp(int $timestamp) Return the first ChildEsSessions filtered by the timestamp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByData(resource $data) Return the first ChildEsSessions filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByLastActivity(string $last_activity) Return the first ChildEsSessions filtered by the last_activity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByIdUser(int $id_user) Return the first ChildEsSessions filtered by the id_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByLng(int $lng) Return the first ChildEsSessions filtered by the lng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsSessions requireOneByLat(int $lat) Return the first ChildEsSessions filtered by the lat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsSessions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsSessions objects based on current ModelCriteria
 * @method     ChildEsSessions[]|ObjectCollection findById(string $id) Return ChildEsSessions objects filtered by the id column
 * @method     ChildEsSessions[]|ObjectCollection findByIpAddress(string $ip_address) Return ChildEsSessions objects filtered by the ip_address column
 * @method     ChildEsSessions[]|ObjectCollection findByTimestamp(int $timestamp) Return ChildEsSessions objects filtered by the timestamp column
 * @method     ChildEsSessions[]|ObjectCollection findByData(resource $data) Return ChildEsSessions objects filtered by the data column
 * @method     ChildEsSessions[]|ObjectCollection findByLastActivity(string $last_activity) Return ChildEsSessions objects filtered by the last_activity column
 * @method     ChildEsSessions[]|ObjectCollection findByIdUser(int $id_user) Return ChildEsSessions objects filtered by the id_user column
 * @method     ChildEsSessions[]|ObjectCollection findByLng(int $lng) Return ChildEsSessions objects filtered by the lng column
 * @method     ChildEsSessions[]|ObjectCollection findByLat(int $lat) Return ChildEsSessions objects filtered by the lat column
 * @method     ChildEsSessions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsSessionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsSessionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsSessions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsSessionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsSessionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsSessionsQuery) {
            return $criteria;
        }
        $query = new ChildEsSessionsQuery();
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
     * @return ChildEsSessions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsSessionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsSessionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsSessions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ip_address, timestamp, data, last_activity, id_user, lng, lat FROM es_sessions WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEsSessions $obj */
            $obj = new ChildEsSessions();
            $obj->hydrate($row);
            EsSessionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsSessions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsSessionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsSessionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%', Criteria::LIKE); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the timestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByTimestamp(1234); // WHERE timestamp = 1234
     * $query->filterByTimestamp(array(12, 34)); // WHERE timestamp IN (12, 34)
     * $query->filterByTimestamp(array('min' => 12)); // WHERE timestamp > 12
     * </code>
     *
     * @param     mixed $timestamp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByTimestamp($timestamp = null, $comparison = null)
    {
        if (is_array($timestamp)) {
            $useMinMax = false;
            if (isset($timestamp['min'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_TIMESTAMP, $timestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timestamp['max'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_TIMESTAMP, $timestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_TIMESTAMP, $timestamp, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * @param     mixed $data The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {

        return $this->addUsingAlias(EsSessionsTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the last_activity column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivity('2011-03-14'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity('now'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity(array('max' => 'yesterday')); // WHERE last_activity > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastActivity The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByLastActivity($lastActivity = null, $comparison = null)
    {
        if (is_array($lastActivity)) {
            $useMinMax = false;
            if (isset($lastActivity['min'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_LAST_ACTIVITY, $lastActivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivity['max'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_LAST_ACTIVITY, $lastActivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_LAST_ACTIVITY, $lastActivity, $comparison);
    }

    /**
     * Filter the query on the id_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUser(1234); // WHERE id_user = 1234
     * $query->filterByIdUser(array(12, 34)); // WHERE id_user IN (12, 34)
     * $query->filterByIdUser(array('min' => 12)); // WHERE id_user > 12
     * </code>
     *
     * @see       filterByEsUsers()
     *
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_ID_USER, $idUser, $comparison);
    }

    /**
     * Filter the query on the lng column
     *
     * Example usage:
     * <code>
     * $query->filterByLng(1234); // WHERE lng = 1234
     * $query->filterByLng(array(12, 34)); // WHERE lng IN (12, 34)
     * $query->filterByLng(array('min' => 12)); // WHERE lng > 12
     * </code>
     *
     * @param     mixed $lng The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByLng($lng = null, $comparison = null)
    {
        if (is_array($lng)) {
            $useMinMax = false;
            if (isset($lng['min'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_LNG, $lng['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lng['max'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_LNG, $lng['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_LNG, $lng, $comparison);
    }

    /**
     * Filter the query on the lat column
     *
     * Example usage:
     * <code>
     * $query->filterByLat(1234); // WHERE lat = 1234
     * $query->filterByLat(array(12, 34)); // WHERE lat IN (12, 34)
     * $query->filterByLat(array('min' => 12)); // WHERE lat > 12
     * </code>
     *
     * @param     mixed $lat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByLat($lat = null, $comparison = null)
    {
        if (is_array($lat)) {
            $useMinMax = false;
            if (isset($lat['min'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_LAT, $lat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lat['max'])) {
                $this->addUsingAlias(EsSessionsTableMap::COL_LAT, $lat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsSessionsTableMap::COL_LAT, $lat, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsSessionsQuery The current query, for fluid interface
     */
    public function filterByEsUsers($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsSessionsTableMap::COL_ID_USER, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsSessionsTableMap::COL_ID_USER, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByEsUsers() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function joinEsUsers($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsers');

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
            $this->addJoinObject($join, 'EsUsers');
        }

        return $this;
    }

    /**
     * Use the EsUsers relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsers', '\EsUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsSessions $esSessions Object to remove from the list of results
     *
     * @return $this|ChildEsSessionsQuery The current query, for fluid interface
     */
    public function prune($esSessions = null)
    {
        if ($esSessions) {
            $this->addUsingAlias(EsSessionsTableMap::COL_ID, $esSessions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsSessionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsSessionsTableMap::clearInstancePool();
            EsSessionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsSessionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsSessionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsSessionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsSessionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsSessionsQuery
