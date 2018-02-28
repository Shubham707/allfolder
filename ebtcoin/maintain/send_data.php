
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
ob_start();


$user_session = $_SESSION['user_session'];
$errorsend = array();
$transactionList = array();

$user_current_balance = 0;
$reciever_address= "";
$coin_amount = 0;
$trans_desc ="";
$spendingpassword = "";
$user_current_balance2 = 0;
$client = "";
if(_LIVE_)
{
    $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
    if(isset($client))
    {
        $user_current_balance = $client->getBalance($user_session) - $fee;
        $user_current_balance2 = $user_current_balance;
    }
}

if(isset($_POST['btncontact']))
{
    //  var_dump($_POST);
    //$coin_amount = $_POST['txtChar'];
 $coin_amount = $_POST['txtChar1'];
    $reciever_address = $_POST['btcaddress'];
    $trans_desc = $_POST['discription'];
    $spendingpassword = $_POST['spendingpassword'];
    $user_current_balance = 0;
    
    if(_LIVE_)
    {
        $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
        if(isset($client))
        {
            $user_current_balance = $client->getBalance($user_session) - $fee;
        }
    }
    if (empty($reciever_address))
    {
        $errorsend['reciever_addressError'] = "Please Provide valid Address";
    }   
    
    if (empty($coin_amount))
    {
        $errorsend['txtCharError'] = "Please Provide valid Amount";
    }   
    if(empty($spendingpassword))
    {
        $errorsend['spendingpasswordError'] = "Please Provide valid Spending Password";
    }   
    if ($coin_amount > $user_current_balance)
    {
        $errorsend['txtCharError'] = "Withdrawal amount exceeds your wallet balance";
    }
    if(!empty($spendingpassword))
    {
        $qstring = "select coalesce(id,0) as id,coalesce(transcation_password,'') as transcation_password ";
        $qstring .= "from users WHERE encrypt_username = '" . hash('sha256',$user_session) . "'";
        
        $spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));
    
        $result = $mysqli->query($qstring);
        $user = $result->fetch_assoc();
        $transcation_password_v = $user['transcation_password'];
    
        if ($user['id']> 0 && ($transcation_password_v != $spendingpassword_value))
        {
            $errorsend['spendingpasswordError'] = "Please provide valid Spending Password.";
        }
    }
   
    if(empty($errorsend))
    {
        $withdraw_message = 'ssss';
        if(_LIVE_)
        {
             $withdraw_message = $client->withdraw($user_session, $reciever_address, (float)$coin_amount, $trans_desc);
		
            //$withdraw_message = $client->payment($reciever_address,$coin_amount,'from $user_session');
        }
        //header("Location:dashboard.php?m=".$withdraw_message);
	$trans="Transaction Send Successfull";
    }   
}
?>
	<div class="row">
		
			<div class="col-md-12" style="width: 90%;margin-left: 62px;">
			
			<div class="col-md-3"></div>
				<div class="panel panel-primary">
					<div class="panel-heading"><center>SEND</center></div>
					<div style="color:green; text-align:center;"><?php echo @$trans; ?></div>
					<div class="panel-body">
						<form role="form" action="send_data.php" method="post">
						<fieldset>
							<br>
							<div class= row>
								<div class="col-md-12">
									<div class="col-md-6">
									<div class="form-group">
										<input id="btcaddress"  name ="btcaddress" placeholder="EBT Address" autocomplete="off" type="text" class="form-control" >
<div style="color:red;"><?php if(isset($errorsend['reciever_addressError'])) { echo "<br/><span class=\"messageClass\">".$errorsend['reciever_addressError']."</span>";  }?></div>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										 <input id="btcval" name="txtChar1" placeholder="Amount EBT" autocomplete="off" type="text" class="form-control" >
<div style="color:red;"><?php if(isset($errorsend['txtCharError'])) { echo "<br/><span class=\"messageClass\">".$errorsend['txtCharError']."</span>";  }?>	</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class= row>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<textarea id="discription" name ="discription" class="form-control" placeholder="Description" class="form-control"></textarea>
										</div>
									</div>
								   <div class="col-md-6">
										<div class="form-group">
											 <input id="spendingpassword" name="spendingpassword" class="form-control" autocomplete="off" type="password" placeholder="Spending password">
<div style="color:red;"><?php if(isset($errorsend['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$errorsend['spendingpasswordError']."</span>";  }?></div>
										</div>
									</div>
								</div>
							</div>

								<br>
						
							
						<input type="submit" onclick="return confirm_data();"  name="btncontact" class="btn btn-primary" value="SEND">
						</fieldset>
					</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			
    </div>
<script>
function confirm_data()
{
	r=	confirm('Please confirm to continue. ');
if(r)
{
return true;
}else{
return false;
}
	
}
</script>
<?php include 'footer.php'; ?>
