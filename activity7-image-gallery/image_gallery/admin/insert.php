<?php
  session_start();
  $_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];
  
  include("../includes/functions.php");
  unauthorizedAccessRedirect();

  include("../includes/header.php"); 
?>

<?php
  if (isset($_POST['formsubmit'])) {
    // image directories
    $originalsDirectory = "../originals/";
    $displayDirectory = "../display/";
    $thumbsDirectory = "../thumbs/";
    
    // form inputs
    $title = trim($_POST['imagetitle']);
    $description = trim($_POST['imagedescription']);

    // validation handler
    $errorMessage = array (
      "title"         => null,
      "description"   => null,
      "image"         => null,
    );

    if (strlen($title) < 3 || strlen($title) > 50) {
      $errorMessage["title"] = "Please enter a Title from 3 to 50 characters.";
    }

    if (strlen($description) < 5 || strlen($description) > 1000) {
      $errorMessage["description"] = "Please enter a Description from 5 to 1000 characters.";
    }

    // image validation
    if (empty($_FILES['imagefile']['name'])) {
      $errorMessage["image"] = "Please select an image to upload.";
    }
    else if ($_FILES['imagefile']['type'] != "image/jpeg" && $_FILES['imagefile']['type'] != "image/png") {
      $errorMessage["image"] = "Invalid format. Please select an image in JPEG or PNG file format.";
    }
    else if ($_FILES['myfile']['size']/1024/1024 > 8) {
      $errorMessage["image"] = "File too big. Please select an image with file size not exceeding 8 MB.";
    }

    // if there are no errors
    if (!array_search(!null, $errorMessage)) {
      $fileExtenstion = str_replace('image/', '.', $_FILES['imagefile']['type']);
      $imageFilename = uniqid('rimg_') . $fileExtenstion;

      try {
        if (move_uploaded_file($_FILES['imagefile']['tmp_name'], $originalsDirectory . $imageFilename)) {
          $currentFile = $originalsDirectory . $imageFilename;
          $isFileJpeg = $fileExtenstion == ".jpeg" ? true : false;

          // get exif data
          $header = exif_read_data($currentFile);
          $exifDateTimeOriginal = $header['DateTimeOriginal'];
          $exifComputedHeight = $header['COMPUTED']['Height'];
          $exifComputedWidth = $header['COMPUTED']['Width'];
          $exifFileSize = $header['FileSize'];
          $exifMake = $header['Make'];
          $exifModel = $header['Model'];

          // thumbnail image
          createThumbnail($currentFile, $thumbsDirectory, 200, $isFileJpeg);
  
          // display image, add watermark
          $watermarkImage = "../images/rimg_watermark.png";
          createThumbnail($currentFile, $displayDirectory, 800, $isFileJpeg, $watermarkImage);
  
          mysqli_query($con, "INSERT INTO rru_gallery(
            rru_title, rru_description, rru_filename, rru_exif_datetimeoriginal, rru_exif_computedheight, rru_exif_computedwidth, rru_exif_filesize, rru_exif_make, rru_exif_model) 
            VALUES('$title', '$description', '$imageFilename', '$exifDateTimeOriginal', '$exifComputedHeight', '$exifComputedWidth', '$exifFileSize', '$exifMake', '$exifModel')") or die(mysqli_error($con));
  
          $alertMessage = createAlert("Success! Image entry has been added to the database.", "success");
          $title = "";
          $description = "";
        }
        else {
          $errorMessage["image"] = "Upload failed. Try again in a bit.";
        }
      }
      catch (Exception $e) {
        $alertMessage = createAlert("Error: $e", "danger");
      }
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <h2>Insert Image Entry</h2>
  </div>

  <div class="col-md-6 col-lg-5">
    <?php if(isset($alertMessage)) { echo $alertMessage; } ?>

    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="imagetitle" class="required">Title:</label>
        <input type="text" name="imagetitle" 
          class="form-control <?php echo !empty($errorMessage["title"]) ? "is-invalid" : ""; ?>" 
          value="<?php echo $title; ?>">
        <?php if (!empty($errorMessage["title"])): ?>
          <div class="invalid-feedback"><?php echo $errorMessage["title"]; ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="imagedescription" class="required">Description:</label>
        <textarea name="imagedescription" rows="4"
          class="form-control <?php echo !empty($errorMessage["description"]) ? "is-invalid" : ""; ?>"><?php echo stripcslashes($description); ?></textarea>
        <?php if (!empty($errorMessage["description"])): ?>
          <div class="invalid-feedback"><?php echo $errorMessage["description"]; ?></div>
        <?php endif; ?>
      </div>

      <div class="custom-file mb-3 required">
        <input type="file" name="imagefile"
          class="custom-file-input <?php echo !empty($errorMessage["image"]) ? "is-invalid" : ""; ?>"
          onchange="updateLabel()">
        <label for="imagefile" class="custom-file-label">Select image...</label>
        <?php if (!empty($errorMessage["image"])): ?>
          <div class="invalid-feedback mb-2"><?php echo $errorMessage["image"]; ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group <?php echo !empty($errorMessage["image"]) ? "mt-3" : ""; ?>">
        <input type="submit" name="formsubmit" class="btn btn-primary" value="Submit">
      </div>
    </form>
  </div>
</div>

<?php include("../includes/footer.php"); ?>