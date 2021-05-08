<?php
include("includes/header.php");
$_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];

$searchTerm = trim($_POST['search']);
?>

<div class="row">
  <div class="col-sm-12">
    <h1>Name Search</h1>
  </div>
  <div class="col-sm-12 mt-2 mb-3">
    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
      <div class="form-group form-inline">
        <input type="text" name="search" class="form-control" placeholder="Search Term">
        <input type="submit" name="submit" class="btn btn-primary ml-2" value="Submit">
      </div>
    </form>
  </div>
  <?php
  if (isset($_POST['submit']) && $searchTerm != "") {
    $sqlquery = "SELECT * FROM lab4_characters_rendo WHERE 
                first_name LIKE '%$searchTerm%' 
                OR last_name LIKE '%$searchTerm%'";

    $result = mysqli_query($con, $sqlquery);

    //no result
    if (mysqli_num_rows($result) > 0) {
      echo "\n<div class=\"col-sm-12 h3 mb-3 ml-2 font-italic\">".mysqli_num_rows($result)." character(s) found</div>\n";
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
    }
    else {
      echo "\n<div class=\"col-sm-12\"><div class=\"alert alert-warning\">No character found.</div></div>\n";
    }
  }
  ?>
</div>

<?php
include("includes/footer.php");
?>