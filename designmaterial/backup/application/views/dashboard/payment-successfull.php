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
                                    <h5> Your Account » Auto Payments to Your External Wallet Address Statistics</h5>
                                </div>
                                <div class="card-content">
                                  <div class="panel">

                        <div class="create-heading"> <h4>Detailed Search</h4> </div>
                        <div class="panel-body">

                            <form>
                                <div class="row">
                                  <div class="col-md-2">

                                  </div>
                                  <div class="col-md-8">

                                        <div class="input-group">
                                            <span class="payment-input-group-addon">Order ID:</span>
                                            <input type="text" name="orderID" class="form-control" placeholder="Order ID">
                                        </div><br>

                                        <div class="input-group">
                                            <span class="payment-input-group-addon">Amount:</span>
                                            <input type="text" name="amountfrom" class="form-control" placeholder="From Amount">&nbsp To &nbsp
                                            <input type="text" name="amounto" class="form-control" placeholder="To Amount">
                                        </div><br>



                                        <div class="input-group">
                                            <span class="payment-input-group-addon">Your Internal Wallet Address:</span>
                                            <input type="text" name="addrInt" class="form-control" placeholder="Your Internal Wallet Address">
                                        </div><br>

                                        <div class="input-group">
                                            <span class="payment-input-group-addon"> Transaction Date:</span>
                                            <input type="text" name="txDatefrom" class="form-control" placeholder="Transaction From Date">&nbsp To &nbsp
                                             <input type="text" name="txDateto" class="form-control" placeholder="Transaction To Time">
                                        </div><br>
                                      </div>
                                </div>
                                <div class="row payment-button-row">
                                  <div class="col-md-2">

                                  </div>
                                      <div class="col-md-8">
                                              <input type="reset" name="reset" class="btn payment-btn-info" value="Reset">
					                                    <input type="submit" name="filters_search" class="btn payment-btn-info" value="Search">
                                      </div>
                                </div>
                            </form>

                            <hr>
                            <!-- table start -->
                            <div class="row">
                              <div class="col-sm-12">
                                <table class="table table-bordered " style="overflow: scroll; width: 100%;font-size: 14px;">
                                  <thead>
                                    <tr class="valigntop">
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 1%;">Serial NO</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 12%;">No</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 5%;">Box Name</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 10%;">Amount</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 15%;">Approximate Amount in USD</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 5%;">Transaction Confirmed ?d</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 10%;">Order ID</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 5%;">User ID</th>
                                      <th class="valigntop" style="vertical-align: text-top; font-size: 12px; width: 10%;">Transaction Time</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td><!-- first line -->
                                      <td>Doe</td><!-- first line -->
                                      <td>INR</td>
                                      <td>John1</td>
                                      <td>John2</td>
                                      <td>John3</td>
                                      <td>John4</td>
                                      <td>5</td>
                                      <td>John6</td>
                                    </tr>
                                    <tr>
                                      <td>2</td><!-- second line -->
                                      <td>Moe</td><!-- second line -->
                                      <td>USD</td>
                                      <td>USD1</td>
                                      <td>USD2</td>
                                      <td>USD3</td>
                                      <td>USD4</td>
                                      <td>8</td>
                                      <td>USD6</td>

                                    </tr>
                                    <tr>
                                      <td>3</td><!-- Third line -->
                                      <td>Moe</td>
                                      <td>USD</td>
                                      <td>Mary</td>
                                      <td>Mary1</td>
                                      <td>Mary2</td>
                                      <td>Mary3</td>
                                      <td>Mary4</td>
                                      <td>Mary5</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>


                            <!-- table end -->

                          </div>
                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                </section>
            </article>
        </div>
    </div>


    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>
    <script data-cfasync="false" src="../cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script>
        (function(i, s, o, g, r, a, m)
        {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function()
            {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-80463319-4', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>


</body>

<!-- Mirrored from modularcode.io/modular-admin-html/forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Feb 2018 07:31:04 GMT -->
</html>
