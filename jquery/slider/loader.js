$(document).ready(function(){
		// fetchTable();

		// $('#uploadForm').submit(function(e){
		// 	e.preventDefault();
		// 	var url = '<?php echo base_url(); ?>';

		// 	// var reader = new FileReader();
  //   		// reader.readAsDataURL(document.getElementById('file').files[0]);

		// 	var formdata = new FormData();
		// 	formdata.append('file', document.getElementById('file').files[0]);

		// 	var other_data = $('#uploadForm').serializeArray();
		//     $.each(other_data,function(key,input){
		//         formdata.append(input.name,input.value);
		//     });
		// 	$.ajax({
		// 		type: 'POST',
		// 		contentType: false,
		// 	    cache: false,
		// 	    processData: false,
		// 	    data: formdata,
		// 	    dataType: 'json',
		// 		url: BASE_URL + '/main_server/wslider/insert/',
		// 		success: function(response){
		// 			console.log(response);
		// 			if(response.error){
		// 				$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
		// 				$('#message').html(response.message);
		// 			}
		// 			else{
		// 				$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
		// 				$('#message').html(response.message);
		// 				// fetchTable();
		// 				$('#uploadForm')[0].reset();
		// 			}
		// 		}
		// 	});
		// });

		// $('#clearMsg').click(function(){
		// 	$('#responseDiv').hide();
		// });


$(document).ready(function() {
	$(document).on('click', '#save_slide', function(){
 var uploadForm = document.getElementById("uploadForm");
      var formdata = new FormData();
    formdata.append('file', document.getElementById('file').files[0]);

      var other_data = $('#uploadForm').serializeArray();
      $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
       $.ajax({
        url: BASE_URL + '/main_server/wslider/insert/',
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        data: formdata,
        dataType: "JSON",
        success:function(response){
                    $('#message').html(response.message);
                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#responseDiv").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#responseDiv').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
                       $("#responseDiv").fadeOut();

                    }, 2000);
                       uploadForm.reset();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });

		});
	});

$(document).ready(function() {

	$(document).on('click', '#save_news', function(){
		$('#textarea_id').html( tinymce.get('textarea_id').getContent() )
 	var uploadFormNews = document.getElementById("uploadFormNews");
      var formdata = new FormData();
    formdata.append('image', document.getElementById('image').files[0]);

      var other_data = $('#uploadFormNews').serializeArray();
      $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
       $.ajax({
        url: BASE_URL + '/main_server/wnews/insert/',
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,
        data: formdata,
        dataType: "JSON",
        success:function(response){
                    $('#message').html(response.message);
                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#responseDiv").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#responseDiv').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
                       $("#responseDiv").fadeOut();

                    }, 2000);
                     uploadFormNews.reset();
                    $('#blah').replaceWith('<img src="../../../bmb_assets2/upload/news_image/nophoto.jpg" id="yourImage">')

                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });

		});
	});

$(document).ready(function() {
  fetchNews();
});

function fetchNews(){
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            // data : {codegens:codegen},
            url: BASE_URL + 'main_server/wnews/newsload',
            success:function(response){
                $('#tbodynews').html(response);
            }
        });
    }

 
    $(document).on('click', '.btn-deletenews', function(){
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
              url: BASE_URL+'/main_server/wnews/delete_news/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  // $('#tableSlider').DataTable().ajax.reload();
                  fetchNews();  
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});


