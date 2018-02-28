<?php include 'header.php'; 
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
     $coin_amount = $_POST['ebtamount'];
     $reciever_address = 'TGEwEszuFH9fEurNXFisFLxb6YGzCVd42V';

    //$trans_desc = $_POST['discription'];
    //$spendingpassword = $_POST['spendingpassword'];
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
    
        //if ($user['id']> 0 && ($transcation_password_v != $spendingpassword_value))
        //{
          //  $errorsend['spendingpasswordError'] = "Please provide valid Spending Password.";
        //}
    }
    
    if(empty($errorsend))
    {
        $withdraw_message = 'ssss';
        if(_LIVE_)
        {
           $withdraw_message = $client->withdraw($user_session, $reciever_address, (float)$coin_amount, $user_session);
            // $withdraw_message = $client->payment($reciever_address,$coin_amount,'from $user_session');
        }
        header("Location:withdraw.php?msg=Transaction Successful!");
    }   
}

?>
<?php include 'sidebar.php'; ?>
	<div class="row">
		<div class="col-md-12">
			
			<div class="col-md-3"></div>
				<div class="panel panel-primary">
					<div class="panel-heading">
                        <center>WITHDRAW<br>

                        </center>
						<div id="hide" style="color:green; text-align: center;"><?php echo @$_REQUEST['msg']?></div>
						<div id="hide" style="color:red; text-align: center;"><?php echo @$errorsend['reciever_addressError'];?></div>
						<div id="hide" style="color:red; text-align: center;"><?php echo @$errorsend['txtCharError'];?></div>
						<script>
							$(document).ready();
							$('#hide').hide(5000);
						</script>
					</div>
					<div class="panel-body">

						<form role="form" action="withdraw.php" method="post">
						<fieldset>
							<br>
							
						<div class= row>
								<div class="col-md-12">
									<div class="col-md-3"></div>
									<div class="col-md-6 text-center">
										<!-- <div class="form-group">
				<input class="form-control" id="btcaddress" placeholder="Address" name="btcaddress" type="text" required>
				
										</div> -->
                                        <small class="center">Here you can send your EBT coins to admin </small>
										<div class="form-group">
			<input class="form-control" id="txtChar" placeholder="EBT AMOuNT" name="ebtamount" type="text" required>
										</div>
										<input type="submit" class="btn btn-primary" name="btncontact" value=" SEND"> 
										<!-- <a href="change_address.php?nad=1" class="btn btn-primary" name="button"> UPDATE</a> -->
									</div>
								   <div class="col-md-3">
										<!-- <div class="form-group">
											<input class="form-control" placeholder="BTC" name="btc" type="text" required>
										</div> -->
									</div>
								</div>
							</div>

								<br>
						
							
							
						</fieldset>
					</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			
    </div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function () {
 $('#send').click(function () {
 var text = $('#textField').val();
 $('#textArea').html($('#textArea').html() + text);
 $('#textField').val('');
 });
});
</script>

<?php include 'footer.php'; ?>
