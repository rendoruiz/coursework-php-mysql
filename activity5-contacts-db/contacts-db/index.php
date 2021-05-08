<?php include ("includes/header.php"); ?>

<div class="row">
  <div class="col-sm-12">
    <div class="jumbotron clearfix border border-secondary">
      <h1><?php echo APP_NAME ?></h1>
    </div>
  </div>
</div>

<div class="row">
  <?php $defaultResult = mysqli_query($con, "SELECT * FROM rru_contacts"); ?>
  <?php while ($row = mysqli_fetch_array($defaultResult)): ?> 
  <div class="col-sm-12 col-md-6 col-lg-4">
    <div class="contact-item bg-primary">
      <h3 class="text-white"><?php echo $row['rru_bizname']; ?></h3>
      <a href="companyprofile.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-secondary">View Profile</a>
    </div>
  </div>
  <?php endwhile; ?>
</div>

<?php include ("includes/footer.php"); ?>