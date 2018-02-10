<?php 
include'../common.php';
if($_POST['otp'])
	{
		echo $otp=hash('sha256',addslashes(strip_tags($_POST['otp']))); die();
		$sql="Select * from users where otp_value='$otp'";
		$query=$mysqli->query($sql);
		$data=$query->fetch_assoc();
		if($data['username'])
		{
			$sql1="update users set is_email_verify='1' where username='$data['username']'";
			$query1=$mysqli->query($sql1);
			if($query1){
				header("Location:dashboard.php");
			}
			else
			{
				header("Location:security_otp.php?error8=OTP IS WRONG");
			}

		}

	}
	else{ header("Location:security_otp.php?error8=OTP IS WRONG"); }
?>
