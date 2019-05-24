<?php

namespace Base;

use \EsDomains as ChildEsDomains;
use \EsDomainsQuery as ChildEsDomainsQuery;
use \Exception;
use \PDO;
use Map\EsDomainsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_domains' table.
 *
 *
 *
 * @method     ChildEsDomainsQuery orderByIdDomain($order = Criteria::ASC) Order by the id_domain column
 * @method     ChildEsDomainsQuery orderByHost($order = Criteria::ASC) Order by the host column
 * @method     ChildEsDomainsQuery orderByHostname($order = Criteria::ASC) Order by the hostname column
 * @method     ChildEsDomainsQuery orderByProtocol($order = Criteria::ASC) Order by the protocol column
 * @method     ChildEsDomainsQuery orderByPort($order = Criteria::ASC) Order by the port column
 * @method     ChildEsDomainsQuery orderByOrigin($order = Criteria::ASC) Order by the origin column
 * @method     ChildEsDomainsQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildEsDomainsQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsDomainsQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsDomainsQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsDomainsQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsDomainsQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsDomainsQuery groupByIdDomain() Group by the id_domain column
 * @method     ChildEsDomainsQuery groupByHost() Group by the host column
 * @method     ChildEsDomainsQuery groupByHostname() Group by the hostname column
 * @method     ChildEsDomainsQuery groupByProtocol() Group by the protocol column
 * @method     ChildEsDomainsQuery groupByPort() Group by the port column
 * @method     ChildEsDomainsQuery groupByOrigin() Group by the origin column
 * @method     ChildEsDomainsQuery groupByEstado() Group by the estado column
 * @method     ChildEsDomainsQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsDomainsQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsDomainsQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsDomainsQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsDomainsQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsDomainsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsDomainsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsDomainsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsDomainsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsDomainsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsDomainsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsDomainsQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsDomainsQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsDomainsQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsDomainsQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsDomainsQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsDomainsQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsDomainsQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsDomainsQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsDomainsQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsDomainsQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsDomainsQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsDomainsQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsDomainsQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsDomainsQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     \EsUsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsDomains findOne(ConnectionInterface $con = null) Return the first ChildEsDomains matching the query
 * @method     ChildEsDomains findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsDomains matching the query, or a new ChildEsDomains object populated from the query conditions when no match is found
 *
 * @method     ChildEsDomains findOneByIdDomain(int $id_domain) Return the first ChildEsDomains filtered by the id_domain column
 * @method     ChildEsDomains findOneByHost(string $host) Return the first ChildEsDomains filtered by the host column
 * @method     ChildEsDomains findOneByHostname(string $hostname) Return the first ChildEsDomains filtered by the hostname column
 * @method     ChildEsDomains findOneByProtocol(string $protocol) Return the first ChildEsDomains filtered by the protocol column
 * @method     ChildEsDomains findOneByPort(int $port) Return the first ChildEsDomains filtered by the port column
 * @method     ChildEsDomains findOneByOrigin(string $origin) Return the first ChildEsDomains filtered by the origin column
 * @method     ChildEsDomains findOneByEstado(string $estado) Return the first ChildEsDomains filtered by the estado column
 * @method     ChildEsDomains findOneByChangeCount(int $change_count) Return the first ChildEsDomains filtered by the change_count column
 * @method     ChildEsDomains findOneByIdUserModified(int $id_user_modified) Return the first ChildEsDomains filtered by the id_user_modified column
 * @method     ChildEsDomains findOneByIdUserCreated(int $id_user_created) Return the first ChildEsDomains filtered by the id_user_created column
 * @method     ChildEsDomains findOneByDateModified(string $date_modified) Return the first ChildEsDomains filtered by the date_modified column
 * @method     ChildEsDomains findOneByDateCreated(string $date_created) Return the first ChildEsDomains filtered by the date_created column *

 * @method     ChildEsDomains requirePk($key, ConnectionInterface $con = null) Return the ChildEsDomains by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOne(ConnectionInterface $con = null) Return the first ChildEsDomains matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsDomains requireOneByIdDomain(int $id_domain) Return the first ChildEsDomains filtered by the id_domain column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByHost(string $host) Return the first ChildEsDomains filtered by the host column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByHostname(string $hostname) Return the first ChildEsDomains filtered by the hostname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByProtocol(string $protocol) Return the first ChildEsDomains filtered by the protocol column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByPort(int $port) Return the first ChildEsDomains filtered by the port column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByOrigin(string $origin) Return the first ChildEsDomains filtered by the origin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByEstado(string $estado) Return the first ChildEsDomains filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByChangeCount(int $change_count) Return the first ChildEsDomains filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsDomains filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsDomains filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByDateModified(string $date_modified) Return the first ChildEsDomains filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsDomains requireOneByDateCreated(string $date_created) Return the first ChildEsDomains filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsDomains[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsDomains objects based on current ModelCriteria
 * @method     ChildEsDomains[]|ObjectCollection findByIdDomain(int $id_domain) Return ChildEsDomains objects filtered by the id_domain column
 * @method     ChildEsDomains[]|ObjectCollection findByHost(string $host) Return ChildEsDomains objects filtered by the host column
 * @method     ChildEsDomains[]|ObjectCollection findByHostname(string $hostname) Return ChildEsDomains objects filtered by the hostname column
 * @method     ChildEsDomains[]|ObjectCollection findByProtocol(string $protocol) Return ChildEsDomains objects filtered by the protocol column
 * @method     ChildEsDomains[]|ObjectCollection findByPort(int $port) Return ChildEsDomains objects filtered by the port column
 * @method     ChildEsDomains[]|ObjectCollection findByOrigin(string $origin) Return ChildEsDomains objects filtered by the origin column
 * @method     ChildEsDomains[]|ObjectCollection findByEstado(string $estado) Return ChildEsDomains objects filtered by the estado column
 * @method     ChildEsDomains[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsDomains objects filtered by the change_count column
 * @method     ChildEsDomains[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsDomains objects filtered by the id_user_modified column
 * @method     ChildEsDomains[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsDomains objects filtered by the id_user_created column
 * @method     ChildEsDomains[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsDomains objects filtered by the date_modified column
 * @method     ChildEsDomains[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsDomains objects filtered by the date_created column
 * @method     ChildEsDomains[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsDomainsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsDomainsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsDomains', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsDomainsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsDomainsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsDomainsQuery) {
            return $criteria;
        }
        $query = new ChildEsDomainsQuery();
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
     * @return ChildEsDomains|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsDomainsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsDomainsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsDomains A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_domain, host, hostname, protocol, port, origin, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_domains WHERE id_domain = :p0';
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
            /** @var ChildEsDomains $obj */
            $obj = new ChildEsDomains();
            $obj->hydrate($row);
            EsDomainsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsDomains|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsDomainsTableMap::COL_ID_DOMAIN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsDomainsTableMap::COL_ID_DOMAIN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_domain column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDomain(1234); // WHERE id_domain = 1234
     * $query->filterByIdDomain(array(12, 34)); // WHERE id_domain IN (12, 34)
     * $query->filterByIdDomain(array('min' => 12)); // WHERE id_domain > 12
     * </code>
     *
     * @param     mixed $idDomain The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByIdDomain($idDomain = null, $comparison = null)
    {
        if (is_array($idDomain)) {
            $useMinMax = false;
            if (isset($idDomain['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_ID_DOMAIN, $idDomain['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDomain['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_ID_DOMAIN, $idDomain['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_ID_DOMAIN, $idDomain, $comparison);
    }

    /**
     * Filter the query on the host column
     *
     * Example usage:
     * <code>
     * $query->filterByHost('fooValue');   // WHERE host = 'fooValue'
     * $query->filterByHost('%fooValue%', Criteria::LIKE); // WHERE host LIKE '%fooValue%'
     * </code>
     *
     * @param     string $host The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByHost($host = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($host)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_HOST, $host, $comparison);
    }

    /**
     * Filter the query on the hostname column
     *
     * Example usage:
     * <code>
     * $query->filterByHostname('fooValue');   // WHERE hostname = 'fooValue'
     * $query->filterByHostname('%fooValue%', Criteria::LIKE); // WHERE hostname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hostname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByHostname($hostname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hostname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_HOSTNAME, $hostname, $comparison);
    }

    /**
     * Filter the query on the protocol column
     *
     * Example usage:
     * <code>
     * $query->filterByProtocol('fooValue');   // WHERE protocol = 'fooValue'
     * $query->filterByProtocol('%fooValue%', Criteria::LIKE); // WHERE protocol LIKE '%fooValue%'
     * </code>
     *
     * @param     string $protocol The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByProtocol($protocol = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($protocol)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_PROTOCOL, $protocol, $comparison);
    }

    /**
     * Filter the query on the port column
     *
     * Example usage:
     * <code>
     * $query->filterByPort(1234); // WHERE port = 1234
     * $query->filterByPort(array(12, 34)); // WHERE port IN (12, 34)
     * $query->filterByPort(array('min' => 12)); // WHERE port > 12
     * </code>
     *
     * @param     mixed $port The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByPort($port = null, $comparison = null)
    {
        if (is_array($port)) {
            $useMinMax = false;
            if (isset($port['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_PORT, $port['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($port['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_PORT, $port['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_PORT, $port, $comparison);
    }

    /**
     * Filter the query on the origin column
     *
     * Example usage:
     * <code>
     * $query->filterByOrigin('fooValue');   // WHERE origin = 'fooValue'
     * $query->filterByOrigin('%fooValue%', Criteria::LIKE); // WHERE origin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $origin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByOrigin($origin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($origin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_ORIGIN, $origin, $comparison);
    }

    /**
     * Filter the query on the estado column
     *
     * Example usage:
     * <code>
     * $query->filterByEstado('fooValue');   // WHERE estado = 'fooValue'
     * $query->filterByEstado('%fooValue%', Criteria::LIKE); // WHERE estado LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estado The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsDomainsTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsDomainsTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsDomainsTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsDomainsTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
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
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsDomainsQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsDomainsTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsDomainsTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildEsDomains $esDomains Object to remove from the list of results
     *
     * @return $this|ChildEsDomainsQuery The current query, for fluid interface
     */
    public function prune($esDomains = null)
    {
        if ($esDomains) {
            $this->addUsingAlias(EsDomainsTableMap::COL_ID_DOMAIN, $esDomains->getIdDomain(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_domains table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsDomainsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsDomainsTableMap::clearInstancePool();
            EsDomainsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsDomainsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsDomainsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsDomainsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsDomainsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsDomainsQuery
