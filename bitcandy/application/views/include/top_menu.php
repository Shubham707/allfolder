 <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <i class="fa fa-user"></i> <?php print_r($this->session->userdata['name']); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                 <!--    <li><a href="<?php echo base_url()?>changepassword">Change Password</a></li>
                    <li><a href="<?php echo base_url()?>changepin">Change Pin</a></li>
                    <li><a href="<?php echo base_url()?>support">Support</a></li>
                    <li><a href="<?php echo base_url()?>twofactor">2-factor-Auth</a></li> -->
                    
                    <li><a href="<?php echo base_url();?>Logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                  </ul>
                </li>
                       <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href="<?php echo base_url()?>bitcoincandy">
                       <span><b>Get free 1,000 CDY</b></span><br>
                       </span>
                        <span>
                          Claim Your Bitcoin Candy and Get  1,000 CDY free.
                        </span>
                        <span class="message">
                        To get free CDY, you need to hold Bitcoin Cash before height 512666 (about January 13). <br><br>
                          Step1: Enter Your Bitcoin Cash Block Address.<br>
                          Step2: Enter The Amount of Bitcoin cash Before 512666 block .<br>
                          Step3: Upload the screen screenshot of your coin.<br><br>
                        </span>
                        
                      </a>
                    </li>
                  </ul>

               
              </ul>
            </nav>
          </div>
        </div>
        
          