<?php
  session_start();
  $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
  
  include("../includes/functions.php");
  unauthorizedAccessRedirect();

  include("../includes/header.php"); 
?>

<?php
  if (isset($_POST['formsubmit'])) {
    $title = trim($_POST['posttitle']);
    $content = trim($_POST['postcontent']);

    // validation handler
    $valid = 1;

    if (strlen($title) < 5 || strlen($title) > 50) {
      $valid = 0;
      $alertTitle = createAlert("Please enter a Title from 5 to 50 characters.");
    }

    if (strlen($content) < 5 || strlen($content) > 1000) {
      $valid = 0;
      $alertContent = createAlert("Please enter a Content from 5 to 1000 characters.");
    }

    if ($valid == 1) {
      mysqli_query($con, "INSERT INTO rru_blog(rru_title, rru_message) VALUES('$title', '$content')") or die(mysqli_error($con));

      $alertSuccess = createAlert("Success! Blog Post has been added in the database.", "success");

      $title = "";
      $content = "";
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <h2>Insert Blog Post</h2>
  </div>

  <div class="col-md-6 col-lg-5">
    <?php if ($alertSuccess) echo $alertSuccess; ?>

    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="form-group">
        <label for="posttitle" class="required">Title:</label>
        <input type="text" name="posttitle" class="form-control" value="<?php echo $title; ?>">
        <?php if($alertTitle) { echo $alertTitle; } ?>
      </div>
      <div class="form-group">
        <label for="postcontent">Content:</label>

        <!-- Emoji Bar -->
        <div class="emoji-bar bg-light border border-bottom-0 border-secondary rounded">
          <?php displayEmoticons(); ?>
        </div>

        <textarea name="postcontent" class="form-control" rows="4"><?php echo stripcslashes($content); ?></textarea>
        <?php if($alertContent) { echo $alertContent; } ?>
      </div>
      <div class="form-group">
        <input type="submit" name="formsubmit" class="btn btn-primary" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php include("../includes/footer.php"); ?>