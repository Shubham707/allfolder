<?php 
include_once('common.php');

if(isset($_POST['btnlogin']))
{
	$otp=$_POST['otp'];
	$otp_value = hash('sha256',addslashes(strip_tags($otp)));
	$sql="select otp from users where otp='$otp_value'";
	$query=$mysqli->query($sql);
	$data=$query->fetch_assoc();
	if($data)
	{
	  
	  header('Location:dashboard.php');
	}
	else
	{
	header('Location:otp.php?msg=OTP IS WRONG!');
	}
}


?>
<!DOCTYPE html>
<html style="overflow-x:hidden;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EBT Classic | Wallet</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/datepicker3.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="icon" href="assets/favicon.png" type="image/png" sizes="32x32">
</head>
<body class="default">
<nav class="navbar navbar-custom navbar-fixed-top nav_color" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				<img src="assets/EBT.png" alt="" style="    width: 60px;">
                <div class="collapse navbar-collapse navbar-right" id="myNavbar" style="background: rgb(0, 54, 90);">
                    <ul class="nav navbar-nav ">
                        <li><a href="162.213.255.138:3000" target="_blank" style="color: white;">Explorer</a></li>
                        <li><a href="login.php" style="color: white;">Login</a></li>
                        <li><a href="index.php" style="color: white;">Sign Up</a></li>
                    </ul>
                </div>
					
			</div>
		</div>
	</nav>

    

    <br><br>
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-4 shadow_four">
			<div class="login-panel">
				<div class="panel-heading">OTP FORGET PASSWORD
				
				</div>
				<div style="text-align:center; color:red;"><?php echo @$_REQUEST['msg'];?></div>
				<div class="panel-body">
				   <div id="register">
					<form  name="frm_obj" method="post" action="otp.php">
						<div class="register-table">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="OTP" name="otp" type="text" id="txtEmailID" required>
													
								<span id="email_status" style="color:red;"></span>
							</div>
							
							<input type="submit" type="submit" name="btnlogin" class="btn btn-primary" value="OTP">
							<a style="text-align: right;" href="login.php" class="btn btn-primary">Login</a>
						</fieldset>
					</div>
					</form>
				</div>
			  </div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
//$(document).ready();  
function checkemail()
{
 var email=document.getElementById( "txtEmailID" ).value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'lib/check_availability.php',
  data: { username:email },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="OK") 
   {
    return true; 
   }
   else
   {
    return false; 
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

</script>
</body>
</html>
