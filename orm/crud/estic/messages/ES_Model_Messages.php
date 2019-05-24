<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_Messages extends ES_Estic_Model
{
    protected $_timestaps = true;
    protected $_order_by = "id_message desc";
    public $_primary_key = "id_message";
    public $_table_name = "es_messages";
    public $_es_class = "ES_Model_Messages";

    
    //
    /**
     * Value for id_message static option.
     *
     * @var        int
     */
    public static $fieldIdMessage = 'id_message';
    
    /**
     * Value for phone_number static option.
     *
     * @var        int
     */
    public static $fieldPhoneNumber = 'phone_number';
    
    /**
     * Value for country_code static option.
     *
     * @var        string
     */
    public static $fieldCountryCode = 'country_code';
    
    /**
     * Value for authy_id static option.
     *
     * @var        string
     */
    public static $fieldAuthyId = 'authy_id';
    
    /**
     * Value for verified static option.
     *
     * @var        string
     */
    public static $fieldVerified = 'verified';
    
    
    /**
     * Value for id_message field.
     *
     * @var        int
     */
    public $id_message = null;
    
    /**
     * Value for phone_number field.
     *
     * @var        string
     */
    public $phone_number = '';
    
    /**
     * Value for country_code field.
     *
     * @var        string
     */
    public $country_code = '';
    
    /**
     * Value for authy_id field.
     *
     * @var        string
     */
    public $authy_id = '';
    
    /**
     * Value for verified field.
     *
     * @var        int
     */
    public $verified = 0;
    

    

    public $rules = array (
  'phone_number' => 
  array (
    'field' => 'phoneNumber',
    'label' => 'Phone Number',
    'rules' => 'trim|max_length[100]|required',
  ),
  'country_code' => 
  array (
    'field' => 'countryCode',
    'label' => 'Country Code',
    'rules' => 'trim|max_length[50]|required',
  ),
  'authy_id' => 
  array (
    'field' => 'authyId',
    'label' => 'Authy Id',
    'rules' => 'trim|max_length[50]|required',
  ),
  'verified' => 
  array (
    'field' => 'verified',
    'label' => 'Verified',
    'rules' => 'trim|max_length[1]|required',
  ),
);
    public $rules_edit = array (
  'phone_number' => 
  array (
    'field' => 'phoneNumber',
    'label' => 'Phone Number',
    'rules' => 'trim|max_length[100]|required',
  ),
  'country_code' => 
  array (
    'field' => 'countryCode',
    'label' => 'Country Code',
    'rules' => 'trim|max_length[50]|required',
  ),
  'authy_id' => 
  array (
    'field' => 'authyId',
    'label' => 'Authy Id',
    'rules' => 'trim|max_length[50]|required',
  ),
  'verified' => 
  array (
    'field' => 'verified',
    'label' => 'Verified',
    'rules' => 'trim|max_length[1]|required',
  ),
);
    

    function __construct()
    {
        parent::__construct();
    }

    public function getNew()
    {
        $this->message = new Model_Messages();
        return $this->message;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    
    public function getIdMessage()
    {
        return $this->id_message;
    }
    
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }
    
    public function getCountryCode()
    {
        return $this->country_code;
    }
    
    public function getAuthyId()
    {
        return $this->authy_id;
    }
    
    public function getVerified()
    {
        return $this->verified;
    }
    

    

    
    public function setIdMessage($idMessage = ''){
        if(objectHas($this,'id_message', false)){
            return $this->id_message = $idMessage;
        }
    }
    
    public function setPhoneNumber($phoneNumber = ''){
        if(objectHas($this,'phone_number', false)){
            return $this->phone_number = $phoneNumber;
        }
    }
    
    public function setCountryCode($countryCode = ''){
        if(objectHas($this,'country_code', false)){
            return $this->country_code = $countryCode;
        }
    }
    
    public function setAuthyId($authyId = ''){
        if(objectHas($this,'authy_id', false)){
            return $this->authy_id = $authyId;
        }
    }
    
    public function setVerified($verified = ''){
        if(objectHas($this,'verified', false)){
            return $this->verified = $verified;
        }
    }
    

    
    public function findOneByIdMessage($idMessage,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['id_message' => $idMessage],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByPhoneNumber($phoneNumber,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['phone_number' => $phoneNumber],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByCountryCode($countryCode,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['country_code' => $countryCode],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByAuthyId($authyId,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['authy_id' => $authyId],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    
    public function findOneByVerified($verified,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['verified' => $verified],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    

    
    public function filterByIdMessage($idMessage, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['id_message'] = $idMessage;

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
    
    public function filterByPhoneNumber($phoneNumber, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['phone_number'] = $phoneNumber;

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
    
    public function filterByCountryCode($countryCode, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['country_code'] = $countryCode;

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
    
    public function filterByAuthyId($authyId, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['authy_id'] = $authyId;

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
    
    public function filterByVerified($verified, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
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
        $aSetttings['verified'] = $verified;

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
    

    public function getNewMessage()
    {
        $post = $this->input->post();

        $this->message = $this->setFromData($post);

        return $this->message;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los messages
        $oMessages = $this->get();

        

        $oModelMessages = array();

        foreach ($oMessages as $message){

            $oModelMessages[] = $this->setForeigns($message);
        }
        return $oModelMessages;
    }

    public function setFromData($oData, $oMessage = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oMessage)){

                $oModelMessages = $oMessage;

            } else {

                $oModelMessages = new Model_Messages();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelMessages->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelMessages->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelMessages->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelMessages->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelMessages->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelMessages->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelMessages->$dataKey = $dataValue;
            }
            return $oModelMessages;

        } else {

            return new Model_Messages();
        }
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            
            'id_message' => $this->id_message,
            
            'phone_number' => $this->phone_number,
            
            'country_code' => $this->country_code,
            
            'authy_id' => $this->authy_id,
            
            'verified' => $this->verified,
            
        );
        if($bWithForeign){
            
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
            
            'IdMessage' => $this->id_message,
            
            'PhoneNumber' => $this->phone_number,
            
            'CountryCode' => $this->country_code,
            
            'AuthyId' => $this->authy_id,
            
            'Verified' => $this->verified,
            
        );
        if($bWithForeign){
            
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
