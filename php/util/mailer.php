<?php

function send_mail($to, $subject, $email_text){
$header = "MIME-Version: 1.0\n" . "Content-type: text/html; charset=utf-8\n";
//echo $email_text;
return mail($to, 'RN : ' .$subject, $email_text . "<br/> -- RN Mailer" , $header);
}
?>
