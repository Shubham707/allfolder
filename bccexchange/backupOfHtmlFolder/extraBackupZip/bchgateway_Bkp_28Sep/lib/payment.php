<?php 


if($_REQUEST['payment']=='payment')
{
	payment();
	exit();
}
function payment()
{
	include'../common.php';
	$R=@$_REQUEST;
	$year=date("Y");
	$email_id=$R['email'];
	$redirect=$R['redirect'];
	$order=$R['order_id'];
	
	$sql="INSERT INTO `transcation_list` (`invoiceid`,`order_id`,`trans_account`, `trans_address`, `trans_category`, `trans_amount`, `trans_label`, `trans_vout`, `trans_confirmations`, `trans_txid`, `trans_walletconflicts`, `trans_time`, `trans_timereceived`, `trans_bip_replaceable`, `trans_year`) VALUES ('$R[invoiceid]','$order','$R[trans_account]', '$R[trans_address]', '$R[trans_category]', '$R[trans_amount]', '$R[trans_label]', '$R[trans_vout]', '$R[trans_confirmations]',  '$R[trans_txid]', '$R[trans_walletconflicts]', '$R[trans_time]', '$R[trans_timereceived]', '$R[trans_bip_replaceable]', '$year')";
	$query=mysqli_query($mysqli, $sql) or die(mysqli_error());
	
		if ($query)
        {
            include'../PHPMailer/PHPMailerAutoload.php';
            include'../PHPMailer/class.smtp.php';
            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($email_id) . "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Transaction:</strong> </td><td>" . $R['trans_txid']. "</td></tr>";
            $message .= "<tr><td><strong>Amount:</strong> </td><td>'".$R['trans_amount']."</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to=$email_id;
            $subject="Bcc Merchant Payment Successful!";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
            @mail($to,$subject,$message,$headers);
            ob_start();
		    header("Location:".$redirect."?msg=Payment is successfully!");
	}
	else
	{
		ob_start();
		header("Location:".$redirect.'?msg=Payment is not successfully!');
	}
}
?>