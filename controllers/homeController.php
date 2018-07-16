<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 02/07/2018
 * Time: 23:36
 */
class homeController extends Controller {

    public function __construct() {
        $u = new Users();
        if (!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }
    public function index() {
        $dados = array(
            'quantidade' => 5,
            'logados' => 581,
            'nomeUser' => 'Jorge'
        );
        $this->loadTemplate('home', $dados);
    }
}