<?php 
@SESSION_START();

if(isset($_SESSION['user_id']))
{ ?>
  
 <header class="app-header navbar hidden-xs hidden-sm">
        <a class="navbar-brand" href="indexnew.php"></a>
        <ul class="nav navbar-nav ml-auto">
             <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="index.php"> FUNDS</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="trade.php"> TRADE </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  MARKET
                </a>
                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                  <div class="row  ">
                      <div class="col-md-12 text-center">BTC Market</div>
                      <div class=" padding-10 col-md-12 col-xs-4">
                          <a href="markettrade.php" title="Bitcoin Cash">
                             <div class="col-xs-12 name text-left">
                                <img src="img/bitcoincash.png" alt="" class="width-10">&nbsp;BCH<span class="pull-right" id="ask_current_BCH"></span>
                             </div>
                          </a>
                      </div>
                      <div class="padding-10 col-md-12 col-xs-4 ">
                        <a href="gds.php" title="Goods Coin">
                           <div class="col-xs-12 name text-left">
                              <img src="img/gdscoin.png" alt="" class="width-10">&nbsp;GDS<span class="pull-right" id="ask_current_GDS"></span>
                           </div>
                        </a>
                      </div>
                      <div class="padding-10 col-md-12 col-xs-4">
                        <a href="pyy.php" title="PYY Coin">
                            <div class="col-xs-12 text-left name">
                                <img src="img/pyy.png" alt="" class="width-10">&nbsp;PYY<span class="pull-right" id="ask_current_PYY"></span>
                            </div>
                        </a>
                      </div>
                  </div>
                </div>
              </li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="contactnew.php">SUPPORT</a>
              </li>
             <?php
              if (@$_SESSION['user_admin'] == 1) {
                  ?>
                  <li  class="nav-item" id="ms6">
                      <a class="nav-link" href="admin_user.php" class="collapsible-header">
                          <img src="img/user.png"> User list</a></li>
                          <?php
              } ?>
            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle" style="font-size: 20px;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_email; ?></a>
                <a class="dropdown-item" href="setting.php"><i class="fa fa-lock" aria-hidden="true"></i> Setting</a>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <!-- admin access -->
                    <?php
                    if ($_SESSION['user_admin'] == 1) {
                        ?>
                        <a  class="dropdown-item" href="admin_user.php"><i class="fa fa-lock"></i>User list</a>
                        <?php
                    } ?>
                </div>
            </li>
        </ul>
   </header>

  <div class="app-header navbar navbar visible-xs visible-sm">
    <div class="dropdown pull-left">
      <button class="btn btn-default" id="openWallet" type="button" aria-haspopup="true" aria-expanded="true" onclick="openNav()">
        <i class="fa fa-database" aria-hidden="true"></i>
      </button>
      <button href="javascript:void(0)" id="closeWallet" class="closebtn hide btn btn-default" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <a class="navbar-brand" href="indexnew.php"></a>
    <div class="dropdown pull-right">
      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
        <i class="fa fa-bars " aria-hidden="true"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="index.php"> FUNDS</a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="trade.php"> TRADE </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" role="button" onclick="openMarketNav()">
               MARKET&nbsp;
             </a>
         </li>
         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="setting.php">SETTING</a>
         </li>

         <li class="nav-item nav-dropdown">
             <a class="nav-link" href="contactus.php">CONTACT US</a>
         </li>
         <li>
           <a class="nav-item nav-dropdown" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
         </li>
       <?php
         if (@$_SESSION['user_admin'] == 1) {
             ?>
             <li  class="nav-item" id="ms6">
                 <a class="nav-link" href="admin_user.php" class="collapsible-header">
                     <img src="img/user.png"> User list</a></li>
                     <?php
         } ?>
       <li class="nav-item dropdown d-md-down-none">
           <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-user-circle" style="font-size: 20px;"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
           <a class="dropdown-item" href=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_email; ?></a>
           <a class="dropdown-item" href="securitycenter.php"><i class="fa fa-lock" aria-hidden="true"></i> Security Center</a>
           <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
               <!-- admin access -->
               <?php
               if ($_SESSION['user_admin'] == 1) {
                   ?>
                   <a  class="dropdown-item" href="admin_user.php"><i class="fa fa-lock"></i>User list</a>
                   <?php
               } ?>
           </div>
       </li>
      </ul>
    </div>

  </div>
  <div id="marketSidenav" class="MarketRightsidenav">
    <span class="marketSideNavTitle">BTC Market</span>
    <button href="javascript:void(0)" class="closebtn btn btn-default" onclick="closeMarketNav()"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="row marginTop50">
        <div class="col-md-12  border-right">
            <a href="markettrade.php" title="Bitcoin Cash">
              <span class="col-xs-4"><img src="img/bch.png" alt=""></span>
               <div class="col-xs-8 name text-left">
                  BCH
                  <div class=" price pull-right"><span id="ask_current_BCH"></span></div>
               </div>
            </a>
        </div>
        <div class="col-md-12 -right">

          <a href="gds.php" title="Goods Coin">
              <span class="col-xs-4"><img src="img/gdscoin.png" alt=""></span>
              <div class="col-xs-8 name text-left">
                   GDS
                   <div class="price pull-right"><span id="ask_current_GDS"></span></div>
              </div>
          </a>
        </div>
        <div class="col-md-12 ">

          <a href="pyy.php" title="PYY Coin">
              <span class="col-xs-4"><img src="img/pyy.png" alt=""></span>
              <div class="col-xs-8 name text-left">
                  PYY
                  <div class="price pull-right"><span id="ask_current_PYY"></span></div>
              </div>
          </a>
        </div>
    </div>
  </div>
  <div id="mySidenav" class="sidenav">
    <span class="FundSideNavTitle">Funds</span>
    <button href="javascript:void(0)" id="closeWallet" class="closebtn btn btn-default" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></button>
    <ul class="navbar-nav navbar-sidenav wallet-currencies-nav" id="exampleAccordion">
      <li class="nav-item wallet-curr">
        <div class="h5 text-white" ><img src="./img/bitcoin.png" class="hero-logo img-rounded"> &nbsp;BTC<p class="pull-right font-15"><?php echo $btc_balance; ?> BTC</p></div>
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
       <div class="h5 text-white" ><img src="./img/bitcoincash.png" class="hero-logo img-rounded">&nbsp;BCH<p class="pull-right font-15"><?php echo $bcc_balance; ?> BCH</p></div>
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
      <li class="nav-item wallet-curr">
       <div class="h5 text-white" ><img src="./img/pyy.png" class="hero-logo img-rounded">&nbsp;PYY<p class="pull-right font-15"><?php echo $pyy_balance; ?> PYY</p></div>
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
      <li class="nav-item wallet-curr">
       <div class="h5 text-white" ><img src="./img/gdscoin.png" class="hero-logo img-rounded">&nbsp;GDS<p class="pull-right font-15"><?php echo $gds_balance; ?> GDS</p></div>
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
    </ul>
  </div>
<?php }else{
  echo 'test';
}

?>