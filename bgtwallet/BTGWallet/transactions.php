
<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
  header("location:logout.php");
}
$error = array();
$transactionList = array();
$user_session = $_SESSION['user_session'];
$user_current_balance = 0;
if(isset($_GET['nad']))
{
  $new_address = $_GET['nad'];
}
$client = "";
if(_LIVE_)
{
  $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
  if(isset($client))
  {
    $transactionList = $client->getTransactionList($user_session);
    $user_current_balance = $client->getBalance($user_session) - $fee;
  }
}
?>
<?php
include 'header.php';
?>


<form action="transactions.php" method="post">
  <div class="container-fluid" style="min-height: 400px">
   <div class="animated fadeIn">
    
    <div class="card marginTop25">
      <div class="card-header bg-success" style="font-size: 20px;padding: 1.5rem;">
        Your Transactions
        <div style="float: right" >
         <a type="button" href="transactions.php" style="font-size:20px;"class="btn btn-default" id="Type_All">All</a>
         <a type="button" href="sent.php" style="font-size:20px;" class="btn btn-default" id="Type_Sent">Sent</a>
         <a type="button" href="recieved.php" style="font-size:20px;" class="btn btn-default" id="Type_Receive">Received</a>
       </div>
     </div>
     <div class="card-body">
      <table class="table table-responsive table-hover table-outline mb-0">
        <thead class="thead-default">
          <tr>					
           <th>Date</th>
           <th>Address</th>
           <th class="text-center">Type</th>
           <th>Amount</th>
           <th class="text-center">Confirmations</th>
           <th>TX</th>
         </tr>
       </thead>
       <tbody>
        <?php
        $bold_txxs = "";
        if(count($transactionList)>0)
        {
         foreach(array_reverse($transactionList) as $transaction) { 
          if($transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else if($transaction['category']=="receive"){ $tx_type = '<b style="color: #01DF01;">Received</b>'; } else {
            $tx_type = '<b style="color: #01DF01;">Admin</b>';
            $transaction['address'] = 'BTGWALLET.IO ';
            $transaction['confirmations'] = 'Confirmed ';
            $blockchain_url='';
            $transaction['txid']= '';
          }
          echo '<tr>
          <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
          <td>'.$transaction['address'].'</td>
          <td>'.$tx_type.'</td>
          <td>'.abs($transaction['amount']).'</td>
          <td>'.$transaction['confirmations'].'</td>
          <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
        </tr>';
      }
    }
    else if((count($transactionList)== 0))
    {
      echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
    }
    ?>      
  </tbody>
</table>
</div>
</div> 
</div>


<!--/.row-->
</div>
</form>



<?php
include 'footer.php';
?>