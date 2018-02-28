<?php include 'config/config.php';?>

<?php include 'include/allheader.php';?>
<div class="content">

	<link href="css/usercenter.css" rel="stylesheet" type="text/css">

<?php include 'include/left_side_menu.php';?>


<script type="text/javascript">
	$(document).ready(function() {
		var accordion_head = $('.accordion > li > a'),
			accordion_body = $('.accordion li > .sub-menu');
		var found = false;
		for (i = 0; i < accordion_body.length; i++) {
			item = accordion_body.eq(i).find("[data-id='withdraw_coin']");
			if (item.length > 0) {
				accordion_head.eq(i).addClass('active').next().slideDown('normal');
				item.css({'background':' #d4f5f6','border-left-color':'#c1e3e4','border-right-color':'#c1e3e4'});
				found = true;
				break;
			}
		}
		if (found == false)
			accordion_head.eq(2).addClass('active').next().slideDown('normal');
		// Click function
		accordion_head.on('click', function(event) {
			// Disable header links
			event.preventDefault();
			// Show and hide the tabs on click
			if ($(this).attr('class') != 'active'){
				accordion_body.slideUp('normal');
				$(this).next().stop(true,true).slideToggle('normal');
				accordion_head.removeClass('active');
				$(this).addClass('active');
			}
		});

		var icoType='';
		if(icoType==''){
			$("#buyIco").parent("li").remove()
		}

		$("input").focus(function(){
			$(".failed").html("")
		});

		$(".files,.cloud,.mail").find("li").click(function () {
			$.cookie('nav_index', 2,{ path: '/' });
		});
		$(".sign").find("li").click(function () {
			$.cookie('nav_index', 3,{ path: '/' });
		});

		//左菜单active标识
		var url=window.location.href,
			pagename=url.split('nt/')[1];
		$('a[data-id="'+pagename+'"]').addClass("mactive");
		if(url.indexOf('?coin_withdraw') > -1 || url.indexOf('aw/') > -1){
			$('a[data-id=withdraw_coin]').addClass("mactive");
		} else if(url.indexOf('?coin_deposit') > -1 || url.indexOf('it/') > -1){
			$('a[data-id=deposit_coin]').addClass("mactive");
		}
		if(url.indexOf('totp/') > -1){
			$('a[data-id=totp]').addClass("mactive");
		}

		$(window).scroll(function () {
			var scrH=$(window).scrollTop();var accHeight=$(".myacc-con").height();
			if(accHeight>834) {
				if (scrH > 100) {
					if(scrH > accHeight-721) {
						$("#marketlist_wrapper").css({"position": "absolute", "top": "", "bottom": "10px", "width": "100%"});
					} else {
						$("#marketlist_wrapper").css({"position": "fixed", "top": "10px", "bottom": "", "width": "22%"});
					}
				} else {
					$("#marketlist_wrapper").attr("style", "");
				}
			}
		});
	});
