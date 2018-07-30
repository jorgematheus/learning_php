<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 30/07/2018
 * Time: 16:02
 */

class lessonController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $l = new Lesson();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission']!= '2') {
            header('location: '.BASE_URL.'restrict');
        }
        $data['listLesson'] = $l->getAllLesson();
        $this->loadTemplate('lesson', $data);

    }

    public function add() {
        $data = array();
        $u = new Users();
        $l = new Lesson();
        $c = new Content();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }
        $data['listContent'] = $c->getAllContent();

        if(isset($_POST['lesson-title']) && !empty($_POST['lesson-title'])) {
            $title = $_POST['lesson-title'];
            if(isset($_POST['lesson-description']) && !empty($_POST['lesson-description'])) {
                $description = $_POST['lesson-description'];
            } else {
                $description = null;
            }
            $l->addLesson($title, $description);
            header('location: '.BASE_URL.'lesson');
        }


        $this->loadTemplate('lesson_add', $data);
    }
}