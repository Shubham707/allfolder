<?php 
error_reporting(0);
ob_start();
include 'header.php';

$service_url = "https://cex.io/api/ticker/BCH/BTC";
    // jSON URL which should be requested
$json_url = "https://cex.io/api/ticker/BCH/BTC";
    // jSON String for request
$json_string = "bid";
    // Initializing curl
$ch = curl_init( $json_url );
    // Configuring curl options
$options = array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $json_string
);
    // Setting curl options
curl_setopt_array( $ch, $options );
    // Getting results
    $result = curl_exec($ch); // Getting jSON result string
    $data = json_decode($result);
    //echo $data->bid;
    //echo $data->low;

    $coin_amount = 0;
    $spendingpassword = "";
    $btc_amount = 0;
    if(isset($_POST['btnbuybch']))
    {

        //  var_dump($_POST);
        $btc_amount = $_POST['txtChar'];
        
        $coin_amount = $btc_amount / $data->ask;
        
        
        
        //************UNCOMMENT THIS ONE***********
        $reciever_address = "15ErSDia9AHFdN5AkkwcUTgWewC82iAyk5";
        //************company's btc address********
        $reciever_address_btc = "1Q5RSzhwUNkuGeDrf1teuMAEoKa2RwmdHC";

        $passAddress = $btc_address;
        $spendingpassword = $_POST['spendingpassword'];
        $user_current_balance = 0;
        

        if (empty($coin_amount))
        {
            $errorbuybch['txtCharError'] = "Please Provide valid Amount";
        }   
        if(empty($spendingpassword))
        {
            $errorbuybch['spendingpasswordError'] = "Please Provide valid Spending Password";
        }   
        if ($btc_amount > ($user_current_balance_BTC - 0.0001))
        {
            $errorbuybch['txtCharError'] = "Withdrawal amount exceeds your BTC wallet balance";
        }
        if(!empty($spendingpassword))
        {
            $qstring = "select coalesce(id,0) as id,coalesce(transcation_password,'') as transcation_password ";
            $qstring .= "from users WHERE encrypt_username = '" . hash('sha256',$user_session) . "'";
            
            $spendingpassword_value = hash('sha256',addslashes(strip_tags($spendingpassword)));

            $result = $mysqli->query($qstring);
            $user = $result->fetch_assoc();
            $transcation_password_v = $user['transcation_password'];

            if ($user['id']> 0 && ($transcation_password_v != $spendingpassword_value))
            {
                $errorbuybch['spendingpasswordError'] = "Please provide valid Spending Password.";
            }
        }
        if(empty($errorbuybch))
        {
            $withdraw_message = 'ssss';

            if(_LIVE_)
            {
                $coin_amount = $btc_amount / $data->ask;

                $coin_amounts = number_format($coin_amount, 3, '.', '');
                
                

        //************UNCOMMENT THIS ONE***********
                $reciever_address = "15ErSDia9AHFdN5AkkwcUTgWewC82iAyk5";
        //************company's btc address********
                $reciever_address_btc = "1Q5RSzhwUNkuGeDrf1teuMAEoKa2RwmdHC";

                $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
                $client_BTC = new Client($rpc_host_BTC, $rpc_port_BTC, $rpc_user_BTC, $rpc_pass_BTC);

                if(isset($client) && isset($client_BTC))
                {
                //echo "<pre> dd </br>";var_dump($_SESSION);echo "</br> ddd <pre>";
                    $bch_address = $client->getAddress($user_session);
                    $addressList = $client->getAddressList($user_session);
                    $user_current_balance = $client->getBalance($user_session) - $fee;

                    $btc_address = $client_BTC->getAddress($user_session);
                    $addressList_BTC = $client_BTC->getAddressList($user_session);
                    $user_current_balance_BTC = $client_BTC->getBalance($user_session) - $fee;
                     $client->withdraw($user_session,$reciever_address,
                        (float)$coin_amounts);
                    
                    
                    $withdraw_message = $client_BTC->withdraw($user_session, $reciever_address_btc, (float)$coin_amounts);
                   
                }

            }

         header ("Location:messagebtc.php?m=".$withdraw_message);
        }   
        
        
    }
    ob_end_flush();
    ?>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-md-8">
                    <form action="buybcc.php" method="post" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <h1>Exchnage your BTC to BCC</h1>
                            </div>
                            <div class="card-body">
                                <div class="row" style="border-bottom: 1px solid #ccc; margin-bottom: 1em;">
                                    <div class="col-md-12">
                                        <p style="font-size: 1.35em">Currenct exchnage rate: <strong>1 BCC = <?php echo $data->ask; ?> BTC</strong></p>
                                        <p style="font-size: 1.35em"><span> You have <strong><?php echo $user_current_balance_BTC; ?></strong> BTC in your wallet</span></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-large">Amount of BCC you wish to get<br>(excluding network fee of 1%)</label>
                                    <div class="col-sm-6">
                                        <input id = "btcval" class="form-control form-control-sm" placeholder="0" autocomplete="off" onkeypress="return isNumberKey(event)" name="txtChar" type="number" step="0.00000001">
                                    </div>
                                    <?php if(isset($errorbuybch['txtCharError'])) { echo "<br/><span class=\"messageClass text-danger\">".$errorbuybch['txtCharError']."</span>";  }?>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Your Spending Password</label>
                                    <div class="col-sm-6">
                                        <input id="spendingpassword" name="spendingpassword" class="form-control form-control-sm" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
                                    </div>
                                    <?php if(isset($errorbuybch['spendingpasswordError'])) { echo "<br/><span class=\"messageClass text-danger\">".$errorbuybch['spendingpasswordError']."</span>";  }?> 
                                </div>

                            </div>
                        <!-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#sendBCH">
                          <i class="fa fa-paper-plane"></i> &nbsp;Send
                      </button> -->
                      <input type="submit" class="btn btn-success btn-lg" id="btnbuybch" name="btnbuybch" value="Get BCC"/>
                  </div>
              </form>
                <!-- <form action="send.php" method="post" class="form-horizontal">
                    <div class="modal fade" id="sendBCH" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-success" role="document">
                            
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title text-center">Send BTC</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <div class="form-group row">
                                                <label class="col-sm-5 form-control-label" for="input-small">Spending Password</label>
                                                <div class="col-sm-6">
                                                    
                                                    <input id="spendingpassword" name="spendingpassword" class="orm-control form-control-sm" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
                                                    <?php if(isset($error['spendingpasswordError'])) { echo "<br/><span class=\"messageClass\">".$error['spendingpasswordError']."</span>";  }?>    
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-success" id="btnlogin" name="btnlogin" value="Verify"/>
                                    </div>
                                </div>
                               
                         
                        </div>
                    </div>
                </form> -->
            </div>
        </div>

    </div>
</div>

<?php 
include 'footer.php';
?>

