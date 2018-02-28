
<?php
	include_once('common.php');
    header("Refresh:60");
 
	page_protect();
	// if(!isset($_SESSION['user_id']))
	// {
	// 	logout();
	// }

// $email_id = $_POST['txtEmailID'];
	
$user_session=$_SESSION['user_session'];
if($_SESSION['user_session']){
$sql="select * from merchantuser where username='$_SESSION[user_session]'";
}
else if($_POST['value1'] && $_POST['value2'])
{
	$sql="select * from merchantuser where accesskey='$_POST[value1]' AND password='$_POST[value2]'";
}
$order_id= '#order'.rand(111111,999999);
$query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');

    $data['accesskey'];
     $user_name= @$_REQUEST['username'];
	 $address = @$_REQUEST['nad'];
	 $ammount = @$_REQUEST['value2'];
	 $invoiceid = @$_REQUEST['value3'];
         $url = @$_REQUEST['redirect'];

	 $Networkfee = 0.0008;
	 @$total = $ammount + $Networkfee;
	 $total;
	

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
		$transactionList = $client->getTransactionList($_SESSION['user_session']);
		$listing= $client->getTransactionList($_SESSION['user_session']);
       foreach ($listing as $get_value) {
         
       }

			
		}
	}
	
?>
<?php
$data = file_get_contents ("https://cex.io/api/ticker/BCH/USD");
        $json = json_decode($data, true);
        $currentprice =  $json['ask'];
?>
<!DOCTYPE html>
<html>
<head>
<title>BCH PAYZ</title>
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
<!-- <script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script> -->
<style>

button
{
  height:30%;
  width:100%;
  border-radius:8px;
  padding:10px 20px;
  font-size:20px;
  font-family: 'Oswald', sans-serif;
  height:52px;
  cursor:pointer;
  color: #fff;
  margin: auto;
  background-color:#072c4a;
}
.loader {
  border: 2px solid white;
  border-radius: 50%;
  border-top: 2px solid white;
  border-right: 2px solid gray;
  border-bottom: 2px solid white;
  border-left: 2px solid gray;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}
