// ==================================================================//
//							CATEGORY  								 //
// ================================================================= //
$(document).ready(function() {
	fetch_wCategory();
	$(document).on('click', '.btn-deleteCategory', function(){
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
			   		url: BASE_URL+'/main_server/wildlife/delete_Category/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					  $('#tablewCategory').DataTable().ajax.reload();

			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

	});
});
var myLink = document.getElementById('save_category');
// myLink.onclick = function(){
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/wildlife/save_cat',
        type: "POST",
        data: $('#categoryForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagecat').html(response.messagecat);
                    if(response.error){
                        $('#divCat').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divCat").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divCat').removeClass('alert-warning').addClass('alert-success').show();
                        $('#categoryForm')[0].reset();
                         setTimeout(function() {
                       $("#divCat").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divCat').hide();
        });
    });

function fetch_wCategory(){
var t = $('#tablewCategory').DataTable({
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
		url : BASE_URL+'main_server/wildlife/load_Category/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}
