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
<link href="css/trade.css" rel="stylesheet" type="text/css">
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
							<tr class="tableOrderTr" t="static" style="display: none" >
								<td width="15%">Lowest ask price</td>
								<td width="40%"><span  id="rate_best_ask" style="font-weight:600"></span><span class="coin-unit">BTC/EOS</span></td>
								<td width="23%"></td>
							</tr>
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
									<input id="ask_rate" class="inputRate" maxlength="10"
										   onkeydown="return check_number(event);"
										   onkeyup="_page.obj.on_input_ask_rate();_page.obj.recalc_fee('ask');"
										   value=""  />
								</td>

							</tr>
							<tr>

								<td colspan="3" class="input-td">
								<span class="b-unit input-title">Amount <?= $currency1;?></span>
									<input id="ask_vol" class="inputRate" maxlength="10"
										onkeydown="return check_number(event);"
										onkeyup="_page.obj.on_input_ask_vol();_page.obj.recalc_fee('ask');"
										value="0" />
								</td>

							</tr>
							<tr>

								<td colspan="3" class="input-td">
								<span class="b-unit input-title" id='bid_total_label'>Total <?= $currency2;?></span>
									<input id="ask_amount" class="inputRate" maxlength="10"
										onkeydown="return check_number(event);"
										onkeyup="_page.obj.on_input_ask_amount();_page.obj.recalc_fee('ask');"
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
									<input type="button" class="btnAskBid jiaoyi_btn  button button-flat-action" t="ask" value="Buy (<?= $currency2.' -> '.$currency1;?>)" />
								</td>
							</tr>
						</table>

                    </div>
                </div>
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

								<tr class="tableOrderTr" t="static" style="display: none" >
									<td width="15%">Highest bid price</td>
									<td width="40%"><span  id="rate_best_bid" style="font-weight:600"></span><span class="coin-unit">BTC/EOS</span></td>
									<td width="23%"></td>
								</tr>
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
										<input id="bid_rate" class="inputRate" maxlength="10"
											   onkeydown="return check_number(event);"
											   onkeyup="_page.obj.on_input_bid_rate();_page.obj.recalc_fee('bid');"
											   value=""  />
									</td>

								</tr>
								<tr>

									<td colspan="3" class="input-td"><span class="b-unit input-title">Amount <?= $currency1;?></span>
										<input id="bid_vol" class="inputRate" maxlength="10"
											   onkeydown="return check_number(event);"
											   onkeyup="_page.obj.on_input_bid_vol();_page.obj.recalc_fee('bid');"
											   value="0" />
									</td>

								</tr>
								<tr>

									<td colspan="3" class="input-td"><span class="b-unit input-title" id='ask_total_label'>Total <?= $currency2;?></span>
										<input id="bid_amount" class="inputRate" maxlength="10"
											   onkeydown="return check_number(event);"
											   onkeyup="_page.obj.on_input_bid_amount();_page.obj.recalc_fee('bid');"
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
										<input type="button" class="btnAskBid jiaoyi_btn  button button-flat-action" t="bid" value="Sell (<?= $currency1.' -> '.$currency2;?>)" />
									</td>
								</tr>
							</table>


						</div>
					</div>
					<div id='divMyOrderSection'><!--style='display:none'-->
						<div class="mairu my-order-box">

			<div class="m_title">
                <span class="order-tab order-t-active" id="ot1">My Orders</span>
				<span class="order-tab" id="ot2">My Trades</span>
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
			<div id="historyOrder" class="m_con cjbox" style="height: 250px;border: 1px solid #ddd;background: #fff;display: none">
				<div id="history-info-box" class="box">
					<div class="list-wrapper">
						<ul class="trade-list_re" id="my-tlist-title">
							<li class="number sorting dealtop">
								<span class='right-align' id="tlist-date">Time</span>
								<span class='right-align my-type'>Type</span>
								<span class='right-align'>Price(BTC)</span>
								<span class='right-align'>Volume(EOS)</span>
							</li>
						</ul>
						<ul id="my-trade-list" class="trade-list_re" style="height: 209px; overflow-y: scroll; overflow-x: hidden;">
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

					 <div class="chengjiao clearfix">
	<div class="bottom_maidan">
		<div class="m_title" style="margin:5px 0 0">
			Trade History
			<ul class="high-low">
				<li>
					High: 0.0002835				</li>
				<li>
					Low: 0.0002452				</li>
			</ul>
		</div>

		<div class="m_con maidan cjbox clearfix" id="sectioncont-history">
			<div id="deal-info-box" class="box">
				<div class="list-wrapper">
					<ul class="trade-list_re">
					<li class="number sorting dealtop">
						<span class="time">Time</span>
						<span class="type">Type</span>
						<span class="price">Price(BTC)</span>
						<span class="amount">Amount(EOS)</span>
						<span class="total">Total(BTC)</span>
					</li>
					</ul>
					<div id="trade-list">
					<ul id="ul-trade-list" data-id="trade-list" class="trade-list_re" 	style="height: 510px;overflow: hidden;">
						<li data-id="list-item" tid="30188417" class="number down odd hanga"><span class="time" data-id="time">23:18:12</span><span class="price" data-id="price">0.0002473</span><span class="amount" data-id="amount">1.00</span><span class="total" data-id="total">0.0002</span></li><li data-id="list-item" tid="30188416" class="number down even hangb"><span class="time" data-id="time">23:18:12</span><span class="price" data-id="price">0.0002486</span><span class="amount" data-id="amount">79.00</span><span class="total" data-id="total">0.0196</span></li><li data-id="list-item" tid="30188399" class="number down odd hanga"><span class="time" data-id="time">23:18:00</span><span class="price" data-id="price">0.0002488</span><span class="amount" data-id="amount">80.00</span><span class="total" data-id="total">0.0199</span></li><li data-id="list-item" tid="30187846" class="number up even hangb"><span class="time" data-id="time">23:08:15</span><span class="price" data-id="price">0.0002612</span><span class="amount" data-id="amount">2.20</span><span class="total" data-id="total">0.0006</span></li><li data-id="list-item" tid="30187845" class="number up odd hanga"><span class="time" data-id="time">23:08:15</span><span class="price" data-id="price">0.0002559</span><span class="amount" data-id="amount">0.11</span><span class="total" data-id="total">0.0000</span></li><li data-id="list-item" tid="30187844" class="number up even hangb"><span class="time" data-id="time">23:08:15</span><span class="price" data-id="price">0.0002529</span><span class="amount" data-id="amount">1.57</span><span class="total" data-id="total">0.0004</span></li><li data-id="list-item" tid="30187599" class="number up odd hanga"><span class="time" data-id="time">23:04:28</span><span class="price" data-id="price">0.0002490</span><span class="amount" data-id="amount">9.16</span><span class="total" data-id="total">0.0023</span></li><li data-id="list-item" tid="30186974" class="number down even hangb"><span class="time" data-id="time">22:52:09</span><span class="price" data-id="price">0.0002481</span><span class="amount" data-id="amount">76.50</span><span class="total" data-id="total">0.0190</span></li><li data-id="list-item" tid="30186973" class="number down odd hanga"><span class="time" data-id="time">22:52:09</span><span class="price" data-id="price">0.0002481</span><span class="amount" data-id="amount">3.50</span><span class="total" data-id="total">0.0009</span></li><li data-id="list-item" tid="30186603" class="number down even hangb"><span class="time" data-id="time">22:47:07</span><span class="price" data-id="price">0.0002511</span><span class="amount" data-id="amount">24.07</span><span class="total" data-id="total">0.0060</span></li><li data-id="list-item" tid="30186592" class="number up odd hanga"><span class="time" data-id="time">22:46:59</span><span class="price" data-id="price">0.0002502</span><span class="amount" data-id="amount">0.29</span><span class="total" data-id="total">0.0001</span></li><li data-id="list-item" tid="30186591" class="number up even hangb"><span class="time" data-id="time">22:46:59</span><span class="price" data-id="price">0.0002502</span><span class="amount" data-id="amount">29.65</span><span class="total" data-id="total">0.0074</span></li><li data-id="list-item" tid="30186583" class="number down odd hanga"><span class="time" data-id="time">22:46:56</span><span class="price" data-id="price">0.0002511</span><span class="amount" data-id="amount">36.74</span><span class="total" data-id="total">0.0092</span></li><li data-id="list-item" tid="30186582" class="number down even hangb"><span class="time" data-id="time">22:46:56</span><span class="price" data-id="price">0.0002512</span><span class="amount" data-id="amount">12.32</span><span class="total" data-id="total">0.0031</span></li><li data-id="list-item" tid="30186554" class="number up odd hanga"><span class="time" data-id="time">22:46:50</span><span class="price" data-id="price">0.0002525</span><span class="amount" data-id="amount">1032.25</span><span class="total" data-id="total">0.2606</span></li><li data-id="list-item" tid="30186551" class="number up even hangb"><span class="time" data-id="time">22:46:49</span><span class="price" data-id="price">0.0002522</span><span class="amount" data-id="amount">231.25</span><span class="total" data-id="total">0.0583</span></li><li data-id="list-item" tid="30186531" class="number up odd hanga"><span class="time" data-id="time">22:46:42</span><span class="price" data-id="price">0.0002511</span><span class="amount" data-id="amount">79.00</span><span class="total" data-id="total">0.0198</span></li><li data-id="list-item" tid="30186357" class="number up even hangb"><span class="time" data-id="time">22:44:54</span><span class="price" data-id="price">0.0002511</span><span class="amount" data-id="amount">10.50</span><span class="total" data-id="total">0.0026</span></li><li data-id="list-item" tid="30186351" class="number up odd hanga"><span class="time" data-id="time">22:44:49</span><span class="price" data-id="price">0.0002511</span><span class="amount" data-id="amount">3.50</span><span class="total" data-id="total">0.0009</span></li><li data-id="list-item" tid="30186346" class="number down even hangb"><span class="time" data-id="time">22:44:43</span><span class="price" data-id="price">0.0002453</span><span class="amount" data-id="amount">6.96</span><span class="total" data-id="total">0.0017</span></li><li data-id="list-item" tid="30186345" class="number down odd hanga"><span class="time" data-id="time">22:44:43</span><span class="price" data-id="price">0.0002464</span><span class="amount" data-id="amount">3.50</span><span class="total" data-id="total">0.0009</span></li><li data-id="list-item" tid="30186344" class="number down even hangb"><span class="time" data-id="time">22:44:43</span><span class="price" data-id="price">0.0002464</span><span class="amount" data-id="amount">23.53</span><span class="total" data-id="total">0.0058</span></li><li data-id="list-item" tid="30186343" class="number down odd hanga"><span class="time" data-id="time">22:44:43</span><span class="price" data-id="price">0.0002464</span><span class="amount" data-id="amount">26.01</span><span class="total" data-id="total">0.0064</span></li><li data-id="list-item" tid="30186336" class="number up even hangb"><span class="time" data-id="time">22:44:39</span><span class="price" data-id="price">0.0002511</span><span class="amount" data-id="amount">65.00</span><span class="total" data-id="total">0.0163</span></li><li data-id="list-item" tid="30186318" class="number down odd hanga"><span class="time" data-id="time">22:44:26</span><span class="price" data-id="price">0.0002501</span><span class="amount" data-id="amount">67.61</span><span class="total" data-id="total">0.0169</span></li><li data-id="list-item" tid="30186216" class="number up even hangb"><span class="time" data-id="time">22:43:50</span><span class="price" data-id="price">0.0002501</span><span class="amount" data-id="amount">78.75</span><span class="total" data-id="total">0.0197</span></li><li data-id="list-item" tid="30186075" class="number down odd hanga"><span class="time" data-id="time">22:41:47</span><span class="price" data-id="price">0.0002508</span><span class="amount" data-id="amount">0.25</span><span class="total" data-id="total">0.0001</span></li><li data-id="list-item" tid="30186003" class="number up even hangb"><span class="time" data-id="time">22:40:43</span><span class="price" data-id="price">0.0002510</span><span class="amount" data-id="amount">29.36</span><span class="total" data-id="total">0.0074</span></li><li data-id="list-item" tid="30186001" class="number up odd hanga"><span class="time" data-id="time">22:40:42</span><span class="price" data-id="price">0.0002510</span><span class="amount" data-id="amount">3.50</span><span class="total" data-id="total">0.0009</span></li><li data-id="list-item" tid="30185990" class="number up even hangb"><span class="time" data-id="time">22:40:27</span><span class="price" data-id="price">0.0002510</span><span class="amount" data-id="amount">46.14</span><span class="total" data-id="total">0.0116</span></li>					</ul>
					</div>
				</div>
				<template data-id="list-item-tpl">
					<li data-id="list-item" tid = "" class="number">
						<span class="time" data-id="time"></span>
						<span class="type" data-id="type"></span>
						<span class="price" data-id="price"></span>
						<span class="amount" data-id="amount"></span>
						<span class="total" data-id="total"></span>

					</li>
				</template>
			</div>
		</div>
	</div>
</div>
<br>

				</div> <!--end of order lists -->

<!--
				<div id='sectioncont1' class="clearfix">

				</div>  -->
			</div> <!--end of right content-->
		</div> <!-- end of main content-->

  </div> <!-- content -->

<script>
	decimal_for_KLine='7';
	themeCookie=$.cookie("mystyle");

	init_data=[];
	trade_global = {};
	trade_global.symbol = 'EOS_BTC';
	trade_global.symbol_view = 'EOS/BTC';
	trade_global.ask = 1.2;
	init_price='';
	global_btc_cny_rate = '109225.69838756';
	global_eth_cny_rate = '3184.7088';
	global_usdt_cny_rate = '7.28000000';
	global_qtum_cny_rate = '80.08';
</script>
		<script>
			var globalPriceType = "Price[ BTC ]", globalVolType = "Volume[ EOS ]";//价格类型/成交量类型

			//全屏模式
			$(".fullscreen").toggle(
					function () {
						$(".kline-on-off").hide();
						$(".right_mcontent,.main_content").css("position","inherit");
						$("body").css("overflow","hidden").scrollTop(0);
						$(".box-container").css("height","93%");
						$(".k-line-container").css({'height':$(window).height(),'position':'absolute','top':'0','left':'0','z-index':'9993','margin-top':'0'}).addClass("fullscreen-con");
						$("#resizeChart,#bigChart").click();
						$(this).find("path").attr("d", "M1.245 16l2.667-2.668 2.045 2.045v-5.334H.623l2.044 2.045L0 14.755m.623-8.798h5.334V.623L3.912 2.667 1.245 0 0 1.245l2.667 2.667m12.71 2.045l-2.045-2.045L16 1.245 14.755 0l-2.667 2.667L10.043.622v5.335M14.755 16L16 14.755l-2.668-2.667 2.045-2.045h-5.334v5.334l2.045-2.045")
						$(".kline-title").css({"left":"19px","top":"12px"}).show();
						$(".line-option").css({"right":"6px"});
					},
					function () {
						$(".kline-on-off").show();
						$("body,.k-line-container,.box-container,.right_mcontent,.main_content,.line-option,.kline-title").attr("style","");
						$(".k-line-container").removeClass("fullscreen-con");
						$("#resizeChart,#smallChart").click();
						$(this).find("path").attr("d", "M4.712 10.043L2.045 12.71 0 10.667V16h5.334L3.29 13.955l2.667-2.667M5.334 0H0v5.334L2.045 3.29l2.667 2.667 1.245-1.245L3.29 2.045M10.666 0l2.045 2.045-2.666 2.667 1.245 1.245 2.666-2.667L16 5.334V0m-4.712 10.043l-1.245 1.245 2.668 2.667L10.668 16H16v-5.334l-2.045 2.045")
					}
			);
			//单次触发resize
			var resizeTimer = null;
			$(window).bind('resize', function () {
				if (resizeTimer) clearTimeout(resizeTimer);
				resizeTimer = setTimeout(function(){

					if( !$(".kline-on-off").is(':visible') ){
						$(".k-line-container").css('height',$(window).height())
					}
					$("#resizeChart").click();//重绘图表
				} , 100);
			});

			//显示隐藏K线图
			function klineOnOff() {
				$(".kline-on-off").toggle(
						function () {
							$(".fullscreen,.k-tools").hide();
							$("#kline").hide();
							$(".k-line-container").animate({
								height: '40px'
							}, 100,function () {

								var ordersCo=$.cookie('orders_num');
								if(ordersCo == 1){ //买卖单cookie=1，显示更多状态下
									var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
									$("#ul-trade-list").css("height","504px");

									var orderList=$("#ulMyOrderList").find("li").size();
									if(orderList < 1) {
										$("#currOrder,#historyOrder").css("height","110px");
										$("#ulMyOrderList,#my-trade-list").css("height","70px");
										$("#my-fund-list").css("height","629px");
									} else {
									$("#currOrder,#historyOrder").css("height",((lh-mh)/2)+266);
									$("#my-fund-list,#ulMyOrderList").css("height",((lh-mh)/2)+225);
									}
								} else {
									var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
									$("#ul-trade-list").css("height","810px");

									var orderList=$("#ulMyOrderList").find("li").size();
									if(orderList < 1) {
										$("#currOrder,#historyOrder").css("height","110px");
										$("#ulMyOrderList,#my-trade-list").css("height","70px");
										$("#my-fund-list").css("height","629px");
									} else {
										$("#currOrder,#historyOrder").css("height", ((lh - mh) / 2) + 266);
										$("#my-fund-list,#ulMyOrderList").css("height", ((lh - mh) / 2) + 225);
									}
								}

							}).css({"overflow": "hidden", "margin-bottom": "0"});
							$(".kline-on-off").find("svg").css("transform", "rotate(180deg)");
							$.cookie('show_kline', '0');
						}, function () {
							$(".k-line-container").animate({
								height: '330px'
							}, 100, function () {
								$(".fullscreen,.k-tools").show();
								$("#kline").show();
								$(this).css({"overflow": "", "margin-bottom": "30px"});
								var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
								if (lh < mh){lb.css("height",mh)}
							});
							$(".kline-on-off").find("svg").attr("style", "");

							var ordersCo=$.cookie('orders_num');
							if(ordersCo == 1){ //买卖单cookie=1，显示更多状态下
								$("#ul-trade-list").css("height","264px");
							} else {
								$("#ul-trade-list").css("height","504px");
							}
								var orderList=$("#ulMyOrderList").find("li").size();
								if(orderList < 1) {
									$("#currOrder,#historyOrder").css("height","110px");
									$("#ulMyOrderList,#my-trade-list").css("height","70px");
									$("#my-fund-list").css("height","349px");
								} else {
									$("#currOrder,#historyOrder").css("height","250px");
									$("#my-fund-list,#ulMyOrderList").css("height","209px");
								}
							$.cookie('show_kline', '1');

						}
				)
			}

			if ($.cookie('show_kline') === '0') { //K线隐藏状态
				$(".fullscreen,.k-tools").hide();
				$("#kline").hide();
				$(".k-line-container").css({"height":"40px","overflow":"hidden","margin-bottom":"0"});
				var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
				$("#ul-trade-list").css("height",lh-mh+560);


				var orderList=$("#ulMyOrderList").find("li").size();
				if(orderList < 1) {
					$("#currOrder,#historyOrder").css("height","110px");
					$("#ulMyOrderList,#my-trade-list").css("height","70px");
					setTimeout(function () {
						$("#my-fund-list").css("height","629px");
					},200)
				} else {
					$("#currOrder,#historyOrder").css("height",((lh-mh)/2)+266);
					$("#my-fund-list,#ulMyOrderList").css("height",((lh-mh)/2)+225);
				}

				$(".kline-on-off").click(function () {
					$(".k-line-container").animate({
						height:'330px'
					}, 100, function () {
						$(".fullscreen,.k-tools").show();
						$("#kline").show();
						$(this).css({"overflow":"","margin-bottom":"30px"});
						$("#resizeChart").click();

						var ordersCo=$.cookie('orders_num');
						if(ordersCo == 1){ //买卖单cookie=1，显示更多状态下
							$("#ul-trade-list").css("height","264px");
						} else {
							$("#ul-trade-list").css("height","504px");
						}
							var orderList=$("#ulMyOrderList").find("li").size();
							if(orderList < 1) {
								$("#currOrder,#historyOrder").css("height","110px");
								$("#ulMyOrderList,#my-trade-list").css("height","70px");
								$("#my-fund-list").css("height","349px");
							} else {
								$("#currOrder,#historyOrder").css("height","250px");
								$("#my-fund-list,#ulMyOrderList").css("height","209px");
							}



						var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
						if (lh < mh){lb.css("height",mh)}
					});
					$(this).attr("style","").unbind('click');
					klineOnOff();
					$.cookie('show_kline', '1');

				}).css("transform", "rotate(180deg)");

			} else{ //K线默认打开状态
				klineOnOff();

			}
			$(".k-tools").hover(function () {
				$(".line-option").show().hover(function () {
					$(this).addClass("lo-active");
				},function () {
					$(this).removeClass("lo-active").hide();
					$(".k-tools").removeClass("tool-active");
				});
				$(this).addClass("tool-active");
			},function () {
				setTimeout(function () {
					if(!$(".line-option").hasClass("lo-active")){
						$(".line-option").hide();
						$(".k-tools").removeClass("tool-active");
					}
				},300);
			});

		</script>

