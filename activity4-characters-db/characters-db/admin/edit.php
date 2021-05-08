<?php
  session_start();
  $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
  // redirect to login page when not logged in
  if(!isset($_SESSION['whbuiosybnmyufcgyiubsgnuy'])) {
    include("../includes/mysql_connect.php");
    header("location: ".BASE_URL."admin/login.php");
  }

  include("../includes/header.php");
  
  /*
  1) get all existing items and create dynamic nav system
  2) prepopulate form fields for selected item data
  3) update db if button is pressed
  */

  // retrieve "page setter" variable that will define the content
  $pageId = $_GET['id'];

  // make default item when nothing is still selected
  if (!isset($pageId)) {
    $defaultResult = mysqli_query($con, "SELECT * FROM lab4_characters_rendo LIMIT 1");
    while ($row = mysqli_fetch_array($defaultResult)) {
      $pageId = $row['id'];
    }
  }


  // Step 3) update db if button is pressed
  // step 3 is added on top so the links will get updated as items in the db get updated  
  if (isset($_POST['submit'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $description = trim($_POST['description']);

    // validation variables
    $valid = 1;
    $msgPreError = "\n<div class=\"alert alert-warning\" role=\"alert\">";
    $msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
    $msgPost = "\n</div>";
    
    if(strlen($first_name) < 3 || strlen($first_name) > 50) {
      $valid = 0;
      $valMsgFirstname = "Please enter a First Name from 3 to 50 characters.";
    }
    if(strlen($last_name) < 3 || strlen($last_name) > 50) {
      $valid = 0;
      $valMsgLastname = "Please enter a Last Name from 3 to 50 characters.";
    }
    if(strlen($description) < 10 || strlen($description) > 1000) {
      $valid = 0;
      $valMsgDescription = "Please enter a Description from 10 to 1000 characters.";
    }
    
    if($valid == 1) {
      mysqli_query($con, "UPDATE lab4_characters_rendo SET 
        first_name = '$first_name',
        last_name = '$last_name',
        description = '$description' 
        WHERE id = '$pageId'") or die(mysqli_error($con));

      $msgSuccess = "Success! Changes to $first_name $last_name's entry has been saved.";
    }
  }


  // Step 1) get all existing items and create dynamic nav system
  $result = mysqli_query($con, "SELECT * FROM lab4_characters_rendo");
  while ($row = mysqli_fetch_array($result)) {
    $editFirst_name = $row['first_name'];
		$editLast_name = $row['last_name'];
    $editId = $row['id'];
    
    $selectedIndicator = $pageId == $editId ? "list-group-item-secondary" : "";
    // create links with this data
    // query string syntax: pagename.php?var1=var1&var2=val2&var3=val3
    $editLinks .= "\n<a href=\"edit.php?id=$editId\" class=\"list-group-item list-group-item-action $selectedIndicator d-flex py-1\">$editFirst_name $editLast_name</a>";
  }


  // Step 2) prepopulate form fields for selected item data
  $result = mysqli_query($con, "SELECT * FROM lab4_characters_rendo WHERE id = '$pageId'");
  while ($row = mysqli_fetch_array($result)) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $description = $row['description'];
  }
?>

<div class="row">
  <div class="col-sm-12">
    <h1>Edit Character</h1>
  </div>
  <div class="col-sm-12 col-md-6">
    <?php 
    if ($msgSuccess) {
      echo $msgPreSuccess . $msgSuccess . $msgPost;
    }
    ?>

    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
      <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
        <?php if($valMsgFirstname) { echo $msgPreError . $valMsgFirstname . $msgPost; } ?>
      </div>
      <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
        <?php if($valMsgLastname) { echo $msgPreError . $valMsgLastname . $msgPost; } ?>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
        <?php if($valMsgDescription) { echo $msgPreError . $valMsgDescription . $msgPost; } ?>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Submit Changes">
        <a href="delete.php?id=<?php echo $pageId; ?>" class="btn btn-danger ml-2" onclick='return confirm("Are you sure you want delete this character?")'>Delete Character</a>
      </div>
    </form>
  </div>

  <div class="col-sm-8 col-md-4">
    <h2>Characters</h2>
    <div class="list-group">
    <?php
      // temp location for character links.
      echo $editLinks;
    ?>
    </div>
    
  </div>
</div>

<?php
  include("../includes/footer.php");
?>