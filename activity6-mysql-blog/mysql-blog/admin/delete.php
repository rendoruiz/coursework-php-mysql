<?php
include("../includes/mysql_connect.php");

$postId = $_GET['id'];
if (is_numeric($postId)) {
  mysqli_query($con, "DELETE FROM rru_blog WHERE id = $postId") or die (mysqli_error($con));
  header("location: edit.php");
}
?>