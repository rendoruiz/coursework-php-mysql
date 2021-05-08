<?php
  if(isset($_POST['formsubmit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $province = trim($_POST['province']);
    $country = trim($_POST['country']);
    $comments = trim($_POST['comments']);
    $website = trim($_POST['website']);
    $gender = trim($_POST['gender']);
    $newsletter = trim($_POST['newsletter']);

    // validation variables
    $valid = 1;
    $msgPreError = "\n<div class=\"alert alert-warning\" role=\"alert\">";
    $msgPreSuccess = "\n<div class=\"alert alert-primary\" role=\"alert\">";
    $msgPost = "\n</div>";
  
    // NAME; min-max char length
    if(strlen($name) < 3 || strlen($name) > 40) {
      $valid = 0;
      $valMsgName = "Please enter a Name from 3 to 40 characters.";
    }

    // EMAIL; valid format
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);     // remove unnecessary characters
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $valid = 0;
      $valMsgEmail = "Please enter a valid Email address.";
    }

    // PASSWORD; min-max char length
    if(strlen($password) < 4 || strlen($password) > 20) {
      $valid = 0;
      $valMsgPassword = "Please enter a Password from 4 to 20 characters.";
    }

    // ADDRESS; optional: min-max char length
    if($address != "") {
      if(strlen($address) < 5 || strlen($address) > 50) {
        $valid = 0;
        $valMsgAddress = "Please enter an Address from 5 to 50 characters.";
      }
    }

    // CITY; optional: min-max char length
    if($city != "") {
      if(strlen($city) < 3 || strlen($city) > 30) {
        $valid = 0;
        $valMsgCity = "Please enter a City from 3 to 30 characters.";
      }
    }

    // PROVINCE; all canadian provinces; NO VALIDATION
    
    // COUNTRY; at least 5 countries
    if($country == "") {
      $valid = 0;
      $valMsgCountry = "Please select your Country.";
    }

    // COMMENTS; optional: min-max char length
    if($comments != "") {
      if(strlen($comments) < 5 || strlen($comments) > 200) {
        $valid = 0;
        $valMsgComments = "Please enter a comment from 5 to 200 characters.";
      }
    }

    // WEBSITE URL; valid format
    $website = filter_var($website, FILTER_SANITIZE_URL);     // remove unnecessary characters
    if(!filter_var($website, FILTER_VALIDATE_URL)) {
      $valid = 0;
      $valMsgWebsite = "Please enter a valid Website URL.";
    }

    // GENDER; NO VALIDATION
    // NEWSLETTER; NO VALIDATION

    // SUCCESS / ALL FORMS VALID
    if($valid == 1) {
      $msgSuccess = "SUCCESS! Form data is correct.";
      
      // Database manipulation here
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Lab 3: Form With Validation</title>

    <style type="text/css">
      html { box-sizing: border-box; }
      *, *:before, *:after { box-sizing: inherit; }

      label { position: relative; }

      label.required:before {
        position: absolute;
        left: -12px;
        content: "*";
        color: red;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>PHP Form Validation</h1>
        </div>
        <div class="col-sm-12">
          <?php 
          if ($msgSuccess) {
            echo $msgPreSuccess . $msgSuccess . $msgPost;
          }
          ?>
        </div>
      </div>
      <form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row">
        <div class="col-sm-12 col-md-6">
          <div class="form-group">
            <label for="name" class="required">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
            <?php if($valMsgName) { echo $msgPreError . $valMsgName . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="email" class="required">Email Address:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            <?php if($valMsgEmail) { echo $msgPreError . $valMsgEmail . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="password" class="required">Password:</label>
            <input type="password" class="form-control" name="password">
            <?php if($valMsgPassword) { echo $msgPreError . $valMsgPassword . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
            <?php if($valMsgAddress) { echo $msgPreError . $valMsgAddress . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" name="city" value="<?php echo $city; ?>">
            <?php if($valMsgCity) { echo $msgPreError . $valMsgCity . $msgPost; } ?>
          </div>
        </div>

        <div class="col-sm-12 col-md-6">
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
            <?php if($valMsgProvince) { echo $msgPreError . $valMsgProvince . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="country" class="required">Country:</label>
            <select class="form-control" name="country">
              <option value="">-- select a country --</option>
              <option value="CA" <?php if(isset($country) && $country == "CA") { echo "selected"; } ?>>Canada</option>
              <option value="SE" <?php if(isset($country) && $country == "SE") { echo "selected"; } ?>>Sweden</option>
              <option value="TD" <?php if(isset($country) && $country == "TD") { echo "selected"; } ?>>Chad</option>
              <option value="CL" <?php if(isset($country) && $country == "CL") { echo "selected"; } ?>>Chile</option>
              <option value="CH" <?php if(isset($country) && $country == "CH") { echo "selected"; } ?>>Switzerland</option>
              <option value="GB" <?php if(isset($country) && $country == "GB") { echo "selected"; } ?>>United Kingdom</option>
              <option value="US" <?php if(isset($country) && $country == "US") { echo "selected"; } ?>>United States</option>
            </select>
            <?php if($valMsgCountry) { echo $msgPreError . $valMsgCountry . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="comments">Comments:</label>
            <textarea class="form-control" name="comments" rows="2"><?php if(isset($comments)) { echo $comments; } ?></textarea>
            <?php if($valMsgComments) { echo $msgPreError . $valMsgComments . $msgPost; } ?>
          </div>

          <div class="form-group">
            <label for="website" class="required">Website URL:</label>
            <input type="text" class="form-control" name="website" placeholder="http://website.com" value="<?php echo $website; ?>">
            <?php if($valMsgWebsite) { echo $msgPreError . $valMsgWebsite . $msgPost; } ?>
          </div>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="genderm" value="male" <?php if(isset($gender) && $gender == "male") { echo "checked"; } ?>>
              <label class="form-check-label" for="genderm">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="genderf" value="female" <?php if(isset($gender) && $gender == "female") { echo "checked"; } ?>>
              <label class="form-check-label" for="genderf">
                Female
              </label>
            </div>
            <?php if($valMsgGender) { echo $msgPreError . $valMsgGender . $msgPost; } ?>
          </div>
          
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="newsletter" name="newsletter" <?php if(isset($newsletter) && $newsletter == "1") { echo "checked"; } ?>>
              <label class="form-check-label" for="newsletter">
                Subscribe to Newsletter
              </label>
            </div>
          </div>

          <input type="submit" name="formsubmit" class="btn btn-primary">
        </div>
      </form>
    </div>
    
  </body>
</html>