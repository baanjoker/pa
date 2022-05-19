$(document).ready(function() {
  fetchpacounts();
  fetchPAbyProvince();
  fetchPAbyProvince2();
  getTabImageTopo();
});
function fetchpacounts(){
	var codegen = $('#codegen').val();
    $.ajax({
        type: 'POST',
        url: BASE_URL + 'home/fetchpadisplay',
        success:function(response){
            $('#tbodydashboardpa').html(response);
        }
    });
}

function fetchPAbyProvince(){
  var regions = $('#provid').val();

    $.ajax({
        type: 'POST',
        url: BASE_URL + 'home/fetchpadisplaybyProvince',
        data:{regions:regions},
        success:function(response){
            $('#tbodydashboardpaProvince').html(response);
        }
    });
}

function fetchPAbyProvince2(){
  var paids = $('#paids').val();

    $.ajax({
        type: 'POST',
        url: BASE_URL + 'home/fetchpadisplayPAbyProvince',
        data:{paids:paids},
        success:function(response){
            $('#tbodyProtectedAreabyProv').html(response);
        }
    });
}

$(document).ready(function() {
  var code    =   document.getElementById("gencodespa").value;
  var calendar = $('#calendars').fullCalendar({
  displayEventTime: true,
  // defaultView: 'listWeek',
  events: {
    url: BASE_URL + 'home/fetcheventlist',
    type: 'POST',
    data: {code: code},
    error: function() {
      // alert('there was an error while fetching events!');
    },
    color: 'green',   // a non-ajax option
    textColor: 'white' // a non-ajax option    
  },
  eventClick:  function(event, jsEvent, view) {
      var startdate= new Date(event.start);
      var enddate= new Date(event.end);
      var starttime= new Date(event.startTime);
      var endtime= new Date(event.endTime);

      $('#modalTitle').html(event.title);
      $('#modalBody').html(event.desc);
      // $('#modalDate').html(event.start+"-"+event.end);
      $('#modalDatestart').html("Start Date and Time : "+moment(startdate.getTime()).format("DD-MM-YYYY/hh:mm A"));
      $('#modalDateend').html("End Date and Time : "+moment(enddate.getTime()).format("DD-MM-YYYY/hh:mm A"));
      // $('#eventUrl').attr('href',event.url);
      $('#calendarModal').modal();
  },

});
  calendar.fullCalendar('refetchEvents');
 
});

// $(document).ready(function() {
//   var code    =   document.getElementById("gencodespa").value;
//   $.ajax({
//         type: 'POST',
//         url: BASE_URL + 'home/trydisplat',
//         data:{code:code},
//         dataType : 'JSON',
//         success:function(calls){           
//             var calendar = $('#calendars').fullCalendar({
//              googleCalendarApiKey: calls.messageid,
//             events: {
//               googleCalendarId: calls.messageemail,
//               className: 'gcal-event' // an option!
//             }
  
//             });
//           calendar.fullCalendar('refetchEvents');
//         }
//     });
  
 
// });

google.charts.load('current', {packages: ['corechart', 'bar','line']});
google.charts.setOnLoadCallback(drawChartPA);
google.charts.setOnLoadCallback(drawChartPAareas);
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChartPAvisitors);
google.charts.setOnLoadCallback(drawChartPAvisitorsbySex);
google.charts.setOnLoadCallback(drawChartPAvisitorsbyCategory);
google.charts.setOnLoadCallback(drawChartPAvisitorsbyCategory2);

    function drawChartPA() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/count_chartTotalPA', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total PA per region',
        hAxis: {
          title: 'Regions',
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
      var chart_category = new google.visualization.ColumnChart(document.getElementById('chart_div_pa')); 
      chart_category.draw(data, options); 
    } 

    function drawChartPAareas() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/count_chartTotalArea', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total area(ha) per region',
        hAxis: {
          title: 'Regions',
          // format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Area(has)',
          format: 'short',
          gridlines: { count: 6 }
        },
        colors: ['#339933'],        
        legend: 'none',
      };
      var chart_category = new google.visualization.ColumnChart(document.getElementById('chart_div')); 
      chart_category.draw(data, options); 
    } 

    function drawChart() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/totalincomeperregionbyyear', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total Protected Area Income per Region (in Php) CY 2021',
        hAxis: {
          title: 'Regions',
          // format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Income',
          format: 'short',
          gridlines: { count: 6 }
        },
        legend: 'none',
      };
      var chart_category = new google.visualization.LineChart(document.getElementById('chart_div_income')); 
      chart_category.draw(data, options); 
    } 

    function drawChartPAvisitors() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/totalvisitorsperregionbyyear', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total Number of Visitors per Region (2021)',
        hAxis: {
          title: 'Regions',
          // format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'No. of Visitors',
          format: 'short',
          gridlines: { count: 4 }
        },
        legend: 'none',
      };
      var chart_category = new google.visualization.ColumnChart(document.getElementById('chart_div_visitor')); 
      chart_category.draw(data, options); 
    } 

    function drawChartPAvisitorsbySex() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/totalvisitorMalebyRegionperYear', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total Number of Visitors per Region by Sex (2021)',
        hAxis: {
          title: 'Regions',
          // format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'No. of Visitors',
          format: 'short',
          gridlines: { count: 4 }
        },
        colors: ['#0073e6','#ff66b3'],        
        legend: 'none',
      };
      var chart_category = new google.visualization.ColumnChart(document.getElementById('chart_visitor_sex')); 
      chart_category.draw(data, options); 
    } 

    function drawChartPAvisitorsbyCategory() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/totalvisitorbyRegionperYearLF', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total Number of Local Visitors per Region by Sex(2021)',
        hAxis: {
          title: 'Regions',
          // format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'No. of Visitors',
          format: 'short',
          gridlines: { count: 3 }
        },
        colors: ['#0073e6','#ff66b3'],        
        legend: 'none',
      };
      var chart_category = new google.visualization.ColumnChart(document.getElementById('chart_visitor_category')); 
      chart_category.draw(data, options); 
    } 

    function drawChartPAvisitorsbyCategory2() {
      var jsonData = $.ajax({ 
          url: BASE_URL+ 'home/totalvisitorbyRegionperYearLFF', 
          dataType: "json", 
          async: false 
          }).responseText; 
      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title: 'Total Number of Foreign Visitors per Region by Sex(2021)',
        hAxis: {
          title: 'Regions',
          // format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'No. of Visitors',
          format: 'short',
          gridlines: { count: 3 }
        },
        colors: ['#0073e6','#ff66b3'],        
        legend: 'none',
      };
      var chart_category = new google.visualization.ColumnChart(document.getElementById('chart_visitor_category2')); 
      chart_category.draw(data, options); 
    } 

  function getTabImageTopo(){
      var codegen = $('#gencodespa').val();
      $.ajax({
          type: 'POST',
          data : {codegens:codegen},
          url: BASE_URL + 'home/fetchpainformationdisplay',
          success:function(response){
              $('#tbodyinfopa').html(response);
          }
      });
  }

    // function drawChart() {

      // var button = document.getElementById('change-chart');
      // var chartDiv = document.getElementById('chart_div_income');
      // var jsonData = $.ajax({ 
      //     url: BASE_URL+ 'home/totalincomeperregionbyyear', 
      //     dataType: "json", 
      //     async: false 
      //     }).responseText;
      // var data = new google.visualization.DataTable(jsonData);

      // var materialOptions = {
      //   chart: {
      //     title: 'Total Protected Area Income per Region (in Php) CY 2021'
      //   },
      //   series: {
      //     // Gives each series an axis name that matches the Y-axis below.
      //     0: {axis: 'Temps'},
      //     1: {axis: 'Daylight'}
      //   },
      //   axes: {
      //     // Adds labels to each axis; they don't have to match the axis names.
      //     y: {
      //       Temps: {label: 'Temps (Celsius)'},
      //       Daylight: {label: 'Daylight'}
      //     }
      //   }
      // };

      // var classicOptions = {
      //   title: 'Average Temperatures and Daylight in Iceland Throughout the Year',
      //   width: 900,
      //   height: 500,
      //   // Gives each series an axis that matches the vAxes number below.
      //   series: {
      //     0: {targetAxisIndex: 0},
      //     1: {targetAxisIndex: 1}
      //   },
      //   vAxes: {
      //     // Adds titles to each axis.
      //     0: {title: 'Temps (Celsius)'},
      //     1: {title: 'Daylight'}
      //   },
      //   hAxis: {
      //     ticks: [new Date(2014, 0), new Date(2014, 1), new Date(2014, 2), new Date(2014, 3),
      //             new Date(2014, 4),  new Date(2014, 5), new Date(2014, 6), new Date(2014, 7),
      //             new Date(2014, 8), new Date(2014, 9), new Date(2014, 10), new Date(2014, 11)
      //            ]
      //   },
      //   vAxis: {
      //     viewWindow: {
      //       max: 30
      //     }
      //   }
      // };

      // function drawMaterialChart() {
      //   var materialChart = new google.charts.Line(chartDiv);
      //   materialChart.draw(data, materialOptions);
      //   button.innerText = 'Change to Classic';
      //   button.onclick = drawClassicChart;
      // }

      // function drawClassicChart() {
      //   var classicChart = new google.visualization.LineChart(chartDiv);
      //   classicChart.draw(data, classicOptions);
      //   button.innerText = 'Change to Material';
      //   button.onclick = drawMaterialChart;
      // }

      // drawMaterialChart();

    // }