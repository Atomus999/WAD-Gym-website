<?php

if(file_exists('includes/autoload.inc.php')){
    require_once('includes/autoload.inc.php');
}
else if(file_exists('../includes/autoload.inc.php')){
    require_once('../includes/autoload.inc.php') ;
}

session_start();
User::setDatabase(new DataHelper());

  $msg = "";
  $msg_class = "";
  $error = "";

  if (isset($_POST['save_profile'])) {
    // for the database
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "../images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes

    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists

    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors

    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        User::DeleteImage($_SESSION['userId']);
        $result=User::PushImage($_SESSION['userId'], $profileImageName);
        if($result){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }

    header("Location: ../login.php");

  }
?>