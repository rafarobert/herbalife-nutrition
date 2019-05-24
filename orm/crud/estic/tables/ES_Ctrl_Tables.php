<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Tables extends ES_Estic_Controller
{
    public static $initialized;
    
    public $modules;
    
    public $roles;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_tables");

        if(isset($this->model_tables)){

            $this->model_initialized = $this->model_tables;

        } else if(isset($this->CI_global->model_tables)){

            $this->model_initialized = $this->CI_global->model_tables;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'tables';
        $this->subjectS = 'table';
    }

    public function init(){
        
        if(!validate_modulo('estic','modules')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_modules");
        
        if(!validate_modulo('estic','roles')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_roles");
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        $this->initLoaded();
        
        
        $this->modules = $this->model_modules->selectBy(array (
  0 => 'name',
));
        
        $this->roles = $this->model_roles->selectBy(array (
  0 => 'name',
));
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        
        $this->data['tabName'] = $this->model_tables->_table_name;
        
        $this->data['oModules'] = $this->model_modules->setOptions($this->modules);
        
        $this->data['oRoles'] = $this->model_roles->setOptions($this->roles);
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setTables($oData, $oTables = null)
    {
        $oModelTables = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oTables)) {

                        $oModelTables[$key] = $oTables;

                    } else {

                        $oModelTables[$key] = new Model_Tables();
                    }
                    $oModelTables[$key] = $oModelTables[$key]->setFromData($data);
                }
            } else {

                if (isObject($oTables)) {

                    $oModelTables[0] = $oTables;

                } else {

                    $oModelTables[0] = new Model_Tables();
                }
                $oModelTables[0] = $oModelTables[0]->setFromData($oData);
            }

            return $oModelTables;

        } else if (isArray($oTables) || isObject($oTables)) {

            return $this->setTables($oTables);

        } else {

            $oModelTables[] = new Model_Tables();

            return $oModelTables;
        }
    }

    
}
