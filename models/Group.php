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
    
    public function editGroup($id, $title, $description) {
        $sql = $this->db->prepare('UPDATE group_user SET title = ?, description = ?, last_editor = ?, 
        date_edition = NOW() WHERE id = ?');
        $sql->execute(array($title, $description, $this->idUser, $id));             
    }   

    public function moveGroupToTrash($id) {
        $sql = $this->db->prepare('UPDATE group_user SET active = 0, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($this->idUser, $id));
    }


    public function addUserToGroup($idGroup, $idUser){
        $sql = $this->db->prepare('INSERT INTO group_has_user (idGroup, idUser) VALUES(?, ?)');
        $sql->execute(array($idGroup, $idUser));
    }

    public function getUserAddToGroup($idGroup) {
        $sql = $this->db->prepare('SELECT u.image, u.name, u.email, ghu.idGroup, ghu.idUser FROM users u 
        INNER JOIN group_has_user ghu ON u.id = ghu.idUser INNER JOIN group_user g ON g.id = ghu.idGroup 
        WHERE g.id = ? AND u.active = 1 ORDER BY u.name
        ');
        $sql->bindValue(1, $idGroup);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);            
        }
    }

    public function deleteUserAddToGroup($idGroup, $idUser) {
        $sql = $this->db->prepare('SELECT COUNT(idUser) as qt FROM group_has_user WHERE idGroup = ? AND idUser = ?');
        $sql->execute(array($idGroup, $idUser));
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0') {
            $sql = $this->db->prepare('DELETE FROM group_has_user WHERE idGroup = ? AND idUser = ?');
            $sql->execute(array($idGroup, $idUser));
            return true;
        } else {
            return false;
        }
    } 

    /*
     * Função responsável por trazer todos os usuários que não estejam vinculados ao curso a ser editado
     */  

    public function listUsers($id) {
        $sql = $this->db->prepare("SELECT * FROM users  WHERE  users.id NOT IN 
        (SELECT idUser FROM group_has_user WHERE idGroup = ?) ");
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }
    }
}