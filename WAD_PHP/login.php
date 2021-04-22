<?php
include 'includes/autoload.inc.php';

session_start();
User::setDatabase(new DataHelper());
$result=User::getwadusers();
$profiles=User::getprofiles();

if(isset($_SESSION['userId'])){
    $id=$_SESSION['userId'];
    
}
else{
    header("Location: loginform.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/profile.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="javascript/profileImage.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>
      Introduce about us
    </title>
  </head>

  <body>

  <div>
      <?php include 'includes/menu.php';?>
      </div>
  
      

    <div class="userinfo-wrapper">

        <?php 

        if(isset($_SESSION['userId'])){
          $result=User::getwadusers();

        if(isset($users)){
            unset($users);
        }
        else{
            $users = [];

            foreach($result as $row)
            {
                $id=$row['ID'];
                $email=$row['Email'];
                $password=$row['Password'];
                $weight=$row['Weight'];
                $height=$row['Height'];
                $name=$row['Name'];
                $role=$row['Role'];
                $user = new User($id,$email,$password,$weight,$height,$name,$role);
                $users[] = $user;
            }
          foreach($users as $value){
            if($value->getId() == $_SESSION['userId']){
             foreach($profiles as $profile){
               if($profile['ID'] == $_SESSION['userId']){ ?>
                <img src= "<?php echo 'images/' . $profile['profile_image']; ?>" width="90" height="90">
               <?php }
             }
              $value->WriteEmpDataHtml();
              ?>
              <button type="button" class="btn btn-dark" onclick="location.href='editprofile.php' ">Edit Profile</button>
              <?php
            }
        }
       
        }
      }
         ?>

    </div>

  </body>
</html>
