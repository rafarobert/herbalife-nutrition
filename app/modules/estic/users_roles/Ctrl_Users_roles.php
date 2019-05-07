<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 07/05/2019
 * Time: 1:10 am
 * @property Model_Users_roles $oUserRole
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Users_roles extends ES_Ctrl_Users_roles
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

        $oUsersRoles = $this->model_users_roles->find();

        $this->data["oUsersRoles"] = $oUsersRoles;

        return $this->loadView('estic/users_roles/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_users_roles->rules_edit;

            $oUserRole = $this->model_users_roles->findOneByIdUserRole($id);

            if (!count((array)$oUserRole)) {

                $this->data["errors"][] = "El user_role no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_users_roles->rules;

            $oUserRole = $this->model_users_roles->getNewUserRole();
        }
        //validateFieldImgUpload3
        if(is_object($oUserRole)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oUserRole'] = $oUserRole;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oUserRole = $this->model_users_roles->getDataFromPost($oUserRole);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oUserRole->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oUserRole'] = $oUserRole;
                    return $this->returnResponse($oUserRole);
                } else {
                    return $this->returnResponse($oUserRole);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "User Role con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/users_roles/edit', $this->error);
        } else {
            redirect('estic/users_roles/index');
        }
    }
    
}