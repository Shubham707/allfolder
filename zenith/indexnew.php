<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
<title>Trading for everyone, everywhere | ZenithNEX</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">


<meta name="theme-color" content="#12326B">
<meta name="description" content="ZenithNEX makes it safe and easy to buy, store and learn about Bitcoin">


<meta property="og:locale" content="en">
<meta property="og:type" content="website">
 <link rel="icon" href="img/favicon.png" type="image/x-icon" />
<link href="./assets/css" rel="stylesheet">
<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">
<script type="text/javascript" src="js/sails.io.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
  io.sails.url = 'http://199.188.206.184:1338';
  url_api='http://199.188.206.184:1338';
</script>
</head>
<body id="o-wrapper" class="o-wrapper">

<nav class="navbar navbar-fixed-top ln-navbar">
  <div class="container-fluid page-banner collapse">
    ZenithNEX
  </div>
    <div class="container-fluid">
    <div class="navbar-header">
      <button class="btn btn-defaultln-menu sidenav-button--slide-left visible-xs" type="button" id="openMainNav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
        <svg height="24" class="visible-xs" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
        </svg>
      </button>
      <ul class="dropdown-menu" aria-labelledby="openMainNav">

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
      <a class="ln-logo" id="logoWhite" href="#">
        <img class="logo-dark hi" src="img/logo.png" />
      </a>
      <a class="ln-logo hide" href="#" id="logoDark">
        <img class="logo-darki" src="img/dark-logo.png" />
      </a>
    </div>
    <div class="hidden-xs">
      <ul class="nav navbar-nav navbar-right">

        <li class="font-15 border-none">
          <div class="dropdown">
              <a class=" dropdown-toggle no-background" id="menu1" data-toggle="dropdown">MARKET&nbsp;
              <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li role="presentation"><a role="menuitem" class="text-black" tabindex="-1" href="homemarket.php">BCH</a></li>
                <li role="presentation"><a role="menuitem" class="text-black" tabindex="-1" href="homepyy.php">PYY</a></li>
                <li role="presentation"><a role="menuitem" class="text-black" tabindex="-1" href="homegds.php">GDS</a></li>
              </ul>
          </div>
        </li>
        <li class="font-15 border-none"><a href="homecontact.php">SUPPORT</a></li>
        <li><a href="loginnew.php">SIGN IN</a></li>
        <li><a href="signupnew.php" class="btn btn-primary ln-btn-sm">SIGN UP</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="marketSidenavOpen" class="MarketRightsidenav">
  <span class="marketSideNavTitle">BTC Market</span>
  <button href="javascript:void(0)" class="closebtn btn btn-default" onclick="closeMarketNav()"><i class="fa fa-times" aria-hidden="true"></i></button>
  <div class="row marginTop50">
      <div class="col-md-12  border-right">
          <a href="homemarket.php" title="Bitcoin Cash">
            <span class="col-xs-4"><img src="img/bch.png" alt=""></span>
             <div class="col-xs-8 name text-left">
                BCH
                <div class=" price pull-right"><span id="ask_current_BCH"></span></div>
             </div>
          </a>
      </div>
      <div class="col-md-12 -right">

        <a href="homegds.php" title="Goods Coin">
            <span class="col-xs-4"><img src="img/gdscoin.png" alt=""></span>
            <div class="col-xs-8 name text-left">
                 GDS
                 <div class="price pull-right"><span id="ask_current_GDS"></span></div>
            </div>
        </a>
      </div>
      <div class="col-md-12 ">

        <a href="homepyy.php" title="Payway Coin">
            <span class="col-xs-4"><img src="img/PPYcoin1.png" alt=""></span>
            <div class="col-xs-8 name text-left">
                PYY
                <div class="price pull-right"><span id="ask_current_PYY"></span></div>
            </div>
        </a>
      </div>
  </div>
</div>

<div class="page-index ln-h-100 ln-homepage">
  <header class="ln-hero" style="background-image: url(img/bg1.jpg) !important;">
    <div class="ln-cta container-fluid">
      <h1 align="left">ZenithNEX makes it safe and<br> easy to buy, store and trade<br> different cryptocurrencies</h1>
      <div class="mobile-signup hidden-sm hidden-md hidden-lg">
        <a href="loginnew.php">Sign In</a>
        <span class="spacer">•</span>
        <a href="signupnew.php">Sign Up</a>
      </div>
    </div>
    <div class="ln-hero-devices"></div>
  </header>
</div>
<div class="ln-homepage">
  <div class="container ln-section">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">HOW DOES ZENITHNEX WORK?</h2><br><br>
      </div>
    </div>
    <div class="row ln-why-use">
      <div class="col-md-4">
        <div class="ln-card text-center" data-mh="future-finance" >
          <div class="ln-card-inner">
            <img class="center" src="img/sign-up.png">
            <h3>Sign-up</h3>
            <p>We’re early industry pioneers, successfully processed Bitcoin and other currencies in transactions and have happy customers in different countries.</p>
          </div>
        </div>
      </div>
        <div class="col-md-4">
            <div class="ln-card text-center" data-mh="future-finance" >
                <div class="ln-card-inner">
              <img class="center" src="img/deposit-money.png">
              <h3>Deposit Money</h3>
              <p>People love our easy-to-use products. From local payment methods to customer support in many different languages, we make your Bitcoin experience the best one.</p>
            </div>
              </div>
        </div>
        <div class="col-md-4">
          <div class="ln-card text-center" data-mh="future-finance">
              <div class="ln-card-inner">
            <img class="center" src="img/start-trading.png">
            <h3>Start-Trading</h3>
            <p>When we say your money is safe, we really mean it. We’ve built some of the world’s most sophisticated Bitcoin security systems and have never been compromised.</p>
          </div>
            </div>
        </div>
    </div>
  </div>
  <hr class="ln-divider">
       
     <hr class="ln-divider ln-divider-on-grey">
 
</div>
<div class="container-fluid ln-section ln-versions">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <p class="text-center">Open account for free and start trading Bitcoin now.</p>
    </div>
    <div class="col-md-12 text-center">
      <a class="btn ln-btn-outline-lg" href="signupnew.php">Get Started</a>
    </div>
  </div>
</div>


<?php
  include 'footerz.php';
?>
