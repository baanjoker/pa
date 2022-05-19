// ==================================================================//
//							BIOGEOLOCATION					 		 //
// ================================================================= //

// $(document).ready(function() {
// 	fetch();
// 	$(document).on('click', '.btn-deletecat', function(){
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
// 			   		url: BASE_URL+'/main_server/library/delete_cat/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#tablecat').DataTable().ajax.reload();

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
    $(document).on('click', '.btn-deletecat', function(){
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
              url: BASE_URL+'/main_server/library/delete_cat/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tablecat').DataTable().ajax.reload();
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
var t = $('#tablecat').DataTable({
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
		url : BASE_URL+'main_server/library/load_cat/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_cat');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/library/save_cat',
        type: "POST",
        data: $('#catForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagecat').html(response.messagecat);
                    if(response.error){
                        $('#divcat').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divcat").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divcat').removeClass('alert-warning').addClass('alert-success').show();
                        $('#catForm')[0].reset();
                         setTimeout(function() {
                       $("#divcat").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divcat').hide();
        });
    });
