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
            <a class="nav-link active text-light text-bolder" href="/mvc">
              <i class="fa fa-home"></i>
              Home
            </a>
            <a class="nav-link text-light text-bolder" href="/mvc/user/sign-up">
              <i class="fa fa-user"></i>
              Sign Up
            </a>
            <a class="nav-link text-light text-bolder" href="/mvc/user/sign-in">
              <i class="fa fa-sign-in"></i>
              Sign In
            </a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover bg-light mt-5 rounded pb-5 mb-5">
        <h1 class="cover-heading text-secondary">Cover your page.</h1>
        <hr class="w-50 bg-success">
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <hr class="w-75 bg-success">
        <p class="lead">
          <a href="/mvc/user/sign-in" class="btn btn-primary w-25">
            <i class="fa fa-sign-in"></i>
            Sign In
          </a>
          <a href="/mvc/user/sign-up" class="btn btn-success w-25">
            Sign Up
            <i class="fa fa-user"></i>
          </a>
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