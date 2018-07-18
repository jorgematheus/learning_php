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
            $data = $sql->fetch(PDO::FETCH_ASSOC);
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

    public function add($user, $email, $password, $dt_nascimento, $tipo_user, $celular) {
        $sql = $this->db->prepare('SELECT COUNT(id) as quantidade FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        if($row['quantidade'] == 0) {
            $sql = $this->db->prepare('INSERT INTO users (usuario, email, senha, dt_nascimento, tipo_user, data_criacao, 
                                      celular) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $sql->execute(array($user, $email, $password, $dt_nascimento, $tipo_user, date('Y-m-d H:i:s'), $celular));
            return true;
        } else {
            return false;
        }
    }

    public function edit($id, $name, $password, $dt_nascimento, $status, $tipo_user, $celular) {
        $sql = $this->db->prepare('UPDATE users SET usuario = ?, dt_nascimento = ?, ativo = ?, tipo_user = ?,
                                            celular = ?, ultima_modificacao = ?, ultimo_editor = ? WHERE id = ?');
        $sql->execute(array($name, $dt_nascimento, $status, $tipo_user, $celular,
                      date('Y-m-d H:i:s'), $this->userInfo['usuario'], $id));

        if(!empty($password)) {
            $sql = $this->db->prepare('UPDATE users SET senha = ? WHERE id = ?');
            $sql->execute(array($password, $id));
        }
    }

    public function editMyProfile($id, $name, $password, $dt_nascimento, $celular) {
        $sql = $this->db->prepare('UPDATE users SET usuario = ?, dt_nascimento = ?, 
                           celular = ?, ultima_modificacao = ?, ultimo_editor = ? WHERE id = ?');
        $sql->execute(array($name, $dt_nascimento, $celular,
            date('Y-m-d H:i:s'), $this->userInfo['usuario'], $id));

        if(!empty($password)) {
            $sql = $this->db->prepare('UPDATE users SET senha = ? WHERE id = ?');
            $sql->execute(array($password, $id));
        }
    }

    public function delete($id) {
        $sql = $this->db->prepare('SELECT COUNT(id) as qt FROM users WHERE id = ?');
        $sql->execute(array($id));
        $data = $sql->fetch(PDO::FETCH_ASSOC);

        if($data['qt'] > 0) {
            $sql = $this->db->prepare('DELETE FROM users WHERE id = ?');
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
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function getEmail() {
        if(isset($this->userInfo['email'])) {
            return $this->userInfo['email'];
        }
    }

    public function getName() {
        if(isset($this->userInfo['usuario'])) {
            return $this->userInfo['usuario'];
        }
    }

    public function getId() {
        if(isset($this->userInfo['id'])) {
            return $this->userInfo['id'];
        }
    }
}