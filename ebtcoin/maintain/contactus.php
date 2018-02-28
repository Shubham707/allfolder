<?php include 'header.php'; 
$contact="active";
?>
<?php include 'sidebar.php'; ?>
	<div class="row">
		
			<div class="col-md-10 col-md-offset-1">
			
			<div class="col-md-3"></div>
				<div class="panel panel-primary">
					<div class="panel-heading"><center>CONTACT US</center></div>
					<div style="color:green; text-align:center;"><?php echo @$_REQUEST['msg']; ?></div>
					<div class="panel-body">
						<form role="form" action="lib/contact.php" method="post">
						<fieldset>
							<br>
							<div class= row>
								<div class="col-md-12">
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" placeholder="NAME" name="username" type="text" autofocus="" required>
									</div>
									</div>
									<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" placeholder="E-MAIL" name="email" type="email" value="<?php echo $_SESSION['user_session'];?>">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class= row>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" placeholder="Subject" name="subject" type="text" required>
										</div>
									</div>
								   <div class="col-md-6">
										<div class="form-group">
											<input class="form-control" placeholder="PHONE NO" name="phone" type="text" required>
										</div>
									</div>
								</div>
							</div>

								<br>
						
						  <div class="col-md-12">
							<div class="form-group">
								<textarea  class="form-control" placeholder="Message" name="message" required></textarea>
							</div>
						
					</div>
							
							<input type="submit" class="btn btn-primary" name="submit" value="SEND">
						</fieldset>
					</form>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			
    </div>

<?php include 'footer.php'; ?>
