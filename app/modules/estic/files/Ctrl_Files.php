<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 07/05/2019
 * Time: 1:11 am
 * @property Model_Files $oFile
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Files extends ES_Ctrl_Files
{

    private static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function getInstance(){
        return self::$instance;
    }

    public function toBePrinted(){
        $this->printView = true;
        return self::$instance;
    }

    public static function create($bWithInit = false)
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        if($bWithInit){
            self::$instance->init();
        } else if(!self::$initialized){
            self::$instance->init();
        }
        return self::$instance;
    }

    public function index($view = NULL, $id = NULL)
    {
        $this->init();

        list($id, $view) = $this->filterIdOrView($id, $view);

        $oFiles = $this->model_files->find();

        $this->data["oFiles"] = $oFiles;

        return $this->loadView('estic/files/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_files->rules_edit;

            $oFile = $this->model_files->findOneByIdFile($id);

            if (!count((array)$oFile)) {

                $this->data["errors"][] = "El file no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_files->rules;

            $oFile = $this->model_files->getNewFile();
        }
        //validateFieldImgUpload3
        if(is_object($oFile)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oFile'] = $oFile;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oFile = $this->model_files->getDataFromPost($oFile);
                
                $oFile = $this->doUpload($oFile);
                
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oFile->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    
                    $oFile = $this->saveThumbs($oFile);
                    
                    $this->data['oFile'] = $oFile;
                    return $this->returnResponse($oFile);
                } else {
                    return $this->returnResponse($oFile);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "File con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/files/edit', $this->error);
        } else {
            redirect('estic/files/index');
        }
    }
    
}