


<?php include 'includes/autoload.inc.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/loginform.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="javascript/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.min.css">
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <title>
      Personal page
    </title>
  </head>
  <body>    
    <?php 
   
    User::setDatabase(new DataHelper());
    Board::setDatabase(new DataHelper());

    $users = UserManager::LoadUsers();
    
    
    if(isset($_SESSION['userId'])){
      $id=$_SESSION['userId'];
      
  }
  else{
      header("Location: loginform.php");
  }
    include 'includes/menu.php';?>

    <b><a href="personalPage.php"> Goto personal page </a></b>

    <div style="background-color: #806D61;DISPLAY: block; border-radius: 10px; width: 50%; align-items: center;text-align: center;margin: 0 auto 0 auto;">
      <p> Search boards from a particular date</p>
    <input type="text" name="dtpick" id="dtpick" class="dtpickTextbox">
    <input type="button" name="filter" id="filter" value="Filter by date" class="btnFilterDate" />
    </div>
    
    <?php
     
     $boards = BoardManager::LoadBoards();
      if(isset($_POST['pickedDate'])){
        $testboards=BoardManager::LoadBoardsByDate($_POST['pickedDate']);
        foreach ($testboards as $board) {
          $board->GenerateBoardHtml();
         
        }
      }

?>

    </div>
    
    <div id="boardMain" class="boardMain">
      <?php foreach($boards as $board){
        
          $board->GenerateBoardAdminHtml();
        
      }?>
    </div>
      
    
  </body>
</html>
