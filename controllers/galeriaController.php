<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 04/07/2018
 * Time: 00:08
 */

class galeriaController extends Controller {

    public function index() {
        $data = array();
        $data['nomeUser'] = 't';
        $this->loadTemplate('galerias', $data);
    }

    public function editar($id) {
        echo $id;
    }
}