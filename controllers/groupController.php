<?php 

class groupController extends Controller {

    public function  __construct() {
        $u = new Users();
        if(!$u->isLogged()) {
            header('location: '.BASE_URL.'login');
        }
    }

    public function index() {
        $data = array();
        $u = new Users();
        $g = new Group();
        $u->setLoggedUser();
        $data['listGroup'] = $g->getAllGroup();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }

        $this->loadTemplate('group', $data);
    }

    public function add() {
        $data = array();
        $u = new Users();
        $g = new Group();
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        
        if($data['permission'] != '3') {
            header('location: '.BASE_URL.'restrict');
        }
       
        if(isset($_POST['group-title']) && !empty($_POST['group-title'])) {
            $title = addslashes($_POST['group-title']);           
            if(isset($_POST['group-description'])) {
                $description = addslashes($_POST['group-description']);
            } else {
                $description = null;
            } 
            if($g->addGroup($title,$description)) {
                $data['feedback_success'] = 'Grupo adicionado com sucesso!';
            } else {
                $data['feedback_error'] = 'Ocorreu algum erro!';
            }
        }         
        $this->loadTemplate('group_add', $data);
    }

    public function edit($id) {
        $u = new Users();
        $g = new Group();        
        $u->setLoggedUser();
        $data['nameUser'] = $u->getName();
        $data['permission'] = $u->getTypeUser();
        $data['groupData'] = $g->getGroupEdit($id);
        $data['listUsersAddToGroup'] = $g->getUserAddToGroup($id);      
        $data['listUsers'] = $g->listUsers($id);  

        if(empty($id) || $data['groupData'] == null) {
            header('location: '.BASE_URL.'group');
        }

        if($data['permission'] != '3' && $data['permission'] != '2') {
            header('location: '.BASE_URL.'restrict');
        }

        /* Adicionando os usuários ao grupo */
        if(isset($_POST['check-admin'])) {
            foreach($_POST['check-admin'] as $rs) {
                $g->addUserToGroup($id, $rs);
            }
            header('location: '.$_SERVER['REQUEST_URI']);
        }
        if(isset($_POST['group-title']) && !empty($_POST['group-title'])) {
            $title = $_POST['group-title'];
            if(isset($_POST['group-description']) && !empty($_POST['group-description'])) {
                $description = $_POST['group-description'];
            } else {
                $description = null;
            }
            $g->editgroup($id, $title, $description);
            $data['feedback'] = "Dados alterados!";            
        }
        $this->loadTemplate('group_edit', $data);
    }

    public function del($id) {
        $data = array();
        $u = new Users();
        $g = new Group();
        $u->setLoggedUser();
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                $g->moveGroupToTrash($id);
            }
        }
    }   

    /*Funções responsáveis por manipular os usuários vinculados aos grupos*/
    public function deleteUser($idGroup, $idUser) {
        $data = array();
        $u = new Users();
        $g = new Group();
        $u->setLoggedUser();        
        $data['permission'] = $u->getTypeUser();
        if($u->isLogged()) {
            if($data['permission'] == '3' || $data['permission'] == '2') {
                $g->deleteUserAddToGroup($idGroup, $idUser);                  
            } else {
                header('location: '.BASE_URL.'restrict');
            }
        }
    }
}