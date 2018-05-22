<?php
$data_regionid = array(
	'name'	=>	'region_id',
	'class'	=>	'form-control hide',
	'id'	=>	'region_id'

);
$data_provinceid = array(
	'name'	=>	'province_id',
	'class'	=>	'form-control hide',
	'id'	=>	'province_id'

);
$data_municipalid = array(
	'name'	=>	'municipal_id',
	'class'	=>	'form-control hide',
	'id'	=>	'municipal_id',
	'placeholder'	=>	'Municipal Name'
);
$data_barangayname = array(
	'name'	=>	'barangayname',
	'class'	=>	'form-control',
	'id'	=>	'barangayname',
	'placeholder'	=>	'Barangay Name'	
);
$data_barangaycode = array(
	'name'	=>	'barangaycode',
	'class'	=>	'form-control',
	'id'	=>	'barangaycode',
	'placeholder'	=>	'Barangay Code'	
);
?>

<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"> ADD NEW BARANGAY</div></div>
				<div class="panel-body">
					<div id="divBarangay" class="alert text-center" style="display:none;">
						<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
						<span style="color:#fff" id="messageBarangay"></span>								
					</div>
					<div class="col-md-12">
						<?php echo form_open('','class="form-horizontal" id="BarangayForm"'); ?>
						<?php echo form_hidden('id_b',$alldata->id_b); ?>
						<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<tbody>

							<?php if (!empty($alldata->id_b)): ?>								
								<tr valign="top" class="spaceUnder spaceOver">
									<td>Region</td>
									<td>
										<?php echo form_input($data_regionid,$alldata->regionid); ?>
										<strong><?= $alldata->regionName." (". $alldata->regionDesc.")"; ?></strong>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Province</td>
									<td>
										<?php echo form_input($data_provinceid,$alldata->id_p); ?>
										<strong><?= $alldata->provinceName; ?></strong>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Muncipality</td>
									<td>
										<?php echo form_input($data_municipalid,$alldata->id_m); ?>
										<strong><?= $alldata->municipalName; ?></strong>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay Code</td>
									<td><?php echo form_input($data_barangaycode,$alldata->barangayCode); ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay Name</td>
									<td><?php echo form_input($data_barangayname,$alldata->barangayName); ?></td>	
								</tr>								
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td>Region</td>
									<td>
										<?php echo form_input($data_regionid,$identifyRecords->regionid); ?>
										<strong><?= $identifyRecords->regionName." (". $identifyRecords->regionDesc.")"; ?></strong>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Province</td>
									<td>
										<?php echo form_input($data_provinceid,$identifyRecords->id_p); ?>
										<strong><?= $identifyRecords->provinceName; ?></strong>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Muncipality</td>
									<td>
										<?php echo form_input($data_municipalid,$identifyRecords->id_m); ?>
										<strong><?= $identifyRecords->municipalName; ?></strong>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay Code</td>
									<td><?php echo form_input($data_barangaycode); ?></td>
								</tr>		
								<tr valign="top" class="spaceUnder">
									<td>Barangay Name</td>
									<td><?php echo form_input($data_barangayname); ?></td>	
								</tr>				
							<?php endif ?>
							</tbody>
						</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div class="box-footer" >
					<div class="col-md-12">
						<?php if (!empty($alldata->id_b)): ?>
							<div class="form-group">									
								<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> UPDATE</i></button>
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/barangayList/'.$alldata->id_m) ?>"><i class="fa fa-list"> List of Barangay</i></a>
							</div>
							<?php else: ?>
							<div class="form-group">
								<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> SAVE</i></button>
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/barangayList/'.$identifyRecords->id_m) ?>"><i class="fa fa-list"> List of Barangay</i></a>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
function insert()
    {
    	 var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + '/main_server/psgc_locations/save_barangay',
    	 	type: "POST",
    	 	data: $('#BarangayForm').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messageBarangay').html(response.messageBarangay);
                    if(response.error){
                        $('#divBarangay').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#divBarangay").fadeOut();
						        }, 2000);
                    }
                    else{
                        $('#divBarangay').removeClass('alert-warning').addClass('alert-success').show();
                        $('#BarangayForm')[0].reset();
                         setTimeout(function() {
						           $("#divBarangay").fadeOut();
						        }, 2000);
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divBarangay').hide();
        });
    }
</script>