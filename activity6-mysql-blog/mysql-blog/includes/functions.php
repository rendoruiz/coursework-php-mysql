<?php
// My custom functions
$emojiList = array (
  ":blobsmile:" => "blobsmile.png",
  ":blobgrin:" => "blobgrin.png",
  ":blobheart:" => "blobheart.png",
  ":blobconfused:" => "blobconfused.png",
  ":blobshocked:" => "blobshocked.png",
  ":blobcry:" => "blobcry.png",
  ":blobhand:" => "blobhand.png",
  ":blobkiss:" => "blobkiss.png",
);

function convertEmoticons($emojiText) {
  global $emojiList;
  foreach ($emojiList as $key => $filename) {
    $emojiImage = "<img src=\"emoticons/$filename\" class=\"blob-emoji\" />";
    $emojiText = str_replace($key, $emojiImage, $emojiText);
  }
  return $emojiText;
}

function displayEmoticons() {
  global $emojiList;
  foreach ($emojiList as $key => $filename) {
    echo "<a href=\"javascript:emoticon('$key')\"><img src=\"".BASE_URL."/emoticons/$filename\" alt=\"$key\" class=\"blob-emoji\"></a>";
  }
}

function createAlert($message, $alertType = "warning") {
  return "\n<div class=\"alert alert-$alertType\" role=\"alert\">$message\n</div>";
}

function unauthorizedAccessRedirect() {
  if (session_status() == PHP_SESSION_NONE) { session_start(); }
  if (!isset($_SESSION['wyugdyubnshanuhngsuyyudbtn'])) {
    include("../includes/mysql_connect.php");
    header("location: ".BASE_URL."admin/login.php");
  }
}
// My custom functions end
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