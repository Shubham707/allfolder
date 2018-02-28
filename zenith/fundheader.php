<?php
include_once('common.php');
page_protect();
if (!isset($_SESSION['user_id'])) {
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
$postData = array(
  "userMailId"=> $user_session

  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


$response1 = file_get_contents($url_api.'/usertransaction/getBalBTC', false, $context);
$response2 = file_get_contents($url_api.'/usertransaction/getBalBCH', false, $context);
$response3 = file_get_contents($url_api.'/usertransaction/getBalGDS', false, $context);
$response4 = file_get_contents($url_api.'/usertransaction/getBalPYY', false, $context);

if ($response1 === false) {
    die('Error');
}
if ($response2 === false) {
    die('Error');
}
if ($response3 === false) {
    die('Error');
}
if ($response4 === false) {
    die('Error');
}




$responseData1 = json_decode($response1, true);
$responseData2 = json_decode($response2, true);
$responseData3 = json_decode($response3, true);
$responseData4 = json_decode($response4, true);




if (isset($responseData1['user'])) {
    $btc_balance = $responseData1['user']['BTCMainbalance'];
}
if (isset($responseData2['user'])) {
    $bcc_balance = $responseData2['user']['BCHMainbalance'];
}
if (isset($responseData3['user'])) {
    $gds_balance = $responseData3['user']['GDSMainbalance'];
}
if (isset($responseData4['user'])) {
    $pyy_balance = $responseData4['user']['PYYMainbalance'];
}


?>
<?php
include 'header.php';
?>
<div class="col-md-2 hidden-xs hidden-sm">
 <div class="collapse navbar-collapse padding-right-none" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav wallet-currencies-nav" id="exampleAccordion">
        <li class="nav-item wallet-curr">
          <div class="h5" ><img src="./img/bitcoin.png" class="hero-logo img-rounded"> &nbsp;BTC<p class="pull-right font-15"><?php echo $btc_balance; ?> BTC</p></div>
          <div class="">

            <div class="text-center">
              <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit" href="addressbtc.php" id="btnreceived">
                <i class="fa fa-qrcode" aria-hidden="true"></i>
              </a>
              <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw" href="sendgetbtc.php" id="btnsend" >
                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              </a>
              <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="History" href="fundstransactionbtc.php" id="btnreceived" >
                <i class="fa fa-list-alt" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item wallet-curr">
         <div class="h5" ><img src="./img/bitcoincash.png" class="hero-logo img-rounded">&nbsp;BCH<p class="pull-right font-15"><?php echo $bcc_balance; ?> BCH</p></div>
         <div class="">

           <div class="text-center">
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit" href="addressbcc.php" id="btnreceived">
               <i class="fa fa-qrcode" aria-hidden="true"></i>
             </a>
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw" href="sendgetbcc.php" id="btnsend" >
               <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
             </a>
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="History" href="fundstransactionbcc.php" id="btnreceived" >
               <i class="fa fa-list-alt" aria-hidden="true"></i>
             </a>
           </div>
         </div>
        </li>
        <!-- <li class="nav-item">
          <hr>
          <div class="text-center"><img src="./img/bitcoincash.png" class="hero-logo img-rounded">BCH</div>
          <div class="">
            <p class="text-center">Balance: <?php echo $bcc_balance ; ?> BCH</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposit" ><a href="addressbcc.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="sendgetbcc.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="History" ><a  href="fundstransactionbcc.php" id="btnreceived">-></a></button>
          </div>
        </div>
        </li> -->
        <li class="nav-item wallet-curr">
         <div class="h5" ><img src="./img/pyy.png" class="hero-logo img-rounded">&nbsp;PYY<p class="pull-right font-15"><?php echo $pyy_balance; ?> PYY</p></div>
         <div class="">

           <div class="text-center">
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit" href="addresspyy.php" id="btnreceived">
               <i class="fa fa-qrcode" aria-hidden="true"></i>
             </a>
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw" href="sendgetpyy.php" id="btnsend" >
               <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
             </a>
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="History" href="fundstransactionpyy.php" id="btnreceived" >
               <i class="fa fa-list-alt" aria-hidden="true"></i>
             </a>
           </div>
         </div> 
        </li>
        <!-- <li class="nav-item wallet-curr">
          <hr>
          <div class="text-center" ><img src="./img/PYYcoin1.png" class="hero-logo img-rounded">PYY</div>
          <div class=" ">
            <p class="text-center">Balance: <?php echo $pyy_balance; ?> PYY</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposite" ><a  class="" href="addresspyy.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a  class="" href="sendgetpyy.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="History" ><a  class="" href="fundstransactionpyy.php" id="btnreceived">-></a></button>
          </div>
        </div>
        </li> -->
        <li class="nav-item wallet-curr">
         <div class="h5" ><img src="./img/gdscoin.png" class="hero-logo img-rounded">&nbsp;GDS<p class="pull-right font-15"><?php echo $gds_balance; ?> GDS</p></div>
         <div class="">

           <div class="text-center">
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Deposit" href="addressgds.php" id="btnreceived">
               <i class="fa fa-qrcode" aria-hidden="true"></i>
             </a>
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Withdraw" href="sendgetgds.php" id="btnsend" >
               <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
             </a>
             <a type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="History" href="fundstransactiongds.php" id="btnreceived" >
               <i class="fa fa-list-alt" aria-hidden="true"></i>
             </a>
           </div>
         </div>
        </li>
        <!-- <li class="nav-item">
          <hr>
          <div class="h4 text-center"><img src="./img/gdscoin.png" class="hero-logo img-rounded">GDS</div>
          <div class=" ">
            <p class="text-center">Balance: <?php echo $gds_balance; ?> GDS</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposit" ><a href="addressgds.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="sendgetgds.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="fundstransactiongds.php" id="btnreceived">-></a></button>
          </div>
        </div>
      </li> -->
      </ul>


    <div></div></div>
</div>

<style type="text/css">

@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css";
@import "https://daneden.github.io/animate.css/animate.min.css";
/*-------------------------------*/
/*           VARIABLES           */
/*-------------------------------*/

// BACKGROUND COLOR
@bg-color: #583e7e;

// TEXT COLOR
@text-color: #fff;

// SIDEBAR LINK COLOR VARIABLES
@side-color-1: #1a1a1a;
@side-color-2: darken(@side-color-3, 5%);
@side-color-3: darken(@side-color-4, 5%);
@side-color-4: @bg-color;
@side-color-5: lighten(@side-color-4, 5%);
@side-color-6: lighten(@side-color-5, 5%);
@side-color-7: lighten(@side-color-6, 5%);
@side-color-8: lighten(@side-color-7, 5%);
@side-color-9: lighten(@side-color-8, 5%);

// HAMBURGER COLOR
@hamburger-color-closed: fadeout(@text-color, 30);
@hamburger-color-open: @text-color;

// WIDTH VARIABLES
@width1: 220px;
@width2: 100px;
@full-width: 100%;

// HEIGHT VARIABLES
@full-height: 100%;

body {
    position: relative;
    overflow-x: hidden;
}
body,
html {
  height: @full-height;
  background-color: @bg-color;
}







.nav {
  .open>a {
    background-color: transparent;
    &:hover {
      background-color: transparent;
    }
    &:focus {
      background-color: transparent;
    }
  }
}













/*-------------------------------*/
/*           Wrappers            */
/*-------------------------------*/

#wrapper {
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
  padding-left: 0;
  transition: all 0.5s ease;
}
#wrapper.toggled {
  padding-left: 220px;
  #sidebar-wrapper {
    width: @width1;
  }
  #page-content-wrapper {
    margin-right: -220px;
    position: absolute;
  }
}
#sidebar-wrapper {
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
  background: #1a1a1a;
  height: @full-height;
  left: 220px;
  margin-left: -220px;
  overflow-x: hidden;
  overflow-y: auto;
  transition: all 0.5s ease;
  width: 0;
  z-index: 1000;
  &::-webkit-scrollbar {
    display: none;
  }
}
#page-content-wrapper {
  padding-top: 70px;
  width: @full-width;
}
























