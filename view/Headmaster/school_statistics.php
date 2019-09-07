<main role="main" class="m-auto px-5 main">
  <div class="pt-3 pb-2 mb-3 border-bottom text-center">
      <h1 class="h2">Overall Statistics By Subjects</h1>
    </div>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
   
   <div class="input-group-prepend d-block col-12 pl-0 pr-0 mr-3">
       <a href="Headmaster/headmaster_dashboard" class="btn-back float-left" role="button">Back</a>
   </div>
 </div>
 

 <script>
            let chart;

            let chartData = [
                <?php
                $grades = $data['grades']; 
                foreach($grades as $grade) { ?>
                {
                    "subject": "<?= $grade->subject; ?>",
                    "average1": "<?= $grade->average1; ?>",
                    "average2": "<?= $grade->average2; ?>"
                },
                <?php } ?>
            ];

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "subject";
                chart.startDuration = 1;
                chart.color = "#000";
                chart.fontFamily = "Raleway";
                chart.fontSize = 15;
                chart.plotAreaBorderColor = "#DADADA";
                chart.plotAreaBorderAlpha = 1;
                // this single line makes the chart a bar chart
                chart.rotate = true;

                // AXES
                // Category
                let categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;

                // Value
                let valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0.1;
                valueAxis.position = "top";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                let graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Half-Year Average Grades";
                graph1.valueField = "average1";
                graph1.balloonText = "Half-Year Average Grade:[[average1]]";
                graph1.lineAlpha = 0;
                graph1.fillColors = "#644E5B";
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // second graph
                let graph2 = new AmCharts.AmGraph();
                graph2.type = "column";
                graph2.title = "End-Year Average Grades";
                graph2.valueField = "average2";
                graph2.balloonText = "End-Year Average Grade:[[average2]]";
                graph2.lineAlpha = 0;
                graph2.fillColors = "#C96567";
                graph2.fillAlphas = 1;
                chart.addGraph(graph2);

                // LEGEND
                let legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>

    <body>
        <div id="chartdiv" style="width:100%; height:800px;"></div>
    </body>
</main>





 