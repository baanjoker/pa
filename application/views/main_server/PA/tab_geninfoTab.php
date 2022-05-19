

<?php
$data_paname = array(
    'name' => 'pa_name',
    'id'   => 'pa_name',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Name of Protected Area');
?>
<?php
 function generateRandomString($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }
?>
<?php if (!empty($pamain->id_main)): ?>
    <input type="text" name="gencode" class="hide" value="<?php echo $pamain->generatedcode ?>" id="codegen">
<?php else: ?>
	<input type="text" name="gencode" class="hide" value="<?php echo generateRandomString() ?>" id="codegen">
<?php endif ?>
<div class="tab-pane active" id="tab_geninfoTab">
  	<div class="row">
      	<div class="col-md-12">
        	<div class="panel panel-info">
          		<div class="panel-heading"><div class="panel-title"><i class="fa fa-info"></i> GENERAL INFORMATION</div></div>
          		<div class="panel-body">
          			<table width="100%" border="0" class="table4">				    
					    <tr valign="top" class="spaceUnder spaceOver">
					    	<td>PA Name</td>
					    	<td><?php echo form_input($data_paname,$pamain->pa_name); ?></td>
					    </tr>
					    <tr valign="top" class="spaceUnder">
					    	<td>Classification</td>
					    	<td><?php echo form_dropdown('nip_id',$classList,$pamain->nip_id,'class="form-control"') ?></td>
					    </tr>
					    <tr valign="top" class="spaceUnder">
					    	<td>Category</td>
					    	<td><?php echo form_dropdown('pacategory_id',$categoryList,$pamain->pacategory_id,'class="form-control"') ?></td>
					    </tr>
					    <tr valign="top" class="spaceUnder">
					    	<td>Conservation Area</td>
					    	<td><?php echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,'class="form-control"') ?></td>
					    </tr>
					    <tr valign="top" class="spaceUnder">
					    	<td>Biogeographic Zone</td>
					    	<td><?php echo form_dropdown('tbz_id',$zoneList,$pamain->tbz_id,'class="form-control"') ?></td>
					    </tr>
					    <!-- <tr valign="top" class="spaceUnder">
					    	<td>IUCN</td>
					    	<td><?php echo form_dropdown('iucncode',$iucnList,$pamain->iucn_id,'class="form-control"') ?></td>
					    </tr> -->
					</table>
					<br>					
					<!-- <table width="100%" border="0" class="table4">
						<tr valign="top" class="spaceUnder spaceOver">
							<td>
								<?= form_checkbox('ipaf',$pamain->ipaf,set_value('ipaf',$pamain->ipaf),'class="styled-checkbox" id="styled-checkbox-ipaf"') ?>
    							<label for="styled-checkbox-ipaf">IPAF Established</label>
    						</td>
    						<td>
    							<?= form_checkbox('whsites',$pamain->heritage,set_value('whsites',$pamain->heritage),'class="styled-checkbox" id="styled-checkbox-heritage"') ?>
    							<label for="styled-checkbox-heritage">World Heritage Sites</label>
    						</td>
    						<td>
    							<?= form_checkbox('tbsites',$pamain->transboundary,set_value('tbsites',$pamain->transboundary),'class="styled-checkbox" id="styled-checkbox-transboundary"') ?>
    							<label for="styled-checkbox-transboundary">Transboundary Sites</label>
    						</td>
    						<td>
    							<?= form_checkbox('ramsasites',$pamain->ramsar,set_value('ramsasites',$pamain->ramsar),'class="styled-checkbox" id="styled-checkbox-ramsar"') ?>
    							<label for="styled-checkbox-ramsar">Ramsar Sites</label>
    						</td>							
						</tr>					   
					</table>
					<br> -->
					<table width="100%" border="0" class="table4">
						<tr valign="top" class="spaceUnder spaceOver">
							<td>
    							<?= form_checkbox('pambcheck',$pamain->pamb_approve,set_value('pambcheck',$pamain->pamb_approve),'class="styled-checkbox" id="dateApprovePMB"') ?>
    							<label for="dateApprovePMB">Approved PAMB</label>
    						</td>
						</tr>
					</table>
					<div class="checkbox">
		          		<?php if ($pamain->pamb_approve == TRUE): ?>
		          			<div id="dateOrganizeds">
					            <div class="form-group">
						            <label for="inputNIP" class="col-sm-3 col-xs-12 control-label">Date approved</label>
							            <div class="form-group col-sm-2 col-xs-6">
							            	<?php echo form_dropdown('date_monthPAMB',$monthList,$pamain->pamb_month,'class="form-control" id="dateMonthPAMB"'); ?>
							            </div>
							            <div class="form-group col-sm-2 col-xs-4">
							              	<?php echo form_dropdown('date_dayPAMB',$dayList,$pamain->pamb_day,'class="form-control" id="dateDayPAMB"'); ?>
							            </div>
							            <div class="form-group col-sm-2 col-xs-5">
							                <?php echo form_dropdown('date_yearPAMB',$yearList,$pamain->pamb_year,'class="form-control" id="dateYearPAMB"'); ?>
							            </div>
						        </div>
						        <div class="danger">
									<p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab activated.</p>
								</div>
					        </div>
		          		<?php else: ?>
		          			<div id="dateOrganized">
					            <div class="form-group">
						            <label for="inputNIP" class="col-sm-3 col-xs-12 control-label">Date approved</label>
							            <div class="form-group col-sm-2 col-xs-6">
							              	<?php echo form_dropdown('date_monthPAMB',$monthList,$pamain->pamb_month,'class="form-control" id="dateMonthPAMB"'); ?>
							            </div>
							            <div class="form-group col-sm-2 col-xs-4">
							              	<?php echo form_dropdown('date_dayPAMB',$dayList,$pamain->pamb_day,'class="form-control" id="dateDayPAMB"'); ?>
							            </div>
							            <div class="form-group col-sm-2 col-xs-5">
							                <?php echo form_dropdown('date_yearPAMB',$yearList,$pamain->pamb_year,'class="form-control" id="dateYearPAMB"'); ?>
							            </div>
						        </div>
						        <div class="danger">
									<p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab activated.</p>
								</div>
					        </div>
		          		<?php endif ?>
	          		</div>	          			
						<table width="100%" border="0" class="table4">				    
						    <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Status of Accomplishments for NIPAS/ENIPAS Implementation</label></div>
						    	<td>
	    							<?= form_checkbox('mapstd',$pamain->nipas_mapstd,set_value('mapstd',$pamain->nipas_mapstd),'class="styled-checkbox" id="styled-checkbox-nipas_mapstd"') ?>
	    							<label for="styled-checkbox-nipas_mapstd">Maps and TDs</label>
    							</td>
    							<td>
	    							<?= form_checkbox('pasa',$pamain->nipas_pasa,set_value('pasa',$pamain->nipas_pasa),'class="styled-checkbox" id="styled-checkbox-nipas_pasa"') ?>
	    							<label for="styled-checkbox-nipas_pasa">PASA</label>
    							</td>
    							<td>
	    							<?= form_checkbox('ipap',$pamain->nipas_ipap,set_value('ipap',$pamain->nipas_ipap),'class="styled-checkbox" id="styled-checkbox-nipas_ipap"') ?>
	    							<label for="styled-checkbox-nipas_ipap">IPAP</label>
    							</td>
    							<td>
	    							<?= form_checkbox('delineation',$pamain->nipas_delineation,set_value('delineation',$pamain->nipas_delineation),'class="styled-checkbox" id="styled-checkbox-nipas_delineation"') ?>
	    							<label for="styled-checkbox-nipas_delineation">Delineation</label>
    							</td>
						    </tr>
						    <tr valign="top" class="spaceUnder spaceOver">
						    	<td>
	    							<?= form_checkbox('proclaimed',$pamain->nipas_proclaimed,set_value('proclaimed',$pamain->nipas_proclaimed),'class="styled-checkbox" id="styled-checkbox-nipas_proclaimed"') ?>
	    							<label for="styled-checkbox-nipas_proclaimed">Proclaimed</label>
    							</td>
    							<td>
	    							<?= form_checkbox('legislated',$pamain->nipas_legislated,set_value('legislated',$pamain->nipas_legislated),'class="styled-checkbox" id="styled-checkbox-nipas_legislated"') ?>
	    							<label for="styled-checkbox-nipas_legislated">Legislated</label>
    							</td>
    							<td>
	    							<?= form_checkbox('demarcation',$pamain->nipas_demarcation,set_value('demarcation',$pamain->nipas_demarcation),'class="styled-checkbox" id="styled-checkbox-nipas_demarcation"') ?>
	    							<label for="styled-checkbox-nipas_demarcation">Demarcation</label>
    							</td>
    							<!-- <td>
	    							<?= form_checkbox('pamb',$pamain->nipas_pamb,set_value('pamb',$pamain->nipas_pamb),'class="styled-checkbox" id="styled-checkbox-nipas_pamb"') ?>
	    							<label for="styled-checkbox-nipas_pamb">PAMB</label>
    							</td> -->
    							<td>
	    							<?= form_checkbox('pamp',$pamain->nipas_pamp,set_value('pamp',$pamain->nipas_pamp),'class="styled-checkbox" id="styled-checkbox-nipas_pamp"') ?>
	    							<label for="styled-checkbox-nipas_pamp">PAMP</label>
    							</td>	
						    </tr>
						    <tr valign="top" class="spaceUnder spaceOver">						    						   
						    	<td>
	    							<?= form_checkbox('ipafs',$pamain->nipas_ipaf,set_value('ipafs',$pamain->nipas_ipaf),'class="styled-checkbox" id="styled-checkbox-nipas_ipaf"') ?>
	    							<label for="styled-checkbox-nipas_ipaf">IPAF</label>
    							</td>
    							<td></td>
    							<td></td>
    							<td></td>
						    </tr>
						</table>
		        </div>
		    </div>
		</div>
	</div>
