<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Files extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_file desc";
    public $_primary_key = "id_file";
    public $_table_name = "es_files";
    public $_es_class = "ES_Model_Files";

    
    /**
     * Value for gif static option.
     *
     * @var        string
     */
    public static $optGif = 'gif';
    
    /**
     * Value for jpg static option.
     *
     * @var        string
     */
    public static $optJpg = 'jpg';
    
    /**
     * Value for png static option.
     *
     * @var        string
     */
    public static $optPng = 'png';
    
    /**
     * Value for jpeg static option.
     *
     * @var        string
     */
    public static $optJpeg = 'jpeg';
    
    /**
     * Value for pdf static option.
     *
     * @var        string
     */
    public static $optPdf = 'pdf';
    
    /**
     * Value for docx static option.
     *
     * @var        string
     */
    public static $optDocx = 'docx';
    
    /**
     * Value for xlsx static option.
     *
     * @var        string
     */
    public static $optXlsx = 'xlsx';
    
    /**
     * Value for zip static option.
     *
     * @var        string
     */
    public static $optZip = 'zip';
    
    /**
     * Value for mp4 static option.
     *
     * @var        string
     */
    public static $optMp4 = 'mp4';
    
    /**
     * Value for mp3 static option.
     *
     * @var        string
     */
    public static $optMp3 = 'mp3';
    
    //
    /**
     * Value for id_file static option.
     *
     * @var        string
     */
    public static $fieldIdFile = 'id_file';
    
    /**
     * Value for name static option.
     *
     * @var        int
     */
    public static $fieldName = 'name';
    
    /**
     * Value for url static option.
     *
     * @var        string
     */
    public static $fieldUrl = 'url';
    
    /**
     * Value for ext static option.
     *
     * @var        string
     */
    public static $fieldExt = 'ext';
    
    /**
     * Value for raw_name static option.
     *
     * @var        string
     */
    public static $fieldRawName = 'raw_name';
    
    /**
     * Value for full_path static option.
     *
     * @var        string
     */
    public static $fieldFullPath = 'full_path';
    
    /**
     * Value for path static option.
     *
     * @var        string
     */
    public static $fieldPath = 'path';
    
    /**
     * Value for width static option.
     *
     * @var        string
     */
    public static $fieldWidth = 'width';
    
    /**
     * Value for height static option.
     *
     * @var        int
     */
    public static $fieldHeight = 'height';
    
    /**
     * Value for size static option.
     *
     * @var        int
     */
    public static $fieldSize = 'size';
    
    /**
     * Value for library static option.
     *
     * @var        
     */
    public static $fieldLibrary = 'library';
    
    /**
     * Value for nro_thumbs static option.
     *
     * @var        string
     */
    public static $fieldNroThumbs = 'nro_thumbs';
    
    /**
     * Value for id_parent static option.
     *
     * @var        int
     */
    public static $fieldIdParent = 'id_parent';
    
    /**
     * Value for thumb_marker static option.
     *
     * @var        int
     */
    public static $fieldThumbMarker = 'thumb_marker';
    
    /**
     * Value for type static option.
     *
     * @var        string
     */
    public static $fieldType = 'type';
    
    /**
     * Value for x static option.
     *
     * @var        string
     */
    public static $fieldX = 'x';
    
    /**
     * Value for y static option.
     *
     * @var        
     */
    public static $fieldY = 'y';
    
    /**
     * Value for fix_width static option.
     *
     * @var        
     */
    public static $fieldFixWidth = 'fix_width';
    
    /**
     * Value for fix_height static option.
     *
     * @var        
     */
    public static $fieldFixHeight = 'fix_height';
    
    /**
     * Value for status static option.
     *
     * @var        
     */
    public static $fieldStatus = 'status';
    
    /**
     * Value for change_count static option.
     *
     * @var        string
     */
    public static $fieldChangeCount = 'change_count';
    
    /**
     * Value for id_user_modified static option.
     *
     * @var        int
     */
    public static $fieldIdUserModified = 'id_user_modified';
    
    /**
     * Value for id_user_created static option.
     *
     * @var        int
     */
    public static $fieldIdUserCreated = 'id_user_created';
    
    /**
     * Value for date_modified static option.
     *
     * @var        int
     */
    public static $fieldDateModified = 'date_modified';
    
    /**
     * Value for date_created static option.
     *
     * @var        string
     */
    public static $fieldDateCreated = 'date_created';
    
    
    /**
     * Value for id_file field.
     *
     * @var        int
     */
    public $id_file = null;
    
    /**
     * Value for name field.
     *
     * @var        string
     */
    public $name = '';
    
    /**
     * Value for url field.
     *
     * @var        string
     */
    public $url = '';
    
    /**
     * Value for ext field.
     *
     * @var        string
     */
    public $ext = '';
    
    /**
     * Value for raw_name field.
     *
     * @var        string
     */
    public $raw_name = '';
    
    /**
     * Value for full_path field.
     *
     * @var        string
     */
    public $full_path = '';
    
    /**
     * Value for path field.
     *
     * @var        string
     */
    public $path = '';
    
    /**
     * Value for width field.
     *
     * @var        int
     */
    public $width = 0;
    
    /**
     * Value for height field.
     *
     * @var        int
     */
    public $height = 0;
    
    /**
     * Value for size field.
     *
     * @var        
     */
    public $size = '';
    
    /**
     * Value for library field.
     *
     * @var        string
     */
    public $library = '';
    
    /**
     * Value for nro_thumbs field.
     *
     * @var        int
     */
    public $nro_thumbs = 0;
    
    /**
     * Value for id_parent field.
     *
     * @var        int
     */
    public $id_parent = null;
    
    /**
     * Value for thumb_marker field.
     *
     * @var        string
     */
    public $thumb_marker = '';
    
    /**
     * Value for type field.
     *
     * @var        string
     */
    public $type = '';
    
    /**
     * Value for x field.
     *
     * @var        
     */
    public $x = '';
    
    /**
     * Value for y field.
     *
     * @var        
     */
    public $y = '';
    
    /**
     * Value for fix_width field.
     *
     * @var        
     */
    public $fix_width = '';
    
    /**
     * Value for fix_height field.
     *
     * @var        
     */
    public $fix_height = '';
    
    /**
     * Value for status field.
     *
     * @var        string
     */
    public $status = '';
    
    /**
     * Value for change_count field.
     *
     * @var        int
     */
    public $change_count = 0;
    
    /**
     * Value for id_user_modified field.
     *
     * @var        int
     */
    public $id_user_modified = null;
    
    /**
     * Value for id_user_created field.
     *
     * @var        int
     */
    public $id_user_created = null;
    
    /**
     * Value for date_modified field.
     *
     * @var        string
     */
    public $date_modified = '';
    
    /**
     * Value for date_created field.
     *
     * @var        string
     */
    public $date_created = '';
    

    
    /**
     * Value for id_user_modified field related with name.
     *
     * @var        int
     */
    public $id_user_modified_name = null;
    
    /**
     * Value for id_user_modified field related with lastname.
     *
     * @var        int
     */
    public $id_user_modified_lastname = null;
    
    /**
     * Value for id_user_created field related with name.
     *
     * @var        int
     */
    public $id_user_created_name = null;
    
    /**
     * Value for id_user_created field related with lastname.
     *
     * @var        int
     */
    public $id_user_created_lastname = null;
    

    public $rules = array (
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[256]',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[450]',
  ),
  'ext' => 
  array (
    'field' => 'ext',
    'label' => 'Ext',
    'rules' => 'trim|max_length[100]',
  ),
  'raw_name' => 
  array (
    'field' => 'rawName',
    'label' => 'Raw Name',
    'rules' => 'trim|max_length[400]',
  ),
  'full_path' => 
  array (
    'field' => 'fullPath',
    'label' => 'Full Path',
    'rules' => 'trim|max_length[400]',
  ),
  'path' => 
  array (
    'field' => 'path',
    'label' => 'Path',
    'rules' => 'trim|max_length[400]',
  ),
  'width' => 
  array (
    'field' => 'width',
    'label' => 'Width',
    'rules' => 'trim|max_length[11]',
  ),
  'height' => 
  array (
    'field' => 'height',
    'label' => 'Height',
    'rules' => 'trim|max_length[11]',
  ),
  'size' => 
  array (
    'field' => 'size',
    'label' => 'Size',
    'rules' => 'trim|max_length[10]',
  ),
  'library' => 
  array (
    'field' => 'library',
    'label' => 'Library',
    'rules' => 'trim|max_length[20]',
  ),
  'nro_thumbs' => 
  array (
    'field' => 'nroThumbs',
    'label' => 'Nro Thumbs',
    'rules' => 'trim|max_length[11]',
  ),
  'id_parent' => 
  array (
    'field' => 'idParent',
    'label' => 'Id Parent',
    'rules' => 'trim|max_length[10]',
  ),
  'thumb_marker' => 
  array (
    'field' => 'thumbMarker',
    'label' => 'Thumb Marker',
    'rules' => 'trim|max_length[200]',
  ),
  'type' => 
  array (
    'field' => 'type',
    'label' => 'Type',
    'rules' => 'trim|max_length[100]',
  ),
  'x' => 
  array (
    'field' => 'x',
    'label' => 'X',
    'rules' => 'trim|max_length[20]',
  ),
  'y' => 
  array (
    'field' => 'y',
    'label' => 'Y',
    'rules' => 'trim|max_length[20]',
  ),
  'fix_width' => 
  array (
    'field' => 'fixWidth',
    'label' => 'Fix Width',
    'rules' => 'trim|max_length[20]',
  ),
  'fix_height' => 
  array (
    'field' => 'fixHeight',
    'label' => 'Fix Height',
    'rules' => 'trim|max_length[20]',
  ),
);
    public $rules_edit = array (
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[256]',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[450]',
  ),
  'ext' => 
  array (
    'field' => 'ext',
    'label' => 'Ext',
    'rules' => 'trim|max_length[100]',
  ),
  'raw_name' => 
  array (
    'field' => 'rawName',
    'label' => 'Raw Name',
    'rules' => 'trim|max_length[400]',
  ),
  'full_path' => 
  array (
    'field' => 'fullPath',
    'label' => 'Full Path',
    'rules' => 'trim|max_length[400]',
  ),
  'path' => 
  array (
    'field' => 'path',
    'label' => 'Path',
    'rules' => 'trim|max_length[400]',
  ),
  'width' => 
  array (
    'field' => 'width',
    'label' => 'Width',
    'rules' => 'trim|max_length[11]',
  ),
  'height' => 
  array (
    'field' => 'height',
    'label' => 'Height',
    'rules' => 'trim|max_length[11]',
  ),
  'size' => 
  array (
    'field' => 'size',
    'label' => 'Size',
    'rules' => 'trim|max_length[10]',
  ),
  'library' => 
  array (
    'field' => 'library',
    'label' => 'Library',
    'rules' => 'trim|max_length[20]',
  ),
  'nro_thumbs' => 
  array (
    'field' => 'nroThumbs',
    'label' => 'Nro Thumbs',
    'rules' => 'trim|max_length[11]',
  ),
  'id_parent' => 
  array (
    'field' => 'idParent',
    'label' => 'Id Parent',
    'rules' => 'trim|max_length[10]',
  ),
  'thumb_marker' => 
  array (
    'field' => 'thumbMarker',
    'label' => 'Thumb Marker',
    'rules' => 'trim|max_length[200]',
  ),
  'type' => 
  array (
    'field' => 'type',
    'label' => 'Type',
    'rules' => 'trim|max_length[100]',
  ),
  'x' => 
  array (
    'field' => 'x',
    'label' => 'X',
    'rules' => 'trim|max_length[20]',
  ),
  'y' => 
  array (
    'field' => 'y',
    'label' => 'Y',
    'rules' => 'trim|max_length[20]',
  ),
  'fix_width' => 
  array (
    'field' => 'fixWidth',
    'label' => 'Fix Width',
    'rules' => 'trim|max_length[20]',
  ),
  'fix_height' => 
  array (
    'field' => 'fixHeight',
    'label' => 'Fix Height',
    'rules' => 'trim|max_length[20]',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->file = new Model_Files();
        return $this->file;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdFile()
    {
        return $this->id_file;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getExt()
    {
        return $this->ext;
    }
    
    public function getRawName()
    {
        return $this->raw_name;
    }
    
    public function getFullPath()
    {
        return $this->full_path;
    }
    
    public function getPath()
    {
        return $this->path;
    }
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function getHeight()
    {
        return $this->height;
    }
    
    public function getSize()
    {
        return $this->size;
    }
    
    public function getLibrary()
    {
        return $this->library;
    }
    
    public function getNroThumbs()
    {
        return $this->nro_thumbs;
    }
    
    public function getIdParent()
    {
        return $this->id_parent;
    }
    
    public function getThumbMarker()
    {
        return $this->thumb_marker;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getX()
    {
        return $this->x;
    }
    
    public function getY()
    {
        return $this->y;
    }
    
    public function getFixWidth()
    {
        return $this->fix_width;
    }
    
    public function getFixHeight()
    {
        return $this->fix_height;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getChangeCount()
    {
        return $this->change_count;
    }
    
    public function getIdUserModified()
    {
        return $this->id_user_modified;
    }
    
    public function getIdUserCreated()
    {
        return $this->id_user_created;
    }
    
    public function getDateModified()
    {
        return $this->date_modified;
    }
    
    public function getDateCreated()
    {
        return $this->date_created;
    }
    

    
    public function getIdUserModifiedName()
    {
        return $this->id_user_modified_name;
    }
    
    public function getIdUserModifiedLastname()
    {
        return $this->id_user_modified_lastname;
    }
    
    public function getIdUserCreatedName()
    {
        return $this->id_user_created_name;
    }
    
    public function getIdUserCreatedLastname()
    {
        return $this->id_user_created_lastname;
    }
    

    
    public function setIdFile($idFile = ''){
        if(objectHas($this,'id_file', false)){
            return $this->id_file = $idFile;
        }
    }
    
    public function setName($name = ''){
        if(objectHas($this,'name', false)){
            return $this->name = $name;
        }
    }
    
    public function setUrl($url = ''){
        if(objectHas($this,'url', false)){
            return $this->url = $url;
        }
    }
    
    public function setExt($ext = ''){
        if(objectHas($this,'ext', false)){
            return $this->ext = $ext;
        }
    }
    
    public function setRawName($rawName = ''){
        if(objectHas($this,'raw_name', false)){
            return $this->raw_name = $rawName;
        }
    }
    
    public function setFullPath($fullPath = ''){
        if(objectHas($this,'full_path', false)){
            return $this->full_path = $fullPath;
        }
    }
    
    public function setPath($path = ''){
        if(objectHas($this,'path', false)){
            return $this->path = $path;
        }
    }
    
    public function setWidth($width = ''){
        if(objectHas($this,'width', false)){
            return $this->width = $width;
        }
    }
    
    public function setHeight($height = ''){
        if(objectHas($this,'height', false)){
            return $this->height = $height;
        }
    }
    
    public function setSize($size = ''){
        if(objectHas($this,'size', false)){
            return $this->size = $size;
        }
    }
    
    public function setLibrary($library = ''){
        if(objectHas($this,'library', false)){
            return $this->library = $library;
        }
    }
    
    public function setNroThumbs($nroThumbs = ''){
        if(objectHas($this,'nro_thumbs', false)){
            return $this->nro_thumbs = $nroThumbs;
        }
    }
    
    public function setIdParent($idParent = ''){
        if(objectHas($this,'id_parent', false)){
            return $this->id_parent = $idParent;
        }
    }
    
    public function setThumbMarker($thumbMarker = ''){
        if(objectHas($this,'thumb_marker', false)){
            return $this->thumb_marker = $thumbMarker;
        }
    }
    
    public function setType($type = ''){
        if(objectHas($this,'type', false)){
            return $this->type = $type;
        }
    }
    
    public function setX($x = ''){
        if(objectHas($this,'x', false)){
            return $this->x = $x;
        }
    }
    
    public function setY($y = ''){
        if(objectHas($this,'y', false)){
            return $this->y = $y;
        }
    }
    
    public function setFixWidth($fixWidth = ''){
        if(objectHas($this,'fix_width', false)){
            return $this->fix_width = $fixWidth;
        }
    }
    
    public function setFixHeight($fixHeight = ''){
        if(objectHas($this,'fix_height', false)){
            return $this->fix_height = $fixHeight;
        }
    }
    
    public function setStatus($status = ''){
        if(objectHas($this,'status', false)){
            return $this->status = $status;
        }
    }
    
    public function setChangeCount($changeCount = ''){
        if(objectHas($this,'change_count', false)){
            return $this->change_count = $changeCount;
        }
    }
    
    public function setIdUserModified($idUserModified = ''){
        if(objectHas($this,'id_user_modified', false)){
            return $this->id_user_modified = $idUserModified;
        }
    }
    
    public function setIdUserCreated($idUserCreated = ''){
        if(objectHas($this,'id_user_created', false)){
            return $this->id_user_created = $idUserCreated;
        }
    }
    
    public function setDateModified($dateModified = ''){
        if(objectHas($this,'date_modified', false)){
            return $this->date_modified = $dateModified;
        }
    }
    
    public function setDateCreated($dateCreated = ''){
        if(objectHas($this,'date_created', false)){
            return $this->date_created = $dateCreated;
        }
    }
    

    
    public function findOneByIdFile($idFile,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_file' => $idFile],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByName($name,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['name' => $name],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByUrl($url,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['url' => $url],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByExt($ext,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['ext' => $ext],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByRawName($rawName,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['raw_name' => $rawName],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByFullPath($fullPath,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['full_path' => $fullPath],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPath($path,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['path' => $path],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByWidth($width,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['width' => $width],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByHeight($height,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['height' => $height],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneBySize($size,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['size' => $size],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByLibrary($library,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['library' => $library],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByNroThumbs($nroThumbs,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['nro_thumbs' => $nroThumbs],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdParent($idParent,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_parent' => $idParent],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByThumbMarker($thumbMarker,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['thumb_marker' => $thumbMarker],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByType($type,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['type' => $type],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByX($x,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['x' => $x],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByY($y,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['y' => $y],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByFixWidth($fixWidth,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['fix_width' => $fixWidth],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByFixHeight($fixHeight,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['fix_height' => $fixHeight],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByStatus($status,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['status' => $status],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByChangeCount($changeCount,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['change_count' => $changeCount],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdUserModified($idUserModified,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_user_modified' => $idUserModified],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdUserCreated($idUserCreated,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_user_created' => $idUserCreated],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByDateModified($dateModified,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['date_modified' => $dateModified],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByDateCreated($dateCreated,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['date_created' => $dateCreated],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    

    
    public function filterByIdFile($idFile, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_file'] = $idFile;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByName($name, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['name'] = $name;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByUrl($url, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['url'] = $url;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByExt($ext, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['ext'] = $ext;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByRawName($rawName, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['raw_name'] = $rawName;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByFullPath($fullPath, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['full_path'] = $fullPath;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByPath($path, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['path'] = $path;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByWidth($width, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['width'] = $width;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByHeight($height, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['height'] = $height;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterBySize($size, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['size'] = $size;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByLibrary($library, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['library'] = $library;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByNroThumbs($nroThumbs, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['nro_thumbs'] = $nroThumbs;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByIdParent($idParent, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_parent'] = $idParent;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByThumbMarker($thumbMarker, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['thumb_marker'] = $thumbMarker;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByType($type, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['type'] = $type;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByX($x, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['x'] = $x;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByY($y, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['y'] = $y;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByFixWidth($fixWidth, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['fix_width'] = $fixWidth;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByFixHeight($fixHeight, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['fix_height'] = $fixHeight;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByStatus($status, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['status'] = $status;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByChangeCount($changeCount, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['change_count'] = $changeCount;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByIdUserModified($idUserModified, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_user_modified'] = $idUserModified;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByIdUserCreated($idUserCreated, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['id_user_created'] = $idUserCreated;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByDateModified($dateModified, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['date_modified'] = $dateModified;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    
    public function filterByDateCreated($dateCreated, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['date_created'] = $dateCreated;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
        return $aData;
    }
    

    public function getNewFile()
    {
        $post = $this->input->post();

        $this->file = $this->setFromData($post);

        return $this->file;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los files
        $oFiles = $this->get();

        

        $oModelFiles = array();

        foreach ($oFiles as $file){

            $oModelFiles[] = $this->setForeigns($file);
        }
        return $oModelFiles;
    }

    public function setFromData($oData, $oFile = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oFile)){

                $oModelFiles = $oFile;

            } else {

                $oModelFiles = new Model_Files();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelFiles->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelFiles->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelFiles->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelFiles->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelFiles->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelFiles->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelFiles->$dataKey = $dataValue;
            }
            return $oModelFiles;

        } else {

            return new Model_Files();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_file' => $this->id_file,
            
            'name' => $this->name,
            
            'url' => $this->url,
            
            'ext' => $this->ext,
            
            'raw_name' => $this->raw_name,
            
            'full_path' => $this->full_path,
            
            'path' => $this->path,
            
            'width' => $this->width,
            
            'height' => $this->height,
            
            'size' => $this->size,
            
            'library' => $this->library,
            
            'nro_thumbs' => $this->nro_thumbs,
            
            'id_parent' => $this->id_parent,
            
            'thumb_marker' => $this->thumb_marker,
            
            'type' => $this->type,
            
            'x' => $this->x,
            
            'y' => $this->y,
            
            'fix_width' => $this->fix_width,
            
            'fix_height' => $this->fix_height,
            
            'status' => $this->status,
            
            'change_count' => $this->change_count,
            
            'id_user_modified' => $this->id_user_modified,
            
            'id_user_created' => $this->id_user_created,
            
            'date_modified' => $this->date_modified,
            
            'date_created' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['id_user_modified_name'] = $this->id_user_modified_name;
            
            $data['id_user_modified_lastname'] = $this->id_user_modified_lastname;
            
            $data['id_user_created_name'] = $this->id_user_created_name;
            
            $data['id_user_created_lastname'] = $this->id_user_created_lastname;
            
        }
        if(isset($this->thumbs) && validateVar($this->thumbs, 'array')){
            $data['thumbs'] = $this->thumbs;
        }
        if(isset($this->uriString) && validateVar($this->uriString)){
            $data['uriString'] = $this->uriString;
        }
        $funct = function($val){
            return isNumeric($val,false) ? valNumeric($val) : $val;
        };
        $data = array_map($funct,$data);
        return $data;
    }

    public function toArray($bWithForeign = false){
        $data = array(
            
            'IdFile' => $this->id_file,
            
            'Name' => $this->name,
            
            'Url' => $this->url,
            
            'Ext' => $this->ext,
            
            'RawName' => $this->raw_name,
            
            'FullPath' => $this->full_path,
            
            'Path' => $this->path,
            
            'Width' => $this->width,
            
            'Height' => $this->height,
            
            'Size' => $this->size,
            
            'Library' => $this->library,
            
            'NroThumbs' => $this->nro_thumbs,
            
            'IdParent' => $this->id_parent,
            
            'ThumbMarker' => $this->thumb_marker,
            
            'Type' => $this->type,
            
            'X' => $this->x,
            
            'Y' => $this->y,
            
            'FixWidth' => $this->fix_width,
            
            'FixHeight' => $this->fix_height,
            
            'Status' => $this->status,
            
            'ChangeCount' => $this->change_count,
            
            'IdUserModified' => $this->id_user_modified,
            
            'IdUserCreated' => $this->id_user_created,
            
            'DateModified' => $this->date_modified,
            
            'DateCreated' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['IdUserModifiedName'] = $this->id_user_modified_name;
            
            $data['IdUserModifiedLastname'] = $this->id_user_modified_lastname;
            
            $data['IdUserCreatedName'] = $this->id_user_created_name;
            
            $data['IdUserCreatedLastname'] = $this->id_user_created_lastname;
            
        }
        if(isset($this->thumbs) && validateVar($this->thumbs, 'array')){
            $data['thumbs'] = $this->thumbs;
        }
        if(isset($this->uriString) && validateVar($this->uriString)){
            $data['uriString'] = $this->uriString;
        }
        $funct = function($val){
            return isNumeric($val,false) ? valNumeric($val) : ($val == null ? '' : $val);
        };
        $data = array_map($funct,$data);
        if(isset($this->foreigns)){
            foreach ($this->foreigns as $fKey => $fValue){
                $data[$fKey] = $fValue;
            }
        }
        return $data;
    }
}
