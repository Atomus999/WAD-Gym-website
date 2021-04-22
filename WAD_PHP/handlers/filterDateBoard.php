<?php
include '../includes/autoload.inc.php';

Board::setDatabase(new DataHelper());
session_start();




    
    $date=$_POST['selectedDate'];   
    $checkerAdmin=$_POST['check']; 
    
   
    $formatedDate= date('Y-m-d', strtotime($date));

    
    

    $testboards=BoardManager::LoadBoardsByDate($formatedDate);
        foreach ($testboards as $board) {
          if($checkerAdmin=="false"){
            if($board->GetUserId() == $_SESSION['userId']){
              $board->GenerateBoardHtml();
            }
          }
            else if($checkerAdmin=="true"){$board->GenerateBoardHtml();}
            

        }



?>