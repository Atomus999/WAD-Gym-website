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
    <script type="text/javascript" src="javascript/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
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
                <img src= "<?php echo 'images/' . $profile['profile_image']; ?>" width="90" height="90" id="profileimage">
               <?php }
             }
              $value->WriteEmpDataHtml(); ?>

            

            <form action="handlers/edit.php" method="post">

            <label for="psw"><b>Password</b></label><span id="passLenErrorMsg">smth</span> 
            <input type="password" placeholder="Enter Password" name="psw" class="inputPass" id="passLenCheckForm" required>
  
            <label for="psw-repeat"><b>Repeat Password</b></label><span id="passRepeatErrorMsg">smth</span> 
            <input type="password" placeholder="Repeat Password" name="psw-repeat" class="inputPass" id="passRepeatCheckForm" required>
  
            <label for="weight"><b>Weight</b></label><span id="weightErrorMsg">smth</span> 
            <input type="text" placeholder="Enter weight" name="weight" class="inputPass" id="weightCheckForm" required>
  
            <label for="height"><b>Height</b></label><span id="heightErrorMsg">smth</span> 
            <input type="text" placeholder="Enter height" name="height" class="inputPass" id="heightCheckForm" required>

        <button type="submit" name = "save_profile" class="btn btn-success">Finish Edit</button>
    </form>
<?php
            }
        }
       
        }
      }
         ?>

    </div>

    <div class="profilecontainer">
      <div class="form-div">
        <form action="handlers/profiles.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          <div class="form-group text-center center-block" >
            <button type="submit" name="save_profile" class="btn btn-warning btn-lg" style="display:flex; align-items:center;">Save Photo</button>
          </div>
        </form>
      </div>
  </div>


<script src="javascript/profileImage.js"></script>

  </body>
</html>
