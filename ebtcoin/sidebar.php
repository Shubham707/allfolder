
<?php 
  include_once('hosting.php');
$verify=$_SESSION['is_email_verify'];
$sql2="select * from users where username='$verify'";
$query3=$mysqli->query($sql2);
$data3=$query3->fetch_assoc();
?>
<div class="profile-sidebar">
			
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<!-- <li class="active"><a herf="dashboard.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li> -->
			<li class="<?php echo $active1;?>"><a href="dashboard.php"><em class="fa fa-home">&nbsp;</em> DASHBOARD</a></li>
			
			<li class="<?php echo $address;?>"><a href="myaddress.php"><em class="fa fa-id-card-o">&nbsp;</em> MY ADDRESSES </a></li>

			<li class="<?php echo $transection;?>"><a href="transaction.php"><em class="fa fa-exchange">&nbsp;</em> TRANSACTIONS </a></li>		
			<!-- </ul>
		<hr class="hr_color">
		<ul class="nav menu"> -->
			<li class="<?php echo $security;?>"><a href="security.php"><em class="fa fa-lock">&nbsp;</em> SECURITY CENTER</a></li>
			<?php 
			//if($_SESSION['user_admin'] == 1)
			//{
			?>
			<li><!-- <a onclick="document.getElementById('id07').style.display='block'"> --><a href="withdraw.php"><em class="fa fa-money">&nbsp;</em> WITHDRAW</a></li>
			<?php

			//}
			?>
			<li class="<?php echo $contact;?>"><a href="contactus.php"> <em class="fa fa-user">&nbsp;</em> CONTACT US</span></a></li>
			</li>
			<li >
					<a class="visible-xs"  href="logout.php">
						<em class="fa fa-power-off"></em><span class="">&nbsp;Logout</span>
					</a>
						
			</li>
			<?php 
			if($_SESSION['user_admin'] == 1)
			{
			?>
				<li id="ms6"><a href="user_admin.php" class="collapsible-header"><i class="fa fa-users"></i> USER LIST</a></li>
			<?php

			}
			?>
						<!--<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> LOGOUT</a></li>-->
		</ul>
	</div><!--/.sidebar-->
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		
		<div class="container-fluid">
			
				

			    <div class="row">
			    	<div class="col-md-2 col-sm-2 col-xs-6" style="margin-top: 10px;margin-bottom: 10px;">
			    		<?php
					

							if($_SESSION['is_email_verify']==1){?>
							<a class="btn btn-info" href="send_data.php" style="background-color: #00365b !important;">SEND EBT</a>

							<?php } else { ?>
							<button class="btn btn-info" onclick="alert('Verify Email Id');" style="background-color: #00365b !important;">
								
							&nbsp;&nbsp;&nbsp;&nbsp;SEND EBT &nbsp;&nbsp;&nbsp;</button>
						<?php } ?>
			    	</div>

			    	<div class="col-md-2 col-sm-2 col-xs-6" style="margin-top: 10px;margin-bottom: 10px;">
			    		<button class="btn btn-info"  onclick="document.getElementById('id05').style.display='block'" style="background-color: #00365b !important;">REQUEST EBT </button>
			    	</div>

			    	<div class="col-md-3 col-md-offset-5 col-xs-12" style="margin-top: 10px;margin-bottom: 10px;">
			    		<?php 	
								if(_LIVE_)
								{
								  $client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
									if(isset($client))
									{
									$user_current_balance=$client->getBalance($user_session)-$fee;
										$user_current_balance2 = $user_current_balance;
									}
								}
								?>
								<div style="font-size: 24px;"><?php echo @$user_current_balance." " . @$coin_short;?></div>
			    	</div>

			    </div>
			    <div class="row" >
			    	<script type="text/javascript">
							window.setTimeout(function() {
							    $(".data1").fadeTo(500, 0).slideUp(500, function(){
							        $(this).remove(); 
							    });
							}, 4000);
							window.setTimeout(function() {
							    $(".data2").fadeTo(500, 0).slideUp(500, function(){
							        $(this).remove(); 
							    });
							}, 4000);
					   	</script>
				   		<?php if(@$_REQUEST['m']){?>
				   		<div class="alert alert-danger <?php echo @$_REQUEST['m'];?>" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong></strong> Alert ! Password is incorrect!
						</div>
						<?php }?>
						<?php if(@$_REQUEST['s']){?>
				   		<div class="alert alert-success <?php echo @$_REQUEST['s'];?>" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Success!</strong> Data Changed SuccessFully!
						</div>
						<?php }?>
			    </div>
		</div> 
<hr>
		

