<?php 
include_once('common.php');

  $email_id =@$_REQUEST['txtEmailID'];
  $pass =@$_REQUEST['password'];
  $confirm =@$_REQUEST['confirm_pass'];
 //die();
 if(!$pass=='')
 {

  if($pass == $confirm)
  {
    $password_value = hash('sha256',addslashes(strip_tags($pass)));
    $sql="UPDATE  `merchantuser` SET `password`='$password_value' WHERE `pass`='$email_id'";
    $query=mysqli_query($mysqli, $sql);
    if($query)
    {
            include'PHPMailer/PHPMailerAutoload.php';
            include'PHPMailer/class.smtp.php';
            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" .$email_id. "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Transaction:</strong> </td><td>" .$pass. "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to=$email_id;
            $subject="Bcc Update Password Successful!";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
            @mail($to,$subject,$message,$headers);
            ob_start();
            header("Location:login.php?msg=Update is successfully!");
    
  }
  else
  {
      header("location:forget.php?msg=OTP Did Not Match");
      $error['emailError']="OTP Did Not Match!";

  }

 
}
else
{
    /*$error['emailError']=" Please again Password And Confirm Password Did not match!";*/
    $error['emailError']=" Email and Password Did Not Match";
}
}


?>
<style>

 body{ background-image: url('frontend/assets/media/components/b-main-slider/bg-1.jpg') } 
</style>
<style>
 .login-box-body, .register-box-body {
    background: #072c4a !important;
    padding: 20px;
    border-top: 0;
    color: #666;
    opacity: 0.7;
} 
</style>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BCHPAYZ Forget</title>
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
<body class="hold-transition login-page" Style="background-image: url('frontend/assets/media/components/b-main-slider/bg-1.jpg')">
<div class="login-box">
  <div class="login-logo">
   <img width="129" src="frontend/assets/media/general/logo-dark.png" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" style="color:white">Forget Password </p>
	<div style="color:red; text-align:center;"><?php echo $_REQUEST['msg']; ?></div>
    <form  method="post" action="forget.php" id="formCheckPassword" name="loginForm"> 
      <div name="loginForm" role="form" autocomplete="off" novalidate="" class=" form-group has-feedback ptl form-horizontal clearfix ng-pristine ng-invalid ng-invalid-required">

        
        <div class="input-group input-group-lg">
                <div class="input-group-btn">
                  <i type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-lock form-control-feedback" style="color:white !important;"></span>
                    </i>
                </div>
                <!-- /btn-group -->
                <input id="txtEmailID" name="txtEmailID" class="form-control"  type="text" autocomplete="off" placeholder="OTP NO" required>
                
            </div>  
            <?php if(@$error['emailError']!=='1') { 
              echo "<span class=\"messageClass\" style=\"color:red;\">".@$error['emailError']."</span>";  
            } else { echo " ";}?>
            <div  ng-class="{'has-error': errors.uid}"></div>
              <br>
              <div class="input-group input-group-lg">
                <div class="input-group-btn">
                  <i type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-lock form-control-feedback" style="color:white !important;"></span>
                    </i>
                </div>
                <!-- /btn-group -->
                <input id="password" name="password" class="form-control"  type="password"
           autocomplete="off" required placeholder="New Password">
                
            </div><br>  
              <div class="input-group input-group-lg">
                <div class="input-group-btn">
                  <i type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-lock form-control-feedback" style="color:white !important;"></span>
                    </i>
                </div>
                <!-- /btn-group -->
                <input id="cfmPassword" name="confirm_pass" class="form-control"  type="password" autocomplete="off" required placeholder="Confirm Password" required >
                
            </div>  

              <br>
              <div class=" mtl flex-center flex-end">
                  <input type="submit" class="btn btn-primary" id="btnlogin" name="btnlogin" value="Update"/>
              </div>
              <!-- <a href="signup.php" class="text-center" style="color: white;">Register a new Merchant</a>
     <a style="float:right; color:white !important;" href="forget.php" class="text-center txt-color" >Forget Password</a>
      </div> -->
      </div>
    </form>
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
       <form  method="post" action="lib/forget.php"> 
      <div  name="loginForm" role="form" autocomplete="off" novalidate="" class=" form-group has-feedback">
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
  

$('button').click(function(){
    console.log($('.validatedForm').valid());
});
</script>
<script type="text/javascript">
  
  $("#formCheckPassword").validate({
           rules: {
               password: { 
                 required: true,
                    minlength: 6,
                    maxlength: 10,

               } , 

                   cfmPassword: { 
                    equalTo: "#password",
                     minlength: 6,
                     maxlength: 10
               }


           },
     messages:{
         password: { 
                 required:"the password is required"

               }
     }

});
</script>
   
</body>
</html>
