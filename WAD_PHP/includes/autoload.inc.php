<?php

function my_autoloader($className){
        if (file_exists('classes/' . $className . '.class.php')) {
                require_once ('classes/' . $className . '.class.php');
                return true;
            }
        else if(file_exists('../classes/' . $className . '.class.php')){
                require_once ('../classes/' . $className . '.class.php' );
        }
  
}

spl_autoload_register('my_autoloader');
    
    
?>