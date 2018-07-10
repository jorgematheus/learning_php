<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 13:23
 */

class usersController extends Controller {

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $data['listUsers'] = $u->getList();
        $data['nomeUser'] = $u->getEmail();
        $this->loadTemplate('users', $data);
    }

    public function add() {
        $u = new Users();
        $data = array();
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $user = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $add = $u->add($user, $email, $password);

            if ($add) {
                $data['feedback'] = 'Usuário cadastrado com suceeso!';
            } else {
                $data['feedback'] = 'E-mail já está sendo usado!';
            }
        }
        $this->loadTemplate('user_add', $data);
    }

    public function edit($id) {
        $u = new Users();
        $data = array();
        $data['userData'] = $u->getUser($id);
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $u->edit($id, $name, '');
            $data['feedback'] = 'Usuário Alterado!';
        }
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $pass = addslashes($_POST['password']);
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $u->edit($id, $name, $pass);
                $data['feedback'] = 'Usuário Alterado!';
            }
        }
        $this->loadTemplate('user_edit', $data);
    }

    public function del($id) {
        $u = new Users();

        if($u->delete($id)) {
            echo 'Usuário Deletado!';
        } else {
            echo 'Não foi possível deleter o usuário!';
        }
    }
}