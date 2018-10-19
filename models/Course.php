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
    private $imageDefault = 'course-default-image.jpg'; 

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
            $sql = $this->db->prepare('SELECT id, title, description, image FROM course WHERE active = 1 ORDER BY title');
            $sql->execute();
            return $this->dataCourse = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function addCourse($title, $description, $image) {
        $sql = $this->db->prepare('INSERT INTO course (title, description, author, image,  date_creation) VALUES(?, ?, ?, ?, now())');
        $sql->execute(array($title, $description, $this->idUser, $image));
    }

    public function editCourse($id, $title, $description, $image) {
        $sql = $this->db->prepare('UPDATE course SET title = ?, description = ?,
                           last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($title, $description, $this->idUser, $id));

        if($image != null) {
            $sql = $this->db->prepare('UPDATE course SET image = ? WHERE id = ?');
            $sql->execute(array($image, $id)); 
            if($this->dataCourse['image'] != $this->imageDefault) {        
                unlink("img/courses/".$this->dataCourse['image']);                
            }
        }  
    }

    public function deleteImage($id) {
        $sql = $this->db->prepare('UPDATE course SET image = ?, last_editor = ?, 
        date_edition = NOW() WHERE id = ?');            
        $sql->bindValue(1, $this->imageDefault);   
        $sql->bindValue(2, $this->idUser);      
        $sql->bindValue(3, $id);
        $sql->execute();         
        if($this->dataCourse['image'] != $this->imageDefault) {             
            unlink("img/courses/".$this->dataCourse['image']);
            return true;            
        } else {
            return false;
        }
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
            $this->dataCourse = $sql->fetch(PDO::FETCH_ASSOC); 
            return $this->dataCourse;  
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
           return  $sql->fetchAll(PDO::FETCH_ASSOC);            
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

     /*
     * Função responsável por trazer todas as lições que não estejam vinculados ao curso a ser editado
     */  

    public function listLesson($id) {
        $sql = $this->db->prepare("SELECT * FROM lesson  WHERE  lesson.id NOT IN 
        (SELECT idLesson FROM course_has_lesson WHERE idCourse = ?) ");
        $sql->bindValue(1, $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    /* Cursos da página inicial  */

    public function getMyCourses() {
        $sql = $this->db->prepare("SELECT DISTINCT u.id as id_user, c.id as id_course, cl.id as id_class, 
        c.title as title_course, c.description, c.image, cl.title as title_class FROM course c INNER JOIN 
        class_has_course chc ON c.id = chc.idCourse INNER JOIN class cl ON cl.id = chc.idClass INNER JOIN 
        class_has_group chg ON cl.id = chg.idClass INNER JOIN group_has_user ghu ON chg.idGroup = 
        ghu.idGroup INNER JOIN users u ON u.id = ghu.idUser INNER JOIN user_course_register ucr ON ucr.class = cl.id  WHERE u.id = ? AND c.active = 1 AND c.id IN (SELECT course FROM user_course_register  WHERE user = ?  AND completed = 0) AND cl.id IN (SELECT class FROM user_course_register WHERE user = ? AND course = c.id)  ORDER BY c.title");
        $sql->bindValue(1, $this->idUser);
        $sql->bindValue(2, $this->idUser); 
        $sql->bindValue(3, $this->idUser);       
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC); 
        }
    }   

    public function getNewCourses() {
        $sql = $this->db->prepare("SELECT DISTINCT u.id as id_user, c.id as id_course, cl.id as id_class, 
        c.title as title_course, c.description, c.image, cl.title as title_class FROM course c INNER JOIN 
        class_has_course chc ON c.id = chc.idCourse INNER JOIN class cl ON cl.id = chc.idClass INNER JOIN 
        class_has_group chg ON cl.id = chg.idClass INNER JOIN group_has_user ghu ON chg.idGroup = 
        ghu.idGroup INNER JOIN users u ON u.id = ghu.idUser WHERE u.id = ? AND c.active = 1 AND c.id 
        NOT IN (SELECT course FROM user_course_register WHERE user = ? AND class = cl.id) ORDER BY c.title");
        $sql->bindValue(1, $this->idUser);
        $sql->bindValue(2, $this->idUser);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC); 
        }
    }    
    
    public function registerCourse($class, $course) {
       $sql= $this->db->prepare("INSERT INTO user_course_register(class, course, user) VALUES (?, ?, ?)");
       $sql->execute(array($class, $course, $this->idUser));        
    }    

    public function getCourseOpen($id) {
        $sql = $this->db->prepare("SELECT * FROM course WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getLessonCourse($idCourse) {
        /*$sql = $this->db->prepare("SELECT l.id, l.title, l.description FROM lesson l INNER JOIN 
        course_has_lesson chl ON l.id = chl.idLesson INNER JOIN course c ON c.id = chl.idCourse
         WHERE c.id = ?");*/
         $sql = $this->db->prepare("SELECT l.id as id_lesson, l.title as title_lesson, l.description as description_lesson, c.id as id_content, c.title as title_content FROM lesson l INNER JOIN lesson_has_content lhc ON lhc.idLesson = l.id INNER JOIN content c ON c.id = lhc.idContent INNER JOIN course_has_lesson chl ON chl.idLesson = l.id INNER JOIN course cc ON cc.id = chl.idCourse WHERE cc.id = ?");
        $sql->bindValue(1, $idCourse);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } 
    }
}