<?php

namespace Base;

use \EsUsersRoles as ChildEsUsersRoles;
use \EsUsersRolesQuery as ChildEsUsersRolesQuery;
use \Exception;
use \PDO;
use Map\EsUsersRolesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_users_roles' table.
 *
 *
 *
 * @method     ChildEsUsersRolesQuery orderByIdUserRole($order = Criteria::ASC) Order by the id_user_role column
 * @method     ChildEsUsersRolesQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method     ChildEsUsersRolesQuery orderByIdRole($order = Criteria::ASC) Order by the id_role column
 * @method     ChildEsUsersRolesQuery orderByEstado($order = Criteria::ASC) Order by the estado column
 * @method     ChildEsUsersRolesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsUsersRolesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsUsersRolesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsUsersRolesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsUsersRolesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsUsersRolesQuery groupByIdUserRole() Group by the id_user_role column
 * @method     ChildEsUsersRolesQuery groupByIdUser() Group by the id_user column
 * @method     ChildEsUsersRolesQuery groupByIdRole() Group by the id_role column
 * @method     ChildEsUsersRolesQuery groupByEstado() Group by the estado column
 * @method     ChildEsUsersRolesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsUsersRolesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsUsersRolesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsUsersRolesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsUsersRolesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsUsersRolesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsUsersRolesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsUsersRolesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsUsersRolesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsUsersRolesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsUsersRolesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsUsersRolesQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsUsersRolesQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsUsersRolesQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersRolesQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsUsersRolesQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsUsersRolesQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsUsersRolesQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsUsersRolesQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersRolesQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsUsersRolesQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsUsersRolesQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinEsUsersRelatedByIdUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUser relation
 * @method     ChildEsUsersRolesQuery rightJoinEsUsersRelatedByIdUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUser relation
 * @method     ChildEsUsersRolesQuery innerJoinEsUsersRelatedByIdUser($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUser relation
 *
 * @method     ChildEsUsersRolesQuery joinWithEsUsersRelatedByIdUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUser relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinWithEsUsersRelatedByIdUser() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUser relation
 * @method     ChildEsUsersRolesQuery rightJoinWithEsUsersRelatedByIdUser() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUser relation
 * @method     ChildEsUsersRolesQuery innerJoinWithEsUsersRelatedByIdUser() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUser relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinEsRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsRoles relation
 * @method     ChildEsUsersRolesQuery rightJoinEsRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsRoles relation
 * @method     ChildEsUsersRolesQuery innerJoinEsRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the EsRoles relation
 *
 * @method     ChildEsUsersRolesQuery joinWithEsRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsRoles relation
 *
 * @method     ChildEsUsersRolesQuery leftJoinWithEsRoles() Adds a LEFT JOIN clause and with to the query using the EsRoles relation
 * @method     ChildEsUsersRolesQuery rightJoinWithEsRoles() Adds a RIGHT JOIN clause and with to the query using the EsRoles relation
 * @method     ChildEsUsersRolesQuery innerJoinWithEsRoles() Adds a INNER JOIN clause and with to the query using the EsRoles relation
 *
 * @method     \EsUsersQuery|\EsRolesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsUsersRoles findOne(ConnectionInterface $con = null) Return the first ChildEsUsersRoles matching the query
 * @method     ChildEsUsersRoles findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsUsersRoles matching the query, or a new ChildEsUsersRoles object populated from the query conditions when no match is found
 *
 * @method     ChildEsUsersRoles findOneByIdUserRole(int $id_user_role) Return the first ChildEsUsersRoles filtered by the id_user_role column
 * @method     ChildEsUsersRoles findOneByIdUser(int $id_user) Return the first ChildEsUsersRoles filtered by the id_user column
 * @method     ChildEsUsersRoles findOneByIdRole(int $id_role) Return the first ChildEsUsersRoles filtered by the id_role column
 * @method     ChildEsUsersRoles findOneByEstado(string $estado) Return the first ChildEsUsersRoles filtered by the estado column
 * @method     ChildEsUsersRoles findOneByChangeCount(int $change_count) Return the first ChildEsUsersRoles filtered by the change_count column
 * @method     ChildEsUsersRoles findOneByIdUserModified(int $id_user_modified) Return the first ChildEsUsersRoles filtered by the id_user_modified column
 * @method     ChildEsUsersRoles findOneByIdUserCreated(int $id_user_created) Return the first ChildEsUsersRoles filtered by the id_user_created column
 * @method     ChildEsUsersRoles findOneByDateModified(string $date_modified) Return the first ChildEsUsersRoles filtered by the date_modified column
 * @method     ChildEsUsersRoles findOneByDateCreated(string $date_created) Return the first ChildEsUsersRoles filtered by the date_created column *

 * @method     ChildEsUsersRoles requirePk($key, ConnectionInterface $con = null) Return the ChildEsUsersRoles by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOne(ConnectionInterface $con = null) Return the first ChildEsUsersRoles matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsUsersRoles requireOneByIdUserRole(int $id_user_role) Return the first ChildEsUsersRoles filtered by the id_user_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByIdUser(int $id_user) Return the first ChildEsUsersRoles filtered by the id_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByIdRole(int $id_role) Return the first ChildEsUsersRoles filtered by the id_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByEstado(string $estado) Return the first ChildEsUsersRoles filtered by the estado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByChangeCount(int $change_count) Return the first ChildEsUsersRoles filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsUsersRoles filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsUsersRoles filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByDateModified(string $date_modified) Return the first ChildEsUsersRoles filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsersRoles requireOneByDateCreated(string $date_created) Return the first ChildEsUsersRoles filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsUsersRoles[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsUsersRoles objects based on current ModelCriteria
 * @method     ChildEsUsersRoles[]|ObjectCollection findByIdUserRole(int $id_user_role) Return ChildEsUsersRoles objects filtered by the id_user_role column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByIdUser(int $id_user) Return ChildEsUsersRoles objects filtered by the id_user column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByIdRole(int $id_role) Return ChildEsUsersRoles objects filtered by the id_role column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByEstado(string $estado) Return ChildEsUsersRoles objects filtered by the estado column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsUsersRoles objects filtered by the change_count column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsUsersRoles objects filtered by the id_user_modified column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsUsersRoles objects filtered by the id_user_created column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsUsersRoles objects filtered by the date_modified column
 * @method     ChildEsUsersRoles[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsUsersRoles objects filtered by the date_created column
 * @method     ChildEsUsersRoles[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsUsersRolesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsUsersRolesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsUsersRoles', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsUsersRolesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsUsersRolesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsUsersRolesQuery) {
            return $criteria;
        }
        $query = new ChildEsUsersRolesQuery();
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
     * @return ChildEsUsersRoles|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsUsersRolesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsUsersRolesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsUsersRoles A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_user_role, id_user, id_role, estado, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_users_roles WHERE id_user_role = :p0';
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
            /** @var ChildEsUsersRoles $obj */
            $obj = new ChildEsUsersRoles();
            $obj->hydrate($row);
            EsUsersRolesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsUsersRoles|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_ROLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_ROLE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_user_role column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUserRole(1234); // WHERE id_user_role = 1234
     * $query->filterByIdUserRole(array(12, 34)); // WHERE id_user_role IN (12, 34)
     * $query->filterByIdUserRole(array('min' => 12)); // WHERE id_user_role > 12
     * </code>
     *
     * @param     mixed $idUserRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByIdUserRole($idUserRole = null, $comparison = null)
    {
        if (is_array($idUserRole)) {
            $useMinMax = false;
            if (isset($idUserRole['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_ROLE, $idUserRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserRole['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_ROLE, $idUserRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_ROLE, $idUserRole, $comparison);
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
     * @see       filterByEsUsersRelatedByIdUser()
     *
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER, $idUser, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByIdRole($idRole = null, $comparison = null)
    {
        if (is_array($idRole)) {
            $useMinMax = false;
            if (isset($idRole['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_ROLE, $idRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRole['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_ROLE, $idRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_ROLE, $idRole, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByEstado($estado = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estado)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ESTADO, $estado, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsUsersRolesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersRolesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
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
     * @return ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
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
     * @return ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUser($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterByEsUsersRelatedByIdUser() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRelatedByIdUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function joinEsUsersRelatedByIdUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRelatedByIdUser');

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
            $this->addJoinObject($join, 'EsUsersRelatedByIdUser');
        }

        return $this;
    }

    /**
     * Use the EsUsersRelatedByIdUser relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRelatedByIdUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsUsersRelatedByIdUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRelatedByIdUser', '\EsUsersQuery');
    }

    /**
     * Filter the query by a related \EsRoles object
     *
     * @param \EsRoles|ObjectCollection $esRoles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function filterByEsRoles($esRoles, $comparison = null)
    {
        if ($esRoles instanceof \EsRoles) {
            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_ROLE, $esRoles->getIdRole(), $comparison);
        } elseif ($esRoles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersRolesTableMap::COL_ID_ROLE, $esRoles->toKeyValue('PrimaryKey', 'IdRole'), $comparison);
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
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
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
     * @param   ChildEsUsersRoles $esUsersRoles Object to remove from the list of results
     *
     * @return $this|ChildEsUsersRolesQuery The current query, for fluid interface
     */
    public function prune($esUsersRoles = null)
    {
        if ($esUsersRoles) {
            $this->addUsingAlias(EsUsersRolesTableMap::COL_ID_USER_ROLE, $esUsersRoles->getIdUserRole(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_users_roles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersRolesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsUsersRolesTableMap::clearInstancePool();
            EsUsersRolesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersRolesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsUsersRolesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsUsersRolesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsUsersRolesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsUsersRolesQuery
