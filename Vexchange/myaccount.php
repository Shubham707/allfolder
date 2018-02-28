<?php
include 'include/allheader.php'; ?>


<div class="content">

	<link href="css/usercenter.css" rel="stylesheet" type="text/css">
<?php include 'include/left_side_menu.php';?>

<script type="text/javascript">
	$(document).ready(function() {

		var accordion_head = $('.accordion > li > a'),
			accordion_body = $('.accordion li > .sub-menu');
		// Open the first tab on load
		//accordion_head.first().addClass('active').next().slideDown('normal');
		//accordion_body.eq(2).find('a').eq(2).css('background', ' #efefef');
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
    .funds-p-tier b{width: 50%;text-align: right;padding-right: 8px;}
    .en-body .fund-deposit,.en-body .fund-withdraw,.en-body .fund-to-trade{ width: 68px}
    .sectioncont .all-funds-table.dataTable thead tr td:last-child, .sectioncont .all-funds-table.dataTable tr td:last-child {width: 25%;}
    .f-d-info {min-height: 187px;}
</style>
<!-- <ul class="my-top-info clearfix">
	<li>
		<h3>My ID</h3>
		<b>653933</b>
	</li>
	<li>
		<h3>Current Tier</h3>
		<strong class="tier-level tier-icon0"></strong>
			</li>
	<li>
		<h3>Trading Fee Discount</h3>
		<strong>0% Off</strong>
	</li>
	<li>
		<h3>30-day Trading Volume</h3>
		<strong>0</strong><i class="vol30-unit"> BTC</i> <!--<div class="fund-top-small">or <strong>0</strong> CNY</div>-->
	<!-- </li>
</ul>
<div class="lv-prog">
	<span class="pro-dtl">You need <strong class="red">3.0</strong> BTC or <strong class="red">336271</strong> CNY to reach next tier.</span>
	<div id="fprogrLi">
		<div id="fproBar"><span>Progress Toward Next Tier: <b>0.0%</b></span></div>
	</div>
</div>
<div id="crFund">Total funds estimation:
	<i class="red">0.00 USD</i> or <i class="red">0.00000 BTC</i>
	<!--<p class="fund-tips">注：资金总估是由历史行情估算值，仅为用户提供一个参考，请以单项资金为准</p>-->
<!-- </div>-->
 <div class="sectioncont funds-dtl myfunds-dtl">
    <div class="m_title" id="wallet"> Currencies: </div>
    <div class="HideZeroDiv pull-left" id="hideZbtn">
        <label for="hidezero">
        <input type="checkbox" id="hidezero"  name='hidezero' style="width: 20px;" />
        <label for="hidezero" class="vr-btn"></label>
        <span class="hidezero-span">Hide zero balances</span>
        </label>
        <input type="hidden" id="min"><input type="hidden" id="max">
    </div>
    <table id="funds" class='dataTable sf-grid all-funds-table' cellspacing="0" cellpadding="0">
        <thead>
            <tr role="row" style="height:40px">
                <th align='right'><b>Type</b></th>
                <th align='right'><b>Balance</b></th>
                <th align='right'><b>In Orders</b></th>
                <th align='right'><b>Total</b></th>
                <th align='right'><b>USD Estimation</b></th>
                <th align='right'><b>Operation</b></th>
            </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php
				$obj=NEW allapi();
				$data=$obj->getallcurrency();
				$result=json_decode($data);
        foreach($result as $currencyname){ ?>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-usdt'></span><span style='color:#08a287'>
                    <b><?php echo $currencyname; ?></b></span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href="deposit.php?curr=<?php echo base64_encode($currencyname);?>" class='normal-depo fund-deposit'
					 title='Working'>Deposit</a>
					<a href="withdraw.php?curr=<?php echo base64_encode($currencyname);?>" class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href="transaction.php?curr=<?php echo base64_encode($currencyname);?>" class='normal-depo fund-to-trade' title='Working'>History</a></td>
                </tr>
                <?php }?>
                    </tbody>
    </table>


   <div class="m_title"> Recent Deposits (<a href='/myaccount/mydeposits'>More...</a>)</div>
    <table class='sf-grid table-inacc table-inacc-head'>
			<thead>
			<tr>
				<th><b>No.</b></th>
				<th align='left'><b>Time</b></th>
				<th align='right'><b>Amount</b></th>
				<th align='right'><b>TxID</b></th>
				<th align='right'><b>Confirmations</b></th>
				<th align='right'><b>Status</b></th>
			</tr>
		</thead>
	</table>
	<div class="table-scroll">
		<table class='sf-grid table-inacc table-inacc-body' id="latestDepo">
			<tbody>
							<tr class="table-empty">
					<td style="text-align: center"><p><i>i</i>No record.</p></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="m_title"> Recent Withdrawals (<a href='/myaccount/mywithdrawals'>More...</a>): </div>
    <table class='sf-grid table-inacc table-inacc-head'>
			<thead>
			<tr>
				<th><b>No.</b></th>
				<th align='left'><b>Time</b></th>
				<th align='right'><b>Amount</b></th>
				<th align='right'><b>Address/TXID</b></th>
				<th align='right'><b>Status</b></th>
				<th align='right'><b>Operations</b></th>
			</tr>
		</thead>
	</table>
	<div class="table-scroll">
		<table class='sf-grid table-inacc table-inacc-body' id="latestWith">
			<tbody>
							<tr class="table-empty">
					<td style="text-align: center"><p><i>i</i>No record.</p></td>
				</tr>
			</tbody>
		</table>
	</div>

</div>
<br>
<script src="js/jquery.dataTables.min.js"></script>
<script>
    $.fn.dataTable.ext.search.push( //推送有资金的区间给datatable
            function( settings, data, dataIndex ) {
                var min = parseFloat( $('#min').val());
                var max = parseFloat( $('#max').val());
                var acc = parseFloat( data[1] ) || 0; // 总金额列数据
                if ( ( isNaN( min ) && isNaN( max ) ) ||
                        ( isNaN( min ) && acc <= max ) ||
                        ( min <= acc   && isNaN( max ) ) ||
                        ( min <= acc   && acc <= max ) )
                {
                    return true;
                }
                return false;
            }
    );

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
	}

    $( function () {

        var tableIndex=$('#funds').DataTable({
            "dom": '<"top"f>rt<"bottom"ip><"clear">',
            "pageLength": 12,
            "autoWidth": false,
            "language": {
                "sInfoEmpty":"0 matching records",
                "sSearch": ""
            },
            "order": [
                [4, null]
            ],//改第5列排序为默认
            "columnDefs": [
                { "orderable": false, "targets": [ 5 ] }
            ]
        });

		tableIndex.on('draw.dt',function() {
			var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
			lb.css("height",mh)
		});
		/*tableIndex.on('page.dt',function() {
			$("html, body").animate({ scrollTop: $('#wallet').offset().top }, 10);
		});*/
        //检测cookie,只显示有资金币种
        if ($.cookie('show_zero_funds') === undefined || $.cookie('show_zero_funds') === '0') {//显示全部
            $('#hidezero').prop('checked', false).removeClass('zero-active');
            $('#min,#max').val('');
            tableIndex.draw();
        } else { //只显示有资金
            $('#hidezero').prop('checked', true).addClass('zero-active');
            $('#min').val('0.00000001');
            $('#max').val('9999999999');
            tableIndex.draw();
        }

        $('#hideZbtn').on('click', function() { //点击显示/隐藏有资金币种按钮

            if ($('#hidezero').hasClass("zero-active")) { //有资金币种显示
                $('#min,#max').val('');
                tableIndex.draw();
                setTimeout(function(){$('#hidezero').removeClass('zero-active')},200);
                $.cookie('show_zero_funds', '0',{ expires:30,path: '/' });

            } else { //全部币种显示
                $('#min').val('0.00000001');
                $('#max').val('9999999999');
                tableIndex.draw();
                setTimeout(function(){$('#hidezero').addClass('zero-active')},200);
                $.cookie('show_zero_funds', '1',{ expires:30,path: '/' });

            }
        });

		var $dep=$("#latestDepo"), $wit=$("#latestWith");
		if($dep.find("tr").size() > 5){
			$dep.parent().css("padding-right","10px").prev("table").css("padding-right","26px");
		} else if($dep.find("tr").size() == 1){
			$dep.find(".table-empty").show()
		}
		if($wit.find("tr").size() > 5){
			$wit.parent().css("padding-right","10px").prev("table").css("padding-right","26px");
		} else if($wit.find("tr").size() == 1){
			$wit.find(".table-empty").show()
		}
		$("td:contains('Done')").css("color","#008069");
		$("td:contains('Cancelled')").css("color","#888");
		$("td:contains('Rejected')").css("color","#a00");
		$("td:contains('Pending')").css("color","#dc9a00");
		$("td:contains('Verifying')").css("color","#f60");
		$("td:contains('Processing')").css("color","#0086b3");

});

</script>


		<br>
















































	</div> <!-- right_mcontent -->
  </div> <!-- main content -->


</div>
<?php include 'include/footer.php'; ?>

<!-- force user to use https -->


<script>
    $(function(){
    //     //nav标记
    //     var currUrl=window.location.toString();
    //     if(currUrl.indexOf('/trade/') > 0){
    //         $.cookie('nav_index', 1,{ path: '/' });
    //     } else if(currUrl.indexOf('/login') > 0 || currUrl.indexOf('/article/') > 0 || currUrl.indexOf('/page/') > 0 || currUrl.indexOf('/fee') > 0){
    //         $.cookie('nav_index', 9,{ path: '/' });
    //     } else if(currUrl.indexOf('/coins') > 0){
    //         $.cookie('nav_index', 4,{ path: '/' });
    //     }
    //     $(".gateio-nav").children("li").click(function () {
    //         $.cookie('nav_index', $(this).index(),{ path: '/' });
    //     }).eq($.cookie('nav_index')).addClass("nav-active");
    //     $(".user-log-out a,.more-lan a").click(function () {
    //         $.cookie('nav_index', 0,{ path: '/' });
    //     });
		// //用户等级
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
        var notyContent='SMT(SmartMesh) is listed on gate.io(10 million bonus)';

        function notyCookie() { //设置通知cookie
            var noticeMsg = $("#siteNotyCon").text();
            $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }
        //
        // var annCookie = $.cookie('notice');
        // if(annCookie != notyContent &&  notyContent != ''){ //通知有更新时
        //     var sNoty=$("#siteNoty").noty({
        //         text: "【Notice】: <a id='siteNotyCon' href='/article/16307' target='_blank'>"+notyContent+"</a>",
        //         type: 'error',
        //         layout: 'top',
        //         theme: 'gateioNotyTheme',
        //         closeWith: ['button'],
        //         animation: { speed: 0 },
        //         callback: {
        //             afterShow: function() {
        //                 $("#siteNotyCon").click(function () {
        //                     notyCookie();
        //                     sNoty.close();
        //                 })
        //             },
        //             onClose: function() {
        //                 $("#siteNoty").animate({ height:0 },100).css("border","none");
        //                 notyCookie()
        //             }
        //         }
        //     });
        // }

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
    $("#usdtAll").text(toThousands(37489002));
    $("#btcAll").text(toThousands(1006));
    $("#ltcAll").text(toThousands(16239));
    $("#ethAll").text(toThousands(25649));

</script>
</body>
</html>
