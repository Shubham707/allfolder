<?php $this->load->view('dashboard/header');
$this->load->view('dashboard/sidebar');
?>
<style type="text/css">
  
  .blocks-item-description {
    font-weight: 300;
    margin: 0;
        margin-top: 0px;
    text-align: left;
    color: #58657A;
    font-size: 11px;
    text-align: center;
    margin-top: 33px !important;
}
</style>
            <article class="content forms-page">
                <section>
                    <div class="content">
                      <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header hd-box" data-background-color="blue">
                              <div class="text-center">
                              <h3><span > Help & Support</span></h3>
                              </div>
                            </div>
                            <div class="card-content">
                              <div class="row" style="padding:20px 50px!important;">
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                 <img src="<?php echo base_url();?>vendor/image/Help-icon.png" class="img-rounded" alt="Cinque Terre">
                                </div>
                                <div class="col-md-7">
                                  <h4 style="text-align:center; margin-top:40px; font-weight:bold">For Support You Can Mail On This :</h4>
                                  <h4 style="margin-top: 18px;text-align:center">Info@paycrypt.io<h4>
                                </div>
                                <div class="col-md-1"></div>
                                <div style="height:5px; background:#4085b8; width:80%;margin:auto"></div>
                              </div>

                              <h2 style="text-align:center"><small> Advice And Answers From The <i>Paycrypt</i> Team</small></h2>

                               <div class="row" style="margin-top:50px;">
                                 <div class="col-md-4">
                                   <div class="blocks-item">
                                   <div class="blocks-item-link">
                                       <div class="block-icon">
                                         <img src="<?php echo base_url();?>vendor/image/info.png">
                                       </div>
                                        <h6>Paycrypt Services &amp; Bitcoin</h6>
                                       <p class="blocks-item-description">Get answers to your basic questions about Bitcoin technology and BitPay's services.</p>
                                   </div>
                                 </div>
                                 </div>

                                 <div class="col-md-4">
                                   <div class="blocks-item">
                                    <div class="blocks-item-link">
                                       <div class="block-icon">
                                      <img src="<?php echo base_url();?>vendor/image/card.png">
                                       </div>
                                        <h6>Paycrypt Card</h6>
                                       <p class="blocks-item-description">Get answers to your questions about ordering and using the Paycrypt Prepaid Visa Debit Card.</p>
                                   </div>
                                 </div>
                                 </div>

                                 <div class="col-md-4">
                                   <div class="blocks-item">
                                    <div class="blocks-item-link">
                                       <div class="block-icon">
                                         <img src="<?php echo base_url();?>vendor/image/store.png">
                                       </div>
                                        <h6>Paying with Bitcoin</h6>
                                       <p class="blocks-item-description">Get answers to your questions about how to pay Paycrypt invoices and how to avoid common payment errors.</p>
                                   </div>
                                 </div>
                                 </div>
                               </div>


                               <div class="row" style="margin-top:50px;">
                                 <div class="col-md-2"></div>

                                 <div class="col-md-4">
                                   <div class="blocks-item">
                                   <div class="blocks-item-link">
                                       <div class="block-icon">
                                         <img src="<?php echo base_url();?>vendor/image/wallet.png">
                                       </div>
                                       <h6>Paycrypt Wallet</h6>
                                       <p class="blocks-item-description">Get answers to your questions about setting up and using the Paycrypt bitcoin wallet app.</p>
                                   </div>
                                  </div>
                                 </div>

                                 <div class="col-md-4">
                                   <div class="blocks-item">
                                     <div class="blocks-item-link">
                                       <div class="block-icon">
                                        <img src="<?php echo base_url();?>vendor/image/business.png">
                                       </div>
                                       <h6>Businesses & Organizations</h6>
                                       <p class="blocks-item-description">Get answers to your questions about accepting bitcoin payments via your Paycrypt merchant account.</p>
                                    </div>
                                  </div>
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
    <script src="<?php echo base_url();?>vendor/js/vendor.js"></script>
    <script src="<?php echo base_url();?>vendor/js/app.js"></script>
    <script src="<?php echo base_url();?>vendor/js/classie.js"></script>
    <script>
      (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
          (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
          }

          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
          }
        }
      })();
    </script>

</body>

<!-- Mirrored from modularcode.io/modular-admin-html/forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Feb 2018 07:31:04 GMT -->
</html>
