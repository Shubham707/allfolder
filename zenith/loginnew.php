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
        $_SESSION['BCHAddress'] = $responseData['user']['userBCHAddress'];
        $_SESSION['BTCAddress'] = $responseData['user']['userBTCAddress'];
        $_SESSION['GDSAddress'] = $responseData['user']['userGDSAddress'];
        $_SESSION['PYYAddress'] = $responseData['user']['userPYYAddress'];
        $_SESSION['BTCbalance'] = $responseData['user']['BTCMainbalance'];
        $_SESSION['BCHbalance'] = $responseData['user']['BCHMainbalance'];
        $_SESSION['GDSbalance'] = $responseData['user']['GDSMainbalance'];
        $_SESSION['PYYbalance'] = $responseData['user']['PYYMainbalance'];
        $_SESSION['BTCtradebalance'] = $responseData['user']['BTCbalance'];
        $_SESSION['BCHtradebalance'] = $responseData['user']['BCHbalance'];
        $_SESSION['GDStradebalance'] = $responseData['user']['GDSbalance'];
        $_SESSION['PYYtradebalance'] = $responseData['user']['PYYbalance'];
        $_SESSION['BTCfreezebalance'] = $responseData['user']['FreezedBTCbalance'];
        $_SESSION['BCHfreezebalance'] = $responseData['user']['FreezedBCHbalance'];
        $_SESSION['GDSfreezebalance'] = $responseData['user']['FreezedGDSbalance'];
        $_SESSION['PYYfreezebalance'] = $responseData['user']['FreezedPYYbalance'];
        $_SESSION['tfa'] = $responseData['user']['tfastatus'];
        $_SESSION['key'] = $responseData['user']['googlesecreatekey'];
    } else {
        unset($success);
        $message = $responseData['message'];
    }


    if ($responseData['statusCode'] != 401 && $responseData['user']['tfastatus']==true) {
        header("location:device_confirmations.php");
    } elseif (isset($responseData['user'])) {
        header("location:index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <link rel="icon" href="img/favicon.png" type="image/x-icon" />
<title>Sign in | ZenithNEX</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">
<meta name="theme-color" content="#12326B">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="assets/css" rel="stylesheet">
<link rel="stylesheet" href="assets/bootstrap.min.css">
<link rel="stylesheet" href="assets/website.css">


  <link href="assets/css(1)" rel="stylesheet">
  <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("closeWallet").style.display = "block";
        $("#closeWallet").removeClass('hide');
        document.getElementById("openWallet").style.display = "none";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("closeWallet").style.display = "none";
        document.getElementById("openWallet").style.display = "block";
        document.body.style.backgroundColor = "white";
    }
    function openMarketNavOpen() {
        document.getElementById("marketSidenavOpen").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

    }
    function closeMarketNav() {
        document.getElementById("marketSidenavOpen").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
  </script>
</head>
<body id="o-wrapper" class="o-wrapper ln-account-body" style="background-image: url(img/bg22.jpg) !important;">



<nav class="navbar navbar-fixed-top ln-navbar">

  <div class="container-fluid page-banner collapse">
    ZenithNEX
    <a href="ZenithNEX.com/blog/en/">Read more</a>
    <a href="ZenithNEX.com" class="close">×</a>
  </div>

  <div class="container-fluid">
    <div class="navbar-header" style="width:100%">

      <a class="ln-logo" href="indexnew.php">

        <img class="logo-dark hi" src="img/logo.png" />
      </a>
      <div class="dropdown pull-right">
        <button class="btn btn-default visible-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
          <i class="fa fa-bars " aria-hidden="true"></i>
        </button>
        <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
           <li class="nav-item">
               <a class="nav-link" role="button" onclick="openMarketNavOpen()">
                 MARKET&nbsp;
               </a>
           </li>
           <li class="nav-item nav-dropdown">
               <a class="nav-link" href="homecontact.php">CONTACT US</a>
           </li>
           <li class="nav-item nav-dropdown">
               <a class="nav-link" href="loginnew.php">SIGN IN</a>
           </li>
           <li class="nav-item nav-dropdown">
               <a class="nav-link" href="signupnew.php">SIGN UP</a>
           </li>
        </ul>
      </div>
    </div>

    <div class="hidden-xs">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homemarket.php">MARKET</a></li>
        <li><a href="homecontact.php">SUPPORT</a></li>
        <li><a href="loginnew.php" class="btn btn-primary ln-btn-sm">SIGN IN</a></li>
        <li><a href="signupnew.php" class="btn btn-primary ln-btn-sm">SIGN UP</a></li>
      </ul>

    </div>
  </div>
</nav>



<div id="marketSidenavOpen" class="MarketRightsidenav">
  <span class="marketSideNavTitle">BTC Market</span>
  <button class="closebtn btn btn-default" onclick="closeMarketNav()"><i class="fa fa-times" aria-hidden="true"></i></button>
  <div class="row">
      <div class="col-md-12  border-right">
          <a href="homemarket.php" title="Bitcoin Cash">
            <span class="col-xs-4"><img src="img/bch.png" alt=""></span>
             <div class="col-xs-8 name text-left">
                BCH<br>
                <div class=" price"><span id="ask_current_BCH"></span></div>
             </div>
          </a>
      </div>
      <div class="col-md-12 -right">

        <a href="homegds.php" title="Goods Coin">
            <span class="col-xs-4"><img src="img/gdscoin.png" alt=""></span>
            <div class="col-xs-8 name text-left">
                 GDS<br>
                 <div class="price"><span id="ask_current_GDS"></span></div>
            </div>
        </a>
      </div>
      <div class="col-md-12 ">

        <a href="homepyy.php" title="Payway Coin">
            <span class="col-xs-4"><img src="img/pyy.png" alt=""></span>
            <div class="col-xs-8 name text-left">
                PYY<br>
                <div class="price"><span id="ask_current_PYY"></span></div>
            </div>
        </a>
      </div>
  </div>
</div>


    <div class="ln-account-wrapper">


<div class="section">
  <h1 class="ng-binding">Welcome back</h1>

  <p>
      <img ng-src="https://d32exi8v9av3ux.cloudfront.net/web/71d1732/website/pages/login/email.svg" width="58" height="60" src="assets/email.svg">
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

<script src="assets/deps.min.js"></script>
<script src="assets/website.js"></script></body></html>
