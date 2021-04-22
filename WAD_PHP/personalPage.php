<?php include 'includes/autoload.inc.php'; 
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
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
    $boards = BoardManager::LoadBoards();
    if(isset($_SESSION['userId'])){
      $id=$_SESSION['userId'];
       
    }
    else{
      header("Location: loginform.php");
    }
    
    include 'includes/menu.php';?>



<div>
<form action = "handlers/process_create.php" method ="POST" class="container" name="Add new board">
      <b> Add board </b>
      <p><input type="text" name="title" placeholder="title"></p>
      <p><textarea name ="description" placeholder="description"></textarea></p>
      <p><input type="submit" name="createPost" value="submit"></p>
    </form>
          </div>

    <div style="background-color: #806D61;DISPLAY: block; border-radius: 10px; width: 50%; align-items: center;text-align: center;margin: 0 auto 0 auto;">
      <p> Search boards from a particular date</p>
    <input type="text" name="dtpick" id="dtpick" class="dtpickTextbox">
    <input type="button" name="filter" id="filter" value="Filter by date" class="btnFilterDate" />
    </div>
    <div id="totest"></div>
    <div id="test2">
    <?php
     
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
        if($board->GetUserId() == $_SESSION['userId']){
          $board->GenerateBoardHtml();
        }
      }?>
    </div>
      
    
  </body>
</html>
