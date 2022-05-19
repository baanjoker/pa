
$(document).ready(function() {
fetch_cave();
    $(document).on('click', '.btn-deletecave', function(){
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
              url: BASE_URL+'/main_server/cave/delete_caveList/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tableCave').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_cave(){
var t = $('#tableCave').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'/main_server/cave/get_listCave/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}
//-------------------------------END OF CAVE STATUS --------------------------------------//

//------------------------------------ MARITAL STATUS ----------------------------------------//
// $(document).ready(function() {
// 	 fetch_marital();

//     $(document).on('click', '.delete_me', function(){
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
// 			   		url: BASE_URL+'/main_server/maritalStatus/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#myTableMarital').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});

// });

$(document).ready(function() {
fetch_marital();
    $(document).on('click', '.delete_me', function(){
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
              url: BASE_URL+'/main_server/maritalStatus/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#myTableMarital').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_marital(){
var t = $('#myTableMarital').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'/main_server/maritalStatus/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}
//------------------------------------ END OF SCRIPT MARITAL STATUS ----------------------------------------//

//------------------------------------ DEFINITION OF TERM ----------------------------------------//

// $(document).ready(function() {
// 	 fetch_defterm();

//     $(document).on('click', '.btn-deletedefterms', function(){
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
// 			   		url: BASE_URL+'/main_server/defterm/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableDefTerm').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});

// });

$(document).ready(function() {
fetch_defterm();
    $(document).on('click', '.btn-deletedefterms', function(){
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
              url: BASE_URL+'/main_server/defterm/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableDefTerm').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_defterm(){
var t = $('#TableDefTerm').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'/main_server/defterm/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}
//------------------------------------ END OF DEFINITION OF TERM ----------------------------------------//

//------------------------------------ ECOSYSTEM ----------------------------------------//
// $(document).ready(function() {
// 	 fetch_ecosystem();

//     $(document).on('click', '.btn-deleteecosystem', function(){
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
// 			   		url: BASE_URL+'/main_server/ecosystem/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableEcosystem').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});

// });

$(document).ready(function() {
fetch_ecosystem();
    $(document).on('click', '.btn-deleteecosystem', function(){
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
              url: BASE_URL+'/main_server/ecosystem/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableEcosystem').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_ecosystem(){
var t = $('#TableEcosystem').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'/main_server/ecosystem/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}
//------------------------------------ END OF ECOSYSTEM ----------------------------------------//

//------------------------------------ SCIENTIFIC NAME ----------------------------------------//

// $(document).ready(function() {
// 	 fetch_scientific();

// 	  $(document).on('click', '.btn-deletescientific', function(){
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
// 			   		url: BASE_URL+'/main_server/scientificname/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableScientific').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_scientific();
    $(document).on('click', '.btn-deletescientific', function(){
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
              url: BASE_URL+'/main_server/scientificname/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableScientific').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});


function fetch_scientific(){
var t = $('#TableScientific').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/scientificname/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();

	// $("#catid").change(function(){
 //        var output = $('.error');
 //        var output2 = $('.error2');
 //        var classId = $('#classid');
 //        var orderId = $('#orderid')

 //        $.ajax({
 //    	    url  :  BASE_URL+'index.php/main_server/wildlife/getClass/',
 //            type : 'post',
 //            dataType : 'JSON',
 //            data : {
 //            	'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
 //            	catid : $(this).val()},
 //            success : function(data)
 //            {
 //            if (data.status == true) {
 //                classId.html(data.message);
 //                output.html('');
 //                output2.html('');
 //                orderId.html('');
 //            } else if (data.status == false) {
 //                classId.html('');
 //                output.html(data.message).addClass('text-danger').removeClass('text-success');
 //                orderId.html('');
 //                output2.html('');
 //            } else {
 //                classId.html('');
 //                output.html(data.message).addClass('text-danger').removeClass('text-success');
 //                orderId.html('');
 //                output2.html('');
 //            }
 //            },
 //        error : function()
 //        {
 //        alert('failed');
 //        }
 //        });
 //    });

 //    $("#classid").change(function(){
 //        var output = $('.error2');
 //        var classId = $('#classid');
 //        var orderId = $('#orderid');

 //        $.ajax({
 //    	    url  :  BASE_URL+'index.php/main_server/wildlife/getOrder/',
 //            type : 'post',
 //            dataType : 'JSON',
 //            data : {
 //            	'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
 //            	classid : $(this).val()},
 //            success : function(data)
 //            {
 //            if (data.status == true) {
 //                orderId.html(data.message);
 //                output.html('');
 //            } else if (data.status == false) {
 //                orderId.html('');
 //                output.html(data.message).addClass('text-danger').removeClass('text-success');
 //            } else {
 //                orderId.html('');
 //                output.html(data.message).addClass('text-danger').removeClass('text-success');
 //            }
 //            },
 //        error : function()
 //        {
 //        alert('failed');
 //        }
 //        });
 //    });
}

//------------------------------------ END OF SCIENTIFIC NAME ----------------------------------------//

//------------------------------------ BIOGEOLOCATION NAME ----------------------------------------//


// $(document).ready(function() {
// 	 fetch_biogeo();

// 	  $(document).on('click', '.btn-deletebiogeo', function(){
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
// 			   		url: BASE_URL+'/main_server/biogeolocation/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableBiogeolocation').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_biogeo();
    $(document).on('click', '.btn-deletebiogeo', function(){
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
              url: BASE_URL+'/main_server/biogeolocation/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableBiogeolocation').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_biogeo(){
var t = $('#TableBiogeolocation').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/biogeolocation/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

//------------------------------------ END OF BIOGEOLOCATION NAME ----------------------------------------//

//------------------------------------ NIP CLASSIFICATION ----------------------------------------//
// $(document).ready(function() {
// 	 fetch_nip();

// 	  $(document).on('click', '.btn-deletenip', function(){
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
// 			   		url: BASE_URL+'/main_server/nip/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableNIP').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_nip();
    $(document).on('click', '.btn-deletenip', function(){
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
              url: BASE_URL+'/main_server/nip/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableNIP').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_nip(){
var t = $('#TableNIP').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/nip/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}


//------------------------------------ END OF NIP CLASSIFICATION ----------------------------------------//

//------------------------------------ PA CATEGORY ----------------------------------------//
// $(document).ready(function() {
// 	 fetch_pacat();

// 	  $(document).on('click', '.btn-deletePACategory', function(){
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
// 			   		url: BASE_URL+'/main_server/paCategory/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TablePACategory').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_pacat();
    $(document).on('click', '.btn-deletePACategory', function(){
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
              url: BASE_URL+'/main_server/paCategory/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TablePACategory').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_pacat(){
var t = $('#TablePACategory').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/paCategory/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}


//------------------------------------ END OF PA CATEGORY ----------------------------------------//


//------------------------------------ PA PACAREA ----------------------------------------//
// $(document).ready(function() {
// 	 fetch_pac();

// 	  $(document).on('click', '.btn-deletePAC', function(){
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
// 			   		url: BASE_URL+'/main_server/paConservePriorArea/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TablePAC').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_pac();
    $(document).on('click', '.btn-deletePAC', function(){
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
              url: BASE_URL+'/main_server/paConservePriorArea/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TablePAC').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_pac(){
var t = $('#TablePAC').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/paConservePriorArea/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}


//------------------------------------ END OF PA PACAREA ----------------------------------------//


// ----------------------------------- PROTECTED AREA -------------------------------------------//

// $(document).ready(function() {
// 	 fetch_paMain();

// 	  $(document).on('click', '.btn-deletepamain', function(){
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
// 			   		url: BASE_URL+'/main_server/pamain/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TablePaMain').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_paMain();
    $(document).on('click', '.btn-deletepamain', function(){
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
              url: BASE_URL+'/main_server/pamain/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TablePaMain').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_paMain(){
var t = $('#TablePaMain').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[2,'asc']],
		"processing":true,
		"serverside":true,
		"sPaginationType": "full_numbers",
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/pamain/get_data/',
		dataType: 'json'
		}
	});
	
	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF PROTECTED AREA -------------------------------------------//

// // ----------------------------------- PROTECTED AREA -------------------------------------------//

// $(document).ready(function() {
// 	 fetch_paMain();

// 	  $(document).on('click', '.btn-deletepamain', function(){
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
// 			   		url: BASE_URL+'/main_server/pamain/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TablePaMain').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

// function fetch_paMain(){
// var t = $('#TablePaMain').DataTable({
// 		"columnDefs": [{
// 			"seachable": false,
// 			"orderable": false,
// 			"targets": 0
// 		}],
// 		"order":[[1,'asc']],
// 		"processing":true,
// 		"serverside":true,
// 		"languange":{
// 			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
// 		},
// 	"ajax":{
// 		method: 'POST',
// 		url : BASE_URL+'main_server/pamain/get_data/',
// 		dataType: 'json'
// 		}
// 	});

// 	t.on('order.dt search.dt',function(){
// 		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
// 			cell.innerHTML = i+1;
// 		});
// 	}).draw();
// }

// // ----------------------------------- END OF PROTECTED AREA -------------------------------------------//

// ----------------------------------- LEGISLATION -------------------------------------------//

// $(document).ready(function() {
// 	 fetch_legis();

// 	  $(document).on('click', '.btn-deletelegislation', function(){
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
// 			   		url: BASE_URL+'/main_server/legislation/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableLegislation').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_legis();
    $(document).on('click', '.btn-deletelegislation', function(){
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
              url: BASE_URL+'/main_server/legislation/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableLegislation').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_legis(){
var t = $('#TableLegislation').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/legislation/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF LEGISLATION -------------------------------------------//

// ----------------------------------- SPECIES -------------------------------------------//

// $(document).ready(function() {
// 	 fetch_speciesS();

// 	  $(document).on('click', '.btn-deletespecies', function(){
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
// 			   		url: BASE_URL+'/main_server/speciesGenus/delete/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#TableSpeciesV').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_speciesS();
    $(document).on('click', '.btn-deletespecies', function(){
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
              url: BASE_URL+'/main_server/speciesGenus/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TableSpeciesV').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_speciesS(){
var t = $('#TableSpeciesV').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/speciesGenus/get_data/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF SPECIES -------------------------------------------//

// ----------------------------------- REGION -------------------------------------------//

// $(document).ready(function() {
// 	 fetch_Region();

// 	  $(document).on('click', '.btn-deleteregion', function(){
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
// 			   		url: BASE_URL+'/main_server/psgc_locations/delete_RegionfromList/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#tableRegion').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_Region();
    $(document).on('click', '.btn-deleteregion', function(){
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
              url: BASE_URL+'/main_server/psgc_locations/delete_RegionfromList/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tableRegion').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});


function fetch_Region(){

var t = $('#tableRegion').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		url : BASE_URL+'main_server/psgc_locations/get_regionList/',
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF REGION -------------------------------------------//


// ----------------------------------- PROVINCE -------------------------------------------//
// $(document).ready(function() {
// 	fetch_province();
// 	$(document).on('click', '.btn-deleteprovince', function(){
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
// 			   		url: BASE_URL+'/main_server/psgc_locations/delete_province/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#tableProvince').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_province();
    $(document).on('click', '.btn-deleteprovince', function(){
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
              url: BASE_URL+'/main_server/psgc_locations/delete_province/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tableProvince').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_province(){
var id = $('#regionid').val();
var t = $('#tableProvince').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		data: 'id='+id,
		url : BASE_URL+'main_server/psgc_locations/get_provinceList/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF PROVINCE -------------------------------------------//

// ----------------------------------- MUNICIPALITY -------------------------------------------//
// $(document).ready(function() {
// 	fetch_municipality();
// 	$(document).on('click', '.btn-deletemunicipality', function(){
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
// 			   		url: BASE_URL+'/main_server/psgc_locations/delete_municipality/'+id,
// 			    	type: 'POST',
// 			       	data: 'id='+id,
// 			       	dataType: 'json'
// 			    })
// 			    .done(function(response){
// 			     	swal('Deleted!', response.message, response.status);
// 					  $('#tableMunicipality').DataTable().ajax.reload();

// 			    })
// 			    .fail(function(){
// 			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
// 			    });
// 		  	}

// 		})

// 	});
// });

$(document).ready(function() {
fetch_municipality();
    $(document).on('click', '.btn-deletemunicipality', function(){
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
              url: BASE_URL+'/main_server/psgc_locations/delete_municipality/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tableMunicipality').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_municipality(){
var id = $('#provinceid').val();
var t = $('#tableMunicipality').DataTable({
		"columnDefs": [{
			"seachable": false,
			"orderable": false,
			"targets": 0
		}],
		"order":[[1,'asc']],
		"processing":true,
		"serverside":true,
		"languange":{
			processing:'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..</span>'
		},
	"ajax":{
		method: 'POST',
		data: 'id='+id,
		url : BASE_URL+'main_server/psgc_locations/get_municipalityList/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF MUNICIPALITY -------------------------------------------//

$(document).ready(function() {
fetch_barangay();
    $(document).on('click', '.btn-deletebarangay', function(){
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
              url: BASE_URL+'/main_server/psgc_locations/delete_barangay/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#tableBarangay').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );
  });
});

function fetch_barangay(){
var id = $('#municipalid').val();
var t = $('#tableBarangay').DataTable({
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
		url : BASE_URL+'main_server/psgc_locations/get_barangayList/'+id,
		dataType: 'json'
		}
	});

	t.on('order.dt search.dt',function(){
		t.column(0,{search:'applied', order:'applied'}).nodes().each(function(cell,i){
			cell.innerHTML = i+1;
		});
	}).draw();
}

// ----------------------------------- END OF BARANGAY -------------------------------------------//

$("#searchPa").change(function(){
    var output = $('.searchError'); 
    var output2 = $('.searchError2'); 
    var year_list = $('#searchYear');
    var month_list = $('#searchMonthPenro');
    $.ajax({
        url  : BASE_URL+'main_server/ipaf_report/getYear/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          searchPa : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);
              output2.html('');              
              output.html('');
              month_list.html('');
             
            } else if (data.status == false) {
              year_list.html('');
              month_list.html('');
              output2.html('');              
              output.html(data.message).addClass('text-danger').removeClass('text-success');
             
            } else {
              month_list.html('');
              output2.html('');              
              year_list.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#searchPas").change(function(){
    var output = $('.searchError'); 
    var output2 = $('.searchError2'); 
    var year_list = $('#searchYears');
    var e = document.getElementById('pdfsubmit' );

    $.ajax({
        url  : BASE_URL+'main_server/ipaf_report/getYear/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          searchPa : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);
              output2.html('');              
              output.html('');
             $("#tbodyreportfees").empty();
              e.style.display = 'none';
            } else if (data.status == false) {
              year_list.html('');
              output2.html('');              
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              $("#tbodyreportfees").empty();
             
            } else {
              output2.html('');              
              year_list.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              $("#tbodyreportfees").empty();
              e.style.display = 'none';
              
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});


$("#searchYear").change(function(){
    var output = $('.searchError2'); 
    var month_list = $('#searchMonth');
    var searchPa  = $('#searchPa').val();   

    $.ajax({
        url  : BASE_URL+'main_server/ipaf_report/getMonth/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          searchPa : searchPa,
          searchYear : $(this).val()},

          success : function(data)
          {
            if (data.status == true) {
              month_list.html(data.message);
              output.html('');
             
            } else if (data.status == false) {              
              month_list.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
             
            } else {
              month_list.html('');           
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#searchtry").click(function(){
  var url = '<?php echo base_url(); ?>';
  var year_list = $('#searchYear').val();
  var month_list = $('#searchMonth').val();
  var searchPa  = $('#searchPa').val();
  var e = document. getElementById('pdfsubmit' );

    $.ajax({
      type: 'POST',
        data : {searchPa:searchPa,year_list:year_list,month_list:month_list},
        url: BASE_URL + 'main_server/ipaf_report/incomeSearch',
        success:function(response){
          $('#tbodyreportfee').html(response);
          if (searchPa != '' && year_list != '') {
            e.style.display = 'inline-block';
          }
    }
  });
});

$("#searchtryYear").click(function(){
  var url = '<?php echo base_url(); ?>';
  var year_list = $('#searchYears').val();
  var searchPa  = $('#searchPas').val();
  var e = document.getElementById('pdfsubmit' );  

    $.ajax({
      type: 'POST',
        data : {searchPa:searchPa,year_list:year_list},
        url: BASE_URL + 'main_server/ipaf_report/incomeSearchYear',
        success:function(response){
          $('#tbodyreportfees').html(response);
           if (searchPa != '' && year_list != '') {
            e.style.display = 'inline-block';
          }
    }
  });
});

$("#searchYears").change(function(){
    var e = document.getElementById('pdfsubmit' );  
    $("#tbodyreportfees").empty();
    e.style.display = 'none';
});


$(document).ready(function() {
fetch_user();
});

function fetch_user(){
  $.ajax({
      type: 'POST',
      url: BASE_URL + 'main_server/user/userList',
      success:function(response){
          $('#tbodyusers').html(response);
      }
  });
}

var url = '<?php echo base_url(); ?>';
$("#regid").change(function(){
    var output = $('.prov_error'); 
    var prov_list_item = $('#provid');
    var municipal_list_item = $('#munid');
    var barangay_list_item = $('#barid');
                                        
    $.ajax({
        url  : BASE_URL+'/main_server/user/getProv/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              prov_list_item.html(data.message); 
              output.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
             
            } else if (data.status == false) {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');             
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});


$("#provid").change(function(){
  var output = $('.municipal_error');
  var prov_list_item = $('#provid');
  var municipal_list_item = $('#munid');
  var cenro_list_item = $('#cenroid');
  var barangay_list_item = $('#barid');
  $.ajax({
    url  : BASE_URL+'/main_server/user/getMunicipal/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regid : $(this).val(),
      provid : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        municipal_list_item.html(data.message);
        barangay_list_item.html('');
        output.html('');
      } else if (data.status == false) {
        municipal_list_item.html('');
        barangay_list_item.html(''); 
        output.html(data.message).addClass('text-danger').removeClass('text-success')
        // clear2.html('');
      } else {
        municipal_list_item.html('');
        
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });

  $.ajax({
    url  : BASE_URL+'/main_server/user/getMunicipalCenro/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regid : $(this).val(),
      provid : $(this).val()
    },
    success : function(datas)
    {
      if (datas.statuss == true) {
        cenro_list_item.html(datas.messages);
        barangay_list_item.html('');
        output.html('');
      } else if (datas.statuss == false) {
        cenro_list_item.html('');
        barangay_list_item.html(''); 
        output.html(datas.messages).addClass('text-danger').removeClass('text-success')
        clear2.html('');
      } else {
        cenro_list_item.html('');
        
        output.html(datas.messages).addClass('text-danger').removeClass('text-success');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

$("#munid").change(function(){
  var output = $('.barangay_error');
  var municipal_list_item = $('#munid');
  var barangay_list_item = $('#barid');
  $.ajax({
    url  :  BASE_URL+'/main_server/user/getbarangay/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      munid : $(this).val() 
    },
    success : function(data) 
    {
      if (data.status == true) {
        barangay_list_item.html(data.message); 
        output.html('');
      } else if (data.status == false) {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      } else {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    }, 
    error : function()
    {
      alert('failed');
    }
  });
}); 

$(document).ready(function(){
    if($('#user_role').val()=='1'){
        $('#provDiv').hide();
        $('#cenroDiv').hide();
        $('#munDiv').hide();
        $('#regionDiv').hide();
        $('#labelDiv').hide();

    }
    else if($('#user_role').val()=='2'){
        $('#regionDiv').show();        
        $('#provDiv').hide();
        $('#cenroDiv').hide();
        $('#munDiv').hide();        
    }
    else if($('#user_role').val()=='3'){
        $('#provDiv').show();
        $('#regionDiv').show();        
        $('#cenroDiv').show();
        $('#munDiv').show();        
    }
    else if($('#user_role').val()=='4'){
        $('#provDiv').show();
        $('#regionDiv').show();        
        $('#cenroDiv').show();
        $('#munDiv').show();        
    }
    else if($('#user_role').val()=='5'){
        $('#provDiv').show();
        $('#regionDiv').show();        
        $('#cenroDiv').hide();
        $('#munDiv').hide();        
    }
    else{
        $('#provDiv').hide();
        $('#munDiv').hide();        
        $('#regionDiv').hide();
        $('#labelDiv').hide();
        $('#cenroDiv').hide();
    }

    $(document).on('change', '#user_role', function(e) {
    if(this.options[e.target.selectedIndex].text == "Administrator"){
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#cenroDiv').hide();
        $('#regionDiv').hide();
        $('#labelDiv').hide();             
        $("#regid")[0].selectedIndex = 0;
        $("#provid")[0].selectedIndex = 0;
        $("#munid")[0].selectedIndex = 0;      

    }else if(this.options[e.target.selectedIndex].text == "Regional Officer"){
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#cenroDiv').hide();        
        $('#regionDiv').show();
        $('#labelDiv').show();             
        $("#provid")[0].selectedIndex = 0;
        $("#munid")[0].selectedIndex = 0;             
    }else if(this.options[e.target.selectedIndex].text == "PENR Officer"){
        $('#provDiv').show();
        $('#munDiv').hide();
        $('#cenroDiv').hide();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        $("#munid")[0].selectedIndex = 0;
    }else if(this.options[e.target.selectedIndex].text == "CENR Officer"){
        $('#provDiv').show();
        $('#munDiv').show();
        $('#cenroDiv').show();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        
    }else if(this.options[e.target.selectedIndex].text == "Protected Area Superintendent"){
        $('#provDiv').show();
        $('#cenroDiv').hide();
        $('#munDiv').show();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        
    }else{
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#regionDiv').hide();
        $('#cenroDiv').hide();
        $('#labelDiv').hide();   
    }
    });
});

function insertUser()
    {

      var url = '<?php echo base_url(); ?>';
      var formprofile = document.getElementById("uploadFormUsers");

      var formdata = new FormData();
    formdata.append('picture', document.getElementById('picture').files[0]);

      var other_data = $('#uploadFormUsers').serializeArray();
      $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
       $.ajax({
        url : BASE_URL + 'main_server/user/create',
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
                       parent.document.getElementById("uploadFormUsers").reload();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    }

  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});