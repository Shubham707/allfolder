<?php
error_reporting(1);
ob_start();
session_start();
include 'header.php';
page_protect();
if (!isset($_SESSION['user_id'])) {
    header("location:logout.php");
    exit;
}
$user_session = $_SESSION['user_session'];
$tfacode = $_SESSION['tfa'];
require_once 'googleLib/GoogleAuthenticator.php';

$ga = new GoogleAuthenticator();
$secret = $_SESSION['key'];
$qrCodeUrl = $ga->getQRCodeGoogleUrl($user_session, $secret);

if (isset($_POST['code'])) {
    $code=$_POST['code'];
    $secret = $_SESSION['key'];
    $checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

    if ($checkResult) {
        $_SESSION['key']=$code;

        header("Location:loginnew.php");
    } else {
        $failcode = "Failed Code Incorrect";
    }
}

    //...... Update Current Password......//

if (isset($_POST['btnlogin'])) {
    $currentpassword = $_POST['currentpassword'];
    $password = $_POST['signuppassword'];
    $confirmpassword = $_POST['confirmpassword'];

    $postData = array(
    "userMailId"=>$user_session ,
    "currentPassword"=>$currentpassword,
    "newPassword"=>$password,
    "confirmNewPassword"=>$confirmpassword
    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/user/updateCurrentPassword', true, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);

    if ($responseData['statusCode']==200) {
        $message = $responseData['message'];
    } else {
        $fail = $responseData['message'];
    }
}

//...... Update Current Spending Password......//
if (isset($_POST['btnSpending'])) {
    $currentpassword = $_POST['currentspendingpassword'];
    $password = $_POST['spendingpassword'];
    $confirmpassword = $_POST['confirmspendingpassword'];

    $postData = array(
    "userMailId"=>$user_session,
    "currentSpendingPassword"=>$currentpassword,
    "newSpendingPassword"=>$password,
    "confirmNewPassword"=>$confirmpassword
    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/user/updateCurrentSpendingPassword', true, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);

    if ($responseData['statusCode']==200) {
        $message1 = $responseData['message'];
    } else {
        $fail1 = $responseData['message'];
    }
}

//...... Email.Verify......//

if (isset($_POST['btnverify'])) {
    $postData = array(
    "userMailId"=>$user_session

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/user/sentOtpToEmailVerificatation', true, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);

    if ($responseData['statusCode']==200) {
        $message2 = $responseData['message'];
        header("location:verifyemail.php?m=".$message2);
    } else {
        $fail2 = $responseData['message'];
    }
}
if (isset($_POST['enable'])) {
    $postData = array(
    "userMailId"=>$user_session,

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/user/enableTFA', true, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);
}
if (isset($_POST['disable'])) {
    $postData = array(
    "userMailId"=>$user_session

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/user/disableTFA', true, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);

    if ($responseData['statusCode']==200) {
        $_SESSION['tfa'] = $responseData['user']['tfastatus'];
        header("location:setting.php");
    }
}
ob_end_flush();

?>

<style type="text/css">
.gDisCode {
  width: 20% !important;
  padding: 5px 20px;
  margin: 0px 0px;
  display: inline-block;
  box-sizing: border-box;
}
  input[type=text], input[type=password] {
    width: 70%;
    padding: 5px 20px;
    margin: 0px 0px;
    display: inline-block;
    border: 1px solid rgb(135, 168, 255);
    box-sizing: border-box;
}

hr {
  border:none;
  height: 182px;
border-left: solid 1px #666666;}
.btn-info {
    width: 327px;
    height: 42px;
}
li.nav-item {
    font-size: 17px;
}
 .spanunderline {
    border-bottom: 3px solid #13336c !important;
    width: 59px;
    padding-top: 10px;
p{
    font-size: 17px;
    line-height: 27px;
    color: #1b2530 !important;
}

}
p{ color:black;}
</style>
  <div class="container" style="margin-top: 50px;;">
    <ul class="nav nav-tabs nav-justified " id="myTab">
      <li class="nav-item "><a href="#home">E-mail Verification</a></li>
      <li class="nav-item active"><a href="#password">Password</a></li>
      <li class="nav-item"><a href="#verifications">Two Factor Authentication</a></li>
      <!--  <li class="nav-item"><a href="#notifications">Notifications</a></li> -->
    </ul>

    <div class="tab-content" >
      <div class="tab-pane" id="home">
           <div class="text-center"><h3><span class="spanunderline"> E-mail Verification</span></h3></div>
                <form action="#" method="post" class="text-center form">
                      <div class="card-body bg-white text-center text-success" style="margin: 1rem;">
            <span>
              <?php
              if ($_SESSION['is_email_verify']== 1) {
                  echo "<span class=\"text-success\"><i class=\"fa fa-check-circle fa-5x\"></i>" ;
              } else {
                  echo "<span class=\"text-danger\"><i class=\"fa fa-warning fa-5x\"></i>" ;
              }
              ?><br>
              <?php
              if ($_SESSION['is_email_verify']== 0) {
                  echo "<button id=\"btnverify\" name=\"btnverify\" class=\"btn btn-danger\" type=\"submit\" >
                Not Verified?
              </button>";
              } else {
                  echo "<span>Verified" ;
              }


            ?>
            </span>
            <p style="color:red;"> <?php if (isset($fail2)) {
                  echo $fail2;
              }?> </p>
            </div>
        </form>
      </div>
      <div class="tab-pane active" id="password" style=" margin-bottom: 99px !important">
        <div class="row">
          <div class="col-md-6">
            <div class="text-center"><h3><span class="spanunderline"> ACCOUNT PASSWORD</span></h3></div>

            <p style="color:green;"> <?php if (isset($message)) {
                  echo $message;
              }?> </p>
            <p style="color:red;"> <?php if (isset($fail)) {
                  echo $fail;
              }?> </p>

            <form action="#" method="post" class="text-center">
             <input type="password" id="currentpassword" name="currentpassword" value="" placeholder="Current Password"><br><br>
             <input type="password" id="signuppassword" name="signuppassword" value="" placeholder="New Password"><br><br>
             <input type="password" id="confirmpassword" name="confirmpassword" value="" placeholder="Confirm Password"><br><br>
             <input class="btn btn-info" type="submit" id="btnlogin" name="btnlogin"  value="SUBMIT">
           </form>

         </div>


         <div class=col-md-6>
          <div class="text-center"><h3><span class="spanunderline"> WALLET PASSWORD</span></h3></div>

          <p style="color:green;"> <?php if (isset($message1)) {
                  echo $message1;
              }?> </p>
          <p style="color:red;"> <?php if (isset($fail1)) {
                  echo $fail1;
              }?> </p>

          <form action="#" method="post" class="text-center">
           <input type="password" id="currentspendingpassword" name="currentspendingpassword"value="" placeholder="Current Password"><br><br>
           <input type="password" id="spendingpassword" name="spendingpassword" value="" placeholder="New Password"><br><br>
           <input type="password" id="confirmspendingpassword" name="confirmspendingpassword" value="" placeholder="Confirm Password"><br><br>
           <input class="btn btn-info" type="submit" id="btnSpending" name="btnSpending" value="SUBMIT">
         </form>

           </div>
         </div>
      </div>
       <div class="tab-pane" id="verifications">


          <?php

          if ($tfacode==false) {
              echo '
            <div class="text-center"><h3><u> TWO FACTOR AUTHENTICATION</u> <button class="btn-danger" type="button" disabled>Disabled</button></h3></div>
            <div class="text-center" id="device">

              <p><span style="color: red">*Please back up your secret key.</span> Resetting your two factor authentication requires open a<br> support ticket and make up to 7 days to address</p>

              <p>Enter the verification code generated by Google Authenticator app on your phone.</p>
              <div id="img">;
                <img src="' . $qrCodeUrl .'"/>
              </div><br>
              <lable class="marginTop50" style="color:black">Secret Key</lable>
              <input type="email" name="" style="color:black" value="'. $secret.'" placeholder="" disabled="disabled"><br><br>
              <form method="post" action="">
                <label>Enter Google Authenticator Code</label><br>
                <input type="text" class="gDisCode" name="code" /><br>
                <input class="btn btn-info marginTop50 " type="submit"  value="Enable" name="enable"/>
              </form>

            </div>';
          } else {
              echo '
            <div class="text-center"><h3><u> TWO FACTOR AUTHENTICATION</u> <button class="btn-success" type="button" disabled>Enabled</button></h3></div>

            <form method="post"><input class="btn btn-info marginTop50" type="submit" name="disable" value="Disable" /></form>';
          }

          ?>
           <p class="text-center" style="color:red;"> 
           <?php if (isset($failcode)) {
              echo $failcode;
          }?> </p>
        </div>
    </div>
  </div>

 <?php
 include 'footerz.php';
 ?>
