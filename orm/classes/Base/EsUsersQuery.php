<?php

namespace Base;

use \EsUsers as ChildEsUsers;
use \EsUsersQuery as ChildEsUsersQuery;
use \Exception;
use \PDO;
use Map\EsUsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'es_users' table.
 *
 *
 *
 * @method     ChildEsUsersQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method     ChildEsUsersQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildEsUsersQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildEsUsersQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     ChildEsUsersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildEsUsersQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildEsUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildEsUsersQuery orderByBirthdate($order = Criteria::ASC) Order by the birthdate column
 * @method     ChildEsUsersQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method     ChildEsUsersQuery orderByCarnet($order = Criteria::ASC) Order by the carnet column
 * @method     ChildEsUsersQuery orderBySexo($order = Criteria::ASC) Order by the sexo column
 * @method     ChildEsUsersQuery orderByPhone1($order = Criteria::ASC) Order by the phone_1 column
 * @method     ChildEsUsersQuery orderByPhone2($order = Criteria::ASC) Order by the phone_2 column
 * @method     ChildEsUsersQuery orderByCellphone1($order = Criteria::ASC) Order by the cellphone_1 column
 * @method     ChildEsUsersQuery orderByCellphone2($order = Criteria::ASC) Order by the cellphone_2 column
 * @method     ChildEsUsersQuery orderByIdsFiles($order = Criteria::ASC) Order by the ids_files column
 * @method     ChildEsUsersQuery orderByIdCoverPicture($order = Criteria::ASC) Order by the id_cover_picture column
 * @method     ChildEsUsersQuery orderByIdCity($order = Criteria::ASC) Order by the id_city column
 * @method     ChildEsUsersQuery orderByIdProvincia($order = Criteria::ASC) Order by the id_provincia column
 * @method     ChildEsUsersQuery orderByIdRole($order = Criteria::ASC) Order by the id_role column
 * @method     ChildEsUsersQuery orderBySigninMethod($order = Criteria::ASC) Order by the signin_method column
 * @method     ChildEsUsersQuery orderByUid($order = Criteria::ASC) Order by the uid column
 * @method     ChildEsUsersQuery orderByCountryCode($order = Criteria::ASC) Order by the country_code column
 * @method     ChildEsUsersQuery orderByAuthyId($order = Criteria::ASC) Order by the authy_id column
 * @method     ChildEsUsersQuery orderByVerified($order = Criteria::ASC) Order by the verified column
 * @method     ChildEsUsersQuery orderByChangeCount($order = Criteria::ASC) Order by the change_count column
 * @method     ChildEsUsersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEsUsersQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildEsUsersQuery orderByDateCreated($order = Criteria::ASC) Order by the date_created column
 *
 * @method     ChildEsUsersQuery groupByIdUser() Group by the id_user column
 * @method     ChildEsUsersQuery groupByName() Group by the name column
 * @method     ChildEsUsersQuery groupByLastname() Group by the lastname column
 * @method     ChildEsUsersQuery groupByUsername() Group by the username column
 * @method     ChildEsUsersQuery groupByEmail() Group by the email column
 * @method     ChildEsUsersQuery groupByAddress() Group by the address column
 * @method     ChildEsUsersQuery groupByPassword() Group by the password column
 * @method     ChildEsUsersQuery groupByBirthdate() Group by the birthdate column
 * @method     ChildEsUsersQuery groupByAge() Group by the age column
 * @method     ChildEsUsersQuery groupByCarnet() Group by the carnet column
 * @method     ChildEsUsersQuery groupBySexo() Group by the sexo column
 * @method     ChildEsUsersQuery groupByPhone1() Group by the phone_1 column
 * @method     ChildEsUsersQuery groupByPhone2() Group by the phone_2 column
 * @method     ChildEsUsersQuery groupByCellphone1() Group by the cellphone_1 column
 * @method     ChildEsUsersQuery groupByCellphone2() Group by the cellphone_2 column
 * @method     ChildEsUsersQuery groupByIdsFiles() Group by the ids_files column
 * @method     ChildEsUsersQuery groupByIdCoverPicture() Group by the id_cover_picture column
 * @method     ChildEsUsersQuery groupByIdCity() Group by the id_city column
 * @method     ChildEsUsersQuery groupByIdProvincia() Group by the id_provincia column
 * @method     ChildEsUsersQuery groupByIdRole() Group by the id_role column
 * @method     ChildEsUsersQuery groupBySigninMethod() Group by the signin_method column
 * @method     ChildEsUsersQuery groupByUid() Group by the uid column
 * @method     ChildEsUsersQuery groupByCountryCode() Group by the country_code column
 * @method     ChildEsUsersQuery groupByAuthyId() Group by the authy_id column
 * @method     ChildEsUsersQuery groupByVerified() Group by the verified column
 * @method     ChildEsUsersQuery groupByChangeCount() Group by the change_count column
 * @method     ChildEsUsersQuery groupByStatus() Group by the status column
 * @method     ChildEsUsersQuery groupByDateModified() Group by the date_modified column
 * @method     ChildEsUsersQuery groupByDateCreated() Group by the date_created column
 *
 * @method     ChildEsUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEsUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEsUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEsUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEsUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEsUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEsUsersQuery leftJoinEsRolesRelatedByIdRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsRolesRelatedByIdRole relation
 * @method     ChildEsUsersQuery rightJoinEsRolesRelatedByIdRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsRolesRelatedByIdRole relation
 * @method     ChildEsUsersQuery innerJoinEsRolesRelatedByIdRole($relationAlias = null) Adds a INNER JOIN clause to the query using the EsRolesRelatedByIdRole relation
 *
 * @method     ChildEsUsersQuery joinWithEsRolesRelatedByIdRole($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsRolesRelatedByIdRole relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsRolesRelatedByIdRole() Adds a LEFT JOIN clause and with to the query using the EsRolesRelatedByIdRole relation
 * @method     ChildEsUsersQuery rightJoinWithEsRolesRelatedByIdRole() Adds a RIGHT JOIN clause and with to the query using the EsRolesRelatedByIdRole relation
 * @method     ChildEsUsersQuery innerJoinWithEsRolesRelatedByIdRole() Adds a INNER JOIN clause and with to the query using the EsRolesRelatedByIdRole relation
 *
 * @method     ChildEsUsersQuery leftJoinEsProvinciasRelatedByIdProvincia($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsUsersQuery rightJoinEsProvinciasRelatedByIdProvincia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsUsersQuery innerJoinEsProvinciasRelatedByIdProvincia($relationAlias = null) Adds a INNER JOIN clause to the query using the EsProvinciasRelatedByIdProvincia relation
 *
 * @method     ChildEsUsersQuery joinWithEsProvinciasRelatedByIdProvincia($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsProvinciasRelatedByIdProvincia() Adds a LEFT JOIN clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsUsersQuery rightJoinWithEsProvinciasRelatedByIdProvincia() Adds a RIGHT JOIN clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 * @method     ChildEsUsersQuery innerJoinWithEsProvinciasRelatedByIdProvincia() Adds a INNER JOIN clause and with to the query using the EsProvinciasRelatedByIdProvincia relation
 *
 * @method     ChildEsUsersQuery leftJoinEsFilesRelatedByIdCoverPicture($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsFilesRelatedByIdCoverPicture relation
 * @method     ChildEsUsersQuery rightJoinEsFilesRelatedByIdCoverPicture($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsFilesRelatedByIdCoverPicture relation
 * @method     ChildEsUsersQuery innerJoinEsFilesRelatedByIdCoverPicture($relationAlias = null) Adds a INNER JOIN clause to the query using the EsFilesRelatedByIdCoverPicture relation
 *
 * @method     ChildEsUsersQuery joinWithEsFilesRelatedByIdCoverPicture($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsFilesRelatedByIdCoverPicture relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsFilesRelatedByIdCoverPicture() Adds a LEFT JOIN clause and with to the query using the EsFilesRelatedByIdCoverPicture relation
 * @method     ChildEsUsersQuery rightJoinWithEsFilesRelatedByIdCoverPicture() Adds a RIGHT JOIN clause and with to the query using the EsFilesRelatedByIdCoverPicture relation
 * @method     ChildEsUsersQuery innerJoinWithEsFilesRelatedByIdCoverPicture() Adds a INNER JOIN clause and with to the query using the EsFilesRelatedByIdCoverPicture relation
 *
 * @method     ChildEsUsersQuery leftJoinEsCitiesRelatedByIdCity($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdCity relation
 * @method     ChildEsUsersQuery rightJoinEsCitiesRelatedByIdCity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdCity relation
 * @method     ChildEsUsersQuery innerJoinEsCitiesRelatedByIdCity($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdCity relation
 *
 * @method     ChildEsUsersQuery joinWithEsCitiesRelatedByIdCity($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdCity relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsCitiesRelatedByIdCity() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdCity relation
 * @method     ChildEsUsersQuery rightJoinWithEsCitiesRelatedByIdCity() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdCity relation
 * @method     ChildEsUsersQuery innerJoinWithEsCitiesRelatedByIdCity() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdCity relation
 *
 * @method     ChildEsUsersQuery leftJoinEsCitiesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsCitiesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsCitiesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsCitiesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsCitiesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsCitiesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsCitiesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsCitiesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsCitiesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsCitiesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsCitiesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsCitiesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsCitiesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsCitiesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsCitiesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsCitiesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsCitiesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsCitiesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsCitiesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsCitiesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsCitiesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsDomainsRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsDomainsRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsDomainsRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsDomainsRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsDomainsRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsDomainsRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsDomainsRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsDomainsRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsDomainsRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsDomainsRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsDomainsRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsDomainsRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsDomainsRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsDomainsRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsDomainsRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsDomainsRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsDomainsRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsDomainsRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsDomainsRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsDomainsRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsDomainsRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsDomainsRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsDomainsRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsDomainsRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsDomainsRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsDomainsRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsDomainsRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsDomainsRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsFilesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsFilesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsFilesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsFilesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsFilesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsFilesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsFilesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsFilesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsFilesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsFilesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsFilesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsFilesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsFilesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsFilesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsFilesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsFilesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsFilesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsFilesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsFilesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsFilesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsFilesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsFilesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsFilesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsFilesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsFilesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsFilesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsFilesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsFilesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsModulesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsModulesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsModulesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsModulesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsModulesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsModulesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsModulesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsModulesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsModulesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsModulesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsModulesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsModulesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsModulesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsModulesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsModulesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsModulesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsModulesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsModulesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsModulesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsModulesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsModulesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsModulesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsModulesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsModulesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsModulesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsModulesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsModulesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsModulesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsProvinciasRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsProvinciasRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsProvinciasRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsProvinciasRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsProvinciasRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsProvinciasRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsProvinciasRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsProvinciasRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsProvinciasRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsProvinciasRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsProvinciasRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsProvinciasRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsProvinciasRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsProvinciasRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsProvinciasRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsProvinciasRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsProvinciasRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsProvinciasRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsProvinciasRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsProvinciasRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsProvinciasRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsProvinciasRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsProvinciasRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsProvinciasRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsProvinciasRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsProvinciasRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsProvinciasRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsProvinciasRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsRolesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsRolesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsRolesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsRolesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsRolesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsRolesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsRolesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsRolesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsRolesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsRolesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsRolesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsRolesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsRolesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsRolesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsSessions($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsSessions relation
 * @method     ChildEsUsersQuery rightJoinEsSessions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsSessions relation
 * @method     ChildEsUsersQuery innerJoinEsSessions($relationAlias = null) Adds a INNER JOIN clause to the query using the EsSessions relation
 *
 * @method     ChildEsUsersQuery joinWithEsSessions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsSessions relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsSessions() Adds a LEFT JOIN clause and with to the query using the EsSessions relation
 * @method     ChildEsUsersQuery rightJoinWithEsSessions() Adds a RIGHT JOIN clause and with to the query using the EsSessions relation
 * @method     ChildEsUsersQuery innerJoinWithEsSessions() Adds a INNER JOIN clause and with to the query using the EsSessions relation
 *
 * @method     ChildEsUsersQuery leftJoinEsTablesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTablesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsTablesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTablesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsTablesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTablesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsTablesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTablesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsTablesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsTablesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsTablesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsTablesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsTablesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsTablesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsTablesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTablesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsTablesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTablesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsTablesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTablesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsTablesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTablesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsTablesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsTablesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsTablesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsTablesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsTablesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsTablesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsTablesRolesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTablesRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsTablesRolesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTablesRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsTablesRolesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTablesRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsTablesRolesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTablesRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsTablesRolesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsTablesRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsTablesRolesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsTablesRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsTablesRolesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsTablesRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsTablesRolesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsTablesRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsTablesRolesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsTablesRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsTablesRolesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsTablesRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsTablesRolesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsTablesRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsTablesRolesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsTablesRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsTablesRolesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsTablesRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsTablesRolesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsTablesRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsUsersRolesRelatedByIdUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinEsUsersRolesRelatedByIdUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinEsUsersRolesRelatedByIdUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery joinWithEsUsersRolesRelatedByIdUserCreated($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsUsersRolesRelatedByIdUserCreated() Adds a LEFT JOIN clause and with to the query using the EsUsersRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery rightJoinWithEsUsersRolesRelatedByIdUserCreated() Adds a RIGHT JOIN clause and with to the query using the EsUsersRolesRelatedByIdUserCreated relation
 * @method     ChildEsUsersQuery innerJoinWithEsUsersRolesRelatedByIdUserCreated() Adds a INNER JOIN clause and with to the query using the EsUsersRolesRelatedByIdUserCreated relation
 *
 * @method     ChildEsUsersQuery leftJoinEsUsersRolesRelatedByIdUserModified($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinEsUsersRolesRelatedByIdUserModified($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinEsUsersRolesRelatedByIdUserModified($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery joinWithEsUsersRolesRelatedByIdUserModified($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsUsersRolesRelatedByIdUserModified() Adds a LEFT JOIN clause and with to the query using the EsUsersRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery rightJoinWithEsUsersRolesRelatedByIdUserModified() Adds a RIGHT JOIN clause and with to the query using the EsUsersRolesRelatedByIdUserModified relation
 * @method     ChildEsUsersQuery innerJoinWithEsUsersRolesRelatedByIdUserModified() Adds a INNER JOIN clause and with to the query using the EsUsersRolesRelatedByIdUserModified relation
 *
 * @method     ChildEsUsersQuery leftJoinEsUsersRolesRelatedByIdUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the EsUsersRolesRelatedByIdUser relation
 * @method     ChildEsUsersQuery rightJoinEsUsersRolesRelatedByIdUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EsUsersRolesRelatedByIdUser relation
 * @method     ChildEsUsersQuery innerJoinEsUsersRolesRelatedByIdUser($relationAlias = null) Adds a INNER JOIN clause to the query using the EsUsersRolesRelatedByIdUser relation
 *
 * @method     ChildEsUsersQuery joinWithEsUsersRolesRelatedByIdUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the EsUsersRolesRelatedByIdUser relation
 *
 * @method     ChildEsUsersQuery leftJoinWithEsUsersRolesRelatedByIdUser() Adds a LEFT JOIN clause and with to the query using the EsUsersRolesRelatedByIdUser relation
 * @method     ChildEsUsersQuery rightJoinWithEsUsersRolesRelatedByIdUser() Adds a RIGHT JOIN clause and with to the query using the EsUsersRolesRelatedByIdUser relation
 * @method     ChildEsUsersQuery innerJoinWithEsUsersRolesRelatedByIdUser() Adds a INNER JOIN clause and with to the query using the EsUsersRolesRelatedByIdUser relation
 *
 * @method     \EsRolesQuery|\EsProvinciasQuery|\EsFilesQuery|\EsCitiesQuery|\EsDomainsQuery|\EsModulesQuery|\EsSessionsQuery|\EsTablesQuery|\EsTablesRolesQuery|\EsUsersRolesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEsUsers findOne(ConnectionInterface $con = null) Return the first ChildEsUsers matching the query
 * @method     ChildEsUsers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEsUsers matching the query, or a new ChildEsUsers object populated from the query conditions when no match is found
 *
 * @method     ChildEsUsers findOneByIdUser(int $id_user) Return the first ChildEsUsers filtered by the id_user column
 * @method     ChildEsUsers findOneByName(string $name) Return the first ChildEsUsers filtered by the name column
 * @method     ChildEsUsers findOneByLastname(string $lastname) Return the first ChildEsUsers filtered by the lastname column
 * @method     ChildEsUsers findOneByUsername(string $username) Return the first ChildEsUsers filtered by the username column
 * @method     ChildEsUsers findOneByEmail(string $email) Return the first ChildEsUsers filtered by the email column
 * @method     ChildEsUsers findOneByAddress(string $address) Return the first ChildEsUsers filtered by the address column
 * @method     ChildEsUsers findOneByPassword(string $password) Return the first ChildEsUsers filtered by the password column
 * @method     ChildEsUsers findOneByBirthdate(string $birthdate) Return the first ChildEsUsers filtered by the birthdate column
 * @method     ChildEsUsers findOneByAge(int $age) Return the first ChildEsUsers filtered by the age column
 * @method     ChildEsUsers findOneByCarnet(string $carnet) Return the first ChildEsUsers filtered by the carnet column
 * @method     ChildEsUsers findOneBySexo(string $sexo) Return the first ChildEsUsers filtered by the sexo column
 * @method     ChildEsUsers findOneByPhone1(string $phone_1) Return the first ChildEsUsers filtered by the phone_1 column
 * @method     ChildEsUsers findOneByPhone2(string $phone_2) Return the first ChildEsUsers filtered by the phone_2 column
 * @method     ChildEsUsers findOneByCellphone1(string $cellphone_1) Return the first ChildEsUsers filtered by the cellphone_1 column
 * @method     ChildEsUsers findOneByCellphone2(string $cellphone_2) Return the first ChildEsUsers filtered by the cellphone_2 column
 * @method     ChildEsUsers findOneByIdsFiles(string $ids_files) Return the first ChildEsUsers filtered by the ids_files column
 * @method     ChildEsUsers findOneByIdCoverPicture(int $id_cover_picture) Return the first ChildEsUsers filtered by the id_cover_picture column
 * @method     ChildEsUsers findOneByIdCity(int $id_city) Return the first ChildEsUsers filtered by the id_city column
 * @method     ChildEsUsers findOneByIdProvincia(int $id_provincia) Return the first ChildEsUsers filtered by the id_provincia column
 * @method     ChildEsUsers findOneByIdRole(int $id_role) Return the first ChildEsUsers filtered by the id_role column
 * @method     ChildEsUsers findOneBySigninMethod(string $signin_method) Return the first ChildEsUsers filtered by the signin_method column
 * @method     ChildEsUsers findOneByUid(string $uid) Return the first ChildEsUsers filtered by the uid column
 * @method     ChildEsUsers findOneByCountryCode(string $country_code) Return the first ChildEsUsers filtered by the country_code column
 * @method     ChildEsUsers findOneByAuthyId(string $authy_id) Return the first ChildEsUsers filtered by the authy_id column
 * @method     ChildEsUsers findOneByVerified(boolean $verified) Return the first ChildEsUsers filtered by the verified column
 * @method     ChildEsUsers findOneByChangeCount(int $change_count) Return the first ChildEsUsers filtered by the change_count column
 * @method     ChildEsUsers findOneByStatus(string $status) Return the first ChildEsUsers filtered by the status column
 * @method     ChildEsUsers findOneByDateModified(string $date_modified) Return the first ChildEsUsers filtered by the date_modified column
 * @method     ChildEsUsers findOneByDateCreated(string $date_created) Return the first ChildEsUsers filtered by the date_created column *

 * @method     ChildEsUsers requirePk($key, ConnectionInterface $con = null) Return the ChildEsUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOne(ConnectionInterface $con = null) Return the first ChildEsUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsUsers requireOneByIdUser(int $id_user) Return the first ChildEsUsers filtered by the id_user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByName(string $name) Return the first ChildEsUsers filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByLastname(string $lastname) Return the first ChildEsUsers filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByUsername(string $username) Return the first ChildEsUsers filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByEmail(string $email) Return the first ChildEsUsers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByAddress(string $address) Return the first ChildEsUsers filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByPassword(string $password) Return the first ChildEsUsers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByBirthdate(string $birthdate) Return the first ChildEsUsers filtered by the birthdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByAge(int $age) Return the first ChildEsUsers filtered by the age column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByCarnet(string $carnet) Return the first ChildEsUsers filtered by the carnet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneBySexo(string $sexo) Return the first ChildEsUsers filtered by the sexo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByPhone1(string $phone_1) Return the first ChildEsUsers filtered by the phone_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByPhone2(string $phone_2) Return the first ChildEsUsers filtered by the phone_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByCellphone1(string $cellphone_1) Return the first ChildEsUsers filtered by the cellphone_1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByCellphone2(string $cellphone_2) Return the first ChildEsUsers filtered by the cellphone_2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByIdsFiles(string $ids_files) Return the first ChildEsUsers filtered by the ids_files column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByIdCoverPicture(int $id_cover_picture) Return the first ChildEsUsers filtered by the id_cover_picture column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByIdCity(int $id_city) Return the first ChildEsUsers filtered by the id_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByIdProvincia(int $id_provincia) Return the first ChildEsUsers filtered by the id_provincia column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByIdRole(int $id_role) Return the first ChildEsUsers filtered by the id_role column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneBySigninMethod(string $signin_method) Return the first ChildEsUsers filtered by the signin_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByUid(string $uid) Return the first ChildEsUsers filtered by the uid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByCountryCode(string $country_code) Return the first ChildEsUsers filtered by the country_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByAuthyId(string $authy_id) Return the first ChildEsUsers filtered by the authy_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByVerified(boolean $verified) Return the first ChildEsUsers filtered by the verified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByChangeCount(int $change_count) Return the first ChildEsUsers filtered by the change_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByStatus(string $status) Return the first ChildEsUsers filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByDateModified(string $date_modified) Return the first ChildEsUsers filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEsUsers requireOneByDateCreated(string $date_created) Return the first ChildEsUsers filtered by the date_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEsUsers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEsUsers objects based on current ModelCriteria
 * @method     ChildEsUsers[]|ObjectCollection findByIdUser(int $id_user) Return ChildEsUsers objects filtered by the id_user column
 * @method     ChildEsUsers[]|ObjectCollection findByName(string $name) Return ChildEsUsers objects filtered by the name column
 * @method     ChildEsUsers[]|ObjectCollection findByLastname(string $lastname) Return ChildEsUsers objects filtered by the lastname column
 * @method     ChildEsUsers[]|ObjectCollection findByUsername(string $username) Return ChildEsUsers objects filtered by the username column
 * @method     ChildEsUsers[]|ObjectCollection findByEmail(string $email) Return ChildEsUsers objects filtered by the email column
 * @method     ChildEsUsers[]|ObjectCollection findByAddress(string $address) Return ChildEsUsers objects filtered by the address column
 * @method     ChildEsUsers[]|ObjectCollection findByPassword(string $password) Return ChildEsUsers objects filtered by the password column
 * @method     ChildEsUsers[]|ObjectCollection findByBirthdate(string $birthdate) Return ChildEsUsers objects filtered by the birthdate column
 * @method     ChildEsUsers[]|ObjectCollection findByAge(int $age) Return ChildEsUsers objects filtered by the age column
 * @method     ChildEsUsers[]|ObjectCollection findByCarnet(string $carnet) Return ChildEsUsers objects filtered by the carnet column
 * @method     ChildEsUsers[]|ObjectCollection findBySexo(string $sexo) Return ChildEsUsers objects filtered by the sexo column
 * @method     ChildEsUsers[]|ObjectCollection findByPhone1(string $phone_1) Return ChildEsUsers objects filtered by the phone_1 column
 * @method     ChildEsUsers[]|ObjectCollection findByPhone2(string $phone_2) Return ChildEsUsers objects filtered by the phone_2 column
 * @method     ChildEsUsers[]|ObjectCollection findByCellphone1(string $cellphone_1) Return ChildEsUsers objects filtered by the cellphone_1 column
 * @method     ChildEsUsers[]|ObjectCollection findByCellphone2(string $cellphone_2) Return ChildEsUsers objects filtered by the cellphone_2 column
 * @method     ChildEsUsers[]|ObjectCollection findByIdsFiles(string $ids_files) Return ChildEsUsers objects filtered by the ids_files column
 * @method     ChildEsUsers[]|ObjectCollection findByIdCoverPicture(int $id_cover_picture) Return ChildEsUsers objects filtered by the id_cover_picture column
 * @method     ChildEsUsers[]|ObjectCollection findByIdCity(int $id_city) Return ChildEsUsers objects filtered by the id_city column
 * @method     ChildEsUsers[]|ObjectCollection findByIdProvincia(int $id_provincia) Return ChildEsUsers objects filtered by the id_provincia column
 * @method     ChildEsUsers[]|ObjectCollection findByIdRole(int $id_role) Return ChildEsUsers objects filtered by the id_role column
 * @method     ChildEsUsers[]|ObjectCollection findBySigninMethod(string $signin_method) Return ChildEsUsers objects filtered by the signin_method column
 * @method     ChildEsUsers[]|ObjectCollection findByUid(string $uid) Return ChildEsUsers objects filtered by the uid column
 * @method     ChildEsUsers[]|ObjectCollection findByCountryCode(string $country_code) Return ChildEsUsers objects filtered by the country_code column
 * @method     ChildEsUsers[]|ObjectCollection findByAuthyId(string $authy_id) Return ChildEsUsers objects filtered by the authy_id column
 * @method     ChildEsUsers[]|ObjectCollection findByVerified(boolean $verified) Return ChildEsUsers objects filtered by the verified column
 * @method     ChildEsUsers[]|ObjectCollection findByChangeCount(int $change_count) Return ChildEsUsers objects filtered by the change_count column
 * @method     ChildEsUsers[]|ObjectCollection findByStatus(string $status) Return ChildEsUsers objects filtered by the status column
 * @method     ChildEsUsers[]|ObjectCollection findByDateModified(string $date_modified) Return ChildEsUsers objects filtered by the date_modified column
 * @method     ChildEsUsers[]|ObjectCollection findByDateCreated(string $date_created) Return ChildEsUsers objects filtered by the date_created column
 * @method     ChildEsUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EsUsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EsUsersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'herbalife_dev', $modelName = '\\EsUsers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEsUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEsUsersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEsUsersQuery) {
            return $criteria;
        }
        $query = new ChildEsUsersQuery();
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
     * @return ChildEsUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsUsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EsUsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEsUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_user, name, lastname, username, email, address, password, birthdate, age, carnet, sexo, phone_1, phone_2, cellphone_1, cellphone_2, ids_files, id_cover_picture, id_city, id_provincia, id_role, signin_method, uid, country_code, authy_id, verified, change_count, status, date_modified, date_created FROM es_users WHERE id_user = :p0';
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
            /** @var ChildEsUsers $obj */
            $obj = new ChildEsUsers();
            $obj->hydrate($row);
            EsUsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEsUsers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_USER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_USER, $keys, Criteria::IN);
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
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_USER, $idUser, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%', Criteria::LIKE); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the birthdate column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthdate('2011-03-14'); // WHERE birthdate = '2011-03-14'
     * $query->filterByBirthdate('now'); // WHERE birthdate = '2011-03-14'
     * $query->filterByBirthdate(array('max' => 'yesterday')); // WHERE birthdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByBirthdate($birthdate = null, $comparison = null)
    {
        if (is_array($birthdate)) {
            $useMinMax = false;
            if (isset($birthdate['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_BIRTHDATE, $birthdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthdate['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_BIRTHDATE, $birthdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_BIRTHDATE, $birthdate, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge(1234); // WHERE age = 1234
     * $query->filterByAge(array(12, 34)); // WHERE age IN (12, 34)
     * $query->filterByAge(array('min' => 12)); // WHERE age > 12
     * </code>
     *
     * @param     mixed $age The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_AGE, $age, $comparison);
    }

    /**
     * Filter the query on the carnet column
     *
     * Example usage:
     * <code>
     * $query->filterByCarnet('fooValue');   // WHERE carnet = 'fooValue'
     * $query->filterByCarnet('%fooValue%', Criteria::LIKE); // WHERE carnet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $carnet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByCarnet($carnet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($carnet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_CARNET, $carnet, $comparison);
    }

    /**
     * Filter the query on the sexo column
     *
     * Example usage:
     * <code>
     * $query->filterBySexo('fooValue');   // WHERE sexo = 'fooValue'
     * $query->filterBySexo('%fooValue%', Criteria::LIKE); // WHERE sexo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sexo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterBySexo($sexo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sexo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_SEXO, $sexo, $comparison);
    }

    /**
     * Filter the query on the phone_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone1('fooValue');   // WHERE phone_1 = 'fooValue'
     * $query->filterByPhone1('%fooValue%', Criteria::LIKE); // WHERE phone_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByPhone1($phone1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_PHONE_1, $phone1, $comparison);
    }

    /**
     * Filter the query on the phone_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone2('fooValue');   // WHERE phone_2 = 'fooValue'
     * $query->filterByPhone2('%fooValue%', Criteria::LIKE); // WHERE phone_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByPhone2($phone2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_PHONE_2, $phone2, $comparison);
    }

    /**
     * Filter the query on the cellphone_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphone1('fooValue');   // WHERE cellphone_1 = 'fooValue'
     * $query->filterByCellphone1('%fooValue%', Criteria::LIKE); // WHERE cellphone_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellphone1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByCellphone1($cellphone1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphone1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_CELLPHONE_1, $cellphone1, $comparison);
    }

    /**
     * Filter the query on the cellphone_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphone2('fooValue');   // WHERE cellphone_2 = 'fooValue'
     * $query->filterByCellphone2('%fooValue%', Criteria::LIKE); // WHERE cellphone_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellphone2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByCellphone2($cellphone2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphone2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_CELLPHONE_2, $cellphone2, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByIdsFiles($idsFiles = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idsFiles)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_IDS_FILES, $idsFiles, $comparison);
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
     * @see       filterByEsFilesRelatedByIdCoverPicture()
     *
     * @param     mixed $idCoverPicture The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByIdCoverPicture($idCoverPicture = null, $comparison = null)
    {
        if (is_array($idCoverPicture)) {
            $useMinMax = false;
            if (isset($idCoverPicture['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_COVER_PICTURE, $idCoverPicture['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCoverPicture['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_COVER_PICTURE, $idCoverPicture['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_COVER_PICTURE, $idCoverPicture, $comparison);
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
     * @see       filterByEsCitiesRelatedByIdCity()
     *
     * @param     mixed $idCity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByIdCity($idCity = null, $comparison = null)
    {
        if (is_array($idCity)) {
            $useMinMax = false;
            if (isset($idCity['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_CITY, $idCity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCity['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_CITY, $idCity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_CITY, $idCity, $comparison);
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
     * @see       filterByEsProvinciasRelatedByIdProvincia()
     *
     * @param     mixed $idProvincia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByIdProvincia($idProvincia = null, $comparison = null)
    {
        if (is_array($idProvincia)) {
            $useMinMax = false;
            if (isset($idProvincia['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_PROVINCIA, $idProvincia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idProvincia['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_PROVINCIA, $idProvincia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_PROVINCIA, $idProvincia, $comparison);
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
     * @see       filterByEsRolesRelatedByIdRole()
     *
     * @param     mixed $idRole The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByIdRole($idRole = null, $comparison = null)
    {
        if (is_array($idRole)) {
            $useMinMax = false;
            if (isset($idRole['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_ROLE, $idRole['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRole['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_ID_ROLE, $idRole['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_ID_ROLE, $idRole, $comparison);
    }

    /**
     * Filter the query on the signin_method column
     *
     * Example usage:
     * <code>
     * $query->filterBySigninMethod('fooValue');   // WHERE signin_method = 'fooValue'
     * $query->filterBySigninMethod('%fooValue%', Criteria::LIKE); // WHERE signin_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $signinMethod The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterBySigninMethod($signinMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($signinMethod)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_SIGNIN_METHOD, $signinMethod, $comparison);
    }

    /**
     * Filter the query on the uid column
     *
     * Example usage:
     * <code>
     * $query->filterByUid('fooValue');   // WHERE uid = 'fooValue'
     * $query->filterByUid('%fooValue%', Criteria::LIKE); // WHERE uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByUid($uid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_UID, $uid, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByCountryCode($countryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($countryCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_COUNTRY_CODE, $countryCode, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByAuthyId($authyId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authyId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_AUTHY_ID, $authyId, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByVerified($verified = null, $comparison = null)
    {
        if (is_string($verified)) {
            $verified = in_array(strtolower($verified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_VERIFIED, $verified, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByChangeCount($changeCount = null, $comparison = null)
    {
        if (is_array($changeCount)) {
            $useMinMax = false;
            if (isset($changeCount['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_CHANGE_COUNT, $changeCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($changeCount['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_CHANGE_COUNT, $changeCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_CHANGE_COUNT, $changeCount, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByDateCreated($dateCreated = null, $comparison = null)
    {
        if (is_array($dateCreated)) {
            $useMinMax = false;
            if (isset($dateCreated['min'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_DATE_CREATED, $dateCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCreated['max'])) {
                $this->addUsingAlias(EsUsersTableMap::COL_DATE_CREATED, $dateCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EsUsersTableMap::COL_DATE_CREATED, $dateCreated, $comparison);
    }

    /**
     * Filter the query by a related \EsRoles object
     *
     * @param \EsRoles|ObjectCollection $esRoles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsRolesRelatedByIdRole($esRoles, $comparison = null)
    {
        if ($esRoles instanceof \EsRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_ROLE, $esRoles->getIdRole(), $comparison);
        } elseif ($esRoles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_ROLE, $esRoles->toKeyValue('PrimaryKey', 'IdRole'), $comparison);
        } else {
            throw new PropelException('filterByEsRolesRelatedByIdRole() only accepts arguments of type \EsRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsRolesRelatedByIdRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsRolesRelatedByIdRole($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsRolesRelatedByIdRole');

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
            $this->addJoinObject($join, 'EsRolesRelatedByIdRole');
        }

        return $this;
    }

    /**
     * Use the EsRolesRelatedByIdRole relation EsRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsRolesRelatedByIdRoleQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsRolesRelatedByIdRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsRolesRelatedByIdRole', '\EsRolesQuery');
    }

    /**
     * Filter the query by a related \EsProvincias object
     *
     * @param \EsProvincias|ObjectCollection $esProvincias The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsProvinciasRelatedByIdProvincia($esProvincias, $comparison = null)
    {
        if ($esProvincias instanceof \EsProvincias) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_PROVINCIA, $esProvincias->getIdProvincia(), $comparison);
        } elseif ($esProvincias instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_PROVINCIA, $esProvincias->toKeyValue('PrimaryKey', 'IdProvincia'), $comparison);
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
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
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
     * Filter the query by a related \EsFiles object
     *
     * @param \EsFiles|ObjectCollection $esFiles The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsFilesRelatedByIdCoverPicture($esFiles, $comparison = null)
    {
        if ($esFiles instanceof \EsFiles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_COVER_PICTURE, $esFiles->getIdFile(), $comparison);
        } elseif ($esFiles instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_COVER_PICTURE, $esFiles->toKeyValue('PrimaryKey', 'IdFile'), $comparison);
        } else {
            throw new PropelException('filterByEsFilesRelatedByIdCoverPicture() only accepts arguments of type \EsFiles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsFilesRelatedByIdCoverPicture relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsFilesRelatedByIdCoverPicture($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsFilesRelatedByIdCoverPicture');

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
            $this->addJoinObject($join, 'EsFilesRelatedByIdCoverPicture');
        }

        return $this;
    }

    /**
     * Use the EsFilesRelatedByIdCoverPicture relation EsFiles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsFilesQuery A secondary query class using the current class as primary query
     */
    public function useEsFilesRelatedByIdCoverPictureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsFilesRelatedByIdCoverPicture($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsFilesRelatedByIdCoverPicture', '\EsFilesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdCity($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_CITY, $esCities->getIdCity(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_CITY, $esCities->toKeyValue('PrimaryKey', 'IdCity'), $comparison);
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdCity() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdCity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdCity($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdCity');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdCity');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdCity relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdCityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdCity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdCity', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdUserCreated($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esCities->getIdUserCreated(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            return $this
                ->useEsCitiesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esCities->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdUserCreated() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdUserCreated relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdUserCreated', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsCities object
     *
     * @param \EsCities|ObjectCollection $esCities the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsCitiesRelatedByIdUserModified($esCities, $comparison = null)
    {
        if ($esCities instanceof \EsCities) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esCities->getIdUserModified(), $comparison);
        } elseif ($esCities instanceof ObjectCollection) {
            return $this
                ->useEsCitiesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esCities->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsCitiesRelatedByIdUserModified() only accepts arguments of type \EsCities or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsCitiesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsCitiesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsCitiesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsCitiesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsCitiesRelatedByIdUserModified relation EsCities object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsCitiesQuery A secondary query class using the current class as primary query
     */
    public function useEsCitiesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsCitiesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsCitiesRelatedByIdUserModified', '\EsCitiesQuery');
    }

    /**
     * Filter the query by a related \EsDomains object
     *
     * @param \EsDomains|ObjectCollection $esDomains the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsDomainsRelatedByIdUserCreated($esDomains, $comparison = null)
    {
        if ($esDomains instanceof \EsDomains) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esDomains->getIdUserCreated(), $comparison);
        } elseif ($esDomains instanceof ObjectCollection) {
            return $this
                ->useEsDomainsRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esDomains->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsDomainsRelatedByIdUserCreated() only accepts arguments of type \EsDomains or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsDomainsRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsDomainsRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsDomainsRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsDomainsRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsDomainsRelatedByIdUserCreated relation EsDomains object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsDomainsQuery A secondary query class using the current class as primary query
     */
    public function useEsDomainsRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsDomainsRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsDomainsRelatedByIdUserCreated', '\EsDomainsQuery');
    }

    /**
     * Filter the query by a related \EsDomains object
     *
     * @param \EsDomains|ObjectCollection $esDomains the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsDomainsRelatedByIdUserModified($esDomains, $comparison = null)
    {
        if ($esDomains instanceof \EsDomains) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esDomains->getIdUserModified(), $comparison);
        } elseif ($esDomains instanceof ObjectCollection) {
            return $this
                ->useEsDomainsRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esDomains->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsDomainsRelatedByIdUserModified() only accepts arguments of type \EsDomains or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsDomainsRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsDomainsRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsDomainsRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsDomainsRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsDomainsRelatedByIdUserModified relation EsDomains object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsDomainsQuery A secondary query class using the current class as primary query
     */
    public function useEsDomainsRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsDomainsRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsDomainsRelatedByIdUserModified', '\EsDomainsQuery');
    }

    /**
     * Filter the query by a related \EsFiles object
     *
     * @param \EsFiles|ObjectCollection $esFiles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsFilesRelatedByIdUserCreated($esFiles, $comparison = null)
    {
        if ($esFiles instanceof \EsFiles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esFiles->getIdUserCreated(), $comparison);
        } elseif ($esFiles instanceof ObjectCollection) {
            return $this
                ->useEsFilesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esFiles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsFilesRelatedByIdUserCreated() only accepts arguments of type \EsFiles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsFilesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsFilesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsFilesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsFilesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsFilesRelatedByIdUserCreated relation EsFiles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsFilesQuery A secondary query class using the current class as primary query
     */
    public function useEsFilesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsFilesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsFilesRelatedByIdUserCreated', '\EsFilesQuery');
    }

    /**
     * Filter the query by a related \EsFiles object
     *
     * @param \EsFiles|ObjectCollection $esFiles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsFilesRelatedByIdUserModified($esFiles, $comparison = null)
    {
        if ($esFiles instanceof \EsFiles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esFiles->getIdUserModified(), $comparison);
        } elseif ($esFiles instanceof ObjectCollection) {
            return $this
                ->useEsFilesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esFiles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsFilesRelatedByIdUserModified() only accepts arguments of type \EsFiles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsFilesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsFilesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsFilesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsFilesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsFilesRelatedByIdUserModified relation EsFiles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsFilesQuery A secondary query class using the current class as primary query
     */
    public function useEsFilesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsFilesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsFilesRelatedByIdUserModified', '\EsFilesQuery');
    }

    /**
     * Filter the query by a related \EsModules object
     *
     * @param \EsModules|ObjectCollection $esModules the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsModulesRelatedByIdUserModified($esModules, $comparison = null)
    {
        if ($esModules instanceof \EsModules) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esModules->getIdUserModified(), $comparison);
        } elseif ($esModules instanceof ObjectCollection) {
            return $this
                ->useEsModulesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esModules->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsModulesRelatedByIdUserModified() only accepts arguments of type \EsModules or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsModulesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsModulesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsModulesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsModulesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsModulesRelatedByIdUserModified relation EsModules object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsModulesQuery A secondary query class using the current class as primary query
     */
    public function useEsModulesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsModulesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsModulesRelatedByIdUserModified', '\EsModulesQuery');
    }

    /**
     * Filter the query by a related \EsModules object
     *
     * @param \EsModules|ObjectCollection $esModules the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsModulesRelatedByIdUserCreated($esModules, $comparison = null)
    {
        if ($esModules instanceof \EsModules) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esModules->getIdUserCreated(), $comparison);
        } elseif ($esModules instanceof ObjectCollection) {
            return $this
                ->useEsModulesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esModules->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsModulesRelatedByIdUserCreated() only accepts arguments of type \EsModules or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsModulesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsModulesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsModulesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsModulesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsModulesRelatedByIdUserCreated relation EsModules object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsModulesQuery A secondary query class using the current class as primary query
     */
    public function useEsModulesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsModulesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsModulesRelatedByIdUserCreated', '\EsModulesQuery');
    }

    /**
     * Filter the query by a related \EsProvincias object
     *
     * @param \EsProvincias|ObjectCollection $esProvincias the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsProvinciasRelatedByIdUserCreated($esProvincias, $comparison = null)
    {
        if ($esProvincias instanceof \EsProvincias) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esProvincias->getIdUserCreated(), $comparison);
        } elseif ($esProvincias instanceof ObjectCollection) {
            return $this
                ->useEsProvinciasRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esProvincias->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsProvinciasRelatedByIdUserCreated() only accepts arguments of type \EsProvincias or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsProvinciasRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsProvinciasRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsProvinciasRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsProvinciasRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsProvinciasRelatedByIdUserCreated relation EsProvincias object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsProvinciasQuery A secondary query class using the current class as primary query
     */
    public function useEsProvinciasRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsProvinciasRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsProvinciasRelatedByIdUserCreated', '\EsProvinciasQuery');
    }

    /**
     * Filter the query by a related \EsProvincias object
     *
     * @param \EsProvincias|ObjectCollection $esProvincias the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsProvinciasRelatedByIdUserModified($esProvincias, $comparison = null)
    {
        if ($esProvincias instanceof \EsProvincias) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esProvincias->getIdUserModified(), $comparison);
        } elseif ($esProvincias instanceof ObjectCollection) {
            return $this
                ->useEsProvinciasRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esProvincias->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsProvinciasRelatedByIdUserModified() only accepts arguments of type \EsProvincias or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsProvinciasRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsProvinciasRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsProvinciasRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsProvinciasRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsProvinciasRelatedByIdUserModified relation EsProvincias object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsProvinciasQuery A secondary query class using the current class as primary query
     */
    public function useEsProvinciasRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsProvinciasRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsProvinciasRelatedByIdUserModified', '\EsProvinciasQuery');
    }

    /**
     * Filter the query by a related \EsRoles object
     *
     * @param \EsRoles|ObjectCollection $esRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsRolesRelatedByIdUserCreated($esRoles, $comparison = null)
    {
        if ($esRoles instanceof \EsRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esRoles->getIdUserCreated(), $comparison);
        } elseif ($esRoles instanceof ObjectCollection) {
            return $this
                ->useEsRolesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsRolesRelatedByIdUserCreated() only accepts arguments of type \EsRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsRolesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsRolesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsRolesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsRolesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsRolesRelatedByIdUserCreated relation EsRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsRolesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsRolesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsRolesRelatedByIdUserCreated', '\EsRolesQuery');
    }

    /**
     * Filter the query by a related \EsRoles object
     *
     * @param \EsRoles|ObjectCollection $esRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsRolesRelatedByIdUserModified($esRoles, $comparison = null)
    {
        if ($esRoles instanceof \EsRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esRoles->getIdUserModified(), $comparison);
        } elseif ($esRoles instanceof ObjectCollection) {
            return $this
                ->useEsRolesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsRolesRelatedByIdUserModified() only accepts arguments of type \EsRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsRolesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsRolesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsRolesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsRolesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsRolesRelatedByIdUserModified relation EsRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsRolesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsRolesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsRolesRelatedByIdUserModified', '\EsRolesQuery');
    }

    /**
     * Filter the query by a related \EsSessions object
     *
     * @param \EsSessions|ObjectCollection $esSessions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsSessions($esSessions, $comparison = null)
    {
        if ($esSessions instanceof \EsSessions) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esSessions->getIdUser(), $comparison);
        } elseif ($esSessions instanceof ObjectCollection) {
            return $this
                ->useEsSessionsQuery()
                ->filterByPrimaryKeys($esSessions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsSessions() only accepts arguments of type \EsSessions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsSessions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsSessions($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsSessions');

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
            $this->addJoinObject($join, 'EsSessions');
        }

        return $this;
    }

    /**
     * Use the EsSessions relation EsSessions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsSessionsQuery A secondary query class using the current class as primary query
     */
    public function useEsSessionsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsSessions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsSessions', '\EsSessionsQuery');
    }

    /**
     * Filter the query by a related \EsTables object
     *
     * @param \EsTables|ObjectCollection $esTables the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsTablesRelatedByIdUserCreated($esTables, $comparison = null)
    {
        if ($esTables instanceof \EsTables) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esTables->getIdUserCreated(), $comparison);
        } elseif ($esTables instanceof ObjectCollection) {
            return $this
                ->useEsTablesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esTables->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsTablesRelatedByIdUserCreated() only accepts arguments of type \EsTables or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsTablesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsTablesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsTablesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsTablesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsTablesRelatedByIdUserCreated relation EsTables object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsTablesQuery A secondary query class using the current class as primary query
     */
    public function useEsTablesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsTablesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsTablesRelatedByIdUserCreated', '\EsTablesQuery');
    }

    /**
     * Filter the query by a related \EsTables object
     *
     * @param \EsTables|ObjectCollection $esTables the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsTablesRelatedByIdUserModified($esTables, $comparison = null)
    {
        if ($esTables instanceof \EsTables) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esTables->getIdUserModified(), $comparison);
        } elseif ($esTables instanceof ObjectCollection) {
            return $this
                ->useEsTablesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esTables->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsTablesRelatedByIdUserModified() only accepts arguments of type \EsTables or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsTablesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsTablesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsTablesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsTablesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsTablesRelatedByIdUserModified relation EsTables object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsTablesQuery A secondary query class using the current class as primary query
     */
    public function useEsTablesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsTablesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsTablesRelatedByIdUserModified', '\EsTablesQuery');
    }

    /**
     * Filter the query by a related \EsTablesRoles object
     *
     * @param \EsTablesRoles|ObjectCollection $esTablesRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsTablesRolesRelatedByIdUserCreated($esTablesRoles, $comparison = null)
    {
        if ($esTablesRoles instanceof \EsTablesRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esTablesRoles->getIdUserCreated(), $comparison);
        } elseif ($esTablesRoles instanceof ObjectCollection) {
            return $this
                ->useEsTablesRolesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esTablesRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsTablesRolesRelatedByIdUserCreated() only accepts arguments of type \EsTablesRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsTablesRolesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsTablesRolesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsTablesRolesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsTablesRolesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsTablesRolesRelatedByIdUserCreated relation EsTablesRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsTablesRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsTablesRolesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsTablesRolesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsTablesRolesRelatedByIdUserCreated', '\EsTablesRolesQuery');
    }

    /**
     * Filter the query by a related \EsTablesRoles object
     *
     * @param \EsTablesRoles|ObjectCollection $esTablesRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsTablesRolesRelatedByIdUserModified($esTablesRoles, $comparison = null)
    {
        if ($esTablesRoles instanceof \EsTablesRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esTablesRoles->getIdUserModified(), $comparison);
        } elseif ($esTablesRoles instanceof ObjectCollection) {
            return $this
                ->useEsTablesRolesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esTablesRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsTablesRolesRelatedByIdUserModified() only accepts arguments of type \EsTablesRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsTablesRolesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsTablesRolesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsTablesRolesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsTablesRolesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsTablesRolesRelatedByIdUserModified relation EsTablesRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsTablesRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsTablesRolesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsTablesRolesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsTablesRolesRelatedByIdUserModified', '\EsTablesRolesQuery');
    }

    /**
     * Filter the query by a related \EsUsersRoles object
     *
     * @param \EsUsersRoles|ObjectCollection $esUsersRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsUsersRolesRelatedByIdUserCreated($esUsersRoles, $comparison = null)
    {
        if ($esUsersRoles instanceof \EsUsersRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esUsersRoles->getIdUserCreated(), $comparison);
        } elseif ($esUsersRoles instanceof ObjectCollection) {
            return $this
                ->useEsUsersRolesRelatedByIdUserCreatedQuery()
                ->filterByPrimaryKeys($esUsersRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsUsersRolesRelatedByIdUserCreated() only accepts arguments of type \EsUsersRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRolesRelatedByIdUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsUsersRolesRelatedByIdUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRolesRelatedByIdUserCreated');

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
            $this->addJoinObject($join, 'EsUsersRolesRelatedByIdUserCreated');
        }

        return $this;
    }

    /**
     * Use the EsUsersRolesRelatedByIdUserCreated relation EsUsersRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRolesRelatedByIdUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsUsersRolesRelatedByIdUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRolesRelatedByIdUserCreated', '\EsUsersRolesQuery');
    }

    /**
     * Filter the query by a related \EsUsersRoles object
     *
     * @param \EsUsersRoles|ObjectCollection $esUsersRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsUsersRolesRelatedByIdUserModified($esUsersRoles, $comparison = null)
    {
        if ($esUsersRoles instanceof \EsUsersRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esUsersRoles->getIdUserModified(), $comparison);
        } elseif ($esUsersRoles instanceof ObjectCollection) {
            return $this
                ->useEsUsersRolesRelatedByIdUserModifiedQuery()
                ->filterByPrimaryKeys($esUsersRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsUsersRolesRelatedByIdUserModified() only accepts arguments of type \EsUsersRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRolesRelatedByIdUserModified relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsUsersRolesRelatedByIdUserModified($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRolesRelatedByIdUserModified');

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
            $this->addJoinObject($join, 'EsUsersRolesRelatedByIdUserModified');
        }

        return $this;
    }

    /**
     * Use the EsUsersRolesRelatedByIdUserModified relation EsUsersRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRolesRelatedByIdUserModifiedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEsUsersRolesRelatedByIdUserModified($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRolesRelatedByIdUserModified', '\EsUsersRolesQuery');
    }

    /**
     * Filter the query by a related \EsUsersRoles object
     *
     * @param \EsUsersRoles|ObjectCollection $esUsersRoles the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEsUsersQuery The current query, for fluid interface
     */
    public function filterByEsUsersRolesRelatedByIdUser($esUsersRoles, $comparison = null)
    {
        if ($esUsersRoles instanceof \EsUsersRoles) {
            return $this
                ->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esUsersRoles->getIdUser(), $comparison);
        } elseif ($esUsersRoles instanceof ObjectCollection) {
            return $this
                ->useEsUsersRolesRelatedByIdUserQuery()
                ->filterByPrimaryKeys($esUsersRoles->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEsUsersRolesRelatedByIdUser() only accepts arguments of type \EsUsersRoles or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EsUsersRolesRelatedByIdUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function joinEsUsersRolesRelatedByIdUser($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EsUsersRolesRelatedByIdUser');

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
            $this->addJoinObject($join, 'EsUsersRolesRelatedByIdUser');
        }

        return $this;
    }

    /**
     * Use the EsUsersRolesRelatedByIdUser relation EsUsersRoles object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EsUsersRolesQuery A secondary query class using the current class as primary query
     */
    public function useEsUsersRolesRelatedByIdUserQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEsUsersRolesRelatedByIdUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EsUsersRolesRelatedByIdUser', '\EsUsersRolesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEsUsers $esUsers Object to remove from the list of results
     *
     * @return $this|ChildEsUsersQuery The current query, for fluid interface
     */
    public function prune($esUsers = null)
    {
        if ($esUsers) {
            $this->addUsingAlias(EsUsersTableMap::COL_ID_USER, $esUsers->getIdUser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the es_users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EsUsersTableMap::clearInstancePool();
            EsUsersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EsUsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EsUsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EsUsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EsUsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EsUsersQuery
