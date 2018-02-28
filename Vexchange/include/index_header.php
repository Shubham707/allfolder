<?php
include 'config/config.php';
include 'apis/common.php';
$obj=NEW allapi();
$data=$obj->getallcategory();
$result=json_decode($data);

$datasub=$obj->getallSubcategory();
$subcat=json_decode($datasub, true);


?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title><?php echo PROJECT_TITLE;?></title>
   <link href="favicon.ico" rel="shortcut icon">
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <link href="css/io.style.css" rel="stylesheet" type="text/css">
   <link href="css/theme_dark.css" rel="stylesheet" type="text/css" id="darkStyle" disabled="disabled">
   <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-touch-icon-120x120.png"/>
   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/jquery.common.tools.js"></script>

</head>
<body class="en-body ">
<div id="siteNoty" class="notification-box"></div>
<div class="header clearfix">
    <div class="top-up">
        <div class="top-con">
            <ul class="topprice">
                <li> BTC/USDT : $ <span class="topnum">13752.5</span><i class="icon-arrow-up">&uarr;</i> </li>
                <li> ETH/USDT : $ <span class="topnum">432.15</span><i class="icon-arrow-down">&darr;</i> </li>
                <li> LTC/USDT : $ <span class="topnum">132.96</span><i class="icon-arrow-up">&uarr;</i> </li>
                <li> QTUM/USDT : $ <span class="topnum">11.12</span><i class="icon-arrow-down">&darr;</i> </li>
            </ul>
            <!-- <div class="qqtel">
                <a class="ask_ans" href="https://twitter.com/gate_io" target="_blank">
                    <p><i class="tico" title="Twitter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="244 244 24 24"><path fill="#FFF" d="M267.998 248.95c-.882.39-1.83.653-2.825.77 1.016-.606 1.795-1.564 2.164-2.703-.952.56-2.007.966-3.127 1.186-.9-.95-2.177-1.545-3.594-1.545-2.722 0-4.926 2.19-4.926 4.888 0 .38.042.757.126 1.116-4.09-.205-7.72-2.152-10.148-5.106-.425.724-.67 1.563-.67 2.456 0 1.697.872 3.19 2.193 4.07-.806-.027-1.566-.246-2.23-.614v.064c0 2.368 1.7 4.34 3.95 4.792-.414.11-.848.17-1.297.17-.317 0-.625-.026-.925-.087.625 1.94 2.445 3.355 4.6 3.396-1.686 1.31-3.807 2.092-6.113 2.092-.398 0-.79-.025-1.175-.07 2.177 1.387 4.767 2.195 7.547 2.195 9.06 0 14.012-7.448 14.012-13.903 0-.213-.008-.423-.017-.63.96-.694 1.795-1.552 2.457-2.537h-.002z"/></svg></i></p>
                </a>
                <a class="ask_ans" href="https://t.me/gateio" target="_blank">
                    <p><i class="tico" title="Telegram"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="244 244 24 24"><path fill="#FFF" d="M266.38 246.07l-21.26 8.2c-1.45.58-1.442 1.39-.264 1.75l5.302 1.656 2.03 6.22c.246.68.124.95.84.95.55 0 .795-.25 1.103-.55l2.65-2.58 5.517 4.075c1.015.56 1.748.27 2-.94l3.62-17.062c.37-1.486-.567-2.16-1.538-1.72zm-15.39 11.226l11.95-7.54c.598-.363 1.145-.168.695.23l-10.233 9.233-.398 4.248-2.014-6.172z"/></svg></i></p>
                </a>
                <a class="ask_ans" href="#" target="_blank">
                    <p><i>?</i>Ticket</p>
                </a>
            </div> -->
            <ul class="login_lan">
                <!-- <li class="top-links">
                    <a href="mobileapp.php" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="244 244 24 24"><path fill="#010101" d="M262 244h-12c-.83 0-1.5.672-1.5 1.5v21c0 .83.67 1.5 1.5 1.5h12c.83 0 1.5-.67 1.5-1.5v-21c0-.828-.67-1.5-1.5-1.5zm-8.625 1.5h5.25c.208 0 .375.168.375.375s-.167.375-.375.375h-5.25c-.208 0-.375-.168-.375-.375s.167-.375.375-.375zM256 267.25c-.62 0-1.125-.504-1.125-1.125S255.38 265 256 265s1.125.504 1.125 1.125-.504 1.125-1.125 1.125zm6-3h-12v-16.5h12v16.5z"></path></svg>
                        <span>Mobile APP</span>
                        <div class="add-dn-qr">
                            <h3>Download APP</h3>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKAAAACgAQMAAACxAfVuAAAABlBMVEX19fUJFi4ey4tKAAABe0lEQVR4Xr2VsY3AIAxFv5SCkhFYJBJrpSMda0XKIh6BMgXSP751G3A+N0EvhWU/jBERmeRoE6M9QJqFpMXAGwIl99dwnQU49mGnOeSDzLm+byBMT/HM6Q8hTow0VV0g9NbR8ndY7lOtC4Lyfp3uSF+S29CjPeBXyf5AEQMTV9ZqeYHRXo5E24X51kWturDIfInrCIKdHL8g34fpvA0pvShor/GrhkYLgQLsE7gqeZ8AToRAOXclbepcRnptFy7fRd6RXAX1MwZqnO8FUclPI74PkaRh+V46/MzXQmC+D+avUkWszAWKTag75I9qo3mXEi0I0uQbidRGIN8o+GBcwMrs2fnVbZi7RlpDAPggpDcKkgPQfgN9O0zsQvn2ycVBTxQGlb093jpVptbtQg/XLLWnTMRA35uqhgu2WbKUhEB5SRMDgDxl0rZhp8k1+buP7xoINdI4C5LW0Ik/gUtF7l4NAQRBtQ5QRf4YjmsfumJU4qrGPjV5IfDf4gdMWYDtsohUAwAAAABJRU5ErkJggg==">
                        </div>
                    </a>
                </li> -->

                        <li class="toplogin"><a href="login.php">Signup&nbsp;</a>|&nbsp; </li>
                        <li class="toplogin" id="toplogin"><a href="login.php">Login</a></li>

                    <!-- <li class="lang-option">
                    <span>English</span><i class="caret"></i>
                    <div class="more-lan"><a href="lang/cn.php" title="中文版">中文版</a></div>
                </li> -->
            </ul>
            <ul id="theme">
                <span>Theme:</span>
                <li id="dark" title="Dark">Dark</li>
                <li id="light" title="Light">Light</li>
            </ul>
        </div>
    </div>
    <div class="top-dn">
        <div class="logo">
            <a href="index.php" target="_top">
              <img src="<?php echo BASE_PATH;?>images/logo.png"/>
            </a>
        </div>


        <ul class="gateio-nav">
            <li>
                <a href="index.php">Home</a>

            </li>
            <li class="nav-trade-item">
                <a href="javascript:;">Markets<i class="caret"></i></a>
                <ul class="second-nav clearfix">
                    <?php
                  $i=1;
                foreach($result as $cat) {

                   ?>
                  <li>
                      <a href="javascript:;"><?php echo $cat->name;?> Markets<i class="caret"></i></a>
                      <ul class="third-nav clearfix">
                        <?php
                        foreach($subcat[$cat->id]['subcat'] as $subcatgory)
                  				{
                            $menuname=explode("W/",$subcatgory);
                        ?>
                        <li><a href='trade.php?curr=<?php echo base64_encode($subcatgory);?>'><strong><?php echo $menuname[0]?></strong></a></li>
                        <?php
                        }
                        ?>
                      </ul>
                  </li>
                    <?php $i++; }?>

                </ul>
            </li>
            <li>
                <a href="myaccount.php">Wallets</a>

            </li>

        </ul>

        <div id="top_last_rate" style="display: none"></div>


    </div>

</div>
