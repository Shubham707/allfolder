<?php include('header.php'); ?>
<div class="wthree-dot">
	<a href="<?php echo base_url(); ?>"><h1><img src="<?php echo base_url(); ?>assets/home/images/paycrypt-Logo.png"></h1></a>
	<div class="profile">
		<div class="wrap">
			<div class="content-main">
				<div class="w3ls-subscribe w3ls-subscribe1">
					<?php
					if($this->session->flashdata('code_success_update'))
                     {
                        $error=$this->session->flashdata('code_success_update');
                        ?>
                        <div class="alert alert-success alert-dismissable">
    						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    						<strong>Success!</strong> <?php echo $error; $this->session->unset_userdata('code_success_update'); ?>
  						</div>
  						<script>setTimeout(function(){$(".alert-success").hide("slow");},3000);</script>
                        <?php
                        //echo '<span style="color:green;">'.$error.'</span><br/>';
                        //$this->session->unset_userdata('code_success_update');
                      }
					if($this->session->flashdata('signup_success'))
					{
						?>
					<div class="alert alert-success alert-dismissable">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Success!</strong> <?php echo $this->session->flashdata('signup_success');$this->session->unset_userdata('signup_success'); ?>
  				</div>
					<script>setTimeout(function(){$(".alert-success").hide("slow");},3000);</script>
						<?php
					}
					if($this->session->flashdata('login_fail'))
					{
						?>
					<div class="alert alert-danger alert-dismissable">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Warning!</strong> <?php echo $this->session->flashdata('login_fail');$this->session->unset_userdata('login_fail'); ?>
  				</div>
					<script>setTimeout(function(){$(".alert-danger").hide("slow");},3000);</script>
						<?php
					}
					if($this->session->flashdata('reset_success'))
					{
						?>
					<div class="alert alert-success alert-dismissable">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Warning!</strong> <?php echo $this->session->flashdata('reset_success');$this->session->unset_userdata('reset_success'); ?>
  				</div>
					<script>setTimeout(function(){$(".alert-success").hide("slow");},3000);</script>
						<?php
					}
					 ?>
					<h4>Login</h4>
					<p>Hi, Welcome back. Our Paycrypt team missed you.</p>
					<form action="<?php echo base_url(); ?>userManager/userLogin" id="userLogin" method="post">
						<label class="error" for="uemail"><?php echo form_error('uemail'); ?></label>
						<input type="email" name="uemail" id="uemail" placeholder="Email" value="<?php echo set_value('uemail'); ?>">
						<label  class="error" for="upassword"><?php echo form_error('upassword'); ?></label>
						<input type="password" name="upassword" id="upassword" placeholder="Password" value="<?php echo set_value('upassword'); ?>">
						<label  class="error" for="inputcap"><?php echo form_error('inputcap'); ?></label>


<input type="text" id="inputcap" name="inputcap" class="form-control" value="<?php echo set_value('inputcap'); ?>" placeholder="Enter 5 Digit Captcha"  style="outline: none;    padding: 1em;background: none;border: 1px solid #ffffff;color: #FFFFFF;font-size: .9em;margin: 0 0 1.5em 0;width: 55%;" />
<a href="javascript:void(0)" id="userCaptcha" style="outline: none;padding: 0.7em;background: none;border: 1px solid #ffffff;color: #FFFFFF;font-size: .85em;width: 10%;margin-left: 20%;position: absolute;margin-top: -3.5%;text-decoration: none;border-radius: 3px;"> <span id="captchVal"><?php echo $captchaVals; ?></span> <span style="margin-left: 5%;"><i class="fa fa-refresh">Refresh</i></span> </a> <br />
						<input type="submit" value="Login" >
						<a href="<?php echo base_url(); ?>forget" align="right" style="line-height: 0px; color: #fff">Forgot Password?</a>
					</form>
				</div>
			</div>

			<div class="wthree_footer_copy">
				<p>© 2018 Paycrypt. All rights reserved </p>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
