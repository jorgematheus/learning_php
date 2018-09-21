<?php
include "helpers/image_upload.php";
class ClassController extends Controller {    
    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
           header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $c = new Classes();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['listClass'] = $c->getAllClass();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }        
        $this->loadTemplate('class', $data);
    }

    public function add() {        
        $data = array();
        $u = new Users();
        $c = new Classes();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }         
        
        if(isset($_POST['class-title']) && !empty($_POST['class-title'])) {            
            $img = null;
            $name_img = null;
            $title = $_POST['class-title'];
            $photo = $_FILES['class-photo'];
            $img_valid = true; //verifica se é uma imagem válida
            if(isset($_POST['class-description'])) {
                $description = $_POST['class-description'];
            } else {
                $description = null;
            }
            if(!empty($photo['tmp_name'])) {    
                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                    helper_image_upload(250, 250, $photo, $name_img, 'img/classes/'); 
                }  else {
                    $data['img_invalid'] = true;   
                    $img_valid = false;                
                }                                
            } else {
                $name_img = null;                
            }            
            if($name_img == null && $img_valid === true) {
                $c->addClass($title, $description, 'class-default-image.jpg');
                $data['feedback_success'] = 'Turma cadastrada';
            } else if($name_img != null && $img_valid === true) {
                $c->addClass($title, $description, $name_img);
                $data['feedback_success'] = 'Turma cadastrada';
            } 
        }       
        $this->loadTemplate('class_add', $data);        
    }

    public function edit($id) {        
        $data = array();
        $u = new Users();
        $c = new Classes();  
        $cr = new Course();      
        $u->setLoggedUser();
        $data['idClass'] = $id;
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['classData'] = $c->getClassEdit($id);
        $data['listCourseAddToClass'] = $c->getCourseAddToClass($id);
        $data['listCourse'] = $cr->getAllCourse();

        if(empty($id) || $data['classData'] == null) {
            header('location: '.BASE_URL.'class');
        }

        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        } 

        if(isset($_POST['check-content'])) {
            foreach($_POST['check-content'] as $rs) {
                $c->addCourseToClass($id, $rs);
            }
            header('location: '.$_SERVER['REQUEST_URI']);
        }        
          
        if(isset($_POST['class-title']) && !empty($_POST['class-title'])) {  
            $photo = $_FILES['class-photo'];          
            $img = null;
            $img_valid = true; //verifica se é uma imagem válida
            $title = $_POST['class-title'];                      
            if(isset($_POST['class-description'])) {
                $description = $_POST['class-description'];
            } else {
                $description = null;
            }            
            if(!empty($photo['tmp_name'])) {    
                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                    helper_image_upload(250, 250, $photo, $name_img, 'img/classes/');                     
                }  else {
                    $data['img_invalid'] = true;   
                    $img_valid = false;
                }                                  
            } else {
                $name_img = null;                
            }  
            if($img_valid === true) {
                $c->editClass($id,$title, $description, $name_img);
                //header('location: '.$_SERVER['REQUEST_URI']); 
                $data['feedback'] = "Dados Alterados!";
            }                      
        }      
        $this->loadTemplate('class_edit', $data);
    }

    public function del($id) {
        $data = array();
        $u = new Users();
        $c = new Classes();
        $u->setLoggedUser();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                $c->moveClassToTrash($id);
            }
        }
    }

    public function deleteImage($id) {
        header('Content-Type: application/json');
        $u = new Users();
        $c = new Classes();
        $u->setLoggedUser();        
        $data['classData'] = $c->getClassEdit($id);
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

    /*Funções responsáveis por manipular os cursos vinculados às classes*/

    public function deleteCourse($idClass, $idCourse) {
        $data = array();
        $u = new Users();
        $c = new Classes();
        $u->setLoggedUser();        
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