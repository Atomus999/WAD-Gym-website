<?php
if(file_exists('includes/autoload.inc.php')){
  require_once('includes/autoload.inc.php');
}
else if(file_exists('../includes/autoload.inc.php')){
  require_once('../includes/autoload.inc.php') ;
}





session_start();

User::setDatabase(new DataHelper());
Board::setDatabase(new DataHelper());
if(isset($_POST['createPost'])){

      $title = $_POST['title'];
      $description = $_POST['description'];
      $date = date("Y-m-d H:i:s");

        $users = UserManager::LoadUsers();
        foreach($users as $value){
            $checkId=$value->getId();
            $usernme=$value->getName();
            if($_SESSION['userId'] == $checkId){
                
              $board = new Board(null, $checkId, $title, $description, $date,$usernme);
              $checkCreated = $board->PushBoard();

              if($checkCreated){
                echo "Board added";
                header("Location: ../personalPage.php");
               
              }
              else{
                echo "There was an error during making board";
              }
            }
        }
    }

