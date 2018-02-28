<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id = "";
$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";
$otp_token=rand(100000,999999);
$error = array();
if(isset($_POST['btnsignup']))
{
//  var_dump($_POST);
    echo $email_id = $_POST['txtEmailID'];
    echo $password = $_POST['signuppassword'];
    echo $confirmpassword = $_POST['confirmpassword'];
    echo $spendingpassword = $_POST['spendingpassword'];
    echo $confirmspendingpassword = $_POST['confirmspendingpassword'];
    //die();

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
    /*var_dump($user);
    die();*/

    if ($user['id']> 0)
    {
        $error['emailError'] = "User with email id $email_id already exist.";
    }

    if(empty($error))
    {

        $email_id = $mysqli->real_escape_string(strip_tags($email_id));
        $password_value = hash('sha256',addslashes(strip_tags($password)));
        $spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));
        
        $qstring = "insert into `merchantuser`( `date`, `ip`, `username`, 
        `encrypt_username`, `password`, `transcation_password`, 
        `email`,`accesskey`) values (";
        $qstring .= "now(), ";
        $qstring .= "'".$_SERVER['REMOTE_ADDR']."', ";
        $qstring .= "'".$email_id."', ";
        $qstring .= "'".hash('sha256',$email_id)."', ";
        $qstring .= "'".$password_value."', ";
        $qstring .= "'".$spendingpassword_value."', ";
        $qstring .= "'".$email_id."',";
        $qstring .="'".$otp_token."') ";
       /*echo $qstring;
        die();*/
        $result2    = $mysqli->query($qstring);
        if ($result2)
        {
            include'PHPMailer/PHPMailerAutoload.php';
            include'PHPMailer/class.smtp.php';
            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($email_id) . "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td><a href='merchantprofile.php?value1='".$otp_token."&& value2=".$spendingpassword_value.">Login</a></td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to=$email_id;
            $subject="Bcc Merchant Registration Successful!";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
            @mail($to,$subject,$message,$headers);
            ob_start();
            header('Location:login.php?msg=Registration Successfully!'); 
        }
    }
    else
    {
        ob_start();
        header('Location:signup.php');

    }
}       
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Wallets | <?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>
   <meta name="description" content="<?php echo $coin_fullname;?>(<?php echo $coin_short;?>)">
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <img width="129" src="frontend/assets/media/general/logo-lg.png" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Create Merchant Account </p>

   <form  method="post" name="signupform" action="#">
      <div 
        name="loginForm" role="form" autocomplete="off" novalidate="" 
                                    class="ptl form-horizontal clearfix ng-pristine ng-invalid ng-invalid-required">
      <fieldset>

      <div class="form-group has-feedback ">

       <input id="txtEmailID" name="txtEmailID" class="form-control" type="email"
        value="<?php echo $email_id;?>"  placeholder="Email">
        <?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\">".$error['emailError']."</span>";  }?>  
        <?php if(isset($error['emailError2'])) { echo "<br/><span class=\"messageClass2\">".$error['emailError2']."</span>";  }?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="signuppassword" name="signuppassword" autocomplete="off" class="form-control" type="password"  value="<?php echo $password;?>" placeholder="Password">
        <?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>  
        <span id="result" style="float:left"></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input id="confirmpassword" name="confirmpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmpassword;?>" placeholder="Confirm Password">
       <?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?>   
       <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="spendingpassword" name="spendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>" placeholder="Spending Password">
        <?php if(isset($error['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['spendingpasswordError']."</span>";  }?>
         <span id="spendingresult" style="float:left"></span>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input id="confirmspendingpassword" name="confirmspendingpassword" class="form-control" autocomplete="off" type="password" value="<?php echo $confirmspendingpassword;?>" placeholder="Confirm Spending Password">
        <?php if(isset($error['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmspendingpasswordError']."</span>";  }?> 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <!-- term and condition -->
       <div class="form-group has-feedback">
       <input id="agreement_accept" name="agreement" ng-model="fields.acceptedAgreement" 
         required="" class="pull-right ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" type="checkbox">
      <label translate="ACCEPT_TOS" class="em-300 mbn mls right-align">I have read and agree to the <a>Terms of Service</a></label>
      </div>

      <!-- button -->
      <div class="form-group has-feedback">
       <input type="submit" class="btn btn-primary btn-flat" id="btnsignup" name="btnsignup" onclick="IsEmpty();" value="Sign Up">
      <span class="button Lockerblue ladda-button" id="btnLoading" style="display:none">
          <span style="position:relative;">
              <span class="loader"></span>
          </span>
          <span class="val1">Loading</span>
      </span>
      </div>
     </fieldset>

      </div>
    </form>
    <a href="login.php" class="text-center">Login Merchant</a>
<script src="js/jquery-1.js"></script>
<script src="js/bootstrap.js"></script>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
