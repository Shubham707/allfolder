
<?php
	include_once('common.php');
	page_protect();
	
$user_session=$_SESSION['user_session'];
if($_SESSION['user_session']){
$sql="select * from merchantuser where username='$_SESSION[user_session]'";
}
else if($_POST['value1'] && $_POST['value2'])
{
	$sql="select * from merchantuser where accesskey='$_POST[value1]' AND password='$_POST[value2]'";
}

$query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');

	$client = "";
	$wallet_address = "";
	$error = array();
    $transactionList = array();
	if(_LIVE_)
	{
		$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
		if(isset($client))
		{
			// $wallet_address  = $client->getnewaddress($user_name);
		$transactionList = $client->getTransactionList($user_session);
	    $currentbalance = $client->getbalance($user_session);

		}
	}
	if ($currentbalance>=1)
	{
		header("location:sendbch.php");
	}
	else
	{
        echo "<script> alert('Not Withdraw Now'); window.location = 'merchantprofile.php';</script>";
        	}
	
?>

<!DOCTYPE html>
<html>
<head>
<title>BCH PAY</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css1/creditly.css" type="text/css" media="all" />
<link rel="stylesheet" href="css1/easy-responsive-tabs.css">
<script src="js1/jquery.min.js"></script>
<link href="//fonts.googleapis.com/css1family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">

<style>

</head>

<body>

</body>
</html>