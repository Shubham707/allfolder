<?php include'common.php';
page_protect();
if(!isset($_SESSION['user_id']))
{
	logout();
}
$user_session = @$_SESSION['user_session'];?>
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
	<link rel="icon" href="assets/favicon.png" type="image/png" sizes="32x32">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
