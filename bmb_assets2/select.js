var url = '<?php echo base_url(); ?>';
$("#regid").change(function(){
    var output = $('.prov_error'); 
    var prov_list_item = $('#provid');
    var municipal_list_item = $('#municipal_id');
    var barangay_list_item = $('#bar_id');
    var clear1 = $('.municipal_error');
    var clear2 = $('.barangay_error');
                                    
    $.ajax({
        url  : BASE_URL+'/main_server/cave/getProv/',
        // url +'/main_server/cave/getProv/',
        // '<?= base_url('index.php/main_server/cave/getProv/') ?>',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              prov_list_item.html(data.message); 
              output.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              clear1.html('');
              clear2.html('');
            } else if (data.status == false) {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            } else {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#provid").change(function(){
  var output = $('.municipal_error');
  var prov_list_item = $('#provid');
  var municipal_list_item = $('#municipal_id');
  var barangay_list_item = $('#bar_id');
  var clear2 = $('.barangay_error');
  $.ajax({
    url  : BASE_URL+'/main_server/cave/getMunicipal/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regid : $(this).val(),
      provid : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        municipal_list_item.html(data.message);
        barangay_list_item.html('');
        output.html('');
        clear2.html('');
      } else if (data.status == false) {
        municipal_list_item.html('');
        barangay_list_item.html(''); 
        output.html(data.message).addClass('text-danger').removeClass('text-success')
        clear2.html('');
      } else {
        municipal_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
        clear2.html('');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

$("#municipal_id").change(function(){
  var output = $('.barangay_error');
  var municipal_list_item = $('#municipal_id');
  var barangay_list_item = $('#bar_id');
  $.ajax({
    url  :  BASE_URL+'/main_server/cave/getbarangay/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      municipal_id : $(this).val() 
    },
    success : function(data) 
    {
      if (data.status == true) {
        barangay_list_item.html(data.message); 
        output.html('');
      } else if (data.status == false) {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      } else {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    }, 
    error : function()
    {
      alert('failed');
    }
  });
});  
// ===================SAVE DATA====================//

var myLink = document.getElementById('save_cave');

myLink.onclick = function()
    { 
       var url = '<?php echo base_url(); ?>';
       var idcave = $('#id_cave').val();
       $.ajax({
        url : BASE_URL+'/main_server/cave/save_cave',
        type: "POST",
        data: $('#CaveForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messageCave').html(response.messageCave);
                    if(response.error){
                        $('#divCave').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divCave").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divCave').removeClass('alert-warning').addClass('alert-success').show();
                        $('#CaveForm')[0].reset();
                         setTimeout(function() {
                       $("#divCave").fadeOut();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divCave').hide();
        });
    }