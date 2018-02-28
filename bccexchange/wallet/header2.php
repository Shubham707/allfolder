<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
$error = array();
$transactionList = array();
$bch_address = "";
$user_current_balance = 0;

$transactionList_BTC = array();
$btc_address = "";
$user_current_balance_BTC = 0;
if(isset($_GET['nad']))
{
	$new_address = $_GET['nad'];
	$new_address_BTC = $_GET['nad'];
}
$client = "";
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	$client_BTC = new Client($rpc_host_BTC, $rpc_port_BTC, $rpc_user_BTC, $rpc_pass_BTC);
	if(isset($client))
	{
		$bch_address = $client->getAddress($user_session);
		$transactionList = $client->getTransactionList($user_session);
		$user_current_balance = $client->getBalance($user_session) - $fee;

		$btc_address = $client->getAddress($user_session);
		$transactionList_BTC = $client_BTC->getTransactionList($user_session);
		$user_current_balance_BTC = $client_BTC->getBalance($user_session) - $fee;
	}
}
?>
<?php
include 'header.php';
?>

<div class="app-body">
	<div class="sidebar">
		<nav class="sidebar-nav">
			<ul class="nav">

				<li class="nav-item">
				
					
						<div class="h4" style="margin: 0.5rem">BTG</div>
					
					<div class="">
						<p class="">Balance: <?php echo $user_current_balance ?> BTG</p>

						<?php

						if($_SESSION['is_email_verify']==1){?>
						<a class="" href="send.php" id="btnsend"><i class="fa fa-sign-out"></i>&nbsp;Send BTG</a>

						<?php } else { ?>
						<a class="" onclick="alert('Verify Email Id');" href="send.php" id="btnsend"><i class="fa fa-sign-out"></i>&nbsp;Send BTG</a>
						<?php } ?>
						<a class="" href="recievecoin.php" id="btnreceived"><i class="fa fa-sign-in"></i>&nbsp;Receive BTG</a>
						<a class="" href="transactions.php" id="btnreceived"><i class="fa fa-sign-in"></i>&nbsp;Transaction BTG</a> 
					</div>
				<hr>
					<div class="h4" style="margin: 0.5rem">BTC</div>
				
				<div class=" ">
					<p class="">Balance: <?php echo $user_current_balance_BTC ?> BTC</p>
					<?php

					if($_SESSION['is_email_verify']==1){?>
					<a class="" href="sendgetbtc.php" id="btnsend"><i class="fa fa-sign-out"></i>&nbsp;Send BTC</a>

					<?php } else { ?>
					<a class="" href="sendgetbtc.php" id="btnsend"><i class="fa fa-sign-out"></i>&nbsp;Send BTC</a>
					<?php } ?>

					<a class="" href="addressbtc.php" id="btnreceived"><i class="fa fa-sign-in"></i>&nbsp;Receive BTC</a>
					<a class="" href="transactionsbtc.php" id="btnreceived"><i class="fa fa-sign-in"></i>&nbsp;Transaction BTC</a> 
				</div>
			</ul>
			
		</nav>
	</div>
<br><br><br><br><br><br><br><br><br>
