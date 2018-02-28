<?php $this->load->view('dashboard/header');
$this->load->view('dashboard/sidebar');
?>
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
                        <div class="row">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-8">
                            <form>
                            <div class="row">
                              <div class="col-sm-6">
                                
                                  <div class="form-group">
                                    <label for="exampleInputtext">Box Id:</label>
                                    <input type="text" class="form-control" id="exampleInputtext" placeholder="Box Id" >
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Public Key</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Public Key">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Coin Name</label>
                                    
                                    <select class="form-control">
                                      <option value=""> - Select One - </option>
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Your External Wallet Address: </label>
                                    <input type="text" class="form-control" id="exampleInputtext" placeholder="Your External Wallet Address">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Lock External Address Forever: </label>
                                    <input type="text" class="form-control" id="exampleInputtext" placeholder="Lock External Address Forever">
                                  </div>
                                 
                                 <div class="form-group">
                                    <label style="display: block;" for="exampleInputtext">Use on Adult/Gambling Website ?</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">No</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                                  </div>
                                  
                                
                              </div>
                              <div class="col-sm-6">
                                
                                  <div class="form-group">
                                    <label for="exampleInputname">Payment Box Name:</label>
                                    <input type="name" class="form-control" id="exampleInputname" placeholder="Payment Box Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Private Key</label>
                                    <input type="text" class="form-control" id="exampleInputtext" placeholder="Private Key">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Type of Payment Box:</label>
                                    <select class="form-control">
                                      <option value=""> - Select One - </option>
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputtext">Notification By Email:</label>
                                    <input type="email" class="form-control" id="exampleInputtext" placeholder="Notification By Email">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="exampleInputtext">Callback URL: </label>
                                    <input type="URL" class="form-control" id="exampleInputtext" placeholder="Callback URL">
                                  </div>

                              </div>

                              <div class="col-sm-12">
                                <div class="create-submit">
                                  <a class="btn btn-default" href="#" role="button">Submit <i class="fa fa-angle-double-right"></i></a>
                                </div>
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