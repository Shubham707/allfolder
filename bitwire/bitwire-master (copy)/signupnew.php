<?php
error_reporting(1);
include_once('common.php');
require_once 'googleLib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$secret = $ga->createSecret();
if (isset($_POST['btnsignup'])) {
    //  var_dump($_POST);
    $email_id = $_POST['txtEmailID'];
    $password = $_POST['signuppassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $spendingpassword = $_POST['spendingpassword'];
    $confirmspendingpassword = $_POST['confirmspendingpassword'];
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
    $confirmpassword_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $confirmpassword);
    $spendingpassword_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $spendingpassword);
    $confirmspendingpassword_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $confirmspendingpassword);

    if ($password_check && $confirmpassword_check && $spendingpassword_check && $confirmspendingpassword_check >0) {
        $postData = array(
  "email"=> $email_id ,
  "password" =>$password,
  "confirmPassword"=> $confirmpassword,
  "spendingpassword"=> $spendingpassword,
  "confirmspendingpassword"=> $confirmspendingpassword,
  "googlesecreatekey"=>$secret
  );

        // Create the context for the request
        $context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


        $response = file_get_contents($url_api.'/user/createNewUser', false, $context);

        if ($response === false) {
            die('Error');
        }


        $responseData = json_decode($response, true);



        if (isset($responseData['userMailId'])) {
            $message = $responseData['message'];

            header("location:loginnew.php?m=".$message);
        } else {
            $error = $responseData['message'];
        }
    } else {
        $errorpassword = "Enter valid password";
    }
}
?>
<!doctype html>
<html lang="en" class="gr__luno_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign up | Bitwire</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">
<meta name="theme-color" content="#12326B">
<link rel="icon" href="img/favicon.png" type="image/x-icon" />

<link href="./assets/css" rel="stylesheet">
<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="./assets/css(1)" rel="stylesheet">
</head>
<body id="o-wrapper" class="o-wrapper ln-account-body" data-gr-c-s-loaded="true" style="background-image: url(img/bg22.jpg) !important;">

<nav class="navbar navbar-fixed-top ln-navbar">

  <div class="container-fluid page-banner collapse">
    Bitwire
  </div>

  <div class="container-fluid">
    <div class="navbar-header">

      <button class="btn btn-default visible-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
        <i class="fa fa-bars " aria-hidden="true"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        

         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="loginnew.php">SIGN IN</a>
         </li>

         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="signupnew.php">SIGN UP</a>
         </li>

      </ul>
      <a class="ln-logo" href="indexnew.php">

        <img class="logo-dark hi" src="img/logo.png" />
      </a>
    </div>
    <div class="hidden-xs">
      <ul class="nav navbar-nav navbar-right">

       
        <li><a href="loginnew.php" class="btn btn-primary ln-btn-sm">SIGN IN</a></li>
        <li><a href="signupnew.php" class="btn btn-primary ln-btn-sm">SIGN UP</a></li>
      </ul>

    </div>
  </div>
</nav>


<div class="ln-account-wrapper">


  <div ng-app="authApp" class="ng-scope">
    <div class="section ln-signup">
      <h1 class="ng-binding">Sign up</h1>


      <p style="color:red;"> <?php if (isset($error)) {
    echo $error;
}?> </p>
      <p style="color:red;"> <?php if (isset($errorpassword)) {
    echo $errorpassword;
}?> </p>

      <form method="post" autocomplete="off" class="ng-pristine ng-valid-email ng-invalid ng-invalid-required ng-valid-maxlength ng-valid-pattern ng-invalid-recaptcha">

        <div class="form-group">
          <input type="email" ng-model="vm.email"  name="txtEmailID" placeholder="Enter email address" class="form-control ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required ng-valid-maxlength" ng-readonly="vm.emailReadonly()" maxlength="254" required="">
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password" name="signuppassword" placeholder="Password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"  required="">
          <small><em> [ Please Enter Alphanumaric Password ]</em></small>
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password" name="confirmpassword" placeholder="Confirm password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"  required="">
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password"  name="spendingpassword" placeholder="Spending password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"  required="">
            <small><em> [ Please Enter Alphanumaric Password ]</em></small>
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password" name="confirmspendingpassword" placeholder="Confirm Spending Password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern" required="">
        </div>


    <!-- <div class="ln-captcha">
      <div class="g-recaptcha ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" vc-recaptcha="" ng-model="vm.recaptcha" key="vm.recaptchaPublicKey"><div style="width: 304px; height: 78px;"><div><iframe src="./assets/anchor.html" title="recaptcha widget" width="304" height="78" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
    </div> -->

    <p class="ln-hint-paragraph ng-binding" ng-bind-html="vm.messages.msgAgreeToTerms | trustedHtml">By signing up you agree to our<br><a href="" class="privacypolicy" target="_blank">Terms of Use</a> and <a href="" target="_blank">Privacy Policy</a>.</p>

    <button type="submit"  name="btnsignup" class="btn btn-primary ln-btn-sm ng-binding">Sign up</button>

    <div class="ln-account-secondary-actions">
      <a class="ng-binding" href="loginnew.php">Sign in</a>
    </div>
  </form>
</div>

</div>
<!-- Bootstrap and necessary plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>
</body>
</html>
