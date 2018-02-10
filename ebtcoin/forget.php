<?php

include'common.php';
if(isset($_POST['btnforget']))
{
	 $otp = "s!w@".rand(0,100000);
	 $email=$_POST['email'];
	 $sel="select * from users where username='$email'";
	 $val=$mysqli->query($sel);
	 $data=$val->fetch_assoc();
	 $email_id=$data['username'];
	
	 if($email_id)
	 {
			$password_value = hash('sha256',addslashes(strip_tags($otp)));
			$qstring = "update users set password ='".$password_value."'"; 
			$qstring .= " WHERE encrypt_username = '" . hash('sha256',$email_id) . "' and id = ".$data['id'] ;
			$result2	= $mysqli->query($qstring);
	//		$user2 = $result2->fetch_assoc();
			 if($email_id){

			    include'PHPMailer/PHPMailerAutoload.php';
		            include'PHPMailer/class.smtp.php';
		            $message = '<html><body>';
		            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" 
		            .$email. "</td></tr>";
		            $message .= "<tr><td><strong>New Password:</strong> </td><td>".$otp."</td></tr>";
		            $message .= "</table>";
		            $message .= "</body></html>";
		            $to=$email;
		            $subject="Message EBT Classic";
		            $headers = "MIME-Version: 1.0" . "\r\n";
		            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		            $headers .= 'From: noreply@ebtclassic.com' . "\r\n";
		           $send= mail($to,$subject,$message,$headers);
				if($send){
			 	header('Location:login.php?msg=Password Sent Successfully!'); }
			 } else {
			     $msg="This Email id is not Register with us!";
			 }
	}
	else
	{
		$msg="This Email id is not Register with us!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EBT Classic</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top nav_color" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				<img src="assets/EBT.png" alt="" style="    width: 60px;">
                <div class="collapse navbar-collapse navbar-right" id="myNavbar" style="background: rgb(0, 54, 90);">
                    <ul class="nav navbar-nav ">
                        <li><a href="http://162.213.255.138:3001" target="_blank" style="color: white;">Explorer</a></li>
                        <li><a href="login.php" style="color: white;">Login</a></li>
                        <li><a href="index.php" style="color: white;">Sign Up</a></li>
                    </ul>
                </div>
					
			</div>
		</div>
	</nav><br><br><br><br><br><br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="box-shadow: -16px -6px 33px 11px #8888;">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Forget Password</div>
				<div class="panel-body">
					<form role="form" name="frm" action="#" method="post">
						<fieldset>
<div style="color:red; text-align: center;"><?php echo @$msg;?></div>
							<div style="color:green; text-align: center;"><?php echo @$_REQUEST['msg'];?></div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<input type="submit" name="btnforget" class="btn btn-primary" value="Send">
<a style="float:right;" href="login.php" class="btn btn-primary">Back</a></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
