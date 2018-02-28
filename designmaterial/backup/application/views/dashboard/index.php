<?php $this->load->view('dashboard/header');
$this->load->view('dashboard/sidebar');
?>
      <article class="content dashboard-page">
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col col-12 col-sm-12 col-md-6 col-xl-5 stats-col">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> Stats </h4>
                                            <p class="title-description"> Website metrics for
                                                <a href="http://modularteam.github.io/modularity-free-admin-dashboard-theme-html/"> your awesome project </a>
                                            </p>
                                        </div>
                                        <div class="row row-sm stats-container">
                                            <div class="col-12 col-sm-6 stat-col">
                                                <div class="stat-icon">
                                                    <i class="fa fa-rocket"></i>
                                                </div>
                                                <div class="stat">
                                                    <div class="value"> 5407 </div>
                                                    <div class="name"> Active items </div>
                                                </div>
                                                <div class="progress stat-progress">
                                                    <div class="progress-bar" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 stat-col">
                                                <div class="stat-icon">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                                <div class="stat">
                                                    <div class="value">
                                                     <?php echo count(@$items[0]->email? 0:@$items[0]->email);?> </div>
                                                    <div class="name"> Items sold </div>
                                                </div>
                                                <div class="progress stat-progress">
                                                    <div class="progress-bar" style="width: 25%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6  stat-col">
                                                <div class="stat-icon">
                                                    <i class="fa fa-line-chart"></i>
                                                </div>
                                                <div class="stat">
                                                    <div class="value"> $ <?php echo count(@$monthly[0]->amountUSD? 0:@$monthly[0]->amountUSD);?></div>
                                                    <div class="name"> Monthly income </div>
                                                </div>
                                                <div class="progress stat-progress">
                                                    <div class="progress-bar" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6  stat-col">
                                                <div class="stat-icon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <div class="stat">
                                                    <div class="value">
                                                     <?php echo count(@$users[0]->email? 0:$users[0]->email);?> </div>
                                                    <div class="name"> Total users </div>
                                                </div>
                                                <div class="progress stat-progress">
                                                    <div class="progress-bar" style="width: 34%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6  stat-col">
                                                <div class="stat-icon">
                                                    <i class="fa fa-list-alt"></i>
                                                </div>
                                                <div class="stat">
                                                    <div class="value"> 59 </div>
                                                    <div class="name"> Tickets closed </div>
                                                </div>
                                                <div class="progress stat-progress">
                                                    <div class="progress-bar" style="width: 49%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 stat-col">
                                                <div class="stat-icon">
                                                    <i class="fa fa-dollar"></i>
                                                </div>
                                                <div class="stat">
                                                    <div class="value"> $780.064 </div>
                                                    <div class="name"> Total income </div>
                                                </div>
                                                <div class="progress stat-progress">
                                                    <div class="progress-bar" style="width: 15%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-sm-12 col-md-6 col-xl-7 history-col">
                            
                                    <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
                                  
                             
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-xl-8">
                                <div class="card sameheight-item items" data-exclude="xs,sm,lg">
                                    <div class="card-header bordered">
                                        <div class="header-block">
                                            <h3 class="title"> Items </h3>
                                            <a href="item-editor.html" class="btn btn-primary btn-sm"> Add new </a>
                                        </div>
                                        <div class="header-block pull-right">
                                            <label class="search">
                                                <input class="search-input" placeholder="search...">
                                                <i class="fa fa-search search-icon"></i>
                                            </label>
                                            <div class="pagination">
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-angle-up"></i>
                                                </a>
                                                <a href="#" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="item-list striped">
                                        <li class="item item-list-header">
                                            <div class="item-row">
                                                <div class="item-col item-col-header fixed item-col-img xs"></div>
                                                <div class="item-col item-col-header item-col-title">
                                                    <div>
                                                        <span>Name</span>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-header item-col-sales">
                                                    <div>
                                                        <span>Sales</span>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-header item-col-stats">
                                                    <div class="no-overflow">
                                                        <span>Stats</span>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-header item-col-date">
                                                    <div>
                                                        <span>Published</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">
                                                <div class="item-col fixed item-col-img xs">
                                                    <a href="#">
                                                        <div class="item-img xs rounded" style="background-image: url(../../s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg)"></div>
                                                    </a>
                                                </div>
                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <a href="#" class="">
                                                            <h4 class="item-title no-wrap"> 12 Myths Uncovered About IT &amp; Software </h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-sales">
                                                    <div class="item-heading">Sales</div>
                                                    <div> 4958 </div>
                                                </div>
                                                <div class="item-col item-col-stats">
                                                    <div class="item-heading">Stats</div>
                                                    <div class="no-overflow">
                                                        <div class="item-stats sparkline" data-type="bar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div class="item-heading">Published</div>
                                                    <div> 21 SEP 10:45 </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">
                                                <div class="item-col fixed item-col-img xs">
                                                    <a href="#">
                                                        <div class="item-img xs rounded" style="background-image: url(../../s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg)"></div>
                                                    </a>
                                                </div>
                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <a href="#" class="">
                                                            <h4 class="item-title no-wrap"> 50% of things doesn&#x27;t really belongs to you </h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-sales">
                                                    <div class="item-heading">Sales</div>
                                                    <div> 192 </div>
                                                </div>
                                                <div class="item-col item-col-stats">
                                                    <div class="item-heading">Stats</div>
                                                    <div class="no-overflow">
                                                        <div class="item-stats sparkline" data-type="bar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div class="item-heading">Published</div>
                                                    <div> 21 SEP 10:45 </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">
                                                <div class="item-col fixed item-col-img xs">
                                                    <a href="#">
                                                        <div class="item-img xs rounded" style="background-image: url(../../s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg)"></div>
                                                    </a>
                                                </div>
                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <a href="#" class="">
                                                            <h4 class="item-title no-wrap"> Vestibulum tincidunt amet laoreet mauris sit sem aliquam cras maecenas vel aliquam. </h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-sales">
                                                    <div class="item-heading">Sales</div>
                                                    <div> 2143 </div>
                                                </div>
                                                <div class="item-col item-col-stats">
                                                    <div class="item-heading">Stats</div>
                                                    <div class="no-overflow">
                                                        <div class="item-stats sparkline" data-type="bar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div class="item-heading">Published</div>
                                                    <div> 21 SEP 10:45 </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">
                                                <div class="item-col fixed item-col-img xs">
                                                    <a href="#">
                                                        <div class="item-img xs rounded" style="background-image: url(../../s3.amazonaws.com/uifaces/faces/twitter/why_this/128.jpg)"></div>
                                                    </a>
                                                </div>
                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <a href="#" class="">
                                                            <h4 class="item-title no-wrap"> 10 tips of Object Oriented Design </h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-sales">
                                                    <div class="item-heading">Sales</div>
                                                    <div> 124 </div>
                                                </div>
                                                <div class="item-col item-col-stats">
                                                    <div class="item-heading">Stats</div>
                                                    <div class="no-overflow">
                                                        <div class="item-stats sparkline" data-type="bar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div class="item-heading">Published</div>
                                                    <div> 21 SEP 10:45 </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">
                                                <div class="item-col fixed item-col-img xs">
                                                    <a href="#">
                                                        <div class="item-img xs rounded" style="background-image: url(../../s3.amazonaws.com/uifaces/faces/twitter/w7download/128.jpg)"></div>
                                                    </a>
                                                </div>
                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <a href="#" class="">
                                                            <h4 class="item-title no-wrap"> Sometimes friend tells it is cold </h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-sales">
                                                    <div class="item-heading">Sales</div>
                                                    <div> 10214 </div>
                                                </div>
                                                <div class="item-col item-col-stats">
                                                    <div class="item-heading">Stats</div>
                                                    <div class="no-overflow">
                                                        <div class="item-stats sparkline" data-type="bar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div class="item-heading">Published</div>
                                                    <div> 21 SEP 10:45 </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="item-row">
                                                <div class="item-col fixed item-col-img xs">
                                                    <a href="#">
                                                        <div class="item-img xs rounded" style="background-image: url(../../s3.amazonaws.com/uifaces/faces/twitter/pankogut/128.jpg)"></div>
                                                    </a>
                                                </div>
                                                <div class="item-col item-col-title no-overflow">
                                                    <div>
                                                        <a href="#" class="">
                                                            <h4 class="item-title no-wrap"> New ways of conceptual thinking </h4>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-sales">
                                                    <div class="item-heading">Sales</div>
                                                    <div> 3217 </div>
                                                </div>
                                                <div class="item-col item-col-stats">
                                                    <div class="item-heading">Stats</div>
                                                    <div class="no-overflow">
                                                        <div class="item-stats sparkline" data-type="bar"></div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div class="item-heading">Published</div>
                                                    <div> 21 SEP 10:45 </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div id="container1" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </section>

                </article>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
