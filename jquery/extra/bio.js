// ==================================================================//
//							BIOGEOLOCATION					 		 //
// ================================================================= //

$(document).ready(function() {
	fetch();
	$(document).on('click', '.btn-deletebio', function(){
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
			   		url: BASE_URL+'/main_server/library/delete_bio/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#tablebio').DataTable().ajax.reload();

			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

	});
});
function fetch(){
var t = $('#tablebio').DataTable({
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
		url : BASE_URL+'main_server/library/load_bio/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_bio');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/library/save_bio',
        type: "POST",
        data: $('#bioForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagebio').html(response.messagebio);
                    if(response.error){
                        $('#divbio').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divbio").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divbio').removeClass('alert-warning').addClass('alert-success').show();
                        $('#bioForm')[0].reset();
                         setTimeout(function() {
                       $("#divbio").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divbio').hide();
        });
    });
