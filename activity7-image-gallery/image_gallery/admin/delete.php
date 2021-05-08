<?php
include("../includes/mysql_connect.php");

$entryId = $_GET['id'];
if (is_numeric($entryId)) {
  // delete images
  $result = mysqli_query($con, "SELECT * FROM rru_gallery WHERE id = '$entryId'");
  while ($row = mysqli_fetch_array($result)) {
    $oldFilename = $row['rru_filename'];
  }
  if (file_exists("../originals/" . $oldFilename)) {
    unlink("../originals/" . $oldFilename);
  }
  if (file_exists("../display/" . $oldFilename)) {
    unlink("../display/" . $oldFilename);
  }
  if (file_exists("../thumbs/" . $oldFilename)) {
    unlink("../thumbs/" . $oldFilename);
  }

  // delete db entry
  mysqli_query($con, "DELETE FROM rru_gallery WHERE id = $entryId") or die (mysqli_error($con));
  header("location: edit.php");
}
?>