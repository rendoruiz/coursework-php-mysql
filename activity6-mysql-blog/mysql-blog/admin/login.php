<?php
session_start();
if(isset($_SESSION['wyugdyubnshanuhngsuyyudbtn'])) {
  include("../includes/mysql_connect.php");
  header("location: ".BASE_URL);
}

include("/home/rendoruiz/data/login-data.php");
$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (isset($_POST['formsubmit'])){
  if ($username == $username_good && password_verify($password, $pw_enc)) {
    session_start();
    $_SESSION['wyugdyubnshanuhngsuyyudbtn'] = session_id();
    $_SESSION['userid'] = $username;
    
    header("location: ".$_SESSION['sourcepath']);
  }
  else if ($username == "" && $password == "") {
    $msg = "Please type in a username and password.";
  }
  else {
    $msg = "Incorrect Login";
  }
}

include("../includes/header.php");
?>

<div class="row">
  <div class="col-sm-12">
    <h1>Admin Login</h1>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="messages">
      <?php if($msg): ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $msg; ?>
        </div>
      <?php endif; ?>
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
  </div>
</div>

<?php include("../includes/footer.php"); ?>