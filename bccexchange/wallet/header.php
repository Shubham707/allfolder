<?php
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
$error = array();
$addressList = array();
$new_address = "";
$new_address_BTC = "";
$user_email= $user_session;
$user_current_balance = 0;
$user_current_balance_BTC = 0;
if(isset($_GET['nad']))
{
    $new_address = $_GET['nad'];
    $new_address_BTC = $_GET['nad'];
}
$client = "";

if(_LIVE_)
{

    $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
    $client_BTC = new Client($rpc_host_BTC, $rpc_port_BTC, $rpc_user_BTC, $rpc_pass_BTC);
    if(isset($client) && isset($client_BTC))
    {
                //echo "<pre> dd </br>";var_dump($_SESSION);echo "</br> ddd <pre>";
        $bch_address = $client->getAddress($user_session);
        $addressList = $client->getAddressList($user_session);
        $user_current_balance = $client->getBalance($user_session) - $fee;
        

        $btc_address = $client->getAddress($user_session);
        $addressList_BTC = $client_BTC->getAddressList($user_session);
        $user_current_balance_BTC = $client_BTC->getBalance($user_session) - $fee;

    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BCC wallet">
    <meta name="author" content="Bitcoin cash Foundation">
    <meta name="keyword" content="BCC Wallet, bitcoin cash, bitcoin, wallet, bcc, bch, btc bch">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Wallets | <?php echo $coin_fullname;?>(<?php echo $coin_short;?>)</title>

    <!-- Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">
    <!-- MDL LIB --> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 -->
    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <!-- <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">&#9776;</button> -->

        <ul class="nav navbar-nav ml-auto">
            <!-- <li class="nav-item"> -->
                <!-- <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="d-md-down-none"><?php //echo $user_email;?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item" href="securitycenter.php"><i class="fa fa-lock"></i> Security</a>
                    <a class="dropdown-item" href="contactus.php"><i class="fa fa-lock"></i> Contact</a>
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-lock"></i> Logout</a>
                    
                    <?php 
                    /*if($_SESSION['user_admin'] == 1)
                    {
                        ?>
                        <a  class="dropdown-item" href="admin_user.php"><i class="fa fa-lock"></i>User list</a>
                        <?php
                    }*/
                    ?>   
                </div>-->
                <!-- <a class="text-white" href="securitycenter.php"><i class="fa fa-user"></i> <?php echo $user_email;?></a>
            </li> -->
            <li class="nav-item">
                <a class="text-white" href="logout.php">LOGOUT</a>
            </li>
        </ul>
        <!-- <button class="navbar-toggler aside-menu-toggler" type="button">&#9776;</button> -->

    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><img src="img/target.png"> Dashboard</a>
                    </li>

                    
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link " href="myaddress.php"><img src="img/qr-code.png"> BCC Wallet Address</a>
                    </li>

                    <li class="nav-item ">
                    <a class="nav-link nav-link">
                            <img src="img/retweet.png">
                            <span class="d-md-down-none">Funds</span>
                        </a>

                        
                         <!--  ......... BTC DROP DROWN...... -->
			<li class="nav-item nav-dropdown" >
                         <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                           <span class="d-md-down-none">BTC</span>
                       </a>
                       <div class="dropdown-menu">
                        <a class="dropdown-item" href="sendgetbtc.php"><i class="fa fa-lock"></i>Send BTC</a>
                        <a class="dropdown-item" href="addressbtc.php"><i class="fa fa-lock"></i> Receive BTC</a>
                        <a class="dropdown-item" href="transactionsbtc.php"><i class="fa fa-lock"></i>Transactions BTC</a>
                    </div>
			</li>
                    <!--  ......... BCC DROP DROWN...... -->
			<li class="nav-item nav-dropdown" >
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                        <span class="d-md-down-none">BCC</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="send.php"><i class="fa fa-lock"></i>Send BCC</a>
                        <a class="dropdown-item" href="recievecoin.php"><i class="fa fa-lock"></i> Receive BCC</a>
                        <a class="dropdown-item" href="transactions.php"><i class="fa fa-lock"></i>Transactions BCC</a>
                    </div>
			 </li>
               

            </li>

            <li class="nav-item">
                <a class="nav-link" href="buybcc.php"><img src="img/bitcoin.png"> Get BCC</a>
            </li>

            <li class="divider"></li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link" href="contactus.php"><img src="img/contract.png"> Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="securitycenter.php"><img src="img/tools.png"> Security Center</a>
            </li>
            <?php 
            if($_SESSION['user_admin'] == 1)
            {
                ?>
                <li  class="nav-item" id="ms6">
                    <a class="nav-link" href="admin_user.php" class="collapsible-header">
                        <img src="img/retweet.png"> Users</a></li>
                        <?php
                    }
                    ?>  
                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="main">
         <div class="row balance-div">
            <div class="col-md-8">
                <h3 class="balance-trade">Trade Bitcoin Cash</h3>
                <a class="btn" href="send.php" id="btnsend"><i class="fa fa-sign-out"></i> Send BCC</a>
                <a class="btn" href="recievecoin.php" id="btnreceived"><i class="fa fa-sign-in"></i> Receive BCC</a>
            </div>
            <div class="col-md-4">
                <span class="balance-text"> <?php echo $user_current_balance." " . $coin_short;?></span> <span class="balance-text">| </span>
                <span class="balance-text"> <?php echo $user_current_balance_BTC  ?> BTC
                </span>
            </div>
        </div>