$.getJSON(
    'https://cdn.rawgit.com/highcharts/highcharts/v6.0.5/samples/data/usdeur.json',
    function (data) {

        Highcharts.chart('container', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Monthly Payment USD OR INR'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        '' : ''
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Bitcoin'
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

            series: [{
                type: 'area',
                name: 'USD OR INR',
                data: <?php echo json_encode($all)?>
            }]
        });
    }
);
 </script>
 <script type="text/javascript">
     
// Create the chart
Highcharts.chart('container1', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Sale, Payment, Coin'
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },
    series: [{
        name: '<?php echo $this->session->userdata('userEmail');?>',
        colorByPoint: true,
        data: [{
            name: 'Sale',
            y: 56.33,
            drilldown: 'Sale'
        }, {
            name: 'Payment',
            y: 24.03,
            drilldown: 'Payment'
        }, {
            name: 'Coin',
            y: 10.38,
            drilldown: 'Coin'
        }]
    }],
    drilldown: {
        series: [{
            name: 'IE',
            id: 'IE',
            data: [
                ['v11.0', 24.13],
                ['v8.0', 17.2],
                ['v9.0', 8.11],
                ['v10.0', 5.33],
                ['v6.0', 1.06],
                ['v7.0', 0.5]
            ]
        }, {
            name: 'Chrome',
            id: 'Chrome',
            data: [
                ['v40.0', 5],
                ['v41.0', 4.32],
                ['v42.0', 3.68],
                ['v39.0', 2.96],
                ['v36.0', 2.53],
                ['v43.0', 1.45],
                ['v31.0', 1.24],
                ['v35.0', 0.85],
                ['v38.0', 0.6],
                ['v32.0', 0.55],
                ['v37.0', 0.38],
                ['v33.0', 0.19],
                ['v34.0', 0.14],
                ['v30.0', 0.14]
            ]
        }, {
            name: 'Firefox',
            id: 'Firefox',
            data: [
                ['v35', 2.76],
                ['v36', 2.32],
                ['v37', 2.31],
                ['v34', 1.27],
                ['v38', 1.02],
                ['v31', 0.33],
                ['v33', 0.22],
                ['v32', 0.15]
            ]
        }, {
            name: 'Safari',
            id: 'Safari',
            data: [
                ['v8.0', 2.56],
                ['v7.1', 0.77],
                ['v5.1', 0.42],
                ['v5.0', 0.3],
                ['v6.1', 0.29],
                ['v7.0', 0.26],
                ['v6.2', 0.17]
            ]
        }, {
            name: 'Opera',
            id: 'Opera',
            data: [
                ['v12.x', 0.34],
                ['v28', 0.24],
                ['v27', 0.17],
                ['v29', 0.16]
            ]
        }]
    }
});
 </script>

              <?php $this->load->view('dashboard/footer');?>
