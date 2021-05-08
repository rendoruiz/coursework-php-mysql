<?php
  session_start();
  $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
  // redirect to login page when not logged in
  if(!isset($_SESSION['whbuiosybnmyufcgyiubsgnuy'])) {
    include("../includes/mysql_connect.php");
    header("location: ".BASE_URL."admin/login.php");
  }

  include("../includes/header.php");

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
			// mysql insert
			mysqli_query($con, "INSERT INTO lab4_characters_rendo(first_name, last_name, description) VALUES('$first_name', '$last_name', '$description')") or die(mysqli_error($con));

      $msgSuccess = "Success! Character $first_name $last_name has been added in the database.";

      // clear fields if success
      $first_name = "";
      $last_name = "";
      $description = "";
    }
	}
?>
<h1>Add New Character</h1>

<?php 
if ($msgSuccess) {
	echo $msgPreSuccess . $msgSuccess . $msgPost;
}
?>

<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
		<input type="submit" name="submit" class="btn btn-primary" value="Submit">
	</div>

</form>
<?php
	include("../includes/footer.php");
?>