<?php

class Board{

    private $id;
    private $userID;
    private $title;
    private $description;
    private $date;
    private $userName;

    private static $database;
    private $boardView;

    public function GetId(){return $this->id;}
    public function GetUserId(){return $this->userID;}
    public function GetTitle(){return $this->title;}
    public function GetDescription(){return $this->description;}
    public function GetDate(){return $this->date;}
    public function GetUserName(){return $this->userName;}

    public function __construct($id,$userId,$tit,$des,$dte,$nme)
    {
        $db=new DataHelper();
        $this->id=$id;
        $this->userID=$userId;
        $this->title=$tit;
        $this->description=$des;
        $this->date=$dte;
        $this->userName=$nme;
        $dbase=$db;

        $this->boardView= new BoardView($this);
    }

    public function PushBoard(){
        try{

        $sql="INSERT INTO `wardboard`(`ID`, `User_Id`, `Title`, `Description`, `Date`,`UserName`) VALUES (:id,:userid,:title,:des,:dte,:nme)";
        $stmt=self::$database->connect()->prepare($sql);
        $stmt->bindParam('id',$null);
        $stmt->bindParam('userid',$this->userID);
        $stmt->bindParam('title',$this->title);
        $stmt->bindParam('des',$this->description);
        $stmt->bindParam('dte',$this->date);
        $stmt->bindParam('nme',$this->userName);
        $stmt->execute();     
        return true;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function ChangeBoard($number,$description){
        $sql="UPDATE `wardboard` SET `Description`=:dsc WHERE id=:id";
        $results=self::$database->connect()->prepare($sql);
        $results->bindParam('dsc',$description);      
        $results->bindParam('id',$number);        

        $results->execute(); 
    }

    public static function RemoveBoard($number)
    {
        $sql="DELETE FROM `wardboard` WHERE id=:id";
        $results=self::$database->connect()->prepare($sql);
        $results->bindParam('id',$number);        

        $results->execute(); 
    }
    
    public static function setDatabase($database){
        self::$database=$database;
        
    }

    public function GenerateBoardAdminHtml(){
        $this->boardView->GenerateBoardAdminHtml();
    }

   

    public function GenerateBoardHtml(){
        $this->boardView->GenerateBoardHtml();
    }
    
   

    public static function getBoardsByUserId($chosenId){
        $sql="Select * from wardboard where User_Id=:id";
        try{
            $stmt=self::$database->connect()->prepare($sql);
            $stmt->bindParam('id',$chosenId);
            $stmt->execute();
            $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getBoardsByDate($date){
        $modifdate=$date . 'T00:00:00.00';
        $modifdate2=$date . 'T23:59:59.999';
        $sql="Select * from wardboard where date BETWEEN :date AND :datee";
        try{
            $stmt=self::$database->connect()->prepare($sql);
            $stmt->bindParam('date',$modifdate);
            $stmt->bindParam('datee',$modifdate2);
            $stmt->execute();
            $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }



    public static function getAllBoards(){
            $sql="Select * from wardboard";
            try{
                $stmt=self::$database->connect()->prepare($sql);
                $stmt->execute();
                $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }

    
    }
  
}
 ?>
