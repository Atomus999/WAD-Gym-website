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

        if(isset($_POST['save_profile'])){
    
                $password=$_POST['psw'];
                $repeatPass=$_POST['psw-repeat'];
                $weight=$_POST['weight'];
                $height=$_POST['height'];
                
                if($password===$repeatPass){

                    User::editprofile($password, $weight,$height,$_SESSION['userId']);
                    $msg = "Edited Successfully";
                echo "<script>alert('{$msg}');</script>";
                header("Location: ../login.php");
                }
                else{
                    $msg = "password are not same";
                echo "<script>alert('{$msg}');</script>";
                header("Location: ../editprofile.php");
                }

        }
        $msg = "test";
        echo "<script>alert('{$msg}');</script>";
   

?>