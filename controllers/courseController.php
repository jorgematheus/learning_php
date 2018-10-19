<?php
include "helpers/image_upload.php";
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
            $img = null;
            $name_img = null;
            $photo = $_FILES['course-photo'];
            $title = $_POST['course-title'];
            $img_valid = true; //verifica se é uma imagem válida
            if(isset($_POST['course-description']) && !empty($_POST['course-description'])) {
                $description = $_POST['course-description'];
            } else {
                $description = null;
            }

            if(!empty($photo['tmp_name'])) {    
                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                    helper_image_upload(250, 250, $photo, $name_img, 'img/courses/'); 
                }  else {
                    $data['img_invalid'] = true;   
                    $img_valid = false;                
                }                                
            } else {
                $name_img = null;                
            }  
            if($name_img == null && $img_valid === true) {               
                $c->addCourse($title, $description, 'course-default-image.jpg');                
                $data['feedback_success'] = 'Curso Cadastrado!';
            } else if($name_img != null && $img_valid == true) {                                     
                echo "<script> alert('entrou no segundo if') </script>";
                $c->addCourse($title, $description, $name_img);               
                $data['feedback_success'] = 'Curso cadastrado!';
            }            
        }

        $this->loadTemplate('course_add', $data);
    }

    public function edit($id) {
        $u = new Users();
        $c = new Course();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['courseData'] = $c->getCourseEdit($id);
        $data['listLessonAddToCourse'] = $c->getLessonAddToCourse($id);
        $data['listLesson'] = $c->listLesson($id);

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
            $photo = $_FILES['course-photo'];          
            $img = null;
            $img_valid = true; //verifica se é uma imagem válida
            $title = $_POST['course-title'];
            if(isset($_POST['course-description']) && !empty($_POST['course-description'])) {
                $description = $_POST['course-description'];
            } else {
                $description = null;
            }

            if(!empty($photo['tmp_name'])) {    
                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                    helper_image_upload(250, 250, $photo, $name_img, 'img/courses/');                     
                }  else {
                    $data['img_invalid'] = true;   
                    $img_valid = false;
                }                                  
            } else {
                $name_img = null;                
            } 
            if($img_valid === true) {
                $c->editCourse($id, $title, $description, $name_img);
                $data['feedback_success'] = "Curso alterado com sucesso!";
            }
            
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

    public function deleteImage($id) {
        //header('Content-Type: application/json');
        $u = new Users();
        $c = new Course();
        $u->setLoggedUser();        
        $data['courseData'] = $c->getCourseEdit($id);
        $data['permission'] = $u->getTypeUser();        
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {                
                if($c->deleteImage($id)) {
                    $resposta = array('msg' => 'Imagem Deletada com Sucesso!');
                } else {                    
                    $resposta =  array('msg' => 'Ocorreu algum erro!');
                }                
                echo json_encode($resposta);
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

    /* Cursos página inicial */

    public function myCourses() {
        $u = new Users();
        $c = new Course();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();             
        $data['myCourses'] = $c->getMyCourses();        
        $this->loadTemplate('myCourses', $data);
    }

    public function registerCourse($class, $course) {
        $u = new Users();
        $c = new Course();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();

        if(isset($class) && isset($course)) {
            $c->registerCourse($class, $course);
        }

        header("location: ". BASE_URL.'course/myCourses');
    }

    public function newCourses() {
        $u = new Users();
        $c = new Course();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();             
        $data['myCourses'] = $c->getNewCourses();        
        $this->loadTemplate('newCourses', $data);
    }

    /* Página aonde será exibido o conteúdo do curso aberto */
    
    public function open($idCourse, $idLesson) {
        $u = new Users();
        $c = new Course();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();             
        $data['courseOpen'] = $c->getCourseOpen($idCourse); //dados do curso aberto
        $data['getLessonCourse'] = $c->getLessonCourse($idCourse);        
        $this->loadTemplate('courseOpen', $data);
    }
}