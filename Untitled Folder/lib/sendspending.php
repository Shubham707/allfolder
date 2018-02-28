<?php 
include_once('../common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
if($_SESSION['user_id']){
	include'../PHPMailer/PHPMailerAutoload.php';
    	include'../PHPMailer/class.smtp.php';
	$new_password = rand(11111,99999);
	$otp_value = hash('sha256',addslashes(strip_tags($new_password)));
	
	$subject="EBT SEND Spending Password";
	$message_body =" Dear User \n";	
	$message_body .= " Your email verification Spending Password is $new_password \n\n";
	$message_body .= " \n\n";
	$message_body .= " Thanks \n";
	$message_body .= " Administrator";
	
	$qstring = "update users set `transcation_password` ='".$otp_value."'"; 
	$qstring .= " WHERE ";
	$qstring .= " id = ".$_SESSION['user_id'];
 
	$result2	= $mysqli->query($qstring);
	$user_session=$_SESSION['user_session'];
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers = "FROM: info@ebtclassic.com";
	  mail($user_session,$subject,$message_body,$headers);
	header("Location:../security.php?mail=An Spending Password has been sent to your E-mail.");
	exit();
}
else 
{ "Location:../security.php?mail=Spending Password is Not send!"; }
?>
