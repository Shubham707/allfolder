<?php 
include_once('common.php');
$allowed = array(".", "-", "_");
$email_id ="";
$password = "";

//echo "           =>>>>>>> ".hash('sha256',addslashes(strip_tags($email_id)));
//echo "</br> </br> </br> </br> </br> </br> </br>           =>>>>>>> ".hash('sha256',addslashes(strip_tags($password)))."</br> </br> ";
$error = array();
if(isset($_POST['btnlogin']))
{
//  var_dump($_POST);
    $email_id = $_POST['txtEmailID'];
    $password = $_POST['txtpassword'];

    if (empty($email_id))
    {
        $error['emailError'] = "Please Provide valid email id";
    }   
    if(empty($password))
    {
        $error['passwordError'] = "Please Provide valid passowrd";
    }
    elseif (!isEmail($email_id))
    {
        $error['emailError'] = "Please Provide valid email id";
    }

    if(empty($error))
    {
        $email_id = $mysqli->real_escape_string(strip_tags($email_id));
        $password_value = hash('sha256',addslashes(strip_tags($password)));
        $qstring = "select coalesce(id,0) as id, coalesce(username,'') as username,
                    coalesce(password,'') as password,
                    coalesce(email,'') as email_id,
                    coalesce(admin,'') as admin,
                    coalesce(locked,0) as locked,
                    coalesce(supportpin,'') as supportpin,
                    coalesce(is_email_verify,0) as is_email_verify,
                    coalesce(secret,'') as secret,
                    coalesce(authused,0) as authused
                    from merchantuser WHERE encrypt_username = '" . hash('sha256',$email_id) . "'";
        
        $result = $mysqli->query($qstring);
        $user = $result->fetch_assoc();
        //var_dump($user);
        
        $secret = $user['secret'];
        if (($user) && ($user['password'] == $password_value) && ($user['locked'] == 0) && ($user['authused'] == 0))
        {
            //  session_start();
            session_regenerate_id (true); //prevent against session fixation attacks.
                                
            //var_dump($user);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email_id'] = $user['email_id'];
            $_SESSION['user_session'] = $user['username'];
            $_SESSION['user_admin'] = $user['admin'];
            $_SESSION['user_supportpin'] = $user['supportpin'];
            $_SESSION['is_email_verify'] = $user['is_email_verify'];
            $_SESSION['accesskey'] = $user['accesskey'];
            
            header("Location:merchantprofile.php");
            exit();

        } 
        elseif (($user) && ($user['password'] == $password_value) && ($user['locked'] == 1))
        {
            $pin = $user['supportpin'];
            $error['emailError'] = "Account is locked. Contact support for more information. $pin";
        }
        elseif (($user) && ($user['password'] == $password_value) && ($user['locked'] == 0) && ($user['authused'] == 1 && ($oneCode == $_POST['auth']))) 
        {
            //      session_start();
            session_regenerate_id (true); //prevent against session fixation attacks.
                                
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email_id'] = $user['email_id'];
            $_SESSION['user_session'] = $user['username'];
            $_SESSION['user_admin'] = $user['admin'];
            $_SESSION['user_supportpin'] = $user['supportpin'];
            $_SESSION['is_email_verify'] = $user['is_email_verify'];
            header("Location:home.php");
            exit();
        }
        else
        {
                $error['emailError'] = "$email_id And Password is incorrect";
        }
    }
    else
    {
        $error['emailError'] = "$email_id, password is incorrect";
    }
}
//var_dump($_SESSION);
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
<body class="hold-transition login-page" Style="background-image: url('frontend/assets/media/components/b-main-slider/bg-1.jpg')">
<div class="login-box">
  <div class="login-logo">
   <img width="129" src="frontend/assets/media/general/logo-dark.png" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" style="color:white">Login Merchant </p>

    <form  method="post" action="login.php"> 
      <div name="loginForm" role="form" autocomplete="off" novalidate="" class=" form-group has-feedback ptl form-horizontal clearfix ng-pristine ng-invalid ng-invalid-required">

        
        <div class="input-group input-group-lg">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </button>
                </div>
                <!-- /btn-group -->
                <input id="txtEmailID" name="txtEmailID" class="form-control"  type="text"
            value="<?php echo $email_id;?>" autocomplete="off" required >
                
            </div>  
            <?php if(isset($error['emailError'])) { echo "<br/><span class=\"messageClass\" style=\"color:red;\">".$error['emailError']."</span>";  }?>
            <div  ng-class="{'has-error': errors.uid}"></div><br>

            <div class="input-group input-group-lg">
                <div class="input-group-btn" >
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-lock form-control-feedback"></span> 
                    </button>
                </div>

                <!-- /btn-group -->
                <input id="txtpassword" name="txtpassword" class="form-control" type="password" value="<?php echo $password;?>" autocomplete="off" required>
                 
              </div>
              
              <div ng-class="{'has-error': errors.password}"></div>
              <?php if(isset($error['passwordError'])) 
                         { echo "<br/><span class=\"messageClass\" style=\"color:white;\">".$error['passwordError']."</span>";  
                     }?>
              <br>
              <div class=" mtl flex-center flex-end">
                  <input type="submit" class="btn btn-primary" id="btnlogin" name="btnlogin" value="Sign In"/>
              </div>
              <a href="signup.php" class="text-center" style="color: white;">Register a new Merchant</a>
     <a style="float:right; color:white !important;" href="forget.php" class="text-center txt-color" >Forget Password</a>
      </div>
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
</script>
</body>
</html>
