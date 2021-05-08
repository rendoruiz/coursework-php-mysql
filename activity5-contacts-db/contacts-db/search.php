<?php
include("includes/header.php");
$_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
$searchTerm = mysqli_real_escape_string($con, $_POST['search']);
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

  <?php if (isset($_POST['submit']) && $searchTerm != ""): ?>
    <?php
    $searchTerm = mysqli_real_escape_string($con, $_POST['search']);
    $query = "SELECT * FROM rru_contacts WHERE MATCH (rru_bizname, rru_name) AGAINST ('$searchTerm' IN BOOLEAN MODE)";
    $result = mysqli_query($con, $query) or die (mysqli_error($con));
  ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
      <div class="col-sm-12 h3 mb-3 ml-2 font-italic">
        <?php echo mysqli_num_rows($result); ?> contact(s) found
      </div>

      <?php while ($row = mysqli_fetch_array($result)): ?>
      <div class="col-sm-12 col-md-8">
        <div class="search-item">
          <h4><?php echo $row['rru_bizname']; ?></h4>
          <div class="search-actions">
            <a href="companyprofile.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary mr-2 d-flex align-items-center"><span class="material-icons mr-1">face</span>View</a>
            <a href="admin/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-secondary d-flex align-items-center"><span class="material-icons mr-1">create</span>Edit</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>

    <?php else: ?>
      <div class="col-sm-12">
        <div class="alert alert-warning">
          No contact found.
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>

<?php include("includes/footer.php"); ?>