<script src='js/main.chart.js'></script>
<script src="js/trader_en.js"></script>
<script src="js/socket.io.slim.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
$(function() {

	var showFiatRate=$('#hideprice');
	showFiatRate.on('click', function() {
		if ($(this).prop('checked')) {
			$.cookie('show_fiat', '1');
			rebuild_orderbook_trade_list('USD');
		} else {
			$.cookie('show_fiat', '0');
			rebuild_orderbook_trade_list('');
		}
	});
	if ($.cookie('show_fiat') === undefined || $.cookie('show_fiat') === '0') {
		showFiatRate.prop('checked', false);
		rebuild_orderbook_trade_list('');
	} else {
		showFiatRate.prop('checked', true);
		rebuild_orderbook_trade_list('USD');
	}


	var ordersCo=$.cookie('orders_num');
	if(ordersCo == 1){ //买卖单cookie=1，显示更多状态下
		largeOrders();
		$("#moreOrders").toggle(function () {
			smallOrders();
			$.cookie('orders_num', 0,{ path: '/' });
		},function () {
			largeOrders();
			$.cookie('orders_num', 1,{ path: '/' });
		});
	} else {
		if ($.cookie('show_kline') === '0') { //K线隐藏状态
			$("#ul-trade-list").css("height","810px");
		}
		$("#moreOrders").toggle(function () {
			largeOrders();
			$.cookie('orders_num', 1,{ path: '/' });
		},function () {
			smallOrders();
			$.cookie('orders_num', 0,{ path: '/' });
		});
	}

	$("#buyYuE").find("span").click(function () {
		buy_all(7, 2, 4)
	});
	$("#sellYuE").find("span").click(function () {
		sell_all(7, 2, 4)
	});

});

