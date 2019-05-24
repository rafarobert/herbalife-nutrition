<?php

namespace Base;

use \EsMessages as ChildEsMessages;
use \EsMessagesQuery as ChildEsMessagesQuery;
use \Exception;
use \PDO;
use Map\EsMessagesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_messages' table.
 *
 *
 *
 * @method     ChildEsMessagesQuery orderByIdMessage($order = Criteria::ASC) Order by the id_message column
 * @method     ChildEsMessagesQuery orderByPhoneNumber($order = Criteria::ASC) Order by the phone_number column
 * @method     ChildEsMessagesQuery orderByCountryCode($order = Criteria::ASC) Order by the country_code column
 * @method     ChildEsMessagesQuery orderByAuthyId($order = Criteria::ASC) Order by the authy_id column
 * @method     ChildEsMessagesQuery orderByVerified($order = Criteria::ASC) Order by the verified column
 *
 * @method     ChildEsMessagesQuery groupByIdMessage() Group by the id_message column
 * @method     ChildEsMessagesQuery groupByPhoneNumber() Group by the phone_number column
 * @method     ChildEsMessagesQuery groupByCountryCode() Group by the country_code column
 * @method     ChildEsMessagesQuery groupByAuthyId() Group by the authy_id column
 * @method     ChildEsMessagesQuery groupByVerified() Group by the verified column
 *
 * @method     ChildEsMessagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsMessagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsMessagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsMessagesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsMessagesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsMessagesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsMessages findOne(ConnectionInterface $con = null) Return the first ChildEsMessages matching the query
 * @method     ChildEsMessages findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsMessages matching the query, or a new ChildEsMessages object populated from the query conditions when no match is found
 *
 * @method     ChildEsMessages findOneByIdMessage(int $id_message) Return the first ChildEsMessages filtered by the id_message column
 * @method     ChildEsMessages findOneByPhoneNumber(string $phone_number) Return the first ChildEsMessages filtered by the phone_number column
 * @method     ChildEsMessages findOneByCountryCode(string $country_code) Return the first ChildEsMessages filtered by the country_code column
 * @method     ChildEsMessages findOneByAuthyId(string $authy_id) Return the first ChildEsMessages filtered by the authy_id column
 * @method     ChildEsMessages findOneByVerified(boolean $verified) Return the first ChildEsMessages filtered by the verified column *

 * @method     ChildEsMessages requirePk($key, ConnectionInterface $con = null) Return the ChildEsMessages by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsMessages requireOne(ConnectionInterface $con = null) Return the first ChildEsMessages matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsMessages requireOneByIdMessage(int $id_message) Return the first ChildEsMessages filtered by the id_message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsMessages requireOneByPhoneNumber(string $phone_number) Return the first ChildEsMessages filtered by the phone_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsMessages requireOneByCountryCode(string $country_code) Return the first ChildEsMessages filtered by the country_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsMessages requireOneByAuthyId(string $authy_id) Return the first ChildEsMessages filtered by the authy_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsMessages requireOneByVerified(boolean $verified) Return the first ChildEsMessages filtered by the verified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsMessages[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsMessages objects based on current ModelCriteria
 * @method     ChildEsMessages[]|ObjectCollection findByIdMessage(int $id_message) Return ChildEsMessages objects filtered by the id_message column
 * @method     ChildEsMessages[]|ObjectCollection findByPhoneNumber(string $phone_number) Return ChildEsMessages objects filtered by the phone_number column
 * @method     ChildEsMessages[]|ObjectCollection findByCountryCode(string $country_code) Return ChildEsMessages objects filtered by the country_code column
 * @method     ChildEsMessages[]|ObjectCollection findByAuthyId(string $authy_id) Return ChildEsMessages objects filtered by the authy_id column
 * @method     ChildEsMessages[]|ObjectCollection findByVerified(boolean $verified) Return ChildEsMessages objects filtered by the verified column
 * @method     ChildEsMessages[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsMessagesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsMessagesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsMessages', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsMessagesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsMessagesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsMessagesQuery) {
            return $criteria;
        }
        $query = new ChildEsMessagesQuery();
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
     * @return ChildEsMessages|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsMessagesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsMessagesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsMessages A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_message, phone_number, country_code, authy_id, verified FROM es_messages WHERE id_message = :p0';
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
            /** @var ChildEsMessages $obj */
            $obj = new ChildEsMessages();
            $obj->hydrate($row);
            EsMessagesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsMessages|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsMessagesTableMap::COL_ID_MESSAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsMessagesTableMap::COL_ID_MESSAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_message column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMessage(1234); // WHERE id_message = 1234
     * $query->filterByIdMessage(array(12, 34)); // WHERE id_message IN (12, 34)
     * $query->filterByIdMessage(array('min' => 12)); // WHERE id_message > 12
     * </code>
     *
     * @param     mixed $idMessage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByIdMessage($idMessage = null, $comparison = null)
    {
        if (is_array($idMessage)) {
            $useMinMax = false;
            if (isset($idMessage['min'])) {
                $this->addUsingAlias(EsMessagesTableMap::COL_ID_MESSAGE, $idMessage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMessage['max'])) {
                $this->addUsingAlias(EsMessagesTableMap::COL_ID_MESSAGE, $idMessage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsMessagesTableMap::COL_ID_MESSAGE, $idMessage, $comparison);
    }

    /**
     * Filter the query on the phone_number column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneNumber('fooValue');   // WHERE phone_number = 'fooValue'
     * $query->filterByPhoneNumber('%fooValue%', Criteria::LIKE); // WHERE phone_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phoneNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByPhoneNumber($phoneNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phoneNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsMessagesTableMap::COL_PHONE_NUMBER, $phoneNumber, $comparison);
    }

    /**
     * Filter the query on the country_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryCode('fooValue');   // WHERE country_code = 'fooValue'
     * $query->filterByCountryCode('%fooValue%', Criteria::LIKE); // WHERE country_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $countryCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByCountryCode($countryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($countryCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsMessagesTableMap::COL_COUNTRY_CODE, $countryCode, $comparison);
    }

    /**
     * Filter the query on the authy_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthyId('fooValue');   // WHERE authy_id = 'fooValue'
     * $query->filterByAuthyId('%fooValue%', Criteria::LIKE); // WHERE authy_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authyId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByAuthyId($authyId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authyId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsMessagesTableMap::COL_AUTHY_ID, $authyId, $comparison);
    }

    /**
     * Filter the query on the verified column
     *
     * Example usage:
     * <code>
     * $query->filterByVerified(true); // WHERE verified = true
     * $query->filterByVerified('yes'); // WHERE verified = true
     * </code>
     *
     * @param     boolean|string $verified The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function filterByVerified($verified = null, $comparison = null)
    {
        if (is_string($verified)) {
            $verified = in_array(strtolower($verified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EsMessagesTableMap::COL_VERIFIED, $verified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsMessages $esMessages Object to remove from the list of results
     *
     * @return $this|ChildEsMessagesQuery The current query, for fluid interface
     */
    public function prune($esMessages = null)
    {
        if ($esMessages) {
            $this->addUsingAlias(EsMessagesTableMap::COL_ID_MESSAGE, $esMessages->getIdMessage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_messages table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsMessagesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsMessagesTableMap::clearInstancePool();
            EsMessagesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsMessagesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsMessagesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsMessagesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsMessagesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsMessagesQuery
