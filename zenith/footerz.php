

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script >
  $(document).ready(function(){
   $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
 });
</script>
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

</script>

<script type="text/javascript">
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
         if (data.statusCode!=200)
         {
          $('#error_message1').append(" &nbsp;"+data.message+"");
        }

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

        if (data.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+data.message+"");
        }
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
  /*----------------BCH Market Sockets-----------------------*/
  io.socket.on('BCH_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      orderBookBidBCH(data.body);
      getAllBidTotalBCH(data.body);
    });
  });
  io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH(data.body);
      getAllAskTotalBCH(data.body);
    });
  });
  io.socket.on('BCH_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      //update all market bids and update bid_btc_bch

      orderBookBidBCH(data.body);
    });
  });
  io.socket.on('BCH_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){

      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH(data.body);
    });
  });
  /*---------------------END BCH ----------------------------*/

  /*-----------------PYY ALL DATA ----------------------------*/
  getAllBidPYY();
  getAllAskPYY();
  getAllBidTotalPYY();
  getAllAskTotalPYY();
  getBidsPYYSuccess();
  getAsksPYYSuccess();
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
        if(data.bidsPYY){
          for (var i = 0; i < 30; i++) {
            if(i==bid_orders.bidsPYY.length) break;
            $('#market_bid_pyy').append('<tr><td>' + bid_orders.bidsPYY[i].updatedAt + '</td>'+
              '</td><td>BUY</td><td>' + bid_orders.bidsPYY[i].bidAmountPYY + '</td><td>' + bid_orders.bidsPYY[i].bidRate + '</td><td>' + bid_orders.bidsPYY[i].totalbidAmountPYY + '</td><td>'+ bid_orders.bidsPYY[i].totalbidAmountBTC + '</td></tr>')

          }


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
        if(data.asksPYY){
          for (var i = 0; i < 30; i++){
            if(i==data.asksPYY.length) break;
            $('#market_ask_pyy').append('<tr><td>' + ask_orders.asksPYY[i].updatedAt +
              '</td><td>SELL</td><td>'+ ask_orders.asksPYY[i].askAmountPYY + '</td><td>'+ ask_orders.asksPYY[i].askRate + '</td><td>'+ ask_orders.asksPYY[i].totalaskAmountPYY + '</td><td>'+ ask_orders.asksPYY[i].totalaskAmountBTC + '</td></tr>')
          }

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

  io.socket.on('PYY_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllBidPYY',function(err,data){
      orderBookBidPYY(data.body);
      getAllBidTotalPYY(data.body);

    });
  });
  io.socket.on('PYY_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllASKPYY',function(err,data){
      getCurrentAskPricePYY(data.body);
      orderBookAskPYY (data.body);
      getAllAskTotalPYY(data.body);
    });
  });
  io.socket.on('PYY_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllBidPYY',function(err,data){
      //update all market bids and update bid_btc_pyy
      orderBookBidPYY(data.body);
    });
  });
  io.socket.on('PYY_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradepyymarket/getAllASKPYY',function(err,data){
      getCurrentAskPricePYY(data.body);
      orderBookAskPYY (data.body);
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
          $('#bid_current_GDS').append(" &nbsp;"+bid_orders.bidsGDS[0].bidRate+"");

          for (var i = 0; i < 30; i++) {
            if(i==bid_orders.bidsGDS.length) break;
            if(data.bidsGDS[i].status != 1){

              $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>');
            }
          }
        }
        if (data.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+data.message+"");
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

        if (data.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+data.message+"");
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

  io.socket.on('GDS_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
      orderBookBidGDS(data.body);
      getAllBidTotalGDS(data.body);
    });
  });
  io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
      getCurrentAskPriceGDS(data.body);
      orderBookAskGDS (data.body);
      getAllAskTotalGDS(data.body);
    });
  });
  io.socket.on('GDS_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
      //update all market bids and update bid_btc_gds
      orderBookBidGDS(data.body);
    });
  });
  io.socket.on('GDS_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){

      getCurrentAskPriceGDS(data.body);
      orderBookAskGDS (data.body);
    });
  });

</script>
</script>

<script>
  "use strict";
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("closeWallet").style.display = "block";
        $("#closeWallet").removeClass('hide');
        document.getElementById("openWallet").style.display = "none";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("closeWallet").style.display = "none";
        document.getElementById("openWallet").style.display = "block";
        document.body.style.backgroundColor = "white";
    }
    function openMarketNavOpen() {
        document.getElementById("marketSidenavOpen").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

    }
    function closeMarketNav() {
        document.getElementById("marketSidenavOpen").style.width = "0";
        document.body.style.backgroundColor = "white";
    }
  $(document).on("scroll", function () {
    if ($(document).scrollTop() > 30) {
      $(".ln-navbar").addClass("ln-nav-collapse");
      $("#logoWhite").addClass("hide");
      $("#logoDark").removeClass("hide");
    }
    else {
      $(".ln-navbar").removeClass("ln-nav-collapse");
      $("#logoDark").addClass("hide");
      $("#logoWhite").removeClass("hide");
    }
  });
</script>
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
  });
  socket.on( 'disconnect', function () {
    socket.connect();
  });
</script>
<script>
  $(document).ready(function(){
    $(".dropdown-toggle").dropdown();
  });
</script>

</body></html>
