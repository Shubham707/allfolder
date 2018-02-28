<script type="text/javascript">

  $('.navbar-toggler').click(function(){

    if ($(this).hasClass('sidebar-toggler')) {
      $('body').toggleClass('sidebar-hidden');
    }

    if ($(this).hasClass('sidebar-minimizer')) {
      $('body').toggleClass('sidebar-minimized');
    }

    if ($(this).hasClass('aside-menu-toggler')) {
      $('body').toggleClass('aside-menu-hidden');
    }

    if ($(this).hasClass('mobile-sidebar-toggler')) {
      $('body').toggleClass('sidebar-mobile-show');
    }

  });
  $('.sidebar-close').click(function(){
    $('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
  });
  $('#sendBTC').on('modal', function () {
    $('#sendBTC').modal('show');
    $('.modal fade').toggleClass(".fade.show");

  });

         function isNumberKey(evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
            return false;

          return true;
        }
      </script>


      <!-- GenesisUI main scripts -->

<script src="js/app.js"></script>
<script type="text/javascript" src="js/sails.io.js"></script>
<script type="text/javascript">
///   url_api define on only common page ///

    io.sails.url = '<?php echo URL_API;?>';
    window.ioo = io;
    socket = io.connect( '<?php echo URL_API;?>', {
            reconnection: true,
            reconnectionDelay: 1000,
            reconnectionDelayMax : 5000,
            reconnectionAttempts: 99999
          });

          socket.on( 'connect', function () {
              console.log( 'connected to server' );
          } );

          socket.on( 'disconnect', function () {
              console.log( 'disconnected to server' );
              socket.connect();
          } );

          $(document).ready(function(){
               getAllDetailsOfUser();
          });



  </script>
  <?php
  if(isset($_GET['curr']))
  {
    $currencyname=base64_decode($_GET['curr']);
    switch ($currencyname) {
          case 'bch':
                ?>
    <script type="text/javascript">
  /*----------------------BCH data -----------------------*/
  getAllBidBCH();
  getAllAskBCH();
  getAllBidTotalBCH();
  getAllAskTotalBCH();

  function getCurrentAskPriceBCH(data){
    if(data.asksBCH){
      console.log("getCurrentAskPriceBCH",data.asksBCH[0].askRate);
      $('#ask_current_BCH').empty();
      for(var i=0; i< data.asksBCH.length;i++){
        if(data.asksBCH[i].status == 2){
          $('#ask_current_BCH').append(" &nbsp;"+data.asksBCH[i].askRate+"");
          console.log("getCurrentAskPriceBCH",data.asksBCH[i].askRate);
          break;
        }
      }
    }
  }

  /*-----------------USERS details function-----------------*/
  function getAllDetailsOfUser(){
    $.ajax({
      type: "POST", url: url_api+ "/user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php echo $user_session;?>'
      },
      success: function(res)
      {
        console.log("getAllDetailsOfUser", res);


        getUserBTCBalance(res);
        getUserBCHBalance(res);
        userBCHOpenOrders(res);
        userBCHClosedOrders(res);
        // getUserGDSBalance(res);
        // userGDSOpenOrders(res);
        // userBCHClosedOrders(res);
        // getUserEBTBalance(res);
        // userEBTOpenOrders(res);
        // userEBTClosedOrders(res);


      },
      error: function(err){
      }
    });
  }



  /*----------------BCH Market Functions ---------------*/
  function getAllBidBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllBidBCH",
      data: {},
      success: function(data){
        console.log("getAllBidBCH",data);
        var bid_orders = data;
        $('#bid_btc_bch').empty();

        $('#bid_current_BCH').append(" &nbsp;"+bid_orders.bidsBCH[0].bidRate+"");

        console.log("bid_orders",bid_orders);
        orderBookBidBCH(data);

      }
    });
  }
  function getAllBidTotalBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllBidBCH",
      data: {},
      success: function(data){
        console.log("totalgetAllBidBCH",data);
        var bid_orders = data;
        $('#bid_Total_btc_bch').empty();
        $('#bid_Total_bch').empty();
        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountBCHSum){
           $('#bid_Total_btc_bch').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
           $('#bid_Total_bch').append(" &nbsp;"+bid_orders.bidAmountBCHSum.toFixed(5)+"");
        }
      }
    });
  }
  function getAllAskBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllAskBCH",
      data: {},
      success: function(data){
        console.log("all getAllAskBCH",data);
        getCurrentAskPriceBCH(data)
        orderBookAskBCH(data);

      }
    });
  }
  function getAllAskTotalBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllAskBCH",
      data: {},
      success: function(data){
        console.log("getAllAskBCH",data);
        $('#ask_Total_btc_bch').empty();
        $('#ask_Total_bch').empty();

        $('#ask_Total_btc_bch').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
        $('#ask_Total_bch').append(" &nbsp;"+data.askAmountBCHSum.toFixed(5) +"");


      }
    });
  }

  function orderBookBidBCH(data){
    console.log("orderBookBidBCH",data);
    var bid_orders = data;
    $('#bid_btc_bch').empty();

    if(data.bidsBCH){
      for (var i = 0; i < 30; i++) {
        if(i==bid_orders.bidsBCH.length) break;
        if(data.bidsBCH[i].status != 1){
          console.log("data.bidsBCH[i].status",data.bidsBCH[i].bidAmountBTC);
          $('#bid_btc_bch').append('<tr><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>' + bid_orders.bidsBCH[i].bidRate + '</td></tr>')
        }
      }
    }
  }
  function orderBookAskBCH(data) {
    console.log("orderBookAskBCH",data);
    $('#ask_btc_bch').empty();
    if(data.asksBCH){
      for (var j = 0; j < 30; j++){
        if(j==data.asksBCH.length) break;
        if(data.asksBCH[j].status != 1){

          $('#ask_btc_bch').append('<tr><td>' + data.asksBCH[j].askAmountBTC + '</td><td>' + data.asksBCH[j].askAmountBCH + '</td><td>' + data.asksBCH[j].askRate + '</td></tr>');
        }
      }
    }
  }
  function getBidsBCHSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getBidsBCHSuccess",
      data: {},
      success: function(data){
        $('#market_bid_bch').empty();

        var bid_orders = data;

        for (var i = 0; i < 30; i++) {
          if(i==bid_orders.bidsBCH.length) break;
          $('#market_bid_bch').append('<tr><td>' + bid_orders.bidsBCH[i].createTimeUTC + '</td>'+
            '</td><td>BID</td><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>'+ bid_orders.bidsBCH[i].totalbidAmountBTC + '</td><td>'+ bid_orders.bidsBCH[i].totalbidAmountBCH + '</td></tr>')
        }

      }
    });
  }
  function getAsksBCHSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAsksBCHSuccess",
      data: {},
      success: function(data){
        $('#market_ask_bch').empty();
        var ask_orders = data;

        for (var i = 0; i < 30; i++){
          if(i==data.asksBCH.length) break;
          $('#market_ask_bch').append('<tr><td>' + ask_orders.asksBCH[i].createTimeUTC + '</td>' +
            '</td><td>ASK</td><td>'+ ask_orders.asksBCH[i].askAmountBTC + '</td><td>' + ask_orders.asksBCH[i].askAmountBCH + '</td><td>'+ ask_orders.asksBCH[i].totalaskAmountBTC + '</td><td>'+ ask_orders.asksBCH[i].totalaskAmountBCH + '</td></tr>')
        }

      }
    });
  }


  function getUserBCHBalance(details){
    console.log("getUserBCHBalance",details.user.BCHbalance);
    $('#avalBCHBalance').empty();
    $('#freezeBCHBalance').empty();
    $('#avalBCHBalance').append(details.user.BCHbalance+" ");
    $('#freezeBCHBalance').append(details.user.FreezedBCHbalance+" ");
  }
  function userBCHOpenOrders(details){
    console.log("userOpenOrders:::details::",details);
    $('#open_bid_bch').empty();
    $('#open_ask_bch').empty();
    bid=details.user.bidsBCH;
    ask=details.user.asksBCH;
    var finalObj = bid.concat(ask);
    console.log("userOpenOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 2 ){
        if(finalObj[i].bidAmountBCH){
          $('#open_bid_bch').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>BID</td><td>'
            +finalObj[i].bidAmountBCH+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountBCH+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td><td><a class="text-danger" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerBCH+');"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a></td></tr>');
        }
        else{
          $('#open_ask_bch').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Ask</td><td>'
            +finalObj[i].askAmountBCH+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountBCH+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td><td><a class="text-danger" onclick="del_ask(id='+finalObj[i].id+',askownerBCH='+finalObj[i].askownerBCH+');" ><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>'+
            '</td></tr>');
        }
      }

    }
  }
  function userBCHClosedOrders(details){
    $('#market_bid_bch').empty();
    $('#market_ask_bch').empty();
    bid=details.user.bidsBCH;
    ask=details.user.asksBCH;
    var finalObj = bid.concat(ask);
    console.log("userClosedOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 1 )
      {
        if(finalObj[i].bidAmountBCH){
          $('#market_bid_bch').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Buy</td><td>'
            +finalObj[i].bidAmountBCH+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountBCH+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td></tr>');
        }
        else{
          $('#market_ask_bch').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Sell</td><td>'
            +finalObj[i].askAmountBCH+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountBCH+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td></tr>');
        }
      }
    }
  }
  /*----------------BCH Market Sockets-----------------------*/
  io.socket.on('BCH_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      console.log("market BCH_BID_ADDED::: getAllBidBCH:::", data.body);
      orderBookBidBCH(data.body);
      getAllBidTotalBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("market userBCH_BID_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      console.log("BCH_ASK_ADDED::: getAllASKBCH:::", data.body);
      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH(data.body);
      getAllAskTotalBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_ASK_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      //update all market bids and update bid_btc_bch
      console.log("BCH_BID_DESTROYED::: getAllBidBCH:::", data.body);

      orderBookBidBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_BID_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHClosedOrders(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      console.log("BCH_ASK_DESTROYED::: getAllASKBCH:::", data.body);

      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_ASK_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHClosedOrders(details.body);
      userBCHsOpenOrders(details.body);
    });
  });
  /*---------------------END BCH ----------------------------*/

  </script>
  <?php
