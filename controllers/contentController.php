<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 19/07/2018
 * Time: 10:39
 */

class contentController extends Controller{

    public function __construct()
    {
        $u = new Users();
        if (!$u->isLogged()) {
            header('location: ' . BASE_URL . 'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $c = new Content();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['listContent'] = $c->getAllContent();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }
        $this->loadTemplate('content', $data);
    }

    public function add() {
        $data = array();
        $u = new Users();
        $c = new Content();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }

        if(isset($_POST['content-title']) && !empty($_POST['content-title'])) {
            $title = addslashes($_POST['content-title']);
            $content = $_POST['content'];
            if(isset($_POST['content-description'])) {
                $description = addslashes($_POST['content-description']);
            } else {
                $description = null;
            }
            $c->addContent($title, $description, $content);
            $data['feedback'] = 'Conteúdo Inserido!';
        }
        $this->loadTemplate('content_add', $data);
    }

    public function edit($id) {
        $data = array();
        $u = new Users();
        $c = new Content();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['contentData'] = $c->getContentEdit($id);
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }

        if(empty($id) || $data['contentData'] == null) {
            header('location: '.BASE_URL.'content');
        }

        if(!empty($_POST['content-title']) && !empty($_POST['content'])) {
            $title = addslashes($_POST['content-title']);
            $content = $_POST['content'];

            if(isset($_POST['content-description']) && !empty($_POST['content-description'])) {
                $description = addslashes($_POST['content-description']);
            } else {
                $description = null;
            }

            $c->editContent($id, $title, $description, $content);
            $data['feedback'] = 'Conteúdo Alterado com Sucesso!';

        }
        $this->loadTemplate('content_edit', $data);
    }

    public function del($id) {
        $data = array();
        $u = new Users();
        $c = new Content();
        $data['permission'] = $u->getTypeUser();
        if ($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                if ($c->delete($id)) {
                    echo 'Conteúdo Deletado!';
                } else {
                    echo 'Não foi possível deleter o usuário!';
                }
            }
        }
    }
}