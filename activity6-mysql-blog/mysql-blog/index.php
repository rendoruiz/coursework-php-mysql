<?php 
include("includes/header.php"); 
include("includes/functions.php");
?>

<!-- pagination prerequisites -->
<?php
$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM rru_blog");
$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
$limit = 3;
if($postnum > $limit){
  $tagend = round($postnum % $limit,0);
  $splits = round(($postnum - $tagend)/$limit,0);
  if($tagend == 0){
    $num_pages = $splits;
  }else{
    $num_pages = $splits + 1;
  }
  if(isset($_GET['pg'])){
    $pg = $_GET['pg'];
  }else{
    $pg = 1;
  }
  $startpos = ($pg*$limit)-$limit;
  $limstring = "LIMIT $startpos,$limit";
}else{
  $limstring = "LIMIT 0,$limit";
}
// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) {
  $res->data_seek($row);
  $datarow = $res->fetch_array();
  return $datarow[$field];
}
?>
<!-- pagination prerequisites end -->


<div class="row">
  <div class="col-sm-12">
    <div class="jumbotron clearfix">
      <h1><?php echo APP_NAME ?></h1>
    </div>
  </div>
</div>

<div class="row">
  <?php $defaultResult = mysqli_query($con, "SELECT * FROM rru_blog ORDER BY rru_timedate DESC $limstring"); ?>
  <?php while ($row = mysqli_fetch_array($defaultResult)): ?> 
  <div class="col-sm-12">
    <div class="border border-info rounded rounded-lg p-3 mb-3">
      <div class="mb-3">
        <h2 class="mb-0"><?php echo $row['rru_title']; ?></h2>
        <span class="font-italic">Posted on <?php echo date("F j, Y, g:i a", strtotime($row['rru_timedate'])); ?></span>
      </div>
      <p><?php echo nl2br(makeClickableLinks(convertEmoticons($row['rru_message']))); ?></p>
    </div>
  </div>
  <?php endwhile; ?>
</div>


<!-- pagination usage (nav bar) -->
<?php if ($postnum > $limit): ?>
<nav class="d-flex justify-content-center">
  <ul class="pagination">
    <?php
      $next = $pg + 1;
      $prev = $pg - 1;
      $currentRootUrl = $_SERVER['PHP_SELF'];
    ?>
    <?php if ($pg > 1): ?>
      <li class="page-item"><a class="page-link" href="<?php echo $currentRootUrl; ?>?pg=<?php echo $prev; ?>"><span aria-hidden="true">&laquo;</span> Previous</a></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $num_pages; $i++): ?>
      <?php if ($i != $pg): ?>
        <li class="page-item"><a class="page-link" href="<?php echo $currentRootUrl; ?>?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php else: ?>
        <li class="page-item active"><span class="page-link"><?php echo $i; ?></span></li>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ($pg < $num_pages): ?>
      <li class="page-item"><a class="page-link" href="<?php echo $currentRootUrl; ?>?pg=<?php echo $next; ?>">Next <span aria-hidden="true">&raquo;</span></a></li>
    <?php endif; ?>
  </ul>
</nav>
<?php endif; ?>
<!-- pagination usage (nav bar) end -->

<?php include("includes/footer.php"); ?>