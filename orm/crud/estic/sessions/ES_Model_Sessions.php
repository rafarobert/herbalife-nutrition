<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Sessions extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id desc";
    public $_primary_key = "id";
    public $_table_name = "es_sessions";
    public $_es_class = "ES_Model_Sessions";

    
    //
    /**
     * Value for id static option.
     *
     * @var        int
     */
    public static $fieldId = 'id';
    
    /**
     * Value for ip_address static option.
     *
     * @var        string
     */
    public static $fieldIpAddress = 'ip_address';
    
    /**
     * Value for timestamp static option.
     *
     * @var        string
     */
    public static $fieldTimestamp = 'timestamp';
    
    /**
     * Value for data static option.
     *
     * @var        int
     */
    public static $fieldData = 'data';
    
    /**
     * Value for last_activity static option.
     *
     * @var        
     */
    public static $fieldLastActivity = 'last_activity';
    
    /**
     * Value for id_user static option.
     *
     * @var        string
     */
    public static $fieldIdUser = 'id_user';
    
    /**
     * Value for lng static option.
     *
     * @var        int
     */
    public static $fieldLng = 'lng';
    
    /**
     * Value for lat static option.
     *
     * @var        int
     */
    public static $fieldLat = 'lat';
    
    
    /**
     * Value for id field.
     *
     * @var        string
     */
    public $id = '';
    
    /**
     * Value for ip_address field.
     *
     * @var        string
     */
    public $ip_address = '';
    
    /**
     * Value for timestamp field.
     *
     * @var        int
     */
    public $timestamp = 0;
    
    /**
     * Value for data field.
     *
     * @var        
     */
    public $data = '';
    
    /**
     * Value for last_activity field.
     *
     * @var        string
     */
    public $last_activity = '';
    
    /**
     * Value for id_user field.
     *
     * @var        int
     */
    public $id_user = null;
    
    /**
     * Value for lng field.
     *
     * @var        int
     */
    public $lng = 0;
    
    /**
     * Value for lat field.
     *
     * @var        int
     */
    public $lat = 0;
    

    
    /**
     * Value for id_user field related with name.
     *
     * @var        int
     */
    public $id_user_name = null;
    
    /**
     * Value for id_user field related with lastname.
     *
     * @var        int
     */
    public $id_user_lastname = null;
    

    public $rules = array (
  'ip_address' => 
  array (
    'field' => 'ipAddress',
    'label' => 'Ip Address',
    'rules' => 'trim|max_length[45]|required',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'label' => 'Timestamp',
    'rules' => 'trim|max_length[10]|required',
  ),
  'data' => 
  array (
    'field' => 'data',
    'label' => 'Datos en sesion',
    'rules' => 'trim|required',
  ),
  'last_activity' => 
  array (
    'field' => 'lastActivity',
    'label' => 'Last Activity',
    'rules' => 'trim|required',
  ),
  'id_user' => 
  array (
    'field' => 'idUser',
    'label' => 'Nombre del Usuario',
    'rules' => 'trim|max_length[11]|required',
  ),
  'lng' => 
  array (
    'field' => 'lng',
    'label' => 'Lng',
    'rules' => 'trim|max_length[11]|required',
  ),
  'lat' => 
  array (
    'field' => 'lat',
    'label' => 'Lat',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    public $rules_edit = array (
  'ip_address' => 
  array (
    'field' => 'ipAddress',
    'label' => 'Ip Address',
    'rules' => 'trim|max_length[45]|required',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'label' => 'Timestamp',
    'rules' => 'trim|max_length[10]|required',
  ),
  'data' => 
  array (
    'field' => 'data',
    'label' => 'Datos en sesion',
    'rules' => 'trim|required',
  ),
  'last_activity' => 
  array (
    'field' => 'lastActivity',
    'label' => 'Last Activity',
    'rules' => 'trim|required',
  ),
  'id_user' => 
  array (
    'field' => 'idUser',
    'label' => 'Nombre del Usuario',
    'rules' => 'trim|max_length[11]|required',
  ),
  'lng' => 
  array (
    'field' => 'lng',
    'label' => 'Lng',
    'rules' => 'trim|max_length[11]|required',
  ),
  'lat' => 
  array (
    'field' => 'lat',
    'label' => 'Lat',
    'rules' => 'trim|max_length[11]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->session = new Model_Sessions();
        return $this->session;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getId()
    {
        return $this->id;
    }
    
    public function getIpAddress()
    {
        return $this->ip_address;
    }
    
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function getLastActivity()
    {
        return $this->last_activity;
    }
    
    public function getIdUser()
    {
        return $this->id_user;
    }
    
    public function getLng()
    {
        return $this->lng;
    }
    
    public function getLat()
    {
        return $this->lat;
    }
    

    
    public function getIdUserName()
    {
        return $this->id_user_name;
    }
    
    public function getIdUserLastname()
    {
        return $this->id_user_lastname;
    }
    

    
    public function setId($id = ''){
        if(objectHas($this,'id', false)){
            return $this->id = $id;
        }
    }
    
    public function setIpAddress($ipAddress = ''){
        if(objectHas($this,'ip_address', false)){
            return $this->ip_address = $ipAddress;
        }
    }
    
    public function setTimestamp($timestamp = ''){
        if(objectHas($this,'timestamp', false)){
            return $this->timestamp = $timestamp;
        }
    }
    
    public function setData($data = ''){
        if(objectHas($this,'data', false)){
            return $this->data = $data;
        }
    }
    
    public function setLastActivity($lastActivity = ''){
        if(objectHas($this,'last_activity', false)){
            return $this->last_activity = $lastActivity;
        }
    }
    
    public function setIdUser($idUser = ''){
        if(objectHas($this,'id_user', false)){
            return $this->id_user = $idUser;
        }
    }
    
    public function setLng($lng = ''){
        if(objectHas($this,'lng', false)){
            return $this->lng = $lng;
        }
    }
    
    public function setLat($lat = ''){
        if(objectHas($this,'lat', false)){
            return $this->lat = $lat;
        }
    }
    

    
    public function findOneById($id,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id' => $id],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIpAddress($ipAddress,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['ip_address' => $ipAddress],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByTimestamp($timestamp,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['timestamp' => $timestamp],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByData($data,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['data' => $data],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByLastActivity($lastActivity,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['last_activity' => $lastActivity],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByIdUser($idUser,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_user' => $idUser],false,true,$orderBy,$direction);
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
    

    
    public function filterById($id, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id'] = $id;

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
    
    public function filterByIpAddress($ipAddress, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['ip_address'] = $ipAddress;

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
    
    public function filterByTimestamp($timestamp, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['timestamp'] = $timestamp;

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
    
    public function filterByData($data, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['data'] = $data;

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
    
    public function filterByLastActivity($lastActivity, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['last_activity'] = $lastActivity;

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
    
    public function filterByIdUser($idUser, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_user'] = $idUser;

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
    

    public function getNewSession()
    {
        $post = $this->input->post();

        $this->session = $this->setFromData($post);

        return $this->session;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los sessions
        $oSessions = $this->get();

        

        $oModelSessions = array();

        foreach ($oSessions as $session){

            $oModelSessions[] = $this->setForeigns($session);
        }
        return $oModelSessions;
    }

    public function setFromData($oData, $oSession = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oSession)){

                $oModelSessions = $oSession;

            } else {

                $oModelSessions = new Model_Sessions();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelSessions->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelSessions->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelSessions->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelSessions->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelSessions->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelSessions->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelSessions->$dataKey = $dataValue;
            }
            return $oModelSessions;

        } else {

            return new Model_Sessions();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id' => $this->id,
            
            'ip_address' => $this->ip_address,
            
            'timestamp' => $this->timestamp,
            
            'data' => $this->data,
            
            'last_activity' => $this->last_activity,
            
            'id_user' => $this->id_user,
            
            'lng' => $this->lng,
            
            'lat' => $this->lat,
            
        );
        if($bWithForeign){
            
            $data['id_user_name'] = $this->id_user_name;
            
            $data['id_user_lastname'] = $this->id_user_lastname;
            
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
            
            'Id' => $this->id,
            
            'IpAddress' => $this->ip_address,
            
            'Timestamp' => $this->timestamp,
            
            'Data' => $this->data,
            
            'LastActivity' => $this->last_activity,
            
            'IdUser' => $this->id_user,
            
            'Lng' => $this->lng,
            
            'Lat' => $this->lat,
            
        );
        if($bWithForeign){
            
            $data['IdUserName'] = $this->id_user_name;
            
            $data['IdUserLastname'] = $this->id_user_lastname;
            
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
