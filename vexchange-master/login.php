<?php
include 'include/allheader.php';
?>
<!-- ............ SIGN UP ........-->
<?php
error_reporting(1);
 $url_api=URL_API;
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

		// if ($response === false) {
		// 	die('Error');
		// }


		$responseData = json_decode($response, true);



		if (isset($responseData['userMailId'])) {
			$messagesignup = $responseData['message'];

		} else {
			$error = $responseData['message'];
		}
	} else {
		$errorpassword = "Enter valid password";
	}
}
?>


<!-- ....... LOGIN CODE...... -->
<?php
error_reporting(1);
session_start();



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

        $_SESSION['INRWAddress'] = $responseData['user']['isINRAddress'];
        $_SESSION['userinraddress'] = $responseData['user']['userINRAddress'];

        $_SESSION['USDWAddress'] = $responseData['user']['isUSDAddress'];
        $_SESSION['userusdaddress'] = $responseData['user']['userUSDAddress'];

        $_SESSION['EURWAddress'] = $responseData['user']['isEURAddress'];
        $_SESSION['usereuraddress'] = $responseData['user']['userEURAddress'];

        $_SESSION['GBPWAddress'] = $responseData['user']['isGBPAddress'];
        $_SESSION['usergbpaddress'] = $responseData['user']['userGBPAddress'];

        $_SESSION['BRLWAddress'] = $responseData['user']['isBRLAddress'];
        $_SESSION['userbrladdress'] = $responseData['user']['userBRLAddress'];

        $_SESSION['PLNWAddress'] = $responseData['user']['isPLNAddress'];
        $_SESSION['userplnaddress'] = $responseData['user']['userPLNAddress'];

        $_SESSION['CADWAddress'] = $responseData['user']['isCADAddress'];
        $_SESSION['usercadaddress'] = $responseData['user']['userCADAddress'];

        $_SESSION['TRYWAddress'] = $responseData['user']['isTRYAddress'];
        $_SESSION['usertryaddress'] = $responseData['user']['userTRYAddress'];

        $_SESSION['RUBWAddress'] = $responseData['user']['isRUBAddress'];
        $_SESSION['userrubaddress'] = $responseData['user']['userRUBAddress'];

        $_SESSION['MXNWAddress'] = $responseData['user']['isMXNAddress'];
        $_SESSION['usermxnaddress'] = $responseData['user']['usermxnAddress'];

        $_SESSION['CZKWAddress'] = $responseData['user']['isCZKAddress'];
        $_SESSION['userczkaddress'] = $responseData['user']['userCZKAddress'];

        $_SESSION['ILSWAddress'] = $responseData['user']['isILSAddress'];
        $_SESSION['userilsaddress'] = $responseData['user']['userILSAddress'];

        $_SESSION['NZDWAddress'] = $responseData['user']['isNZDAddress'];
        $_SESSION['usernzdaddress'] = $responseData['user']['userNZDAddress'];

        $_SESSION['JPYWAddress'] = $responseData['user']['isJPYAddress'];
        $_SESSION['userjpyaddress'] = $responseData['user']['userJPYAddress'];

        $_SESSION['SEKWAddress'] = $responseData['user']['isSEKAddress'];
        $_SESSION['usersekaddress'] = $responseData['user']['userSEKAddress'];

        $_SESSION['AUDWAddress'] = $responseData['user']['isAUDAddress'];
        $_SESSION['useraudaddress'] = $responseData['user']['userAUDAddress'];

        $_SESSION['tfa'] = $responseData['user']['tfastatus'];
        $_SESSION['key'] = $responseData['user']['googlesecreatekey'];


        $_SESSION['token'] = $responseData['token'];
    } else {
        unset($success);
        $messagelogin = $responseData['message'];
    }


    if ($responseData['statusCode'] != 401 && $responseData['user']['tfastatus']==true) {
        header("location:device_confirmations.php");
    } elseif (isset($responseData['user'])) {
        header("location:myaccount.php");
    }

}

