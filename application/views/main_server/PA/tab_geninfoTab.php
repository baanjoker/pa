
<?php
$data_paname = array(
    'name' => 'pa_name',
    'id'   => 'pa_name',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Name of Protected Area');
$data_legisno = array(
    'name' => 'legisno',
    'id'   => 'legisno',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Legislation No.');
$data_legisarea = array(
    'name' => 'area',
    'id'   => 'area',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Area (has.)',
	'onkeyup'=>'run(this)');
$data_legisbuffer = array(
    'name' => 'buffer',
    'id'   => 'buffer',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Buffer Zone (has.)',
	'onkeyup'=>'run(this)');
$data_legispdf = array(
    'name' => 'picture',
    'id'   => 'picture',
    'class'=> 'form-control',
    'type' => 'file',
    'placeholder'=>'PDF File');
$data_longdegree = array(
    'name' => 'longdegree',
    'id'   => 'longdegree',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Degree',
	'onkeyup'=>'run(this)');
$data_latdegree = array(
    'name' => 'latdegree',
    'id'   => 'latdegree',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Degree',
	'onkeyup'=>'run(this)');
$data_longminute = array(
    'name' => 'longminute',
    'id'   => 'longminute',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Minute',
	'onkeyup'=>'run(this)');
$data_latminute = array(
    'name' => 'latminute',
    'id'   => 'latminute',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Minute',
	'onkeyup'=>'run(this)');
$data_longsecond = array(
    'name' => 'longsecond',
    'id'   => 'longsecond',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Second',
	'onkeyup'=>'run(this)');
$data_latsecond = array(
    'name' => 'latsecond',
    'id'   => 'latsecond',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Second',
	'onkeyup'=>'run(this)');
$data_boundary = array(
    'name' => 'boundary',
    'id'   => 'boundary',
    'class'=> 'form-control',
    'placeholder'=>'Details',
    'style' => 'height:130px'
);
$data_landuses = array(
    'name' => 'landuses',
    'id'   => 'landuses',
    'class'=> 'form-control',
    'placeholder'=>'Details',
    'style' => 'height:130px'
);
$data_accessibility = array(
    'name' => 'accessibility',
    'id'   => 'accessibility',
    'class'=> 'form-control',
    'placeholder'=>'Details',
    'style' => 'height:130px'
);
?>
<?php
 function generateRandomString($length = 6)
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

<div class="tab-pane active" id="tab_geninfoTab">
  	<div class="row">
      	<div class="col-md-12">
        	<div class="panel panel-info">
          		<div class="panel-heading"><div class="panel-title"><i class="fa fa-info"></i> PROTECTED AREA GENERAL INFORMATION</div></div>
          		<div class="panel-body">
		          	<div class="col-md-12">
		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputNIP" class="control-label">PA Name</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_input($data_paname,$pamain->pa_name); ?>
			          		</div>
		          		</div>

		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputClassification" class="control-label">Classification</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_dropdown('nip_id',$classList,$pamain->nip_id,'class="form-control"') ?>
			          		</div>
		          		</div>

		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputCategory" class="control-label">PA Category</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_dropdown('pacategory_id',$categoryList,$pamain->pacategory_id,'class="form-control"') ?>
			          		</div>
		          		</div>

		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputConservePrior" class="control-label">Conservation Area</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,'class="form-control"') ?>
			          		</div>
		          		</div>

		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputBiogeoZone" class="control-label">Biogeographic Zone</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_dropdown('tbz_id',$zoneList,$pamain->tbz_id,'class="form-control"') ?>
			          		</div>
		          		</div>

		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputBiogeoZone" class="control-label">IUCN</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_dropdown('iucncode',$iucnList,$pamain->iucn_id,'class="form-control"') ?>
			          		</div>
		          		</div>
		          		<div class="box-header with-border"></div>

		          		<div class="checkbox">
		          				<label><?= form_checkbox('pambcheck',$pamain->pamb_approve,set_value('pambcheck',$pamain->pamb_approve),'id="dateApprovePMB"') ?>Approved PAMB?</label>
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


	          				<div class="box-header with-border"></div>
	          					<div class="col-sm-3">
	          						<div class="form-group">
								        <div class="checkbox">
								            <label><?= form_checkbox('ipaf',$pamain->ipaf,set_value('ipaf',$pamain->ipaf),'id="dateApprovePMB"') ?> IPAF Established?</label>
								        </div>
								        <div class="checkbox">
									        <label><?= form_checkbox('whsites',$pamain->heritage,set_value('whsites',$pamain->heritage),'id="dateApprovePMB"') ?> World Heritage Sites?</label>
									    </div>
									    <div class="checkbox">
									        <label><?= form_checkbox('tbsites',$pamain->transboundary,set_value('tbsites',$pamain->transboundary),'id="dateApprovePMB"') ?> Transboundary Sites?</label>
									    </div>
									    <div class="checkbox">
									        <label><?= form_checkbox('ramsasites',$pamain->ramsar,set_value('ramsasites',$pamain->ramsar),'id="dateApprovePMB"') ?> Ramsar Sites?</label>
									    </div>
						    		</div>
						    	</div>
		          	</div>
		        </div>
		    </div>
		    <div class="panel panel-info">
          		<div class="panel-heading"><div class="panel-title"><i class="fa fa-question"></i> STATUS OF NIPAS IMPLEMENTATION</div></div>
          		<div class="panel-body">
		          	<div class="col-md-12">

		          		<div class="form-group">
		          			<div class="col-md-6">
		          				<div class="checkbox">
							        <label><?= form_checkbox('compilemap',$pamain->nipas_compilemap,set_value('compilemap',$pamain->nipas_compilemap),'id="dateApprovePMB"') ?> Compilation of Maps</label>
							    </div>
							    <div class="checkbox">
							        <label><?= form_checkbox('resourceprofile',$pamain->nipas_resourceprofile,set_value('resourceprofile',$pamain->nipas_resourceprofile),'id="dateApprovePMB"') ?> Resource Profile</label>
							    </div>
							    <div class="checkbox">
							    	<label><?= form_checkbox('paplan',$pamain->nipas_paplan,set_value('paplan',$pamain->nipas_paplan),'id="dateApprovePMB"') ?> Initial PA Plan</label>
						        </div>
		          			</div>
		          			<div class="col-md-6">
								<div class="checkbox">
							        <label><?= form_checkbox('regionalreview',$pamain->nipas_regionalreview,set_value('regionalreview',$pamain->nipas_regionalreview),'id="dateApprovePMB"') ?> Regional Review</label>
							    </div>
							    <div class="checkbox">
							        <label><?= form_checkbox('nationalreview',$pamain->nipas_nationalreview,set_value('nationalreview',$pamain->nipas_nationalreview),'id="dateApprovePMB"') ?> National Review</label>
							    </div>
							    <div class="checkbox">
							        <label><?= form_checkbox('presproc',$pamain->nipas_presproc,set_value('presproc',$pamain->nipas_presproc),'id="dateApprovePMB"') ?> Presidential Proclamation</label>
							    </div>
							    <div class="checkbox">
							        <label><?= form_checkbox('congressenact',$pamain->nipas_congress,set_value('congressenact',$pamain->nipas_congress),'id="dateApprovePMB"') ?> Congressional Enactment</label>
							    </div>
	          				</div>
		          		</div>
	          			<div class="box-header with-border"></div>
          			</div>
          		</div>
          	</div>

          	<div class="panel panel-info">
          		<div class="panel-heading"><div class="panel-title"><i class="fa fa-map"></i> PROTECTED AREA LOCATION INFORMATION</div></div>
          			<div class="panel-body">
          				<div class="row">
          					<div class="col-md-12">
          					<div class="box-header with-border">
				            	<h3 class="box-title" style="color:red">GEOGRAPHIC LOCATION</h3>
				            </div><br>

	          					<div class="form-group">
			            			<label for="inputCategory" class="col-sm-1 col-xs-12 control-label">Longitude</label>
			            			<div class="form-group col-sm-3 col-xs-4">
			            				<?= form_input($data_longdegree,$pamain->geographic_longdegree); ?>
			            			</div>
			            			<div class="form-group col-sm-3 col-xs-4">
			            				<?= form_input($data_longminute,$pamain->geographic_longminute); ?>
			            			</div>
			            			<div class="form-group col-sm-3 col-xs-4">
			            				<?= form_input($data_longsecond,$pamain->geographic_longsecond); ?>
			            			</div>
			            		</div>
			            	</div>
			            	<div class="col-md-12">
			            		<div class="form-group">
			            			<label for="inputCategory" class="col-sm-1 col-xs-12 control-label">Latitude</label>
			            			<div class="form-group col-sm-3 col-xs-4">
			            				<?= form_input($data_latdegree,$pamain->geographic_latdegree); ?>
			            			</div>
			            			<div class="form-group col-sm-3 col-xs-4">
			            				<?= form_input($data_latminute,$pamain->geographic_latminute); ?>
			            			</div>
			            			<div class="form-group col-sm-3 col-xs-4">
			            				<?= form_input($data_latsecond,$pamain->geographic_latsecond); ?>
			            			</div>
	          					</div>

	          				</div>
	          			</div>
	          			<div class="box-header with-border"></div>

	          			<div class="row">
	          				<div class="col-md-12">
	          				<div class="box-header with-border">
				            	<h3 class="box-title" style="color:red">LOCATION</h3>
				            </div><br>
				           		<div id="responseDiv" class="alert text-center" style="display:none;">
			    					<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
			    					<span style="color:#000" id="message"></span>
			    				</div>

          						<?php if (!empty($pamain->id_main)): ?>
          							<input type="text" name="gencode" class="hide" value="<?php echo $pamain->pacode ?>" id="codegen">
          						<?php else: ?>
          							<input type="text" name="gencode" class="hide" value="<?php echo generateRandomString() ?>" id="codegen">
          						<?php endif ?>

          						<div class="form-group">
          							<div class="col-md-3">
          								<label for="input" class="control-label">Region</label>
          								<?php echo form_dropdown('region_id',$regionList,'','class="form-control" id="regid"') ?>
          								<span class="prov_error"></span>
          							</div>
          							<div class="col-md-3">
          								<label for="input" class="control-label">Province</label>
          								<?php echo form_dropdown('province_id','','','class="form-control" id="provid"') ?>
          								<span class="municipal_error"></span>
          							</div>
          							<div class="col-md-3">
          								<label for="input" class="control-label">Municipality</label>
          								<?php echo form_dropdown('municipal_id','','','class="form-control action" id="municipal_id"') ?>
					            		<span class="barangay_error"></span>
          							</div>
          							<div class="col-md-3">
          								<label for="input" class="control-label">Barangay</label>
          								<?php echo form_dropdown('barangay_id','','','class="form-control" id="bar_id"') ?>
					            		<span class="barangay_error"></span>
          							</div>
          						</div>

				            	<div class="row">
					            	<div class="col-md-12">
					            		<div class="form-group col-sm-12 col-xs-12">
					            			<button type="button" name="btnlocation" onclick="insert()" id="submitlocation" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
					            		</div>
					           		</div>
				           		</div>
				            </div>
				            <!-- TABLE -->
			          		<div class="col-md-12">
			          			<div class="table-responsive">
								    <table id="tablelocation" class="table table-hover">
								        <thead>
								            <tr>
								                <th>Region</th>
								                <th>Province</th>
								                <th>Municipality</th>
								                <th>Barangay</th>
								                <th>Remove</th>
								            </tr>
								        </thead>
								        <tbody id="tbody"></tbody>
								    </table>
								</div>
	          				</div>
	          			<!-- END OF TABLE -->
          				</div>
          				<div class="box-header with-border"></div>
          				<div class="row">
          					<div class="col-md-12">
	          				<div class="box-header with-border">
				            	<h3 class="box-title" style="color:red">OTHER LOCATION INFORMATION</h3>
				            </div><br>

				            	<div class="form-group">
				            		<div class="col-md-4">
          								<label for="input" class="control-label">Protected Area Boundary</label>
          								<?php echo form_textarea($data_boundary,$pamain->pa_boundary,'') ?>
          								<span class="prov_error"></span>
          							</div>
          							<div class="col-md-4">
          								<label for="input" class="control-label">Land Uses</label>
          								<?php echo form_textarea($data_landuses,$pamain->landuses,'') ?>
          								<span class="prov_error"></span>
          							</div>
          							<div class="col-md-4">
          								<label for="input" class="control-label">Accessibility</label>
          								<?php echo form_textarea($data_accessibility,$pamain->accessibility,'') ?>
          								<span class="prov_error"></span>
          							</div>
				            	</div>
				            </div>
				        </div>

          			</div>
        	</div>
        	<div class="panel panel-info">
          	<div class="panel-heading"><div class="panel-title"><i class="fa fa-gavel"></i> ORDINANCE POWER</div></div>
          		<div class="panel-body">
	          			<div class="col-md-12">
	          				<div id="responseDivLegis" class="alert text-center" style="display:none;">
			    				<button type="button" class="close" id="clearMsgLegis"><span aria-hidden="true">&times;</span></button>
			    					<span style="color:#000" id="messagelegis"></span>
			    			</div>

			    			<div class="form-group">
          						<div class="col-md-4">
          							<label for="input" class="control-label">Legislation</label>
          								<?php echo form_dropdown('legis_id',$procList,'','class="form-control" id="legis_id"') ?>
          						</div>
          						<div class="col-md-4">
          							<label for="input" class="control-label">Legislation No.</label>
          								<?php echo form_input($data_legisno); ?>
          						</div>
	          					<div class="form-inline">
	          						<div class="col">
	          							<label for="input" class="control-label">Dated</label>
	          						</div>
	          						<?php echo form_dropdown('date_month',$monthList,'','class="form-control"'); ?>
	          						<?php echo form_dropdown('date_day',$dayList,'','class="form-control"'); ?>
	          						<?php echo form_dropdown('date_year',$yearList,'','class="form-control"'); ?>
	          					</div>
          					</div>

          					<div class="form-group">
          						<div class="col-md-4">
          							<label for="input" class="control-label">Area (hectare)</label>
          							<?php echo form_input($data_legisarea); ?>
          						</div>
          						<div class="col-md-4">
          							<label for="input" class="control-label">Buffer Zone (hectare)</label>
          							<?php echo form_input($data_legisbuffer); ?>
          						</div>
          					</div>

          					<div class="form-group">
          						<div class="col-md-2">
          							<label for="input" class="control-label">PDF File</label>
          						</div>
          						<div class="col-md-4">
          							<input type="file" name="picture" id="picture">
		                			<input type="hidden" name="old_file">
          						</div>
          					</div>

          					<div class="row">
					            <div class="col-md-12">
					            	<div class="form-group col-sm-12 col-xs-12">
					            		<button type="button" name="btnlegislation" onclick="insert_legis2()" id="btnlegislation" class="btn btn-success btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
					            	</div>
					           	</div>
				           	</div>

	          			</div>
	          		<!-- </div> -->
	          			<div class="col-md-12">
			          		<div class="table-responsive">
								<table id="tableLegislation" class="table table-hover">
								    <thead>
								        <tr>
								            <th>LEGISLATION</th>
								            <th>DATED</th>
								            <th>AREA(ha.)</th>
								            <th>BUFFER ZONE(ha.)</th>
								            <th>FILE ATTACHED</th>
								            <th>Remove</th>
								        </tr>
								    </thead>
								    <tbody id="tbodylegis">
								    </tbody>
								</table>
							</div>
	          			</div>
	          	</div>
	        </div>
    	</div>
	</div>
</div>


<script type="text/javascript">

// 	$(document).ready(function(){
//     var a = document.getElementById("dateApprovePMB").value;
//     	<?php if (a.checked == true): ?>
//     		$("#pambmemberTab").show();
//     		$("#dateOrganized").show();
//     	<?php elseif (a.checked == false): ?>
//     		$("#pambmemberTab").hide();
//     		$("#dateOrganized").hide();
//     	<?php endif ?>
// });

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
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deleteproject/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTabProject();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

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
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deletetribe/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTabtribes();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

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
                    document.getElementById('picture2').value='';
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
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/pamain/deleteimages/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					getTabImage();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

		});
	});
//------------------------------------END OF IMAGE UPLOAD---------------------------------------------//
</script>
<script type="text/javascript" src="<?php echo base_url("bmb_assets2/select.js") ?>"></script>
