<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 30/07/2018
 * Time: 16:08
 */

class Lesson extends Model {

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

    public function getAllLesson() {
        $sql = $this->db->query('SELECT id, title, description FROM lesson WHERE active = 1 ORDER BY title');
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function addLesson($title, $description) {
        $sql = $this->db->prepare('INSERT INTO lesson (title, description, author, date_creation) 
                          VALUES (?, ?, ?, now())');
        $sql->execute(array($title, $description, $this->idUser));
    }

    public function getLessonEdit($id) {
        $sql = $this->db->prepare('SELECT * FROM lesson WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function editLesson($id, $title, $description) {
        $sql = $this->db->prepare('UPDATE lesson SET title = ?, description = ?,
                           last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($title, $description, $this->idUser, $id));
    }

    public function moveLessonToTrash($id) {
        $sql = $this->db->prepare('UPDATE lesson SET active = 0, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($this->idUser, $id));
    }

    public function addContentToLesson($idLesson, $idContent){
        $sql = $this->db->prepare('INSERT INTO lesson_has_content (idLesson, idContent) VALUES(?, ?)');
        $sql->execute(array($idLesson, $idContent));
    }

    public function getContentAddToLesson($idLesson) {
        $sql = $this->db->prepare('SELECT c.title, c.description, lhc.idLesson, lhc.idContent FROM content c 
                          INNER JOIN lesson_has_content lhc ON c.id = lhc.idContent INNER JOIN lesson l ON l.id = lhc.idLesson
                         WHERE l.id = ?');
        $sql->bindValue(1, $idLesson);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $this->dataContent = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $this->dataContent;
        }
    }

    public function deleteContentAddToLesson($idLesson, $idContent) {
        $sql = $this->db->prepare('SELECT COUNT(idContent) as qt FROM lesson_has_content WHERE idLesson = ? AND idContent = ?');
        $sql->execute(array($idLesson, $idContent));
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0') {
            $sql = $this->db->prepare('DELETE FROM lesson_has_content WHERE idLesson = ? AND idContent = ?');
            $sql->execute(array($idLesson, $idContent));
            return true;
        } else {
            return false;
        }
    }
    /*
     * Função responsável por verificar se a lição tem determinado conteúdo
     */
    public function lessonHasContent($idLesson, $idContent = array()) {
        $sql = $this->db->prepare('SELECT * FROM lesson_has_content WHERE idLesson = ? AND idContent = ?');
        $sql->execute(array($idLesson, $idContent));
        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdContent() {
        if(isset($this->dataContent['idContent'])) {
            return $this->dataContent['idContent'];
        }
    }

}