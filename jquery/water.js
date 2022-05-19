
$(document).ready(function() {
  fetchwater();
    $(document).on('click', '.btn-deletewater', function(){
    var id = $(this).data('id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        },
            function() {
            $.ajax({
              
              data : 'id='+id,
              url: BASE_URL+'/main_server/water/delete_water/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tableWater').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );    
  });
});

// $(document).ready(function() {
//   fetchwater();
//   $(document).on('click', '.btn-deletewater', function(){
//     var id = $(this).data('id');
//     swal({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!',
//     }).then((result) => {
//         if (result.value){
//           $.ajax({
//             url: BASE_URL+'/main_server/water/delete_water/'+id,
//             type: 'POST',
//               data: 'id='+id,
//               dataType: 'json'
//           })
//           .done(function(response){
//             swal('Deleted!', response.message, response.status);
//             $('#tableWater').DataTable().ajax.reload();

//           })
//           .fail(function(){
//             swal('Oops...', 'Something went wrong with ajax !', 'error');
//           });
//         }

//     })

//   });
// });

function fetchwater(){
var t = $('#tableWater').DataTable({
    "columnDefs": [{
      "seachable": false,
      "orderable": false,
      "targets": 0
    }],
    "order":[[1,'asc']],
    "processing":true,
    "serverside":true,
    "languange":{
      processing:'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
    },
  "ajax":{
    method: 'POST',
    url : BASE_URL+'main_server/water/load_water/',
    dataType: 'json'
    }
  });

  t.on('order.dt search.dt',function(){
    t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
      cell.innerHTML = i+1;
    });
  }).draw();
}

var url = '<?php echo base_url(); ?>';
$("#regid").change(function(){
  var output = $('.prov_error'); 
  var prov_list_item = $('#provid');
  var wetlandid = $('#wetlandid'); 
  $.ajax({
    url  : BASE_URL+'/main_server/water/getProv/',
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
          wetlandid.html('');
        } else if (data.status == false) {
          prov_list_item.html('');
          wetlandid.html('');
          output.html(data.message).addClass('text-danger').removeClass('text-success')
        } else {
          prov_list_item.html('');
          wetlandid.html('');
          output.html(data.message).addClass('text-danger').removeClass('text-success');
        }
      },
      error : function()
      {
        alert('failed');
      }
    });
});

$("#provid").change(function(){
  var output = $('.wetland_error'); 
  var wetlandid = $('#wetlandid'); 
  $.ajax({
    url  : BASE_URL+'/main_server/water/getWetland/',
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
        wetlandid.html(data.message);
        output.html('');
      } else if (data.status == false) {
        wetlandid.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      } else {
        wetlandid.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

var myLink = document.getElementById('save_water');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/water/save_water/',
        type: "POST",
        data: $('#waterForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagewater').html(response.messagewater);
                    if(response.error){
                        $('#divwater').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divwater").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divwater').removeClass('alert-warning').addClass('alert-success').show();
                        $('#waterForm')[0].reset();
                         setTimeout(function() {
                       $("#divwater").fadeOut();
                       location.reload();
                    }, 2000);
                        // getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divwater').hide();
        });
    });

