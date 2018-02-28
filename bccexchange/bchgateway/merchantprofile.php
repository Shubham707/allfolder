
<?php 
	include_once('common.php');
	page_protect();


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
      $listing = $client->getTransactionList($_SESSION['user_session']);
		}
	}

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

</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-12">
   <div class=" col-xs-4">
     <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $wallet_balance;?></h3>

        <p>Total Balance</p>
        </div>
          <div class="icon">
             <i class="ion ion-bag"></i>
          </div>
      </div>
   </div>
   <div class=" col-xs-4">
      <div class="small-box bg-yellow">
        <div class="inner">
        <h3><?php
        $ses=$_SESSION['user_session'];
        $sql="SELECT count(trans_account) as co FROM `transcation_list` where trans_account='merchant($ses)'";
        $query=mysqli_query($mysqli,$sql);
        $data=mysqli_fetch_assoc($query);
          echo @$data['co'];
        
        //echo count($listing);
        ?>
          
        </h3>
     
        <p>Total Transaction</p>
        </div>
          <div class="icon">
             <i class="ion ion-bag"></i>
          </div>
      </div>
   </div>
   <div class=" col-xs-4">
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
  </div>
</div>
<!-- ./col -->

</div>

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
$title="Transaction Progress";

?>
 <script type="text/javascript">
    window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer",
      {
        title: {
          text: "<?php echo $title;?>"
        },
        animationEnabled: true,
        animationDuration: 2000,
        legend: {
          verticalAlign: "bottom",
          horizontalAlign: "center"
        },
        data: [
        {
          indexLabelFontSize: 20,
          indexLabelFontFamily: "Monospace",
          indexLabelFontColor: "darkgrey",
          indexLabelLineColor: "darkgrey",
          indexLabelPlacement: "outside",
          type: "pie",
          showInLegend: true,
          toolTipContent: "{y} - <strong>#percent%</strong>",
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
  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
           
      </div>

        </div>
      </div>

    </section>
  


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
      <li>Customers will be allowed five free transactions every month, including deposits and withdrawals. From the minimum transaction 1000 onwards, customers will be charged a minimum fee of Rs 10 per transaction. 
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
