<?php 
$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
$this->output->set_header('Pragma: no-cache');
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0, shink-to-fit=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta content="IE-edge, chrome=1" http-equiv="X-UA-Compatible">
	<link rel="shortcut icon" href="<?php echo (!empty($webSetting->favicon)?base_url('bmb_assets2/img/website/favicon/'.$webSetting->favicon):base_url('bmb_assets2/img/website/favicon/favicon.ico/'.$webSetting->favicon)) ?>"/>
	<title><?php echo $webSetting->title ?> - <?php echo (!empty($page_title)?$page_title:null) ?> </title>
    <link rel="stylesheet" href="<?= base_url('bmb_assets2/carousel/dist/assets/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('bmb_assets2/carousel/dist/assets/owl.theme.default.min.css') ?>">
	<link href="<?= base_url('bmb_assets2/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('bmb_assets2/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('bmb_assets2/css/style.css') ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url ('assets/chart273/dist/Chart.bundle.js') ?>"></script>
    <script src="<?php echo base_url();?>assets/fullcalendar/lib/jquery.min.js"></script>
    <script src="<?= base_url('bmb_assets2/carousel/dist/owl.carousel.min.js') ?>" type="text/javascript"></script>  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="<?= base_url('assets/dist/js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.css" media="screen"/>
    <script src="<?php echo base_url();?>assets/fullcalendar/lib/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url();?>assets/fullcalendar/gcal.js"></script>
   
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url();?>";
    </script>
    <script type="text/javascript">
$(document).ready(function(){
    var maxLength = 300;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});
</script>
<style type="text/css">
    .show-read-more .more-text{
        display: none;
    }
