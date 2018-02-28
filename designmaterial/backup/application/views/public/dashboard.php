<?php include('header.php'); ?>
<div class="wthree-dot">
	<a href="<?php echo base_url(); ?>"><h1><img src="<?php echo base_url(); ?>assets/home/images/paycrypt-Logo.png"></h1></a>
	<div class="profile">
		<div class="wrap">
			<div class="content-main">
				<div class="w3ls-subscribe w3ls-subscribe1">
					<h2>Welcome to dashboard</h2>
					<?php echo $this->session->userdata('userEmail'); ?>
					<?php echo $this->session->userdata('userId'); ?>
					<?php echo $this->session->userdata('userFirstName'); ?>
					<a href="<?php echo base_url() ?>logout">Logout</a>
				</div>
			</div>

			<div class="wthree_footer_copy">
				<p>© 2018 Paycrypt. All rights reserved </p>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
