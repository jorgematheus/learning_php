<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 18/07/2018
 * Time: 17:24
 */

class profileController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $this->loadTemplate('my_profile', $data);
    }
}