<?php
/**
 * Created by PhpStorm.
 * User: chusa
 * Date: 5/2/2019
 * Time: 5:47 PM
 */

class Admin_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata("id")){
            // redirect('auth');
        }  
    }
}