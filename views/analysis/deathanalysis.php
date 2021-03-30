<?php
use app\models\County;
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <h3 class="text-center"><b><u>Death Registration Analysis</u></b></h3>
  <body>
    <div id="chart_container">
      <div id="pie-chart" class="chart-div"></div>

      <div id="bar-chart" class="chart-div"></div>

      <div id="column-chart" class="chart-div"></div>
    </div>
  </body>
</html>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      
    google.charts.setOnLoadCallback(drawPieChart);
      
    function drawPieChart() {

      var data = new google.visualization.arrayToDataTable([
        ["Year","Population"],
        <?php
            foreach ($population_per_year as $key => $value)
            {
                # code...
                echo "['".$value->Year."', ".$value->Population."],";
            }
            ?>
        ]);

      var options = {
          title: "Percentage of Population per Year",
          width: '100%',
          height: '200px',
        };
      var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
      chart.draw(data, options);
    }


    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBarBasic);

    function drawBarBasic() {

      var data = new google.visualization.arrayToDataTable([
         ['County', 'Population'],
        <?php
            foreach ($population_per_year_per_county as $key => $value)
            {
                # code...
              $count_y = County::findOne(['CountyID' => $value->county]);
              echo "['".$count_y->CountyName."', ".$value->Population."],";
            }
            ?>
        ]);

      var options = {
          title: "Number of People per County",
        chartArea: {width: '100%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        },
        legend: { position: "none" }
      };

      var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));

      chart.draw(data, options);
    }


  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawColumnChart);
    function drawColumnChart() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'Population'],
        <?php
            foreach ($population_per_year_per_gender_per_county as $key => $value)
            {
                # code...
                echo "['".$value->Year."', ".$value->County."],";
            }
            ?>
        ]);


      var options = {
        title: "Number of People per County per Gender per Year",
        chartArea: {width: '100%'},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
      chart.draw(data, options);
  }
  </script>