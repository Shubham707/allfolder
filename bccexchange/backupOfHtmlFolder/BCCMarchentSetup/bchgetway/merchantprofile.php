
<?php 


	include_once('common.php');

	page_protect();
	// if(!isset($_SESSION['user_id']))
	// {
	// 	logout();
	// }

$value1= @$_REQUEST['value1'];
$value2= @$_REQUEST['value2'];
if($value1 && $value2)
{
  $sql="select * from merchantuser where accesskey='$value1' AND transcation_password='$value2'";
  $query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');
 $_SESSION['user_session']=$data['username'];
 header("Location:enterammount.php?value1=$value1&& value2=$value2");

}
else{
// $email_id = $_POST['txtEmailID'];
//$user_session=$_SESSION['username'];
if($_SESSION['user_session']){
$sql="select * from merchantuser where username='$_SESSION[user_session]'";
$query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
 $data=mysqli_fetch_assoc($query) or die('Data Not Found');
}
else 
{
  header('Location:mechantlogin.php');
}
}



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
			$wallet_address  = $client->getnewaddress($_SESSION['user_session']);
			$wallet_balance  = $client->getbalance($_SESSION['user_session']);
		}
	}
	//header("Location:checkout.php?nad=".$wallet_address);
	//exit(); 
	//$sql="select * from merchantuser where acceesskey='$user_seeesion'";
	//$query=$



		

include'header1.php';

?>

<?php include'sidebar1.php';?>
<style type="text/css">
  element.style {
    display: none !important;
  }
</style>
<div class="content-wrapper">

<section class="content-header">
<h1>
Dashboard
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Profile</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-6 col-xs-6">
  <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if($data['profile_picture']){?>
              <img data-toggle="modal" data-target="#myModal" class="profile-user-img img-responsive img-circle" src="http://localhost/shubham/bchgetway/upload/<?php echo $data['profile_picture']?>" alt="User profile picture">
              <?php } else { ?>
                  <img data-toggle="modal" data-target="#myModal" class="profile-user-img img-responsive img-circle" src="img_avatar3.png" alt="User profile picture">
              <?php }?>

              <h3 class="profile-username text-center"><?php echo $data['username'];?></h3>

               <p class="text-muted text-center">
                <form action="lib/secret.php" method="post" accept-charset="utf-8">
                  <input type="hidden" name="secret_key" value="<?php echo $data['username'];?>">
                  <center><input class="btn btn-success" type="submit" name="submit" value="Get Secret Key"></center></p>
                  
                </form>
                
                  <?php if(@$_REQUEST['secret_key']){ ?>
                  <input type="text" value="<?php echo @$_REQUEST['secret_key'];?>" style="background-color: green; color: white; width:100%;">
                  <!-- .' && value2='.@$_REQUEST['value2']; -->
                </p>
                  <?php } else { echo "<p>Secret Key: <br><p>"; }?>
                

              <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Account</b> <a class="pull-right"><?php echo $wallet_address;?></a>
                </li>
                <li class="list-group-item">
                  <b>Security Key</b> <a class="pull-right"><?php echo $data['accesskey']?></a>
                </li>
                <li class="list-group-item">
                  <b>Transection</b> <a class="pull-right"><?php echo $data['transcation_password']?></a>
                </li>
              </ul> -->

              
            </div>
            <!-- /.box-body -->
          </div>
</div>
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-aqua">
    <div class="inner">
    <h3><?php echo $wallet_balance;?></h3>

    <p>Total Balance</p>
    </div>
      <div class="icon">
         <i class="ion ion-bag"></i>
      </div>
  </div>
  <?php
   $sql="SELECT count(transcation_id) as trans FROM `transcation";
   $query=mysqli_query($mysqli,$sql) or die('Query Not Execute');
   $data=mysqli_fetch_assoc($query) or dir(mysqli_error());

  ?>
  <div class="small-box bg-yellow">
    <div class="inner">
    <h3><?= $data['trans'];?></h3>

    <p>Total Transection</p>
    </div>
      <div class="icon">
         <i class="ion ion-bag"></i>
      </div>
  </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
<a href="withdraw.php">
  <div class="small-box bg-green">
<div class="inner">
<h3><sup style="font-size: 20px"></sup></h3>

<p>Withdraw</p>
<p>Minimum 1 BCH</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
</div>
</a>
</div>

</div>
    <section class="content-header">
  
     
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-md-12">
          
          <script>
            $(".canvasjs-chart-canvas").attr('disabled','disabled');
            $(".canvasjs-chart-canvas").prop('disabled',true);
            document.getElementsByClassName("canvasjs-chart-credit").innerHTML.disabled = true;
            document.getElementsByClassName("canvasjs-chart-canvas").innerHTML.disabled = true;
/*            var n = document.getElementsByClassName('canvasjs-chart-credit')
for(var i=0;i<n.length;i++){
   n[i].disabled = true;
}*/
          </script>
          <?php

$sql123="SELECT DISTINCT `trans_year` as x, SUM(`trans_amount`) as y FROM transcation_list group by trans_year";
 $query123=mysqli_query($mysqli, $sql123) or die(mysqli_query());
 while($var=mysqli_fetch_assoc($query123)){
   $show[]=$var;
}
/*echo $show[0]['y'];*/
$title="Transection Progress";

?>

<script>
window.onload = function () {

      var chart = new CanvasJS.Chart("chartContainer", {
        title: {
          text: "<?php echo $title;?>"
        },
        data: [
        {
          type: "splineArea",
          dataPoints: [
          
          { x: <?php echo $show[1]['x'];?>, y: <?php echo $show[1]['y'];?> },
          { x: <?php echo $show[2]['x'];?>, y: <?php echo $show[2]['y'];?> },
          { x: <?php echo $show[3]['x'];?>, y: <?php echo $show[3]['y'];?> }
          ]
        }
        ]
      });

      chart.render();
    }
  </script> 
  <script src="chart/canvasjs.min.js"></script>
          <div id="chartContainer" style="height: 400px; width: 100%;">
          </div>
        </div>
      </div>

    </section>
<!-- /.row (main row) -->

<div id="mysettlement" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Settlement Information Administrator</h4>
      </div>
      <div class="modal-body">
        <h5><u>Term's & Condition</u></h5>
        <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Following are some useful definitions that pertain to pricing merchant transactions:</strong><br>
        <strong><u>Basis point</u><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1/100 of a percentage point. The term is used to describe discount rates, which are the bulk of card processing fees paid by merchants.</strong>
    <ul>
      <li>Customers will be allowed five free transactions every month, including deposits and withdrawals. From the minimum transection 1000 onwards, customers will be charged a minimum fee of Rs 10 per transaction. 
      </li>
    </ul>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Real-time gross settlement are specialist funds transfer systems where the transfer of money or securities[1] takes place from one Address to another Address on  "real time" and on a "gross" basis. Settlement in "real time" means a payment transaction is not subjected to any waiting period, with transactions being settled as soon as they are processed. "Gross settlement" means the transaction is settled on one-to-one basis without bundling or netting with any other transaction. "Settlement" means that once processed, payments are final and irrevocable.</p>

            <form  name="settlement" action="#" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account</label>
                  <input id="exampleInputEmail1" placeholder="Account" type="text" name="profile_picture">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Receiver</label>
                  <input id="exampleInputEmail1" placeholder="Receiver" type="text" name="receiver">
                </div>
              </div>
              <!-- /.box-body -->
              <!-- <input type="hidden" name="id" value="<?php echo $data['id'];?>"> -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<?php include'footer1.php';?>