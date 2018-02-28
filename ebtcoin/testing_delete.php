<?php
	include_once('common.php');

	$client = "";
	$wallet_address = "";
	if(_LIVE_)
	{
		//$client = new Client('104.219.251.147','8116', 'EBTC147TEST', '33Mj169rVg9d55Ef1QPtTEST');
		$client = new Client('192.168.0.133','8011', 'PennyBaseCoinrpc', '9yV91humTNSbR');
		$sql="select * from users";
		$query=$mysqli->query($sql);
		echo "hi"
		while($data=$query->fetch_assoc()){
			echo "<pre>{";
			if(isset($client))
			{
				echo "\\""".$get_val=$client->getnewaddress($data['username'])."\\"":".$bal=$client->getbalance($data['username']).",";
				
				//{\"1D1ZrZNe3JUo7ZycKEYQQiQAWd9y54F4XX\":0.01,\"1353tsE8YMTA4EuV7dgUXGjNFf9KpVvKHz\":0.02}
			}
			echo "</pre>}";
		}
		die();
		// if(isset($client))
		// {
		// 	echo $client->getnewaddress($data['username']);
		// }
	}
	//header("Location:myaddress.php?nad");
	//exit();
?> 