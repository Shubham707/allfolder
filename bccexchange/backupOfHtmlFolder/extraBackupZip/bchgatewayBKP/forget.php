<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id ="";

//echo "           =>>>>>>> ".hash('sha256',addslashes(strip_tags($email_id)));
//echo "</br>           =>>>>>>> ".hash('sha256',addslashes(strip_tags($password)));
$error = array();
if(isset($_POST['btnlogin']))
{
//	var_dump($_POST);
	$email_id = $_POST['txtEmailID'];
	
	if (empty($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}	
	elseif (!isEmail($email_id))
	{
		$error['emailError'] = "Please Provide valid email id";
	}

	if(empty($error))
	{
		$email_id = $mysqli->real_escape_string(strip_tags($email_id));
		
		$qstring = "select coalesce(id,0) as id, coalesce(username,'') as username
					from users WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
		
		$result	= $mysqli->query($qstring);
		$user = $result->fetch_assoc();
		//var_dump($user);
		
		
		if (($user) && ($user['id'] > 0 ))
		{
			$new_password = "s!w@".rand(0,100000);
			$password_value = hash('sha256',addslashes(strip_tags($new_password)));
			$sub =" Password Recovery Mail";
			$message_body =" Dear User \n";
			$message_body .= " Your recovery password is $new_password \n\n";
			$message_body .= " Please login and change it immediately\n\n";
			$message_body .= " Thanks \n";
			$message_body .= " Administrator";
			
			$qstring = "update users set `password` ='".$password_value."'"; 
			$qstring .= " WHERE encrypt_username = '" . hash('sha256',$email_id) . "' and id = ".$user['id'] ;
		
			$result2	= $mysqli->query($qstring);
	//		$user2 = $result2->fetch_assoc();
			
			$error['emailError2'] = "An Email has been send to your email id. ";

			sendpmail($email_id,$sub,$message_body);
		}
		else
		{
			$error['emailError'] = "the Provided email_id  is not registered with us";
		}
	}
}
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bitcoin Cash</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
   <script type="text/javascript" async="" src="js/atrk.js"></script>
        <script src="js/modernizr-2.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
	<body>
		<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <img width="129" src="frontend/assets/media/general/logo-lg.png" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login Merchant </p>
			<form  method="post" action="forget.php">
				<div class="form-horizontal white signUpContainer center">
					<div class="flex-center flex-justify flex-column login-box-container">
						<div ui-view="contents" class="login-box mhs">
							<div id="login" data-preflight-tag="Login">
								<header>
									<hgroup>
										<div class="flex-between flex-center flex-wrap">
											<h2 class="em-300 mtn">Forget Password</h2>
										</div>
									</hgroup>
								</header>
								<div name="loginForm" role="form" autocomplete="off" novalidate="" 
									class="ptl form-horizontal clearfix ng-pristine ng-invalid ng-invalid-required">
									<fieldset>
										<div ng-class="{'has-error': errors.uid}" class="form-group">
											<label style="float:left">Registered Email ID</label>
											<input id="txtEmailID" name="txtEmailID" class="form-control" style="border:2px solid #e08081;" type="text"
											value="<?php echo $email_id;?>">
											<?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>	
											<?php if(isset($error['emailError2'])) { echo "<br/><span class=\"messageClass2\">".$error['emailError2']."</span>";  }?>	
										</div>
										<div class="mtl flex-center flex-end form-group">
											<input type="submit" class="btn btn-default" id="btnlogin" name="btnlogin" value="Send"/>
											<span class="button Locker ladda-button" id="btnLoading" style="display:none">
												<span style="position:relative;">
													<span class="loader"></span>
												</span>
												<span class="val1">Loading</span>
											</span>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
	 <a href="signup.php" class="text-center">Register a new Merchant</a>
     <a style="float:right" href="forget.php" class="text-center" >Forget Password</a>
     <!-- data-toggle="modal" data-target="#myforget" -->
  </div>
</div>
<div id="myforget" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forget Password</h4>
      </div>
      <div class="modal-body">
       <form  method="post" action="#"> 
      <div  name="loginForm" role="form" autocomplete="off" novalidate="" class=" form-group">
        <div class="form-group">
                    <label style="float:left">Email </label>
                    <input id="txtpassword" name="email_id" class="form-control" type="email" >
      </div>
      <div  class="form-group">
                   
                    <input id="submit" name="btnlogin" class="btn btn-success" type="submit" value="Send" >
      </div>
        <!-- /.col -->
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- /.login-box-body -->
<!-- /.login-box -->
<script src="js/jquery-1.js"></script>
        <script src="js/bootstrap.js"></script>

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>