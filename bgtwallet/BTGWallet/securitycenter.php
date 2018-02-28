<?php 
	include_once('common.php');
	page_protect();
	if(!isset($_SESSION['user_id']))
	{
		header("location:logout.php");
	}
	$user_session = $_SESSION['user_session'];
	$password = "";
	$confirmpassword = "";
	$spendingpassword = "";
	$confirmspendingpassword = "";
	$currentpassword = "";
	$currentspendingpassword = "";

	
	/*otp btn*/
	 $otp_value = "";
	$user_current_balance = 0;

	$errorlgn = array();
	$error2 = array();
	$errorotp = array();
	$client = "";
	if(_LIVE_)
	{
		$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
		if(isset($client))
		{
			$user_current_balance = $client->getBalance($user_session) - $fee;
		}
	}


	if(isset($_POST['btnverify']))
{
	
	$new_password = rand(0,99999999);
	$otp_value = hash('sha256',addslashes(strip_tags($new_password)));
	
	$sub =" Email Verification Mail";
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
	
	sendpmail($user_session,$sub,$message_body);
	
	header("Location:verifyemail.php");
	exit();
}



	if(isset($_POST['btnlogin']))
	{
		//var_dump($_POST);
		
		
		$currentpassword = $_POST['currentpassword'];
		$password = $_POST['signuppassword'];
		$confirmpassword = $_POST['confirmpassword'];

		if (empty($currentpassword))
		{
			echo "<script>console.log('');</script>";
			$errorlgn['currentpasswordError'] = "Please Provide your current login password";

		}	
		if(empty($password))
		{
			$errorlgn['passwordError'] = "Please Provide valid Password";
		}
		if(empty($confirmpassword))
		{
			$errorlgn['confirmpasswordError'] = "Please Provide valid Confirm Password";
		}
		else if($confirmpassword != $password)
		{
			$errorlgn['confirmpasswordError'] = "Password and Confirm Password Must be same";
		}
			
		$password_value = hash('sha256',addslashes(strip_tags($currentpassword)));
		$qstring = "select coalesce(id,0) as id
					from users WHERE encrypt_username = '".hash('sha256',$user_session)."' and `password` = '" . $password_value . "'";
			
		//	echo $qstring;
		//	die;
			$result	= $mysqli->query($qstring);
			$user = $result->fetch_assoc();
		//	var_dump($user);
		if ($user['id'] <= 0)
		{
			$error['currentpasswordError'] = "Your current Login password is not match with our store password. Please provide valid one.";
		}
		
		if(empty($error))
		{	
			$password_value = hash('sha256',addslashes(strip_tags($password)));

			$qstring = "update `users`set "; 
			$qstring .= "`password` = ";
			$qstring .= "'".$password_value."'";
			$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user['id'];
			//echo $qstring;
			$result	= $mysqli->query($qstring);
			if($result)
			{
				$errorlgn['currentpasswordError2'] = "Your  Login password has been successfully updated.";
				$password = "";
				$confirmpassword = "";
				$currentpassword = "";
			}
		}
	}

	if(isset($_POST['btnSpending']))
	{
		$spendingpassword = $_POST['spendingpassword'];
		$confirmspendingpassword = $_POST['confirmspendingpassword'];
		$currentspendingpassword = $_POST['currentspendingpassword'];

		
		if(empty($currentspendingpassword))
		{
			$error2['currentspendingpasswordError'] = "Please Provide your current Spending Password";
		}
		if(empty($spendingpassword))
		{
			$error2['spendingpasswordError'] = "Please Provide valid Spending Password";
		}
		if(empty($confirmspendingpassword))
		{
			$error2['confirmspendingpasswordError'] = "Please Provide valid Confirm Spending Password";
		}
		else if($confirmspendingpassword != $spendingpassword)
		{
			$error2['confirmpasswordError'] = "Spending Password and Confirm Password Spending Must be same";
		}
		
		$spendingpassword_value = hash('sha256',addslashes(strip_tags($currentspendingpassword)));
		$qstring = "select coalesce(id,0) as id
					from users where encrypt_username = '".hash('sha256',$user_session)."' and `transcation_password` = '" . $spendingpassword_value . "'";
		
		$result2 = $mysqli->query($qstring);
		$user2 = $result2->fetch_assoc();
		//var_dump($user);
		if ($user2['id'] <= 0)
		{
			$error2['currentspendingpasswordError'] = "Your current spending password is not match with our store password. Please provide valid one.";
		}
		
		if(empty($error2))
		{	
			$spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));

			$qstring = "update `users`set "; 
			$qstring .= "`transcation_password` = ";
			$qstring .= "'".$spendingpassword_value."' ";
			$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user2['id'];
			$result3 = $mysqli->query($qstring);
			if($result3)
			{
				$error2['currentspendingpasswordError2'] = "Your  Spending Password has been successfully updated.";
				$spendingpassword = "";
				$confirmspendingpassword = "";
				$currentspendingpassword = "";
			}
		}
	}


	if(isset($_POST['submit_otp'])){
	
		echo "verify";
		$otp_value = $_POST['otp_value_text'];
		
		//var_dump($otp_value); 
		if(empty($otp_value))
		{
			$errorotp['otpError'] = "Please Provide your Valid OTP Value";
		}

		if(empty($errorotp))
		{
		$otp_value_string = hash('sha256',addslashes(strip_tags($otp_value)));
		$qstring = "select coalesce(id,0) as id
					from users where otp_value = '" . $otp_value_string . "'";
		
		$user2 = array();
		$result2 = $mysqli->query($qstring);
		//	var_dump($result2);
		if($result2)
		{
			$user2 = $result2->fetch_assoc();
		}
		//var_dump($user);
		if ($user2['id'] <= 0)
		{
			$errorotp['otpError'] = "Your provided OTP Value do not match with  with our store Value. Please provide valid one.";
		}
		
		
		if(empty($errorotp))
		{
			$_SESSION['is_email_verify'] = 1;
			$qstring = "update `users`set "; 
			$qstring .= "`is_email_verify` = 1 ";
			$qstring .= " WHERE ";
			//	$qstring .= " encrypt_username = '" . hash('sha256',$user_session) . "' and ";
			$qstring .= " id = ".$user2['id'];
			$result3 = $mysqli->query($qstring);
			if($result3)
			{
				$errorotp['otpError'] = "Your Email has been successfuly verified.";
				$otp_value = "";
			}
		}
		}
	}
	
