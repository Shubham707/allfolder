<?php
@include 'common.php';
?>
<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>BCCEXCHANGE</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="icon" href="img/favicon.png" type="image/x-icon" />

  <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
  <!--        <link rel="stylesheet" href="vendors/css/bootstrap-theme.min.css">-->
  <!--For Plugins external css-->
  <link rel="stylesheet" href="vendors/css/plugins.css" />

  <!--Theme custom css -->
  <link rel="stylesheet" href="vendors/css/style.css">

  <!--Theme Responsive css-->
  <link rel="stylesheet" href="vendors/css/responsive.css" />

  <script src="vendors/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <script type="text/javascript">
  io.sails.url = '<?php echo URL_API;?>';
  url_api='<?php echo URL_API;?>';
  </script>
</head>

<body data-spy="scroll" data-target="#main-navbar">


  <div class='preloader'>
    <div class='loaded'>&nbsp;</div>
  </div>
  <div id="menubar" class="main-menu">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
          <a class="navbar-brand" href="indexnew.php"><img src="img/logo.png" alt="footer-logo"> </a>
          <div class="dropdown">



          </div>
        </div>
        <style>
        .menu_clr
        {
          color: #343434 !important;
        }

        </style>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <!--  <li> <a class="navbar-brand dropdown-toggle no-background" id="menu1" data-toggle="dropdown">Trade&nbsp;
              <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">


            <li role="presentation"><a role="menuitem" class="text-black menu_clr" tabindex="-1" href="homemarket.php?curr=<?php echo base64_encode('bch');?>">BCH</a></li>
            <li role="presentation"><a role="menuitem" class="text-black menu_clr" tabindex="-1" href="homegds.php?curr=<?php echo base64_encode('gds');?>">GDS</a></li>
            </ul></li>-->
            <li><a href="homecontact.php">Support</a></li>
            <li><a href="loginnew.php">Sign In</a></li>
            <li><a href="signupnew.php">Sign Up</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </div>
  <!--Home page style-->
  <header id="home" class="sections" style="background-image: url('vendors/images/bccbg.jpg') !important;">
    <div class="container">

      <div class="row">
        <div class="homepage-style">

          <div class="top-arrow hidden-xs text-center"></div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="unique-apps text-center">
              <p class="hometext">Welcome To</p>
              <h2>BCCXCHANGE </h2>
              <p class="hometext">
                All you need is us to change your Bitcoin Value into profits
              </p>

              <div class="home-btn">
                <button class="btn btn-primary" href="signupnew.php">GET STARTED </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Sections -->
  <section id="our-portfolio" class="sections">
    <div class="container">
      <div class="row">
        <div class="heading">
          <div class=" text-center ">
            <h4 class=""><b><i>About Us </i></b></h4>
            <hr class="under">
          </div>
        </div>
        <!-- Example row of columns -->

        <div class="portfolio-wrap">
          <div class="portfolio">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="portfolio-item">
                <p class="about text-center " align="justify">
                  Bcc Exchange is Leading Competitor in Bitcoin market. Which Let's you deal<br> in a market in the most easiest form. We Provide the best platform to deal<br> in cryptocurrencies. Your Currencies are safe and secure.
                </p>

              </div>
              <div class="home-abt text-center">
                <button class="btn readmore">READ MORE </button>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>


    <!-- /container -->
  </section>


  <section id="our-team" class="sections">



    <div class="container-fluid project-bg">
      <div class="row">

        <div class="heading">
          <div class="title text-center arrow-left">


            <h4 class="titlebcc"><b><i>Why are people from all over the world choosing<br>BCCXchange?</i></b></h4>
          </div>
        </div>
        <div class="main-team text-center">

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="team-member">

              <img class="img" src="vendors/images/item1.png" alt="" />
              <h3 class="bcc_item">BCCXchange is trusted</h3>
              <p>We're early industry pioneers, successfully processed Bitcoin and other currencies in transactions and have happy customers in different countries.</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="team-member">
              <img class="img" src="vendors/images/item2.png" alt="" />
              <h3 class="bcc_item">BCCXchange is trusted</h3>
              <p>People love our easy-to-use products. From local payment methods to customer support in many differnt languages, we make your Bitcoin experience the best one,</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="team-member">
              <img class="img" src="vendors/images/item3.png" alt="" />
              <h3 class="bcc_item">BCCXchange is trusted</h3>
              <p>When we say your money is safe, we really mean it. We've built some of the world's most sophisticated Bitcoin security systems and have never been compromised</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Sections -->
  <section id="our-portfolio" class="sections">

    <div class="row">

      <!-- Example row of columns -->

      <div class="portfolio-wrap">
        <div class="portfolio">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="portfolio-item">
              <p class="start text-center " align="justify"> <i>
                                       It's never too late to get started. Buy store and learn about bitcoin now.
                                    </i></p>

            </div>
            <div class="home-abt text-center">
              <button class="btn readmore"  href="signupnew.php" >Get started </button>
            </div>
          </div>

        </div>

      </div>

    </div>
    <!-- /container -->
  </section>

  <div class="scroll-top">

    <div class="scrollup">
      <i class="fa fa-angle-double-up"></i>
    </div>

  </div>

  <!--Footer-->

  <div class="col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
    <div class="col-md-3"></div>
    <div class="col-md-3 mailus">
      <dir class="col-md-1">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
      </dir>
      <dir class="col-md-1">
        <hr class="sideline">
      </dir>
      <dir class="col-md-10"></dir>
      <p><b>Mail Us at</b><br><a href="mailto:example" target="_top">Help@bccexchange.in</p>
                    </div>

                  <div class="col-md-3 mailus" >
                        <div class="col-md-2">
                            <img src="vendors/images/tele.png" alt="" width="50px" style="margin-left: 13px;">
                        </div>
                         <div class="col-md-1">
                             <hr class="sideline">
                         </div>
                    </div>
                 <div class="col-md-3"></div>

        </div>
        <footer id="footer" class="footer">
            <div class="container">

                <div class="row">
                    <div class="main-footer" style=" margin-top: 74px !important;">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="footer-item">
                                <h3><u>BCCXchange</u></h3>
                                <p align="justify">
                                   BccXchange is Leading Competitor in Bitcoin Market.
                                    Which Let's you deal in this market in the most easiest
                                    form. We provide the best platform to deal in cryptocurrencies.
                                    Your currencies are safe and secure.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-6 hidden-xs">
                            <div class="footer-item">
                                <h4>OUR SERVICES</h4>
                                <ul>
                                    <li><a href="#">Regular Service</a></li>
        <li><a href="#">Buy Bitcoin</a></li>
        <li><a href="#">Sell Bitcoin</a></li>
        <li><a href="#">Exchange Bitcoin</a></li>

        </ul>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="footer-item">
      <h4>TOOLS</h4>
      <ul>
        <li><a href="#">API</a></li>
        <li><a href="#">Bitcoin Calculator</a></li>
        <li><a href="#">Bitcoin Price Widget</a></li>
        <li><a href="#">Donations</a></li>
      </ul>
    </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="footer-item">
      <h4>ABOUT</h4>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Legal & Security</a></li>
        <li><a href="#">Terms of Use</a></li>
        <li><a href="#">Blog</a></li>

      </ul>
    </div>
  </div>

  </div>
  </div>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #312f2f; width: 100%; height: 45px; margin-top: 21px;
              margin-bottom: 21px;">
    <div class="col-md-3">
      <div class="col-md-2"></div>
      <div class="col-md-10 " style="float: right;">Follow Us on Social Networks</div>
    </div>
    <div class="col-md-3">
      <div class="col-md-6">
        <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
        <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
        <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
      </div>
      <div class="col-md-6"></div>
    </div>
    <!--   <div class="col-md-3 hidden-xs">
                                          Subscribe<br>our Newsletter
                                      </div>
                                      <div class="col-md-3">
                                          <div class="col-md-5 hidden-xs">
                                               <input type="email" value="" placeholder="Your Email...">
                                          </div>
                                          <div class="col-md-7"></div>

                                      </div> -->
  </div>
  <div>
    <p class="text-center"><b><i><img src="img/dark-logo.png" alt="footer-logo" width="57px;"></i></b><br> @Copyright 2017. All rights reserved.</p>
  </div>
  <!-- start model signin sign up -->
  <!-- <div id="signin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h3 id="myModalLabel">MEMBER SIGN IN</h3>
                                  </div>
                                  <div class="modal-body">
                                      <p>One fine body…</p>
                                  </div>
                                  <div class="modal-footer">
                                     <dir class="row">
                                         <dir class="md-col-6 sm-col-6 xs col-6">
                                           <button class="btn" ">Sign In</button>
                                         </dir>
                                         <dir class="md-col-6 sm-col-6 xs col-6">
                                           <button class="btn">Sign up</button>
                                         </dir>
                                     </dir>
                                  </div>
                              </div>
                              </div>
                              </div>

                              <div id="signup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h3 id="myModalLabel">Modal header</h3>
                                  </div>

          <h2>Signup Form</h2>

          <form action="#" style="border:1px solid #ccc">
            <div class="container">
              <label><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" required>

              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>

              <label><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
              <input type="checkbox" checked="checked"> Remember me
              <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

              <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
              </div>
            </div>
          </form>
                              </div>
                              </div>
                              </div> -->
  <!-- close start model signin sign up -->



  </footer>


  <script src="vendors/js/vendor/jquery-1.11.2.min.js"></script>
  <script src="vendors/js/vendor/bootstrap.min.js"></script>

  <script src="vendors/js/plugins.js"></script>
  <script src="vendors/js/main.js"></script>
</body>

</html>
