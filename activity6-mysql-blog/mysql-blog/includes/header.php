<?php
include("mysql_connect.php");

if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (basename($_SERVER['PHP_SELF']) != "login.php") { $_SESSION['sourcepath'] = $_SERVER['PHP_SELF']; }
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

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <!-- Google Icons: https://material.io/tools/icons/
        also, check out Font Awesome or Glyphicons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Themes from https://bootswatch.com/ : Use the Themes dropdown to select a theme you like; copy/paste the bootstrap.css. Here, we have named the downloaded theme as a new file and can overwrite the default.  -->
  <!-- <link href="<?php echo BASE_URL; ?>css/bootstrap-lumen.css" rel="stylesheet"> -->

  <!-- Your Custom styles for this project -->
  <!-- <link href="<?php echo BASE_URL; ?>css/styles.css" rel="stylesheet"> -->

  <!-- UNRELIABLE CACHED CSS ALTERNATIVE -->
  <style>
    html { box-sizing: border-box; }
    *, *:before, *:after { box-sizing: inherit; }
    body { background-color: rgb(250, 250, 250);}
    .blob-emoji {
      width: 20px;
      height: 20px;
      margin: 2px;
    }
    .emoji-bar {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .emoji-bar .blob-emoji {
      width: unset;
      height: unset;
      min-width: 28px;
      min-height: 28px;
      max-width: 100%;
      max-height: 100%;
    }
    .emoji-bar > a {
      padding: 3px;
      flex: 0;
    }

    .jumbotron{
      padding: 30px;
    }
  </style>

  <script type="text/javascript">
    function emoticon(text) {
      //var txtarea = document.querySelector('textarea'); // must change these
      var txtarea = document.myform.postcontent;
      text = ' ' + text + ' ';
      if (txtarea.createTextRange && txtarea.caretPos) {
        var caretPos = txtarea.caretPos;
        caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
        txtarea.focus();
      } else {
        txtarea.value += text;
        txtarea.focus();
      }
    }
    const editSelectedItem = () => {
      const selectElement = document.getElementById('editselect');
      const editItemUrl = selectElement.options[selectElement.selectedIndex].value;
      if (editItemUrl) {
        location.href = editItemUrl;
      }
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>index.php"><?php echo APP_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == "index.php" ? "active" : ""; ?>">
          <a class="nav-link d-flex" href="<?php echo BASE_URL; ?>index.php"><span class="material-icons mr-1">home</span>Home</a>
        </li>
        <li class="nav-item dropdown <?php echo basename(dirname($_SERVER['PHP_SELF'])) == "admin" ? (basename($_SERVER['PHP_SELF']) != "login.php" ? "active" : "") : ""; ?>">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="material-icons mr-1">construction</span>Admin Panel</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item d-flex" href="<?php echo BASE_URL; ?>admin/insert.php"><span class="material-icons mr-2">person_add</span>Insert</a>
            <a class="dropdown-item d-flex" href="<?php echo BASE_URL; ?>admin/edit.php"><span class="material-icons mr-2">create</span>Edit</a>
          </div>
        </li>
      </ul>
      <form class="my-2 my-lg-0 navbar-nav">
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == "login.php" ? "active" : ""; ?>">
          <?php if(isset($_SESSION['wyugdyubnshanuhngsuyyudbtn'])): ?>
            <span class="nav-link">
              Hello, @<?php echo $_SESSION['userid']; ?>! 
              <a class="text-light" href="<?php echo BASE_URL; ?>/admin/logout.php">(Logout)</a>
            </span>
          <?php else: ?>
            <a href="<?php echo BASE_URL; ?>/admin/login.php" class="nav-link d-flex">
              <span class="material-icons mr-1">login</span>Login
            </a>
          <?php endif;?>
        </li>
      </form>
    </div>
  </nav>

  <main role="main" class="container pt-3">
