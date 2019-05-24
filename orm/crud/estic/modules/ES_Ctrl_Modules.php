<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Modules extends ES_Estic_Controller
{
    public static $initialized;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_modules");

        if(isset($this->model_modules)){

            $this->model_initialized = $this->model_modules;

        } else if(isset($this->CI_global->model_modules)){

            $this->model_initialized = $this->CI_global->model_modules;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'modules';
        $this->subjectS = 'module';
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
        
        
        $this->data['tabName'] = $this->model_modules->_table_name;
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setModules($oData, $oModules = null)
    {
        $oModelModules = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oModules)) {

                        $oModelModules[$key] = $oModules;

                    } else {

                        $oModelModules[$key] = new Model_Modules();
                    }
                    $oModelModules[$key] = $oModelModules[$key]->setFromData($data);
                }
            } else {

                if (isObject($oModules)) {

                    $oModelModules[0] = $oModules;

                } else {

                    $oModelModules[0] = new Model_Modules();
                }
                $oModelModules[0] = $oModelModules[0]->setFromData($oData);
            }

            return $oModelModules;

        } else if (isArray($oModules) || isObject($oModules)) {

            return $this->setModules($oModules);

        } else {

            $oModelModules[] = new Model_Modules();

            return $oModelModules;
        }
    }

    
}