?>
<?php 
	include 'header.php';
?>
<form action="securitycenter.php" method="post">
	<div class="container-fluid">
	    <div class="animated fadeIn">
	    	<div class="row justify-content-center" >
		    	<div class="col-sm-6 col-md-4">
		            <div class="card text-white ">
		                <div class="card-header text-center bg-success" style="padding: 1.5rem;">
		                    <h1>Security Center</h1>
		                </div>
		                <div class="card-body bg-white text-center text-success" style="margin: 1rem;">
		                    <span>
			                	<?php 
				                	if($_SESSION['is_email_verify'] == 1){
				                		 echo "<span class=\"text-success\"><i class=\"fa fa-check-circle fa-5x\"></i>" ;
				                		}
				                	 else { 
				                	 	echo "<span class=\"text-danger\"><i class=\"fa fa-warning fa-5x\"></i>" ; 
				                	 	} 
		                    	 ?><br>
		                    	 <?php 
		                    	 	if($_SESSION['is_email_verify'] == 0){
		                    	 		echo "<button id=\"btnverify\" name=\"btnverify\" class=\"btn btn-danger\" type=\"submit\">
								    		 Not Verified?
											</button>";
										}
									else { 
				                	 	echo "<span>Verified" ; 
				                	 	} 	
								?>
							</span>
		                </div>
		                <div class="card-footer bg-success text-center"  >
		                	<span>Please update your password regularly</span>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-sm-6">
		            <div class="card">
		                <div class="card-header bg-success" style="padding: 1.5rem;"">
		                    <strong>Update Login Password</strong>
		                </div>
		                <div class="card-body">
		                    <div class="form-group">
		                        <label class="form-form-control-label" for="inputSuccess1">Current Password</label>
		                        <input id="currentpassword" name="currentpassword" autocomplete="off" class="form-control" type="password" value="<?php echo $currentpassword;?>">
		                        <?php if(isset($errorlgn['currentpasswordError'])) { echo "<br/><span class=\"text-danger\">".$errorlgn['currentpasswordError']."</span>";  }?>	
		                        <?php if(isset($errorlgn['currentpasswordError2'])) { echo "<br/><span class=\"text-success\">".$errorlgn['currentpasswordError2']."</span>";  }?>	
		                    </div>
		                    <div class="form-group">
		                        <label class="form-form-control-label" for="inputError1">New Passowrd</label>
		                        <input  id="signuppassword" name="signuppassword" autocomplete="off" class="form-control" type="password" value="<?php echo $password;?>">
		                        <?php if(isset($errorlgn['passwordError'])) { echo "<br/><span class=\"text-danger\">".$errorlgn['passwordError']."</span>";  }?>	
		                    </div>
		                    <div class="form-group">
		                        <label class="form-form-control-label" for="inputSuccess1">Confirm Password</label>
		                        <input id="confirmpassword" name="confirmpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmpassword;?>">
		                        
		                        <?php if(isset($errorlgn['confirmpasswordError'])) { echo "<br/><span class=\"text-danger\">".$errorlgn['confirmpasswordError']."</span>";  }?>	
		                    </div>

		                </div>
		                <input type="submit" class="btn btn-success btn-lg text-center" id="btnlogin" name="btnlogin" value="Update"/>
		            </div>
		        </div>
		        <!--/.col-->
		        <div class="col-sm-6">
		            <div class="card">
		                <div class="card-header bg-success" style="padding: 1.5rem;">
		                    <strong>Update Spending Password</strong>
		                </div>
		                <div class="card-body">
		                    <div class="form-group">
		                        <label class="form-form-control-label" for="inputSuccess1">Current Password</label>
		                        <input id="currentspendingpassword" name="currentspendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $currentspendingpassword;?>">
		                        <?php if(isset($error2['currentspendingpasswordError'])) { echo "<br/><span class=\"text-danger\">".$error2['currentspendingpasswordError']."</span>";  }?>	
		                        <?php if(isset($error2['currentspendingpasswordError2'])) { echo "<br/><span class=\"text-success\">".$error2['currentspendingpasswordError2']."</span>";  }?>	
		                    </div>
		                    <div class="form-group">
		                        <label class="form-form-control-label" for="inputError1">New Passowrd</label>
		                        <input id="spendingpassword" name="spendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
		                        <?php if(isset($error2['spendingpasswordError'])) { echo "<br/><span class=\"text-danger\">".$error2['spendingpasswordError']."</span>";  }?>	
		                    </div>
		                    <div class="form-group">
		                        <label class="form-form-control-label" for="inputSuccess1">Confirm Password</label>
		                        <input id="confirmspendingpassword" name="confirmspendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmspendingpassword;?>">
		                        <?php if(isset($error2['confirmspendingpasswordError'])) { echo "<br/><span class=\"text-danger\">".$error2['confirmspendingpasswordError']."</span>";  }?>
		                    </div>
		                </div>
		                <input type="submit" class="btn btn-success btn-lg text-center" id="btnSpending" name="btnSpending" value="Update"/>
		            </div>
		        </div>
		        <!--/.col-->
		    </div>
			
	    </div>
	</div>
</form>
<?php 
	include 'footer.php';
?>



