// ==================================================================//
//							FAMILY    								 //
// ================================================================= //
$(document).ready(function() {
  fetch_wfamily();
    $(document).on('click', '.btn-deleteFamily', function(){
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
              url: BASE_URL+'/main_server/wildlife/delete_Family/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tablewFamily').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );    
  });
});

function fetch_wfamily(){
var id = $('#id_family').val();
var t = $('#tablewFamily').DataTable({
		"columnDefs": [{
			"seachable": false,
			"familyable": false,
			"targets": 0
		}],
		"family":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		data: 'id='+id,
		url : BASE_URL+'main_server/wildlife/load_Family/'+id,
		dataType: 'json'
		}
	});

	t.on('family.dt search.dt',function(){
		t.column(0,{search:'applied', family:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

var myLink = document.getElementById('save_family');
myLink.addEventListener('click', function() {
 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/wildlife/save_family',
        type: "POST",
        data: $('#familyForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagefamily').html(response.messagefamily);
                    if(response.error){
                        $('#divFamily').removeClass('alert-success').addClass('alert-warning').show();                       
                         setTimeout(function() {
                       $("#divFamily").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divFamily').removeClass('alert-warning').addClass('alert-success').show();
                        $('#familyForm')[0].reset();
                         setTimeout(function() {
                       $("#divFamily").fadeOut();
                       location.reload();
                    }, 2000);
                        
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divFamily').hide();
        });
    });
