<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Simple Blog</title>

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
        display: flex;
        justify-content: flex-end;
      }
      main {
        padding-bottom: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }

      .blogpost {
        background-color: rgba(250, 250, 250, 0.9);
        border-radius: 5px;
        flex-basis: 100%;
        margin: 0 20px 20px;
        padding: 20px;
      }
      .blogpost > .posttitle {    
        font-size: 1.75rem;
        font-weight: bold;
      }
      .blogpost > .postdate {
        font-style: italic;
        font-size: 14px;
      }
      .blogpost > .postcontent {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <div class="pagetitle">
          <span>Rendo's</span>
          <h1>Simple Blog</h1>
        </div>
        <div class="userpanel">
          <?php 
            if(isset($_SESSION['whbuiosybnmyufcgyiubsgnuy'])) {
              echo "<span>Hello, @" . $_SESSION['userid'] . "! <a href=\"admin/logout.php\">(Logout)</a></span>\n";
              $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
            }  
          ?>
        </div>
      </header>
      <main>
        <nav>
          <a href="admin/insert.php" class="btn btn-primary">&plus; New Post</a>
        </nav>

        <?php
          include("admin/blogfile.txt");
        ?>
      </main>
    </div>
    
  </body>
</html>