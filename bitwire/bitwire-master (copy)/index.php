<?php
include_once('common.php');
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
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

  if(isset($_GET['curr']))
  {

$currencyname=base64_decode($_GET['curr']);

  switch ($currencyname) {
    case 'inrw':

               $response = file_get_contents($url_api.'/INRW/getTxsListINRW', false, $context);
        break;
        case 'eurw':

             $response = file_get_contents($url_api.'/EURW/getTxsListEURW', false, $context);
        break;
        case 'usdw':
         $response = file_get_contents($url_api.'/USDW/getTxsListUSDW', false, $context);
        break;

        case 'gbpw':
         $response = file_get_contents($url_api.'/GBPW/getTxsListGBPW', false, $context);

        break;

        case 'brlw':
         $response = file_get_contents($url_api.'/BRLW/getTxsListBRLW', false, $context);

        break;

        case 'plnw':
         $response = file_get_contents($url_api.'/PLNW/getTxsListPLNW', false, $context);

        break;

        case 'cadw':

        $response = file_get_contents($url_api.'/CADW/getTxsListCADW', false, $context);
        break;

        case 'tryw':
        $response = file_get_contents($url_api.'/TRYW/getTxsListTRYW', false, $context);
        break;

        case 'rubw':
        $response = file_get_contents($url_api.'/RUBW/getTxsListRUBW', false, $context);
        break;

        case 'mxnw':
        $response = file_get_contents($url_api.'/MXNW/getTxsListMXNW', false, $context);
         break;
        case 'czkw':
         $response = file_get_contents($url_api.'/CZKW/getTxsListCZKW', false, $context);
        break;

        case 'ilsw':
         $response = file_get_contents($url_api.'/ILSW/getTxsListILSW', false, $context);
        break;

        case 'nzdw':
        $response = file_get_contents($url_api.'/NZDW/getTxsListNZDW', false, $context);
        break;

        case 'jpyw':
         $response = file_get_contents($url_api.'/JPYW/getTxsListJPYW', false, $context);
        break;

        case 'sekw':
        $response = file_get_contents($url_api.'/SEKW/getTxsListSEKW', false, $context);
        break;

        case 'audw':
        $response = file_get_contents($url_api.'/AUDW/getTxsListAUDW', false, $context);
        break;

   default:
              $currencyname='inrw';
               $response = file_get_contents($url_api.'/INRW/getTxsListINRW', false, $context);



  }

}
@$responseData = json_decode($response, true);
if (isset($responseData['tx'])) {
    $transactionList_BTC = $responseData['tx'];
}




include 'final_header.php';

?>

  <div class="app-body" style="margin-bottom: 10%;">


        <!-- Main content -->
        <main class="main" style="margin-bottom: 48px;">
         <div class="row balance-div">
            <div class="col-md-10">

               <a class="btn" href="sendget.php?curr=<?php echo base64_encode(@$currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send<?= strtoupper(@$currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode(@$currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper(@$currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode(@$currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper(@$currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode(@$currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?= strtoupper(substr(@$currencyname,0,3)); ?></a>
                 <a class="btn" href="withdraw.php?curr=<?php echo base64_encode(@$currencyname);?>"><i class="fa fa-sign-in"></i> Withdraw <?= strtoupper(substr(@$currencyname,0,3));  ?></a>
            </div>

        </div>


<style type="text/css">
  .tablestyle
  {
    border: 1px solid #343434;
  }


  .tab-content{
    border:none;
  }

