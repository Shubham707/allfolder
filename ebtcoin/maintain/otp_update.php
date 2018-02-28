<?php 
include 'common.php';
    $otp=$_POST['otp']; 
$user1=$_SESSION['user_session'];
	if(isset($_POST['otp_value']))
	{
		 $otp_value = hash('sha256',addslashes(strip_tags($otp)));
 $qstring="Select * from users where otp_value='".$otp_value."'";
	 $result = $mysqli->query($qstring);

   $user = $result->fetch_assoc(); 
		
		if($user!="")
		{
			$qstring1 = "update users set `is_email_verify` ='1' WHERE `users`.`username` = '$user1'";
			 $result3	= $mysqli->query($qstring1);
			//die();
			if($result3){ header("Location:security_otp.php?msg=Your email id verified!"); }
		
		        else{ header("Location:security_otp.php?error8=OTP IS Invalid"); }
		}
			
		else
		{ 
		header("Location:security_otp.php?error8=OTP IS Invalid"); 
		}
	}
else
		{ 
		header("Location:security_otp.php?error8=OTP IS Invalid"); 
		}
?>
