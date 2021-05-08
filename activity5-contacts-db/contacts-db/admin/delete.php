<?php
include("../includes/mysql_connect.php");

$contactId = $_GET['id'];
if (is_numeric($contactId)) {
  mysqli_query($con, "DELETE FROM rru_contacts WHERE id = $contactId") or die (mysqli_error($con));
  header("location: edit.php");
}
?>