/*-------------------------------*/
/*     Sidebar nav styles        */
/*-------------------------------*/

.sidebar-nav {
  list-style: none;
  margin: 0;
  padding: 0;
  position: absolute;
  top: 0;
  width: @width1;
  li {
    display: inline-block;
    line-height: 20px;
    position: relative;
    width: @full-width;
    &:before {
      background-color: #1c1c1c;
      content: '';
      height: @full-height;
      left: 0;
      position: absolute;
      top: 0;
      transition: width .2s ease-in;
      width: 3px;
      z-index: -1;
    }
    &:first-child {
      a {
        background-color: @side-color-1;
        color: #ffffff;
      }
    }
    &:nth-child(2) {
      &:before {
        background-color: @side-color-2;
      }
    }
    &:nth-child(3) {
      &:before {
        background-color: @side-color-3;
      }
    }
    &:nth-child(4) {
      &:before {
        background-color: @side-color-4;
      }
    }
    &:nth-child(5) {
      &:before {
        background-color: @side-color-5;
      }
    }
    &:nth-child(6) {
      &:before {
        background-color: @side-color-6;
      }
    }
    &:nth-child(7) {
      &:before {
        background-color: @side-color-7;
      }
    }
    &:nth-child(8) {
      &:before {
        background-color: @side-color-8;
      }
    }
    &:nth-child(9) {
      &:before {
        background-color: @side-color-9;
      }
    }
    &:hover {
      &:before {
        transition: width .2s ease-in;
        width: @full-width;
      }
    }
    a {
      color: #dddddd;
      display: block;
      padding: 10px 15px 10px 30px;
      text-decoration: none;
    }
  }
  li.open {
    &:hover {
      before {
        transition: width .2s ease-in;
        width: @full-width;
      }
    }
  }
  .dropdown-menu {
    background-color: #222222;
    border-radius: 0;
    border: none;
    box-shadow: none;
    margin: 0;
    padding: 0;
    position: relative;
    width: @full-width;
  }
}
.sidebar-nav li a:hover, .sidebar-nav li a:active, .sidebar-nav li a:focus, .sidebar-nav li.open a:hover, .sidebar-nav li.open a:active, .sidebar-nav li.open a:focus {
  background-color: transparent;
  color: #ffffff;
  text-decoration: none;
}
.sidebar-nav>.sidebar-brand {
  font-size: 20px;
  height: 65px;
  line-height: 44px;
}



























