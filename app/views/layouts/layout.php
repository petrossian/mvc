<?php

  use app\models\UserModel;

  $user = new UserModel();
  $session_id = $_SESSION['user']['id'];
  $get_id = $this->alias;

  $user_data = $user->getUserData('', '', $get_id);

  $userName = $user_data['name'];

  $bgImg = $user->getProfileImg($get_id);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  </head>

  <body class="text-center bg-dark">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column mt-2">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand text-light"> ----- Social Media ----- </h3>
          <nav class="nav nav-masthead justify-content-center border border-succelightss rounded mt-5" style="background: linear-gradient(90deg, rgba(11,11,11,1) 0%, rgba(38,37,38,1) 15%, rgba(93,94,97,0.9108018207282913) 29%);">
            <?php
              if(isset($_SESSION['user'])){
                ?>
                  <a class="nav-link active text-light text-bolder" href="/mvc/user/home/<?=$session_id?>">
                    <i class="fa fa-home"></i>
                    Home
                  </a>
                <?php
              }else{
                ?>
                  <a class="nav-link active text-light text-bolder" href="/mvc">
                    <i class="fa fa-home"></i>
                    Home
                  </a>
                <?php
              }
            ?>
            
            <a class="nav-link text-light text-bolder" href="/mvc/user/sign-up">
              <i class="fa fa-user"></i>
              Sign Up
            </a>
            <a class="nav-link text-light text-bolder" href="/mvc/user/sign-in">
              <i class="fa fa-sign-in"></i>
              Sign In
            </a>
            <a class="nav-link text-light text-bolder" href="/mvc/user/sign-out">
              <i class="fa fa-sign-out"></i>
              Sign Out
            </a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover bg-light mt-5 rounded p-5 mb-5">
        <?php
          if($this->controller == 'User' AND $this->view == 'account'){
            ?>
              <span style="
                  display:inline-block;
                  width: 60px;
                  height: 60px;
                  border: 1px solid grey;
                  border-radius: 8px;
                  background-image: url('../../../mvc/public/uploads/<?=$bgImg['file']?>');
                  background-position:center;
                  background-size:cover;
              "></span>
            <?php
          }
        ?>
        <h1 class="cover-heading text-secondary">
         
          <a href="/mvc/user/account/<?=$get_id?>"><?=$userName?></a>
        </h1>
        <hr class="w-50 bg-success">
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <hr class="w-75 bg-success">
        <p class="lead m-5">
          <?php 
            if($this->controller === 'Main' && $this->view === 'index'){
              ?>
                <a href="/mvc/user/sign-in" class="btn btn-primary w-25">
                  <i class="fa fa-sign-in"></i>
                  Sign In
                </a>
                <a href="/mvc/user/sign-up" class="btn btn-success w-25">
                  Sign Up
                  <i class="fa fa-user"></i>
                </a>
              <?php
            }
          ?>
        </p>
        <hr class="w-50 bg-success">
        <?php echo $content ?>
      </main>

      <footer class="mastfoot mt-auto fixed-bottom bg-dark">
        <div class="inner">
          <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>