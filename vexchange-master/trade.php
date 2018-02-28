<?php
include 'include/allheader.php';
if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);

  $curre=explode("/",$currencyname);
  $currency1=$curre['0'];
  $currency2=$curre['1'];
}

?>
<script>

</script>

<style>
	.side-sev{ top:235px; display: none}
	.header{border-bottom: 2px solid #ddd;}
	.main_content{ margin-bottom: 0}
	.right_mcontent{ padding-top: 15px}
	@media screen and (max-width: 996px) {
		html,body{ min-width: 1257px;}
	}
	/*new ui*/
	.trade-main {width:70%;float:left; padding-right:30px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
	.trade-main .trade-list_re li{ height:34px;border-bottom: 1px solid #eee}
	.trade-main .trade-list_re li.dealtop{ height: 40px;}
	.trade-main .trade-list_re li.dealtop span{ line-height: 40px}
	#order-info-box .right-align{ width: 25%}
	.dealtop #tlist-date,#ulMyOrderList #tlist-date{ width: 20%}
	#my-tlist-title .dealtop #tlist-date{ width: 25%}
	#order-info-box .dealtop span:last-child,#ulMyOrderList li > span:last-child{width: 19%;padding-right: 5px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
	#ulMyOrderList li > span:last-child{padding-right: 10px;}
	.trade-main .right-align {line-height: 38px;}
	.trade-list_re .right-align {line-height: 34px;}
	.trade-main .right-align:first-child { text-align: left; padding-left: 15px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
	.trade-main .m_title{ margin: 0;}
	.trade-main > .mairu .m_con,.trade-main > .maichu .m_con_buy{ margin-top: 10px}
	.trade-main > .mairu,.trade-main > .maichu{height: 370px}
	.trade-main .dealbox td:first-child {width: 30%;}
	.buy-sell-order {width:30%;float:right;}
	.buy-sell-order .bottom_maidan{ margin-bottom: 10px}
	.b-s-title{ margin-top: 14px;border-bottom: 1px solid #C8DAE2;padding-bottom: 5px}
	.b-s-t-left {float:left;}
	.b-s-t-left span { font-size: 20px}
	.b-s-t-left .unit-symbol { margin-left: 10px; color: #666}
	.buy-sell-order .title-line.sorting,.buy-sell-order .number.sorting{ padding-right: 0}
	.b-s-t-right{ float: right}
	#moreOrders{ cursor: pointer; position: relative}
	#moreOrders .caret{margin: 0 0 0 5px;color: #979ca0;}
	#moreOrders:hover,#moreOrders:hover .caret,#moreOrders.more-order-active,#moreOrders.more-order-active .caret{ color: #de5959}
	#moreOrders.more-order-active .caret{transform:rotate(180deg);}
	.rect{height: 30px;position: absolute;right: 0;top: -11px;transform: scaleX(13);z-index: 0;opacity: 0.1;filter: alpha(opacity=10);}
	#trade-list li {height: 24px;line-height: 24px;}
	.trade-list_re li .price,.rect,.trade-list_re li .time{ height: 24px}
	.right-align{ line-height: 24px}
	.title-line .right-align{ line-height: 20px}
	#tableAskList .maichu .maidan,#tableAskList .mairu .maidan{ height: auto}
	#ask-list li,#bid-list li{position: relative; height: 24px}
	#tableAskList{ overflow: hidden; position: relative}
	#tableAskList .maichu{ border-top: 1px solid #ddd; padding-top: 15px}
	#tableAskList .mairu{ padding-bottom: 15px}
	#buyYuE span,#sellYuE span{ cursor: pointer}
	.title-line .price b:before{content: 'Bid/Ask';margin-right: 55px}
	#ul-ask-list .price:before,#ul-bid-list .price:before{margin-right: 56px; color: #008069; font-weight: normal; display: inline-block; width: 36px}
	#ul-bid-list .price:before{color: #de5959;}
	#ul-ask-list,#ul-ask-list li{transform:rotate(180deg);-ms-transform:rotate(180deg);-moz-transform:rotate(180deg);-webkit-transform:rotate(180deg);-o-transform:rotate(180deg);z-index: 9991}
	#ul-ask-list{ height: 768px}
	/*卖单档位名称*/
	#ul-ask-list li:nth-child(1) .price:before{ content: 'Sell1'}
	#ul-ask-list li:nth-child(2) .price:before{ content: 'Sell2'}
	#ul-ask-list li:nth-child(3) .price:before{ content: 'Sell3'}
	#ul-ask-list li:nth-child(4) .price:before{ content: 'Sell4'}
	#ul-ask-list li:nth-child(5) .price:before{ content: 'Sell5'}
	#ul-ask-list li:nth-child(6) .price:before{ content: 'Sell6'}
	#ul-ask-list li:nth-child(7) .price:before{ content: 'Sell7'}
	#ul-ask-list li:nth-child(8) .price:before{ content: 'Sell8'}
	#ul-ask-list li:nth-child(9) .price:before{ content: 'Sell9'}
	#ul-ask-list li:nth-child(10) .price:before{ content: 'Sell10'}
	#ul-ask-list li:nth-child(11) .price:before{ content: 'Sell11'}
	#ul-ask-list li:nth-child(12) .price:before{ content: 'Sell12'}
	#ul-ask-list li:nth-child(13) .price:before{ content: 'Sell13'}
	#ul-ask-list li:nth-child(14) .price:before{ content: 'Sell14'}
	#ul-ask-list li:nth-child(15) .price:before{ content: 'Sell15'}
	#ul-ask-list li:nth-child(16) .price:before{ content: 'Sell16'}
	#ul-ask-list li:nth-child(17) .price:before{ content: 'Sell17'}
	#ul-ask-list li:nth-child(18) .price:before{ content: 'Sell18'}
	#ul-ask-list li:nth-child(19) .price:before{ content: 'Sell19'}
	#ul-ask-list li:nth-child(20) .price:before{ content: 'Sell20'}
	#ul-ask-list li:nth-child(21) .price:before{ content: 'Sell21'}
	#ul-ask-list li:nth-child(22) .price:before{ content: 'Sell22'}
	#ul-ask-list li:nth-child(23) .price:before{ content: 'Sell23'}
	#ul-ask-list li:nth-child(24) .price:before{ content: 'Sell24'}
	#ul-ask-list li:nth-child(25) .price:before{ content: 'Sell25'}
	#ul-ask-list li:nth-child(26) .price:before{ content: 'Sell26'}
	#ul-ask-list li:nth-child(27) .price:before{ content: 'Sell27'}
	#ul-ask-list li:nth-child(28) .price:before{ content: 'Sell28'}
	#ul-ask-list li:nth-child(29) .price:before{ content: 'Sell29'}
	#ul-ask-list li:nth-child(30) .price:before{ content: 'Sell30'}
	#ul-ask-list li:nth-child(31) .price:before{ content: 'Sell31'}
	#ul-ask-list li:nth-child(32) .price:before{ content: 'Sell32'}
	/*买单档位名称*/
	#ul-bid-list li:nth-child(1) .price:before{ content: 'Buy1'}
	#ul-bid-list li:nth-child(2) .price:before{ content: 'Buy2'}
	#ul-bid-list li:nth-child(3) .price:before{ content: 'Buy3'}
	#ul-bid-list li:nth-child(4) .price:before{ content: 'Buy4'}
	#ul-bid-list li:nth-child(5) .price:before{ content: 'Buy5'}
	#ul-bid-list li:nth-child(6) .price:before{ content: 'Buy6'}
	#ul-bid-list li:nth-child(7) .price:before{ content: 'Buy7'}
	#ul-bid-list li:nth-child(8) .price:before{ content: 'Buy8'}
	#ul-bid-list li:nth-child(9) .price:before{ content: 'Buy9'}
	#ul-bid-list li:nth-child(10) .price:before{ content: 'Buy10'}
	#ul-bid-list li:nth-child(11) .price:before{ content: 'Buy11'}
	#ul-bid-list li:nth-child(12) .price:before{ content: 'Buy12'}
	#ul-bid-list li:nth-child(13) .price:before{ content: 'Buy13'}
	#ul-bid-list li:nth-child(14) .price:before{ content: 'Buy14'}
	#ul-bid-list li:nth-child(15) .price:before{ content: 'Buy15'}
	#ul-bid-list li:nth-child(16) .price:before{ content: 'Buy16'}
	#ul-bid-list li:nth-child(17) .price:before{ content: 'Buy17'}
	#ul-bid-list li:nth-child(18) .price:before{ content: 'Buy18'}
	#ul-bid-list li:nth-child(19) .price:before{ content: 'Buy19'}
	#ul-bid-list li:nth-child(20) .price:before{ content: 'Buy20'}
	#ul-bid-list li:nth-child(21) .price:before{ content: 'Buy21'}
	#ul-bid-list li:nth-child(22) .price:before{ content: 'Buy22'}
	#ul-bid-list li:nth-child(23) .price:before{ content: 'Buy23'}
	#ul-bid-list li:nth-child(24) .price:before{ content: 'Buy24'}
	#ul-bid-list li:nth-child(25) .price:before{ content: 'Buy25'}
	#ul-bid-list li:nth-child(26) .price:before{ content: 'Buy26'}
	#ul-bid-list li:nth-child(27) .price:before{ content: 'Buy27'}
	#ul-bid-list li:nth-child(28) .price:before{ content: 'Buy28'}
	#ul-bid-list li:nth-child(29) .price:before{ content: 'Buy29'}
	#ul-bid-list li:nth-child(30) .price:before{ content: 'Buy30'}
	#ul-bid-list li:nth-child(31) .price:before{ content: 'Buy31'}
	#ul-bid-list li:nth-child(32) .price:before{ content: 'Buy32'}

	.top-up a,.login_lan .lang-option,.top-up .ask_ans,.gateio-nav > li > a{ color: #dbe2e4}
	div.top-up {float:right;width:auto;background:none;margin-top:6px;padding-left:0;}
	div.top-dn {width:auto;height:45px;float:left;padding:0 20px;clear:none; float: none}
	.gateio-nav >li >a .caret:before{color:#151b23 !important; }
	.topprice{ display: none}
	#logoWhite{ fill:#eee}
	div.header {color: #aaa;background: #09162e;}
	.dark-body div.header {color: #aaa;background: none;}
	.header .caret:before{ color: #09162e}
	.leftbar,.main_content{ border-top: none}
	.qqtel{ position: inherit; float: left;right: 10px;top: -6px;}
	.cjbox .right-align{ width: 22%}
	#divMyOrderSection{clear: both;padding: 5px 0 30px;}
	.my-order-box{ width: 100%;float: none;}
	.my-order-box .m_title{border: none; margin:0;line-height: 38px;}
	.my-order-box #hidezero  + .vr-btn{ margin-top: 16px}
	#myFunds{ margin-top: 5px}
	#myFunds em{ font-size: 14px; font-style: normal}
	.fund-hide-show{ float: right; font-size: 14px}
	.fund-hide-show .hidezero-span{height: 30px;line-height: 50px; cursor: pointer; user-select: none}
	.fund-hide-show .hidezero-span:hover{ color: #de5959}
	.fund-hide-show #hidezero  + .vr-btn{ margin-top: 18px}
	#showFiatRate .fiat-hide-show{ font-size: 15px;background: #eee;border-radius: 3px;padding: 0 10px;float: right;cursor: pointer; user-select: none}
	.dark-body #showFiatRate .fiat-hide-show {background: #10161d;}
	#showFiatRate .fiat-hide-show:hover{ background: #e3e8f1;}
	.dark-body #showFiatRate .fiat-hide-show:hover {background: #1d232b;}
	#showFiatRate .fiat-hide-show .hidefiat-span{ line-height: 30px; margin-left: 3px}
	#my-fund-list .right-align:last-child{ padding-right: 5px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
	#fund-info-box,#order-info-box,#history-info-box{ position: relative; width: 100%; height: 100%; text-align: center}
	.noorder-tip{ position: absolute;top: 0;width: 100%;padding-top: 50px;}
	#fund-info-box .right-align:nth-child(2){ width: 35%;  }
	#my-fund-list .sub-btn,#ulMyOrderList .sub-btn,#my-trade-list .sub-btn{display: inline-block;width: 140px;margin-top: 10px;}
	#my-fund-list li span .stop-wd,#my-fund-list li span .stop-wd:hover{ color: #888; font-weight: bold}
	#my-fund-title li span:nth-child(2){ text-align: left}
	.my-order-box i{ font-style: normal; margin-top:18px; display: inline-block}
	.my-order-box i.order-tip-icon{ font-style: normal; display: inline-block; width: 18px; height: 18px; line-height: 18px; text-align: center; background: #888; color: #fff; margin-right: 5px; border-radius: 50%}
	#my-fund-list .right-align i{ width: 50%; float: left; text-align: left; margin: 0}
	#my-fund-list .right-align em{ font-style: normal}
	#my-fund-list .my-type,#fund-info-box .my-type{width: 16%!important;}
	.m_title,.mairu .m_title, .maichu .m_title, .bottom_maidan .m_title{ height: 40px;}
	.m_title .clear-all{ font-size: 14px;height: 36px;margin-top: 5px; float: right}
	#sectioncont-history{ height: auto}
	#sectioncont1{ clear: both}
	.order-tab{ margin-right: 15px; cursor: pointer;border-bottom: 3px solid transparent;}
	.order-tab:hover{ color: #de5959}
	.order-t-active{border-color:#de5959;}
	.cjbox{ clear: both}
	#coinStatus li{ line-height: 14px}
	.right-align.price {width: 40%;}
	.volume.right-align {width: 27%;}
	.maidan .sorting:first-child span{ line-height: 40px}
	.fund-deposit, .fund-withdraw{ width: 68px}

	#klineLoader{ display:block;position: inherit; right:auto;height: 100px;width: 100px; margin-top: 80px}
	#klineLoader .loader, #klineLoader .loader:after{ width: 48px; height: 48px}
	#klineLoader p{margin-top: 10px;text-indent: 15px;}
	.dp-link{ margin-left: 10px;}
	.dp-link i{ display: inline-block; width: 16px; height: 16px; line-height:15px; text-align: center;background: #ccc; color: #fff; border-radius: 50%; margin-left: 3px }
	.dp-link:hover i{ background: #f80}
	.mairu .dp-link:hover i{ background: #11C09C}
	.mairu .dp-link:hover{ color: #11C09C}
	.index-modal{height: 100%;width: 100%;position: absolute;top: 0;padding-top: 30px;background: rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
	.index-modal a{ display: block;width: 150px; margin: 7px auto }
	.free-icon{font-size: 15px;background: #f80;color: #fff;padding: 0 6px;line-height: 26px;margin: 10px;border-radius: 3px;border-bottom: 1px solid #de831b;}
	.high-low{ float: right; font-size: 14px}
	.high-low li{ display: inline-block;}
	.high-low li:last-child{margin-left: 15px}
	.k-line-container{height:330px;z-index:0;background:#fff}#kline,.k-line-container{width:100%;position:relative;-webkit-box-sizing:border-box;box-sizing:border-box}#kline{float:left;padding:30px 0}.react-stockcharts-tooltip{fill:#16191b;font-size:12px;fill-opacity:0}.react-stockcharts-toottip line{stroke-opacity:0}.react-stockchart:hover .react-stockcharts-tooltip{fill-opacity:1}.react-stockchart:hover .react-stockcharts-toottip line{stroke-opacity:1}.react-stockcharts-tooltip-label{fill:#787f84}.line-type{position:absolute;top:8px;right:90px;z-index:7}.line-type ul{float:left}.line-type .choosen{margin-right:25px}.line-type ul li{float:left;height:auto}.line-type li:last-child{border-right:0}.line-type button{background:none;border:none;font-family:Microsoft YaHei;color:#333;cursor:pointer;padding:1px 5px;font-size:12px;outline:none}.line-type button:hover{color:#d86767}.btnOn,.line-type .btnOn{color:#d86767}.btnOn:hover,.line-type .btnOn:hover{color:#ff6000}.draw-tools{position:absolute;top:35px;left:-5px;z-index:8;padding-bottom:20px}.draw-tools li{padding:7px;cursor:pointer;position:relative;text-align:center;border-right:1px solid #d1d7e0}.draw-tools li span{position:absolute;top:0;left:45px;display:none;width:92px;font-size:13px;padding:10px 0;text-align:center;background:#37404a;color:#a9b2b9}.draw-tools svg{margin-top:3px}.draw-tools path{stroke:#5c6a75}.draw-tools .tool-cursor{fill:#5c6a75}.draw-tools li:hover{color:#eee}.draw-tools li:hover path{stroke:#f40}.draw-tools li:hover .tool-cursor{fill:#f40}.draw-tools li:hover span{display:block}.tool-cursor{margin:3px 0 0 3px}.draw-tools .caret{position:absolute;top:14px;left:-15px;border-right:6px dashed;border-right:6px solid\9;border-top:6px solid transparent;border-bottom:6px solid transparent;color:#37404a}.draw-tools .caret:before{display:none}.draw-tools .tool-active:hover path,.draw-tools .tool-active path{stroke:#d86767;fill:#d86767}.draw-tools .tool-clear path{stroke:none;fill:#5c6a75}.draw-tools .tool-active.tool-clear-item{background:none}.draw-tools li:hover .tool-clear path{stroke:none;fill:#f40}.draw-tools .tool-active .tool-clear path,.draw-tools .tool-active:hover .tool-clear path{stroke:none}.choose-chart{margin-left:58px;float:left;display:none}.choose-chart.cc2{margin-left:18px}.cho-chart-on{display:block}.choose-chart li{display:inline-block;padding:0 8px;border-right:1px solid #d4d4d4;font-size:11px;cursor:pointer}.choose-chart li:last-child{border:none}.dark-body .choose-chart li{ border-color: #424952}.choose-chart li:hover{color:#d86767}.choose-chart .bc-active,.choose-chart .bc-active:hover{color:#d86767}.curr-lo-time{float:right;margin:10px 58px 0;font-size:13px;border:none;color:#888}.box-padding{padding:3px;margin-bottom:22px}.box-container{width:100%;height:100%;padding:5px}.data-empty{position:absolute;top:0;left:0;width:100%;height:100%;text-align:center;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center}::-webkit-scrollbar{width:6px;height:6px;background:#ddd}::-webkit-scrollbar-track{background:#ddd}::-webkit-scrollbar-thumb{background:#73abb1;right:10px;border-radius:6px}::-webkit-scrollbar-thumb:hover{background:#6acad4}
	.line-option{right:26px;top:35px; display: none}
	.line-option ul{ background: #37404a;padding: 5px}
	.line-option ul li{ float: none}
	.line-option ul button{ padding: 8px;color: #a9b2b9;}
	.line-option ul:before {content:'';position:absolute;top:-6px;left:32px;display:inline-block;width:0;height:0;border-bottom:6px dashed;border-right:6px solid transparent;border-left:6px solid transparent;color:#37404a;}
	.has-trade-warn{ margin-top: 25px}

#ul-ask-list .price:before,#ul-bid-list .price:before{ margin-right: 48px}
	@media screen and (max-width: 1450px){
		.fund-deposit, .fund-withdraw {
			width: 65px;
			font-size: 12px;
		}
		#my-fund-list .right-align, #my-fund-title .right-align {
			width: 21%;
		}
		.high-low li:last-child {
			margin-left: 5px;
		}
	}
	@media screen and (max-width: 1300px){
		.volume.right-align {
			width: 32%;
		}
		.fund-deposit, .fund-withdraw {
			width: 56px;
		}
		div#fund-info-box .right-align:nth-child(2) {
			width: 44%;
		}
	}
  .alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
  }
</style>


<?php include 'include/trade_left.php';?>
<script src="js/jquery.dataTables.min.js"></script>

	<div class="main_content">
		<div class="main_title">
			<h1>
				<ul id="mianTlist" class="clearfix">
					<li><a href="javascript:;">
            <span class="icon-32 icon-32-eos"></span></a>
            <a href="javascript:;"><?= $currency1.' '.$currency1; ?></a> / <strong style="margin-right: 20px"> <?= $currency2; ?> </strong></li>
					<li class="top_last_li">
						<span style="float: left; padding: 0; margin-right: 3px" id='market_unit_symbol'>฿</span>
                    	<span id="top_last_rate_change">
							<i id="currPrice">0.000249</i>
															<small> Or </small><em>$</em><i id="currFiat">3.74</i>
														<em><font  class='red'>-9.56%</font></em><span class=arr-con><i class="caret" id="upArrow"></i><i class="caret" id="dnArrow"></i></span>
						</span>
						<i id="currVol"><small>Volume: </small>฿14.6</i>
					</li>
				</ul>
			</h1>
		</div>



			<div class="right_mcontent clearfix">
<div class="kline-title"><?= $currency1;?> / <?= $currency2;?> KLINE</div>
														<div class="k-line-container box-padding clearfix ">
							<ul class="top_botton">
								<li>
									<span class="button k-tools"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-2.4 120.9 600 600" width="17" height="17"><path d="M594 473.5V368.8h-76c-5.7-23.8-15.2-46.4-27.5-66.4l53.8-53.8-73.9-73.9-53.8 53.4c-20.6-12.8-42.7-21.8-66.4-27.5v-75.9H245.5v75.9c-23.8 5.7-46.4 15.2-66.4 27.5l-53.8-53.8-73.9 73.9 53.4 53.8C92 322.6 83 344.7 77.3 368.4h-76V473h75.9c5.7 23.8 15.2 46.4 27.5 66.4L51 593.3l73.9 73.9 53.8-53.4c20.6 12.8 42.7 21.8 66.4 27.5v75.9h104.6v-75.9c23.8-5.7 46.4-15.2 66.4-27.5l53.8 53.8 73.9-73.9-53.4-53.8c12.8-20.6 21.8-42.7 27.5-66.4H594zm-296.4 69.7c-67.3 0-122.3-54.6-122.3-122.3 0-67.3 54.6-122.3 122.3-122.3 67.3 0 122.3 54.6 122.3 122.3-.4 67.4-54.9 122.3-122.3 122.3z"/></svg></span>
								</li>
								<li>
									<span class="button fullscreen"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M4.712 10.043L2.045 12.71 0 10.667V16h5.334L3.29 13.955l2.667-2.667M5.334 0H0v5.334L2.045 3.29l2.667 2.667 1.245-1.245L3.29 2.045M10.666 0l2.045 2.045-2.666 2.667 1.245 1.245 2.666-2.667L16 5.334V0m-4.712 10.043l-1.245 1.245 2.668 2.667L10.668 16H16v-5.334l-2.045 2.045"/></svg></span>
								</li>
								<li>
									<span class="button kline-on-off"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M0 0v5.333h16V0H0zm15 4.167H1v-3h14v3zM0 16v-5.333h7.12v-1.5H4.23L8 5.393l3.77 3.772H8.88v1.5H16V16H0z"/></svg></span>
								</li>
							</ul>
							<div id="kline" class="box-container clearfix"><div class="load8" id="klineLoader"><div class="loader">Loading</div><p>Loading...</p></div></div>
						</div>


				<div class="trade-main clearfix">



				<div class="mairu mairu-form">
                	<div class="m_title">
                    	<span>Buy <?= $currency1;?></span>
                    </div>
                    <div class="m_con_buy">

						<table class="dealbox" cellspacing="0">

							<tr class="tableOrderTr" t="static" >
								<td width="20%"><font color="#2ba892"><b>Your balance</b></font></td>
								<td id="buyYuE" colspan="2" width="40%" style="color:#2ba892;">
                  <span  id="balance_ask_able" style="font-weight:600">0.0000</span>
                  <span class="coin-unit" style="color:#2ba892"><?= $currency2;?></span></td>
							</tr>
							<tr class="tableOrderTr" t="static" >
								<td>Obtainable</td>
								<td><span  id="amount_ask_able" style="font-weight:600">0.0000</span><span class="coin-unit"><?= $currency1;?></span></td>
								<td></td>
							</tr>

							<tr>

								<td colspan="3" class="input-td">
								<span class="b-unit ask-bid-price input-title">Price <span><?= $currency2.' / '.$currency1;?></span></span>
									<input id="bid_rate" class="inputRate" maxlength="10" onkeydown="return check_number(event);"
										  
										   value=""  />
								</td>

							</tr>
							<tr>

								<td colspan="3" class="input-td">
								<span class="b-unit input-title">Amount <?= $currency1;?></span>
									<input id="bid_vol" class="inputRate" maxlength="10" onkeydown="return check_number(event);"
										value="0" />
								</td>

							</tr>
							<tr>

								<td colspan="3" class="input-td">
								<span class="b-unit input-title" id='bid_total_label'>Total <?= $currency2;?></span>
									<input id="bid_amount" class="inputRate" maxlength="10" onkeydown="return check_number(event);"
										value="0" />
								</td>

							</tr>
							<!-- <tr>
								<td>Fee</td>
								<td>
									<div id="ask_fee" style="display: inline;">0</div>BTC <span style="color: #2ba892;font-size: 12px;">(0.2%)</span>
								</td>
								<td></td>
							</tr> -->
							<tr>
								<td colspan="3" class="input-td" style="border:0">
									<input type="button" class="btnAskBid jiaoyi_btn  button button-flat-action"
                  value="Buy (<?= $currency2.' -> '.$currency1;?>)" onclick="buy_data();"/>
								</td>
							</tr>
              <tr>
								<td colspan="3" class="input-td" style="border:0" id="alertmsg">

								</td>
							</tr>
						</table>

                    </div>
                </div>
               

<!--  ..............ASK FORM............ -->


					<div class="maichu maichu-form">
						<div class="m_title">
							<span>Sell <?= $currency1;?></span>
							<!-- <div class="b-s-t-right" id="showFiatRate">
								<label for="hideprice" class="fiat-hide-show">
									<input type="checkbox" id="hideprice"  name='hideprice' style="width: 20px;" />
									<label for="hideprice" class="vr-btn"></label>
									<span class="hidefiat-span">USD Price</span>
								</label>
							</div> -->
						</div>
						<div class="m_con">

							<table class="dealbox" cellspacing="0">

								<tr class="tableOrderTr" t="static" >
									<td width="15%"><font color="#de5959"><b>Your balance</b></font></td>
									<td id="sellYuE" colspan="2" width="40%" style="color:#de5959;">
                    <span id="balance_bid_able" style="font-weight:600">0.0000</span>
                    <span class="coin-unit" style="color:#de5959"><?= $currency1;?></span></td>
								</tr>
								<tr class="tableOrderTr" t="static" >
									<td>Obtainable</td>
									<td><span  id="amount_bid_able" style="font-weight:600">0.0000</span><span class="coin-unit"><?= $currency2;?></span></td>
									<td></td>
								</tr>

								<tr>

									<td colspan="3" class="input-td"><span class="b-unit ask-bid-price input-title">Price <span><?= $currency2.' / '.$currency1;?></span></span>
										<input id="ask_rate" class="inputRate" maxlength="10"
											   onkeydown="return check_number(event);"
											    />
									</td>

								</tr>
								<tr>

									<td colspan="3" class="input-td"><span class="b-unit input-title">Amount <?= $currency1;?></span>
										<input id="ask_vol" class="inputRate" maxlength="10"
											   onkeydown="return check_number(event);"
											   value="0" />
									</td>

								</tr>
								<tr>

									<td colspan="3" class="input-td"><span class="b-unit input-title" id='ask_total_label'>Total <?= $currency2;?></span>
										<input id="ask_amount" class="inputRate" maxlength="10"
											   value="0" />
									</td>

								</tr>
								<!-- <tr>
									<td>Fee</td>
									<td>
										<div id="bid_fee" style="display: inline;">0</div>EOS <span style="color: #de5959;font-size: 12px;">(0.2%)</span>
									</td>
									<td></td>
								</tr> -->
								<tr>
									<td colspan="3" class="input-td" style="border:0">
										<input type="button" class="btnAskBid jiaoyi_btn  button button-flat-action"
                     t="bid" value="Sell (<?= $currency1.' -> '.$currency2;?>)" onclick="sell_data();"/>
									</td>
								</tr>
                <tr>
  								<td colspan="3" class="input-td" style="border:0" id="alertmsg1">
  							
  								</td>
  								
  							</tr>
							</table>


						</div>
					</div>
        

					<div id='divMyOrderSection'><!--style='display:none'-->
						<div class="mairu my-order-box">

			<div class="m_title">
                <span class="order-tab order-t-active" id="ot1">My Orders</span>
				
				            </div>


			<div id="currOrder" class="m_con cjbox" style="height: 250px;border: 1px solid #ddd;background: #fff;">
				<div id="order-info-box" class="box">
					<div class="list-wrapper">
						<ul class="trade-list_re">
						<li class="number sorting dealtop">
							<span class='right-align' id="tlist-date">Time</span>
							<span class='right-align my-type'>Type</span>
							<span class='right-align'>Price(BTC)</span>
							<span class='right-align'>Amount(EOS)</span>
							<span class='right-align'>Operation</span>
						</li>
						</ul>
						<ul id="ulMyOrderList" class="trade-list_re" 	style="height: 209px; overflow-y: scroll; overflow-x: hidden;">

						</ul>
					</div>

				</div>
			</div>
		
						</div>
						<div class="maichu my-order-box">

	<div class="m_title" id="myFunds">
		My Funds (<a href='/myaccount'>All</a>)
			</div>
<div id="currFunds" class="m_con cjbox" style="border: 1px solid #ddd;background: #fff;">
		<div id="fund-info-box" class="box">
			<div class="list-wrapper">
				<ul class="trade-list_re" id="my-fund-title">
				<li class="number sorting dealtop">
					<span class='right-align my-type'>Currency</span>
					<span class='right-align'>Avaliable</span>
					<span class='right-align'>In orders</span>
					<span class='right-align'>Total</span>

				</li>
				</ul>
				<ul id="my-fund-list" class="trade-list_re" style="height: 209px; overflow-y: auto; overflow-x: hidden; text-align: center;position: relative"></ul>
				<pre id="fundData" style="display: none"></pre>
			</div>

		</div>
	</div>
						</div>
					</div>
				</div>
				<!--end of place order box -->

				<?php include 'include/trade_right.php';?>

					<?php include 'include/functions.php';?> 

				</div>
			</div>
		</div>
  </div>

<script src='js/main.chart.js'></script>
<script src="js/trader_en.js"></script>
<script src="js/socket.io.slim.js"></script>
<script src="js/main.js"></script>

<?php include 'include/footer.php';?>
<script>
setInterval(function(){ $('.alert').hide(); }, 5000);
</script>
</body>
</html>
