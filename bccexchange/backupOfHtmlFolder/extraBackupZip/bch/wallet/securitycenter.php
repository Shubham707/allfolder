<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}

$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";
$currentpassword = "";
$currentspendingpassword = "";

$user_session = $_SESSION['user_session'];
$user_current_balance = 0;

$error = array();
$error2 = array();
$client = "";
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	if(isset($client))
	{
		$user_current_balance = $client->getBalance($user_session) - $fee;
	}
}


if(isset($_POST['btnverify']))
{
	
	$new_password = rand(0,99999999);
	$otp_value = hash('sha256',addslashes(strip_tags($new_password)));
	
	$sub =" Email Verification Mail";
	$message_body =" Dear User \n";
	$message_body .= " Your email verification OTP is $new_password \n\n";
	$message_body .= " \n\n";
	$message_body .= " Thanks \n";
	$message_body .= " Administrator";
	
	$qstring = "update users set `otp_value` ='".$otp_value."'"; 
	$qstring .= " WHERE ";
//	$qstring .= " encrypt_username = '" . hash('sha256',$user_session) . "' and ";
	$qstring .= " id = ".$_SESSION['user_id'];
	//echo $new_password; 
	$result2	= $mysqli->query($qstring);
//	$user2 = $result2->fetch_assoc();
	
	sendpmail($user_session,$sub,$message_body);
	
	header("Location:verifyemail.php");
	exit();
}


if(isset($_POST['btnlogin']))
{
	//var_dump($_POST);
	
	
	$currentpassword = $_POST['currentpassword'];
	$password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];
	$spendingpassword = $_POST['spendingpassword'];
	$confirmspendingpassword = $_POST['confirmspendingpassword'];
	$currentspendingpassword = $_POST['currentspendingpassword'];

	if (empty($currentpassword))
	{
		$error['currentpasswordError'] = "Please Provide your current login password";
	}	
	if(empty($password))
	{
		$error['passwordError'] = "Please Provide valid Password";
	}
	if(empty($confirmpassword))
	{
		$error['confirmpasswordError'] = "Please Provide valid Confirm Password";
	}
	else if($confirmpassword != $password)
	{
		$error['confirmpasswordError'] = "Password and Confirm Password Must be same";
	}
		
	$password_value = hash('sha256',addslashes(strip_tags($currentpassword)));
	$qstring = "select coalesce(id,0) as id
				from users WHERE encrypt_username = '".hash('sha256',$user_session)."' and `password` = '" . $password_value . "'";
	
//	echo $qstring;
//	die;
	$result	= $mysqli->query($qstring);
	$user = $result->fetch_assoc();
//	var_dump($user);
	if ($user['id'] <= 0)
	{
		$error['currentpasswordError'] = "Your current Login password is not match with our store password. Please provide valid one.";
	}
	
	if(empty($error))
	{	
		$password_value = hash('sha256',addslashes(strip_tags($password)));

		$qstring = "update `users`set "; 
		$qstring .= "`password` = ";
		$qstring .= "'".$password_value."'";
		$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user['id'];
		//echo $qstring;
		$result	= $mysqli->query($qstring);
		if($result)
		{
			$error['currentpasswordError2'] = "Your  Login password has been successfully updated.";
			$password = "";
			$confirmpassword = "";
			$currentpassword = "";
		}
	}
}

