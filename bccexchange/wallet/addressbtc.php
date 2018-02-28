<?php 
	include 'header.php';
 	include_once('common.php');
    //ALTER TABLE `users` ADD `otp_value` VARCHAR(500) NULL DEFAULT '' AFTER `authused`, ADD `is_email_verify` TINYINT NULL DEFAULT '0' AFTER `otp_value`;

    page_protect();
    if(!isset($_SESSION['user_id']))
    {
        logout();
    }

    $user_session = $_SESSION['user_session'];
    $user_current_balance = 0;
    $new_address = "";
    $user_current_balance_BTC = 0;
    $new_address_BTC = "";
    $client = "";
    $client_BTC = "";
    if(_LIVE_)
    {
        $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
        $client_BTC = new Client($rpc_host_BTC, $rpc_port_BTC, $rpc_user_BTC, $rpc_pass_BTC);
        if(isset($client) && isset($client_BTC))
        {
            $new_address = $client->getAddress($user_session);
            $user_current_balance = $client->getBalance($user_session) - $fee;

            $new_address_BTC = $client_BTC->getAddress($user_session);
            $user_current_balance_BTC = $client_BTC->getBalance($user_session) - $fee;
		    
        }
    }
?>

<br><br><br><br><br>
<form >
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 text-center">
                <div class="card text-white bg-success" style="margin: -60px;">
                    <div class="card-header text-center">
                        <h1>Receive BTC<br>

                        </h1>
                        <span class="text-muted">Receive BTC to this address</span>
                    </div>
                    <div class="card-body text-center bg-white text-success">
                        <a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address_BTC;?>">
                                                <img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address_BTC?>" 
                                                alt="QR Code" style="width:200px;border:0;"/></a><br>
                        <h4><?php echo $new_address_BTC;?></h4> 
                    </div>
                </div>

                
            </div>
        </div>
    </div>

</div>
</form>
<br><br><br><br><br>
<?php 
    include 'footer.php';

?>
