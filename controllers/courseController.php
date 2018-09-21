<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 19/07/2018
 * Time: 10:36
 */

class courseController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $u = new Users();
        $c = new Course();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['listCourse'] = $c->getAllCourse();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }
        $this->loadTemplate('course', $data);
    }

    public function add() {
        $u = new Users();
        $c = new Course();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }
        if(isset($_POST['course-title']) && !empty($_POST['course-title'])) {
            $title = $_POST['course-title'];
            if(isset($_POST['course-description']) && !empty($_POST['course-description'])) {
                $description = $_POST['course-description'];
            } else {
                $description = null;
            }
            $c->addCourse($title, $description);
            $data['feedback'] = 'Curso Adicionado!';
        }

        $this->loadTemplate('course_add', $data);
    }

    public function edit($id) {
        $u = new Users();
        $c = new Course();
        $l = new Lesson();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['courseData'] = $c->getCourseEdit($id);
        $data['listLessonAddToCourse'] = $c->getLessonAddToCourse($id);
        $data['listLesson'] = $l->getAllLesson();

        if(empty($id) || $data['courseData'] == null) {
            header('location: '.BASE_URL.'course');
        }

        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }

        if(isset($_POST['check-content'])) {
            foreach($_POST['check-content'] as $rs) {
                $c->addLessonToCourse($id, $rs);
            }
            header('location: '.$_SERVER['REQUEST_URI']);
        }
        if(isset($_POST['course-title']) && !empty($_POST['course-title'])) {
            $title = $_POST['course-title'];
            if(isset($_POST['course-description']) && !empty($_POST['course-description'])) {
                $description = $_POST['course-description'];
            } else {
                $description = null;
            }
            $c->editCourse($id, $title, $description);
            $data['feedback'] = "Dados alterados!";
        }
        $this->loadTemplate('course_edit', $data);
    }
    public function del($id) {
        $data = array();
        $u = new Users();
        $c = new Course();
        $u->setLoggedUser();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                $c->moveCourseToTrash($id);
            }
        }
    }

    /*Funções responsáveis por manipular os conteúdos vinculados às aulas*/

    public function deleteLesson($idCourse, $idLesson) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $c = new Course();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                if($c->deleteLessonAddToCourse($idCourse, $idLesson)) {
                    echo 'Conteúdo Deletado!';
                }
            } else {
                header('location: '.BASE_URL.'restrict');
            }
        }
    }


}