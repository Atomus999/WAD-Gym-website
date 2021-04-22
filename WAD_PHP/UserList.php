<?php 
include 'includes/autoload.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/loginform.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>
      Fontys (WAD) project
    </title>
  </head>

  <body>
         <?php
        include 'includes/menu.php';
        $result=User::getwadusers();

        $users = array();

        foreach($result as $row)
        {
            $email=$row['Email'];
            $password=$row['Password'];
            $weight=$row['Weight'];
            $height=$row['Height'];
            $name=$row['Name'];
           
            $users = $user;
        }
        
        foreach($users as $user){
            echo $user['Name'];
        }

            

       ?>
      

  

  </body>
</html>
