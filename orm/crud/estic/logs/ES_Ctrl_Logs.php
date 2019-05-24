<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 12:02 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_Logs extends ES_Estic_Controller
{
    public static $initialized;
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("estic/model_logs");

        if(isset($this->model_logs)){

            $this->model_initialized = $this->model_logs;

        } else if(isset($this->CI_global->model_logs)){

            $this->model_initialized = $this->CI_global->model_logs;
        }
        //validateUserSavedForRolling2
        $this->subjectP = 'logs';
        $this->subjectS = 'log';
    }

    public function init(){
        
        $this->initLoaded();
        
        
        
        $this->data['tabName'] = $this->model_logs->_table_name;
        
        
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setLogs($oData, $oLogs = null)
    {
        $oModelLogs = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oLogs)) {

                        $oModelLogs[$key] = $oLogs;

                    } else {

                        $oModelLogs[$key] = new Model_Logs();
                    }
                    $oModelLogs[$key] = $oModelLogs[$key]->setFromData($data);
                }
            } else {

                if (isObject($oLogs)) {

                    $oModelLogs[0] = $oLogs;

                } else {

                    $oModelLogs[0] = new Model_Logs();
                }
                $oModelLogs[0] = $oModelLogs[0]->setFromData($oData);
            }

            return $oModelLogs;

        } else if (isArray($oLogs) || isObject($oLogs)) {

            return $this->setLogs($oLogs);

        } else {

            $oModelLogs[] = new Model_Logs();

            return $oModelLogs;
        }
    }

    
}
