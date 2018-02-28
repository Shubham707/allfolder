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

		accordion_head.on('click', function(event) {

			event.preventDefault();

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
          <div class="m_title"><a href='/trade/'><h4>Tether (USDT) Deposit </h4></a></div>
			<div class="sectioncont">

				Please send USDT to this address(<a target=_blank href='https://omniexplorer.info/lookupadd.aspx?address=19DJS8phwq1areGqJ5Zu8uXT5YQii3389G'>Click here to check in blockchain explorer</a>): <br><br>
				<input class='coin_add' style='font-size:26px;' readonly value='19DJS8phwq1areGqJ5Zu8uXT5YQii3389G'>
				<br>Or Scan QR code:<br>
				<img src="/libs/qr.php?d=19DJS8phwq1areGqJ5Zu8uXT5YQii3389G" alt="QR code" style="width: 200px; height: 200px"/>
												<br>

				Crypto-currencies are credited within 1 minute after accessing this page or "My funds" page and only after 2 confirmations of the transaction in the network.
				<br><br>

			</div>

			<br>
			<div class="m_title"><h4>Trading Markets</h4></div>
			<div class="sectioncont">
				<table class='sf-grid'>
					<tr>
					</tr>
				</table>
			</div>

			<br>


			<div class="m_title"><h4>Recent deposit records</h4></div>
			<div class="sectioncont">

				<table class='sf-grid'>
				  <tr> <td align='right'><b>Date</b></td>
					   <td align='right'><b>Amount</b></td>
					   <td align='right' ><b>Status</b></td>
                  </tr>

                </table>

			</div>

			<br>
		<br>


	</div> <!-- right_mcontent -->
  </div> <!-- main content -->


</div>


<?php include 'include/footer.php'; ?>
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
        var notyContent='SMT(SmartMesh) is listed on gate.io(10 million bonus)';

        function notyCookie() {
            var noticeMsg = $("#siteNotyCon").text();
            $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }

        var annCookie = $.cookie('notice');
        if(annCookie != notyContent &&  notyContent != ''){
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
