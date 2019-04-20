<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 7/1/2017
 * Time: 1:56 AM
 */

class Ctrl_Dashboard extends ES_Frontend_Constroller {

    function __construct()
    {
        parent::__construct();

        $ngIndex = ROOTPATH."ngestic/src/index.html";

        if(file_exists($ngIndex))
        {
            $this->data['ngIndex'] = $ngIndex;

        } else {

            $this->data['subLayout'] = 'pages/building';
        }
    }

    public function index(){
        $this->data['subview'] = 'login';
    }
}
