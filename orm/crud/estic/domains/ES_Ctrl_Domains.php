<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Domains extends ES_Estic_Controller
{
    public static $initialized;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_domains");

        if(isset($this->model_domains)){

            $this->model_initialized = $this->model_domains;

        } else if(isset($this->CI_global->model_domains)){

            $this->model_initialized = $this->CI_global->model_domains;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'domains';
        $this->subjectS = 'domain';
    }

    public function init(){
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        $this->initLoaded();
        
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        
        $this->data['tabName'] = $this->model_domains->_table_name;
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setDomains($oData, $oDomains = null)
    {
        $oModelDomains = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oDomains)) {

                        $oModelDomains[$key] = $oDomains;

                    } else {

                        $oModelDomains[$key] = new Model_Domains();
                    }
                    $oModelDomains[$key] = $oModelDomains[$key]->setFromData($data);
                }
            } else {

                if (isObject($oDomains)) {

                    $oModelDomains[0] = $oDomains;

                } else {

                    $oModelDomains[0] = new Model_Domains();
                }
                $oModelDomains[0] = $oModelDomains[0]->setFromData($oData);
            }

            return $oModelDomains;

        } else if (isArray($oDomains) || isObject($oDomains)) {

            return $this->setDomains($oDomains);

        } else {

            $oModelDomains[] = new Model_Domains();

            return $oModelDomains;
        }
    }

    
}
