<?php
    include 'final_header.php';
    include_once('common.php');
    page_protect();
    if (!isset($_SESSION['user_id'])) {
        logout();
    }

   $user_session = $_SESSION['user_session'];

$postData = array(
  "userMailId"=> $user_session
  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));




if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);

  switch ($currencyname) {
        case 'inrw':
                if($_SESSION['INRWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/INRW/getNewINRWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/INRW/getINRWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

                
            
        break;
        case 'usdw':
          if($_SESSION['USDWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/USDW/getNewUSDWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/USDW/getUSDWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'gbpw':
          if($_SESSION['GBPWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/GBPW/getNewGBPWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/GBPW/getGBPWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'brlw':
        if($_SESSION['BRLWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/BRLW/getNewBRLWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/BRLW/getBRLWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'plnw':
          if($_SESSION['PLNWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/PLNW/getNewPLNWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/PLNW/getPLNWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'cadw':
           if($_SESSION['CADWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/CADW/getNewCADWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/CADW/getCADWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'tryw':
          if($_SESSION['TRYWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/TRYW/getNewTRYWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/TRYW/getTRYWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'rubw':
         if($_SESSION['RUBWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/RUBW/getNewRUBWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/RUBW/getRUBWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'mxnw':
          if($_SESSION['MXNWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/MXNW/getNewMXNWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/MXNW/getMXNWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'czkw':
          if($_SESSION['CZKWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/CZKW/getNewCZKWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/CZKW/getCZKWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'ilsw':
          if($_SESSION['ILSWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/ILSW/getNewILSWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/ILSW/getILSWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'nzdw':
          if($_SESSION['NZDWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/NZDW/getNewNZDWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/NZDW/getNZDWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'jpyw':
           if($_SESSION['JPYWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/JPYW/getNewJPYWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/JPYW/getJPYWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'sekw':
           if($_SESSION['SEKWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/SEKW/getNewSEKWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/SEKW/getSEKWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'audw':
           if($_SESSION['AUDWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/AUDW/getNewAUDWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/AUDW/getAUDWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
         case 'eurw':
          if($_SESSION['EURWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/EURW/getNewEURWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/EURW/getEURWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
                default :
                    $currencyname='inrw';
                if($_SESSION['INRWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/INRW/getNewINRWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/INRW/getINRWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }
               
        
    }



}
?>


<form >
<div class="" style="margin-bottom: 48px !important;">
    <div class=" ">
        <div class="row balance-div" style="border-left:none;">
            <div class="col-md-10">
                
                <a class="btn" href="sendget.php?curr=<?php echo base64_encode($currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode($currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper($currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?= strtoupper(substr($currencyname,0,3));  ?></a>
                  <a class="btn" href="withdraw.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Withdraw <?= strtoupper(substr($currencyname,0,3));  ?></a>
                 
            </div>
            
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 text-center">
                <div class="card text-white bg-success">
                    <div class="card-header text-center">
                        <h3 class="font-custom">Receive <?= strtoupper($currencyname); ?> <br>

                        </h3>
                        <span class="text-muted">Receive <?= strtoupper($currencyname); ?> to this address</span>
                    </div>
                    <div class="card-body text-center bg-white text-success">
                        <a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $bcc_address;?>">
                                                 <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $bcc_address?>"
                                                alt="QR Code" style="width:200px;border:0;"/></a><br>
                        <?php echo $bcc_address;?>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</form>
<?php    include 'footer.php'; ?>
