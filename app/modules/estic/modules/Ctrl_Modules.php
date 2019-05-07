<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 07/05/2019
 * Time: 1:11 am
 * @property Model_Modules $oModule
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Modules extends ES_Ctrl_Modules
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

        $oModules = $this->model_modules->find();

        $this->data["oModules"] = $oModules;

        return $this->loadView('estic/modules/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_modules->rules_edit;

            $oModule = $this->model_modules->findOneByIdModule($id);

            if (!count((array)$oModule)) {

                $this->data["errors"][] = "El module no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_modules->rules;

            $oModule = $this->model_modules->getNewModule();
        }
        //validateFieldImgUpload3
        if(is_object($oModule)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oModule'] = $oModule;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oModule = $this->model_modules->getDataFromPost($oModule);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oModule->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oModule'] = $oModule;
                    return $this->returnResponse($oModule);
                } else {
                    return $this->returnResponse($oModule);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Module con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/modules/edit', $this->error);
        } else {
            redirect('estic/modules/index');
        }
    }
    
}