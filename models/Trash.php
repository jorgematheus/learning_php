<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/07/2018
 * Time: 14:30
 */

class Trash extends Model {

    public function getDataInactiveContent() {
        $sql = $this->db->query('SELECT c.title, c.description, c.id, u.email,
         c.date_edition FROM content c INNER JOIN users u ON c.last_editor = u.id 
         WHERE c.active = 0');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }
    }

    public function getDataInactiveUser() {
        $sql = $this->db->query('SELECT u.usuario, u.id, c.id, ');
    }

    public function recoveryDataInactive($id, $table) {
        $sql = $this->db->prepare('UPDATE '.$table.' SET active = 1 WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
    }

    public function deleteDataInactive($id, $table) {
        $sql = $this->db->prepare('DELETE FROM '.$table.' WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();

    }

}