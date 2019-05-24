<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Domains extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_domain desc";
    public $_primary_key = "id_domain";
    public $_table_name = "es_domains";
    public $_es_class = "ES_Model_Domains";

    
    /**
     * Value for ENABLED static option.
     *
     * @var        string
     */
    public static $optENABLED = 'ENABLED';
    
    /**
     * Value for DISABLED static option.
     *
     * @var        string
     */
    public static $optDISABLED = 'DISABLED';
    
    //
    /**
     * Value for id_domain static option.
     *
     * @var        string
     */
    public static $fieldIdDomain = 'id_domain';
    
    /**
     * Value for host static option.
     *
     * @var        int
     */
    public static $fieldHost = 'host';
    
    /**
     * Value for hostname static option.
     *
     * @var        string
     */
    public static $fieldHostname = 'hostname';
    
    /**
     * Value for protocol static option.
     *
     * @var        string
     */
    public static $fieldProtocol = 'protocol';
    
    /**
     * Value for port static option.
     *
     * @var        string
     */
    public static $fieldPort = 'port';
    
    /**
     * Value for origin static option.
     *
     * @var        int
     */
    public static $fieldOrigin = 'origin';
    
    /**
     * Value for estado static option.
     *
     * @var        string
     */
    public static $fieldEstado = 'estado';
    
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
     * Value for id_domain field.
     *
     * @var        int
     */
    public $id_domain = null;
    
    /**
     * Value for host field.
     *
     * @var        string
     */
    public $host = '';
    
    /**
     * Value for hostname field.
     *
     * @var        string
     */
    public $hostname = '';
    
    /**
     * Value for protocol field.
     *
     * @var        string
     */
    public $protocol = '';
    
    /**
     * Value for port field.
     *
     * @var        int
     */
    public $port = 0;
    
    /**
     * Value for origin field.
     *
     * @var        string
     */
    public $origin = '';
    
    /**
     * Value for estado field.
     *
     * @var        string
     */
    public $estado = '';
    
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
  'host' => 
  array (
    'field' => 'host',
    'label' => 'Host',
    'rules' => 'trim|max_length[450]|required',
  ),
  'hostname' => 
  array (
    'field' => 'hostname',
    'label' => 'Hostname',
    'rules' => 'trim|max_length[450]|required',
  ),
  'protocol' => 
  array (
    'field' => 'protocol',
    'label' => 'Protocol',
    'rules' => 'trim|max_length[10]|required',
  ),
  'port' => 
  array (
    'field' => 'port',
    'label' => 'Port',
    'rules' => 'trim|max_length[11]|required',
  ),
  'origin' => 
  array (
    'field' => 'origin',
    'label' => 'Origin',
    'rules' => 'trim|max_length[450]|required',
  ),
);
    public $rules_edit = array (
  'host' => 
  array (
    'field' => 'host',
    'label' => 'Host',
    'rules' => 'trim|max_length[450]|required',
  ),
  'hostname' => 
  array (
    'field' => 'hostname',
    'label' => 'Hostname',
    'rules' => 'trim|max_length[450]|required',
  ),
  'protocol' => 
  array (
    'field' => 'protocol',
    'label' => 'Protocol',
    'rules' => 'trim|max_length[10]|required',
  ),
  'port' => 
  array (
    'field' => 'port',
    'label' => 'Port',
    'rules' => 'trim|max_length[11]|required',
  ),
  'origin' => 
  array (
    'field' => 'origin',
    'label' => 'Origin',
    'rules' => 'trim|max_length[450]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->domain = new Model_Domains();
        return $this->domain;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdDomain()
    {
        return $this->id_domain;
    }
    
    public function getHost()
    {
        return $this->host;
    }
    
    public function getHostname()
    {
        return $this->hostname;
    }
    
    public function getProtocol()
    {
        return $this->protocol;
    }
    
    public function getPort()
    {
        return $this->port;
    }
    
    public function getOrigin()
    {
        return $this->origin;
    }
    
    public function getEstado()
    {
        return $this->estado;
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
    

    
    public function setIdDomain($idDomain = ''){
        if(objectHas($this,'id_domain', false)){
            return $this->id_domain = $idDomain;
        }
    }
    
    public function setHost($host = ''){
        if(objectHas($this,'host', false)){
            return $this->host = $host;
        }
    }
    
    public function setHostname($hostname = ''){
        if(objectHas($this,'hostname', false)){
            return $this->hostname = $hostname;
        }
    }
    
    public function setProtocol($protocol = ''){
        if(objectHas($this,'protocol', false)){
            return $this->protocol = $protocol;
        }
    }
    
    public function setPort($port = ''){
        if(objectHas($this,'port', false)){
            return $this->port = $port;
        }
    }
    
    public function setOrigin($origin = ''){
        if(objectHas($this,'origin', false)){
            return $this->origin = $origin;
        }
    }
    
    public function setEstado($estado = ''){
        if(objectHas($this,'estado', false)){
            return $this->estado = $estado;
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
    

    
    public function findOneByIdDomain($idDomain,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_domain' => $idDomain],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByHost($host,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['host' => $host],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByHostname($hostname,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['hostname' => $hostname],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByProtocol($protocol,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['protocol' => $protocol],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPort($port,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['port' => $port],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByOrigin($origin,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['origin' => $origin],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByEstado($estado,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['estado' => $estado],false,true,$orderBy,$direction);
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
    

    
    public function filterByIdDomain($idDomain, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_domain'] = $idDomain;

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
    
    public function filterByHost($host, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['host'] = $host;

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
    
    public function filterByHostname($hostname, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['hostname'] = $hostname;

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
    
    public function filterByProtocol($protocol, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['protocol'] = $protocol;

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
    
    public function filterByPort($port, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['port'] = $port;

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
    
    public function filterByOrigin($origin, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['origin'] = $origin;

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
    
    public function filterByEstado($estado, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['estado'] = $estado;

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
    

    public function getNewDomain()
    {
        $post = $this->input->post();

        $this->domain = $this->setFromData($post);

        return $this->domain;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los domains
        $oDomains = $this->get();

        

        $oModelDomains = array();

        foreach ($oDomains as $domain){

            $oModelDomains[] = $this->setForeigns($domain);
        }
        return $oModelDomains;
    }

    public function setFromData($oData, $oDomain = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oDomain)){

                $oModelDomains = $oDomain;

            } else {

                $oModelDomains = new Model_Domains();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelDomains->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelDomains->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelDomains->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelDomains->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelDomains->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelDomains->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelDomains->$dataKey = $dataValue;
            }
            return $oModelDomains;

        } else {

            return new Model_Domains();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_domain' => $this->id_domain,
            
            'host' => $this->host,
            
            'hostname' => $this->hostname,
            
            'protocol' => $this->protocol,
            
            'port' => $this->port,
            
            'origin' => $this->origin,
            
            'estado' => $this->estado,
            
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
            
            'IdDomain' => $this->id_domain,
            
            'Host' => $this->host,
            
            'Hostname' => $this->hostname,
            
            'Protocol' => $this->protocol,
            
            'Port' => $this->port,
            
            'Origin' => $this->origin,
            
            'Estado' => $this->estado,
            
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
