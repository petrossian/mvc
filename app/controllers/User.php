<?php

use vendor\core\base\BaseController;
use app\models\UserModel;

class User extends BaseController{

    public $route = [];

    public function __construct($route){
        $this->route = $route;
    }

    public function signIn(){
        $this->setTitle("Sign In");
    }

    public function signUp(){
        $this->setTitle("Sign Up");
    }

    public function doSignUp(){
        $model = new UserModel();
        if (isset($_POST['sign_up'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!$model->required($username)){
                $_SESSION['error'] = "Name Is Required";
                ?>
                    <script>
                        localStorage.removeItem("username");
                        localStorage.setItem("username", "<?=$username?>");
                        localStorage.removeItem("email");
                        localStorage.setItem("email", "<?=$email?>");
                        localStorage.removeItem("password");
                        localStorage.setItem("password", "<?=$password?>");
                        window.location.href = "mvc/user/sign-up#sign_up_form";
                    </script>
                <?php
            }elseif (!$model->emailValidation($email)){
                $_SESSION['error'] = "Email is not valid";
                ?>
                    <script>
                        localStorage.removeItem("username");
                        localStorage.setItem("username", "<?=$username?>");
                        localStorage.removeItem("email");
                        localStorage.setItem("email", "<?=$email?>");
                        localStorage.removeItem("password");
                        localStorage.setItem("password", "<?=$password?>");
                        window.location.href = "mvc/user/sign-up#sign_up_form";
                    </script>
                <?php
                
            }elseif(!$model->uniqEmail($email)){
                $_SESSION['error'] = "Email must be unique";
                ?>
                    <script>
                        localStorage.removeItem("username");
                        localStorage.setItem("username", "<?=$username?>");
                        localStorage.removeItem("email");
                        localStorage.setItem("email", "<?=$email?>");
                        localStorage.removeItem("password");
                        localStorage.setItem("password", "<?=$password?>");
                        window.location.href = "mvc/user/sign-up#sign_up_form";
                    </script>
                <?php
            }elseif (!$model->required($password)){
                $_SESSION['error'] = "Password is required";
                ?>
                    <script>
                        localStorage.removeItem("username");
                        localStorage.setItem("username", "<?=$username?>");
                        localStorage.removeItem("email");
                        localStorage.setItem("email", "<?=$email?>");
                        localStorage.removeItem("password");
                        localStorage.setItem("password", "<?=$password?>");
                        window.location.href = "mvc/user/sign-up#sign_up_form";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        localStorage.clear();
                    </script>
                <?php
                $model->signUp($username, $email, $password);
            }
    
        }
        
    }

    public function doSignIn(){
        $model = new UserModel();
        if (isset($_POST['sign_in'])){
            $email = $_POST['eml'];
            $password = $_POST['pwd'];
            if (!$model->emailValidation($email)){
                $_SESSION['error'] = "Email Is Not Valid";
                ?>
                    <script>
                        localStorage.removeItem('eml');
                        localStorage.setItem('eml', "<?=$email?>");
                        localStorage.removeItem('pwd');
                        localStorage.setItem('pwd', "<?=$password?>");
                        window.location.href = "mvc/user/sign-in#sign_in_form";
                    </script>
                <?php
            }elseif (!$model->required($password)){
                $_SESSION['error'] = "Password Is Required";
                ?>
                    <script>
                        localStorage.removeItem('eml');
                        localStorage.setItem('eml', "<?=$email?>");
                        localStorage.removeItem('pwd');
                        localStorage.setItem('pwd', "<?=$password?>");
                        window.location.href = "mvc/user/sign-in#sign_in_form";
                    </script>
                <?php
            }elseif(!$model->getUser($email, $password)){
                $_SESSION['error'] = "False Password";
                ?>
                    <script>
                        localStorage.removeItem('pwd');
                        localStorage.setItem('eml', "<?=$email?>");
                        localStorage.setItem('pwd', "<?=$password?>");
                        window.location.href = "mvc/user/sign-in#sign_in_form";
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        localStorage.clear();
                    </script>
                <?php
                $model->signIn($email, $password);
            }
        }
        
    }

    public function home(){
        $model = new UserModel();
        $get_id = $this->route['alias'];
        if(isset($_SESSION['user'])){
            // debug($get_id); debug($_SESSION['user']);
            $get_id !== $_SESSION['user']['id'] ? header('location:/mvc') : false;
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }
            $this->setTitle("Home");
            $session_user = $_SESSION['user'];
            $posts = $model->getPosts();
            $this->setData(['name'=>$session_user['name'], 'first_visit'=>$session_user['first_visit'], 'posts'=>$posts]);
        }else{
            ?>
                <script>
                    window.location.href = '/mvc';
                </script>
            <?php
        }
    }

    public function signOut(){
        $model = new UserModel();
        $model->signOut();die;
    }

    public function account(){
        $model = new UserModel();
        $get_id = $this->route['alias'];
        if(isset($_SESSION['user'])){
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }
            $session_user = $_SESSION['user'];
            $this->setTitle("Account");
            $posts = $model->getUsersPosts($get_id);
            $this->setData(['name'=>$session_user['name'], 'first_visit'=>$session_user['first_visit'], 'posts'=>$posts]);
        }else{
            ?>
                <script>
                    window.location.href = '/mvc';
                </script>
            <?php
        }
    }

    public function upload(){
        $model = new UserModel();
        $folder = dirname(__DIR__) . "/../public/uploads";
        $tmp_name = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $user_id = $_POST['user_id'];
        $role = $_POST['role'];

        if(move_uploaded_file($tmp_name, "$folder/$name")){
            $update = "UPDATE uploads SET role = 'img' WHERE user_id = '$user_id' AND role = 'profile_image'";
            $stmt = $model->pdo->pdo->prepare($update);
            if($stmt->execute()){
                $sql = "INSERT INTO uploads (file, user_id, role) VALUES ('$name', '$user_id', '$role')";
                $stmt = $model->pdo->pdo->prepare($sql);
                if($stmt->execute()){
                    header("location:/mvc/user/account/$user_id");
                }
            }
        }
        
    }

    public function newPost(){
        
    }

    public function addNewPost(){
        $model = new UserModel();
        $user_id = $_SESSION['user']['id'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $sql = "INSERT INTO posts (user_id, title, body) VALUES ('$user_id', '$title', '$body')";
        $stmt = $model->pdo->pdo->prepare($sql);
        if($stmt->execute()){
            header('location:/mvc/user/new-post');
        }
    }

}