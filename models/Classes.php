<?php
class Classes extends Model {
    private $idUser;
    public $dataClass;    

    public function __construct() {
        parent::__construct();
        self::getUserId();
    }

    private function getUserId() {
        $u = new Users();
        $u->setLoggedUser();
        $this->idUser = $u->getId();
    }

    public function getAllClass() {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt from class');
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0') {
            $sql = $this->db->prepare('SELECT id, description, image, name FROM class');
            $sql->execute();
            return $this->dataClass = $sql->fetchAll(PDO::FETCH_ASSOC);          
        }
    }

    public function getClassEdit($id) {
        $sql = $this->db->prepare('SELECT image, name, description FROM class WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);        
    }

    public function addContent($title, $description, $content) {
        $sql = $this->db->prepare('INSERT INTO content (title, description, content, 
                          author, date_creation) VALUES (?, ?, ?, ?, now())');
        $sql->execute(array($title, $description, $content, $this->idUser));
    }

    public function add($name, $description, $photo) { 

        //$sql = $this->db->prepare('INSERT INTO class (name, description, image)  VALUES(?, ?, ?)');
               
        $sql = $this->db->prepare('INSERT INTO class (name, description, author, image, date_creation) 
        VALUES(?, ?, ?, ?, NOW())');
        $sql->execute(array($name, $description, $this->idUser, $photo));        
    }
}