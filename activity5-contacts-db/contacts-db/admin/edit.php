<?php
  session_start();
  $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
  // redirect if not logged in
  include("../includes/accessredirector.php");

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
    $defaultResult = mysqli_query($con, "SELECT * FROM rru_contacts LIMIT 1");
    while ($row = mysqli_fetch_array($defaultResult)) {
      $pageId = $row['id'];
    }
  }


  // Step 3) update db if button is pressed
  // step 3 is added on top so the links will get updated as items in the db get updated  
  if (isset($_POST['formsubmit'])) {
    $bizname = trim($_POST['bizname']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $website = trim($_POST['website']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $province = trim($_POST['province']);
    $description = trim($_POST['description']);
    $resume = trim($_POST['resume']);

    // validation handler
    $valid = 1;
    function createAlert($message, $alertType = "warning") {
      return "\n<div class=\"alert alert-$alertType\" role=\"alert\">$message\n</div>";
    }

    if (strlen($bizname) < 2 || strlen($bizname) > 200) {
      $valid = 0;
      $alertBizname = createAlert("Please enter a Business Name from 5 to 200 characters.");
    }

    if ($name != "") {
      if (strlen($name) < 2 || strlen($name) > 100) {
        $valid = 0;
        $alertName = createAlert("Please enter a Contact Person from 2 to 100 characters.");
      }
    }

    if (!filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) {
      $valid = 0;
      $alertEmail = createAlert("Please enter a valid Email Address.");
    }

    if (!filter_var(filter_var($website, FILTER_SANITIZE_URL), FILTER_VALIDATE_URL)) {
      $valid = 0;
      $alertWebsite = createAlert("Please enter a valid Website URL.");
    }

    if (strlen(str_replace("-", "", $phone)) != 10 || !is_numeric(str_replace("-", "", $phone))) {
      $valid = 0;
      $alertPhone = createAlert("Please enter a valid 10-digit Phone Number. ");
    }

    if ($address != "") {
      if (strlen($address) < 5 || strlen($address) > 150) {
        $valid = 0;
        $alertAddress = createAlert("Please enter an Address from 5 to 150 characters.");
      }
    }

    if ($city != "") {
      if (strlen($city) < 3 || strlen($city) > 100) {
        $valid = 0;
        $alertCity = createAlert("Please enter a City from 3 to 100 characters.");
      }
    }

    if ($description != "") {
      if (strlen($description) < 5 || strlen($description) > 1000) {
        $valid = 0;
        $alertDescription = createAlert("Please enter a Description from 5 to 1000 characters.");
      }
    }
    
    if($valid == 1) {
      $resume = $resume == "" ? "0" : "1";
      mysqli_query($con, "UPDATE rru_contacts SET 
        rru_bizname = '$bizname', 
        rru_name = '$name', 
        rru_email = '$email', 
        rru_website = '$website', 
        rru_phone = '$phone', 
        rru_address = '$address', 
        rru_city = '$city', 
        rru_province = '$province', 
        rru_description = '$description', 
        rru_resume = '$resume' 
        WHERE id = '$pageId'") or die(mysqli_error($con));

      $alertSuccess = createAlert("Success! Changes to $bizname's entry has been saved.", "success");
    }
  }

  // Step 2) prepopulate form fields for selected item data
  $result = mysqli_query($con, "SELECT * FROM rru_contacts WHERE id = '$pageId'");
  while ($row = mysqli_fetch_array($result)) {
    $bizname = $row['rru_bizname'];
    $name = $row['rru_name'];
    $email = $row['rru_email'];
    $website = $row['rru_website'];
    $phone = $row['rru_phone'];
    $address = $row['rru_address'];
    $city = $row['rru_city'];
    $province = $row['rru_province'];
    $description = $row['rru_description'];
    $resume = $row['rru_resume'];
  }
?>

<div class="row">
  <div class="col-sm-12">
    <h2>Edit Contact</h2>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-4">
    <?php if ($alertSuccess) echo $alertSuccess; ?>

    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
      <div class="form-group">
        <label for="bizname" class="required">Business Name:</label>
        <input type="text" name="bizname" class="form-control" value="<?php echo $bizname; ?>">
        <?php if($alertBizname) { echo $alertBizname; } ?>
      </div>
      <div class="form-group">
        <label for="name">Contact Person:</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
        <?php if($alertName) { echo $alertName; } ?>
      </div>
      <div class="form-group">
        <label for="email" class="required">Email Address:</label>
        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
        <?php if($alertEmail) { echo $alertEmail; } ?>
      </div>
      <div class="form-group">
        <label for="website" class="required">Website URL:</label>
        <input type="text" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $website; ?>">
        <?php if($alertWebsite) { echo $alertWebsite; } ?>
      </div>
      <div class="form-group">
        <label for="phone" class="required">Phone Number:</label>
        <input type="text" name="phone" class="form-control" placeholder="333-222-1111" value="<?php echo $phone; ?>">
        <?php if($alertPhone) { echo $alertPhone; } ?>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
        <?php if($alertAddress) { echo $alertAddress; } ?>
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
        <?php if($alertCity) { echo $alertCity; } ?>
      </div>
      <div class="form-group">
        <label for="province">Province:</label>
        <select class="form-control" name="province">
          <option value="">-- select a province --</option>
          <option value="AB" <?php if(isset($province) && $province == "AB") { echo "selected"; } ?>>Alberta</option>
          <option value="BC" <?php if(isset($province) && $province == "BC") { echo "selected"; } ?>>British Columbia</option>
          <option value="MB" <?php if(isset($province) && $province == "MB") { echo "selected"; } ?>>Manitoba</option>
          <option value="NB" <?php if(isset($province) && $province == "NB") { echo "selected"; } ?>>New Brunswick</option>
          <option value="NL" <?php if(isset($province) && $province == "NL") { echo "selected"; } ?>>Newfoundland and Labrador</option>
          <option value="NS" <?php if(isset($province) && $province == "NS") { echo "selected"; } ?>>Nova Scotia</option>
          <option value="ON" <?php if(isset($province) && $province == "ON") { echo "selected"; } ?>>Ontario</option>
          <option value="PE" <?php if(isset($province) && $province == "PE") { echo "selected"; } ?>>Prince Edward Island</option>
          <option value="QC" <?php if(isset($province) && $province == "QC") { echo "selected"; } ?>>Quebec</option>
          <option value="SK" <?php if(isset($province) && $province == "SK") { echo "selected"; } ?>>Saskatchewan</option>
          <option value="NT" <?php if(isset($province) && $province == "NT") { echo "selected"; } ?>>Northwest Territories</option>
          <option value="NU" <?php if(isset($province) && $province == "NU") { echo "selected"; } ?>>Nunavut</option>
          <option value="YT" <?php if(isset($province) && $province == "YT") { echo "selected"; } ?>>Yukon</option>
        </select>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" rows="4"><?php echo $description; ?></textarea>
        <?php if($alertDescription) { echo $alertDescription; } ?>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" name="resume" <?php if(isset($resume) && $resume == "1") { echo "checked"; } ?>>
          <label class="form-check-label" for="resume">Submit Resume</label>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" name="formsubmit" class="btn btn-primary" value="Submit Changes">
        <a href="delete.php?id=<?php echo $pageId; ?>" class="btn btn-danger ml-2" onclick='return confirm("Are you sure you want delete this contact?")'>Delete Contact</a>
      </div>
    </form>
  </div>

  <div class="col-sm-8 col-md-4 offset-md-1 offset-lg-2">
    <h2>Contacts</h2>
    <div class="list-group">
      <?php $result = mysqli_query($con, "SELECT * FROM rru_contacts"); ?>
      <?php while ($row = mysqli_fetch_array($result)): ?>
      <a href="edit.php?id=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action <?php echo $pageId == $row['id'] ? "list-group-item-primary" : "";?> d-flex py-1"><?php echo $row['rru_bizname']; ?></a>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php include("../includes/footer.php"); ?>