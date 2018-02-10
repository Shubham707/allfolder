<?php include 'header.php'; 
  include_once('hosting.php');
$address="active";
?>
<?php include 'sidebar.php'; ?>
	<div align="right" style="margin-bottom: 30px;"><a class="btn btn-info" href='genratenewaddress.php' style="background-color: #00365b !important;"> Generate New Address </a></div>	
		<div class="col-md-12"><!-- All Sent Received Transferred -->
				<div class="panel panel-default">
<div class="tab-content">
	<div class="tab-pane fade active in scrolling" id="tab1">
		<div class="container" style="width: 1039px !important;">
 	
  <table class="table">
    <thead>
      <tr>
        <th>Address</th>
        <th>Label</th>
      </tr>
    </thead>
    <tbody>

<tr class="success">
<?php 
if(_LIVE_)
{
	$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
	if(isset($client))
	{
	//echo "<pre> dd </br>";var_dump($_SESSION);echo "</br> ddd <pre>";
	$addressList = $client->getAddressList($user_session);
	$user_current_balance = $client->getBalance($user_session) - $fee;
	}
}

if(!empty($new_address)){ 
?>
<tr>
<td> New Address :- <strong><?= @$new_address?></strong>
</td>											
<td colspan="2">
<a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address?>">
<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $new_address?>" 
alt="QR Code" style="width:60px;border:0;"></td><tr>
<?php								}
if(count($addressList)>0)
{
$i=5;
foreach ($addressList as $address)
{	?>
<tr>
<td><?= @$address;?></td>
<td colspan="2"><a href="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address?>">
<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address?> alt="QR Code" style="width:60px;border:0;">
</td>

<tr>
<?php
 $i--; } } else if((count($addressList)== 0) && empty($new_address))
{ ?>
<td colspan="3">There is no Address exists</td>
<?php }?>
</tr>

</tbody>
</table>
</div>

	</div>
	</div>
	</div>
	</div><!--/.panel-->
	</div>
<?php include 'footer.php'; ?>
