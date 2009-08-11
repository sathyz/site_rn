<?php
// wait a second to simulate a some latency
//usleep(500000);
include("php/util/mailer.php");
include("php/config/constants.php");

$ini = parse_ini_file(SETTINGS,true);

$to = $ini['contact_mail']['to'];
$subject = $ini['contact_mail']['subject_prefix'] . $_POST['reason'];

$email_text = "";
foreach($_POST as $key => $value){
	if($value != ""){$email_text.="<br>".ucfirst(str_replace("_", " ",$key))." - ".stripcslashes($value);}
}
if(send_mail($to, $subject, $email_text)){	
	echo "Thank for your interest in Rainbow Novelties. We will get in touch with you within one working day.";
}
else
	echo "Sorry for the inconvenience, Server encountered error!";
?>
