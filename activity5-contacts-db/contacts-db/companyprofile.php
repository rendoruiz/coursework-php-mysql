<?php
include ("includes/header.php");
$id = $_GET['id'];
?>

<div class="row">
  <div class="col-sm-12 d-flex justify-content-between mb-3">
    <a href="<?php echo BASE_URL; ?>" class="btn btn-secondary d-flex">
      <span class="material-icons mr-1">arrow_back</span>Contact List
    </a>
    <a href="admin/edit.php?id=<?php echo $id; ?>" class="btn btn-secondary d-flex">
      <span class="material-icons mr-1">create</span>Edit Contact
    </a>
  </div>
  <div class="col-sm-12">
    <?php $result = mysqli_query($con, "SELECT * FROM rru_contacts WHERE id = '$id'"); ?>
    <?php while ($row = mysqli_fetch_array($result)): ?> 
    
    <h2><?php echo $row['rru_bizname']; ?></h2>

    <?php if ($row['rru_name']): ?>
    <p><b>Contact Person:</b> <?php echo ($row['rru_name']); ?></p>
    <?php endif; ?>
    
    <p><b>Email:</b> <a href="mailto:<?php echo ($row['rru_email']); ?>"><?php echo ($row['rru_email']); ?></a></p>
    <p><b>Website:</b> <a href="<?php echo ($row['rru_website']); ?>" target="_blank"><?php echo ($row['rru_website']); ?></a></p>
    <p><b>Phone:</b> <a href="tel:+<?php echo ($row['rru_phone']); ?>"><?php echo ($row['rru_phone']); ?></a></p>
    
    <?php if ($row['rru_address']): ?>
    <p><b>Address:</b> <?php echo ($row['rru_address']); ?></p>
    <?php endif; ?>

    <?php if ($row['rru_city']): ?>
    <p><b>City:</b> <?php echo ($row['rru_city']); ?></p>
    <?php endif; ?>

    <?php if ($row['rru_province']): ?>
    <p><b>Province:</b> <?php echo ($row['rru_province']); ?></p>
    <?php endif; ?>

    <?php if ($row['rru_description']): ?>
    <p><b>Description:</b> <?php echo ($row['rru_description']); ?></p>
    <?php endif; ?>

    
    <p class="d-flex">
      <b>Resume Submitted:</b> 
      <?php if ($row['rru_resume'] == 1): ?>
        <span class="material-icons ml-1 text-success font-weight-bold">check</span>
      <?php else: ?>
        <span class="material-icons ml-1 text-danger font-weight-bold">close</span>
      <?php endif; ?>
    </p>
    <?php endwhile; ?>
  </div>
</div>

<?php include ("includes/footer.php"); ?>