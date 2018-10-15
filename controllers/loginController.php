<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 13:56
 */

class loginController extends Controller {

    public function index() {
        $data = array();
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            $u = new Users();

            if($u->doLogin($email, $password)) {
                header('location:'.BASE_URL.'home');
            } 

            else  if($u->emailNotUsed($email)) {
                $data['feedback'] = 'Email não cadastrado!';
            }

            else if($u->userInative($email)) {
                $data['feedback'] = 'Usuário inativo!';
            }

            else {
                $data['feedback'] = 'Combinação de login incorreta!';
            }
        }
        $this->loadView('login', $data);
    }

    public function logout() {
       $u = new Users();
       $u->logout();
       header('location: '.BASE_URL);
    }
}