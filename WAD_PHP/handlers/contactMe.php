<?php
header("Content-Type: text/html; charset=UTF-8");
 
if(empty($_POST['name']) 	|| 
   empty($_POST['email']) 	|| 			
   empty($_POST['subject'])	|| 
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) 
   {
	echo "Check validation!";
	return false;
   }
 
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
	

$to = 'lkdmc0310@gmail.com'; 
$email_subject = "FROM:  $name"; 
$email_body = "WAD Contact mail..\n\n"."Detail is....\n\nName: $name\n\nEmail: $email_address\n\subject:\n$subject";
$headers = "Reply-To: $email_address\r"; 
 
mail($to,'=?UTF-8?B?'.base64_encode($email_subject).'?=',$email_body,$headers);
return true;			
?>