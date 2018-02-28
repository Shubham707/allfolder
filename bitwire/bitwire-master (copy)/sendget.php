<?php
ob_start();
include 'final_header.php';
/*-----------Add Session-----------*/
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
 if(isset($_GET['curr']))
        {
          $currencyname=base64_decode($_GET['curr']);

          }
    if (isset($_POST['btnsendbtc'])) {
        $reciever_address = $_POST['btcaddress'];
        $coin_amount = $_POST['txtChar'];
        $spendingpassword = $_POST['spendingpassword'];


        if(isset($_GET['curr']))
        {
          $currencyname=base64_decode($_GET['curr']);


          switch ($currencyname) {

             case 'inrw':
      
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
                          case 'eurw':
                        
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
                          case 'usdw':
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
                          
                          case 'gbpw':
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
                          
                          case 'brlw':
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
                          
                          case 'plnw':
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
                          
                          case 'cadw':
                         
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
                          
                          case 'tryw':
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
                          
                          case 'rubw':
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
                          
                          case 'mxnw':
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
                          case 'czkw':
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
                          
                          case 'ilsw':
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
                          
                          case 'nzdw':
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
                          
                          case 'jpyw':
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
                          
                          case 'sekw':
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
                          
                          case 'audw':
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

                          default:
                $currencyname='inrw';
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

<div class="" style="margin-bottom: 48px;">
    <div class="">
        <div class="row balance-div" style="border-left:none;">
            <div class="col-md-10">
                
                <a class="btn" href="sendget.php?curr=<?php echo base64_encode($currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode($currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper($currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?=strtoupper(substr($currencyname,0,3)); ?></a>
                  <a class="btn" href="withdraw.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Withdraw <?=strtoupper(substr($currencyname,0,3)); ?></a>
            </div>
            
        </div>
        <div class="row justify-content-center"  >
            <div class="col-sm-6 col-md-6">
                <form action="" method="post" class="form-horizontal">
                    <div class="card  bg-success">
                        <div class="card-header">
                            <div class="row text-center">
                            <div class="col-md-8 text-center">
                                    <h2  class="font-custom">Send  <?= strtoupper($currencyname); ?></h2>
                                    </div>
                                
                            </div>
                        </div>
                        <p style="color:red;text-align:center"> <?php if (isset($error)) {echo $error;}?> </p>
                        <div class="card-body bg-white text-center text-success" style="    padding: 10px; border: 1px solid; background-color: #f8f8f8 !important;">
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Receiver Address</label>
                                    <div class="col-sm-6">
                                        <input id="btcaddress"  name ="btcaddress" class="form-control" placeholder="Paste your <?= strtoupper($currencyname); ?> Address" autocomplete="off" type="text" value="">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-large">Amount( <?= strtoupper($currencyname); ?> + network Fee of 0.0008)</label>
                                    <div class="col-sm-6">

                                        <input id = "btcval" class="form-control form-control-sm" placeholder="0" autocomplete="off" onkeypress="return isNumberKey(event)" name="txtChar" type="number" step="0.00000001">

                                    </div>

                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Spending Password</label>
                                    <div class="col-sm-6">

                                        <input id="spendingpassword" name="spendingpassword" class="form-control form-control-sm" autocomplete="off" type="password" value="">

                                    </div>

                                </div>

                        </div>
                        <input type="submit" class="btn btn-info btn-lg" id="btnsendbtc" name="btnsendbtc" value="Send"/>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php
    include 'footer.php';
?>
