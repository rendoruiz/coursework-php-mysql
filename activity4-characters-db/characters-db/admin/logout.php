<?php
  session_start();
  $sourcepath = $_SESSION['sourcepath'];
  
  session_unset();
  session_destroy();

  header("location: $sourcepath");
?>