
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
Help & Support
</h1>

</section>
<div style="color: red; text-align: center;"><?php echo @$_REQUEST['msg'];?></div>
<!-- Main content -->
<section class="content">
<div class="row">
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
           <div class="col-xs-6">
            <div class="login-box-body">
			    <p class="login-box-msg" style="color: white;">Send Query </p>

			    <form  method="post" action="lib/message.php"> 
			      <div name="loginForm" role="form" autocomplete="off" novalidate="" class=" form-group has-feedback ptl form-horizontal clearfix ng-pristine ng-invalid ng-invalid-required">

			        
			        <div class="input-group input-group-lg">
			                <div class="input-group-btn">
			                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>
			                    </button>
			                </div>
			                <!-- /btn-group -->
			                <input id="txtEmailID" name="email" class="form-control" type="email" placeholder="Email" required>
			                
			            </div>  
			            
			            <div><span id="result" style="float:left"></span></div><br>

			            <div class="input-group input-group-lg">
			                <div class="input-group-btn" >
			                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i>
			                    </button>
			                </div>

			                <!-- /btn-group -->
			                <input id="subject" name="subject" autocomplete="off" class="form-control" type="text"  placeholder="Subject" required>
			                 
			              </div>
			              <div><span id="result" style="float:left"></span></div>
			              
			        
			              <br>
			              <div class="input-group input-group-lg">
			                <div class="input-group-btn" >
			                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mobile"></i> 
			                    </button>
			                </div>

			                <!-- /btn-group -->
			                 <input id="mobile" name="mobile" class="form-control"  type="text" placeholder="Phone No" required>
			                 
			              </div>
			              
			              <br>
			              <div class="input-group input-group-lg">
			                
			              	  <textarea name="area3" style="width: 480px; height: 100px;" placeholder="Message" name="message"></textarea>
			              	  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
			                       <script type="text/javascript">
			        					bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
			  					   </script>
			              </div>
			              <br>
			              <div class=" mtl flex-center flex-end">
			                  <input type="submit" class="btn btn-block btn-primary btn-lg" id="btnlogin" name="submit" value="Send"/>
			              </div>
			              
			   
			      </div>
			    </form>
			  </div>
			         
          </div>
          <div class="col-xs-1"></div>
          <div class="col-xs-4" style="margin-top: 50px;">
		         <div class="small-box bg-blue">
		        <div class="inner">
		        <h3>
		        	<sup style="font-size: 20px"></sup>Address:</h3>

		        <p>Crypto Technologies LLC. 803, Rahaj Tower, Near Galadhari Motor Driving School Al Qusais. PO BOX: 362528, Dubai</p>
		        <p>B-154, B2 tower, First Floor, Spaze I- Tech Park, Sector 49, Gurugram, Haryana-122001</p>
		        <p>Phone No: <strong>+91 124-459-8476 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91 124-493-2141</strong></p>
		        <p>Email : <strong>info@blockon.tech <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;www.blockon.tech</strong></p>
		        </div>
		        <div class="icon">
		        </div>
		        </div>
          </div>
          <div class="col-xs-1"></div>
          	
          </div>
         </div>
        </div>
     

      </div>
      
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$('input[name="mobile"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
</script>
<?php include'footer1.php';?>
