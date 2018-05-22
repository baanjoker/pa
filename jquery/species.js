// ==================================================================//
//							SPECIES    								 //
// ================================================================= //

$(document).ready(function() {
	fetch_wSpecies();
	$(document).on('click', '.btn-deleteSpecies', function(){
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
			   		url: BASE_URL+'/main_server/wildlife/delete_Species/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#tablewSpecies').DataTable().ajax.reload();

			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

	});
});
function fetch_wSpecies(){
var id = $('#id_family').val();
var t = $('#tablewSpecies').DataTable({
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
		url : BASE_URL+'main_server/wildlife/load_Species/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_species');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/wildlife/save_species',
        type: "POST",
        data: $('#speciesForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagespecies').html(response.messagespecies);
                    if(response.error){
                        $('#divSpecies').removeClass('alert-success').addClass('alert-warning').show();                       
                         setTimeout(function() {
                       $("#divSpecies").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divSpecies').removeClass('alert-warning').addClass('alert-success').show();
                        $('#speciesForm')[0].reset();
                         setTimeout(function() {
                       $("#divSpecies").fadeOut();
                       location.reload();
                    }, 2000);
                        
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divSpecies').hide();
        });
    });