<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/07/2018
 * Time: 10:48
 */

class Content extends Model {

    private $idUser;

    public function __construct() {
        parent::__construct();
        self::getUserId();
    }
    /*
     * Método responsável por pegar o ID  do usuário que está realizando as ações
     */
    public function getUserId() {
        $u = new Users();
        $u->setLoggedUser();
        $this->idUser = $u->getId();
    }

    public function getAllContent() {
        $sql = $this->db->query('SELECT id, title, description FROM content WHERE active = 1 ORDER BY title');
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function addContent($title, $description, $content) {
        $sql = $this->db->prepare('INSERT INTO content (title, description, content, 
                          author, date_creation) VALUES (?, ?, ?, ?, now())');
        $sql->execute(array($title, $description, $content, $this->idUser));
        if($this->db->lastInsertId() != null) {
            return true;
        }
    }

    public function editContent($id, $title, $description, $content) {
        $sql = $this->db->prepare('UPDATE content SET title = ?, description = ?,
                          content = ?, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($title, $description, $content, $this->idUser, $id));        
    }

    public function moveContentToTrash($id) {
        $sql = $this->db->prepare('UPDATE content SET active = 0, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($this->idUser, $id));
    }

    public function getContentEdit($id) {
        $sql = $this->db->prepare('SELECT * FROM content WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);

        }
    }
}