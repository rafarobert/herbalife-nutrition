<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/28/2017
 * Time: 1:07 AM
 */

class MY_Session extends CI_Session {
    function sess_update() {
        // Listen to HTTP_X_REQUESTED_WIRH
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest'){
            parent::sess_update();
        }
    }
}