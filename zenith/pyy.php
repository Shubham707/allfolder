<?php
ob_start();
include 'header.php';
page_protect();
if (!isset($_SESSION['user_id'])) {
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
ob_end_flush();
?>

<div id="asks_orders"></div>


    <div class="row">

      <div class="col-sm-12 col-md-12">
        <div class="tab-content" id="myTabContent">
 <div class="panel panel-default text-center ">

          <p><div id="container"></div></p>
         </div>
          <div class="tab-pane fade show active bg-default" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="text-center">
              <h3>Order Book</h3>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="panel panel-default">
                      <div class="panel-heading bidhead">BID <small class="pull-right" > BTC <span id ="bid_Total_btc_pyy"></span> | PYY <span id ="bid_Total_pyy"></span></small></div>
                      <div class="panel-body bidset">
                        <div class="table-responsive">
                          <table class="table table-striped order-table table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(PYY)</th>
                                <th>Bid(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="bid_btc_pyy">


                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5">
                    <div class="panel panel-default">
                      <div class="panel-heading askhead">ASK <small class="pull-right" > BTC <span id ="ask_Total_btc_pyy"></span> | PYY <span id ="ask_Total_pyy"></span></small></div>

                      <div class="panel-body askset">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>

                                <th>Vol(PYY)</th>
                                <th>Ask(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="ask_btc_pyy">

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
                  <div class="panel-heading">Buy PayWay Coin
                   <small class="pull-right" > Available Balance: <span id ="avalBTCBalance"></span>BTC <br> Freeze Balance: <span id="freezeBTCBalance"></span>BTC</small>
                 </div>
                 <div class="panel-body ">
                  <fieldset>

                    <div class="input-group margin-top">
                      <span class="input-group-addon">Units</span>
                      <input type="number" step="0.00001" onkeyup="sum_PYY()" name="bidAmountPYY"
                      id="bidAmountPYY" class="form-control txt"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">PYY</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Bid &nbsp;&nbsp;</span>
                      <input type="number" step="0.00001" onkeyup="sum_PYY()" name="bidRate"
                      id="bidRate" class="form-control txt"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Total</span>
                      <input type="text" step="0.00001" onkeypress="return isNumberKey(event)"  onkeyup="sumTotalEbt()" name="bidAmountBTC" id="bidAmountBTC"
                      class="form-control bidAmountBTC1"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="panel-heading">
                      <label class=" form-control-label text-black " >Transaction Fee 0.1% BTC</label>
                    </div>
                    <div class="row">
                      <button onclick="buy_data();" class="btn btn-info btn-sm col-xs-3"
                      type="button" id="butval" style="width:100% ;background-color: #adc396" >Buy
                    </button>
                    <div id="error_message1" class="pull-right" style="color: red; margin-top: 20px;"></div>
                    <!-- <input class="btn btn-success col-xs-3 btn-sm" id="reset" type="button"  value="RESET"> -->
                  </div>

                </fieldset>
              </div>
            </div>


            <div class="panel panel-default">
              <div class="panel-heading">Sell PayWay Coin
                <small class="pull-right" > Available Balance:<span id ="avalPYYBalance"></span>PYY <br> Freeze Balance: <span id="freezePYYBalance"></span>PYY</small>
              </div>
              <div class="panel-body ">
                <fieldset>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Units</span>
                    <input type="number" step="0.00001" id="askAmountPYY" name="askAmountPYY"
                    onkeyup="sumsell()" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">PYY</span>
                  </div>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Ask &nbsp;</span>
                    <input type="number" step="0.00001" onkeyup="sumsell()" name="askRate"
                    id="askRate" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">BTC</span>
                  </div>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Total</span>
                    <input ttype="text" step="0.00001" onkeypress="return isNumberKey(event)"  onkeyup="sumTotalSell()" id="askAmountBTC" name="askAmountBTC"
                    class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">BTC</span>
                  </div>
                  <div class="panel-heading">
                      <label class=" form-control-label text-black " >Transaction Fee 0.1% BTC</label>
                    </div>
                  <div class="row">
                    <button onclick="sell_data();" class="btn btn-success btn-sm col-xs-3"
                    type="button" id="butval" style="width:100%; background-color: #e49f9e" >Sell
                  </button>
                  <div id="error_message" class="pull-right" style="color: red; margin-top: 20px;"></div>
                </div>
                <!-- <input class="btn btn-success btn-sm" type="reset" onclick="WebSocketTest()" value="RESET"> -->
              </fieldset>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="text-center"><h3>My Open Orders</h3></div>
    <div class="panel panel-default">
      <div class="panel text-center"></div>
      <div class="panel-body openmaket">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED PYY</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL PYY</th>
                <th>UNITS TOTAL BTC</th>
                <th>ACTION</th>
              </tr>
            </thead>

            <tbody id="open_bid_pyy">

            </tbody>
            <tbody id="open_ask_pyy">

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=" text-center"><h3>MY SUCCESS ORDERS</h3></div>
    <div class="panel panel-default">
      <div class="panel text-center "></div>

      <div class="panel-body market">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED PYY</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL PYY</th>
                <th>UNITS TOTAL BTC</th>
              </tr>
            </thead>

            <tbody id="market_bid_pyy">

            </tbody>
            <tbody id="market_ask_pyy">

            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
</div>


</div>

<?php
include 'footer.php';
?>

<script src ="bignumber.js/bignumber.js/bignumber.js"></script>
<script>

  function sum_PYY() {
        var a = new BigNumber(document.getElementById('bidRate').value);
        var b = new BigNumber(document.getElementById('bidAmountPYY').value);
        var result = (a).times(b);
        if (!isNaN(result)) {
            document.getElementById('bidAmountBTC').value = result;

        }

    }
    function sumTotalEbt()
    {
       var a = new BigNumber(document.getElementById('bidRate').value);
        var b = new BigNumber(document.getElementById('bidAmountPYY').value);
       var res= new BigNumber(document.getElementById('bidAmountBTC').value);
        if (res) {
          var equal=(res).dividedBy(b);
            document.getElementById('bidAmountPYY').value = equal;
        }
    }
    function sumsell() {
        var a = new BigNumber(document.getElementById('askRate').value);
        var b = new BigNumber(document.getElementById('askAmountPYY').value);
        var result = (a).times(b);
        if (!isNaN(result)) {
           document.getElementById('askAmountBTC').value = result;

        }

    }
    function sumTotalSell()
    {
      var a = new BigNumber(document.getElementById('askRate').value);
        var b = new BigNumber(document.getElementById('askAmountPYY').value);
        var res= new BigNumber(document.getElementById('askAmountBTC').value);
        if (res) {
          var equal=(res).dividedBy(b);
           document.getElementById('askRate').value = equal;

        }
    }

  function del(bidIdPYY,bidownerId) {

    if (confirm("Do You Want To Delete!")) {
      $.ajax({
        type: "POST",
        url: url_api + '/tradepyymarket/removeBidPYYMarket',
        data: {
          "bidIdPYY": bidIdPYY,
          "bidownerId": bidownerId
        },
        success: function(result){

        }
      });
    }
  }
  function del_ask(askIdPYY,askownerId) {
    if (confirm("Do You Want To Delete!")) {
      $.ajax({
        type: "POST",
        url: url_api + '/tradepyymarket/removeAskPYYMarket',
        data: {
          "askIdPYY":askIdPYY,
          "askownerId":askownerId

        },
        success: function(result){

        }
      });
    }
  }


  /**********************buy data*********************************************************************************/
  function buy_data() {


    var bidRate = document.getElementById('bidRate').value;
    var bidAmountPYY = document.getElementById('bidAmountPYY').value;
    var bidAmountBTC = document.getElementById('bidAmountBTC').value;
    var bidownerId=user_details.id;
    var spendingPassword='12';

    var json_bid_pyy = {
      "bidAmountBTC":bidAmountBTC,
      "bidAmountPYY":bidAmountPYY,
      "bidRate":bidRate,
      "bidownerId":bidownerId,
      "spendingPassword":spendingPassword
    }

    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/addBidPYYMarket",
      data: JSON.stringify(json_bid_pyy),
      success: function(result){

        $('#error_message1').empty();
        if (result.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+result.message+"");
        }

      }
    });
  }

  function sell_data(){

    var askAmountPYY = document.getElementById('askAmountPYY').value;
    var askRate = document.getElementById('askRate').value;
    var askAmountBTC = document.getElementById('askAmountBTC').value;
    var bidownerId=user_details.id;

    var spendingPassword='12';

    var json_ask_pyy = {
      "askAmountBTC":askAmountBTC,
      "askAmountPYY":askAmountPYY,
      "askRate":askRate,
      "askownerId":bidownerId,
      "spendingPassword":spendingPassword
    }

    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradepyymarket/addAskPYYMarket",
      data: JSON.stringify(json_ask_pyy),
      success: function(result){

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
$.getJSON(url_api + '/tradepyymarket/getBidsPYYSuccess', function (data) {
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
    }*/
    var  temp =data.bidsPYY;

    var date = 1317888000000;
    if(temp){
      for (var i = 0; i < temp.length; i++) {

        arrayObject.push([Number(temp[i].createTimeUTC)*1000,temp[i].bidRate]);
        bidorderTime.push(temp[i].updatedAt);
      }
    }
    $.getJSON(url_api + '/tradepyymarket/getAsksPYYSuccess', function (dataask) {
       //console.log(data);
         /* var bid_orders = $.parseJSON(data);
        for(var i = 0; i < data.length ; i++){
               console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
        }*/
        var  tempask =dataask.asksPYY;

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
               text: 'PayWay Coin & Bitcoin Market'
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
               data: arrayObjectask
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
