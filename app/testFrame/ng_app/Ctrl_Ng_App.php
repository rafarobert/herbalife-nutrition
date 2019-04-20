<?php
defined('BASEPATH') OR exit('No direct script access allowed');

final class Ctrl_Ng_app extends ES_Frontend_Constroller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view("_layout_front", $this->data);
    }
}
//End of file applications/controller/Angular.php