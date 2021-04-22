<?php
include 'includes/autoload.inc.php';

User::setDatabase(new DataHelper());

if(isset($_POST['create']))
{
    $id=0;
    $email=$_POST['email'];
    $password=$_POST['psw'];
    $repeatPass=$_POST['psw-repeat'];
    $weight=$_POST['weight'];
    $height=$_POST['height'];
    $name=$_POST['name'];
    if($password===$repeatPass){
        $user2= new User($id,$email,$password,$weight,$height,$name,"member");
        
        $something2= $user2->pushUserData();

        if($something2)
            {
                echo "User added to database";
                header("Location: index.php");
            }
        else
            echo "User failed to add to database";

       

    }
    else{
        header("Location: signupform.php");
        
    }

}
