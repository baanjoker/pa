<section class="content-header">
  
<div class="col-md-12 col-sm-12 col-xs-12">
<center><h2>Protected Area</h2></center>
</div>
<div class="row">
  <div class="col-md-4 col-sm-12 col-xs-12">
    <!-- <center><strong>by Classification</strong></center> -->
    <div id="dashboard_div">
      <div id="chart_wrap">
        <div id="chart_classification"></div> 
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-12 col-xs-12">
    <!-- <center><strong>by Categories</strong></center> -->
    <div id="dashboard_div">
      <div id="chart_wrap">
        <div id="chart_category"></div> 
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-12 col-xs-12">
    <!-- <center><strong>by Conservation area</strong></center> -->
    <div id="dashboard_div">
      <div id="chart_wrap">
        <div id="chart_cpa"></div> 
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart','geochart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChartCategory); 
    google.charts.setOnLoadCallback(drawChartClassification);
    google.charts.setOnLoadCallback(drawChartCPA);
    google.charts.setOnLoadCallback(drawRegionsMap);


    function drawChartCategory() {
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/dashboard/count_chart' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
      var options = {
        legend:{position: 'labeled',},
        width: 'auto',
        height: '300',
        pieSliceText: 'percentage',
        backgroundColor: {stroke:'black', fill:'#fafafa',strokeSize: 1},
        title: 'Total number of Protected area by categories',
        pieHole: 0.4,
        pieSliceText: 'value',
        // is3D: true,
        // colors: ['#003300', '#008000','#00b300','#00ff00','#99ff99','#e6ffe6'],
        chartArea: {
            left: "5%",
            top: "20%",
            right: "5%",
            bottom: 9,
            height: "100%",
            width: "100%",    
        }
    };
      // Instantiate and draw our chart, passing in some options. 
      var chart_category = new google.visualization.PieChart(document.getElementById('chart_category')); 
      chart_category.draw(data, options); 
    } 

    function drawChartClassification() {
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/dashboard/count_chart_classification' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
      var options = {
        legend:{position: 'labeled',},
        width: 'auto',
        height: '300',
        pieSliceText: 'percentage',
        backgroundColor: {stroke:'black', fill:'#fafafa',strokeSize: 1},
        title: 'Total number of Protected area by classification',
        pieHole: 0.4,
        pieSliceText: 'value',
        // is3D: true,
        // colors: ['#003300', '#008000','#00b300','#00ff00','#99ff99','#e6ffe6'],
        chartArea: {
            left: "5%",
            top: "20%",
            right: "5%",
            bottom: 9,
            height: "100%",
            width: "100%",

        }
    };
      // Instantiate and draw our chart, passing in some options. 
      var chart_class = new google.visualization.PieChart(document.getElementById('chart_classification')); 
      chart_class.draw(data, options); 
    }

    function drawChartCPA() {
      var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/dashboard/count_chart_cpa' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
      var options = {
        legend:{position: 'labeled',},
        width: 'auto',
        height: '300',
        pieSliceText: 'percentage',
        backtransparentolor: {stroke:'black', fill:'#fafafa',strokeSize: 1},title: 'Total number of Protected area by Conservation Area',
        pieHole: 0.4,
        pieSliceText: 'value',
        // is3D: true,
        // colors: ['#003300', '#008000','#00b300','#00ff00','#99ff99','#e6ffe6'],
        chartArea: {
            left: "5%",
            right: "5%",
            bottom: 9,
            top: "20%",
            height: "50%",
            width: "100%",

        }
    };
      // Instantiate and draw our chart, passing in some options. 
      var chart_cpa = new google.visualization.PieChart(document.getElementById('chart_cpa')); 
      chart_cpa.draw(data, options); 
    }

   function drawRegionsMap() {
    var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'index.php/dashboard/count_chart_map' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
        
        var data = google.visualization.arrayToDataTable([["Code", "Name", "Value"],
         
          ]);
         // var data = google.visualization.arrayToDataTable([
         //    ["Code", "Name", "Value"],
         //    ["PH-14", "Autonomous Region in Muslim Mindanao (ARMM)", 1],
         //    ["PH-05", "Bicol (Region V)", 2],
         //    ["PH-02", "Cagayan Valley (Region II)", 3],
         //    ["PH-40", "Calabarzon (Region IV-A)",4 ],
         //    ["PH-13", "Caraga (Region XIII)", 5],
         //    ["PH-03", "Central Luzon (Region III)", 6],
         //    ["PH-07", "Central Visayas (Region VII)", 7],
         //    ["PH-15", "Cordillera Administrative Region (CAR)", 8],
         //    ["PH-11", "Davao (Region XI)", 9],
         //    ["PH-08", "Eastern Visayas (Region VIII)", 10],
         //    ["PH-01", "Ilocos (Region I)", 11],
         //    ["PH-41", "Mimaropa (Region IV-B)", 12],
         //    ["PH-00", "National Capital Region Pambansang Punong", 13],
         //    ["PH-10", "Northern Mindanao (Region X)", 14],
         //    ["PH-12", "Soccsksargen (Region XII)", 15],
         //    ["PH-06", "Western Visayas (Region VI)", 16],
         //    ["PH-09", "Zamboanga Peninsula (Region IX)", 17]
         //  ]);

        var options = {
        'region': 'PH',
        'resolution': 'provinces',
         'displayMode': 'region',
         // legend: 'region',
         colorAxis: {colors: ['#381059', '#63628f', '#17865b','#5afa3b','#cf7fe4','#eac52b','#771d11','#638fa2','#f13c04','#ad4093','#931546','#1a58dc','#edc369','#31c2f9','#62290c','#eb0b87','#fa2513']},
      };


        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
</script>