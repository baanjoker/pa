function run(field) {
    setTimeout(function() {
        var regex = /\d*\.?\d?\d?/g;
        field.value = regex.exec(field.value);
    }, 0);
	}
	function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
    $(function () {
    	$("#dateOrganized").hide();
    	$("#pambmemberTab").hide();
        $("#dateApprovePMB").click(function () {
            if ($(this).is(":checked")) {               
                $("#dateOrganized").show();
                $("#pambmemberTab").show();
            } else {
                $("#dateOrganized").hide();  
                $("#pambmemberTab").hide();
                $("#dateMonthPAMB")[0].selectedIndex = 0;  
                $("#dateDayPAMB")[0].selectedIndex = 0;
                $("#dateYearPAMB")[0].selectedIndex = 0;
            }
        });
    });

    $(document).ready(function(){
    // $('#tablelocation').DataTable();
    // $('#tableLegislation').DataTable();
});
    var save_method;

    function insert()
    {
    	 var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/location',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#message').html(response.message);
                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDiv").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#responseDiv').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDiv").fadeOut();
                                   location.reload();
						        }, 2000);
                        getTables();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    }


    function getTables(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchlocation',
            success:function(response){
                $('#tbody').html(response);
            }
        });
    } 

    $(document).ready(function() {
	  getTables();

    $(document).on('click', '.removelocations', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deletelocation/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTables();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

		});
	});

// ------------------------------------ LEGISLATION -------------------------------------//

    function insert_legis2()
    {	
    		// var reader = new FileReader();
    		// reader.readAsDataURL(document.getElementById('picture').files[0]);

			var formdata = new FormData();
			formdata.append('picture', document.getElementById('picture').files[0]);

    		// var serial = $('#regFormlocation').serialize();

    		var other_data = $('#regFormlocation').serializeArray();
		    $.each(other_data,function(key,input){
		        formdata.append(input.name,input.value);
		    });

    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/legislation_save',
    	 	method: 'POST',
			contentType: false,
			cache: false,
			processData: false,
			data: formdata,   	 
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messagelegis').html(response.messagelegis);
                    if(response.error){
                        $('#responseDivLegis').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#responseDivLegis").fadeOut();
						        }, 2000);
                    }
                    else{
                        $('#responseDivLegis').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
						           $("#responseDivLegis").fadeOut();
						        }, 2000);
                        getTablesLegis();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsgLegis', function(){
            $('#responseDivLegis').hide();
        });
    }

    function getTablesLegis(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchlegis',
            success:function(response){
                $('#tbodylegis').html(response);
            }
        });
    }


    $(document).ready(function() {
	  getTablesLegis();

    $(document).on('click', '.removelegislation', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deletelegis/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTablesLegis();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

		});
	});
//----------------------------------- END LEGISLATION -------------------------------------//

// ------------------------------------ PAMB -------------------------------------//

    function insert_pamb()
    {	
    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/pambmember',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messagepamb').html(response.messagepamb);
                    if(response.error){
                        $('#responseDivPAMB').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivPAMB").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#responseDivPAMB').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivPAMB").fadeOut();
                                   location.reload();
						        }, 2000);
                        getTabPAMB();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#responseDivPAMB').hide();
        });
    }

    function getTabPAMB(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchPAMB',
            success:function(response){
                $('#tbodypamb').html(response);
            }
        });
    }


    $(document).ready(function() {
	  getTabPAMB();

    $(document).on('click', '.removepambmember', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deletepambmember/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTabPAMB();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

		});
	});
// ------------------------------------END OF PAMB -------------------------------------//

// ------------------------------------ BIOLOGICAL -------------------------------------//

    function insert_biological()
    {	
    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/registerBiological',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messagebiological').html(response.messagebiological);
                    if(response.error){
                        $('#responseDivBiological').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivBiological").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#responseDivBiological').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivBiological").fadeOut();
                                   location.reload();
						        }, 2000);
                        getTabBiological();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#responseDivBiological').hide();
        });
    }

    function getTabBiological(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchBiological',
            success:function(response){
                $('#tbodybiological').html(response);
            }
        });
    }


    $(document).ready(function() {
	  getTabBiological();

    $(document).on('click', '.removebiological', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deletebiological/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTabBiological();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

		});
	});
// ------------------------------------END OF BIOLOGICAL -------------------------------------//