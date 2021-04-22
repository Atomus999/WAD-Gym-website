<?php

$title =  basename($_SERVER['PHP_SELF']);;

$result = substr($title , 0, -9);

?>

<form method="post" action="../handlers/workoutBoard.php">
      Finished? :
      <br>
      <input type = hidden value = <?php echo $result;?> name = title>
      <p><textarea name ="description" placeholder="description"></textarea></p>
      <input type="submit" name ="submit" value="submit">
      <a href="../personalPage.php">Check Boards</a>
  </form>

  