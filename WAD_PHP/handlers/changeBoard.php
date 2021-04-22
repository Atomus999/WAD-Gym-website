<?php
include '../includes/autoload.inc.php';

Board::setDatabase(new DataHelper());
session_start();


$desc=$_POST['description'];

Board::ChangeBoard($_POST["idToSend"],$desc);

$boards = BoardManager::LoadBoards();

foreach($boards as $board){
  if($board->GetUserId() == $_SESSION['userId']){
    $board->GenerateBoardHtml();
  }}







?>