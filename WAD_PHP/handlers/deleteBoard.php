<?php

if(file_exists('includes/autoload.inc.php')){
    require_once('includes/autoload.inc.php');
}
else if(file_exists('../includes/autoload.inc.php')){
    require_once('../includes/autoload.inc.php') ;
}




session_start();
Board::setDatabase(new DataHelper());



    Board::RemoveBoard($_POST['idToSend']);

    $boards = BoardManager::LoadBoards();

    foreach($boards as $board){
        
        $board->GenerateBoardAdminHtml();}

   

