<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/07/2018
 * Time: 14:30
 */

class Trash extends Model {

    public function getDataInactive($table) {
        $sql = $this->db->query('SELECT * FROM '.$table.' WHERE active = 0');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }
    }

    public function recoveryDataInactive($id, $table) {
        $sql = $this->db->prepare('UPDATE '.$table.' SET active = 1 WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
    }

    public function deleteDataInactive($id) {

    }

}