<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include("mysql_connect.php");// here we include the connection script; since this file(header.php) is included at the top of every page we make, the connection will then also be included. Also, config options like BASE_URL are also available to us.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <!--  This CONSTANT is defined in your mysql_connect.php file. -->
    <title><?php echo APP_NAME; ?></title>

    <style>
      .character-card {
        border-top: 5px solid #26B9C8;
        border-bottom: 5px solid #26B9C8;
        border-radius: 15px;
        padding: 1rem 1.25rem;
      }
      .character-card p {
        margin-top: 0.5rem;
        margin-bottom: 0;
        font-style: italic;
      }
      .character-info {
        border-left: 5px solid #FFF56C;
        border-radius: 15px;
        padding: 0 1rem;
        margin-bottom: 2rem;
      }
      .character-info .badge {
        display: none;
        font-size: 14px;
      }
      .character-info > p {
        padding-bottom: 5px;
      }
      div.col-sm-12:nth-of-type(odd) > .character-info {
        border-color: #26B9C8;
      }
      .character-info:hover {
        transform: translate3d(0,-4px,0);
        box-shadow: 0 12px 30px 0 rgba(0,0,0,.2);
        transition-property: box-shadow,transform;
        transition-duration: 600ms;
        transition-timing-function: cubic-bezier(.16,1,.29,.99);
      }
      .character-info:hover .badge {
        display: flex;
      }
    </style>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!-- Google Icons: https://material.io/tools/icons/
  also, check out Font Awesome or Glyphicons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


 <!-- Your Custom styles for this project -->
 <!--  Note how we can use BASE_URL constant to resolve all links no matter where the file resides. -->
<link href="<?php echo BASE_URL; ?>css/styles.css" rel="stylesheet">
<!-- Themes from https://bootswatch.com/ : Use the Themes dropdown to select a theme you like; copy/paste the bootstrap.css. Here, we have named the downloaded theme as a new file and can overwrite the default.  -->
<!-- <link href="<?php echo BASE_URL; ?>css/bootstrap-lumen.css" rel="stylesheet"> -->

</head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>index.php">Rendo's Character Database</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : ""; ?>">
            <a class="nav-link d-flex" href="<?php echo BASE_URL; ?>index.php"><span class="material-icons mr-1">home</span>Home</a>
          </li>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == "list.php" ? "active" : ""; ?>">
            <a class="nav-link d-flex" href="<?php echo BASE_URL; ?>list.php"><span class="material-icons mr-1">list</span>List</a>
          </li>
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == "search.php" ? "active" : ""; ?>">
            <a class="nav-link d-flex" href="<?php echo BASE_URL; ?>search.php"><span class="material-icons mr-1">search</span>Search</a>
          </li>
          <li class="nav-item dropdown <?php echo basename(dirname($_SERVER['PHP_SELF'])) == "admin" ? "active" : ""; ?>">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons mr-1">construction</span>Admin Panel</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item d-flex" href="<?php echo BASE_URL; ?>admin/insert.php"><span class="material-icons mr-2">person_add</span>Insert</a>
              <a class="dropdown-item d-flex" href="<?php echo BASE_URL; ?>admin/edit.php"><span class="material-icons mr-2">create</span>Edit</a>
            </div>
          </li>
        </ul>
        <form class="my-2 my-lg-0 navbar-nav">
          <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == "login.php" ? "active" : ""; ?>">
            <?php 
            if(isset($_SESSION['whbuiosybnmyufcgyiubsgnuy'])) {
              echo "<span class=\"nav-link\">Hello, @" . $_SESSION['userid'] . "! <a class=\"text-light\" href=\"".BASE_URL."/admin/logout.php\">(Logout)</a></span>\n";
            }  
            else {
              echo "<a class=\"nav-link d-flex\" href=\"".BASE_URL."admin/login.php\"><span class=\"material-icons mr-1\">login</span>Login</a>";
            }
            ?>
          </li>
        </form>
      </div>
    </nav>

    <main role="main" class="container pt-3">