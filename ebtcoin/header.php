<?php 
include'common.php';
  include('hosting.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
$user_session = @$_SESSION['user_session'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EBT Classic | Wallet</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
      <link rel="icon" href="assets/EBT_131628969014005597.ico" type="image/x-icon" />
<link rel="icon" href="assets/EBT_131628969014005597.ico" type="image/png" sizes="32x32">
	<script src="assets/js/jquery-1.11.1.min.js"></script>

	<!--Custom Font-->
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top nav_color" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<img src="assets/EBT.png" alt="" style="    width: 60px;">
				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown">
					<a class="dropdown-toggle count-info hidden-xs"  href="logout.php">
						<em class="fa fa-power-off"></em><span class="label label-info"></span>
					</a>
						
					</li>

				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-xs-12 col-sm-3 col-md-2 sidebar" style="z-index: 1;">
