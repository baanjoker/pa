// ==================================================================//
//							DEFINITION OF TERM						 //
// ================================================================= //

$(document).ready(function() {
	fetchDefTerm();
	$(document).on('click', '.btn-deletedefterm', function(){
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
			   		url: BASE_URL+'/main_server/library/delete_DefTerm/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#TableDefTerms').DataTable().ajax.reload();

			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

	});
});
function fetchDefTerm(){
var t = $('#TableDefTerms').DataTable({
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
		url : BASE_URL+'main_server/library/load_DefTerm/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_dt');
// myLink.onclick = function(){
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/library/save_dt',
        type: "POST",
        data: $('#dtForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagedt').html(response.messagedt);
                    if(response.error){
                        $('#divdt').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divdt").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divdt').removeClass('alert-warning').addClass('alert-success').show();
                        $('#dtForm')[0].reset();
                         setTimeout(function() {
                       $("#divdt").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divdt').hide();
        });
    });
