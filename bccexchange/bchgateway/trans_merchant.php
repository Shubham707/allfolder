
<?php 

  include_once('common.php');

  page_protect();
  // if(!isset($_SESSION['user_id']))
  // {
  //  logout();
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
      $wallet_address  = $client->getnewaddress($user_session);
      $listing = $client->getTransactionList($user_session);
    }
  }
  //header("Location:checkout.php?nad=".$wallet_address);
  //exit(); 
  //$sql="select * from merchantuser where acceesskey='$user_seeesion'";
  //$query=$



    

include'header1.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<?php include'sidebar1.php';?>
<div class="content-wrapper">

<section class="content-header">
<h1>
Transaction
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Transection</li>
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
            </div -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Address</th>
                  <th>Recieve Amount</th>
                  <th>Time</th>
                  <th>Received</th>
                  <th>Status</th>
                  <th>Transaction ID</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  if(count($listing)>0){
                    $i=1;
                    
                   foreach ($listing as $getData) {
                    if($getData['category']=='receive'){
                  ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $getData['address'];?></td>
                  <td><?php echo $getData['amount'];?></td>
                  <td><?php echo date('m/d/Y H:i:s', $getData['time']);?></td>
                  <td><?php echo $getData['category'];?></td>
                  <td><?php echo $getData['address']? 'Success':'Fail'; ?></td>
                  <td><a data-toggle="modal"  data-target="#categorieModal"  data-txid="<?php echo $getData['txid'];?>" title="<?php echo $getData['txid'];?>" class="btn btn-success watch_ondemand" id="addUserModal" >Transaction Id</a>
                </tr>
                <?php  } }  } else {
                
                 }?>
                 
                </tbody>                
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
    
    <div class="modal fade" id="categorieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding: 22px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >Transaction Id</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-lg">
                <div class="input-group-btn" >
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-lock form-control-feedback"></span> 
                    </button>
                </div>

                <!-- /btn-group -->
                <input id="txt" title="Transaction ID" class="form-control" type="text" value="">
                 
              </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).on('click','#addUserModal',function(){
            $('#txt').val($(this).data('txid'));
	    
        });
    </script>
<?php include'footer1.php';?>
