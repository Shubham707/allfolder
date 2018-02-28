<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id = "";
$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";
$otp_token=rand(100000,999999);
$error = array();
if(isset($_POST['btnsignup']))
{
//	var_dump($_POST);
	echo $email_id = $_POST['txtEmailID'];
	echo $password = $_POST['signuppassword'];
	echo $confirmpassword = $_POST['confirmpassword'];
	echo $spendingpassword = $_POST['spendingpassword'];
	echo $confirmspendingpassword = $_POST['confirmspendingpassword'];
	//die();

	if (empty($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid Password";
	}
	if(empty($confirmpassword))
	{
		$error['confirmpasswordError'] = "Please Provide valid Password";
	}
	else if($confirmpassword != $password)
	{
		$error['confirmpasswordError'] = "Password and Confirm Password Must be same";
	}
	if(empty($spendingpassword))
	{
		$error['spendingpasswordError'] = "Please Provide valid Spending Password";
	}
	if(empty($confirmspendingpassword))
	{
		$error['confirmspendingpasswordError'] = "Please Provide valid Spending Password";
	}
	else if($confirmspendingpassword != $spendingpassword)
	{
		$error['confirmpasswordError'] = "Spending Password and Confirm Password Must be same";
	}
	
	if (!isEmail($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}
	$email_id = $mysqli->real_escape_string(strip_tags($email_id));
	$password_value = hash('sha256',addslashes(strip_tags($password)));
	$qstring = "select coalesce(id,0) as id
				from users WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
	
	$result	= $mysqli->query($qstring);
	$user = $result->fetch_assoc();
	/*var_dump($user);
	die();*/

	if ($user['id']> 0)
	{
		$error['emailError'] = "User with email id $email_id already exist.";
	}

	if(empty($error))
	{

		$email_id = $mysqli->real_escape_string(strip_tags($email_id));
		$password_value = hash('sha256',addslashes(strip_tags($password)));
		$spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));
		
		$qstring = "insert into `merchantuser`( `date`, `ip`, `username`, 
		`encrypt_username`, `password`, `transcation_password`, 
		`email`,`accesskey`) values (";
		$qstring .= "now(), ";
		$qstring .= "'".$_SERVER['REMOTE_ADDR']."', ";
		$qstring .= "'".$email_id."', ";
		$qstring .= "'".hash('sha256',$email_id)."', ";
		$qstring .= "'".$password_value."', ";
		$qstring .= "'".$spendingpassword_value."', ";
		$qstring .= "'".$email_id."',";
        $qstring .="'".$otp_token."') ";
	   /*echo $qstring;
	    die();*/
		$result2	= $mysqli->query($qstring);
		if ($result2)
		{
			include'PHPMailer/PHPMailerAutoload.php';
			include'PHPMailer/class.smtp.php';
			$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($email_id) . "</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td><a href='merchantprofile.php?value1='".$otp_token."&& value2=".$spendingpassword_value.">Login</a></td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
			$to=$email_id;
			$subject="Bit Coin Registration Successfully!";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: noreply@YourCompany.com' . "\r\n";
			@mail($to,$subject,$message,$headers);
			ob_start();
			header('Location:mechantlogin.php?msg=Registration Successfully!');	
		}
	}
	else
	{
		ob_start();
		header('Location:mechantsignup.php');

	}
}		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Wallets | <?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>
		<meta name="description" content="<?php echo $coin_fullname;?>(<?php echo $coin_short;?>)">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./img/favicon.png" rel="shortcut icon" type="image/x-icon">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<link href="css/sitestyle.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="css/wallet.css" rel="stylesheet">
		<link href="css/add.css" rel="stylesheet">
 		<script type="text/javascript" async="" src="js/atrk.js"></script>
		<script src="js/modernizr-2.js"></script>	
		
	</head>
	<body>


		
		<div style="height:85%;margin-top:35px" class="MyMainDiv">
			<form  method="post" name="signupform" action="#">
				<div class="form-horizontal white signUpContainer center">
					<div class="flex-center flex-justify flex-column login-box-container">
						<div ui-view="contents" class="login-box mhs">
							<div id="login" data-preflight-tag="Login">
								<header>
									<hgroup>
										<div class="flex-between flex-center flex-wrap">
                                <h2 class="em-300 mtn">Create Merchant Account</h2>
										</div>
									</hgroup>
								</header>
								<div name="loginForm" role="form" autocomplete="off" novalidate="" 
									class="ptl form-horizontal clearfix ng-pristine ng-invalid ng-invalid-required">
									<fieldset>
										<div class="form-group" style="margin-top:0px!important;">
											<label style="float:left">Email ID</label>
											<input id="txtEmailID" name="txtEmailID" class="form-control" style="border:2px solid #e08081;" type="text"
											value="<?php echo $email_id;?>">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>	
											<?php if(isset($error['emailError2'])) { echo "<br/><span class=\"messageClass2\">".$error['emailError2']."</span>";  }?>	
										</div>
										<div class="row">
											<div class="form-group col-md-6" id="half1">
												<label style="float:left">Password</label>
												<input id="signuppassword" name="signuppassword" autocomplete="off" class="form-control" type="password"  value="<?php echo $password;?>">
												<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>	
												<span id="result" style="float:left"></span>
											</div>
											<div class="form-group col-md-6" id="half2">
												<label style="float:left">Confirm Password</label>
												<input id="confirmpassword" name="confirmpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmpassword;?>">
												<?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?>	
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-6" id="half3">
												<label style="float:left">Spending Password</label>
												<input id="spendingpassword" name="spendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
												<?php if(isset($error['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['spendingpasswordError']."</span>";  }?>	
												<span id="spendingresult" style="float:left"></span>
											</div>

											<div class="form-group col-md-6" id="half4">
												<label style="float:left">Confirm Spending Password</label>
												<input id="confirmspendingpassword" name="confirmspendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmspendingpassword;?>">
												<?php if(isset($error['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmspendingpasswordError']."</span>";  }?>	
											</div>
										</div>
										<div style="clear:both"></div>
										<div class="flex-center flex-end mtm mbl">
											<input id="agreement_accept" name="agreement" ng-model="fields.acceptedAgreement" 
											required="" class="pull-right ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" type="checkbox">
											<label translate="ACCEPT_TOS" class="em-300 mbn mls right-align">I have read and agree to the <a>Terms of Service</a></label>
										</div>
										<div class="mtl flex-center flex-end">
											<input type="submit" class="button Lockerblue ladda-button" id="btnsignup" name="btnsignup" onclick="IsEmpty();" value="Sign Up"/>
											<span class="button Lockerblue ladda-button" id="btnLoading" style="display:none">
												<span style="position:relative;">
													<span class="loader"></span>
												</span>
												<span class="val1">Loading</span>
											</span>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

</script>
		</div>
		<div style="background:#2f2f2f;height:15%; display:none" class="minefooter">
			<div class="footer">
				<div class="row-fluid" style="margin-bottom:0px;">
					<div class="col -md-12">
						<div class="social">
							<ul class="social-link tt-animate ltr">
								<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

							</ul>
							<p class="footerp">2017 <?php echo $coin_fullname;?> All RIGHTS RESERVED.</p>
							<p class="footerp">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="js/jquery-1.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>