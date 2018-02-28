<?php 
include_once('common.php');
ALTER TABLE `users` ADD `otp_value` VARCHAR(500) NULL DEFAULT '' AFTER `authused`, ADD `is_email_verify` TINYINT NULL DEFAULT '0' AFTER `otp_value`;

page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
$user_session = $_SESSION['user_session'];
$otp_value = "";


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


if(isset($_POST['submit_otp']))
{
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
<form action="verifyemail.php" method="post">
	<div class="container-fluid">
	    <div class="animated fadeIn">
	    	<div class="row justify-content-center" >
		    	<div class="col-sm-6 col-md-4">
		            <div class="card text-white bg-success">
		                <div class="card-header text-center">
		                    <h4 class="modal-title text-center">Enter OTP<small><small>&nbsp; OTP has been send on your email</small></small></h4>
		                </div>
		                <div class="card-body bg-white text-center text-success">
		                    <div class="form-group row">
	                            <label class="col-sm-5 form-control-label" for="input-small">Enter OTP</label>
	                            <div class="col-sm-6">
	                                <input id="otp_value_text" name="otp_value_text" autocomplete="off" class="form-control form-control-sm" type="text" value="<?php echo $otp_value;?>" placeholder="OTP Value">
	                            </div>
	                            <?php if(isset($errorotp['otpError'])) { echo "<br/><span class=\"text-danger\">".$errorotp['otpError']."</span>";  }?>	
	                        </div>
                        
		                </div>
		                <div class="card-footer bg-success text-center">
	                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                		<button type="submit" class="btn btn-success"  id="submit_otp" name="submit_otp">Verify</button>
	                </div>
		            </div>
		        </div>
		    </div>
	    </div>
	</div>
</form>

<?php 
	include 'footer.php';
?>