</div>


<script type="text/javascript">
	
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

    	$("#pambmemberTab").hide();
    	$("#dateOrganized").hide();

        $("#dateApprovePMB").click(function () {
            if ($(this).is(":checked")) {
                $("#dateOrganized").show();
                $("#dateOrganizeds").show();
                $("#pambmemberTab").show();
                $("#pambmemberTabs").show();
            } else {
                $("#dateOrganized").hide();
                $("#dateOrganizeds").hide();
                $("#pambmemberTab").hide();
                $("#pambmemberTabs").hide();
                $("#dateMonthPAMB")[0].selectedIndex = 0;
                $("#dateDayPAMB")[0].selectedIndex = 0;
                $("#dateYearPAMB")[0].selectedIndex = 0;
            }
        });
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
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deletelocation/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTables();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
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
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deletelegis/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTablesLegis();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
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
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deletepambmember/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabPAMB();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
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
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deletebiological/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabBiological();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
	}); 
	});
// ------------------------------------END OF BIOLOGICAL -------------------------------------//

// ------------------------------------ PROJECTS -------------------------------------//

    function insert_projects()
    {
    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/registerProject',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messageproject').html(response.messageproject);
                    if(response.error){
                        $('#responseDivProject').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivProject").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#responseDivProject').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivProject").fadeOut();

						        }, 2000);
                        getTabProject();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#responseDivProject').hide();
        });
    }

    function getTabProject(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchProject',
            success:function(response){
                $('#tbodyproject').html(response);
            }
        });
    }


    $(document).ready(function() {
	  getTabProject();

	$(document).on('click', '.removeproject', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deleteproject/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabProject();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
	});   
	});
