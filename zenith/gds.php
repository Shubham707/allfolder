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
<div class="container-fluid no-padding">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-sm-12 col-md-12">
        <div class="tab-content" id="myTabContent">

          <div class="panel panel-default text-center ">

          <p><div id="container" ></div></p>
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
                      <div class="panel-heading bidhead">BID <small class="pull-right" > BTC<span id ="bid_Total_btc_gds"></span>  | GDS <span id ="bid_Total_gds"></span></small></div>
                      <div class="panel-body bidset">
                        <div class="table-responsive">
                          <table class="table table-striped order-table table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(GDS)</th>
                                <th>Bid(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="bid_btc_gds">

                            </tbody>

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5">
                    <div class="panel panel-default">
                      <div class="panel-heading askhead">ASK <small class="pull-right" > BTC  <span id ="ask_Total_btc_gds"></span>| GDS <span id ="ask_Total_gds"></span></small></div>

                      <div class="panel-body askset">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(GDS)</th>
                                <th>Ask(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="ask_btc_gds">

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
                  <div class="panel-heading">Buy Goods Coin
                   <small class="pull-right" > Available Balance: <span id ="avalBTCBalance"></span>BTC <br> Freeze Balance: <span id="freezeBTCBalance"></span>BTC</small>
                  </div>
                  <div class="panel-body ">
                    <fieldset>

                      <div class="input-group margin-top">
                        <span class="input-group-addon">Units</span>
                        <input type="number" step="0.00001" onkeyup="sum()" name="bidAmountGDS"
                        id="bidAmountGDS" class="form-control txt"
                        aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">GDS</span>
                      </div>
                      <div class="input-group margin-top">
                        <span class="input-group-addon">Bid &nbsp;&nbsp;</span>
                        <input type="number" step="0.00001" onkeyup="sum()" name="bidRate"
                        id="bidRate" class="form-control txt"
                        aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">BTC</span>
                      </div>
                      <div class="input-group margin-top">
                        <span class="input-group-addon">Total</span>
                        <input type="text" step="0.00001" onkeypress="return isNumberKey(event)"  onkeyup="sumTotal()" name="bidAmountBTC" id="bidAmountBTC"
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
                  <div class="panel-heading">Sell Goods Coin
                    <small class="pull-right" > Available Balance:<span id ="avalGDSBalance"></span>GDS <br> Freeze Balance: <span id="freezeGDSBalance"></span>GDS</small>
                  </div>
                  <div class="panel-body ">
                    <fieldset>
                      <div class="input-group margin-top">
                        <span class="input-group-addon">Units</span>
                        <input type="number" step="0.00001" id="askAmountGDS" name="askAmountGDS"
                        onkeyup="sumsell()" class="form-control"
                        aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-addon">GDS</span>
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
                        <input ttype="text" step="0.00001" onkeypress="return isNumberKey(event)"  onkeyup="sumTotalsell()" id="askAmountBTC" name="askAmountBTC"
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
                        <th>UNITS FILLED GDS</th>
                        <th>ACTUAL RATE</th>
                        <th>UNITS TOTAL GDS</th>
                        <th>UNITS TOTAL BTC</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>

                    <tbody id="open_bid_gds">

                    </tbody>
                    <tbody id="open_ask_gds">

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
                        <th>UNITS FILLED GDS</th>
                        <th>ACTUAL RATE</th>
                        <th>UNITS TOTAL GDS</th>
                        <th>UNITS TOTAL BTC</th>
                      </tr>
                    </thead>

                    <tbody id="market_bid_gds">

                    </tbody>
                    <tbody id="market_ask_gds">

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
<?php
include 'footer.php';
?>
<script src ="bignumber.js/bignumber.js/bignumber.js"></script>

<script>

function sum() {
    var a = new BigNumber (document.getElementById('bidRate').value);
    var b = new BigNumber (document.getElementById('bidAmountGDS').value);
    var result = (a).times(b);
    if (!isNaN(result)) {
       document.getElementById('bidAmountBTC').value = result;
    }

}
function sumTotal() {
    var a = new BigNumber (document.getElementById('bidRate').value);
    var b = new BigNumber (document.getElementById('bidAmountGDS').value);
    var res=new BigNumber (document.getElementById('bidAmountBTC').value);

    if(res){
      var equal=(res).dividedBy(b);
    document.getElementById('bidAmountGDS').value=equal;
   }

}

function sumsell() {
    var a = new BigNumber (document.getElementById('askRate').value);
    var b = new BigNumber (document.getElementById('askAmountGDS').value);
    var result = (a).times(b);
    if (!isNaN(result)) {
        document.getElementById('askAmountBTC').value = result;

    }

}
function sumTotalsell()
{
  var res=new BigNumber (document.getElementById('askAmountBTC').value);
   var a = new BigNumber (document.getElementById('askRate').value);
    var b = new BigNumber (document.getElementById('askAmountGDS').value);

    if (res) {
      var equal=(res).dividedBy(b);
         document.getElementById('askAmountGDS').value=equal;
    }
}

function del(uid,gdsbid) {


    if (confirm("Do You Want To Delete!")) {
        $.ajax({
            type: "POST",
            url: url_api+"/tradegdsmarket/removeBidGDSMarket",
            data:  {
                "bidIdGDS":uid,
                "bidownerId": gdsbid
            }
            ,
            success: function(result){
                alert('Data Delete Successfully');


            }
        });
    }
}
function del_ask(askid,askbid) {

    if (confirm("Do You Want To Delete!")) {
        $.ajax({
            type: "POST",
            url: url_api+"/tradegdsmarket/removeAskGDSMarket",
            data: {
                "askIdGDS":askid,
                "askownerId":askbid
        },
        success: function(result){
             alert('Data Delete Successfully');

        }
    });
    }
}


/**********************buy data*********************************************************************************/
function buy_data() {


    var bidRate = document.getElementById('bidRate').value;
    var bidAmountGDS = document.getElementById('bidAmountGDS').value;
    var bidAmountBTC = document.getElementById('bidAmountBTC').value;
    var bidownerId=user_details.id;
    var spendingPassword='12';


    var json_bid_gds = {
      "bidAmountBTC":bidAmountBTC,
      "bidAmountGDS":bidAmountGDS,
      "bidRate":bidRate,
      "bidownerId":bidownerId,
      "spendingPassword":spendingPassword
    }
      // var d =  JSON.stringify(jsondata);
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: url_api+"/tradegdsmarket/addBidGDSMarket",
        data: JSON.stringify(json_bid_gds),
        success: function(result){
            $('#error_message1').empty();
            if (result.statusCode!=200)
                    {
                        $('#error_message1').append(" &nbsp;"+result.message+"");
                    }

     }
    });


    }

