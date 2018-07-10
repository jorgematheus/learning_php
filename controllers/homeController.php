<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 02/07/2018
 * Time: 23:36
 */
class homeController extends Controller {

    public function index() {
        $dados = array(
            'quantidade' => 5,
            'logados' => 581,
            'nomeUser' => 'Jorge'
        );
        $this->loadTemplate('home', $dados);
    }
}