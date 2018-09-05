<?php 

class groupController extends Controller {

    public function  __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $g = new Group();
        $u->setLoggedUser();
        $data['listGroup'] = $g->getAllGroup();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }

        $this->loadTemplate('group', $data);
    }
}