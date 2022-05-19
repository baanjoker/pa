<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="head">
            <div class="ribbonHeadCenter">
                <h1>Protected Area Dashboard<br>Regional</h1>
                <?php echo form_input('idreg',$prov,'id="idreg" class="hide"'); ?>
                <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <input type="text" name="provid" id="provid" value="<?php echo $prov; ?>" class="hidden">
                            <div class="col-sm-12 col-md-12">
                                <table id="tblpadisplay" class="content-table">
                                    <thead>
                                        <tr>
                                            <th colspan="3">No. of Protected Area by Province</th>
                                        </tr>
                                        <tr>
                                            <th>Provinces</th>
                                            <th>No. of PAs</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodydashboardpaProvince"></tbody>
                                </table>
                            <i>Note: This is a realtime data. Count is based on the data encoded on PA System.</i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div id="chart_div_pa_reg" style="width: 100%; height: 500px;"></div>                                                 
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div id="chart_div_reg" style="width: 100%; height: 500px;"></div>                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
	<!-- <div class="row">		
		<div class="col-md-12 col-sm-12">
			<div class="head">
				<div class="line"></div>
				<div class="ribbonHeadCenter">
					<h1>Protected Area Dashboard<br>Regional</h1>
					<?php echo form_input('idreg',$prov,'id="idreg" class="hide"'); ?>
					<div class="row">
					    <div class="col-sm-12">
					        <div class="card">
					            <div class="card-content card-cover">
					                <div class="row">
					                    <div class="col-sm-6">
					                        <div id="donutchart">
											  	<div id="chartRegPA"></div>
											  	<div id="labelOverlay1">
											    	<p class="used-size1">
											    		<?php
											    			foreach ($totalpasreg as $data) {
											    				echo $data->totalPA;
											    			}
											    		?>
											    	</p>
											    	<p class="total-size1">No. of PA</p>
											  	</div>
											</div>
					                    </div>
					                    <div class="col-sm-6">
					                        <div id="donutchart">
											  	<div id="charRegArea"></div>
											  	<div id="labelOverlay">
											    	<p class="used-size">
											    		<?php
											    			foreach ($totalareareg as $dataa) {
											    				echo nice_number($dataa->totalPAarea);
											    			}
											    		?>
											    	</p>
											    	<p class="total-size">Total Area(ha.)</p>
											  	</div>
											</div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					
			</div>
		</div>
	</div> -->
<?php
function nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n/1000000000000), 2).'TR';
        elseif ($n > 1000000000) return round(($n/1000000000), 2).'B';
        elseif ($n > 1000000) return round(($n/1000000), 2).'M';
        elseif ($n > 1000) return round(($n/1000), 2).'T';

        return number_format($n);
    }

?>
<script type="text/javascript">

	google.charts.load('current', {'packages':['corechart']});
    
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawchartpaRegion);
    google.charts.setOnLoadCallback(drawchartAreaRegion);
        
    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
     function drawchartpaRegion() {
        var regions = $('#idreg').val();
        var jsonData = $.ajax({ 
            url: BASE_URL + 'home/count_chartTotalPARegion', 
            data:{regions:regions},
            // dataType: "json", 
            type: 'POST',
            async: false 
            }).responseText; 
               
          // Create our data table out of JSON data loaded from server. 
          var data = new google.visualization.DataTable(jsonData); 
          var options = {
            title: 'Total PA per province',
            hAxis: {
              title: 'Provinces',
              // format: 'h:mm a',
              viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
              }
            },
            vAxis: {
              title: 'Total PA',
              gridlines: { count: 4 }
            },
            colors: ['#339933'],
            legend: 'none',
            bar: { groupWidth: "50%" }
          };
          // Instantiate and draw our chart, passing in some options. 
          var chart_cat = new google.visualization.ColumnChart(document.getElementById('chart_div_pa_reg')); 
          chart_cat.draw(data, options); 
    } 
    
    function drawchartAreaRegion() {
        var regions = $('#idreg').val();
        var jsonData = $.ajax({ 
            url: BASE_URL + 'home/count_chartTotalAreaRegion', 
            data:{regions:regions},
            type: 'POST',
            async: false 
            }).responseText; 
               
          // Create our data table out of JSON data loaded from server. 
          var data = new google.visualization.DataTable(jsonData); 
          var options = {
            title: 'Total PA per province',
            hAxis: {
              title: 'Provinces',
              // format: 'h:mm a',
              viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
              }
            },
            vAxis: {
              title: 'Total area',
              gridlines: { count: 4 }
            },
            colors: ['#339933'],
            legend: 'none',
            bar: { groupWidth: "50%" }
          };
          // Instantiate and draw our chart, passing in some options. 
          var chart_cat = new google.visualization.ColumnChart(document.getElementById('chart_div_reg')); 
          chart_cat.draw(data, options); 
    }
</script>