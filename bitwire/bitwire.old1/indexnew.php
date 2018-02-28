<?php session_start();?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--  --><!--    Document Title--><!-- =============================================-->
      <title>Bitwire | fiat-crypto currency wallet.</title>
      <!--  --><!--    Favicons--><!--    =============================================-->
      
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="includeassets/images/favicons/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      <!--  --><!--    Stylesheets--><!--    =============================================--><!-- Default stylesheets-->
      <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" >
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="./includeassets/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" href="img/favicon.png" type="image/x-icon" />

      <!-- Template specific stylesheets-->
      <link href="./includeincludeassets/css" rel="stylesheet">
      <link href="./includeincludeassets/css(1)" rel="stylesheet">
      <!-- Main stylesheet and color file-->
      <link href="./includeassets/style.css" rel="stylesheet">
      <link href="./includeassets/custom.css" rel="stylesheet">
      <link href="./includeassets/webfont/style.css" rel="stylesheet">
      <link href="./includeassets/webfont/webfont.css" rel="stylesheet">
      <style>
         .our-curr {
             width: 100px;
             border: 1px solid #006552;
             padding: 38px 0;
             margin: 18px 15px;
             border-radius: 50%;
             border-style: dashed;
         }
         .our-curr:hover {
             background: #006552;
             color: #fff;
         }
      </style>
   </head>
   <body data-spy="scroll" data-target=".inner-link" data-offset="60" data-gr-c-s-loaded="true">
      <main>
         <div class="znav-container znav-semi-transparent znav-white sticky-top" id="znav-container">
            <div class="container">
               <nav class="navbar navbar-toggleable-md">
                  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="    line-height: 3;">
                           <div class="fa fa-bars"></div>
                     
                  </button>
                  <a class="navbar-brand overflow-hidden" href="indexnew.php"><img src="./includeassets/logo.png" alt="logo" width="120px"></a>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                     <ul class="navbar-nav ml-auto">
                      <?php
                     // print_r($_SESSION);
                      if(isset($_SESSION['user_id'])){ ?>
                <li class="">
                           <a class="btn" href="index.php">Fund</a>
                        </li>
                        <li class="">
                           <a class="btn btn" href="setting.php">Support</a>
                        </li>
                        <li class="">
                           <a class="btn btn" href="contactnew.php">Contact</a>
                        </li>  
                        <li class="">
                           <a class="btn btn" href="logout.php">Logout</a>
                        </li>


                  <?php } else { ?>
                        <li class="">
                           <a class="btn" href="loginnew.php">Login</a>
                        </li>
                        <li class="">
                           <a class="btn btn-secondary" href="signupnew.php">Signup</a>
                        </li>  
                         
                 <?php  } ?>

                     </ul>
                  </div>
               </nav>
            </div>
            <!-- /.container-->
         </div>
         <!-- /.znav-container-->
         <section class="background-11 pt-4 pt-md-6 pt-lg-8"style="background-color: rgb(29, 212, 135);
    background: -webkit-linear-gradient(to left, #93F9B9, #1D976C);
    background: linear-gradient(to left, #93F9B9, #1D976C);">
            <div class="container">
               <div class="row align-items-center overflow-hidden">
                  <div class="col-lg-6 mb-5 mb-lg-0">
                     <img src='./includeassets/home.jpg'/>
                     
                  </div>
                  <div class="col-lg-6 pl-xl-5 color-5">
                     <h2 class="mb-3 fw-400 color-white">Safe, Secure, Reliable</h2>
                     <p class="lead font-1 mt-2 mb-5 color-white">Bitwire enables user to safely store and transfer their fiat-crypto assets.</p>
                     <form>
                        <div class="row">
                           <div class="col-7 col-md-6 pr-1"><a href="#start" class="btn btn-secondary btn-block" type="submit">Know More    </a></div>
                        </div>
                     </form>
                     
                  </div>
               </div>
               <!--/.row-->
            </div>
            <!--/.container-->
         </section>
         <section class="font-1" id="start">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6 mb-8">
                     <h5 class="fw-400 mb-3">100% Backed</h5>
                     <h3 class="fw-400 mb-4">Stable Currencies</h3>
                     <p class="lead color-5">Every Wire is always backed 1-to-1, by traditional currency held in our reserves. So 1 USDW is always equivalent to 1 USD. </p>
                  </div>
                  <div class="col-lg-6 mb-8"><img src="./includeassets/software-01.svg"></div>
               </div>
               <div class="row align-items-center">
                  <div class="col-lg-6 mb-8 push-lg-6">
                     <h5 class="fw-400 mb-3">16 fiat-cryptocurrencies</h5>
                     <h3 class="fw-400 mb-4">Widespread Integration</h3>
                     <p class="lead color-5">Bitwire is the most widely integrated digital -to- fiat currency today. Send, buy, sell, and use wire everywhere. </p>
                  </div>
                  <div class="col-lg-6 mb-8 pull-lg-6"><img src="./includeassets/software-02.svg"></div>
               </div>
               <div class="row align-items-center">
                  <div class="col-lg-6 mb-8 mb-lg-0">
                     <h5 class="fw-400 mb-3">Leveraging Blockchain</h5>
                     <h3 class="fw-400 mb-4">Transparent</h3>
                     <p class="lead color-5">The Bitwire platform is built on top of open blockchain technologies, leveraging the security and transparency that they provide.</p>
                  </div>
                  <div class="col-lg-6"><img src="./includeassets/software-03.svg"></div>
               </div>
               <!--/.row-->
            </div>
            <!--/.container-->
         </section>
         <section class="background-10 text-center">
            <div class="container">
               <div class="row align-items-center justify-content-center">
                  <div class="col-lg-8 pb-5">
                     <h3 class="my-4 fw-400 font-2">One platform for all World's major fiat currencies</h3>
                     <p class="lead font-1 mb-0 color-5 font-1">Supports all major fiat currencies and are 100% backed, means price of every bitwired currencies is equivalent to their original one.</p>
                  </div>
               </div>
               <div class="row align-items-center justify-content-center">
                  <div class="our-curr">INRW</div>
                  <div class="our-curr">USDW</div>
                  <div class="our-curr">EURW</div>
                  <div class="our-curr">GBPW</div>
                  <div class="our-curr">BRLW</div>
                  <div class="our-curr">PLNW</div>
                  <div class="our-curr">CADW</div>
                  <div class="our-curr">TRYW</div>
                  <div class="our-curr">RUBW</div>
                  <div class="our-curr">MXNW</div>
                  <div class="our-curr">CZKW</div>
                  <div class="our-curr">NZDW</div>
                  <div class="our-curr">JPYW</div>
                  <div class="our-curr">SEKW</div>
                  <div class="our-curr">AUDW</div>
                  <div class="our-curr">ILSW</div>
              

               </div>
               <!--/.row-->
            </div>
            <!--/.container-->
         </section>
         
         
        
         <section class=" font-1 text-center">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 px-6 mb-5 mb-lg-0">
                     <img src="./includeassets/software-icon-01.svg" width="70">
                     <h5 class="fw-400 my-3">Safe and Secure</h5>
                     <p class="mb-0 color-5 fw-300">Store your digital assets without any worries.</p>
                     
                  </div>
                  <div class="col-lg-4 px-6 mb-5 mb-lg-0">
                     <img src="./includeassets/software-icon-02.svg" width="70">
                     <h5 class="fw-400 my-3">16 fiat-crypto assets</h5>
                     <p class="mb-0 color-5 fw-300">Supports 16 world's most popular fiat currencies in their crypto form and are 100% backed.</p>
                  </div>
                  <div class="col-lg-4 px-6 mb-5 mb-lg-0">
                     <img src="./includeassets/software-icon-03.svg" width="70">
                     <h5 class="fw-400 my-3">Have a question?</h5>
                     <p class="mb-0 color-5 fw-300">We are always here to answer with a friendly support at </p>
                     <a class="btn btn-link fw-400"">support@bitwire.io</a>
                  </div>
               </div>
               <!--/.row-->
            </div>
            <!--/.container-->
         </section>
         <section class="background-11 py-5 font-1 fs--1">
            <div class="container">
               <footer class="app-footer">
  <a href="#"><img src="img/logo.png" alt="footer-logo" width="60px" style="margin-top: -4px;" ></a> &copy; 2017
  <span class="float-right"> <a href="homecontact.php" style="color:white !important;">Contact-Us</a>
   <a href="https://www.facebook.com/bitwire.io" style="color:white !important;">&nbsp;&nbsp;<i class="fa fa-facebook-square" aria-hidden="true"></i></a>
   <a href="https://www.twitter.com/bitwireapp" style="color:white !important;">&nbsp;&nbsp;<i class="fa fa-twitter" aria-hidden="true"></i></a>
  </span>
</footer>

               <!--/.row-->
            </div>
            <!--/.container-->
         </section>
      </main>
      <!--  --><!--    JavaScripts--><!--    =============================================-->
      <script src="./includeassets/jquery.js"></script>
      <script src="./includeassets/tether.min.js"></script>
      <script src="./includeassets/bootstrap.min.js"></script>
      <script src="./includeassets/core.js"></script>
      <script src="./includeassets/main.js"></script>
   </body>
</html>