/*-------------------------------*/
/*       Hamburger-Cross         */
/*-------------------------------*/

.hamburger {
  background: transparent;
  border: none;
  display: block;
  height: 32px;
  margin-left: 15px;
  position: fixed;
  top: 20px;
  width: 32px;
  z-index: 999;
  &:hover {
    outline: none;
  }
  &:focus {
    outline: none;
  }
  &:active {
    outline: none;
  }
}
.hamburger.is-closed {
  &:before {
    -webkit-transform: translate3d(0,0,0);
    -webkit-transition: all .35s ease-in-out;
    color: #ffffff;
    content: '';
    display: block;
    font-size: 14px;
    line-height: 32px;
    opacity: 0;
    text-align: center;
    width: @width2;
  }
  &:hover {
    before {
      -webkit-transform: translate3d(-100px,0,0);
      -webkit-transition: all .35s ease-in-out;
      display: block;
      opacity: 1;
    }
    .hamb-top {
      -webkit-transition: all .35s ease-in-out;
      top: 0;
    }
    .hamb-bottom {
      -webkit-transition: all .35s ease-in-out;
      bottom: 0;
    }
  }
  .hamb-top {
    -webkit-transition: all .35s ease-in-out;
    background-color: @hamburger-color-closed;
    top: 5px;
  }
  .hamb-middle {
    background-color: @hamburger-color-closed;
    margin-top: -2px;
    top: 50%;
  }
  .hamb-bottom {
    -webkit-transition: all .35s ease-in-out;
    background-color: @hamburger-color-closed;
    bottom: 5px;
  }
}
.hamburger.is-closed .hamb-top, .hamburger.is-closed .hamb-middle, .hamburger.is-closed .hamb-bottom, .hamburger.is-open .hamb-top, .hamburger.is-open .hamb-middle, .hamburger.is-open .hamb-bottom  {
  height: 4px;
  left: 0;
  position: absolute;
  width: @full-width;
}
.hamburger.is-open {
  .hamb-top {
    -webkit-transform: rotate(45deg);
    -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
    background-color: @hamburger-color-open;
    margin-top: -2px;
    top: 50%;
  }
  .hamb-middle {
    background-color: @hamburger-color-open;
    display: none;
  }
  .hamb-bottom {
    -webkit-transform: rotate(-45deg);
    -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
    // background-color: #1a1a1a;
    background-color: @hamburger-color-open;
    margin-top: -2px;
    top: 50%;
  }
  &:before {
    -webkit-transform: translate3d(0,0,0);
    -webkit-transition: all .35s ease-in-out;
    color: #ffffff;
    content: '';
    display: block;
    font-size: 14px;
    line-height: 32px;
    opacity: 0;
    text-align: center;
    width: @width2;
  }
  &:hover {
    before {
      -webkit-transform: translate3d(-100px,0,0);
      -webkit-transition: all .35s ease-in-out;
      display: block;
      opacity: 1;
    }
  }
}
















