<?php

class DataHelper
{
   private $dsn="mysql:host=studmysql01.fhict.local;dbname=dbi426239";
   private $user="dbi426239";
   private $password="1234";
    
    
    


    private $pdo;

    public function connect()
    {
        try{
        $this ->pdo=new PDO($this->dsn,$this->user,$this->password);
        return $this->pdo;
        } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<h1>$error_message</h1>";
        exit();
        }
    }
    public function close(){
        $this->pdo=null;
    }
}
