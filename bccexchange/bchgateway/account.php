
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
      $listing = $client->getTransactionList('shubhamsahu707@gmail.com');
			
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
Account
<!-- <small>Control panel</small> -->
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Account</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Account</th>
                  <th>BCH</th>
                  <th>Address</th>
                  <th>Transection ID</th>
                  <th>Email ID</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(count($listing)>0){
                    foreach($listing as $list){ ?>
                <tr>
                  <td><?= $list->getnewaddress;?></td>
                  <td><?php //$list->;?></td>
                  <td><?php //$list->;?></td>
                  <td><?php //$list->;?></td>
                  <td><?php //$list->;?></td>
                </tr>
                <?php } } else { echo "Data Not Found!"; } ?>
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<?php include'footer1.php';?>