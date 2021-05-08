<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHP Madlib</title>

    <style type="text/css">
      form, textarea, select {
        max-width: 450px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>PHP Madlib</h1>

      <form name="myform" method="post" action="madlib.php">
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="firstname">
        </div>

        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="lastname">
        </div>

        <div class="form-group">
          <label for="gender">Gender: </label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="male" checked>
            <label class="form-check-label">
              Guy
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="female">
            <label class="form-check-label">
              Girl
            </label>
          </div>
        </div>
  
        <div class="form-group">
          <label for="colour">Favourite Colour</label>
          <select class="form-control" name="colour">
            <option>blue</option>
            <option>red</option>
            <option>aquamarine</option>
            <option>teal</option>
            <option>salmon</option>
            <option>jungle pink</option>
          </select>
        </div>

        <div class="form-group">
          <label for="garment">Garment</label>
          <select class="form-control" name="garment">
            <option>thong monokini</option>
            <option>comfortable but ragged hipster sweater</option>
            <option>gap sprint catalog vest</option>
          </select>
        </div>

        <div class="form-group">
          <label for="flirtfrequency">Flirt Frequency:</label>
          <select class="form-control" name="flirtfrequency">
            <option>one time everyday</option>
            <option>multiple times a day</option>
            <option>few times a week</option>
          </select>
        </div>

        <div class="form-group">
          <label for="location">Location</label>
          <select class="form-control" name="location">
            <option>Northern Mountains</option>
            <option>Eastern Seas</option>
            <option>Western Desert</option>
            <option>Southern Plains</option>
          </select>
        </div>
        <div class="form-group">
          <label for="pokeymoan">Gen 1 Favorite Pokeymoan Starter</label>
          <select class="form-control" name="pokeymoan">
            <option>Bulbasaur</option>
            <option>Charmander</option>
            <option>Squirtle</option>
            <option>Pikachu</option>
            <option>Pokeymoan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="destination">Destination</label>
          <select class="form-control" name="destination">
            <option>Snowy Mounatins</option>
            <option>Deadly Savanna</option>
            <option>Airy Plains</option>
            <option>Deserted Desert</option>
          </select>
        </div>
  
        <input type="submit" name="mysubmit" class="btn btn-primary">
      </form>
      

      <?php
        // step 1: grab user data from form, set variables, and test
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $gender = $_POST['gender'];
        $colour = $_POST['colour'];
        $garment = $_POST['garment'];
        $flirtfrequency = $_POST['flirtfrequency'];
        $location = $_POST['location'];
        $pokeymoan = $_POST['pokeymoan'];
        $destination = $_POST['destination'];
        //echo "$firstName, $lastName, $gender, $colour, $garment";

        if($gender == "male") {
          $preference = "girl";
          $pronoun = "his";
        }
        else {
          $preference = "guy";
          $pronoun = "her";
        }

        // story
        if (isset($_POST['mysubmit'])){
          //echo "SUBMITTED";

          $story = "\n<br><p>Once upon a time, there was a $gender named $firstName $lastName. One fine day, $firstName was out and about wearing a $colour $garment and looking for something to do.</p>";

          $story .= "<p>Then, $firstName saw a cute $preference walking by. \"Hey Cutie\" said $firstName.<br>";

          $story .= "The $preference looked in the direction of $firstName and fell down laughing. \"What are you doing wearing that ridiculous $colour $garment\" said the $preference.</p>";

          $story .= "<p>After flirting around, which occurs $flirtfrequency, $firstName finally head towards the $destination to achieve his dream. On his way, he stumbled upon an old man being attacked by a Nidoran (Male).</p>";
          
          $story .= "<p>\"Shoo! Stop it! Go away!\", said the old man.</p>";
          
          $story .= "<p>$firstName, after seeing the animal(?) abuse happening right before $pronoun very own eyes, immediately pulls out $pronoun phone to take a selfie with the abuse happening in the background. $firstName then posts it to $pronoun social media account with a yes/no poll: \"Should I save the poor (sorry for assuming btw 😉) old man? Pic related, the one on the background.\".</p>";

          $story .= "<p>After 5 minutes, $firstName finally takes in an action after the poll closes. $firstName approaches the old man and asks:</p>";

          $story .= "<p>\"Hey old man! What should I do to help you without getting dirty!?\"</p>";

          $story .= "<p>\"Go take some pokeyball on my bag near the tree and call out the pokeymoan inside it! There should be 4 of them, with one being a huge pain in the butt!</p>";

          $story .= "<p>\"Sure thing!\"</p>";

          $story .= "<p>$firstName slowly walked towards the tree and taken a pokeyball with the pokeymoan of $pronoun liking.</p>";
          $story .= "<p>\"$pokeymoan, I choose you!\"</p>";
          $story .= "<p>The battle ended. The wild Nidoran (Male) was annihilated and was quietly disposed of before pokeymoan PETA arrived. The professor is saved. Everyone was happy.</p>";
          $story .= "<p>$firstName from $location continues his journey towards $destination to achieve his goal of whatever it may be. (Author note: buy the future volumes to find out!)</p>";
          $story .= "<p>To bE CoNtIuEd.</p>";

          echo "$story";
        }
        else {
          //echo "NOT";
        }
      ?>
      
    </div>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>