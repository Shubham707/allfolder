<?php
ob_start();
include 'header.php';
// -----------Add Session-----------*//*
page_protect();
if (!isset($_SESSION['user_id'])) {
    header("location:logout.php");
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


$response = file_get_contents($url_api.'/user/getAllDetailsOfUser', false, $context);

if ($response === false) {
    die('Error');
}



$responseData = json_decode($response, true);



if (isset($responseData['user'])) {
    $btc_balance = $responseData['user']['BTCMainbalance'];
    $bcc_balance = $responseData['user']['BCHMainbalance'];
    $gds_balance = $responseData['user']['GDSMainbalance'];
    $pyy_balance = $responseData['user']['PYYMainbalance'];

    $user_BTCtradebalance = $responseData['user']['BTCbalance'];
    $user_BCHtradebalance = $responseData['user']['BCHbalance'];
    $user_GDStradebalance = $responseData['user']['GDSbalance'];
    $user_PYYtradebalance = $responseData['user']['PYYbalance'];

    $user_BTCfreezebalance = $responseData['user']['FreezedBTCbalance'];
    $user_BCHfreezebalance = $responseData['user']['FreezedBCHbalance'];
    $user_GDSfreezebalance = $responseData['user']['FreezedGDSbalance'];
    $user_PYYfreezebalance = $responseData['user']['FreezedPYYbalance'];

    $total_BTC = $user_BTCtradebalance + $user_BTCfreezebalance;
    $total_BCH = $user_BCHtradebalance + $user_BCHfreezebalance;
    $total_GDS = $user_GDStradebalance + $user_GDSfreezebalance;
    $total_PYY = $user_PYYtradebalance + $user_PYYfreezebalance;

    $depositwithdraws = $responseData['user']['tradebalanceorderDetails'];
    $depositwithdraw = array_reverse($depositwithdraws);
}


/// Deposit BTC ///
if (isset($_POST['btnbtcdeposit'])) {
    $Spassword = $_POST['btcdeposit'];
    $btcammount = $_POST['btcdepositammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "btcamount"=>$btcammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/depositeInWalletBTC', false, $context);


    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}

//Deposit BCH//

if (isset($_POST['btnbccdeposit'])) {
    $Spassword = $_POST['bccdeposit'];
    $bccammount = $_POST['bccdepositammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "bchamount"=>$bccammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/depositeInWalletBCH', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}
//Deposit GDS//
if (isset($_POST['btngdsdeposit'])) {
    $Spassword = $_POST['gdsdeposit'];
    $gdsammount = $_POST['gdsdepositammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "gdsamount"=>$gdsammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/depositeInWalletGDS', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}
//Deposit PYY//
if (isset($_POST['btnpyydeposit'])) {
    $Spassword = $_POST['pyydeposit'];
    $pyyammount = $_POST['pyydepositammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "pyyamount"=>$pyyammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/depositeInWalletPYY', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}


// Withdraw BTC//

if (isset($_POST['btnbtcwithdraw'])) {
    $Spassword = $_POST['btcwithdraw'];
    $btcammount = $_POST['btcwithdrawammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "btcamount"=>$btcammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/withdrawInWalletBTC', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}
//withdraw BCH//
if (isset($_POST['btnbccwithdraw'])) {
    $Spassword = $_POST['bccwithdraw'];
    $bccammount = $_POST['bccwithdrawammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "bchamount"=>$bccammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/withdrawInWalletBCH', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}

//Withdraw GDS//
if (isset($_POST['btngdswithdraw'])) {
    $Spassword = $_POST['gdswithdraw'];
    $gdsammount = $_POST['gdswithdrawammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "gdsamount"=>$gdsammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/withdrawInWalletGDS', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}

//Withdraw PYY//
if (isset($_POST['btnpyywithdraw'])) {
    $Spassword = $_POST['pyywithdraw'];
    $pyyammount = $_POST['pyywithdrawammount'];

    $postData = array(
    "userMailId"=>$user_session,
    "pyyamount"=>$pyyammount,
    "spendingPassword"=>$Spassword

    );

    // Create the context for the request
    $context = stream_context_create(array(
    'http' => array(
      'method' => 'POST',
      'header' => "Content-Type: application/json\r\n",
      'content' => json_encode($postData)
      )
    ));


    $response = file_get_contents($url_api.'/depositeintrade/withdrawInWalletPYY', false, $context);

    if ($response === false) {
        die('Error');
    }


    $responseData = json_decode($response, true);


    if ($responseData['statusCode']==200) {
        $message = "Balance Update Successfully!!";
    } else {
        $error = $responseData['message'];
    }
}


?>

  <script>
    $(document).ready(function(){
      $('#dropdwan').click(function(){
        $("p").toggle();
      });
});
</script>
</head>
<div class="container-fluid" style="min-height: 400px">
 <div class="animated fadeIn">

  <div class="card marginTop25" >
    <div class="card-header bg-success text-center" style="font-size: 20px;padding: 1.5rem;">
      TRADE ACCOUNT BALANCES
      <div style="float: right;color:green;">
        <?php if (isset($message)) {
    echo  "<script type='text/javascript'>alert('$message'); window.location.href='trade.php';</script>";
}
       ?>

     </div>
     <div style="float: right;color:red;">
      <?php if (isset($error)) {
           echo  "<script type='text/javascript'>alert('$error'); window.location.href='trade.php';</script>";
       }

      ?>
    </div>
  </div>

  <div class="card-body">
    <table class="table table-responsive table-hover table-outline valign-baseline mb-0">
      <thead class="thead-default">
        <tr>
         <th class="text-center" style="width: 250px !important;">TRADE</th>
         <th class="text-center">CURRENCY NAME</th>
         <th class="text-center">SYMBOL</th>
         <th class="text-center">MAIN BALANCE</th>
         <th class="text-center">TRADE BALANCE</th>
         <th class="text-center">FREEZED BALANCE</th>
         <th class="text-center">TOTAL BALANCE</th>
       </tr>
     </thead>
     <tbody>

      <tr class="">
        <td class="text-center valign-baseline ">


          <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit BTC for trading" onclick="document.getElementById('id011').style.display='block'" >
            <i class="fa fa-sign-in" aria-hidden="true"></i>
          </a>
          <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw BTC to Wallet" onclick="document.getElementById('id015').style.display='block'">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a>
          <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Last Trading Activities" onclick="document.getElementById('id092').style.display='block'">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
          </a>
    </td>

    <td class="valign-baseline text-center">Bitcoin</td>
    <td class="valign-baseline text-center">BTC</td>
    <td class="valign-baseline text-center"><?php echo $btc_balance; ?></td>
    <td class="valign-baseline text-center"><?php echo $user_BTCtradebalance; ?></td>
    <td class="valign-baseline text-center"><?php echo $user_BTCfreezebalance; ?></td>
    <td class="valign-baseline text-center"><?php echo $total_BTC; ?></td>
  </tr>


  <tr>
    <td class="valign-baseline text-center">

      <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit BCH for trading" onclick="document.getElementById('id012').style.display='block'" >
        <i class="fa fa-sign-in" aria-hidden="true"></i>
      </a>
      <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw BCH to Wallet" onclick="document.getElementById('id016').style.display='block'">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
      </a>
      <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Last Trading Activities" onclick="document.getElementById('id092').style.display='block'">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
      </a>
    </td>

    <td class="valign-baseline text-center">Bitcoin Cash</td>
    <td class="valign-baseline text-center">BCH</td>
    <td class="valign-baseline text-center"><?php echo $bcc_balance; ?></td>
    <td class="valign-baseline text-center"><?php echo $user_BCHtradebalance; ?></td>
    <td class="valign-baseline text-center"><?php echo $user_BCHfreezebalance; ?></td>
    <td class="valign-baseline text-center"><?php echo $total_BCH; ?></td>
  </tr>

  <td class="valign-baseline text-center">

    <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit GDS for trading" onclick="document.getElementById('id013').style.display='block'" >
      <i class="fa fa-sign-in" aria-hidden="true"></i>
    </a>
    <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw GDS to Wallet" onclick="document.getElementById('id017').style.display='block'">
      <i class="fa fa-sign-out" aria-hidden="true"></i>
    </a>
    <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Last Trading Activities" onclick="document.getElementById('id092').style.display='block'">
      <i class="fa fa-list-alt" aria-hidden="true"></i>
    </a>
 </td>
 <td class="valign-baseline text-center">Goods Coin</td>
 <td class="valign-baseline text-center">GDS</td>
 <td class="valign-baseline text-center"><?php echo $gds_balance; ?></td>
 <td class="valign-baseline text-center"><?php echo $user_GDStradebalance; ?></td>
 <td class="valign-baseline text-center"><?php echo $user_GDSfreezebalance; ?></td>
 <td class="valign-baseline text-center"><?php echo $total_GDS; ?></td>
</tr>

<td class="valign-baseline text-center">

 <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit PYY for trading" onclick="document.getElementById('id014').style.display='block'" >
   <i class="fa fa-sign-in" aria-hidden="true"></i>
 </a>
 <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw PYY to Wallet" onclick="document.getElementById('id018').style.display='block'">
   <i class="fa fa-sign-out" aria-hidden="true"></i>
 </a>
 <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Last Trading Activities" onclick="document.getElementById('id092').style.display='block'">
   <i class="fa fa-list-alt" aria-hidden="true"></i>
 </a>
</td>
<td class="valign-baseline text-center" >PayWay Coin </td>
<td class="valign-baseline text-center">PYY</td>
<td class="valign-baseline text-center"><?php echo $pyy_balance; ?></td>
<td class="valign-baseline text-center"><?php echo $user_PYYtradebalance; ?></td>
<td class="valign-baseline text-center"><?php echo $user_PYYfreezebalance; ?></td>
<td class="valign-baseline text-center"><?php echo $total_PYY; ?></td>
</tr>

</tbody>
</table>
</div>
</div>
</div>


</div>
<?php include'deposite_popup.php';?>
<div id="id092" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id092').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> Your Last Trading Activities
        </div><br>

                  <table class="table table-responsive table-hover table-outline mb-0">
                    <thead class="thead-default">
                      <tr>
                        <th>Currency Name</th>
                        <th>Amount</th>
                        <th>Action</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>

                     <?php if (!empty($depositwithdraw)) {
          $i = 0;
          foreach ($depositwithdraw as $value) {
              echo '<tr>

                        <td>'.$value['currencyName'].'</td>
                        <td>'.$value['amount'].'</td>
                        <td>'.$value['action'].'</td>
                        <td>'.$value['updatedAt'].'</td>

                      </tr>';
              if ($i++ == 9) {
                  break;
              }
          }
      } elseif (empty($depositwithdraw)) {
          
          echo "<tr><td colspan=\"3\">There is no Last Trading Activities exists </td><td></td></tr>";
      }


                  ?>
                </tbody>
              </table>


          </div>
        </div>

<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
include 'footer.php';
?>
