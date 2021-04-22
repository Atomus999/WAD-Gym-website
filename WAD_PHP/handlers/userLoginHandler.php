<?php
if(file_exists('includes/autoload.inc.php')){
    require_once('includes/autoload.inc.php');
}
else if(file_exists('../includes/autoload.inc.php')){
    require_once('../includes/autoload.inc.php') ;
}




session_start();


User::setDatabase(new DataHelper());
if(isset($_POST['loginButton'])){
    $userId=User::login($_POST['email'],$_POST['password']);
    

    if($userId>0)
    {
        $users = UserManager::LoadUsers();
        foreach($users as $value){
            $checkId=$value->getId();
            if($userId == $checkId){
                $_SESSION['userId'] = $value->getId();
                $_SESSION['Name'] = $value->getName();
                $_SESSION['email'] = $value->getEmail();
                $_SESSION['role']=$value->getRole();
            }
        }
        
        
       
        header("Location: ../login.php");
        
    }
    else{
        $_SESSION['userId']=0;
        
        header("Location: ../loginform.php");
        
    }
    

}
?>