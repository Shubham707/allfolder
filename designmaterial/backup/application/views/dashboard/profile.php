<?php $this->load->view('dashboard/header');
$this->load->view('dashboard/sidebar');
?>
<article class="content forms-page">
  <section>
  <div class="content">
  <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
              <div class="card-header hd-box" data-background-color="blue">
                  <h4 class="title">Edit Profile</h4>
              </div>
              <div class="card-content">
                <?php
                //print_r($getDetails);
                if($this->session->flashdata('upload_fail'))
                {
                  $error=$this->session->flashdata('upload_fail');
                  echo $error['error'];
                  $this->session->unset_userdata('upload_fail');
                }
                if($this->session->flashdata('update_success'))
                {
                  echo '<span style="text-align: center !important; color:green;">'.$this->session->flashdata('update_success')."</span>";
                  $this->session->unset_userdata('update_success');
                }
                 ?>
              <form action="<?= base_url() ?>userManager/addProfile" id="userProfile" method="post" enctype="multipart/form-data">
                    <div class="row">

                      <div class="col-md-6">
                          <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" name="org_name" type="text" id="org_name" value="<?php if($getDetails[0]->company_name){echo $getDetails[0]->company_name; }else{ echo set_value('org_name');} ?>" />
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        <label id="org_name-error" class="error" for="org_name"><?php echo form_error('org_name'); ?></label>
                                        <span class="input__label-content input__label-content--hoshi">Organisation Name</span>
                                    </label>
                          </span>
                      </div>
                      <div class="col-md-6">
                            <span class="input input--hoshi">
                              <input class="input__field input__field--hoshi" type="text" name="website_name" id="website_name" value="<?php if($getDetails[0]->company_website){ echo $getDetails[0]->company_website;}else{ echo set_value('website_name');} ?>" />
                                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-5">
                                        <label id="website_name-error" class="error" for="website_name"><?php  echo form_error('website_name'); ?></label>
                                        <span class="input__label-content input__label-content--hoshi">Website Name</span>
                                   </label>
                            </span>
                      </div>
                  </div>

                  <div class="row">
                        <div class="col-md-6">
                              <span class="input input--hoshi">
                              <label for="exampleSelect1">Bussiness Type</label>
                              <label id="businessType-error" class="error" for="businessType"><?php echo form_error('businessType'); ?></label>
                              <select class="form-control-inp" id="businessType" name="businessType">
                                  <option <?php if($getDetails[0]->business_type=="Type 1"){?> selected <?php  } ?> value="Type 1">Type 1</option>
                                  <option <?php if($getDetails[0]->business_type=="Type 2"){?> selected <?php  } ?> value="Type 2">Type 2</option>
                                  <option <?php if($getDetails[0]->business_type=="Type 3"){?> selected <?php  } ?> value="Type 3">Type 3</option>
                                  <option <?php if($getDetails[0]->business_type=="Type 4"){?> selected <?php  } ?> value="Type 4">Type 4</option>
                                  <option <?php if($getDetails[0]->business_type=="Type 5"){?> selected <?php  } ?> value="Type 5">Type 5</option>
                              </select>
                              </span>
                          </div>

                          <div class="col-md-6">
                                <?php if($getDetails[0]->photo){ ?> <a href="<?php echo base_url('upload/').$getDetails[0]->photo; ?>" style=" width:100px; height:100px;" data-lightbox="image-1" data-title="User Id Image"/>View Image</a> <?php } ?>
                                  <?php echo "<br/>"; ?>
                                <span class="input input--hoshi">
                                      <label for="exampleInputFile">Upload Id</label>
                                      <input type="file" class="form-control-file" id="userFile" name="userFile" aria-describedby="fileHelp">
                                </span>

                          </div>
                    </div>

                    <div class="row">
                          <div class="col-md-6">
                                <span class="input input--hoshi">
                                      <input class="input__field input__field--hoshi" type="text" id="mobileNum" name="mobileNum" value="<?php if($getDetails[0]->phone){ echo $getDetails[0]->phone; }else{ echo set_value('mobileNum');} ?>" />
                                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        <label id="mobileNum-error" class="error" for="mobileNum"><?php echo form_error('mobileNum'); ?></label>
                                          <span class="input__label-content input__label-content--hoshi">Phone Number</span>
                                      </label>
                                </span>
                          </div>


                    </div>
                    <button type="submit" class="btn btn-primary" name="updateProfile" id="updateProfile">Update Profile</button>
                    <div class="clearfix"></div>
                </form>
            </div>
          </div>
      </div>

  </div>
</div>

<?php $this->load->view('dashboard/footer');?>
