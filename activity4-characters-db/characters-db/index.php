<?php
include ("includes/header.php");
$_SESSION['sourcepath'] = $_SERVER['PHP_SELF'];

// select random character
$randomCharacter = mysqli_query($con, "SELECT * FROM lab4_characters_rendo ORDER BY RAND() LIMIT 1");
while ($row = mysqli_fetch_array($randomCharacter)) {
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $description = $row['description'];
}
?>

<div class="jumbotron clearfix">
  <h1>Rendo's <?php echo APP_NAME ?></h1> 
</div>

<div class="row justify-content-between">
  <div class="col-md-6">
    <h2>SpongeBob Series</h2>
    <p>SpongeBob SquarePants, also simply referred to as SpongeBob, is an American animated comedy television series created by former marine biologist and animator Stephen Hillenburg for Nickelodeon. It is chronologically the tenth Nicktoon to debut. The series is produced by Nickelodeon Animation Studio and United Plankton Pictures, Inc.</p>
    <p>The series chronicles the adventures and endeavors of an accident-prone sea sponge named SpongeBob SquarePants, who lives in an underwater pineapple with his pet snail Gary and works as a fry cook at a fast-food restaurant called the Krusty Krab. His neighbors are his best friend, Patrick Star, and a sour octopus named Squidward Tentacles, the latter of whom is SpongeBob's irritable co-worker. SpongeBob and Squidward work for a cheapskate crab named Eugene H. Krabs, who lives in an anchor house with his whale daughter, Pearl. SpongeBob is enrolled in a boat-driving school run by Mrs. Puff, a pufferfish, and often spends time with a thrill-seeking squirrel from land named Sandy Cheeks. The villains of the show are Plankton and his computer wife, Karen, who owns a failing restaurant called the Chum Bucket, which is across the street from the Krusty Krab.</p>
    <h2>Site Information</h2>
    <p>The purpose of this site is to demonstrate various PHP MySQL functions by retrieving and storing data from a MySQL database.</p>
    <p>Every requirement on the specifications has been completed. This includes the two optional challenge marks which requires further reading on JavaScript inline confirmation dialogue and MySQL RAND() function and LIMIT keyword.</p>
    <p>All information from this site are taken from the <a href="https://spongebob.fandom.com/wiki/">SpongeBob Fandom site</a>.</p>
  </div>
  <div class="col-md-5">
    <div class="character-card">
      <span class="h3 mb-2">Meet <span class="font-weight-bold"><?php echo "$first_name $last_name"; ?>!</span></span>
      <p><?php echo substr($description, 0, 350)."..."; ?></p>
    </div>
  </div>
</div>

<?php
include ("includes/footer.php");
?>