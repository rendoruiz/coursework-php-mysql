<?php
  session_start();
  $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
  
  include("../includes/functions.php");
  unauthorizedAccessRedirect();

  include("../includes/header.php"); 
  

  // retrieve "page setter" variable that will define the selected item
  $pageId = $_GET['id'];

  // default selection, fallback if nothing is selected
  if (!isset($pageId)) {
    $defaultResult = mysqli_query($con, "SELECT * FROM rru_blog ORDER BY rru_timedate DESC LIMIT 1");
    while ($row = mysqli_fetch_array($defaultResult)) {
      $pageId = $row['id'];
    }
  }

  // validation handler
  $valid = 1;

  if (isset($_POST['formsubmit'])) {
    $title = trim($_POST['posttitle']);
    $content = trim($_POST['postcontent']);

    if (strlen($title) < 5 || strlen($title) > 50) {
      $valid = 0;
      $alertTitle = createAlert("Please enter a Title from 5 to 50 characters.");
    }

    if (strlen($content) < 5 || strlen($content) > 1000) {
      $valid = 0;
      $alertContent = createAlert("Please enter a Content from 5 to 1000 characters.");
    }

    if ($valid == 1) {
      mysqli_query($con, "UPDATE rru_blog SET
        rru_title = '$title', 
        rru_message = '$content'
        WHERE id = '$pageId'") or die(mysqli_error($con));

      $alertSuccess = createAlert("Success! Changes to the blog post entry has been been saved.", "success");
    }
  }

  if ($valid == 1) {
    // prepopulate form fields with default/selected item
    $result = mysqli_query($con, "SELECT * FROM rru_blog WHERE id = '$pageId'");
    while ($row = mysqli_fetch_array($result)) {
      $title = $row['rru_title'];
      $content = $row['rru_message'];
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <h2>Edit Blog Post</h2>
  </div>

  <div class="col-md-6 col-lg-5">
    <?php if ($alertSuccess) echo $alertSuccess; ?>

    <!-- SELECTION -->
    <div class="form-group">
      <select name="editselect" id="editselect" onchange="editSelectedItem()" class="custom-select">
        <?php $result = mysqli_query($con, "SELECT * FROM rru_blog ORDER BY rru_timedate DESC"); ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
        <option value="<?php echo BASE_URL."admin/edit.php?id=".$row['id']; ?>" <?php echo $pageId == $row['id'] ? "selected" : ""; ?>><?php echo $row['rru_title']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
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
        <input type="submit" name="formsubmit" class="btn btn-primary" value="Submit Changes">
        <a href="delete.php?id=<?php echo $pageId; ?>" class="btn btn-danger ml-2" onclick='return confirm("Are you sure you want delete this contact?")'>Delete Post</a>
      </div>
    </form>
  </div>
</div>

<?php include("../includes/footer.php"); ?>