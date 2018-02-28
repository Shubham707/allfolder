
<?php include 'include/allheader.php';?>
<?php
ob_start();

/*-----------Add Session-----------*/
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
 }
 $user_session = $_SESSION['user_session'];
   $url_api = URL_API;
 if(isset($_GET['curr']))
        {
          $currencyname=base64_decode($_GET['curr']);

          }
    if (isset($_POST['submit_btn'])) {
        $reciever_address = $_POST['addr'];
        $coin_amount = $_POST['amount'];
        $spendingpassword = $_POST['fundpass'];


        if(isset($_GET['curr']))
        {
          $currencyname=base64_decode($_GET['curr']);


          switch ($currencyname) {

             case 'INRW':

              $postData = array(
                                  "userMailId"=> $user_session,
                                  "amount"=> $coin_amount,
                                  "spendingPassword"=>$spendingpassword,
                                  "recieverINRWCoinAddress"=> $reciever_address

                              );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                      ));
                      $response = file_get_contents($url_api.'/INRW/sendINRW', false, $context);

                          break;
                          case 'EURW':

                               $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverEURWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/EURW/sendEURW', false, $context);

                          break;
                          case 'USDW':
                           $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverUSDWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/USDW/sendUSDW', false, $context);

                          break;

                          case 'GBPW':
                          $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverGBPWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/GBPW/sendGBPW', false, $context);


                          break;

                          case 'BRLW':
                         $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverBRLWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/BRLW/sendBRLW', false, $context);


                          break;

                          case 'PLNW':
                           $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverPLNWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/PLNW/sendPLNW', false, $context);

                          break;

                          case 'CADW':

                          $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverCADWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/CADW/sendCADW', false, $context);

                          break;

                          case 'TRYW':
                          $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverTRYWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/TRYW/sendTRYW', false, $context);

                          break;

                          case 'RUBW':
                         $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverRUBWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/RUBW/sendRUBW', false, $context);

                          break;

                          case 'MXNW':
                         $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverMXNWCoinAddress"=> $reciever_address,
                                                    "commentForReciever"=> "Comment for Reciever",
                                                    "commentForSender"=> "Comment for sender"
                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/MXNW/sendMXNW', false, $context);

                           break;
                          case 'CZKW':
                            $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverCZKWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/CZKW/sendCZKW', false, $context);

                          break;

                          case 'ILSW':
                            $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverILSWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/ILSW/sendILSW', false, $context);

                          break;

                          case 'NZDW':
                         $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverNZDWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/NZDW/sendNZDW', false, $context);

                          break;

                          case 'JPYW':
                           $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverJPYWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/JPYW/sendJPYW', false, $context);

                          break;

                          case 'SEKW':
                           $postData = array(
                                                    "userMailId"=> $user_session,
                                                    "amount"=> $coin_amount,
                                                    "spendingPassword"=>$spendingpassword,
                                                    "recieverSEKWCoinAddress"=> $reciever_address

                                                );

                                        // Create the context for the request
                                        $context = stream_context_create(array(
                                                  'http' => array(
                                                  'method' => 'POST',
                                                  'header' => "Content-Type: application/json\r\n",
                                                  'content' => json_encode($postData)
                                                  )
                                        ));
                                        $response = file_get_contents($url_api.'/SEKW/sendSEKW', false, $context);

                          break;

                          case 'AUDW':
                         $postData = array(
                                          "userMailId"=> $user_session,
                                          "amount"=> $coin_amount,
                                          "spendingPassword"=>$spendingpassword,
                                          "recieverAUDWCoinAddress"=> $reciever_address

                                      );

                              // Create the context for the request
                              $context = stream_context_create(array(
                                        'http' => array(
                                        'method' => 'POST',
                                        'header' => "Content-Type: application/json\r\n",
                                        'content' => json_encode($postData)
                                        )
                              ));
                              $response = file_get_contents($url_api.'/AUDW/sendAUDW', false, $context);

                          break;

                            }
                          }



          if ($response === false) {
            die('Error');
        }


        $responseData = json_decode($response, true);
        $message = "Successfully";
        if (isset($responseData['user'])) {
            header("location:successsend.php?s=".$message);
        } else {
            $error = $responseData['message'];
        }
    }
ob_end_flush();
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

			<div class="m_title"><h4><?php echo $currencyname;?> Withdrawal</h4></div>
			<div class="sectioncont">
			<p style="color:red;text-align:center;font-size:20px;"> <?php if (isset($error)) {echo $error;}?> </p>

				<form name="withdraw_form" id="withdraw_form" enctype="application/x-www-form-urlencoded" method="post" action="">

				<table id='withdrawtable'>


									<tr id="addr_tr">
									<td align="right"><?php echo $currencyname;?> Address:</td>
									<td style="position:relative;">
										<input type="text" name="addr" id="addr" value="" autocomplete="off" size="50" maxlength="50">

									</td>
								</tr>

								<tr>
					<td align="right">Amount (<?php echo $currencyname;?>):</td><td><input onkeypress="return isNumberKey(event)" type="number" value="" size="10" name="amount" id="amount"> <!-- Minimum 15.1 USDT, Maximum 100000 USDT --></td>
				</tr>


				<tr>
					<td align="right">Spending password:</td><td><input type="password" name="fundpass" id="fundpass" size="20"></td>
				</tr>

				<tr>
				<td>&nbsp;</td>
				<td> <input type="Submit" name="submit_btn" id="submit_btn" value="  Submit request " class="sub-btn" ></td>
				</tr>
				</table>

				</form>

				
			</div>


</div> 
  </div> <!-- main content -->


</div>
<?php include 'include/footer.php';?>

</script>
</body>
</html>
<style type="text/css">
  .leftbar{
    min-height: 450px;
  }
</style>