// ------------------------------------END OF PROJECTS -------------------------------------//


// ------------------------------------ TRIBES -------------------------------------//

    function insert_tribes()
    {
    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/registerTribe',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messagetribe').html(response.messagetribe);
                    if(response.error){
                        $('#responseDivTribe').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivTribe").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#responseDivTribe').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#responseDivTribe").fadeOut();

						        }, 2000);
                        getTabtribes();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#responseDivTribe').hide();
        });
    }

    function getTabtribes(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchTribe',
            success:function(response){
                $('#tbodytribe').html(response);
            }
        });
    }


    $(document).ready(function() {
	  getTabtribes();

	  $(document).on('click', '.removetribe', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deletetribe/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabtribes();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
	});   
  
	});
// ------------------------------------END OF TRIBES -------------------------------------//


// ------------------------------------ MAIN -------------------------------------//

    function insert_Main()
    {

    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/registerMain',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messagemain').html(response.messagemain);
                    if(response.error){
                        $('#responseDivMain').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#responseDivMain").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#responseDivMain').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
						           $("#responseDivMain").fadeOut();

						        }, 2000);
                        getTabtribes();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#responseDivMain').hide();
        });
    }
// ------------------------------------END OF MAIN -------------------------------------//

// ----------------------------------- IMAGE UPLOAD ------------------------------------//
function insert_image()
{
	// var clearimage = document.getElementById('picture2');

	  var formdata = new FormData();
	  formdata.append('picture2', document.getElementById('picture2').files[0]);

    var other_data = $('#regFormlocation').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

  	var url = '<?php echo base_url(); ?>';
   $.ajax({
	  url : url + 'index.php/main_server/pamain/image_upload_save',
	  method: 'POST',
	  contentType: false,
	  cache: false,
	  processData: false,
	  data: formdata,
    dataType: "JSON",
    success:function(response){
                $('#messageimage').html(response.messageimage);
                if(response.error){
                    $('#responseDivImage').removeClass('alert-success').addClass('alert-warning').show();
                     setTimeout(function() {
                   $("#responseDivImage").fadeOut();
                }, 2000);
                }
                else{
                    $('#responseDivImage').removeClass('alert-warning').addClass('alert-success').show();
                    document.getElementById('picture').value='';
                    setTimeout(function() {
                   $("#responseDivImage").fadeOut();
                }, 2000);
                    getTabImage();
                }
            }
   });
    $(document).on('click', '#clearMsgImage', function(){
        $('#responseDivImage').hide();
    });
}

 function getTabImage(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchImage',
            success:function(response){
                $('#tbodyimage').html(response);
            }
        });
    }

