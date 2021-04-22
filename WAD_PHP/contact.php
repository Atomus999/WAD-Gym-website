<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>
      Contact form to reach us(group 3)
    </title>
  </head>
  
  <body>

    <?php include 'includes/menu.php';  ?>

    <h1 class="beginnertitle">Have some questions?</h1>
    <?php
$nameErr = $emailErr = $subjectErr ="";
$name = $email = $subject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
      } else {
        $subject = test_input($_POST["subject"]);
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

    <div class="container">
      <form method="post" action="https://formspree.io/f/xpzorywq">
        <label for="fname">Name</label>
        <span class="error">* <?php echo $nameErr;?></span>
        <input type="text" id="name" name="name" value="<?php echo $name;?>" placeholder="Your name..">

        <label for="email">Email</label>
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="text" id="email" name="_replyto" value="<?php echo $email;?>" placeholder="Your email..">

        <label for="subject">Subject</label>
        <span class="error">* <?php echo $subjectErr;?></span>
        <textarea id="subject" name="message" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>
    <?php

?>


  </body>
</html>
