<?php

namespace Base;

use \EsTablesRoles as ChildEsTablesRoles;
use \EsTablesRolesQuery as ChildEsTablesRolesQuery;
use \Exception;
use \PDO;
use Map\EsTablesRolesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_tables_roles' table.
 *
 *
 *
 * @method     ChildEsTablesRolesQuery orderByIdTableRole($order = Criteria::ASC) Order by the id_table_role column
 * @method     ChildEsTablesRolesQuery orderByIdTable($order = Criteria::ASC) Order by the id_table column
 * @method     ChildEsTablesRolesQuery orderByIdRole($order = Criteria::ASC) Order by the id_role column
 * @method     ChildEsTablesRolesQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildEsTablesRolesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsTablesRolesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsTablesRolesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsTablesRolesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsTablesRolesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsTablesRolesQuery groupByIdTableRole() Group by the id_table_role column
 * @method     ChildEsTablesRolesQuery groupByIdTable() Group by the id_table column
 * @method     ChildEsTablesRolesQuery groupByIdRole() Group by the id_role column
 * @method     ChildEsTablesRolesQuery groupByEstado() Group by the estado column
 * @method     ChildEsTablesRolesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsTablesRolesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsTablesRolesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsTablesRolesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsTablesRolesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsTablesRolesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsTablesRolesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsTablesRolesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsTablesRolesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsTablesRolesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsTablesRolesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsTablesRolesQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesRolesQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesRolesQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsTablesRolesQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesRolesQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesRolesQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesRolesQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesRolesQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsTablesRolesQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesRolesQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesRolesQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinEsTables($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTables relation
 * @method     ChildEsTablesRolesQuery rightJoinEsTables($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTables relation
 * @method     ChildEsTablesRolesQuery innerJoinEsTables($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTables relation
 *
 * @method     ChildEsTablesRolesQuery joinWithEsTables($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTables relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinWithEsTables() Adds a LEFT JOIN clause and with to the query using the EsTables relation
 * @method     ChildEsTablesRolesQuery rightJoinWithEsTables() Adds a RIGHT JOIN clause and with to the query using the EsTables relation
 * @method     ChildEsTablesRolesQuery innerJoinWithEsTables() Adds a INNER JOIN clause and with to the query using the EsTables relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinEsRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsRoles relation
 * @method     ChildEsTablesRolesQuery rightJoinEsRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsRoles relation
 * @method     ChildEsTablesRolesQuery innerJoinEsRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the EsRoles relation
 *
 * @method     ChildEsTablesRolesQuery joinWithEsRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsRoles relation
 *
 * @method     ChildEsTablesRolesQuery leftJoinWithEsRoles() Adds a LEFT JOIN clause and with to the query using the EsRoles relation
 * @method     ChildEsTablesRolesQuery rightJoinWithEsRoles() Adds a RIGHT JOIN clause and with to the query using the EsRoles relation
 * @method     ChildEsTablesRolesQuery innerJoinWithEsRoles() Adds a INNER JOIN clause and with to the query using the EsRoles relation
 *
 * @method     \EsUsersQuery|\EsTablesQuery|\EsRolesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsTablesRoles findOne(ConnectionInterface $con = null) Return the first ChildEsTablesRoles matching the query
 * @method     ChildEsTablesRoles findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsTablesRoles matching the query, or a new ChildEsTablesRoles object populated from the query conditions when no match is found
 *
 * @method     ChildEsTablesRoles findOneByIdTableRole(int $id_table_role) Return the first ChildEsTablesRoles filtered by the id_table_role column
 * @method     ChildEsTablesRoles findOneByIdTable(int $id_table) Return the first ChildEsTablesRoles filtered by the id_table column
 * @method     ChildEsTablesRoles findOneByIdRole(int $id_role) Return the first ChildEsTablesRoles filtered by the id_role column
 * @method     ChildEsTablesRoles findOneByEstado(string $estado) Return the first ChildEsTablesRoles filtered by the estado column
 * @method     ChildEsTablesRoles findOneByChangeCount(int $change_count) Return the first ChildEsTablesRoles filtered by the change_count column
 * @method     ChildEsTablesRoles findOneByIdUserModified(int $id_user_modified) Return the first ChildEsTablesRoles filtered by the id_user_modified column
 * @method     ChildEsTablesRoles findOneByIdUserCreated(int $id_user_created) Return the first ChildEsTablesRoles filtered by the id_user_created column
 * @method     ChildEsTablesRoles findOneByDateModified(string $date_modified) Return the first ChildEsTablesRoles filtered by the date_modified column
 * @method     ChildEsTablesRoles findOneByDateCreated(string $date_created) Return the first ChildEsTablesRoles filtered by the date_created column *

 * @method     ChildEsTablesRoles requirePk($key, ConnectionInterface $con = null) Return the ChildEsTablesRoles by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOne(ConnectionInterface $con = null) Return the first ChildEsTablesRoles matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsTablesRoles requireOneByIdTableRole(int $id_table_role) Return the first ChildEsTablesRoles filtered by the id_table_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByIdTable(int $id_table) Return the first ChildEsTablesRoles filtered by the id_table column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByIdRole(int $id_role) Return the first ChildEsTablesRoles filtered by the id_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByEstado(string $estado) Return the first ChildEsTablesRoles filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByChangeCount(int $change_count) Return the first ChildEsTablesRoles filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsTablesRoles filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsTablesRoles filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByDateModified(string $date_modified) Return the first ChildEsTablesRoles filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTablesRoles requireOneByDateCreated(string $date_created) Return the first ChildEsTablesRoles filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsTablesRoles[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsTablesRoles objects based on current ModelCriteria
 * @method     ChildEsTablesRoles[]|ObjectCollection findByIdTableRole(int $id_table_role) Return ChildEsTablesRoles objects filtered by the id_table_role column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByIdTable(int $id_table) Return ChildEsTablesRoles objects filtered by the id_table column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByIdRole(int $id_role) Return ChildEsTablesRoles objects filtered by the id_role column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByEstado(string $estado) Return ChildEsTablesRoles objects filtered by the estado column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsTablesRoles objects filtered by the change_count column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsTablesRoles objects filtered by the id_user_modified column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsTablesRoles objects filtered by the id_user_created column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsTablesRoles objects filtered by the date_modified column
 * @method     ChildEsTablesRoles[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsTablesRoles objects filtered by the date_created column
 * @method     ChildEsTablesRoles[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsTablesRolesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsTablesRolesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsTablesRoles', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsTablesRolesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsTablesRolesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsTablesRolesQuery) {
            return $criteria;
        }
        $query = new ChildEsTablesRolesQuery();
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
     * @return ChildEsTablesRoles|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsTablesRolesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsTablesRolesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsTablesRoles A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_table_role, id_table, id_role, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_tables_roles WHERE id_table_role = :p0';
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
            /** @var ChildEsTablesRoles $obj */
            $obj = new ChildEsTablesRoles();
            $obj->hydrate($row);
            EsTablesRolesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsTablesRoles|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE_ROLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE_ROLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_table_role column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTableRole(1234); // WHERE id_table_role = 1234
     * $query->filterByIdTableRole(array(12, 34)); // WHERE id_table_role IN (12, 34)
     * $query->filterByIdTableRole(array('min' => 12)); // WHERE id_table_role > 12
     * </code>
     *
     * @param     mixed $idTableRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByIdTableRole($idTableRole = null, $comparison = null)
    {
        if (is_array($idTableRole)) {
            $useMinMax = false;
            if (isset($idTableRole['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE_ROLE, $idTableRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTableRole['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE_ROLE, $idTableRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE_ROLE, $idTableRole, $comparison);
    }

    /**
     * Filter the query on the id_table column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTable(1234); // WHERE id_table = 1234
     * $query->filterByIdTable(array(12, 34)); // WHERE id_table IN (12, 34)
     * $query->filterByIdTable(array('min' => 12)); // WHERE id_table > 12
     * </code>
     *
     * @see       filterByEsTables()
     *
     * @param     mixed $idTable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByIdTable($idTable = null, $comparison = null)
    {
        if (is_array($idTable)) {
            $useMinMax = false;
            if (isset($idTable['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE, $idTable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTable['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE, $idTable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE, $idTable, $comparison);
    }

    /**
     * Filter the query on the id_role column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRole(1234); // WHERE id_role = 1234
     * $query->filterByIdRole(array(12, 34)); // WHERE id_role IN (12, 34)
     * $query->filterByIdRole(array('min' => 12)); // WHERE id_role > 12
     * </code>
     *
     * @see       filterByEsRoles()
     *
     * @param     mixed $idRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByIdRole($idRole = null, $comparison = null)
    {
        if (is_array($idRole)) {
            $useMinMax = false;
            if (isset($idRole['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_ROLE, $idRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRole['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_ROLE, $idRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_ROLE, $idRole, $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsTablesRolesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesRolesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
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
     * @return ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
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
     * Filter the query by a related \EsTables object
     *
     * @param \EsTables|ObjectCollection $esTables The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByEsTables($esTables, $comparison = null)
    {
        if ($esTables instanceof \EsTables) {
            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE, $esTables->getIdTable(), $comparison);
        } elseif ($esTables instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE, $esTables->toKeyValue('PrimaryKey', 'IdTable'), $comparison);
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
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
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
     * Filter the query by a related \EsRoles object
     *
     * @param \EsRoles|ObjectCollection $esRoles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function filterByEsRoles($esRoles, $comparison = null)
    {
        if ($esRoles instanceof \EsRoles) {
            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_ROLE, $esRoles->getIdRole(), $comparison);
        } elseif ($esRoles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesRolesTableMap::COL_ID_ROLE, $esRoles->toKeyValue('PrimaryKey', 'IdRole'), $comparison);
        } else {
            throw new PropelException('filterByEsRoles() only accepts arguments of type \EsRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function joinEsRoles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsRoles');

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
            $this->addJoinObject($join, 'EsRoles');
        }

        return $this;
    }

    /**
     * Use the EsRoles relation EsRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsRolesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsRoles', '\EsRolesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsTablesRoles $esTablesRoles Object to remove from the list of results
     *
     * @return $this|ChildEsTablesRolesQuery The current query, for fluid interface
     */
    public function prune($esTablesRoles = null)
    {
        if ($esTablesRoles) {
            $this->addUsingAlias(EsTablesRolesTableMap::COL_ID_TABLE_ROLE, $esTablesRoles->getIdTableRole(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_tables_roles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsTablesRolesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsTablesRolesTableMap::clearInstancePool();
            EsTablesRolesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsTablesRolesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsTablesRolesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsTablesRolesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsTablesRolesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsTablesRolesQuery
