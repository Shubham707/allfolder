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

<!-- saved from url=(0030)https://www.luno.com/en/signup -->
<html lang="en" class="gr__luno_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign up | BCCXchange</title>




<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">
<meta name="theme-color" content="#12326B">



<link rel="alternate" hreflang="en" href="https://www.luno.com/en/signup">
<link rel="alternate" hreflang="id" href="https://www.luno.com/id/signup">
<link rel="icon" href="img/favicon.png" type="image/x-icon" />
<meta name="description" content="Click here to get a secure, free Bitcoin wallet in seconds.">


<link href="./assets/css" rel="stylesheet">
<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">



<link href="./assets/css(1)" rel="stylesheet">
</head>
<body id="o-wrapper" class="o-wrapper ln-account-body" data-gr-c-s-loaded="true" style="background-image: url(img/bg22.jpg) !important;">


<nav class="navbar navbar-fixed-top ln-navbar">

  <div class="container-fluid page-banner collapse">
    BCCXchange
   
  </div>

  <div class="container-fluid">
    <div class="navbar-header">
      <a id="sidenav-button--slide-left" class="ln-menu sidenav-button--slide-left" href="javascript:void(0)">

        <svg height="24" class="visible-xs" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
        </svg>
      </a>
      <a class="ln-logo" href="indexnew.php">

        <img class="logo-dark hi" src="img/logo.png" />
      </a>
    </div>
    <div class="hidden-xs">
      <ul class="nav navbar-nav navbar-right">
        <li><div class="dropdown">


          <a class="navbar-brand dropdown-toggle no-background" id="menu1" data-toggle="dropdown">TRADE&nbsp;
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <li role="presentation"><a role="menuitem" class="text-black" tabindex="-1" href="homemarket.php">BCH</a></li>
            <li role="presentation"><a role="menuitem" class="text-black" tabindex="-1" href="homegds.php">GDS</a></li>
          </ul>
        </div></li>
        <li><a href="homecontact.php">SUPPORT</a></li>
        <li><a href="loginnew.php" class="btn btn-primary ln-btn-sm">SIGN IN</a></li>
        <li><a href="signupnew.php" class="btn btn-primary ln-btn-sm">SIGN UP</a></li>
      </ul>

    </div>
  </div>
</nav>



<nav id="sidenav-menu--slide-left" class="sidenav-menu sidenav-menu--slide-left " >
  <div class="ln-sidenav-top">
    <a href="javascript:void(0)" class="sidenav-menu__close ln-close">


    </a>
    <a class="btn btn-primary ln-btn-primary" href="signupnew.php">Get Started</a>
  </div>

    <ul class="nav">
      <li class="nav-item">
        <a href="market.php">MARKET</a>
      </li>
      <li class="nav-item">
        <a href="#">SUPPORT</a>
      </li>
      <li class="nav-item">
        <a href="loginnew.php">SIGN IN</a>
      </li>
      <li class="nav-item">
        <a href="signupnew.php">SIGN UP</a>
      </li>

    </ul>
  </div>





</nav>
<div id="sidenav-mask" class="sidenav-mask"></div>


<div class="ln-account-wrapper">


  <noscript>
    &lt;p class="alert alert-warning"&gt;
    This page requires Javascript to be enabled.
    &lt;/p&gt;
  </noscript>

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

</div>
</body>
</html>
