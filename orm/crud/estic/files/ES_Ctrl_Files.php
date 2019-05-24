<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Files extends ES_Estic_Controller
{
    public static $initialized;
    
    public $files;
    
    public $users;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_files");

        if(isset($this->model_files)){

            $this->model_initialized = $this->model_files;

        } else if(isset($this->CI_global->model_files)){

            $this->model_initialized = $this->CI_global->model_files;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'files';
        $this->subjectS = 'file';
    }

    public function init(){
        
        if(!validate_modulo('estic','files')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_files");
        
        if(!validate_modulo('estic','users')){
            return $this->getInstance();
        }
        $this->load->model("estic/model_users");
        
        $this->initLoaded();
        
        $this->s = $this->model_files->filterByThumbMarker('',array (
  0 => 'name',
),false);
        
        
        $this->users = $this->model_users->selectBy(array (
  0 => 'name',
  1 => 'lastname',
));
        
        
        $this->data['tabName'] = $this->model_files->_table_name;
        
        $this->data['oUsers'] = $this->model_users->setOptions($this->users);
        
        
        $this->data['oS'] =  $this->model_files->setOptions($this->s);
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setFiles($oData, $oFiles = null)
    {
        $oModelFiles = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oFiles)) {

                        $oModelFiles[$key] = $oFiles;

                    } else {

                        $oModelFiles[$key] = new Model_Files();
                    }
                    $oModelFiles[$key] = $oModelFiles[$key]->setFromData($data);
                }
            } else {

                if (isObject($oFiles)) {

                    $oModelFiles[0] = $oFiles;

                } else {

                    $oModelFiles[0] = new Model_Files();
                }
                $oModelFiles[0] = $oModelFiles[0]->setFromData($oData);
            }

            return $oModelFiles;

        } else if (isArray($oFiles) || isObject($oFiles)) {

            return $this->setFiles($oFiles);

        } else {

            $oModelFiles[] = new Model_Files();

            return $oModelFiles;
        }
    }

    
}