break;
case 'ebt':
?>
<script>

  /*-----------------EBT ALL DATA ----------------------------*/
  getAllBidEBT();
  getAllAskEBT();
  getAllBidTotalEBT();
  getAllAskTotalEBT();
  function getAllBidEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllBidEBT",
      data: {},
      success: function(data){

        var bid_orders = data;

        if(bid_orders.bidsEBT){
          for (var i = 0; i < 30; i++) {
            if(i==bid_orders.bidsEBT.length) break;
            if(data.bidsEBT[i].status != 1){
              $('#bid_btc_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].bidAmountBTC + '</td><td>' + bid_orders.bidsEBT[i].bidAmountEBT + '</td><td>' + bid_orders.bidsEBT[i].bidRate + '</td></tr>')
            }
          }
        }


      }
    });
  };

  /*-----------------USERS details function-----------------*/
  function getAllDetailsOfUser(){
    $.ajax({
      type: "POST", url: url_api+ "/user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php echo $user_session;?>'
      },
      success: function(res)
      {
        console.log("getAllDetailsOfUser", res);


        getUserBTCBalance(res);
        // getUserBCHBalance(res);
        // userBCHOpenOrders(res);
        // userBCHClosedOrders(res);
        // getUserGDSBalance(res);
        // userGDSOpenOrders(res);
        // userBCHClosedOrders(res);
        getUserEBTBalance(res);
        userEBTOpenOrders(res);
        userEBTClosedOrders(res);


      },
      error: function(err){
      }
    });
  }

  function getAllBidTotalEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllBidEBT",
      data: {},
      success: function(data){

        var bid_orders = data;
        $('#bid_Total_btc_ebt').empty();
        $('#bid_Total_ebt').empty();
        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountEBTSum )
        {
          $('#bid_Total_btc_ebt').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
          $('#bid_Total_ebt').append(" &nbsp;"+bid_orders.bidAmountEBTSum.toFixed(5)+"");

        }

      }
    });
  };
  function getAllAskEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllAskEBT",
      data: {},
      success: function(data){
        getCurrentAskPriceEBT(data);
        if(data.asksEBT){
          for (var i = 0; i < 30; i++) {
            if(i==data.asksEBT.length) break;
            if(data.asksEBT[i].status != 1){
              $('#ask_btc_ebt').append('<tr><td>' + data.asksEBT[i].askAmountBTC + '</td><td>' + data.asksEBT[i].askAmountEBT + '</td><td>' + data.asksEBT[i].askRate + '</td></tr>');
            }
          }
        }

      }
    });
  }
  function getAllAskTotalEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllAskEBT",
      data: {},
      success: function(data){
        $('#ask_Total_btc_ebt').empty();
        $('#ask_Total_ebt').empty();
        if(data.askAmountBTCSum && data.askAmountEBTSum)
        {
          $('#ask_Total_btc_ebt').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
          $('#ask_Total_ebt').append(" &nbsp;"+data.askAmountEBTSum.toFixed(5)+"");
        }
      }
    });
  }
  function getBidsEBTSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getBidsEBTSuccess",
      data: {},
      success: function(data){

        var bid_orders = data;

        for (var i = 0; i < 30; i++) {
          if(i==bid_orders.bidsEBT.length) break;
          $('#market_bid_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].updatedAt + '</td>'+
            '</td><td>BUY</td><td>' + bid_orders.bidsEBT[i].bidRate + '</td><td>' + bid_orders.bidsEBT[i].totalbidAmountEBT + '</td><td>'+ bid_orders.bidsEBT[i].totalbidAmountBTC + '</td></tr>')
        }

      }
    });
  }
  function getAsksEBTSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAsksEBTSuccess",
      data: {},
      success: function(data){
        var ask_orders = data;

        for (var i = 0; i < 30; i++){
          if(i==data.asksEBT.length) break;
          $('#market_ask_ebt').append('<tr><td>' + ask_orders.asksEBT[i].updatedAt +
            '</td><td>SELL</td><td>'+ ask_orders.asksEBT[i].askRate + '</td><td>'+ ask_orders.asksEBT[i].totalaskAmountEBT + '</td><td>'+ ask_orders.asksEBT[i].totalaskAmountBTC + '</td></tr>')
        }

      }
    });
  }
  function getCurrentAskPriceEBT(data){
    if(data.asksEBT){
      $('#ask_current_EBT').empty();
      for(var i=0; i< data.asksEBT.length;i++){
        if(data.asksEBT[i].status == 2){
          console.log("getCurrentAskPriceEBT",data.asksEBT[i].askRate);

          $('#ask_current_EBT').append(" &nbsp;"+data.asksEBT[i].askRate+"");
          break;
        }
      }
    }
  }
  function orderBookBidEBT(data){
    console.log("orderBookBidEBT",data);
    var bid_orders = data;
    $('#bid_btc_ebt').empty();

    if(data.bidsEBT){
      for (var i = 0; i < 30; i++) {
        if(i==bid_orders.bidsEBT.length) break;
        if(data.bidsEBT[i].status != 1){
          console.log("data.bidsEBT[i].status",data.bidsEBT[i].bidAmountBTC);

          $('#bid_btc_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].bidAmountBTC + '</td><td>' + bid_orders.bidsEBT[i].bidAmountEBT + '</td><td>' + bid_orders.bidsEBT[i].bidRate + '</td></tr>')
        }
      }
    }
  }
  function orderBookAskEBT(data) {
    console.log("orderBookAskEBT",data);
    $('#ask_btc_ebt').empty();
    if(data.asksEBT){
      for (var j = 0; j < 30; j++){
        if(j==data.asksEBT.length) break;
        if(data.asksEBT[j].status != 1){

          $('#ask_btc_ebt').append('<tr><td>' + data.asksEBT[j].askAmountBTC + '</td><td>' + data.asksEBT[j].askAmountEBT + '</td><td>' + data.asksEBT[j].askRate + '</td></tr>');
        }
      }
    }
  }
  function getUserEBTBalance(details){
    console.log("getUserEBTBalance",details.user.EBTbalance);
    $('#avalEBTBalance').empty();
    $('#freezeEBTBalance').empty();
    $('#avalEBTBalance').append(details.user.EBTbalance+" ");
    $('#freezeEBTBalance').append(details.user.FreezedEBTbalance+" ");
  }
  function userEBTOpenOrders(details){
    console.log("userOpenOrders:::details::",details);
    $('#open_bid_ebt').empty();
    $('#open_ask_ebt').empty();
    bid=details.user.bidsEBT;
    ask=details.user.asksEBT;
    var finalObj = bid.concat(ask);
    console.log("userOpenOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 2 ){
        if(finalObj[i].bidAmountEBT){
          $('#open_bid_ebt').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Buy</td><td>'
            +finalObj[i].bidAmountEBT+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountEBT+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td><td><a class="text-danger" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerEBT+');"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a></td></tr>');
        }
        else{
          $('#open_ask_ebt').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Sell</td><td>'
            +finalObj[i].askAmountEBT+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountEBT+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td><td><a class="text-danger" onclick="del_ask(id='+finalObj[i].id+',askownerEBT='+finalObj[i].askownerEBT+');" ><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>'+
            '</td></tr>');
        }
      }

    }
  }
  function userEBTClosedOrders(details){
    $('#market_bid_ebt').empty();
    $('#market_ask_ebt').empty();
    bid=details.user.bidsEBT;
    ask=details.user.asksEBT;
    var finalObj = bid.concat(ask);
    console.log("userClosedOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 1 )
      {
        if(finalObj[i].bidAmountEBT){
          $('#market_bid_ebt').append('<tr><td>'
            +finalObj[i].updatedAt+
            '</td><td>BUY</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountEBT+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td></tr>');
        }
        else{
          $('#market_ask_ebt').append('<tr><td>'
            +finalObj[i].updatedAt+
            '</td><td>SELL</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountEBT+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td></tr>');
        }
      }
    }
  }

  io.socket.on('EBT_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
      console.log("EBT_BID_ADDED::: getAllBidEBT:::", data.body);
      orderBookBidEBT(data.body);
      getAllBidTotalEBT(data.body);

    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_BID_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTOpenOrders(details.body);
    });
  });
  io.socket.on('EBT_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
      console.log("EBT_ASK_ADDED::: getAllASKEBT:::", data.body);
      getCurrentAskPriceEBT(data.body);
      orderBookAskEBT (data.body);
      getAllAskTotalEBT(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_ASK_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTOpenOrders(details.body);
    });
  });
  io.socket.on('EBT_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
      //update all market bids and update bid_btc_ebt
      console.log("EBT_BID_DESTROYED::: getAllBidEBT:::", data.body);
      orderBookBidEBT(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_BID_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTClosedOrders(details.body);
      userEBTOpenOrders(details.body);
    });
  });
  io.socket.on('EBT_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
      console.log("EBT_ASK_DESTROYED::: getAllASKEBT:::", data.body);

      getCurrentAskPriceEBT(data.body);
      orderBookAskEBT (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_ASK_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTClosedOrders(details.body);
      userEBTsOpenOrders(details.body);
    });
  });

  /*---------------------END EBT --------------------------------*/
  </script>
  <?php
