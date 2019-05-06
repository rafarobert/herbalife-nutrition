<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:02 am
 * @property Model_Tables_roles $oTableRole
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Tables_roles extends ES_Ctrl_Tables_roles
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

        $oTablesRoles = $this->model_tables_roles->find();

        $this->data["oTablesRoles"] = $oTablesRoles;

        return $this->loadView('estic/tables_roles/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_tables_roles->rules_edit;

            $oTableRole = $this->model_tables_roles->findOneByIdTableRole($id);

            if (!count((array)$oTableRole)) {

                $this->data["errors"][] = "El table_role no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_tables_roles->rules;

            $oTableRole = $this->model_tables_roles->getNewTableRole();
        }
        //validateFieldImgUpload3
        if(is_object($oTableRole)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oTableRole'] = $oTableRole;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oTableRole = $this->model_tables_roles->getDataFromPost($oTableRole);
                //validateFieldImgUpload1
                //validateFieldPassword
                if ($this->error == 'ok') {
                    $data = $oTableRole->saveOrUpdate($id);
                    //validateUserSavedForRolling1
                    //validateUsersSavedForPersonTable1
                    //validateUsersSavedForEstudentTable1
                    //validateFieldImgUpload2
                    $this->data['oTableRole'] = $oTableRole;
                    return $this->returnResponse($oTableRole);
                } else {
                    return $this->returnResponse($oTableRole);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "Table Role con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/tables_roles/edit', $this->error);
        } else {
            redirect('estic/tables_roles/index');
        }
    }
    
}