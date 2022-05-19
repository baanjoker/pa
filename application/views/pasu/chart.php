<section class="content-header">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <center><h2>Protected Area</h2></center>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-content">
          <form method="post" class="form-inline" action="<?php echo base_url()?>pasu/dashboard/income">
          <div class="row">
            <div class="col-sm-3">
              <label>Select first year</label>
                <select name="yearOne" class="form-control border-input"> 
                  <?php
                    foreach ($year as $th) {
                      echo "<option value='" .$th->year. "'>" . $th->year . "</option>";
                    }
                  ?>
                </select>
              </div>
          
              <div class="col-sm-3">
                <label>Select second year</label>
                <select name="yearTwo" class="form-control border-input">
                  <?php
                    foreach ($year as $th) {
                      echo "<option value='" .$th->year. "'>" . $th->year . "</option>";
                    }
                  ?>        
                </select>
              </div>
               <div class="col-sm-3">
                <label></label>
                <input class="btn btn-success" type="submit" value="Compare" />
               </div>
            </div>
          </form>
        </div>
      </div>
    </div> 
  </div>
  Showing comparative earnings for <strong> <?php echo $one;?> </strong> and <strong><?php echo $two;?> </strong><br/>

  <div class="row">
    <div class="col-sm-12">
       <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col-sm-9">
              <canvas id="demoChart" width="600" height="350"> </canvas>
            </div>
            <div class="col-sm-3">
              <div id="demoLegend"> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
         
         
        var data = {
            labels: <?php echo $label; ?>,
            datasets: [
                {
                    label: "Select earnings: " + <?php echo $one;?>,
                    fillColor:  "rgba(255, 51, 0,0.2)",
                    strokeColor: "rgba(255, 51, 0,1)",
                    pointColor:  "rgba(255, 51, 0,1)",
                    pointStrokeColor: "#FFF",
                    pointHighlightFill: "#FFF",
                    pointHighlightStroke: "rgba(255, 51, 0,1)",
                    data: <?php echo $result1; ?>
                },
                {
                    label: "Select earnings: " + <?php echo $two;?>,
                    fillColor:  "rgba(51, 153, 255,0.2)",
                    strokeColor: "rgba(51, 153, 255,1)",
                    pointColor:  "rgba(51, 153, 255,1)",
                    pointStrokeColor: "#FFF",
                    pointHighlightFill: "#FFF",
                    pointHighlightStroke: "rgba(51, 153, 255,1)",
                    data: <?php echo $result2; ?>
                }
            ],
            options: {
            legend: {
                display: false
                },
            tooltips: {
               mode: 'label',
               label: 'mylabel',
               callbacks: {
                   label: function(tooltipItem, data) {
                       return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); }, },
            },
            scales: {
                yAxes: [{
                    ticks: {
                        callback: function(value, index, values) {
                        return '₱' + number_format(value);
                      },
                        beginAtZero:true,
                        fontSize: 10,
                    },
                    gridLines: {
                        display: false
                    },
                    scaleLabel: { 
                        display: true,
                        labelString: '000\'s',
                        fontSize: 10,
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontSize: 10
                    },
                    gridLines: {
                        display:false
                    },
                    scaleLabel: {
                        display: true,
                        fontSize: 10,
                   }
                }]
            }
        }
        };

        var ctx = document.getElementById("demoChart").getContext("2d");
        var chart = new Chart(ctx).Line(data);
        document.getElementById("demoLegend").innerHTML = chart.generateLegend();
    </script>