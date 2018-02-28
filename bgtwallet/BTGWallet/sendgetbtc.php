<?php 
    ob_start();
    include 'header.php';
    /*-----------Add Session-----------*/
    page_protect();
    if(!isset($_SESSION['user_id']))
    {
        header("location:logout.php");
    }
    $user_session = $_SESSION['user_session'];

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

    $errorsendbtc = array();
    $coin_amount = 0;
    $spendingpassword = "";
    $reciever_address= "";
    if(isset($_POST['btnsendbtc']))
    {

        //  var_dump($_POST);
       
        $reciever_address = $_POST['btcaddress'];
        $coin_amount = $_POST['txtChar'];


        $passAddress = $userBTCaddress;
        $spendingpassword = $_POST['spendingpassword'];
        $user_current_balance = 0;
        
          
        
        if (empty($reciever_address) )
        {
            $errorsendbtc['reciever_addressError'] = "Please Provide valid Address";
        }  
        if (empty($coin_amount))
        {
            $errorsendbtc['txtCharError'] = "Please Provide valid Amount";
        }   
        if(empty($spendingpassword))
        {
            $errorsendbtc['spendingpasswordError'] = "Please Provide valid Spending Password";
        }   
        if ($coin_amount > ($userBTCBalance - 0.001))
        {
            $errorsendbtc['txtCharError'] = "Withdrawal amount exceeds your BTC wallet balance";
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
                $errorsendbtc['spendingpasswordError'] = "Please provide valid Spending Password.";
            }
        }
        
        if(!empty($reciever_address)){
            try
              {
                if ($block_io->withdraw_from_labels(array('amounts' => $coin_amount, 'from_labels' => $user_session, 'to_addresses' => $reciever_address, 'pin' => 'boosters1234'))->status == 'success')
                { 
                    $withdraw_message = 'Success ';
                    header("Location:messagebtc.php?m=".$withdraw_message);
                }
              }
              catch (Exception $e) 
              {
                $errorsendbtc['reciever_addressError'] = $e->getMessage();
              }
        }
        
        
    }
    ob_end_flush();
?>

<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center" >
            <div class="col-sm-6 col-md-6">
                <form action="sendgetbtc.php" method="post" class="form-horizontal">
                    <div class="card  bg-success">
                        <div class="card-header">
                            <div class="row text-center">
                                <div class="col-md-8 text-center">
                                    <h1>Send BTC</h1>
                                    <span>1 BTC = <?php echo $currentPrice; ?> USD</span>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <span class=" pull-right"><span class="font-weight-bold"><?php echo $userBTCBalance; ?> BTC</span><br>My BTC balance</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white text-center text-success">
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Receiver Address</label>
                                    <div class="col-sm-6">
                                        <input id="btcaddress"  name ="btcaddress" class="form-control" placeholder="Paste your <?php echo $coin_short;?> Address" autocomplete="off" type="text" value="<?php echo $reciever_address;?>">
                                        <?php if(isset($errorsendbtc['reciever_addressError'])) { echo "<br/><span class=\"messageClass text-danger\">".$errorsendbtc['reciever_addressError']."</span>";  }?>                     
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-large">Amount(BTC + network Fee of 0.001)</label>
                                    <div class="col-sm-6">
                                        
                                        <input id = "btcval" class="form-control form-control-sm" placeholder="0" autocomplete="off" onkeypress="return isNumberKey(event)" name="txtChar" type="number" step="0.00000001">
                                        <?php if(isset($errorsendbtc['txtCharError'])) { echo "<br/><span class=\"messageClass text-danger\">".$errorsendbtc['txtCharError']."</span>";  }?>
                                    </div>
                                    
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Spending Password</label>
                                    <div class="col-sm-6">
                                        
                                        <input id="spendingpassword" name="spendingpassword" class="form-control form-control-sm" autocomplete="off" type="password" value="<?php echo $spendingpassword;?>">
                                         <?php if(isset($errorsendbtc['spendingpasswordError'])) { echo "<br/><span class=\"messageClass text-danger\">".$errorsendbtc['spendingpasswordError']."</span>";  }?>
                                    </div>
                                    
                                </div>
                            
                        </div>
                        <input type="submit" class="btn btn-success btn-lg" id="btnsendbtc" name="btnsendbtc" value="Send"/>
                    </div>
                </form>
              
            </div>
        </div>

    </div>
</div>

<?php 
    include 'footer.php';
?>

