<?php 
include("includes/header.php"); 
include("includes/functions.php");
?>

<div class="row">
  <div class="col-sm-12">
    <div class="jumbotron clearfix">
      <h1><?php echo APP_NAME ?></h1>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 gallery-items">
    <?php $result = mysqli_query($con, "SELECT * FROM rru_gallery ORDER BY rru_timedate DESC"); ?>
    <?php while ($row = mysqli_fetch_array($result)): ?>
    <a class="item" href="details.php?id=<?php echo $row['id']; ?>">
      <div class="thumbnail">
        <img src="thumbs/<?php echo $row['rru_filename']; ?>" alt="<?php echo $row['rru_title']; ?>">
      </div>
      <span class="title"><?php echo $row['rru_title']; ?></span>
    </a>
    <?php endwhile; ?>
  </div>
</div>

<?php include("includes/footer.php"); ?>