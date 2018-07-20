<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/07/2018
 * Time: 14:29
 */

class trashController extends Controller {

    public function index() {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['listContent'] = $t->getDataInactive('content');

        $this->loadTemplate('trash', $data);
    }

    public function recoveryContent($id) {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();

        if(!empty($id)) {
            $t->recoveryDataInactive($id, 'content');
        }


    }

}