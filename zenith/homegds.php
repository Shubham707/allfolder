<?php
ob_start();
include 'header.php';

ob_end_flush();

?>
<div id="asks_orders"></div>
<div class="container-fluid no-padding">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-sm-12 col-md-12">
        <div class="tab-content" id="myTabContent">

          <div class="panel panel-default">
           <div id="container"></div>
          </div>
          <div class="tab-pane fade show active bg-default" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="text-center">
              <h3>Order Book</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
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
                            <thead>
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


            </div>
          </div>

            <div class=" text-center"><h3>Success Orders</h3></div>
            <div class="panel panel-default">
              <div class="panel text-center "></div>

              <div class="panel-body market">
                <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      console.log("  console.log(temp);",temp);
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
        console.log("  console.log(tempask);",tempask);
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
                       'Click and drag i n the plot area to zoom in' : 'Pinch the chart to zoom in'
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
<?php
include 'footerz.php';
?>
