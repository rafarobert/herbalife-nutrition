<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Provincias extends ES_Estic_Controller
{
    public static $initialized;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_provincias");

        if(isset($this->model_provincias)){

            $this->model_initialized = $this->model_provincias;

        } else if(isset($this->CI_global->model_provincias)){

            $this->model_initialized = $this->CI_global->model_provincias;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'provincias';
        $this->subjectS = 'provincia';
    }

    public function init(){
        
        $this->initLoaded();
        
        
        
        $this->data['tabName'] = $this->model_provincias->_table_name;
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setProvincias($oData, $oProvincias = null)
    {
        $oModelProvincias = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oProvincias)) {

                        $oModelProvincias[$key] = $oProvincias;

                    } else {

                        $oModelProvincias[$key] = new Model_Provincias();
                    }
                    $oModelProvincias[$key] = $oModelProvincias[$key]->setFromData($data);
                }
            } else {

                if (isObject($oProvincias)) {

                    $oModelProvincias[0] = $oProvincias;

                } else {

                    $oModelProvincias[0] = new Model_Provincias();
                }
                $oModelProvincias[0] = $oModelProvincias[0]->setFromData($oData);
            }

            return $oModelProvincias;

        } else if (isArray($oProvincias) || isObject($oProvincias)) {

            return $this->setProvincias($oProvincias);

        } else {

            $oModelProvincias[] = new Model_Provincias();

            return $oModelProvincias;
        }
    }

    
}
