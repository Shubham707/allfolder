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
$bch_account_address = "";
$user_current_balance = 0;

$transactionList_BTC = array();
$btc_account_address = "";
$user_current_balance_BTC = 0;
if(isset($_GET['nad']))
{
	$new_address = $_GET['nad'];
	$new_address_BTC = $_GET['nad'];
}
$client = "";
$client_BTC = "";
if(_LIVE_)
{
	

	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	$client_BTC = new Client($rpc_host_BTC, $rpc_port_BTC, $rpc_user_BTC, $rpc_pass_BTC);
	if(isset($client) && isset($client_BTC ))
	{
		$bch_account_address = $client->getAddress($user_session);
		$transactionList = $client->getTransactionList($user_session);
		$user_current_balance = $client->getBalance($user_session) - $fee;

		$btc_account_address = $client_BTC->getAddress($user_session);
		$transactionList_BTC = $client_BTC->getTransactionList($user_session);
		$user_current_balance_BTC = $client_BTC->getBalance($user_session) - $fee;
	}
}
?>
<?php
include 'header.php';
?>
<div class="container-fluid">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-7">
				<div class="card d-md-down-none ">
					<div class="card-body">
						<!-- TradingView Widget BEGIN -->
						<div id="tv-medium-widget-6ebf0"></div>
						<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
						<script type="text/javascript">
							new TradingView.MediumWidget({
								"container_id": "tv-medium-widget-6ebf0",
								"symbols": [
								"BITFINEX:BCHBTC|1d"
								],
								"gridLineColor": "#e9e9ea",
								"fontColor": "#1544c0",
								"underLineColor": "#dbeffb",
								"trendLineColor": "#1544c0",
								"width": "100%",
								"height": "400px",
								"locale": "in"
							});
						</script>
						<!-- TradingView Widget END -->
						<!--/.row-->
						<!--/.col-->
					</div>
					<!--/.row-->
				</div>
			</div> 
			<div class="col-md-5">
				<div class="card text-white bg-success">
					<div class="card-header text-center">
						<div class="h4" style="margin-bottom: 0">BCC</div>
					</div>
					<div class="div-body bg-white ">
						<p class="black-text">Balance: <?php echo $user_current_balance ?> BCC</p>
						<p class="black-text">Address: <?php echo $bch_account_address;?></p>
						<p style="text-align: center;"><img src="http://chart.apis.google.com/chart?cht=qr&chs=100x100&chl=<?php echo $bch_account_address?>" alt="QR Code" style="width:auto;height:100px;border:0;vertical-align: middle;"/></p>  
					</div>
				</div>
				<div class="card text-white bg-success">
					<div class="card-header text-center">
						<div class="h4" style="margin-bottom: 0">BTC</div>
					</div>
					<div class="div-body bg-white ">
						<p class="black-text">Balance: <?php echo $user_current_balance_BTC; ?> BTC</p>
						<p class="black-text">Address: <?php echo $btc_account_address; ?></p>
						<p style="text-align: center;"><img src="http://chart.apis.google.com/chart?cht=qr&chs=100x100&chl=<?php echo $btc_account_address?>" alt="QR Code" style="width:auto;height:100px;border:0;vertical-align: middle;"/></p>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-success">
						<div class="h4 font-weight-normal">Last Transactions</div>
					</div>
					<div class="card-body">
						<table class="table table-responsive table-hover table-outline mb-0">
							<thead class="thead-default">
								<tr>					
									<th>Date</th>
									<th>Address</th>
									<th class="text-center">Type</th>
									<th>Amount</th>
									<th class="text-center">Confirmations</th>
									<th>TX</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$bold_txxs = "";
								if(count($transactionList)>0)
									{ 	$i = 0;
										foreach(array_reverse($transactionList) as $transaction) { 
											if($transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else if($transaction['category']=="receive"){ $tx_type = '<b style="color: #01DF01;">Received</b>'; } else {
												$tx_type = '<b style="color: #01DF01;">Admin</b>';
												$transaction['address'] = 'BCCWALLET.IO ';
												$transaction['confirmations'] = 'Confirmed ';
												$blockchain_url='';
												$transaction['txid']= '';
											}
											echo '<tr>
											<td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
											<td>'.$transaction['address'].'</td>
											<td>'.$tx_type.'</td>
											<td>'.abs($transaction['amount']).'</td>
											<td>'.$transaction['confirmations'].'</td>
											<td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
										</tr>';
										if ($i++ == 4){
											break;
										}
									}
								}
								else if((count($transactionList)== 0))
								{
									echo "<tr><td>There is no Transaction exists</td><td></td><td></td><td></td><td></td><td></td></tr>";
								}
								?>	
							</tbody>
						</table>
					</div>
				</div>   
			</div>   
		</div>
	</div>
</div>
</div>
<?php
include 'footer.php';
?>
