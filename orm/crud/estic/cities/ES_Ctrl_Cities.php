<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Cities extends ES_Estic_Controller
{
    public static $initialized;
    
    public $cities;
    
    public $files;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_cities");

        if(isset($this->model_cities)){

            $this->model_initialized = $this->model_cities;

        } else if(isset($this->CI_global->model_cities)){

            $this->model_initialized = $this->CI_global->model_cities;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'cities';
        $this->subjectS = 'citie';
    }

    public function init(){
        
        if(!validate_modulo('estic','cities')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_cities");
        
        if(!validate_modulo('estic','files')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_files");
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        $this->initLoaded();
        
        $this->capitals = $this->model_cities->filterByTipo('capital',array (
  0 => 'name',
),false);
        
        $this->regions = $this->model_cities->filterByTipo('region',array (
  0 => 'name',
),false);
        
        
        $this->files = $this->model_files->selectBy(array (
  0 => 'name',
));
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        
        $this->data['tabName'] = $this->model_cities->_table_name;
        
        $this->data['oFiles'] = $this->model_files->setOptions($this->files);
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        $this->data['oCapitals'] =  $this->model_cities->setOptions($this->capitals);
        
        $this->data['oRegions'] =  $this->model_cities->setOptions($this->regions);
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setCities($oData, $oCities = null)
    {
        $oModelCities = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oCities)) {

                        $oModelCities[$key] = $oCities;

                    } else {

                        $oModelCities[$key] = new Model_Cities();
                    }
                    $oModelCities[$key] = $oModelCities[$key]->setFromData($data);
                }
            } else {

                if (isObject($oCities)) {

                    $oModelCities[0] = $oCities;

                } else {

                    $oModelCities[0] = new Model_Cities();
                }
                $oModelCities[0] = $oModelCities[0]->setFromData($oData);
            }

            return $oModelCities;

        } else if (isArray($oCities) || isObject($oCities)) {

            return $this->setCities($oCities);

        } else {

            $oModelCities[] = new Model_Cities();

            return $oModelCities;
        }
    }

    
}
