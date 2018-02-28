<?php
include 'include/allheader.php';
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
		<div class="m_con rightlogin">
			<form role="form" id="loginForm"  name="login" method="post" action="">

				<div class="form-group parentCls has-feedback" id="emailGroup">
					<label for="email">Username or Email</label>
					<div class="automail-list"></div>
					<input type="text" class="form-control inputElem" name="email" id="email" value="" onkeyup="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'')" onafterpaste="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'')">
					<span class="glyphicon glyphicon-ok form-control-feedback"></span>
					<span class="help-block"></span>
				</div>

				<div class="form-group has-feedback" id="pswGroup">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password">
					<div class="input-item-info"><a href="resetpw.html" style="line-height: 48px;margin-left: 5px;">Forgot password?</a></div>
					<span class="glyphicon glyphicon-ok form-control-feedback"></span>
					<span class="help-block"></span>
				</div>

				<div class="form-group has-feedback clearfix" id="codeGroup">
					<label for="captcha_code">Captcha code</label>
					<div class="clearfix code-box">
						<input type="text" class="form-control code-input" name="captcha" id="captcha_code" maxlength="8" autocomplete="off">
						<div id="code"><img class="cap-img" id="loginCaptcha" src="captcha.png" alt="Captcha" title="Change" onclick="document.getElementById('loginCaptcha').src = '/captcha?' + Math.random(); return false"/></div>
						<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						<span class="help-block"></span>
					</div>
				</div>

				<!-- <div class="form-group" id="ipGroup">
					<label for="iprestriction" style="user-select: none;">Security option</label>
					<div class="pull-left" style="margin-top: 10px">
					<label class="haschecked pull-left" style="width: auto;user-select: none;">
						<input  class="form-control" type="checkbox" name="iprestriction" id="iprestriction" value='1' checked>Bind IP (<span class=red>For your account safty, do NOT uncheck</span>)</span>
					</label>
					</div>
					<span class="help-block"></span>
				</div> -->

				<button type="button" class="btn btn-error btn-block sub-btn" id="loginSub"><span>Log in</span>
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
		<div class="m_con_buy leftregi">
			<form role="form" id="signupForm" name="signup" method="post" action="">
				<input type="hidden" name="ref_uid" id="ref_uid" value=""/>
				<input type="hidden" name="language" id="language" value="cn"/>
				<div>
					<div class="form-group parentCls has-feedback" id="signup_userNameGroup">
						<label for="sig_email">Username</label>
						<input type="text" class="form-control" name="nickname" id="sig_userName" value="" autocomplete="off">
						<div class="input-item-info"><span class="r-tip">(Letters or letters combined with numbers)</span></div></span><span class="glyphicon glyphicon-ok form-control-feedback"></span> <span class="help-block"></span>
					</div>
				</div>
				<div>
					<div class="form-group has-feedback" id="signup_pswGroup">
						<label for="sig_password">Password</label>
						<input type="password"  name="password" class="form-control" id="sig_password" autocomplete="new-password">
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
					<div class="form-group parentCls has-feedback" id="signup_emailGroup">
						<label for="sig_email">E-mail</label>
						<input type="eamil" class="form-control" name="email" id="sig_email" value="" autocomplete="off">
						<div class="input-item-info"><span class="r-tip">(For verfication)</span></div></span><span class="glyphicon glyphicon-ok form-control-feedback"></span> <span class="help-block"></span>
					</div>
				</div>
				<div>
					<div class="form-group has-feedback" id="fund_pswGroup">
						<label for="fund_password">Fund password</label>
						<input type="password"  name="fundpass" class="form-control" id="fund_password" autocomplete="new-password">
						<div class="input-item-info"><span class="r-tip">(Very important, Need to be different from the login password)</span></div><span class="glyphicon glyphicon-ok form-control-feedback"></span>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group has-feedback" id="signup_codeGroup">
					<label for="captcha_code">Captcha code</label>
					<div class="clearfix code-box">
						<input type="text" class="form-control code-input" name="captcha" id="captcha_reg" maxlength="8" autocomplete="off">
						<div id="codeReg"><img class="cap-img" id="regCaptcha" src="captcha_reg.png" alt="Captcha" title="Change" onclick="resetCode();document.getElementById('regCaptcha').src = '/captcha_reg?' + Math.random(); return false"/></div>
						<div class="input-item-info"></div><span class="glyphicon glyphicon-ok form-control-feedback"></span>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="checkbox clearfix">
					<label id="agrCheckLabel" class="haschecked pull-left">
						<input  class="form-control pull-left" type="checkbox" name="agreeCheck" id="agreeCheck" value='1' checked>
						<span id="agrTxt" class="pull-left">I agree to the</span>
					</label>
					<a class="pull-left" target=_blank href='docs/agreement.pdf'> <?php echo PROJECT_TITLE?> User Agreement </a>
				</div>
								<button type="button" class="btn btn-error btn-block sub-btn" id="signupSub"><span>Create account</span>
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

	var mailAddr=["","@qq.com", "@163.com", "@126.com", "@sina.com", "@gmail.com", "@hotmail.com", "@aliyun.com", "@sohu.com"],
	    mailAddr1=["@qq.com", "@163.com", "@126.com", "@sina.com", "@gmail.com", "@hotmail.com", "@aliyun.com", "@sohu.com"];
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

		$("#captcha_code").blur(codecheck);

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
        //nav标记
        var currUrl=window.location.toString();
        if(currUrl.indexOf('trade/index.html') > 0){
            $.cookie('nav_index', 1,{ path: '/' });
        } else if(currUrl.indexOf('/login') > 0 || currUrl.indexOf('article/index.html') > 0 || currUrl.indexOf('page/index.html') > 0 || currUrl.indexOf('/fee') > 0){
            $.cookie('nav_index', 9,{ path: '/' });
        } else if(currUrl.indexOf('/coins') > 0){
            $.cookie('nav_index', 4,{ path: '/' });
        }
        $(".gateio-nav").children("li").click(function () {
            $.cookie('nav_index', $(this).index(),{ path: '/' });
        }).eq($.cookie('nav_index')).addClass("nav-active");
        $(".user-log-out a,.more-lan a").click(function () {
            $.cookie('nav_index', 0,{ path: '/' });
        });
		//用户等级
		var pb=$("#ProgressBar"),pbWidth=pb.width(),loginbar=$("#topLoginBar"),tmenu=$("#tierMenu"),barcon=$("#pbCon"),barmark=barcon.find("i"),pbar=$("#proBar"),fbar=$("#fproBar"),pro_val='';
		loginbar.hover(function(){
            tmenu.stop().slideDown(200);
            $(this).stop().css("color","#f80");
			barmark.css("opacity","0");
			pbar.animate({width:pro_val+'%'},800);
        },function(){
            tmenu.stop().slideUp(100);
             $(this).stop().css("color","#fff");
			 barmark.css("opacity","1");
			 pbar.css('width','0');
        });
		tmenu.css("width",pbWidth);
		fbar.animate({width:pro_val+'%'},800);
        if(pro_val > 0){
            fbar.addClass("has-pro-val");
        }

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

        //全站重要通知
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

    //backtotop
    (function() {
        var $backToTopTxt = "^", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
                .text($backToTopTxt).click(function() {
                    $("html, body").animate({ scrollTop: 0 }, 500);
                }), $backToTopFun = function() {
            var st = $(document).scrollTop(), winh = $(window).height();
            (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
            //IE6下的定位
            if (!window.XMLHttpRequest) {
                $backToTopEle.css("top", st + winh - 166);
            }
        };
        $(window).bind("scroll", $backToTopFun);
        $(function() { $backToTopFun(); });
    })();

    //主题
    $("#theme").find("li").click(function(){
        var theme = $(this).attr("id");
        if(theme == 'light') {
            $("#darkStyle").attr("disabled","disabled");
            $('#lightChart').click();
            $("#tradelist").removeClass("dark-tradelist");
            $("body").removeClass("dark-body");
        } else {
            $("#darkStyle").removeAttr("disabled");
            $('#darkChart').click();
            $("#tradelist").addClass("dark-tradelist");
            $("body").addClass("dark-body");
        }
        //$("link[title!='"+theme+"']").attr("disabled","disabled");
        $.cookie("mystyle",theme,{expires:30, path: '/' });
        $(this).addClass("cur-theme").siblings().removeClass("cur-theme");
    });
    var cookie_style = $.cookie("mystyle");
    if(cookie_style == 'light' || typeof(cookie_style) == 'undefined'){
        $("#light").addClass("cur-theme");
    } else {
        $("#dark").addClass("cur-theme");
        $("#tradelist").addClass("dark-tradelist");
    }

    function toThousands(num) {
        var num = (num || 0).toString(), result = '';
        while (num.length > 3) {
            result = ',' + num.slice(-3) + result;
            num = num.slice(0, num.length - 3);
        }
        if (num) { result = num + result; }
        return result;
    }
    $("#usdtAll").text(toThousands(14862186));
    $("#btcAll").text(toThousands(476));
    $("#ltcAll").text(toThousands(9711));
    $("#ethAll").text(toThousands(13906));

</script>
</body>

<!-- Mirrored from gate.io/login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 05:37:20 GMT -->
</html>