global_precision_vol = 2;
global_precision_total = 4;
_page = trade_operator(1512948054 , "eos_btc", -1, 0.2, 7, 2, 4, 0.2);
_page.main_ask_bid_list.init( 0.0002573 , 0.0002487 );
_page.run();
trade_global.time_line = [[1512790200000,47.34,0.0002746,0.0002746,0.0002746,0.0002746],[1512792000000,39.13,0.0002745,0.0002745,0.0002745,0.0002745],[1512793800000,191.9,0.000274,0.0002761,0.0002705,0.0002761],[1512795600000,1692.04,0.000271,0.000271,0.00027,0.00027],[1512797400000,1382.61,0.0002693,0.0002746,0.0002659,0.0002659],[1512799200000,165.03,0.0002622,0.000268,0.0002622,0.000268],[1512802800000,252.71,0.0002622,0.0002645,0.0002612,0.0002645],[1512804600000,1144.41,0.0002667,0.0002667,0.0002591,0.0002599],[1512806400000,14.77,0.0002599,0.000264,0.0002599,0.0002625],[1512808200000,277.91,0.0002635,0.0002635,0.0002583,0.0002583],[1512810000000,888.88,0.0002624,0.000264,0.000258,0.0002636],[1512811800000,179.63,0.0002659,0.0002667,0.000264,0.000264],[1512813600000,305.61,0.000268,0.0002707,0.000268,0.0002707],[1512815400000,1254.45,0.0002707,0.0002752,0.0002707,0.0002752],[1512817200000,71.31,0.0002715,0.0002715,0.0002715,0.0002715],[1512819000000,2330.83,0.0002752,0.0002822,0.0002752,0.0002818],[1512820800000,1257.21,0.000282,0.0003,0.0002819,0.0003],[1512822600000,451.57,0.0002913,0.0002989,0.0002887,0.0002989],[1512824400000,2592.39,0.0002966,0.0003066,0.0002952,0.0002992],[1512826200000,737.33,0.0002986,0.0002986,0.000291,0.0002919],[1512828000000,52,0.0002882,0.0002885,0.0002881,0.0002885],[1512829800000,147.55,0.0002883,0.0002883,0.0002823,0.0002823],[1512831600000,537.59,0.0002905,0.0002906,0.0002841,0.000287],[1512833400000,1153.34,0.000288,0.0002969,0.0002829,0.0002862],[1512835200000,1668.93,0.0002869,0.0002945,0.0002737,0.0002737],[1512837000000,2324.23,0.0002824,0.0002979,0.000279,0.000281],[1512838800000,129.99,0.000285,0.000285,0.0002807,0.0002848],[1512840600000,2.5,0.000285,0.000285,0.000285,0.000285],[1512842400000,1193.11,0.000281,0.000285,0.000281,0.000285],[1512844200000,964.43,0.0002806,0.0002806,0.0002748,0.0002748],[1512846000000,831.37,0.0002751,0.000281,0.0002744,0.0002799],[1512847800000,804.68,0.000275,0.0002751,0.000272,0.000274],[1512849600000,48.11,0.0002747,0.0002747,0.0002747,0.0002747],[1512851400000,3829.36,0.0002715,0.0002759,0.0002694,0.0002694],[1512853200000,164.96,0.0002645,0.00027,0.000262,0.00027],[1512855000000,331.96,0.00027,0.000275,0.00027,0.0002713],[1512856800000,898.81,0.0002747,0.0002763,0.0002718,0.0002751],[1512860400000,1823.95,0.0002751,0.0002816,0.0002723,0.0002816],[1512862200000,563.53,0.0002824,0.0002824,0.0002746,0.0002824],[1512864000000,1032.51,0.0002777,0.0002835,0.0002733,0.0002804],[1512865800000,360.89,0.0002766,0.0002766,0.000273,0.0002744],[1512867600000,2707.5,0.000277,0.0002823,0.0002751,0.0002751],[1512869400000,1816.12,0.0002744,0.000283,0.000273,0.0002742],[1512871200000,1131.71,0.00028,0.000283,0.0002769,0.000282],[1512876600000,3.5,0.0002769,0.0002769,0.0002769,0.0002769],[1512878400000,989.02,0.000273,0.000273,0.0002703,0.0002703],[1512880200000,248.4,0.0002786,0.000283,0.0002786,0.000283],[1512882000000,233.99,0.000275,0.000275,0.0002725,0.0002725],[1512883800000,100,0.0002791,0.0002791,0.0002791,0.0002791],[1512885600000,343.07,0.0002749,0.0002754,0.0002745,0.0002745],[1512892800000,917.47,0.0002736,0.0002769,0.0002711,0.0002748],[1512896400000,1035.96,0.0002756,0.0002756,0.0002712,0.0002721],[1512898200000,7347.53,0.0002721,0.0002722,0.00027,0.0002721],[1512900000000,53.61,0.0002711,0.0002721,0.0002711,0.0002721],[1512901800000,1846.05,0.000277,0.000277,0.00027,0.00027],[1512903600000,790.45,0.0002739,0.0002762,0.0002684,0.0002721],[1512905400000,2097.8,0.0002704,0.0002765,0.0002679,0.0002765],[1512907200000,7475.56,0.0002714,0.000279,0.000271,0.0002759],[1512909000000,932.64,0.0002759,0.000279,0.0002713,0.000279],[1512910800000,210.93,0.0002781,0.0002787,0.0002728,0.0002743],[1512912600000,1110.5,0.0002744,0.00028,0.000272,0.000276],[1512914400000,279.06,0.0002792,0.0002792,0.0002755,0.0002755],[1512916200000,80.44,0.0002752,0.0002752,0.0002724,0.0002724],[1512918000000,567.86,0.0002765,0.00028,0.0002765,0.0002765],[1512919800000,10.91,0.0002765,0.0002774,0.0002765,0.0002774],[1512921600000,195.88,0.0002713,0.0002713,0.0002713,0.0002713],[1512925200000,377.75,0.0002707,0.0002778,0.0002707,0.0002715],[1512927000000,970.47,0.0002776,0.0002776,0.000272,0.0002776],[1512928800000,1216.29,0.0002773,0.0002799,0.0002702,0.0002757],[1512930600000,542,0.0002784,0.0002784,0.0002712,0.0002762],[1512932400000,1665.07,0.0002751,0.0002782,0.0002659,0.0002682],[1512934200000,1690.72,0.0002684,0.0002719,0.0002631,0.0002704],[1512936000000,321.75,0.000265,0.000268,0.000264,0.000268],[1512937800000,987.26,0.000268,0.0002701,0.0002602,0.0002602],[1512939600000,3002.75,0.0002613,0.0002653,0.0002596,0.0002633],[1512941400000,3928.05,0.0002578,0.000258,0.0002452,0.0002501],[1512943200000,2508.87,0.0002498,0.0002525,0.0002453,0.0002481],[1512945000000,13.04,0.000249,0.0002612,0.000249,0.0002612]];
var datas = trade_global.time_line;
var datas_asks=[["0.0002573","77.00","0.0198"],["0.0002611","183.98","0.0480"],["0.0002660","40.40","0.0107"],["0.0002741","5.23","0.0014"],["0.0002750","2000.00","0.5500"],["0.0002796","4.98","0.0014"],["0.0002800","493.54","0.1382"],["0.0002840","2033.55","0.5775"],["0.0002841","5000.00","1.4205"],["0.0002843","2828.00","0.8040"],["0.0002846","1000.23","0.2847"],["0.0002847","2079.84","0.5921"],["0.0002850","2000.00","0.5700"],["0.0002980","618.89","0.1844"],["0.0002985","48.25","0.0144"],["0.0002986","551.58","0.1647"],["0.0002992","208.89","0.0625"],["0.0003020","85.96","0.0260"],["0.0003066","39.59","0.0121"],["0.0003067","10.00","0.0031"],["0.0003090","1.99","0.0006"],["0.0003100","1.29","0.0004"],["0.0003132","66.00","0.0207"],["0.0003230","23.00","0.0074"],["0.0003330","0.97","0.0003"],["0.0003388","300.00","0.1016"],["0.0003456","214.80","0.0742"],["0.0003600","81.11","0.0292"],["0.0003632","40.92","0.0149"],["0.0003650","9.38","0.0034"],["0.0003693","18.00","0.0066"],["0.0003714","100.00","0.0371"],["0.0003748","11.01","0.0041"],["0.0003785","3.60","0.0014"],["0.0003789","196.00","0.0743"],["0.0003800","185.12","0.0703"],["0.0003899","300.00","0.1170"],["0.0003934","197.69","0.0778"],["0.0003984","605.21","0.2411"],["0.0003990","200.00","0.0798"],["0.0004000","430.70","0.1723"],["0.0004046","200.00","0.0809"],["0.0004083","745.25","0.3043"],["0.0004102","200.00","0.0820"],["0.0004158","370.41","0.1540"],["0.0004183","2398.23","1.0032"],["0.0004306","75.55","0.0325"],["0.0004370","686.53","0.3000"],["0.0004478","2.00","0.0009"],["0.0004825","331.95","0.1602"],["0.0005100","89.50","0.0456"],["0.0005800","88.00","0.0510"],["0.0006300","88.00","0.0554"],["0.0006345","1100.00","0.6980"],["0.0006600","88.00","0.0581"],["0.0006800","88.00","0.0598"],["0.0007100","1.50","0.0011"],["0.0007800","88.00","0.0686"],["0.0008800","28.00","0.0246"],["0.0008889","176.00","0.1564"],["0.0009535","2.00","0.0019"],["0.0009621","88.00","0.0847"],["0.0009800","8.00","0.0078"],["0.0009889","81.55","0.0806"],["0.0010000","99.94","0.0999"],["0.0010437","88.00","0.0918"],["0.0010690","1115.54","1.1925"],["0.0010906","115.76","0.1262"],["0.0011100","123.61","0.1372"],["0.0011416","69.69","0.0796"],["0.0012522","28.00","0.0351"],["0.0013170","5.00","0.0066"],["0.0014700","10.01","0.0147"],["0.0026170","5.00","0.0131"],["0.0037893","328.00","1.2429"],["0.0041000","1.20","0.0049"],["0.0052170","5.00","0.0261"],["0.0071000","1.43","0.0102"],["0.0105170","5.00","0.0526"],["0.0211170","5.00","0.1056"],["0.0279000","643.70","17.9592"],["0.0422170","5.00","0.2111"],["0.0700000","1.50","0.1050"],["0.1100000","1.50","0.1650"],["1.0000000","151402.73","151402.7300"]];
var datas_bids=[["0.0002487","0.96","0.0002"],["0.0002473","278.67","0.0689"],["0.0002452","151.42","0.0371"],["0.0002440","3181.00","0.7762"],["0.0002430","3181.00","0.7730"],["0.0002410","100.00","0.0241"],["0.0002400","391.08","0.0939"],["0.0002314","6673.67","1.5443"],["0.0002313","192.86","0.0446"],["0.0002312","3.02","0.0007"],["0.0002300","100.00","0.0230"],["0.0002242","80.28","0.0180"],["0.0002200","3150.90","0.6932"],["0.0002150","500.00","0.1075"],["0.0002073","4.81","0.0010"],["0.0002050","279.00","0.0572"],["0.0002002","88.41","0.0177"],["0.0002000","259.50","0.0519"],["0.0001961","88.00","0.0173"],["0.0001951","88.00","0.0172"],["0.0001931","88.00","0.0170"],["0.0001921","88.00","0.0169"],["0.0001911","88.00","0.0168"],["0.0001901","88.00","0.0167"],["0.0001891","88.00","0.0166"],["0.0001799","1077.82","0.1939"],["0.0001798","107.34","0.0193"],["0.0001643","11.00","0.0018"],["0.0001539","11.00","0.0017"],["0.0001538","169.05","0.0260"],["0.0001528","224.00","0.0342"],["0.0001523","95.00","0.0145"],["0.0001420","164.29","0.0233"],["0.0001310","620.22","0.0812"],["0.0001200","10750.00","1.2900"],["0.0000911","1351.00","0.1231"],["0.0000841","10.00","0.0008"],["0.0000502","2000.00","0.1004"],["0.0000500","1000.00","0.0500"],["0.0000180","200.00","0.0036"],["0.0000170","5000.00","0.0850"],["0.0000113","100.00","0.0011"],["0.0000001","1000.00","0.0001"]];
var datas_trades=[["23:18:12","0.0002473","1.00","0.0002","1512919092","sell","30188417"],["23:18:12","0.0002486","79.00","0.0196","1512919092","sell","30188416"],["23:18:00","0.0002488","80.00","0.0199","1512919080","sell","30188399"],["23:08:15","0.0002612","2.20","0.0006","1512918495","buy","30187846"],["23:08:15","0.0002559","0.11","0.0000","1512918495","buy","30187845"],["23:08:15","0.0002529","1.57","0.0004","1512918495","buy","30187844"],["23:04:28","0.0002490","9.16","0.0023","1512918268","buy","30187599"],["22:52:09","0.0002481","76.50","0.0190","1512917529","sell","30186974"],["22:52:09","0.0002481","3.50","0.0009","1512917529","sell","30186973"],["22:47:07","0.0002511","24.07","0.0060","1512917227","sell","30186603"],["22:46:59","0.0002502","0.29","0.0001","1512917219","buy","30186592"],["22:46:59","0.0002502","29.65","0.0074","1512917219","buy","30186591"],["22:46:56","0.0002511","36.74","0.0092","1512917216","sell","30186583"],["22:46:56","0.0002512","12.32","0.0031","1512917216","sell","30186582"],["22:46:50","0.0002525","1032.25","0.2606","1512917210","buy","30186554"],["22:46:49","0.0002522","231.25","0.0583","1512917209","buy","30186551"],["22:46:42","0.0002511","79.00","0.0198","1512917202","buy","30186531"],["22:44:54","0.0002511","10.50","0.0026","1512917094","buy","30186357"],["22:44:49","0.0002511","3.50","0.0009","1512917089","buy","30186351"],["22:44:43","0.0002453","6.96","0.0017","1512917083","sell","30186346"],["22:44:43","0.0002464","3.50","0.0009","1512917083","sell","30186345"],["22:44:43","0.0002464","23.53","0.0058","1512917083","sell","30186344"],["22:44:43","0.0002464","26.01","0.0064","1512917083","sell","30186343"],["22:44:39","0.0002511","65.00","0.0163","1512917079","buy","30186336"],["22:44:26","0.0002501","67.61","0.0169","1512917066","sell","30186318"],["22:43:50","0.0002501","78.75","0.0197","1512917030","buy","30186216"],["22:41:47","0.0002508","0.25","0.0001","1512916907","sell","30186075"],["22:40:43","0.0002510","29.36","0.0074","1512916843","buy","30186003"],["22:40:42","0.0002510","3.50","0.0009","1512916842","buy","30186001"],["22:40:27","0.0002510","46.14","0.0116","1512916827","buy","30185990"],["22:40:03","0.0002500","79.00","0.0198","1512916803","buy","30185935"],["22:39:19","0.0002476","14.54","0.0036","1512916759","sell","30185817"],["22:39:19","0.0002477","8.99","0.0022","1512916759","sell","30185816"],["22:39:15","0.0002476","0.25","0.0001","1512916755","buy","30185804"],["22:39:14","0.0002476","79.75","0.0197","1512916754","buy","30185801"],["22:38:24","0.0002475","131.37","0.0325","1512916704","buy","30185719"],["22:38:19","0.0002475","9.51","0.0024","1512916699","buy","30185701"],["22:38:19","0.0002457","52.12","0.0128","1512916699","buy","30185700"],["22:38:19","0.0002457","20.02","0.0049","1512916699","buy","30185698"],["22:38:18","0.0002457","8.85","0.0022","1512916698","buy","30185697"],["22:37:59","0.0002475","16.49","0.0041","1512916679","buy","30185663"],["22:37:59","0.0002469","80.00","0.0198","1512916679","buy","30185662"],["22:37:57","0.0002460","0.18","0.0000","1512916677","buy","30185653"],["22:37:51","0.0002460","19.82","0.0049","1512916671","buy","30185644"],["22:33:32","0.0002491","8.44","0.0021","1512916412","buy","30185316"],["22:33:19","0.0002461","6.86","0.0017","1512916399","sell","30185291"],["22:33:19","0.0002498","3.50","0.0009","1512916399","sell","30185290"],["22:33:13","0.0002498","8.42","0.0021","1512916393","buy","30185275"],["22:31:18","0.0002498","3.82","0.0010","1512916278","buy","30184948"],["22:30:35","0.0002498","66.76","0.0167","1512916235","buy","30184834"],["22:29:55","0.0002501","5.90","0.0015","1512916195","buy","30184731"],["22:29:46","0.0002501","5.90","0.0015","1512916186","buy","30184711"],["22:29:39","0.0002501","5.90","0.0015","1512916179","buy","30184699"],["22:29:37","0.0002501","5.90","0.0015","1512916177","buy","30184694"],["22:29:31","0.0002501","5.90","0.0015","1512916171","buy","30184686"],["22:29:30","0.0002501","5.90","0.0015","1512916170","buy","30184684"],["22:29:24","0.0002501","5.90","0.0015","1512916164","buy","30184672"],["22:27:32","0.0002508","28.70","0.0072","1512916052","buy","30184453"],["22:26:31","0.0002452","52.48","0.0129","1512915991","sell","30184316"],["22:26:31","0.0002500","26.52","0.0066","1512915991","sell","30184315"],["22:26:20","0.0002500","73.48","0.0184","1512915980","sell","30184289"],["22:26:20","0.0002500","4.41","0.0011","1512915980","sell","30184288"],["22:26:20","0.0002501","1.11","0.0003","1512915980","sell","30184287"],["22:26:16","0.0002501","79.00","0.0198","1512915976","sell","30184284"],["22:26:04","0.0002501","15.00","0.0038","1512915964","sell","30184262"],["22:25:45","0.0002501","30.00","0.0075","1512915945","sell","30184236"],["22:25:40","0.0002521","3.50","0.0009","1512915940","sell","30184230"],["22:25:31","0.0002525","1030.48","0.2602","1512915931","buy","30184201"],["22:25:19","0.0002521","113.84","0.0287","1512915919","buy","30184170"],["22:25:18","0.0002521","14.77","0.0037","1512915918","buy","30184169"],["22:25:11","0.0002521","85.28","0.0215","1512915911","buy","30184149"],["22:25:10","0.0002500","30.00","0.0075","1512915910","sell","30184147"],["22:23:34","0.0002535","3.50","0.0009","1512915814","buy","30183977"],["22:23:32","0.0002535","32.63","0.0083","1512915812","buy","30183973"],["22:22:33","0.0002500","65.59","0.0164","1512915753","sell","30183857"],["22:22:33","0.0002501","1.06","0.0003","1512915753","sell","30183856"],["22:22:33","0.0002501","10.40","0.0026","1512915753","sell","30183855"],["22:22:33","0.0002512","1.96","0.0005","1512915753","sell","30183854"],["22:22:24","0.0002512","7.00","0.0018","1512915744","sell","30183834"],["22:21:11","0.0002512","101.09","0.0254","1512915671","sell","30183694"],["22:21:11","0.0002513","8.91","0.0022","1512915671","sell","30183693"],["22:20:47","0.0002512","189.95","0.0477","1512915647","sell","30183644"],["22:20:47","0.0002513","9.53","0.0024","1512915647","sell","30183643"],["22:20:47","0.0002513","0.52","0.0001","1512915647","sell","30183642"],["22:14:49","0.0002531","0.04","0.0000","1512915289","buy","30182962"],["22:14:44","0.0002531","625.42","0.1583","1512915284","buy","30182948"],["22:14:41","0.0002531","78.00","0.0197","1512915281","sell","30182945"],["22:14:30","0.0002559","29.89","0.0076","1512915270","buy","30182936"],["22:14:30","0.0002559","16.47","0.0042","1512915270","buy","30182935"]];
page_obj.recheck();


