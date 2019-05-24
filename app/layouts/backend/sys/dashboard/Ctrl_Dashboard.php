<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/2/2017
 * Time: 12:34
 */

class Ctrl_Dashboard extends ES_Estic_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->data['siteTitle'] = config_item('sys_title');
        if(validate_modulo('base','users')){
            $id_user = $this->session->getIdUserLoggued() ;
            $oUser = $this->model_users->get($id_user);
            if (is_object($oUser)){
                $this->data['oUser'] = $oUser;
                $this->data['subview'] = 'sys/dashboard/index';
            } else {
                $this->data['subLayout'] = 'pages/login';
            }
        } else {
            $this->data['subLayout'] = 'pages/building';
        }
    }

    public function modal(){
        $this->data['subLayout'] = 'pages/login';
    }
}
