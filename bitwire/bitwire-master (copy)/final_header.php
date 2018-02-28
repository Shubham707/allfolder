<?php
include_once('common.php');
if (@$_SESSION['user_id']) {
    page_protect();
    if (!isset($_SESSION['user_id'])) {
        header("location:logout.php");
    }

    $user_email = $_SESSION['user_session'];
    $postData = array(
  "userMailId"=> $user_email

  );

    // Create the context for the request
    $context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));



    $response1 = file_get_contents($url_api.'/INRW/getBalINRW', false, $context);
    $response2 = file_get_contents($url_api.'/USDW/getBalUSDW', false, $context);
    $response3 = file_get_contents($url_api.'/EURW/getBalEURW', false, $context);
    $response4 = file_get_contents($url_api.'/GBPW/getBalGBPW', false, $context);

    $response5 = file_get_contents($url_api.'/BRLW/getBalBRLW', false, $context);
    $response6 = file_get_contents($url_api.'/PLNW/getBalPLNW', false, $context);
    $response7 = file_get_contents($url_api.'/CADW/getBalCADW', false, $context);
    $response8 = file_get_contents($url_api.'/TRYW/getBalTRYW', false, $context);
    $response9 = file_get_contents($url_api.'/RUBW/getBalRUBW', false, $context);
    $response10 = file_get_contents($url_api.'/MXNW/getBalMXNW', false, $context);
    $response11 = file_get_contents($url_api.'/CZKW/getBalCZKW', false, $context);
    $response12 = file_get_contents($url_api.'/ILSW/getBalILSW', false, $context);
    $response13 = file_get_contents($url_api.'/NZDW/getBalNZDW', false, $context);
    $response14 = file_get_contents($url_api.'/JPYW/getBalJPYW', false, $context);
    $response15 = file_get_contents($url_api.'/SEKW/getBalSEKW', false, $context);
    $response16 = file_get_contents($url_api.'/AUDW/getBalAUDW', false, $context);

    $responseData1 = json_decode($response1, true);
    $responseData2 = json_decode($response2, true);
    $responseData3 = json_decode($response3, true);
    $responseData4 = json_decode($response4, true);
    $responseData5 = json_decode($response5, true);
    $responseData6 = json_decode($response6, true);
    $responseData7 = json_decode($response7, true);
    $responseData8 = json_decode($response8, true);
    $responseData9 = json_decode($response9, true);
    $responseData10 = json_decode($response10, true);
    $responseData11= json_decode($response11, true);
    $responseData12 = json_decode($response12, true);
    $responseData13 = json_decode($response13, true);
    $responseData14 = json_decode($response14, true);
    $responseData15 = json_decode($response15, true);
    $responseData16 = json_decode($response16, true);

    if (isset($responseData1)) {
        $INRW = $responseData1['balanceINRW'];
    }
    if (isset($responseData2)) {
        $USDW = $responseData2['balanceUSDW'];
    }
    if (isset($responseData3)) {
        $EURW = $responseData3['balanceEURW'];
    }
    if (isset($responseData4)) {
        $GBPW = $responseData4['balanceGBPW'];
    }
    if (isset($responseData5)) {
        $BRLW = $responseData5['balanceBRLW'];
    }
    if (isset($responseData6)) {
        $PLNW = $responseData6['balancePLNW'];
    }
    if (isset($responseData7)) {
        $CADW = $responseData7['balanceCADW'];
    }
    if (isset($responseData8)) {
        $TRYW = $responseData8['balanceTRYW'];
    }
    if (isset($responseData9)) {
        $RUBW = $responseData9['balanceRUBW'];
    }
    if (isset($responseData10)) {
        $MXNW = $responseData10['balanceMXNW'];
    }
    if (isset($responseData11)) {
        $CZKW = $responseData11['balanceCZKW'];
    }
    if (isset($responseData12)) {
        $ILSW = $responseData12['balanceILSW'];
    }
    if (isset($responseData13)) {
        $NZDW = $responseData13['balanceNZDW'];
    }
    if (isset($responseData14)) {
        $JPYW = $responseData14['balanceJPYW'];
    }
    if (isset($responseData15)) {
        $SEKW = $responseData15['balanceSEKW'];
    }
    if (isset($responseData16)) {
        $AUDW = $responseData16['balanceAUDW'];
    } ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BTG wallet">
    <meta name="author" content="Bitcoin cash Foundation">
    <meta name="keyword" content="BTG Wallet, bitcoin cash, bitcoin, wallet, bcc, bch, btc bch">
    <link rel="icon" href="img/favicon.png" type="image/x-icon" />
    <title>BITWIRE </title>
    <!-- Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link href="css/simple-line-icons.css" rel="stylesheet">
    <!-- MDL LIB -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

     <script type="text/javascript">
        url_api='<?php echo URL_API; ?>';
    </script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <!-- Main styles for this application -->

    <link href="css/style.css" rel="stylesheet">
    <link href="./assets/css" rel="stylesheet">

