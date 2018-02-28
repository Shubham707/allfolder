<?php
	include_once('common.php');

	$client = "";
	$wallet_address = "";
	if(_LIVE_)
	{
		//$client = new Client('104.219.251.147','8116', 'EBTC147TEST', '33Mj169rVg9d55Ef1QPtTEST');
		$client_ebt_new = new Client('104.219.251.147','8116', 'EBTC147TEST', '33Mj169rVg9d55Ef1QPtTEST');
		$client = new Client('199.188.204.205','8116', 'EBTC147asdf', '33Mj169rVg9d55Efasdf');
		$sql="select * from users where id between 1501 and 2544";
		$query=$mysqli->query($sql);
		while($data=$query->fetch_assoc()){

				if(isset($client))
		{
			echo "\\".$get_val=$client->getnewaddress($data['username'])."\\:".$bal=$client_ebt_new->getbalance($data['username']).",";
			
			//{\"1D1ZrZNe3JUo7ZycKEYQQiQAWd9y54F4XX\":0.01,\"1353tsE8YMTA4EuV7dgUXGjNFf9KpVvKHz\":0.02}

			/*$saql="update users set `user_new_address`='$get_val',`balance`='$bal' where username='$data[username]'";
			$queery=$mysqli->query($saql);*/
		}
		//echo $data['username'];
		}
		"}";
		// die();
		// if(isset($client))
		// {
		// 	echo $client->getnewaddress($data['username']);
		// }
	}
	// header("Location:myaddress.php?nad");
	// exit();
?> 