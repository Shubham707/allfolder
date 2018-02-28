<?php 
include_once('../common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
if(@$_REQUEST['btnverify']!=='')
{
	include'../PHPMailer/PHPMailerAutoload.php';
    include'../PHPMailer/class.smtp.php';
	$new_password = rand(11111,99999);
	$otp_value = hash('sha256',addslashes(strip_tags($new_password)));
	
	$subject="EBT SEND OTP";
	$message_body =" Dear User \n";	
	$message_body .= " Your email verification OTP is $new_password \n\n";
	$message_body .= " \n\n";
	$message_body .= " Thanks \n";
	$message_body .= " Administrator";
	
	$qstring = "update users set `otp_value` ='".$otp_value."'"; 
	$qstring .= " WHERE ";
//	$qstring .= " encrypt_username = '" . hash('sha256',$user_session) . "' and ";
	$qstring .= " id = ".$_SESSION['user_id'];
	//echo $new_password; 
	$result2	= $mysqli->query($qstring);
//	$user2 = $result2->fetch_assoc();
	$user_session=$_SESSION['user_session'];
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// More headers
		$headers = "FROM: info@ebtclassic.com";
	 mail($user_session,$subject,$message_body,$headers);
	//die();
          //$verify=$_SESSION['is_email_verify']
	header("Location:../security_otp.php?mail=An OTP has been sent to your E-mail.");
	exit();
}
else 
	{ "Location:../security.php?mail=OTP No is Not send!"; }
?>
