<?php

namespace Base;

use \EsCities as ChildEsCities;
use \EsCitiesQuery as ChildEsCitiesQuery;
use \EsFiles as ChildEsFiles;
use \EsFilesQuery as ChildEsFilesQuery;
use \EsUsers as ChildEsUsers;
use \EsUsersQuery as ChildEsUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\EsCitiesTableMap;
use Map\EsFilesTableMap;
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
 * Base class that represents a row from the 'es_files' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class EsFiles implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\EsFilesTableMap';


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
     * The value for the id_file field.
     *
     * @var        int
     */
    protected $id_file;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the url field.
     *
     * @var        string
     */
    protected $url;

    /**
     * The value for the ext field.
     *
     * @var        string
     */
    protected $ext;

    /**
     * The value for the raw_name field.
     *
     * @var        string
     */
    protected $raw_name;

    /**
     * The value for the full_path field.
     *
     * @var        string
     */
    protected $full_path;

    /**
     * The value for the path field.
     *
     * @var        string
     */
    protected $path;

    /**
     * The value for the width field.
     *
     * @var        int
     */
    protected $width;

    /**
     * The value for the height field.
     *
     * @var        int
     */
    protected $height;

    /**
     * The value for the size field.
     *
     * @var        string
     */
    protected $size;

    /**
     * The value for the library field.
     *
     * @var        string
     */
    protected $library;

    /**
     * The value for the nro_thumbs field.
     *
     * @var        int
     */
    protected $nro_thumbs;

    /**
     * The value for the id_parent field.
     *
     * @var        int
     */
    protected $id_parent;

    /**
     * The value for the thumb_marker field.
     *
     * @var        string
     */
    protected $thumb_marker;

    /**
     * The value for the type field.
     *
     * @var        string
     */
    protected $type;

    /**
     * The value for the x field.
     *
     * @var        string
     */
    protected $x;

    /**
     * The value for the y field.
     *
     * @var        string
     */
    protected $y;

    /**
     * The value for the fix_width field.
     *
     * @var        string
     */
    protected $fix_width;

    /**
     * The value for the fix_height field.
     *
     * @var        string
     */
    protected $fix_height;

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
     * @var        ChildEsFiles
     */
    protected $aEsFilesRelatedByIdParent;

    /**
     * @var        ObjectCollection|ChildEsCities[] Collection to store aggregation of ChildEsCities objects.
     */
    protected $collEsCitiess;
    protected $collEsCitiessPartial;

    /**
     * @var        ObjectCollection|ChildEsFiles[] Collection to store aggregation of ChildEsFiles objects.
     */
    protected $collEsFilessRelatedByIdFile;
    protected $collEsFilessRelatedByIdFilePartial;

    /**
     * @var        ObjectCollection|ChildEsUsers[] Collection to store aggregation of ChildEsUsers objects.
     */
    protected $collEsUserssRelatedByIdCoverPicture;
    protected $collEsUserssRelatedByIdCoverPicturePartial;

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
    protected $esCitiessScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsFiles[]
     */
    protected $esFilessRelatedByIdFileScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildEsUsers[]
     */
    protected $esUserssRelatedByIdCoverPictureScheduledForDeletion = null;

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
     * Initializes internal state of Base\EsFiles object.
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
     * Compares this with another <code>EsFiles</code> instance.  If
     * <code>obj</code> is an instance of <code>EsFiles</code>, delegates to
     * <code>equals(EsFiles)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|EsFiles The current object, for fluid interface
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
     * Get the [id_file] column value.
     *
     * @return int
     */
    public function getIdFile()
    {
        return $this->id_file;
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
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the [ext] column value.
     *
     * @return string
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * Get the [raw_name] column value.
     *
     * @return string
     */
    public function getRawName()
    {
        return $this->raw_name;
    }

    /**
     * Get the [full_path] column value.
     *
     * @return string
     */
    public function getFullPath()
    {
        return $this->full_path;
    }

    /**
     * Get the [path] column value.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the [width] column value.
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Get the [height] column value.
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get the [size] column value.
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get the [library] column value.
     *
     * @return string
     */
    public function getLibrary()
    {
        return $this->library;
    }

    /**
     * Get the [nro_thumbs] column value.
     *
     * @return int
     */
    public function getNroThumbs()
    {
        return $this->nro_thumbs;
    }

    /**
     * Get the [id_parent] column value.
     *
     * @return int
     */
    public function getIdParent()
    {
        return $this->id_parent;
    }

    /**
     * Get the [thumb_marker] column value.
     *
     * @return string
     */
    public function getThumbMarker()
    {
        return $this->thumb_marker;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [x] column value.
     *
     * @return string
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Get the [y] column value.
     *
     * @return string
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Get the [fix_width] column value.
     *
     * @return string
     */
    public function getFixWidth()
    {
        return $this->fix_width;
    }

    /**
     * Get the [fix_height] column value.
     *
     * @return string
     */
    public function getFixHeight()
    {
        return $this->fix_height;
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
     * Set the value of [id_file] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setIdFile($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_file !== $v) {
            $this->id_file = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_ID_FILE] = true;
        }

        return $this;
    } // setIdFile()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [url] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_URL] = true;
        }

        return $this;
    } // setUrl()

    /**
     * Set the value of [ext] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setExt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ext !== $v) {
            $this->ext = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_EXT] = true;
        }

        return $this;
    } // setExt()

    /**
     * Set the value of [raw_name] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setRawName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->raw_name !== $v) {
            $this->raw_name = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_RAW_NAME] = true;
        }

        return $this;
    } // setRawName()

    /**
     * Set the value of [full_path] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setFullPath($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->full_path !== $v) {
            $this->full_path = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_FULL_PATH] = true;
        }

        return $this;
    } // setFullPath()

    /**
     * Set the value of [path] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setPath($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->path !== $v) {
            $this->path = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_PATH] = true;
        }

        return $this;
    } // setPath()

    /**
     * Set the value of [width] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setWidth($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->width !== $v) {
            $this->width = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_WIDTH] = true;
        }

        return $this;
    } // setWidth()

    /**
     * Set the value of [height] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setHeight($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->height !== $v) {
            $this->height = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_HEIGHT] = true;
        }

        return $this;
    } // setHeight()

    /**
     * Set the value of [size] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setSize($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->size !== $v) {
            $this->size = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_SIZE] = true;
        }

        return $this;
    } // setSize()

    /**
     * Set the value of [library] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setLibrary($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->library !== $v) {
            $this->library = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_LIBRARY] = true;
        }

        return $this;
    } // setLibrary()

    /**
     * Set the value of [nro_thumbs] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setNroThumbs($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->nro_thumbs !== $v) {
            $this->nro_thumbs = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_NRO_THUMBS] = true;
        }

        return $this;
    } // setNroThumbs()

    /**
     * Set the value of [id_parent] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setIdParent($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_parent !== $v) {
            $this->id_parent = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_ID_PARENT] = true;
        }

        if ($this->aEsFilesRelatedByIdParent !== null && $this->aEsFilesRelatedByIdParent->getIdFile() !== $v) {
            $this->aEsFilesRelatedByIdParent = null;
        }

        return $this;
    } // setIdParent()

    /**
     * Set the value of [thumb_marker] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setThumbMarker($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->thumb_marker !== $v) {
            $this->thumb_marker = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_THUMB_MARKER] = true;
        }

        return $this;
    } // setThumbMarker()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [x] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setX($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->x !== $v) {
            $this->x = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_X] = true;
        }

        return $this;
    } // setX()

    /**
     * Set the value of [y] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setY($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->y !== $v) {
            $this->y = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_Y] = true;
        }

        return $this;
    } // setY()

    /**
     * Set the value of [fix_width] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setFixWidth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fix_width !== $v) {
            $this->fix_width = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_FIX_WIDTH] = true;
        }

        return $this;
    } // setFixWidth()

    /**
     * Set the value of [fix_height] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setFixHeight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fix_height !== $v) {
            $this->fix_height = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_FIX_HEIGHT] = true;
        }

        return $this;
    } // setFixHeight()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [change_count] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setChangeCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->change_count !== $v) {
            $this->change_count = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_CHANGE_COUNT] = true;
        }

        return $this;
    } // setChangeCount()

    /**
     * Set the value of [id_user_modified] column.
     *
     * @param int $v new value
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setIdUserModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_modified !== $v) {
            $this->id_user_modified = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_ID_USER_MODIFIED] = true;
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
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setIdUserCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_user_created !== $v) {
            $this->id_user_created = $v;
            $this->modifiedColumns[EsFilesTableMap::COL_ID_USER_CREATED] = true;
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
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setDateModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_modified !== null || $dt !== null) {
            if ($this->date_modified === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_modified->format("Y-m-d H:i:s.u")) {
                $this->date_modified = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsFilesTableMap::COL_DATE_MODIFIED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateModified()

    /**
     * Sets the value of [date_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function setDateCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_created !== null || $dt !== null) {
            if ($this->date_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_created->format("Y-m-d H:i:s.u")) {
                $this->date_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[EsFilesTableMap::COL_DATE_CREATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EsFilesTableMap::translateFieldName('IdFile', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_file = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EsFilesTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EsFilesTableMap::translateFieldName('Url', TableMap::TYPE_PHPNAME, $indexType)];
            $this->url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EsFilesTableMap::translateFieldName('Ext', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ext = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EsFilesTableMap::translateFieldName('RawName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->raw_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EsFilesTableMap::translateFieldName('FullPath', TableMap::TYPE_PHPNAME, $indexType)];
            $this->full_path = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EsFilesTableMap::translateFieldName('Path', TableMap::TYPE_PHPNAME, $indexType)];
            $this->path = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EsFilesTableMap::translateFieldName('Width', TableMap::TYPE_PHPNAME, $indexType)];
            $this->width = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EsFilesTableMap::translateFieldName('Height', TableMap::TYPE_PHPNAME, $indexType)];
            $this->height = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EsFilesTableMap::translateFieldName('Size', TableMap::TYPE_PHPNAME, $indexType)];
            $this->size = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : EsFilesTableMap::translateFieldName('Library', TableMap::TYPE_PHPNAME, $indexType)];
            $this->library = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : EsFilesTableMap::translateFieldName('NroThumbs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nro_thumbs = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : EsFilesTableMap::translateFieldName('IdParent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_parent = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : EsFilesTableMap::translateFieldName('ThumbMarker', TableMap::TYPE_PHPNAME, $indexType)];
            $this->thumb_marker = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : EsFilesTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : EsFilesTableMap::translateFieldName('X', TableMap::TYPE_PHPNAME, $indexType)];
            $this->x = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : EsFilesTableMap::translateFieldName('Y', TableMap::TYPE_PHPNAME, $indexType)];
            $this->y = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : EsFilesTableMap::translateFieldName('FixWidth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fix_width = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : EsFilesTableMap::translateFieldName('FixHeight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fix_height = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : EsFilesTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : EsFilesTableMap::translateFieldName('ChangeCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : EsFilesTableMap::translateFieldName('IdUserModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_modified = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : EsFilesTableMap::translateFieldName('IdUserCreated', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_user_created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : EsFilesTableMap::translateFieldName('DateModified', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_modified = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : EsFilesTableMap::translateFieldName('DateCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 25; // 25 = EsFilesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\EsFiles'), 0, $e);
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
        if ($this->aEsFilesRelatedByIdParent !== null && $this->id_parent !== $this->aEsFilesRelatedByIdParent->getIdFile()) {
            $this->aEsFilesRelatedByIdParent = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(EsFilesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEsFilesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEsUsersRelatedByIdUserCreated = null;
            $this->aEsUsersRelatedByIdUserModified = null;
            $this->aEsFilesRelatedByIdParent = null;
            $this->collEsCitiess = null;

            $this->collEsFilessRelatedByIdFile = null;

            $this->collEsUserssRelatedByIdCoverPicture = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see EsFiles::setDeleted()
     * @see EsFiles::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EsFilesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEsFilesQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(EsFilesTableMap::DATABASE_NAME);
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
                EsFilesTableMap::addInstanceToPool($this);
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

            if ($this->aEsFilesRelatedByIdParent !== null) {
                if ($this->aEsFilesRelatedByIdParent->isModified() || $this->aEsFilesRelatedByIdParent->isNew()) {
                    $affectedRows += $this->aEsFilesRelatedByIdParent->save($con);
                }
                $this->setEsFilesRelatedByIdParent($this->aEsFilesRelatedByIdParent);
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

            if ($this->esCitiessScheduledForDeletion !== null) {
                if (!$this->esCitiessScheduledForDeletion->isEmpty()) {
                    foreach ($this->esCitiessScheduledForDeletion as $esCities) {
                        // need to save related object because we set the relation to null
                        $esCities->save($con);
                    }
                    $this->esCitiessScheduledForDeletion = null;
                }
            }

            if ($this->collEsCitiess !== null) {
                foreach ($this->collEsCitiess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esFilessRelatedByIdFileScheduledForDeletion !== null) {
                if (!$this->esFilessRelatedByIdFileScheduledForDeletion->isEmpty()) {
                    foreach ($this->esFilessRelatedByIdFileScheduledForDeletion as $esFilesRelatedByIdFile) {
                        // need to save related object because we set the relation to null
                        $esFilesRelatedByIdFile->save($con);
                    }
                    $this->esFilessRelatedByIdFileScheduledForDeletion = null;
                }
            }

            if ($this->collEsFilessRelatedByIdFile !== null) {
                foreach ($this->collEsFilessRelatedByIdFile as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->esUserssRelatedByIdCoverPictureScheduledForDeletion !== null) {
                if (!$this->esUserssRelatedByIdCoverPictureScheduledForDeletion->isEmpty()) {
                    foreach ($this->esUserssRelatedByIdCoverPictureScheduledForDeletion as $esUsersRelatedByIdCoverPicture) {
                        // need to save related object because we set the relation to null
                        $esUsersRelatedByIdCoverPicture->save($con);
                    }
                    $this->esUserssRelatedByIdCoverPictureScheduledForDeletion = null;
                }
            }

            if ($this->collEsUserssRelatedByIdCoverPicture !== null) {
                foreach ($this->collEsUserssRelatedByIdCoverPicture as $referrerFK) {
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

        $this->modifiedColumns[EsFilesTableMap::COL_ID_FILE] = true;
        if (null !== $this->id_file) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EsFilesTableMap::COL_ID_FILE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_FILE)) {
            $modifiedColumns[':p' . $index++]  = 'id_file';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'name';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_URL)) {
            $modifiedColumns[':p' . $index++]  = 'url';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_EXT)) {
            $modifiedColumns[':p' . $index++]  = 'ext';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_RAW_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'raw_name';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_FULL_PATH)) {
            $modifiedColumns[':p' . $index++]  = 'full_path';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_PATH)) {
            $modifiedColumns[':p' . $index++]  = 'path';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'width';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'height';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_SIZE)) {
            $modifiedColumns[':p' . $index++]  = 'size';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_LIBRARY)) {
            $modifiedColumns[':p' . $index++]  = 'library';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_NRO_THUMBS)) {
            $modifiedColumns[':p' . $index++]  = 'nro_thumbs';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_PARENT)) {
            $modifiedColumns[':p' . $index++]  = 'id_parent';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_THUMB_MARKER)) {
            $modifiedColumns[':p' . $index++]  = 'thumb_marker';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_X)) {
            $modifiedColumns[':p' . $index++]  = 'x';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_Y)) {
            $modifiedColumns[':p' . $index++]  = 'y';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_FIX_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = 'fix_width';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_FIX_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'fix_height';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_CHANGE_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'change_count';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_USER_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_modified';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_USER_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'id_user_created';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_DATE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'date_modified';
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_DATE_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'date_created';
        }

        $sql = sprintf(
            'INSERT INTO es_files (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_file':
                        $stmt->bindValue($identifier, $this->id_file, PDO::PARAM_INT);
                        break;
                    case 'name':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case 'url':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case 'ext':
                        $stmt->bindValue($identifier, $this->ext, PDO::PARAM_STR);
                        break;
                    case 'raw_name':
                        $stmt->bindValue($identifier, $this->raw_name, PDO::PARAM_STR);
                        break;
                    case 'full_path':
                        $stmt->bindValue($identifier, $this->full_path, PDO::PARAM_STR);
                        break;
                    case 'path':
                        $stmt->bindValue($identifier, $this->path, PDO::PARAM_STR);
                        break;
                    case 'width':
                        $stmt->bindValue($identifier, $this->width, PDO::PARAM_INT);
                        break;
                    case 'height':
                        $stmt->bindValue($identifier, $this->height, PDO::PARAM_INT);
                        break;
                    case 'size':
                        $stmt->bindValue($identifier, $this->size, PDO::PARAM_STR);
                        break;
                    case 'library':
                        $stmt->bindValue($identifier, $this->library, PDO::PARAM_STR);
                        break;
                    case 'nro_thumbs':
                        $stmt->bindValue($identifier, $this->nro_thumbs, PDO::PARAM_INT);
                        break;
                    case 'id_parent':
                        $stmt->bindValue($identifier, $this->id_parent, PDO::PARAM_INT);
                        break;
                    case 'thumb_marker':
                        $stmt->bindValue($identifier, $this->thumb_marker, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'x':
                        $stmt->bindValue($identifier, $this->x, PDO::PARAM_STR);
                        break;
                    case 'y':
                        $stmt->bindValue($identifier, $this->y, PDO::PARAM_STR);
                        break;
                    case 'fix_width':
                        $stmt->bindValue($identifier, $this->fix_width, PDO::PARAM_STR);
                        break;
                    case 'fix_height':
                        $stmt->bindValue($identifier, $this->fix_height, PDO::PARAM_STR);
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
        $this->setIdFile($pk);

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
        $pos = EsFilesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIdFile();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getUrl();
                break;
            case 3:
                return $this->getExt();
                break;
            case 4:
                return $this->getRawName();
                break;
            case 5:
                return $this->getFullPath();
                break;
            case 6:
                return $this->getPath();
                break;
            case 7:
                return $this->getWidth();
                break;
            case 8:
                return $this->getHeight();
                break;
            case 9:
                return $this->getSize();
                break;
            case 10:
                return $this->getLibrary();
                break;
            case 11:
                return $this->getNroThumbs();
                break;
            case 12:
                return $this->getIdParent();
                break;
            case 13:
                return $this->getThumbMarker();
                break;
            case 14:
                return $this->getType();
                break;
            case 15:
                return $this->getX();
                break;
            case 16:
                return $this->getY();
                break;
            case 17:
                return $this->getFixWidth();
                break;
            case 18:
                return $this->getFixHeight();
                break;
            case 19:
                return $this->getStatus();
                break;
            case 20:
                return $this->getChangeCount();
                break;
            case 21:
                return $this->getIdUserModified();
                break;
            case 22:
                return $this->getIdUserCreated();
                break;
            case 23:
                return $this->getDateModified();
                break;
            case 24:
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

        if (isset($alreadyDumpedObjects['EsFiles'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['EsFiles'][$this->hashCode()] = true;
        $keys = EsFilesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdFile(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getUrl(),
            $keys[3] => $this->getExt(),
            $keys[4] => $this->getRawName(),
            $keys[5] => $this->getFullPath(),
            $keys[6] => $this->getPath(),
            $keys[7] => $this->getWidth(),
            $keys[8] => $this->getHeight(),
            $keys[9] => $this->getSize(),
            $keys[10] => $this->getLibrary(),
            $keys[11] => $this->getNroThumbs(),
            $keys[12] => $this->getIdParent(),
            $keys[13] => $this->getThumbMarker(),
            $keys[14] => $this->getType(),
            $keys[15] => $this->getX(),
            $keys[16] => $this->getY(),
            $keys[17] => $this->getFixWidth(),
            $keys[18] => $this->getFixHeight(),
            $keys[19] => $this->getStatus(),
            $keys[20] => $this->getChangeCount(),
            $keys[21] => $this->getIdUserModified(),
            $keys[22] => $this->getIdUserCreated(),
            $keys[23] => $this->getDateModified(),
            $keys[24] => $this->getDateCreated(),
        );
        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('c');
        }

        if ($result[$keys[24]] instanceof \DateTimeInterface) {
            $result[$keys[24]] = $result[$keys[24]]->format('c');
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
            if (null !== $this->aEsFilesRelatedByIdParent) {

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

                $result[$key] = $this->aEsFilesRelatedByIdParent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collEsCitiess) {

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

                $result[$key] = $this->collEsCitiess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsFilessRelatedByIdFile) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'esFiless';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'es_filess';
                        break;
                    default:
                        $key = 'EsFiless';
                }

                $result[$key] = $this->collEsFilessRelatedByIdFile->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEsUserssRelatedByIdCoverPicture) {

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

                $result[$key] = $this->collEsUserssRelatedByIdCoverPicture->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\EsFiles
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EsFilesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\EsFiles
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdFile($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setUrl($value);
                break;
            case 3:
                $this->setExt($value);
                break;
            case 4:
                $this->setRawName($value);
                break;
            case 5:
                $this->setFullPath($value);
                break;
            case 6:
                $this->setPath($value);
                break;
            case 7:
                $this->setWidth($value);
                break;
            case 8:
                $this->setHeight($value);
                break;
            case 9:
                $this->setSize($value);
                break;
            case 10:
                $this->setLibrary($value);
                break;
            case 11:
                $this->setNroThumbs($value);
                break;
            case 12:
                $this->setIdParent($value);
                break;
            case 13:
                $this->setThumbMarker($value);
                break;
            case 14:
                $this->setType($value);
                break;
            case 15:
                $this->setX($value);
                break;
            case 16:
                $this->setY($value);
                break;
            case 17:
                $this->setFixWidth($value);
                break;
            case 18:
                $this->setFixHeight($value);
                break;
            case 19:
                $this->setStatus($value);
                break;
            case 20:
                $this->setChangeCount($value);
                break;
            case 21:
                $this->setIdUserModified($value);
                break;
            case 22:
                $this->setIdUserCreated($value);
                break;
            case 23:
                $this->setDateModified($value);
                break;
            case 24:
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
        $keys = EsFilesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdFile($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setUrl($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setExt($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRawName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFullPath($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPath($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setWidth($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setHeight($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSize($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setLibrary($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setNroThumbs($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIdParent($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setThumbMarker($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setType($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setX($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setY($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setFixWidth($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setFixHeight($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setStatus($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setChangeCount($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setIdUserModified($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setIdUserCreated($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setDateModified($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setDateCreated($arr[$keys[24]]);
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
     * @return $this|\EsFiles The current object, for fluid interface
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
        $criteria = new Criteria(EsFilesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EsFilesTableMap::COL_ID_FILE)) {
            $criteria->add(EsFilesTableMap::COL_ID_FILE, $this->id_file);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_NAME)) {
            $criteria->add(EsFilesTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_URL)) {
            $criteria->add(EsFilesTableMap::COL_URL, $this->url);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_EXT)) {
            $criteria->add(EsFilesTableMap::COL_EXT, $this->ext);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_RAW_NAME)) {
            $criteria->add(EsFilesTableMap::COL_RAW_NAME, $this->raw_name);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_FULL_PATH)) {
            $criteria->add(EsFilesTableMap::COL_FULL_PATH, $this->full_path);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_PATH)) {
            $criteria->add(EsFilesTableMap::COL_PATH, $this->path);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_WIDTH)) {
            $criteria->add(EsFilesTableMap::COL_WIDTH, $this->width);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_HEIGHT)) {
            $criteria->add(EsFilesTableMap::COL_HEIGHT, $this->height);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_SIZE)) {
            $criteria->add(EsFilesTableMap::COL_SIZE, $this->size);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_LIBRARY)) {
            $criteria->add(EsFilesTableMap::COL_LIBRARY, $this->library);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_NRO_THUMBS)) {
            $criteria->add(EsFilesTableMap::COL_NRO_THUMBS, $this->nro_thumbs);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_PARENT)) {
            $criteria->add(EsFilesTableMap::COL_ID_PARENT, $this->id_parent);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_THUMB_MARKER)) {
            $criteria->add(EsFilesTableMap::COL_THUMB_MARKER, $this->thumb_marker);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_TYPE)) {
            $criteria->add(EsFilesTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_X)) {
            $criteria->add(EsFilesTableMap::COL_X, $this->x);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_Y)) {
            $criteria->add(EsFilesTableMap::COL_Y, $this->y);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_FIX_WIDTH)) {
            $criteria->add(EsFilesTableMap::COL_FIX_WIDTH, $this->fix_width);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_FIX_HEIGHT)) {
            $criteria->add(EsFilesTableMap::COL_FIX_HEIGHT, $this->fix_height);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_STATUS)) {
            $criteria->add(EsFilesTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_CHANGE_COUNT)) {
            $criteria->add(EsFilesTableMap::COL_CHANGE_COUNT, $this->change_count);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_USER_MODIFIED)) {
            $criteria->add(EsFilesTableMap::COL_ID_USER_MODIFIED, $this->id_user_modified);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_ID_USER_CREATED)) {
            $criteria->add(EsFilesTableMap::COL_ID_USER_CREATED, $this->id_user_created);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_DATE_MODIFIED)) {
            $criteria->add(EsFilesTableMap::COL_DATE_MODIFIED, $this->date_modified);
        }
        if ($this->isColumnModified(EsFilesTableMap::COL_DATE_CREATED)) {
            $criteria->add(EsFilesTableMap::COL_DATE_CREATED, $this->date_created);
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
        $criteria = ChildEsFilesQuery::create();
        $criteria->add(EsFilesTableMap::COL_ID_FILE, $this->id_file);

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
        $validPk = null !== $this->getIdFile();

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
        return $this->getIdFile();
    }

    /**
     * Generic method to set the primary key (id_file column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdFile($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdFile();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \EsFiles (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setExt($this->getExt());
        $copyObj->setRawName($this->getRawName());
        $copyObj->setFullPath($this->getFullPath());
        $copyObj->setPath($this->getPath());
        $copyObj->setWidth($this->getWidth());
        $copyObj->setHeight($this->getHeight());
        $copyObj->setSize($this->getSize());
        $copyObj->setLibrary($this->getLibrary());
        $copyObj->setNroThumbs($this->getNroThumbs());
        $copyObj->setIdParent($this->getIdParent());
        $copyObj->setThumbMarker($this->getThumbMarker());
        $copyObj->setType($this->getType());
        $copyObj->setX($this->getX());
        $copyObj->setY($this->getY());
        $copyObj->setFixWidth($this->getFixWidth());
        $copyObj->setFixHeight($this->getFixHeight());
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

            foreach ($this->getEsCitiess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsCities($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsFilessRelatedByIdFile() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsFilesRelatedByIdFile($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEsUserssRelatedByIdCoverPicture() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEsUsersRelatedByIdCoverPicture($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdFile(NULL); // this is a auto-increment column, so set to default value
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
     * @return \EsFiles Clone of current object.
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
     * @return $this|\EsFiles The current object (for fluent API support)
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
            $v->addEsFilesRelatedByIdUserCreated($this);
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
                $this->aEsUsersRelatedByIdUserCreated->addEsFilessRelatedByIdUserCreated($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserCreated;
    }

    /**
     * Declares an association between this object and a ChildEsUsers object.
     *
     * @param  ChildEsUsers $v
     * @return $this|\EsFiles The current object (for fluent API support)
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
            $v->addEsFilesRelatedByIdUserModified($this);
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
                $this->aEsUsersRelatedByIdUserModified->addEsFilessRelatedByIdUserModified($this);
             */
        }

        return $this->aEsUsersRelatedByIdUserModified;
    }

    /**
     * Declares an association between this object and a ChildEsFiles object.
     *
     * @param  ChildEsFiles $v
     * @return $this|\EsFiles The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEsFilesRelatedByIdParent(ChildEsFiles $v = null)
    {
        if ($v === null) {
            $this->setIdParent(NULL);
        } else {
            $this->setIdParent($v->getIdFile());
        }

        $this->aEsFilesRelatedByIdParent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildEsFiles object, it will not be re-added.
        if ($v !== null) {
            $v->addEsFilesRelatedByIdFile($this);
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
    public function getEsFilesRelatedByIdParent(ConnectionInterface $con = null)
    {
        if ($this->aEsFilesRelatedByIdParent === null && ($this->id_parent != 0)) {
            $this->aEsFilesRelatedByIdParent = ChildEsFilesQuery::create()->findPk($this->id_parent, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEsFilesRelatedByIdParent->addEsFilessRelatedByIdFile($this);
             */
        }

        return $this->aEsFilesRelatedByIdParent;
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
        if ('EsCities' == $relationName) {
            $this->initEsCitiess();
            return;
        }
        if ('EsFilesRelatedByIdFile' == $relationName) {
            $this->initEsFilessRelatedByIdFile();
            return;
        }
        if ('EsUsersRelatedByIdCoverPicture' == $relationName) {
            $this->initEsUserssRelatedByIdCoverPicture();
            return;
        }
    }

    /**
     * Clears out the collEsCitiess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsCitiess()
     */
    public function clearEsCitiess()
    {
        $this->collEsCitiess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsCitiess collection loaded partially.
     */
    public function resetPartialEsCitiess($v = true)
    {
        $this->collEsCitiessPartial = $v;
    }

    /**
     * Initializes the collEsCitiess collection.
     *
     * By default this just sets the collEsCitiess collection to an empty array (like clearcollEsCitiess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsCitiess($overrideExisting = true)
    {
        if (null !== $this->collEsCitiess && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsCitiesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsCitiess = new $collectionClassName;
        $this->collEsCitiess->setModel('\EsCities');
    }

    /**
     * Gets an array of ChildEsCities objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsFiles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     * @throws PropelException
     */
    public function getEsCitiess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessPartial && !$this->isNew();
        if (null === $this->collEsCitiess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsCitiess) {
                // return empty collection
                $this->initEsCitiess();
            } else {
                $collEsCitiess = ChildEsCitiesQuery::create(null, $criteria)
                    ->filterByEsFiles($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsCitiessPartial && count($collEsCitiess)) {
                        $this->initEsCitiess(false);

                        foreach ($collEsCitiess as $obj) {
                            if (false == $this->collEsCitiess->contains($obj)) {
                                $this->collEsCitiess->append($obj);
                            }
                        }

                        $this->collEsCitiessPartial = true;
                    }

                    return $collEsCitiess;
                }

                if ($partial && $this->collEsCitiess) {
                    foreach ($this->collEsCitiess as $obj) {
                        if ($obj->isNew()) {
                            $collEsCitiess[] = $obj;
                        }
                    }
                }

                $this->collEsCitiess = $collEsCitiess;
                $this->collEsCitiessPartial = false;
            }
        }

        return $this->collEsCitiess;
    }

    /**
     * Sets a collection of ChildEsCities objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esCitiess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsFiles The current object (for fluent API support)
     */
    public function setEsCitiess(Collection $esCitiess, ConnectionInterface $con = null)
    {
        /** @var ChildEsCities[] $esCitiessToDelete */
        $esCitiessToDelete = $this->getEsCitiess(new Criteria(), $con)->diff($esCitiess);


        $this->esCitiessScheduledForDeletion = $esCitiessToDelete;

        foreach ($esCitiessToDelete as $esCitiesRemoved) {
            $esCitiesRemoved->setEsFiles(null);
        }

        $this->collEsCitiess = null;
        foreach ($esCitiess as $esCities) {
            $this->addEsCities($esCities);
        }

        $this->collEsCitiess = $esCitiess;
        $this->collEsCitiessPartial = false;

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
    public function countEsCitiess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsCitiessPartial && !$this->isNew();
        if (null === $this->collEsCitiess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsCitiess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsCitiess());
            }

            $query = ChildEsCitiesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsFiles($this)
                ->count($con);
        }

        return count($this->collEsCitiess);
    }

    /**
     * Method called to associate a ChildEsCities object to this object
     * through the ChildEsCities foreign key attribute.
     *
     * @param  ChildEsCities $l ChildEsCities
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function addEsCities(ChildEsCities $l)
    {
        if ($this->collEsCitiess === null) {
            $this->initEsCitiess();
            $this->collEsCitiessPartial = true;
        }

        if (!$this->collEsCitiess->contains($l)) {
            $this->doAddEsCities($l);

            if ($this->esCitiessScheduledForDeletion and $this->esCitiessScheduledForDeletion->contains($l)) {
                $this->esCitiessScheduledForDeletion->remove($this->esCitiessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsCities $esCities The ChildEsCities object to add.
     */
    protected function doAddEsCities(ChildEsCities $esCities)
    {
        $this->collEsCitiess[]= $esCities;
        $esCities->setEsFiles($this);
    }

    /**
     * @param  ChildEsCities $esCities The ChildEsCities object to remove.
     * @return $this|ChildEsFiles The current object (for fluent API support)
     */
    public function removeEsCities(ChildEsCities $esCities)
    {
        if ($this->getEsCitiess()->contains($esCities)) {
            $pos = $this->collEsCitiess->search($esCities);
            $this->collEsCitiess->remove($pos);
            if (null === $this->esCitiessScheduledForDeletion) {
                $this->esCitiessScheduledForDeletion = clone $this->collEsCitiess;
                $this->esCitiessScheduledForDeletion->clear();
            }
            $this->esCitiessScheduledForDeletion[]= $esCities;
            $esCities->setEsFiles(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsCitiess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsCitiess($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsCitiess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsCitiess($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsCitiess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessJoinEsCitiesRelatedByIdCapital(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdCapital', $joinBehavior);

        return $this->getEsCitiess($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsCitiess from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsCities[] List of ChildEsCities objects
     */
    public function getEsCitiessJoinEsCitiesRelatedByIdRegion(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsCitiesQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdRegion', $joinBehavior);

        return $this->getEsCitiess($query, $con);
    }

    /**
     * Clears out the collEsFilessRelatedByIdFile collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsFilessRelatedByIdFile()
     */
    public function clearEsFilessRelatedByIdFile()
    {
        $this->collEsFilessRelatedByIdFile = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsFilessRelatedByIdFile collection loaded partially.
     */
    public function resetPartialEsFilessRelatedByIdFile($v = true)
    {
        $this->collEsFilessRelatedByIdFilePartial = $v;
    }

    /**
     * Initializes the collEsFilessRelatedByIdFile collection.
     *
     * By default this just sets the collEsFilessRelatedByIdFile collection to an empty array (like clearcollEsFilessRelatedByIdFile());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsFilessRelatedByIdFile($overrideExisting = true)
    {
        if (null !== $this->collEsFilessRelatedByIdFile && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsFilesTableMap::getTableMap()->getCollectionClassName();

        $this->collEsFilessRelatedByIdFile = new $collectionClassName;
        $this->collEsFilessRelatedByIdFile->setModel('\EsFiles');
    }

    /**
     * Gets an array of ChildEsFiles objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsFiles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     * @throws PropelException
     */
    public function getEsFilessRelatedByIdFile(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsFilessRelatedByIdFilePartial && !$this->isNew();
        if (null === $this->collEsFilessRelatedByIdFile || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsFilessRelatedByIdFile) {
                // return empty collection
                $this->initEsFilessRelatedByIdFile();
            } else {
                $collEsFilessRelatedByIdFile = ChildEsFilesQuery::create(null, $criteria)
                    ->filterByEsFilesRelatedByIdParent($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsFilessRelatedByIdFilePartial && count($collEsFilessRelatedByIdFile)) {
                        $this->initEsFilessRelatedByIdFile(false);

                        foreach ($collEsFilessRelatedByIdFile as $obj) {
                            if (false == $this->collEsFilessRelatedByIdFile->contains($obj)) {
                                $this->collEsFilessRelatedByIdFile->append($obj);
                            }
                        }

                        $this->collEsFilessRelatedByIdFilePartial = true;
                    }

                    return $collEsFilessRelatedByIdFile;
                }

                if ($partial && $this->collEsFilessRelatedByIdFile) {
                    foreach ($this->collEsFilessRelatedByIdFile as $obj) {
                        if ($obj->isNew()) {
                            $collEsFilessRelatedByIdFile[] = $obj;
                        }
                    }
                }

                $this->collEsFilessRelatedByIdFile = $collEsFilessRelatedByIdFile;
                $this->collEsFilessRelatedByIdFilePartial = false;
            }
        }

        return $this->collEsFilessRelatedByIdFile;
    }

    /**
     * Sets a collection of ChildEsFiles objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esFilessRelatedByIdFile A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsFiles The current object (for fluent API support)
     */
    public function setEsFilessRelatedByIdFile(Collection $esFilessRelatedByIdFile, ConnectionInterface $con = null)
    {
        /** @var ChildEsFiles[] $esFilessRelatedByIdFileToDelete */
        $esFilessRelatedByIdFileToDelete = $this->getEsFilessRelatedByIdFile(new Criteria(), $con)->diff($esFilessRelatedByIdFile);


        $this->esFilessRelatedByIdFileScheduledForDeletion = $esFilessRelatedByIdFileToDelete;

        foreach ($esFilessRelatedByIdFileToDelete as $esFilesRelatedByIdFileRemoved) {
            $esFilesRelatedByIdFileRemoved->setEsFilesRelatedByIdParent(null);
        }

        $this->collEsFilessRelatedByIdFile = null;
        foreach ($esFilessRelatedByIdFile as $esFilesRelatedByIdFile) {
            $this->addEsFilesRelatedByIdFile($esFilesRelatedByIdFile);
        }

        $this->collEsFilessRelatedByIdFile = $esFilessRelatedByIdFile;
        $this->collEsFilessRelatedByIdFilePartial = false;

        return $this;
    }

    /**
     * Returns the number of related EsFiles objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related EsFiles objects.
     * @throws PropelException
     */
    public function countEsFilessRelatedByIdFile(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsFilessRelatedByIdFilePartial && !$this->isNew();
        if (null === $this->collEsFilessRelatedByIdFile || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsFilessRelatedByIdFile) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsFilessRelatedByIdFile());
            }

            $query = ChildEsFilesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsFilesRelatedByIdParent($this)
                ->count($con);
        }

        return count($this->collEsFilessRelatedByIdFile);
    }

    /**
     * Method called to associate a ChildEsFiles object to this object
     * through the ChildEsFiles foreign key attribute.
     *
     * @param  ChildEsFiles $l ChildEsFiles
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function addEsFilesRelatedByIdFile(ChildEsFiles $l)
    {
        if ($this->collEsFilessRelatedByIdFile === null) {
            $this->initEsFilessRelatedByIdFile();
            $this->collEsFilessRelatedByIdFilePartial = true;
        }

        if (!$this->collEsFilessRelatedByIdFile->contains($l)) {
            $this->doAddEsFilesRelatedByIdFile($l);

            if ($this->esFilessRelatedByIdFileScheduledForDeletion and $this->esFilessRelatedByIdFileScheduledForDeletion->contains($l)) {
                $this->esFilessRelatedByIdFileScheduledForDeletion->remove($this->esFilessRelatedByIdFileScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsFiles $esFilesRelatedByIdFile The ChildEsFiles object to add.
     */
    protected function doAddEsFilesRelatedByIdFile(ChildEsFiles $esFilesRelatedByIdFile)
    {
        $this->collEsFilessRelatedByIdFile[]= $esFilesRelatedByIdFile;
        $esFilesRelatedByIdFile->setEsFilesRelatedByIdParent($this);
    }

    /**
     * @param  ChildEsFiles $esFilesRelatedByIdFile The ChildEsFiles object to remove.
     * @return $this|ChildEsFiles The current object (for fluent API support)
     */
    public function removeEsFilesRelatedByIdFile(ChildEsFiles $esFilesRelatedByIdFile)
    {
        if ($this->getEsFilessRelatedByIdFile()->contains($esFilesRelatedByIdFile)) {
            $pos = $this->collEsFilessRelatedByIdFile->search($esFilesRelatedByIdFile);
            $this->collEsFilessRelatedByIdFile->remove($pos);
            if (null === $this->esFilessRelatedByIdFileScheduledForDeletion) {
                $this->esFilessRelatedByIdFileScheduledForDeletion = clone $this->collEsFilessRelatedByIdFile;
                $this->esFilessRelatedByIdFileScheduledForDeletion->clear();
            }
            $this->esFilessRelatedByIdFileScheduledForDeletion[]= $esFilesRelatedByIdFile;
            $esFilesRelatedByIdFile->setEsFilesRelatedByIdParent(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsFilessRelatedByIdFile from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     */
    public function getEsFilessRelatedByIdFileJoinEsUsersRelatedByIdUserCreated(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsFilesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserCreated', $joinBehavior);

        return $this->getEsFilessRelatedByIdFile($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsFilessRelatedByIdFile from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsFiles[] List of ChildEsFiles objects
     */
    public function getEsFilessRelatedByIdFileJoinEsUsersRelatedByIdUserModified(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsFilesQuery::create(null, $criteria);
        $query->joinWith('EsUsersRelatedByIdUserModified', $joinBehavior);

        return $this->getEsFilessRelatedByIdFile($query, $con);
    }

    /**
     * Clears out the collEsUserssRelatedByIdCoverPicture collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addEsUserssRelatedByIdCoverPicture()
     */
    public function clearEsUserssRelatedByIdCoverPicture()
    {
        $this->collEsUserssRelatedByIdCoverPicture = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collEsUserssRelatedByIdCoverPicture collection loaded partially.
     */
    public function resetPartialEsUserssRelatedByIdCoverPicture($v = true)
    {
        $this->collEsUserssRelatedByIdCoverPicturePartial = $v;
    }

    /**
     * Initializes the collEsUserssRelatedByIdCoverPicture collection.
     *
     * By default this just sets the collEsUserssRelatedByIdCoverPicture collection to an empty array (like clearcollEsUserssRelatedByIdCoverPicture());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEsUserssRelatedByIdCoverPicture($overrideExisting = true)
    {
        if (null !== $this->collEsUserssRelatedByIdCoverPicture && !$overrideExisting) {
            return;
        }

        $collectionClassName = EsUsersTableMap::getTableMap()->getCollectionClassName();

        $this->collEsUserssRelatedByIdCoverPicture = new $collectionClassName;
        $this->collEsUserssRelatedByIdCoverPicture->setModel('\EsUsers');
    }

    /**
     * Gets an array of ChildEsUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEsFiles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     * @throws PropelException
     */
    public function getEsUserssRelatedByIdCoverPicture(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdCoverPicturePartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdCoverPicture || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdCoverPicture) {
                // return empty collection
                $this->initEsUserssRelatedByIdCoverPicture();
            } else {
                $collEsUserssRelatedByIdCoverPicture = ChildEsUsersQuery::create(null, $criteria)
                    ->filterByEsFilesRelatedByIdCoverPicture($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collEsUserssRelatedByIdCoverPicturePartial && count($collEsUserssRelatedByIdCoverPicture)) {
                        $this->initEsUserssRelatedByIdCoverPicture(false);

                        foreach ($collEsUserssRelatedByIdCoverPicture as $obj) {
                            if (false == $this->collEsUserssRelatedByIdCoverPicture->contains($obj)) {
                                $this->collEsUserssRelatedByIdCoverPicture->append($obj);
                            }
                        }

                        $this->collEsUserssRelatedByIdCoverPicturePartial = true;
                    }

                    return $collEsUserssRelatedByIdCoverPicture;
                }

                if ($partial && $this->collEsUserssRelatedByIdCoverPicture) {
                    foreach ($this->collEsUserssRelatedByIdCoverPicture as $obj) {
                        if ($obj->isNew()) {
                            $collEsUserssRelatedByIdCoverPicture[] = $obj;
                        }
                    }
                }

                $this->collEsUserssRelatedByIdCoverPicture = $collEsUserssRelatedByIdCoverPicture;
                $this->collEsUserssRelatedByIdCoverPicturePartial = false;
            }
        }

        return $this->collEsUserssRelatedByIdCoverPicture;
    }

    /**
     * Sets a collection of ChildEsUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $esUserssRelatedByIdCoverPicture A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEsFiles The current object (for fluent API support)
     */
    public function setEsUserssRelatedByIdCoverPicture(Collection $esUserssRelatedByIdCoverPicture, ConnectionInterface $con = null)
    {
        /** @var ChildEsUsers[] $esUserssRelatedByIdCoverPictureToDelete */
        $esUserssRelatedByIdCoverPictureToDelete = $this->getEsUserssRelatedByIdCoverPicture(new Criteria(), $con)->diff($esUserssRelatedByIdCoverPicture);


        $this->esUserssRelatedByIdCoverPictureScheduledForDeletion = $esUserssRelatedByIdCoverPictureToDelete;

        foreach ($esUserssRelatedByIdCoverPictureToDelete as $esUsersRelatedByIdCoverPictureRemoved) {
            $esUsersRelatedByIdCoverPictureRemoved->setEsFilesRelatedByIdCoverPicture(null);
        }

        $this->collEsUserssRelatedByIdCoverPicture = null;
        foreach ($esUserssRelatedByIdCoverPicture as $esUsersRelatedByIdCoverPicture) {
            $this->addEsUsersRelatedByIdCoverPicture($esUsersRelatedByIdCoverPicture);
        }

        $this->collEsUserssRelatedByIdCoverPicture = $esUserssRelatedByIdCoverPicture;
        $this->collEsUserssRelatedByIdCoverPicturePartial = false;

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
    public function countEsUserssRelatedByIdCoverPicture(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collEsUserssRelatedByIdCoverPicturePartial && !$this->isNew();
        if (null === $this->collEsUserssRelatedByIdCoverPicture || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEsUserssRelatedByIdCoverPicture) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEsUserssRelatedByIdCoverPicture());
            }

            $query = ChildEsUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEsFilesRelatedByIdCoverPicture($this)
                ->count($con);
        }

        return count($this->collEsUserssRelatedByIdCoverPicture);
    }

    /**
     * Method called to associate a ChildEsUsers object to this object
     * through the ChildEsUsers foreign key attribute.
     *
     * @param  ChildEsUsers $l ChildEsUsers
     * @return $this|\EsFiles The current object (for fluent API support)
     */
    public function addEsUsersRelatedByIdCoverPicture(ChildEsUsers $l)
    {
        if ($this->collEsUserssRelatedByIdCoverPicture === null) {
            $this->initEsUserssRelatedByIdCoverPicture();
            $this->collEsUserssRelatedByIdCoverPicturePartial = true;
        }

        if (!$this->collEsUserssRelatedByIdCoverPicture->contains($l)) {
            $this->doAddEsUsersRelatedByIdCoverPicture($l);

            if ($this->esUserssRelatedByIdCoverPictureScheduledForDeletion and $this->esUserssRelatedByIdCoverPictureScheduledForDeletion->contains($l)) {
                $this->esUserssRelatedByIdCoverPictureScheduledForDeletion->remove($this->esUserssRelatedByIdCoverPictureScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildEsUsers $esUsersRelatedByIdCoverPicture The ChildEsUsers object to add.
     */
    protected function doAddEsUsersRelatedByIdCoverPicture(ChildEsUsers $esUsersRelatedByIdCoverPicture)
    {
        $this->collEsUserssRelatedByIdCoverPicture[]= $esUsersRelatedByIdCoverPicture;
        $esUsersRelatedByIdCoverPicture->setEsFilesRelatedByIdCoverPicture($this);
    }

    /**
     * @param  ChildEsUsers $esUsersRelatedByIdCoverPicture The ChildEsUsers object to remove.
     * @return $this|ChildEsFiles The current object (for fluent API support)
     */
    public function removeEsUsersRelatedByIdCoverPicture(ChildEsUsers $esUsersRelatedByIdCoverPicture)
    {
        if ($this->getEsUserssRelatedByIdCoverPicture()->contains($esUsersRelatedByIdCoverPicture)) {
            $pos = $this->collEsUserssRelatedByIdCoverPicture->search($esUsersRelatedByIdCoverPicture);
            $this->collEsUserssRelatedByIdCoverPicture->remove($pos);
            if (null === $this->esUserssRelatedByIdCoverPictureScheduledForDeletion) {
                $this->esUserssRelatedByIdCoverPictureScheduledForDeletion = clone $this->collEsUserssRelatedByIdCoverPicture;
                $this->esUserssRelatedByIdCoverPictureScheduledForDeletion->clear();
            }
            $this->esUserssRelatedByIdCoverPictureScheduledForDeletion[]= $esUsersRelatedByIdCoverPicture;
            $esUsersRelatedByIdCoverPicture->setEsFilesRelatedByIdCoverPicture(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsUserssRelatedByIdCoverPicture from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdCoverPictureJoinEsRolesRelatedByIdRole(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsRolesRelatedByIdRole', $joinBehavior);

        return $this->getEsUserssRelatedByIdCoverPicture($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsUserssRelatedByIdCoverPicture from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdCoverPictureJoinEsProvinciasRelatedByIdProvincia(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsProvinciasRelatedByIdProvincia', $joinBehavior);

        return $this->getEsUserssRelatedByIdCoverPicture($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this EsFiles is new, it will return
     * an empty collection; or if this EsFiles has previously
     * been saved, it will retrieve related EsUserssRelatedByIdCoverPicture from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in EsFiles.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildEsUsers[] List of ChildEsUsers objects
     */
    public function getEsUserssRelatedByIdCoverPictureJoinEsCitiesRelatedByIdCity(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildEsUsersQuery::create(null, $criteria);
        $query->joinWith('EsCitiesRelatedByIdCity', $joinBehavior);

        return $this->getEsUserssRelatedByIdCoverPicture($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aEsUsersRelatedByIdUserCreated) {
            $this->aEsUsersRelatedByIdUserCreated->removeEsFilesRelatedByIdUserCreated($this);
        }
        if (null !== $this->aEsUsersRelatedByIdUserModified) {
            $this->aEsUsersRelatedByIdUserModified->removeEsFilesRelatedByIdUserModified($this);
        }
        if (null !== $this->aEsFilesRelatedByIdParent) {
            $this->aEsFilesRelatedByIdParent->removeEsFilesRelatedByIdFile($this);
        }
        $this->id_file = null;
        $this->name = null;
        $this->url = null;
        $this->ext = null;
        $this->raw_name = null;
        $this->full_path = null;
        $this->path = null;
        $this->width = null;
        $this->height = null;
        $this->size = null;
        $this->library = null;
        $this->nro_thumbs = null;
        $this->id_parent = null;
        $this->thumb_marker = null;
        $this->type = null;
        $this->x = null;
        $this->y = null;
        $this->fix_width = null;
        $this->fix_height = null;
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
            if ($this->collEsCitiess) {
                foreach ($this->collEsCitiess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsFilessRelatedByIdFile) {
                foreach ($this->collEsFilessRelatedByIdFile as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEsUserssRelatedByIdCoverPicture) {
                foreach ($this->collEsUserssRelatedByIdCoverPicture as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collEsCitiess = null;
        $this->collEsFilessRelatedByIdFile = null;
        $this->collEsUserssRelatedByIdCoverPicture = null;
        $this->aEsUsersRelatedByIdUserCreated = null;
        $this->aEsUsersRelatedByIdUserModified = null;
        $this->aEsFilesRelatedByIdParent = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EsFilesTableMap::DEFAULT_STRING_FORMAT);
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