<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "97vw";
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("closeWallet").style.display = "block";
    $("#closeWallet").removeClass('hide');
    document.getElementById("openWallet").style.display = "none";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";

    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("closeWallet").style.display = "none";
    document.getElementById("openWallet").style.display = "block";
    document.body.style.backgroundColor = "white";
}
function openMarketNav() {
    document.getElementById("marketSidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeMarketNav() {
    document.getElementById("marketSidenav").style.width = "0";
    document.body.style.backgroundColor = "white";
}
</script>
</head>


<body >
    <header class="app-header navbar hidden-xs hidden-sm">
        <a class="navbar-brand" href="indexnew.php"></a>
        <ul class="nav navbar-nav ml-auto">
        <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="kyc_verification.php">Verification</a>
              </li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="index.php?curr=<?php echo base64_encode('inrw');?>"> Funds</a>
              </li>


              <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="contactnew.php">Support</a>
              </li>
                          <?php
} ?>
              <li class="nav-item dropdown d-md-down-none">
                  <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user-circle" style="font-size: 20px;"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href=""><i class="fa fa-user icon-clr" aria-hidden="true"></i> <?php echo $user_email; ?></a>
                  <a class="dropdown-item" href="setting.php"><i class="fa fa-lock" aria-hidden="true"></i> Setting</a>
                  <a class="dropdown-item" href="kyc_verification.php"><i class="fa fa-lock" aria-hidden="true"></i> Verification</a>
                  <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                  </div>
              </li>

        </ul>
    </header>
   <div class="col-md-2 hidden-xs hidden-sm" >
      <div class="collapse navbar-collapse padding-right-none" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav wallet-currencies-nav">
            <li class="nav-item wallet-curr <?php if ($INRW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('inrw');?>">INRW <p class="pull-right font-15 chk-bal-color"><?php echo $INRW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($USDW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('usdw');?>">USDW <p class="pull-right font-15 chk-bal-color"><?php echo $USDW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($EURW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('eurw');?>">EURW<p class="pull-right font-15 chk-bal-color"><?php echo $EURW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($GBPW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('gbpw');?>">GBPW<p class="pull-right font-15 chk-bal-color"><?php echo $GBPW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($BRLW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('brlw');?>">BRLW<p class="pull-right font-15 chk-bal-color"><?php echo $BRLW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($PLNW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('plnw');?>">PLNW<p class="pull-right font-15 chk-bal-color"><?php echo $PLNW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($CADW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('cadw');?>">CADW<p class="pull-right font-15 chk-bal-color"><?php echo $CADW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($TRYW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('tryw');?>">TRYW<p class="pull-right font-15 chk-bal-color"><?php echo $TRYW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($RUBW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('rubw');?>">RUBW<p class="pull-right font-15 chk-bal-color"><?php echo $RUBW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($MXNW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('mxnw');?>">MXNW<p class="pull-right font-15 chk-bal-color"><?php echo $MXNW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($CZKW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('czkw');?>">CZKW<p class="pull-right font-15 chk-bal-color"><?php echo $CZKW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($ILSW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('ilsw');?>">ILSW<p class="pull-right font-15 chk-bal-color"><?php echo $ILSW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($NZDW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('nzdw');?>">NZDW<p class="pull-right font-15 chk-bal-color"><?php echo $NZDW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($JPYW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('jpyw');?>">JPYW<p class="pull-right font-15 chk-bal-color"><?php echo $JPYW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($SEKW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('sekw');?>">SEKW<p class="pull-right font-15 chk-bal-color"><?php echo $SEKW; ?> </p></a>
              </div>

            </li>
            <li class="nav-item wallet-curr <?php if ($AUDW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
              <div class="h5" >
              <a href="wallet_new.php?curr=<?php echo base64_encode('audw');?>">AUDW<p class="pull-right font-15 chk-bal-color"><?php echo $AUDW; ?> </p></a>
              </div>

            </li>
        </ul>
      </div>
   </div>
   <div class="mobile-funds-nav padding-right-none hidden-md" id="mySidenav" >
     <ul class="navbar-nav navbar-sidenav " style="    height: 156vw;">
         <li class="nav-item wallet-curr-mobile <?php if ($INRW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('inrw');?>">INRW <p class="pull-right font-15 chk-bal-color"><?php echo $INRW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($USDW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('usdw');?>">USDW <p class="pull-right font-15 chk-bal-color"><?php echo $USDW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($EURW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('eurw');?>">EURW<p class="pull-right font-15 chk-bal-color"><?php echo $EURW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($GBPW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('gbpw');?>">GBPW<p class="pull-right font-15 chk-bal-color"><?php echo $GBPW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($BRLW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('brlw');?>">BRLW<p class="pull-right font-15 chk-bal-color"><?php echo $BRLW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($PLNW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('plnw');?>">PLNW<p class="pull-right font-15 chk-bal-color"><?php echo $PLNW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($CADW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('cadw');?>">CADW<p class="pull-right font-15 chk-bal-color"><?php echo $CADW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($TRYW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('tryw');?>">TRYW<p class="pull-right font-15 chk-bal-color"><?php echo $TRYW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($RUBW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('rubw');?>">RUBW<p class="pull-right font-15 chk-bal-color"><?php echo $RUBW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($MXNW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('mxnw');?>">MXNW<p class="pull-right font-15 chk-bal-color"><?php echo $MXNW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($CZKW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('czkw');?>">CZKW<p class="pull-right font-15 chk-bal-color"><?php echo $CZKW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($ILSW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('ilsw');?>">ILSW<p class="pull-right font-15 chk-bal-color"><?php echo $ILSW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($NZDW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('nzdw');?>">NZDW<p class="pull-right font-15 chk-bal-color"><?php echo $NZDW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($JPYW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('jpyw');?>">JPYW<p class="pull-right font-15 chk-bal-color"><?php echo $JPYW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($SEKW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('sekw');?>">SEKW<p class="pull-right font-15 chk-bal-color"><?php echo $SEKW; ?> </p></a>
           </div>

         </li>
         <li class="nav-item wallet-curr-mobile <?php if ($AUDW>0) {
        echo "chk-bal-color-dark";
    } else {
        echo "chk-bal-color-light";
    }?>">
           <div class="h5" >
           <a href="wallet_new.php?curr=<?php echo base64_encode('audw');?>">AUDW<p class="pull-right font-15 chk-bal-color"><?php echo $AUDW; ?> </p></a>
           </div>

         </li>
     </ul>
   </div>
<div class="app-header navbar navbar visible-xs visible-sm">
    <div class="dropdown pull-left">
      <button class="btn btn-default" id="openWallet" type="button" aria-haspopup="true" aria-expanded="true" onclick="openNav()">
        <i class="fa fa-database" aria-hidden="true"></i>
      </button>
      <button href="javascript:void(0)" id="closeWallet" class="closebtn hide btn btn-default" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <a class="navbar-brand" href="indexnew.php"></a>
    <div class="dropdown pull-right">
      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
        <i class="fa fa-bars " aria-hidden="true"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="kyc_verification.php"> KYC Verification</a>
              </li>
         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="index.php?curr=<?php echo base64_encode('inrw');?>"> FUNDS</a>
         </li>

         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="setting.php">SETTING</a>
         </li>

         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="contactnew.php">CONTACT US</a>
         </li>
         <li>
           <a class="nav-item nav-dropdown" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
         </li>

       <li class="nav-item dropdown d-md-down-none">
           <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-user-circle" style="font-size: 20px;"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
           <a class="dropdown-item" href=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_email; ?></a>
           <a class="dropdown-item" href="setting.php"><i class="fa fa-lock" aria-hidden="true"></i> Setting</a>
           <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

           </div>
       </li>
      </ul>
    </div>

  </div>

    </div>
  </div>
 <style type="text/css">
     .chk-bal-color-light{
        background:#081f1b;
        color: #fff !important;
        line-height: 1.5;
     }.chk-bal-color-dark{
        background:#145247;
     }
 </style>
  <main class="main">
  <link rel="stylesheet" type="text/css" href="css/header_new.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
});
</script>
