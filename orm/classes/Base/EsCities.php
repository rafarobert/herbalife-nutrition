<?php

namespace Base;

use \EsCities as ChildEsCities;
use \EsCitiesQuery as ChildEsCitiesQuery;
use \EsFiles as ChildEsFiles;
use \EsFilesQuery as ChildEsFilesQuery;
use \EsProvincias as ChildEsProvincias;
use \EsProvinciasQuery as ChildEsProvinciasQuery;
use \EsUsers as ChildEsUsers;
use \EsUsersQuery as ChildEsUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EsCitiesTableMap;
use Map\EsProvinciasTableMap;
use Map\EsUsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'es_cities' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EsCities implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EsCitiesTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id_city field.
     *
     * @var        int
     */
    protected $id_city;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the description field.
     *
     * @var        string
     */
    protected $description;

    /**
     * The value for the abbreviation field.
     *
     * @var        string
     */
    protected $abbreviation;

    /**
     * The value for the id_capital field.
     *
     * @var        int
     */
    protected $id_capital;

    /**
     * The value for the id_region field.
     *
     * @var        int
     */
    protected $id_region;

    /**
     * The value for the lat field.
     *
     * @var        string
     */
    protected $lat;

    /**
     * The value for the lng field.
     *
     * @var        string
     */
    protected $lng;

    /**
     * The value for the area field.
     *
     * @var        int
     */
    protected $area;

    /**
     * The value for the nro_municipios field.
     *
     * @var        int
     */
    protected $nro_municipios;

    /**
     * The value for the surface field.
     *
     * @var        string
     */
    protected $surface;

    /**
     * The value for the ids_files field.
     *
     * @var        string
     */
    protected $ids_files;

    /**
     * The value for the id_cover_picture field.
     *
     * @var        int
     */
    protected $id_cover_picture;

    /**
     * The value for the height field.
     *
     * @var        string
     */
    protected $height;

    /**
     * The value for the tipo field.
     *
     * @var        string
     */
    protected $tipo;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: 'ENABLED'
     * @var        string
     */
    protected $status;

    /**
     * The value for the change_count field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $change_count;

    /**
     * The value for the id_user_modified field.
     *
     * @var        int
     */
    protected $id_user_modified;

    /**
     * The value for the id_user_created field.
     *
     * @var        int
     */
    protected $id_user_created;

    /**
     * The value for the date_modified field.
     *
     * @var        DateTime
     */
    protected $date_modified;

    /**
     * The value for the date_created field.
     *
     * @var        DateTime
     */
    protected $date_created;

    /**
     * @var        ChildEsUsers
     */
    protected $aEsUsersRelatedByIdUserCreated;

    /**
     * @var        ChildEsUsers
     */
    protected $aEsUsersRelatedByIdUserModified;

    /**
     * @var        ChildEsCities
     */
    protected $aEsCitiesRelatedByIdCapital;

    /**
     * @var        ChildEsCities
     */
    protected $aEsCitiesRelatedByIdRegion;

    /**
     * @var        ChildEsFiles
     */
    protected $aEsFiles;

    /**
     * @var        ObjectCollection|ChildEsCities[] Collection to store aggregation of ChildEsCities objects.
     */
    protected $collEsCitiessRelatedByIdCity0;
    protected $collEsCitiessRelatedByIdCity0Partial;

    /**
     * @var        ObjectCollection|ChildEsCities[] Collection to store aggregation of ChildEsCities objects.
     */
    protected $collEsCitiessRelatedByIdCity1;
    protected $collEsCitiessRelatedByIdCity1Partial;

    /**
     * @var        ObjectCollection|ChildEsProvincias[] Collection to store aggregation of ChildEsProvincias objects.
     */
    protected $collEsProvinciass;
    protected $collEsProvinciassPartial;

    /**
     * @var        ObjectCollection|ChildEsUsers[] Collection to store aggregation of ChildEsUsers objects.
     */
    protected $collEsUserssRelatedByIdCity;
    protected $collEsUserssRelatedByIdCityPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsCities[]
     */
    protected $esCitiessRelatedByIdCity0ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsCities[]
     */
    protected $esCitiessRelatedByIdCity1ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsProvincias[]
     */
    protected $esProvinciassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsers[]
     */
    protected $esUserssRelatedByIdCityScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->status = 'ENABLED';
        $this->change_count = 0;
    }

    /**
     * Initializes internal state of Base\EsCities object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>EsCities</code> instance.  If
     * <code>obj</code> is an instance of <code>EsCities</code>, delegates to
     * <code>equals(EsCities)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|EsCities The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id_city] column value.
     *
     * @return int
     */
    public function getIdCity()
    {
        return $this->id_city;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [abbreviation] column value.
     *
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Get the [id_capital] column value.
     *
     * @return int
     */
    public function getIdCapital()
    {
        return $this->id_capital;
    }

    /**
     * Get the [id_region] column value.
     *
     * @return int
     */
    public function getIdRegion()
    {
        return $this->id_region;
    }

    /**
     * Get the [lat] column value.
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Get the [lng] column value.
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Get the [area] column value.
     *
     * @return int
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Get the [nro_municipios] column value.
     *
     * @return int
     */
    public function getNroMunicipios()
    {
        return $this->nro_municipios;
    }

    /**
     * Get the [surface] column value.
     *
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Get the [ids_files] column value.
     *
     * @return string
     */
    public function getIdsFiles()
    {
        return $this->ids_files;
    }

    /**
     * Get the [id_cover_picture] column value.
     *
     * @return int
     */
    public function getIdCoverPicture()
    {
        return $this->id_cover_picture;
    }

    /**
     * Get the [height] column value.
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the [tipo] column value.
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [change_count] column value.
     *
     * @return int
     */
    public function getChangeCount()
    {
        return $this->change_count;
    }

    /**
     * Get the [id_user_modified] column value.
     *
     * @return int
     */
    public function getIdUserModified()
    {
        return $this->id_user_modified;
    }

    /**
     * Get the [id_user_created] column value.
     *
     * @return int
     */
    public function getIdUserCreated()
    {
        return $this->id_user_created;
    }

    /**
     * Get the [optionally formatted] temporal [date_modified] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateModified($format = NULL)
    {
        if ($format === null) {
            return $this->date_modified;
        } else {
            return $this->date_modified instanceof \DateTimeInterface ? $this->date_modified->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [date_created] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateCreated($format = NULL)
    {
        if ($format === null) {
            return $this->date_created;
        } else {
            return $this->date_created instanceof \DateTimeInterface ? $this->date_created->format($format) : null;
        }
    }

    /**
     * Set the value of [id_city] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdCity($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_city !== $v) {
            $this->id_city = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ID_CITY] = true;
        }

        return $this;
    } // setIdCity()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [abbreviation] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setAbbreviation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->abbreviation !== $v) {
            $this->abbreviation = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ABBREVIATION] = true;
        }

        return $this;
    } // setAbbreviation()

    /**
     * Set the value of [id_capital] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdCapital($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_capital !== $v) {
            $this->id_capital = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ID_CAPITAL] = true;
        }

        if ($this->aEsCitiesRelatedByIdCapital !== null && $this->aEsCitiesRelatedByIdCapital->getIdCity() !== $v) {
            $this->aEsCitiesRelatedByIdCapital = null;
        }

        return $this;
    } // setIdCapital()

    /**
     * Set the value of [id_region] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdRegion($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_region !== $v) {
            $this->id_region = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ID_REGION] = true;
        }

        if ($this->aEsCitiesRelatedByIdRegion !== null && $this->aEsCitiesRelatedByIdRegion->getIdCity() !== $v) {
            $this->aEsCitiesRelatedByIdRegion = null;
        }

        return $this;
    } // setIdRegion()

    /**
     * Set the value of [lat] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setLat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lat !== $v) {
            $this->lat = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_LAT] = true;
        }

        return $this;
    } // setLat()

    /**
     * Set the value of [lng] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setLng($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lng !== $v) {
            $this->lng = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_LNG] = true;
        }

        return $this;
    } // setLng()

    /**
     * Set the value of [area] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setArea($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->area !== $v) {
            $this->area = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_AREA] = true;
        }

        return $this;
    } // setArea()

    /**
     * Set the value of [nro_municipios] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setNroMunicipios($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->nro_municipios !== $v) {
            $this->nro_municipios = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_NRO_MUNICIPIOS] = true;
        }

        return $this;
    } // setNroMunicipios()

    /**
     * Set the value of [surface] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setSurface($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->surface !== $v) {
            $this->surface = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_SURFACE] = true;
        }

        return $this;
    } // setSurface()

    /**
     * Set the value of [ids_files] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdsFiles($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ids_files !== $v) {
            $this->ids_files = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_IDS_FILES] = true;
        }

        return $this;
    } // setIdsFiles()

    /**
     * Set the value of [id_cover_picture] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdCoverPicture($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_cover_picture !== $v) {
            $this->id_cover_picture = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ID_COVER_PICTURE] = true;
        }

        if ($this->aEsFiles !== null && $this->aEsFiles->getIdFile() !== $v) {
            $this->aEsFiles = null;
        }

        return $this;
    } // setIdCoverPicture()

    /**
     * Set the value of [height] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setHeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->height !== $v) {
            $this->height = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_HEIGHT] = true;
        }

        return $this;
    } // setHeight()

    /**
     * Set the value of [tipo] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setTipo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tipo !== $v) {
            $this->tipo = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_TIPO] = true;
        }

        return $this;
    } // setTipo()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ID_USER_MODIFIED] = true;
        }

        if ($this->aEsUsersRelatedByIdUserModified !== null && $this->aEsUsersRelatedByIdUserModified->getIdUser() !== $v) {
            $this->aEsUsersRelatedByIdUserModified = null;
        }

        return $this;
    } // setIdUserModified()

    /**
     * Set the value of [id_user_created] column.
     *
     * @param int $v new value
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[EsCitiesTableMap::COL_ID_USER_CREATED] = true;
        }

        if ($this->aEsUsersRelatedByIdUserCreated !== null && $this->aEsUsersRelatedByIdUserCreated->getIdUser() !== $v) {
            $this->aEsUsersRelatedByIdUserCreated = null;
        }

        return $this;
    } // setIdUserCreated()

    /**
     * Sets the value of [date_modified] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsCitiesTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsCitiesTableMap::COL_DATE_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateCreated()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->status !== 'ENABLED') {
                return false;
            }

            if ($this->change_count !== 0) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EsCitiesTableMap::translateFieldName('IdCity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_city = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EsCitiesTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EsCitiesTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EsCitiesTableMap::translateFieldName('Abbreviation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->abbreviation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EsCitiesTableMap::translateFieldName('IdCapital', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_capital = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EsCitiesTableMap::translateFieldName('IdRegion', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_region = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EsCitiesTableMap::translateFieldName('Lat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EsCitiesTableMap::translateFieldName('Lng', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lng = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EsCitiesTableMap::translateFieldName('Area', TableMap::TYPE_PHPNAME, $indexType)];
            $this->area = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EsCitiesTableMap::translateFieldName('NroMunicipios', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nro_municipios = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EsCitiesTableMap::translateFieldName('Surface', TableMap::TYPE_PHPNAME, $indexType)];
            $this->surface = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EsCitiesTableMap::translateFieldName('IdsFiles', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ids_files = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EsCitiesTableMap::translateFieldName('IdCoverPicture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_cover_picture = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : EsCitiesTableMap::translateFieldName('Height', TableMap::TYPE_PHPNAME, $indexType)];
            $this->height = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : EsCitiesTableMap::translateFieldName('Tipo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : EsCitiesTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : EsCitiesTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : EsCitiesTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : EsCitiesTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : EsCitiesTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : EsCitiesTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 21; // 21 = EsCitiesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EsCities'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aEsCitiesRelatedByIdCapital !== null && $this->id_capital !== $this->aEsCitiesRelatedByIdCapital->getIdCity()) {
            $this->aEsCitiesRelatedByIdCapital = null;
        }
        if ($this->aEsCitiesRelatedByIdRegion !== null && $this->id_region !== $this->aEsCitiesRelatedByIdRegion->getIdCity()) {
            $this->aEsCitiesRelatedByIdRegion = null;
        }
        if ($this->aEsFiles !== null && $this->id_cover_picture !== $this->aEsFiles->getIdFile()) {
            $this->aEsFiles = null;
        }
        if ($this->aEsUsersRelatedByIdUserModified !== null && $this->id_user_modified !== $this->aEsUsersRelatedByIdUserModified->getIdUser()) {
            $this->aEsUsersRelatedByIdUserModified = null;
        }
        if ($this->aEsUsersRelatedByIdUserCreated !== null && $this->id_user_created !== $this->aEsUsersRelatedByIdUserCreated->getIdUser()) {
            $this->aEsUsersRelatedByIdUserCreated = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEsCitiesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEsUsersRelatedByIdUserCreated = null;
            $this->aEsUsersRelatedByIdUserModified = null;
            $this->aEsCitiesRelatedByIdCapital = null;
            $this->aEsCitiesRelatedByIdRegion = null;
            $this->aEsFiles = null;
            $this->collEsCitiessRelatedByIdCity0 = null;

            $this->collEsCitiessRelatedByIdCity1 = null;

            $this->collEsProvinciass = null;

            $this->collEsUserssRelatedByIdCity = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EsCities::setDeleted()
     * @see EsCities::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEsCitiesQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsCitiesTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                EsCitiesTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEsUsersRelatedByIdUserCreated !== null) {
                if ($this->aEsUsersRelatedByIdUserCreated->isModified() || $this->aEsUsersRelatedByIdUserCreated->isNew()) {
                    $affectedRows += $this->aEsUsersRelatedByIdUserCreated->save($con);
                }
                $this->setEsUsersRelatedByIdUserCreated($this->aEsUsersRelatedByIdUserCreated);
            }

            if ($this->aEsUsersRelatedByIdUserModified !== null) {
                if ($this->aEsUsersRelatedByIdUserModified->isModified() || $this->aEsUsersRelatedByIdUserModified->isNew()) {
                    $affectedRows += $this->aEsUsersRelatedByIdUserModified->save($con);
                }
                $this->setEsUsersRelatedByIdUserModified($this->aEsUsersRelatedByIdUserModified);
            }

            if ($this->aEsCitiesRelatedByIdCapital !== null) {
                if ($this->aEsCitiesRelatedByIdCapital->isModified() || $this->aEsCitiesRelatedByIdCapital->isNew()) {
                    $affectedRows += $this->aEsCitiesRelatedByIdCapital->save($con);
                }
                $this->setEsCitiesRelatedByIdCapital($this->aEsCitiesRelatedByIdCapital);
            }

            if ($this->aEsCitiesRelatedByIdRegion !== null) {
                if ($this->aEsCitiesRelatedByIdRegion->isModified() || $this->aEsCitiesRelatedByIdRegion->isNew()) {
                    $affectedRows += $this->aEsCitiesRelatedByIdRegion->save($con);
                }
                $this->setEsCitiesRelatedByIdRegion($this->aEsCitiesRelatedByIdRegion);
            }

            if ($this->aEsFiles !== null) {
                if ($this->aEsFiles->isModified() || $this->aEsFiles->isNew()) {
                    $affectedRows += $this->aEsFiles->save($con);
                }
                $this->setEsFiles($this->aEsFiles);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->esCitiessRelatedByIdCity0ScheduledForDeletion !== null) {
                if (!$this->esCitiessRelatedByIdCity0ScheduledForDeletion->isEmpty()) {
                    foreach ($this->esCitiessRelatedByIdCity0ScheduledForDeletion as $esCitiesRelatedByIdCity0) {
                        // need to save related object because we set the relation to null
                        $esCitiesRelatedByIdCity0->save($con);
                    }
                    $this->esCitiessRelatedByIdCity0ScheduledForDeletion = null;
                }
            }

            if ($this->collEsCitiessRelatedByIdCity0 !== null) {
                foreach ($this->collEsCitiessRelatedByIdCity0 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esCitiessRelatedByIdCity1ScheduledForDeletion !== null) {
                if (!$this->esCitiessRelatedByIdCity1ScheduledForDeletion->isEmpty()) {
                    foreach ($this->esCitiessRelatedByIdCity1ScheduledForDeletion as $esCitiesRelatedByIdCity1) {
                        // need to save related object because we set the relation to null
                        $esCitiesRelatedByIdCity1->save($con);
                    }
                    $this->esCitiessRelatedByIdCity1ScheduledForDeletion = null;
                }
            }

            if ($this->collEsCitiessRelatedByIdCity1 !== null) {
                foreach ($this->collEsCitiessRelatedByIdCity1 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esProvinciassScheduledForDeletion !== null) {
                if (!$this->esProvinciassScheduledForDeletion->isEmpty()) {
                    foreach ($this->esProvinciassScheduledForDeletion as $esProvincias) {
                        // need to save related object because we set the relation to null
                        $esProvincias->save($con);
                    }
                    $this->esProvinciassScheduledForDeletion = null;
                }
            }

            if ($this->collEsProvinciass !== null) {
                foreach ($this->collEsProvinciass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUserssRelatedByIdCityScheduledForDeletion !== null) {
                if (!$this->esUserssRelatedByIdCityScheduledForDeletion->isEmpty()) {
                    foreach ($this->esUserssRelatedByIdCityScheduledForDeletion as $esUsersRelatedByIdCity) {
                        // need to save related object because we set the relation to null
                        $esUsersRelatedByIdCity->save($con);
                    }
                    $this->esUserssRelatedByIdCityScheduledForDeletion = null;
                }
            }

            if ($this->collEsUserssRelatedByIdCity !== null) {
                foreach ($this->collEsUserssRelatedByIdCity as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[EsCitiesTableMap::COL_ID_CITY] = true;
        if (null !== $this->id_city) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EsCitiesTableMap::COL_ID_CITY . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'id_city';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ABBREVIATION)) {
            $modifiedColumns[':p' . $index++]  = 'abbreviation';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_CAPITAL)) {
            $modifiedColumns[':p' . $index++]  = 'id_capital';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_REGION)) {
            $modifiedColumns[':p' . $index++]  = 'id_region';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_LAT)) {
            $modifiedColumns[':p' . $index++]  = 'lat';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_LNG)) {
            $modifiedColumns[':p' . $index++]  = 'lng';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_AREA)) {
            $modifiedColumns[':p' . $index++]  = 'area';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_NRO_MUNICIPIOS)) {
            $modifiedColumns[':p' . $index++]  = 'nro_municipios';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_SURFACE)) {
            $modifiedColumns[':p' . $index++]  = 'surface';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_IDS_FILES)) {
            $modifiedColumns[':p' . $index++]  = 'ids_files';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_COVER_PICTURE)) {
            $modifiedColumns[':p' . $index++]  = 'id_cover_picture';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'height';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_TIPO)) {
            $modifiedColumns[':p' . $index++]  = 'tipo';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO es_cities (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_city':
                        $stmt->bindValue($identifier, $this->id_city, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'abbreviation':
                        $stmt->bindValue($identifier, $this->abbreviation, PDO::PARAM_STR);
                        break;
                    case 'id_capital':
                        $stmt->bindValue($identifier, $this->id_capital, PDO::PARAM_INT);
                        break;
                    case 'id_region':
                        $stmt->bindValue($identifier, $this->id_region, PDO::PARAM_INT);
                        break;
                    case 'lat':
                        $stmt->bindValue($identifier, $this->lat, PDO::PARAM_STR);
                        break;
                    case 'lng':
                        $stmt->bindValue($identifier, $this->lng, PDO::PARAM_STR);
                        break;
                    case 'area':
                        $stmt->bindValue($identifier, $this->area, PDO::PARAM_INT);
                        break;
                    case 'nro_municipios':
                        $stmt->bindValue($identifier, $this->nro_municipios, PDO::PARAM_INT);
                        break;
                    case 'surface':
                        $stmt->bindValue($identifier, $this->surface, PDO::PARAM_STR);
                        break;
                    case 'ids_files':
                        $stmt->bindValue($identifier, $this->ids_files, PDO::PARAM_STR);
                        break;
                    case 'id_cover_picture':
                        $stmt->bindValue($identifier, $this->id_cover_picture, PDO::PARAM_INT);
                        break;
                    case 'height':
                        $stmt->bindValue($identifier, $this->height, PDO::PARAM_STR);
                        break;
                    case 'tipo':
                        $stmt->bindValue($identifier, $this->tipo, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'change_count':
                        $stmt->bindValue($identifier, $this->change_count, PDO::PARAM_INT);
                        break;
                    case 'id_user_modified':
                        $stmt->bindValue($identifier, $this->id_user_modified, PDO::PARAM_INT);
                        break;
                    case 'id_user_created':
                        $stmt->bindValue($identifier, $this->id_user_created, PDO::PARAM_INT);
                        break;
                    case 'date_modified':
                        $stmt->bindValue($identifier, $this->date_modified ? $this->date_modified->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'date_created':
                        $stmt->bindValue($identifier, $this->date_created ? $this->date_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdCity($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsCitiesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdCity();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getAbbreviation();
                break;
            case 4:
                return $this->getIdCapital();
                break;
            case 5:
                return $this->getIdRegion();
                break;
            case 6:
                return $this->getLat();
                break;
            case 7:
                return $this->getLng();
                break;
            case 8:
                return $this->getArea();
                break;
            case 9:
                return $this->getNroMunicipios();
                break;
            case 10:
                return $this->getSurface();
                break;
            case 11:
                return $this->getIdsFiles();
                break;
            case 12:
                return $this->getIdCoverPicture();
                break;
            case 13:
                return $this->getHeight();
                break;
            case 14:
                return $this->getTipo();
                break;
            case 15:
                return $this->getStatus();
                break;
            case 16:
                return $this->getChangeCount();
                break;
            case 17:
                return $this->getIdUserModified();
                break;
            case 18:
                return $this->getIdUserCreated();
                break;
            case 19:
                return $this->getDateModified();
                break;
            case 20:
                return $this->getDateCreated();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['EsCities'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EsCities'][$this->hashCode()] = true;
        $keys = EsCitiesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdCity(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getAbbreviation(),
            $keys[4] => $this->getIdCapital(),
            $keys[5] => $this->getIdRegion(),
            $keys[6] => $this->getLat(),
            $keys[7] => $this->getLng(),
            $keys[8] => $this->getArea(),
            $keys[9] => $this->getNroMunicipios(),
            $keys[10] => $this->getSurface(),
            $keys[11] => $this->getIdsFiles(),
            $keys[12] => $this->getIdCoverPicture(),
            $keys[13] => $this->getHeight(),
            $keys[14] => $this->getTipo(),
            $keys[15] => $this->getStatus(),
            $keys[16] => $this->getChangeCount(),
            $keys[17] => $this->getIdUserModified(),
            $keys[18] => $this->getIdUserCreated(),
            $keys[19] => $this->getDateModified(),
            $keys[20] => $this->getDateCreated(),
        );
        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEsUsersRelatedByIdUserCreated) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users';
                        break;
                    default:
                        $key = 'EsUsers';
                }

                $result[$key] = $this->aEsUsersRelatedByIdUserCreated->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsUsersRelatedByIdUserModified) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUsers';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_users';
                        break;
                    default:
                        $key = 'EsUsers';
                }

                $result[$key] = $this->aEsUsersRelatedByIdUserModified->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsCitiesRelatedByIdCapital) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCities';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_cities';
                        break;
                    default:
                        $key = 'EsCities';
                }

                $result[$key] = $this->aEsCitiesRelatedByIdCapital->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsCitiesRelatedByIdRegion) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCities';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_cities';
                        break;
                    default:
                        $key = 'EsCities';
                }

                $result[$key] = $this->aEsCitiesRelatedByIdRegion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEsFiles) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esFiles';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_files';
                        break;
                    default:
                        $key = 'EsFiles';
                }

                $result[$key] = $this->aEsFiles->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEsCitiessRelatedByIdCity0) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCitiess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_citiess';
                        break;
                    default:
                        $key = 'EsCitiess';
                }

                $result[$key] = $this->collEsCitiessRelatedByIdCity0->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsCitiessRelatedByIdCity1) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esCitiess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_citiess';
                        break;
                    default:
                        $key = 'EsCitiess';
                }

                $result[$key] = $this->collEsCitiessRelatedByIdCity1->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsProvinciass) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esProvinciass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_provinciass';
                        break;
                    default:
                        $key = 'EsProvinciass';
                }

                $result[$key] = $this->collEsProvinciass->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUserssRelatedByIdCity) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esUserss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_userss';
                        break;
                    default:
                        $key = 'EsUserss';
                }

                $result[$key] = $this->collEsUserssRelatedByIdCity->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\EsCities
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsCitiesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EsCities
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdCity($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setAbbreviation($value);
                break;
            case 4:
                $this->setIdCapital($value);
                break;
            case 5:
                $this->setIdRegion($value);
                break;
            case 6:
                $this->setLat($value);
                break;
            case 7:
                $this->setLng($value);
                break;
            case 8:
                $this->setArea($value);
                break;
            case 9:
                $this->setNroMunicipios($value);
                break;
            case 10:
                $this->setSurface($value);
                break;
            case 11:
                $this->setIdsFiles($value);
                break;
            case 12:
                $this->setIdCoverPicture($value);
                break;
            case 13:
                $this->setHeight($value);
                break;
            case 14:
                $this->setTipo($value);
                break;
            case 15:
                $this->setStatus($value);
                break;
            case 16:
                $this->setChangeCount($value);
                break;
            case 17:
                $this->setIdUserModified($value);
                break;
            case 18:
                $this->setIdUserCreated($value);
                break;
            case 19:
                $this->setDateModified($value);
                break;
            case 20:
                $this->setDateCreated($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = EsCitiesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdCity($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDescription($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAbbreviation($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIdCapital($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setIdRegion($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setLat($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLng($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setArea($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setNroMunicipios($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSurface($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIdsFiles($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIdCoverPicture($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setHeight($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setTipo($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setStatus($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setChangeCount($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIdUserModified($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setIdUserCreated($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setDateModified($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDateCreated($arr[$keys[20]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\EsCities The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EsCitiesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_CITY)) {
            $criteria->add(EsCitiesTableMap::COL_ID_CITY, $this->id_city);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_NAME)) {
            $criteria->add(EsCitiesTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_DESCRIPTION)) {
            $criteria->add(EsCitiesTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ABBREVIATION)) {
            $criteria->add(EsCitiesTableMap::COL_ABBREVIATION, $this->abbreviation);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_CAPITAL)) {
            $criteria->add(EsCitiesTableMap::COL_ID_CAPITAL, $this->id_capital);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_REGION)) {
            $criteria->add(EsCitiesTableMap::COL_ID_REGION, $this->id_region);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_LAT)) {
            $criteria->add(EsCitiesTableMap::COL_LAT, $this->lat);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_LNG)) {
            $criteria->add(EsCitiesTableMap::COL_LNG, $this->lng);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_AREA)) {
            $criteria->add(EsCitiesTableMap::COL_AREA, $this->area);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_NRO_MUNICIPIOS)) {
            $criteria->add(EsCitiesTableMap::COL_NRO_MUNICIPIOS, $this->nro_municipios);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_SURFACE)) {
            $criteria->add(EsCitiesTableMap::COL_SURFACE, $this->surface);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_IDS_FILES)) {
            $criteria->add(EsCitiesTableMap::COL_IDS_FILES, $this->ids_files);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_COVER_PICTURE)) {
            $criteria->add(EsCitiesTableMap::COL_ID_COVER_PICTURE, $this->id_cover_picture);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_HEIGHT)) {
            $criteria->add(EsCitiesTableMap::COL_HEIGHT, $this->height);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_TIPO)) {
            $criteria->add(EsCitiesTableMap::COL_TIPO, $this->tipo);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_STATUS)) {
            $criteria->add(EsCitiesTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(EsCitiesTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(EsCitiesTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(EsCitiesTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(EsCitiesTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(EsCitiesTableMap::COL_DATE_CREATED)) {
            $criteria->add(EsCitiesTableMap::COL_DATE_CREATED, $this->date_created);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildEsCitiesQuery::create();
        $criteria->add(EsCitiesTableMap::COL_ID_CITY, $this->id_city);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdCity();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdCity();
    }

    /**
     * Generic method to set the primary key (id_city column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdCity($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdCity();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EsCities (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setAbbreviation($this->getAbbreviation());
        $copyObj->setIdCapital($this->getIdCapital());
        $copyObj->setIdRegion($this->getIdRegion());
        $copyObj->setLat($this->getLat());
        $copyObj->setLng($this->getLng());
        $copyObj->setArea($this->getArea());
        $copyObj->setNroMunicipios($this->getNroMunicipios());
        $copyObj->setSurface($this->getSurface());
        $copyObj->setIdsFiles($this->getIdsFiles());
        $copyObj->setIdCoverPicture($this->getIdCoverPicture());
        $copyObj->setHeight($this->getHeight());
        $copyObj->setTipo($this->getTipo());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setChangeCount($this->getChangeCount());
        $copyObj->setIdUserModified($this->getIdUserModified());
        $copyObj->setIdUserCreated($this->getIdUserCreated());
        $copyObj->setDateModified($this->getDateModified());
        $copyObj->setDateCreated($this->getDateCreated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getEsCitiessRelatedByIdCity0() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsCitiesRelatedByIdCity0($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsCitiessRelatedByIdCity1() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsCitiesRelatedByIdCity1($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsProvinciass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsProvincias($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUserssRelatedByIdCity() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRelatedByIdCity($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdCity(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \EsCities Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildEsUsers object.
     *
     * @param  ChildEsUsers $v
     * @return $this|\EsCities The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsUsersRelatedByIdUserCreated(ChildEsUsers $v = null)
    {
        if ($v === null) {
            $this->setIdUserCreated(NULL);
        } else {
            $this->setIdUserCreated($v->getIdUser());
        }

        $this->aEsUsersRelatedByIdUserCreated = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addEsCitiesRelatedByIdUserCreated($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsUsers The associated ChildEsUsers object.
     * @throws PropelException
     */
    public function getEsUsersRelatedByIdUserCreated(ConnectionInterface $con = null)
    {
        if ($this->aEsUsersRelatedByIdUserCreated === null && ($this->id_user_created != 0)) {
            $this->aEsUsersRelatedByIdUserCreated = ChildEsUsersQuery::create()->findPk($this->id_user_created, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsUsersRelatedByIdUserCreated->addEsCitiessRelatedByIdUserCreated($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildEsUsers object.
     *
     * @param  ChildEsUsers $v
     * @return $this|\EsCities The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsUsersRelatedByIdUserModified(ChildEsUsers $v = null)
    {
        if ($v === null) {
            $this->setIdUserModified(NULL);
        } else {
            $this->setIdUserModified($v->getIdUser());
        }

        $this->aEsUsersRelatedByIdUserModified = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addEsCitiesRelatedByIdUserModified($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsUsers The associated ChildEsUsers object.
     * @throws PropelException
     */
    public function getEsUsersRelatedByIdUserModified(ConnectionInterface $con = null)
    {
        if ($this->aEsUsersRelatedByIdUserModified === null && ($this->id_user_modified != 0)) {
            $this->aEsUsersRelatedByIdUserModified = ChildEsUsersQuery::create()->findPk($this->id_user_modified, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsUsersRelatedByIdUserModified->addEsCitiessRelatedByIdUserModified($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildEsCities object.
     *
     * @param  ChildEsCities $v
     * @return $this|\EsCities The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsCitiesRelatedByIdCapital(ChildEsCities $v = null)
    {
        if ($v === null) {
            $this->setIdCapital(NULL);
        } else {
            $this->setIdCapital($v->getIdCity());
        }

        $this->aEsCitiesRelatedByIdCapital = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsCities object, it will not be re-added.
        if ($v !== null) {
            $v->addEsCitiesRelatedByIdCity0($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsCities object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsCities The associated ChildEsCities object.
     * @throws PropelException
     */
    public function getEsCitiesRelatedByIdCapital(ConnectionInterface $con = null)
    {
        if ($this->aEsCitiesRelatedByIdCapital === null && ($this->id_capital != 0)) {
            $this->aEsCitiesRelatedByIdCapital = ChildEsCitiesQuery::create()->findPk($this->id_capital, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsCitiesRelatedByIdCapital->addEsCitiessRelatedByIdCity0($this);
             */
        }

        return $this->aEsCitiesRelatedByIdCapital;
    }

    /**
     * Declares an association between this object and a ChildEsCities object.
     *
     * @param  ChildEsCities $v
     * @return $this|\EsCities The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsCitiesRelatedByIdRegion(ChildEsCities $v = null)
    {
        if ($v === null) {
            $this->setIdRegion(NULL);
        } else {
            $this->setIdRegion($v->getIdCity());
        }

        $this->aEsCitiesRelatedByIdRegion = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsCities object, it will not be re-added.
        if ($v !== null) {
            $v->addEsCitiesRelatedByIdCity1($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsCities object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsCities The associated ChildEsCities object.
     * @throws PropelException
     */
    public function getEsCitiesRelatedByIdRegion(ConnectionInterface $con = null)
    {
        if ($this->aEsCitiesRelatedByIdRegion === null && ($this->id_region != 0)) {
            $this->aEsCitiesRelatedByIdRegion = ChildEsCitiesQuery::create()->findPk($this->id_region, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsCitiesRelatedByIdRegion->addEsCitiessRelatedByIdCity1($this);
             */
        }

        return $this->aEsCitiesRelatedByIdRegion;
    }

    /**
     * Declares an association between this object and a ChildEsFiles object.
     *
     * @param  ChildEsFiles $v
     * @return $this|\EsCities The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsFiles(ChildEsFiles $v = null)
    {
        if ($v === null) {
            $this->setIdCoverPicture(NULL);
        } else {
            $this->setIdCoverPicture($v->getIdFile());
        }

        $this->aEsFiles = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsFiles object, it will not be re-added.
        if ($v !== null) {
            $v->addEsCities($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildEsFiles object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildEsFiles The associated ChildEsFiles object.
     * @throws PropelException
     */
    public function getEsFiles(ConnectionInterface $con = null)
    {
        if ($this->aEsFiles === null && ($this->id_cover_picture != 0)) {
            $this->aEsFiles = ChildEsFilesQuery::create()->findPk($this->id_cover_picture, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsFiles->addEsCitiess($this);
             */
        }

        return $this->aEsFiles;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('EsCitiesRelatedByIdCity0' == $relationName) {
            $this->initEsCitiessRelatedByIdCity0();
            return;
        }
        if ('EsCitiesRelatedByIdCity1' == $relationName) {
            $this->initEsCitiessRelatedByIdCity1();
            return;
        }
        if ('EsProvincias' == $relationName) {
            $this->initEsProvinciass();
            return;
        }
        if ('EsUsersRelatedByIdCity' == $relationName) {
            $this->initEsUserssRelatedByIdCity();
            return;
        }
    }

    /**
     * Clears out the collEsCitiessRelatedByIdCity0 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsCitiessRelatedByIdCity0()
     */
    public function clearEsCitiessRelatedByIdCity0()
    {
        $this->collEsCitiessRelatedByIdCity0 = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsCitiessRelatedByIdCity0 collection loaded partially.
     */
    public function resetPartialEsCitiessRelatedByIdCity0($v = true)
    {
        $this->collEsCitiessRelatedByIdCity0Partial = $v;
    }

    /**
     * Initializes the collEsCitiessRelatedByIdCity0 collection.
     *
     * By default this just sets the collEsCitiessRelatedByIdCity0 collection to an empty array (like clearcollEsCitiessRelatedByIdCity0());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsCitiessRelatedByIdCity0($overrideExisting = true)
    {
        if (null !== $this->collEsCitiessRelatedByIdCity0 && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsCitiesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsCitiessRelatedByIdCity0 = new $collectionClassName;
        $this->collEsCitiessRelatedByIdCity0->setModel('\EsCities');
    }

    /**
     * Gets an array of ChildEsCities objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsCities is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     * @throws PropelException
     */
    public function getEsCitiessRelatedByIdCity0(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdCity0Partial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdCity0 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdCity0) {
                // return empty collection
                $this->initEsCitiessRelatedByIdCity0();
            } else {
                $collEsCitiessRelatedByIdCity0 = ChildEsCitiesQuery::create(null, $criteria)
                    ->filterByEsCitiesRelatedByIdCapital($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsCitiessRelatedByIdCity0Partial && count($collEsCitiessRelatedByIdCity0)) {
                        $this->initEsCitiessRelatedByIdCity0(false);

                        foreach ($collEsCitiessRelatedByIdCity0 as $obj) {
                            if (false == $this->collEsCitiessRelatedByIdCity0->contains($obj)) {
                                $this->collEsCitiessRelatedByIdCity0->append($obj);
                            }
                        }

                        $this->collEsCitiessRelatedByIdCity0Partial = true;
                    }

                    return $collEsCitiessRelatedByIdCity0;
                }

                if ($partial && $this->collEsCitiessRelatedByIdCity0) {
                    foreach ($this->collEsCitiessRelatedByIdCity0 as $obj) {
                        if ($obj->isNew()) {
                            $collEsCitiessRelatedByIdCity0[] = $obj;
                        }
                    }
                }

                $this->collEsCitiessRelatedByIdCity0 = $collEsCitiessRelatedByIdCity0;
                $this->collEsCitiessRelatedByIdCity0Partial = false;
            }
        }

        return $this->collEsCitiessRelatedByIdCity0;
    }

    /**
     * Sets a collection of ChildEsCities objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esCitiessRelatedByIdCity0 A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function setEsCitiessRelatedByIdCity0(Collection $esCitiessRelatedByIdCity0, ConnectionInterface $con = null)
    {
        /** @var ChildEsCities[] $esCitiessRelatedByIdCity0ToDelete */
        $esCitiessRelatedByIdCity0ToDelete = $this->getEsCitiessRelatedByIdCity0(new Criteria(), $con)->diff($esCitiessRelatedByIdCity0);


        $this->esCitiessRelatedByIdCity0ScheduledForDeletion = $esCitiessRelatedByIdCity0ToDelete;

        foreach ($esCitiessRelatedByIdCity0ToDelete as $esCitiesRelatedByIdCity0Removed) {
            $esCitiesRelatedByIdCity0Removed->setEsCitiesRelatedByIdCapital(null);
        }

        $this->collEsCitiessRelatedByIdCity0 = null;
        foreach ($esCitiessRelatedByIdCity0 as $esCitiesRelatedByIdCity0) {
            $this->addEsCitiesRelatedByIdCity0($esCitiesRelatedByIdCity0);
        }

        $this->collEsCitiessRelatedByIdCity0 = $esCitiessRelatedByIdCity0;
        $this->collEsCitiessRelatedByIdCity0Partial = false;

        return $this;
    }

    /**
     * Returns the number of related EsCities objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsCities objects.
     * @throws PropelException
     */
    public function countEsCitiessRelatedByIdCity0(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdCity0Partial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdCity0 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdCity0) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsCitiessRelatedByIdCity0());
            }

            $query = ChildEsCitiesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsCitiesRelatedByIdCapital($this)
                ->count($con);
        }

        return count($this->collEsCitiessRelatedByIdCity0);
    }

    /**
     * Method called to associate a ChildEsCities object to this object
     * through the ChildEsCities foreign key attribute.
     *
     * @param  ChildEsCities $l ChildEsCities
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function addEsCitiesRelatedByIdCity0(ChildEsCities $l)
    {
        if ($this->collEsCitiessRelatedByIdCity0 === null) {
            $this->initEsCitiessRelatedByIdCity0();
            $this->collEsCitiessRelatedByIdCity0Partial = true;
        }

        if (!$this->collEsCitiessRelatedByIdCity0->contains($l)) {
            $this->doAddEsCitiesRelatedByIdCity0($l);

            if ($this->esCitiessRelatedByIdCity0ScheduledForDeletion and $this->esCitiessRelatedByIdCity0ScheduledForDeletion->contains($l)) {
                $this->esCitiessRelatedByIdCity0ScheduledForDeletion->remove($this->esCitiessRelatedByIdCity0ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsCities $esCitiesRelatedByIdCity0 The ChildEsCities object to add.
     */
    protected function doAddEsCitiesRelatedByIdCity0(ChildEsCities $esCitiesRelatedByIdCity0)
    {
        $this->collEsCitiessRelatedByIdCity0[]= $esCitiesRelatedByIdCity0;
        $esCitiesRelatedByIdCity0->setEsCitiesRelatedByIdCapital($this);
    }

    /**
     * @param  ChildEsCities $esCitiesRelatedByIdCity0 The ChildEsCities object to remove.
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function removeEsCitiesRelatedByIdCity0(ChildEsCities $esCitiesRelatedByIdCity0)
    {
        if ($this->getEsCitiessRelatedByIdCity0()->contains($esCitiesRelatedByIdCity0)) {
            $pos = $this->collEsCitiessRelatedByIdCity0->search($esCitiesRelatedByIdCity0);
            $this->collEsCitiessRelatedByIdCity0->remove($pos);
            if (null === $this->esCitiessRelatedByIdCity0ScheduledForDeletion) {
                $this->esCitiessRelatedByIdCity0ScheduledForDeletion = clone $this->collEsCitiessRelatedByIdCity0;
                $this->esCitiessRelatedByIdCity0ScheduledForDeletion->clear();
            }
            $this->esCitiessRelatedByIdCity0ScheduledForDeletion[]= $esCitiesRelatedByIdCity0;
            $esCitiesRelatedByIdCity0->setEsCitiesRelatedByIdCapital(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdCity0 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdCity0JoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsCitiessRelatedByIdCity0($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdCity0 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdCity0JoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsCitiessRelatedByIdCity0($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdCity0 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdCity0JoinEsFiles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsFiles', $joinBehavior);

        return $this->getEsCitiessRelatedByIdCity0($query, $con);
    }

    /**
     * Clears out the collEsCitiessRelatedByIdCity1 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsCitiessRelatedByIdCity1()
     */
    public function clearEsCitiessRelatedByIdCity1()
    {
        $this->collEsCitiessRelatedByIdCity1 = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsCitiessRelatedByIdCity1 collection loaded partially.
     */
    public function resetPartialEsCitiessRelatedByIdCity1($v = true)
    {
        $this->collEsCitiessRelatedByIdCity1Partial = $v;
    }

    /**
     * Initializes the collEsCitiessRelatedByIdCity1 collection.
     *
     * By default this just sets the collEsCitiessRelatedByIdCity1 collection to an empty array (like clearcollEsCitiessRelatedByIdCity1());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsCitiessRelatedByIdCity1($overrideExisting = true)
    {
        if (null !== $this->collEsCitiessRelatedByIdCity1 && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsCitiesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsCitiessRelatedByIdCity1 = new $collectionClassName;
        $this->collEsCitiessRelatedByIdCity1->setModel('\EsCities');
    }

    /**
     * Gets an array of ChildEsCities objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsCities is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     * @throws PropelException
     */
    public function getEsCitiessRelatedByIdCity1(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdCity1Partial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdCity1 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdCity1) {
                // return empty collection
                $this->initEsCitiessRelatedByIdCity1();
            } else {
                $collEsCitiessRelatedByIdCity1 = ChildEsCitiesQuery::create(null, $criteria)
                    ->filterByEsCitiesRelatedByIdRegion($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsCitiessRelatedByIdCity1Partial && count($collEsCitiessRelatedByIdCity1)) {
                        $this->initEsCitiessRelatedByIdCity1(false);

                        foreach ($collEsCitiessRelatedByIdCity1 as $obj) {
                            if (false == $this->collEsCitiessRelatedByIdCity1->contains($obj)) {
                                $this->collEsCitiessRelatedByIdCity1->append($obj);
                            }
                        }

                        $this->collEsCitiessRelatedByIdCity1Partial = true;
                    }

                    return $collEsCitiessRelatedByIdCity1;
                }

                if ($partial && $this->collEsCitiessRelatedByIdCity1) {
                    foreach ($this->collEsCitiessRelatedByIdCity1 as $obj) {
                        if ($obj->isNew()) {
                            $collEsCitiessRelatedByIdCity1[] = $obj;
                        }
                    }
                }

                $this->collEsCitiessRelatedByIdCity1 = $collEsCitiessRelatedByIdCity1;
                $this->collEsCitiessRelatedByIdCity1Partial = false;
            }
        }

        return $this->collEsCitiessRelatedByIdCity1;
    }

    /**
     * Sets a collection of ChildEsCities objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esCitiessRelatedByIdCity1 A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function setEsCitiessRelatedByIdCity1(Collection $esCitiessRelatedByIdCity1, ConnectionInterface $con = null)
    {
        /** @var ChildEsCities[] $esCitiessRelatedByIdCity1ToDelete */
        $esCitiessRelatedByIdCity1ToDelete = $this->getEsCitiessRelatedByIdCity1(new Criteria(), $con)->diff($esCitiessRelatedByIdCity1);


        $this->esCitiessRelatedByIdCity1ScheduledForDeletion = $esCitiessRelatedByIdCity1ToDelete;

        foreach ($esCitiessRelatedByIdCity1ToDelete as $esCitiesRelatedByIdCity1Removed) {
            $esCitiesRelatedByIdCity1Removed->setEsCitiesRelatedByIdRegion(null);
        }

        $this->collEsCitiessRelatedByIdCity1 = null;
        foreach ($esCitiessRelatedByIdCity1 as $esCitiesRelatedByIdCity1) {
            $this->addEsCitiesRelatedByIdCity1($esCitiesRelatedByIdCity1);
        }

        $this->collEsCitiessRelatedByIdCity1 = $esCitiessRelatedByIdCity1;
        $this->collEsCitiessRelatedByIdCity1Partial = false;

        return $this;
    }

    /**
     * Returns the number of related EsCities objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsCities objects.
     * @throws PropelException
     */
    public function countEsCitiessRelatedByIdCity1(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessRelatedByIdCity1Partial && !$this->isNew();
        if (null === $this->collEsCitiessRelatedByIdCity1 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsCitiessRelatedByIdCity1) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsCitiessRelatedByIdCity1());
            }

            $query = ChildEsCitiesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsCitiesRelatedByIdRegion($this)
                ->count($con);
        }

        return count($this->collEsCitiessRelatedByIdCity1);
    }

    /**
     * Method called to associate a ChildEsCities object to this object
     * through the ChildEsCities foreign key attribute.
     *
     * @param  ChildEsCities $l ChildEsCities
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function addEsCitiesRelatedByIdCity1(ChildEsCities $l)
    {
        if ($this->collEsCitiessRelatedByIdCity1 === null) {
            $this->initEsCitiessRelatedByIdCity1();
            $this->collEsCitiessRelatedByIdCity1Partial = true;
        }

        if (!$this->collEsCitiessRelatedByIdCity1->contains($l)) {
            $this->doAddEsCitiesRelatedByIdCity1($l);

            if ($this->esCitiessRelatedByIdCity1ScheduledForDeletion and $this->esCitiessRelatedByIdCity1ScheduledForDeletion->contains($l)) {
                $this->esCitiessRelatedByIdCity1ScheduledForDeletion->remove($this->esCitiessRelatedByIdCity1ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsCities $esCitiesRelatedByIdCity1 The ChildEsCities object to add.
     */
    protected function doAddEsCitiesRelatedByIdCity1(ChildEsCities $esCitiesRelatedByIdCity1)
    {
        $this->collEsCitiessRelatedByIdCity1[]= $esCitiesRelatedByIdCity1;
        $esCitiesRelatedByIdCity1->setEsCitiesRelatedByIdRegion($this);
    }

    /**
     * @param  ChildEsCities $esCitiesRelatedByIdCity1 The ChildEsCities object to remove.
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function removeEsCitiesRelatedByIdCity1(ChildEsCities $esCitiesRelatedByIdCity1)
    {
        if ($this->getEsCitiessRelatedByIdCity1()->contains($esCitiesRelatedByIdCity1)) {
            $pos = $this->collEsCitiessRelatedByIdCity1->search($esCitiesRelatedByIdCity1);
            $this->collEsCitiessRelatedByIdCity1->remove($pos);
            if (null === $this->esCitiessRelatedByIdCity1ScheduledForDeletion) {
                $this->esCitiessRelatedByIdCity1ScheduledForDeletion = clone $this->collEsCitiessRelatedByIdCity1;
                $this->esCitiessRelatedByIdCity1ScheduledForDeletion->clear();
            }
            $this->esCitiessRelatedByIdCity1ScheduledForDeletion[]= $esCitiesRelatedByIdCity1;
            $esCitiesRelatedByIdCity1->setEsCitiesRelatedByIdRegion(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdCity1 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdCity1JoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsCitiessRelatedByIdCity1($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdCity1 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdCity1JoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsCitiessRelatedByIdCity1($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsCitiessRelatedByIdCity1 from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessRelatedByIdCity1JoinEsFiles(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsFiles', $joinBehavior);

        return $this->getEsCitiessRelatedByIdCity1($query, $con);
    }

    /**
     * Clears out the collEsProvinciass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsProvinciass()
     */
    public function clearEsProvinciass()
    {
        $this->collEsProvinciass = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsProvinciass collection loaded partially.
     */
    public function resetPartialEsProvinciass($v = true)
    {
        $this->collEsProvinciassPartial = $v;
    }

    /**
     * Initializes the collEsProvinciass collection.
     *
     * By default this just sets the collEsProvinciass collection to an empty array (like clearcollEsProvinciass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsProvinciass($overrideExisting = true)
    {
        if (null !== $this->collEsProvinciass && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsProvinciasTableMap::getTableMap()->getCollectionClassName();

        $this->collEsProvinciass = new $collectionClassName;
        $this->collEsProvinciass->setModel('\EsProvincias');
    }

    /**
     * Gets an array of ChildEsProvincias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsCities is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     * @throws PropelException
     */
    public function getEsProvinciass(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassPartial && !$this->isNew();
        if (null === $this->collEsProvinciass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciass) {
                // return empty collection
                $this->initEsProvinciass();
            } else {
                $collEsProvinciass = ChildEsProvinciasQuery::create(null, $criteria)
                    ->filterByEsCities($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsProvinciassPartial && count($collEsProvinciass)) {
                        $this->initEsProvinciass(false);

                        foreach ($collEsProvinciass as $obj) {
                            if (false == $this->collEsProvinciass->contains($obj)) {
                                $this->collEsProvinciass->append($obj);
                            }
                        }

                        $this->collEsProvinciassPartial = true;
                    }

                    return $collEsProvinciass;
                }

                if ($partial && $this->collEsProvinciass) {
                    foreach ($this->collEsProvinciass as $obj) {
                        if ($obj->isNew()) {
                            $collEsProvinciass[] = $obj;
                        }
                    }
                }

                $this->collEsProvinciass = $collEsProvinciass;
                $this->collEsProvinciassPartial = false;
            }
        }

        return $this->collEsProvinciass;
    }

    /**
     * Sets a collection of ChildEsProvincias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esProvinciass A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function setEsProvinciass(Collection $esProvinciass, ConnectionInterface $con = null)
    {
        /** @var ChildEsProvincias[] $esProvinciassToDelete */
        $esProvinciassToDelete = $this->getEsProvinciass(new Criteria(), $con)->diff($esProvinciass);


        $this->esProvinciassScheduledForDeletion = $esProvinciassToDelete;

        foreach ($esProvinciassToDelete as $esProvinciasRemoved) {
            $esProvinciasRemoved->setEsCities(null);
        }

        $this->collEsProvinciass = null;
        foreach ($esProvinciass as $esProvincias) {
            $this->addEsProvincias($esProvincias);
        }

        $this->collEsProvinciass = $esProvinciass;
        $this->collEsProvinciassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsProvincias objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsProvincias objects.
     * @throws PropelException
     */
    public function countEsProvinciass(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsProvinciassPartial && !$this->isNew();
        if (null === $this->collEsProvinciass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsProvinciass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsProvinciass());
            }

            $query = ChildEsProvinciasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsCities($this)
                ->count($con);
        }

        return count($this->collEsProvinciass);
    }

    /**
     * Method called to associate a ChildEsProvincias object to this object
     * through the ChildEsProvincias foreign key attribute.
     *
     * @param  ChildEsProvincias $l ChildEsProvincias
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function addEsProvincias(ChildEsProvincias $l)
    {
        if ($this->collEsProvinciass === null) {
            $this->initEsProvinciass();
            $this->collEsProvinciassPartial = true;
        }

        if (!$this->collEsProvinciass->contains($l)) {
            $this->doAddEsProvincias($l);

            if ($this->esProvinciassScheduledForDeletion and $this->esProvinciassScheduledForDeletion->contains($l)) {
                $this->esProvinciassScheduledForDeletion->remove($this->esProvinciassScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsProvincias $esProvincias The ChildEsProvincias object to add.
     */
    protected function doAddEsProvincias(ChildEsProvincias $esProvincias)
    {
        $this->collEsProvinciass[]= $esProvincias;
        $esProvincias->setEsCities($this);
    }

    /**
     * @param  ChildEsProvincias $esProvincias The ChildEsProvincias object to remove.
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function removeEsProvincias(ChildEsProvincias $esProvincias)
    {
        if ($this->getEsProvinciass()->contains($esProvincias)) {
            $pos = $this->collEsProvinciass->search($esProvincias);
            $this->collEsProvinciass->remove($pos);
            if (null === $this->esProvinciassScheduledForDeletion) {
                $this->esProvinciassScheduledForDeletion = clone $this->collEsProvinciass;
                $this->esProvinciassScheduledForDeletion->clear();
            }
            $this->esProvinciassScheduledForDeletion[]= $esProvincias;
            $esProvincias->setEsCities(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsProvinciass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsProvinciass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsProvinciass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsProvinciass($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsProvinciass from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsProvincias[] List of ChildEsProvincias objects
     */
    public function getEsProvinciassJoinEsProvinciasRelatedByIdMunicipio(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsProvinciasQuery::create(null, $criteria);
        $query->joinWith('EsProvinciasRelatedByIdMunicipio', $joinBehavior);

        return $this->getEsProvinciass($query, $con);
    }

    /**
     * Clears out the collEsUserssRelatedByIdCity collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUserssRelatedByIdCity()
     */
    public function clearEsUserssRelatedByIdCity()
    {
        $this->collEsUserssRelatedByIdCity = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUserssRelatedByIdCity collection loaded partially.
     */
    public function resetPartialEsUserssRelatedByIdCity($v = true)
    {
        $this->collEsUserssRelatedByIdCityPartial = $v;
    }

    /**
     * Initializes the collEsUserssRelatedByIdCity collection.
     *
     * By default this just sets the collEsUserssRelatedByIdCity collection to an empty array (like clearcollEsUserssRelatedByIdCity());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUserssRelatedByIdCity($overrideExisting = true)
    {
        if (null !== $this->collEsUserssRelatedByIdCity && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUserssRelatedByIdCity = new $collectionClassName;
        $this->collEsUserssRelatedByIdCity->setModel('\EsUsers');
    }

    /**
     * Gets an array of ChildEsUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsCities is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     * @throws PropelException
     */
    public function getEsUserssRelatedByIdCity(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdCityPartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdCity || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdCity) {
                // return empty collection
                $this->initEsUserssRelatedByIdCity();
            } else {
                $collEsUserssRelatedByIdCity = ChildEsUsersQuery::create(null, $criteria)
                    ->filterByEsCitiesRelatedByIdCity($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUserssRelatedByIdCityPartial && count($collEsUserssRelatedByIdCity)) {
                        $this->initEsUserssRelatedByIdCity(false);

                        foreach ($collEsUserssRelatedByIdCity as $obj) {
                            if (false == $this->collEsUserssRelatedByIdCity->contains($obj)) {
                                $this->collEsUserssRelatedByIdCity->append($obj);
                            }
                        }

                        $this->collEsUserssRelatedByIdCityPartial = true;
                    }

                    return $collEsUserssRelatedByIdCity;
                }

                if ($partial && $this->collEsUserssRelatedByIdCity) {
                    foreach ($this->collEsUserssRelatedByIdCity as $obj) {
                        if ($obj->isNew()) {
                            $collEsUserssRelatedByIdCity[] = $obj;
                        }
                    }
                }

                $this->collEsUserssRelatedByIdCity = $collEsUserssRelatedByIdCity;
                $this->collEsUserssRelatedByIdCityPartial = false;
            }
        }

        return $this->collEsUserssRelatedByIdCity;
    }

    /**
     * Sets a collection of ChildEsUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUserssRelatedByIdCity A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function setEsUserssRelatedByIdCity(Collection $esUserssRelatedByIdCity, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsers[] $esUserssRelatedByIdCityToDelete */
        $esUserssRelatedByIdCityToDelete = $this->getEsUserssRelatedByIdCity(new Criteria(), $con)->diff($esUserssRelatedByIdCity);


        $this->esUserssRelatedByIdCityScheduledForDeletion = $esUserssRelatedByIdCityToDelete;

        foreach ($esUserssRelatedByIdCityToDelete as $esUsersRelatedByIdCityRemoved) {
            $esUsersRelatedByIdCityRemoved->setEsCitiesRelatedByIdCity(null);
        }

        $this->collEsUserssRelatedByIdCity = null;
        foreach ($esUserssRelatedByIdCity as $esUsersRelatedByIdCity) {
            $this->addEsUsersRelatedByIdCity($esUsersRelatedByIdCity);
        }

        $this->collEsUserssRelatedByIdCity = $esUserssRelatedByIdCity;
        $this->collEsUserssRelatedByIdCityPartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsUsers objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsUsers objects.
     * @throws PropelException
     */
    public function countEsUserssRelatedByIdCity(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdCityPartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdCity || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdCity) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUserssRelatedByIdCity());
            }

            $query = ChildEsUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsCitiesRelatedByIdCity($this)
                ->count($con);
        }

        return count($this->collEsUserssRelatedByIdCity);
    }

    /**
     * Method called to associate a ChildEsUsers object to this object
     * through the ChildEsUsers foreign key attribute.
     *
     * @param  ChildEsUsers $l ChildEsUsers
     * @return $this|\EsCities The current object (for fluent API support)
     */
    public function addEsUsersRelatedByIdCity(ChildEsUsers $l)
    {
        if ($this->collEsUserssRelatedByIdCity === null) {
            $this->initEsUserssRelatedByIdCity();
            $this->collEsUserssRelatedByIdCityPartial = true;
        }

        if (!$this->collEsUserssRelatedByIdCity->contains($l)) {
            $this->doAddEsUsersRelatedByIdCity($l);

            if ($this->esUserssRelatedByIdCityScheduledForDeletion and $this->esUserssRelatedByIdCityScheduledForDeletion->contains($l)) {
                $this->esUserssRelatedByIdCityScheduledForDeletion->remove($this->esUserssRelatedByIdCityScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsers $esUsersRelatedByIdCity The ChildEsUsers object to add.
     */
    protected function doAddEsUsersRelatedByIdCity(ChildEsUsers $esUsersRelatedByIdCity)
    {
        $this->collEsUserssRelatedByIdCity[]= $esUsersRelatedByIdCity;
        $esUsersRelatedByIdCity->setEsCitiesRelatedByIdCity($this);
    }

    /**
     * @param  ChildEsUsers $esUsersRelatedByIdCity The ChildEsUsers object to remove.
     * @return $this|ChildEsCities The current object (for fluent API support)
     */
    public function removeEsUsersRelatedByIdCity(ChildEsUsers $esUsersRelatedByIdCity)
    {
        if ($this->getEsUserssRelatedByIdCity()->contains($esUsersRelatedByIdCity)) {
            $pos = $this->collEsUserssRelatedByIdCity->search($esUsersRelatedByIdCity);
            $this->collEsUserssRelatedByIdCity->remove($pos);
            if (null === $this->esUserssRelatedByIdCityScheduledForDeletion) {
                $this->esUserssRelatedByIdCityScheduledForDeletion = clone $this->collEsUserssRelatedByIdCity;
                $this->esUserssRelatedByIdCityScheduledForDeletion->clear();
            }
            $this->esUserssRelatedByIdCityScheduledForDeletion[]= $esUsersRelatedByIdCity;
            $esUsersRelatedByIdCity->setEsCitiesRelatedByIdCity(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsUserssRelatedByIdCity from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdCityJoinEsRolesRelatedByIdRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsRolesRelatedByIdRole', $joinBehavior);

        return $this->getEsUserssRelatedByIdCity($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsUserssRelatedByIdCity from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdCityJoinEsProvinciasRelatedByIdProvincia(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsProvinciasRelatedByIdProvincia', $joinBehavior);

        return $this->getEsUserssRelatedByIdCity($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsCities is new, it will return
     * an empty collection; or if this EsCities has previously
     * been saved, it will retrieve related EsUserssRelatedByIdCity from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsCities.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdCityJoinEsFilesRelatedByIdCoverPicture(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsFilesRelatedByIdCoverPicture', $joinBehavior);

        return $this->getEsUserssRelatedByIdCity($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEsUsersRelatedByIdUserCreated) {
            $this->aEsUsersRelatedByIdUserCreated->removeEsCitiesRelatedByIdUserCreated($this);
        }
        if (null !== $this->aEsUsersRelatedByIdUserModified) {
            $this->aEsUsersRelatedByIdUserModified->removeEsCitiesRelatedByIdUserModified($this);
        }
        if (null !== $this->aEsCitiesRelatedByIdCapital) {
            $this->aEsCitiesRelatedByIdCapital->removeEsCitiesRelatedByIdCity0($this);
        }
        if (null !== $this->aEsCitiesRelatedByIdRegion) {
            $this->aEsCitiesRelatedByIdRegion->removeEsCitiesRelatedByIdCity1($this);
        }
        if (null !== $this->aEsFiles) {
            $this->aEsFiles->removeEsCities($this);
        }
        $this->id_city = null;
        $this->name = null;
        $this->description = null;
        $this->abbreviation = null;
        $this->id_capital = null;
        $this->id_region = null;
        $this->lat = null;
        $this->lng = null;
        $this->area = null;
        $this->nro_municipios = null;
        $this->surface = null;
        $this->ids_files = null;
        $this->id_cover_picture = null;
        $this->height = null;
        $this->tipo = null;
        $this->status = null;
        $this->change_count = null;
        $this->id_user_modified = null;
        $this->id_user_created = null;
        $this->date_modified = null;
        $this->date_created = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collEsCitiessRelatedByIdCity0) {
                foreach ($this->collEsCitiessRelatedByIdCity0 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsCitiessRelatedByIdCity1) {
                foreach ($this->collEsCitiessRelatedByIdCity1 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsProvinciass) {
                foreach ($this->collEsProvinciass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUserssRelatedByIdCity) {
                foreach ($this->collEsUserssRelatedByIdCity as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEsCitiessRelatedByIdCity0 = null;
        $this->collEsCitiessRelatedByIdCity1 = null;
        $this->collEsProvinciass = null;
        $this->collEsUserssRelatedByIdCity = null;
        $this->aEsUsersRelatedByIdUserCreated = null;
        $this->aEsUsersRelatedByIdUserModified = null;
        $this->aEsCitiesRelatedByIdCapital = null;
        $this->aEsCitiesRelatedByIdRegion = null;
        $this->aEsFiles = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EsCitiesTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
