<?php $this->load->view('adminpanel/include/header');
      $this->load->view('adminpanel/include/left_side_menu');
      $this->load->view('adminpanel/include/top_menu');?>
        <!-- page content -->
         <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Claim Details</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Claim Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					<i class="fa fa-wrench"></i>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-3">
                      <div class="product-image">
                        <img src="<?php echo base_url().''.$listing[0]->upload_image;?>" height="50" width="50" alt="..." />
                      </div>
                     
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>

                      <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                      <br />

                      <div class="">
                        <h2>Available Blocks</h2>
                        <p><?php echo $listing[0]->amount_of_bch;?></p>
                      </div>
                      <br />

                      <div class="">
                        <h2>Block Address </h2>
                        <p><?php echo $listing[0]->bch_address;?></p>
                      </div>
                      <br />

                      
                      <div class="">
                        <button type="button" class="btn btn-default btn-lg">Send CDY</button>
                        <button type="button" class="btn btn-default btn-lg">Cancel</button>
                      </div>


                    </div>


                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php $this->load->view('include/footer');  ?>

 

<style>


  label.error
  {
    text-shadow:none !important;
    color: #7d1c1c !important;
    font-style : normal !important;
  }
  </style>
       
