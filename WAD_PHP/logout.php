<?php
session_start();
$session=session_destroy();
if($session){
  header('Location:/wad_php/index.php');
}

 ?>
