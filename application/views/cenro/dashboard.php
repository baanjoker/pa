<?php echo form_input('muncipalid',$muncipalId,'id="muncipalid" class="hide"'); ?>
<div class="card">
    <div class="card-content card-cover">
        <div class="row">
        	<div class="col-sm-6">
				  	<div id="chartpaarea"></div>
                <div id="chartpamunicipal"></div>
				  	<!-- <div id="labelOverlay">
				    	<p class="used-size">
				    		<?php
				    			foreach ($totalpaarea as $dataa) {
				    				echo nice_number($dataa->totalPAarea);
				    			}
				    		?>
				    	</p>
				    	<p class="total-size">Total Area(ha.)</p>
				  	</div> -->
			</div>
        </div>            
    </div>
</div>
<div class="card">
	<div class="card-content">
		<div class="table-responsive">
			<?php foreach ($pamain as $datas): ?>
			<table class="table table-bordered table-bordered">
				<thead>
					<!-- <tr>
						<th colspan="2" style="font-weight: bold; font-size: 24px;text-transform: uppercase;"><?php echo $datas->pa_name ?></th>
	            	</tr> -->
	            </thead>
	            <tbody id="cenroPA">	            	
            	</tbody>
        	</table>
        	<?php endforeach ?>
    	</div> 
	</div>
</div>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    // google.charts.setOnLoadCallback(drawchartpiePAarea);
    google.charts.setOnLoadCallback(drawChartPAlist);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawchartpiePAarea() {
     	var municipal = $('#muncipalid').val();
        var jsonData = $.ajax({ 
            url: BASE_URL + 'cenro/dashboard/count_chartTotalAreaMunicipal', 
            data:{municipal:municipal},
            type: 'POST',
            async: false 
            }).responseText; 
           
      	// Create our data table out of JSON data loaded from server. 
     	var data = new google.visualization.DataTable(jsonData); 
        var options = {
            legend:{position: 'labeled',},
            fontSize:18,
            // width: '800',
            height: '500',
            // pieSliceText: 'percentage',
            backgroundColor: {stroke:'black', fill:'transparent',strokeSize: 1},
            title: 'Total no. of protected area per province',
            pieHole: 0.5,
            pieSliceText: 'label',
            chartArea: {
                left: "0",
                top: "100",
                right: "0",
                bottom: 9,
                height: "100%",
                width: "100%",    
            },
            tooltip: {
                trigger:'display'
            },
            legend: 'none',
        };
          // Instantiate and draw our chart, passing in some options. 
          var chart_cat = new google.visualization.PieChart(document.getElementById('chartpamunicipal')); 
          chart_cat.draw(data, options); 
    } 

    function drawChartPAlist() {
    var municipal = $('#muncipalid').val();
    var jsonData = $.ajax({ 
          url: "<?php echo base_url() . 'cenro/dashboard/area_chartTotalPAmunicipal' ?>", 
          data:{municipal:municipal},
          type: 'POST',
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
    var data = new google.visualization.DataTable(jsonData); 
    var options = {
      legend:{position: 'labeled',},
      fontSize:18,
      // width: '800',
      height: '500',
      // pieSliceText: 'percentage',
      backgroundColor: {stroke:'black', fill:'transparent',strokeSize: 1},
      title: 'Total area(ha) per PA',
      pieHole: 0.5,
      pieSliceText: 'label',
      chartArea: {
          left: "0",
          top: "100",
          right: "0",
          bottom: 9,
          height: "100%",
          width: "100%",    
      },
      tooltip: {
          trigger:'display'
      },
      legend: 'none',
  	};
    // Instantiate and draw our chart, passing in some options. 
    var chart_cat = new google.visualization.PieChart(document.getElementById('chartpaarea')); 
    chart_cat.draw(data, options) 
    } 
</script>