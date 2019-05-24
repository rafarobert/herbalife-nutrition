<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 10/05/2019
 * Time: 12:56 am
 * @property Model_Roles $oRole
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Roles extends ES_Ctrl_Roles
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

        $oRoles = $this->model_roles->find();

        $this->data["oRoles"] = $oRoles;

        return $this->loadView('estic/roles/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_roles->rules_edit;

            $oRole = $this->model_roles->findOneByIdRole($id);

            if (!count((array)$oRole)) {

                $this->data["errors"][] = "El role no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_roles->rules;

            $oRole = $this->model_roles->getNewRole();
        }
        //validateFieldImgUpload3
        if(is_object($oRole)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oRole'] = $oRole;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oRole = $this->model_roles->getDataFromPost($oRole);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oRole->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oRole'] = $oRole;
                    return $this->returnResponse($oRole);
                } else {
                    return $this->returnResponse($oRole);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Role con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/roles/edit', $this->error);
        } else {
            redirect('estic/roles/index');
        }
    }
    
}