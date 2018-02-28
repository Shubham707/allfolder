<?php

echo "<script>
$(document).ready(function(){
   $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
});
</script>";

echo '<script type="text/javascript" src="js/sails.io.js"></script>
<script>';

///   url_api define on only common page ///

    echo "io.sails.url = '<?php echo URL_API;?>';
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

</script>";

if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);


  switch ($currencyname) {
        case 'bch':

              echo '<script type="text/javascript">';
                /*----------------------BCH data -----------------------*/
              echo '$(document).ready(function(){
                    getAllBidBCH();
                    getAllAskBCH();
                    getAllBidTotalBCH();
                    getAllAskTotalBCH();
                    });';
              echo 'function getCurrentAskPriceBCH(data){
                if(data.asksBCH){
                  console.log("getCurrentAskPriceBCH",data.asksBCH[0].askRate);
                  $("#ask_current_BCH").empty();
                  for(var i=0; i< data.asksBCH.length;i++){
                    if(data.asksBCH[i].status == 2){
                      $("#ask_current_BCH").append(" &nbsp;"+data.asksBCH[i].askRate+"");
                      console.log("getCurrentAskPriceBCH",data.asksBCH[i].askRate);
                      break;
                    }
                  }
                }
              }';
              /*----------------BCH Market Functions ---------------*/
              echo 'function getAllBidBCH(){
                $.ajax({
                  type: "POST",
                  contentType: "application/json",
                  url: url_api+"/tradebchmarket/getAllBidBCH",
                  data: {},
                  success: function(data){
                    console.log("getAllBidBCH",data);
                    var bid_orders = data;
                    $("#bid_btc_bch").empty();

                    $("#bid_current_BCH").append(" &nbsp;"+bid_orders.bidsBCH[0].bidRate+"");

                    console.log("bid_orders",bid_orders);
                    orderBookBidBCH(data);
                    if (data.statusCode!=200)
                    {
                      $("#error_message1").append(" &nbsp;"+data.message+"");
                    }
                  }
                });
              }';
              echo 'function getAllBidTotalBCH(){
                $.ajax({
                  type: "POST",
                  contentType: "application/json",
                  url: url_api+"/tradebchmarket/getAllBidBCH",
                  data: {},
                  success: function(data){
                    console.log("totalgetAllBidBCH",data);
                    var bid_orders = data;
                    $("#bid_Total_btc_bch").empty();
                    $("#bid_Total_bch").empty();
                    if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountBCHSum){
                       $("#bid_Total_btc_bch").append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
                       $("#bid_Total_bch").append(" &nbsp;"+bid_orders.bidAmountBCHSum.toFixed(5)+"");
                    }
                  }
                });
              }';
              echo 'function getAllAskBCH(){
                $.ajax({
                  type: "POST",
                  contentType: "application/json",
                  url: url_api+"/tradebchmarket/getAllAskBCH",
                  data: {},
                  success: function(data){
                    console.log("all getAllAskBCH",data);
                    getCurrentAskPriceBCH(data)
                    orderBookAskBCH(data);

                    if (data.statusCode!=200)
                    {
                      $("#error_message1").append(" &nbsp;"+data.message+"");
                    }
                  }
                });
              }';
            echo 'function getAllAskTotalBCH(){
                $.ajax({
                  type: "POST",
                  contentType: "application/json",
                  url: url_api+"/tradebchmarket/getAllAskBCH",
                  data: {},
                  success: function(data){
                    console.log("getAllAskBCH",data);
                    $("#ask_Total_btc_bch").empty();
                    $("#ask_Total_bch").empty();

                    $("#ask_Total_btc_bch").append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
                    $("#ask_Total_bch").append(" &nbsp;"+data.askAmountBCHSum.toFixed(5) +"");


                  }
                });
              }';

              echo "function orderBookBidBCH(data){
                console.log('orderBookBidBCH',data);
                var bid_orders = data;
                $('#bid_btc_bch').empty();

                if(data.bidsBCH){
                  for (var i = 0; i < 30; i++) {
                    if(i==bid_orders.bidsBCH.length) break;
                    if(data.bidsBCH[i].status != 1){
                      console.log('data.bidsBCH[i].status',data.bidsBCH[i].bidAmountBTC);
                      $('#bid_btc_bch').append('<tr><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>' + bid_orders.bidsBCH[i].bidRate + '</td></tr>')
                    }
                  }
                }
              }";
              echo "function orderBookAskBCH(data) {
                    console.log('orderBookAskBCH',data);
                    $('#ask_btc_bch').empty();
                    if(data.asksBCH){
                      for (var j = 0; j < 30; j++){
                        if(j==data.asksBCH.length) break;
                        if(data.asksBCH[j].status != 1){

                          $('#ask_btc_bch').append('<tr><td>' + data.asksBCH[j].askAmountBTC + '</td><td>' + data.asksBCH[j].askAmountBCH + '</td><td>' + data.asksBCH[j].askRate + '</td></tr>');
                        }
                      }
                    }
                  }";
            echo 'function getBidsBCHSuccess(){
                $.ajax({
                  type: "POST",
                  contentType: "application/json",
                  url: url_api+"/tradebchmarket/getBidsBCHSuccess",
                  data: {},
                  success: function(data){
                    $("#market_bid_bch").empty();

                    var bid_orders = data;

                    for (var i = 0; i < 30; i++) {
                      if(i==bid_orders.bidsBCH.length) break;
                      $("#market_bid_bch").append("<tr><td>" + bid_orders.bidsBCH[i].createTimeUTC + "</td>"+
                        "</td><td>BID</td><td>" + bid_orders.bidsBCH[i].bidAmountBTC + "</td><td>" + bid_orders.bidsBCH[i].bidAmountBCH + "</td><td>"+ bid_orders.bidsBCH[i].totalbidAmountBTC + "</td><td>"+ bid_orders.bidsBCH[i].totalbidAmountBCH + "</td></tr>")
                    }

                  }
                });
              }';
              echo 'function getAsksBCHSuccess(){
                $.ajax({
                  type: "POST",
                  contentType: "application/json",
                  url: url_api+"/tradebchmarket/getAsksBCHSuccess",
                  data: {},
                  success: function(data){
                    $("#market_ask_bch").empty();
                    var ask_orders = data;

                    for (var i = 0; i < 30; i++){
                      if(i==data.asksBCH.length) break;
                      $("#market_ask_bch").append("<tr><td>" + ask_orders.asksBCH[i].createTimeUTC + "</td>" +
                        "</td><td>ASK</td><td>"+ ask_orders.asksBCH[i].askAmountBTC + "</td><td>" + ask_orders.asksBCH[i].askAmountBCH + "</td><td>"+ ask_orders.asksBCH[i].totalaskAmountBTC + "</td><td>"+ ask_orders.asksBCH[i].totalaskAmountBCH + "</td></tr>")
                    }

                  }
                });
              }';
              /*----------------BCH Market Sockets-----------------------*/
              echo "io.socket.on('BCH_BID_ADDED', function bidCreated(data){
                io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
                  console.log('market BCH_BID_ADDED::: getAllBidBCH:::', data.body);
                  orderBookBidBCH(data.body);
                  getAllBidTotalBCH(data.body);
                });
              });";
              echo "io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
                io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
                  console.log('BCH_ASK_ADDED::: getAllASKBCH:::', data.body);
                  getCurrentAskPriceBCH(data.body);
                  orderBookAskBCH(data.body);
                  getAllAskTotalBCH(data.body);
                });
              });";
              echo "io.socket.on('BCH_BID_DESTROYED', function bidCreated(data){
                io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
                  //update all market bids and update bid_btc_bch
                  console.log('BCH_BID_DESTROYED::: getAllBidBCH:::', data.body);

                  orderBookBidBCH(data.body);
                });
              });";
              echo "io.socket.on('BCH_ASK_DESTROYED', function bidCreated(data){
                io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
                  console.log('BCH_ASK_DESTROYED::: getAllASKBCH:::', data.body);

                  getCurrentAskPriceBCH(data.body);
                  orderBookAskBCH(data.body);
                });
              });";
              /*---------------------END BCH ----------------------------*/
              echo "</script>";

        break;
        case 'ebt':

            echo "<script>";
            /*-----------------EBT ALL DATA ----------------------------*/
            echo 'getAllBidEBT();
                  getAllAskEBT();
                  getAllBidTotalEBT();
                  getAllAskTotalEBT();';


            echo 'function getAllBidEBT(){
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
                        $("#bid_btc_ebt").append("<tr><td>" + bid_orders.bidsEBT[i].bidAmountBTC + "</td><td>" + bid_orders.bidsEBT[i].bidAmountEBT + "</td><td>" + bid_orders.bidsEBT[i].bidRate + "</td></tr>")
                      }
                    }
                  }


                }
              });
            };';
            echo 'function getAllBidTotalEBT(){
              $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+"/tradeebtmarket/getAllBidEBT",
                data: {},
                success: function(data){

                  var bid_orders = data;
                  $("#bid_Total_btc_ebt").empty();
                  $("#bid_Total_ebt").empty();
                  if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountEBTSum )
                  {
                    $("#bid_Total_btc_ebt").append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
                    $("#bid_Total_ebt").append(" &nbsp;"+bid_orders.bidAmountEBTSum.toFixed(5)+"");

                  }

                }
              });
            }; ';
            echo 'function getAllAskEBT(){
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
                        $("#ask_btc_ebt").append("<tr><td>" + data.asksEBT[i].askAmountBTC + "</td><td>" + data.asksEBT[i].askAmountEBT + "</td><td>" + data.asksEBT[i].askRate + "</td></tr>");
                      }
                    }
                  }

                }
              });
            }';
            echo 'function getAllAskTotalEBT(){
              $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+"/tradeebtmarket/getAllAskEBT",
                data: {},
                success: function(data){
                  $("#ask_Total_btc_ebt").empty();
                  $("#ask_Total_ebt").empty();
                  if(data.askAmountBTCSum && data.askAmountEBTSum)
                  {
                    $("#ask_Total_btc_ebt").append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
                    $("#ask_Total_ebt").append(" &nbsp;"+data.askAmountEBTSum.toFixed(5)+"");
                  }
                }
              });
            }';
            echo 'function getBidsEBTSuccess(){
              $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+"/tradeebtmarket/getBidsEBTSuccess",
                data: {},
                success: function(data){
                  var bid_orders = data;
                  for (var i = 0; i < 30; i++) {
                    if(i==bid_orders.bidsEBT.length) break;
                    $("#market_bid_ebt").append("<tr><td>" + bid_orders.bidsEBT[i].updatedAt + "</td>"+
                      "</td><td>BUY</td><td>" + bid_orders.bidsEBT[i].bidRate + "</td><td>" + bid_orders.bidsEBT[i].totalbidAmountEBT + "</td><td>"+ bid_orders.bidsEBT[i].totalbidAmountBTC + "</td></tr>")
                  }

                }
              });
            }';
            echo 'function getAsksEBTSuccess(){
              $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+"/tradeebtmarket/getAsksEBTSuccess",
                data: {},
                success: function(data){
                  var ask_orders = data;

                  for (var i = 0; i < 30; i++){
                    if(i==data.asksEBT.length) break;
                    $("#market_ask_ebt").append("<tr><td>" + ask_orders.asksEBT[i].updatedAt +
                      "</td><td>SELL</td><td>"+ ask_orders.asksEBT[i].askRate + "</td><td>"+ ask_orders.asksEBT[i].totalaskAmountEBT + "</td><td>"+ ask_orders.asksEBT[i].totalaskAmountBTC + "</td></tr>")
                  }

                }
              });
            }';
            echo 'function getCurrentAskPriceEBT(data){
              if(data.asksEBT){
                $("#ask_current_EBT").empty();
                for(var i=0; i< data.asksEBT.length;i++){
                  if(data.asksEBT[i].status == 2){
                    console.log("getCurrentAskPriceEBT",data.asksEBT[i].askRate);
                    $("#ask_current_EBT").append(" &nbsp;"+data.asksEBT[i].askRate+"");
                    break;
                  }
                }
              }
            }';
            echo 'function orderBookBidEBT(data){
              console.log("orderBookBidEBT",data);
              var bid_orders = data;
              $("#bid_btc_ebt").empty();

              if(data.bidsEBT){
                for (var i = 0; i < 30; i++) {
                  if(i==bid_orders.bidsEBT.length) break;
                  if(data.bidsEBT[i].status != 1){
                    console.log("data.bidsEBT[i].status",data.bidsEBT[i].bidAmountBTC);

                    $("#bid_btc_ebt").append("<tr><td>" + bid_orders.bidsEBT[i].bidAmountBTC + "</td><td>" + bid_orders.bidsEBT[i].bidAmountEBT + "</td><td>" + bid_orders.bidsEBT[i].bidRate + "</td></tr>")
                  }
                }
              }
            }';
            echo 'function orderBookAskEBT(data) {
              console.log("orderBookAskEBT",data);
              $("#ask_btc_ebt").empty();
              if(data.asksEBT){
                for (var j = 0; j < 30; j++){
                  if(j==data.asksEBT.length) break;
                  if(data.asksEBT[j].status != 1){

                    $("#ask_btc_ebt").append("<tr><td>" + data.asksEBT[j].askAmountBTC + "</td><td>" + data.asksEBT[j].askAmountEBT + "</td><td>" + data.asksEBT[j].askRate + "</td></tr>");
                  }
                }
              }
            }';

            echo "io.socket.on('EBT_BID_ADDED', function bidCreated(data){
              io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
                console.log('EBT_BID_ADDED::: getAllBidEBT:::', data.body);
                orderBookBidEBT(data.body);
                getAllBidTotalEBT(data.body);

              });
            });";
            echo "io.socket.on('EBT_ASK_ADDED', function bidCreated(data){
              io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
                console.log('EBT_ASK_ADDED::: getAllASKEBT:::', data.body);
                getCurrentAskPriceEBT(data.body);
                orderBookAskEBT (data.body);
                getAllAskTotalEBT(data.body);
              });
            });";
            echo "io.socket.on('EBT_BID_DESTROYED', function bidCreated(data){
              io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
              console.log('EBT_BID_DESTROYED::: getAllBidEBT:::', data.body);
              orderBookBidEBT(data.body);
              });
            });";
            echo "io.socket.on('EBT_ASK_DESTROYED', function bidCreated(data){
              io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
                console.log('EBT_ASK_DESTROYED::: getAllASKEBT:::', data.body);
                getCurrentAskPriceEBT(data.body);
                orderBookAskEBT (data.body);
              });
            });";

            /*---------------------END EBT --------------------------------*/
            echo "</script>";

        break;
        case 'gds':

              echo "<script>";
              /*---------------------GDS DATA--------------------------------*/

              echo "getAllBidGDS();
                    getAllAskGDS();
                    getAllBidTotalGDS();
                    getAllAskTotalGDS();";

              echo 'function getAllBidGDS(){
                $.ajax({
                    type: "POST",
                    contentType: "application/json",
                    url: url_api+"/tradegdsmarket/getAllBidGDS",
                    data: {},
                    success: function(data){

                        var bid_orders = data;
                        $("#bid_current_GDS").empty();
                        console.log("bid_orders.bidsGDS",bid_orders.bidsGDS);
                        $("#bid_current_GDS").append(" &nbsp;"+bid_orders.bidsGDS[0].bidRate+"");
                        if(bid_orders.bidsGDS){
                          for (var i = 0; i < 30; i++) {
                            if(i==bid_orders.bidsGDS.length) break;
                            if(data.bidsGDS[i].status != 1){

                              $("#bid_btc_gds").append("<tr><td>" + bid_orders.bidsGDS[i].bidAmountBTC + "</td><td>" + bid_orders.bidsGDS[i].bidAmountGDS + "</td><td>" + bid_orders.bidsGDS[i].bidRate + "</td></tr>");
                            }
                          }
                        }
                        if (data.statusCode!=200)
                        {
                            $("#error_message1").append(" &nbsp;"+data.message+"");
                        }
                    }
                });
              };';
              echo 'function getAllBidTotalGDS(){
                $.ajax({
                    type: "POST",
                    contentType: "application/json",
                    url: url_api+"/tradegdsmarket/getAllBidGDS",
                    data: {},
                    success: function(data){

                        var bid_orders = data;
                        $("#bid_Total_btc_gds").empty();
                        $("#bid_Total_gds").empty();
                        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountGDSSum) {

                          $("#bid_Total_btc_gds").append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
                        $("#bid_Total_gds").append(" &nbsp;"+bid_orders.bidAmountGDSSum.toFixed(5)+"");

                        }

                    }
                });
              };';
              echo 'function getAllAskGDS(){
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
                              $("#ask_btc_gds").append("<tr><td>" + data.asksGDS[i].askAmountBTC + "</td><td>" + data.asksGDS[i].askAmountGDS + "</td><td>" + data.asksGDS[i].askRate + "</td></tr>");
                            }
                          }
                        }

                        if (data.statusCode!=200)
                        {
                            $("#error_message1").append(" &nbsp;"+data.message+"");
                        }
                    }
                });
              }';
              echo 'function getAllAskTotalGDS(){
                $.ajax({
                    type: "POST",
                    contentType: "application/json",
                    url: url_api+"/tradegdsmarket/getAllAskGDS",
                    data: {},
                    success: function(data){

                        $("#ask_Total_btc_gds").empty();
                        $("#ask_Total_gds").empty();
                        if(data.askAmountBTCSum && data.askAmountGDSSum)
                        {
                          $("#ask_Total_btc_gds").append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
                         $("#ask_Total_gds").append(" &nbsp;"+data.askAmountGDSSum.toFixed(5)+"");
                        }


                    }
                });
              }';
              echo 'function getBidsGDSSuccess(){
                $.ajax({
                    type: "POST",
                    contentType: "application/json",
                    url: url_api+"/tradegdsmarket/getBidsGDSSuccess",
                    data: {},
                    success: function(data){

                        var bid_orders = data;

                        for (var i = 0; i < 30; i++) {
                            if(i==bid_orders.bidsGDS.length) break;
                            $("#market_bid_gds").append("<tr><td>" + bid_orders.bidsGDS[i].createTimeUTC + "</td>"+
                                    "</td><td>BID</td><td>" + bid_orders.bidsGDS[i].bidAmountBTC + "</td><td>" + bid_orders.bidsGDS[i].bidAmountGDS + "</td><td>"+ bid_orders.bidsGDS[i].totalbidAmountBTC + "</td><td>"+ bid_orders.bidsGDS[i].totalbidAmountGDS + "</td></tr>")
                        }

                    }
                });
              }';
              echo 'function getAsksGDSSuccess(){
                $.ajax({
                    type: "POST",
                    contentType: "application/json",
                    url: url_api+"/tradegdsmarket/getAsksGDSSuccess",
                    data: {},
                    success: function(data){
                      var ask_orders = data;

                          for (var i = 0; i < 30; i++){
                            if(i==data.asksGDS.length) break;
                            $("#market_ask_gds").append("<tr><td>" + ask_orders.asksGDS[i].createTimeUTC + "</td>" +
                                    "</td><td>ASK</td><td>"+ ask_orders.asksGDS[i].askAmountBTC + "</td><td>" + ask_orders.asksGDS[i].askAmountGDS + "</td><td>"+ ask_orders.asksGDS[i].totalaskAmountBTC + "</td><td>"+ ask_orders.asksGDS[i].totalaskAmountGDS + "</td></tr>")
                          }

                    }
                });
              }';
              echo "function getCurrentAskPriceGDS(data){

                  if(data.asksGDS){
                    $('#ask_current_GDS').empty();
                    for(var i=0; i< data.asksGDS.length;i++){
                      if(data.asksGDS[i].status == 2){
                        console.log('getCurrentAskPriceGDS',data.asksGDS[i].askRate);
                        $('#ask_current_GDS').append(' &nbsp;'+data.asksGDS[i].askRate+'');
                        break;
                      }
                    }
                  }
              }";
              echo "function orderBookBidGDS(data){
                  console.log('orderBookBidGDS',data);
                  var bid_orders = data;
                  $('#bid_btc_gds').empty();

                  if(data.bidsGDS){
                    for (var i = 0; i < 30; i++) {
                      if(i==bid_orders.bidsGDS.length) break;
                      if(data.bidsGDS[i].status != 1){
                        console.log('data.bidsGDS[i].status',data.bidsGDS[i].bidAmountBTC);

                        $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>')
                      }
                    }
                  }
              }";
              echo "function orderBookAskGDS (data) {
                  console.log('orderBookAskGDS',data);
                  $('#ask_btc_gds').empty();
                  if(data.asksGDS){
                    for (var j = 0; j < 30; j++){
                      if(j==data.asksGDS.length) break;
                      if(data.asksGDS[j].status != 1){

                        $('#ask_btc_gds').append('<tr><td>' + data.asksGDS[j].askAmountBTC + '</td><td>' + data.asksGDS[j].askAmountGDS + '</td><td>' + data.asksGDS[j].askRate + '</td></tr>');
                      }
                    }
                  }
              }";

              echo "io.socket.on('GDS_BID_ADDED', function bidCreated(data){
                io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
                  console.log('GDS_BID_ADDED::: getAllBidGDS:::', data.body);
                  orderBookBidGDS(data.body);
                  getAllBidTotalGDS(data.body);
                });
              });";
              echo "io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
                io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
                  console.log('GDS_ASK_ADDED::: getAllASKGDS:::', data.body);
                  getCurrentAskPriceGDS(data.body);
                  orderBookAskGDS (data.body);
                  getAllAskTotalGDS(data.body);
                });
              });";
              echo "io.socket.on('GDS_BID_DESTROYED', function bidCreated(data){
                io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){

                  console.log('GDS_BID_DESTROYED::: getAllBidGDS:::', data.body);
                  orderBookBidGDS(data.body);
                });
              });";
              echo "io.socket.on('GDS_ASK_DESTROYED', function bidCreated(data){
                io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
                  console.log('GDS_ASK_DESTROYED::: getAllASKGDS:::', data.body);

                  getCurrentAskPriceGDS(data.body);
                  orderBookAskGDS (data.body);
                });
              });";

              echo "</script>";

        break;
}
}



echo '<script>';
"use strict";
echo 'function openMarketNav() {
    document.getElementById("marketSidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

}';

echo 'function closeMarketNav() {
    document.getElementById("marketSidenav").style.width = "0";
    document.body.style.backgroundColor = "white";
}';
echo '$(document).on("scroll", function () {
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
});';
echo '</script>
<script src="js/app.js"></script>';
echo '<script type="text/javascript" src="js/sails.io.js"></script>
<script type="text/javascript">';
  echo "io.sails.url = '<?php echo URL_API;?>';
  window.ioo = io;
  socket = io.connect( '<?php echo URL_API;?>', {
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
  });";

echo '$(document).ready(function(){
  $(".dropdown-toggle").dropdown();
});';
echo '</script>';
?>
