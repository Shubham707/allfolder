<?php 
include 'common.php';
$allowed = array(".", "-", "_");
$email_id = "";
$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";

$error = array();
if(isset($_POST['btnsignup']))
{
//  var_dump($_POST);
    $email_id = $_POST['txtEmailID'];
    $password = $_POST['signuppassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $spendingpassword = $_POST['spendingpassword'];
    $confirmspendingpassword = $_POST['confirmspendingpassword'];

    if (empty($email_id))
    {
        $error['emailError'] = "Please Provide valid email id";
    }  
    if(empty($password))
    {
        $error['passwordError'] = "Please Provide valid Password";
    }
    if(empty($confirmpassword))
    {
        $error['confirmpasswordError'] = "Please Provide valid Password";
    }
    else if($confirmpassword != $password)
    {
        $error['confirmpasswordError'] = "Password and Confirm Password Must be same";
    }
    if(empty($spendingpassword))
    {
        $error['spendingpasswordError'] = "Please Provide valid Spending Password";
    }
    if(empty($confirmspendingpassword))
    {
        $error['confirmspendingpasswordError'] = "Please Provide valid Spending Password";
    }
    else if($confirmspendingpassword != $spendingpassword)
    {
        $error['confirmpasswordError'] = "Spending Password and Confirm Password Must be same";
    }
   
    if (!isEmail($email_id))
    {
        $error['emailError'] = "Please Provide valid email id";
    }

       
       
   
  

    $email_id = $mysqli->real_escape_string(strip_tags($email_id));
    $password_value = hash('sha256',addslashes(strip_tags($password)));
    $qstring = "select coalesce(id,0) as id
                from users WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
    $result = $mysqli->query($qstring);
    $user = $result->fetch_assoc();
    //var_dump($user);

    if ($user['id']> 0)
    {
        $error['emailError'] = "User with email id ". $email_id ." already exist.";
    }

    if(empty($error))
    {
    //$block_io->get_new_address(array('label' => $email_id));
        $email_id = $mysqli->real_escape_string(strip_tags($email_id));
        $password_value = hash('sha256',addslashes(strip_tags($password)));
        $spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));

       
        $qstring = "insert into `users`( `date`, `ip`, `username`,
        `encrypt_username`, `password`, `transcation_password`,
        `email`) values (";
        $qstring .= "now(), ";
        $qstring .= "'".$_SERVER['REMOTE_ADDR']."', ";
        $qstring .= "'".$email_id."', ";
        $qstring .= "'".hash('sha256',$email_id)."', ";
        $qstring .= "'".$password_value."', ";
        $qstring .= "'".$spendingpassword_value."', ";
        $qstring .= "'".$email_id."') ";
    //  echo $qstring;
        $result2    = $mysqli->query($qstring);
       
        if ($result2)
        {
            //  $user2 = $result2->fetch_assoc();
            //var_dump($user);
            //  header("Location:login.php");
            $email_id = "";
            $password = "";
            $confirmpassword = "";
            $spendingpassword = "";
            $confirmspendingpassword = "";
            header("Location:login.php?signup=Your Account has successfully register. Please Login to continue");
        }
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<img src="assets/EBT.png" alt="" style="    width: 60px;">
					<!--<a href="login.php"><img src="assets/EBT.png" alt="" style="margin-top: 20px;"></a>
				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown"><a class="dropdown-toggle count-info" href="logout.php">
						<em class="fa fa-power-off"></em><span class="label label-info"></span>
					</a>
						
					</li>

				</ul>-->
			</div>
		</div><!-- /.container-fluid -->
	</nav><br><br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-4 shadow_four">
			<div class="login">
				<div class="panel-heading">Create your Wallet</div>
				<div style="color:red; text-align:center;"><?php echo @$wrong;?></div>
<div style="color:red; text-align:center;"><?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?></div>
				<div class="panel-body">
				   <div id="register">
					<form role="form" name="frm_obj" method="post" action="index.php" onsubmit="return validation_signup(this);">
						<div class="register-table">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="txtEmailID" type="email" id="txtEmailID"  required value="<?php echo $email_id;?>">
												
												
								<!--<span id="email_status" style="color:red;"></span>-->
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="signuppassword" id="signuppassword" type="password" required value="<?php echo $password;?>">
												<div style="color:red; text-align:center;"><?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?></div>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="confirmpassword" type="password" id="confirmpassword" required value="<?php echo $confirmpassword;?>">
<span style="text-align:center;" id='message'></span>
												<div style="color:red; text-align:center;"><?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?></div>	
								<span style="color:red;" id="error1"></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Spending Password" name="spendingpassword" type="password" id="spendingpassword" required value="<?php echo $spendingpassword;?>">
												<div style="color:red; text-align:center;"><?php if(isset($error['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['spendingpasswordError']."</span>";  }?>	</div>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Spending Password" name="confirmspendingpassword" type="password" id="confirmspendingpassword" required value="<?php echo $confirmspendingpassword;?>">
<span style="text-align:center;" id='message1'></span><br>
												<div style="color:red; text-align:center;"><?php if(isset($error['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmspendingpasswordError']."</span>";  }?>	</div>
								<span style="color:red;" id="error2"></span>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" required value="1">I accept the terms of service
								</label>
							</div>
							<input  type="submit" name="btnsignup" class="btn btn-primary" value="Sign Up">
							<a style="float: right;"  href="login.php">Login</a>
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
<script>
/*	$('#signuppassword, #confirmpassword').on('keyup', function () {
  if ($('#signuppassword').val() == $('#confirmpassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Password Not Matching').css('color', 'red');
});

$('#spendingpassword, #confirmspendingpassword').on('keyup', function () {
  if ($('#spendingpassword').val() == $('#confirmspendingpassword').val()) {
    $('#message1').html('Matching').css('color', 'green');
  } else 
    $('#message1').html('Spending Password Not Matching').css('color', 'red');
});/
/*function password_valid(pass_frm)
{
	if(pass_frm.signuppassword.value != pass_frm.signuppassword.value)
	{ 
		alert('Password And Confirm Password Is Wrong');
		pass_frm.signuppassword.focus();
		return false;
	}
return true;
}
function passwordspen_valid(frm_obj)
{
	if(frm_obj.currentspendingpassword.value != frm_obj.confirmspendingpassword.value)
	{ 
		alert('Spending Password And Confirm Spending Password Is Wrong');
		frm_obj.confirmspendingpassword.focus();
		return false;
	}
return true;
}*/
</script>

</body>
</html>
