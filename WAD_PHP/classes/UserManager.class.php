<?php  

if(file_exists('includes/autoload.inc.php')){
    require_once('includes/autoload.inc.php');
}
else if(file_exists('../includes/autoload.inc.php')){
    require_once('../includes/autoload.inc.php') ;
}

class UserManager{

    public static function LoadUsers(){
       
        $result=User::getwadusers();

        if(isset($users)){
            unset($users);
        }
        else{
            $users = [];

            foreach($result as $row)
            {
                $id=$row['ID'];
                $email=$row['Email'];
                $password=$row['Password'];
                $weight=$row['Weight'];
                $height=$row['Height'];
                $name=$row['Name'];
                $role=$row['Role'];
                $user = new User($id,$email,$password,$weight,$height,$name,$role);
                
                $users[] = $user;
            }
            
        }

        return $users;
    }
   
}


?>