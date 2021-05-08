<?php
  // redirect to login page when not logged in
  session_start();
  if(!isset($_SESSION['whbuiosybnmyufcgyiubsgnuy'])) {
    header("location: login.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>New Blog Entry | Simple Blog</title>

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
      header > .userpanel {
        align-self: flex-start;
        font-weight: bold;
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
        flex-basis: 450px;
        display: flex;
        flex-direction: column;
      }
      form > :last-child { margin-top: 10px; }
      div.messages { 
        flex-basis: 100%;
        display: flex;
        justify-content: center;
      }
      div.messages > div.alert { flex-basis: 450px; }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="pagetitle">
          <span>Rendo's Simple Blog</span>
          <h1>New Blog Entry</h1>
        </div>
        <div class="userpanel">
          <?php 
            if(isset($_SESSION['whbuiosybnmyufcgyiubsgnuy'])) {
              echo "<span>Hello, @" . $_SESSION['userid'] . "! <a href=\"logout.php\">(Logout)</a></span>\n";
              $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
            }  
          ?>
        </div>
      </header>
      <main>
        <?php
          // retrieve form data
          $title = trim($_POST['title']);
          $entry = trim($_POST['entry']);

          if(isset($_POST['mysubmit'])) {
            if ($title != "" && $entry != "") {
              // WRITE TO BLOG

              // set previous blog entries to $existingText
              $handle = fopen("blogfile.txt", "r");
              if($handle) {
                while(!feof($handle)) {
                  $buffer = fgets($handle, 4096); // 4kb of info, single line
                  $existingText .= $buffer;       // append variable, all lines
                  $datetime = date("F j, Y, g:i a");
                }
              }
              fclose($handle);

              // new blog entry string builder
              $newEntry = "\n\t\t<div class=\"blogpost\">";
              $newEntry .= "\n\t\t  <div class=\"posttitle\">$title</div>";
              $newEntry .= "\n\t\t  <div class=\"postdate\">$datetime</div>";
              $newEntry .= "\n\t\t  <div class=\"postcontent\">$entry</div>";
              $newEntry .= "\n\t\t</div>\n";

              $allEntries = $newEntry . $existingText;

              //write to blogfile
              $handle = fopen("blogfile.txt", "w");
              fwrite($handle, $allEntries);
              fclose($handle);

              // END WRITE TO BLOG
              $msg = "New blog entry has been added.";
              $alertType = "success";
            }
            else {
              $msg = "Please fill out the whole form to continue.";
              $alertType = "warning";
            }
          }
        ?>

        <nav>
          <a href="../" class="btn btn-light">&laquo; Back to Homepage</a>
        </nav>

        <div class="messages">
          <?php 
            if($msg) {
              echo "<div class=\"alert alert-$alertType\" role=\"alert\">\n  \t\t\t$msg";
              echo "\n\t\t  </div>";
            }
            echo "\n";
          ?>
        </div>

        <form name="myform" method="post" action="insert.php">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
          </div>

          <div class="form-group">
            <label for="entry">Entry</label>
            <textarea name="entry" class="form-control"></textarea>
          </div>
    
          <input type="submit" name="mysubmit" class="btn btn-primary">
        </form>
      </main>
    </div>

  </body>
</html>