?>
<style>
	*:before, *:after,.form-control{-webkit-box-sizing: border-box;  -moz-box-sizing: border-box;  box-sizing: border-box;}
	.glyphicon-ok:before {  content: "\221A";  }
	.leftregi form, .rightlogin form{ width:100%;text-align: left}
	.rightlogin{ align-items: center;}
	label{ float: left;  width: 30%;font-weight: bold;text-align: right;  padding: 15px 15px 0 0;-webkit-box-sizing: border-box;  -moz-box-sizing: border-box;  box-sizing: border-box;}
	.btn-block.sub-btn{width: 40%; margin: 10px auto}
	.btn-block.sub-btn:focus{ background: #f60 !important;}
	p.red{ margin: 20px 0;text-align: center}
	.form-group .red,p.red{ font-size: 13px}
	.r-tip{ font-size: 13px;  font-weight: normal;  vertical-align: middle;  height: 48px;  display: table-cell;  padding-left: 5px;}
	.code-box{ position: relative;  width: 70%;  float: left;}
	.code-box .help-block{ margin-left: 0;padding-top: 5px;}
	#code,#codeReg{ position: absolute;left: 160px; top: -5px;}
	.checkbox{clear: both;  margin-left: 30%;}
	.checkbox a{ margin-top: 15px}
	#agrCheckLabel{ width: auto;user-select: none;}
	.m_title h4{ text-align: center; font-weight: normal; font-size: 24px}
	.auto-tip{ background:#fff;color: #2c3e50;border:2px solid #dce4ec; border-top:none;border-radius: 4px;z-index:10000; text-align:left}
	.auto-tip li { width: 100%; height: 28px; line-height: 28px;padding: 0 15px; font-size: 14px; }
	.auto-tip li.hoverBg { background: #ecf0f1; cursor: pointer; }
	.auto-tip em{ font-style:normal}
	#signupForm .auto-tip{top:71px !important}

	.completer-container,.pla { position: absolute; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; padding: 0; margin: 0; font-family: inherit; font-size: 14px; line-height: normal; list-style: none; background-color: #fff;border: 1px solid #eee;border-radius: 3px; }
	.completer-container li,.pla li { padding: .5em .8em; margin: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; cursor: pointer; background-color: #fff; border-bottom: 1px solid #eee; }
	.completer-container .completer-selected, .completer-container li:hover,.pla .completer-selected{ margin-left: -1px; background-color: #eee; border-left: 1px solid #ff5e23; }

	.has-feedback{ position: relative; clear: both }
	.has-feedback .form-control { float: left;  width: 40%;padding-right: 42.5px; font-size: 15px;margin-bottom: 0; }
	.form-control-feedback { position: absolute; top: 0; right: 30%; z-index: 2; display: block; width: 34px; height: 34px; line-height: 34px; text-align: center; pointer-events: none }
	.has-success .help-block, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline, .has-success.radio label, .has-success.checkbox label, .has-success.radio-inline label, .has-success.checkbox-inline label { color: #3c763d }
	.has-success .form-control { border-color: #3c763d; }
	.has-success .form-control:focus { border-color: #2b542c; }
	.has-success .input-group-addon { color: #3c763d; border-color: #3c763d; background-color: #dff0d8 }
	.has-success .form-control-feedback { color: #0da77d;  font-size: 18px;  font-weight: bold; }
	.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label { color: #a94442 }
	.has-error .form-control { border-color: #a94442; }
	.has-error .form-control:focus { border-color: #843534; }
	.has-error .input-group-addon { color: #a94442; border-color: #a94442; background-color: #f2dede }
	.has-error .form-control-feedback { color: #a94442 }
	.has-feedback label~.form-control-feedback { top: 8px }
	.has-feedback label.sr-only~.form-control-feedback { top: 0 }
	.help-block { display: block;clear: both;  width: 40%;  margin-left: 30%; margin-top: 5px; margin-bottom: 10px; color: #737373 }
	.has-feedback .form-control.code-input{ width: 152px}
	#codeGroup .form-control-feedback{ left: 114px; top:8px}
	.spinner { display:none;margin: 0 auto; width:50px; text-align: center; }
	.spinner > div { width: 10px; height: 10px; background-color:#ffad69; border-radius: 100%; display: inline-block; -webkit-animation: bouncedelay 1.4s infinite ease-in-out; animation: bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode: both; animation-fill-mode: both; }
	.spinner .bounce1 { -webkit-animation-delay: -0.32s; animation-delay: -0.32s; }
	.spinner .bounce2 { -webkit-animation-delay: -0.16s; animation-delay: -0.16s; }
	@-webkit-keyframes bouncedelay {  0%, 80%, 100% {-webkit-transform: scale(0.0)} 40% {-webkit-transform: scale(1.0)}}
	@keyframes bouncedelay {  0%, 80%, 100% { transform: scale(0.0); -webkit-transform: scale(0.0);} 40% { transform: scale(1.0); -webkit-transform: scale(1.0);}}

	.form-control-feedback{ margin-right:0; display:none}
	.has-success .form-control-feedback{ display:block}
	.has-feedback #captcha_code {padding-right: 40px;}
	#loginSub:focus{background-color: #18bc9c;border-color: #18bc9c;}
	legend{ text-align:center; color:#fff}
	#agreeCheck{ margin-top:2px}
	.password-level { clear: both; width: 40%; margin: 0 auto; }
	.password-level .col-md-11 { padding-left: 0 }
	.password-level .col-md-4 { width:33.33%;float:left; }
	.password-level span { display: block; width: 100%;height: 3px;text-align: center;line-height: 0;font-size: 14px;font-weight:bold}
	#signPswLevel.password-level span,#fundPswLevel.password-level span { height:16px; line-height:16px;font-size:12px; font-weight:bold}
	.discount{ color:#ff5e23;margin: 10px 0 18px;font-weight: bold;}
	#signupSub{ margin:0 auto}
	.input-item-info{ width: 30%; font-size: 13px;  float: left}
	.code-box .form-control-feedback{ right: auto;left: 114px; top: 8px;}
</style>
<script src="js/autoemail.js"></script>

<div class="left_con_login">
	<div class="login_incontent login-con">

		<div class="right_mcontent clearfix">

			<div class="maichu">
				<div class="m_title"><h4>Login</h4></div>
				<p style="color:red;font-size:20px;text-align:center"> <?php if (isset($messagelogin)) {
							    echo $messagelogin;
							}?> </p>
				<div class="m_con rightlogin">

					<form role="form" id="loginForm"  name="login" method="post" action="">

						<div class="form-group parentCls has-feedback" id="emailGroup">
							<label for="email">Username or Email</label>
							<div class="automail-list"></div>
							<input type="email" class="form-control inputElem" name="email" id="email" value="" onkeyup="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'')" onafterpaste="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'')">

						</div>

						<div class="form-group has-feedback" id="pswGroup">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="emailpassword" id="password">
							<div class="input-item-info">
                <a href="resetpw.html" style="line-height: 48px;margin-left: 5px;">Forgot password?</a></div>

						</div>


						<button type="submit" name="btnlogin" class="btn btn-error btn-block sub-btn" id="loginSub"><span>Log in</span>
							<div class="spinner">
								<div class="bounce1"></div>
								<div class="bounce2"></div>
								<div class="bounce3"></div>
							</div>
						</button>
						<p class="red"><i id="dpIcon">!</i>Tip: Don't leak password to anyone. Officials never ask your password.</p>
						<span class="errmsg" id='errmsg'></span>
					</form>
				</div>
			</div>

			<div class="mairu">
				<div class="m_title"><h4>Sign up</h4></div>
				<p style="color:green;font-size:20px;text-align:center;"> <?php if (isset($messagesignup)) {
					echo $messagesignup;
				}?> </p>

				<p style="color:red;font-size:20px;text-align:center;"> <?php if (isset($error)) {
					echo $error;
				}?> </p>
				<p style="color:red;font-size:20px;text-align:center;"> <?php if (isset($errorpassword)) {
					echo $errorpassword;
				}?> </p>
				<div class="m_con_buy leftregi">
					<form role="form" id="signupForm" name="signup" method="post" action="login.php">
						<input type="hidden" name="ref_uid" id="ref_uid" value=""/>
						<input type="hidden" name="language" id="language" value="cn"/>


						<div>
							<div class="form-group parentCls has-feedback" id="signup_emailGroup">
								<label for="sig_email">E-mail</label>
								<input type="email" class="form-control" name="txtEmailID" id="sig_email" value="" autocomplete="off">

							</div>
						</div>
						<div>
							<div class="form-group has-feedback" id="signup_pswGroup">
								<label for="sig_password">Password</label>
								<input type="password"  name="signuppassword" class="form-control" id="sig_password" autocomplete="new-password">
								<div class="input-item-info"><span class="r-tip">(Passwords must be at least 6 characters, non-pure numbers)</span></div><span class="glyphicon glyphicon-ok form-control-feedback"></span>
								<div class="password-level hide clearfix" id="signPswLevel">
									<div class="col-md-4"><span id="loWeak">Too weak</span></div>
									<div class="col-md-4"><span id="loNormal">Good</span></div>
									<div class="col-md-4"><span id="loStrong">Excellent</span></div>
								</div>

							</div>
						</div>
						<div>
							<div class="form-group has-feedback" id="signup_pswGroup">
								<label for="sig_password">Confirm Password</label>
								<input type="password"  name="confirmpassword" class="form-control" id="sig_password" autocomplete="new-password">
								<div class="input-item-info"><span class="r-tip">(Passwords must be at least 6 characters, non-pure numbers)</span></div><span class="glyphicon glyphicon-ok form-control-feedback"></span>
								<div class="password-level hide clearfix" id="signPswLevel">
									<div class="col-md-4"><span id="loWeak">Too weak</span></div>
									<div class="col-md-4"><span id="loNormal">Good</span></div>
									<div class="col-md-4"><span id="loStrong">Excellent</span></div>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div>
							<div class="form-group has-feedback" id="fund_pswGroup">
								<label for="fund_password">Spending password</label>
								<input type="password"  name="spendingpassword" class="form-control" id="fund_password" autocomplete="new-password">
								<div class="input-item-info"><span class="r-tip">(Very important, Need to be different from the login password)</span></div><span class="glyphicon glyphicon-ok form-control-feedback"></span>
								<span class="help-block"></span>
							</div>
						</div>
						<div>
							<div class="form-group has-feedback" id="fund_pswGroup">
								<label for="fund_password">Confirm Spending password</label>
								<input type="password"  name="confirmspendingpassword" class="form-control" id="fund_password" autocomplete="new-password">
								<div class="input-item-info"><span class="r-tip">(Very important, Need to be different from the login password)</span></div><span class="glyphicon glyphicon-ok form-control-feedback"></span>
								<span class="help-block"></span>
							</div>
						</div>
						<button type="submit" name="btnsignup" class="btn btn-error btn-block sub-btn" id="signupSub"><span>Create account</span>
							<div class="spinner">
								<div class="bounce1"></div>
								<div class="bounce2"></div>
								<div class="bounce3"></div>
							</div>
						</button>
						<div class="login-tip">
							<p></p>
						</div>
					</form>
					<div style="clear:both"	></div>
				</div>
			</div>


		</div>
	</div>
</div>

<script>

	function boxLayout() {
		setTimeout(function () {
			var leftH=$(".leftregi").height();
			$(".rightlogin").css({"height":leftH, "display":"flex"});
		},100)
	} boxLayout();
	$(window).resize(function () { boxLayout() });
	function resetCode(){
		$("#captcha_code").val("");
		$("#codeGroup").removeClass("has-error").removeClass("has-success");
		$("#codeGroup").find(".help-block").text("");
	}
	function loadshow(targetDom){
		targetDom.find("span").hide();
		targetDom.find(".spinner").show();
	}
	function loadhide(targetDom){
		targetDom.find("span").show();
		targetDom.find(".spinner").hide();
	}
	function resetForm(formID){
		document.getElementById(formID).reset();
	}

	var mailAddr=["","@zoho.com", "@yahoo.com",  "@sina.com", "@gmail.com", "@hotmail.com", "@aliyun.com", "@sohu.com"],
	mailAddr1=["@zoho.com", "@yahoo.com", "@sina.com", "@gmail.com", "@hotmail.com", "@aliyun.com", "@sohu.com"];
	var mailTarget;

	function mailinput(mailTarget,mAddr){
		mailTarget.on('input propertychange', function() {
			mailTarget.completer({ separator:'', source: mAddr, zIndex:1051 });
		});
		mailTarget.on("keyup", function(e) {
			var theEvent = e || window.event;
			var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
			if (code == 13) {
				setTimeout(function(){
					mailTarget.parent().removeClass("has-error").addClass("has-success");
					mailTarget.parent().find(".help-block").text('');
				},100);
				mailTarget.parent().parent().next().find("input").focus()
			}
		});

		mailTarget.on("keydown", function(e) {
			var theEvent = e || window.event;
			var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
			if (code == 9) {
				$(".completer-container").hide();
			}
		});
	}

	function addErr(target) {
		$(target).addClass("has-error").removeClass("has-success");
	}
	function addSucc(target) {
		$(target).removeClass("has-error").addClass("has-success");
	}
	function printTip(target,tipText) {
		$(target).find(".help-block").text(tipText);
		boxLayout();
	}

	$(function(){

		var mailVal=$("#sig_email").val(),
		mail_test = /^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if( !mail_test.test(mailVal) ){
			$("#sig_email").val("")
		}

		$('#loginForm,#signupForm').find("input").focus(function(){
			$(this).next(".input-icon").addClass("focus-ico");
			$("#errmsg").text("");
			loadhide($("#loginSub"))
		}).blur(function(){
			$(this).next(".input-icon").removeClass("focus-ico");
		});
		function emailcheck(){
			var eVal=$("#email").val();
			if (eVal==''){
				addErr("#emailGroup");
				printTip("#emailGroup","Please enter your username or email!");
				loadhide($("#loginSub"))
			} else {
				addSucc("#emailGroup");
				printTip("#emailGroup","");
				loadhide($("#loginSub"));
				return true;
			}
		}
		function pswcheck(){
			var eVal=$("#password").val(),
			eVlength=eVal.length;

			if (eVlength==0) {
				addErr("#pswGroup");
				printTip("#pswGroup","Please enter your password!");
				loadhide($("#loginSub"));
				$("#loginPswLevel").addClass("hide");
			} else {
				if (eVlength > 0 && eVlength < 6) {
					addErr("#pswGroup");
					printTip("#pswGroup","Invalid password, please try again!");
				} else {
					addSucc("#pswGroup");
					printTip("#pswGroup","");
					return true;
				}
			}

		}
		function codecheck(){
			var eVal=$("#captcha_code").val(),vNum=eVal.length;
			if (eVal==''){
				var codeShow=$("#codeGroup").is(":visible");
				if(codeShow){
					addErr("#codeGroup");
					printTip("#codeGroup","Please enter the captcha code!");
				} else {
					$("#captcha_code").val("deflt")
				}
				loadhide($("#loginSub"))
			} else{
				if(vNum==5){
					addSucc("#codeGroup");
					printTip("#codeGroup","");
					return true;
				} else{
					addErr("#codeGroup");
					printTip("#codeGroup","Invalid captcha code, please try again!");
					loadhide($("#loginSub"))
				}

			}
		}

		$("#email").blur(emailcheck).focus(function(){
			if(!(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE8.0")){	}
		});

		$("#password").blur(pswcheck).focus(function(){
			var mailVal=$("#email").val();
			if(mailVal != ''){ emailcheck() }
		});

		$("#loginSub").click(function(){
			$(this).blur();
			loadshow($(this));
			if(emailcheck()){
				pswcheck();codecheck()
			}
			if(pswcheck() ){
				emailcheck();codecheck()
			}
			if(codecheck()){
				emailcheck();pswcheck()
			}
			if(pswcheck() && codecheck()){
				emailcheck()
			}
			if(emailcheck() && codecheck()){
				pswcheck()
			}
			if(emailcheck() && pswcheck()){
				codecheck()
			}
			if(emailcheck() && pswcheck() && codecheck()){

				$("#loginForm").submit()
			} else{
				emailcheck();pswcheck();codecheck();
			}
		});

		$("#password,#captcha_code").on('focus', function () {
			eDom=$(this),tDom=$("#loginSub");
			pressEnter(eDom,tDom);
		});
		$("#checkRem").on('click', function () {
			eDom=$(this),tDom=$("#loginSub");
			pressEnter(eDom,tDom);
		});


	});


	function pressEnter(eDom,tDom) {
		eDom.on('keyup', function(e) {
			var theEvent = e || window.event;
			var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
			if (code == 13) {
				tDom.click();
			}
		});
	}
	function passwordLevel(password) {
		var Modes = 0;
		for (i = 0; i < password.length; i++) {
			Modes |= CharMode(password.charCodeAt(i));
		}
		return bitTotal(Modes);
		function CharMode(iN) {
			if (iN >= 48 && iN <= 57)
			{
				return 1;
			}
			if (iN >= 65 && iN <= 90)
			{
				return 2;
			}
			if ((iN >= 97 && iN <= 122) || (iN >= 65 && iN <= 90))
			{
				return 4;
			}
			else {
				return 8;
			}
		}

		function bitTotal(num) {
			modes = 0;
			for (i = 0; i < 4; i++) {
				if (num & 1) modes++;
				num >>>= 1;
			}
			return modes;
		}
	}

	$("#sig_password").focus(function(){
		$("#signPswLevel").removeClass("hide")
	});
	$("#fund_password").focus(function(){
		$("#fundPswLevel").removeClass("hide")
	});


	function signUserNameCheck(){
		//return true;
		var nameVal=$("#sig_userName").val();
		if (nameVal==''){
			addErr("#signup_userNameGroup");
			printTip("#signup_userNameGroup","Please create a username!");
			loadhide($("#signupSub"));
		} else if(nameVal.length < 3 ) {
			addErr("#signup_userNameGroup");
			printTip("#signup_userNameGroup","Username is too short!");
			loadhide($("#loginSub"))
		} else if(nameVal.length > 24) {
			addErr("#signup_userNameGroup");
			printTip("#signup_userNameGroup","Username is too long, do not exceed 24 characters!");
			loadhide($("#loginSub"))
		} else{
			if(isNaN(nameVal)){
				addSucc("#signup_userNameGroup");
				printTip("#signup_userNameGroup","");
				loadhide($("#loginSub"));
				return true;
			} else {
				addErr("#signup_userNameGroup");
				printTip("#signup_userNameGroup","User name can not use pure numbers!");
				loadhide($("#loginSub"))
			}

		}
	}
	function signEmailCheck(){ //账邮箱验证
		//return true;
		var eVal=$("#sig_email").val();
		if (eVal==''){
			addErr("#signup_emailGroup");
			printTip("#signup_emailGroup","Please enter your email!");
			loadhide($("#signupSub"));
		} else{
			var reg_mail = /^([a-zA-Z0-9\._-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
			if( reg_mail.test(eVal) ){
				addSucc("#signup_emailGroup");
				printTip("#signup_emailGroup","");
				return true;
			} else{
				addErr("#signup_emailGroup");
				printTip("#signup_emailGroup","Invalid email, please try again!");
				loadhide($("#signupSub"))
			}
		}
	}
	//重置注册图片验证码
	function resetCode(){
		$("#captcha_reg").val("");
		$("#signup_codeGroup").removeClass("has-error").removeClass("has-success");
		printTip("#signup_codeGroup","");
	}
	function signPswCheck(){ //登录密码验证
		//return true;
		var sVal=$("#sig_password").val(),
		sVlength=sVal.length,
		signLvl=passwordLevel(sVal);

		if (sVlength==0) { //登录密码为空
			addErr("#signup_pswGroup");
			printTip("#signup_pswGroup","Please enter a password!");
			loadhide($("#signupSub"));
			$("#signPswLevel").addClass("hide");
		} else {
			var tipWords=$("#signup_pswGroup").find(".help-block").text().length,
			checkOk=$("#signup_pswGroup").hasClass("has-success");
			if (sVlength > 0 && sVlength < 6) { //大于0小于6位
				printTip("#signup_pswGroup","Password is too weak!");
				addErr("#signup_pswGroup");
				if (tipWords==26 || checkOk){
					printTip("#signup_pswGroup","Password must be at least 6 characters!");
				}
				$("#signPswLevel").removeClass("hide");
				$("#loWeak").css("background-color", "#ff4c50");
				$("#loNormal,#loStrong").css("background", "none");
			} else { //大于6位
				if (signLvl == 2) { //中
					addSucc("#signup_pswGroup");
					printTip("#signup_pswGroup","");
					$("#loWeak,#loNormal").css("background-color", "#f90");
					$("#loStrong").css("background", "none");
					return true
				} else if (signLvl >= 3) {
					if(sVlength > 8){ //强
						addSucc("#signup_pswGroup");
						printTip("#signup_pswGroup","");
						$("#loWeak,#loNormal,#loStrong").css("background-color", "#00c100");
						return true
					} else { //中
						addSucc("#signup_pswGroup");
						printTip("#signup_pswGroup","");
						$("#loWeak,#loNormal").css("background-color", "#f90");
						$("#loStrong").css("background", "none");
						return true
					}
				} else {
					if (tipWords>1 || checkOk){
						addErr("#signup_pswGroup");
						printTip("#signup_pswGroup","At least 6 characters, which should be letters,digital,symbols or both of them");
					}
					$("#loWeak").css("background-color", "#ff4c50");
					$("#loNormal,#loStrong").css("background", "none");
				}
			}
		}
	}

	function fundPswCheck(){
		//return true;
		var sVal=$("#fund_password").val(),
		sVlength=sVal.length;
		if (sVlength==0) { //密码为空
			addErr("#fund_pswGroup");
			printTip("#fund_pswGroup","Please enter a fund password!");
			loadhide($("#signupSub"));
		} else {
			//var tipWords=$("#fund_pswGroup").find(".help-block").text().length,
			var checkOk=$("#fund_pswGroup").hasClass("has-success");
			if (sVlength > 0 && sVlength < 6) { //大于0小于6位
				//if (tipWords==26 || checkOk){
					addErr("#fund_pswGroup");
					printTip("#fund_pswGroup","Fund password must be at least 6 characters!");
				//}
			} else { //大于6位
				addSucc("#fund_pswGroup");
				printTip("#fund_pswGroup","");
				return true
			}
		}
	}

	function signCodeCheck(){ //图片验证码验证
		var eVal=$("#captcha_reg").val(),vNum=eVal.length;
		if (eVal==''){
			addErr("#signup_codeGroup");
			printTip("#signup_codeGroup","Please enter the captcha code!");
			loadhide($("#signupSub"));
		} else{
			if(vNum==5){
				addSucc("#signup_codeGroup");
				printTip("#signup_codeGroup","");
				return true;
			} else{
				addErr("#signup_codeGroup");
				printTip("#signup_codeGroup","Invalid captcha code!");
				loadhide($("#signupSub"));
			}

		}
	}

	function clearPsw(elm){
		var psws=$(elm),
		sigPswLen=psws.val().length;
		if(sigPswLen==32){
			psws.val('');
			psws.parents("div").removeClass("has-success")
		}
	}
	$("#sig_email").blur(signEmailCheck).focus(function(){
		var mailTarget=$(this),mAddr=mailAddr1;
		if(!(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE8.0")){
			mailinput(mailTarget,mAddr);
		}
	});
	$("#sig_userName").blur(signUserNameCheck);

	$("#sig_password").blur(function(){
		signPswCheck() ; }).on('input propertychange', function () { signPswCheck()
		}).focus(function(){
			clearPsw("#sig_password")
		});
		$("#fund_password").blur(function(){
			fundPswCheck() ;}).on('input propertychange', function () { fundPswCheck()
			}).focus(function(){
				clearPsw("#fund_password")
			});
			$("#captcha_reg").blur(signCodeCheck);

			var agr=$("#agrCheckLabel"),
			signSub=$("#signupSub");
			agr.click(function(){
				if($("#agreeCheck").prop("checked")){
					signSub.attr("disabled",false);
				} else {
					signSub.attr("disabled",true);
				}
			});

			$("#signupSub").click(function(){
				loadshow($(this));
				if(signUserNameCheck()){signPswCheck() ; signEmailCheck() ; fundPswCheck() ; signCodeCheck()}
				if(signPswCheck()){signUserNameCheck() ; signEmailCheck() ; fundPswCheck() ; signCodeCheck()}
				if(signEmailCheck()){signUserNameCheck() ; signPswCheck() ; fundPswCheck() ; signCodeCheck()}
				if(fundPswCheck()){signUserNameCheck() ; signPswCheck() ; signEmailCheck() ; signCodeCheck()}
				if(signCodeCheck()){signUserNameCheck() ; signPswCheck() ; signEmailCheck() ; fundPswCheck()}

		if(signUserNameCheck() && signPswCheck() && signEmailCheck() && fundPswCheck() && signCodeCheck()){ //验证成功提交
			$('#signupForm').submit();
		} else { //表单验证失败
			loadhide($(this));
		}
	});
</script>
<?php include 'include/footer.php';?>


<script>
	$(function(){


		$.fn.animateProgress = function(progress, callback) {
			return this.each(function() {
				$(this).animate({
					width: progress+'%'
				}, {
					duration: 800,
					easing: 'swing',
					step: function( progress ){
						$('.value').text(Math.ceil(progress) + '%');
					},
					complete: function(scope, i, elem) {
						if (callback) {
							callback.call(this, i, elem );
						};
					}
				});
			});
		};
		if(pro_val=='') barcon.animateProgress(0); else barcon.animateProgress(pro_val);

        //页面高度
        var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
        if (lh < mh){lb.css("height",mh)}

        //右侧客户服务
    $(".side-sev ul li").hover(function(){
    	var _this=$(this);
    	_this.find(".sidebox").stop().animate({"width":"165px"},2).css({"background":"#009173"});
    },function(){
    	$(this).find(".sidebox").stop().animate({"width":"45px"},2).css({"background":"none"});
    });

    $("#bottomWXli").hover(function(){
    	$(".wx-bottom").show()
    },function(){
    	$(".wx-bottom").hide()
    });
    $("#runTime").hover(function(){
    	$(this).css("height","auto")
    },function(){
    	$(this).css("height","26px")
    });

        var notyContent='';

        function notyCookie() { //设置通知cookie
        	var noticeMsg = $("#siteNotyCon").text();
        	$.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }

        var annCookie = $.cookie('notice');
        if(annCookie != notyContent &&  notyContent != ''){ //通知有更新时
        	var sNoty=$("#siteNoty").noty({
        		text: "【Notice】: <a id='siteNotyCon' href='/article/' target='_blank'>"+notyContent+"</a>",
        		type: 'error',
        		layout: 'top',
        		theme: 'gateioNotyTheme',
        		closeWith: ['button'],
        		animation: { speed: 0 },
        		callback: {
        			afterShow: function() {
        				$("#siteNotyCon").click(function () {
        					notyCookie();
        					sNoty.close();
        				})
        			},
        			onClose: function() {
        				$("#siteNoty").animate({ height:0 },100).css("border","none");
        				notyCookie()
        			}
        		}
        	});
        }

    });

</script>
</body>

</html>
