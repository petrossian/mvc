<?php

namespace app\models;

use vendor\core\base\BaseModel;
use PDO;

class UserModel extends BaseModel{

    public function displayError($error_text){
        echo "Error::" . $error_text;
    }
    public function required($fieldname){
        if (strlen($fieldname) < 1){
            return false;
        }
        return true;
    }
    public function emailValidation($email){
        $regexp = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($regexp, $email)){
            return true;
        }
        return false;
    }
    public function getUser($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        if ($stmt->rowCount() === 1){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    public function getUserData($email="", $password="", $alias=""){
        $sql = "SELECT * FROM users WHERE (email = '$email' AND password = '$password') OR id = '$alias'";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        if ($stmt->rowCount() === 1){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    public function uniqEmail($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();

        if ($stmt->rowCount() === 0){
            return true;
        }
        return false;
    }
    public function findById($id, $table){
        $sql = "SELECT * FROM $table WHERE id = '$id'";
        $row = $this->connect->query($sql);
        return $row->fetch_assoc();
    }
    public function getProfileImg($user_id){
        $sql = "SELECT * FROM uploads WHERE user_id = $user_id AND role = 'profile_image'";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        if($stmt->rowCount() !== 0){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return "no-image";
    }

    public function getPosts(){
        $sql = "SELECT posts.id, posts.user_id, uploads.file, users.name, password, title, body, uploads.role FROM posts inner JOIN users ON posts.user_id = users.id left JOIN uploads ON uploads.role='profile_image' AND uploads.user_id = users.id ORDER BY posts.id";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        return $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersPosts($user_id){
        $sql = "SELECT posts.id, posts.user_id, uploads.file, users.name, password, title, body, uploads.role FROM posts inner JOIN users ON posts.user_id = '$user_id' and posts.user_id = users.id left JOIN uploads ON uploads.role='profile_image' AND uploads.user_id = users.id";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        return $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function signUp($name, $email, $password){
        $sql = "INSERT users (name, email, password, first_visit) VALUES ('$name', '$email', '$password', 'true')";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        if (true == $row){
            $user = $this->getUserData($email, $password);
            $_SESSION['user'] = $user;
            ?>
                <script>
                    window.location.href = '/mvc/user/home/' + <?=$user['id']?>
                </script>
            <?php
        }
    }
    public function signIn($email, $password){
        $user = $this->getUserData($email, $password);
        $_SESSION['user'] = $user;
        ?>
            <script>
                window.location.href = '/mvc/user/home/' + <?=$user['id']?>;
            </script>
        <?php
    }

    public function signOut(){
        session_start();
        $user_id = $_SESSION['user']['id'];
        $sql = "UPDATE users SET first_visit = 'false' WHERE id='$user_id'";
        $stmt = $this->pdo->pdo->prepare($sql);
        $row = $stmt->execute();
        unset($_SESSION['user']);
        ?>
            <script>
                window.location.href = '/mvc';
            </script>
        <?php
    }


}