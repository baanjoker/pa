<!-- <div class="container">	 -->
	<div class="row">
		<div class="col-md-12">
			<div class="header-stat">			
				<center><h1>STATISTICS</h1></center>
			</div>
			<div class="row">
			    <div class="col-sm-12">
			       	<div class="card">
			        	<div class="card-content card-cover">
			          		<div class="row">
			            		<div class="col-sm-4">
			              			<canvas id="chart-area" width="600" height="350"> </canvas>
			            		</div>
			            		<div class="col-sm-4">
			              			<canvas id="chart-class" width="600" height="350"> </canvas>
			            		</div>
			            		<div class="col-sm-4">
			              			<canvas id="chart-cpa" width="600" height="350"> </canvas>
			            		</div>
			          		</div>
			        	</div>
			      	</div>
			    </div>
			</div>
			<!-- <hr> -->
			<div class="row hidden">
			    <div class="col-sm-12">
			       	<div class="card">
			        	<div class="card-content card-cover">
			          		<div class="row">
			          			<div class="col-sm-6">
			              			<canvas id="chart-universe-land" width="600" height="350"> </canvas>
			            		</div>
			            		<div class="col-sm-6">
			              			<canvas id="chart-universe-water" width="600" height="350"> </canvas>
			            		</div>
			          		</div>
			          	</div>
			        </div>
			    </div>
			</div>
			<!-- <hr> -->
			 <div class="row">
			    <div class="col-sm-12">
			       	<div class="card">
			        	<div class="card-content card-cover">
			          		<div class="row">
			            		<div class="col-sm-12">
			              			<canvas id="barchart" width="600" height="200"> </canvas>
			            		</div>				            	
			          		</div>
			        	</div>
			      	</div>
			    </div>
			</div>
		</div>
	</div>
<!-- </div> -->
<script>

// **************** PIE CHART CATEGORY **************** //
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: <?php echo $result2; ?>,
                    backgroundColor: [
                        "rgba(255, 51, 0,0.7)",
                        "rgba(125, 198, 15, 0.7)",
                        "rgba(125, 47, 232, 0.7)",
                        "rgba(0, 77, 255,0.7)",
                        "rgba(255, 232, 25,0.7)",
                        "rgba(255, 119, 0,0.7)"
                        
                    ],
                    label: <?php echo $label2; ?>,
                }],
                labels: <?php echo $label2; ?>
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Categories',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
// **************** END OF PIE CHART CATEGORY **************** //

// **************** PIE CHART CLASSIFICATION **************** //
        var config_class = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: <?php echo $result3; ?>,
                    backgroundColor: [
                        "rgba(255, 51, 0,0.7)",
                        "rgba(125, 198, 15, 0.7)",
                        "rgba(125, 47, 232, 0.7)",
                        "rgba(0, 77, 255,0.7)",
                        "rgba(255, 232, 25,0.7)",
                        
                    ],
                    label: <?php echo $label3; ?>,
                }],
                labels: <?php echo $label3; ?>
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Classification',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
// **************** END OF PIE CHART CLASSIFICATION **************** //

// **************** PIE CHART CPA **************** //
        var config_cpa = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: <?php echo $result4; ?>,
                    backgroundColor: [
                        "rgba(255, 51, 0,0.7)",
                        "rgba(125, 198, 15, 0.7)",
                        "rgba(125, 47, 232, 0.7)",
                        "rgba(0, 77, 255,0.7)",
                        "rgba(255, 232, 25,0.7)",
                        "rgba(255, 119, 0,0.7)",
                        "rgba(128, 128,0 ,0.7)",
                        "rgba(255, 255,0,0.7)",
                        "rgba(0,128,128 ,0.7)",

                        
                    ],
                    label: <?php echo $label4; ?>,
                }],
                labels: <?php echo $label4; ?>
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Conservation Area',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
// **************** END OF PIE CHART CPA **************** //

