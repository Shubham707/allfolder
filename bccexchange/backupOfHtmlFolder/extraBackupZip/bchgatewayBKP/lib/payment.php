<?php 


if($_REQUEST['payment']=='payment')
{
	payment();
	exit();
}
function payment()
{
	include'../common.php';
	$R=$_REQUEST;
	$year=date("Y");
	
	$sql="INSERT INTO `transcation_list` (`invoiceid`,`order_id`,`trans_account`, `trans_address`, `trans_category`, `trans_amount`, `trans_label`, `trans_vout`, `trans_confirmations`, `trans_txid`, `trans_walletconflicts`, `trans_time`, `trans_timereceived`, `trans_bip_replaceable`, `trans_year`) VALUES ('$R[invoiceid]',$order','$R[trans_account]', '$R[trans_address]', '$R[trans_category]', '$R[trans_amount]', '$R[trans_label]', '$R[trans_vout]', '$R[trans_confirmations]',  '$R[trans_txid]', '$R[trans_walletconflicts]', '$R[trans_time]', '$R[trans_timereceived]', '$R[trans_bip_replaceable]', '$year')";
	$query=mysqli_query($mysqli, $sql) or die(mysqli_error());
	if($query)
	{
		ob_start();
		header("Location:../enterammount.php?msg=Payment is successfully!");
	}
	else
	{
		ob_start();
		header('Location:../enterammount.php?msg=Payment is not successfully!');
	}
}
?>