<?php
/**
 * Created by PhpStorm.
 * User: 076095
 * Date: 04/07/2018
 * Time: 17:03
 */

class Users extends Model {

    private $userInfo;

    public function isLogged() {
        if (isset($_SESSION['ssUser']) && !empty($_SESSION['ssUser'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($email, $pass) {
        $sql = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            if (password_verify($pass, $data['senha'])) {
                $_SESSION['ssUser'] = $data['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setLoggedUser() {
        if (isset($_SESSION['ssUser']) && !empty($_SESSION['ssUser'])) {
            $id = $_SESSION['ssUser'];
            $sql  = $this->db->prepare('SELECT * FROM users WHERE id = :id');
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
            }
        }
    }

    public function logout() {
        unset($_SESSION['ssUser']);
    }

    public function add($user, $email, $password) {
        $sql = $this->db->prepare('SELECT COUNT(id) as quantidade FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        $row = $sql->fetch();

        if($row['quantidade'] == 0) {
            $sql = $this->db->prepare('INSERT INTO users (usuario, email, senha, data_criacao) VALUES (?, ?, ?, ?)');
            $sql->execute(array($user, $email, $password, date('Y-m-d H:i:s')));
            return true;
        } else {
            return false;
        }
    }

    public function edit($id, $name, $password) {
        $sql = $this->db->prepare('UPDATE users SET usuario = ? WHERE id = ?');
        $sql->execute(array($name, $id));

        if (!empty($pass)) {
            $sql = $this->prepare('UPDATE users SET senha = ? WHERE id = ?');
            $sql->execute(array($password, $id));
        }
    }

    public function delete($id) {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt FROM users WHERE id = ?');
        $sql->execute(array($id));
        $data = $sql->fetch();

        if ($data['qt'] > 0) {
            $sql = $this->db->prepare('DELETE FROM users WHERE id = ?');
            $sql->execute(array($id));
            return true;
        } else {
            return false;
        }
    }

    public function getEmail() {
        if (isset($this->userInfo['email'])) {
            return $this->userInfo['email'];
        }
    }

    public function getUser($id) {
        $sql = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $sql->execute(array($id));

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();
            return $data;
        }
    }

    public function getList() {
        $array = array();
        $sql = $this->db->query('SELECT * FROM users');

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
}