</main>




</div>

<footer class="app-footer">
  <a href="#">ZenithNEX</a> &copy; 2017
  <span class="float-right"> <a href="contactnew.php">Contact-Us</a>
  </span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

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
          io.sails.url = 'http://199.188.206.184:1338';
          window.ioo = io;
          socket = io.connect( 'http://199.188.206.184:1338', {
            reconnection: true,
            reconnectionDelay: 1000,
            reconnectionDelayMax : 5000,
            reconnectionAttempts: 99999
          });

          socket.on( 'connect', function () {
              
          } );

          socket.on( 'disconnect', function () {
              
              socket.connect();
          } );
  getAllDetailsOfUser();
  /*----------------------BCH data -----------------------*/
  getAllBidBCH();
  getAllAskBCH();
  getAllBidTotalBCH();
  getAllAskTotalBCH();

  function getCurrentAskPriceBCH(data){
    if(data.asksBCH){
      
      $('#ask_current_BCH').empty();
      for(var i=0; i< data.asksBCH.length;i++){
        if(data.asksBCH[i].status == 2){
          $('#ask_current_BCH').append(" &nbsp;"+data.asksBCH[i].askRate+"");
          
          break;
        }
      }
    }
  }
  /*----------------BCH Market Functions ---------------*/
  function getAllBidBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllBidBCH",
      data: {},
      success: function(data){
       
        var bid_orders = data;
        $('#bid_btc_bch').empty();
        if(bid_orders.bidsBCH){
            $('#bid_current_BCH').append(" &nbsp;"+bid_orders.bidsBCH[0].bidRate+"");

        
        orderBookBidBCH(data);

        }
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
        
        $('#ask_Total_btc_bch').empty();
        $('#ask_Total_bch').empty();
        if(data.askAmountBTCSum && data.askAmountBCHSum){
          $('#ask_Total_btc_bch').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
        $('#ask_Total_bch').append(" &nbsp;"+data.askAmountBCHSum.toFixed(5) +"");

        }

      }
    });
  }

  function orderBookBidBCH(data){
   
    var bid_orders = data;
    $('#bid_btc_bch').empty();

    if(data.bidsBCH){
      for (var i = 0; i < 30; i++) {
        if(i==bid_orders.bidsBCH.length) break;
        if(data.bidsBCH[i].status != 1){
         
          $('#bid_btc_bch').append('<tr><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>' + bid_orders.bidsBCH[i].bidRate + '</td></tr>')
        }
      }
    }
  }
  function orderBookAskBCH(data) {
    
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
  /*-----------------USERS details function-----------------*/
  function getAllDetailsOfUser(){
    $.ajax({
      type: "POST", url: url_api+ "/user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php echo $user_session;?>'
      },
      success: function(res)
      {
        
        getUserBTCBalance(res);

        getUserBCHBalance(res);
        userBCHOpenOrders(res);
        userBCHClosedOrders(res);

        getUserGDSBalance(res);
        userGDSOpenOrders(res);
        userBCHClosedOrders(res);

        getUserPYYBalance(res);
        userPYYOpenOrders(res);
        userPYYClosedOrders(res);

      },
      error: function(err){
      }
    });
  }
  function getUserBTCBalance(details){
    $('#avalBTCBalance').empty();
    $('#freezeBTCBalance').empty();
    $('#avalBTCBalance').append(details.user.BTCbalance.toFixed(5)+" ");
    $('#freezeBTCBalance').append(details.user.FreezedBTCbalance+" ");
  }
  function getUserBCHBalance(details){
    
    $('#avalBCHBalance').empty();
    $('#freezeBCHBalance').empty();
    $('#avalBCHBalance').append(details.user.BCHbalance+" ");
    $('#freezeBCHBalance').append(details.user.FreezedBCHbalance+" ");
  }
  function userBCHOpenOrders(details){
    
    $('#open_bid_bch').empty();
    $('#open_ask_bch').empty();
    bid=details.user.bidsBCH;
    ask=details.user.asksBCH;
    var finalObj = bid.concat(ask);
   
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
      
      orderBookBidBCH(data.body);
      getAllBidTotalBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      
      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH(data.body);
      getAllAskTotalBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
     
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      //update all market bids and update bid_btc_bch
      

      orderBookBidBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
     
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHClosedOrders(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
     

      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
     
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHClosedOrders(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  /*---------------------END BCH ----------------------------*/

  /*-----------------PYY ALL DATA ----------------------------*/
  getAllBidPYY();
  getAllAskPYY();
  getAllBidTotalPYY();
  getAllAskTotalPYY();
  function getAllBidPYY(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/getAllBidPYY",
      data: {},
      success: function(data){

        var bid_orders = data;

        if(bid_orders.bidsPYY){
          for (var i = 0; i < 30; i++) {
            if(i==bid_orders.bidsPYY.length) break;
            if(data.bidsPYY[i].status != 1){
              $('#bid_btc_pyy').append('<tr><td>' + bid_orders.bidsPYY[i].bidAmountBTC + '</td><td>' + bid_orders.bidsPYY[i].bidAmountPYY + '</td><td>' + bid_orders.bidsPYY[i].bidRate + '</td></tr>')
            }
          }
        }


      }
    });
  };
  function getAllBidTotalPYY(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/getAllBidPYY",
      data: {},
      success: function(data){

        var bid_orders = data;
        $('#bid_Total_btc_pyy').empty();
        $('#bid_Total_pyy').empty();
        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountPYYSum )
        {
          $('#bid_Total_btc_pyy').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
          $('#bid_Total_pyy').append(" &nbsp;"+bid_orders.bidAmountPYYSum.toFixed(5)+"");

        }

      }
    });
  };
  function getAllAskPYY(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/getAllAskPYY",
      data: {},
      success: function(data){
        getCurrentAskPricePYY(data);
        if(data.asksPYY){
          for (var i = 0; i < 30; i++) {
            if(i==data.asksPYY.length) break;
            if(data.asksPYY[i].status != 1){
              $('#ask_btc_pyy').append('<tr><td>' + data.asksPYY[i].askAmountBTC + '</td><td>' + data.asksPYY[i].askAmountPYY + '</td><td>' + data.asksPYY[i].askRate + '</td></tr>');
            }
          }
        }

      }
    });
  }
  function getAllAskTotalPYY(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/getAllAskPYY",
      data: {},
      success: function(data){
        $('#ask_Total_btc_pyy').empty();
        $('#ask_Total_pyy').empty();
        if(data.askAmountBTCSum && data.askAmountPYYSum)
        {
          $('#ask_Total_btc_pyy').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
          $('#ask_Total_pyy').append(" &nbsp;"+data.askAmountPYYSum.toFixed(5)+"");
        }
      }
    });
  }
  function getBidsPYYSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/getBidsPYYSuccess",
      data: {},
      success: function(data){

        var bid_orders = data;

        for (var i = 0; i < 30; i++) {
          if(i==bid_orders.bidsPYY.length) break;
          $('#market_bid_pyy').append('<tr><td>' + bid_orders.bidsPYY[i].updatedAt + '</td>'+
            '</td><td>BUY</td><td>' + bid_orders.bidsPYY[i].bidAmountBTC + '</td><td>' + bid_orders.bidsPYY[i].bidAmountPYY + '</td><td>' + bid_orders.bidsPYY[i].totalbidAmountPYY + '</td><td>'+ bid_orders.bidsPYY[i].totalbidAmountBTC + '</td></tr>')
        }

      }
    });
  }
  function getAsksPYYSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/getAsksPYYSuccess",
      data: {},
      success: function(data){
        var ask_orders = data;

        for (var i = 0; i < 30; i++){
          if(i==data.asksPYY.length) break;
          $('#market_ask_pyy').append('<tr><td>' + ask_orders.asksPYY[i].updatedAt +
            '</td><td>SELL</td><td>'+ ask_orders.asksPYY[i].askAmountBTC + '</td><td>'+ ask_orders.asksPYY[i].askAmountPYY + '</td><td>'+ ask_orders.asksPYY[i].totalaskAmountPYY + '</td><td>'+ ask_orders.asksPYY[i].totalaskAmountBTC + '</td></tr>')
        }

      }
    });
  }
  function getCurrentAskPricePYY(data){
    if(data.asksPYY){
      $('#ask_current_PYY').empty();
      for(var i=0; i< data.asksPYY.length;i++){
        if(data.asksPYY[i].status == 2){
          

          $('#ask_current_PYY').append(" &nbsp;"+data.asksPYY[i].askRate+"");
          break;
        }
      }
    }
  }
  function orderBookBidPYY(data){
    
    var bid_orders = data;
    $('#bid_btc_pyy').empty();

    if(data.bidsPYY){
      for (var i = 0; i < 30; i++) {
        if(i==bid_orders.bidsPYY.length) break;
        if(data.bidsPYY[i].status != 1){
         

          $('#bid_btc_pyy').append('<tr><td>' + bid_orders.bidsPYY[i].bidAmountBTC + '</td><td>' + bid_orders.bidsPYY[i].bidAmountPYY + '</td><td>' + bid_orders.bidsPYY[i].bidRate + '</td></tr>')
        }
      }
    }
  }
  function orderBookAskPYY(data) {
   
    $('#ask_btc_pyy').empty();
    if(data.asksPYY){
      for (var j = 0; j < 30; j++){
        if(j==data.asksPYY.length) break;
        if(data.asksPYY[j].status != 1){

          $('#ask_btc_pyy').append('<tr><td>' + data.asksPYY[j].askAmountBTC + '</td><td>' + data.asksPYY[j].askAmountPYY + '</td><td>' + data.asksPYY[j].askRate + '</td></tr>');
        }
      }
    }
  }
  function getUserPYYBalance(details){
  
    $('#avalPYYBalance').empty();
    $('#freezePYYBalance').empty();
    $('#avalPYYBalance').append(details.user.PYYbalance+" ");
    $('#freezePYYBalance').append(details.user.FreezedPYYbalance+" ");
  }
  function userPYYOpenOrders(details){
   
    $('#open_bid_pyy').empty();
    $('#open_ask_pyy').empty();
    bid=details.user.bidsPYY;
    ask=details.user.asksPYY;
    var finalObj = bid.concat(ask);
    
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 2 ){
        if(finalObj[i].bidAmountPYY){
          $('#open_bid_pyy').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Buy</td><td>'
            +finalObj[i].bidAmountPYY+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountPYY+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td><td><a class="text-danger" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerPYY+');"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a></td></tr>');
        }
        else{
          $('#open_ask_pyy').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>Sell</td><td>'
            +finalObj[i].askAmountPYY+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountPYY+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td><td><a class="text-danger" onclick="del_ask(id='+finalObj[i].id+',askownerPYY='+finalObj[i].askownerPYY+');" ><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>'+
            '</td></tr>');
        }
      }

    }
  }
  function userPYYClosedOrders(details){
    $('#market_bid_pyy').empty();
    $('#market_ask_pyy').empty();
    bid=details.user.bidsPYY;
    ask=details.user.asksPYY;
    var finalObj = bid.concat(ask);
   
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 1 )
      {
        if(finalObj[i].bidAmountPYY){
          $('#market_bid_pyy').append('<tr><td>'
            +finalObj[i].updatedAt+
            '</td><td>BUY</td><td>'
            +finalObj[i].bidAmountPYY+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountPYY+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td></tr>');
        }
        else{
          $('#market_ask_pyy').append('<tr><td>'
            +finalObj[i].updatedAt+
            '</td><td>SELL</td><td>'
            +finalObj[i].askAmountPYY+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountPYY+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td></tr>');
        }
      }
    }
  }

  io.socket.on('PYY_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllBidPYY',function(err,data){
      orderBookBidPYY(data.body);
      getAllBidTotalPYY(data.body);

    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserPYYBalance(details.body);
      userPYYOpenOrders(details.body);
    });
  });
  io.socket.on('PYY_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllASKPYY',function(err,data){
      getCurrentAskPricePYY(data.body);
      orderBookAskPYY (data.body);
      getAllAskTotalPYY(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserPYYBalance(details.body);
      userPYYOpenOrders(details.body);
    });
  });
  io.socket.on('PYY_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllBidPYY',function(err,data){
      //update all market bids and update bid_btc_pyy
      orderBookBidPYY(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserPYYBalance(details.body);
      userPYYClosedOrders(details.body);
      userPYYOpenOrders(details.body);
    });
  });
  io.socket.on('PYY_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllASKPYY',function(err,data){

      getCurrentAskPricePYY(data.body);
      orderBookAskPYY (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserPYYBalance(details.body);
      userPYYClosedOrders(details.body);
      userPYYOpenOrders(details.body);
    });
  });

  /*---------------------END PYY --------------------------------*/

  /*---------------------GDS DATA--------------------------------*/

  getAllBidGDS();
  getAllAskGDS();
  getAllBidTotalGDS();
  getAllAskTotalGDS();
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
            $('#ask_current_GDS').append(" &nbsp;"+data.asksGDS[i].askRate+"");
            break;
          }
        }
      }
  }
  function orderBookBidGDS(data){
      var bid_orders = data;
      $('#bid_btc_gds').empty();

      if(data.bidsGDS){
        for (var i = 0; i < 30; i++) {
          if(i==bid_orders.bidsGDS.length) break;
          if(data.bidsGDS[i].status != 1){

            $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>')
          }
        }
      }
  }
  function orderBookAskGDS (data) {
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
      $('#avalGDSBalance').empty();
      $('#freezeGDSBalance').empty();
      $('#avalGDSBalance').append(details.user.GDSbalance+" ");
      $('#freezeGDSBalance').append(details.user.FreezedGDSbalance+" ");
  }
  function userGDSOpenOrders(details){
      $('#open_bid_gds').empty();
      $('#open_ask_gds').empty();
      bid=details.user.bidsGDS;
      ask=details.user.asksGDS;
      var finalObj = bid.concat(ask);
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
      orderBookBidGDS(data.body);
      getAllBidTotalGDS(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSOpenOrders(details.body);
    });
  });
  io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
      getCurrentAskPriceGDS(data.body);
      orderBookAskGDS (data.body);
      getAllAskTotalGDS(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSOpenOrders(details.body);
    });
  });
  io.socket.on('GDS_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
      //update all market bids and update bid_btc_gds
      orderBookBidGDS(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSClosedOrders(details.body);
      userGDSOpenOrders(details.body);
    });
  });
  io.socket.on('GDS_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){

      getCurrentAskPriceGDS(data.body);
      orderBookAskGDS (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      getUserBTCBalance(details.body);
      getUserGDSBalance(details.body);
      userGDSClosedOrders(details.body);
      userGDSOpenOrders(details.body);
    });
  });

</script>
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
</script>

</body>

</html>
