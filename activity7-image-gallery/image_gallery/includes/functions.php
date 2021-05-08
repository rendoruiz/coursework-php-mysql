<?php
function createAlert($message, $alertType = "warning") {
  return "\n<div class=\"alert alert-$alertType\" role=\"alert\">$message\n</div>";
}

function unauthorizedAccessRedirect() {
  if (session_status() == PHP_SESSION_NONE) { session_start(); }
  if (!isset($_SESSION['ijugfnuybfwsuygsnyunguysdbfytj'])) {
    include("../includes/mysql_connect.php");
    header("location: ".BASE_URL."admin/login.php");
  }
}

function createThumbnail($filePath, $destinationFolder, $newWidth, $isJpeg, $watermarkPath = "") {
  list($width, $height) = getimagesize($filePath);
  $imageRatio = $width/$height;
  $newHeight = $newWidth/$imageRatio;

  $thumb = imagecreatetruecolor($newWidth, $newHeight);
  if ($isJpeg) {
    $source = imagecreatefromjpeg($filePath);
  }
  else {
    $source = imagecreatefrompng($filePath);
  }

  // resize
  $newFilename = basename($filePath);   // remove path, get only filename
  imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

  // watermark, center of image    
  if(!empty($watermarkPath)) {
    $watermark = imagecreatefrompng($watermarkPath);
    list($wmWidth, $wmHeight) = getimagesize($watermarkPath);
    $destWidth = ($newWidth - $wmWidth) / 2;
    $destHeight = ($newHeight - $wmHeight) / 2;
    imagecopymerge($thumb, $watermark, $destWidth, $destHeight, 0, 0, $wmWidth, $wmHeight, 20);
  }

  if ($isJpeg) {
    imagejpeg($thumb, $destinationFolder . $newFilename, 80);
  }
  else {
    imagepng($thumb, $destinationFolder . $newFilename, 9);
  } 
  imagedestroy($thumb);
  imagedestroy($source);
}
?>


<?php
//move this to includes/_functions.php
function makeClickableLinks($text)
{
  $text = " " . $text; // fixes problem of not linking if no chars before the link
  $text = preg_replace('/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1">\\1</a>', $text);
  $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2">\\2</a>', $text);
  $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1">\\1</a>', $text);
  return trim($text);
} // end makeClickableLinks
?>