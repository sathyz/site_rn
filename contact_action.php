<?php
// wait a second to simulate a some latency
//usleep(500000);
include("php/util/mailer.php");

$to = 'sathyz@gmail.com';
$subject = "Konck.. Knock..";

$user = $_POST['name'];
$email_text = "";
foreach($_POST as $key => $value){
	if($value != ""){$email_text.="<br>".ucfirst(str_replace("_", " ",$key))." - ".stripcslashes($value);}
}
if(send_mail($to, $subject, $email_text)){	
	echo "Hi $user, Your message has been sent..";
}
else
	echo "Server encountered error!";
?>
