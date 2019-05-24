<?php

namespace Base;

use \EsProvincias as ChildEsProvincias;
use \EsProvinciasQuery as ChildEsProvinciasQuery;
use \Exception;
use \PDO;
use Map\EsProvinciasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_provincias' table.
 *
 *
 *
 * @method     ChildEsProvinciasQuery orderByIdProvincia($order = Criteria::ASC) Order by the id_provincia column
 * @method     ChildEsProvinciasQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEsProvinciasQuery orderByArea($order = Criteria::ASC) Order by the area column
 * @method     ChildEsProvinciasQuery orderByLat($order = Criteria::ASC) Order by the lat column
 * @method     ChildEsProvinciasQuery orderByLng($order = Criteria::ASC) Order by the lng column
 * @method     ChildEsProvinciasQuery orderByIdMunicipio($order = Criteria::ASC) Order by the id_municipio column
 * @method     ChildEsProvinciasQuery orderByIdCiudad($order = Criteria::ASC) Order by the id_ciudad column
 * @method     ChildEsProvinciasQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsProvinciasQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsProvinciasQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsProvinciasQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsProvinciasQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsProvinciasQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsProvinciasQuery groupByIdProvincia() Group by the id_provincia column
 * @method     ChildEsProvinciasQuery groupByName() Group by the name column
 * @method     ChildEsProvinciasQuery groupByArea() Group by the area column
 * @method     ChildEsProvinciasQuery groupByLat() Group by the lat column
 * @method     ChildEsProvinciasQuery groupByLng() Group by the lng column
 * @method     ChildEsProvinciasQuery groupByIdMunicipio() Group by the id_municipio column
 * @method     ChildEsProvinciasQuery groupByIdCiudad() Group by the id_ciudad column
 * @method     ChildEsProvinciasQuery groupByStatus() Group by the status column
 * @method     ChildEsProvinciasQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsProvinciasQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsProvinciasQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsProvinciasQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsProvinciasQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsProvinciasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsProvinciasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsProvinciasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsProvinciasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsProvinciasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsProvinciasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsProvinciasQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsProvinciasQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsProvinciasQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsProvinciasQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsProvinciasQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsProvinciasQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsProvinciasQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsProvinciasQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsProvinciasQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsProvinciasQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsProvinciasQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsProvinciasQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsProvinciasQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsProvinciasQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsProvinciasQuery leftJoinEsCities($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCities relation
 * @method     ChildEsProvinciasQuery rightJoinEsCities($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCities relation
 * @method     ChildEsProvinciasQuery innerJoinEsCities($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCities relation
 *
 * @method     ChildEsProvinciasQuery joinWithEsCities($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCities relation
 *
 * @method     ChildEsProvinciasQuery leftJoinWithEsCities() Adds a LEFT JOIN clause and with to the query using the EsCities relation
 * @method     ChildEsProvinciasQuery rightJoinWithEsCities() Adds a RIGHT JOIN clause and with to the query using the EsCities relation
 * @method     ChildEsProvinciasQuery innerJoinWithEsCities() Adds a INNER JOIN clause and with to the query using the EsCities relation
 *
 * @method     ChildEsProvinciasQuery leftJoinEsProvinciasRelatedByIdMunicipio($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsProvinciasRelatedByIdMunicipio relation
 * @method     ChildEsProvinciasQuery rightJoinEsProvinciasRelatedByIdMunicipio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsProvinciasRelatedByIdMunicipio relation
 * @method     ChildEsProvinciasQuery innerJoinEsProvinciasRelatedByIdMunicipio($relationAlias = null) Adds a INNER JOIN clause to the query using the EsProvinciasRelatedByIdMunicipio relation
 *
 * @method     ChildEsProvinciasQuery joinWithEsProvinciasRelatedByIdMunicipio($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsProvinciasRelatedByIdMunicipio relation
 *
 * @method     ChildEsProvinciasQuery leftJoinWithEsProvinciasRelatedByIdMunicipio() Adds a LEFT JOIN clause and with to the query using the EsProvinciasRelatedByIdMunicipio relation
 * @method     ChildEsProvinciasQuery rightJoinWithEsProvinciasRelatedByIdMunicipio() Adds a RIGHT JOIN clause and with to the query using the EsProvinciasRelatedByIdMunicipio relation
 * @method     ChildEsProvinciasQuery innerJoinWithEsProvinciasRelatedByIdMunicipio() Adds a INNER JOIN clause and with to the query using the EsProvinciasRelatedByIdMunicipio relation
 *
 * @method     ChildEsProvinciasQuery leftJoinEsProvinciasRelatedByIdProvincia($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery rightJoinEsProvinciasRelatedByIdProvincia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery innerJoinEsProvinciasRelatedByIdProvincia($relationAlias = null) Adds a INNER JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
 *
 * @method     ChildEsProvinciasQuery joinWithEsProvinciasRelatedByIdProvincia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 *
 * @method     ChildEsProvinciasQuery leftJoinWithEsProvinciasRelatedByIdProvincia() Adds a LEFT JOIN clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery rightJoinWithEsProvinciasRelatedByIdProvincia() Adds a RIGHT JOIN clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery innerJoinWithEsProvinciasRelatedByIdProvincia() Adds a INNER JOIN clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 *
 * @method     ChildEsProvinciasQuery leftJoinEsUsersRelatedByIdProvincia($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery rightJoinEsUsersRelatedByIdProvincia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery innerJoinEsUsersRelatedByIdProvincia($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdProvincia relation
 *
 * @method     ChildEsProvinciasQuery joinWithEsUsersRelatedByIdProvincia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdProvincia relation
 *
 * @method     ChildEsProvinciasQuery leftJoinWithEsUsersRelatedByIdProvincia() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery rightJoinWithEsUsersRelatedByIdProvincia() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdProvincia relation
 * @method     ChildEsProvinciasQuery innerJoinWithEsUsersRelatedByIdProvincia() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdProvincia relation
 *
 * @method     \EsUsersQuery|\EsCitiesQuery|\EsProvinciasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsProvincias findOne(ConnectionInterface $con = null) Return the first ChildEsProvincias matching the query
 * @method     ChildEsProvincias findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsProvincias matching the query, or a new ChildEsProvincias object populated from the query conditions when no match is found
 *
 * @method     ChildEsProvincias findOneByIdProvincia(int $id_provincia) Return the first ChildEsProvincias filtered by the id_provincia column
 * @method     ChildEsProvincias findOneByName(string $name) Return the first ChildEsProvincias filtered by the name column
 * @method     ChildEsProvincias findOneByArea(string $area) Return the first ChildEsProvincias filtered by the area column
 * @method     ChildEsProvincias findOneByLat(int $lat) Return the first ChildEsProvincias filtered by the lat column
 * @method     ChildEsProvincias findOneByLng(int $lng) Return the first ChildEsProvincias filtered by the lng column
 * @method     ChildEsProvincias findOneByIdMunicipio(int $id_municipio) Return the first ChildEsProvincias filtered by the id_municipio column
 * @method     ChildEsProvincias findOneByIdCiudad(int $id_ciudad) Return the first ChildEsProvincias filtered by the id_ciudad column
 * @method     ChildEsProvincias findOneByStatus(string $status) Return the first ChildEsProvincias filtered by the status column
 * @method     ChildEsProvincias findOneByChangeCount(int $change_count) Return the first ChildEsProvincias filtered by the change_count column
 * @method     ChildEsProvincias findOneByIdUserModified(int $id_user_modified) Return the first ChildEsProvincias filtered by the id_user_modified column
 * @method     ChildEsProvincias findOneByIdUserCreated(int $id_user_created) Return the first ChildEsProvincias filtered by the id_user_created column
 * @method     ChildEsProvincias findOneByDateModified(string $date_modified) Return the first ChildEsProvincias filtered by the date_modified column
 * @method     ChildEsProvincias findOneByDateCreated(string $date_created) Return the first ChildEsProvincias filtered by the date_created column *

 * @method     ChildEsProvincias requirePk($key, ConnectionInterface $con = null) Return the ChildEsProvincias by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOne(ConnectionInterface $con = null) Return the first ChildEsProvincias matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsProvincias requireOneByIdProvincia(int $id_provincia) Return the first ChildEsProvincias filtered by the id_provincia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByName(string $name) Return the first ChildEsProvincias filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByArea(string $area) Return the first ChildEsProvincias filtered by the area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByLat(int $lat) Return the first ChildEsProvincias filtered by the lat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByLng(int $lng) Return the first ChildEsProvincias filtered by the lng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByIdMunicipio(int $id_municipio) Return the first ChildEsProvincias filtered by the id_municipio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByIdCiudad(int $id_ciudad) Return the first ChildEsProvincias filtered by the id_ciudad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByStatus(string $status) Return the first ChildEsProvincias filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByChangeCount(int $change_count) Return the first ChildEsProvincias filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsProvincias filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsProvincias filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByDateModified(string $date_modified) Return the first ChildEsProvincias filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsProvincias requireOneByDateCreated(string $date_created) Return the first ChildEsProvincias filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsProvincias[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsProvincias objects based on current ModelCriteria
 * @method     ChildEsProvincias[]|ObjectCollection findByIdProvincia(int $id_provincia) Return ChildEsProvincias objects filtered by the id_provincia column
 * @method     ChildEsProvincias[]|ObjectCollection findByName(string $name) Return ChildEsProvincias objects filtered by the name column
 * @method     ChildEsProvincias[]|ObjectCollection findByArea(string $area) Return ChildEsProvincias objects filtered by the area column
 * @method     ChildEsProvincias[]|ObjectCollection findByLat(int $lat) Return ChildEsProvincias objects filtered by the lat column
 * @method     ChildEsProvincias[]|ObjectCollection findByLng(int $lng) Return ChildEsProvincias objects filtered by the lng column
 * @method     ChildEsProvincias[]|ObjectCollection findByIdMunicipio(int $id_municipio) Return ChildEsProvincias objects filtered by the id_municipio column
 * @method     ChildEsProvincias[]|ObjectCollection findByIdCiudad(int $id_ciudad) Return ChildEsProvincias objects filtered by the id_ciudad column
 * @method     ChildEsProvincias[]|ObjectCollection findByStatus(string $status) Return ChildEsProvincias objects filtered by the status column
 * @method     ChildEsProvincias[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsProvincias objects filtered by the change_count column
 * @method     ChildEsProvincias[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsProvincias objects filtered by the id_user_modified column
 * @method     ChildEsProvincias[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsProvincias objects filtered by the id_user_created column
 * @method     ChildEsProvincias[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsProvincias objects filtered by the date_modified column
 * @method     ChildEsProvincias[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsProvincias objects filtered by the date_created column
 * @method     ChildEsProvincias[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsProvinciasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsProvinciasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsProvincias', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsProvinciasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsProvinciasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsProvinciasQuery) {
            return $criteria;
        }
        $query = new ChildEsProvinciasQuery();
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
     * @return ChildEsProvincias|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsProvinciasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsProvincias A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_provincia, name, area, lat, lng, id_municipio, id_ciudad, status, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_provincias WHERE id_provincia = :p0';
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
            /** @var ChildEsProvincias $obj */
            $obj = new ChildEsProvincias();
            $obj->hydrate($row);
            EsProvinciasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsProvincias|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_provincia column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProvincia(1234); // WHERE id_provincia = 1234
     * $query->filterByIdProvincia(array(12, 34)); // WHERE id_provincia IN (12, 34)
     * $query->filterByIdProvincia(array('min' => 12)); // WHERE id_provincia > 12
     * </code>
     *
     * @param     mixed $idProvincia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByIdProvincia($idProvincia = null, $comparison = null)
    {
        if (is_array($idProvincia)) {
            $useMinMax = false;
            if (isset($idProvincia['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $idProvincia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProvincia['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $idProvincia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $idProvincia, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea('fooValue');   // WHERE area = 'fooValue'
     * $query->filterByArea('%fooValue%', Criteria::LIKE); // WHERE area LIKE '%fooValue%'
     * </code>
     *
     * @param     string $area The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($area)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_AREA, $area, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByLat($lat = null, $comparison = null)
    {
        if (is_array($lat)) {
            $useMinMax = false;
            if (isset($lat['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_LAT, $lat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lat['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_LAT, $lat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_LAT, $lat, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByLng($lng = null, $comparison = null)
    {
        if (is_array($lng)) {
            $useMinMax = false;
            if (isset($lng['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_LNG, $lng['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lng['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_LNG, $lng['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_LNG, $lng, $comparison);
    }

    /**
     * Filter the query on the id_municipio column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMunicipio(1234); // WHERE id_municipio = 1234
     * $query->filterByIdMunicipio(array(12, 34)); // WHERE id_municipio IN (12, 34)
     * $query->filterByIdMunicipio(array('min' => 12)); // WHERE id_municipio > 12
     * </code>
     *
     * @see       filterByEsProvinciasRelatedByIdMunicipio()
     *
     * @param     mixed $idMunicipio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByIdMunicipio($idMunicipio = null, $comparison = null)
    {
        if (is_array($idMunicipio)) {
            $useMinMax = false;
            if (isset($idMunicipio['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_MUNICIPIO, $idMunicipio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMunicipio['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_MUNICIPIO, $idMunicipio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_MUNICIPIO, $idMunicipio, $comparison);
    }

    /**
     * Filter the query on the id_ciudad column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCiudad(1234); // WHERE id_ciudad = 1234
     * $query->filterByIdCiudad(array(12, 34)); // WHERE id_ciudad IN (12, 34)
     * $query->filterByIdCiudad(array('min' => 12)); // WHERE id_ciudad > 12
     * </code>
     *
     * @see       filterByEsCities()
     *
     * @param     mixed $idCiudad The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByIdCiudad($idCiudad = null, $comparison = null)
    {
        if (is_array($idCiudad)) {
            $useMinMax = false;
            if (isset($idCiudad['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_CIUDAD, $idCiudad['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCiudad['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_CIUDAD, $idCiudad['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_CIUDAD, $idCiudad, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsProvinciasTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsProvinciasTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
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
     * @return ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
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
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByEsCities($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_CIUDAD, $esCities->getIdCity(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_CIUDAD, $esCities->toKeyValue('PrimaryKey', 'IdCity'), $comparison);
        } else {
            throw new PropelException('filterByEsCities() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCities relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function joinEsCities($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCities');

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
            $this->addJoinObject($join, 'EsCities');
        }

        return $this;
    }

    /**
     * Use the EsCities relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsCities($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCities', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsProvincias object
     *
     * @param \EsProvincias|ObjectCollection $esProvincias The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByEsProvinciasRelatedByIdMunicipio($esProvincias, $comparison = null)
    {
        if ($esProvincias instanceof \EsProvincias) {
            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_MUNICIPIO, $esProvincias->getIdProvincia(), $comparison);
        } elseif ($esProvincias instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_MUNICIPIO, $esProvincias->toKeyValue('PrimaryKey', 'IdProvincia'), $comparison);
        } else {
            throw new PropelException('filterByEsProvinciasRelatedByIdMunicipio() only accepts arguments of type \EsProvincias or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsProvinciasRelatedByIdMunicipio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function joinEsProvinciasRelatedByIdMunicipio($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsProvinciasRelatedByIdMunicipio');

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
            $this->addJoinObject($join, 'EsProvinciasRelatedByIdMunicipio');
        }

        return $this;
    }

    /**
     * Use the EsProvinciasRelatedByIdMunicipio relation EsProvincias object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsProvinciasQuery A secondary query class using the current class as primary query
     */
    public function useEsProvinciasRelatedByIdMunicipioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsProvinciasRelatedByIdMunicipio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsProvinciasRelatedByIdMunicipio', '\EsProvinciasQuery');
    }

    /**
     * Filter the query by a related \EsProvincias object
     *
     * @param \EsProvincias|ObjectCollection $esProvincias the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByEsProvinciasRelatedByIdProvincia($esProvincias, $comparison = null)
    {
        if ($esProvincias instanceof \EsProvincias) {
            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $esProvincias->getIdMunicipio(), $comparison);
        } elseif ($esProvincias instanceof ObjectCollection) {
            return $this
                ->useEsProvinciasRelatedByIdProvinciaQuery()
                ->filterByPrimaryKeys($esProvincias->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsProvinciasRelatedByIdProvincia() only accepts arguments of type \EsProvincias or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function joinEsProvinciasRelatedByIdProvincia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsProvinciasRelatedByIdProvincia');

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
            $this->addJoinObject($join, 'EsProvinciasRelatedByIdProvincia');
        }

        return $this;
    }

    /**
     * Use the EsProvinciasRelatedByIdProvincia relation EsProvincias object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsProvinciasQuery A secondary query class using the current class as primary query
     */
    public function useEsProvinciasRelatedByIdProvinciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsProvinciasRelatedByIdProvincia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsProvinciasRelatedByIdProvincia', '\EsProvinciasQuery');
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdProvincia($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $esUsers->getIdProvincia(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            return $this
                ->useEsUsersRelatedByIdProvinciaQuery()
                ->filterByPrimaryKeys($esUsers->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsUsersRelatedByIdProvincia() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRelatedByIdProvincia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function joinEsUsersRelatedByIdProvincia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRelatedByIdProvincia');

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
            $this->addJoinObject($join, 'EsUsersRelatedByIdProvincia');
        }

        return $this;
    }

    /**
     * Use the EsUsersRelatedByIdProvincia relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRelatedByIdProvinciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsUsersRelatedByIdProvincia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRelatedByIdProvincia', '\EsUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsProvincias $esProvincias Object to remove from the list of results
     *
     * @return $this|ChildEsProvinciasQuery The current query, for fluid interface
     */
    public function prune($esProvincias = null)
    {
        if ($esProvincias) {
            $this->addUsingAlias(EsProvinciasTableMap::COL_ID_PROVINCIA, $esProvincias->getIdProvincia(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_provincias table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsProvinciasTableMap::clearInstancePool();
            EsProvinciasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsProvinciasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsProvinciasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsProvinciasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsProvinciasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsProvinciasQuery
