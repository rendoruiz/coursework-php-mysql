<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['sughjkbsufghjbdyughbkasuiogn'])) {
  include("../includes/mysql_connect.php");
  header("location: ".BASE_URL."admin/login.php");
}
?>