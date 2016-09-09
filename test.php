<?php

$msg = "First line of text\nSecond line of text";
$headers = "From: himekaranguleria@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$mail_status = mail("swap.guleria@gmail.com", "sdad", $msg, $headers);
//$mail_status = mail($admin_mail, $admin_subject, $admin_message, $admin_headers);

if (@mail("swap.guleria@gmail.com", 'sdad', $msg, $admin_headers))
    {
    header("location:http://development.dexterousteam.com/appilyrental/#sent");
}
else
    {
    header("location:http://development.dexterousteam.com/appilyrental/#error");
}