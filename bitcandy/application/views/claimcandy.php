<?php $this->load->view('include/header');
       $this->load->view('include/left_side_menu');
       $this->load->view('include/top_menu');?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Claim  Your Bitcoin Candy</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php }else if($this->session->flashdata('error')){  ?>
            <div class="alert alert-block alert-danger">
                <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } echo @$msg; ?>
                    <form action="<?php echo base_url()?>bitcoincandy/claimSave" method="POST" id="supportform" class="form-horizontal form-label-left"  enctype="multipart/form-data" />

                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="first-name">Step 1: Enter Your Block Address  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="bch_address"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="last-name">Step 2: Enter The Amount of BCH Before  512666<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="subject" name="amount_of_bch" class="form-control col-md-7 col-xs-12" required> 
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="last-name">Step 3: Upload the screen screenshot of your coin.  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="subject" name="userfile" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         
                        
                          <button type="submit" class="btn btn-success" id="save">Submit</button>
                <button class="btn btn-primary" type="reset" onclick="resetfun();">Reset</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          
          </div>
        </div>
        <!-- /page content -->
<?php $this->load->view('include/footer');  ?>

<!--  <script src="https://jqueryvalidation.org/files/lib/jquery.js"></script> -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
  <script type="text/javascript">

      function resetfun()
       {
        window.location.reload();
       }



       $(document).ready(function() {
    setTimeout(function(){ $(".alert").hide(); }, 5000);
    
    $("#supportform").validate({
      rules: {
        
        subject: {
          required: true,
          minlength: 2
          
        },
        message: {
          required: true,
          minlength: 2
        }
      },
      messages: {
        subject: {
          required: "Please enter subject",         
          minlength: "Your subject must be at least 2 characters"
        },
        message: {
          required: "Please enter message",
          minlength: "Your message must be at least 2 characters"
        }
      }
    }); 
  });
 $.validator.setDefaults({
    submitHandler: function() {
      return true;
    }
  });
  </script>

     
 <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/css/screen.css">

<style>


  label.error
  {
    text-shadow:none !important;
    color: #7d1c1c !important;
    font-style : normal !important;
  }
  </style>
