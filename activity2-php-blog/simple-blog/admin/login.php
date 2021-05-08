<?php
  include("/home/rendoruiz/data/login-data.php");

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (isset($_POST['formsubmit'])){
    if ($username == $username_good && password_verify($password, $pw_enc)) {
      // SUCCESS
      session_start();
      $_SESSION['whbuiosybnmyufcgyiubsgnuy'] = session_id();
      $_SESSION['userid'] = $username;
      header("location: insert.php");

      //$msg = "welcome";
    }
    else if ($username == "" && $password == "") {
      $msg = "Please type in a username and password.";
    }
    else {
      $msg = "Incorrect Login";
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>User Login | Simple Blog</title>

    <style type="text/css">
      html {
        box-sizing: border-box;
      }
      *, *:before, *:after
      {
        box-sizing: inherit;
      }
      body {
        min-height: 100vh;
        padding: 4% 10px;
        background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
        color: rgb(50, 50, 50);
      }
      .container {
        max-width: 800px;
        background-color: rgba(250, 250, 250, 0.45);
        border-radius: 5px;
        padding: 0;
      }
      .container > header {
        background-color: rgba(250, 250, 250, 0.6);
        border-radius: 5px 5px 0 0;
        padding: 20px 20px 15px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }
      main > nav {
        width: 100%;
        padding: 15px 20px;
        margin-bottom: 10px;
      }
      main {
        padding-bottom: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }
      form {
        flex-basis: 350px;
        display: flex;
        flex-direction: column;
      }
      form > :last-child { margin-top: 10px; }
      div.messages { 
        flex-basis: 100%;
        display: flex;
        justify-content: center;
      }
      div.messages > div.alert { flex-basis: 350px; }
    </style>
  </head>
  <body>

    <div class="container">
      <header>
        <div class="pagetitle">
          <span>Rendo's Simple Blog</span>
          <h1>User Login</h1>
        </div>
      </header>
      <main>
        <nav>
          <a href="../" class="btn btn-light">&laquo; Back to Homepage</a>
        </nav>

        <div class="messages">
          <?php 
            if($msg) {
              echo "<div class=\"alert alert-warning\" role=\"alert\">\n  \t\t\t$msg";
              echo "\n\t\t  </div>";
            }
            echo "\n";
          ?>
        </div>

        <form action="login.php" method="post" name="loginform">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <input type="submit" name="formsubmit" class="btn btn-primary">
        </form>
      </main>
    </div>

  </body>
</html>