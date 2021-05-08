<?php
include("../includes/mysql_connect.php");

$charId = $_GET['id'];
// echo "<h1>$charId</h1>";

// if numeric, delete then redirect back to edit page
if (is_numeric($charId)) {
  mysqli_query($con, "DELETE FROM lab4_characters_rendo WHERE id = $charId") or die (mysqli_error($con));
  header("location: edit.php");
}
?>