</style>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      // google.charts.setOnLoadCallback(drawChartlistPA);
      // google.charts.setOnLoadCallback(drawChartPAarea);
      // google.charts.setOnLoadCallback(drawChartPTerestrial);
      // google.charts.setOnLoadCallback(drawChartMarine);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
    //   function drawChartlistPA() {
    //   var jsonData = $.ajax({ 
    //       url: "<?php echo base_url() . '/home/count_chartTotalPA' ?>", 
    //       dataType: "json", 
    //       async: false 
    //       }).responseText; 
           
    //   // Create our data table out of JSON data loaded from server. 
    //   var data = new google.visualization.DataTable(jsonData); 
    //   var options = {
    //     legend:{position: 'labeled'},       
    //     height: '500',
    //     // pieSliceText: 'percentage',
    //     backgroundColor: {stroke:'black', fill:'transparent',strokeSize: 1},
    //     title: 'Total no. of protected area per region',
    //     pieHole: 0.5,
    //     pieSliceText: 'label',
    //     fontSize:18,
    //     chartArea: {
    //         left: "0",
    //         top: "100",
    //         right: "0",
    //         bottom: 9,
    //         height: "100%",
    //         width: "100%",    
    //     },
    //     tooltip: {
    //         trigger:'display'
    //     },
    //     legend: 'none',
    // };
    //   // Instantiate and draw our chart, passing in some options. 
    //   var chart_category = new google.visualization.PieChart(document.getElementById('chart_div')); 
    //   chart_category.draw(data, options); 
    // } 

    // function drawChartPAarea() {
    //   var jsonData = $.ajax({ 
    //       url: "<?php echo base_url() . '/home/count_chartTotalArea' ?>", 
    //       dataType: "json", 
    //       async: false 
    //       }).responseText; 
           
    //   // Create our data table out of JSON data loaded from server. 
    //   var data = new google.visualization.DataTable(jsonData); 
    //   var options = {
    //     legend:{position: 'labeled',},
    //     fontSize:18,
    //     // width: '800',
    //     height: '500',
    //     // pieSliceText: 'percentage',
    //     backgroundColor: {stroke:'black', fill:'transparent',strokeSize: 1},
    //     title: 'Total area(ha) per region',
    //     pieHole: 0.5,
    //     pieSliceText: 'label',
    //     chartArea: {
    //         left: "0",
    //         top: "100",
    //         right: "0",
    //         bottom: 9,
    //         height: "100%",
    //         width: "100%", 
    //     },
    //     tooltip: {
    //         trigger:'display'
    //     },
    //     legend: 'none',
    // };
    //   // Instantiate and draw our chart, passing in some options. 
    //   var chart_category = new google.visualization.PieChart(document.getElementById('chart_div_area')); 
    //   chart_category.draw(data, options); 
    // } 

    // function drawChartPTerestrial() {
    //   var jsonData = $.ajax({ 
    //       url: "<?php echo base_url() . '/home/count_chart_Land' ?>", 
    //       dataType: "json", 
    //       async: false 
    //       }).responseText; 
           
    //   // Create our data table out of JSON data loaded from server. 
    //   var data = new google.visualization.DataTable(jsonData); 
    //   var options = {
    //     legend:{position: 'labeled',},
    //     height: '500',
    //     // pieSliceText: 'percentage',
    //     backgroundColor: {stroke:'black', fill:'transparent',strokeSize: 1},
    //     title: 'Coverage of protected areas in relation to terrestrial areas (%)',
    //     titleTextStyle : {fontSize:'18'},
    //     // pieHole: 0.5,
    //     pieSliceText: 'percentage',
    //     chartArea: {
    //         left: "0",
    //         top: "80",
    //         right: "0",
    //         bottom: 80,
    //         height: "100%",
    //         width: "100%", 
    //     },
    //     slices: {  1: {offset: 0.2}},
    //     // sliceVisibilityThreshold: .2,
    //     tooltip: {
    //         trigger:'display'
    //     },
    //     colors: ['#ff6699','#33cc33'],

    //     legend: {position: 'top'},
    //     // legend: 'none',
    // };
    //   // Instantiate and draw our chart, passing in some options. 
    //   var chart_category = new google.visualization.PieChart(document.getElementById('chart_land')); 
    //   chart_category.draw(data, options); 
    // } 

    // function drawChartMarine() {
    //   var jsonData = $.ajax({ 
    //       url: "<?php echo base_url() . '/home/count_chart_Marine' ?>", 
    //       dataType: "json", 
    //       async: false 
    //       }).responseText; 
           
    //   // Create our data table out of JSON data loaded from server. 
    //   var data = new google.visualization.DataTable(jsonData); 
    //   var options = {
    //     legend:{position: 'labeled',},
    //     height: '500',
    //     // pieSliceText: 'percentage',
    //     backgroundColor: {stroke:'black', fill:'transparent',strokeSize: 1},
    //     title: 'Coverage of protected areas in relation to marine areas (%)',
    //     titleTextStyle : {fontSize:'18'},
    //     // pieHole: 0.5,
    //     pieSliceText: 'percentage',
    //     chartArea: {
    //         left: "0",
    //         top: "80",
    //         right: "0",
    //         bottom: 80,
    //         height: "100%",
    //         width: "100%", 
    //     },
    //     slices: {  1: {offset: 0.2}},
    //     tooltip: {
    //         trigger:'display'
    //     },
    //     colors: ['#ff6699','#0066ff'],
    //     legend: {position: 'top'},
    // };
    //   // Instantiate and draw our chart, passing in some options. 
    //   var chart_category = new google.visualization.PieChart(document.getElementById('chart_marine')); 
    //   chart_category.draw(data, options); 
    // } 

    </script>

    <script type="text/javascript">
    // var barChartData = {
    //     labels : <?php echo $labelregion; ?>,
    //     datasets : [
    //         {
    //             label : 'Land Area',
    //             backgroundColor: "rgba(255, 51, 0,0.7)",
    //             fillColor:  "rgba(255, 51, 0,0.2)",
    //             strokeColor: "rgba(255, 51, 0,1)",
    //             pointColor:  "rgba(255, 51, 0,1)",
    //             pointStrokeColor: "#FFF",
    //             pointHighlightFill: "#FFF",
    //             pointHighlightStroke: "rgba(255, 51, 0,1)",
    //             data : <?php echo $result1; ?> 
    //         },
    //         {
    //             label : 'Sea Area',
    //             backgroundColor: "rgba(0, 102, 255,0.7)",
    //             fillColor:  "rgba(0, 102, 255,0.2)",
    //             strokeColor: "rgba(0, 102, 255,1)",
    //             pointColor:  "rgba(0, 102, 255,1)",
    //             pointStrokeColor: "#FFF",
    //             pointHighlightFill: "#FFF",
    //             pointHighlightStroke: "rgba(0, 102, 255,1)",
    //             data : <?php echo $resultm; ?>
    //         }
            
    //     ]

    // }    
    function nullToZero(array) {
      return array.map(function(v) { 
        if (v==null) return 0; else return v;
      });
    }
    // window.onload = function() {
    // var ctx1 = document.getElementById('visitors_barchart').getContext('2d');
    //             window.myHorizontalBar = new Chart(ctx1, {
    //                 type: 'bar',
    //                 data: barChartData,
    //                 options: {
    //                     // Elements options apply to all of the options unless overridden in a dataset
    //                     // In this case, we are setting the border of each horizontal bar to be 2px wide
    //                     elements: {
    //                         rectangle: {
    //                             borderWidth: 2,
    //                         }
    //                     },
    //                     responsive: true,
    //                     legend: {
    //                         position: 'top',
    //                     },
    //                     title: {
    //                         display: true,
    //                         text: 'Percentage of Protected Areas Land and Sea Area per Region',
    //                         fontSize:30
    //                     },
                        
    //                 }
    //             });

    //         };
    </script>
</head>
<body class="hold-transition login-page sky">

<?php @$this->load->view('include/header') ?>
<?php echo (!empty($content)?$content:null) ?>	
<?php @$this->load->view('include/footer') ?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->   
    <!-- <script src="<?= base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script> -->
    <script src="<?= base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('bmb_assets2/sliderengine/amazingslider.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('bmb_assets2/sliderengine/initslider-1.js') ?>" type="text/javascript"></script>   
    <script type="text/javascript" src="<?php echo base_url("jquery/home.js") ?>"></script>
    
    
</body>
</html>