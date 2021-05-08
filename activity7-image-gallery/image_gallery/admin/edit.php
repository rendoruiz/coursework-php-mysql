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
    $defaultResult = mysqli_query($con, "SELECT * FROM rru_gallery ORDER BY rru_timedate DESC LIMIT 1");
    while ($row = mysqli_fetch_array($defaultResult)) {
      $pageId = $row['id'];
    }
  }

  // image directories
  $originalsDirectory = "../originals/";
  $displayDirectory = "../display/";
  $thumbsDirectory = "../thumbs/";

  // validation handler
  $errorMessage = array (
    "title"         => null,
    "description"   => null,
  );

  if (isset($_POST['formsubmit'])) {
    // form inputs
    $title = trim($_POST['imagetitle']);
    $description = trim($_POST['imagedescription']);

    if (strlen($title) < 3 || strlen($title) > 50) {
      $errorMessage["title"] = "Please enter a Title from 5 to 50 characters.";
    }

    if (strlen($description) < 5 || strlen($description) > 1000) {
      $errorMessage["description"] = "Please enter a Description from 5 to 1000 characters.";
    }

    //image validation
    if (!empty($_FILES['imagefile']['name'])) {
      if ($_FILES['imagefile']['type'] != "image/jpeg" && $_FILES['imagefile']['type'] != "image/png") {
        $errorMessage["image"] = "Invalid format. Please select an image in JPEG or PNG file format.";
      }
      else if ($_FILES['myfile']['size']/1024/1024 > 8) {
        $errorMessage["image"] = "File too big. Please select an image with file size not exceeding 8 MB.";
      }
    }

    // if there are no errors
    if (!array_search(!null, $errorMessage)) {
      if (!empty($_FILES['imagefile']['name'])) {
        // delete old image files
        $result = mysqli_query($con, "SELECT * FROM rru_gallery WHERE id = '$pageId'");
        while ($row = mysqli_fetch_array($result)) {
          $oldFilename = $row['rru_filename'];
        }
        unlink($originalsDirectory . $oldFilename);
        unlink($displayDirectory . $oldFilename);
        unlink($thumbsDirectory . $oldFilename);

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

            mysqli_query($con, "UPDATE rru_gallery SET 
              rru_title = '$title', 
              rru_description = '$description',
              rru_filename = '$imageFilename',
              rru_exif_datetimeoriginal = '$exifDateTimeOriginal',
              rru_exif_computedheight = '$exifComputedHeight',
              rru_exif_computedwidth = '$exifComputedWidth',
              rru_exif_filesize = '$exifFileSize',
              rru_exif_make = '$exifMake',
              rru_exif_model = '$exifModel'
              WHERE id = '$pageId'") or die(mysqli_error($con));

            $alertMessage = createAlert("Success! Image entry has been updated.", "success");
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
      else {
        mysqli_query($con, "UPDATE rru_gallery SET 
          rru_title = '$title', 
          rru_description = '$description'
          WHERE id = '$pageId'") or die(mysqli_error($con));

        $alertMessage = createAlert("Success! Image entry has been updated.", "success");
        $title = "";
        $description = "";
      }
    }
  }

  if (!array_search(!null, $errorMessage)) {
    // prepopulate form fields with default/selected item
    $result = mysqli_query($con, "SELECT * FROM rru_gallery WHERE id = '$pageId'");
    while ($row = mysqli_fetch_array($result)) {
      $title = $row['rru_title'];
      $description = $row['rru_description'];
      $selectedImageLink = $displayDirectory . $row['rru_filename'];
    }
  }
?>

<div class="row">
  <div class="col-sm-12">
    <h2>Edit Image Entry</h2>
  </div>

  <div class="col-md-6 col-lg-5">
    <?php if(isset($alertMessage)) { echo $alertMessage; } ?>

    <!-- SELECTION -->
    <div class="form-group mt-2">
      <select name="editselect" id="editselect" onchange="editSelectedItem()" class="custom-select">
        <?php $result = mysqli_query($con, "SELECT * FROM rru_gallery ORDER BY rru_timedate DESC"); ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
        <option value="<?php echo BASE_URL."admin/edit.php?id=".$row['id']; ?>" <?php echo $pageId == $row['id'] ? "selected" : ""; ?>><?php echo $row['rru_title']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>
  </div>

  <div class="col-md-12">
    <?php if(isset($selectedImageLink)): ?>
      <div class="d-inline-flex rounded-lg bg-dark p-2 mb-3">
        <img src="<?php echo $selectedImageLink; ?>" alt="<?php echo $title; ?>" class="rounded-lg">
      </div>
    <?php endif; ?>
  </div>
    
  <div class="col-md-6 col-lg-5">
    <form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
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

      <div class="custom-file mb-3">
        <input type="file" name="imagefile"
          class="custom-file-input <?php echo !empty($errorMessage["image"]) ? "is-invalid" : ""; ?>"
          onchange="updateLabel()">
        <label for="imagefile" class="custom-file-label">Replace current image...</label>
        <?php if (!empty($errorMessage["image"])): ?>
          <div class="invalid-feedback mb-2"><?php echo $errorMessage["image"]; ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group <?php echo !empty($errorMessage["image"]) ? "mt-3" : ""; ?>">
        <input type="submit" name="formsubmit" class="btn btn-primary" value="Submit Changes">
        <a href="delete.php?id=<?php echo $pageId; ?>" class="btn btn-danger ml-2" onclick='return confirm("Are you sure you want delete this image entry?")'>Delete Entry</a>
      </div>
    </form>
  </div>
</div>

<?php include("../includes/footer.php"); ?>