<?php
include("includes/header.php");
$_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
?>

<div class="row">
  <div class="col-sm-12 mb-3">
    <h1>List of Characters</h1>
  </div>
  <?php
  $result = mysqli_query($con, "SELECT * FROM lab4_characters_rendo");

  while ($row = mysqli_fetch_array($result)) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $description = $row['description'];
    $editId = $row['id'];

    echo "\n<div class=\"col-sm-12\">";
    echo "\n<div class=\"character-info\">";
    echo "\n<div class=\"d-flex flex-wrap align-items-center justify-content-between\"><h2>$first_name $last_name</h2><a class=\"badge badge-info ml-3\" href=\"admin/edit.php?id=$editId\"><span class=\"material-icons mr-1\" style=\"font-size: inherit;\">create</span>Edit</a></div>";
    echo "\n<p><b>Description:</b><br><em>$description</em></p>";
    echo "\n</div>";
    echo "\n</div>";
  }
  ?>
</div>

<?php
include("includes/footer.php");
?>