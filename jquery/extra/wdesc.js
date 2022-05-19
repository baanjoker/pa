// ==================================================================//
//							WETLAND DESC 					 		 //
// ================================================================= //

// $(document).ready(function() {
// 	fetch();
// 	$(document).on('click', '.btn-deletewdesc', function(){
// 		var id = $(this).data('id');
// 		swal({
// 		  	title: 'Are you sure?',
// 		  	text: "You won't be able to revert this!",
// 		  	type: 'warning',
// 		  	showCancelButton: true,
// 		  	confirmButtonColor: '#3085d6',
// 		  	cancelButtonColor: '#d33',
// 		  	confirmButtonText: 'Yes, delete it!',
// 		}).then((result) => {
// 		  	if (result.value){
// 		  		$.ajax({
// 			   		url: BASE_URL+'/main_server/library/delete_wldesc/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#tablewDesc').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch();
    $(document).on('click', '.btn-deletewdesc', function(){
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
              url: BASE_URL+'/main_server/library/delete_wldesc/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tablewDesc').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch(){
var id = $('#id_wltype').val();
var t = $('#tablewDesc').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[2,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		data: 'id='+id,
		url : BASE_URL+'main_server/library/load_wldesc/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_wldesc');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/library/save_wldesc',
        type: "POST",
        data: $('#wdescForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagewdesc').html(response.messagewdesc);
                    if(response.error){
                        $('#divwdesc').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divwdesc").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divwdesc').removeClass('alert-warning').addClass('alert-success').show();
                        $('#wdescForm')[0].reset();
                         setTimeout(function() {
                       $("#divwdesc").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divwdesc').hide();
        });
    });
