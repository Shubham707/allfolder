 <link rel="stylesheet" type="text/css" href="chart_all/css/jquery.jqChart.css" />
            <link rel="stylesheet" type="text/css" href="chart_all/css/jquery.jqRangeSlider.css" />
            <link rel="stylesheet" type="text/css" href="chart_all/themes/smoothness/jquery-ui-1.10.4.css" />
            <script src="chart_all/js/jquery-1.11.1.min.js" type="text/javascript"></script>
            <script src="chart_all/js/jquery.mousewheel.js" type="text/javascript"></script>
            <script src="chart_all/js/jquery.jqChart.min.js" type="text/javascript"></script>
            <script src="chart_all/js/jquery.jqRangeSlider.min.js" type="text/javascript"></script>

    <script lang="javascript" type="text/javascript">
        $(document).ready(function () {

            var background = {
                type: 'linearGradient',
                x0: 0,
                y0: 0,
                x1: 0,
                y1: 1,
                colorStops: [{ offset: 0, color: '#d2e6c9' },
                             { offset: 1, color: 'white' }]
            };

            $('#jqChart').jqChart({
                title: { text: 'Pie Chart' },
                legend: { title: 'Countries' },
                border: { strokeStyle: '#6ba851' },
                background: background,
                animation: { duration: 1 },
                shadows: {
                    enabled: true
                },
                series: [
                    {
                        type: 'pie',
                        fillStyles: ['#418CF0', '#FCB441', '#E0400A', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        labels: {
                            stringFormat: '%.1f%%',
                            valueType: 'percentage',
                            font: '15px sans-serif',
                            fillStyle: 'white'
                        },
                        explodedRadius: 10,
                        explodedSlices: [5],
                        data: [['United States', 65], ['United Kingdom', 58], ['Germany', 30],
                               ['India', 60], ['Russia', 65], ['China', 75]]
                    }
                ]
            });

            $('#jqChart').bind('tooltipFormat', function (e, data) {
                var percentage = data.series.getPercentage(data.value);
                percentage = data.chart.stringFormat(percentage, '%.2f%%');

                return '<b>' + data.dataItem[0] + '</b><br />' +
                       data.value + ' (' + percentage + ')';
            });
        });
    </script>

            <div id="jqChart" style="width: 500px; height: 300px;">
            </div>