break;
case 'gds':
    ?>
    <script>
  /*---------------------GDS DATA--------------------------------*/
  $(document).ready(function(){

    getAllBidGDS();
    getAllAskGDS();
    getAllBidTotalGDS();
    getAllAskTotalGDS();
  });

  /*-----------------USERS details function-----------------*/
  function getAllDetailsOfUser(){
    $.ajax({
      type: "POST", url: url_api+ "/user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php echo $user_session;?>'
      },
      success: function(res)
      {
        console.log("getAllDetailsOfUser", res);


        getUserBTCBalance(res);
        // getUserBCHBalance(res);
        // userBCHOpenOrders(res);
        // userBCHClosedOrders(res);
        getUserGDSBalance(res);
        userGDSOpenOrders(res);
        userGDSClosedOrders(res);
        // getUserEBTBalance(res);
        // userEBTOpenOrders(res);
        // userEBTClosedOrders(res);


      },
      error: function(err){
      }
    });
  }

  function getAllBidGDS(){
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/getAllBidGDS",
        data: {},
        success: function(data){

            var bid_orders = data;
            $('#bid_current_GDS').empty();
            if(bid_orders.bidsGDS){
              for (var i = 0; i < 30; i++) {
                if(i==bid_orders.bidsGDS.length) break;
                if(data.bidsGDS[i].status != 1){

                  $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>');
                }
              }
            }
        }
    });
  };
  function getAllBidTotalGDS(){
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/getAllBidGDS",
        data: {},
        success: function(data){

            var bid_orders = data;
            $('#bid_Total_btc_gds').empty();
            $('#bid_Total_gds').empty();
            if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountGDSSum) {

              $('#bid_Total_btc_gds').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
            $('#bid_Total_gds').append(" &nbsp;"+bid_orders.bidAmountGDSSum.toFixed(5)+"");

            }

        }
    });
  };
  function getAllAskGDS(){
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/getAllAskGDS",
        data: {},
        success: function(data){

            getCurrentAskPriceGDS(data)
            if(data.asksGDS){
              for (var i = 0; i < 30; i++) {
                if(i==data.asksGDS.length) break;
                if(data.asksGDS[i].status != 1){
                  $('#ask_btc_gds').append('<tr><td>' + data.asksGDS[i].askAmountBTC + '</td><td>' + data.asksGDS[i].askAmountGDS + '</td><td>' + data.asksGDS[i].askRate + '</td></tr>');
                }
              }
            }

        }
    });
  }
  function getAllAskTotalGDS(){
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/getAllAskGDS",
        data: {},
        success: function(data){

            $('#ask_Total_btc_gds').empty();
            $('#ask_Total_gds').empty();
            if(data.askAmountBTCSum && data.askAmountGDSSum)
            {
              $('#ask_Total_btc_gds').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
             $('#ask_Total_gds').append(" &nbsp;"+data.askAmountGDSSum.toFixed(5)+"");
            }


        }
    });
  }
  function getBidsGDSSuccess(){
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/getBidsGDSSuccess",
        data: {},
        success: function(data){

            var bid_orders = data;

            for (var i = 0; i < 30; i++) {
                if(i==bid_orders.bidsGDS.length) break;
                $('#market_bid_gds').append('<tr><td>' + bid_orders.bidsGDS[i].createTimeUTC + '</td>'+
                        '</td><td>BID</td><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>'+ bid_orders.bidsGDS[i].totalbidAmountBTC + '</td><td>'+ bid_orders.bidsGDS[i].totalbidAmountGDS + '</td></tr>')
            }

        }
    });
  }
  function getAsksGDSSuccess(){
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/getAsksGDSSuccess",
        data: {},
        success: function(data){
          var ask_orders = data;

              for (var i = 0; i < 30; i++){
                if(i==data.asksGDS.length) break;
                $('#market_ask_gds').append('<tr><td>' + ask_orders.asksGDS[i].createTimeUTC + '</td>' +
                        '</td><td>ASK</td><td>'+ ask_orders.asksGDS[i].askAmountBTC + '</td><td>' + ask_orders.asksGDS[i].askAmountGDS + '</td><td>'+ ask_orders.asksGDS[i].totalaskAmountBTC + '</td><td>'+ ask_orders.asksGDS[i].totalaskAmountGDS + '</td></tr>')
              }

        }
    });
  }
  function getCurrentAskPriceGDS(data){

      if(data.asksGDS){
        $('#ask_current_GDS').empty();
        for(var i=0; i< data.asksGDS.length;i++){
          if(data.asksGDS[i].status == 2){
            console.log("getCurrentAskPriceGDS",data.asksGDS[i].askRate);
            $('#ask_current_GDS').append(" &nbsp;"+data.asksGDS[i].askRate+"");
            break;
          }
        }
      }
  }
  function orderBookBidGDS(data){
      console.log("orderBookBidGDS",data);
      var bid_orders = data;
      $('#bid_btc_gds').empty();

      if(data.bidsGDS){
        for (var i = 0; i < 30; i++) {
          if(i==bid_orders.bidsGDS.length) break;
          if(data.bidsGDS[i].status != 1){
            console.log("data.bidsGDS[i].status",data.bidsGDS[i].bidAmountBTC);

            $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>')
          }
        }
      }
  }
  function orderBookAskGDS (data) {
      console.log("orderBookAskGDS",data);
      $('#ask_btc_gds').empty();
      if(data.asksGDS){
        for (var j = 0; j < 30; j++){
          if(j==data.asksGDS.length) break;
          if(data.asksGDS[j].status != 1){

            $('#ask_btc_gds').append('<tr><td>' + data.asksGDS[j].askAmountBTC + '</td><td>' + data.asksGDS[j].askAmountGDS + '</td><td>' + data.asksGDS[j].askRate + '</td></tr>');
          }
        }
      }
  }
  function getUserGDSBalance(details){
    console.log("getUserGDSBalance",details.user.GDSbalance);
      $('#avalGDSBalance').empty();
      $('#freezeGDSBalance').empty();
      $('#avalGDSBalance').append(details.user.GDSbalance+" ");
      $('#freezeGDSBalance').append(details.user.FreezedGDSbalance+" ");
  }
  function userGDSOpenOrders(details){
      console.log("userOpenOrders:::details::",details);
      $('#open_bid_gds').empty();
      $('#open_ask_gds').empty();
      bid=details.user.bidsGDS;
      ask=details.user.asksGDS;
      var finalObj = bid.concat(ask);
      console.log("userOpenOrders",finalObj);
      for( var i=0; i<finalObj.length; i++)
      {
          if(finalObj[i].status == 2 ){
              if(finalObj[i].bidAmountGDS){
                  $('#open_bid_gds').append('<tr><td>'
                      +finalObj[i].createdAt+
                      '</td><td>Bid</td><td>'
                      +finalObj[i].bidAmountGDS+
                      '</td><td>'
                      +finalObj[i].bidRate+
                      '</td><td>'
                      +finalObj[i].totalbidAmountGDS+
                      '</td><td>'
                      +finalObj[i].totalbidAmountBTC+
                      '</td><td><a class="text-danger" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerGDS+');"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a></td></tr>');
              }
              else{
                  $('#open_ask_gds').append('<tr><td>'
                      +finalObj[i].createdAt+
                      '</td><td>Ask</td><td>'
                      +finalObj[i].askAmountGDS+
                      '</td><td>'
                      +finalObj[i].askRate+
                      '</td><td>'
                      +finalObj[i].totalaskAmountGDS+
                      '</td><td>'
                      +finalObj[i].totalaskAmountBTC+
                      '</td><td><a class="text-danger" onclick="del_ask(id='+finalObj[i].id+',askownerGDS='+finalObj[i].askownerGDS+');" ><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>'+
                      '</td></tr>');
              }
          }

      }
  }
  function userGDSClosedOrders(details){
    $('#market_bid_gds').empty();
    $('#market_ask_gds').empty();
      bid=details.user.bidsGDS;
      ask=details.user.asksGDS;
      var finalObj = bid.concat(ask);
      console.log("userClosedOrders",finalObj);
      for( var i=0; i<finalObj.length; i++)
      {
          if(finalObj[i].status == 1 )
          {
            if(finalObj[i].bidAmountGDS){
                $('#market_bid_gds').append('<tr><td>'
                    +finalObj[i].createdAt+
                    '</td><td>Buy</td><td>'
                    +finalObj[i].bidAmountGDS+
                    '</td><td>'
                    +finalObj[i].bidRate+
                    '</td><td>'
                    +finalObj[i].totalbidAmountGDS+
                    '</td><td>'
                    +finalObj[i].totalbidAmountBTC+
                    '</td></tr>');
            }
            else{
                $('#market_ask_gds').append('<tr><td>'
                    +finalObj[i].createdAt+
                    '</td><td>Sell</td><td>'
                    +finalObj[i].askAmountGDS+
                    '</td><td>'
                    +finalObj[i].askRate+
                    '</td><td>'
                    +finalObj[i].totalaskAmountGDS+
                    '</td><td>'
                    +finalObj[i].totalaskAmountBTC+
                    '</td></tr>');
            }
          }
      }
  }

  io.socket.on('GDS_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
      console.log("GDS_BID_ADDED::: getAllBidGDS:::", data.body);
      orderBookBidGDS(data.body);
      getAllBidTotalGDS(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("GDS_BID_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSOpenOrders(details.body);
    });
  });
  io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
      console.log("GDS_ASK_ADDED::: getAllASKGDS:::", data.body);
      getCurrentAskPriceGDS(data.body);
      orderBookAskGDS (data.body);
      getAllAskTotalGDS(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("GDS_ASK_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSOpenOrders(details.body);
    });
  });
  io.socket.on('GDS_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
      //update all market bids and update bid_btc_gds
      console.log("GDS_BID_DESTROYED::: getAllBidGDS:::", data.body);
      orderBookBidGDS(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("GDS_BID_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSClosedOrders(details.body);
      userGDSOpenOrders(details.body);
    });
  });
  io.socket.on('GDS_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
      console.log("GDS_ASK_DESTROYED::: getAllASKGDS:::", data.body);

      getCurrentAskPriceGDS(data.body);
      orderBookAskGDS (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("GDS_ASK_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSClosedOrders(details.body);
      userGDSOpenOrders(details.body);
    });
  });

</script>
</script>
<?php
break;
}
}


?>
<script>
 $.ajax({
  type: "POST",
  url: url_api+"/user/getAllDetailsOfUser",
  data: {
    userMailId: '<?php echo $user_session;?>'
  },
  cache: false,
  success: function(res)
  {

    var user_details = res.user;
    window.user_details = user_details;


  },
  error: function(err){

  }
});

function getUserBTCBalance(details){
  $('#avalBTCBalance').empty();
  $('#freezeBTCBalance').empty();
  $('#avalBTCBalance').append(details.user.BTCbalance.toFixed(5)+" ");
  $('#freezeBTCBalance').append(details.user.FreezedBTCbalance+" ");
}
</script>