</script>

	<div class="main_content  acc-m-con">


			<div class='right_mcontent  myacc-con'>

























































			<style>
	.winput{box-shadow: inset 1px 1px 2px rgba(0,0,0,.1); border-radius: 3px; padding: 8px 5px; font-size: 13px; font-family:'microsoft yahei'; border:1px solid #ddd;}
	#tips{ display:block}
	#withdrawtable td{ padding-right: 8px}
</style>

			<div class="m_title"><h4>USDT Withdrawal</h4></div>
			<div class="sectioncont">


				<form name="withdraw_form" id="withdraw_form" enctype="application/x-www-form-urlencoded" method="post" action="">
				<input type="hidden" name="withdraw_address_id" id="withdraw_address_id" value="0">
				<table id='withdrawtable'>

				<tr>
					<td align="right" width=160>gate.io Code: </td> <td> <label><input style="width: 20px;" type="checkbox" name="makegatecode" id="makegatecode" value='1'> Make <b>gate.io Code</b></label>(For asset transfer among Gate.io accounts Only) <a href="/myaccount/deposit_gatecode" target=_blank>How to redeem?</a></td>
				</tr>

				<tr>
					<td align="right" width=160>Balance: </td> <td>0 USDT</td>
				</tr>
				<tr>
					<td align="right">Day withdrawal limit</td> <td>100000 / 100000USDT</td>
				</tr>


																				<tr id="addr_tr">
									<td align="right">USDT Address:</td>
									<td style="position:relative;">
										<input type="text" name="addr" id="addr" value="" autocomplete="off" size="50" maxlength="50">
										<div name="selectaddr" id="selectaddr" class="hide">
											 <ul id="addrUl">
											  <div><a href="javascript:void(0)" onclick="javascript:addNewAddr();"><em><font color=green>+use new address(will be added to address list)</font></em></a></div>
											  											 </ul>
										</div>
										<i class="addr-ico"></i>
									</td>
								</tr>





								<tr>
					<td align="right">Amount (USDT):</td><td><input type="text" value="" size="10" name="amount" id="amount"> Minimum 15.1 USDT, Maximum 100000 USDT</td>
				</tr>
				<tr>
					<td align="right">Fee: </td><td style="padding-top: 15px"> 0% + 15 USDT (No fee for gate.io Code).
										</td>
				</tr>

				<tr>
					<td align="right">Fund password:</td><td><input type="password" name="fundpass" id="fundpass" size="20"></td>
				</tr>
								<!--
				<tr>
					<td align="right">Verification code:</td>
					<td>
					<img id="withCaptcha" src="/captcha" alt="Captcha" title="change" onclick="document.getElementById('withCaptcha').src = '/captcha?' + Math.random(); return false"/>
					</td>
				</tr>
				<tr>
					<td align="right">Input the verification code:</td><td><input type="text" name="captcha" id="captcha"/></td>
				</tr>
				-->
				<tr>
					<td align="right">TOTP: </td><td><input type="text" name="totp" id="totp" size="20"> Leave blank if not enabled</td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td> <input type="button" name="submit_btn" id="submit_btn" value="  Submit request " class="sub-btn" onclick="doSubmit()"></td>
				</tr>
				</table>

				</form>

				<br>
			</div>

			<br>
			<script>
				function cancel_withdraw(uid, wid){
					var json_req = {
						type : "cancel_withdraw",
						uid : uid,
						wid : wid
					};
					$.ajax({type:"get",url:"/json_svr/exchange/?u=21", data:json_req, xhrFields: { withCredentials: true},
						success : function(data, textStatus){
							var json_res = data;
							if ( json_res && json_res.result ) {
								view_code = "<div class='cancel_content'>Cancelled!</div>";
								noty({text: view_code, type: "success",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 5000, callback: {onShow: function() {}}});
							}else{
								view_code = "<div class='cancel_content'>Failed! "+json_res.msg+"</div>";
								noty({text: view_code, type: "warning",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 10000, callback: {onShow: function() {}}});
							}
						},
						error : function(){
							noty({text: "Network error", type: "error",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 10000, callback: {onShow: function() {}}});
						},
						complete : function(){
						}
					});
				};
				function addNewAddr() {
					$("#addr").val("");
					$("#withdraw_address_id").val("0");
					$("#addr").attr("readonly", false);
					$("#addr").focus();
				};
				function delAddr(obj, uid, id){

					if (!obj || parseInt(uid) <= 0 || parseInt(id) <= 0) return;

					noty({
						text: "delete this record?",
						type: 'confirm',layout: 'center',theme: 'gateioNotyTheme',modal: true,
						animation: {
							open: {height: 'toggle'},close: {height: 'toggle'}, easing: 'swing',speed: 10},
						buttons: [
							{
								addClass: 'btn btn-primary', text: 'ok', onClick: function($noty) {
									var json_req = {
										type : "del_withdraw_address",
										uid : uid,
										id : id
									};
									$.ajax({type:"post",url:"/json_svr/exchange/?u=21", data:json_req, xhrFields: { withCredentials: true},
										success : function(data, textStatus){
											var json_res = data;
											if ( json_res && json_res.result ) {
												view_code = "<div class='cancel_content'>delete succeed!</div>";
												$(obj).parent("li").hide();
												noty({text: view_code, type: "success",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 500, callback: {onShow: function() {}}});
											}else{
												view_code = "<div class='cancel_content'>delete failed! "+json_res.msg+"</div>";
												noty({text: view_code, type: "warning",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 10000, callback: {onShow: function() {}}});
											}
										},
										error : function(){
											noty({text: "net error!", type: "error",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 10000, callback: {onShow: function() {}}});
										}
									});
									$noty.close();
								}
							},
							{
								addClass: 'btn btn-danger', text: 'cancel', onClick: function($noty) {$noty.close();return;}
							}
						]
					});

				};
			</script>

			<div class="m_title"><h4>Last 10 withdrawal records</h4></div>
			<div class="sectioncont">
				<table class='sf-grid'>
				  <tr> <td align='right'width="50px"><b>ID</b></td>
					   <td align='right'><b>Address/TxID</b></td>
					   <td align='right' width="100px"><b>Amount</b></td>
					   <td align='right' width="160px"><b>Date</b></td>
					   <td align='right' width="100px"><b>Operation</b></td>
                  </tr>

                </table>
			</div>

			<br>


			<script src="/jsfile/ipd.js"></script>
			<script>
			function num_need_fix( num, dec ){
				num = num.toString();
				var index = num.indexOf( "." );
				if( index < 0 ){
					return false;
				}
				if( num.length - index - 1 > dec ){
					return num.substr( 0, index + dec + 1 );
				}
				return false;
			}

			function num_fix( num, dec ){
				num = Number(num).toFixed( 15 );
				var num_fixed = num_need_fix( num, dec );
				return  num_fixed ? num_fixed : num;
			}

			document.getElementById('amount').onkeyup = function(){
				var fixed_num = num_need_fix( this.value, 4);
				if( fixed_num ){
					this.value = fixed_num;
				}

			}
			</script>


<script>

$(document).ready(function (e) {

	var addrNum=$("#addrUl").find("li").size();
	if(addrNum>0){
		$(".addr-ico").show();
		$("#addr").attr("readonly", true);
		$('#addr').on('focus', function() {
				$('#selectaddr').removeClass('hide');
				$('#selectaddr').attr("z-index",999);
		});
		$('#addr').on('blur', function() {
			setTimeout(function () {
				$('#selectaddr').addClass('hide');
			}, 300);
		});
		$("#addrUl li").each(function (i){
			$(this).find("span").click(function(){
				var addr = $(this).text();
				var addr_id = $(this).attr('addr_id');
				var addr_recv = $(this).parent().attr('addr_recv');
				$("#addr").val(addr);
				$("#addr").attr("readonly", true);
				$("#withdraw_address_id").val(addr_id);
				$("#payment_id").val(addr_recv);
			})
		});

	} else{
		$(".addr-ico").hide();
		$("#addr").attr("readonly", false);
	}

    $('#smsbtn').click(function() {
        var self = $(this);

        var currentTime = 60;
        var orignialtext = $(this).text();
        var form = self.closest('form');
		var fundpass = $('#fundpass', form).val();

		if (fundpass == '') {
			noty({text: '<span style=color:#ff5d5d>Invalid fund password</span>', type: "warning",layout: "center", timeout: 1000});
			$('#fundpass').focus();
			return false;
		}
		self.prop('disabled', true);

        var timer = $.timer(function() {
            currentTime = currentTime - 1;
            self.text(orignialtext + ' (' + currentTime + ')');

            if (currentTime == 0)
            {
                resetTimer();
            }
        }, 1000, false);

        var resetTimer = function()
        {
             timer.stop();
             currentTime = 60;
             self.text(orignialtext).prop('disabled', false);
        }
		var json_req = {
			fundpass : fundpass,
			type : 'withdraw'
		};
		var smsid = $('#smsid', form).val();
		var lang = "en";
		var view_code = "";
		var msg = "";
		$.ajax({type:"post",url:"/sms/" + smsid, data:json_req,
			success : function(data, textStatus){
				var json_res = data;
				if ( json_res && json_res.result ) {
					self.text(orignialtext + ' (' + currentTime + ')');
					timer.play();
					msg = lang == "en" ? "The SMS code has been sent to your cellphone." : "手机短信验证码：" + json_res.msg;
					$('#smscode', form).prop('disabled', false);
				} else {
					 msg = lang == "en" ? "Send SMS faild: "+json_res.msg+", please check your phone number at <a href='/myaccount/sms_setup'>this link</a>." : "短信发送失败："+json_res.msg+"，请到<a href='/myaccount/sms_setup'>这里检查手机号码设置</a>.";
					 //resetTimer();
					 timer.play();
				}
				//apprise( "<div>"+msg+"</div>", {animate:true,textOk:"确定"}, function(r){} );
				noty({text: msg, type: "warning",layout: "bottomLeft", timeout: 10000});
			},
			error : function(){
				//resetTimer();
				timer.play();
				noty({text: 'Net error!', type: "warning",layout: "bottomLeft", timeout: 10000});
			},
			complete : function(){
			}
		});

        return false;
    });

	//////////////////////////////////////
	//gateio code
	$('#makegatecode').click(function() {
		//document.getElementById(row); // id passed
		//row = document.getElementById('withdrawtable').rows[3];
		var row = document.getElementById('addr_tr');
		if (row) row.style.display=(row.style.display=='none')?'':'none';
		var row_memo =  document.getElementById('addr_memo_tr');
		if (row_memo) row_memo.style.display=(row_memo.style.display=='none')?'':'none';
	});


});

	function OnViewCode(id) {

		var view_code = "<h3 style='margin-bottom:10px'>View GATECODE</h3>";
		view_code += "<div style='border-bottom:1px solid #666'></div><br>";
		view_code += "<table id='tablePending' width='100%'>";
		view_code += "<tr><td class='noty-td' width='25%'> </td><td  width='70%'></td></tr>";
		view_code += "<tr><td class='noty-td'>fund password: </td><td width='10%'>" +
				"<input type='password' class='winput' name='fpass' id='fpass' onpaste='return false;'/>" +
				"<label name='tips' id='tips'></label></td></tr>";

		noty({
			text: view_code,
			type: 'confirm',
			layout: 'center',
			theme: 'gateioNotyTheme',
			modal: true,
			animation: {
				open: {height: 'toggle'},
				close: {height: 'toggle'},
				easing: 'swing',
				speed: 100
			},
			buttons: [
				{
					addClass: 'btn btn-primary dp-noty-btn', text: 'OK', onClick: function ($noty) {
					var fpass = $('#fpass').val();
					if (fpass == '') {
						$('#tips').html('<span style=color:#ff5d5d>Input found password</span>');
						$('#fpass').focus();
						return;
					}
					var json_req = {
						type : "get_gatecode",
						fundpass : fpass,
						id : id
					};
					$.ajax({
						type: "get",
						url: "/json_svr/query/?u=13" + "&c=" + Math.floor(Math.random() * 1000000),
						data: json_req,
						xhrFields: { withCredentials: true},
						success: function (data, textStatus) {
							var json_res = data;
							if (json_res && json_res.result) {
								var gatecode = json_res.gatecode;
								var view_code = "";
								view_code += "<table id='tablePending' style=width:100%>";
								view_code += "<tr><td>View GATECODE: </td></tr>";
								view_code += "<tr><td><input class='winput' style='width:100%;box-sizing:border-box;' readonly type='text' value='" + gatecode + "' onfocus='this.select();'></td></tr>";
								view_code += "</table>";
								view_code += "<br/>";
								noty({
									text: view_code,
									type: 'confirm',
									layout: 'center',
									theme: 'gateioNotyTheme',
									modal: true,
									animation: {
										open: {height: 'toggle'},
										close: {height: 'toggle'},
										easing: 'swing',
										speed: 100
									},
									buttons: [
										{
											addClass: 'btn btn-danger dp-noty-btn',text: 'OK',
											onClick: function ($noty) { $noty.close(); return; }
										}
									]
								});
							} else {
								view_code = "<div class='cancel_content'>"+json_res.msg+"</div>";
								noty({text: view_code, type: "warning",layout: "center", theme: 'gateioNotyTheme', timeout: 10000});
							}
						},
						error : function(req, textStatus, err){
							noty({text: "Net Error: " + req.status + " " + req.readyState + " " + textStatus + " " + err,
								type: "error",layout: "center", theme: 'gateioNotyTheme', timeout: 10000,
								callback: {onShow: function() {;}}});
						}
						});
						$noty.close();
						return ;
					}
				},
				{
					addClass: 'btn btn-danger dp-noty-btn', text: 'Close', onClick: function ($noty) {
						$noty.close();
						return;
					}
				}
			]

		});
	}

	function doSubmit() {

		var amount = $('#amount').val();
		var fundpass = $('#fundpass').val();

		if (amount == '') {
			noty({text: 'Invalid amount', type: "warning",layout: "center", theme: 'gateioNotyTheme', timeout: 3000});
			$('#amount').focus();
			return;
		}
		if (fundpass == '') {
			noty({text: 'Invalid fund password', type: "warning",layout: "center", theme: 'gateioNotyTheme', timeout: 3000});
			$('#fundpass').focus();
			return;
		}

		$('#submit_btn').attr("disabled",true);

		var form = document.getElementById('withdraw_form');
		form.submit();

		return;
	}
</script>

		<br>

</div> <!-- right_mcontent -->
  </div> <!-- main content -->


</div>
<?php include 'include/footer.php';?>


<script>
    $(function(){

		var pb=$("#ProgressBar"),pbWidth=pb.width(),loginbar=$("#topLoginBar"),tmenu=$("#tierMenu"),barcon=$("#pbCon"),barmark=barcon.find("i"),pbar=$("#proBar"),fbar=$("#fproBar"),pro_val='0.0';
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

        var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
        if (lh < mh){lb.css("height",mh)}

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
        var notyContent='SMT(SmartMesh) is listed on gate.io(10 million bonus)';

        function notyCookie() { //设置通知cookie
            var noticeMsg = $("#siteNotyCon").text();
            $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }

        var annCookie = $.cookie('notice');
        if(annCookie != notyContent &&  notyContent != ''){ //通知有更新时
            var sNoty=$("#siteNoty").noty({
                text: "【Notice】: <a id='siteNotyCon' href='/article/16307' target='_blank'>"+notyContent+"</a>",
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


</script>
</body>
</html>
