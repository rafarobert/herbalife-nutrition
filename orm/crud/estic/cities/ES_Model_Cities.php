<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Cities extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_city desc";
    public $_primary_key = "id_city";
    public $_table_name = "es_cities";
    public $_es_class = "ES_Model_Cities";

    
    /**
     * Value for region static option.
     *
     * @var        
     */
    public static $optRegion = 'region';
    
    /**
     * Value for ciudad static option.
     *
     * @var        
     */
    public static $optCiudad = 'ciudad';
    
    /**
     * Value for capital static option.
     *
     * @var        
     */
    public static $optCapital = 'capital';
    
    //
    /**
     * Value for id_city static option.
     *
     * @var        string
     */
    public static $fieldIdCity = 'id_city';
    
    /**
     * Value for name static option.
     *
     * @var        int
     */
    public static $fieldName = 'name';
    
    /**
     * Value for description static option.
     *
     * @var        string
     */
    public static $fieldDescription = 'description';
    
    /**
     * Value for abbreviation static option.
     *
     * @var        string
     */
    public static $fieldAbbreviation = 'abbreviation';
    
    /**
     * Value for id_capital static option.
     *
     * @var        string
     */
    public static $fieldIdCapital = 'id_capital';
    
    /**
     * Value for id_region static option.
     *
     * @var        int
     */
    public static $fieldIdRegion = 'id_region';
    
    /**
     * Value for lat static option.
     *
     * @var        int
     */
    public static $fieldLat = 'lat';
    
    /**
     * Value for lng static option.
     *
     * @var        
     */
    public static $fieldLng = 'lng';
    
    /**
     * Value for area static option.
     *
     * @var        
     */
    public static $fieldArea = 'area';
    
    /**
     * Value for nro_municipios static option.
     *
     * @var        int
     */
    public static $fieldNroMunicipios = 'nro_municipios';
    
    /**
     * Value for surface static option.
     *
     * @var        int
     */
    public static $fieldSurface = 'surface';
    
    /**
     * Value for ids_files static option.
     *
     * @var        
     */
    public static $fieldIdsFiles = 'ids_files';
    
    /**
     * Value for id_cover_picture static option.
     *
     * @var        string
     */
    public static $fieldIdCoverPicture = 'id_cover_picture';
    
    /**
     * Value for height static option.
     *
     * @var        int
     */
    public static $fieldHeight = 'height';
    
    /**
     * Value for tipo static option.
     *
     * @var        
     */
    public static $fieldTipo = 'tipo';
    
    /**
     * Value for status static option.
     *
     * @var        string
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
     * Value for id_city field.
     *
     * @var        int
     */
    public $id_city = null;
    
    /**
     * Value for name field.
     *
     * @var        string
     */
    public $name = '';
    
    /**
     * Value for description field.
     *
     * @var        string
     */
    public $description = '';
    
    /**
     * Value for abbreviation field.
     *
     * @var        string
     */
    public $abbreviation = '';
    
    /**
     * Value for id_capital field.
     *
     * @var        int
     */
    public $id_capital = null;
    
    /**
     * Value for id_region field.
     *
     * @var        int
     */
    public $id_region = null;
    
    /**
     * Value for lat field.
     *
     * @var        
     */
    public $lat = '';
    
    /**
     * Value for lng field.
     *
     * @var        
     */
    public $lng = '';
    
    /**
     * Value for area field.
     *
     * @var        int
     */
    public $area = 0;
    
    /**
     * Value for nro_municipios field.
     *
     * @var        int
     */
    public $nro_municipios = 0;
    
    /**
     * Value for surface field.
     *
     * @var        
     */
    public $surface = '';
    
    /**
     * Value for ids_files field.
     *
     * @var        string
     */
    public $ids_files = '';
    
    /**
     * Value for id_cover_picture field.
     *
     * @var        int
     */
    public $id_cover_picture = null;
    
    /**
     * Value for height field.
     *
     * @var        
     */
    public $height = '';
    
    /**
     * Value for tipo field.
     *
     * @var        string
     */
    public $tipo = '';
    
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
     * Value for id_capital field related with name.
     *
     * @var        int
     */
    public $id_capital_name = null;
    
    /**
     * Value for id_region field related with name.
     *
     * @var        int
     */
    public $id_region_name = null;
    
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
    'rules' => 'trim|max_length[300]|required',
  ),
  'description' => 
  array (
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim|max_length[500]',
  ),
  'abbreviation' => 
  array (
    'field' => 'abbreviation',
    'label' => 'Abbreviation',
    'rules' => 'trim|max_length[200]',
  ),
  'id_capital' => 
  array (
    'field' => 'idCapital',
    'label' => 'Id Capital',
    'rules' => 'trim|max_length[10]',
  ),
  'id_region' => 
  array (
    'field' => 'idRegion',
    'label' => 'Id Region',
    'rules' => 'trim|max_length[10]',
  ),
  'lat' => 
  array (
    'field' => 'lat',
    'label' => 'Lat',
    'rules' => 'trim|max_length[10]',
  ),
  'lng' => 
  array (
    'field' => 'lng',
    'label' => 'Lng',
    'rules' => 'trim|max_length[10]',
  ),
  'area' => 
  array (
    'field' => 'area',
    'label' => 'Area',
    'rules' => 'trim|max_length[11]',
  ),
  'nro_municipios' => 
  array (
    'field' => 'nroMunicipios',
    'label' => 'Nro Municipios',
    'rules' => 'trim|max_length[11]',
  ),
  'surface' => 
  array (
    'field' => 'surface',
    'label' => 'Surface',
    'rules' => 'trim|max_length[10]',
  ),
  'ids_files' => 
  array (
    'field' => 'idsFiles',
    'label' => 'Ids Files',
    'rules' => 'trim|max_length[490]',
  ),
  'id_cover_picture' => 
  array (
    'field' => 'idCoverPicture',
    'label' => 'Id Cover Picture',
    'rules' => 'trim|max_length[10]',
  ),
  'height' => 
  array (
    'field' => 'height',
    'label' => 'Height',
    'rules' => 'trim|max_length[10]',
  ),
  'tipo' => 
  array (
    'field' => 'tipo',
    'label' => 'Tipo',
    'rules' => 'trim|max_length[490]',
  ),
);
    public $rules_edit = array (
  'name' => 
  array (
    'field' => 'name',
    'label' => 'Name',
    'rules' => 'trim|max_length[300]|required',
  ),
  'description' => 
  array (
    'field' => 'description',
    'label' => 'Description',
    'rules' => 'trim|max_length[500]',
  ),
  'abbreviation' => 
  array (
    'field' => 'abbreviation',
    'label' => 'Abbreviation',
    'rules' => 'trim|max_length[200]',
  ),
  'id_capital' => 
  array (
    'field' => 'idCapital',
    'label' => 'Id Capital',
    'rules' => 'trim|max_length[10]',
  ),
  'id_region' => 
  array (
    'field' => 'idRegion',
    'label' => 'Id Region',
    'rules' => 'trim|max_length[10]',
  ),
  'lat' => 
  array (
    'field' => 'lat',
    'label' => 'Lat',
    'rules' => 'trim|max_length[10]',
  ),
  'lng' => 
  array (
    'field' => 'lng',
    'label' => 'Lng',
    'rules' => 'trim|max_length[10]',
  ),
  'area' => 
  array (
    'field' => 'area',
    'label' => 'Area',
    'rules' => 'trim|max_length[11]',
  ),
  'nro_municipios' => 
  array (
    'field' => 'nroMunicipios',
    'label' => 'Nro Municipios',
    'rules' => 'trim|max_length[11]',
  ),
  'surface' => 
  array (
    'field' => 'surface',
    'label' => 'Surface',
    'rules' => 'trim|max_length[10]',
  ),
  'ids_files' => 
  array (
    'field' => 'idsFiles',
    'label' => 'Ids Files',
    'rules' => 'trim|max_length[490]',
  ),
  'id_cover_picture' => 
  array (
    'field' => 'idCoverPicture',
    'label' => 'Id Cover Picture',
    'rules' => 'trim|max_length[10]',
  ),
  'height' => 
  array (
    'field' => 'height',
    'label' => 'Height',
    'rules' => 'trim|max_length[10]',
  ),
  'tipo' => 
  array (
    'field' => 'tipo',
    'label' => 'Tipo',
    'rules' => 'trim|max_length[490]',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->citie = new Model_Cities();
        return $this->citie;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdCity()
    {
        return $this->id_city;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }
    
    public function getIdCapital()
    {
        return $this->id_capital;
    }
    
    public function getIdRegion()
    {
        return $this->id_region;
    }
    
    public function getLat()
    {
        return $this->lat;
    }
    
    public function getLng()
    {
        return $this->lng;
    }
    
    public function getArea()
    {
        return $this->area;
    }
    
    public function getNroMunicipios()
    {
        return $this->nro_municipios;
    }
    
    public function getSurface()
    {
        return $this->surface;
    }
    
    public function getIdsFiles()
    {
        return $this->ids_files;
    }
    
    public function getIdCoverPicture()
    {
        return $this->id_cover_picture;
    }
    
    public function getHeight()
    {
        return $this->height;
    }
    
    public function getTipo()
    {
        return $this->tipo;
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
    

    
    public function setIdCity($idCity = ''){
        if(objectHas($this,'id_city', false)){
            return $this->id_city = $idCity;
        }
    }
    
    public function setName($name = ''){
        if(objectHas($this,'name', false)){
            return $this->name = $name;
        }
    }
    
    public function setDescription($description = ''){
        if(objectHas($this,'description', false)){
            return $this->description = $description;
        }
    }
    
    public function setAbbreviation($abbreviation = ''){
        if(objectHas($this,'abbreviation', false)){
            return $this->abbreviation = $abbreviation;
        }
    }
    
    public function setIdCapital($idCapital = ''){
        if(objectHas($this,'id_capital', false)){
            return $this->id_capital = $idCapital;
        }
    }
    
    public function setIdRegion($idRegion = ''){
        if(objectHas($this,'id_region', false)){
            return $this->id_region = $idRegion;
        }
    }
    
    public function setLat($lat = ''){
        if(objectHas($this,'lat', false)){
            return $this->lat = $lat;
        }
    }
    
    public function setLng($lng = ''){
        if(objectHas($this,'lng', false)){
            return $this->lng = $lng;
        }
    }
    
    public function setArea($area = ''){
        if(objectHas($this,'area', false)){
            return $this->area = $area;
        }
    }
    
    public function setNroMunicipios($nroMunicipios = ''){
        if(objectHas($this,'nro_municipios', false)){
            return $this->nro_municipios = $nroMunicipios;
        }
    }
    
    public function setSurface($surface = ''){
        if(objectHas($this,'surface', false)){
            return $this->surface = $surface;
        }
    }
    
    public function setIdsFiles($idsFiles = ''){
        if(objectHas($this,'ids_files', false)){
            return $this->ids_files = $idsFiles;
        }
    }
    
    public function setIdCoverPicture($idCoverPicture = ''){
        if(objectHas($this,'id_cover_picture', false)){
            return $this->id_cover_picture = $idCoverPicture;
        }
    }
    
    public function setHeight($height = ''){
        if(objectHas($this,'height', false)){
            return $this->height = $height;
        }
    }
    
    public function setTipo($tipo = ''){
        if(objectHas($this,'tipo', false)){
            return $this->tipo = $tipo;
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
    

    
    public function findOneByIdCity($idCity,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_city' => $idCity],false,true,$orderBy,$direction);
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
    
    public function findOneByDescription($description,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['description' => $description],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByAbbreviation($abbreviation,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['abbreviation' => $abbreviation],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdCapital($idCapital,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_capital' => $idCapital],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdRegion($idRegion,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_region' => $idRegion],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByLat($lat,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['lat' => $lat],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByLng($lng,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['lng' => $lng],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByArea($area,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['area' => $area],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByNroMunicipios($nroMunicipios,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['nro_municipios' => $nroMunicipios],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneBySurface($surface,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['surface' => $surface],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdsFiles($idsFiles,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['ids_files' => $idsFiles],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdCoverPicture($idCoverPicture,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_cover_picture' => $idCoverPicture],false,true,$orderBy,$direction);
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
    
    public function findOneByTipo($tipo,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['tipo' => $tipo],false,true,$orderBy,$direction);
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
    

    
    public function filterByIdCity($idCity, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_city'] = $idCity;

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
    
    public function filterByDescription($description, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['description'] = $description;

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
    
    public function filterByAbbreviation($abbreviation, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['abbreviation'] = $abbreviation;

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
    
    public function filterByIdCapital($idCapital, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_capital'] = $idCapital;

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
    
    public function filterByIdRegion($idRegion, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_region'] = $idRegion;

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
    
    public function filterByLat($lat, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['lat'] = $lat;

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
    
    public function filterByLng($lng, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['lng'] = $lng;

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
    
    public function filterByArea($area, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['area'] = $area;

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
    
    public function filterByNroMunicipios($nroMunicipios, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['nro_municipios'] = $nroMunicipios;

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
    
    public function filterBySurface($surface, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['surface'] = $surface;

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
    
    public function filterByIdsFiles($idsFiles, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['ids_files'] = $idsFiles;

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
    
    public function filterByIdCoverPicture($idCoverPicture, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_cover_picture'] = $idCoverPicture;

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
    
    public function filterByTipo($tipo, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['tipo'] = $tipo;

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
    

    public function getNewCitie()
    {
        $post = $this->input->post();

        $this->citie = $this->setFromData($post);

        return $this->citie;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los cities
        $oCities = $this->get();

        
        $oCities = $this->getThumbs($oCities);
        

        $oModelCities = array();

        foreach ($oCities as $citie){

            $oModelCities[] = $this->setForeigns($citie);
        }
        return $oModelCities;
    }

    public function setFromData($oData, $oCitie = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oCitie)){

                $oModelCities = $oCitie;

            } else {

                $oModelCities = new Model_Cities();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelCities->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelCities->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelCities->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelCities->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelCities->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelCities->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelCities->$dataKey = $dataValue;
            }
            return $oModelCities;

        } else {

            return new Model_Cities();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_city' => $this->id_city,
            
            'name' => $this->name,
            
            'description' => $this->description,
            
            'abbreviation' => $this->abbreviation,
            
            'id_capital' => $this->id_capital,
            
            'id_region' => $this->id_region,
            
            'lat' => $this->lat,
            
            'lng' => $this->lng,
            
            'area' => $this->area,
            
            'nro_municipios' => $this->nro_municipios,
            
            'surface' => $this->surface,
            
            'ids_files' => $this->ids_files,
            
            'id_cover_picture' => $this->id_cover_picture,
            
            'height' => $this->height,
            
            'tipo' => $this->tipo,
            
            'status' => $this->status,
            
            'change_count' => $this->change_count,
            
            'id_user_modified' => $this->id_user_modified,
            
            'id_user_created' => $this->id_user_created,
            
            'date_modified' => $this->date_modified,
            
            'date_created' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['id_capital_name'] = $this->id_capital_name;
            
            $data['id_region_name'] = $this->id_region_name;
            
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
            
            'IdCity' => $this->id_city,
            
            'Name' => $this->name,
            
            'Description' => $this->description,
            
            'Abbreviation' => $this->abbreviation,
            
            'IdCapital' => $this->id_capital,
            
            'IdRegion' => $this->id_region,
            
            'Lat' => $this->lat,
            
            'Lng' => $this->lng,
            
            'Area' => $this->area,
            
            'NroMunicipios' => $this->nro_municipios,
            
            'Surface' => $this->surface,
            
            'IdsFiles' => $this->ids_files,
            
            'IdCoverPicture' => $this->id_cover_picture,
            
            'Height' => $this->height,
            
            'Tipo' => $this->tipo,
            
            'Status' => $this->status,
            
            'ChangeCount' => $this->change_count,
            
            'IdUserModified' => $this->id_user_modified,
            
            'IdUserCreated' => $this->id_user_created,
            
            'DateModified' => $this->date_modified,
            
            'DateCreated' => $this->date_created,
            
        );
        if($bWithForeign){
            
            $data['IdCapitalName'] = $this->id_capital_name;
            
            $data['IdRegionName'] = $this->id_region_name;
            
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
