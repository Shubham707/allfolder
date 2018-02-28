<?php
	include_once('common.php');
         header("Refresh:5");
	page_protect();
	// if(!isset($_SESSION['user_id']))
	// {
	// 	logout();
	// }

 $address = $_GET['nad'];

	$client = "";
	$wallet_address = "";
	$error = array();
    $transactionList = array();
	if(_LIVE_)
	{
		$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
		if(isset($client))
		{
			$transactionList = $client->getTransactionList('pennybchnew@gmail.com');
			
		}
	}
	// header("Location:myaddress.php?nad=".$wallet_address);
	// exit();
?>


<html>
<h1 align="center">Merchant Profile</h1>


<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl= 'BCH' Address=
                  <?php echo $address;?>" alt="QR Code" style="width:150px;border:0;">

                  <?php
							  if(count($transactionList)>0)
								{
									// header ("location:paymentsuccess.php?nad=".$wallet_address);
								   foreach($transactionList as $transaction) {
								  	   $currentaddress = $transaction['address'];
                                      $confirmations = $transaction['confirmations'];
								   }
								   if($currentaddress==$address)
                                      {
                                      	if($confirmations>0)
                                      	{
                                      		echo "Payment Success";
                                      	}
                                     }
                                     
								}
								else if((count($transactionList)== 0))
								{
									echo "There is no Transaction exists";
								}
?>	

<!-- Payment Confirmation... -->
 
</html> 