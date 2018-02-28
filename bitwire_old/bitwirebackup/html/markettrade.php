<?php
ob_start();
include 'header.php';
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])){
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
ob_end_flush();
?>



<div id="asks_orders"></div>
  <div class="container-fluid no-padding">
    <div class="animated fadeIn">
      <div class="row">

        <div class="col-sm-12 col-md-12">
          <div class="tab-content" id="myTabContent">

            <div class="panel panel-default text-center ">

            <p><div id="container"></div></p>
             </div>
              <div class="text-center">
               <h3> <b>ORDER BOOK</b></h3>
              </div>
            <div class="tab-pane fade show active bg-default" id="home" role="tabpanel" aria-labelledby="home-tab">

              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-sm-5 col-sm-offset-1">
                      <div class="panel panel-default">
                        <div class="panel-heading bidhead">BID <small class="pull-right" > BTC <span id ="bid_Total_btc_bch"></span> | BCH <span id ="bid_Total_bch"></span></small></div>
                        <div class="panel-body bidset">
                          <div class="table-responsive">
                            <table class="table table-striped order-table table-hover">
                              <thead class="thead-dark">
                                <tr>
                                  <th>Total(BTC)</th>
                                  <th>Vol(BCH)</th>
                                  <th>Bid(BTC)</th>
                                </tr>
                              </thead>
                              <tbody id="bid_btc_bch">

                              </tbody>

                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-5">
                      <div class="panel panel-default">
                        <div class="panel-heading askhead">ASK <small class="pull-right" > BTC <span id ="ask_Total_btc_bch"></span> | BCH <span id ="ask_Total_bch"></span></small></div>

                        <div class="panel-body askset">
                          <div class="table-responsive">
                            <table class="table table-striped table-hover">
                              <thead class="thead-dark">
                                <tr>
                                  <th>Total(BTC)</th>

                                  <th>Vol(BCH)</th>
                                  <th>Ask(BTC)</th>
                                </tr>
                              </thead>
                              <tbody id="ask_btc_bch">

                              </tbody>

                            </table>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-md-3" style="margin-top: 14px;">

                  <div class="panel panel-default">
                    <div class="panel-heading" style="height: 50px !important;">Buy Bitcoin Cash
                     <small class="pull-right" > Available Balance: <span id ="avalBTCBalance"></span>BTC <br> Freeze Balance: <span id="freezeBTCBalance" style="line-height: 1.7 !important;"></span>BTC</small>
                    </div>
                    <div class="panel-body ">

                      <div class="input-group margin-top">
                        <span class="input-group-addon">Units</span>
                        <input type="number" step="0.00001" onkeyup="bidAmountBTC()" name="bidAmountBCH"
                        id="bidAmountBCH" class="form-control txt"
                        aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">BCH</span>
                      </div>
                      <div class="input-group margin-top">
                        <span class="input-group-addon">Bid &nbsp;&nbsp;</span>
                        <input type="number" step="0.00001" onkeyup="bidAmountBTC()" name="bidRate"
                        id="bidRateBCH" class="form-control txt"
                        aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">BTC</span>
                      </div>
                      <div class="input-group margin-top">
                        <span class="input-group-addon">Total</span>
                        <input type="number" step="0.00001" onkeyup="bidAmountTotalBTC()" name="bidAmountBTC" id="bidAmountBTC"
                        class="form-control bidAmountBTC1"
                        aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">BTC</span>
                      </div>
                      <div class="row">
                        <button onclick="buy_data_bch();" class="btn btn-success btn-sm col-xs-3" type="button" id="butval" style="width:100% ;background-color: #adc396" >Buy
                        </button>
                        <div id="error_message1" class="pull-right" style="color: red; margin-top: 20px;"></div>
                        <!-- <input class="btn btn-success col-xs-3 btn-sm" id="reset" type="button"  value="RESET"> -->
                      </div>

                    </div>
                  </div>


                  <div class="panel panel-default">
                  <div class="panel-heading" style="height: 50px !important;">Sell Bitcoin Cash
                    <small class="pull-right" > Available Balance:<span id ="avalBCHBalance" style="line-height: 1.7 !important;"></span>BCH <br> Freeze Balance: <span id="freezeBCHBalance" ></span>BCH</small>
                  </div>
                  <div class="panel-body">

                    <div class="input-group margin-top">
                      <span class="input-group-addon">Units</span>
                      <input type="number" step="0.00001" id="askBCHAmount" name="askAmountBCH"
                      onkeyup="askBTCAmount()" class="form-control"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BCH</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Ask &nbsp;</span>
                      <input type="number" step="0.00001" onkeyup="askBTCAmount()" name="askRate"
                      id="askRateBCH" class="form-control"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Total</span>
                      <input ttype="number" step="0.00001" onkeyup="askBTCTotalAmount()"  id="askBTCAmount" name="askAmountBTC"
                      class="form-control" aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="row">
                      <button onclick="sell_data();" class="btn btn-danger btn-sm col-xs-3"
                      type="button" id="butval" style="width:100%; background-color: #e49f9e">Sell
                      </button>
                      <div id="error_message" class="pull-right" style="color: red; margin-top: 20px;"></div>
                    </div>
                    <!-- <input class="btn btn-success btn-sm" type="reset" onclick="WebSocketTest()" value="RESET"> -->

                  </div>
                </div>


                </div>
              </div>
            </div>
            <div class="panel panel-default" style="position:relative">
              <div class="text-center"><h3><b>MY OPEN ORDERS</b></h3></div>

              <div class="panel-body openmaket">
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                      <tr>
                        <th>ORDER DATE</th>
                        <th>BID/ASK</th>
                        <th>UNITS FILLED BCH</th>
                        <th>ACTUAL RATE</th>
                        <th>UNITS TOTAL BCH</th>
                        <th>UNITS TOTAL BTC</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>

                    <tbody id="open_bid_bch">

                    </tbody>
                    <tbody id="open_ask_bch">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="panel panel-default" style="position:relative">
              <div class=" text-center"><h3><b>MARKET</b></div>
              <div class="panel-body market">
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                      <tr>
                        <th>ORDER DATE</th>
                        <th>BID/ASK</th>
                        <th>UNITS FILLED BCH</th>
                        <th>ACTUAL RATE</th>
                        <th>UNITS TOTAL BCH</th>
                        <th>UNITS TOTAL BTC</th>
                      </tr>
                    </thead>

                    <tbody id="market_bid_bch">

                    </tbody>
                    <tbody id="market_ask_bch">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  function bidAmountBTC() {
          var a = document.getElementById('bidAmountBCH').value;
          var b = document.getElementById('bidRateBCH').value;
          var result = parseFloat(a) * parseFloat(b);
          if (!isNaN(result)) {
              total=document.getElementById('bidAmountBTC').value = result;
          }
    }
     function bidAmountTotalBTC()
      {
          var res=document.getElementById('bidAmountBTC').value;
          var a = document.getElementById('bidAmountBCH').value;
          var b = document.getElementById('bidRateBCH').value;
          if(res)
          {
            var equal=res/b;
            document.getElementById('bidAmountBCH').value=equal;
          }

      }
      function askBTCAmount() {
          var a = document.getElementById('askBCHAmount').value;
          var b = document.getElementById('askRateBCH').value;
          var result = parseFloat(a) * parseFloat(b);
          if (!isNaN(result)) {
              tatal=document.getElementById('askBTCAmount').value = result;

          }
      }
      function askBTCTotalAmount()
      {
        var a = document.getElementById('askBCHAmount').value;
        var b = document.getElementById('askRateBCH').value;
        var res =document.getElementById('askBTCAmount').value;
          if(res)
          {
            var equal=res/b;
            document.getElementById('askBCHAmount').value=equal;
          }

      }
  function del(bidIdBCH,bidownerId) {

    if (confirm("Do You Want To Delete!")) {
      $.ajax({
        type: "POST",
        url: url_api + '/tradebchmarket/removeBidBCHMarket',
        data: {
          "bidIdBCH": bidIdBCH,
          "bidownerId": bidownerId
        },
        success: function(result){
          alert('Data Delete Successfully');

        }
      });
    }
  }
  function del_ask(askIdBCH,askownerId) {
    if (confirm("Do You Want To Delete!")) {
      $.ajax({
        type: "POST",
        url: url_api + '/tradebchmarket/removeAskBCHMarket',
        data: {
          "askIdBCH":askIdBCH,
          "askownerId":askownerId

        },
        success: function(result){
          alert('Data Delete Successfully');

        }
      });
    }
  }
  function buy_data_bch() {

    var bidAmountBCH = document.getElementById('bidAmountBCH').value;
    var bidRateBCH = document.getElementById('bidRateBCH').value;
    var bidAmountBTC = document.getElementById('bidAmountBTC').value;

    var bidownerId=user_details.id;
    var spendingPassword='12';

    var json_bid_bch = {
      "bidAmountBTC":bidAmountBTC,
      "bidAmountBCH":bidAmountBCH,
      "bidRate":bidRateBCH,
      "bidownerId":bidownerId,
      "spendingPassword":spendingPassword
    }

    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/addBidBCHMarket",
      data: JSON.stringify(json_bid_bch),
      success: function(result){
        console.log(result);
        $('#error_message1').empty();
        if (result.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+result.message+"");
        }
      }
    });
  }
  function sell_data(){

    var askBCHAmount = document.getElementById('askBCHAmount').value;
    var askRateBCH = document.getElementById('askRateBCH').value;
    var askBTCAmount = document.getElementById('askBTCAmount').value;
    var bidownerId=user_details.id;
    var spendingPassword='12';

    var json_ask_bch = {
      "askAmountBTC":askBTCAmount,
      "askAmountBCH":askBCHAmount,
      "askRate":askRateBCH,
      "askownerId":bidownerId,
      "spendingPassword":spendingPassword
    }


    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/addAskBCHMarket",
      data: JSON.stringify(json_ask_bch),
      success: function(result){
        console.log(result);
        $('#error_message').empty();

        if (result.statusCode!=200)
        {
          $('#error_message').append(" &nbsp;"+result.message+"");
        }

      }
    });

  }
