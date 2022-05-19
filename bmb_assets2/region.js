$("#searchPa").change(function(){
    var output = $('.searchError'); 
    var output2 = $('.searchError2'); 
    var year_list = $('#searchYear');
    var month_list = $('#searchMonthPenro');
    $.ajax({
        url  : BASE_URL+'users/report/ipaf/getYear/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          searchPa : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);
              output2.html('');              
              output.html('');
              month_list.html('');
             
            } else if (data.status == false) {
              year_list.html('');
              month_list.html('');
              output2.html('');              
              output.html(data.message).addClass('text-danger').removeClass('text-success');
             
            } else {
              month_list.html('');
              output2.html('');              
              year_list.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#searchPas").change(function(){
    var output = $('.searchError'); 
    var output2 = $('.searchError2'); 
    var year_list = $('#searchYears');
    var e = document. getElementById('pdfsubmit' );

    $.ajax({
        url  : BASE_URL+'users/report/ipaf/getYear/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          searchPa : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);
              output2.html('');              
              output.html('');
             
            } else if (data.status == false) {
              year_list.html('');
              output2.html('');              
              output.html(data.message).addClass('text-danger').removeClass('text-success');
             $("#tbodyreportfees").empty();
            } else {
              output2.html('');              
              year_list.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              $("#tbodyreportfees").empty();
              e.style.display = 'none';
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});


$("#searchYear").change(function(){
    var output = $('.searchError2'); 
    var month_list = $('#searchMonth');
    var searchPa  = $('#searchPa').val();   

    $.ajax({
        url  : BASE_URL+'users/report/ipaf/getMonth/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          searchPa : searchPa,
          searchYear : $(this).val()},

          success : function(data)
          {
            if (data.status == true) {
              month_list.html(data.message);
              output.html('');
             
            } else if (data.status == false) {              
              month_list.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
             
            } else {
              month_list.html('');           
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#searchtry").click(function(){
  var url = '<?php echo base_url(); ?>';
  var year_list = $('#searchYear').val();
  var month_list = $('#searchMonth').val();
  var searchPa  = $('#searchPa').val();
    $.ajax({
      type: 'POST',
        data : {searchPa:searchPa,year_list:year_list,month_list:month_list},
        url: BASE_URL + 'users/report/ipaf/incomeSearch',
        success:function(response){
          $('#tbodyreportfee').html(response);
    }
  });
});

$("#searchtryYear").click(function(){
  var url = '<?php echo base_url(); ?>';
  var year_list = $('#searchYears').val();
  var searchPa  = $('#searchPas').val();
  var e = document. getElementById('pdfsubmit' );
    $.ajax({
      type: 'POST',
        data : {searchPa:searchPa,year_list:year_list},
        url: BASE_URL + 'users/report/ipaf/incomeSearchYear',
        success:function(response){
          $('#tbodyreportfees').html(response);
          if (searchPa != '' && year_list != '') {
            e.style.display = 'inline-block';
          }
    }
  });
});

$("#searchYears").change(function(){
    var e = document.getElementById('pdfsubmit' );  
    $("#tbodyreportfees").empty();
    e.style.display = 'none';
});