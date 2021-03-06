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
            if($l->addLesson($title, $description)) {
                $data['feedback_success'] = 'Aula cadastrado com sucesso!';
            } else {
                $data['feedback_error'] = 'Ocorreu algum erro!';
            }
            //header('location: '.BASE_URL.'lesson');
        }
        $this->loadTemplate('lesson_add', $data);
    }

    public function edit($id) {
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
        $data['listContent'] = $l->listContent($id);
        $data['lessonData'] = $l->getLessonEdit($id);
        $data['listContentAddToLesson'] = $l->getContentAddToLesson($id);        

        if(isset($_POST['check-content'])) {
            foreach($_POST['check-content'] as $rs) {
                $l->addContentToLesson($id, $rs);                
            }
            header('location: '.$_SERVER['REQUEST_URI']);
        }
        if(isset($_POST['lesson-title']) && !empty($_POST['lesson-title'])) {
            $title = $_POST['lesson-title'];
            if(isset($_POST['lesson-description']) && !empty($_POST['lesson-description'])) {
                $description = $_POST['lesson-description'];
            } else {
                $description = null;
            }
            $l->editLesson($id, $title, $description);
            $data['feedback_success'] = "Aula alterada com sucesso!";
        }
        $this->loadTemplate('lesson_edit', $data);
    }

    public function del($id) {
        $data = array();
        $u = new Users();
        $l = new Lesson();
        $u->setLoggedUser();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                if($l->moveLessonToTrash($id)) {
                    echo 'Conteúdo Deletado!';
                } else {
                    echo 'Não foi possível deleter o usuário!';
                }
            }
        }
    }

    

    /*Funções responsáveis por manipular os conteúdos vinculados às aulas*/

    public function deleteContent($idLesson, $idContent) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $l = new Lesson();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
               $l->deleteContentAddToLesson($idLesson, $idContent); 
                
            } else {
                header('location: '.BASE_URL.'restrict');
            }
        }
    }
}