// ==================================================================//
//							CLASS    								 //
// ================================================================= //

$(document).ready(function() {
	fetch_wClass();
	$(document).on('click', '.btn-deletewetland', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Are you sure?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, delete it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/wetland/delete_wetland/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#tableWetland').DataTable().ajax.reload();

			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

	});
});
function fetch_wClass(){
var id = $('#id_category').val();
var t = $('#tableWetland').DataTable({
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
		data: 'id='+id,
		url : BASE_URL+'main_server/wetland/load_Wetland/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_wetland');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/wetland/save_wetland/',
        type: "POST",
        data: $('#wetlandForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagewetland').html(response.messagewetland);
                    if(response.error){
                        $('#divwetland').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divwetland").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divwetland').removeClass('alert-warning').addClass('alert-success').show();
                        $('#wetlandForm')[0].reset();
                         setTimeout(function() {
                       $("#divwetland").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divwetland').hide();
        });
    });

$("#wltype").change(function(){
        var output = $('.error');
        var results = $('#wldesc');

        $.ajax({
    	    url  :  BASE_URL+'index.php/main_server/wetland/getwldesc/',
            type : 'post',
            dataType : 'JSON',
            data : {
            	'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            	wltype : $(this).val()},
            success : function(data)
            {
            if (data.status == true) {
                results.html(data.message);
                output.html('');
            } else if (data.status == false) {
                results.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
                results.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
            },
        error : function()
        {
        alert('failed');
        }
    });
});

var url = '<?php echo base_url(); ?>';
$("#regid").change(function(){
    var output = $('.prov_error'); 
    var prov_list_item = $('#provid');
    var municipal_list_item = $('#municipal_id');
    var barangay_list_item = $('#bar_id');
    var clear1 = $('.municipal_error');
    var clear2 = $('.barangay_error');
                                    
    $.ajax({
        url  : BASE_URL+'/main_server/wetland/getProv/',
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
    url  : BASE_URL+'/main_server/wetland/getMunicipal/',
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
    url  :  BASE_URL+'/main_server/wetland/getbarangay/',
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