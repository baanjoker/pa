// ==================================================================//
//							CLASS    								 //
// ================================================================= //

$(document).ready(function() {
	fetch_wClass();
	$(document).on('click', '.btn-deleteClass', function(){
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
			   		url: BASE_URL+'/main_server/wildlife/delete_Class/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#tablewClass').DataTable().ajax.reload();

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
var t = $('#tablewClass').DataTable({
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
		url : BASE_URL+'main_server/wildlife/load_Class/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('btn_save_class');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/wildlife/save_class',
        type: "POST",
        data: $('#classForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messageclass').html(response.messageclass);
                    if(response.error){
                        $('#divClass').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divClass").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divClass').removeClass('alert-warning').addClass('alert-success').show();
                        $('#classForm')[0].reset();
                         setTimeout(function() {
                       $("#divClass").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divClass').hide();
        });
    });