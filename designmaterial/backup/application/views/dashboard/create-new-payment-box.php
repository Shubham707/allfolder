<?php $this->load->view('dashboard/header');
$this->load->view('dashboard/sidebar');
?>
<style type="text/css">
  .error{ color: red; }
</style>
         <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script> 
         <style>
         iframe{width: 100%; height: 30% !important;}        
         </style> 
         <article class="content forms-page">     
      <section>
        <div class="content">
            <div class="row">
              <div class="col-md-12">

                <div class="card">
                  <div class="card-header hd-box" data-background-color="blue">
                    <h4 class="title">Create Public and Private key</h4>
                  </div>

                  <div class="card-content">
                    <div class="row">
                      <div class="col-sm-12">
                      <div class="create-key">
                        <div class="create-heading">
                          <h4>Create Key</h4>
                        </div>
                        <!-- Form Start -->
                        <form class="cmxform" id="commentForm" method="post" action="<?php echo base_url();?>account/save-data-key">
                        <div class="row">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-8">
                         
                            <div class="row">
                              <div class="col-sm-6">
                                
                                  <div class="form-group">
                                    <label for="exampleInputtext">Box Id:</label>
                                    <input id="boxID" class="form-control" type="text" required placeholder="Box Id" disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Public Key</label>
                                    <input class="form-control" id="publicKey" type="text" name="publicKey" placeholder="Public Key" required disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">&nbsp;&nbsp;&nbsp;&nbsp;Coin Name</label>
                                    
                                    <select id="coinName" class="form-control" name="coinName" placeholder="Coin Name" required >
                                       <option value=''> - Select One - </option>
                                      <?php foreach($allCoin as $coin){ ?>
                                       <option value='<?php echo $coin->coin_name;?>'><?php echo $coin->coin_name;?>
                                           
                                       </option>
                                      <?php } ?>
                            
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Your External Wallet Address: </label>
                                    <input type="text" class="form-control" id="exampleInputtext" placeholder="Your External Wallet Address" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Lock External Address Forever: </label>
                                    <input id="isLockAddr" class="form-control" type="text" name="isLockAddr" placeholder="Your External Wallet Address" required>
                                  </div>
                                 
                                 <div class="form-group">
                                    <label style="display: block;" for="exampleInputtext">Use on Adult/Gambling Website ?</label>
                                    <label class="radio-inline">
                                      <input id="isAdult" type="radio" name="isAdult" value="1">No</label>
                                    <label class="radio-inline">
                                      <input id="isAdult" type="radio" name="isAdult" value="-1">Yes</label>
                                  </div>
                                  
                                
                              </div>
                              <div class="col-sm-6">
                                
                                  <div class="form-group">
                                    <label for="exampleInputname">Payment Box Name:</label>
                                    <input id="boxName" name="boxName"  class="form-control" type="text" required placeholder="Box Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Private Key</label>
                                    <input id="privateKey" type="text" name="privateKey" placeholder="Private Key" class="form-control" required disabled>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Type of Payment Box:</label>
                                    <select id="boxType" class="form-control" type="text" name="boxType" placeholder="Box Type" required>
                                    
                                     <option> - Select One - </option>
                                      <option  value='paymentbox'> paymentbox</option>
                                      <option  value='captchabox'> captchabox</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Notification By Email:</label>
                                    <input type="email" class="form-control" id="exampleInputtext" placeholder="Notification By Email" required>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="exampleInputtext">Callback URL: </label>
                                    <input type="text" class="form-control" id="exampleInputtext" placeholder="Callback URL" required>
                                  </div>

                              </div>

                              <div class="col-sm-12">
                               <button class="btn btn-primary" style="padding: 8px 20%; border-radius: 25px; margin: 0px auto; margin-top: 35px; cursor: pointer;" width="100" name="submit">Payment <i class="fa fa-paper-plane-o"></i></button>
                              </div>

                              </form>
                            </div>
                            <!-- Form End -->
                          </div>
                        </div>
                        <!-- Form End -->
                      </div>
                       
                          
                      </div>

                    </div>
                  </div>

                </div>

              </div>
            </div>
        </div>
      </section>
      
      <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            } 

          });
        }
      </script>

      <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
      <?php $this->load->view('dashboard/footer');?>