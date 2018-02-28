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
$secret = $_SESSION['key'];

require_once 'googleLib/GoogleAuthenticator.php';

$ga = new GoogleAuthenticator();

$qrCodeUrl = $ga->getQRCodeGoogleUrl($user_session, $secret);

if (isset($_POST['code'])) {
    $code=$_POST['code'];
    $secret = $_SESSION['key'];


    $checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

    if ($checkResult) {
        $_SESSION['key']=$code;
        header("Location:index.php");
    } else {
        $failcode = "Failed Code Incorrect";
    }
}
ob_end_flush();

?>
<!DOCTYPE html>
<html>

<body>
	<div id="container">

		<div class="text-center" id='device'>

<p>Enter the verification code generated by Google Authenticator app on your phone.</p>


<form method="post" >
	<br><br><br>
<label>Enter Google Authenticator Code</label><br><br><br>
<input type="text" name="code" /><br><br><br>
<input type="submit" class="btn btn-info button" style="background-color:#1b2530"/><br>
</form>
<p class="text-center" style="color:red;"> <?php if (isset($failcode)) {
    echo $failcode;
}?> </p>
</div>
</div>
</body>
</html>
