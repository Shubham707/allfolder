<?php
error_reporting(1);
session_start();


$success = $_GET['m'];
$forget = $_GET['f'];


if (isset($_POST['btnlogin'])) {
    //  var_dump($_POST);
    $email_id = $_POST['email'];
    $password = $_POST['emailpassword'];


    $postData = array(
   "email" => $email_id,
        "password" => $password
  );

    // Create the context for the request
    $context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));
    include_once('common.php');

    $response = file_get_contents($url_api.'/auth/authentcate', true, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);
    if ($responseData['statusCode'] != 401) {
        $message = $responseData['message'];
        $_SESSION["user_id"] = $responseData['user']['id'];
        $_SESSION["user_session"] = $responseData['user']['email'];
        $_SESSION['is_email_verify'] = $responseData['user']['verifyEmail'];
        $_SESSION['user_admin'] = $responseData['user']['isAdmin'];
        
        $_SESSION['INRWAddress'] = $responseData['user']['isINRWAddress'];
        $_SESSION['USDWAddress'] = $responseData['user']['isUSDWAddress'];
        $_SESSION['EURWAddress'] = $responseData['user']['isEURWAddress'];

        $_SESSION['GBPWAddress'] = $responseData['user']['isGBPWAddress'];
        $_SESSION['BRLWAddress'] = $responseData['user']['isBRLWAddress'];
        $_SESSION['PLNWAddress'] = $responseData['user']['isPLNWAddress'];

        $_SESSION['CADWAddress'] = $responseData['user']['isCADWAddress'];
        $_SESSION['TRYWAddress'] = $responseData['user']['isTRYWAddress'];
        $_SESSION['RUBWAddress'] = $responseData['user']['isRUBWAddress'];
        $_SESSION['MXNWAddress'] = $responseData['user']['isMXNWAddress'];

        $_SESSION['CZKWAddress'] = $responseData['user']['isCZKWAddress'];
        $_SESSION['ILSWAddress'] = $responseData['user']['isILSWAddress'];
        $_SESSION['NZDWAddress'] = $responseData['user']['isNZDWAddress'];

        $_SESSION['JPYDAddress'] = $responseData['user']['isJPYDAddress'];
        $_SESSION['SEKWAddress'] = $responseData['user']['isSEKWAddress'];
        $_SESSION['AUDWAddress'] = $responseData['user']['isAUDWAddress'];



        $_SESSION['token'] = $responseData['token'];
    } else {
        unset($success);
        $message = $responseData['message'];
    }


    if ($responseData['statusCode'] != 401 && $responseData['user']['tfastatus']==true) {
        header("location:device_confirmations.php");
    } elseif (isset($responseData['user'])) {
        header("location:index.php?curr=".base64_encode('inrw') );
    }
}

?>


<!DOCTYPE html>
<!-- saved from url=(0029)https://www.luno.com/en/login -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign in | BCCXchange</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">
<meta name="theme-color" content="#12326B">
<link rel="alternate" hreflang="en" href="ZenithNEX.com/login.html">
<meta property="og:locale" content="en">
<meta property="og:type" content="website">
<link rel="icon" href="img/favicon.png" type="image/x-icon" />

<link href="assets/css" rel="stylesheet">
<link rel="stylesheet" href="assets/bootstrap.min.css">
<link rel="stylesheet" href="assets/website.css">
  <link href="assets/css(1)" rel="stylesheet">
</head>
<body id="o-wrapper" class="o-wrapper ln-account-body" style="background-image: url(img/bg22.jpg) !important;">



<nav class="navbar navbar-fixed-top ln-navbar">

  <div class="container-fluid page-banner collapse">
    ZenithNEX
    <a href="ZenithNEX.com/blog/en/">Read more</a>
    <a href="ZenithNEX.com" class="close">×</a>
  </div>

  <div class="container-fluid">
    <div class="navbar-header">
      <a id="sidenav-button--slide-left" class="ln-menu sidenav-button--slide-left" href="javascript:void(0)">

        <svg height="24" class="visible-xs" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
        </svg>
      </a>
      <a class="ln-logo navbar-brand" href="indexnew.php">

       <img src="img/logo.png" alt="footer-logo" >
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
    <div class="ln-account-wrapper">


<div class="section">
  <h1 class="ng-binding">Welcome back</h1>

  <p>
      <img ng-src="src="img/email.png">
  </p>
<p style="color:Green;"> <?php if (isset($success)) {
    echo $success;
}?> </p>
<p style="color:Green;"> <?php if (isset($forget)) {
    echo $forget. " You Can SignIn Now.";
}?> </p>
<p style="color:red;"> <?php if (isset($message)) {
    echo $message;
}?> </p>
  <form  method="post" class="">

    <div class="form-group">
      <input class="form-control"  type="email" name="email" placeholder="Email address" autofocus="" required="">
    </div>
	<div class="form-group">
      <input class="form-control"  type="password" name="emailpassword" placeholder="Password" autofocus="" required="">
    </div>
	<!-- <div class="ln-captcha">
      <div class="g-recaptcha ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" vc-recaptcha="" ng-model="vm.recaptcha" key="vm.recaptchaPublicKey"><div style="width: 304px; height: 78px;"><div><iframe src="./Sign up _ Luno_files/anchor.html" title="recaptcha widget" width="304" height="78" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
    </div> -->
    <button type="submit" name="btnlogin" class="btn ln-btn-sm btn-primary">Sign In</button>

    <div class="ln-account-secondary-actions">
      <a href="signupnew.php">Sign up</a>
    </div>
    <div class="ln-account-secondary-actions">
      <a href="forgetnew.php">Forget Password</a>
    </div>

  </form>
</div>
</div>
<script src="assets/deps.min.js"></script>
<script src="assets/website.js"></script>
</body>
</html>