/*-------------------------------*/
/*          Dark Overlay         */
/*-------------------------------*/

.overlay {
    position: fixed;
    display: none;
    width: @full-width;
    height: @full-height;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,.4);
    z-index: 1;
}


































/* SOME DEMO STYLES - NOT REQUIRED */
body, html {background-color: @bg-color} body {h1,h2,h3,h4 {color:fadeout(@text-color, 10);}p, blockquote {color:fadeout(@text-color, 30);}a {color:fadeout(@text-color, 20);text-decoration:underline;&:hover {color:@text-color;}}}



</style>
<script type="text/javascript" src="js/sails.io.js"></script>
  <script type="text/javascript">
    io.sails.url = 'http://199.188.206.184:1338';
    window.ioo = io;
    socket = io.connect( 'http://199.188.206.184:1338', {
      reconnection: true,
      reconnectionDelay: 1000,
      reconnectionDelayMax : 5000,
      reconnectionAttempts: 99999
    });
    socket.on( 'connect', function () {
        console.log( 'connected to server' );
    });
    socket.on( 'disconnect', function () {
        console.log( 'disconnected to server' );
        socket.connect();
    });
</script>
<script type="text/javascript">
getAllAskBCH();
getAllAskPYY();
getAllAskGDS();
function getAllAskBCH(){
$.ajax({
type: "POST",
contentType: "application/json",
url: url_api+"/tradebchmarket/getAllAskBCH",
data: {},
success: function(data){
  console.log("getAllAskBCH",data);
  $('#ask_current_BCH').empty();
  if(data.asksBCH){
     $('#ask_current_BCH').append(" &nbsp;"+data.asksBCH[0].askRate+"");
  }
}
});
}
function getAllAskPYY(){
$.ajax({
type: "POST",
contentType: "application/json",
url: url_api+"/tradepyymarket/getAllAskPYY",
data: {},
success: function(data){

    $('#ask_current_PYY').empty();
    if(data.asksPYY)
    {

    $('#ask_current_PYY').append(" &nbsp;"+data.asksPYY[0].askRate+"");
  }

}
});
}
function getAllAskGDS(){
$.ajax({
  type: "POST",
  contentType: "application/json",
  url: url_api+"/tradegdsmarket/getAllAskGDS",
  data: {},
  success: function(data){

      $('#ask_current_GDS').empty();
      if(data.asksGDS){
        $('#ask_current_GDS').append(" &nbsp;"+data.asksGDS[0].askRate+"");

      }



  }
});
}
io.socket.on('GDS_BID_ADDED', function bidCreated(data){
io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
console.log("GDS_BID_ADDED::: getAllBidGDS:::", data.body);

getCurrentBidPriceGDS(data.body);

});
});

io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
console.log("GDS_ASK_ADDED::: getAllASKGDS:::", data.body);

getCurrentAskPriceGDS(data.body);

});

});
io.socket.on('PYY_BID_ADDED', function bidCreated(data){
io.socket.get(url_api+'/tradepyymarket/getAllBidPYY',function(err,data){
console.log("PYY_BID_ADDED::: getAllBidPYY:::", data.body);

getCurrentBidPricePYY(data.body);


});
});
io.socket.on('PYY_ASK_ADDED', function bidCreated(data){
io.socket.get(url_api+'/tradepyymarket/getAllASKPYY',function(err,data){
console.log("PYY_ASK_ADDED::: getAllASKPYY:::", data.body);

getCurrentAskPricePYY(data.body);

});
});
io.socket.on('BCH_BID_ADDED', function bidCreated(data){
io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
console.log("BCH_BID_ADDED::: getAllBidBCH:::", data.body);

getCurrentBidPriceBCH(data.body);



});

});
io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
console.log("BCH_ASK_ADDED::: getAllASKBCH:::", data.body);

getCurrentAskPriceBCH(data.body);

});

});
</script>
<script type="text/javascript">
  $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
});
</script>
