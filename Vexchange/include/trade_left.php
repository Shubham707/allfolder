
<div class="content index-content clearfix">
	<table class="leftbar">
    <tr>
        <td style="border-bottom:0;" valign="top">
            <div id="marketlist_wrapper" class="dataTables_wrapper" role="grid">



		<table class="marketlist dataTable" id="tradelist" cellspacing="0" cellpadding="0">

    <tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr>
            <td class="no-wrap alignRight" width="100%" style="border-bottom:0">
                <ul id='market_controller' class="clearfix">

									<?php
										$i=1;
									foreach($result as $cat) { ?>
											<button value="<?php echo $cat->name;?>" class="tline_btn left_btn <?php if($i==1){echo "tn_selected";} ?>"><?php echo $cat->name;?></button>
											<?php $i++; }?>
                  
                </ul>
                <!-- <input type="text" class="search" id="marketSearch" value="Search..." /> -->
            </td>
          </tr>

     	<tr>
				<?php foreach($result as $cat) {?>
            <td id='marketlist_container_<?php echo strtolower($cat->name);?>'
							 class="no-wrap alignRight" style="width:100%;display:none;">
            <table class="dataTable" id="marketlist_<?php echo strtolower($cat->name);?>">
							<thead>
								<tr role="row" style="height:40px">
										<th class="no-wrap sortable sorting"><b>Type</b></th>
										<th class="no-wrap sortable sorting">Price<span id="leftPriceType">(<?php echo $cat->name;?>)</span></th>
										<th class="no-wrap sortable sorting" id="leftbarupdntop">24h %</th>
									</tr>
			</thead><tbody>
			<?php
			$i=1;
			foreach($subcat[$cat->id]['subcat'] as $subcatgory)
				{?>
				 <tr role="row" class="<?php if($i% 2 == 0){ echo "even";}else{echo "odd";}?>">
				  <td><a href="trade.php?curr=<?php echo base64_encode($subcatgory);?>"><?php echo $subcatgory?></a></td>
				  <td class="alignRight"><a href="trade.php?curr=<?php echo base64_encode($subcatgory);?>">12</a></td>
				  <td class=" alignRight"><a href="trade.php?curr=<?php echo base64_encode($subcatgory);?>">1231</a></td>
				</tr>

			<?php $i++;}?>

					</tbody>
							</table>

							</td>
						<?php }?>

          </tr>

		</tbody>
	</table>

	</div>
	</td>
	</tr>
</table>

<script>

    $(function () {
      var base = 'BTC';
			var marketCom = $("#marketlist_container_btc");

        var item = marketCom.find("[data-trade='EOS_BTC']");

            marketCom.css('display', 'block').siblings().css('display', 'none');

        if (item.length > 0) {
            item.closest('tr').addClass('coin-selected');
        }

        $("#market_controller").find("button").click(function () {
            $("#market_controller").find("button").removeClass("tn_selected");
            $(this).addClass("tn_selected").siblings().removeClass("tn_selected");



            var td = $(this).attr('value');


            if (td == 'BTC') {
							$("#marketlist_container_bch,#marketlist_container_ltc").css('display', 'none');
                $("#marketlist_container_btc").css('display', 'block');
                base = 'USDT';
            } else if (td == 'BCH') {
							$("#marketlist_container_btc,#marketlist_container_ltc").css('display', 'none');
                $("#marketlist_container_bch").css('display', 'block');
                base = 'BTC';
            } else if (td == 'LTC') {
							$("#marketlist_container_btc,#marketlist_container_bch").css('display', 'none');
                $("#marketlist_container_ltc").css('display', 'block');
                base = 'ETH';
            }


        return false;
    });

// 	$('#marketSearch').keyup(function(e) {
// 		var needle = $(this).val();
// 		$.each($('.bizhong_en'),
// 		function() {
// 			var symbol = $(this).html();
// 			if (symbol.toLowerCase().indexOf(needle.toLowerCase()) == -1) {
// 				$('#' + $(this).attr('line_id')).hide();
// 			} else {
// 				$('#' + $(this).attr('line_id')).show();
// 				 if (e.keyCode == 13) {
// 					window.location = "/trade/"+symbol+"_"+base;
// 				}
// 			}
// 		});
// 	}).focus(function() {
//         if ($(this).val() === 'Search...') {
//             $(this).val('');
//         }
//     }).blur(function() {
//         if ($(this).val() === '') {
//             $(this).val('Search...');
//         }
//     });
 });

</script>
