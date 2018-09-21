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

    public function add() {
        $data = array();
        $u = new Users();
        $g = new Group();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        
        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
       
        if(isset($_POST['group-title']) && !empty($_POST['group-title'])) {
            $title = addslashes($_POST['group-title']);           
            if(isset($_POST['group-description'])) {
                $description = addslashes($_POST['group-description']);
            } else {
                $description = null;
            } 
            if($g->addGroup($title,$description)) {
                $data['feedback_success'] = 'Grupo adicionado com sucesso!';
            } else {
                $data['feedback_error'] = 'Ocorreu algum erro!';
            }
        }         
        $this->loadTemplate('group_add', $data);
    }

    public function edit($id) {
        $u = new Users();
        $g = new Group();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['courseData'] = $c->getCourseEdit($id);
        $data['listClassAddToGroup'] = $c->getLessonAddToCourse($id);
        $data['listClass'] = $c->getAllClass();

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
}