function sell_data()
{


    var askAmountGDS = document.getElementById('askAmountGDS').value;
    var askRate = document.getElementById('askRate').value;
    var askAmountBTC = document.getElementById('askAmountBTC').value;
    var bidownerId=user_details.id;
    var spendingPassword='12';

    var json_ask_gds = {
      "askAmountBTC":askAmountBTC,
      "askAmountGDS":askAmountGDS,
      "askRate":askRate,
      "askownerId":bidownerId,
      "spendingPassword":spendingPassword
  }

  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/addAskGDSMarket",
    data: JSON.stringify(json_ask_gds),
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
$.getJSON(url_api + '/tradegdsmarket/getBidsGDSSuccess', function (data) {
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
    }*/
    var  temp =data.bidsGDS;
    var date = 1317888000000;
    if(temp){
      for (var i = 0; i < temp.length; i++) {

        arrayObject.push([Number(temp[i].createTimeUTC)*1000,temp[i].bidRate]);
        bidorderTime.push(temp[i].updatedAt);
      }
    }
    $.getJSON(url_api + '/tradegdsmarket/getAsksGDSSuccess', function (dataask) {
       //console.log(data);
         /* var bid_orders = $.parseJSON(data);
        for(var i = 0; i < data.length ; i++){
               console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
        }*/
        var  tempask =dataask.asksGDS;
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
               text: 'Goods Coin & Bitcoin Market'
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
               enabled: true
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