</script>
<script>
var arrayObject = [];
var bidorderTime =[];
var arrayObjectask = [];
var askorderTime =[];
$.getJSON(url_api + '/tradebchmarket/getBidsBCHSuccess', function (data) {
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
    }*/
    var  temp =data.bidsBCH;
    console.log("  console.log(temp);",temp);
    if(temp){
      var dateTime = [];
      for (var i = 0; i < temp.length; i++) {

        arrayObject.push([Number(temp[i].createTimeUTC)*1000,temp[i].bidRate]);
      }

    }
    $.getJSON(url_api + '/tradebchmarket/getAsksBCHSuccess', function (dataask) {
       //console.log(data);
         /* var bid_orders = $.parseJSON(data);
        for(var i = 0; i < data.length ; i++){
               console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
        }*/
        var  tempask =dataask.asksBCH;
        console.log("  console.log(tempask);",tempask);
        var dateTime = [];
        var startDateask = '';
        if(tempask){
          for (var i = 0; i < tempask.length; i++) {
            arrayObjectask.push([Number(tempask[i].createTimeUTC)*1000,tempask[i].askRate]);

          }

        }
        Highcharts.chart('container', {
           chart: {
               zoomType: 'x'
           },
           title: {
               text: 'Bitcoin Cash & Bitcoin Market'
           },
           subtitle: {
               text: document.ontouchstart === undefined ?
                       'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
           },
           xAxis: {
               type: 'datetime'
           },
           yAxis: {
               title: {
                   text: 'Exchange rate'
               }
           },
           legend: {
               enabled: false
           },
           plotOptions: {
               area: {
                   fillColor: {
                       linearGradient: {
                           x1: 0,
                           y1: 0,
                           x2: 0,
                           y2: 1
                       },
                       stops: [
                           [0, Highcharts.getOptions().colors[0]],
                           [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                       ]
                   },
                   marker: {
                       radius: 2
                   },
                   lineWidth: 1,
                   states: {
                       hover: {
                           lineWidth: 1
                       }
                   },
                   threshold: null
               }
           },

           series: [
             {
               type: 'area',
               name: 'Buy',
               data: arrayObject
             },
             {
               type: 'area',
               name: 'Sell',
               data: arrayObjectask,
           }],
           responsive: {
              rules: [{
                  condition: {
                      maxWidth: 500
                  }
              }]
            }
       });
  });
  });
</script>

<?php
include 'footer.php';
?>
