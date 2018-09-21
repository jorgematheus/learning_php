<?php
class Group extends Model {

    private $idUser;
    private $dataContent;

    public function __construct() {
        parent::__construct();
        self::getUserId();
    }

    public function getUserId() {
        $u = new Users();
        $u->setLoggedUser();
        $this->idUser = $u->getId();
    }

    public function getAllGroup() {
        $sql = $this->db->query('SELECT id, title, description FROM group_user
                 WHERE active = 1 ORDER BY title');
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function addGroup($title, $description) {      
        $sql = $this->db->prepare('INSERT INTO group_user (title, description, author, date_creation) 
                          VALUES (?, ?, ?, now())');
        $sql->execute(array($title, $description, $this->idUser));

        if($this->db->lastInsertId() == '0') {
            return false;            
        } 
        
        return true;   
    }

    public function getGroupEdit($id) {
        $sql = $this->db->prepare('SELECT id, title, description FROM group_user WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }  
}