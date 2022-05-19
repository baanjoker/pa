<!-- <embed src="http://padatabasealpha.biodiversity3.synology.me/pa" style="width:500px; height: 300px;"> -->
		<div class="owl-carousel owl-theme">
			<?php foreach ($webslide as $slide) { ?>		    
		    <div class="item"><img src="<?php echo base_url().'bmb_assets2/img/website/slider/'.$slide->image ?>"/>
		    	<h2 class="owl-slide-animated owl-slide-title"><?php echo $slide->title; ?></h2>
		    	<p class="owl-slide-animated owl-slide-description"><?php echo $slide->remarks; ?></p>
		    </div>
		    <?php } ?>
		</div>
	<div class="row">		
		<div class="col-md-12 col-sm-12">			
			<div class="head">
				<div class="line"></div>
			    <div class="headerobjectswrapper">
			    </div>
			    <div class="col-md-12 col-lg-12">
					<div class="ribbonHeadCenter">
						<h1>Protected Area Dashboard<br>National</h1>						
			            <div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="col-sm-12">
									<div class="panel panel-primary">
						            	<div class="panel-heading">
						             		<h3 class="panel-title">Total no. of Protcted Area</h3>
						            	</div>
							            <div class="panel-body">
							              <!-- <h2><center><?php echo $countpa; ?></center></h2> -->
							              <h2><center>244</center></h2>
							            </div>
						          	</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-danger">
						            	<div class="panel-heading">
						             		<h3 class="panel-title"><center>Proclaimed PAs</center></h3>
						            	</div>
							            <div class="panel-body">
							              <h2><center><?php
							              foreach ($proccount->result() as $row)
												{
												    // echo $row->legis;
												    echo "13";
												}
							                ?></center></h2>
							            </div>
						          	</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-info">
						            	<div class="panel-heading">
						             		<h3 class="panel-title"><center>Legislated PAs</center></h3>
						            	</div>
							            <div class="panel-body">
							              <h2><center><?php
							              foreach ($proccount2->result() as $row)
												{
												    echo "107";
												    // echo $row->legis;
												}
							                ?></center></h2>
							            </div>
						          	</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-success">
						            	<div class="panel-heading">
						             		<h3 class="panel-title"><center>Initial Component</center></h3>
						            	</div>
							            <div class="panel-body">
							              <h2><center><?php
							              foreach ($proccount3->result() as $row)
												{
												    // echo $row->legis;
												    echo "124";
												}
							                ?></center></h2>
							            </div>
						          	</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">								
								<div class="col-sm-12 col-md-12">
									<table id="tblpadisplay" class="content-table">
										<thead>
											<tr>
												<th colspan="3">No. of Protected Area by Region</th>
											</tr>
											<tr>
												<th>Region</th>
												<th>No. of PAs</th>
												<th></th>
											</tr>
										</thead>
	                        			<tbody id="tbodydashboardpa"></tbody>
									</table>
								<i>Note: This is a realtime data. Count is based on the data encoded on PA System.</i>
								</div>
								<div class="col-sm-12 col-md-7 hide">
							       	<div class="card">
							        	<div class="card-content card-cover">
							          		<div class="row">
							            		<div class="chart-area">
							                        <canvas id="chart-area" width="600" height="350"></canvas>
							                    </div>
							          		</div>
							        	</div>
							      	</div>
							      	<div class="card">
							        	<div class="card-content card-cover">
							          		<div class="row">
							            		<div class="chart-area">
							                        <canvas id="chart-income" width="600" height="350"></canvas>
							                    </div>
							          		</div>
							        	</div>
							      	</div>
								</div>
							</div>
			             <div class="row">
			                <div class="col-sm-12 col-lg-12">
			                    <div class="row">
			                        <div class="col-sm-12 col-lg-6">
			            				<div id="chart_div_pa" style="width: 100%; height: 500px;"></div>												  
			                        </div>
			                        <div class="col-sm-12 col-lg-6">
			            				<div id="chart_div" style="width: 100%; height: 500px;"></div>												  
			                        </div>
			                    </div>
			                </div>
			            </div>
			          	<div class="row">
			          		<div class="col-lg-12 col-sm-12">
			          			<div class='container'>
									<div class="row-div">
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:200px;background: #ff704d">
									        <h3 class="text-center">
									            Philippine Land Area
									        </h3>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:260px;background: #ffd6cc">
									        <p class="text-center">
									           	30,000,000 has
									        </p>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:200px;background: #ff704d">
									        <h3 class="text-center">
									            Terrestrial Protected Area 
									        </h3>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:260px;background: #ffd6cc">
									        <p class="text-center">
									            4,619,899.55 has
									        </p>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:300px;background: #e6e6e6">
									        <h3 class="text-center">
									            Coverage of protected areas in relation to 15.40% terrestrial area
									        </h3>
									  	</div>
									</div>
								</div>
			          		</div>
			          		<div class="col-lg-12 col-sm-12">
			          			<div class='container'>
									<div class="row-div">
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:200px;background: #0088cc">
									        <h3 class="text-center">
									            Philippine Marine Area
									        </h3>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:260px;background: #80d4ff">
									        <p class="text-center">
									           	220,644,600 has
									        </p>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:200px;background: #0088cc">
									        <h3 class="text-center">
									            Marine Protected Area 
									        </h3>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:260px;background: #80d4ff">
									        <p class="text-center">
									            3,143,559.11
									        </p>
									  	</div>
									  	<div class="col-md-12 col-sm-12 thumbnail" style="width:300px;background: #e6e6e6">
									        <h3 class="text-center">
									            Coverage of protected areas in relation to 1.42% marine areas 
									        </h3>
									  	</div>
									</div>
								</div>
			          		</div>
			          	</div>
			          	<div class="row">			                
			                <div class="col-sm-12 col-lg-12">
			                	<!-- <button id="change-chart">Change to Classic</button> -->
			            		<div id="chart_div_income" style="width: 100%; height: 500px;"></div>												  
			                </div>			                    
			            </div>
			             <div class="row">
			                <div class="col-sm-12 col-lg-12">
			                    <div class="row">
			                        <div class="col-sm-12 col-lg-6">
			            				<div id="chart_div_visitor" style="width: 100%; height: 500px;"></div>												  
			                        </div>
			                        <div class="col-sm-12 col-lg-6">
			            				<div id="chart_visitor_sex" style="width: 100%; height: 500px;"></div>												  
			                        </div>
			                    </div>
			                </div>
			            </div>

			            <div class="row">			                
			                <div class="col-sm-12 col-lg-12">
			                	<div class="row">
			                        <div class="col-sm-12 col-lg-6">
			            				<div id="chart_visitor_category" style="width: 100%; height: 500px;"></div>	
			            			</div>
			            			<div class="col-sm-12 col-lg-6">
			            				<div id="chart_visitor_category2" style="width: 100%; height: 500px;"></div>	
			            			</div>
			            		</div>											  
			                </div>			                    
			            </div>
						<!-- <div class="row">
						    <div class="col-md-4">
								<div class="table-responsive">
									<table class="table table-hover">                
						                <thead>                  
						                     <tr class="not">       
						                        <th>Location</th>
						                        <th>Protected Area</th>                                     
						                    </tr>
						                </thead>
						                <tbody> 
						                	<?php foreach ($location as $region): ?>
						                	<tr>            
						                        <td colspan="2" class="regclass"><?php echo $region->reg; ?></td>                  
						                    </tr> 		                	

						                     <?php foreach ($paname as $name): ?>
						                	<tr>
						                		<?php if ($region->reg == $name->reg): ?> 
						                		<td><?php echo $name->locprov." "; ?></td>           
						                        <td><a href="<?= base_url('home/info/'.$name->generatedcode) ?>"><?php echo $name->pa_name." "; ?></a></td>                  
						                    </tr> 
						                	<?php endif; endforeach ?>  
						                	<?php endforeach ?> 
						                </tbody>
						            </table>
								</div>
							</div>
				      	</div> -->
						
			    	</div>
			    	
			    </div>

			  <!--   <div class="subhead">
			    	<div class="table-responsive">
						<table class="table table-hover">                
			                <thead>                  
			                     <tr class="not">       
			                        <th>Location</th>
			                        <th>Protected Area</th>                                     
			                    </tr>
			                </thead>
			                <tbody> 
			                	<?php foreach ($location as $region): ?>
			                	<tr>            
			                        <td colspan="2" class="regclass"><?php echo $region->reg; ?></td>                  
			                    </tr> 		                	

			                     <?php foreach ($paname as $name): ?>
			                	<tr>
			                		<?php if ($region->reg == $name->reg): ?> 
			                		<td><?php echo $name->locprov." "; ?></td>           
			                        <td><a href="<?= base_url('home/info/'.$name->generatedcode) ?>"><?php echo $name->pa_name." "; ?></a></td>                  
			                    </tr> 
			                	<?php endif; endforeach ?>  
			                	<?php endforeach ?> 
			                </tbody>
			            </table>
					</div>
			    </div> -->
			</div>
		</div>
		<!-- <div class="col-lg-3 col-sm-12">
			<div class="ribbonHead">
				<h1>Projects</h1>
				<?php foreach ($webproject as $proj): ?>
				<p><a href="#"><?php echo $proj->title; ?></a></p>
				<?php endforeach; ?>						
			</div>			
			<div class="ribbonHead">
				<h1>Information Graphics </h1>
				<a href="<?= base_url('infographic') ?>"><img src="<?php echo base_url('bmb_assets2/img/infographics.png') ?>" class="ribbonImage"></a>		
			</div>
			<div class="ribbonHead">
				<h1>Quick Links </h1>
				<a href="<?= base_url('login') ?>" target="_blank"><img src="<?php echo base_url('bmb_assets2/img/padis.png') ?>" class="ribbonImage"></a>		
			</div>
		</div>	 -->	
		<div class="row hide">
			                <div class="col-sm-12">
			                    <div class="card">
			                        <div class="card-content card-cover">
			                            <div class="row">
			                                <div class="col-sm-12">
												  <canvas id="visitors_barchart"  width="600" height="200" class=""></canvas>
			                                </div>
			                                <div class="col-sm-6">
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>	
	</div>
