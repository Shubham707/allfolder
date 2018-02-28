<?php include('header.php'); ?>
<div class="wthree-dot">
	<a href="<?php echo base_url(); ?>"><h1><img src="<?php echo base_url(); ?>assets/home/images/paycrypt-Logo.png"></h1></a>
	<div class="profile">
		<div class="wrap">

			<div class="content-main content-main1">
				<div class="w3ls-subscribe">
					<?php
					if($this->session->flashdata('signup_error'))
					{
						?>
					<div class="alert alert-danger alert-dismissable">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Success!</strong> <?php echo $this->session->flashdata('signup_error'); $this->session->unset_userdata('signup_error'); ?>
  				</div>
					<script>setTimeout(function(){$(".alert-danger").hide("slow");},3000);</script>
						<?php
					}
					 ?>
					<h4>New Customer?</h4>
					<p>Hey! there's more to explore inside.</p>
					<form action="<?php echo base_url(); ?>userManager/register" method="post" id="register">
						<label  class="error" for="fname"><?php echo form_error('fname'); ?></label>
						<input type="text" name="fname" id="fname" placeholder="First Name" value="<?php echo set_value('fname'); ?>">
						<label  class="error" for="lname"><?php echo form_error('lname'); ?></label>
						<input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php echo set_value('lname'); ?>">
						<label class="error" for="uemail"><?php echo form_error('uemail'); ?></label>
						<input type="email" name="uemail" id="uemail" placeholder="Email" value="<?php echo set_value('uemail'); ?>">
						<label class="error" for="upassword"><?php echo form_error('upassword'); ?></label>
						<input type="password" name="upassword" id="upassword" placeholder="Password" value="<?php echo set_value('upassword'); ?>">
						<label class="error" for="ucpassword"><?php echo form_error('ucpassword'); ?></label>
						<input type="password" name="ucpassword" id="ucpassword" placeholder="Confirm Password" value="<?php echo set_value('ucpassword'); ?>">
						<input type="submit" value="Sign Up">
						<br><br><a href="<?php echo base_url(); ?>login" align="right" style="line-height: 0px; color: #fff">Already have an account?</a>
					</form>
				</div>
			</div>
			<div class="wthree_footer_copy">
				<p>© 2018 PayCrypt. All rights reserved </p>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
