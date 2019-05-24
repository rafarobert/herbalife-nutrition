<?php

namespace Base;

use \EsTables as ChildEsTables;
use \EsTablesQuery as ChildEsTablesQuery;
use \Exception;
use \PDO;
use Map\EsTablesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_tables' table.
 *
 *
 *
 * @method     ChildEsTablesQuery orderByIdTable($order = Criteria::ASC) Order by the id_table column
 * @method     ChildEsTablesQuery orderByIdModule($order = Criteria::ASC) Order by the id_module column
 * @method     ChildEsTablesQuery orderByIdRole($order = Criteria::ASC) Order by the id_role column
 * @method     ChildEsTablesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildEsTablesQuery orderByTableName($order = Criteria::ASC) Order by the table_name column
 * @method     ChildEsTablesQuery orderByListed($order = Criteria::ASC) Order by the listed column
 * @method     ChildEsTablesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildEsTablesQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildEsTablesQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildEsTablesQuery orderByUrlEdit($order = Criteria::ASC) Order by the url_edit column
 * @method     ChildEsTablesQuery orderByUrlIndex($order = Criteria::ASC) Order by the url_index column
 * @method     ChildEsTablesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsTablesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsTablesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsTablesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsTablesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsTablesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsTablesQuery groupByIdTable() Group by the id_table column
 * @method     ChildEsTablesQuery groupByIdModule() Group by the id_module column
 * @method     ChildEsTablesQuery groupByIdRole() Group by the id_role column
 * @method     ChildEsTablesQuery groupByTitle() Group by the title column
 * @method     ChildEsTablesQuery groupByTableName() Group by the table_name column
 * @method     ChildEsTablesQuery groupByListed() Group by the listed column
 * @method     ChildEsTablesQuery groupByDescription() Group by the description column
 * @method     ChildEsTablesQuery groupByIcon() Group by the icon column
 * @method     ChildEsTablesQuery groupByUrl() Group by the url column
 * @method     ChildEsTablesQuery groupByUrlEdit() Group by the url_edit column
 * @method     ChildEsTablesQuery groupByUrlIndex() Group by the url_index column
 * @method     ChildEsTablesQuery groupByStatus() Group by the status column
 * @method     ChildEsTablesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsTablesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsTablesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsTablesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsTablesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsTablesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsTablesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsTablesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsTablesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsTablesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsTablesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsTablesQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsTablesQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsTablesQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsTablesQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsTablesQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsTablesQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsTablesQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsTablesQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsTablesQuery leftJoinEsRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsRoles relation
 * @method     ChildEsTablesQuery rightJoinEsRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsRoles relation
 * @method     ChildEsTablesQuery innerJoinEsRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the EsRoles relation
 *
 * @method     ChildEsTablesQuery joinWithEsRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsRoles relation
 *
 * @method     ChildEsTablesQuery leftJoinWithEsRoles() Adds a LEFT JOIN clause and with to the query using the EsRoles relation
 * @method     ChildEsTablesQuery rightJoinWithEsRoles() Adds a RIGHT JOIN clause and with to the query using the EsRoles relation
 * @method     ChildEsTablesQuery innerJoinWithEsRoles() Adds a INNER JOIN clause and with to the query using the EsRoles relation
 *
 * @method     ChildEsTablesQuery leftJoinEsModules($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsModules relation
 * @method     ChildEsTablesQuery rightJoinEsModules($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsModules relation
 * @method     ChildEsTablesQuery innerJoinEsModules($relationAlias = null) Adds a INNER JOIN clause to the query using the EsModules relation
 *
 * @method     ChildEsTablesQuery joinWithEsModules($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsModules relation
 *
 * @method     ChildEsTablesQuery leftJoinWithEsModules() Adds a LEFT JOIN clause and with to the query using the EsModules relation
 * @method     ChildEsTablesQuery rightJoinWithEsModules() Adds a RIGHT JOIN clause and with to the query using the EsModules relation
 * @method     ChildEsTablesQuery innerJoinWithEsModules() Adds a INNER JOIN clause and with to the query using the EsModules relation
 *
 * @method     ChildEsTablesQuery leftJoinEsTablesRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTablesRoles relation
 * @method     ChildEsTablesQuery rightJoinEsTablesRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTablesRoles relation
 * @method     ChildEsTablesQuery innerJoinEsTablesRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTablesRoles relation
 *
 * @method     ChildEsTablesQuery joinWithEsTablesRoles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTablesRoles relation
 *
 * @method     ChildEsTablesQuery leftJoinWithEsTablesRoles() Adds a LEFT JOIN clause and with to the query using the EsTablesRoles relation
 * @method     ChildEsTablesQuery rightJoinWithEsTablesRoles() Adds a RIGHT JOIN clause and with to the query using the EsTablesRoles relation
 * @method     ChildEsTablesQuery innerJoinWithEsTablesRoles() Adds a INNER JOIN clause and with to the query using the EsTablesRoles relation
 *
 * @method     \EsUsersQuery|\EsRolesQuery|\EsModulesQuery|\EsTablesRolesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsTables findOne(ConnectionInterface $con = null) Return the first ChildEsTables matching the query
 * @method     ChildEsTables findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsTables matching the query, or a new ChildEsTables object populated from the query conditions when no match is found
 *
 * @method     ChildEsTables findOneByIdTable(int $id_table) Return the first ChildEsTables filtered by the id_table column
 * @method     ChildEsTables findOneByIdModule(int $id_module) Return the first ChildEsTables filtered by the id_module column
 * @method     ChildEsTables findOneByIdRole(int $id_role) Return the first ChildEsTables filtered by the id_role column
 * @method     ChildEsTables findOneByTitle(string $title) Return the first ChildEsTables filtered by the title column
 * @method     ChildEsTables findOneByTableName(string $table_name) Return the first ChildEsTables filtered by the table_name column
 * @method     ChildEsTables findOneByListed(string $listed) Return the first ChildEsTables filtered by the listed column
 * @method     ChildEsTables findOneByDescription(string $description) Return the first ChildEsTables filtered by the description column
 * @method     ChildEsTables findOneByIcon(string $icon) Return the first ChildEsTables filtered by the icon column
 * @method     ChildEsTables findOneByUrl(string $url) Return the first ChildEsTables filtered by the url column
 * @method     ChildEsTables findOneByUrlEdit(string $url_edit) Return the first ChildEsTables filtered by the url_edit column
 * @method     ChildEsTables findOneByUrlIndex(string $url_index) Return the first ChildEsTables filtered by the url_index column
 * @method     ChildEsTables findOneByStatus(string $status) Return the first ChildEsTables filtered by the status column
 * @method     ChildEsTables findOneByChangeCount(int $change_count) Return the first ChildEsTables filtered by the change_count column
 * @method     ChildEsTables findOneByIdUserModified(int $id_user_modified) Return the first ChildEsTables filtered by the id_user_modified column
 * @method     ChildEsTables findOneByIdUserCreated(int $id_user_created) Return the first ChildEsTables filtered by the id_user_created column
 * @method     ChildEsTables findOneByDateModified(string $date_modified) Return the first ChildEsTables filtered by the date_modified column
 * @method     ChildEsTables findOneByDateCreated(string $date_created) Return the first ChildEsTables filtered by the date_created column *

 * @method     ChildEsTables requirePk($key, ConnectionInterface $con = null) Return the ChildEsTables by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOne(ConnectionInterface $con = null) Return the first ChildEsTables matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsTables requireOneByIdTable(int $id_table) Return the first ChildEsTables filtered by the id_table column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByIdModule(int $id_module) Return the first ChildEsTables filtered by the id_module column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByIdRole(int $id_role) Return the first ChildEsTables filtered by the id_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByTitle(string $title) Return the first ChildEsTables filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByTableName(string $table_name) Return the first ChildEsTables filtered by the table_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByListed(string $listed) Return the first ChildEsTables filtered by the listed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByDescription(string $description) Return the first ChildEsTables filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByIcon(string $icon) Return the first ChildEsTables filtered by the icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByUrl(string $url) Return the first ChildEsTables filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByUrlEdit(string $url_edit) Return the first ChildEsTables filtered by the url_edit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByUrlIndex(string $url_index) Return the first ChildEsTables filtered by the url_index column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByStatus(string $status) Return the first ChildEsTables filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByChangeCount(int $change_count) Return the first ChildEsTables filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsTables filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsTables filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByDateModified(string $date_modified) Return the first ChildEsTables filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsTables requireOneByDateCreated(string $date_created) Return the first ChildEsTables filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsTables[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsTables objects based on current ModelCriteria
 * @method     ChildEsTables[]|ObjectCollection findByIdTable(int $id_table) Return ChildEsTables objects filtered by the id_table column
 * @method     ChildEsTables[]|ObjectCollection findByIdModule(int $id_module) Return ChildEsTables objects filtered by the id_module column
 * @method     ChildEsTables[]|ObjectCollection findByIdRole(int $id_role) Return ChildEsTables objects filtered by the id_role column
 * @method     ChildEsTables[]|ObjectCollection findByTitle(string $title) Return ChildEsTables objects filtered by the title column
 * @method     ChildEsTables[]|ObjectCollection findByTableName(string $table_name) Return ChildEsTables objects filtered by the table_name column
 * @method     ChildEsTables[]|ObjectCollection findByListed(string $listed) Return ChildEsTables objects filtered by the listed column
 * @method     ChildEsTables[]|ObjectCollection findByDescription(string $description) Return ChildEsTables objects filtered by the description column
 * @method     ChildEsTables[]|ObjectCollection findByIcon(string $icon) Return ChildEsTables objects filtered by the icon column
 * @method     ChildEsTables[]|ObjectCollection findByUrl(string $url) Return ChildEsTables objects filtered by the url column
 * @method     ChildEsTables[]|ObjectCollection findByUrlEdit(string $url_edit) Return ChildEsTables objects filtered by the url_edit column
 * @method     ChildEsTables[]|ObjectCollection findByUrlIndex(string $url_index) Return ChildEsTables objects filtered by the url_index column
 * @method     ChildEsTables[]|ObjectCollection findByStatus(string $status) Return ChildEsTables objects filtered by the status column
 * @method     ChildEsTables[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsTables objects filtered by the change_count column
 * @method     ChildEsTables[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsTables objects filtered by the id_user_modified column
 * @method     ChildEsTables[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsTables objects filtered by the id_user_created column
 * @method     ChildEsTables[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsTables objects filtered by the date_modified column
 * @method     ChildEsTables[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsTables objects filtered by the date_created column
 * @method     ChildEsTables[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsTablesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsTablesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsTables', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsTablesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsTablesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsTablesQuery) {
            return $criteria;
        }
        $query = new ChildEsTablesQuery();
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
     * @return ChildEsTables|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsTablesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsTablesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsTables A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_table, id_module, id_role, title, table_name, listed, description, icon, url, url_edit, url_index, status, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_tables WHERE id_table = :p0';
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
            /** @var ChildEsTables $obj */
            $obj = new ChildEsTables();
            $obj->hydrate($row);
            EsTablesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsTables|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $keys, Criteria::IN);
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
     * @param     mixed $idTable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByIdTable($idTable = null, $comparison = null)
    {
        if (is_array($idTable)) {
            $useMinMax = false;
            if (isset($idTable['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $idTable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTable['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $idTable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $idTable, $comparison);
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
     * @see       filterByEsModules()
     *
     * @param     mixed $idModule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByIdModule($idModule = null, $comparison = null)
    {
        if (is_array($idModule)) {
            $useMinMax = false;
            if (isset($idModule['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_MODULE, $idModule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idModule['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_MODULE, $idModule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_MODULE, $idModule, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByIdRole($idRole = null, $comparison = null)
    {
        if (is_array($idRole)) {
            $useMinMax = false;
            if (isset($idRole['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_ROLE, $idRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRole['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_ROLE, $idRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_ROLE, $idRole, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the table_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTableName('fooValue');   // WHERE table_name = 'fooValue'
     * $query->filterByTableName('%fooValue%', Criteria::LIKE); // WHERE table_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByTableName($tableName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_TABLE_NAME, $tableName, $comparison);
    }

    /**
     * Filter the query on the listed column
     *
     * Example usage:
     * <code>
     * $query->filterByListed('fooValue');   // WHERE listed = 'fooValue'
     * $query->filterByListed('%fooValue%', Criteria::LIKE); // WHERE listed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $listed The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByListed($listed = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($listed)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_LISTED, $listed, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%', Criteria::LIKE); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the url_edit column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlEdit('fooValue');   // WHERE url_edit = 'fooValue'
     * $query->filterByUrlEdit('%fooValue%', Criteria::LIKE); // WHERE url_edit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlEdit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByUrlEdit($urlEdit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlEdit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_URL_EDIT, $urlEdit, $comparison);
    }

    /**
     * Filter the query on the url_index column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlIndex('fooValue');   // WHERE url_index = 'fooValue'
     * $query->filterByUrlIndex('%fooValue%', Criteria::LIKE); // WHERE url_index LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlIndex The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByUrlIndex($urlIndex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlIndex)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_URL_INDEX, $urlIndex, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsTablesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsTablesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
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
     * @return ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
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
     * Filter the query by a related \EsRoles object
     *
     * @param \EsRoles|ObjectCollection $esRoles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByEsRoles($esRoles, $comparison = null)
    {
        if ($esRoles instanceof \EsRoles) {
            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_ROLE, $esRoles->getIdRole(), $comparison);
        } elseif ($esRoles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_ROLE, $esRoles->toKeyValue('PrimaryKey', 'IdRole'), $comparison);
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
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
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
     * Filter the query by a related \EsModules object
     *
     * @param \EsModules|ObjectCollection $esModules The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByEsModules($esModules, $comparison = null)
    {
        if ($esModules instanceof \EsModules) {
            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_MODULE, $esModules->getIdModule(), $comparison);
        } elseif ($esModules instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_MODULE, $esModules->toKeyValue('PrimaryKey', 'IdModule'), $comparison);
        } else {
            throw new PropelException('filterByEsModules() only accepts arguments of type \EsModules or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsModules relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function joinEsModules($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsModules');

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
            $this->addJoinObject($join, 'EsModules');
        }

        return $this;
    }

    /**
     * Use the EsModules relation EsModules object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsModulesQuery A secondary query class using the current class as primary query
     */
    public function useEsModulesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsModules($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsModules', '\EsModulesQuery');
    }

    /**
     * Filter the query by a related \EsTablesRoles object
     *
     * @param \EsTablesRoles|ObjectCollection $esTablesRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsTablesQuery The current query, for fluid interface
     */
    public function filterByEsTablesRoles($esTablesRoles, $comparison = null)
    {
        if ($esTablesRoles instanceof \EsTablesRoles) {
            return $this
                ->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $esTablesRoles->getIdTable(), $comparison);
        } elseif ($esTablesRoles instanceof ObjectCollection) {
            return $this
                ->useEsTablesRolesQuery()
                ->filterByPrimaryKeys($esTablesRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsTablesRoles() only accepts arguments of type \EsTablesRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsTablesRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function joinEsTablesRoles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsTablesRoles');

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
            $this->addJoinObject($join, 'EsTablesRoles');
        }

        return $this;
    }

    /**
     * Use the EsTablesRoles relation EsTablesRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsTablesRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsTablesRolesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsTablesRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsTablesRoles', '\EsTablesRolesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsTables $esTables Object to remove from the list of results
     *
     * @return $this|ChildEsTablesQuery The current query, for fluid interface
     */
    public function prune($esTables = null)
    {
        if ($esTables) {
            $this->addUsingAlias(EsTablesTableMap::COL_ID_TABLE, $esTables->getIdTable(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_tables table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsTablesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsTablesTableMap::clearInstancePool();
            EsTablesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsTablesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsTablesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsTablesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsTablesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsTablesQuery
