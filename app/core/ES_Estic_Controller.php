<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/8/2017
 * Time: 2:28 AM
 * @property Model_usuarios $model_usuarios
 * @property CI_Form_validation $form_validation
 * @property CI_Encryption $encryption
 * @property CI_Session $session
 * @property Model_Modulos $model_modulos
 * @property CI_Controller $CI_global
 *
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;


class ES_Estic_Controller extends ES_Backend_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->data['siteTitle'] = config_item('sys_title');
        $this->data['metaTitle'] = 'Framework Estic';

    }
}
