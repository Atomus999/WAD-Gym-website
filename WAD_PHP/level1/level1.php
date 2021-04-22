<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link href="../css/style.css" type="text/css" rel="stylesheet">
  <link href="../css/exercise.css" type="text/css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script type="text/javascript" src="../javascript/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../javascript/scriptExercise.js"></script>
  <title>
    Exercises
  </title>
</head>

<body>

      <?php include '../includes/menu.php';
            include 'level1_buttons.php';
            echo '<h3>Choose your level!</h3>';
            include '../data/level1/level1_main_data.php';
      ?>

</body>

</html>
