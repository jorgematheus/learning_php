<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/07/2018
 * Time: 14:29
 */

class trashController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['listContent'] = $t->getDataInactiveContent();
        $data['listLesson'] = $t->getDataInactiveLesson();
        $data['listCourse'] = $t->getDataInactiveCourse();
        $data['listClass'] = $t->getDataInactiveClass();
        $data['listGroup'] = $t->getDataInactiveGroup();
        $data['permission'] = $u->getTypeUser();

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        $this->loadTemplate('trash', $data);
    }

    public function recoveryContent($id) {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        if(!empty($id)) {
            $t->recoveryDataInactive($id, 'content');
        }
    }

    public function recoveryLesson($id) {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        if(!empty($id)) {
            $t->recoveryDataInactive($id, 'lesson');
        }
    }

    public function recoveryCourse($id) {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        if(!empty($id)) {
            $t->recoveryDataInactive($id, 'course');
        }
    }

    public function recoveryClass($id) {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        if(!empty($id)) {
            $t->recoveryDataInactive($id, 'class');
        }
    }

    public function recoveryGroup($id) {
        $data = array();
        $u = new Users();
        $t = new Trash();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        if(!empty($id)) {
            $t->recoveryDataInactive($id, 'group_user');
        } else {
            header('location: '.BASE_URL.'group');
        }
    }

}