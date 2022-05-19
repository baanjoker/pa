// ==================================================================//
//							CITE STATUS						 		 //
// ================================================================= //

// $(document).ready(function() {
// 	fetch();
// 	$(document).on('click', '.btn-deletecms', function(){
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
// 			   		url: BASE_URL+'/main_server/library/delete_cms/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#tablecms').DataTable().ajax.reload();

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
    $(document).on('click', '.btn-deletecms', function(){
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
              url: BASE_URL+'/main_server/library/delete_cms/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tablecms').DataTable().ajax.reload();
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
var t = $('#tablecms').DataTable({
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
		url : BASE_URL+'main_server/library/load_cms/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_cms');
myLink.addEventListener('click', function() {
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/library/save_cms',
        type: "POST",
        data: $('#cmsform').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagecms').html(response.messagecms);
                    if(response.error){
                        $('#divcms').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divcms").fadeOut();
                    }, 2000);
                    }
                    else{
                        $('#divcms').removeClass('alert-warning').addClass('alert-success').show();
                        $('#cmsform')[0].reset();
                         setTimeout(function() {
                       $("#divcms").fadeOut();
                       location.reload();
                    }, 2000);
                        getTables();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divcms').hide();
        });
    });