$("#ask-list").scrollTop($('#ul-ask-list').height());

function checkEmpty(orderTab) {
	updateOrderTab(orderTab, 0);
	}

checkEmpty(0);

	$(".order-tab").click(function () {
		$(this).siblings().removeClass("order-t-active");
		$(this).addClass("order-t-active");
	});
	$("#ot1").click(function () {
		$("#historyOrder").hide();
		$("#currOrder").show();
		checkEmpty(1);
	});
	$("#ot2").click(function () {
		$("#currOrder").hide();
		$("#historyOrder").show();
		checkEmpty(2);
	});

</script>
<?php include 'include/footer.php';?>

<script>
    // $(function(){
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
		// var pb=$("#ProgressBar"),pbWidth=pb.width(),loginbar=$("#topLoginBar"),tmenu=$("#tierMenu"),barcon=$("#pbCon"),barmark=barcon.find("i"),pbar=$("#proBar"),fbar=$("#fproBar"),pro_val='';
		// loginbar.hover(function(){
    //         tmenu.stop().slideDown(200);
    //         $(this).stop().css("color","#f80");
		// 	barmark.css("opacity","0");
		// 	pbar.animate({width:pro_val+'%'},800);
    //     },function(){
    //         tmenu.stop().slideUp(100);
    //          $(this).stop().css("color","#fff");
		// 	 barmark.css("opacity","1");
		// 	 pbar.css('width','0');
    //     });
		// tmenu.css("width",pbWidth);
		// fbar.animate({width:pro_val+'%'},800);
    //     if(pro_val > 0){
    //         fbar.addClass("has-pro-val");
    //     }
    //
		//  $.fn.animateProgress = function(progress, callback) {
		// 	return this.each(function() {
		// 	  $(this).animate({
		// 		width: progress+'%'
		// 	  }, {
		// 		duration: 800,
		// 		easing: 'swing',
		// 		step: function( progress ){
		// 		    $('.value').text(Math.ceil(progress) + '%');
		// 		},
		// 		complete: function(scope, i, elem) {
		// 		  if (callback) {
		// 			callback.call(this, i, elem );
		// 		  };
		// 		}
		// 	  });
		// 	});
		//   };
		//   if(pro_val=='') barcon.animateProgress(0); else barcon.animateProgress(pro_val);
    //
    //     var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
    //     if (lh < mh){lb.css("height",mh)}
    //
    //     $(".side-sev ul li").hover(function(){
    //         var _this=$(this);
    //         _this.find(".sidebox").stop().animate({"width":"165px"},2).css({"background":"#009173"});
    //     },function(){
    //         $(this).find(".sidebox").stop().animate({"width":"45px"},2).css({"background":"none"});
    //     });
    //
    //     $("#bottomWXli").hover(function(){
    //         $(".wx-bottom").show()
    //     },function(){
    //         $(".wx-bottom").hide()
    //     });
		// $("#runTime").hover(function(){
		// 	$(this).css("height","auto")
    //     },function(){
		// 	$(this).css("height","26px")
    //     });
    //
    //     var notyContent='BCX is listed on gate.io';
    //
    //     function notyCookie() {
    //         var noticeMsg = $("#siteNotyCon").text();
    //         $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
    //     }
    //
    //     var annCookie = $.cookie('notice');
    //     if(annCookie != notyContent &&  notyContent != ''){
    //         var sNoty=$("#siteNoty").noty({
    //             text: "【Notice】: <a id='siteNotyCon' href='/article/16305' target='_blank'>"+notyContent+"</a>",
    //             type: 'error',
    //             layout: 'top',
    //             theme: 'gateioNotyTheme',
    //             closeWith: ['button'],
    //             animation: { speed: 0 },
    //             callback: {
    //                 afterShow: function() {
    //                     $("#siteNotyCon").click(function () {
    //                         notyCookie();
    //                         sNoty.close();
    //                     })
    //                 },
    //                 onClose: function() {
    //                     $("#siteNoty").animate({ height:0 },100).css("border","none");
    //                     notyCookie()
    //                 }
    //             }
    //         });
    //     }
    //
    // });
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

    function toThousands(num) {
        var num = (num || 0).toString(), result = '';
        while (num.length > 3) {
            result = ',' + num.slice(-3) + result;
            num = num.slice(0, num.length - 3);
        }
        if (num) { result = num + result; }
        return result;
    }
    $("#usdtAll").text(toThousands(14231739));
    $("#btcAll").text(toThousands(477));
    $("#ltcAll").text(toThousands(9325));
    $("#ethAll").text(toThousands(14054));

</script>
<?php include'include/bch_js.php';?>
</body>
</html>
