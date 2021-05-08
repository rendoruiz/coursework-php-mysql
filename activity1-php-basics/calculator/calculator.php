<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculator</title>
</head>
<body>

  <?php
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];

  //echo "$num1 $operator $num2";

  switch($operator) {
    case "+":
      $result = $num1 + $num2;
      break; 
    case "-":
      $result = $num1 - $num2;
      break; 
    case "*":
      $result = $num1 * $num2;
      break; 
    case "/":
      $result = $num1 / $num2;
      break; 
  }

  //echo $result;
  ?>

  <h1>Calculator</h1>
  <form name="calcform" method="POST" action="calculator.php">
    Num 1: <input type="number" name="num1" value="<?php echo $num1; ?>">
    <select name="operator">
      <?php
      // DIRTY WAY of retaining the selected value after page load
      if ($operator) {
        echo "\n\t<option>$operator</option>\n";
      }
      ?>
      <option>+</option>
      <option>-</option>
      <option>*</option>
      <option>/</option>
    </select>
    Num 2: <input type="number" name="num2" value="<?php echo $num2; ?>">

    <input type="submit" name="mysubmit">
  </form>

  <?php
  if($result) {
    echo "<b> = " .$result . "</b>";
  }
  ?>
</body>
</html>