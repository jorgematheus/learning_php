<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 17:03
 */

class Users extends Model {

    private $userInfo;
    private $imageDefault = 'user-profile-default.png';  

    public function isLogged() {
        if(isset($_SESSION['ssUser']) && !empty($_SESSION['ssUser'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($email, $pass) {
        $sql = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            if($data['active'] == '1') {
                if(password_verify($pass, $data['password'])) {
                    $_SESSION['ssUser'] = $data['id'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function logout() {
        unset($_SESSION['ssUser']);
    }

    /*
     *  Função responsável por pegar os dados do usuário logado
     *
     */
    public function setLoggedUser() {
        if(isset($_SESSION['ssUser']) && !empty($_SESSION['ssUser'])) {
            $id = $_SESSION['ssUser'];
            $sql  = $this->db->prepare('SELECT * FROM users WHERE id = :id');
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch(PDO::FETCH_ASSOC);
            }
        }
    }

    public function emailNotUsed($email) {
        $sql = $this->db->prepare('SELECT COUNT(id) as quant FROM users WHERE email = ? ');
        $sql->bindValue(1, $email);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['quant'] == '0') {
            return true;
        } 

        return false;
    }

    public function userInative($email) {
        $sql = $this->db->prepare('SELECT active FROM users WHERE email = ? ');
        $sql->bindValue(1, $email);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        if($data['active'] == '0') {
            return true;
        } 

        return false;
    }

    public function add($user, $email, $password, $image, $birth, $type_user, $phone) {
        $sql = $this->db->prepare('SELECT COUNT(id) as quant FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        if($row['quant'] == 0) {
            $sql = $this->db->prepare('INSERT INTO users (name, email, password, image, birth, creator, type_user,
                 date_creation, phone) VALUES (?, ?, ?, ?, ?, ?, ?, now(), ?)');
            $sql->execute(array($user, $email, $password,
            $image, $birth, $this->userInfo['id'], $type_user, $phone));
            return true;
        } else {
            return false;
        }
    }

    public function edit($id, $name, $password, $image, $birth, $type_user, $phone) {
        $sql = $this->db->prepare('UPDATE users SET name = ?, birth = ?, type_user = ?,
                                            phone = ?, date_edition = now(), last_editor = ? WHERE id = ?');
        $sql->execute(array($name, $birth, $type_user, $phone, $this->userInfo['id'], $id));

        if($password != null) {
            $sql = $this->db->prepare('UPDATE users SET password = ? WHERE id = ?');
            $sql->execute(array($password, $id));
        }

        if($image != null) {
            $sql = $this->db->prepare('UPDATE users SET image = ? WHERE id = ?');
            $sql->execute(array($image, $id)); 
            if($this->userInfo['image'] != 'user-profile-default.png') {        
                unlink("img/users/".$this->userInfo['image']);                
            }
        } 
    }

    public function deleteImage($id) {
        $sql = $this->db->prepare('UPDATE users SET image = ?, last_editor = ?, 
        date_edition = NOW() WHERE id = ?');            
        $sql->bindValue(1, $this->imageDefault);   
        $sql->bindValue(2, $this->userInfo['id']);      
        $sql->bindValue(3, $id);
        $sql->execute();         
        if($this->userInfo['image'] != 'user-profile-default.png') {        
            var_dump($this->userInfo['image']);
            unlink("img/users/".$this->userInfo['image']);
            return true;            
        } else {
            return false;
        }
    }
    

    public function editMyProfile($id, $name, $password, $image, $birth, $phone) {
        $sql = $this->db->prepare('UPDATE users SET name = ?, birth = ?, 
                           phone = ?, date_edition = now(), last_editor = ? WHERE id = ?');
        $sql->execute(array($name, $birth, $phone, $this->userInfo['id'], $id));

        if($password != null) {
            $sql = $this->db->prepare('UPDATE users SET password = ? WHERE id = ?');
            $sql->execute(array($password, $id));
        }

        if($image != null) {
            $sql = $this->db->prepare('UPDATE users SET image = ? WHERE id = ?');
            $sql->execute(array($image, $id)); 
            if($this->userInfo['image'] != 'user-profile-default.png') {        
                unlink("img/users/".$this->userInfo['image']);                
            }
        } 
    }

    public function inactiveUser($id) {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt FROM users WHERE id = ?');
        $sql->execute(array($id));
        $data = $sql->fetch(PDO::FETCH_ASSOC);

        if($data['qt'] > 0) {
            $sql = $this->db->prepare('UPDATE users SET active = 0 WHERE id = ?');
            $sql->execute(array($id));
            return true;
        } else {
            return false;
        }
    }

    public function activeUser($id) {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt FROM users WHERE id = ?');
        $sql->execute(array($id));
        $data = $sql->fetch(PDO::FETCH_ASSOC);

        if($data['qt'] > 0) {
            $sql = $this->db->prepare('UPDATE users SET active = 1 WHERE id = ?');
            $sql->execute(array($id));
            return true;
        } else {
            return false;
        }
    }

    public function getUserEdit($id) {
        $sql = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $sql->execute(array($id));
        if($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function getListUsers() {
        $sql = $this->db->query('SELECT * FROM users');
        if($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function getEmail() {
        if(isset($this->userInfo['email'])) {
            return $this->userInfo['email'];
        }
    }

    public function getName() {
        if(isset($this->userInfo['name'])) {
            return $this->userInfo['name'];
        }
    }

    public function getId() {
        if(isset($this->userInfo['id'])) {
            return $this->userInfo['id'];
        }
    }
    /*
     * Retorna qual o tipo de usuário está logado
     * Tipos
     *  1 = Aluno
     *  2 = Editor
     *  3 = Admin
     */
    public function getTypeUser() {
        if(isset($this->userInfo['type_user'])) {
            return $this->userInfo['type_user'];
        }
    }
}