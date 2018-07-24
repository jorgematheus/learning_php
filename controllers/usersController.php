<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 13:23
 */

class usersController extends Controller {

    public function __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'/login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['listUsers'] = $u->getListUsers();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if ($data['permission'] != '3' && $data['permission'] != '2') {
           echo "não é admin nem editor";
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

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            if(isset($_POST['name']) && !empty($_POST['name'])) {
                if(isset($_POST['password']) && !empty($_POST['password'])) {
                    $user = addslashes($_POST['name']);
                    $email = addslashes($_POST['email']);
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $tipo_user = addslashes($_POST['tipo']);
                    $celular = addslashes($_POST['celular']);

                    if(isset($_POST['nascimento']) && !empty($_POST['nascimento'])) {
                        $dt_nascimento = addslashes(date('Y-m-d',
                            strtotime(str_replace('/', '-', $_POST['nascimento']))));
                    } else {
                        $dt_nascimento = null;
                    }
                    if($u->emailNotUsed($email)) {
                        $add = $u->add($user, $email, $password, $dt_nascimento, $tipo_user, $celular);
                        if ($add) {
                            $data['feedback'] = 'Usuário cadastrado com suceeso!';
                        } else {
                            $data['feedback'] = 'Cadastro não efetuado. Verifique todos os campos e tente novamente!';
                        }
                    } else {
                        $data['feedback'] = 'O email solicitado já está em uso';
                    }
                }
            }
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

        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }

        if(empty($id) || $data['userData'] == null) {
            header('location: '.BASE_URL.'users');
        }

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);

            if(isset($_POST['password']) && !empty($_POST['password'])) {
                $pass = addslashes($_POST['password']);
                $pass = password_hash($pass, PASSWORD_DEFAULT);
            } else {
                $pass = null;
            }
            
            $tipo_user = addslashes($_POST['tipo']);
            $status = addslashes($_POST['status']);

            if(isset($_POST['nascimento']) && !empty($_POST['nascimento'])) {
                $dt_nascimento = addslashes(date('Y-m-d',
                                strtotime(str_replace('/', '-', $_POST['nascimento']))));
            } else {
                $dt_nascimento = null;
            }
            if(isset($_POST['celular']) && !empty($_POST['celular'])) {
                $celular = addslashes($_POST['celular']);
            } else {
                $celular = null;
            }
            $u->edit($id, $name, $pass, $dt_nascimento, $status, $tipo_user, $celular);
            $data['feedback'] = 'Usuário Alterado com sucesso!';
        }
        $this->loadTemplate('user_edit', $data);
    }

    public function del($id) {
        $u = new Users();
        $data['permission'] = $u->getTypeUser();
        if ($u->isLogged()) {
            if($data['permission'] == '3') {
                if ($u->delete($id)) {
                    echo 'Usuário Deletado!';
                } else {
                    echo 'Não foi possível deleter o usuário!';
                }
            }
        }
    }

    public function myprofile() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['userData'] = $u->getUserEdit($u->getId());

        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);

            if(isset($_POST['password']) && !empty($_POST['password'])) {
                $pass = addslashes($_POST['password']);
                $pass = password_hash($pass, PASSWORD_DEFAULT);
            } else {
                $pass = null;
            }

            if(isset($_POST['nascimento']) && !empty($_POST['nascimento'])) {
                $dt_nascimento = addslashes(date('Y-m-d',
                    strtotime(str_replace('/', '-', $_POST['nascimento']))));
            } else {
                $dt_nascimento = null;
            }
            if(isset($_POST['celular']) && !empty($_POST['celular'])) {
                $celular = addslashes($_POST['celular']);
            } else {
                $celular = null;
            }
            $data['feedback'] = 'Dados Salvos!';
            $u->editMyProfile($u->getId(), $name, $pass, $dt_nascimento, $celular);
        }
        $this->loadTemplate('my_profile', $data);

    }
}