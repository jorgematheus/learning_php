<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 13:23
 */
include "helpers/image_upload.php";
class usersController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();       
        $data['listUsers'] = $u->getListUsers();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
           header('location: '.BASE_URL.'restrict');
        }
        $this->loadTemplate('users', $data);
    }

    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        try{        
            if(isset($_POST['email']) && !empty($_POST['email'])) {
                if(isset($_POST['name']) && !empty($_POST['name'])) {
                    if(isset($_POST['password']) && !empty($_POST['password'])) {
                        $user = addslashes($_POST['name']);
                        $email = addslashes($_POST['email']);
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $type_user = addslashes($_POST['type_user']);
                        $phone = addslashes($_POST['phone']);
                        $photo = $_FILES['photo'];

                        if(isset($_POST['birth']) && !empty($_POST['birth'])) {
                            $birth = addslashes(date('Y-m-d',
                                strtotime(str_replace('/', '-', $_POST['birth']))));
                        } else {
                            $birth = null;
                        }
                        if($u->emailNotUsed($email)) {
                            if(!empty($photo['tmp_name'])) {    
                                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                                    // Gera um nome único para a imagem
                                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                                    helper_image_upload(250, 250, $photo, $name_img, 'img/users/'); 
                                    $data['feedback'] = 'Arquivo ok'; 
                                }  else {
                                    $data['feedback'] = 'Arquivo nao permitido';
                                }                                  
                            } else {
                                $name_img = null;                
                            }            
                            if($name_img == null) {
                                $add = $u->add($user, $email, $password, 'user-profile-default.png', 
                                $birth, $type_user, $phone);                                
                            } else {
                                $add = $u->add($user, $email, $password, $name_img, $birth, 
                                $type_user, $phone);
                            }                           
                            if ($add) {
                                $data['feedback_success'] = 'Usuário cadastrado com sucesso!';
                            } else {
                                $data['feedback_error'] = 'Cadastro não efetuado. Verifique todos os campos e tente novamente!';
                            }
                        } else {
                            $data['feedback_error'] = 'O email solicitado já está em uso!';
                        }
                    }
                }
            }
        } catch(Exception $ex) {
            echo 'error: '.$ex->getMessage();
        }
        $this->loadTemplate('user_add', $data);
    }

    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['userData'] = $u->getUserEdit($id); // obtém os dados do usuário a ser editado
        $data['permission'] = $u->getTypeUser();

        if(empty($id) || $data['userData'] == null) {
            header('location: '.BASE_URL.'users');
        }

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
        if(empty($id) || $data['userData'] == null) {
            header('location: '.BASE_URL.'users');
        }
        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $photo = $_FILES['photo'];
            $img_valid = true; //verifica se é uma imagem válida
            if(isset($_POST['password']) && !empty($_POST['password'])) {
                $pass = addslashes($_POST['password']);
                $pass = password_hash($pass, PASSWORD_DEFAULT);                
            } else {
                $pass = null;
            }
            
            $type_user = addslashes($_POST['type_user']);

            if(isset($_POST['birth']) && !empty($_POST['birth'])) {
                $birth = addslashes(date('Y-m-d',
                                strtotime(str_replace('/', '-', $_POST['birth']))));
            } else {
                $birth = null;
            }
            if(isset($_POST['phone']) && !empty($_POST['phone'])) {
                $phone = addslashes($_POST['phone']);
            } else {
                $phone = null;
            }
            if(!empty($photo['tmp_name'])) {    
                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                    helper_image_upload(250, 250, $photo, $name_img, 'img/users/');                                       
                }  else {
                    $data['img_invalid'] = true;   
                    $img_valid = false;                
                }                                  
            } else {
                $name_img = null;                
            }
            if($img_valid === true) {               
                $u->edit($id, $name, $pass, $name_img, $birth, $type_user, $phone);
                $data['feedback_success'] = 'Usuário alterado com sucesso!';                                
            } 
                                
        }
        $this->loadTemplate('user_edit', $data);
    } 

    public function deleteImage($id) {
        $u = new Users();        
        $u->setLoggedUser();        
        $data['UserData'] = $u->getUserEdit($id);
        $data['permission'] = $u->getTypeUser();        
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {                
                if($u->deleteImage($id)) {
                    $resposta = array('msg'=>'Imagem Deletada com Sucesso !');
                } else {                    
                    $resposta =  array('msg' =>'Erro ao deletar a imagem!');
                }
                echo json_encode($resposta);
            }
        }
    }

    public function inactive($id) {
        $u = new Users();
        $u->setLoggedUser();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3') {
                $u->inactiveUser($id);
                header('location: '.BASE_URL.'users');
            }
        }
    }

    public function active($id) {
        $u = new Users();
        $u->setLoggedUser();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3') { 
                $u->activeUser($id);
                header('location: '.BASE_URL.'users');
            }
        }
    }

    public function myprofile() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['userData'] = $u->getUserEdit($u->getId());
        $data['permission'] = $u->getTypeUser();

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $photo = $_FILES['photo'];
            $img_valid = true; //verifica se é uma imagem válida

            if(isset($_POST['password']) && !empty($_POST['password'])) {
                $pass = addslashes($_POST['password']);
                $pass = password_hash($pass, PASSWORD_DEFAULT);
            } else {
                $pass = null;
            }

            if(isset($_POST['birth']) && !empty($_POST['birth'])) {
                $birth = addslashes(date('Y-m-d',
                    strtotime(str_replace('/', '-', $_POST['birth']))));
            } else {
                $birth = null;
            }
            if(isset($_POST['phone']) && !empty($_POST['phone'])) {
                $phone = addslashes($_POST['phone']);
            } else {
                $phone = null;
            }
            
            if(!empty($photo['tmp_name'])) {    
                if(preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo["name"], $ext)) {
                    // Gera um nome único para a imagem
                    $name_img = md5(uniqid(time())) . "." . $ext[1];                       
                    helper_image_upload(250, 250, $photo, $name_img, 'img/users/');                                       
                }  else {
                    $data['img_invalid'] = true;   
                    $img_valid = false;                
                }                                  
            } else {
                $name_img = null;                
            }
            if($img_valid === true) {                  
                $id = $u->getId();   
                $u->editMyProfile($id, $name, $pass, $name_img, $birth, $phone);                
                $data['feedback_success'] = 'Usuário alterado!';  
                header('location: '.$_SERVER['REQUEST_URI']);                                    
            } 
            
        }
        $this->loadTemplate('my_profile', $data);
    }    
}