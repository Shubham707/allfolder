<?php $this->load->view('dashboard/header');
$this->load->view('dashboard/sidebar');
?>

                <article class="content forms-page">

                        <div class="content">

                    <div class="row">
                        <div class="col-md-12">

                          <div class="tab_main">

                            <input class="tab_input" id="tab1" type="radio" name="tabs" checked>
                            <label class="tab_label" for="tab1">Password</label>

                            <input class="tab_input" id="tab2" type="radio" name="tabs">
                            <label  class="tab_label" for="tab2">Two Factor Authentication</label>

                            <input class="tab_input" id="tab3" type="radio" name="tabs">
                            <label class="tab_label" for="tab3">Default Currency</label>

                            <input class="tab_input" id="tab4" type="radio" name="tabs">
                            <label class="tab_label" for="tab4">Recurring Payment</label>

                            <input class="tab_input" id="tab5" type="radio" name="tabs">
                            <label class="tab_label" for="tab5">Plans</label>

                            <section class="tab_section" id="content1">
                              <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" >
                                  <div class="card setting_card" >
                                    <form action="" method="post"/>
                                      <div class="card-header hd-box" data-background-color="blue" style="padding:0px!important; min-height:40px; margin-bottom:10px;">
                                      <div class="text-center">
                                      <h3><span > ACCOUNT PASSWORD</span></h3>
                                      </div>
                                      </div>
                                      <span class="input input--hoshi">
                                        <input class="input__field input__field--hoshi" type="text" id="input-1" />
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                          <span class="input__label-content input__label-content--hoshi">Current Password</span>
                                        </label>
                                      </span>
                                      <span class="input input--hoshi">
                                        <input class="input__field input__field--hoshi" type="text" id="input-1" />
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                          <span class="input__label-content input__label-content--hoshi">New Password</span>
                                        </label>
                                      </span>

                                      <span class="input input--hoshi">
                                        <input class="input__field input__field--hoshi" type="text" id="input-1" />
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                          <span class="input__label-content input__label-content--hoshi">Confirm Password</span>
                                        </label>
                                      </span>
                                      <button type="submit" class="btn btn-primary " style="width:40%; margin-left:30%">Submit</button>
                                    </form>
                                </div>


                                </div>
                                <div class="col-md-3"></div>

                              </div>

                            </section>

                            <section class="tab_section" id="content2">
                              <div class="row">
                                <div class="col-md-12" >
                                  <div class="card setting_card">
                                    <div class="card-header hd-box" data-background-color="blue" style="padding:0px!important; margin-bottom:10px;">
                                      <div class="text-center">
                                      <h3><span class="spanunderline">TWO FACTOR AUTHENTICATION</span>
                                      <span><button type="submit" class="btn btn-danger Settings-btn-danger">Disable</button></sanp>
                                      </h3>
                                      </div>
                                    </div>
                                <div class="text-center"></div>
                                <div class="text-center" id="device">

              <p><span style="color: red">*Please back up your secret key.</span> Resetting your two factor authentication requires open a<br> support ticket and make up to 7 days to address</p>

              <p>Enter the verification code generated by Google Authenticator app on your phone.</p>
              <div id="img">;
                <img style="height:80px; width:80px" src="https://chart.googleapis.com/chart?chs=200x200&amp;chld=M|0&amp;cht=qr&amp;chl=otpauth%3A%2F%2Ftotp%2Fgupta.madhu1992%40gmail.com%3Fsecret%3D2YB5XTX3DEXVL7GH">
              </div><br>
              <lable class="marginTop50" style="color:black; margin-right:5px;">Secret Key</lable>
              <input type="email" style="padding-left:5px;" name="" class="gDisCode"  value="2YB5XTX3DEXVL7GH" placeholder=""><br><br>
              <form method="post" action="">
                <label style="font-size:12px;">Enter Google Authenticator Code</label><br>
                <input type="text" style="padding-left:5px" class="gDisCode" name="code"><br>
              <button type="submit" style="width:20%;border-radius:.2em!important;" class="btn btn-primary">Submit</button>
              </form>

                              </div>
                                </div>
                                </div>
                              </div>
                            </section>

                            <section class="tab_section" id="content3">
                              <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" >
                                  <div class="card setting_card" >
                                <div class="card-header hd-box" data-background-color="blue" style="padding:0px!important; min-height:40px; margin-bottom:10px;">
                                <div class="text-center">
                                <h3><span>Choose Your Default Currency</span></h3>
                                </div>
                                </div>


                                <form action="">
                                  <select class="form-control-inp" id="exampleSelect1">
                                      <option>USD</option>
                                      <option>INR</option>
                                      <option>USD</option>
                                      <option>INR</option>
                                      <option>USD</option>
                                      <option>INR</option>
                                  </select>
                                </form>

                                <button type="submit" class="btn btn-primary " style="width:40%; margin-left:30%">Submit</button>
                                </div>


                                </div>
                                <div class="col-md-3"></div>

                              </div>
                            </section>

                            <section class="tab_section" id="content4">
                              <p>
                                Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
                              </p>
                              <p>
                                Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
                              </p>
                            </section>

                            <section class="tab_section" id="content5">
                              <p>
                                Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
                              </p>
                              <p>
                                Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
                              </p>
                            </section>

                          </div>



                        </div>

                </div>

             </div>
        <?php $this->load->view('dashboard/footer');?>
