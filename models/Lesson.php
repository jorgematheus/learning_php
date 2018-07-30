<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 30/07/2018
 * Time: 16:08
 */

class Lesson extends Model {

    private $idUser;

    public function __construct() {
        parent::__construct();
        self::getUserId();
    }

    public function getUserId() {
        $u = new Users();
        $u->setLoggedUser();
        $this->idUser = $u->getId();
    }

    public function getAllLesson() {
        $sql = $this->db->query('SELECT id, title, description FROM lesson WHERE active = 1');
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function addLesson($title, $description) {
        $sql = $this->db->prepare('INSERT INTO lesson (title, description, author, date_creation) 
                          VALUES (?, ?, ?, ?)');
        $sql->execute(array($title, $description, $this->idUser, date('Y-m-d H:i:s')));
    }

    public function editLesson($id, $title, $description) {
        $sql = $this->db->prepare('UPDATE lesson SET title = ?, description = ?,
                           last_editor = ?, date_edition = ? WHERE id = ?');
        $sql->execute(array($title, $description, $this->idUser, date('Y-m-d H:i:s'), $id));
    }

    public function deleteContent($id) {

    }

    public function getLessonEdit($id) {
        $sql = $this->db->prepare('SELECT * FROM lesson WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetch();
        }
    }
}