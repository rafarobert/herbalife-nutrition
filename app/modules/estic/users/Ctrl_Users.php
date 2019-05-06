<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 06/05/2019
 * Time: 3:02 am
 * @property Model_Users $oUser
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_Users extends ES_Ctrl_Users
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

        $oUsers = $this->model_users->find();

        $this->data["oUsers"] = $oUsers;

        return $this->loadView('estic/users/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_users->rules_edit;

            $oUser = $this->model_users->findOneByIdUser($id);

            if (!count((array)$oUser)) {

                $this->data["errors"][] = "El user no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_users->rules;

            $oUser = $this->model_users->getNewUser();
        }
        
        // revisa esta seccion despues de cada migracion
        $oUser = $this->model_users->setThumbs($oUser,$oUser->getIdsfiles());
        
        if(is_object($oUser)){

            $this->form_validation->set_rules($rules);
            

            $this->data['oUser'] = $oUser;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oUser = $this->model_users->getDataFromPost($oUser);
                //validateFieldImgUpload1
                
                if ($id == NULL) {
                    $data["password"] = $this->input->post('password');
                }
                
                if ($this->error == 'ok') {
                    $data = $oUser->saveOrUpdate($id);
                    
                    $oUserRole = $this->model_users_roles->findOneByIdUser($oUser->getIdUser());
                    if(isObject($oUserRole)){
                        $oUserRole->saveOrUpdate($data);
                    } else {
                        $this->model_users_roles->save($data);
                    }
                    
                    
                    $oPersona = $this->model_personas->findOneByIdUser($oUser->getIdUser());
                    if(isObject($oPersona)){
                        $oPersona->saveOrUpdate($data);
                    } else {
                        $this->model_personas->save($data);
                    }
                    
                    
                    if($this->input->post('idCurso') || $this->input->post('id_curso')){
                        $oEstudiante = $this->model_estudiantes->findOneByIdUser($oUser->getIdUser());
                        if(isObject($oUser)){
                            $oUser->saveOrUpdate($data);
                        } else {
                            $this->model_estudiantes->save($data);
                        }
                    }
                    
                    //validateFieldImgUpload2
                    $this->data['oUser'] = $oUser;
                    return $this->returnResponse($oUser);
                } else {
                    return $this->returnResponse($oUser);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "User con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('estic/users/edit', $this->error);
        } else {
            redirect('estic/users/index');
        }
    }
    
}