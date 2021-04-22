<?php

class UserView{
    private $user;

    function __construct(User $user)
    {
        $this->user=$user;
    }
    
    public function WriteEmpDataHtml(){

        $BMI = $this->user->GetBMI();
           

            if($BMI<18.5){
                $BMIMessage = "Under Weight";
            }
            else if(18.5 <= $BMI && $BMI < 24.9){
                $BMIMessage = "Normal Weight";
            }
            else if(25 <= $BMI && $BMI < 29.9){
                $BMIMessage = "Over Weight";
            }
            else if(30 <= $BMI){
                $BMIMessage = "Obesity";
            }

        echo 
        "
            <b>Email: </b> " . $this->user->getEmail() . "<br>
            <b>Weight: </b> " . $this->user->getWeight() . "<br>
            <b>Height: </b> " . $this->user->getHeight() . "<br>
            <b>BMI: </b>" . $BMI. ", " . $BMIMessage . "<br>";

    }
    
    public static function ShowProfile(){
        
        $users=User::getwadusers();
        $profiles=User::getprofiles();

        if(isset($users)){
            unset($users);
        }
        else{
            $users = [];

            foreach ($users as $user){
                    foreach ($profiles as $profile){
                        if($user['id'] == $profile['id']){
                            echo 'images/' . $profile['profile_image'];
                        }
            }
        }
    }
}
}

?>