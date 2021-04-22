<?php

class User{
    protected static $database;
    private $id;
    private $email;
    private $password;
    private $weight;
    private $height;
    private $role;
    private $name;

    private $userview;

    public function getId(){return $this->id;}
    public function getEmail(){return $this->email;}
    public function getRole(){return $this->role;}
    public function getWeight(){return $this->weight;}
    public function getHeight(){return $this->height;}
    public function getName(){return $this->name;}
    public function setId($setId){$this->id=$setId;}
    public function setEmail($setEmail){$this->email=$setEmail;}
    public function setPassword($setPassword){$this->password=$setPassword;}
    public function setWeight($setWeight){$this->weight=$setWeight;}
    public function setHeight($setHeight){$this->height=$setHeight;}
    public function setRole($setRole){$this->role=$setRole;}
    public function setName($name){$this->name=$name;}


      function __construct($id, $email,$password,$weight,$height,$name,$role){
        $this->id = $id;
        $this->email = $email; 
        $this->password = $password; 
        $this->weight = $weight; 
        $this->height = $height; 
        $this->name = $name;
        $this->role = $role;

        $this->userview=new UserView($this);
      }

    public function WriteEmpDataHtml(){
        $this->userview->WriteEmpDataHtml();
    }

    public function pushUserData()
    {
        $sql="INSERT INTO `wadusers`(`ID`, `Email`, `Password`, `Weight`, `Height`, `Role`, `Name`) VALUES (:nll,:email,:pass,:wight,:height,:role,:name)";

        try
        {
            $stmt=self::$database->connect()->prepare($sql);
            $stmt->bindParam(':nll',$null);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':pass',$this->password);
            $stmt->bindParam(':wight',$this->weight);
            $stmt->bindParam(':height',$this->height);
            $stmt->bindParam(':role',$this->role);
            $stmt->bindParam(':name',$this->name);
            $stmt->execute();            
            return true;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    
    public static function PushImage($number, $profileImageName){
        try{

            $sql="INSERT INTO `wadusers_profile`(`ID`, `profile_image`) VALUES (:id, :profile_image)";
            $stmt=self::$database->connect()->prepare($sql);
            $stmt->bindParam('id', $number);
            $stmt->bindParam('profile_image', $profileImageName);

            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function DeleteImage($userid){

            $sql="DELETE FROM `wadusers_profile` WHERE `ID`=:id";
            $results=self::$database->connect()->prepare($sql);
            $results->bindParam('id',$userid);        

            $results->execute(); 

    }
    
    public static function setDatabase($database){
        self::$database=$database;
        
    }

    public static function closeDatabase(){
        self::$database->close();
    }

    public static function getwadusers(){
        $sql="Select * from wadusers";
        
        
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

    public static function getprofiles(){
        $sql="SELECT * FROM wadusers_profile";

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

    public static function editprofile($password, $weight, $height, $userid){

        $sql="UPDATE `wadusers` SET `Password`=:ps,`Weight`=:w,`Height`=:h WHERE `ID` = :id";

            $stmt=self::$database->connect()->prepare($sql);
            $stmt->bindParam('ps',$password);
            $stmt->bindParam('w',$weight);
            $stmt->bindParam('h',$height);
            $stmt->bindParam('id',$userid);
            $stmt->execute();
    }

    public static function login($email,$password){
        $sql="Select * from wadusers where Email=:email and Password=:password";
        try{
            $stmt=self::$database->connect()->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
           
            foreach($result as $row)
            {$number=$row['ID'];}
            if($stmt->rowCount()==1)
                return $number;
            else
                return 0;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function GetBMI(){
        $BMI = ($this->weight)/($this->height/100*$this->height/100);
        $BMI=round($BMI,2);
        return $BMI;
    } 

}