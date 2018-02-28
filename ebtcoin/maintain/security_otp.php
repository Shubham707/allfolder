
<?php include 'header.php'; 
$security="active";
       
?>

<?php include 'sidebar.php'; ?>
	<div class="row">
		
			<div class="col-md-10 col-md-offset-1">
			
			<div class="col-md-3"></div>
				<div class="panel panel-primary">
					<div class="panel-heading"><center>OTP SECURITY</center></div>
					<div style="color:green; text-align:center;"><?php echo @$_REQUEST['mail']; ?></div>
					<div style="color:red; text-align:center;"><?php echo @$_REQUEST['error8']; ?></div>
					<div class="panel-body">
						<form role="form" action="otp_update.php" method="post">
						<fieldset>
							<br>
							<div class= row>
								<div class="col-md-12">
								<div class="col-md-3"></div>
									<div class="col-md-6">
									<div class="form-group">
				<input class="form-control" placeholder="OTP" name="otp" type="text" autofocus="off" required><br>
<input type="submit" class="btn btn-primary" name="otp_value" value="Submit">
									</div>
									</div>
									
							</div>
						</div>
						<br>
						
							
							
						</fieldset>
					</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			
    </div>

<?php include 'footer.php'; ?>
