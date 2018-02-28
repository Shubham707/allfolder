																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																			<?php
	include_once('common.php');
	
	ini_set("display_errors",1);
		// $client = new Client('104.219.251.147','8116', 'EBTC147TEST', '33Mj169rVg9d55Ef1QPtTEST');
		//$client = new Client('192.168.0.133','8011', 'PennyBaseCoinrpc', '9yV91humTNSbR');
		$sql="select username from users limit 1";
		$query=$mysqli->query($sql);
		while($data=$query->fetch_row()){
			/*echo $to = $data['username'].',';
	
		

			echo $subject="hello admin";
			echo $message="dear Sir";
			echo $headers = "MIME-Version: 1.0" . "\r\n";
			echo $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			echo $headers .= 'From: s.shubham@blockon.tech' . "\r\n";
			//echo $headers .= 'Cc: v.prateek@blockon.tech' . "\r\n";

			$mail=mail('pv16061995@gmail.com',$subject,$message,$headers);
				}
				print_r($mail)*/;
	
	//while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($data as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
?> 