<?php include('header.php'); ?>
<div class="wthree-dot">
	<a href="<?php echo base_url(); ?>"><h1><img src="<?php echo base_url(); ?>assets/home/images/paycrypt-Logo.png"></h1></a>
	<div class="profile">
		<div class="wrap">
			<div class="content-main">
				<div class="w3ls-subscribe w3ls-subscribe1">
					<h4>Reset Password </h4>
					<p>Please provide the email address. We will send you a link that will allow you to reset your password.</p>
					<?php
					if($this->session->flashdata('reset_fail'))
					{
						?>
					<div class="alert alert-danger alert-dismissable">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Warning!</strong> <?php echo $this->session->flashdata('reset_fail');$this->session->unset_userdata('reset_fail'); ?>
  				</div>
					<script>setTimeout(function(){$(".alert-danger").hide("slow");},3000);</script>
						<?php
					}
					 ?>
					<form action="<?php echo base_url() ?>userManager/forget_pass" method="post" id="forgetPass">
						<label id="uemail-error" class="error" for="uemail"><?php echo form_error('uemail'); ?></label>
						<input type="email" name="uemail" id="uemail" placeholder="Email" value="<?php echo set_value('uemail'); ?>">
						<input type="submit" value="Send Verification Email" >
						<br><br><a href="<?php echo base_url(); ?>signup" align="right" style="line-height: 0px;color: #fff"">Sign Up?</a>
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