.wait
{
	color:#072c4a;
	font-weight: bold;
	margin:auto;
	font-style: italic;
	font-size: 30px;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
var count = 900;
 setInterval(function(){ 
 	count--;
 	  if (count == 0) {
 	   window.location.href="timeout.php?invoiceid='<?php echo  $invoiceid;?>' &url=<?php echo $_REQUEST['redirect'];?>";
 	    }
 	     },1000);
</script>
</head>
<body >
	<div class="main">	
		<div class="w3_agile_main_grids">
			<div class="agile_main_top_grid" style="background-color:#072c4a;">
			
				<div class="w3_agileits_main_top_grid_right">
              <p style="color:white;font-size: 15px;font-weight: bold; text-align: center; margin:auto;font-style: italic;"><img src="frontend/assets/media/general/logo.png" width="120" height="45" alt=""></p>
				</div>
				<div class="clear">

               </div>
				<div class="wthree_total">
						<div class="row">
						<div style="color:#fff;font-size:14px; float:right;font-weight: bold;margin:auto;font-style: italic;"  id="divCounter">
						 </div>

 

					  <div class="col-sm-8">

					  	<input class="read-more-state" id="read-more-controller" type="checkbox">
<div class="read-more-wrap">

					 
					 <p style="color:#fff;font-size:14px;float:Left;font-weight: bold;margin:auto;font-style: italic;"> <b>Pay BCH </p>
   					
<label for="read-more-controller" style="color:white;float:right;font-weight: bold;margin:auto;font-style: italic;"><p><?php echo $total;?> BCH &#8681;</p>
</label>
				
   					<br></br>
					  	<p style="float: right;color:#fff;font-weight: bold;margin:auto;font-style: italic;">1 BCH = $<?php echo $currentprice;?>
					  		
					  	</p><br><br>
    <p style="color:#fff;font-weight: bold;margin:auto;font-style: italic;" class="read-more-target">
    	<b>Payment Amount </b>
    	<b style="float:right;"><?php echo $ammount;?></b><br>
    	<b >Network Cost</b>
    	     <b style="float:right;">1 transaction x 0.0008 BCH</b><br>
    	<b>Total </b>
    	<b style="float:right;"><?php echo $total;?></b>

    </p>
   
</div>
	  	
					  	</div>
					</div>
					
				</div>
			</div>
			<div class="agileinfo_main_bottom_grid">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li style=" font-weight: bold;font-style: italic;">Scan</li>
						<li style="font-weight: bold;font-style: italic;">Copy</li>
					</ul>
					<div class="resp-tabs-container">
						<div class="agileits_w3layouts_tab1">
							<form action="#" method="post" class="creditly-card-form agileinfo_form">
								<section class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">

											<div style="margin:auto;" class="controls">
												<div>
												<center>
												
												<?php
							  if(count($transactionList)>0)
								{
									
								   foreach($transactionList as $transaction) {
								  	   $currentaddress = $transaction['address'];
								  	   
                                      $confirmations = $transaction['confirmations'];
								   }
								   if ($currentaddress==$address)
								   {
                                      	if($confirmations>0)
                                      	{
                                      		 echo '<p class="wait"> &#x2705; Payment Success</p>';
                                      	 $value1= $user_name;
										  $value2=@$_REQUEST['value2'];
										  $value3= @$_REQUEST['nad'];
										  $value4=@$get_value['account'];
										  $value5=@$get_value['category'];
										   $value6=@$get_value['txid'];
										   $value7=@$get_value['vout'];
										   $value8=@$get_value['confirmations'];
										   $value9= @$get_value['label'];
										   $value10=@$get_value['walletconflicts']? true:false;
										   $value11=@$get_value['timereceived'];
										   $value12=@$get_value['time'];
										   $value13=@$get_value['bip125-replaceable'];
										   $value14 =@$order_id;
										   $value15=@$invoiceid;
										   $value16= @$_REQUEST['redirect'];
										   $year=date("Y");
   $sql="INSERT INTO `transcation_list` (`invoiceid`,`order_id`,`trans_account`, `trans_address`, `trans_category`, `trans_amount`, `trans_label`, `trans_vout`, `trans_confirmations`, `trans_txid`, `trans_walletconflicts`, `trans_time`, `trans_timereceived`, `trans_bip_replaceable`, `trans_year`) VALUES ('$value15','$value14','$value4', '$value3', '$value5', '$value2', '$value9', '$value7', '$value8',  '$value6', '$value10', '$value12', '$value11', '$value13', '$year')";
   $query=mysqli_query($mysqli, $sql) or die(mysqli_error());
	
										if ($query)
								        {
								            include'PHPMailer/PHPMailerAutoload.php';
								            include'PHPMailer/class.smtp.php';
								            $message = '<html><body>';
								            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
								            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($user_name) . "</td></tr>";
								            $message .= "<tr style='background: #eee;'><td><strong>Transaction:</strong> </td><td>" . $R['trans_txid']. "</td></tr>";
								            $message .= "<tr><td><strong>Amount:</strong> </td><td>'".$R['trans_amount']."</td></tr>";
								            $message .= "</table>";
								            $message .= "</body></html>";
								            $to=$user_name;
								            $subject="Bcc Merchant Payment Successful!";
								            $headers = "MIME-Version: 1.0" . "\r\n";
								            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
								            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
$send=@mail($to,$subject,$message,$headers);
								           
								            	echo "<a href='".$value16."'>Back</a>";
								            /*ob_start();
								            header("Location:$value16?msg=Payment Send Successfully!");*/
								             
								        }
                                      		 
                                      	}
                                      	 else 
                                     {
                             echo '<div class="loader">'.'</div>'.'<p class="wait">Awaiting Payment confirmations</p>';  
                             echo "<script></script>";
                                }
                                      }
                                     
                                     else 
                                     {
                             echo '<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=bitcoincash:'.$address.',amount:'. $ammount.'"alt="QR Code" style="width:300px;border:0;">';
                                }
                                     
								}
							
		else if((count($transactionList)== 0))
								{
                                echo '<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=bitcoincash:'.$address.',amount:'. $ammount.'"alt="QR Code" style="width:300px;border:0;">';
}
?>
												</center>
											</div>
											</div>
										</div>							
										<button class="button" style="background-color:#072c4a; margin-bottom: 15px;"><a href="http//bccwallet.io" style="color: white;">
											<span>Open in  Wallet</span></a></button>

									</div>
								</section>
							</form>
						</div>
						<div class="agileits_w3layouts_tab2">
							<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<center>
To complete your payment, please send <?php echo $total;?> BCH to the address below.
<br><br>
<br><br>
Amount= <?php echo $total;?>
<br><br>
<br><br>
Address <p id="p1"> <?php echo $address;?> </p>
<br><br>
<br><br>
<button onclick="copyToClipboard('#p1')">Copy Address</button>
</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>
	
	<script src="js1/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true,   // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function(event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
				}
			});
		});
	</script> 
	<!-- //tabs -->
</body>
</html>
<style>
input.read-more-state {
    display: none;
}

p.read-more-target {
    font-size: 0;
    max-height: 0;
    opacity: 0;
    transition: .25s ease;
}

input.read-more-state:checked ~ div.read-more-wrap p.read-more-target {
    font-size: inherit;
    max-height: 989em;
    opacity: 1;
}

input.read-more-state ~ label.read-more-trigger:before {
    content: 'more';
    margin-left: 302px;
}

input.read-more-state:checked ~ label.read-more-trigger:before {
    content: 'less';
    margin-left: 302px;

label.read-more-trigger {
    cursor: pointer;
    display: inline-block;
}
</style>
