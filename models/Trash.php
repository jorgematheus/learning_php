<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/07/2018
 * Time: 14:30
 */

class Trash extends Model {

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

    public function getDataInactiveContent() {
        $sql = $this->db->query('SELECT c.title, c.description, c.id, u.email,
         c.date_edition FROM content c INNER JOIN users u ON c.last_editor = u.id 
         WHERE c.active = 0 ORDER BY c.title');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getDataInactiveLesson() {
        $sql = $this->db->query('SELECT l.title, l.description, l.id, u.email,
         l.date_edition FROM lesson l INNER JOIN users u ON l.last_editor = u.id 
         WHERE l.active = 0 ORDER BY l.title');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getDataInactiveCourse() {
        $sql = $this->db->query('SELECT c.title, c.description, c.id, u.email,
         c.date_edition FROM course c INNER JOIN users u ON c.last_editor = u.id 
         WHERE c.active = 0 ORDER BY c.title');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getDataInactiveClass() {
        $sql = $this->db->query('SELECT c.title, c.description, c.id, u.email,
         c.date_edition FROM class c INNER JOIN users u ON c.last_editor = u.id 
         WHERE c.active = 0 ORDER BY c.title');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getDataInactiveGroup() {
        $sql = $this->db->query('SELECT g.title, g.description, g.id, u.email,
         g.date_edition FROM group_user g INNER JOIN users u ON g.last_editor = u.id 
         WHERE g.active = 0 ORDER BY g.title');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function recoveryDataInactive($id, $table) {
        $sql = $this->db->prepare('UPDATE '.$table.' SET active = 1, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($this->idUser, $id));
    }

    public function deleteDataInactive($id, $table) {
        $sql = $this->db->prepare('DELETE FROM '.$table.' WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();

    }

}