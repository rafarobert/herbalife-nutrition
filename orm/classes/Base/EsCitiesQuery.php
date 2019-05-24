<?php

namespace Base;

use \EsCities as ChildEsCities;
use \EsCitiesQuery as ChildEsCitiesQuery;
use \Exception;
use \PDO;
use Map\EsCitiesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_cities' table.
 *
 *
 *
 * @method     ChildEsCitiesQuery orderByIdCity($order = Criteria::ASC) Order by the id_city column
 * @method     ChildEsCitiesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEsCitiesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildEsCitiesQuery orderByAbbreviation($order = Criteria::ASC) Order by the abbreviation column
 * @method     ChildEsCitiesQuery orderByIdCapital($order = Criteria::ASC) Order by the id_capital column
 * @method     ChildEsCitiesQuery orderByIdRegion($order = Criteria::ASC) Order by the id_region column
 * @method     ChildEsCitiesQuery orderByLat($order = Criteria::ASC) Order by the lat column
 * @method     ChildEsCitiesQuery orderByLng($order = Criteria::ASC) Order by the lng column
 * @method     ChildEsCitiesQuery orderByArea($order = Criteria::ASC) Order by the area column
 * @method     ChildEsCitiesQuery orderByNroMunicipios($order = Criteria::ASC) Order by the nro_municipios column
 * @method     ChildEsCitiesQuery orderBySurface($order = Criteria::ASC) Order by the surface column
 * @method     ChildEsCitiesQuery orderByIdsFiles($order = Criteria::ASC) Order by the ids_files column
 * @method     ChildEsCitiesQuery orderByIdCoverPicture($order = Criteria::ASC) Order by the id_cover_picture column
 * @method     ChildEsCitiesQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildEsCitiesQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     ChildEsCitiesQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsCitiesQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsCitiesQuery orderByIdUserModified($order = Criteria::ASC) Order by the id_user_modified column
 * @method     ChildEsCitiesQuery orderByIdUserCreated($order = Criteria::ASC) Order by the id_user_created column
 * @method     ChildEsCitiesQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsCitiesQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsCitiesQuery groupByIdCity() Group by the id_city column
 * @method     ChildEsCitiesQuery groupByName() Group by the name column
 * @method     ChildEsCitiesQuery groupByDescription() Group by the description column
 * @method     ChildEsCitiesQuery groupByAbbreviation() Group by the abbreviation column
 * @method     ChildEsCitiesQuery groupByIdCapital() Group by the id_capital column
 * @method     ChildEsCitiesQuery groupByIdRegion() Group by the id_region column
 * @method     ChildEsCitiesQuery groupByLat() Group by the lat column
 * @method     ChildEsCitiesQuery groupByLng() Group by the lng column
 * @method     ChildEsCitiesQuery groupByArea() Group by the area column
 * @method     ChildEsCitiesQuery groupByNroMunicipios() Group by the nro_municipios column
 * @method     ChildEsCitiesQuery groupBySurface() Group by the surface column
 * @method     ChildEsCitiesQuery groupByIdsFiles() Group by the ids_files column
 * @method     ChildEsCitiesQuery groupByIdCoverPicture() Group by the id_cover_picture column
 * @method     ChildEsCitiesQuery groupByHeight() Group by the height column
 * @method     ChildEsCitiesQuery groupByTipo() Group by the tipo column
 * @method     ChildEsCitiesQuery groupByStatus() Group by the status column
 * @method     ChildEsCitiesQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsCitiesQuery groupByIdUserModified() Group by the id_user_modified column
 * @method     ChildEsCitiesQuery groupByIdUserCreated() Group by the id_user_created column
 * @method     ChildEsCitiesQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsCitiesQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsCitiesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsCitiesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsCitiesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsCitiesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsCitiesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsCitiesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsCitiesQuery leftJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsCitiesQuery rightJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsCitiesQuery innerJoinEsUsersRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsCitiesQuery joinWithEsUsersRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsUsersRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsCitiesQuery rightJoinWithEsUsersRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 * @method     ChildEsCitiesQuery innerJoinWithEsUsersRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserCreated relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsCitiesQuery rightJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsCitiesQuery innerJoinEsUsersRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsCitiesQuery joinWithEsUsersRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsUsersRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsCitiesQuery rightJoinWithEsUsersRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 * @method     ChildEsCitiesQuery innerJoinWithEsUsersRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdUserModified relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsCitiesRelatedByIdCapital($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdCapital relation
 * @method     ChildEsCitiesQuery rightJoinEsCitiesRelatedByIdCapital($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdCapital relation
 * @method     ChildEsCitiesQuery innerJoinEsCitiesRelatedByIdCapital($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdCapital relation
 *
 * @method     ChildEsCitiesQuery joinWithEsCitiesRelatedByIdCapital($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdCapital relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsCitiesRelatedByIdCapital() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdCapital relation
 * @method     ChildEsCitiesQuery rightJoinWithEsCitiesRelatedByIdCapital() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdCapital relation
 * @method     ChildEsCitiesQuery innerJoinWithEsCitiesRelatedByIdCapital() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdCapital relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsCitiesRelatedByIdRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdRegion relation
 * @method     ChildEsCitiesQuery rightJoinEsCitiesRelatedByIdRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdRegion relation
 * @method     ChildEsCitiesQuery innerJoinEsCitiesRelatedByIdRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdRegion relation
 *
 * @method     ChildEsCitiesQuery joinWithEsCitiesRelatedByIdRegion($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdRegion relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsCitiesRelatedByIdRegion() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdRegion relation
 * @method     ChildEsCitiesQuery rightJoinWithEsCitiesRelatedByIdRegion() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdRegion relation
 * @method     ChildEsCitiesQuery innerJoinWithEsCitiesRelatedByIdRegion() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdRegion relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsFiles($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsFiles relation
 * @method     ChildEsCitiesQuery rightJoinEsFiles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsFiles relation
 * @method     ChildEsCitiesQuery innerJoinEsFiles($relationAlias = null) Adds a INNER JOIN clause to the query using the EsFiles relation
 *
 * @method     ChildEsCitiesQuery joinWithEsFiles($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsFiles relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsFiles() Adds a LEFT JOIN clause and with to the query using the EsFiles relation
 * @method     ChildEsCitiesQuery rightJoinWithEsFiles() Adds a RIGHT JOIN clause and with to the query using the EsFiles relation
 * @method     ChildEsCitiesQuery innerJoinWithEsFiles() Adds a INNER JOIN clause and with to the query using the EsFiles relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsCitiesRelatedByIdCity0($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdCity0 relation
 * @method     ChildEsCitiesQuery rightJoinEsCitiesRelatedByIdCity0($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdCity0 relation
 * @method     ChildEsCitiesQuery innerJoinEsCitiesRelatedByIdCity0($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdCity0 relation
 *
 * @method     ChildEsCitiesQuery joinWithEsCitiesRelatedByIdCity0($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdCity0 relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsCitiesRelatedByIdCity0() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdCity0 relation
 * @method     ChildEsCitiesQuery rightJoinWithEsCitiesRelatedByIdCity0() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdCity0 relation
 * @method     ChildEsCitiesQuery innerJoinWithEsCitiesRelatedByIdCity0() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdCity0 relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsCitiesRelatedByIdCity1($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdCity1 relation
 * @method     ChildEsCitiesQuery rightJoinEsCitiesRelatedByIdCity1($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdCity1 relation
 * @method     ChildEsCitiesQuery innerJoinEsCitiesRelatedByIdCity1($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdCity1 relation
 *
 * @method     ChildEsCitiesQuery joinWithEsCitiesRelatedByIdCity1($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdCity1 relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsCitiesRelatedByIdCity1() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdCity1 relation
 * @method     ChildEsCitiesQuery rightJoinWithEsCitiesRelatedByIdCity1() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdCity1 relation
 * @method     ChildEsCitiesQuery innerJoinWithEsCitiesRelatedByIdCity1() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdCity1 relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsProvincias($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsProvincias relation
 * @method     ChildEsCitiesQuery rightJoinEsProvincias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsProvincias relation
 * @method     ChildEsCitiesQuery innerJoinEsProvincias($relationAlias = null) Adds a INNER JOIN clause to the query using the EsProvincias relation
 *
 * @method     ChildEsCitiesQuery joinWithEsProvincias($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsProvincias relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsProvincias() Adds a LEFT JOIN clause and with to the query using the EsProvincias relation
 * @method     ChildEsCitiesQuery rightJoinWithEsProvincias() Adds a RIGHT JOIN clause and with to the query using the EsProvincias relation
 * @method     ChildEsCitiesQuery innerJoinWithEsProvincias() Adds a INNER JOIN clause and with to the query using the EsProvincias relation
 *
 * @method     ChildEsCitiesQuery leftJoinEsUsersRelatedByIdCity($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRelatedByIdCity relation
 * @method     ChildEsCitiesQuery rightJoinEsUsersRelatedByIdCity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRelatedByIdCity relation
 * @method     ChildEsCitiesQuery innerJoinEsUsersRelatedByIdCity($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRelatedByIdCity relation
 *
 * @method     ChildEsCitiesQuery joinWithEsUsersRelatedByIdCity($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRelatedByIdCity relation
 *
 * @method     ChildEsCitiesQuery leftJoinWithEsUsersRelatedByIdCity() Adds a LEFT JOIN clause and with to the query using the EsUsersRelatedByIdCity relation
 * @method     ChildEsCitiesQuery rightJoinWithEsUsersRelatedByIdCity() Adds a RIGHT JOIN clause and with to the query using the EsUsersRelatedByIdCity relation
 * @method     ChildEsCitiesQuery innerJoinWithEsUsersRelatedByIdCity() Adds a INNER JOIN clause and with to the query using the EsUsersRelatedByIdCity relation
 *
 * @method     \EsUsersQuery|\EsCitiesQuery|\EsFilesQuery|\EsProvinciasQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsCities findOne(ConnectionInterface $con = null) Return the first ChildEsCities matching the query
 * @method     ChildEsCities findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsCities matching the query, or a new ChildEsCities object populated from the query conditions when no match is found
 *
 * @method     ChildEsCities findOneByIdCity(int $id_city) Return the first ChildEsCities filtered by the id_city column
 * @method     ChildEsCities findOneByName(string $name) Return the first ChildEsCities filtered by the name column
 * @method     ChildEsCities findOneByDescription(string $description) Return the first ChildEsCities filtered by the description column
 * @method     ChildEsCities findOneByAbbreviation(string $abbreviation) Return the first ChildEsCities filtered by the abbreviation column
 * @method     ChildEsCities findOneByIdCapital(int $id_capital) Return the first ChildEsCities filtered by the id_capital column
 * @method     ChildEsCities findOneByIdRegion(int $id_region) Return the first ChildEsCities filtered by the id_region column
 * @method     ChildEsCities findOneByLat(string $lat) Return the first ChildEsCities filtered by the lat column
 * @method     ChildEsCities findOneByLng(string $lng) Return the first ChildEsCities filtered by the lng column
 * @method     ChildEsCities findOneByArea(int $area) Return the first ChildEsCities filtered by the area column
 * @method     ChildEsCities findOneByNroMunicipios(int $nro_municipios) Return the first ChildEsCities filtered by the nro_municipios column
 * @method     ChildEsCities findOneBySurface(string $surface) Return the first ChildEsCities filtered by the surface column
 * @method     ChildEsCities findOneByIdsFiles(string $ids_files) Return the first ChildEsCities filtered by the ids_files column
 * @method     ChildEsCities findOneByIdCoverPicture(int $id_cover_picture) Return the first ChildEsCities filtered by the id_cover_picture column
 * @method     ChildEsCities findOneByHeight(string $height) Return the first ChildEsCities filtered by the height column
 * @method     ChildEsCities findOneByTipo(string $tipo) Return the first ChildEsCities filtered by the tipo column
 * @method     ChildEsCities findOneByStatus(string $status) Return the first ChildEsCities filtered by the status column
 * @method     ChildEsCities findOneByChangeCount(int $change_count) Return the first ChildEsCities filtered by the change_count column
 * @method     ChildEsCities findOneByIdUserModified(int $id_user_modified) Return the first ChildEsCities filtered by the id_user_modified column
 * @method     ChildEsCities findOneByIdUserCreated(int $id_user_created) Return the first ChildEsCities filtered by the id_user_created column
 * @method     ChildEsCities findOneByDateModified(string $date_modified) Return the first ChildEsCities filtered by the date_modified column
 * @method     ChildEsCities findOneByDateCreated(string $date_created) Return the first ChildEsCities filtered by the date_created column *

 * @method     ChildEsCities requirePk($key, ConnectionInterface $con = null) Return the ChildEsCities by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOne(ConnectionInterface $con = null) Return the first ChildEsCities matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsCities requireOneByIdCity(int $id_city) Return the first ChildEsCities filtered by the id_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByName(string $name) Return the first ChildEsCities filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByDescription(string $description) Return the first ChildEsCities filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByAbbreviation(string $abbreviation) Return the first ChildEsCities filtered by the abbreviation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByIdCapital(int $id_capital) Return the first ChildEsCities filtered by the id_capital column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByIdRegion(int $id_region) Return the first ChildEsCities filtered by the id_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByLat(string $lat) Return the first ChildEsCities filtered by the lat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByLng(string $lng) Return the first ChildEsCities filtered by the lng column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByArea(int $area) Return the first ChildEsCities filtered by the area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByNroMunicipios(int $nro_municipios) Return the first ChildEsCities filtered by the nro_municipios column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneBySurface(string $surface) Return the first ChildEsCities filtered by the surface column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByIdsFiles(string $ids_files) Return the first ChildEsCities filtered by the ids_files column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByIdCoverPicture(int $id_cover_picture) Return the first ChildEsCities filtered by the id_cover_picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByHeight(string $height) Return the first ChildEsCities filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByTipo(string $tipo) Return the first ChildEsCities filtered by the tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByStatus(string $status) Return the first ChildEsCities filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByChangeCount(int $change_count) Return the first ChildEsCities filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByIdUserModified(int $id_user_modified) Return the first ChildEsCities filtered by the id_user_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByIdUserCreated(int $id_user_created) Return the first ChildEsCities filtered by the id_user_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByDateModified(string $date_modified) Return the first ChildEsCities filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsCities requireOneByDateCreated(string $date_created) Return the first ChildEsCities filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsCities[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsCities objects based on current ModelCriteria
 * @method     ChildEsCities[]|ObjectCollection findByIdCity(int $id_city) Return ChildEsCities objects filtered by the id_city column
 * @method     ChildEsCities[]|ObjectCollection findByName(string $name) Return ChildEsCities objects filtered by the name column
 * @method     ChildEsCities[]|ObjectCollection findByDescription(string $description) Return ChildEsCities objects filtered by the description column
 * @method     ChildEsCities[]|ObjectCollection findByAbbreviation(string $abbreviation) Return ChildEsCities objects filtered by the abbreviation column
 * @method     ChildEsCities[]|ObjectCollection findByIdCapital(int $id_capital) Return ChildEsCities objects filtered by the id_capital column
 * @method     ChildEsCities[]|ObjectCollection findByIdRegion(int $id_region) Return ChildEsCities objects filtered by the id_region column
 * @method     ChildEsCities[]|ObjectCollection findByLat(string $lat) Return ChildEsCities objects filtered by the lat column
 * @method     ChildEsCities[]|ObjectCollection findByLng(string $lng) Return ChildEsCities objects filtered by the lng column
 * @method     ChildEsCities[]|ObjectCollection findByArea(int $area) Return ChildEsCities objects filtered by the area column
 * @method     ChildEsCities[]|ObjectCollection findByNroMunicipios(int $nro_municipios) Return ChildEsCities objects filtered by the nro_municipios column
 * @method     ChildEsCities[]|ObjectCollection findBySurface(string $surface) Return ChildEsCities objects filtered by the surface column
 * @method     ChildEsCities[]|ObjectCollection findByIdsFiles(string $ids_files) Return ChildEsCities objects filtered by the ids_files column
 * @method     ChildEsCities[]|ObjectCollection findByIdCoverPicture(int $id_cover_picture) Return ChildEsCities objects filtered by the id_cover_picture column
 * @method     ChildEsCities[]|ObjectCollection findByHeight(string $height) Return ChildEsCities objects filtered by the height column
 * @method     ChildEsCities[]|ObjectCollection findByTipo(string $tipo) Return ChildEsCities objects filtered by the tipo column
 * @method     ChildEsCities[]|ObjectCollection findByStatus(string $status) Return ChildEsCities objects filtered by the status column
 * @method     ChildEsCities[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsCities objects filtered by the change_count column
 * @method     ChildEsCities[]|ObjectCollection findByIdUserModified(int $id_user_modified) Return ChildEsCities objects filtered by the id_user_modified column
 * @method     ChildEsCities[]|ObjectCollection findByIdUserCreated(int $id_user_created) Return ChildEsCities objects filtered by the id_user_created column
 * @method     ChildEsCities[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsCities objects filtered by the date_modified column
 * @method     ChildEsCities[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsCities objects filtered by the date_created column
 * @method     ChildEsCities[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsCitiesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsCitiesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsCities', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsCitiesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsCitiesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsCitiesQuery) {
            return $criteria;
        }
        $query = new ChildEsCitiesQuery();
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
     * @return ChildEsCities|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsCitiesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsCities A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_city, name, description, abbreviation, id_capital, id_region, lat, lng, area, nro_municipios, surface, ids_files, id_cover_picture, height, tipo, status, change_count, id_user_modified, id_user_created, date_modified, date_created FROM es_cities WHERE id_city = :p0';
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
            /** @var ChildEsCities $obj */
            $obj = new ChildEsCities();
            $obj->hydrate($row);
            EsCitiesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsCities|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_city column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCity(1234); // WHERE id_city = 1234
     * $query->filterByIdCity(array(12, 34)); // WHERE id_city IN (12, 34)
     * $query->filterByIdCity(array('min' => 12)); // WHERE id_city > 12
     * </code>
     *
     * @param     mixed $idCity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdCity($idCity = null, $comparison = null)
    {
        if (is_array($idCity)) {
            $useMinMax = false;
            if (isset($idCity['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $idCity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCity['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $idCity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $idCity, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the abbreviation column
     *
     * Example usage:
     * <code>
     * $query->filterByAbbreviation('fooValue');   // WHERE abbreviation = 'fooValue'
     * $query->filterByAbbreviation('%fooValue%', Criteria::LIKE); // WHERE abbreviation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $abbreviation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByAbbreviation($abbreviation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($abbreviation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ABBREVIATION, $abbreviation, $comparison);
    }

    /**
     * Filter the query on the id_capital column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCapital(1234); // WHERE id_capital = 1234
     * $query->filterByIdCapital(array(12, 34)); // WHERE id_capital IN (12, 34)
     * $query->filterByIdCapital(array('min' => 12)); // WHERE id_capital > 12
     * </code>
     *
     * @see       filterByEsCitiesRelatedByIdCapital()
     *
     * @param     mixed $idCapital The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdCapital($idCapital = null, $comparison = null)
    {
        if (is_array($idCapital)) {
            $useMinMax = false;
            if (isset($idCapital['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_CAPITAL, $idCapital['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCapital['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_CAPITAL, $idCapital['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_CAPITAL, $idCapital, $comparison);
    }

    /**
     * Filter the query on the id_region column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRegion(1234); // WHERE id_region = 1234
     * $query->filterByIdRegion(array(12, 34)); // WHERE id_region IN (12, 34)
     * $query->filterByIdRegion(array('min' => 12)); // WHERE id_region > 12
     * </code>
     *
     * @see       filterByEsCitiesRelatedByIdRegion()
     *
     * @param     mixed $idRegion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdRegion($idRegion = null, $comparison = null)
    {
        if (is_array($idRegion)) {
            $useMinMax = false;
            if (isset($idRegion['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_REGION, $idRegion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRegion['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_REGION, $idRegion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_REGION, $idRegion, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByLat($lat = null, $comparison = null)
    {
        if (is_array($lat)) {
            $useMinMax = false;
            if (isset($lat['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_LAT, $lat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lat['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_LAT, $lat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_LAT, $lat, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByLng($lng = null, $comparison = null)
    {
        if (is_array($lng)) {
            $useMinMax = false;
            if (isset($lng['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_LNG, $lng['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lng['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_LNG, $lng['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_LNG, $lng, $comparison);
    }

    /**
     * Filter the query on the area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea(1234); // WHERE area = 1234
     * $query->filterByArea(array(12, 34)); // WHERE area IN (12, 34)
     * $query->filterByArea(array('min' => 12)); // WHERE area > 12
     * </code>
     *
     * @param     mixed $area The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (is_array($area)) {
            $useMinMax = false;
            if (isset($area['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_AREA, $area['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($area['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_AREA, $area['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_AREA, $area, $comparison);
    }

    /**
     * Filter the query on the nro_municipios column
     *
     * Example usage:
     * <code>
     * $query->filterByNroMunicipios(1234); // WHERE nro_municipios = 1234
     * $query->filterByNroMunicipios(array(12, 34)); // WHERE nro_municipios IN (12, 34)
     * $query->filterByNroMunicipios(array('min' => 12)); // WHERE nro_municipios > 12
     * </code>
     *
     * @param     mixed $nroMunicipios The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByNroMunicipios($nroMunicipios = null, $comparison = null)
    {
        if (is_array($nroMunicipios)) {
            $useMinMax = false;
            if (isset($nroMunicipios['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_NRO_MUNICIPIOS, $nroMunicipios['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nroMunicipios['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_NRO_MUNICIPIOS, $nroMunicipios['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_NRO_MUNICIPIOS, $nroMunicipios, $comparison);
    }

    /**
     * Filter the query on the surface column
     *
     * Example usage:
     * <code>
     * $query->filterBySurface(1234); // WHERE surface = 1234
     * $query->filterBySurface(array(12, 34)); // WHERE surface IN (12, 34)
     * $query->filterBySurface(array('min' => 12)); // WHERE surface > 12
     * </code>
     *
     * @param     mixed $surface The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterBySurface($surface = null, $comparison = null)
    {
        if (is_array($surface)) {
            $useMinMax = false;
            if (isset($surface['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_SURFACE, $surface['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($surface['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_SURFACE, $surface['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_SURFACE, $surface, $comparison);
    }

    /**
     * Filter the query on the ids_files column
     *
     * Example usage:
     * <code>
     * $query->filterByIdsFiles('fooValue');   // WHERE ids_files = 'fooValue'
     * $query->filterByIdsFiles('%fooValue%', Criteria::LIKE); // WHERE ids_files LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idsFiles The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdsFiles($idsFiles = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idsFiles)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_IDS_FILES, $idsFiles, $comparison);
    }

    /**
     * Filter the query on the id_cover_picture column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCoverPicture(1234); // WHERE id_cover_picture = 1234
     * $query->filterByIdCoverPicture(array(12, 34)); // WHERE id_cover_picture IN (12, 34)
     * $query->filterByIdCoverPicture(array('min' => 12)); // WHERE id_cover_picture > 12
     * </code>
     *
     * @see       filterByEsFiles()
     *
     * @param     mixed $idCoverPicture The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdCoverPicture($idCoverPicture = null, $comparison = null)
    {
        if (is_array($idCoverPicture)) {
            $useMinMax = false;
            if (isset($idCoverPicture['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_COVER_PICTURE, $idCoverPicture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCoverPicture['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_COVER_PICTURE, $idCoverPicture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_COVER_PICTURE, $idCoverPicture, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%', Criteria::LIKE); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_TIPO, $tipo, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdUserModified($idUserModified = null, $comparison = null)
    {
        if (is_array($idUserModified)) {
            $useMinMax = false;
            if (isset($idUserModified['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_USER_MODIFIED, $idUserModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserModified['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_USER_MODIFIED, $idUserModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_USER_MODIFIED, $idUserModified, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByIdUserCreated($idUserCreated = null, $comparison = null)
    {
        if (is_array($idUserCreated)) {
            $useMinMax = false;
            if (isset($idUserCreated['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_USER_CREATED, $idUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUserCreated['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_ID_USER_CREATED, $idUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_ID_USER_CREATED, $idUserCreated, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsCitiesTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsCitiesTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserCreated($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_USER_CREATED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_USER_CREATED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
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
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdUserModified($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_USER_MODIFIED, $esUsers->getIdUser(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_USER_MODIFIED, $esUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
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
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdCapital($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_CAPITAL, $esCities->getIdCity(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_CAPITAL, $esCities->toKeyValue('PrimaryKey', 'IdCity'), $comparison);
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdCapital() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdCapital relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdCapital($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdCapital');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdCapital');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdCapital relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdCapitalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdCapital($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdCapital', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdRegion($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_REGION, $esCities->getIdCity(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_REGION, $esCities->toKeyValue('PrimaryKey', 'IdCity'), $comparison);
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdRegion() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdRegion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdRegion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdRegion');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdRegion');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdRegion relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdRegion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdRegion', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsFiles object
     *
     * @param \EsFiles|ObjectCollection $esFiles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsFiles($esFiles, $comparison = null)
    {
        if ($esFiles instanceof \EsFiles) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_COVER_PICTURE, $esFiles->getIdFile(), $comparison);
        } elseif ($esFiles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_COVER_PICTURE, $esFiles->toKeyValue('PrimaryKey', 'IdFile'), $comparison);
        } else {
            throw new PropelException('filterByEsFiles() only accepts arguments of type \EsFiles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsFiles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsFiles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsFiles');

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
            $this->addJoinObject($join, 'EsFiles');
        }

        return $this;
    }

    /**
     * Use the EsFiles relation EsFiles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsFilesQuery A secondary query class using the current class as primary query
     */
    public function useEsFilesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsFiles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsFiles', '\EsFilesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdCity0($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $esCities->getIdCapital(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            return $this
                ->useEsCitiesRelatedByIdCity0Query()
                ->filterByPrimaryKeys($esCities->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdCity0() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdCity0 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdCity0($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdCity0');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdCity0');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdCity0 relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdCity0Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdCity0($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdCity0', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdCity1($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $esCities->getIdRegion(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            return $this
                ->useEsCitiesRelatedByIdCity1Query()
                ->filterByPrimaryKeys($esCities->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdCity1() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdCity1 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdCity1($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdCity1');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdCity1');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdCity1 relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdCity1Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdCity1($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdCity1', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsProvincias object
     *
     * @param \EsProvincias|ObjectCollection $esProvincias the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsProvincias($esProvincias, $comparison = null)
    {
        if ($esProvincias instanceof \EsProvincias) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $esProvincias->getIdCiudad(), $comparison);
        } elseif ($esProvincias instanceof ObjectCollection) {
            return $this
                ->useEsProvinciasQuery()
                ->filterByPrimaryKeys($esProvincias->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsProvincias() only accepts arguments of type \EsProvincias or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsProvincias relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsProvincias($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsProvincias');

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
            $this->addJoinObject($join, 'EsProvincias');
        }

        return $this;
    }

    /**
     * Use the EsProvincias relation EsProvincias object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsProvinciasQuery A secondary query class using the current class as primary query
     */
    public function useEsProvinciasQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsProvincias($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsProvincias', '\EsProvinciasQuery');
    }

    /**
     * Filter the query by a related \EsUsers object
     *
     * @param \EsUsers|ObjectCollection $esUsers the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsCitiesQuery The current query, for fluid interface
     */
    public function filterByEsUsersRelatedByIdCity($esUsers, $comparison = null)
    {
        if ($esUsers instanceof \EsUsers) {
            return $this
                ->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $esUsers->getIdCity(), $comparison);
        } elseif ($esUsers instanceof ObjectCollection) {
            return $this
                ->useEsUsersRelatedByIdCityQuery()
                ->filterByPrimaryKeys($esUsers->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsUsersRelatedByIdCity() only accepts arguments of type \EsUsers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRelatedByIdCity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function joinEsUsersRelatedByIdCity($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRelatedByIdCity');

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
            $this->addJoinObject($join, 'EsUsersRelatedByIdCity');
        }

        return $this;
    }

    /**
     * Use the EsUsersRelatedByIdCity relation EsUsers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRelatedByIdCityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsUsersRelatedByIdCity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRelatedByIdCity', '\EsUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsCities $esCities Object to remove from the list of results
     *
     * @return $this|ChildEsCitiesQuery The current query, for fluid interface
     */
    public function prune($esCities = null)
    {
        if ($esCities) {
            $this->addUsingAlias(EsCitiesTableMap::COL_ID_CITY, $esCities->getIdCity(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_cities table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsCitiesTableMap::clearInstancePool();
            EsCitiesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsCitiesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsCitiesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsCitiesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsCitiesQuery
