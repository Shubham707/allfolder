<?php
include'../common.php';

	        $email= $_REQUEST['txtEmailID'];
	if($email)
	{
		$check="select * from merchantuser where username='$email'";
		$q=mysqli_query($mysqli,$check) or die(mysqli_error());
		$get=mysqli_fetch_assoc($q);
			$val=$get['username'];


	       //die();
	       $otp=rand(11111,99999);
	       if($val)
	       {
	       
	       $sql="INSERT INTO `merchantuser` (`pass`) VALUES ('$otp')";
	       $query= mysqli_query($mysqli,$sql);
	        include'../PHPMailer/PHPMailerAutoload.php';
            include'../PHPMailer/class.smtp.php';
            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" 
            .$R['email']. "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" 
            .$otp."</td></tr>";
            $message .= "<tr><td><strong>Mobile:</strong> </td><td><a href='http://www.bchpayz.com/forget.php'>Forget</a></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to=$email;
            $subject="BCHPayz Message Send OTP!";
	    $headers.='X-Mailer: PHP/' . phpversion().'\r\n';
	    $headers.= 'MIME-Version: 1.0' . "\r\n";
	    $headers.= 'Content-type: text/html; charset=iso-8859-1 \r\n';
            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
            @mail($to,$subject,$message,$headers);
            ob_start();
		    header("Location:../forget.php?msg=Message Send Successfully!");
			}
			else
			{
				header("Location:../forget_pass.php?msg=Wrong Email Id!");

			}

			}
else
{
	header("Location:../forget_pass.php?msg=Wrong Email Id");
}














	?>







