<?php

use vendor\core\base\BaseController;
use app\models\UserModel;

class User extends BaseController{

    public function signUp(){
        
    }

    public function signIn(){
        
    }

    public function doSignUp(){
        session_start();
        $model = new UserModel();
        if (isset($_POST['sign_up'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!$model->required($name)){
                $model->displayError("Name is required");
                die();
            }elseif(!$model->uniqEmail($email)){
                $model->displayError("Email must be unique");
                die();
            } elseif (!$model->emailValidation($email)){
                $model->displayError("Email is not valid");
                die();
            }elseif (!$model->required($password)){
                $model->displayError("Password is required");
                die();
            }else{
                $model->signUp($name, $email, $password);
            }
    
        }
        
    }

    public function doSignIn(){
        session_start();
        $model = new UserModel();
        if (isset($_POST['sign_in'])){
            $email = $_POST['eml'];
            $password = $_POST['pwd'];
            if (!$model->emailValidation($email)){
                $model->displayError("Email is not valid");
                die();
            }elseif (!$model->required($password)){
                $model->displayError("Password is required");
                die();
            }elseif(!$model->getUser($email, $password)){
                $model->displayError("Sxal gaxtnabar");
                die();
            }else{
                $model->signIn($email, $password);
            }
        }
        
    }

    public function home(){
        $model = new UserModel();
        if(isset($_SESSION['user'])){
            $session_user = $_SESSION['user'];
            $posts = $model->getPosts();
            $this->setData(['name'=>$session_user['name'], 'first_visit'=>$session_user['first_visit'], 'posts'=>$posts]);
        }
    }

    public function signOut(){
        $model = new UserModel();
        $model->signOut();
    }

    public function account(){
        $model = new UserModel();
        
    }

    

}