</div>
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
         // $(".owl-carousel").owlCarousel({
         //    navigation : true
         //  });
         var owl = $('.owl-carousel');
owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    autoHeight: false,
    autoHeightClass: 'owl-height',animateOut: 'fadeOut'
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[5000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>
<script type="text/javascript">
	// **************** LINE CHART CATEGORY **************** //
// $.ajax({
//       // url : BASE_URL+'/pasu/dashboard/annualgraphdisplay',
//       type : 'POST',
//       dataType : 'JSON',
//       // data : {year : year, year2 : year2, pa : pa},
//       success : function(data)
//         {
// 	 var config = {
//             type: 'line',
//           //   data: {
//           //   labels: ["2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020"],
//           //   // labels: data.messageyear,
//           //   datasets: [{
//           //     label: 'Annual Income',
//           //     lineTension: 0.3,
//           //     backgroundColor: "rgba(255, 255, 255, 0.25)",
//           //     borderColor: "rgba(255, 153, 102, 1)",
//           //     pointRadius: 3,
//           //     pointBackgroundColor: "rgba(78, 115, 223, 1)",
//           //     pointBorderColor: "rgba(78, 115, 223, 1)",
//           //     pointHoverRadius: 3,
//           //     pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
//           //     pointHoverBorderColor: "rgba(78, 115, 223, 1)",
//           //     pointHitRadius: 10,
//           //     pointBorderWidth: 2,
//           //     data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
//           //     // data : data.messageamount,
//           //   }],
//           // },

//           data: {
// 				 labels: ["2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020"],
// 				datasets: [{
// 					label: 'Annual Income',
// 					backgroundColor: "rgba(255, 255, 255, 0.25)",
// 					borderColor: "rgba(255, 153, 102, 1)",
// 					data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
// 					fill: false,
// 				}, {
// 					label: 'Annual Visitors',
// 					fill: false,
// 					backgroundColor: "rgba(78, 115, 223, 1)",
// 					borderColor: "rgba(78, 115, 223, 1)",
// 					data: [500, 4000, 3000, 8000, 15000, 3500, 6500, 4300, 10000, 2650, 3500, 4500],
// 				}]
// 			},
//             options: {
//                 responsive: true,
//                 legend: {
//                     position: 'right',
//                 },
//                 title: {
//                     display: true,
//                     text: 'Annual Income and Visitors',
//                     fontSize:30
//                 },
//                 animation: {
//                     animateScale: true,
//                     animateRotate: true
//                 }
//             }
//         };
//         },
//     error : function()
//     {
//       alert('failed');
//     }
//    });

$(document).ready(function(){
	$.ajax({
      url : BASE_URL+'/home/annualgraphdisplaHome',
      type : 'POST',
      dataType : 'JSON',
      success : function(data)
        {
        var ctx = document.getElementById("chart-area").getContext("2d");
        if(window.line != undefined) 
        window.line.destroy();

        window.line = new Chart(ctx, {   

        onAnimationComplete: function () {

          var ctx = this.chart.ctx;
          ctx.font = this.scale.font;
          ctx.fillStyle = this.scale.textColor
          ctx.textAlign = "center";
          ctx.textBaseline = "bottom";

          this.datasets.forEach(function (dataset) {
              dataset.points.forEach(function (points) {
                  ctx.fillText(points.value, points.x, points.y - 10);
              });
          })
        },  
          type: 'line',
          data: {
            labels: data.messageyear,
            datasets: [{
              label: 'Annual Income',
             backgroundColor: "rgba(255, 255, 255, 0.25)",
				borderColor: "rgba(255, 153, 102, 1)",
				data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
				fill: false,
              data : data.messageamount,
            }],
            datasets: [{
              label: 'Total Visitors',
              lineTension: 0.3,
              backgroundColor: "rgba(255, 255, 255, 0.25)",
              borderColor: "rgba(255, 153, 102, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data : data.messagetotalvisitor,
            }],
          },

          options: {
          	 responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Annual Visitors',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
          }
        });
    },
    error : function()
    {
      alert('failed');
    }
  });
});


$(document).ready(function(){
	$.ajax({
      url : BASE_URL+'/home/annualgraphdisplaHomeIncome',
      type : 'POST',
      dataType : 'JSON',
      success : function(data)
        {
        var ctx = document.getElementById("chart-income").getContext("2d");
        if(window.line2 != undefined) 
        window.line2.destroy();

        window.line2 = new Chart(ctx, {   

        onAnimationComplete: function () {

          var ctx = this.chart.ctx;
          ctx.font = this.scale.font;
          ctx.fillStyle = this.scale.textColor
          ctx.textAlign = "center";
          ctx.textBaseline = "bottom";

          this.datasets.forEach(function (dataset) {
              dataset.points.forEach(function (points) {
                  ctx.fillText(points.value, points.x, points.y - 10);
              });
          })
        },  
          type: 'line',
          data: {
            labels: data.messageyear,
            datasets: [{
              label: 'Annual Income',
             backgroundColor: "rgba(255, 255, 255, 0.25)",
				borderColor: "rgba(255, 153, 102, 1)",
				data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
				fill: false,
              data : data.messageamount,
            }],
            datasets: [{
              label: 'Total Visitors',
              lineTension: 0.3,
              backgroundColor: "rgba(255, 255, 255, 0.25)",
              borderColor: "rgba(255, 153, 102, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data : data.messageamount,
            }],
          },

          options: {
          	 responsive: true,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Annual Income',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
          }
        });
    },
    error : function()
    {
      alert('failed');
    }
  });
});

// $(document).ready(function(){
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
                    text: 'Coverage of protected areas in relation to land areas (%)',
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
                    text: 'Coverage of protected areas in relation to marine areas (%)',
                    fontSize:30
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };

