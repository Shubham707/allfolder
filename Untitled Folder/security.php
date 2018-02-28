<?php include 'header.php'; 
  include_once('hosting.php');
$security="active";

$password = "";
$confirmpassword = "";
$spendingpassword = "";
$confirmspendingpassword = "";
$currentpassword = "";
$currentspendingpassword = "";
$user_session = $_SESSION['user_session'];
$user_current_balance = 0;
$error = array();
$error2 = array();
$client = "";
if(_LIVE_)
{
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
if(isset($client))
{
$user_current_balance = $client->getBalance($user_session) - $fee;
}
}
if(isset($_POST['btnverify']))
{
$new_password = rand(0,99999999);
$otp_value = hash('sha256',addslashes(strip_tags($new_password)));
$sub =" Email Verification Mail";
$message_body =" Dear User \n";
$message_body .= " Your email verification OTP is $new_password \n\n";
$message_body .= " \n\n";
$message_body .= " Thanks \n";
$message_body .= " Administrator";
$qstring = "update users set `otp_value` ='".$otp_value."'"; 
$qstring .= " WHERE ";
//	$qstring .= " encrypt_username = '" . hash('sha256',$user_session) . "' and ";
$qstring .= " id = ".$_SESSION['user_id'];
//echo $new_password; 
$result2	= $mysqli->query($qstring);
//	$user2 = $result2->fetch_assoc();
sendpmail($user_session,$sub,$message_body);
header("Location:verifyemail.php?msg=OTP Send on your mail ID");
exit();
}
if(isset($_POST['btnlogin']))
{
//var_dump($_POST);
$currentpassword = $_POST['currentpassword'];
$password = $_POST['signuppassword'];
$confirmpassword = $_POST['confirmpassword'];
$spendingpassword = $_POST['spendingpassword'];
$confirmspendingpassword = $_POST['confirmspendingpassword'];
$currentspendingpassword = $_POST['currentspendingpassword'];
if (empty($currentpassword))
{
$error['currentpasswordError'] = "Please Provide your current login password";
}	
if(empty($password))
{
$error['passwordError'] = "Please Provide valid Password";
}
if(empty($confirmpassword))
{
$error['confirmpasswordError'] = "Please Provide valid Confirm Password";
}
else if($confirmpassword != $password)
{
$error['confirmpasswordError'] = "Password and Confirm Password Must be same";
}
$password_value = hash('sha256',addslashes(strip_tags($currentpassword)));
$qstring = "select coalesce(id,0) as id
from users WHERE encrypt_username = '".hash('sha256',$user_session)."' and `password` = '" . $password_value . "'";
//	echo $qstring;
//	die;
$result	= $mysqli->query($qstring);
$user = $result->fetch_assoc();
//	var_dump($user);
if ($user['id'] <= 0)
{
$error['currentpasswordError'] = "Your current Login password is not match with our store password. Please provide valid one.";
}
if(empty($error))
{	
$password_value = hash('sha256',addslashes(strip_tags($password)));
$qstring = "update `users`set "; 
$qstring .= "`password` = ";
$qstring .= "'".$password_value."'";
$qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user['id'];
//echo $qstring;
$result	= $mysqli->query($qstring);
if($result)
{
$error['currentpasswordError2'] = "Your  Login password has been successfully updated.";
$password = "";
$confirmpassword = "";
$currentpassword = "";
}
}
}

  if(isset($_POST['btnSpending']))
  {
     $spendingpassword = $_POST['spendingpassword'];
     $confirmspendingpassword = $_POST['confirmspendingpassword'];
     $currentspendingpassword = $_POST['currentspendingpassword'];

    if(empty($currentspendingpassword))
    {
      $error2['currentspendingpasswordError'] = "Please Provide your current Spending Password";
    }
    if(empty($spendingpassword))
    {
      $error2['spendingpasswordError'] = "Please Provide valid Spending Password";
    }
    if(empty($confirmspendingpassword))
    {
      $error2['confirmspendingpasswordError'] = "Please Provide valid Confirm Spending Password";
    }
    else if($confirmspendingpassword != $spendingpassword)
    {
      $error2['confirmpasswordError'] = "Spending Password and Confirm Password Spending Must be same";
    }
    
    $spendingpassword_value = hash('sha256',addslashes(strip_tags($currentspendingpassword)));
    $qstring = "select coalesce(id,0) as id
          from users where encrypt_username = '".hash('sha256',$user_session)."' and `transcation_password` = '" . $spendingpassword_value . "'";
    
    $result2 = $mysqli->query($qstring);
    $user2 = $result2->fetch_assoc();
    //var_dump($user);
    if ($user2['id'] <= 0)
    {
      $error2['currentspendingpasswordError'] = "Your current spending password is not match with our store password. Please provide valid one.";
    }
    
    if(empty($error2))
    { 
      $spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));

      $qstring = "update `users`set "; 
      $qstring .= "`transcation_password` = ";
      $qstring .= "'".$spendingpassword_value."' ";
      $qstring .= " where encrypt_username = '".hash('sha256',$user_session)."' and id = ".$user2['id'];
      $result3 = $mysqli->query($qstring);
      if($result3)
      {
        $error2['currentspendingpasswordError2'] = "Your  Spending Password has been successfully updated.";
        $spendingpassword = "";
        $confirmspendingpassword = "";
        $currentspendingpassword = "";
      }
    }
  }
