
<?php 

	include_once('common.php');

	page_protect();
	// if(!isset($_SESSION['user_id']))
	// {
	// 	logout();
	// }

// $email_id = $_POST['txtEmailID'];
$user_session=$_SESSION['user_session'];
if($_SESSION['user_session']){
$sql="select * from merchantuser where username='$_SESSION[user_session]'";
}
else if($_POST['value1'] && $_POST['value2'])
{
	$sql="select * from merchantuser where accesskey='$_POST[value1]' AND password='$_POST[value2]'";
}

$query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');

  //echo "<br>".$data['accesskey'];
		$client = "";
	$wallet_address = "";
	$error = array();
    $transactionList = array();
	if(_LIVE_)
	{
		$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
		if(isset($client))
		{
			$wallet_address  = $client->getnewaddress('pennybchnew@gmail.com');
			
		}
	}
	//header("Location:checkout.php?nad=".$wallet_address);
	//exit(); 
	//$sql="select * from merchantuser where acceesskey='$user_seeesion'";
	//$query=$



		

include'header1.php';

?>

<?php include'sidebar1.php';?>
<div class="content-wrapper">

<section class="content-header">
<h1>
API Information
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">API</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
                   Download a bitcoin client
    When a customer wants to buy something, send them a <strong>Bitcoin address where their payment should be sent.</strong>
        You can do this by clicking "New.." next to your address in the <strong>Bitcoin client and sending that address to the customer.</strong>
    When payment comes in to that address, send the goods to your customer. Depending on the value of what you're selling, you may wish to wait until the payment shows Confirmed.
    To issue a refund, obtain from the customer the bitcoin address where the refund payment should be sent. <strong>The refund address will likely be different from the address used when the customer sent payment, especially if an EWallet was used by the customer.</strong>
            </div>
         
          </div>
         
        </div>
     

      </div>
      
    </section>
<?php include'footer1.php';?>