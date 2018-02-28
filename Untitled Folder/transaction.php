<?php include 'header.php'; 
  include_once('hosting.php');
$transection="active";
?>
<?php include 'sidebar.php'; ?>
<?php 
$error = array();
$transactionList = array();
$user_session = @$_SESSION['user_session'];
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

    <div class="col-md-12"><!-- All Sent Received Transferred -->
        <div class="panel panel-default">
          <div class="panel-body tabs">
            <ul class="nav nav-tabs">
             <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">All</a></li>
             <li><a href="#tab2" data-toggle="tab" aria-expanded="false">Sent</a></li> 
               <!--<li class=""><a href="#" data-toggle="tab" aria-expanded="false">Sent</a></li> -->
             <li><a href="#tab3" data-toggle="tab" aria-expanded="false">Received</a></li>
		<?php if($_SESSION['user_admin']){?><li><a href="#tab6" data-toggle="tab" aria-expanded="false">Payment</a></li><?php }?>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane fade in scrolling" id="tab2">
                
                <table class="table">
                  <thead>
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
                   if(count($transactionList)>0)
                  {
                     foreach($transactionList as $transaction) {
                      if($transaction['category']=="send") {
                           $tx_type = '<b style="color: #FF0000;">Sent</b>'; 
                        
                      ?>
                    <tr class="success">
                      <td><?= date('n/j/Y h:i a',@  $transaction['time']);?></td>
                      <td><?= @$transaction['address'];?></td>
                      <td><?= @$tx_type;?></td>
                      <td><?= abs($transaction['amount']); ?></td>
                      <td><?= @$transaction['confirmations'];?></td>
                      <td><a class="btn btn-info" href="<?= @$blockchain_url.''.@$transaction['txid'];?>">INFO</a></td>
                      
                    </tr>
                   <?php } } } else { echo'Data Not Found!'; }?>
                   
                    
                  </tbody>
                </table>
              
              </div>
              <div class="tab-pane fade scrolling" id="tab3">
                
                <table class="table">
                  <thead>
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
                   if(count($transactionList)>0)
                  {
                     foreach($transactionList as $transaction) {
                      if($transaction['category'] != "send"){
                           
                        $tx_type = '<b style="color: #01DF01;">Received</b>'; 
                          
                      ?>
                    <tr class="success">
                      <td><?= date('n/j/Y h:i a',@  $transaction['time']);?></td>
                      <td><?= @$transaction['address'];?></td>
                      <td><?= @$tx_type;?></td>
                      <td><?= abs($transaction['amount']); ?></td>
                      <td><?= @$transaction['confirmations'];?></td>
                      <td><a class="btn btn-info" href="<?= @$blockchain_url.''.@$transaction['txid'];?>">INFO</a></td>
                      
                    </tr>
                   <?php } } } else { echo'Data Not Found!'; }?>
                   
                  </tbody>
                </table>
             
              </div>
		          <div class="tab-pane fade scrolling" id="tab6">
                
                <table class="table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Address</th>
                      <th>Type</th>
                      <th>Amount</th>
                      <th>Email</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $bold_txxs = "";
                   if(count($transactionList)>0)
                  {
                     foreach($transactionList as $transaction) {
                         
                      ?>
                    <tr class="success">
                      <td><?= date('n/j/Y h:i a',@  $transaction['time']);?></td>
                      <td><?= @$transaction['address'];?></td>

                      <td><?= @$tx_type;?></td>
                      <td><?= abs($transaction['amount']); ?></td>
                      <td><?= @$transaction['comment'];?></td>
                      
                      
                    </tr>
                   <?php } } else { echo'Data Not Found!'; }?>
                   
                  </tbody>
                </table>
             
              </div>
              <div class="tab-pane fade active in scrolling" id="tab1">
                
                 
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Confirmations</th>
                        <!--<th>TX</th>-->
                      </tr>
                    </thead>
                    <tbody>
                          <?php
                      $bold_txxs = "";
                     if(count($transactionList)>0)
                    {
                       foreach($transactionList as $transaction) {
                        if($transaction['category']=="send") 
                        { 
                        $tx_type = '<b style="color: #FF0000;">Sent</b>'; 
                        }
                         else if($transaction['category']=="receive")
                         { 
                         $tx_type = '<b style="color: #01DF01;">Received</b>'; 
                         } 
                         else
                          {
                            $tx_type = '<b style="color: #01DF01;">Admin</b>';
                            $transaction['address'] = 'BCCWALLET.IO '; 
                            $transaction['confirmations'] = 'Confirmed ';
                            $blockchain_url=''; 
                            $transaction['txid']= ''; 
                           }
                        ?>
                      <tr class="success">
                        <td><?= date('n/j/Y h:i a',@  $transaction['time']);?></td>
                        <td><?= @$transaction['address'];?></td>
                        <td><?= @$tx_type;?></td>
                        <td><?= abs($transaction['amount']); ?></td>
                        <td><?= @$transaction['confirmations'];?></td>
                        <!--<td><a class="btn btn-info" href="<?= @$blockchain_url.''.@$transaction['txid'];?>">INFO</a></td>-->
                        
                      </tr>
                     <?php } } else { echo'Data Not Found!'; }?>
                      
                    </tbody>
                  </table>
                
                
              </div>
            </div>
          </div>
        </div><!--/.panel-->
      </div>
<?php include'footer.php'; ?>
