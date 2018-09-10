<?php

class notFoundController extends Controller {

    public function __construct() {
        $u = new Users();
        if (!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $this->loadTemplate('404', $data);
    }
}

?>