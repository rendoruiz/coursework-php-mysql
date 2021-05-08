<?php 
include("includes/header.php"); 
include("includes/functions.php");
$id = $_GET['id'];

// initialize an array of ids from the database for pagination
$itemIds = array();
$result = mysqli_query($con, "SELECT * FROM rru_gallery ORDER BY rru_timedate DESC");
while ($row = mysqli_fetch_array($result)) {
  array_push($itemIds, $row['id']);
}
?>

<div class="row">
  <div class="col-sm-12">
    <div class="jumbotron clearfix">
      <h1><?php echo APP_NAME ?></h1>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 d-flex justify-content-between mb-4">
    <a href="<?php echo BASE_URL; ?>" class="btn btn-secondary d-flex">
      <span class="material-icons mr-1">arrow_back</span>Photo Gallery
    </a>
    <a href="admin/edit.php?id=<?php echo $id; ?>" class="btn btn-secondary d-flex">
      <span class="material-icons mr-1">create</span>Edit Entry
    </a>
  </div>

  <?php $result = mysqli_query($con, "SELECT * FROM rru_gallery WHERE id = '$id'"); ?>
  <?php while ($row = mysqli_fetch_array($result)): ?>
  <div class="col-md-8 col-lg-9">
    <div class="display-image">
      <img src="display/<?php echo $row['rru_filename']; ?>" alt="<?php echo $row['rru_title']; ?>">
    </div>
    <div class="mt-3">
      <!-- pagination usage (nav bar) -->
      <nav class="d-flex justify-content-center">
        <ul class="pagination custom-pagination">
          <?php
            $currentPageIndex = array_search($id, $itemIds);
            $pageBasename = $_SERVER['PHP_SELF'];
            $prevId = $itemIds[$currentPageIndex - 1];
            $nextId = $itemIds[$currentPageIndex + 1];
          ?>
          <?php if ($currentPageIndex > 0): ?>
            <li class="page-item"><a class="page-link" href="<?php echo $pageBasename; ?>?id=<?php echo $prevId; ?>"><span aria-hidden="true">&laquo;</span> Previous</a></li>
          <?php endif; ?>
          <?php if ($currentPageIndex < count($itemIds) - 1): ?>
            <li class="page-item"><a class="page-link" href="<?php echo $pageBasename; ?>?id=<?php echo $nextId; ?>">Next <span aria-hidden="true">&raquo;</span></a></li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- pagination usage (nav bar) end -->
    </div>
  </div>
  <div class="col-md-4 col-lg-3 mt-sm-3 mt-md-0">
    <div class="card border-dark">
      <div class="card-header">Furniture Info</div>
      <div class="card-body">
        <h2><?php echo $row['rru_title']; ?></h2>
        <p><?php echo nl2br(makeClickableLinks($row['rru_description'])); ?></p>
      </div>
    </div>
    <div class="card border-dark mt-4">
      <div class="card-header">EXIF Data (Original)</div>
      <div class="card-body exif-data">
        <span>Date Time Original</span>
        <p><?php echo $row['rru_exif_datetimeoriginal']; ?></p>

        <span>Computed Height</span>
        <p><?php echo $row['rru_exif_computedheight'] . " px"; ?></p>

        <span>Computed Width</span>
        <p><?php echo $row['rru_exif_computedwidth'] . " px"; ?></p>

        <span>File Size</span>
        <p><?php echo $row['rru_exif_filesize'] . " bytes"; ?></p>

        <span>Make</span>
        <p><?php echo $row['rru_exif_make']; ?></p>

        <span>Model</span>
        <p><?php echo $row['rru_exif_model']; ?></p>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
</div>

<?php include("includes/footer.php"); ?>