</style>



  <div class="container-fluid">
   <div class="animated fadeIn">

     <div class="col-md-12"><!-- All Sent Received Transferred -->
      <div style="color:green; text-align: center"><?php echo @$_REQUEST['msg'];?></div>
   <h3 class="text-center font-custom">YOUR <?= strtoupper(@$currencyname); ?> TRANSACTIONS</h3>
   <div class="tablestyle">
  <ul class="nav nav-pills">
    <li class="active"><a href="#tab1" data-toggle="tab">All</a></li>
    <li><a href="#tab2" data-toggle="tab">Sent</a></li>
    <li><a href="#tab3" data-toggle="tab">Received</a></li>
  </ul>
    <div id='content' class="tab-content">

      <div class="tab-pane  active overflow-x" id="tab1">

        <table class="table table-bordered">
          <thead style=" background-color: #232323 !important;
          color: white !important;">
          <tr>
            <th>Date</th>
            <th>Address</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Confirmations</th>
            <th>TX</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $bold_txxs = "";
          if (count(@$transactionList_BTC)>0) {
              foreach (array_reverse($transactionList_BTC) as $transaction) {
                  if ($transaction['category']=="send") {
                      $tx_type = '<b style="color: #FF0000;">Sent</b>';
                  } elseif ($transaction['category']=="receive") {
                      $tx_type = '<b style="color: #01DF01;">Received</b>';
                  } else {
                      $tx_type = '<b style="color: #01DF01;">Admin</b>';
                      $transaction['address'] = 'Bitwire ';
                      $transaction['confirmations'] = 'Confirmed ';
                      $blockchain_url='';
                      $transaction['txid']= '';
                  }
                  echo '<tr>
            <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
            <td>'.$transaction['address'].'</td>
            <td>'.$tx_type.'</td>
            <td>'.abs($transaction['amount']).'</td>
            <td>'.$transaction['confirmations'].'</td>
            <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
          </tr>';
              }
          } elseif ((count(@$transactionList_BTC)== 0)) {
              echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
          }
      ?>
    </tbody>


</table>

</div>
<div class="tab-pane overflow-x" id="tab2">

  <table class="table">
    <thead style=" background-color: #232323 !important;
    color: white !important;">
    <tr>
      <th>Date</th>
      <th>Address</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Confirmations</th>
      <th>TX</th>
    </tr>
  </thead>
  <tbody>
   <tbody>
    <?php

    if (count($transactionList_BTC)>0) {
        foreach (array_reverse($transactionList_BTC) as $transaction) {
            if ($transaction['category']=="send") {
                $tx_type = '<b style="color: #FF0000;">Sent</b>';
                echo '<tr>
        <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
        <td>'.$transaction['address'].'</td>
        <td>'.$tx_type.'</td>
        <td>'.abs($transaction['amount']).'</td>
        <td>'.$transaction['confirmations'].'</td>
        <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
      </tr>';
            }
        }
    } elseif ((count($transactionList_BTC)== 0)) {
        echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
    }
?>
</tbody>

</tbody>

</table>

</div>
<div class="tab-pane overflow-x" id="tab3">

  <table class="table">
    <thead style=" background-color: #232323 !important;
    color: white !important;">
    <tr>
      <th>Date</th>
      <th>Address</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Confirmations</th>
      <th>TX</th>

    </tr>
  </thead>
  <tbody>
    <?php

    if (count($transactionList_BTC)>0) {
        foreach (array_reverse($transactionList_BTC) as $transaction) {
            if ($transaction['category']=="receive") {
                $tx_type = '<b style="color:  #01DF01;">Received</b>';
                echo '<tr>
        <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
        <td>'.$transaction['address'].'</td>
        <td>'.$tx_type.'</td>
        <td>'.abs($transaction['amount']).'</td>
        <td>'.$transaction['confirmations'].'</td>
        <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
      </tr>';
            }
        }
    } elseif ((count($transactionList_BTC)== 0)) {
        echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
    }
?>
</tbody>

</table>

</div>

</div>
</div>
</div>
</div>


<!--/.row-->
</div>
</main>
    </div>


</div>
<script>
$( document ).ready(function() {
<?php if($_SESSION['KYC_status']===false && $_SESSION['pop']==1){ ?>
$('#myModal').modal('show');
$('#myModal').attr('displayed', 'true');
<?php $_SESSION['pop']++; }?>
});
</script>

<?php
include 'footer.php';
?>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h3>KYC-VERIFICATION</h3>
</div>
<div class="modal-body">
<p class="popp">If you want to verification of your account press VERIFICATION button.</p>
<p class="popp"> if you want to Skip click SKIP button.</p>
</div>
<div class="modal-footer">
<button class="btn popbtn" onclick="skipfnc();">SKIP</button>
<button class="btn popbtn" onclick="verifnc();">VERIFICATION</button>

</div>
</div>
</div>
</div>
<style>
.popp{
  color: #242424 !important;
}
.popbtn{
  background-color: #006552;
  color:#fff;
}
.modal-header {
    padding: 3px;

}
.close{
      margin-top: 25px !important;
}
</style>
<script>
function skipfnc()
{
  window.location.href="index.php?curr=<?php echo base64_encode('inrw')?>";
}
function verifnc()
{
  window.location.href="kyc_verification.php";
}
</script>
