
  /*---------------------GDS DATA--------------------------------*/
<script type="text/javascript">
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