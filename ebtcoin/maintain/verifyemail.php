<?php 
 include 'header.php'; 
 include 'sidebar.php';
//ALTER TABLE `users` ADD `otp_value` VARCHAR(500) NULL DEFAULT '' AFTER `authused`, ADD `is_email_verify` TINYINT NULL DEFAULT '0' AFTER `otp_value`;

page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}

$otp_value = "";

$user_session = $_SESSION['user_session'];
$user_current_balance = 0;

$error = array();
$error = array();
$client = "";
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	if(isset($client))
	{
		$user_current_balance = $client->getBalance($user_session) - $fee;
	}
}


if(isset($_POST['btnSpending']))
{
	$otp_value = $_POST['otp_value_text'];
	
	//var_dump($otp_value); 
	if(empty($otp_value))
	{
		$error['otpError'] = "Please Provide your Valid OTP Value";
	}

	if(empty($error))
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
		$error['otpError'] = "Your provided OTP Value do not match with  with our store Value. Please provide valid one.";
	}
	
	
	if(empty($error))
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
			$error['otpError'] = "Your Email has been successfuly verified.";
			$otp_value = "";
		}
	}
	}
}
?>



<nav class="navbar navbar-custom navbar-fixed-top nav_color" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<img src="assets/EBT.png" alt="" style="    width: 60px;">
					<!--<a href="login.php"><img src="assets/EBT.png" alt="" style="margin-top: 20px;"></a>
				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown"><a class="dropdown-toggle count-info" href="logout.php">
						<em class="fa fa-power-off"></em><span class="label label-info"></span>
					</a>
						
					</li>

				</ul>-->

			</div>
		</div><!-- /.container-fluid -->
	</nav><br><br>
	<div class="row">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-4 shadow_four">
			<div class="login-panel ">
				<div class="panel-heading">OTP VERIFY

				</div>
				<div class="panel-body">
				   <div id="register">
				   	<div style="color:green;"><?php echo @$_REQUEST['msg'];?></div>
					<form  name="frm_obj" method="post" action="verifyemail.php">
						<div class="register-table">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="ENTER OTP" name="otp_value_text" type="text" id="otp_value"  required value="<?php echo @$otp_value;?>">
											<div style="color:red; text-align:center;"><?php if(isset($error['otpError'])) { echo "<br/><span class=\"messageClass\">".$error['otpError']."</span>";  }?>		
												<span id="email_status" style="color:red;"></span><br>
											</div>

							&nbsp;&nbsp;
							<input type="submit" type="submit" name="btnSpending" class="btn btn-primary" value="Submit"> &nbsp;&nbsp; <a href="security.php" class="btn btn-primary">Back</a>
						</div>
						</fieldset>
					</div>
					</form>
				</div>
			  </div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
//$(document).ready();  
function checkemail()
{
 var email=document.getElementById( "txtEmailID" ).value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'lib/check_availability.php',
  data: { username:email },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK") 
   {
    return true; 
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

</script>
</body>
</html>
