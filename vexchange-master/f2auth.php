<?php include 'include/allheader.php';?>  
<?php include 'include/left_side_menu.php';?>
<?php 
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
 }
 $user_session = $_SESSION['user_session'];
 $url_api = URL_API;

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
        session_start();  
        session_destroy();

        header("Location:login.php");
    } else {
        $failcode = "Failed Code Incorrect";
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
        unset($secret);
        header("location:f2auth.php");
    }
}
?>
<div class="content">

	<link href="css/usercenter.css" rel="stylesheet" type="text/css">


<?php if($tfacode==false) { ?>
	<div class="main_content  acc-m-con">
       
	
			<div class='right_mcontent  myacc-con'>
	 
			<div class="m_title"><h4>Two-factor Authentication</h4></div>
			<div class="sectioncont">
				<p>You can enable Google Time based One Time Password (TOTP) Two-factor Authentication to further protect your account.  When it's enable, you are required to input the TOTP every time you login or withdraw funds. If you have an iOS or Android smartphone, you can do the following steps to enable it. In case you don't have a smartphone available, you can use the Google Authenticator on Windows as instructed in the later part, but it's less secure. </p>
				
				<h3><b>1st step</b>: Install Google Authenticator on your smartphone.</h3>
				 
				
				<br/>
				<h3><b>2nd step</b>: Setup "Google Authenticator" and scan the following barcode</h3>
				<lu>
				<li><img src="<?php echo $qrCodeUrl; ?>" alt="QR code" style="width: 200px; height: 200px"/>
				</li>
				<li>Also you can choose "Enter provided key" and input this key: <b><?php echo $secret;?></b></li>
				</lu>
				
				<br/>
				<h3><b>3rd step</b>: Input the TOTP showing on your smartphone: </h3>


				<form enctype="application/x-www-form-urlencoded" method="post" action="">
					 
				<table>
				<tr> 					
					<td align="right">TOTP: </td><td><input type="text" name="code" id="totp" size="20"> 6 digits code on your smartphone</td>
				</tr>				

				<td>&nbsp;</td>
				<td> <input type="submit" name="enable" id="submit" value="  Enable Two-factor Authentication  " class="sub-btn"></td>
				</tr>
                    <p style="color:red;font-size:20px;text-align:center"> 
                    <?php if (isset($failcode)) {
                    echo $failcode;
                    }?> </p>
				</table>
			
				</form> 


				<br>
				<p>Notice: <b>Do NOT delete the "Google Authenticator" app on your smartphone when it's enabled. </b>If you lost your phone or deleted the "Google Authenticator", please contact us at Email: support@bitwire </p>
				<p>Notice: If the code on your smartphone doesn't work, please choose "Settings->Time correction for codes->Sync now" to synchronize your phone time. Current server time is <b>2017-12-14 19:04:32 UTC+8</b></p>

				
				
				</div>
			</div>

			<br>

	</div> <!-- right_mcontent -->
  </div> <!-- main content -->

 
</div>
<?php }else{?>
<div class="main_content  acc-m-con">
       
    
            <div class='right_mcontent  myacc-con'>
            <div class="sectioncont">
<form enctype="application/x-www-form-urlencoded" method="post" action="">
                     
                <table>
        <!-- <tr>                    
        <td align="right">TOTP: </td><td><input type="text" name="code" id="totp" size="20"> 6 digits code on your smartphone</td>
        </tr> -->
        <br/>
        <tr>               
        <td>&nbsp;</td>
        <td> <input type="submit" name="disable" id="submit" value="  Disable Two-factor Authentication  " class="sub-btn"></td>
        </tr>
        </table>
        </form>
        </div>
        </div>
        </div>


<?php }

?>
 

<?php include 'include/footer.php';?>  




</body>
</html>