// });
// window.onload = function() {
// 	var ctxla = document.getElementById('chart-universe-land').getContext('2d');
//     window.myDoughnut = new Chart(ctxla, config_land);
//     var ctxwa = document.getElementById('chart-universe-water').getContext('2d');
//     window.myDoughnut = new Chart(ctxwa, config_water);
// }

</script>

<script type="text/javascript">
    var barChartData = {
        labels : <?php echo $labelregion; ?>,
        datasets : [
            {
                label : 'Local Male',
                backgroundColor: "rgba(255, 51, 0,0.7)",
                fillColor:  "rgba(255, 51, 0,0.2)",
                strokeColor: "rgba(255, 51, 0,1)",
                pointColor:  "rgba(255, 51, 0,1)",
                pointStrokeColor: "#FFF",
                pointHighlightFill: "#FFF",
                pointHighlightStroke: "rgba(255, 51, 0,1)",
                data : <?php echo $resultbb1; ?> 
            },
            {
                label : 'Local Female',
                backgroundColor: "rgba(0, 102, 255,0.7)",
                fillColor:  "rgba(0, 102, 255,0.2)",
                strokeColor: "rgba(0, 102, 255,1)",
                pointColor:  "rgba(0, 102, 255,1)",
                pointStrokeColor: "#FFF",
                pointHighlightFill: "#FFF",
                pointHighlightStroke: "rgba(0, 102, 255,1)",
                data : <?php echo $resultbb2; ?>
            },
            {
                label : 'Foreign Male',
                backgroundColor: "rgba(153, 102, 255,0.7)",
                fillColor:  "rgba(0, 102, 255,0.2)",
                strokeColor: "rgba(0, 102, 255,1)",
                pointColor:  "rgba(0, 102, 255,1)",
                pointStrokeColor: "#FFF",
                pointHighlightFill: "#FFF",
                pointHighlightStroke: "rgba(0, 102, 255,1)",
                data : <?php echo (!empty($resultbb3)?$resultbb3:null); ?>
            },
            {
                label : 'Foreign Female',
                backgroundColor: "rgba(255, 204, 102,0.7)",
                fillColor:  "rgba(0, 102, 255,0.2)",
                strokeColor: "rgba(0, 102, 255,1)",
                pointColor:  "rgba(0, 102, 255,1)",
                pointStrokeColor: "#FFF",
                pointHighlightFill: "#FFF",
                pointHighlightStroke: "rgba(0, 102, 255,1)",
                data : <?php echo (!empty($resultbb4)?$resultbb4:null); ?>
            }
            
        ]

    }
    // Define a plugin to provide data labels
        
    window.onload = function() {
    var ctxb = document.getElementById('visitors_barchart').getContext('2d');
                window.myHorizontalBar = new Chart(ctxb, {
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
                        legend: {
                            position: 'bottom',

                        },
                        title: {
                            display: true,
                            text: 'Total number of visitors per Region',
                            fontSize:30
                        },
                        scales: {
							xAxes: [{
								stacked: true,
							}],
							yAxes: [{
								stacked: true,
							ticks: {
					          beginAtZero: true,
					          callback: function(value) {if (value % 1 === 0) {return value;}}
					        }
							}]
						},
						plugins: {
                            datalabels: {
                                display: false,
                                align: 'center',
                                anchor: 'center'
                            }
                        }
                    }
                });

            };
    </script>