// **************** BAR CHART **************** //
    var barChartData = {
        labels : <?php echo $label; ?>,
        datasets : [
            {
                label : 'Land Area',
                backgroundColor: "rgba(255, 51, 0,0.7)",
                fillColor:  "rgba(255, 51, 0,0.2)",
                strokeColor: "rgba(255, 51, 0,1)",
                pointColor:  "rgba(255, 51, 0,1)",
                pointStrokeColor: "#FFF",
                pointHighlightFill: "#FFF",
                pointHighlightStroke: "rgba(255, 51, 0,1)",
                data : <?php echo $result1; ?> 
            },
            {
                label : 'Sea Area',
                backgroundColor: "rgba(0, 102, 255,0.7)",
                fillColor:  "rgba(0, 102, 255,0.2)",
                strokeColor: "rgba(0, 102, 255,1)",
                pointColor:  "rgba(0, 102, 255,1)",
                pointStrokeColor: "#FFF",
                pointHighlightFill: "#FFF",
                pointHighlightStroke: "rgba(0, 102, 255,1)",
                data : <?php echo $resultm; ?>
            }
            
        ]

    }
    // Define a plugin to provide data labels
        // Chart.plugins.register({
        //     afterDatasetsDraw: function(chart) {
        //         var ctx = chart.ctx;

        //         chart.data.datasets.forEach(function(dataset, i) {
        //             var meta = chart.getDatasetMeta(i);
        //             if (!meta.hidden) {
        //                 meta.data.forEach(function(element, index) {
        //                     // Draw the text in black, with the specified font
        //                     ctx.fillStyle = 'rgb(0, 0, 0)';

        //                     var fontSize = 16;
        //                     var fontStyle = 'normal';
        //                     var fontFamily = 'Helvetica Neue';
        //                     ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

        //                     // Just naively convert to string for now
        //                     var dataString = dataset.data[index].toString();
        //                     // var dataString = dataset.data[index].toString();

        //                     // Make sure alignment settings are correct
        //                     ctx.textAlign = 'center';
        //                     ctx.textBaseline = 'middle';

        //                     var padding = 5;
        //                     var position = element.tooltipPosition();
        //                     ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
        //                 });
        //             }
        //         });
        //     }
        // });
// **************** END BAR CHART **************** //

// **************** Land Universe Pie Chart **************** //
        var config_land = {
            type: 'pie',
            data: {
                datasets: [{
                    data: <?php echo $result5; ?>,
                    backgroundColor: [
                        "rgba(255, 51, 0,0.7)",
                        "rgba(125, 198, 15, 0.7)",
                        "rgba(125, 47, 232, 0.7)",
                        "rgba(0, 77, 255,0.7)",
                        "rgba(255, 232, 25,0.7)",
                        "rgba(255, 119, 0,0.7)",
                        "rgba(128, 128,0 ,0.7)",
                        "rgba(255, 255,0,0.7)",
                        "rgba(0,128,128 ,0.7)",

                        
                    ],
                    label: <?php echo $label5; ?>,
                }],
                labels: <?php echo $label5; ?>
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Percentage of total Protected Area versus total land area of the Philippines',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
// **************** END OF Land Universe Pie Chart **************** //

// **************** Water Universe Pie Chart **************** //
        var config_water = {
            type: 'pie',
            data: {
                datasets: [{
                    data: <?php echo $result6; ?>,
                    backgroundColor: [
                        "rgba(255, 51, 0,0.7)",
                        "rgba(0, 102, 255,0.7)",
                        "rgba(125, 47, 232, 0.7)",
                        "rgba(0, 77, 255,0.7)",
                        "rgba(255, 232, 25,0.7)",
                        "rgba(255, 119, 0,0.7)",
                        "rgba(128, 128,0 ,0.7)",
                        "rgba(255, 255,0,0.7)",
                        "rgba(0,128,128 ,0.7)",

                        
                    ],
                    label: <?php echo $label6; ?>,
                }],
                labels: <?php echo $label6; ?>
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Percentage of total Protected Area versus total sea area of the Philippines',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
// **************** END OF Water Universe Pie Chart **************** //

        window.onload = function() {
            var ctxs = document.getElementById('chart-area').getContext('2d');
            window.myDoughnut = new Chart(ctxs, config);

            var ctxc = document.getElementById('chart-class').getContext('2d');
            window.myDoughnut = new Chart(ctxc, config_class);

            var ctxa = document.getElementById('chart-cpa').getContext('2d');
            window.myDoughnut = new Chart(ctxa, config_cpa);

            var ctxla = document.getElementById('chart-universe-land').getContext('2d');
            window.myDoughnut = new Chart(ctxla, config_land);

            var ctxwa = document.getElementById('chart-universe-water').getContext('2d');
            window.myDoughnut = new Chart(ctxwa, config_water);

            var ctx = document.getElementById('barchart').getContext('2d');
            window.myHorizontalBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each horizontal bar to be 2px wide
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                        }
                    },
                    responsive: true,
                    // legend: {
                    //     position: 'top',
                    // },
                    title: {
                        display: true,
                        text: 'Percentage of Protected Areas Land and Sea Area per Region',
                        fontSize:30
                    }
                }
            });

        };
    </script>