if(isset($_POST['btnSpending']))
{
	$currentpassword = $_POST['currentpassword'];
	$password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];
	$spendingpassword = $_POST['spendingpassword'];
	$confirmspendingpassword = $_POST['confirmspendingpassword'];
	$currentspendingpassword = $_POST['currentspendingpassword'];

	
	if(empty($currentspendingpassword))
	{
		$error2['currentspendingpasswordError'] = "Please Provide your current Spending Password";
	}
	if(empty($spendingpassword))
	{
		$error2['spendingpasswordError'] = "Please Provide valid Spending Password";
	}
	if(empty($confirmspendingpassword))
	{
		$error2['confirmspendingpasswordError'] = "Please Provide valid Confirm Spending Password";
	}
	else if($confirmspendingpassword != $spendingpassword)
	{
		$error2['confirmpasswordError'] = "Spending Password and Confirm Password Spending Must be same";
	}
	
	$spendingpassword_value = hash('sha256',addslashes(strip_tags($currentspendingpassword)));
	$qstring = "select coalesce(id,0) as id
				from users where encrypt_username = '".hash('sha256',$user_session)."' and `transcation_password` = '" . $spendingpassword_value . "'";
	
	$result2 = $mysqli->query($qstring);
	$user2 = $result2->fetch_assoc();
	//var_dump($user);
	if ($user2['id'] <= 0)
	{
		$error2['currentspendingpasswordError'] = "Your current spending password is not match with our store password. Please provide valid one.";
	}
	
	if(empty($error2))
	{	
		$spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));

		$qstring = "update `users`set "; 
		$qstring .= "`transcation_password` = ";
		$qstring .= "'".$spendingpassword_value."' ";
		$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user2['id'];
		$result3 = $mysqli->query($qstring);
		if($result3)
		{
			$error2['currentspendingpasswordError2'] = "Your  Spending Password has been successfully updated.";
			$spendingpassword = "";
			$confirmspendingpassword = "";
			$currentspendingpassword = "";
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Wallets | <?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>		
		<meta name="description" content="<?php echo $coin_fullname;?>(<?php echo $coin_short;?>)">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./img/favicon.png" rel="shortcut icon" type="image/x-icon">
		<link href="css/material-design-iconic-font.css" rel="stylesheet" type="text/css">
		<link href="css/icon.css" rel="stylesheet" type="text/css">
		<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
		<!--Import materialize.css-->
		<link href="css/main.css" rel="stylesheet" type="text/css">
		<link href="css/mystyle.css" rel="stylesheet" type="text/css">
		<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->			
		<link href="css/sitemaster.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" async="" src="files/atrk.js"></script>
		<script src="js/cbgapi.loaded_0" async=""></script>
		<script src="js/llqrcode.js"></script>
		<script src="js/plusone.js" gapi_processed="true"></script>
		<script src="js/socket.js"></script>
		<script src="js/webqr.js"></script> 
		<script type="text/javascript" async="" src="js/atrk.js"></script>
		<script src="js/modernizr-2.js"></script>
		
			<style>
			
			.sidenav-mobile {
				height: 100% !important;
				width: 0;
				position: fixed !important;
				top: 56 !important;
				left: 0 !important;
				background-color: #111 !important;
				overflow-x: hidden !important;
				transition: 0.2s !important;
				padding-top: 60px !important;
				z-index: 998 !important;
			}

			.sidenav-mobile a {
				padding: 8px 8px 8px 32px !important;
				text-decoration: none !important;
				font-size: 25px !important;
				color: #818181 !important;
				display: block !important;
				transition: 0.3s !important;
			}

			.sidenav-mobile a:hover, .offcanvas a:focus{
				color: #f1f1f1 !important;
			}

			.sidenav-mobile .closebtn {
				position: absolute !important;
				top: 0 !important;
				right: 25px !important;
				font-size: 36px !important;
				margin-left: 50px !important;
			}

			@media screen and (max-height: 450px) {
			  .sidenav-mobile {padding-top: 15px !important;display:block !important;}
			  .sidenav-mobile a {font-size: 18px !important;}
			}
			@media screen and (max-width: 480px){
				.sidebar-left { display: none !important;}
			}
			@media screen and (min-width: 768px){
			   .sidenav-mobile { display: none !important;}
			   .sidebar-left  {display:block !important;}
			}
			#openbtn{
			   display: block;
				float: left;
			   }
			#closebtn{
				display:none;
				float: left;
			}
			@media only screen and (max-width: 600px)
		
			.nav-wrapper a.brand-logo img {
				top: 11px!important;
			}
		</style>
	</head>
	<body>
		<div class="wrapper vertical-sidebar" id="full-page">
			<header id="header">
				<div class="navbar">
					<nav style="position:fixed!important;z-index:999;">
						<a onclick="openNav()" class="button-collapse top-nav full waves-effect waves-light"><span id="openbtn" style="font-size:30px;cursor:pointer" >&#9776;</span></a>

								<a onclick="closeNav()" class="button-collapse top-nav full waves-effect waves-light"><span id="closebtn" style="font-size:30px;cursor:pointer">&times;</span></a>
						<div class="nav-wrapper">
							
						
							<ul class="left">
								
								
									<a href="./myaddress.php" class="brand-logo">
										<img src="image/logofinal2.png">
									</a>
								
							</ul>
							<ul class="right hide-on-med-and-down">
								<li class="b1"> <a href="#"><span style="font-size:15px"></span>
								<span id="lblliveusd" style="padding-left:2px;font-size:15px;"></span></a></li>
								<li id="topmenu">
								</li><li>
									<a id="logout" href="../logout.php">
										<img src="image/sign-out.png" style="width: 30px; vertical-align: middle;">
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<div id="mySidenav" class="sidenav-mobile">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="../index.html">Home</a>
			  <a href="transactions.php">Transactions</a>
			  <a href="myaddress.php">Addresses</a>
			  <a href="securitycenter.php">Security center</a>
			  <a href="contactus.php">Contact Us</a>
				<?php 
					if($_SESSION['user_admin'] == 1)
					{
					?>
						<a href="admin_user.php"><!--<i class="zmdi zmdi-help-outline iconFAQ" style=""></i>-->User list</a>
					<?php

					}
					?>	
	
			</div>
			<script>
				function openNav() {
					document.getElementById("mySidenav").style.width = "250px";
					document.getElementById("openbtn").style.display = "none";
					document.getElementById("closebtn").style.display = "block";
				}

				function closeNav() {
					document.getElementById("mySidenav").style.width = "0";
					document.getElementById("openbtn").style.display = "block";
					document.getElementById("closebtn").style.display = "none";
				}

			</script>
			<aside class="sidebar-left">
				<ul class="side-nav fixed clearfix left" id="nav-mobile" style="transform: translateX(0px);">
					<li>
						<ul class="vm1 collapsible" data-collapsible="accordion" style="margin-top: 30px;">
							<li id="ms1"><a href="../index.html" class="collapsible-header">Home</a></li>
							<li id="ms2"><a href="transactions.php" class="collapsible-header">Transactions</a></li>
							<li id="ms3" class="active"><a  href="myaddress.php" class="collapsible-header">My Addresses</a></li>
							<li id="ms4"><a href="securitycenter.php" style="color: #9ee89e;" class="collapsible-header">Security Center</a>
							</li>
							<li id="ms5">
								<a href="contactus.php" class="collapsible-header">Contact Us</a>
							</li>
