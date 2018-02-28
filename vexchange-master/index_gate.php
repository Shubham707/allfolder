<?php include 'include/index_header.php';?>

<style>
    html,body{ height: 100%}
    .top-con,.top-dn,.left_con,.right_con,.fkicon,.fnavcon > ul,.flinks,#pagination{ width: 1280px; margin: 0 auto}
    .fkicon{ margin-bottom: 20px}
    .top-up,.top-dn{ padding: 0}
    .top-dn{ height: 80px}
    .logo img, .logo svg{ margin-top: 25px}
    .gateio-nav {margin-top: 22px}
    .ask_ans p{ margin-top: 28px}
    .footer{ border-top:none}
    .right-box:first-child,.left_con,.right_con{ padding-left: 0 !important;padding-right: 0 !important;}
    .bul ul li{ line-height: 33px;margin-bottom: 2px;}
    .add-dn-qr h3{ font-size: 15px}
    .left_con .marketlist .day-updn,#marketlist_box .bizhong{ width: 22%}
    .left_con .marketlist tr td:nth-child(3),.left_con .marketlist tr th:nth-child(3){ width: 12%;}
    .left_con .marketlist tr td:nth-child(4),.left_con .marketlist tr th:nth-child(4){ width: 12%;}
    .left_con .marketlist tr td:nth-child(5){ padding-right: 0}
    .left_con .marketlist tr td:nth-child(6) {width: 12%;}
    .left_con .marketlist tr td:last-child { padding-left: 10px}
    #marketlist_box .bizhong,div .bizhong { background-position: 46px center;}
    .dataTables_wrapper .coin-name{ margin-left: 5px}
    .left_con .marketlist th b,.left_con .marketlist th,.left_con .marketlist td{ font-size: 15px}
    body,.content,.header, .footer, #full-screen-slider, .left_con_login, .topspace{min-width: 1080px !important;}
    #nickName span{display: inline-block;max-width: 190px;line-height: 30px;float: left;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
    .custom-ctrl{ font-size: 16px; margin-top: 10px}
    .custom-ctrl .hide-custom{margin: 6px 2px 0 5px; float: left; cursor:pointer;user-select: none}
    .custom-ctrl .hide-custom:hover{ color: #d86767}
    .lead-to-add{ text-align: center}
    .lead-to-add .r-btn{ border: none;padding: 8px 16px; margin-bottom: 10px; cursor: pointer}
    .ask_ans i{background: #d45858; color: #eee}
    .dark-body .ask_ans i{background: #964b4b}
    .dark-body .ask_ans:hover i{background: #ff5d42}
    .ask_ans i path{ fill:#fff}
    .dark-body .fnav {border-top: 1px solid #343a48;}
    .dark-body .header{background: #252e3e;}

    div.user-select{ right: -120px}
    .banner-s-font{ font-size: 18px}
    .banner-l-font {letter-spacing: -2px;}
    @media screen and (max-width: 1310px) {
        .top-con, .top-dn, .left_con, .right_con, .fkicon, .fnavcon > ul, .flinks,.l-box-con {  width: 1024px;  }
        .left_con .marketlist td,.left_con .marketlist th,.left_con .marketlist th b,.bul ul li,.latnewslist h3{ font-size: 14px}
        .icon-48 {transform: scale(0.8)}
        .dataTables_wrapper .coin-name{ margin:8px 0 0 2px; display: block}
        .left_con .icon-32{ margin-top: 0}
        .topprice li:last-child{ display: none}
        #nickName span{max-width: 128px;}
        .price-chart,.left_con .marketlist th.price-flot{ width: 180px}
        #marketlist_box .bizhong{ padding-right: 0}
        .txt-banner{ font-size: 50px;}
        .price-flot{ padding-right: 5px}
    }
</style>
<script src="js/helper/LocalStoragea293.js?v=07172"></script>
<script src="js/helper/matchStra293.js?v=07172"></script>
<div class="content">
<div id="full-screen-slider">
    <div id="bannerProgress"><div></div></div>
    <div class="l-box-con">
                    <div class="login_box">
                    <div class="step" id="login-reg" style="">
                      <form name="login" id="loginform" method="post" action="" >
                    <b>LOGIN</b>
                      <!-- <input type="hidden" name="iprestriction" id="iprestriction" value='1'> -->
                      <div class="username">
                        <input name="email" id="nick" class="intxt" placeholder="Username" type="text" onfocus="if(placeholder=='Username'){$.cookie('mystyle')=='dark'?this.style.color='#fff':this.style.color='#000';placeholder=''}" onblur="if(placeholder==''){this.style.color='#aaa';placeholder='Username'}">
                      </div>
                      <div class="password">
                        <input name="password" id="pwd" class="intxt" placeholder="Password" type="password" onfocus="if(placeholder=='Password'){$.cookie('mystyle')=='dark'?this.style.color='#fff':this.style.color='#000';placeholder=''}" onblur="if(placeholder==''){this.style.color='#aaa';placeholder='Password'}" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }">
                      </div>
                      <div class="cap-code">
                          <!--<i class="icon-code"><img src="/images/loginpas.png" /></i>-->
                          <input name="captcha" id="captcha" class="intxt" placeholder="Captcha" type="text" onfocus="if(placeholder=='Captcha'){$.cookie('mystyle')=='dark'?this.style.color='#fff':this.style.color='#000';placeholder=''}" onblur="if(placeholder==''){this.style.color='#aaa';placeholder='Captcha'}" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" maxlength="8">
                          <img id="loginCaptcha" src="captcha.png" alt="Captcha" title="Change" onclick="document.getElementById('loginCaptcha').src = '/captcha?' + Math.random(); return false">
                      </div>
                      <div class="btn"><a href="javascript:document.getElementById('loginform').submit()" class="button button-flat-action">Login</a></div>
                      <div class="wj"><a href="resetpw.html" target="_blank">Forgot password?</a> &nbsp;&nbsp;&nbsp;<a class="im-new" href="login.html" target="_blank">New user signup</a></div>
                      </form>
                    </div>
                </div>

        </div>
    <ul id="slides">
<li data-id="#867919" data-txt="#fffed3">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-bcx"></i>Deposit BTC Get BCX</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo"><?php echo PROJECT_TITLE;?> will distribute BCX at around block 498888 on 1:1 base of BTC</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='myaccount/deposit/BTC.html'"><i class="icon-32 icon-32-btc"></i><em>Deposit BTC</em></span>
							<span class="r-btn clearfix" onclick="window.location.href='myaccount/lockbook.html'"><i class="icon-32 icon-32-bcx"></i><em>Get BCX</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/BCX_USDT.html'"><i class="icon-32 icon-32-bcx"></i><em>Trade BCX</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>


	   <li data-id="#0b61a7" data-txt="#ffdede">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-god"></i>Deposit BTC Get BitcoinGod(GOD) at Xmas!</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo"><?php echo PROJECT_TITLE;?> will distribute SBTC at around block 501225 on Xmas on 1:1 base of BTC</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='myaccount/deposit/BTC.html'"><i class="icon-32 icon-32-god"></i><em>Deposit BTC</em></span>
							<span class="r-btn clearfix" onclick="window.location.href='myaccount/lockbook.html'"><i class="icon-32 icon-32-god"></i><em>Get GOD</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/GOD_USDT.html'"><i class="icon-32 icon-32-god"></i><em>GOD Trade</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>


	   <li data-id="#962536" data-txt="#ffdede">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-sbtc"></i>Deposit BTC Get SuperBitcoin(SBTC)</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo"><?php echo PROJECT_TITLE;?> will distribute SBTC at around block 498888 on 1:1 base of BTC</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='myaccount/deposit/BTC.html'"><i class="icon-32 icon-32-btc"></i><em>Deposit BTC</em></span>
							<span class="r-btn clearfix" onclick="window.location.href='myaccount/lockbook.html'"><i class="icon-32 icon-32-sbtc"></i><em>Get SBTC</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/SBTC_BTC.html'"><i class="icon-32 icon-32-sbtc"></i><em>SBTC Trade</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>


		<li data-id="#009ab4" data-txt="#ffdede">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-gnt"></i>Golem(GNT) is listed!</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo">Golem(GNT) is a global, open sourced, decentralized supercomputer.</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='myaccount/deposit/GNT.html'"><i class="icon-32 icon-32-gnt"></i><em>GNT Deposit</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/GNT_ETH.html'"><i class="icon-32 icon-32-gnt"></i><em>GNT/ETH Trade</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/GNT_USDT.html'"><i class="icon-32 icon-32-gnt"></i><em>GNT/USDT Trade</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>


		<li data-id="#962536" data-txt="#ffdede">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-qash"></i>QASH(LIQUID) is listed!</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo">The next Bitcoin or Ethereum for financial services. Trade now!</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='myaccount/deposit/QASH.html'"><i class="icon-32 icon-32-qash"></i><em>Deposit QASH</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/QASH_ETH.html'"><i class="icon-32 icon-32-qash"></i><em>QASH/ETH</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/QASH_BTC.html'"><i class="icon-32 icon-32-qash"></i><em>QASH/BTC</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>


		<li data-id="#11232d" data-txt="#ffdede">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-dgd"></i>DigixDAO(DGD) is listed!</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo">DigixDAO(DGD) Claim rewards based on DGX collected through transaction fees</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='myaccount/deposit/DGD.html'"><i class="icon-32 icon-32-dgd"></i><em>DGD Trade</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/DGD_ETH.html'"><i class="icon-32 icon-32-dgd"></i><em>DGD/ETH Trade</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='trade/DGD_USDT.html'"><i class="icon-32 icon-32-dgd"></i><em>DGD/USDT Trade</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>

		<li data-id="#257896" data-txt="#e6fffd">
            <div class="l-box-con">
                <div class="txt-banner txt-top-60 add-coin-banner">
                    <span class="banner-thin banner-font-42"><i class="icon-48 icon-48-med"></i>Medibloc Official release</span>
                    <div class="banner-s-font">
                        <span class="banner-coininfo">Trade in December...</span>
                        <div class="banner-btn clearfix">
                            <span class="r-btn clearfix" onclick="window.location.href='trade/MED_QTUM.html'"><i class="icon-32 icon-32-med"></i><em>Purchase with Qtum</em></span>
                            <span class="r-btn clearfix" onclick="window.location.href='article/16293.html'"><i class="icon-32 icon-32-med"></i><em>T&C</em></span>
                        </div>
                        <div class="bg-txt"><?php echo PROJECT_TITLE;?></div>
                        <div class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</div>
                        <small></small>
                    </div>
                </div>
            </div>
        </li>



		<li data-id="#384e77" data-txt="#dbe8ff">
            <div class="l-box-con">
                <div class="txt-banner txt-logo">
                    <img class="gate-logo" src="images/gateio.svg" title="<?php echo PROJECT_TITLE;?>" alt="<?php echo PROJECT_TITLE;?> logo">
                    <span class="banner-thin banner-m-font pull-left"><?php echo PROJECT_TITLE;?><br>Blockchain Assets Exchange</span>
                </div>
            </div>
        </li>

        <li data-id="#387760" data-txt="#e3fff5">
            <a href="javascript:;">
                <div class="l-box-con">
                    <div class="txt-banner"><span class="banner-thin banner-l-font">Near-Instant Withdraw and <br>Fast Deposit</span></div>
                </div>
            </a>
        </li>
        <li data-id="#542e63" data-txt="#f9ebff">
            <a href="javascript:;">
                <div class="l-box-con">
                    <div class="txt-banner txt-top">
                        <span class="banner-thin banner-m-font">New Address Sharing Technology<br>No wrong deposit anymore</span>
                        <div class="banner-s-font">BTC, BCH, USDT Same Deposit Address
                            <span style="margin-left: 20px">ETH, ETC, Tokens Same Deposit Address</span>
                            <p class="bg-txt"><?php echo PROJECT_TITLE;?></p>
                            <p class="slogan-effect"><?php echo PROJECT_TITLE;?> Blockchain Assets Trading Platform. The Gate of Blockchain Assets Exchange</p>
                            <small></small>
                        </div>
                    </div>
                </div>
            </a>
        </li>

    </ul>
    <div class="area-btn-bg"></div>
</div>


  <?php include 'include/index_filter.php';?>

    <div class="advantage">
        <h1>Blockchain Assets Trading Platform</h1>
        <h2><?php echo PROJECT_TITLE?></h2>

        <ul class="clearfix">
            <li>
                <span>0.0%</span>
                <div>Low withdraw fee</div>
            </li>
            <li>
                <span>Safe</span>
                <div>Cold wallet storage</div>
            </li>
            <li>
                <span>0.2%<i style="display: block;position: absolute;top: 42px;left: 28%;">+discount</i></span>
                <div>Low trading fee</div>
            </li>
        </ul>
    </div>
</div>



<script src="js/jquery.dataTables.min.js"></script>
<script src="js/flot.js"></script>
<script src="js/marketlist9493.js?v=1123"></script>

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

        var notyContent='BCX is listed on <?php echo PROJECT_TITLE?>';
        function notyCookie() {
            var noticeMsg = $("#siteNotyCon").text();
            $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }

        var annCookie = $.cookie('notice');
        if(annCookie != notyContent &&  notyContent != ''){
            var sNoty=$("#siteNoty").noty({
                text: "【Notice】: <a id='siteNotyCon' href='/article/16305' target='_blank'>"+notyContent+"</a>",
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
