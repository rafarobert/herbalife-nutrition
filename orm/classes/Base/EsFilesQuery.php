<?php

namespace Base;

use \EsFiles as ChildEsFiles;
use \EsFilesQuery as ChildEsFilesQuery;
use \Exception;
use \PDO;
use Map\EsFilesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_files' table.
 *
 *
 *
 * @method     ChildEsFilesQuery orderByIdFile($order = Criteria::ASC) Order by the id_file column
 * @method     ChildEsFilesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEsFilesQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildEsFilesQuery orderByExt($order = Criteria::ASC) Order by the ext column
 * @method     ChildEsFilesQuery orderByRawName($order = Criteria::ASC) Order by the raw_name column
 * @method     ChildEsFilesQuery orderByFullPath($order = Criteria::ASC) Order by the full_path column
 * @method     ChildEsFilesQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     ChildEsFilesQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildEsFilesQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildEsFilesQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method     ChildEsFilesQuery orderByLibrary($order = Criteria::ASC) Order by the library column
 * @method     ChildEsFilesQuery orderByNroThumbs($order = Criteria::ASC) Order by the nro_thumbs column
 * @method     ChildEsFilesQuery orderByIdParent($order = Criteria::ASC) Order by the id_parent column
 * @method     ChildEsFilesQuery orderByThumbMarker($order = Criteria::ASC) Order by the thumb_marker column
 * @method     ChildEsFilesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildEsFilesQuery orderByX($order = Criteria::ASC) Order by the x column
 * @method     ChildEsFilesQuery orderByY($order = Criteria::ASC) Order by the y column
 * @method     ChildEsFilesQuery orderByFixWidth($order = Criteria::ASC) Order by the fix_width column
 * @method     ChildEsFilesQuery orderByFixHeight($order = Criteria::ASC) Order by the fix_height column
 * @method     ChildEsFilesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsFilesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsFilesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsFilesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsFilesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsFilesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsFilesQuery groupByIdFile() Group by the id_file column
 * @method     ChildEsFilesQuery groupByName() Group by the name column
 * @method     ChildEsFilesQuery groupByUrl() Group by the url column
 * @method     ChildEsFilesQuery groupByExt() Group by the ext column
 * @method     ChildEsFilesQuery groupByRawName() Group by the raw_name column
 * @method     ChildEsFilesQuery groupByFullPath() Group by the full_path column
 * @method     ChildEsFilesQuery groupByPath() Group by the path column
 * @method     ChildEsFilesQuery groupByWidth() Group by the width column
 * @method     ChildEsFilesQuery groupByHeight() Group by the height column
 * @method     ChildEsFilesQuery groupBySize() Group by the size column
 * @method     ChildEsFilesQuery groupByLibrary() Group by the library column
 * @method     ChildEsFilesQuery groupByNroThumbs() Group by the nro_thumbs column
 * @method     ChildEsFilesQuery groupByIdParent() Group by the id_parent column
 * @method     ChildEsFilesQuery groupByThumbMarker() Group by the thumb_marker column
 * @method     ChildEsFilesQuery groupByType() Group by the type column
 * @method     ChildEsFilesQuery groupByX() Group by the x column
 * @method     ChildEsFilesQuery groupByY() Group by the y column
 * @method     ChildEsFilesQuery groupByFixWidth() Group by the fix_width column
 * @method     ChildEsFilesQuery groupByFixHeight() Group by the fix_height column
 * @method     ChildEsFilesQuery groupByStatus() Group by the status column
 * @method     ChildEsFilesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsFilesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsFilesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsFilesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsFilesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsFilesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsFilesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsFilesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsFilesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsFilesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsFilesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsFilesQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsFilesQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsFilesQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsFilesQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsFilesQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsFilesQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsFilesQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsFilesQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsFilesQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsFilesQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsFilesQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsFilesQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsFilesQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsFilesQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsFilesQuery leftJoinEsFilesRelatedByIdParent($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsFilesRelatedByIdParent relation
 * @method     ChildEsFilesQuery rightJoinEsFilesRelatedByIdParent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsFilesRelatedByIdParent relation
 * @method     ChildEsFilesQuery innerJoinEsFilesRelatedByIdParent($relationAlias = null) Adds a INNER JOIN clause to the query using the EsFilesRelatedByIdParent relation
 *
 * @method     ChildEsFilesQuery joinWithEsFilesRelatedByIdParent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsFilesRelatedByIdParent relation
 *
 * @method     ChildEsFilesQuery leftJoinWithEsFilesRelatedByIdParent() Adds a LEFT JOIN clause and with to the query using the EsFilesRelatedByIdParent relation
 * @method     ChildEsFilesQuery rightJoinWithEsFilesRelatedByIdParent() Adds a RIGHT JOIN clause and with to the query using the EsFilesRelatedByIdParent relation
 * @method     ChildEsFilesQuery innerJoinWithEsFilesRelatedByIdParent() Adds a INNER JOIN clause and with to the query using the EsFilesRelatedByIdParent relation
 *
 * @method     ChildEsFilesQuery leftJoinEsCities($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCities relation
 * @method     ChildEsFilesQuery rightJoinEsCities($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCities relation
 * @method     ChildEsFilesQuery innerJoinEsCities($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCities relation
 *
 * @method     ChildEsFilesQuery joinWithEsCities($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCities relation
 *
 * @method     ChildEsFilesQuery leftJoinWithEsCities() Adds a LEFT JOIN clause and with to the query using the EsCities relation
 * @method     ChildEsFilesQuery rightJoinWithEsCities() Adds a RIGHT JOIN clause and with to the query using the EsCities relation
 * @method     ChildEsFilesQuery innerJoinWithEsCities() Adds a INNER JOIN clause and with to the query using the EsCities relation
 *
 * @method     ChildEsFilesQuery leftJoinEsFilesRelatedByIdFile($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsFilesRelatedByIdFile relation
 * @method     ChildEsFilesQuery rightJoinEsFilesRelatedByIdFile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsFilesRelatedByIdFile relation
 * @method     ChildEsFilesQuery innerJoinEsFilesRelatedByIdFile($relationAlias = null) Adds a INNER JOIN clause to the query using the EsFilesRelatedByIdFile relation
 *
 * @method     ChildEsFilesQuery joinWithEsFilesRelatedByIdFile($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsFilesRelatedByIdFile relation
 *
 * @method     ChildEsFilesQuery leftJoinWithEsFilesRelatedByIdFile() Adds a LEFT JOIN clause and with to the query using the EsFilesRelatedByIdFile relation
 * @method     ChildEsFilesQuery rightJoinWithEsFilesRelatedByIdFile() Adds a RIGHT JOIN clause and with to the query using the EsFilesRelatedByIdFile relation
 * @method     ChildEsFilesQuery innerJoinWithEsFilesRelatedByIdFile() Adds a INNER JOIN clause and with to the query using the EsFilesRelatedByIdFile relation
 *
 * @method     ChildEsFilesQuery leftJoinEsUsersRelatedByIdCoverPicture($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdCoverPicture relation
 * @method     ChildEsFilesQuery rightJoinEsUsersRelatedByIdCoverPicture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdCoverPicture relation
 * @method     ChildEsFilesQuery innerJoinEsUsersRelatedByIdCoverPicture($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdCoverPicture relation
 *
 * @method     ChildEsFilesQuery joinWithEsUsersRelatedByIdCoverPicture($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdCoverPicture relation
 *
 * @method     ChildEsFilesQuery leftJoinWithEsUsersRelatedByIdCoverPicture() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdCoverPicture relation
 * @method     ChildEsFilesQuery rightJoinWithEsUsersRelatedByIdCoverPicture() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdCoverPicture relation
 * @method     ChildEsFilesQuery innerJoinWithEsUsersRelatedByIdCoverPicture() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdCoverPicture relation
 *
 * @method     \EsUsersQuery|\EsFilesQuery|\EsCitiesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsFiles findOne(ConnectionInterface $con = null) Return the first ChildEsFiles matching the query
 * @method     ChildEsFiles findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsFiles matching the query, or a new ChildEsFiles object populated from the query conditions when no match is found
 *
 * @method     ChildEsFiles findOneByIdFile(int $id_file) Return the first ChildEsFiles filtered by the id_file column
 * @method     ChildEsFiles findOneByName(string $name) Return the first ChildEsFiles filtered by the name column
 * @method     ChildEsFiles findOneByUrl(string $url) Return the first ChildEsFiles filtered by the url column
 * @method     ChildEsFiles findOneByExt(string $ext) Return the first ChildEsFiles filtered by the ext column
 * @method     ChildEsFiles findOneByRawName(string $raw_name) Return the first ChildEsFiles filtered by the raw_name column
 * @method     ChildEsFiles findOneByFullPath(string $full_path) Return the first ChildEsFiles filtered by the full_path column
 * @method     ChildEsFiles findOneByPath(string $path) Return the first ChildEsFiles filtered by the path column
 * @method     ChildEsFiles findOneByWidth(int $width) Return the first ChildEsFiles filtered by the width column
 * @method     ChildEsFiles findOneByHeight(int $height) Return the first ChildEsFiles filtered by the height column
 * @method     ChildEsFiles findOneBySize(string $size) Return the first ChildEsFiles filtered by the size column
 * @method     ChildEsFiles findOneByLibrary(string $library) Return the first ChildEsFiles filtered by the library column
 * @method     ChildEsFiles findOneByNroThumbs(int $nro_thumbs) Return the first ChildEsFiles filtered by the nro_thumbs column
 * @method     ChildEsFiles findOneByIdParent(int $id_parent) Return the first ChildEsFiles filtered by the id_parent column
 * @method     ChildEsFiles findOneByThumbMarker(string $thumb_marker) Return the first ChildEsFiles filtered by the thumb_marker column
 * @method     ChildEsFiles findOneByType(string $type) Return the first ChildEsFiles filtered by the type column
 * @method     ChildEsFiles findOneByX(string $x) Return the first ChildEsFiles filtered by the x column
 * @method     ChildEsFiles findOneByY(string $y) Return the first ChildEsFiles filtered by the y column
 * @method     ChildEsFiles findOneByFixWidth(string $fix_width) Return the first ChildEsFiles filtered by the fix_width column
 * @method     ChildEsFiles findOneByFixHeight(string $fix_height) Return the first ChildEsFiles filtered by the fix_height column
 * @method     ChildEsFiles findOneByStatus(string $status) Return the first ChildEsFiles filtered by the status column
 * @method     ChildEsFiles findOneByChangeCount(int $change_count) Return the first ChildEsFiles filtered by the change_count column
 * @method     ChildEsFiles findOneByIdUserModified(int $id_user_modified) Return the first ChildEsFiles filtered by the id_user_modified column
 * @method     ChildEsFiles findOneByIdUserCreated(int $id_user_created) Return the first ChildEsFiles filtered by the id_user_created column
 * @method     ChildEsFiles findOneByDateModified(string $date_modified) Return the first ChildEsFiles filtered by the date_modified column
 * @method     ChildEsFiles findOneByDateCreated(string $date_created) Return the first ChildEsFiles filtered by the date_created column *

 * @method     ChildEsFiles requirePk($key, ConnectionInterface $con = null) Return the ChildEsFiles by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOne(ConnectionInterface $con = null) Return the first ChildEsFiles matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsFiles requireOneByIdFile(int $id_file) Return the first ChildEsFiles filtered by the id_file column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByName(string $name) Return the first ChildEsFiles filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByUrl(string $url) Return the first ChildEsFiles filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByExt(string $ext) Return the first ChildEsFiles filtered by the ext column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByRawName(string $raw_name) Return the first ChildEsFiles filtered by the raw_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByFullPath(string $full_path) Return the first ChildEsFiles filtered by the full_path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByPath(string $path) Return the first ChildEsFiles filtered by the path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByWidth(int $width) Return the first ChildEsFiles filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByHeight(int $height) Return the first ChildEsFiles filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneBySize(string $size) Return the first ChildEsFiles filtered by the size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByLibrary(string $library) Return the first ChildEsFiles filtered by the library column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByNroThumbs(int $nro_thumbs) Return the first ChildEsFiles filtered by the nro_thumbs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByIdParent(int $id_parent) Return the first ChildEsFiles filtered by the id_parent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByThumbMarker(string $thumb_marker) Return the first ChildEsFiles filtered by the thumb_marker column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByType(string $type) Return the first ChildEsFiles filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByX(string $x) Return the first ChildEsFiles filtered by the x column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByY(string $y) Return the first ChildEsFiles filtered by the y column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByFixWidth(string $fix_width) Return the first ChildEsFiles filtered by the fix_width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByFixHeight(string $fix_height) Return the first ChildEsFiles filtered by the fix_height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByStatus(string $status) Return the first ChildEsFiles filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByChangeCount(int $change_count) Return the first ChildEsFiles filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsFiles filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsFiles filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByDateModified(string $date_modified) Return the first ChildEsFiles filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsFiles requireOneByDateCreated(string $date_created) Return the first ChildEsFiles filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsFiles[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsFiles objects based on current ModelCriteria
 * @method     ChildEsFiles[]|ObjectCollection findByIdFile(int $id_file) Return ChildEsFiles objects filtered by the id_file column
 * @method     ChildEsFiles[]|ObjectCollection findByName(string $name) Return ChildEsFiles objects filtered by the name column
 * @method     ChildEsFiles[]|ObjectCollection findByUrl(string $url) Return ChildEsFiles objects filtered by the url column
 * @method     ChildEsFiles[]|ObjectCollection findByExt(string $ext) Return ChildEsFiles objects filtered by the ext column
 * @method     ChildEsFiles[]|ObjectCollection findByRawName(string $raw_name) Return ChildEsFiles objects filtered by the raw_name column
 * @method     ChildEsFiles[]|ObjectCollection findByFullPath(string $full_path) Return ChildEsFiles objects filtered by the full_path column
 * @method     ChildEsFiles[]|ObjectCollection findByPath(string $path) Return ChildEsFiles objects filtered by the path column
 * @method     ChildEsFiles[]|ObjectCollection findByWidth(int $width) Return ChildEsFiles objects filtered by the width column
 * @method     ChildEsFiles[]|ObjectCollection findByHeight(int $height) Return ChildEsFiles objects filtered by the height column
 * @method     ChildEsFiles[]|ObjectCollection findBySize(string $size) Return ChildEsFiles objects filtered by the size column
 * @method     ChildEsFiles[]|ObjectCollection findByLibrary(string $library) Return ChildEsFiles objects filtered by the library column
 * @method     ChildEsFiles[]|ObjectCollection findByNroThumbs(int $nro_thumbs) Return ChildEsFiles objects filtered by the nro_thumbs column
 * @method     ChildEsFiles[]|ObjectCollection findByIdParent(int $id_parent) Return ChildEsFiles objects filtered by the id_parent column
 * @method     ChildEsFiles[]|ObjectCollection findByThumbMarker(string $thumb_marker) Return ChildEsFiles objects filtered by the thumb_marker column
 * @method     ChildEsFiles[]|ObjectCollection findByType(string $type) Return ChildEsFiles objects filtered by the type column
 * @method     ChildEsFiles[]|ObjectCollection findByX(string $x) Return ChildEsFiles objects filtered by the x column
 * @method     ChildEsFiles[]|ObjectCollection findByY(string $y) Return ChildEsFiles objects filtered by the y column
 * @method     ChildEsFiles[]|ObjectCollection findByFixWidth(string $fix_width) Return ChildEsFiles objects filtered by the fix_width column
 * @method     ChildEsFiles[]|ObjectCollection findByFixHeight(string $fix_height) Return ChildEsFiles objects filtered by the fix_height column
 * @method     ChildEsFiles[]|ObjectCollection findByStatus(string $status) Return ChildEsFiles objects filtered by the status column
 * @method     ChildEsFiles[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsFiles objects filtered by the change_count column
 * @method     ChildEsFiles[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsFiles objects filtered by the id_user_modified column
 * @method     ChildEsFiles[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsFiles objects filtered by the id_user_created column
 * @method     ChildEsFiles[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsFiles objects filtered by the date_modified column
 * @method     ChildEsFiles[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsFiles objects filtered by the date_created column
 * @method     ChildEsFiles[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsFilesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsFilesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsFiles', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsFilesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsFilesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsFilesQuery) {
            return $criteria;
        }
        $query = new ChildEsFilesQuery();
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
     * @return ChildEsFiles|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsFilesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsFilesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsFiles A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_file, name, url, ext, raw_name, full_path, path, width, height, size, library, nro_thumbs, id_parent, thumb_marker, type, x, y, fix_width, fix_height, status, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_files WHERE id_file = :p0';
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
            /** @var ChildEsFiles $obj */
            $obj = new ChildEsFiles();
            $obj->hydrate($row);
            EsFilesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsFiles|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_file column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFile(1234); // WHERE id_file = 1234
     * $query->filterByIdFile(array(12, 34)); // WHERE id_file IN (12, 34)
     * $query->filterByIdFile(array('min' => 12)); // WHERE id_file > 12
     * </code>
     *
     * @param     mixed $idFile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByIdFile($idFile = null, $comparison = null)
    {
        if (is_array($idFile)) {
            $useMinMax = false;
            if (isset($idFile['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $idFile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFile['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $idFile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $idFile, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the ext column
     *
     * Example usage:
     * <code>
     * $query->filterByExt('fooValue');   // WHERE ext = 'fooValue'
     * $query->filterByExt('%fooValue%', Criteria::LIKE); // WHERE ext LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ext The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByExt($ext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ext)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_EXT, $ext, $comparison);
    }

    /**
     * Filter the query on the raw_name column
     *
     * Example usage:
     * <code>
     * $query->filterByRawName('fooValue');   // WHERE raw_name = 'fooValue'
     * $query->filterByRawName('%fooValue%', Criteria::LIKE); // WHERE raw_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rawName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByRawName($rawName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rawName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_RAW_NAME, $rawName, $comparison);
    }

    /**
     * Filter the query on the full_path column
     *
     * Example usage:
     * <code>
     * $query->filterByFullPath('fooValue');   // WHERE full_path = 'fooValue'
     * $query->filterByFullPath('%fooValue%', Criteria::LIKE); // WHERE full_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fullPath The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByFullPath($fullPath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fullPath)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_FULL_PATH, $fullPath, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%', Criteria::LIKE); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_PATH, $path, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the size column
     *
     * Example usage:
     * <code>
     * $query->filterBySize(1234); // WHERE size = 1234
     * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
     * $query->filterBySize(array('min' => 12)); // WHERE size > 12
     * </code>
     *
     * @param     mixed $size The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_SIZE, $size, $comparison);
    }

    /**
     * Filter the query on the library column
     *
     * Example usage:
     * <code>
     * $query->filterByLibrary('fooValue');   // WHERE library = 'fooValue'
     * $query->filterByLibrary('%fooValue%', Criteria::LIKE); // WHERE library LIKE '%fooValue%'
     * </code>
     *
     * @param     string $library The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByLibrary($library = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($library)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_LIBRARY, $library, $comparison);
    }

    /**
     * Filter the query on the nro_thumbs column
     *
     * Example usage:
     * <code>
     * $query->filterByNroThumbs(1234); // WHERE nro_thumbs = 1234
     * $query->filterByNroThumbs(array(12, 34)); // WHERE nro_thumbs IN (12, 34)
     * $query->filterByNroThumbs(array('min' => 12)); // WHERE nro_thumbs > 12
     * </code>
     *
     * @param     mixed $nroThumbs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByNroThumbs($nroThumbs = null, $comparison = null)
    {
        if (is_array($nroThumbs)) {
            $useMinMax = false;
            if (isset($nroThumbs['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_NRO_THUMBS, $nroThumbs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nroThumbs['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_NRO_THUMBS, $nroThumbs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_NRO_THUMBS, $nroThumbs, $comparison);
    }

    /**
     * Filter the query on the id_parent column
     *
     * Example usage:
     * <code>
     * $query->filterByIdParent(1234); // WHERE id_parent = 1234
     * $query->filterByIdParent(array(12, 34)); // WHERE id_parent IN (12, 34)
     * $query->filterByIdParent(array('min' => 12)); // WHERE id_parent > 12
     * </code>
     *
     * @see       filterByEsFilesRelatedByIdParent()
     *
     * @param     mixed $idParent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByIdParent($idParent = null, $comparison = null)
    {
        if (is_array($idParent)) {
            $useMinMax = false;
            if (isset($idParent['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_PARENT, $idParent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idParent['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_PARENT, $idParent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_ID_PARENT, $idParent, $comparison);
    }

    /**
     * Filter the query on the thumb_marker column
     *
     * Example usage:
     * <code>
     * $query->filterByThumbMarker('fooValue');   // WHERE thumb_marker = 'fooValue'
     * $query->filterByThumbMarker('%fooValue%', Criteria::LIKE); // WHERE thumb_marker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thumbMarker The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByThumbMarker($thumbMarker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thumbMarker)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_THUMB_MARKER, $thumbMarker, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the x column
     *
     * Example usage:
     * <code>
     * $query->filterByX(1234); // WHERE x = 1234
     * $query->filterByX(array(12, 34)); // WHERE x IN (12, 34)
     * $query->filterByX(array('min' => 12)); // WHERE x > 12
     * </code>
     *
     * @param     mixed $x The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByX($x = null, $comparison = null)
    {
        if (is_array($x)) {
            $useMinMax = false;
            if (isset($x['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_X, $x['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($x['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_X, $x['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_X, $x, $comparison);
    }

    /**
     * Filter the query on the y column
     *
     * Example usage:
     * <code>
     * $query->filterByY(1234); // WHERE y = 1234
     * $query->filterByY(array(12, 34)); // WHERE y IN (12, 34)
     * $query->filterByY(array('min' => 12)); // WHERE y > 12
     * </code>
     *
     * @param     mixed $y The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByY($y = null, $comparison = null)
    {
        if (is_array($y)) {
            $useMinMax = false;
            if (isset($y['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_Y, $y['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($y['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_Y, $y['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_Y, $y, $comparison);
    }

    /**
     * Filter the query on the fix_width column
     *
     * Example usage:
     * <code>
     * $query->filterByFixWidth(1234); // WHERE fix_width = 1234
     * $query->filterByFixWidth(array(12, 34)); // WHERE fix_width IN (12, 34)
     * $query->filterByFixWidth(array('min' => 12)); // WHERE fix_width > 12
     * </code>
     *
     * @param     mixed $fixWidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByFixWidth($fixWidth = null, $comparison = null)
    {
        if (is_array($fixWidth)) {
            $useMinMax = false;
            if (isset($fixWidth['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_FIX_WIDTH, $fixWidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fixWidth['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_FIX_WIDTH, $fixWidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_FIX_WIDTH, $fixWidth, $comparison);
    }

    /**
     * Filter the query on the fix_height column
     *
     * Example usage:
     * <code>
     * $query->filterByFixHeight(1234); // WHERE fix_height = 1234
     * $query->filterByFixHeight(array(12, 34)); // WHERE fix_height IN (12, 34)
     * $query->filterByFixHeight(array('min' => 12)); // WHERE fix_height > 12
     * </code>
     *
     * @param     mixed $fixHeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByFixHeight($fixHeight = null, $comparison = null)
    {
        if (is_array($fixHeight)) {
            $useMinMax = false;
            if (isset($fixHeight['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_FIX_HEIGHT, $fixHeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fixHeight['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_FIX_HEIGHT, $fixHeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_FIX_HEIGHT, $fixHeight, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsFilesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsFilesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
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
     * @return ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
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
     * Filter the query by a related \EsFiles object
     *
     * @param \EsFiles|ObjectCollection $esFiles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByEsFilesRelatedByIdParent($esFiles, $comparison = null)
    {
        if ($esFiles instanceof \EsFiles) {
            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_PARENT, $esFiles->getIdFile(), $comparison);
        } elseif ($esFiles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_PARENT, $esFiles->toKeyValue('PrimaryKey', 'IdFile'), $comparison);
        } else {
            throw new PropelException('filterByEsFilesRelatedByIdParent() only accepts arguments of type \EsFiles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsFilesRelatedByIdParent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function joinEsFilesRelatedByIdParent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsFilesRelatedByIdParent');

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
            $this->addJoinObject($join, 'EsFilesRelatedByIdParent');
        }

        return $this;
    }

    /**
     * Use the EsFilesRelatedByIdParent relation EsFiles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsFilesQuery A secondary query class using the current class as primary query
     */
    public function useEsFilesRelatedByIdParentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsFilesRelatedByIdParent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsFilesRelatedByIdParent', '\EsFilesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByEsCities($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $esCities->getIdCoverPicture(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            return $this
                ->useEsCitiesQuery()
                ->filterByPrimaryKeys($esCities->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
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
     * Filter the query by a related \EsFiles object
     *
     * @param \EsFiles|ObjectCollection $esFiles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByEsFilesRelatedByIdFile($esFiles, $comparison = null)
    {
        if ($esFiles instanceof \EsFiles) {
            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $esFiles->getIdParent(), $comparison);
        } elseif ($esFiles instanceof ObjectCollection) {
            return $this
                ->useEsFilesRelatedByIdFileQuery()
                ->filterByPrimaryKeys($esFiles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsFilesRelatedByIdFile() only accepts arguments of type \EsFiles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsFilesRelatedByIdFile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function joinEsFilesRelatedByIdFile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsFilesRelatedByIdFile');

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
            $this->addJoinObject($join, 'EsFilesRelatedByIdFile');
        }

        return $this;
    }

    /**
     * Use the EsFilesRelatedByIdFile relation EsFiles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsFilesQuery A secondary query class using the current class as primary query
     */
    public function useEsFilesRelatedByIdFileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsFilesRelatedByIdFile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsFilesRelatedByIdFile', '\EsFilesQuery');
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsFilesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdCoverPicture($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $esUsers->getIdCoverPicture(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            return $this
                ->useEsUsersRelatedByIdCoverPictureQuery()
                ->filterByPrimaryKeys($esUsers->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsUsersRelatedByIdCoverPicture() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRelatedByIdCoverPicture relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function joinEsUsersRelatedByIdCoverPicture($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRelatedByIdCoverPicture');

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
            $this->addJoinObject($join, 'EsUsersRelatedByIdCoverPicture');
        }

        return $this;
    }

    /**
     * Use the EsUsersRelatedByIdCoverPicture relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRelatedByIdCoverPictureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsUsersRelatedByIdCoverPicture($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRelatedByIdCoverPicture', '\EsUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsFiles $esFiles Object to remove from the list of results
     *
     * @return $this|ChildEsFilesQuery The current query, for fluid interface
     */
    public function prune($esFiles = null)
    {
        if ($esFiles) {
            $this->addUsingAlias(EsFilesTableMap::COL_ID_FILE, $esFiles->getIdFile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_files table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsFilesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsFilesTableMap::clearInstancePool();
            EsFilesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsFilesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsFilesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsFilesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsFilesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsFilesQuery
