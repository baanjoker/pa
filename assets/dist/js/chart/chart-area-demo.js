// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
$("#displayannual").click(function(){
  var year = $('#selectYear').val();
  var year2 = $('#durationid').val();
  var pa = $('#paid2').val();
  $.ajax({
      url : BASE_URL+'/pasu/dashboard/annualgraphdisplay',
      type : 'POST',
      dataType : 'JSON',
      data : {year : year, year2 : year2, pa : pa},
      success : function(data)
        {
        var ctx = document.getElementById("myAnnualChart").getContext("2d");
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
            // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: data.messageyear,
            datasets: [{
              label: 'Annual Income',
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
              // data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
              data : data.messageamount,
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: true,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  beginAtZero: true,                  
                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return '₱' + number_format(value);
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: true
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  // return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
                  
                }
              }
            }
          }
        });
    },
    error : function()
    {
      alert('failed');
    }
  });
});


$("#display").click(function(){
  var paid = $('#paid').val();
  var yearid = $('#yearid').val();
  $.ajax({
    url : BASE_URL+'/pasu/dashboard/chartData',
    type : 'POST',
    dataType: 'JSON',
    data: {yearid : yearid,paid : paid},
        success : function(data)
            {
            var ctx = document.getElementById("myAreaChart").getContext("2d");
            if(window.ctx != undefined) 
            window.ctx.destroy(); 
            window.ctx = new Chart(ctx, {       
              type: 'line',
              data: {
                // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                labels: data.messagemonth,
                datasets: [{
                  label: 'Monthly Income',
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
                  // data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
                  data : data.messageamount,
                }],
              },
              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      padding: 10,
                      beginAtZero: true,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                        return '₱' + number_format(value);
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: true
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      // return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                      return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
                      
                    }
                  }
                }
              }
            });
        },
        error : function()
        {
          alert('failed');
        }
  });

});

$("#displays").click(function(){
  var paid = $('#paids').val();
  var yearid = $('#yearids').val();
  var quarter = $('#quarter').val();
  $.ajax({
    url : BASE_URL+'/pasu/dashboard/chartdatabymonth',
    type : 'POST',
    dataType: 'JSON',
    data: {yearid : yearid,paid : paid, quarter : quarter},
        success : function(data)
            {
            var ctx = document.getElementById("mypaIncomeChart").getContext("2d");
            if(window.ctx1 != undefined) 
            window.ctx1.destroy(); 
            window.ctx1 = new Chart(ctx, {       
              type: 'bar',
              data: {
                labels: ["Entrance fee", "Facilities fee", "Resource fee", "Concession fee", "Other fees","Disburesement fees"],
                // labels: data.messagemonth,
                datasets: [{
                  label: 'Monthly Income',
                  lineTension: 0.3,
                  backgroundColor: "rgba(255, 153, 51, 0.25)",
                  borderColor: "rgba(255, 153, 102, 1)",
                  pointRadius: 3,
                  pointBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointBorderColor: "rgba(78, 115, 223, 1)",
                  pointHoverRadius: 3,
                  pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                  pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                  pointHitRadius: 10,
                  pointBorderWidth: 2,
                  // data: [10000, 5000, 15000, 10000, 20000],
                  // data : [data.messageentrance,data.messagefacility,data.messageresource,data.messageconcession,data.messageother],
                  data : [data.messageentrance,data.messagefacility,data.messageresource,data.messageconcession,data.messageother,data.messagedisbursement],
                }],
              },
              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      padding: 10,
                      beginAtZero: true,
                      // Include a dollar sign in the ticks
                      callback: function(value, index, values) {
                        return '₱' + number_format(value);
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: true
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      // return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                      return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
                      
                    }
                  }
                }
              }
            });
        },
        error : function()
        {
          alert('failed');
        }
  });
});

$("#visitdisplays").click(function(){
  var year = $('#visityear').val();
  var quarter = $('#visitquarter').val();
  var pa = $('#pavisit').val();
  $.ajax({
      url : BASE_URL+'/pasu/dashboard/visitorsBarGraph',
      type : 'POST',
      dataType : 'JSON',
      data : {year : year, quarter : quarter, pa : pa},
      success : function(data)
        {
        var ctx = document.getElementById("myPAVisitorsChart").getContext("2d");
        if(window.visitor != undefined) 
        window.visitor.destroy();
        window.visitor = new Chart(ctx, {   

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
          type: 'bar',
          data: {
            // labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            labels: data.messageMonth,
            datasets: [{
              label: 'Male',
              lineTension: 0.3,
              backgroundColor: "rgba(0, 0, 255, 0.75)",
              borderColor: "rgba(255, 153, 102, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              // data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
              data : data.messageMale
            },
            {
              label: 'Female',
              lineTension: 0.3,
              backgroundColor: "rgba(255, 102, 204, 0.75)",
              borderColor: "rgba(255, 153, 102, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              // data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
              data : data.messageFemale
            }],
            
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: true,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7,
                  beginAtZero: true
                }
              }],
              yAxes: [{
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  beginAtZero: true,

                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return '' + number_format(value);
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: true
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  // return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                  
                }
              }
            }
          }
        });
    },
    error : function()
    {
      alert('failed');
    }
  });
});

displaycharts();
function displaycharts()
{
  // Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      label: "Earnings",
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
      data: [0],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          beginAtZero: true,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
}

displayAnnualIncome();
function displayAnnualIncome()
{
  // Area Chart Example
var ctx = document.getElementById("myAnnualChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["2016", "2017", "2018", "2019"],
    datasets: [{
      label: "Earnings",
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
      data: [],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          beginAtZero: true,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
}

displayincomefeequarter();
function displayincomefeequarter()
{
  // Area Chart Example
var ctx = document.getElementById("mypaIncomeChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Entrance fee", "Facilities fee", "Resource fee", "Concession fee","Other fees"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(255, 153, 51, 0.25)",
      borderColor: "rgba(255, 153, 102, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          beginAtZero: true,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
}

// displayVisitor();
function displayVisitor()
{
  // Area Chart Example
var ctx = document.getElementById("myPAVisitorsChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
      label: "Male",
      lineTension: 0.3,
      backgroundColor: "rgba(0, 0, 255, 0.75)",
      borderColor: "rgba(0, 0, 255, 0.75)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [],
    },
    {
      label: 'Female',
      lineTension: 0.3,
      backgroundColor: "rgba(255, 102, 204, 0.75)",
      borderColor: "rgba(255, 102, 204, 0.75)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      // data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
      data : [],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          beginAtZero: true,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: true
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
}