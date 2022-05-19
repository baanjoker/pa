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
        },
            function() {
            $.ajax({
              
              data : 'id='+id,
              url: BASE_URL+'/main_server/wildlife/delete_Species/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tablewSpecies').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );    
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

$(document).ready(function() {
	$(document).on('click', '#save_speciess', function(){
 var speciesForm = document.getElementById("speciesForm");
      var formdata = new FormData();
    formdata.append('picture', document.getElementById('picture').files[0]);

      var other_data = $('#speciesForm').serializeArray();
      $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
       $.ajax({
        url : BASE_URL+'/main_server/wildlife/save_speciess',
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        data: formdata,
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
                         setTimeout(function() {
                       $("#divSpecies").fadeOut();

                    }, 2000);
                       speciesForm.reset();
                       document.getElementById('img_wildlife').src = BASE_URL + 'bmb_assets2/upload/wildlife_img/nophoto.jpg';
                       document.getElementById("picture").value='';
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divSpecies').hide();
        });

});
});

      
     
  
