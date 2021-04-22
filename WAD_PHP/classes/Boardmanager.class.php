<?php

if(file_exists('includes/autoload.inc.php')){
    require_once('includes/autoload.inc.php');
}
else if(file_exists('../includes/autoload.inc.php')){
    require_once('../includes/autoload.inc.php') ;
}


class BoardManager{

    private $allboards;
    
    public function allBoards(){return $this->allboards;}


    public static function LoadBoardsByDate($date){
        $result=Board::getBoardsByDate($date);

        if(isset($boards)){
            unset($boards);
        }
        else{
            $boards = [];

            foreach($result as $row)
            {
                $id=$row['ID'];
                $userId=$row['User_Id'];
                $title=$row['Title'];
                $description=$row['Description'];
                $date=$row['Date'];
                $name=$row['UserName'];
                $board = new Board($id, $userId, $title, $description, $date,$name);
                $boards[] = $board;

               
            }
           
        return $boards;
        }
        
    }


    public static function LoadBoards(){
        $result=Board::getAllBoards();

        if(isset($boards)){
            unset($boards);
        }
        else{
            $boards = [];

            foreach($result as $row)
            {
                $id=$row['ID'];
                $userId=$row['User_Id'];
                $title=$row['Title'];
                $description=$row['Description'];
                $date=$row['Date'];
                $name=$row['UserName'];
                $board = new Board($id, $userId, $title, $description, $date,$name);
                $boards[] = $board;

               
            }
            
        
        }
        return $boards;
        
    }

}


?>