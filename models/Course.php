<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 20/08/2018
 * Time: 11:26
 */

class Course extends Model {

    private $idUser;
    public  $dataCourse;

    public function __construct() {
        parent::__construct();
        self::getUserId();
    }

    private function getUserId() {
        $u = new Users();
        $u->setLoggedUser();
        $this->idUser = $u->getId();
    }

    public function getAllCourse() {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt FROM course');
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0' ) {
            $sql = $this->db->prepare('SELECT id, title, description FROM course WHERE active = 1 ORDER BY title');
            $sql->execute();
            return $this->dataCourse = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function addCourse($title, $description) {
        $sql = $this->db->prepare('INSERT  INTO course (title, description, author, date_creation) VALUES(?, ?, ?, now())');
        $sql->execute(array($title, $description, $this->idUser));
    }

    public function editCourse($id, $title, $description) {
        $sql = $this->db->prepare('UPDATE course SET title = ?, description = ?,
                           last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($title, $description, $this->idUser, $id));
    }

    public function moveCourseToTrash($id) {
        $sql = $this->db->prepare('UPDATE course SET active = 0, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($this->idUser, $id));
    }

    public function getCourseEdit($id) {
        $sql = $this->db->prepare('SELECT * FROM course WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function addLessonToCourse($idCourse, $idLesson){
        $sql = $this->db->prepare('INSERT INTO course_has_lesson (idCourse, idLesson) VALUES(?, ?)');
        $sql->execute(array($idCourse, $idLesson));
    }

    public function getLessonAddToCourse($idCourse) {
        $sql = $this->db->prepare('SELECT l.title, l.description, chl.idCourse, chl.idLesson FROM lesson l 
                          INNER JOIN course_has_lesson chl ON l.id = chl.idLesson INNER JOIN course c ON c.id = chl.idCourse
                         WHERE c.id = ? AND l.active = 1 ORDER BY l.title');
        $sql->bindValue(1, $idCourse);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $this->dataContent = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $this->dataContent;
        }
    }

    public function deleteLessonAddToCourse($idCourse, $idLesson) {
        $sql = $this->db->prepare('SELECT COUNT(idLesson) as qt FROM course_has_lesson WHERE idCourse = ? AND idLesson = ?');
        $sql->execute(array($idCourse, $idLesson));
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0') {
            $sql = $this->db->prepare('DELETE FROM course_has_lesson WHERE idCourse = ? AND idLesson = ?');
            $sql->execute(array($idCourse, $idLesson));
            return true;
        } else {
            return false;
        }
    }
}