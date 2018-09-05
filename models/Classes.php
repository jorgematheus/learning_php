<?php
class Classes extends Model {
    private $idUser;
    public $dataClass;  
    private $imageDefault = 'class-default-image.jpg';  

    public function __construct() {
        parent::__construct();
        self::getUserId();
    }

    private function getUserId() {
        $u = new Users();
        $u->setLoggedUser();
        $this->idUser = $u->getId();
    }

    public function getAllClass() {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt from class');
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0') {
            $sql = $this->db->prepare('SELECT id, description, image, title FROM class WHERE active = 1');
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);          
        }
    }

    public function addClass($title, $description, $photo) {                
        $sql = $this->db->prepare('INSERT INTO class (title, description, author, image, date_creation) 
        VALUES(?, ?, ?, ?, NOW())');
        $sql->execute(array($title, $description, $this->idUser, $photo));        
    }

    public function editClass($id, $title, $description, $image) {
        $sql = $this->db->prepare('UPDATE class SET title = ?, description = ?, last_editor =?, 
        date_edition = NOW() WHERE id = ?');
        $sql->execute(array($title, $description, $this->idUser, $id));

        if($image != null) {
            $sql = $this->db->prepare('UPDATE class SET image = ? WHERE id = ?');
            $sql->execute(array($image, $id)); 
            if($this->dataClass['image'] != 'class-default-image.jpg') {        
                unlink("img/classes/".$this->dataClass['image']);                
            }
        }        
    }

    public function deleteImage($id) {
        $sql = $this->db->prepare('UPDATE class SET image = ?, last_editor = ?, 
        date_edition = NOW() WHERE id = ?');            
        $sql->bindValue(1, $this->imageDefault);   
        $sql->bindValue(2, $this->idUser);      
        $sql->bindValue(3, $id);
        $sql->execute();         
        if($this->dataClass['image'] != 'class-default-image.jpg') {        
            var_dump($this->dataClass['image']);
            unlink("img/classes/".$this->dataClass['image']);
            return true;            
        } else {
            return false;
        }
    }

    public function moveClassToTrash($id) {
        $sql = $this->db->prepare('UPDATE class SET active = 0, last_editor = ?, date_edition = now() WHERE id = ?');
        $sql->execute(array($this->idUser, $id));
    }

    public function getClassEdit($id) {
        $sql = $this->db->prepare('SELECT id, image, title, description FROM class WHERE id = ?');
        $sql->bindValue(1, $id);
        $sql->execute();
        $this->dataClass = $sql->fetch(PDO::FETCH_ASSOC); 
        return $this->dataClass;     
    }

    public function addCourseToClass($idClass, $idCourse){
        $sql = $this->db->prepare('INSERT INTO class_has_course (idClass, idCourse) VALUES(?, ?)');
        $sql->execute(array($idClass, $idCourse));
    }

    public function getCourseAddToClass($idClass) {
        $sql = $this->db->prepare('SELECT c.title, c.description, chc.idClass, chc.idCourse FROM course c 
        INNER JOIN class_has_course chc ON c.id = chc.idCourse INNER JOIN class cl ON cl.id = chc.idClass 
        WHERE cl.id = ? AND c.active = 1 ORDER BY c.title
        ');
        $sql->bindValue(1, $idClass);
        $sql->execute();
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);            
        }
    }

    public function deleteCourseAddToClass($idClass, $idCourse) {
        $sql = $this->db->prepare('SELECT COUNT(idCourse) as qt FROM class_has_course WHERE idClass = ? AND idCourse = ?');
        $sql->execute(array($idClass, $idCourse));
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['qt'] != '0') {
            $sql = $this->db->prepare('DELETE FROM class_has_course WHERE idClass = ? AND idCourse = ?');
            $sql->execute(array($idClass, $idCourse));
            return true;
        } else {
            return false;
        }
    } 
    
}