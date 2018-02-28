<?php

if($_REQUEST['submit']=='SEND')
{
	message();
	exit();
}


function message()
{
	       $R=$_REQUEST;
	       include'../PHPMailer/PHPMailerAutoload.php';
            include'../PHPMailer/class.smtp.php';
            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".$R['username']. "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" 
            .$R['email']. "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" 
            .$R['subject']."</td></tr>";
            $message .= "<tr><td><strong>Mobile:</strong> </td><td>'".$R['phone']."</td></tr>";
            $message .= "<tr><td><strong>message:</strong> </td><td>'".$R['message']."</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to='ebtwallet@gmail.com';
            $subject=$R['subject'];
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//echo $headers; echo $message;
             mail($to,$subject,$message,$headers);
//die();	
              ob_start();
	      header("Location:../contactus.php?msg=Message Send Successfully!");
		
}
?>