?>
<?php include 'sidebar.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<!-- All Sent Received Transferred -->
<form name="pass_frm" role="form"  action="security.php" method="post" onsubmit="return password_valid(this);">
  <div class="row" style="margin-bottom: 30px;     margin-top: -10px;">
    <center>Security Center
    </center>
    <center>Please update your password regularly
          <?php                 
          if($_SESSION['is_email_verify'] == 1){                 echo "<span class=\"text-success\">" ;                }                 
          else {                  
            echo "<span class=\"text-danger\">" ;                  }                      ?>
          <br>                     
          <?php                      
          if($_SESSION['is_email_verify'] == 0){  
               echo "<button id=\"btnverify\" name=\"btnverify\"  class=\"btn btn-danger\" type=\"submit\">  Not Verified? </button>";
          }
          else {                  echo "<span>Verified" ;                 
           } ?>
          </center>
      </div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Password
            </div>
            <div class="panel-body">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Old Password" id="currentpassword" name="currentpassword" type="password" autofocus="">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="New Password" id="signuppassword" name="signuppassword" type="password">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" type="password">
                </div>
                <!--<span style="text-align:center;" id='message'></span><br>-->
                <div class="form-group">
                  <div style="color:red">
                    <?php if(isset($error['currentpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['currentpasswordError']."</span>";  }?>	
                  </div>
                  <div style="color:green">
                    <?php if(isset($error['currentpasswordError2'])) { echo "<br/><span class=\"messageClass2\">".$error['currentpasswordError2']."</span>";  }?>	
                  </div>
                  <div style="color:red">
                    <?php if(isset($error['passwordError'])) { echo "<br/><span class=\"messageClass\">".$error['passwordError']."</span>";  }?>
                  </div>	
                  <div style="color:red">
                    <?php if(isset($error['confirmpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['confirmpasswordError']."</span>";  }?>
                  </div>
                </div>
                <div style="text-align:center;">
                  <input type="submit" class="btn btn-primary" id="btnlogin" name="btnlogin" value="Submit">
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Spending Password
            </div>
            <div class="panel-body">
              <fieldset>
		<div style="color:green;"><?php echo @$_REQUEST['mail'];?></div>
                <div class="form-group">
                  <input class="form-control" placeholder="Old Spending Password" id="currentspendingpassword" name="currentspendingpassword" type="password" autofocus="" >
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="New Spending Password" id="spendingpassword" name="spendingpassword" type="password" >
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Confirm Spending Password" id="confirmspendingpassword" name="confirmspendingpassword" type="password" >
                </div>
                <!--<span style="text-align:center;" id='message1'></span><br>-->
                <div class="form-group">
                  <div style="color:red">
                    <?php if(isset($error2['currentspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error2['currentspendingpasswordError']."</span>";  }?>
                  </div>	
                  <div style="color:green">
                    <?php if(isset($error2['currentspendingpasswordError2'])) { echo "<br/><span class=\"messageClass2\">".$error2['currentspendingpasswordError2']."</span>";  }?>	
                  </div>
                  <div style="color:red">	
                    <?php if(isset($error2['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error2['spendingpasswordError']."</span>";  }?>
                  </div>	
                  <div style="color:red">
                    <?php if(isset($error2['confirmspendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error2['confirmspendingpasswordError']."</span>";  }?>
                  </div>
                </div>
                <div style="text-align:center;">
                  <input type="submit" class="btn btn-primary" id="btnSpending" name="btnSpending" value="Submit">
		  <a style="text-align:right;" href="lib/sendspending.php" class="btn btn-primary">Forget Spending Password</a>
                </div>
		
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
  <script>
    $('#signuppassword, #confirmpassword').on('keyup', function () {
      if ($('#signuppassword').val() == $('#confirmpassword').val()) {
        $('#message').html('Matching').css('color', 'green');
      }
      else 
        $('#message').html('Password Not Matching').css('color', 'red');
    }
                                             );
    $('#spendingpassword, #confirmspendingpassword').on('keyup', function () {
      if ($('#spendingpassword').val() == $('#confirmspendingpassword').val()) {
        $('#message1').html('Matching').css('color', 'green');
      }
      else 
        $('#message1').html('Spending Password Not Matching').css('color', 'red');
    }
                                                       );
    /*function password_valid(pass_frm)
{
	if(pass_frm.signuppassword.value != pass_frm.signuppassword.value)
	{ 
		alert('Password And Confirm Password Is Wrong');
		pass_frm.signuppassword.focus();
		return false;
	}
return true;
}
function passwordspen_valid(frm_obj)
{
	if(frm_obj.currentspendingpassword.value != frm_obj.confirmspendingpassword.value)
	{ 
		alert('Spending Password And Confirm Spending Password Is Wrong');
		frm_obj.confirmspendingpassword.focus();
		return false;
	}
return true;
}*/
  </script>
  <?php include 'footer.php'; ?>