$(document).ready(function() {
	  getTabImage();

	  $(document).on('click', '.removeimage', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deleteimages/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImage();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
	});
	});
//------------------------------------END OF IMAGE UPLOAD---------------------------------------------//

// ----------------------------------- INCOME GENERATED ------------------------------------//

function insert_income()
    {
    	 var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/pamain/income',
    	 	type: "POST",
    	 	data: $('#regFormlocation').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#incomeMessage').html(response.incomeMessage);
                    if(response.error){
                        $('#incomeDiv').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#incomeDiv").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#incomeDiv').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#incomeDiv").fadeOut();

						        }, 2000);
                        getTablesincome();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#incomeDiv').hide();
        });
    }


    function getTablesincome(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'index.php/main_server/pamain/fetchincome',
            success:function(response){
                $('#tbodyfee').html(response);
            }
        });
    }

    $(document).ready(function() {
	  getTablesincome();

	  $(document).on('click', '.removefee', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deleteimages/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTablesincome();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
	});
	});

// ----------------------------------- end of INCOME GENERATED ------------------------------------//

// ----------------------------------- ECO-TOURISM ------------------------------------//
function insert_ecotourism()
{
	// var clearimage = document.getElementById('picture2');

	  var formdata = new FormData();
	  formdata.append('pic_eco', document.getElementById('pic_eco').files[0]);

    var other_data = $('#regFormlocation').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

  	var url = '<?php echo base_url(); ?>';
   $.ajax({
	  url : url + 'main_server/pamain/ecotourism_upload_save',
	  method: 'POST',
	  contentType: false,
	  cache: false,
	  processData: false,
	  data: formdata,
    dataType: "JSON",
    success:function(response){
                $('#messageimageeco').html(response.messageimageeco);
                if(response.error){
                    $('#responseDivImageeco').removeClass('alert-success').addClass('alert-warning').show();
                     setTimeout(function() {
                   $("#responseDivImageeco").fadeOut();
                }, 2000);
                }
                else{
                    $('#responseDivImageeco').removeClass('alert-warning').addClass('alert-success').show();
                    document.getElementById('pic_eco').value='';
                    setTimeout(function() {
                   $("#responseDivImageeco").fadeOut();
                }, 2000);
                    getTabImageEco();
                }
            }
   });
    $(document).on('click', '#clearMsgImage', function(){
        $('#responseDivImageeco').hide();
    });
}

 function getTabImageEco(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: url + 'main_server/pamain/fetchImageeco',
            success:function(response){
                $('#tbodyimageecotourism').html(response);
            }
        });
    }

$(document).ready(function() {
	  getTabImageEco();

	  $(document).on('click', '.removeimageeco', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		},
    function(){
      $.ajax({
        url: BASE_URL+'/main_server/pamain/deleteecotourism/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageEco();
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
	});
	});
//------------------------------------END OF IMAGE UPLOAD---------------------------------------------//
</script>
<script type="text/javascript" src="<?php echo base_url("bmb_assets2/select.js") ?>"></script>
