<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 23/07/2018
 * Time: 16:30
 */

class restrictController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $this->loadTemplate('restrict', $data);
    }
}