<?php 
if($_SESSION['user_admin'] == 1)
{
?>
	<li id="ms6"><a href="admin_user.php" class="collapsible-header"><!--<i class="zmdi zmdi-help-outline iconFAQ" style=""></i>-->User list</a></li>
<?php

}
?>	
							
						</ul>
					</li>
				</ul>
			</aside>
			<main id="content" style="position:fixed;width:100%;z-index:990;">
				<div id="page-content">
					<div class="row section-header">
						<div class="col l12" id="topvalues">
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblbtcbalancesmall" class="topbtc"><?php echo $user_current_balance." " . $coin_short;?></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblusdbalancesmall" class="topusd"></h6></div>
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblusdbalance2small" class="topbtc" style="display: none;"></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblbtcbalance2small" class="topusd" style="display: none;"><?php echo $user_current_balance." " . $coin_short;?></h6></div>
						</div>
						<div class="col m6 l6" id="sidetopbuttons">
							<a href="send.php" id="btnsend" class="btn btn-default"><!--<i class="zmdi zmdi-long-arrow-up zmdi-hc-fw"></i>-->Send</a>
							<a href="recievecoin.php" id="btnreceived" class="btn btn-default"><!--<i class="zmdi zmdi-long-arrow-down zmdi-hc-fw"></i>-->Receive</a>

						</div>
						<div class="col m6 l6" id="sidetopvalues">
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblbtcbalance" class="topbtc"><?php echo $user_current_balance." " . $coin_short;?></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblusdbalance" class="topusd"></h6></div>
							<div style="overflow:hidden;cursor:pointer;"><h5 id="lblusdbalance2" class="topbtc" style="display: none;"></h5></div>
							<div style="overflow:hidden;cursor:pointer;"><h6 id="lblbtcbalance2" class="topusd" style="display: none;"><?php echo $user_current_balance." " . $coin_short;?></h6></div>
						</div>
					</div>
				</div>
			</main>
			<div>
				<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
				<style>
				/*.icontransaction{
			color:#ffab00;
			}*/
				#ui-datepicker-div{
						font: 122%/1.5 Verdana, sans-serif;
				}
				.ui-datepicker-month{
					display:inline-block;
						height: 2.5em;
				}
				.ui-datepicker-year{
					display:inline-block;
						height: 2.5em;
				}
				.pendingwm {
					display:none;
					float:right;
					line-height:55px;
					font-size:14px;
					color:rgba(181, 181, 181, 0.34);
					font-weight:bold;
					font-style:italic;
				}

				.icontransaction {
					color: #0f9692;
				}

				.highlight {
					background-color: yellow;
				}

				/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
				pre {
					margin: 0;
				}

				.mobinfocontainer {
					display: none;
				}
				.downloadoption{
						color: #0f9692;
			line-height: 65px;
			margin-top: 7px;
			font-size: 25px;
				}
				.tx1 {
					display: none;
				}

				.pval1 {
					margin: 0px !important;
					text-align: right;
					font-size: 13px !important;
					line-height: 17px !important;
				}

				.pval2 {
					padding: 0px !important;
					text-align: right !important;
					font-size: 13px !important;
					line-height: 17px !important;
				}

				.li2 {
					color: gray;
					background-color: #ececec;
				}

				.accordion {
					max-width: 100%;
					margin: 0 auto 100px;
					border-top: 1px solid #d9e5e8;
				}

					.accordion li {
						border-bottom: 1px solid #d9e5e8;
						position: relative;
						padding: 10px 0;
					}

						.accordion li p {
							display: none;
							padding: 5px 0px 0px;
							color: #6b97a4;
						}
		.ui-datepicker td span, .ui-datepicker td a {
			display: block;
			padding: .2em;
			text-align: center!important;
			text-decoration: none;
		}
					.accordion a {
						width: 100%;
						display: block;
						cursor: pointer;
						font-weight: 600;
						line-height: 3;
						font-size: 14px;
						font-size: 0.875rem;
						text-indent: 15px;
						user-select: none;
					}

						.accordion a:after {
							width: 12px;
							height: 12px;
							border-right: 1px solid #4a6e78;
							border-bottom: 1px solid #4a6e78;
							position: absolute;
							left: 10px;
							content: " ";
							top: 30px;
							transform: rotate(-45deg);
							-webkit-transition: all 0.2s ease-in-out;
							-moz-transition: all 0.2s ease-in-out;
							transition: all 0.2s ease-in-out;
						}

					.accordion p {
						font-size: 13px;
						font-size: 0.8125rem;
						line-height: 2;
						padding: 10px;
					}

				a.active:after {
					transform: rotate(45deg);
					-webkit-transition: all 0.2s ease-in-out;
					-moz-transition: all 0.2s ease-in-out;
					transition: all 0.2s ease-in-out;
				}

				.txaddress {
					font-size: 20px;
					margin-top: 18px;
				}

				.bt1 {
					margin-top: 10px;
					width: 100%;
				}

				.panelupdate {
					width: 35%;
				}

				.accordion li:hover {
					background-color: rgb(228, 243, 243);
				}

				.topmg {
					margin-top: 15em;
				}

				#ace {
					padding-top: 20px !important;
				}

				.tabmenu {
					background-color: rgba(15, 150, 146, 0.11);
				}

				.srh1 {
					background-color: white !important;
					box-shadow: none !important;
					border: 1px solid #d9e5e8 !important;
					border-bottom: 1px solid #d9e5e8 !important;
					padding-right: 32px !important;
					font-size: 14px !important;
				}
				/*.srh1:focus:not([readonly]){
				box-shadow:none!important;
				border: 1px solid #d9e5e8!important;
				border-bottom: 1px solid #d9e5e8!important;
			}*/
				#Selectmenu {
					font-size: 13px !important;
					border: 1px solid #d6d6d6 !important;
					margin-bottom: 0px !important;
					padding: 0px 10px;
				}

				#Selectul {
					background: white;
					-webkit-box-shadow: 0px 1px 2px 0px rgba(158,158,158,1);
					-moz-box-shadow: 0px 1px 2px 0px rgba(158,158,158,1);
					box-shadow: 0px 1px 1px 0px rgba(158,158,158,1);
				}

					#Selectul li a span {
						display: block;
						cursor: pointer;
						padding: 10px 10px;
						font-size: 13px;
						border-bottom: 1px solid #e3e3e3;
					}

				#mobbtn1 {
					display: none;
				}

				#statuscontainer {
					display: inline-block;
					vertical-align: middle;
					min-height: 55px;
				}

				.mn12 {
					width: 100px;
					border-radius: 20px;
					font-size: 11px;
					margin-top: 10px;
					margin-bottom: 10px;
					float: right;
					background: #0f9692 !important;
				}

				@media only screen and (min-width:767px) and (max-width: 1024px) {
					.txaddress {
						font-size: 18px;
						margin-top: 18px;
					}

					.mobinfocontainer {
						display: block;
					}

					.bt1 {
						margin-top: 10px;
						width: 100%;
					}

					.cl2 {
						width: 56%;
					}

					.cl3 {
						width: 10%;
					}

					.cl4 {
						width: 20%;
					}

					.cl1 {
						margin-left: 30px;
					}

					.panelupdate {
						width: 50%;
					}

					.tx2 {
						display: none;
					}

					.tx1 {
						display: block;
						display: inline-block;
						float: left;
						padding-left: 20px;
						padding-top: 3px;
					}

					.bt1 {
						margin-top: 10px;
						width: 40%;
						float: left;
					}

					.bt2 {
						margin-top: 15px;
						width: 20%;
						font-size: 13px !important;
						float: right;
					}

					#mobbtn1 {
						display: block;
					}

					#status {
						padding-top: 16%;
						padding-left: 20px;
					}

					.cl1 {
						margin-left: 30px;
					}

					.panelupdate {
						width: 90%;
					}

					#statuscontainer {
						display: inline-block;
						vertical-align: middle;
						min-height: 55px;
						float: left;
					}

					.mobinfo {
						display: block;
						float: left;
					}

						.mobinfo i {
							margin-top: 0px !important;
						}

					.pcinfo {
						display: none !important;
					}

					.m23 {
						display: none;
						min-height: 0px !important;
					}

					.m24 {
						display: none;
					}

					.m25 {
						padding: 0px !important;
					}

					.m27 {
						min-height: 0px !important;
					}

					.m28 {
						min-height: 0px !important;
					}
				}

				@media only screen and (min-width:701px) and (max-width: 768px) {
					.cl4 {
						width: 20%;
					}

					.mobinfocontainer {
						display: block;
					}

					.cl2 {
						width: 55%;
					}

					.txaddress {
						font-size: 18px;
						margin-top: 18px;
					}

					.bt1 {
						margin-top: 10px;
						width: 100%;
					}

					.cl1 {
						margin-left: 30px;
					}

					.panelupdate {
						width: 50%;
					}

					.bt1 {
						margin-top: 10px;
						width: 40%;
						float: left;
					}

					.bt2 {
						margin-top: 15px;
						width: 30%;
						font-size: 13px !important;
						float: right;
					}

					#mobbtn1 {
						display: block;
					}

					#status {
						padding-top: 16%;
						padding-left: 20px;
					}

					.cl1 {
						margin-left: 30px;
					}

					.panelupdate {
						width: 90%;
					}

					#statuscontainer {
						display: inline-block;
						vertical-align: middle;
						min-height: 55px;
						float: left;
					}

					.mobinfo {
						display: block;
						float: left;
					}

						.mobinfo i {
							margin-top: 0px !important;
						}

					.pcinfo {
						display: none !important;
					}

					.m23 {
						display: none;
						min-height: 0px !important;
					}

					.m24 {
						display: none;
					}

					.m25 {
						padding: 0px !important;
					}

					.m27 {
						min-height: 0px !important;
					}
				}

				@media only screen and (min-width:481px) and (max-width: 700px) {
					.cl4 {
						width: 100%;
					}

					.mobinfocontainer {
						display: block;
					}

					.cl2 {
						width: 60%;
					}

					.txaddress {
						font-size: 17px;
						margin-top: 18px;
					}

					.bt1 {
						margin-top: 10px;
						width: 40%;
						float: left;
					}

					.cl1 {
						margin-left: 30px;
					}

					.cl2 {
						width: 60%;
					}

					.panelupdate {
						width: 90%;
					}

					.bt1 {
						margin-top: 10px;
						width: 40%;
						float: left;
					}

					.bt2 {
						margin-top: 15px;
						width: 30%;
						font-size: 13px !important;
						float: right;
					}

					#mobbtn1 {
						display: block;
					}

					#status {
						padding-top: 16%;
						padding-left: 20px;
					}

					.cl1 {
						margin-left: 30px;
					}

					.panelupdate {
						width: 90%;
					}

					#statuscontainer {
						display: inline-block;
						vertical-align: middle;
						min-height: 55px;
						float: left;
					}

					.mobinfo {
						display: block;
						float: left;
					}

						.mobinfo i {
							margin-top: 0px !important;
						}

					.pcinfo {
						display: none !important;
					}

					.m23 {
						display: none;
						min-height: 0px !important;
					}

					.m24 {
						display: none;
					}

					.m25 {
						padding: 0px !important;
					}

					.m27 {
						min-height: 0px !important;
					}
				}

				@media only screen and (min-width:320px) and (max-width: 480px) {
					.cl4 {
						width: 100%;
					}

					.mobinfocontainer {
						display: block;
					}

					.cl2 {
						width: 60%;
					}

					.txaddress {
						font-size: 14px;
						word-break: break-word;
						margin-top: 18px;
					}

					.bt1 {
						margin-top: 10px;
						width: 40%;
						float: left;
					}

					.bt2 {
						margin-top: 15px;
						width: 50%;
						font-size: 13px !important;
						float: right;
					}

					#mobbtn1 {
						display: block;
					}

					#status {
						padding-top: 16%;
						padding-left: 20px;
					}

					.cl1 {
						margin-left: 30px;
					}

					.panelupdate {
						width: 90%;
					}

					#statuscontainer {
						display: inline-block;
						vertical-align: middle;
						min-height: 55px;
						float: left;
					}

					.mobinfo {
						display: block;
						float: left;
					}

						.mobinfo i {
							margin-top: 0px !important;
						}

					.pcinfo {
						display: none !important;
					}

					.m23 {
						display: none;
						min-height: 0px !important;
					}

					.m24 {
						display: none;
					}

					.m25 {
						padding: 0px !important;
					}

					.m27 {
						min-height: 0px !important;
					}
				}
				 .messageClass
				 { 
				 float:left;
				 margin:3px;
				 padding:5px;
				 color: #a94442;
				 border-color: #a94442;
				 background-color: #f2dede; 
				 width:95%;
				 text-align:left;
				  
				 }
					.text-center{
						text-align: center;
					}
				 label
				 {
					 font-size:1.3em;
					 font-weight:bold;
					 padding:2px;
				 }
				 .col-md-3
				 {
				     position: relative;
					 min-height: 1px;
					 padding-left: 15px;
					 padding-right: 15px;
					 float: left;
					 width:30%;
				 }
					.col-md-6{
						position: relative;
					 min-height: 1px;
					 padding-left: 15px;
					 padding-right: 15px;
					 float: left;
					 width:50%;
					}
					.col-md-9{
						position: relative;
					 min-height: 1px;
					 padding-left: 15px;
					 padding-right: 15px;
					 float: left;
					 width:60%;
					}
					
					.messageClass2
					{ 
						float:left;
						margin:3px;
						padding:5px;
						color: #fff;
						border-color: #0f9692;
						background-color: #0f9692; 
						width:95%;
						text-align:left;

					} 
					@media only screen and (max-width:480px){
						.font-10{
							font-size: 10px;
						}
						.col-sm-12{
							width: 100% !important;
						}
						.col-sm-6{
							position: relative;
						 min-height: 1px;
						 padding-left: 15px;
						 padding-right: 15px;
						 float: left;
						 width:50%;
						}
						.col-sm-9{
							position: relative;
						 min-height: 1px;
						 padding-left: 15px;
						 padding-right: 15px;
						 float: left;
						 width:60%;
						}
						.col-sm-3{
							position: relative;
						 min-height: 1px;
						 padding-left: 15px;
						 padding-right: 15px;
						 float: left;
						 width:30%;
						}
					}
 
	</style>

				<form action="securitycenter.php" method="post">
					<main id="content" class="topmg transactiontop main2-content">
						<div id="page-content">
							<div class="modal-content">
								<div id="send1ststep">
									<div class="modal-head">
										<div class="col l8 text-center">
											<h5><!--<i class="zmdi zmdi-long-arrow-up zmdi-hc-fw"></i>-->Security Center</h5>
											<p class="text-center">Please update your password regularly</p>
										</div>
										<div class="col l4 right-align">
											<!--<i class="zmdi zmdi-close-circle-o modal-close"></i>-->
										</div>
									</div>
									<div class="form-horizontal white signUpContainer center" style="width:100%;">
										<fieldset>
											<div class="row" style="border-bottom:1px solid black;">
												<div class="form-group col-md-3 col-sm-3" id="half1" style="margin-bottom:5px">
													<label style="float:left;margin-left:5px; padding:0px">Verfiy You Email ID</label>
												</div>
												<div class="form-group col-md-9 col-sm-9" id="half1" style="margin-bottom:5px">
													<div class="form-group col-md-6 col-sm-12" id="half1" style="margin-bottom:5px">
														<label style="float:left;margin-left:15px; padding:0px"><?php if($_SESSION['is_email_verify'] == 1){ echo "<span class=\"messageClass2\">verified" ;} else { echo "<span class=\"messageClass\">Not Verified" ; } ?></label>
													</div>
													<div class="form-group col-md-6 col-sm-12" style="margin-left:5px; width:40%; margin-right:4%; font-weight:bold;font-size:1.3em; 
													float:right;margin-bottom:5px;">
														<input type="submit" class="btn Lockerblue font-10" id="btnverify" name="btnverify" value="Verify Email"/>
													</div>
													
												</div>
											</div>
											
											<div class="row">
												<div class="form-group col-md-6 col-sm-12" id="half1" style="margin-bottom:5px">
													<label style="float:left">Current Password</label>
													<input id="currentpassword" name="currentpassword" autocomplete="off" class="form-control" type="password" value="<?php echo $currentpassword;?>">
												</div>
												<div class="form-group col-md-6 col-sm-12" id="half1" style="margin-bottom:5px">
													<label style="float:left">New Password</label>
													<input id="signuppassword" name="signuppassword" autocomplete="off" class="form-control" type="password" value="<?php echo $password;?>">
													
												</div>
												<div class="form-group col-md-6 col-sm-12" id="half2" style="margin-bottom:5px">
													<label style="float:left">Confirm Password</label>
													<input id="confirmpassword" name="confirmpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmpassword;?>">
													
												</div>
											</div>
											<div class="row" style="padding:0px;margin-top:-20px ">
												<div class="form-group col-md-6" id="half1" style="width:98%;margin-top:-25px">
													<?php if(isset($error['currentpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['currentpasswordError']."</span>";  }?>	
													<?php if(isset($error['currentpasswordError2'])) { echo "<br/><span class=\"messageClass2\">".$error['currentpasswordError2']."</span>";  }?>	
													<?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>	
													<?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?>	
												</div>
											</div>											
											<div class="row">
												<div class="form-group col-md-6 col-sm-12" id="half3">
													<label style="float:left">Current Spending Password</label>
													<input id="currentspendingpassword" name="currentspendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $currentspendingpassword;?>">
													
												</div>
												<div class="form-group col-md-6 col-sm-12" id="half3">
													<label style="float:left">New Spending Password</label>
													<input id="spendingpassword" name="spendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
													
												</div>

												<div class="form-group col-md-6 col-sm-12" id="half4">
													<label style="float:left">Confirm Spending Password</label>
													<input id="confirmspendingpassword" name="confirmspendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmspendingpassword;?>">
													
												</div>
											</div>
											<div class="row" style="padding:0px;margin-top:-20px ">
												<div class="form-group col-md-6" id="half1" style="width:98%;margin-top:-25px">
													<?php if(isset($error2['currentspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error2['currentspendingpasswordError']."</span>";  }?>	
													<?php if(isset($error2['currentspendingpasswordError2'])) { echo "<br/><span class=\"messageClass2\">".$error2['currentspendingpasswordError2']."</span>";  }?>	
													<?php if(isset($error2['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error2['spendingpasswordError']."</span>";  }?>	
													<?php if(isset($error2['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error2['confirmspendingpasswordError']."</span>";  }?>	
												</div>
											</div>
											
											<div class="row">
												<div class="form-group col-md-6 col-sm-12" style="margin-left:5px;margin-bottom:10px; width:40%;font-weight:bold;font-size:1.3em">
													<input type="submit" class="btn Lockerblue font-10" id="btnlogin" name="btnlogin" value="Update Login Password"/>
												</div>
												<div class="form-group col-md-6 col-sm-12" style="width:50%;font-weight:bold;font-size:1.3em">
													<input type="submit" class="btn Lockerblue font-10" id="btnSpending" name="btnSpending" value="Update Spending Password"/>
												</div>
											<div> 
										</fieldset>
									</div>
								</div>
							</div>
						</div>
					</main>
				</form>
			</div>
		</div>
		<link href="css/alertify.css" rel="stylesheet">
		<script src="js/clipboard.js" gapi_processed="true"></script>
		<script src="js/jquery-2.js" type="text/javascript"></script>
		<script src="js/materialize.js" type="text/javascript"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/mara_002.js" type="text/javascript"></script>
		<script src="js/mara.js" type="text/javascript"></script>
		<script src="js/amcharts.js" type="text/javascript"></script>
		<script src="js/serial.js" type="text/javascript"></script>
		<script src="js/light.js" type="text/javascript"></script>
		<script src="js/jquery_002.js" type="text/javascript"></script>
		<script src="js/highcharts.js" type="text/javascript"></script>
		<link href="css/keyboard.css" rel="stylesheet">
		<link href="css/jkeyboard.css" rel="stylesheet">
		<script src="js/jkeyboard.js"></script>
		<script src="js/jquery-qrcode-0.js"></script>
	</body>
</html>
