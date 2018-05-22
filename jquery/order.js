// ==================================================================//
//							CLASS    								 //
// ================================================================= //

$(document).ready(function() {
	fetch_wOrder();
	$(document).on('click', '.btn-deleteOrder', function(){
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
			   		url: BASE_URL+'/main_server/wildlife/delete_Order/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#tablewOrder').DataTable().ajax.reload();

			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

	});
});
function fetch_wOrder(){
var id = $('#id_class').val();
var t = $('#tablewOrder').DataTable({
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
		url : BASE_URL+'main_server/wildlife/load_Order/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_order');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/wildlife/save_order',
        type: "POST",
        data: $('#orderForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messageorder').html(response.messageorder);
                    if(response.error){
                        $('#divOrder').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divOrder").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divOrder').removeClass('alert-warning').addClass('alert-success').show();
                        $('#orderForm')[0].reset();
                         setTimeout(function() {
                       $("#divOrder").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divOrder').hide();
        });
    });

