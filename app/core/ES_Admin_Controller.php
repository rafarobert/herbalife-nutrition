<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/8/2017
 * Time: 2:28 AM
 *
 * @property CI_Form_validation $form_validation
 * @property CI_Encryption $encryption
 * @property CI_Session $session
 *
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;
class ES_Admin_Controller extends ES_Backend_Controller
{
    public $load;
    public $session;
    public $db;
    public $dbforge;

    function __construct()
    {
        parent::__construct();
        $this->data['siteTitle'] = config_item('site_title');
        $this->data['siteDomain'] = config_item('site_domain');
        $this->data['metaTitle'] = config_item('meta_title');
    }
}