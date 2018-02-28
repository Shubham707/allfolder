<?php
include 'include/allheader.php';

page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
 }
 $user_session = $_SESSION['user_session'];
  $url_api=URL_API;

$postData = array(
  "userMailId"=> $user_session

  );

  $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));

  $response = file_get_contents($url_api.'/INRW/getTxsListINRW', false, $context);


  $responseData = json_decode($response, true);

  if (isset($responseData['tx'])) {
      $transactionList_BTC = $responseData['tx'];
  }

?>


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

			<style>
    .funds-p-tier b{width: 50%;text-align: right;padding-right: 8px;}
    .en-body .fund-deposit,.en-body .fund-withdraw,.en-body .fund-to-trade{ width: 68px}
    .sectioncont .all-funds-table.dataTable thead tr td:last-child, .sectioncont .all-funds-table.dataTable tr td:last-child {width: 25%;}
    .f-d-info {min-height: 187px;}
</style>

 <div class="sectioncont funds-dtl myfunds-dtl">
    <div class="m_title" id="wallet"> My Trade History </div>
    <div class="HideZeroDiv pull-left" id="hideZbtn"  style="margin-top: 3%;">

    </div>

      <div id="alldetail">
        <style>
          td{
            text-align: center;
          }
        </style>
        <table id="funds" class='dataTable sf-grid all-funds-table table table-bordered' cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                        <th>ORDER DATE</th>
                        <th>BID/ASK</th>
                        <th>UNITS FILLED BCH</th>
                        <th>ACTUAL RATE</th>
                        <th>UNITS TOTAL BCH</th>
                        <th>UNITS TOTAL BTC</th>
                      </tr>
            </thead>
            <tbody id="market_bid_bch"  role="alert" aria-live="polite" aria-relevant="all"> </tbody>
            <tbody id="market_ask_bch"  role="alert" aria-live="polite" aria-relevant="all"> </tbody>
        </table>
      </div>





</div>
<br>
<script src="js/jquery.dataTables.min.js"></script>
<script>


    $.fn.dataTable.ext.search.push(
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

        $('#hideZbtn').on('click', function() {

            if ($('#hidezero').hasClass("zero-active")) {
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


	</div> <!-- right_mcontent -->
  </div> <!-- main content -->


</div>
<?php include 'include/footer.php'; ?>

</body>
</html>
