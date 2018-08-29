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
        $img_valid = true;
        if(isset($_POST['class-title']) && !empty($_POST['class-title'])) {            
            $img = null;
            $title = $_POST['class-title'];
            $photo = $_FILES['class-photo'];
            if(isset($_POST['class-description'])) {
                $description = $_POST['class-description'];
            } else {
                $description = null;
            }
            
            if(!empty($photo['name'])) {               
                $img = helper_image_upload(1500, 1800, 1000000, $photo);
              
               /* // Largura máxima em pixels
                $largura = 1500;
                // Altura máxima em pixels
                $altura = 1800;
                // Tamanho máximo do arquivo em bytes
                $tamanho = 10000000;        
                $error = array();        
                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $photo["type"])){
                $error[1] = "O arquivo não é uma imagem!";
                $img_valid = false;
                }             
                // Pega as dimensões da imagem
                $dimensoes = getimagesize($photo["tmp_name"]);            
                // Verifica se a largura da imagem é maior que a largura permitida
                if($dimensoes[0] > $largura) {
                    $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                    $img_valid = false;
                }        
                // Verifica se a altura da imagem é maior que a altura permitida
                if($dimensoes[1] > $altura) {
                    $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                    $img_valid = false;
                }
                
                // Verifica se o tamanho da imagem é maior que o tamanho permitido
                if($photo["size"] > $tamanho) {
                    $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                    $img_valid = false;
                }
        
                // Se não houver nenhum erro
                if (count($error) == 0) {
                
                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext);
                   
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];
                   
                    // Caminho de onde ficará a imagem
                    $location_img = "img/classes/" . $name_img;
        
                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($photo["tmp_name"], $location_img);  
                    
                    $img = $name_img;                    
                }
            
                // Se houver mensagens de erro, exibe-as
                if (count($error) != 0) {
                    foreach ($error as $erro) {
                        $data['feedback'] = $erro . "<br />";
                    }
                }*/
            } else {
                $img = null;
            }  
            if($img) {
                $c->addClass($title, $description, $img);
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
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['classData'] = $c->getClassEdit($id);
        $data['listCourseAddToClass'] = $c->getCourseAddToClass($id);
        $data['listCourse'] = $cr->getAllCourse();

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
            $title = $_POST['class-title'];                      
            if(isset($_POST['class-description'])) {
                $description = $_POST['class-description'];
            } else {
                $description = null;
            }            
            if(!empty($photo['tmp_name'])) {                
                $img = helper_image_upload(1500, 1800, 1000000, $photo);              
            } else {
                $img = null;                
            }  
                     
            $c->editClass($id,$title, $description, $img);
            
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